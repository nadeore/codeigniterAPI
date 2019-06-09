<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus extends CI_Controller {

	
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
		$data['page_title'] = 'Contactus';
		$data['view'] = 'contactus_view';
		$this->template->load_page($data);
	}
        
  
      public function send_mail() {
         $this->load->library('email');
$config = array(
    
    //'mailpath' =>'/usr/sbin/sendmail',
    'protocol' => 'smtp',
    'smtp_host' => 'mail.leoinfotech.in',//mail.leoinfotech.in
    'smtp_port' => 25,
    'smtp_user' => 'demo@leoinfotech.in',
    'smtp_pass' => 'demo@123',
    'mailtype'  => 'html',
    'charset'   => 'utf-8'
);
$this->email->initialize($config);
$this->email->set_mailtype("html");
$this->email->set_newline("\r\n");
//$htmlContent .= '<p>This email has sent via SMTP server from CodeIgniter application.</p>';
 $cname = $this->input->post('cname'); 
 $cperson = $this->input->post('cperson'); 
 $email = $this->input->post('email'); 
 $mobile = $this->input->post('mobile'); 
 $street = $this->input->post('street'); 
 $zipcode = $this->input->post('zipcode'); 
 if (!empty($_POST))
{
 $message='Company Name:- '.$cname."<br>".'Contact Person:- '.$cperson."<br>".'Email Address:- '.$email."<br>".'Telephone No. :- '.$mobile."<br>".'Street With No.:- '.$street."<br>".'Zip code with city:- '.$zipcode;
$this->email->to('rob.elbl@gmail.com');
$this->email->from('demo@leoinfotech.in','Monika Kumari');
$this->email->subject('Contact Us');
$this->email->message($message);
$this->email->send();
         //Send mail 
//         if($this->email->send()) 
//         $this->session->set_flashdata("email_sent","Email sent successfully."); 
//         else 
//         $this->session->set_flashdata("email_sent","Error in sending Email."); 
//         $this->load->view('contactus_view'); 
$data['view'] = 'contactus_view';
$this->template->load_page($data);
}
      } 
}
