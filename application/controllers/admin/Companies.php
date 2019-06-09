<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * Classname:companies.php
 * projectname:sa4i
 * Date created:October 14, 2017
 * Created by:Hemant Jaiswal
 * Purpose: This file/class will handle the companies 
 */

class Companies extends CI_Controller {
    /* Methodname:  __construct
     * Date created:October 14, 2017
     * Created by:Hemant Jaiswal
     * Purpose: Perform common action for class at load 
     * InputParams and Type: -
     * OutputParams and Type: -
     */

    
    public function __construct() {
        parent::__construct();
        $this->load->library('upload');
        if (!$this->session->userdata('admin_id'))
            redirect($this->config->item('admin_path') . 'login', 'location');
        
        // Expire the page on back button click
        $this->general->expire_page();

        //load companies model
        $this->load->model($this->config->item('admin_path') . 'companies_model');
    }
    

    /* Methodname:  index
     * Date created:October 14, 2017
     * Created by:Hemant Jaiswal
     * Purpose: This function open the companies grid
     * InputParams and Type: -
     * OutputParams and Type: -
     */
    public function index() {
        $data['page_title'] = 'Companies list';
        $data['view'] = 'companies/grid_view';
        $data['companies'] = $this->companies_model->fetch_companies();
        $this->template->base($data);
//        echo $this->input->ip_address();
    }
    

    /* Methodname:  browse
     * Date created:October 14, 2017
     * Created by:Hemant Jaiswal
     * Purpose: This function open the companies grid
     * InputParams and Type: -
     * OutputParams and Type: -
     */
    public function browse() {
        $data_companies = new stdClass();
        $data_companies->page = false;
        $req_param = array (
            "sort_by" => $this->input->post( "sidx", TRUE ),
            "sort_direction" => $this->input->post( "sord", TRUE ),
            "page" => $this->input->post( "page", TRUE ),
            "num_rows" => $this->input->post( "rows", TRUE ),
            "search" => $this->input->post( "_search", TRUE ),
            "companies_search_field" => $this->input->post( "companies_search_field", TRUE ),
            "companies_search_value" => $this->input->post( "companies_search_value", TRUE )
        );

        $data_companies->page = $this->input->post( "page", TRUE );
        $data_companies->records = count ($this->companies_model->fetch_companies($req_param,"all",true)->result_array());
        $data_companies->total = ceil ($data_companies->records /$this->input->post( "rows", TRUE ) );
        $show_records = $this->companies_model->fetch_companies($req_param)->result_array();
        $data_companies->rows = $show_records;
        echo json_encode ($data_companies );
    }
    

    /* Methodname:  add
     * Date created:October 14, 2017
     * Created by:Hemant Jaiswal
     * Purpose: This function will add new companies
     * InputParams and Type: -
     * OutputParams and Type: -
     */
    public function add() {

        if ($this->input->post('submit')) {

            //Setting up validations
            $this->load->library('form_validation');
            $this->form_validation->set_rules('company_name', 'Company Name', 'required|trim');
//            $this->form_validation->set_rules('owner_name', 'Owner Name', 'required|trim');
            $this->form_validation->set_rules('registration_no', 'Registration Number', 'required|trim|max_length[100]');
//            $this->form_validation->set_rules('phone', 'Phone Number', 'required|trim|numeric');
//            $this->form_validation->set_rules('address', 'Address', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_users.email]');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');

            if ($this->form_validation->run() == FALSE){
                $this->_drawAddForm();
            }
            else {
                $data = $this->_getFormValues();
                $data1['user_role'] = 3;
                $data1['email'] = $data['email'];
                $data1['password'] = $data['password'];
                $data1['address'] = $data['address'];
                $data1['phone'] = $data['phone'];
                $data1['verified'] = 1;
                $companyId = $this->general_model->add('tbl_users', $data1);

//                if(!empty($companyId)){
                    $data2['company_id'] = $companyId;
                    $data2['company_name'] = $data['company_name'];
                    $data2['owner_name'] = $data['owner_name'];
                    $data2['registration_no'] = $data['registration_no'];
//                    $this->general_model->add('tbl_companies', $data2);
//                }
                $this->companies_model->company($data2,$companyId,$data1);
                $this->session->set_flashdata('add_success', 'Company details added successfully.');
                redirect($this->config->item('admin_path') . 'companies', 'location');
                    
//                echo $data;
		echo json_encode(array("status" => TRUE));
            }
        }
        else
            $this->_drawAddForm();
    }

    
    /* Methodname:  modify
     * Date created:October 14, 2017
     * Created by:Hemant Jaiswal
     * Purpose: This function will modify companies detail
     * InputParams and Type: -
     * OutputParams and Type: -
     */
    public function modify() {

        if ($this->input->post('submit')) {
            //Setting up validations
            $this->load->library('form_validation');
            $this->form_validation->set_rules('show_name', 'Company name', 'required|trim');
            //$this->form_validation->set_rules('venue', 'Venue', 'required|trim');
            $this->form_validation->set_rules('venue_address', 'Venue address', 'required|trim|max_length[100]');
            $this->form_validation->set_rules('country', 'Country', 'required|trim|max_length[100]');
            $this->form_validation->set_rules('region', 'State', 'required|trim|max_length[100]');
            $this->form_validation->set_rules('city', 'City', 'required|trim|max_length[100]');
            $this->form_validation->set_rules('zipcode', 'Zip/Postal code', 'required|trim|max_length[100]');
            $this->form_validation->set_rules('start_date', 'Start date', 'required|trim|max_length[100]');
            $this->form_validation->set_rules('end_date', 'End date', 'required|trim');
            $this->form_validation->set_rules('display', 'Display and Pricing', 'required|trim');
            $this->form_validation->set_rules('staff_attending', 'Staff attending', 'required|trim');
            
            if ($this->form_validation->run() == FALSE)
                $this->_drawUpdateForm();
            else {
                $data = $this->_getFormValues();
                $this->general_model->modify(TBL_companies, 'show_id', $data['show_id'], $data);
                $this->session->set_flashdata('edit_success', 'Company details edited successfully.');
                redirect($this->config->item('admin_path') . 'companies/modify/' . $data['show_id'], 'location');
            }
        }
        else
            $this->_drawUpdateForm();
    }

    
    /* Methodname:  _drawAddForm
     * Date created:October 14, 2017
     * Created by:Hemant Jaiswal
     * Purpose: This function will open add Company form
     * InputParams and Type: -
     * OutputParams and Type: -
     */
    private function _drawAddForm() {

        $data = $this->_getFormValues();

        $data['action'] = 'add';
        $data['page_title'] = 'Company details';
//        $data['addcompanies'] = $this->companies_model->fetch_companies();
        $data['view'] = 'companies/detail_view';
        $this->template->base($data);
    }

    
    /* Methodname:  _drawUpdateForm
     * Date created:October 14, 2017
     * Created by:Hemant Jaiswal
     * Purpose: Function to redraw the update details form if any error occurs
     * InputParams and Type: -
     * OutputParams and Type: -
     */
    private function _drawUpdateForm() {
        if ($this->input->post('submit'))
            $data = $this->_getFormValues();
        else {
            $id = $this->uri->segment(4);
            if (!$id)
                $id = $this->input->post('show_id', TRUE);
            if (!$id)
                redirect($this->config->item('admin_path') . 'companies/', 'location');
            $data = $this->general_model->get_single_row_by_id(TBL_companies, 'show_id', $id, 'array');
            if ($data == FALSE)
                redirect($this->config->item('admin_path') . 'companies/', 'location');
        }
        $data['action'] = 'modify';
        $data['page_title'] = 'Company details';
        $data['countriesList'] = $this->general_model->getCountries();
        $data['stateList'] = $this->general_model->getRegions();
        $data['view'] = 'companies/detail_view';
        $this->template->base($data);
    }
    

    /* Methodname:  _getFormValues
     * Date created:October 14, 2017
     * Created by:Hemant Jaiswal
     * Purpose: Get the form values
     * InputParams and Type: -
     * OutputParams and Type: $data:array
     */
    private function _getFormValues() {
        if ($this->input->post('id', TRUE))
            $data['id'] = $this->input->post('id', TRUE);
        $data['company_name'] = $this->input->post('company_name', TRUE);
        $data['owner_name'] = $this->input->post('owner_name', TRUE);
        $data['registration_no'] = $this->input->post('registration_no', TRUE);
        $data['phone'] = $this->input->post('phone', TRUE);
        $data['address'] = $this->input->post('address', TRUE);
        $data['email'] = $this->input->post('email', TRUE);
        $data['password'] = md5($this->input->post('password', TRUE));
        return $data;
    }
    

    /* Methodname:  view
     * Date created:October 14, 2017
     * Created by:Hemant Jaiswal
     * Purpose: view the Company details
     * InputParams and Type: -
     * OutputParams and Type: -
     */
    function view() {
        $id = $this->uri->segment(4);
        if (!$id)
            $id = $this->input->post('show_id', TRUE);
        if (!$id)
            redirect($this->config->item('admin_path') . 'companies/', 'location');
        $data = $this->general_model->get_single_row_by_id(TBL_companies, 'show_id', $id, 'array');
        $country = $this->general_model->get_single_row_by_id(TBL_COUNTRIES, 'id', $data['country'], 'array');
        $data['country'] = $country['country_name'];
        $region = $this->general_model->get_single_row_by_id(TBL_REGIONS, 'id', $data['region'], 'array');
        $data['region'] = $region['region'];
        $data['user'] = $this->general_model->get_single_row_by_id('tbl_users', 'user_id_PK', $data['user_id'], 'array');
        if ($data == FALSE)
            redirect($this->config->item('admin_path') . 'companies/', 'location');

        $data['page_title'] = 'Company details';
        $data['view'] = 'companies/show_view';
        $this->template->colorbox_page($data);
    }
    

    /* Methodname:  delete
     * Date created:October 14, 2017
     * Created by:Hemant Jaiswal
     * Purpose: delete show information
     * InputParams and Type: -
     * OutputParams and Type: -
     */
    public function delete() {
        $id = $this->uri->segment(4);

        //delete sale
        $this->general_model->delete(TBL_companies, 'show_id', $id);
        redirect($this->config->item('admin_path') . 'companies/', 'location');
    }
    
    public function company_delete($id)
	{
//        $data = array(
//				'is_deleted' => 1,
//			);
        $data1 = array(
				'isdeleted' => 1,
			);
                $this->companies_model->delete_by_id($id,$data1);
		echo json_encode(array("status" => TRUE));
	}
        
         public function ajax_edit($id)
		{
			$data = $this->companies_model->get_by_id($id);
			echo json_encode($data);
		}
                
                public function companies_update()
                {
//                echo $data;
                   $id=$this->input->post('id');
		$data = array(
				'company_name' => $this->input->post('name'),
				'owner_name' => $this->input->post('owner'),
				'registration_no' => $this->input->post('registration'),
			);
                $data1 = array(
				'phone' => $this->input->post('phone'),
				'address' => $this->input->post('address'),
				'email' => $this->input->post('email'),
                                'is_active' => $this->input->post('active'),
				'password' => md5($this->input->post('password')),
			);

		$this->companies_model->company_update($id, $data,$data1);
//                echo $data;
		echo json_encode(array("status" => TRUE));
                }
}

/* End of file companies.php  */
/* Location: ./application/controllers/admin/companies.php */