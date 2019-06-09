<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
*Classname:login.php
*projectname:sa4i
*Date created:October 14, 2017
*Created by:Hemant Jaiswal
*Purpose: This file/class will handle admin login 
*/

class Login extends CI_Controller {

    /*Methodname:  __construct
    *Date created:October 14, 2017
	*Created by:Hemant Jaiswal
    *Purpose: Perform common action for class at load 
    *InputParams and Type: -
	*OutputParams and Type: -
	*/
	public function __construct(){
		parent::__construct();
		//load login model
		$this->load->model($this->config->item('admin_path').'login_model');
	}
    
	/*Methodname:  index
    *Date created:October 14, 2017
	*Created by:Hemant Jaiswal
    *Purpose: This function open the admin dashboard
    *InputParams and Type: -
	*OutputParams and Type: -
	*/
	public function index(){
		$this->in();	
	}
	
	/*Methodname:  in
    *Date created:October 14, 2017
	*Created by:Hemant Jaiswal
    *Purpose: This function perform login
    *InputParams and Type: -
	*OutputParams and Type: -
	*/
	public function in(){
		
		//if admin already loggedin
		if($this->session->userdata('admin_id'))
			redirect($this->config->item('admin_path').'machines', 'location');
			
		if($this->input->post('login')){
			
			$data['email'] = trim($this->input->post('email'));
			$data['password'] = trim($this->input->post('password'));
			
			$logged_in = $this->login_model->check($data);
			
			if ($logged_in){
				$admin_session = array(
					'admin_id' => $logged_in->id,
					'admin_email' => $logged_in->email,
					'admin_first_name' => $logged_in->first_name,
					'admin_last_name' => $logged_in->last_name
				);
				//update last login
				$update['last_login'] = date('Y-m-d H:i:s');
				$this->general_model->modify('tbl_users', 'id', $logged_in->id, $update);
				
				$this->session->set_userdata($admin_session);
				redirect($this->config->item('admin_path'), 'location');
			}else
				$this->_draw_form('Login info is not valid.');	
		}else
			$this->_draw_form();
	}
	
	/*Methodname:  _draw_form
    *Date created:October 14, 2017
	*Created by:Hemant Jaiswal
    *Purpose: This function open login form
    *InputParams and Type: $error:string
	*OutputParams and Type: -
	*/
	private function _draw_form($error = NULL)
	{
		$data['error'] = $error;
		$data['page_title'] = 'Login';
		$data['view'] = 'login_view';
		
		$this->template->base($data);
	}
	
	/*Methodname:  out
    *Date created:October 14, 2017
	*Created by:Hemant Jaiswal
    *Purpose: This function perform logout
    *InputParams and Type: -
	*OutputParams and Type: -
	*/
	public function out()
	{
		$admin_session = array(
			'admin_id' => FALSE,
			'admin_email' => FALSE,
			'admin_first_name' => FALSE,
			'admin_last_name' => FALSE
		);
		$this->session->set_userdata($admin_session);
		redirect($this->config->item('admin_path'), 'location');
	}
		
}

/* End of file login.php */
/* Location: ./application/controllers/admin/login.php */
