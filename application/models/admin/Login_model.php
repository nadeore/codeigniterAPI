<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*Classname:login_model.php
*projectname:sa4i
*Date created:October 14, 2017
*Created by:Hemant Jaiswal
*Purpose: Login related database functions
*/
class Login_model extends CI_Model {
	
	/*Methodname:  __construct
	*Date created:October 14, 2017
    *Created by:Hemant Jaiswal
	*Purpose: Perform common action for class at load 
	*InputParams and Type: -
	*OutputParams and Type: -
	*/
	 public function __construct(){
		// Call the Model constructor
		parent::__construct();
	}
	
	/*Methodname:  check
	*Date created:October 14, 2017
    *Created by:Hemant Jaiswal
	*Purpose: Check login credentials
	*InputParams and Type: $data:array
	*OutputParams and Type: bool, array
	*/
	public function check($data){
		$this->db->where('email', trim($this->input->post('email')));
		$this->db->where('password', trim($this->input->post('password')));
		$this->db->where('user_role', 1); //administrator = 1
		$result = $this->db->get('tbl_users');
		if ($result->num_rows() > 0 )
			return $result->row();
		else
			return FALSE;
	}
	
}

/* End of file login_model.php */
/* Location: ./application/models/admin/login_model.php */