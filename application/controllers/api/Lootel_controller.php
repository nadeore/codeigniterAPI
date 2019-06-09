<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Lootel_controller extends CI_Controller {

	/*
 * Filename	: Lootel_controller.php
 * projectname  : lootel
 * Date created : November 11 2017
 * Created by   : Manoj Lakhe
 * Purpose      : This controller file will contain all the functions needed for api 
 */
	 


	/*
     * Methodname  :  index
     * Date created: November 11 2017
     * Created by  : Manoj Lakhe
     * Purpose: This function will be used to check api 
     * InputParams and Type: none  
     * OutputParams and Type: none
    */
   public function __construct()
   {
       parent:: __construct();
       $this->load->model('api/Lootel_model');
   }






   public function index(){
          
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
	public function registration(){
		
		if (($name = $this->input->get_post('name')) && ($emailId = $this->input->get_post('emailId')) && 
                        ($mobileNo = $this->input->get_post('mobileNo')) && ($password = $this->input->get_post('password')) && 
                                ($branchId = $this->input->get_post('branchId'))) {
			$data = array(
                                        'name' => $name,
                                        'email' => $emailId,
                                        'phone' => $mobileNo,
                                        'password' => $password,
                                        'shop_id' => $branchId
                                 );
                        $ret = $this->Lootel_model->registration($data);
			if($ret){
				$response = array("status"=>true,"message"=>"Success","userid"=>$ret);
			}else{
				$response = array("status"=>false,"message"=>"Record not saved");
			}
			
		}else{
			$response = array("status"=>false,"message"=>"Required parameter not found");
		}
		
		echo json_encode($response);
	}
	
	/*
     * Methodname:  login
     * Date created: November 11 2017   
     * Created by : Manoj Lakhe
     * Purpose: This function will be used to check api 
     * InputParams and Type: none  
     * OutputParams and Type: none
    */
	public function login(){
		//$this->output->enable_profiler(TRUE);

		if (($emailId = $this->input->get_post('emailId')) && ($password = $this->input->get_post('password'))) {
                    
                    $data = array(
                                   'email' => $emailId,
                                   'password' => $password
                                 );
                    
                        $ret = $this->Lootel_model->login($data);
                        
                        if($ret){
			
				$response = array("status"=>true,"message"=>"Success",$ret);
			}else{
				$response = array("status"=>false,"message"=>"Record not found");
			}
			
		}else{
			$response = array("status"=>false,"message"=>"Required parameter not found");
		}
		echo json_encode($response);
	
    }
	
	/*
     * Methodname:  addCategory
     * Date created: November 11 2017
     * Created by:  Manoj Lakhe
     * Purpose: This function will be used to check api 
     * InputParams and Type: none  
     * OutputParams and Type: none
    */
	public function addCategory(){

		if (($categoryName = $this->input->get_post('categoryName')) && ($categoryTypeId = $this->input->get_post('categoryTypeId')) && 
                        ($description = $this->input->get_post('description')) && ($categoryImage = $this->input->get_post('categoryImage'))) {
			
			
			$data = array(
				'categoryName' => $categoryName,
				'categoryTypeId' => $categoryTypeId,
				'description' => $description,
				'categoryImage' => $categoryImage
			);
                        
                       $ret = $this->Lootel_model->addCategory($data);
			
			if($ret){
				$response = array("status"=>true,"message"=>"Success","userid"=>$ret);
			}else{
				$response = array("status"=>false,"message"=>"Record not saved");
			}
			
			
		}else{
			$response = array("status"=>false,"message"=>"Required parameter not found");
		}
		echo json_encode($response);
	}
	
	/*
     * Methodname:  addProduct
     * Date created: November 11 2017
     * Created by:  Manoj Lakhe
     * Purpose: This function will be used to check api 
     * InputParams and Type: none  
     * OutputParams and Type: none
    */
	public function addProduct(){
		
		if (($productName = $this->input->get_post('productName')) && ($categoryId = $this->input->get_post('categoryId')) && 
                        ($subCategoryId = $this->input->get_post('subCategoryId')) && ($SKU = $this->input->get_post('SKU')) && 
                         ($description = $this->input->get_post('description')) && ($buyPrice = $this->input->get_post('buyPrice')) && 
                        ($sellPrice = $this->input->get_post('sellPrice')) && ($productImage = $this->input->get_post('productImage'))) {
			
                    $data = array(
                                        'name' => $productName,
                                        'categoryId' => $categoryId,
                                        'subCategoryId' => $subCategoryId,
                                        'SKU' => $SKU,
                                        'discription' => $description,
                                        'buy_price' => $buyPrice,
                                        'sale_price' => $sellPrice,
                                        'productImage' => $productImage
                                 );
                    
                           $ret = $this->Lootel_model->addProduct($data);
                    
                    if($ret){
				$response = array("status"=>true,"message"=>"Success","productId"=>$ret);
			}else{
				$response = array("status"=>false,"message"=>"Record not saved");
			}
		}else{
			$response = array("status"=>false,"message"=>"Required parameter not found");
		}
		
		echo json_encode($response);
	}
	
	/*
     * Methodname   :  getCategoryList
     * Date created : November 11 2017
     * Created by   : Manoj Lakhe 
     * Purpose: This function will be used to check api 
     * InputParams and Type: none  
     * OutputParams and Type: none
    */
	public function getCategoryList(){
		if (($userId = $this->input->get_post('userId')) && ($branchId = $this->input->get_post('branchId'))) {

                     $data = array(
                                   'id' => $userId,
                                   'shop_id' => $branchId
                                 );
                    
                        $ret = $this->Lootel_model->getCategoryList($data);
                    
                    if($ret){
				$response = $response = array("status"=>true,"message"=>"Success",$ret);
			}else{
				$response = array("status"=>false,"message"=>"Record not found");
			}
		}else{
			$response = array("status"=>false,"message"=>"Required parameter not found");
		}
		echo json_encode($response);	
	}
        
       
        /*
     * Methodname   :  getProductList
     * Date created : November 13 2017
     * Created by   : Manoj Lakhe 
     * Purpose: This function will be used to check api 
     * InputParams and Type: none  
     * OutputParams and Type: none
    */
        
        public function getProductList(){
		if (($categoryId = $this->input->get_post('categoryId')) && ($userId = $this->input->get_post('userId'))) {

                     $data = array(
                                   'categoryId' => $categoryId,
                                   'shop_id' => $userId
                                   
                                 );
                    
                        $ret = $this->Lootel_model->getProductList($data);
                    
                    if($ret){
				$response = array("status"=>true,"message"=>"Success",$ret);
			}else{
				$response = array("status"=>false,"message"=>"Record not found");
			}
		}else{
			$response = array("status"=>false,"message"=>"Required parameter not found");
		}
		echo json_encode($response);	
	}
        
        
            /*
     * Methodname   :  getProductDetails
     * Date created : November 13 2017
     * Created by   : Manoj Lakhe 
     * Purpose: This function will be used to check api 
     * InputParams and Type: none  
     * OutputParams and Type: none
    */
        
        
        public function getProductDetails(){
		if (($productId = $this->input->get_post('productId')) && ($userId = $this->input->get_post('userId'))) {

                     $data = array(
                                   'id' => $productId,
                                   'shop_id' => $userId
                                   
                                 );
                    
                        $ret = $this->Lootel_model->getProductDetails($data);
                    
                    if($ret){
				$response = array("status"=>true,"message"=>"Success",$ret);
			}else{
				$response = array("status"=>false,"message"=>"Record not found");
			}
		}else{
			$response = array("status"=>false,"message"=>"Required parameter not found");
		}
		echo json_encode($response);	
	}
        
        
}


