<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Groups extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
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

		$this->template->title(l('slug-manage-groups'),TITLE);
		$this->template->build('index', $data);
	}

	public function update(){
		$id = (int)get("id");
		$getListGroups = $this->model->fetch("*", LIST_GROUPS_TB, "uid = '".session("uid")."'");
		$item = $this->model->get("*", LIST_GROUPS_TB, "uid = '".session("uid")."' AND id = '".$id."'");

		$select_groups = array();
		$all_groups    = array();
		if(!empty($getListGroups)){
			foreach ($getListGroups as $row) {
				$groups = json_decode($row->groups);
				if(!empty($groups)){
					if($id == $row->id){
						$select_groups = $groups;
					}else{
						$all_groups = array_merge($all_groups, $groups);
					}
				}
			}
		}

		$result = $this->model->fetch("*", GROUPS_TB, "uid = '".session("uid")."'");
		if(!empty($all_groups)){	
			$result = $this->model->fetch("*", GROUPS_TB, "uid = '".session("uid")."' AND id NOT IN (".implode(",", $all_groups).")");
		}

		$data = array(
			"item"  => $item, 
			"groups" => $select_groups,
			"result" => $result
		);
		$this->template->title(l('slug-manage-groups'),TITLE);
		$this->template->build('update', $data);
	}

	public function ajax_update(){
		if(post('name') == ""){
    		$json= array(
				'st' 	=> 'error',
				'txt' 	=> l('slug-name-is-required')
			);
    		print_r(json_encode($json));
    		exit(0);
    	}

    	if(!post('list_groups')){
    		$json= array(
				'st' 	=> 'error',
				'txt' 	=> l('slug-select-at-least-one-groups')
			);
    		print_r(json_encode($json));
    		exit(0);
    	}

    	$data = array(
    		"name"    => post("name"),
    		"groups"  => json_encode(post('list_groups')),
    		"uid"     => session("uid"),
    		"changed" => NOW,
    	);

    	$check = $this->model->get("*", LIST_GROUPS_TB, "id = '".post("id")."' AND uid = '".session("uid")."'");
    	if(empty($check)){
			$data["created"] = NOW;
			$this->db->insert(LIST_GROUPS_TB,$data);
		}else{
			$this->db->update(LIST_GROUPS_TB,$data,"id = '".post("id")."'");
		}

		$json= array(
			'st' 	=> 'success',
			'txt' 	=> l('slug-successfully')
		);

		print_r(json_encode($json));
	}

	public function postDelete(){
		$id = (int)post('id');
		$POST = $this->model->get('*', LIST_GROUPS_TB, "id = '{$id}'");
		if(!empty($POST)){
			$this->db->delete(LIST_GROUPS_TB, "id = '{$id}'");
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
				$POST = $this->model->get('*', LIST_GROUPS_TB, "id = '{$id}'");
				if(!empty($POST)){
					$this->db->delete(LIST_GROUPS_TB, "id = '{$id}'");
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
				$POST = $this->model->get('*', LIST_GROUPS_TB, "id = '{$id}'");
				if(!empty($POST)){
					$this->db->update(LIST_GROUPS_TB,array("status" => $status), "id = '{$id}'");
				}
			}
		}
		print_r(json_encode(array(
			'st' 	=> 'success',
			'txt' 	=> l('slug-successfully')
		)));
	}

}
