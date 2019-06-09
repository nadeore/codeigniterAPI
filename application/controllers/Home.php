<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	/*Methodname:  __construct
    *Date created:October 16, 2017
	*Created by:Hemant Jaiswal
    *Purpose: Perform common action for class at load 
    *InputParams and Type: -
	*OutputParams and Type: -
	*/
	public function __construct(){
		parent::__construct();
		if( ! $this->session->userdata('user_id') || ($this->session->userdata('user_role') != 3))
			redirect('login', 'location');  
		// Expire the page on back button click
		$this->general->expire_page();
	}


	/*Methodname:  index
    *Date created:October 16, 2017
	*Created by:Hemant Jaiswal
    *Purpose: This function open the home page of site
    *InputParams and Type: -
	*OutputParams and Type: -
	*/
	public function index(){
		//echo phpinfo();
		$data['page_title'] = 'Home';
		$data['view'] = 'home_view';
		$this->template->load_page($data);
	}
}
