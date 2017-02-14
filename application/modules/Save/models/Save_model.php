<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Save_model extends MY_Model {
	public function __construct(){
		parent::__construct();
	}

	function getList($limit=-1, $page=-1){
		if($limit == -1){
			$this->db->select('count(*) as sum');
		}else{
			$this->db->select('*');
		}
		
		$this->db->from(SAVE_TB);

		$this->db->where("uid = '".session("uid")."'");

		if($limit != -1) {
			$this->db->limit($limit,$page);
		}
		$this->db->order_by('created','desc');
		$query = $this->db->get();

		if($query->result()){
			if($limit == -1){
				return $query->row()->sum;
			}else{
				return $query->result();
			}
		}else{
			return false;
		}
	}
}
