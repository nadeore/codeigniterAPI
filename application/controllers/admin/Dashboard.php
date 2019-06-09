<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
*Classname:dashboard.php
*projectname:australiawide
*Date created:November 12,2013
*Created by:Rajnish Katiyar
*Purpose: This file/class will handle the admin's dashboard 
*/

class Dashboard extends CI_Controller {

        /*Methodname:  __construct
        *Date created:November 12,2013
        *Created by:Rajnish Katiyar
        *Purpose: Perform common action for class at load 
        *InputParams and Type: -
	*OutputParams and Type: -
	*/
	public function __construct(){
		
		parent::__construct();   
	        if( ! $this->session->userdata('admin_id'))
			redirect($this->config->item('admin_path').'login', 'location');  
		// Expire the page on back button click
		$this->general->expire_page();
		
		//load dashboard model
		$this->load->model($this->config->item('admin_path').'dashboard_model');
	}
    
	/*Methodname:  index
        *Date created:November 12,2013
        *Created by:Rajnish Katiyar
        *Purpose: This function open the admin dashboard
        *InputParams and Type: -
	*OutputParams and Type: -
	*/
	public function index(){
		$data['page_title'] = 'Dashboard';
		$data['view'] = 'dashboard_view';
		/*$data['total_users'] = $this->dashboard_model->get_total_users();
        $data['total_dealers'] = $this->dashboard_model->get_total_dealers();
        $data['total_agents'] = $this->dashboard_model->get_total_agents();
		$data['total_dealer_orders'] = $this->dashboard_model->get_total_dealer_orders();
        $data['total_agent_orders'] = $this->dashboard_model->get_total_agent_orders();
		$data['recent_dealer_orders'] = $this->dashboard_model->get_recent_dealer_orders();
        $data['recent_agent_orders'] = $this->dashboard_model->get_recent_agent_orders();
        $data['recent_agent_exdates'] = $this->dashboard_model->get_exdate_agents();
        $data['recent_dealer_exdates'] = $this->dashboard_model->get_exdate_dealers();*/
		$this->template->base($data);
	}
	
	
	/*Methodname:  profileView
        *Date created:November 14,2013
        *Created by:Rajnish Katiyar
        *Purpose: Show the admin profile details
        *InputParams and Type: -
	*OutputParams and Type: -
	*/
	function profileView() {
		
		$data = $this->general_model->get_single_row_by_id('tbl_users', 'id', $this->session->userdata('admin_id'), 'array');
		if($data == FALSE)
			redirect($this->config->item('admin_path').'dashboard/', 'location');
				
		$data['page_title'] = 'Profile details';
		$data['view'] = 'profile/profile_view';
		$this->template->base($data);	
	}
	
	/*Methodname:  profileModify
        *Date created:November 14,2013
        *Created by:Rajnish Katiyar
        *Purpose: This function will modify admin detail
        *InputParams and Type: -
	*OutputParams and Type: -
	*/
	public function profileModify() {
		
		if ($this->input->post('submit')) {
			
			//Setting up validations
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('first_name','First name','required|trim|max_length[100]');
			$this->form_validation->set_rules('last_name','Last name','required|trim|max_length[100]');
			$this->form_validation->set_rules('username','Username','required|trim|min_length[5]|max_length[30]|callback__usernameCheck');
			$this->form_validation->set_rules('email','E-mail','required|trim|valid_email|max_length[100]|callback__emailCheck');
			$this->form_validation->set_rules('password', 'Password', 'min_length[5]|trim|max_length[16]|md5');		
			$this->form_validation->set_rules('c_password','Confirm password','min_length[5]|trim|max_length[16]|matches[password]');
			$this->form_validation->set_rules('phone','Phone','trim|max_length[10]|numeric');
			$this->form_validation->set_rules('address','Address','trim|max_length[225]');
			
			if ($this->form_validation->run() == FALSE)
				$this->_drawprofileForm();
			else {	
				$data = $this->_getFormValues();
				unset($data['c_password']);
				$this->general_model->modify('tbl_users', 'id', $this->session->userdata('admin_id'), $data);
				
				//update admin session
				$admin_session = array(
							'admin_email' => $data['email'],
							'admin_username' => $data['username'],
							'admin_first_name' => $data['first_name'],
							'admin_last_name' => $data['last_name']
						);
				$this->session->set_userdata($admin_session);
				
				
				$this->session->set_flashdata('edit_success', 'Profile edited successfully.');
				redirect($this->config->item('admin_path').'dashboard/profileModify/', 'location');
			}
		} 
		else 
			 $this->_drawprofileForm();
	}
	
		
	/*Methodname:  _drawprofileForm
        *Date created:November 14,2013
        *Created by:Rajnish Katiyar
        *Purpose: Function to draw the update profile details form 
        *InputParams and Type: -
	*OutputParams and Type: -
	*/
	private function _drawprofileForm() {
		if ($this->input->post('submit'))
			$data=$this->_getFormValues();
		else{
			$id = $this->session->userdata('admin_id');
			if ( ! $id) redirect($this->config->item('admin_path').'dashboard/', 'location');
			$data = $this->general_model->get_single_row_by_id('tbl_users', 'id', $id, 'array');
			if($data== FALSE)
				redirect($this->config->item('admin_path').'members/', 'location');
			
		}
				
		$data['page_title'] = 'Profile details';
		$data['view'] = 'profile/detail_view';
		$this->template->base($data);				
	}
	
	/*Methodname:  _getFormValues
        *Date created:November 14,2013
        *Created by:Rajnish Katiyar
        *Purpose: Get the profile form values
        *InputParams and Type: -
	*OutputParams and Type: $data:array
	*/
	private function _getFormValues() {
		
		$data['first_name'] = $this->input->post('first_name', TRUE);
		$data['last_name'] = $this->input->post('last_name', TRUE);
		$data['username'] = $this->input->post('username', TRUE);
		$data['email'] = $this->input->post('email');
		
		if($this->input->post('password', TRUE)) 
			$data['password'] = $this->input->post('password', TRUE);
		if($this->input->post('c_password', TRUE)) 
			$data['c_password'] = $this->input->post('c_password', TRUE);
		
		$data['phone'] = $this->input->post('phone', TRUE);
		$data['address'] = $this->input->post('address', TRUE);
			
		return $data;
	}
	
	/*Methodname:  _usernameCheck
        *Date created:November 14,2013
        *Created by:Rajnish Katiyar
        *Purpose: Function to check unique username apart from current 
        *InputParams and Type: -
	*OutputParams and Type: bool
	*/
	function _usernameCheck(){
		$result = $this->general_model->username_check($this->input->post('username', TRUE), $this->session->userdata('admin_id'));
		if ($result){
			$this->form_validation->set_message('_usernameCheck', 'The Username field must contain a unique value.');
			return FALSE;
		}
		else
			return TRUE;
	}
	
	/*Methodname:  _emailCheck
        *Date created:November 14,2013
        *Created by:Rajnish Katiyar
        *Purpose: Function to check unique email apart from current 
        *InputParams and Type: -
	*OutputParams and Type: bool
	*/
	function _emailCheck(){
		$result = $this->general_model->email_check($this->input->post('email', TRUE), $this->session->userdata('admin_id'));
		if ($result > 0){
			$this->form_validation->set_message('_emailCheck', 'The E-mail field must contain a unique value.');
			return FALSE;
		}
		else
			return TRUE;
	}	
}

/* End of file dashboard.php */
/* Location: ./application/controllers/admin/dashboard.php */
