<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('MainModel');
	}

	public function index()
	{
		$this->load->view('data-table');
	}

	public function userList()
	{
		if ($this->input->post() && $this->input->is_ajax_request()) {
			
			$draw = $this->input->post('draw');
			$start = $this->input->post('start');
			$length = $this->input->post('length');
			$columnIndex = $this->input->post('order')[0]['column'];
			$columnName = $this->input->post('columns')[$columnIndex]['data'];
			$sortOrder =  $this->input->post('order')[0]['dir'];
			$searchValue = $this->input->post('search')['value'];
			$totalRecordcount = $this->MainModel->getTotalRecords();
			$recordCount = $this->MainModel->getRecordCountOnInput($searchValue);
			$result = $this->MainModel->getUserList($searchValue,$columnName,$sortOrder,$length,$start);
			
			$data = array();
		    foreach($result as $record ){
		         
				$data[] = array(
				  "name"=>$record->name,
				  "email"=>$record->email,
				  "gender"=>$record->gender,
				  "salary"=>$record->salary,
				  "city"=>$record->city
				);
		    }
		    // json response 
			$response = array(
			  "draw" => intval($draw),
			  "iTotalRecords" => $totalRecordcount,
			  "iTotalDisplayRecords" => $recordCount,
			  "aaData" => $data
			);
		    echo json_encode($response);
		} else{
			echo "Bad request <a href=".base_url().">  Home  </a> &#9971;";
		}
	}	
}
