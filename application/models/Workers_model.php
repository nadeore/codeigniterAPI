<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*Classname:workers_model.php
*projectname:sa4i
*Date created:October 26, 2017
*Created by:Hemant Jaiswal
*Purpose: workers related database functions
*/
class Workers_model extends CI_Model {
	var $table = 'tbl_users';
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
	
	/*Methodname:  fetch_workers
	*Date created:October 26, 2017
	*Created by:Hemant Jaiswal
	*Purpose: fetch all workers
	*InputParams and Type: $limit:int, $start:int, $search_field:string, $search_txt:string
	*OutputParams and Type: array,bool
	*/
	public function fetch_workers($params = "", $page = "all", $count=false, $user_role = '4', $user_id = NULL) {
        
        $this->db->select('id, user_role, email, password, first_name, last_name, address, phone, company_id, act_key, verified, is_active, deleted_at, modified_at, created_at');
        $this->db->from('tbl_users');
        $this->db->where('company_id', $this->session->userdata('user_id'));
        $this->db->where('user_role', $user_role);
        $this->db->order_by("id", "desc");
        $this->db->where('isdeleted',0);
        $result = $this->db->get();
        //echo $this->db->last_query();//die;
        if ($result->num_rows() > 0)
            return $result->result();
        
        return FALSE;
    }
    
    public function get_by_id($id)
	{
		$this->db->from( 'tbl_users');
		$this->db->where('id',$id);
                $this->db->where('isdeleted',0);
		$query = $this->db->get();
 
		return $query->row();
	}
        
        public function b_update($id, $data)
	{
//     print_r($data) ;
     $this->db->where('id',$id);
           // return $this->db->update('sale_details', $update_array);
		$this->db->update($this->table, $data);
		//return $this->db->affected_rows();
	}
        
        public function delete_by_id($id, $data)
	{
//     print_r($data) ;
            $this->db->where('id',$id);
           // return $this->db->update('sale_details', $update_array);
		return $this->db->update($this->table, $data);
		//return $this->db->affected_rows();
	}

}

/* End of file workers_model.php */
/* Location: ./application/models/admin/workers_model.php */