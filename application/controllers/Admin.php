<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Common_Model');
		if($this->session->userdata('id'))
		{
			redirect('dashboard');
		}
	}
	
	public function index()
	{
		$this->load->view('admin-login-view');
	}

	public function doLogin() 
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Enter your name ', 'trim|required|alpha|min_length[4]
		', array('alpha'=>'Please enter only Alphabatic character only', 'min_length'=>'Please enter minimum 4 character' ));

		$this->form_validation->set_rules('password', 'Enter your name password', 'trim|required|min_length[4]
		', array('min_length'=>'Please enter minimum 4 digit'));

		if($this->form_validation->run()) 
		{
		
			$cols = '*';
			$con = array('name'=>$this->input->post('name'), 'password'=>$this->input->post('password'));

			// LOGIN name of table define in config folder (Constants.php)
			
			$chkLogin = $this->Common_Model->checkLogin(LOGIN, $cols, $con);
			if($chkLogin)
			{
			 	$session_data = ['id'=>$chkLogin->id,
				'name'=>$chkLogin->name,
				'email'=>$chkLogin->email,
				'role'=>$chkLogin->role,
				];
			$this->session->set_userdata($session_data);
			redirect('dashboard');
			} else {
						$this->session->set_flashdata('error', 'Invalid Username and Password');
						redirect('Admin/index');
					}
		} else {
				$this->index();
			  }

	}

	
}
