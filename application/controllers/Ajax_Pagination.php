<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_Pagination extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Common_Model');
		if(!$this->session->userdata('id'))
		{
			redirect('admin');
		}
	}

	public function index()
	{
		$this->load->view('user/dynamic/Ajax-pagination-view');
	}

	public function pagination()
	{
		$this->Common_Model->getPaginationRecord();
	}
}
