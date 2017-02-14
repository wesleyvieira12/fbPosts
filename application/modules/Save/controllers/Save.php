<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Save extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		$this->template->set_layout("admin");
	}

	public function index(){
		$page_size      = 25;
        $page_num       = (get('p')) ? get('p') : 1;
        $total_row      = $this->model->getList(-1,-1);
        $start_row      = (get('p'))?$page_num:0;

        $config['base_url'] = PATH."save"."?";
        $config['total_rows'] = $total_row;
        $config['per_page'] = 25;
        $config['query_string_segment'] = 'p';
        $config['page_query_string'] = TRUE;
        $this->pagination->initialize($config);

		$data= array(
			'result' => $this->model->getList($page_size, $start_row)
		);

		$this->template->title(l('slug-save-post'),TITLE);
		$this->template->build('index', $data);
	}

	public function ajax_post(){
		$json = array();

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

		if(!empty($json)){
			$json["st"] = "error";
		}else{
			if(post('title') == ""){
				$json["st"] = "title";
			}else{
				$data["name"]    = filter_input_xss(post('title'));
				$data["uid"]     = (int)session("uid");
				$data["created"] = NOW;
				$this->db->insert(SAVE_TB, $data);
				$json[] = array(
					"type"   => "post_message",
					"text"   => l('slug-saved'),
					"st"     => "success"
				);
			}
		}

		print_r(json_encode($json));
	}

	public function get_post(){
		$check = $this->model->get("*", SAVE_TB, "id = '".post("value")."' AND uid = '".session("uid")."'");
		print_r(json_encode($check));
	}

	public function postDelete(){
		$id = (int)post('id');
		$POST = $this->model->get('*', SAVE_TB, "id = '{$id}'");
		if(!empty($POST)){
			$this->db->delete(SAVE_TB, "id = '{$id}'");
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
				$POST = $this->model->get('*', SAVE_TB, "id = '{$id}'");
				if(!empty($POST)){
					$this->db->delete(SAVE_TB, "id = '{$id}'");
				}
			}
		}
		print_r(json_encode(array(
			'st' 	=> 'success',
			'txt' 	=> l('slug-successfully')
		)));
	}
}
