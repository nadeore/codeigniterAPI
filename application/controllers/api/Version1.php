<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
defined('BASEPATH') OR exit('No direct script access allowed');

class version1 extends CI_Controller {

	/*
 * Filename	: version1.php
 * projectname  : tattleup
 * Date created : September 07,2017
 * Created by   : Vishal Chaturvedi
 * Purpose      : This controller file will contain all the functions needed for api 
 */
	 
	public function __construct() {
        parent::__construct();
//         if(!authCheck($this->post('auth'))){
//            returnFailedResponse();
//            exit();
//         }
        // Expire the page on back button click
        $this->general->expire_page();

        $this->load->model('api/version1_model');
    }

	/*
     * Methodname:  index
     * Date created: March 24,2018
     * Created by   : MOnika Kumari
     * Purpose: This function will be used to check api 
     * InputParams and Type: none  
     * OutputParams and Type: none
    */
	 
	public function index()
	{
		echo "Testing";
	}
	public function log()
	{
		$this->load->view('admin/login');
	}
	
	/*
     * Methodname:  login
     * Date created: March 24,2018
     * Created by   : MOnika Kumari
     * Purpose: This function will be used to check api 
     * InputParams and Type: none  
     * OutputParams and Type: none
    */
	public function login(){
		//$this->output->enable_profiler(TRUE);
//            if ( $this->session->userdata('user_id') && ($this->session->userdata('user_role') == 3))
//            redirect('scan', 'location');
		if ($this->input->get_post('fbUserId') && $this->input->get_post('fbPassword')) {
			$ret = $this->version1_model->login($this->input->get_post('fbUserId'), $this->input->get_post('fbPassword'));
			if($ret){
				if($ret->phone){
					$isRigisterMobile = true;
				}else{
					$isRigisterMobile = false;
				}
				$userid = $ret->id;
				$response = array("status"=>true,"message"=>"Success","isRigisterMobile"=>$isRigisterMobile,"userList"=>$ret);
			}else{
				$response = array("status"=>false,"message"=>"Record not found");
			}
		}else{
			$response = array("status"=>false,"message"=>"Required parameter not found");
		}
		echo json_encode($response);
	}
	
	public function getMachineList(){
            if ($this->input->get_post('company_id')) {
            $ret = $this->version1_model->getMachineList($this->input->get_post('company_id'));
			if($ret){
				$response = array("status"=>true,"message"=>"Success","categoriesList"=>$ret);
			}else{
				$response = array("status"=>false,"message"=>"Record not found");
			}
		}else{
			$response = array("status"=>false,"message"=>"Required parameter not found");
		}
		echo json_encode($response);	
	}
        
        public function getbookmachine(){
            if ($this->input->get_post('user_id')) {
            $ret = $this->version1_model->getbookmachine($this->input->get_post('user_id'));
			if($ret){
				$response = array("status"=>true,"message"=>"Success","categoriesList"=>$ret);
			}else{
				$response = array("status"=>false,"message"=>"Record not found");
			}
		}else{
			$response = array("status"=>false,"message"=>"Required parameter not found");
		}
		echo json_encode($response);	
	}
        
        public function getWorker(){            
            if ($this->input->get_post('user_id')) {
            $ret = $this->version1_model->getWorker($this->input->get_post('user_id'));
			if($ret){
				$response = array("status"=>true,"message"=>"Success", "categoriesList"=>$ret);
			}else{
				$response = array("status"=>false,"message"=>"Record not found");
			}
		}else{
			$response = array("status"=>false,"message"=>"Required parameter not found");
		}
		echo json_encode($response);	
	}
        
             /*
     * Methodname:  BookMachine
     * Date created: March 24,2018
     * Created by   : MOnika Kumari
     * Purpose: This function will be used to check api 
     * InputParams and Type: none  
     * OutputParams and Type: none
    */
	
        
        public function BookMachine(){
		if ($this->input->get_post('user_id') || $this->input->get_post('machine_id') || $this->input->get_post('start_date') || $this->input->get_post('end_date') || $this->input->get_post('comment') ) {
                        $ret = $this->version1_model->BookMachine($this->input->get_post('user_id') ,$this->input->get_post('machine_id') , $this->input->get_post('start_date') , $this->input->get_post('end_date') , $this->input->get_post('comment'));
			if($ret){
				$response = array("status"=>true,"message"=>"Success");
			}else{
				$response = array("status"=>false,"message"=>"Record not saved");
			}
		}else{
			$response = array("status"=>false,"message"=>"Required parameter not found");
		}
		echo json_encode($response);
	}
        
        
        /*
     * Methodname:  getUserDetails
     * Date created: March 24,2018
     * Created by   : MOnika Kumari
     * Purpose: This function will be used to check api 
     * InputParams and Type: none  
     * OutputParams and Type: none
    */
         public function getUserDetails(){
            if ($this->input->get_post('userid')) {
            $ret = $this->version1_model->getUserDetails();
			if($ret){
				$response = array("status"=>true,"message"=>"Success","UserList"=>$ret);
			}else{
				$response = array("status"=>false,"message"=>"Record not found");
			}
		}else{
			$response = array("status"=>false,"message"=>"Required parameter not found");
		}
		echo json_encode($response);	
	}
       
        
//        public function Get_Qr_Data(){
//            if ($this->input->get_post('id') && $this->input->get_post('company_id')) {
//            $ret = $this->version1_model->get_by_id($this->input->get_post('id'), $this->input->get_post('company_id'));
//			if($ret){
//				$response = array("status"=>true,"message"=>"Success","UserList"=>$ret);
//			}else{
//				$response = array("status"=>false,"message"=>"Record not found");
//			}
//		}else{
//			$response = array("status"=>false,"message"=>"Required parameter not found");
//		}
//		echo json_encode($response);	
//	}
        
        public function Get_Qr_Data(){
            if (($company_id = $this->input->get_post('company_id')) && ($id = $this->input->get_post('id'))) {
            $ret = $this->version1_model->get_by_id($company_id, $id);
			if($ret){
				$response = array("status"=>true,"message"=>"Success","UserList"=>$ret);
			}else{
				$response = array("status"=>false,"message"=>"Record not found");
			}
		}else{
			$response = array("status"=>false,"message"=>"Required parameter not found");
		}
		echo json_encode($response);	
	}
        
        public function Get_Nfc_Data(){
            if (($nfc = $this->input->get_post('nfc'))) {
            $ret = $this->version1_model->get_nfc_data($nfc);
			if($ret){
				$response = array("status"=>true,"message"=>"Success","UserList"=>$ret);
			}else{
				$response = array("status"=>false,"message"=>"Record not found");
			}
		}else{
			$response = array("status"=>false,"message"=>"Required parameter not found");
		}
		echo json_encode($response);	
	}
        
        public function Get_machine_details(){
            if ($this->input->get_post('id')) {
            $ret = $this->version1_model->details_by_id($this->input->get_post('id'));
			if($ret){
				$response = array("status"=>true,"message"=>"Success","machinedetails"=>$ret);
			}else{
				$response = array("status"=>false,"message"=>"Record not found");
			}
		}else{
			$response = array("status"=>false,"message"=>"Required parameter not found");
		}
		echo json_encode($response);	
	}
          
                
               public function Get_worker_details($id)
		{
			$data = $this->version1_model->worker_details($id);
			echo json_encode($data);
		} 
                
                
                public function book_machine($userid)
                {
                   $id=$this->input->post('book_id');
                $this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('tbl_machines');
		$res = $query->result_array();
                $abc=$res[0]['company_id'];
		$data = array(
//                                'id' => $this->input->post('id'),
				'machine_id' => $this->input->post('book_id'),
                                'user_id' => $userid,
                                'user_type' => 4,
//                                'booking_date' => NOW(),
                                'booking_from' => $this->input->post('start_date'),
                                'booking_to' => $this->input->post('end_date'),
                                'is_active' => 1,
                                'comment' => $this->input->post('comment'),
			);
//                $data['user_id'] = $this->session->userdata('user_id');

		$this->version1_model->machine_book($data);
//                echo $data;
		echo json_encode(array("status" => TRUE));
                }
 
                public function getBookingList(){
		if ($this->input->get_post('user_id')) {
                        $ret = $this->version1_model->getBookingList($this->input->get_post('user_id'));
			if($ret){
				$response = array("status"=>true,"message"=>"Success","machineBookList"=>$ret);
			}else{
				$response = array("status"=>false,"message"=>"Record not saved");
			}
		}else{
			$response = array("status"=>false,"message"=>"Required parameter not found");
		}
		echo json_encode($response);
	}
        
        public function release_machine(){
		if ($this->input->get_post('machine_id') && $this->input->get_post('booking_id')) {
                        $ret = $this->version1_model->releasebook($this->input->get_post('machine_id'),$this->input->get_post('booking_id'));
			if($ret){
				$response = array("status"=>true,"message"=>"Success");
			}else{
				$response = array("status"=>false,"message"=>"Record not saved");
			}
		}else{
			$response = array("status"=>false,"message"=>"Required parameter not found");
		}
		echo json_encode($response);
	}
                
                
                
                
                
                 public function demo(){
                        $json = file_get_contents('php://input');
                     
                         $obj = json_decode($json);
                         
                          $ret = $this->version1_model->demo($obj);
			if($ret){
				$response = array("status"=>true,"message"=>"Success","list"=>$ret);
			}else{
				$response = array("status"=>false,"message"=>"Record not saved");
			}
		echo json_encode($response);
                }
        
        
        public function postExample(){
            
                 $json = file_get_contents('php://input');
                     //echo $json;
                   $obj = json_decode($json);
                   
                   echo $obj->{"username"};
                   
                   echo $obj->{"password"};
                       
            
        }
        
        
        
        
        
        
        
        public function chat(){
		if ($this->input->get_post('message')||$this->input->get_post('id')||$this->input->get_post('broser')||$this->input->get_post('version')||$this->input->get_post('os')||$this->input->get_post('ip')) {
                        $ret = $this->version1_model->chat($this->input->get_post('message'),$this->input->get_post('id'),$this->input->get_post('broser'), $this->input->get_post('version') ,$this->input->get_post('os'),$this->input->get_post('ip'));
			if($ret){
				$response = array("status"=>true,"message"=>"Success", "message"=>$ret);
			}else{
				$response = array("status"=>false,"message"=>"Record not saved");
			}
		}else{
			$response = array("status"=>false,"message"=>"Required parameter not found");
		}
		echo json_encode($response);
	}
        
        
        
         public function getchat(){
                        $ret = $this->version1_model->getchat();
			if($ret){
				$response = array("status"=>true,"message"=>"Success","chatList"=>$ret);
			}else{
				$response = array("status"=>false,"message"=>"Record not saved");
			}
		echo json_encode($response);
	}
        
        public function notification(){
                        $ret = $this->version1_model->notification();
			if($ret){
				$response = array("status"=>true,"message"=>"Success","chatList"=>$ret);
			}else{
				$response = array("status"=>false,"message"=>"Record not saved");
			}
		echo json_encode($response);
	}
        
         public function update_notification(){
                        $ret = $this->version1_model->update_notification();
			if($ret){
				$response = array("status"=>true,"message"=>"Success");
			}else{
				$response = array("status"=>false,"message"=>"Record not saved");
			}
		echo json_encode($response);
	}
        
        
        
        public function addmsg()
                {
            date_default_timezone_set('Asia/Kolkata');
		$data = array(
                    'name' =>'Monika Kumari',
                    'time' =>date('Y-m-d H:i:s'),
                    'message' => $this->input->post('msg'),
//                    'message' =>'hiiii',
			);
		$this->version1_model->addmsg($data);
		echo json_encode(array("status" => TRUE));
                }
                
                
                
        public function del(){
		if ($this->input->get_post('userid')) {
                        $ret = $this->version1_model->del($this->input->get_post('userid'));
			if($ret){
				$response = array("status"=>true,"message"=>"Success", "message"=>$ret);
			}else{
				$response = array("status"=>false,"message"=>"Record not saved");
			}
		}else{
			$response = array("status"=>false,"message"=>"Required parameter not found");
		}
		echo json_encode($response);
	}    
        
        
        
        public function uploadexcel(){
		$host = 'leoinfotech.in'; 
                $usr = 'pos@leoinfotech.in'; 
                $pwd = 'pos@leo1';         
                $local_file = 'http://sa4i.leoinfotech.in/uploads/Protokoll.pdf'; 
                $ftp_path = 'Protokoll.pdf'; 
                $conn_id = ftp_connect($host, 21) or die ("Cannot connect to host");      
                //ftp_pasv($resource, true); 
                ftp_login($conn_id, $usr, $pwd) or die("Cannot login"); 
                // perform file upload 
                ftp_chdir($conn_id, '/public_html/pos/'); 
                $upload = ftp_put($conn_id, $ftp_path, $local_file, FTP_ASCII); 
                if($upload) { $ftpsucc=1; } else { $ftpsucc=0; } 
                // check upload status: 
                print (!$upload) ? 'Cannot upload' : 'Upload complete'; 
                print "\n"; 
                // close the FTP stream 
                ftp_close($conn_id); 
	}    
}


