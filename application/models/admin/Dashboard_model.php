<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*Classname:dashboard_model.php
*projectname:australiawide
*Date created:November 13,2013
*Created by:Rajnish Katiyar
*Purpose: Admin dashboard related database functions
*/
class Dashboard_model extends CI_Model {
	
	/*Methodname:  __construct
	*Date created:November 13,2013
	*Created by:Rajnish Katiyar
	*Purpose: Perform common action for class at load 
	*InputParams and Type: -
	*OutputParams and Type: -
	*/
	 public function __construct(){
		// Call the Model constructor
		parent::__construct();
	}
	
	/*Methodname:  get_recent_users
	*Date created:November 13,2013
	*Created by:Rajnish Katiyar
	*Purpose: Get top 6 recent users
	*InputParams and Type: -
	*OutputParams and Type: array
	*/
	public function get_recent_users(){ 
		$this->db->where('verified', 1); //user = 1
		$this->db->where('user_role !=', 0); //user = 0
                $this->db->order_by('id', 'desc');
		$this->db->limit(6);
		$result = $this->db->get('tbl_users');
		if ($result->num_rows() > 0 )
			return $result->result();
		else
			return FALSE;
	}
	
	/*Methodname:  get_total_users
	*Date created:November 13,2013
	*Created by:Rajnish Katiyar
	*Purpose: Get number of all active users
	*InputParams and Type: -
	*OutputParams and Type: int
	*/
	public function get_total_users(){ 
		$this->db->where('verified', 1); //user = 1
		$this->db->where('user_role !=', 0); //user = 0
		$result = $this->db->get('tbl_users');
		if ($result->num_rows() > 0 )
			return $result->num_rows();
		else
			return 0;
	}
        
        /*Methodname:  get_total_dealers
	*Date created:January 28,2014
	*Created by:Hemant Jaiswal
	*Purpose: Get number of all active dealers
	*InputParams and Type: -
	*OutputParams and Type: int
	*/
	public function get_total_dealers(){ 
		$this->db->where('verified', 1); //user = 1
		$this->db->where('user_role', 1); //user = 1
		$result = $this->db->get('tbl_users');
		if ($result->num_rows() > 0 )
			return $result->num_rows();
		else
			return 0;
	}
        
        /*Methodname:  get_total_agents
	*Date created:January 28,2014
	*Created by:Hemant Jaiswal
	*Purpose: Get number of all active agents
	*InputParams and Type: -
	*OutputParams and Type: int
	*/
	public function get_total_agents(){ 
		$this->db->where('verified', 1); //user = 1
		$this->db->where('user_role', 2); //user = 2
		$result = $this->db->get('tbl_users');
		if ($result->num_rows() > 0 )
			return $result->num_rows();
		else
			return 0;
	}
	
	/*Methodname:  get_recent_dealer_orders
	*Date created:January 28,2014
	*Created by:Hemant Jaiswal
	*Purpose: Get top 3 recent dealer's orders
	*InputParams and Type: -
	*OutputParams and Type: array
	*/
	public function get_recent_dealer_orders(){ 
		
		$this->db->select('order_id_PK, created_date, status');
                $this->db->where('is_deleted', 0); 
                $this->db->order_by("order_id_PK", "desc");
                $this->db->limit(3);
		$result = $this->db->get(TBL_ORDERS);
		if ($result->num_rows() > 0 )
			return $result->result();
		else
			return FALSE;
	}
        
        /*Methodname:  get_recent_agent_orders
	*Date created:January 28,2014
	*Created by:Hemant Jaiswal
	*Purpose: Get top 3 recent agent's orders
	*InputParams and Type: -
	*OutputParams and Type: array
	*/
	public function get_recent_agent_orders(){ 
		
		$this->db->select('order_id_PK, created_date, status');
                $this->db->where('is_deleted', 0); //user deleted = 1
                $this->db->order_by("order_id_PK", "desc");
                $this->db->limit(3);
		$result = $this->db->get(TBL_JOBSHEET_ORDERS);
		if ($result->num_rows() > 0 )
			return $result->result();
		else
			return FALSE;
	}
	
	/*Methodname:  get_total_dealer_orders
	*Date created:January 28,2014
	*Created by:Hemant Jaiswal
	*Purpose: Get number of all orders
	*InputParams and Type: -
	*OutputParams and Type: int
	*/
	public function get_total_dealer_orders(){ 
		
                $this->db->where('is_deleted', 0); //user deleted = 1
		$result = $this->db->get(TBL_ORDERS);
		if ($result->num_rows() > 0 )
			return $result->num_rows();
		else
			return 0;
	}
        
        /*Methodname:  get_total_agent_orders
	*Date created:January 28,2014
	*Created by:Hemant Jaiswal
	*Purpose: Get number of all agent's orders
	*InputParams and Type: -
	*OutputParams and Type: int
	*/
	public function get_total_agent_orders(){ 
		
                $this->db->where('is_deleted', 0); //user deleted = 1
		$result = $this->db->get(TBL_JOBSHEET_ORDERS);
		if ($result->num_rows() > 0 )
			return $result->num_rows();
		else
			return 0;
	}
        
        
        /*Methodname:  get_exdate_dealers
	*Date created:May 06,2014
	*Created by:Hemant Jaiswal
	*Purpose: Get next 5 days date ex factory for dealers
	*InputParams and Type: -
	*OutputParams and Type: array
	*/
	public function get_exdate_dealers(){ 
            if(date('D')!='Mon'){    
                $startweek = date($this->config->item('date_format'),strtotime('last Monday'));    
            }else{
                $startweek = date($this->config->item('date_format'));   
            }
            if(date('D')!='Sun'){
                $endweek = date($this->config->item('date_format'),strtotime('next Sunday'));
            }else{
                $endweek = date($this->config->item('date_format'));
            }
            
            $this->db->select('order_id_PK, created_date, status');
            $this->db->where('UNIX_TIMESTAMP(STR_TO_DATE(due_date,"%d/%m/%Y")) >= UNIX_TIMESTAMP(STR_TO_DATE("'.$startweek.'","%d/%m/%Y"))');
            $this->db->where('UNIX_TIMESTAMP(STR_TO_DATE(due_date,"%d/%m/%Y")) <= UNIX_TIMESTAMP(STR_TO_DATE("'.$endweek.'","%d/%m/%Y"))'); 
            $this->db->order_by("order_id_PK", "desc");
            $result = $this->db->get(TBL_ORDERS);
            if ($result->num_rows() > 0 )
                    return $result->result();
            else
                    return FALSE;
	}
        
        /*Methodname:  get_exdate_agents
	*Date created:May 06,2014
	*Created by:Hemant Jaiswal
	*Purpose: Get next 5 days date ex factory for agents
	*InputParams and Type: -
	*OutputParams and Type: array
	*/
	public function get_exdate_agents(){ 	
            if(date('D')!='Mon'){    
                $startweek = date($this->config->item('date_format'),strtotime('last Monday'));    
            }else{
                $startweek = date($this->config->item('date_format'));   
            }
            if(date('D')!='Sun'){
                $endweek = date($this->config->item('date_format'),strtotime('next Sunday'));
            }else{
                $endweek = date($this->config->item('date_format'));
            }

            $this->db->select('order_id_PK, created_date, status');
            $this->db->where('UNIX_TIMESTAMP(STR_TO_DATE(date_ex_factory,"%d/%m/%Y")) >= UNIX_TIMESTAMP(STR_TO_DATE("'.$startweek.'","%d/%m/%Y"))');
            $this->db->where('UNIX_TIMESTAMP(STR_TO_DATE(date_ex_factory,"%d/%m/%Y")) <= UNIX_TIMESTAMP(STR_TO_DATE("'.$endweek.'","%d/%m/%Y"))');          
            $this->db->order_by("order_id_PK", "desc");
            $result = $this->db->get(TBL_JOBSHEET_ORDERS);
            
            if ($result->num_rows() > 0 )
                    return $result->result();
            else
                    return FALSE;
	}

}

/* End of file dashboard_model.php */
/* Location: ./application/models/admin/dashboard_model.php */