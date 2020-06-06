<?php

Class Common_Model extends CI_Model {
	 
	// login
	public function checkLogin($tbl,  $cols,$con) 
	{
		$this->db->select($cols);
		$this->db->where($con);
		$this->db->from($tbl);
		$q = $this->db->get();
		//print_r($this->db->last_Query());die;
		return $q->num_rows()?$q->row():'';
	} 

	public function insert_Row($tbl, $cols) 
	{
		$this->db->insert($tbl,$cols);
		return  $this->db->insert_id();
	}

	public function get_count($tbl) 
	{
		return $this->db->count_all($tbl);
	}

	public function getAllRows($tbl, $cols, $con='', $limit, $start) 
	{
		$this->db->select($cols);
		$this->db->from($tbl);
		if($con !='')
		{ 
			$this->db->where($con);
		}
		$this->db->limit($limit, $start);
		$q = $this->db->get();
		return $q->result();
	}

	public function deleteRow($tbl, $con)
	{
		$this->db->where($con);
		return $this->db->delete($tbl);
	}

	public function getSingleRow($tbl, $cols, $con)
	{
		$this->db->select($cols);
		$this->db->from($tbl);
		$this->db->where($con);
		$q = $this->db->get();
		return $q->row();
	}

	public function  fetch_countery($tbl, $cols)
	{
		$this->db->select($cols);
		$this->db->from($tbl);
		
		$q = $this->db->get();
		//print_r($this->db->last_Query());die;
		return $q->result();
	}

	
	public function  fetch_state($tbl, $cols, $con)
	{
		$this->db->select($cols);
		$this->db->from($tbl);
		$this->db->where($con);
		$result = $this->db->get();
		$output = '<option value="">Select State</option>';
			foreach ($result->result() as $row) 
			{
				$output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
			}
			return $output;
	}

	public function  fetch_city($tbl, $cols, $con)
	{
		$this->db->select($cols);
		$this->db->from($tbl);
		$this->db->where($con);
		$result = $this->db->get();
		$output = '<option value="">Select State</option>';
			foreach ($result->result() as $row) 
			{
				$output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
			}
			return $output;
	}

}
