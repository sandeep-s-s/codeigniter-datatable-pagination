<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainModel extends CI_Model {

	public function getTotalRecords()
	{
		return $this->db->count_all('users');
	}


	public function getRecordCountOnInput($searchValue)
	{
		if(!empty($searchValue)){
          	$searchQuery = " (name like '%".$searchValue."%' or
                email like '%".$searchValue."%' or
                city like'%".$searchValue."%' ) ";
            $this->db->where($searchQuery);
      	}
      	$this->db->from('users');
      	$query = $this->db->get();
		return $query->num_rows();
	}



	public function getUserList($searchValue,$columnName,$sortOrder,$length,$start)
	{
		$this->db->select('*');
		if(!empty($searchValue)){
          	$searchQuery = " (name like '%".$searchValue."%' or
                email like '%".$searchValue."%' or
                city like'%".$searchValue."%' ) ";
            $this->db->where($searchQuery);
      	}
		$this->db->order_by($columnName, $sortOrder);
		$this->db->limit($length, $start);
		$query = $this->db->get('users');
		return $query->result();
	}

}

/* End of file MainModel.php */
/* Location: ./application/models/MainModel.php */