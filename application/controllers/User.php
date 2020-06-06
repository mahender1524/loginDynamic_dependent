<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
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
		$this->load->view('user/add-user');
	}

	public function insert() 
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_user.email]');
		if($this->form_validation->run()) 
		{
			$data = array(
			'name'=>$this->input->post('name'),
			'email'=>$this->input->post('email'),
			'is_active'=>$this->input->post('is_active'),
			'created_at'=>date('Y-m-d H:i:s'),
			'created_by' => $this->session->userdata('id')
			);
			//echo '<pre>'; print_r($data);die;
			$insert_id = $this->Common_Model->insert_Row(USER,$data);
			if($insert_id) 
			{ 
				$this->session->set_flashdata('success', 'Added successfully!');
				redirect('user/index');
			}else
			{
				$this->session->set_flashdata('error', 'Something went wrong!');
				redirect('user/index');
			}
		}else
		{
			$this->index();
		}
	}


	public function view()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url('user/view');
		$config['total_rows'] = $this->Common_Model->get_count(USER);
		$config['per_page'] = 2;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["links"] = $this->pagination->create_links();
		$data['group']= $this->Common_Model->getAllRows(USER, '*','', $config["per_page"], $page);
		$this->load->view('user/user-list', $data);
	}

	public function delete($id) 
	{
		$con = array('id' => $id);
		$response = $this->Common_Model->deleteRow(USER, $con);
		if($response)
		{
			$this->session->set_flashdata('success', 'Deleted successfully!');
			redirect('user/view');
		}else
		{
			$this->session->set_flashdata('error', 'Something went wrong!');
			redirect('user/view');
		}
	}

	public function edit($id)
	{
		$con = array('id'=>$id);
		$cols = '*';
		$data['record'] = $this->Common_Model->getSingleRow(USER,$cols, $con);
		//echo '<pre>'; print_r($data['record']);die;
		$this->load->view('user/edit-user', $data);
	}
}
