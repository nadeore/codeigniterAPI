<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * Classname:machines.php
 * projectname:sa4i
* Date created:January 14, 2018
 * Created by:Monika Kumari
 * Purpose: This file/class will handle the machines 
 */

class booklist extends CI_Controller {
    /* Methodname:  __construct
     * Date created:January 14, 2018
     * Created by:Monika Kumari
     * Purpose: Perform common action for class at load 
     * InputParams and Type: -
     * OutputParams and Type: -
     */

    
    public function __construct() {
        parent::__construct();
        $this->load->library('upload');
        if (!$this->session->userdata('user_id'))
            redirect('login', 'location');
        $this->general->expire_page();

        $this->load->model('machines_model');
    }
    
    public function index() {
        $data['page_title'] = 'Book Machines';
        $data['view'] = 'machines/booking_machine_list';
        $data['machines'] = $this->machines_model->get_bookinglist();
        $this->template->load_page1($data);
    }
    
    public function add() {
        if ($this->input->post('submit')) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('machine_name', 'Machine Name', 'required|trim');
            $this->form_validation->set_rules('start_date', 'Machine Type', 'required|trim');
            $this->form_validation->set_rules('end_date', 'Machine Code', 'required|trim');
            $this->form_validation->set_rules('comment', 'Machine Description', 'required|trim');
            if ($this->form_validation->run() == FALSE){
                $this->_drawAddForm();
            }
         else {
            $data = array(
                'id' => $this->input->post('id'),
                'machine_id' => $this->input->post('machine_name'),
                'booking_from' => $this->input->post('start_date'),
                'booking_to' => $this->input->post('end_date'),
                'user_type'=>3,
                'comment'=> $this->input->post('comment'),
                
            );
                $data['user_id'] = $this->session->userdata('user_id');
                $this->db->insert('tbl_booking',$data);
                $this->session->set_flashdata('add_success', 'machine details added successfully.');
                redirect('book_machine', 'location');
        }
        }
        else
            $this->_drawAddForm();
    }

    private function _drawAddForm() {
        $data['action'] = 'add';
        $data['page_title'] = 'Book Machine';
        $data['bookmachine'] = $this->machines_model->fetch_onlymachines();
        $data['view'] = 'machines/book_machine_view';
        $this->template->load_page1($data);
    }

    public function machine_cancel($id)
	{
//           $this->db->select('*');
//		$this->db->where('id', $id);
//		$query = $this->db->get('tbl_booking');
//		$res = $query->result_array();
//                $abc=$res[0]['machine_id'];
                 $data = array(
				'is_active' => 2,
			);
                 $data1 = array(
				'is_active' => 0,
			);
                $this->machines_model->cancel_by_id($id, $data,$data1);
		echo json_encode(array("status" => TRUE));
	}
        
        
        public function contMachineBook($id)
		{
			$data = $this->machines_model->details_by_id($id);
			echo json_encode($data);
		}
                
                
                public function bookmachine()
                {
                    $id=$this->input->post('book_id');
                    $data1 = array(
				'is_active' => 1,
			);
		$data = array(
                                'machine_id' => $this->input->post('book_id'),
//				'machine_name' => $this->input->post('machine_name'),
				'booking_from' => $this->input->post('start_date'),
				'booking_to' => $this->input->post('end_date'),
				'comment' => $this->input->post('comment'),
                                'is_active' => 1,
                     'user_type' => 3,
                                
			);
                $data['user_id'] = $this->session->userdata('user_id');
		$this->machines_model->book_insert($data,$data1,$id);
		echo json_encode(array("status" => TRUE));
                }
       
        
}

/* End of file machines.php  */
/* Location: ./application/controllers/admin/machines.php */