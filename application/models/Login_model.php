<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*Classname:login_model.php
*projectname:SA4I
*Date created:October 16, 2017
*Created by:Hemant Jaiswal
*Purpose: Login related database functions
*/
class Login_model extends CI_Model {
	
	/*Methodname:  __construct
	*Date created:October 16, 2017
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
	*Date created:October 16, 2017
	*Created by:Hemant Jaiswal
	*Purpose: Check user login credentials
	*InputParams and Type: $data:array
	*OutputParams and Type: bool, array
	*/
	public function check($data){ 
		$this->db->where('email', 'leo@gmail.com');
		//$this->db->where('password', md5(trim($this->input->post('password'))));
		$this->db->where('password', '0f759dd1ea6c4c76cedc299039ca4f23');
		$this->db->where('verified', 1);
		$this->db->where('is_active', 1);
		$this->db->where('user_role', 3); //user = company
                $result = $this->db->get('tbl_users');
                
		if ($result->num_rows() > 0 )
			return $result->row();
		else
			return FALSE;
	}
        
	
	/*Methodname:  userrole
	*Date created:October 16, 2017
	*Created by:Hemant Jaiswal
	*Purpose: Get user roles
	*InputParams and Type: -
	*OutputParams and Type: array
	*/
	public function userrole(){
		
		$this->db->select('id, name, role'); 
		$this->db->where('role !=', 1); //user = admin
		
		$result = $this->db->get('tbl_user_role');
		if ($result->num_rows() > 0 )
			return $result->result();
		else
			return FALSE;	
	}
}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */