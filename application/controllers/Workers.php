<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * Classname:workers.php
 * projectname:sa4i
 * Date created:October 26, 2017
 * Created by:Hemant Jaiswal
 * Purpose: This file/class will handle the workers 
 */

class Workers extends CI_Controller {
    /* Methodname:  __construct
     * Date created:October 26, 2017
     * Created by:Hemant Jaiswal
     * Purpose: Perform common action for class at load 
     * InputParams and Type: -
     * OutputParams and Type: -
     */

    
    public function __construct() {
        parent::__construct();
        $this->load->library('upload');
        if (!$this->session->userdata('user_id'))
            redirect('login', 'location');
        
        // Expire the page on back button click
        $this->general->expire_page();

        //load workers model
        $this->load->model('workers_model');
    }
    

    /* Methodname:  index
     * Date created:October 26, 2017
     * Created by:Hemant Jaiswal
     * Purpose: This function open the workers grid
     * InputParams and Type: -
     * OutputParams and Type: -
     */
    public function index() {
        $data['page_title'] = 'Workers list';
        $data['view'] = 'workers/grid_view';
        $data['workers'] = $this->workers_model->fetch_workers();
        $this->template->load_page1($data);
    }
    

    /* Methodname:  browse
     * Date created:October 26, 2017
     * Created by:Hemant Jaiswal
     * Purpose: This function open the workers grid
     * InputParams and Type: -
     * OutputParams and Type: -
     */
    public function browse() {
        $data_workers = new stdClass();
        $data_workers->page = false;
        $req_param = array (
            "sort_by" => $this->input->post( "sidx", TRUE ),
            "sort_direction" => $this->input->post( "sord", TRUE ),
            "page" => $this->input->post( "page", TRUE ),
            "num_rows" => $this->input->post( "rows", TRUE ),
            "search" => $this->input->post( "_search", TRUE ),
            "workers_search_field" => $this->input->post( "workers_search_field", TRUE ),
            "workers_search_value" => $this->input->post( "workers_search_value", TRUE )
        );

        $data_workers->page = $this->input->post( "page", TRUE );
        $data_workers->records = count ($this->workers_model->fetch_workers($req_param,"all",true)->result_array());
        $data_workers->total = ceil ($data_workers->records /$this->input->post( "rows", TRUE ) );
        $show_records = $this->workers_model->fetch_workers($req_param)->result_array();
        $data_workers->rows = $show_records;
        echo json_encode ($data_workers );
    }
    

    /* Methodname:  add
     * Date created:October 26, 2017
     * Created by:Hemant Jaiswal
     * Purpose: This function will add new workers
     * InputParams and Type: -
     * OutputParams and Type: -
     */
    public function add() {

        if ($this->input->post('submit')) {

            //Setting up validations
            $this->load->library('form_validation');
            $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
            //$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
//            $this->form_validation->set_rules('phone', 'Phone Number', 'required|trim|numeric');
//            $this->form_validation->set_rules('address', 'Address', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_users.email]');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');

            if ($this->form_validation->run() == FALSE){
                $this->_drawAddForm();
            }
            else {
                $data = $this->_getFormValues();
                $data['user_role'] = 4;
                $data['company_id'] = $this->session->userdata('user_id');
                $data['verified'] = 1;
                $workerId = $this->general_model->add('tbl_users', $data);

                $this->session->set_flashdata('add_success', 'Worker details added successfully.');
                redirect('workers', 'location');
            }
        }
        else
            $this->_drawAddForm();
    }

    
    /* Methodname:  modify
     * Date created:October 26, 2017
     * Created by:Hemant Jaiswal
     * Purpose: This function will modify workers detail
     * InputParams and Type: -
     * OutputParams and Type: -
     */
    public function modify() {

        if ($this->input->post('submit')) {
            //Setting up validations
            $this->load->library('form_validation');
            $this->form_validation->set_rules('show_name', 'Worker name', 'required|trim');
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
                $this->general_model->modify(TBL_workers, 'show_id', $data['show_id'], $data);
                $this->session->set_flashdata('edit_success', 'Worker details edited successfully.');
                redirect('workers/modify/' . $data['show_id'], 'location');
            }
        }
        else
            $this->_drawUpdateForm();
    }

    
    /* Methodname:  _drawAddForm
     * Date created:October 26, 2017
     * Created by:Hemant Jaiswal
     * Purpose: This function will open add worker form
     * InputParams and Type: -
     * OutputParams and Type: -
     */
    private function _drawAddForm() {

        $data = $this->_getFormValues();

        $data['action'] = 'add';
        $data['page_title'] = 'Worker details';
        $data['view'] = 'workers/detail_view';
        $this->template->load_page1($data);
    }

    
    /* Methodname:  _drawUpdateForm
     * Date created:October 26, 2017
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
                redirect('workers/', 'location');
            $data = $this->general_model->get_single_row_by_id(TBL_workers, 'show_id', $id, 'array');
            if ($data == FALSE)
                redirect('workers/', 'location');
        }
        $data['action'] = 'modify';
        $data['page_title'] = 'Worker details';
        $data['countriesList'] = $this->general_model->getCountries();
        $data['stateList'] = $this->general_model->getRegions();
        $data['view'] = 'workers/detail_view';
        $this->template->load_page($data);
    }
    

    /* Methodname:  _getFormValues
     * Date created:October 26, 2017
     * Created by:Hemant Jaiswal
     * Purpose: Get the form values
     * InputParams and Type: -
     * OutputParams and Type: $data:array
     */
    private function _getFormValues() {
        if ($this->input->post('id', TRUE))
            $data['id'] = $this->input->post('id', TRUE);
        $data['first_name'] = $this->input->post('first_name', TRUE);
        $data['last_name'] = $this->input->post('last_name', TRUE);
        $data['phone'] = $this->input->post('phone', TRUE);
        $data['address'] = $this->input->post('address', TRUE);
        $data['email'] = $this->input->post('email', TRUE);
        $data['password'] = md5($this->input->post('password', TRUE));
        return $data;
    }
    

    /* Methodname:  view
     * Date created:October 26, 2017
     * Created by:Hemant Jaiswal
     * Purpose: view the worker details
     * InputParams and Type: -
     * OutputParams and Type: -
     */
    function view() {
        $id = $this->uri->segment(4);
        if (!$id)
            $id = $this->input->post('show_id', TRUE);
        if (!$id)
            redirect('workers/', 'location');
        $data = $this->general_model->get_single_row_by_id(TBL_workers, 'show_id', $id, 'array');
        $country = $this->general_model->get_single_row_by_id(TBL_COUNTRIES, 'id', $data['country'], 'array');
        $data['country'] = $country['country_name'];
        $region = $this->general_model->get_single_row_by_id(TBL_REGIONS, 'id', $data['region'], 'array');
        $data['region'] = $region['region'];
        $data['user'] = $this->general_model->get_single_row_by_id('tbl_users', 'user_id_PK', $data['user_id'], 'array');
        if ($data == FALSE)
            redirect('workers/', 'location');

        $data['page_title'] = 'Worker details';
        $data['view'] = 'workers/show_view';
        $this->template->colorbox_page($data);
    }
    

    /* Methodname:  delete
     * Date created:October 26, 2017
     * Created by:Hemant Jaiswal
     * Purpose: delete show information
     * InputParams and Type: -
     * OutputParams and Type: -
     */
    public function delete() {
        $id = $this->uri->segment(4);

        //delete sale
        $this->general_model->delete(TBL_workers, 'show_id', $id);
        redirect('workers/', 'location');
    }
     public function ajax_edit($id)
		{
			$data = $this->workers_model->get_by_id($id);
			echo json_encode($data);
		}
                
                public function book_update()
                {
//                echo $data;
                   $id=$this->input->post('book_id');
                 
		$data = array(
				'first_name' => $this->input->post('wfname'),
				'last_name' => $this->input->post('wlname'),
				'email' => $this->input->post('wemail'),
				'phone' => $this->input->post('wphone'),
                                'address' => $this->input->post('waddress'),
                                'password' => md5($this->input->post('wpassword')),
                                'is_active' => $this->input->post('active'),
			);

		$this->workers_model->b_update($id, $data);
//                echo $data;
		echo json_encode(array("status" => TRUE));
                }
                
                 public function worker_delete($id)
	{
                $data = array(
				'isdeleted' => 1,
			);
                $this->workers_model->delete_by_id($id, $data);
		echo json_encode(array("status" => TRUE));
	}
}

/* End of file workers.php  */
/* Location: ./application/controllers/admin/workers.php */