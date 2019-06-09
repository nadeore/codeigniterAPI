
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * Classname:machines.php
 * projectname:sa4i
 * Date created:October 26, 2017
 * Created by:Hemant Jaiswal
 * Purpose: This file/class will handle the machines 
 */

class Machines extends CI_Controller {
    /* Methodname:  __construct
     * Date created:October 26, 2017
     * Created by:Monika Kumari
     * Created by:
     * Purpose: Perform common action for class at load 
     * InputParams and Type: -
     * OutputParams and Type: -
     */

    
    public function __construct() {
        parent::__construct();

        // Expire the page on back button click
         //  $this->general->expire_page();

        //load machines model
        $this->load->model('machines_model');
    }
   
    
    public function index() {
        $data['page_title'] = 'Machines list';
        $data['view'] = 'machines/grid_view';
        $data['machines'] = $this->machines_model->fetch_machines();
        $this->template->load_page1($data);
    }
    
    
    public function create_qr() {
        $data['page_title'] = 'Machines Qr List';
        $data['view'] = 'machines/createQrView';  
        $data['machines'] = $this->machines_model->fetch_machines();
        $this->template->load_page1($data);
    }
    public function all_barcode() {
        $data['page_title'] = 'Machines Qr List';
        $data['view'] = 'machines/all_barcode_view';  
        $data['machines'] = $this->machines_model->fetch_all_barcode();
        $this->template->load_page1($data);
    }

    public function create_qr_id($id) {
//        echo $id;
        $data['page_title'] = 'Machines Qr List';
        $data['view'] = 'machines/createQrView';  
        $data['machines'] = $this->machines_model->fetch_qr($id);
        $this->template->load_page1($data);
    }
    
    public function create_barcode_id($id) {
//        echo $id;
        $data['page_title'] = 'Machines Barcode';
        $data['view'] = 'machines/barcode_view';  
        $data['barcode'] = $this->machines_model->fetch_barcode($id);
        $this->template->load_page1($data);
    }
   
   

    public function getMachineData(){
           if ($this->input->get_post('id')) {
            $ret = $this->machines_model->getMachineData($this->input->get_post('id'));
			if($ret){
				$response = array("status"=>true,"message"=>"Success",);
			}else{
				$response = array("status"=>false,"message"=>"Record not found");
			}
		}else{
			$response = array("status"=>false,"message"=>"Required parameter not found");
		}
		echo json_encode($response);	
	}
    function printQRCode($url, $size = 100) {
    return '<img src="http://chart.apis.google.com/chart?chs=' . $size . 'x' . $size . '&cht=qr&chl=' . urlencode($url) . '" />';
}

    public function add() {

        if ($this->input->post('submit')) {

            //Setting up validations
            $this->load->library('form_validation');
            $this->form_validation->set_rules('machine_name', 'Machine Name', 'required|trim');
            $this->form_validation->set_rules('machine_code', 'Inventory Code', 'required|trim');
            $this->form_validation->set_rules('serial_number', 'Serial Number', 'required|trim');
           
            if ($this->form_validation->run() == FALSE){
                
                $this->_drawAddForm();
            }
         
         else { if(!empty($_FILES['picture']['name'])){
             $imgFile = $_FILES['picture']['name'];
		$tmp_dir = $_FILES['picture']['tmp_name'];
		$imgSize = $_FILES['picture']['size'];
                $upload_dir = 'uploads/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			$picture = rand(1000,1000000).".".$imgExt;
				
			if(in_array($imgExt, $valid_extensions)){
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$picture);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
            }
            if(!empty($_FILES['picture1']['name'])){
               $imgFile = $_FILES['picture1']['name'];
		$tmp_dir = $_FILES['picture1']['tmp_name'];
		$imgSize = $_FILES['picture1']['size'];
                $upload_dir = 'uploads/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			$picture1 = rand(1000,1000000).".".$imgExt;
				
			if(in_array($imgExt, $valid_extensions)){
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$picture1);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
            }
            if(!empty($_FILES['picture2']['name'])){
                $imgFile = $_FILES['picture2']['name'];
		$tmp_dir = $_FILES['picture2']['tmp_name'];
		$imgSize = $_FILES['picture2']['size'];
                $upload_dir = 'uploads/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('pdf'); // valid extensions
		
			$picture2 = rand(1000,1000000).".".$imgExt;
				
			if(in_array($imgExt, $valid_extensions)){
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$picture2);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
            }
            $temp = rand(10000, 99999);
            $bar = rand(10000, 99999);
            $id = $this->input->post('id');
            $machine_name = $this->input->post('machine_name');
            $result = substr($machine_name, 0, 3);
            $company =$this->session->userdata('user_id');
            $aaa=$temp.'_'.$result.'_'.$company;
            $barcode=$bar.'-'.$result.'-'.$company;
            $data = array(
                'id' => $this->input->post('id'),
                'machine_name' => $this->input->post('machine_name'),
                'machine_type' => $this->input->post('machine_type'),
                'machine_code' => $this->input->post('machine_code'),
                'machine_description' => $this->input->post('machine_description'),
                'location' => $this->input->post('location'),
                'brand_name' => $this->input->post('brand_name'),
                'serial_number' => $this->input->post('serial_number'),
                'date_of_proof' => $this->input->post('date_of_proof'),
                'date_of_buy' => $this->input->post('date_of_buy'),
                'price' => $this->input->post('price'),
                'next_check' => $this->input->post('next_check'),
                'inventory_number' => $this->input->post('inventory_number'),
                'qr_code' => $aaa,
                'bar_code'=>$barcode,
                'is_active' =>1,
            );
                $data['company_id'] = $this->session->userdata('user_id');
               
                $this->db->insert('tbl_machines',$data);
                
                $imagedata = array(
                 'machine_id' => $this->db->insert_id(),
                    'url' => $picture,
                    'description' => $picture1,
                    'title'=>$picture2,
            );
                //insert into table 2
                $this->db->insert('tbl_machine_images',$imagedata);
                
                
                 $config = Array(
                'protocol' => 'smtp',
    'smtp_host' => 'ssl://smtp.googlemail.com',//mail.leoinfotech.in
    'smtp_port' => 465,
    'smtp_user' => 'demo@leoinfotech.in',
    'smtp_pass' => 'demo@123',
    'mailtype'  => 'html',
    'charset'   => 'utf-8',
                'wordwrap' => TRUE);
       $message = '<html>
               <head>
                  <title></title>
               </head>
               <body>
               <p>QR code is here,you can scan it.</p>
                 <img src="http://chart.apis.google.com/chart?chs=250x250&cht=qr&chld=L|1&chl=' . $aaa . '" />
               </body>
             </html>';
//     $message='Hello';          
       $this->load->library('email', $config);
     $this->email->set_newline("\r\n");
     $this->email->from('demo@leoinfotech.in'); // change it to yours
     $this->email->to('monika.leoinfotech@gmail.com');// change it to yours
     $this->email->subject('QR Code of Machine');
     $this->email->message ($message);
     $this->email->send();

                $this->session->set_flashdata('add_success', 'machine details added successfully.');
                redirect('machines', 'location');
              
        }
        }
        else
            $this->_drawAddForm();
    }

   
    private function _drawAddForm() {

        $data = $this->_getFormValues();

        $data['action'] = 'add';
        $data['page_title'] = 'Machine details';
        $data['view'] = 'machines/detail_view';
        $this->template->load_page1($data);
    }

   
    private function _getFormValues() {
        if ($this->input->post('id', TRUE))
        $data['id'] = $this->input->post('id', TRUE);
        $data['machine_name'] = $this->input->post('machine_name', TRUE);
        $data['machine_type'] = $this->input->post('machine_type', TRUE);
        $data['machine_code'] = $this->input->post('machine_code', TRUE);
        $data['machine_description'] = $this->input->post('machine_description', TRUE);
        $data['inventory_number'] = $this->input->post('inventory_number', TRUE);
        $data['location'] = $this->input->post('location', TRUE);
        $data['brand_name'] = $this->input->post('brand_name', TRUE);
        $data['serial_number'] = $this->input->post('serial_number', TRUE);
        $data['date_of_proof'] = $this->input->post('date_of_proof', TRUE);
        $data['date_of_buy'] = $this->input->post('date_of_buy', TRUE);
        $data['price'] = $this->input->post('price', TRUE);
       
        return $data;
    }
   

  
    public function delete() {
        $id = $this->uri->segment(4);
        $this->general_model->delete(TBL_machines, 'show_id', $id);
        redirect('machines/', 'location');
    }
    
    public function machine_delete($id)
	{
        $data = array(
                    'isdeleted' => 1,
                );
                $this->machines_model->delete_by_id($id, $data);
		echo json_encode(array("status" => TRUE));
	}
        
        public function nfc_request($id)
	{
            $data = array(
                'is_nfc' => 1,
                );
                $this->machines_model->nfc_create($id, $data);
		echo json_encode(array("status" => TRUE));
	}
        
        
        public function ajax_edit($id)
	{
		$data = $this->machines_model->get_by_id($id);
		echo json_encode($data);
	}
                
	public function book_update()
        {
            $id=$this->input->post('book_id');
           if(!empty($_FILES['picture4']['name'])){
                $config['upload_path'] = 'uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['picture4']['name'];
                $config['max_size'] = '2000000';
                $config['remove_spaces'] = true;
                $config['overwrite'] = false;
                $config['max_width'] = '';
                $config['max_height'] = '';
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
             
                if($this->upload->do_upload('picture4')){
                    $uploadData = $this->upload->data();
                    $picture1 = $uploadData['file_name'];
                }
            }
            if(!empty($_FILES['picture5']['name'])){
                $config['upload_path'] = 'uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['picture5']['name'];
                 $config['max_size'] = '2000000';
                $config['remove_spaces'] = true;
                $config['overwrite'] = false;
                $config['max_width'] = '';
                $config['max_height'] = '';
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
             
                if($this->upload->do_upload('picture5')){
                    $uploadData = $this->upload->data();
                    $picture2 = $uploadData['file_name'];
                }
            }
            if(!empty($_FILES['picture6']['name'])){
                $config['upload_path'] = 'uploads/';
                $config['allowed_types'] = 'pdf';
                $config['file_name'] = $_FILES['picture6']['name'];
                 $config['max_size'] = '2000000';
                $config['remove_spaces'] = true;
                $config['overwrite'] = false;
                $config['max_width'] = '';
                $config['max_height'] = '';
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
             
                if($this->upload->do_upload('picture6')){
                    $uploadData = $this->upload->data();
                    $picture3 = $uploadData['file_name'];
                }
            }
                $data = array(
                    'machine_name' => $this->input->post('mname'),
                    'machine_description' => $this->input->post('mdesc'),
                    'machine_type' => $this->input->post('mtype'),
                    'machine_code' => $this->input->post('mcode'),
                    'inventory_number' => $this->input->post('inventory'),
                    'location' => $this->input->post('location'),
                    'brand_name' => $this->input->post('brand'),
                    'serial_number' => $this->input->post('serial'),
                    'date_of_proof' => $this->input->post('proof'),
                    'next_check' => $this->input->post('check'),
                    'date_of_buy' => $this->input->post('buy'),
                    'price' => $this->input->post('price'),
                    'is_active' => $this->input->post('active'),
                );
               $imagedata = array(
                   'machine_id'=>$id,
                    'url' => $picture1,
                    'description' => $picture2,
                    'title'=>$picture3,
            );
               $this->machines_model->machine_update($id, $data,$imagedata);
               echo json_encode(array("status" => TRUE));
        }
                
        public function getCategories(){
            $ret = $this->machines_model->getCategories();
			if($ret){
				$response = array("status"=>true,"message"=>"Success","categoriesList"=>$ret);
			}else{
				$response = array("status"=>false,"message"=>"Record not found");
			}
		echo json_encode($response);	
	}
        
        
        public function machine_update()
        {
            $id=$this->input->post('book_id');
           
        if ($this->input->post('submit')) {
         if(!empty($_FILES['picture4']['name'])){
                $config['upload_path'] = 'uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['picture4']['name'];
                $config['max_size'] = '2000000';
                $config['remove_spaces'] = true;
                $config['overwrite'] = false;
                $config['max_width'] = '';
                $config['max_height'] = '';
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
             
                if($this->upload->do_upload('picture4')){
                    $uploadData = $this->upload->data();
                    $picture1 = $uploadData['file_name'];
                }
            }
            if(!empty($_FILES['picture5']['name'])){
                $config['upload_path'] = 'uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['picture5']['name'];
                 $config['max_size'] = '2000000';
                $config['remove_spaces'] = true;
                $config['overwrite'] = false;
                $config['max_width'] = '';
                $config['max_height'] = '';
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
             
                if($this->upload->do_upload('picture5')){
                    $uploadData = $this->upload->data();
                    $picture2 = $uploadData['file_name'];
                }
            }
            if(!empty($_FILES['picture6']['name'])){
                $config['upload_path'] = 'uploads/';
                $config['allowed_types'] = 'pdf';
                $config['file_name'] = $_FILES['picture6']['name'];
                 $config['max_size'] = '2000000';
                $config['remove_spaces'] = true;
                $config['overwrite'] = false;
                $config['max_width'] = '';
                $config['max_height'] = '';
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
             
                if($this->upload->do_upload('picture6')){
                    $uploadData = $this->upload->data();
                    $picture3 = $uploadData['file_name'];
                }
            }
                $data = array(
                    'machine_name' => $this->input->post('mname'),
                    'machine_description' => $this->input->post('mdesc'),
                    'machine_type' => $this->input->post('mtype'),
                    'machine_code' => $this->input->post('mcode'),
                    'inventory_number' => $this->input->post('inventory'),
                    'location' => $this->input->post('location'),
                    'brand_name' => $this->input->post('brand'),
                    'serial_number' => $this->input->post('serial'),
                    'date_of_proof' => $this->input->post('proof'),
                    'next_check' => $this->input->post('check'),
                    'date_of_buy' => $this->input->post('buy'),
                    'price' => $this->input->post('price'),
                    'is_active' => $this->input->post('active'),
                );
               $imagedata = array(
//                   'machine_id'=>$id,
                    'url' => $picture1,
                    'description' => $picture2,
                    'title'=>$picture3,
            );
               $this->machines_model->machine_update($id, $data,$imagedata);
               echo json_encode(array("status" => TRUE));
        }
        }
        
        
        public function machine_edit($id) {
//        echo $id;
        $data['action'] = 'update';
        $data['page_title'] = 'Update Machines';
        $data['view'] = 'machines/editmachine';  
        $data['mdetails'] = $this->machines_model->get_by_id($id);
        $this->template->load_page1($data);
    }
    
    
    
     public function update() {
         
          $id=$this->input->post('id');
          
           $this->db->select('url,description,title');
            $this->db->from('tbl_machine_images');
            $this->db->where('machine_id',$id );
            $query1 = $this->db->get();
            $res = $query1->row();
            $url=$res->url;
            $description=$res->description;
            $title=$res->title;
            
            
        if ($this->input->post('submit')) {
		$imgFile = $_FILES['picture']['name'];
		$tmp_dir = $_FILES['picture']['tmp_name'];
		$imgSize = $_FILES['picture']['size'];
					
		if($imgFile)
		{
			$upload_dir = 'uploads/'; // upload directory	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
			$picture1 = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 5000000)
				{
					unlink($upload_dir.$url);
					move_uploaded_file($tmp_dir,$upload_dir.$picture1);
				}
				else
				{
					$errMSG = "Sorry, your file is too large it should be less then 5MB";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}	
		}
                else
		{
			// if no image selected the old image remain as it is.
			$picture1 = $url; // old image from database
		}
                $imgFile1 = $_FILES['picture1']['name'];
		$tmp_dir1 = $_FILES['picture1']['tmp_name'];
		$imgSize1 = $_FILES['picture1']['size'];
					
		if($imgFile1)
		{
			$upload_dir1 = 'uploads/'; // upload directory	
			$imgExt1 = strtolower(pathinfo($imgFile1,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions1 = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
			$picture2 = rand(1000,1000000).".".$imgExt1;
			if(in_array($imgExt1, $valid_extensions1))
			{			
				if($imgSize1 < 5000000)
				{
					unlink($upload_dir1.$description);
					move_uploaded_file($tmp_dir1,$upload_dir1.$picture2);
				}
				else
				{
					$errMSG = "Sorry, your file is too large it should be less then 5MB";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}	
		}
                else
		{
			// if no image selected the old image remain as it is.
			$picture2 = $description; // old image from database
		}
                $imgFile2 = $_FILES['picture2']['name'];
		$tmp_dir2 = $_FILES['picture2']['tmp_name'];
		$imgSize2 = $_FILES['picture2']['size'];
					
		if($imgFile2)
		{
			$upload_dir2= 'uploads/'; // upload directory	
			$imgExt2 = strtolower(pathinfo($imgFile2,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions2 = array('pdf'); // valid extensions
			$picture3 = rand(1000,1000000).".".$imgExt2;
			if(in_array($imgExt2, $valid_extensions2))
			{			
				if($imgSize2 < 5000000)
				{
					unlink($upload_dir2.$title);
					move_uploaded_file($tmp_dir2,$upload_dir2.$picture3);
				}
				else
				{
					$errMSG = "Sorry, your file is too large it should be less then 5MB";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}	
		}
                else
		{
			// if no image selected the old image remain as it is.
			$picture3 = $title; // old image from database
		}
               $data = array(
                'id' => $this->input->post('id'),
                'machine_name' => $this->input->post('machine_name'),
                'machine_type' => $this->input->post('machine_type'),
                'machine_code' => $this->input->post('machine_code'),
                'machine_description' => $this->input->post('machine_description'),
                'location' => $this->input->post('location'),
                'brand_name' => $this->input->post('brand_name'),
                'serial_number' => $this->input->post('serial_number'),
                'date_of_proof' => $this->input->post('date_of_proof'),
                'date_of_buy' => $this->input->post('date_of_buy'),
                'price' => $this->input->post('price'),
                'next_check' => $this->input->post('next_check'),
                'inventory_number' => $this->input->post('inventory_number'),
            );
               $imagedata = array(
//                   'machine_id'=>$id,
                    'url' => $picture1,
                    'description' => $picture2,
                    'title'=>$picture3,
            );
               $this->machines_model->machine_update($id, $data,$imagedata);
          redirect('machines', 'location');
    }
        
    }
}

/* End of file machines.php  */
/* Location: ./application/controllers/admin/machines.php */