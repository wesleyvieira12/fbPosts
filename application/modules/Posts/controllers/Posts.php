<?php
class Posts extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		$this->load->database();
	}

	public function index(){
		$page_size      = 25;
        $page_num       = (get('p')) ? get('p') : 1;
        $total_row      = $this->model->getList(-1,-1);
        $start_row      = (get('p'))?$page_num:0;

        $config['base_url'] = PATH."schedules"."?";
        $config['total_rows'] = $total_row;
        $config['per_page'] = 25;
        $config['query_string_segment'] = 'p';
        $config['page_query_string'] = TRUE;
        $this->pagination->initialize($config);

        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        set_session('actual_link', $actual_link);

		$data= array(
			'result' => $this->model->getList($page_size, $start_row)
		);

		$this->template->title(l('slug-manage-schedules'),TITLE);
		$this->template->build('index', $data);
	}

	public function update(){
		$id   = (int)get("id");
		$result = $this->model->get("*", POSTS_TB, "id = '{$id}'");
		if(empty($result)) redirect(PATH.'schedules');
		$data = array(
			"result" => $this->model->get("*", POSTS_TB, "id = '{$id}'")
		);
		$this->template->title(l('slug-manage-schedules'),TITLE);
		$this->template->build('update', $data);
	}

	public function postUpdate(){
		$json = array();
		$pages = $this->input->post('pages');

		switch (post('type_post')) {
			case 'link':
				if(post('link_url') == ""){
					$json[] = array(
						"type"   => "link_url",
						"text"   => l('slug-link-url-is-required')
					);
				}

				$data = array(
					"type"        => "link",
					"url"         => post("link_url"),
					"message"     => post("link_message"),
					"title"       => post("link_title"),
					"description" => post("link_description"),
					"image"       => post("link_picture"),
					"caption"     => post("link_caption")
				);
				break;
			case 'image':
				if(post('image_url') == ""){
					$json[] = array(
						"type"   => "image_url",
						"text"   => l('slug-image-url-is-required')
					);
				}

				$data = array(
					"type"        => "image",
					"description" => post("image_description"),
					"image"       => post("image_url")
				);
				break;
			case 'video':
				if(post('video_url') == ""){
					$json[] = array(
						"type"   => "video_url",
						"text"   => l('slug-video-url-is-required')
					);
				}

				$data = array(
					"type"        => "video",
					"title"       => post("video_title"),
					"description" => post("video_description"),
					"url"         => post("video_url")
				);
				break;
			default:
				if(post('post_message') == ""){
					$json[] = array(
						"type"   => "post_message",
						"text"   => l('slug-message-is-required')
					);
				}

				$data = array(
					"type"        => "text",
					"message"     => post("post_message")
				);
				break;
		}

		if(post('time_post') == ""){
			$json[] = array(
				"type"   => "time_post",
				"text"   => l('slug-time-post-required')
			);
		}else{
			$data["time_post"] = date("Y-m-d H:i:s", strtotime(post('time_post').":00"));
		}

		if(post('delete_complete')){
			$data["delete"] = 1;
		}else{
			$data["delete"] = 0;
		}

		if(post('add_time_post')){
			$data["add_time_post"] = 1;
		}else{
			$data["add_time_post"] = 0;
		}

		if(!empty($json)){
			$json["st"] = "error";
		}else{
			$id = (int)post('id');
			$data["deplay"]  = (int)post('deplay');
			$data["changed"] = NOW;

			$this->db->update(POSTS_TB, $data, "id = '".$id."' AND uid = '".session("uid")."'");

			$json[] = array(
				"text"   => l('slug-update-successfully')
			);
			$json["st"] = "success";
			$json["url"] = session("actual_link")?session("actual_link"):PATH."schedules";

		}

		printf(json_encode($json));
	}

	public function ajax_post(){
		ini_set('max_execution_time', 3000); //300 seconds = 5 minutes
		ini_set('max_input_vars', 10000); //300 seconds = 5 minutes

		$json = array();
		$pages = $this->input->post('pages');

		switch (post('type_post')) {
			case 'link':
				if(post('link_url') == ""){
					$json[] = array(
						"type"   => "link_url",
						"text"   => l('slug-link-url-is-required')
					);
				}

				$data = array(
					"type"        => "link",
					"url"         => post("link_url"),
					"message"     => post("link_message"),
					"title"       => post("link_title"),
					"description" => post("link_description"),
					"image"       => post("link_picture"),
					"caption"     => post("link_caption")
				);
				break;
			case 'image':
				if(post('image_url') == ""){
					$json[] = array(
						"type"   => "image_url",
						"text"   => l('slug-image-url-is-required')
					);
				}

				$data = array(
					"type"        => "image",
					"description" => post("image_description"),
					"image"       => post("image_url")
				);
				break;
			case 'video':
				if(post('video_url') == ""){
					$json[] = array(
						"type"   => "video_url",
						"text"   => l('slug-video-url-is-required')
					);
				}

				$data = array(
					"type"        => "video",
					"title"       => post("video_title"),
					"description" => post("video_description"),
					"url"         => post("video_url")
				);
				break;
			default:
				if(post('post_message') == ""){
					$json[] = array(
						"type"   => "post_message",
						"text"   => l('slug-message-is-required')
					);
				}

				$data = array(
					"type"        => "text",
					"message"     => post("post_message")
				);
				break;
		}

				if(post('time_post') == ""){
					$json[] = array(
						"type"   => "time_post",
						"text"   => l('slug-time-post-required')
					);
				}

				if(post('delete_complete')){
					$data["delete"] = 1;
				}else{
					$data["delete"] = 0;
				}

				if(post('add_time_post')){
					$data["add_time_post"] = 1;
				}else{
					$data["add_time_post"] = 0;
				}

				if(empty($pages)){
					$json[] = array(
						"type"   => "list_pages",
						"text"   => l('slug-select-at-least-one-page-group-profile')
					);
				}

				if(!empty($json)){
					$json["st"] = "error";
				}else{
					$count = 0;
					$deplay = (int)post('deplay');
					$list_deplay = array();
					for ($i=0; $i < count($pages); $i++) { 
						$list_deplay[] = $deplay*$i;
					}

					if(post('auto_pause')){
						$pause = 0;
						$count_deplay = 0;
						for ($i=0; $i < count($list_deplay); $i++) { 
							$item_deplay = 1;
							if(post('pause_post') == $count_deplay){
								$pause += post('pause_time')*60;
								$count_deplay = 0;
							}

							$list_deplay[$i] += $pause;
							$count_deplay++;
						}
					}

					if(post('random_post')){
						shuffle($list_deplay);
					}

					$time_post = strtotime(post('time_post').":00");

					//BUSCAR DEPLAY
					$time_now  = strtotime(NOW) + DEFAULT_DEPLAY;
					if($time_post < $time_now){
						$time_post = $time_now;
					}
					$ultimo_time = null;
					foreach ($pages as $key => $row) {
						
						$value  = explode("{-}", $row);
						if(count($value) == 4){
							$data["cid"]          = $value[0];
							$data["fid"]          = $value[1];
							$data["name"]         = $value[2];
							if($value[0] == "page"){
								$data["access_token"] = $value[3];
							}else{
								$data["access_token"] = "";
								$data["account"]      = $value[3];
							}
							$data["uid"]          = session("uid");
							$data["deplay"]       = $deplay;
							$data["changed"]      = NOW;
							$data["created"]      = NOW;
							$data["time_post"]    = date("Y-m-d H:i:s", $time_post + $list_deplay[$key]);
							

							$this->db->insert(POSTS_TB, $data);
							$count++;
						}
					}
			
					
					if(post('repeat_post')){

						$id_post_next = post('post_next');
						 $post_next = $this->db->query("select * from tbl_save where id = '{$id_post_next}' LIMIT 1");
						 $value = $post_next->row_array();
						//foreach ($post_next as $value) {
							$datax = array(
								"type"        => $value['type'],
								"url"         => $value['url'],
								"message"     => $value['message'],
								"title"       => $value['title'],
								"description" => $value['description'],
								"image"       => $value['image'],
								"caption"     => $value['caption']
								);
										
							if(post('delete_complete')){
								$datax["delete"] = 1;
							}else{
								$datax["delete"] = 0;
							}

							if(post('add_time_post')){
								$datax["add_time_post"] = 1;
							}else{
								$datax["add_time_post"] = 0;
							}

								
							foreach ($pages as $key => $row) {
							
								$valuex  = explode("{-}", $row);
								if(count($valuex) == 4){
									$datax["cid"]          = $valuex[0];
									$datax["fid"]          = $valuex[1];
									$datax["name"]         = $valuex[2];
									if($valuex[0] == "page"){
										$datax["access_token"] = $valuex[3];
									}else{
										$datax["access_token"] = "";
										$datax["account"]      = $valuex[3];
									}
									$datax["uid"]          =$value['uid'];
									$datax["deplay"]       = $deplay;
									$datax["changed"]      = NOW;
									$datax["created"]      = NOW;
									

									
								}
								$i=0;
								$repeat = (int)post('repeat');

									while($i<$repeat){
										$t = $deplay*($i+1);
										$datax["time_post"] = date("Y-m-d H:i:s",strtotime($data["time_post"])+$t);
										$this->db->insert(POSTS_TB, $datax);
										$i++;
									}

							}
							//break;
						//}
					}
				}
					
			if($count != 0){
				$json[] = array(
					"text"   => l('slug-add-schedule-posts-successfully')
				);
				$json["st"] = "success";
			}else{
				$json[] = array(
					"text"   => l('slug-the-error-occurred-during-processing')
				);
				$json["st"] = "error";
			}

		

		printf(json_encode($json));
	}

	public function getInfo(){
		$id = (int)post("id");

		$comment = 0;
		$like    = 0;
		$share   = 0;
		$text = "No data";

		$result = $this->model->get("*", POSTS_TB, "id = '".$id."' AND uid = '".session("uid")."'");
		if(!empty($result)){
			if($result->access_token == ""){
				$FB = $this->model->get("*", FACEBOOK_TB, "id = '".$result->account."'");
				if(!empty($FB)){
					$APP = $this->model->fetch("*", APP_TB, "cid = '".$result->account."' AND status = 1");
					if(!empty($APP)){
						foreach ($APP as $item) {
							$check = GET_USER($item->access_token);
							if(!$check){
								$this->db->update(APP_TB, array("status" => 0), "id = '".$item->id."'");
							}else{
								if($result->cid == "profile"){
									$result->fid = $item->fid;
								}

								$result->access_token = $item->access_token;
								$response = FB_GET_POSTS($result);
								if(!empty($response)){
									if(isset($response['comments']) && isset($response['comments']['data'])){
										$comment = count($response['comments']['data']);
									}

									if(isset($response['likes']) && isset($response['likes']['data'])){
										$like = count($response['likes']['data']);
									}

									if(isset($response['sharedposts']) && isset($response['sharedposts']['data'])){
										$share = count($response['sharedposts']['data']);
									}

									$text = l('slug-comments').": {$comment} ".l('slug-likes').": {$like} ".l('slug-shares').": {$share}";
									break;
								}
							}
						}
					}
				}
			}else{
				$response = FB_GET_POSTS($result);
				if(!empty($response)){
					if(isset($response['comments']) && isset($response['comments']['data'])){
						$comment = count($response['comments']['data']);
					}

					if(isset($response['likes']) && isset($response['likes']['data'])){
						$like = count($response['likes']['data']);
					}

					if(isset($response['sharedposts']) && isset($response['sharedposts']['data'])){
						$share = count($response['sharedposts']['data']);
					}

					$text = l('slug-comments').": {$comment} ".l('slug-likes').": {$like} ".l('slug-shares').": {$share}";
				}
			}

			echo $text;
		}
	}

	public function postDelete(){
		$id = (int)post('id');
		$POST = $this->model->get('*', POSTS_TB, "id = '{$id}' AND uid = '".session("uid")."'");
		if(!empty($POST)){
			$this->db->delete(POSTS_TB, "id = '{$id}' AND uid = '".session("uid")."'");
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
				$POST = $this->model->get('*', POSTS_TB, "id = '{$id}' AND uid = '".session("uid")."'");
				if(!empty($POST)){
					$this->db->delete(POSTS_TB, "id = '{$id}' AND uid = '".session("uid")."'");
				}
			}
		}
		print_r(json_encode(array(
			'st' 	=> 'success',
			'txt' 	=> l('slug-successfully')
		)));
	}

	public function postDeleteAllPost(){
		$this->db->delete(POSTS_TB, "uid = '".session("uid")."'");
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
				$POST = $this->model->get('*', POSTS_TB, "id = '{$id}' AND uid = '".session("uid")."'");
				if(!empty($POST)){
					$this->db->update(POSTS_TB,array("status" => $status), "id = '{$id}' AND uid = '".session("uid")."'");
				}
			}
		}
		print_r(json_encode(array(
			'st' 	=> 'success',
			'txt' 	=> l('slug-successfully')
		)));
	}

	public function cronjob(){
		$spintax = new Spintax();
		ini_set('max_execution_time', 300000);

		define("TIMEPOST",date("Y-m-d H:i").":00");

	 	$result = $this->db
	    ->select('*')
	    ->from(POSTS_TB)
	    ->where('status != ', 0)
	    ->where('status != ', 2)
	    ->where('time_post <= ', NOW)
	    ->get()->result();
	    
		if(!empty($result)){
			foreach ($result as $key => $row) {
				$delete       = $row->delete;
				$repeat       = $row->repeat_post;
				$repeat_time  = $row->repeat_time;
				$repeat_end   = $row->repeat_end;
				$time_post    = $row->time_post;
				$deplay       = $row->deplay;

				$time_post          = strtotime($time_post) + $repeat_time;
				$time_post_only_day = date("Y-m-d", $time_post);
				$time_post_day      = strtotime($time_post_only_day);
				$repeat_end         = strtotime($repeat_end);

				$row->url         = $spintax->process($row->url);
				$row->message     = $spintax->process($row->message);
				$row->title       = $spintax->process($row->title);
				$row->description = $spintax->process($row->description);
				$row->image       = $spintax->process($row->image);
				$row->caption     = $spintax->process($row->caption);

				if($row->add_time_post == 1){
					$row->message = $row->message."\r\n".date("H:i:s d-m-Y",strtotime(NOW));
					$row->description = $row->description."\r\n".date("H:i:s d-m-Y",strtotime(NOW));
				}
				
				if($row->access_token == ""){
					$FB = $this->model->get("*", FACEBOOK_TB, "id = '".$row->account."'");
					if(!empty($FB)){
						$APP = $this->model->fetch("*", APP_TB, "cid = '".$row->account."' AND status = 1");
						if(!empty($APP)){
							foreach ($APP as $item) {
								$check = GET_GROUPS_PAGES($item->fid, $item->access_token, "page");
								if(!$check){
									$this->db->update(APP_TB, array("status" => 0), "id = '".$item->id."'");
								}else{
									if($row->cid == "profile"){
										$row->fid = $item->fid;
									}

									$row->access_token = $item->access_token;
									$response = FB_POST($row);
									if(!empty($response)){
										if($repeat == 1 && $time_post_day < $repeat_end){
											$this->db->update(POSTS_TB,array("status" => 3, 'time_post' => date("Y-m-d H:i:s", $time_post), 'result' => isset($response["id"])?$response["id"]:"", 'message_error' => isset($response["message"])?$response["message"]:""), "id = {$row->id}");
											break;
										}else{
											if($delete == 1){
												$this->db->delete(POSTS_TB, "id = {$row->id}");
											}else{
												$this->db->update(POSTS_TB,array("status" => 2, 'result' => isset($response["id"])?$response["id"]:"", 'message_error' => isset($response["message"])?$response["message"]:""), "id = {$row->id}");
											}
											break;
										}
									}
								}
							}
						}
					}
				}else{
					$response = FB_POST($row);
					if(!empty($response)){
						if($repeat == 1 && $time_post < $repeat_end){
							$this->db->update(POSTS_TB,array("status" => 3, 'time_post' => date("Y-m-d H:i:s", $time_post), 'result' => isset($response["id"])?$response["id"]:"", 'message_error' => isset($response["message"])?$response["message"]:""), "id = {$row->id}");
							break;
						}else{
							if($delete == 1){
								$this->db->delete(POSTS_TB, "id = {$row->id}");
							}else{
								$this->db->update(POSTS_TB,array("status" => 2, 'result' => isset($response["id"])?$response["id"]:"", 'message_error' => isset($response["message"])?$response["message"]:""), "id = {$row->id}");
							}
							break;
						}
					}
				}

				if($key+1 != count($result)){
					//sleep((int)$deplay);
				}
			}
		}
	}
	
}
