<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*Classname:machines_model.php
*projectname:sa4i
*Date created:October 26, 2017
*Created by:Hemant Jaiswal
*Purpose: machines related database functions
*/
class Machines_model extends CI_Model {
	var $table = 'tbl_machines';
	/*Methodname:  __construct
	*projectname:sa4i
	*Date created:October 26, 2017
	*Purpose: Perform common action for class at load 
	*InputParams and Type: -
	*OutputParams and Type: -
	*/
	 public function __construct(){
		// Call the Model constructor
		parent::__construct();
	}
	
	/*Methodname:  fetch_machines
	*Date created:October 26, 2017
	*Created by:Hemant Jaiswal
	*Purpose: fetch all machines
	*InputParams and Type: $limit:int, $start:int, $search_field:string, $search_txt:string
	*OutputParams and Type: array,bool
	*/
	public function fetch_machines($params = "", $page = "all", $count=false) {

            $this->db->select('id, company_id, machine_name, machine_description, machine_type, machine_code, is_booked, inventory_number, location, brand_name, serial_number, date_of_proof, next_check, date_of_buy, price,isdeleted,qr_code,bar_code,nfc_code,is_active,is_nfc');

            $this->db->from('tbl_machines');
            $this->db->where('company_id', $this->session->userdata('user_id'));
             $this->db->where("isdeleted='0'");
            $this->db->order_by("id", "desc");

            $result = $this->db->get();
            if ($result->num_rows() > 0)
                return $result->result();
            return FALSE;
        }
        
        public function fetch_all_barcode($params = "", $page = "all", $count=false) {

            $this->db->select('id, company_id, machine_name, machine_description, machine_type, machine_code, is_booked, inventory_number, location, brand_name, serial_number, date_of_proof, next_check, date_of_buy, price,isdeleted,qr_code,bar_code,nfc_code,is_active,is_nfc');

            $this->db->from('tbl_machines');
            $this->db->where('company_id', $this->session->userdata('user_id'));
             $this->db->where("isdeleted='0'");
            $this->db->order_by("id", "desc");

            $result = $this->db->get();
            //echo $this->db->last_query();//die;
            if ($result->num_rows() > 0)
                return $result->result();
            return FALSE;
        }
    
    public function fetch_qr($id) {
        
        $this->db->select('*');
        $this->db->from('tbl_machines');
        $this->db->where('company_id', $this->session->userdata('user_id'));
        $this->db->where('id', $id);
         $this->db->where("isdeleted='0'");
        $this->db->order_by("id", "desc");

        $result = $this->db->get();
        if ($result->num_rows() > 0)
            return $result->result();
        
        return FALSE;
    }
    
    public function fetch_barcode($id){
        
        $this->db->select('*');
        $this->db->from('tbl_machines');
        $this->db->where('company_id', $this->session->userdata('user_id'));
        $this->db->where('id', $id);
         $this->db->where("isdeleted='0'");
        $this->db->order_by("id", "desc");

        $result = $this->db->get();
        //echo $this->db->last_query();//die;
        if ($result->num_rows() > 0)
            return $result->result();
//        print_r($result);
        echo $result;
        return FALSE;
    
    }
    
    public function fetch_bookmachines($params = "", $page = "all", $count=false) {
          $this->db->select('*');
          $this->db->from('tbl_machines ');
          $this->db->where('company_id', $this->session->userdata('user_id'));
          $this->db->where("isdeleted='0'");
          $this->db->where("is_active='1'");
          $result = $this->db->get();
        if ($result->num_rows() > 0)
            return $result->result();
        return FALSE;
    }
    
     public function get_bookinglist($params = "", $page = "all", $count=false) {
                $this->db->select(' b.id,b.user_id, a.machine_name, a.machine_description, a.machine_type, a.machine_code,  a.inventory_number,b.comment,b.is_booked,b.booking_from,b.booking_to');
                $this->db->from('tbl_machines AS a');
                $this->db->join('tbl_booking AS b', 'b.machine_id = a.id' , 'left');
//                $this->db->where("b.is_booked!='0'");
                $this->db->where('company_id', $this->session->userdata('user_id'));
//                $this->db->where("isdeleted='0'");
        $result = $this->db->get();
        if ($result->num_rows() > 0)
            return $result->result();
        return FALSE;
    }
    
    
    public function fetch_onlymachines($params = "", $page = "all", $count=false) {
                $this->db->select('*');
                $this->db->from('tbl_machines');
                $this->db->where("isdeleted='0'");

        $result = $this->db->get();
        if ($result->num_rows() > 0)
            return $result->result_array();
        
        return FALSE;
    }
    
    public function delete_by_id($id, $data)
	{
                $this->db->where('id', $id);
		$this->db->update($this->table, $data);
	}
        
        public function nfc_create($id, $data)
	{
                $this->db->where('id', $id);
		$this->db->update($this->table, $data);
	}
        
         public function cancel_by_id($id, $data,$data1)
	{
                $this->db->where('id', $id);
		$this->db->update($this->table, $data1);
             
                $this->db->where('machine_id', $id);
		$this->db->update('tbl_booking', $data);
	}
        
        public function get_by_id($id)
	{
            $this->db->select('a.id, a.company_id, a.machine_name, a.machine_description, a.machine_type, a.machine_code, a.is_active, a.inventory_number, a.location, a.brand_name, a.serial_number, a.date_of_proof, a.next_check, a.date_of_buy, a.price,isdeleted,b.url,b.title,b.description,a.created_at,a.qr_code,bar_code');
            $this->db->from('tbl_machines AS a');
            $this->db->join('tbl_machine_images AS b', 'b.machine_id = a.id');
            $this->db->where('a.id',$id);
            $query = $this->db->get();
            return $query->row();       
	}
        
        
        public function details_by_id($id)
	{
                $this->db->select('*');
                $this->db->from('tbl_machines ');
                $this->db->where('id',$id);
                $query = $this->db->get();
		return $query->row();
	}
                
 public function machine_update($id,$data,$imagedata)
	{
     
          $this->db->where('id',$id);
          $this->db->update($this->table, $data);
          
          $this->db->where('machine_id',$id);
          $this->db->update('tbl_machine_images', $imagedata);
	}
        
        public function book_insert($data,$data1,$id)
	{
            $this->db->where('id',$id);
            $this->db->update($this->table, $data1);
            $this->db->insert('tbl_booking', $data);
	}
        
        public function get_comp_name($company)
	{
            $this->db->select('company_name');
            $this->db->from('tbl_companies');
            $this->db->where('company_id',$company);
            $query = $this->db->get();
            return $query->row();
	}
        
        
        public function getCategories ()
        {
//		$this->db->select('*');
            $this->db->select('a.id, b.user_id,a.company_id, a.machine_name, a.machine_description, a.machine_type, a.machine_code,  a.inventory_number,a.isdeleted, a.location, a.brand_name, a.serial_number, a.date_of_proof, a.next_check, a.date_of_buy, a.price,isdeleted,b.comment,b.is_active,a.created_at,a.qr_code');
            $this->db->from('tbl_machines AS a');
            $this->db->join('tbl_booking AS b', 'b.machine_id = a.id' , 'left');
            $this->db->where("a.isdeleted='0'");
            $this->db->order_by("b.id", "desc");
//                $query = "SELECT a.id, a.company_id, a.machine_name, a.machine_description, a.machine_type, a.machine_code, a.inventory_number,a.isdeleted, a.location, a.brand_name, b.comment,b.is_active fROM tbl_machines AS a left JOIN tbl_booking AS b ON a.id = b.machine_id where a.isdeleted='0' ORDER BY b.Id DESC";
            $query = $this->db->get();
            $res = $query->result_array();
            if($res){
                    return $res;
            }else{
                    return false;
            }
	}
}

/* End of file machines_model.php */
/* Location: ./application/models/admin/machines_model.php */