<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*Classname:companies_model.php
*projectname:sa4i
*Date created:October 14, 2017
*Created by:Hemant Jaiswal
*Purpose: companies related database functions
*/
class Companies_model extends CI_Model {
	var $table = 'tbl_companies';
        var $table1 = 'tbl_users';
	/*Methodname:  __construct
	*projectname:sa4i
	*Date created:October 14, 2017
	*Purpose: Perform common action for class at load 
	*InputParams and Type: -
	*OutputParams and Type: -
	*/
	 public function __construct(){
		// Call the Model constructor
		parent::__construct();
	}
	
	/*Methodname:  fetch_companies
	*Date created:October 14, 2017
	*Created by:Hemant Jaiswal
	*Purpose: fetch all companies
	*InputParams and Type: $limit:int, $start:int, $search_field:string, $search_txt:string
	*OutputParams and Type: array,bool
	*/
	public function fetch_companies($params = "", $page = "all", $count=false) {
        
        /*$this->db->select('show_id, DATE_FORMAT(start_date,"%d/%m/%Y") as start_date, DATE_FORMAT(end_date,"%d/%m/%Y") as end_date, show_name, city, '.TBL_COUNTRIES.'.id as country_id, country_name, '.TBL_REGIONS.'.id as region_id, '.TBL_REGIONS.'.region as region_name, zipcode, venue_address, display, staff_attending', false);
        $this->db->join ( TBL_COUNTRIES, TBL_COUNTRIES.'.id = '.TBL_companies.'.country' , 'left' );
        $this->db->join ( TBL_REGIONS, TBL_REGIONS.'.id = '.TBL_companies.'.region' , 'left' );
        if ($params['companies_search_field'] != '') {
            if($params['companies_search_field'] == 'show_date' && $params['companies_search_value'] != '') {
                if(!empty($params['companies_search_field'])){
                        $this->db->where('UNIX_TIMESTAMP(start_date) <= UNIX_TIMESTAMP(STR_TO_DATE("'.$params['companies_search_value'].'","%d/%m/%Y"))');
                        $this->db->where('UNIX_TIMESTAMP(end_date) >= UNIX_TIMESTAMP(STR_TO_DATE("'.$params['companies_search_value'].'","%d/%m/%Y"))');
                }
            } else if($params['companies_search_field'] == 'country' && $params['companies_search_value'] != '') {
                    $this->db->where(TBL_companies.'.'.$params['companies_search_field'], $params['companies_search_value']);
            } else if($params['companies_search_field'] == 'region' && $params['companies_search_value'] != '') {
                    $this->db->where(TBL_companies.'.'.$params['companies_search_field'], $params['companies_search_value']);
            } else if($params['companies_search_field'] !='' && $params['companies_search_value'] != '') {
                    $this->db->like($params['companies_search_field'], $params['companies_search_value']);
            }
        }
        $this->db->from(TBL_companies);
        if (!empty($params)) {
            if ((($params ["num_rows"] * $params ["page"]) >= 0 && $params ["num_rows"] > 0)) {
                if ($params ["search"] === TRUE) {
                    $ops = array(
                        'eq' => '=', //equal
                        'ne' => '<>', //not equal
                        'lt' => '<', //less than
                        'le' => '<=', //less than or equal
                        'gt' => '>', //greater than
                        'ge' => '>=', //greater than or equal
                        'bw' => 'LIKE', //begins with
                        'bn' => 'NOT LIKE', //doesn't begin with
                        'in' => 'LIKE', //is in
                        'ni' => 'NOT LIKE', //is not in
                        'ew' => 'LIKE', //ends with
                        'en' => 'NOT LIKE', //doesn't end with
                        'cn' => 'LIKE', // contains
                        'nc' => 'NOT LIKE'  //doesn't contain
                    );
                }
                if (!empty($params['search_operator'])) {
                    switch ($params['search_operator']) {
                        case "eq":
                            $this->db->where($params['search_field'], $params['search_str']);
                            break;
                        case "ne":
                            $this->db->where($params['search_field'] . ' !=', $params['search_str']);
                            break;
                        case "lt":
                            $this->db->where($params['search_field'] . ' <', $params['search_str']);
                            break;
                        case "gt":
                            $this->db->where($params['search_field'] . ' >', $params['search_str']);
                            break;
                        case "le":
                            $this->db->where($params['search_field'] . ' <=', $params['search_str']);
                            break;
                        case "ge":
                            $this->db->where($params['search_field'] . ' >=', $params['search_str']);
                            break;
                        case "bw":
                            $this->db->like($params['search_field'], $params['search_str'], 'after');
                            break;
                        case "ew":
                            $this->db->like($params['search_field'], $params['search_str'], 'before');
                            break;
                        case "in":
                            $this->db->like($params['search_field'], $params['search_str']);
                            break;
                        case "cn":
                            $this->db->like($params['search_field'], $params['search_str']);
                            break;
                        case "ni":
                            $this->db->where_not_in($params['search_field'], $params['search_str']);
                            break;
                        case "en":
                            $this->db->not_like($params['search_field'], $params['search_str'], 'after');
                            break;
                        case "bn":
                            $this->db->not_like($params['search_field'], $params['search_str'], 'before');
                            break;
                        case "nc":
                            $this->db->not_like($params['search_field'], $params['search_str']);
                            break;
                    }
                }
                $this->db->order_by("{$params['sort_by']}", $params ["sort_direction"]);
                if ($count != true){
                    if ($params['page'] != 1) {
                        $this->db->limit($params["num_rows"] * $params["page"], ($params ["num_rows"] * ($params["page"] - 1)));
                    } else {
                        $this->db->limit($params ["num_rows"], 0);
                    }
                }else{
                        //Do nothing...
                }
                $query = $this->db->get();
            }
        } else {
            $this->db->limit(5);
            $query = $this->db->get();
        }
        //echo $this->db->last_query();die('here');
        return $query;*/


        $this->db->select('u.email,u.password,  u.is_active, c.company_name, c.owner_name, c.registration_no,c.id,c.company_id');

        $this->db->from('tbl_users as u');
        $this->db->join('tbl_companies as c', 'u.id = c.company_id', 'left');
        $this->db->where('u.user_role', 3);
        $this->db->where("isdeleted='0'");
        $this->db->order_by("u.id", "desc");

        $result = $this->db->get();
        //echo $this->db->last_query();//die;
        if ($result->num_rows() > 0)
            return $result->result();
        
        return FALSE;
    }
    
     public function delete_by_id($id,$data1)
	{   $this->db->select('company_id,id');
            $this->db->where('id', $id);
            $query = $this->db->get($this->table);
            $res = $query->result_array();
            $company_id=$res[0]['company_id'];
            
            
//                $this->db->where('id', $id);
//		$this->db->update($this->table,$data);
                
                $this->db->where('id', $company_id);
		$this->db->update('tbl_users',$data1);
	}
        public function get_by_id($id)
	{
                $this->db->select('password ,a.email,  a.address, a.phone, b.company_name, b.owner_name,b.is_active, b.registration_no,a.id');
                $this->db->from('tbl_companies AS b');
                $this->db->join('tbl_users AS a', 'b.company_id = a.id');
                $this->db->where('b.id',$id);
                $query = $this->db->get();
 
		return $query->row();
	}
        
        public function company_update($id, $data,$data1)
	{
                $this->db->where('company_id',$id);
		$this->db->update($this->table, $data);
                $this->db->where('id',$id);
                $this->db->update($this->table1, $data1);
		//return $this->db->affected_rows();
	}
        
        
        public function company($data2,$companyId,$data1)
	{ 
//            $companyId= $this->db->insert('tbl_users', $data1);
//            echo $companyId;
            $this->db->select('isdeleted,id,email');
            $this->db->where('email', $data1['email']);
            $query = $this->db->get('tbl_users');
            $res = $query->result_array();
            $isdeleted=$res[0]['isdeleted'];
//            $email=$res[0]['email'];
            
            
                
                if(!empty($companyId) && $isdeleted == 0){
//                $this->db->where("is_deleted='0'");
                    
		$this->db->insert('tbl_companies', $data2);
                }
	}
}

/* End of file companies_model.php */
/* Location: ./application/models/admin/companies_model.php */