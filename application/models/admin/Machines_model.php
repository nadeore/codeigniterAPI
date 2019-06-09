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

        $this->db->select('a.id, a.company_id, machine_name, machine_description, machine_type, machine_code, a.is_active, inventory_number, location, brand_name, serial_number, date_of_proof, next_check, date_of_buy,bar_code,qr_code,nfc_code, price,company_name');
        $this->db->from('tbl_machines as a');
        $this->db->join('tbl_companies AS b', 'b.company_id = a.company_id');
        $this->db->where("a.isdeleted='0'");
        $this->db->order_by("a.id", "desc");
        $result = $this->db->get();
        if ($result->num_rows() > 0)
            return $result->result();
        
        return FALSE;
    }
    
     public function get_by_id($id)
	{
                $this->db->select('a.id, a.company_id, a.machine_name, a.machine_description, a.machine_type, a.machine_code, a.is_active, a.inventory_number, a.location, a.brand_name, a.serial_number, a.date_of_proof, a.next_check, a.date_of_buy, a.price,isdeleted,b.url,b.title,b.description,a.created_at,a.qr_code,bar_code,nfc_code');
                $this->db->from('tbl_machines AS a');
                $this->db->join('tbl_machine_images AS b', 'b.machine_id = a.id');
                $this->db->where('a.id',$id);
                $this->db->order_by('a.id', 'asc');
                $query = $this->db->get();
		return $query->row();
	}
        
        public function b_update($id, $data)
	{
                $this->db->where('id',$id);
		return $this->db->update('tbl_machines', $data);
	}
        
        public function qrcode($id, $data)
	{
            $this->db->where('id', $id);
		$this->db->update($this->table, $data);
	}
        
        public function barcode($id, $data)
	{
            $this->db->where('id', $id);
		$this->db->update($this->table, $data);
	}
        
        public function delete_by_id($id, $data)
	{
                $this->db->where('id', $id);
		$this->db->update($this->table, $data);
	}
        
        
        public function fetch_companies($params = "", $page = "all", $count=false) {
        $this->db->select('u.email,u.password,  u.is_active, c.company_name, c.owner_name, c.registration_no,c.id,c.company_id');

        $this->db->from('tbl_users as u');
        $this->db->join('tbl_companies as c', 'u.id = c.company_id', 'left');
        $this->db->where('u.user_role', 3);
        $this->db->where("isdeleted='0'");
        $this->db->order_by("u.id", "desc");
        $result = $this->db->get();
        if ($result->num_rows() > 0)
            return $result->result();
        
        return FALSE;
    }
    public function Qr_machines($params = "", $page = "all", $count=false) {

        $this->db->select('qr_code,machine_name');
        $this->db->from('tbl_machines ');
        $this->db->where("isdeleted='0'");
        $result = $this->db->get();
            return $result->result();
        
        return FALSE;
    }
    public function Qr_machines_byid($id) {
        $this->db->select('qr_code,machine_name');
        $this->db->from('tbl_machines ');
        $this->db->where("isdeleted='0'");
        $this->db->where('id', $id);
        $result = $this->db->get();
        if ($result->num_rows() > 0)
            return $result->result();
        
        return FALSE;
    }
    
    public function fetch_nfc($params = "", $page = "all", $count=false) 
      {
        $this->db->select('a.id, a.company_id, machine_name, machine_description, machine_type, machine_code, a.is_active, inventory_number, location, brand_name, serial_number, date_of_proof, next_check, date_of_buy,bar_code,qr_code,nfc_code, price,company_name');
        $this->db->from('tbl_machines as a');
        $this->db->join('tbl_companies AS b', 'b.company_id = a.company_id');
        $this->db->where("a.isdeleted='0'");
        $this->db->where("a.is_nfc='1'");
        $this->db->order_by("a.id", "desc");
        $result = $this->db->get();
        if ($result->num_rows() > 0)
            return $result->result();
        return FALSE;
    }
    
    public function create_nfc($id)
	{
            $this->db->select('a.id, a.company_id, machine_name,nfc_code, machine_code, a.is_active, company_name,registration_no');
            $this->db->from('tbl_machines as a');
            $this->db->join('tbl_companies AS b', 'b.company_id = a.company_id');
            $this->db->where('a.id', $id);
            $query = $this->db->get();
            $res = $query->result_array();
            $mname=$res[0]['machine_name'];
            $mcode=$res[0]['machine_code'];
            $creg=$res[0]['registration_no'];
            $machine_name = substr($mname, 0, 3);
//            $nfccode='n_'.$machine_name.'_'.$mcode.'_'.$creg;
            $nfccode='n'.$machine_name.''.$mcode.''.$creg;
            $data = array(
			'nfc_code' => $nfccode,
                        'is_nfc' => 2,
			);
                $this->db->where('id', $id);
		$this->db->update($this->table, $data);
            
            $this->db->select('id, nfc_code');
            $this->db->from('tbl_machines');
            $this->db->where('id', $id);
            $query1 = $this->db->get();
		return $query1->row();
	}
        
        public function barcode_machines($params = "", $page = "all", $count=false) {

        $this->db->select('bar_code,machine_name');
        $this->db->from('tbl_machines ');
        $this->db->where("isdeleted='0'");
        $result = $this->db->get();
            return $result->result();
        
        return FALSE;
    }
    public function barcode_machines_byid($id) {
        $this->db->select('bar_code,machine_name');
        $this->db->from('tbl_machines ');
        $this->db->where("isdeleted='0'");
        $this->db->where('id', $id);
        $result = $this->db->get();
        if ($result->num_rows() > 0)
            return $result->result();
        
        return FALSE;
    }
    
    public function machine_update($id,$data,$imagedata)
	{
     
          $this->db->where('id',$id);
          $this->db->update($this->table, $data);
          
          $this->db->where('machine_id',$id);
          $this->db->update('tbl_machine_images', $imagedata);
	}
}

/* End of file machines_model.php */
/* Location: ./application/models/admin/machines_model.php */