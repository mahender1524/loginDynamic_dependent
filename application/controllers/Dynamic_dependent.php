<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dynamic_dependent extends CI_Controller 
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
		$cols = '*'; 
		$data['country'] = $this->Common_Model->fetch_countery(COUNTERY,$cols);
		//echo '<pre>'; print_r($data['country']); die;
		 $this->load->view('user/dynamic/dynamic-dependent-view', $data);
	}

	public function fetch_state()
	{
		$contery_id = $this->input->post('country_id');
		$con  = array('contery_id'=>$contery_id);
		$cols = '*';
		echo    $this->Common_Model->fetch_state(STATE,$cols, $con);
		//echo '<pre>'; print_r($data['states']); die;
	}

	public function fetch_city() 
	{
		$state_id = $this->input->post('state_id');
		$con  = array('state_id'=>$state_id);
		$cols = '*';
		echo   $this->Common_Model->fetch_city(CITY,$cols, $con);
	}

}