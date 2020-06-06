<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Common_Model');

		if(!$this->session->userdata('id'))
		{
			redirect('admin');
		}
	}
	
	public function index()
	{
		$this->load->view('dashboard');
	}

	public function logout()
	{
		$this->session->unset_userdata('id');
		redirect('Admin');
	}

	
}
