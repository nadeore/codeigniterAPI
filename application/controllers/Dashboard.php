<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
*Classname:dashboard.php
*projectname:sa4i
*Date created:October 14, 2017
*Created by:Hemant Jaiswal
*Purpose: This file/class will handle the user's dashboard  
*/

class Dashboard extends CI_Controller {

    /*Methodname:  __construct
    *Date created:October 14, 2017
	*Created by:Hemant Jaiswal
    *Purpose: Perform common action for class at load 
    *InputParams and Type: -
	*OutputParams and Type: -
	*/
	public function __construct(){
		parent::__construct();
		if( ! $this->session->userdata('user_id') || ($this->session->userdata('user_role') != 1 && $this->session->userdata('user_role') != 2))
			redirect('login', 'location');  
		// Expire the page on back button click
		$this->general->expire_page();
	}
    
	/*Methodname:  index
    *Date created:October 14, 2017
	*Created by:Hemant Jaiswal
    *Purpose: This function open the home page of site
    *InputParams and Type: -
	*OutputParams and Type: -
	*/
	public function index(){
		$data['page_title'] = 'Dashboard';
		$data['view'] = 'dashboard_view';
		$this->template->load_page($data);
	}
		
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
