<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*Classname:template.php
*projectname:sa4i
*Date created:October 14, 2017
*Created by:Hemant Jaiswal
*Purpose: This file/class will handle the different type of templates of admin end
*/
class Template {

	var $CI;
	
	/*Methodname:  __construct
    *Date created:October 14, 2017
	*Created by:Hemant Jaiswal
    *Purpose: Perform common action for class at load 
    *InputParams and Type: -
	*OutputParams and Type: -
	*/
	public function __construct(){
		// Set the super object to a local variable for later use
		$this->CI = & get_instance();
	}

	/*Methodname:  base
    *Date created:October 14, 2017
	*Created by:Hemant Jaiswal
    *Purpose: Load the admin pages template
    *InputParams and Type: $data:array
	*OutputParams and Type: -
	*/
	public function base($data){
		//Need js
		$data['js'] = TRUE;
		//Need datepicker
		$data['datepicker_js'] = TRUE;
		//Need Colorbox
		$data['colorbox_js'] = TRUE;
		//Need Filter js
		$data['filter_js'] = TRUE;
		//Load header section
		$template['header'] = $this->CI->load->view($this->CI->config->item('admin_path').$this->CI->config->item('template_path').'header_view', $data, TRUE);
		//$template['header_bar'] = $this->CI->load->view($this->CI->config->item('admin_path').$this->CI->config->item('template_path').'header_bar_view', '', TRUE);
		//Load navigation
		//$template['navigator'] = $this->CI->load->view($this->CI->config->item('admin_path').$this->CI->config->item('template_path').'navigator_view', '', TRUE);
		//Load content section
		$template['main_content'] = $this->CI->load->view($this->CI->config->item('admin_path').$data['view'], $data, TRUE);

		//Load message section
		$template['toastr'] = $this->CI->load->view($this->CI->config->item('admin_path').$this->CI->config->item('template_path').'alert_view', '', TRUE);
		
		//Load footer section
		//$template['footer_bar'] = $this->CI->load->view($this->CI->config->item('admin_path').$this->CI->config->item('template_path').'footer_bar_view', '', TRUE);
		$template['footer'] = $this->CI->load->view($this->CI->config->item('admin_path').$this->CI->config->item('template_path').'footer_view', '', TRUE);
		//Load whole page
		$this->CI->load->view($this->CI->config->item('admin_path').'template_view', $template);
	}
	
	/*Methodname:  colorbox_page
    *Date created:October 14, 2017
	*Created by:Hemant Jaiswal
    *Purpose: Load the colorbox template
    *InputParams and Type: $data:array
	*OutputParams and Type: -
	*/
	public function colorbox_page($data){		
		//Not need js
		$data['js'] = FALSE;
		//Not datepicker
		$data['datepicker_js'] = FALSE;
		//Not Colorbox
		$data['colorbox_js'] = FALSE;
		//Not Filter js
		$data['filter_js'] = FALSE;
		//Load header section
		$template['header'] = $this->CI->load->view($this->CI->config->item('admin_path').$this->CI->config->item('template_path').'header_view', $data, TRUE);
		//Load content section
		$template['main_content'] = $this->CI->load->view($this->CI->config->item('admin_path').$data['view'], $data, TRUE);
		//Load message section
		$template['toastr'] = $this->CI->load->view($this->CI->config->item('admin_path').$this->CI->config->item('template_path').'alert_view', '', TRUE);
		//Load whole page
		$this->CI->load->view($this->CI->config->item('admin_path').'template_view', $template);
	}
	
	/*Methodname:  pdf_page
    *Date created:October 14, 2017
	*Created by:Hemant Jaiswal
    *Purpose: Load the pdf pages template 
    *InputParams and Type: $data:array
	*OutputParams and Type: -
	*/
	public function pdf_page($data){		
		//Not need js
		$data['js'] = FALSE;
		//Not datepicker
		$data['datepicker_js'] = FALSE;
		//Not Colorbox
		$data['colorbox_js'] = FALSE;
		//Not Filter js
		$data['filter_js'] = FALSE;
		//Load header section
		$template['header'] = $this->CI->load->view($this->CI->config->item('admin_path').$this->CI->config->item('template_path').'header_view', $data, TRUE);
		//Load content section
		$template['main_content'] = $this->CI->load->view($this->CI->config->item('admin_path').$data['view'], $data, TRUE);
		//Load message section
		$template['toastr'] = $this->CI->load->view($this->CI->config->item('admin_path').$this->CI->config->item('template_path').'alert_view', '', TRUE);
		
		//Load whole page
		return $this->CI->load->view($this->CI->config->item('admin_path').'template_view', $template, TRUE);
	}
}

/* End of file template.php */
/* Location: ./application/libraries/admin/template.php */
