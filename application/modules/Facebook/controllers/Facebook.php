<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facebook extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
	}

	public function index(){
		$page_size      = 10;
        $page_num       = (get('p')) ? get('p') : 1;
        $total_row      = $this->model->getList(-1,-1);
        $start_row      = (get('p'))?$page_num:0;

        $config['base_url'] = PATH."facebook"."?";
        $config['total_rows'] = $total_row;
        $config['per_page'] = 10;
        $config['query_string_segment'] = 'p';
        $config['page_query_string'] = TRUE;
        $this->pagination->initialize($config);

		$data= array(
			'result' => $this->model->getList($page_size, $start_row)
		);

		$this->template->title(l('slug-accounts-facebook'),TITLE);
		$this->template->build('index', $data);
	}

	public function update(){
		$pages = array();

		$list_profile = $this->model->fetch("*", FACEBOOK_TB, "uid = '".session("uid")."'");

		$id   = (int)get("id");
		$data = array(
			"profiles" => $list_profile,
			"result"   => $this->model->get("*", FACEBOOK_TB, "id = '{$id}'"),
			"pages"    => $pages
		);
		$this->template->title(l('slug-accounts-facebook'), TITLE);
		$this->template->build('update', $data);
	}

	public function blank(){
		try {
			set_session("app_secret", segment(2));
            $params = array("client_id" => get("app_id"), "client_secret" => segment(2), "redirect_uri" => PATH."blank/".segment(2)."?app_id=".get("app_id")."&code=".get("code"), "code" => get("code"));
            $response = FBCUSTOM()->api( '/v2.3/oauth/access_token' , 'GET', $params );
            $json = $this->getAccessToken($response['access_token'], false);
            if($json['st'] == "success"){
            	echo $json['txt'];
            	echo '<script type="text/javascript"> setTimeout(function(){ window.opener.popupCallback("pop some data"); window.close(); },1000); </script>';
            }else{
            	echo $json['txt'];
            }
        }
        catch ( Exception $e ) {
            return false;
        }
	}

	public function Groups(){
		$this->load->view("groups");
	}

	public function getGroups($access_token = "", $response = true){
		if(post("access_token")){
			$access_token = post("access_token");
		}
		
		$info  = GET_USER($access_token);
		if(!empty($info)){
			$FB = $this->model->get("*", FACEBOOK_TB, "name = '".filter_input_xss($info['name'])."' AND uid = '".session("uid")."'");
			if(!empty($FB)){
				$groups = GET_GROUPS_PAGES($info['id'], $access_token, "groups");
				if(isset($groups["data"]) && !empty($groups["data"])) {
					$count=0;
			        $insert_string = "INSERT INTO `tbl_groups` (`group_id`,`group_name`,`privacy`,`fid`,`uid`,`status`,`created`) VALUES ";
					$this->db->delete(GROUPS_TB,"fid = '".$FB->id."'");
					foreach ($groups["data"] as $row) {
						if(isset($row['name'])){
							$name = str_replace("\\", "", $row['name']);
							$name = str_replace("/", "", $name);
							$name = str_replace("(", "", $name);
							$name = str_replace(")", "", $name);
							$name = $this->clean($name);
							if(UNCHECK_GROUPS == 0){
								$insert_string .= "('".$row['id']."','".filter_input_xss($name)."','".$row['privacy']."','".$FB->id."','".session("uid")."','1','".NOW."' )";
				            	$insert_string .= ",";
			            		$count++;
							}else{
								if($row['privacy'] == "OPEN"){
					            	$insert_string .= "('".$row['id']."','".filter_input_xss($name)."','".$row['privacy']."','".$FB->id."','".session("uid")."','1','".NOW."' )";
					            	$insert_string .= ",";
				            		$count++;
					        	}
							}
			            }
			        }

			        if($count != 0){
				        $insert_string=substr($insert_string,0,-1);
				        $this->db->query($insert_string);
			        }
				}
			}
		}
		
		$json= array(
			'st' 	=> 'success',
			'txt' 	=> l('slug-successfully')
		);

		if($response)
			print_r(json_encode($json));
	}

	public function clean($string) {
	   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
	   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}

	public function getAccessToken($access_token = "", $response = false){
		if(post("access_token")){
			$response = true;
			$access_token = post("access_token");
		}

		$info  = GET_USER($access_token);
		if(!empty($info)){
			$AppInfo = GET_INFO_APP($access_token);
			$data = array(
				"fid"          => $info['id'],
				"name"         => filter_input_xss($info['name']),
				"access_token" => $access_token,
				"uid"          => session("uid"),
				"changed"      => NOW,
			);
			$check = $this->model->get("*", FACEBOOK_TB, "name = '".filter_input_xss($info['name'])."' AND uid = '".session("uid")."'");
			
			$cid = 0;
			if(empty($check)){
				$data["created"] = NOW;
				$this->db->insert(FACEBOOK_TB,$data);
				$cid = $this->db->insert_id();
			}else{
				$cid = $check->id;
				$this->db->update(FACEBOOK_TB,$data,"id = '{$check->id}'");
			}


			if($cid != 0){
				$checkapp = $this->model->get("*", APP_TB, "cid = '{$cid}' AND app_id = '".$AppInfo["id"]."'");
				$app_data = array(
					"fid"          => $info['id'],
					"name"         => $AppInfo["name"],
					"app_id"       => $AppInfo["id"],
					"app_secret"   => session("app_secret"),
					"cid"          => $cid,
					"access_token" => $access_token,
					"status"       => 1,
					"changed"      => NOW,
				);

				if(empty($checkapp)){
					$app_data["created"] = NOW;
					$this->db->insert(APP_TB,$app_data);
				}else{
					$this->db->update(APP_TB,$app_data,"id = '{$checkapp->id}'");
				}
				unset_session("app_secret");

				$check_groups = $this->model->get("*",GROUPS_TB,"fid = '".$cid."'");
				if(empty($check_groups)){
					$this->getGroups($access_token, false);
				}
			}

			$json= array(
				'st' 	=> 'success',
				'txt' 	=> l('slug-successfully')
			);
		}else{
			$json= array(
				'st' 	=> 'error',
				'txt' 	=> l('slug-failure-please-try-again')
			);
		}

		if($response){
			print_r(json_encode($json));
		}else{
			return $json;
		}
	}

	public function postDelete(){
		$id = (int)post('id');
		$POST = $this->model->get('*', FACEBOOK_TB, "id = '{$id}' AND uid = '".session("uid")."'");
		if(!empty($POST)){
			$this->db->delete(FACEBOOK_TB, "id = '{$id}' AND uid = '".session("uid")."'");
			$this->db->delete(APP_TB, "cid = '{$id}'");
			$this->db->delete(GROUPS_TB, "fid = '{$id}'");
			$this->db->delete(POSTS_TB, "fid = '{$id}'");
			$json= array(
				'st' 	=> 'success',
				'txt' 	=> l('slug-delete-successfully')
			);
		}else{
			$json= array(
				'st' 	=> 'error',
				'txt' 	=> l('slug-cannot-delete-item')
			);
		}
		print_r(json_encode($json));
	}

	public function postDeleteApp(){
		$id = (int)post('id');
		$APP = $this->model->get('*', APP_TB, "id = '{$id}'");
		if(!empty($APP)){
			$this->db->delete(APP_TB, "id = '{$id}'");
			$json= array(
				'st' 	=> 'success',
				'txt' 	=> l('slug-delete-successfully')
			);
		}else{
			$json= array(
				'st' 	=> 'error',
				'txt' 	=> l('slug-cannot-delete-item')
			);
		}
		print_r(json_encode($json));
	}

	public function postDeleteAll(){
		$ids =$this->input->post('id');
		if(!empty($ids)){
			foreach ($ids as $id) {
				$POST = $this->model->get('*', FACEBOOK_TB, "id = '{$id}' AND uid = '".session("uid")."'");
				if(!empty($POST)){
					$this->db->delete(FACEBOOK_TB, "id = '{$id}' AND uid = '".session("uid")."'");
					$this->db->delete(APP_TB, "cid = '{$id}'");
					$this->db->delete(GROUPS_TB, "fid = '{$id}'");
				}
			}
		}
		print_r(json_encode(array(
			'st' 	=> 'success',
			'txt' 	=> l('slug-successfully')
		)));
	}

	public function postStatusAll(){
		$ids    =$this->input->post('id');
		$status =(int)post('status');
		if(!empty($ids)){
			foreach ($ids as $id) {
				$POST = $this->model->get('*', FACEBOOK_TB, "id = '{$id}' AND uid = '".session("uid")."'");
				if(!empty($POST)){
					$this->db->update(FACEBOOK_TB,array("status" => $status), "id = '{$id}' AND uid = '".session("uid")."'");
				}
			}
		}
		print_r(json_encode(array(
			'st' 	=> 'success',
			'txt' 	=> l('slug-successfully')
		)));
	}
}
