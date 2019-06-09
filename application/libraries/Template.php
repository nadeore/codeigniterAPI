<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*Classname:template.php
*projectname:SA4I
*Date created:October 16, 2017
*Created by:Hemant Jaiswal
*Purpose: This file/class will handle the different type of templates of front end.
*/
class Template {

	var $CI;
	public $no_header_no_navigation = 0;
        
	/*Methodname:  __construct
    *Date created:October 16, 2017
	*Created by:Hemant Jaiswal
    *Purpose: Perform common action for class at load 
    *InputParams and Type: -
	*OutputParams and Type: -
	*/
	public function __construct(){
		// Set the super object to a local variable for later use
		$this->CI = & get_instance();
	}

	/*Methodname:  load_page
    *Date created:October 16, 2017
	*Created by:Hemant Jaiswal
    *Purpose: Load the pages template
    *InputParams and Type: $data:array
	*OutputParams and Type: -
	*/
	public function load_page($data){
        if(!isset($data['no_header_no_navigation']))
            $data['no_header_no_navigation'] = $this->no_header_no_navigation;
		//Load header section
		$template['header'] = $this->CI->load->view($this->CI->config->item('template_path').'header_view', $data, TRUE);
		//$template['header_bar'] = $this->CI->load->view($this->CI->config->item('template_path').'header_bar_view', '', TRUE);
		//Load navigation
		//$template['navigator'] = $this->CI->load->view($this->CI->config->item('template_path').'navigator_view', '', TRUE);
		//Load content section
		$template['main_content'] = $this->CI->load->view($data['view'], $data, TRUE);
		//Load message section
		$template['toastr'] = $this->CI->load->view($this->CI->config->item('template_path').'alert_view', '', TRUE);
		//Load footer section
		//$template['footer_bar'] = $this->CI->load->view($this->CI->config->item('template_path').'footer_bar_view', '', TRUE);
		$template['footer'] = $this->CI->load->view($this->CI->config->item('template_path').'footer_view', '', TRUE);
		//Load whole page
		$this->CI->load->view('template_view', $template);
	}
        
        public function load_page1($data){
        if(!isset($data['no_header_no_navigation']))
            $data['no_header_no_navigation'] = $this->no_header_no_navigation;
		//Load header section
		$template['header'] = $this->CI->load->view($this->CI->config->item('template_path').'header_view1', $data, TRUE);
		//$template['header_bar'] = $this->CI->load->view($this->CI->config->item('template_path').'header_bar_view', '', TRUE);
		//Load navigation
		//$template['navigator'] = $this->CI->load->view($this->CI->config->item('template_path').'navigator_view', '', TRUE);
		//Load content section
		$template['main_content'] = $this->CI->load->view($data['view'], $data, TRUE);
		//Load message section
		$template['toastr'] = $this->CI->load->view($this->CI->config->item('template_path').'alert_view', '', TRUE);
		//Load footer section
		//$template['footer_bar'] = $this->CI->load->view($this->CI->config->item('template_path').'footer_bar_view', '', TRUE);
		$template['footer'] = $this->CI->load->view($this->CI->config->item('template_path').'footer_view', '', TRUE);
		//Load whole page
		$this->CI->load->view('template_view', $template);
	}
	
	/*Methodname:  print_page
    *Date created:October 16, 2017
	*Created by:Hemant Jaiswal
    *Purpose: Load the print pages template
    *InputParams and Type: $data:array
	*OutputParams and Type: -
	*/
	public function print_page($data){		
		//Load header section
		$template['header'] = $this->CI->load->view($this->CI->config->item('template_path').'header_view', $data, TRUE);
		//Load content section
		$template['main_content'] = $this->CI->load->view($data['view'], $data, TRUE);
		//Load message section
		$template['toastr'] = $this->CI->load->view($this->CI->config->item('template_path').'alert_view', '', TRUE);
		$template['footer'] = $this->CI->load->view($this->CI->config->item('template_path').'footer_view', '', TRUE);
		//Load whole page
		$this->CI->load->view('template_view', $template);
	}
        
        public function print_page1($data){		
		//Load header section
		$template['header'] = $this->CI->load->view($this->CI->config->item('template_path').'header_view1', $data, TRUE);
		//Load content section
		$template['main_content'] = $this->CI->load->view($data['view'], $data, TRUE);
		//Load message section
		$template['toastr'] = $this->CI->load->view($this->CI->config->item('template_path').'alert_view', '', TRUE);
		$template['footer'] = $this->CI->load->view($this->CI->config->item('template_path').'footer_view', '', TRUE);
		//Load whole page
		$this->CI->load->view('template_view', $template);
	}
}

/* End of file template.php */
/* Location: ./application/libraries/template.php */
