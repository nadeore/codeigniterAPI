<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*Classname:general.php
*projectname:SA4I
*Date created:October 16, 2017
*Created by:Hemant Jaiswal
*Purpose: Most commonly used functions that require in different controllers.
*/
class General {

	var $CI;
	
	/*Methodname:  __construct
    *Date created:October 16, 2017
    *Created by:Hemant Jaiswal
    *Purpose: Perform common action for class at load 
    *InputParams and Type: -
	*OutputParams and Type: -
	*/
	public function __construct(){
		// Set the super object to a local variable for use later
		$this->CI =& get_instance();
	}
	
	/*Methodname:  expire_page
    *Date created:October 16, 2017
    *Created by:Hemant Jaiswal
    *Purpose: When click on back button, not open previous page arter logout
    *InputParams and Type: -
	*OutputParams and Type: -
	*/
	public function expire_page(){
		$this->CI->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->CI->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->CI->output->set_header('Cache-Control: post-check=0, pre-check=0', FALSE);
		$this->CI->output->set_header('Pragma: no-cache');
	}
	
	/*Methodname:  email_template
    *Date created:October 16, 2017
    *Created by:Hemant Jaiswal
    *Purpose: Create mail template
    *InputParams and Type: $subject:string, $body:string
	*OutputParams and Type: $email:html
	*/
	public function email_template($head_msg="", $body=""){
                $email_header = '<table width="600" cellspacing="0" cellpadding="0" border="0" style="border-radius:6px!important;background-color:#fdfdfd;border:1px solid #dcdcdc;border-radius:6px!important">
                                    <tbody>
                                        <tr>
                                            <td valign="top" align="center">
                                                <table width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#000000" style="background-color:#000000;color:#ffffff;border-top-left-radius:6px!important;border-top-right-radius:6px!important;border-bottom:0;font-family:Arial;font-weight:bold;line-height:100%;vertical-align:middle">
                                                    <tbody>
                                                        <tr>
                                                            <td><p style="float:left;margin:0;padding:10px;width:100px"><img  alt="SA4I" src="'.$this->CI->config->item('base_url').$this->CI->config->item('images_path').'logo2.png"></p>
                                                            <h1 style="color:#ffffff;margin:0;padding:28px 24px;display:block;font-family:Arial;font-size:30px;font-weight:bold;text-align:left;line-height:150%">'.$head_msg.'</h1></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top" align="center">';
                $email_footer = '           </td>
                                        </tr>
                                        <tr>
                                            <td valign="top" align="center">
                                              <p style="border:0;color:#666666;font-family:Arial;font-size:12px;line-height:125%;text-align:center">Team Australia Wide Annexes</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>';
		return $email = $email_header.$body.$email_footer;
	}
	
	/*Methodname:  send_mail
    *Date created:October 16, 2017
    *Created by:Hemant Jaiswal
    *Purpose: Send mail
    *InputParams and Type: $to:string, $from_email:string, $from_name:string, $subject:string, $message:string
	*OutputParams and Type: -
	*/
	public function send_mail($to, $from_email, $from_name, $subject, $message, $cc='', $bcc='', $email_attachment='', $attachment_dir='email_attachment', $reply_to=''){
		$this->CI->load->library('email');
		$this->CI->email->mailtype = 'html';
		$this->CI->email->from($from_email, $from_name);
		$this->CI->email->to($to);
		if(!empty($cc))$this->CI->email->cc($cc);
        if(!empty($bcc))$this->CI->email->bcc($bcc);
        if(!empty($reply_to))$this->CI->email->reply_to($reply_to);
		$this->CI->email->subject($subject);
		$this->CI->email->message($message);
        if (!empty($email_attachment)){
            $email_attachment = explode(',', $email_attachment,-1);
            foreach($email_attachment as $attachment){
                $this->CI->email->attach(realpath(dirname(__FILE__) . '/../../') . '/uploads/'.$attachment_dir.'/' . $attachment);
            }
        }
		$this->CI->email->send();
        $this->CI->email->clear(TRUE);
	}
	
	/*Methodname:  admin_email
    *Date created:October 16, 2017
    *Created by:Hemant Jaiswal
    *Purpose: return admin email
    *InputParams and Type: 
	*OutputParams and Type: -
	*/
	public function admin_email(){
		return $this->CI->general_model->admin_email();
	}
}

/* End of file general.php */
/* Location: ./application/libraries/general.php */