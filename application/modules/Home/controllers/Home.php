<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		$this->template->set_layout("admin");
	}

	public function index(){
		$result = $this->model->fetch("*", FACEBOOK_TB, "status = 1 AND uid = '".session("uid")."'");
		$list_profile = $this->model->fetch("*", FACEBOOK_TB, "uid = '".session("uid")."'");
		$getListGroups = $this->model->fetch("*", LIST_GROUPS_TB, "uid = '".session("uid")."'");

		if(!empty($result)){
			foreach ($result as $key => $row) {
				$APP = $this->model->fetch("*", APP_TB, "cid = '".$row->id."' AND status = 1");
				if(!empty($APP)){
					foreach ($APP as $item) {
						$check = GET_GROUPS_PAGES($item->fid, $item->access_token, "page");
						if(!$check){
							$this->db->update(APP_TB, array("status" => 0), "id = '".$item->id."'");
						}else{
							$fid = $item->fid;
							$token = $item->access_token;

							$groups   = $this->model->fetch("*",GROUPS_TB, "fid = '".$row->id."'");
							$pages = GET_GROUPS_PAGES($fid,  $token, "accounts");

							$result[$key]->groups = $groups;
							$result[$key]->pages  = $pages;
							break;
						}
					}
				}
			}
		}

		$data = array(
			"all_profiles" => $list_profile,
			'profiles'     => $result,
			'list_groups'  => $getListGroups,
			'save_post'    => $this->model->fetch("*", SAVE_TB, "uid = '".session("uid")."'", "created", "desc"),
			'ultimo_post'    => $this->model->fetch("*", POSTS_TB, "uid = '".session("uid")."'", "created", "desc")
		);
		$this->template->title(TITLE);
		$this->template->build('index', $data);
	}

	public function setLang(){
		$list_lang = scandir(APPPATH."../language/");
		unset($list_lang[0]);
		unset($list_lang[1]);
		$data_lang = array();
		$data_lang = array();
		foreach ($list_lang as $lang) {
			$arr_lang = explode(".", $lang);
			if(count($arr_lang) == 2 && strlen($arr_lang[0]) == 2 && $arr_lang[1] == "xml"){
				if($arr_lang[0] == post('lang')){
					set_session("lang", post('lang'));				
				}
			}
		}
	}
}
