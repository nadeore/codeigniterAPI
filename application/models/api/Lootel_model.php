<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class lootel_model extends CI_Model {

	/*
 * Filename	: lootel_model.php
 * projectname  : lootel
 * Date created : November 10 2017
 * Created by   : Manoj Lakhe
 * Purpose      : This controller file will contain all the functions needed for api 
 */
	 
	public function __construct() {
        parent::__construct();
        
    }

	/*
     * Methodname  :  index
     * Date created: November 10 2017
     * Created by  : Manoj Lakhe
     * Purpose: This function will be used to check api 
     * InputParams and Type: none  
     * OutputParams and Type: none
    */
	public function index()
	{
		echo "Testing";
	}
	
	  /*
     * Methodname:  registration
     * Date created: November 11 2017   
	 * Created by   : Manoj Lakhe
     * Purpose: This function will be used to check api 
     * InputParams and Type: userid, topicid, comment
     * OutputParams and Type: success
    */
	public function registration($data){
		
		if($this->db->insert('tbl_user', $data)){
                    
			return $this->db->insert_id();
		}else{
			return false;
		}

	}
	
	/*
     * Methodname   :  login
     * Date created : November 11 2017
     * Created by   : Manoj Lakhe
     * Purpose: This function will be used to check api 
     * InputParams and Type: none  
     * OutputParams and Type: none
    */
	public function login($data){
		$this->db->select('id, name, email, phone, shop_id');
                $this->db->where($data);
		$query = $this->db->get('tbl_user');
		$res = $query->row();
		if($res){
			return $res;
		}else{
			return false;
		}
	}
	
	/*
     * Methodname:  addCategory
     * Date created : November 11 2017
     * Created by   : Manoj Lakhe
     * Purpose: This function will be used to check api 
     * InputParams and Type: none  
     * OutputParams and Type: none
    */
	public function addCategory($data){
		
	
		if($this->db->insert('tbl_category', $data)){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}
	
	/*
     * Methodname:  addProduct
     * Date created : November 11 2017
     * Created by   : Manoj Lakhe
     * Purpose: This function will be used to check api 
     * InputParams and Type: none  
     * OutputParams and Type: none
    */
	public function addProduct($data){
		
		if($this->db->insert('tbl_product', $data)){
			return $this->db->insert_id();
		}else{
			return false;
		}

	}
       /*
     * Methodname   :  getCategoryList
     * Date created : November 11 2017
     * Created by   : Manoj Lakhe 
     * Purpose: This function will be used to check api 
     * InputParams and Type: none  
     * OutputParams and Type: none
    */
        
        public function getCategoryList ($data){
            
		$this->db->select('categoryTypeId, categoryName, description, id, categoryImage');
                $this->db->where($data);
                $query= $this->db->get('tbl_category');
               $ret = $query->row();
		
                
		if($ret){
			return $ret;
		}else{
			return false;
		}
	}
        
        
            /*
     * Methodname   :  getProductList
     * Date created : November 13 2017
     * Created by   : Manoj Lakhe 
     * Purpose: This function will be used to check api 
     * InputParams and Type: none  
     * OutputParams and Type: none
    */
        
          public function getProductList ($data){
            
		$this->db->select('id, name, categoryId, subCategoryId, SKU, discription, buy_price, sale_price, productImage');
                $this->db->where($data);
                $query= $this->db->get('tbl_product');
               $ret = $query->row();
		
                
		if($ret){
			return $ret;
		}else{
			return false;
		}
	}
        
        
               /*
     * Methodname   :  getProductDetails
     * Date created : November 13 2017
     * Created by   : Manoj Lakhe 
     * Purpose: This function will be used to check api 
     * InputParams and Type: none  
     * OutputParams and Type: none
    */
        
        
        public function getProductDetails ($data){
            
		$this->db->select('name, categoryId, subCategoryId, SKU, discription, buy_price, sale_price, productImage');
                $this->db->where($data);
                $query= $this->db->get('tbl_product');
               $ret = $query->row();
		
                
		if($ret){
			return $ret;
		}else{
			return false;
		}
	}
      
}
