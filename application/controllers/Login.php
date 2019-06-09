<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
*Classname:login.php
*projectname:sa4i
*Date created:October 14, 2017
*Created by:Hemant Jaiswal
*Purpose: This file/class will handle user login 
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
		$this->load->model('login_model');
	}
    
	/*Methodname:  index
    *Date created:October 14, 2017
	*Created by:Hemant Jaiswal
    *Purpose: This function open the company login
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
            
            
           
		
		//if user already loggedin
//		if ( $this->session->userdata('user_id') && ($this->session->userdata('user_role') == 3))
//            redirect('home', 'location');
//			
		if($this->input->post('login')){
							
			$data['email'] = 'leo@gmail.com';
			$data['password'] = '0f759dd1ea6c4c76cedc299039ca4f23';
//			print_r($data);
//                        exit();
                        
			$logged_in = $this->login_model->check($data);
			
			if ($logged_in){	
				
				if($logged_in->verified == 1){
					$company_session = array(
							'user_id' => $logged_in->id,
							'email' => $logged_in->email,
							'first_name' => $logged_in->first_name,
							'last_name' => $logged_in->last_name,
							'user_role' => $logged_in->user_role
						);
					//update last login
					$update['last_login'] = date('Y-m-d H:i:s');
					$this->general_model->modify('tbl_users', 'id', $logged_in->id, $update);
				
					$this->session->set_userdata($company_session);
					redirect('machines', 'location');
				}else{
					$this->session->set_flashdata('error', 'Your account is not verified.');
					redirect('login', 'location');
				}
			}else
				$this->_drawForm('Login info is not valid.');	
		}else
			$this->_drawForm();
	}
	
	/*Methodname:  _drawForm
    *Date created:October 14, 2017
	*Created by:Hemant Jaiswal
    *Purpose: This function open login form
    *InputParams and Type: $error:string
	*OutputParams and Type: -
	*/
	private function _drawForm($error = NULL){
				
		$data['error'] = $error;
		$data['page_title'] = 'Login';
		$data['view'] = 'login_view';
						
		$this->template->load_page($data);
	}
	
	/*Methodname:  out
    *Date created:October 14, 2017
	*Created by:Hemant Jaiswal
    *Purpose: This function perform logout
    *InputParams and Type: -
	*OutputParams and Type: -
	*/
	public function out(){
		$company_session = array(
			'user_id' => FALSE,
            'email' => FALSE,
            'first_name' => FALSE,
            'last_name' => FALSE,
            'user_role' => FALSE
		);
		
		$this->session->set_userdata($company_session);
		redirect('', 'location');
	}
	
	
	/*Methodname:  forgot
    *Date created:October 14, 2017
	*Created by:Hemant Jaiswal
    *Purpose: This function will send change password link member
    *InputParams and Type: -
	*OutputParams and Type: -
	*/
	public function forgot(){
		
		//if user already loggedin
		if ( $this->session->userdata('user_id') && ($this->session->userdata('user_role') == 3))
			redirect('home', 'location');
			
		if($this->input->post('reset')){
			//Setting up validations
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email','email','required|trim|valid_email|max_length[100]|callback__emailCheck');
			if ($this->form_validation->run() == FALSE){
				$data['page_title'] = 'Login';
				$data['view'] = 'login_view';
				$this->template->load_page($data);	
			}else{
				$email = $this->input->post('email', TRUE);
				$data = $this->general_model->get_single_row_by_id('tbl_users', 'email', $email, 'array');
							   
				//create mail template 
				$user_email = $this->general->email_template($user_subject, $user_message);
                                
                $data['body_hade_msg'] = 'Please click the below link to create new password ';
                $user_subject = "[SA4I] Forgot password - ".date($this->config->item('date_format'));
                $head_text = 'Forgot password';        

                $user_message = $this->load->view('maillogin_view', $data, TRUE);

                //create mail template 
                $user_email = $this->general->email_template($head_text, $user_message); 
                                
				// send mail to user
				$this->general->send_mail($data['email'], $this->general->admin_email(), $this->config->item('site_name'), $user_subject, $user_email);
				$this->session->set_flashdata('pass_reset', 'Reset password link has been sent to mail.');
				redirect('login/forgot');
			}
		}else{
			$data['page_title'] = 'Login';
			$data['view'] = 'login_view';
			$this->template->load_page($data);
		}
			
	}
	
	/*Methodname:  forgotPassword
    *Date created:October 14, 2017
	*Created by:Hemant Jaiswal
    *Purpose: This function will change the create new password
    *InputParams and Type: -
	*OutputParams and Type: -
	*/
	public function forgotPassword(){
		
		//if user already loggedin
		if ( $this->session->userdata('user_id') && ($this->session->userdata('user_role') == 3))
			redirect('home', 'location');
			
		if($this->input->post('changepass')){
			//Setting up validations
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('new_pass','New password','required|trim|min_length[5]|max_length[16]|md5');
			$this->form_validation->set_rules('c_new_pass','Confirm new password','required|trim|min_length[5]|max_length[16]|matches[new_pass]');
						
			if ($this->form_validation->run() == FALSE){ 
				$data['page_title'] = 'Forgot password';
				$data['view'] = 'profile/changepass_view';
				$this->template->load_page($data);
			}
			else {	 
				$data['password'] = $this->input->post('new_pass', TRUE);
				$this->general_model->modify('tbl_users', 'act_key', $this->uri->segment(3), $data);
				$this->session->set_flashdata('reset_pass', 'Password reset successfully.');
				redirect('login/forgotPassword/'.$this->uri->segment(3), 'location');
			}
		}else{
			$data['page_title'] = 'Forgot password';
			$data['view'] = 'profile/changepass_view';
			$result = $this->general_model->get_single_row_by_id('tbl_users', 'act_key', $this->uri->segment(3));
			if(!$result)
				redirect('home', 'location');
			
			$this->template->load_page($data);
		}
			
	}
	
	/*Methodname:  _emailCheck
    *Date created:October 14, 2017
	*Created by:Hemant Jaiswal
    *Purpose: Function to check if email exists in the database for forgot password
    *InputParams and Type: -
	*OutputParams and Type: bool
	*/
	function _emailCheck(){
		
		$result = $this->general_model->get_single_row_by_id('tbl_users', 'email', $this->input->post('email', TRUE));
		if ($result)
			return TRUE;
		else{
			$this->form_validation->set_message('_emailCheck', 'This email does not exist in our system.');
			return FALSE;
		}
			
		
	}
		
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
