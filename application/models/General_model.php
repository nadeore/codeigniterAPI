<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Classname:general_model.php
 * projectname:SA4I
 * Date created:October 16, 2017
 * Created by:Hemant Jaiswal
 * Purpose: Most commonly used database related functions.
 */

class General_model extends CI_Model {
    /* Methodname:  __construct
     * Date created:October 16, 2017
     * Created by:Hemant Jaiswal
     * Purpose: Perform common action for class at load 
     * InputParams and Type: -
     * OutputParams and Type: -
     */

    public function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    /* Methodname:  add
     * Date created:October 16, 2017
     * Created by:Hemant Jaiswal
     * Purpose: Add new record
     * InputParams and Type: $tblname:string,  $data:array
     * OutputParams and Type: $id:int
     */

    public function add($tblname, $data) {

        

        
        $this->db->insert($tblname, $data);
        return $this->db->insert_id();
    }

    /* Methodname:  modify
     * Date created:October 16, 2017
     * Created by:Hemant Jaiswal
     * Purpose: Update record
     * InputParams and Type: $tblname:string,  $colname:string, $id:int, $data:array
     * OutputParams and Type: bool
     */

    public function modify($tblname, $colname, $id, $data) {
        $this->db->where($colname, $id);
        $this->db->update($tblname, $data);
        return TRUE;
    }

    /* Methodname:  delete
     * Date created:October 16, 2017
     * Created by:Hemant Jaiswal
     * Purpose: Delete record
     * InputParams and Type: $tblname:string,  $colname:string, $id:int
     * OutputParams and Type: bool
     */

    public function delete($tblname, $colname, $id) {
        $this->db->where($colname, $id);
        $this->db->delete($tblname);
        return TRUE;
    }

    /* Methodname:  get_single_row_by_id
     * Date created:October 16, 2017
     * Created by:Hemant Jaiswal
     * Purpose:  To get single row of table by a id 
     * InputParams and Type: $tblName:string, $colname:string, $id:int, $returnType:string
     * OutputParams and Type: array:object
     */

    public function get_single_row_by_id($tblName, $colname, $id, $returnType = '') {
        $this->db->where($colname, $id);
        $result = $this->db->get($tblName);
        if ($result->num_rows() > 0) {
            if ($returnType == 'array')
                return $result->row_array();
            else
                return $result->row();
        }
        else
            return FALSE;
    }

    /* Methodname:  username_check
     * Date created:October 16, 2017
     * Created by:Hemant Jaiswal
     * Purpose: Function to check unique username apart from current
     * InputParams and Type: $username:string, $id:int
     * OutputParams and Type: -
     */

    public function username_check($username, $id) {
        $this->db->where('username', $username);
        $this->db->where_not_in('user_id_PK', $id);
        $result = $this->db->get(TBL_USERS);
        if ($result->num_rows() > 0)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    /* Methodname:  admin_email
     * Date created:October 16, 2017
     * Created by:Hemant Jaiswal
     * Purpose: Function to get admin email
     * InputParams and Type: 
     * OutputParams and Type: string
     */

    public function admin_email() {
        $this->db->where('user_id_PK', 1);
        $result = $this->db->get(TBL_USERS);
        if ($result->num_rows() > 0) {
            $email = $result->row();
            return $email->email;
        }
        else
            return FALSE;
    }

    /* Methodname:  randomPrefix
     * Date created:October 16, 2017
     * Created by:Hemant Jaiswal
     * Purpose: Function is for generate random string
     * InputParams and Type: 
     * OutputParams and Type: string
     */

    public function randomPrefix($length) {
        $random = "";
        srand((double) microtime() * 1000000);

        $data = "AbcDE123IJKLMN67QRSTUVWXYZ";
        $data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
        $data .= "0FGH45OP89";

        for ($i = 0; $i < $length; $i++) {
            $random .= substr($data, (rand() % (strlen($data))), 1);
        }

        return $random;
    }

    /* Methodname:  getCountries
     * Date created:October 16, 2017
     * Created by:Hemant Jaiswal
     * Purpose: Function is for get country list
     * InputParams and Type: 
     * OutputParams and Type: 
     */
    public function getCountries() {
        $this->db->select('id, country_name, internet'); 
        $result = $this->db->get(TBL_COUNTRIES);
        if ($result->num_rows() > 0 )
            return $result->result_array();
        else
            return FALSE;
    }

    /* Methodname:  getRegions
     * Date created:October 16, 2017
     * Created by:Hemant Jaiswal
     * Purpose: Function is for get region list
     * InputParams and Type: 
     * OutputParams and Type: 
     */
    public function getRegions($countryId = NULL) {
        if (isset($countryId) && $countryId != '') {
            $html = '<option value="">--Select State--</option> ';

            $countryData = $this->get_single_row_by_id(TBL_COUNTRIES, 'id', $countryId, 'array');

            $this->db->select('id, country_id, region, code'); 
            $this->db->where('country_id', $countryData['id']);
            $result = $this->db->get(TBL_REGIONS);
            if ($result->num_rows() > 0 )
            $data = $result->result_array();
            
            if (is_array($data) && !empty($data)) {
                foreach ($data as $states) {
                    if ($countryData['country_name'] != $states['region'])
                        $html .= '<option value="' . $states['id'] . '">' . $states['region'] . '</option>';
                }
            } else {
                $html = '';
                $html .= '<option value="">No States Available</option>';
            }
            return $html;
        } else {
            $this->db->select('id, country_id, region, code'); 
            $result = $this->db->get(TBL_REGIONS);
            if ($result->num_rows() > 0 )
                return $result->result_array();
            else
                return FALSE;
        }
    }

    /* Methodname:  getCities
     * Date created:October 16, 2017
     * Created by:Hemant Jaiswal
     * Purpose: Function is for get city list
     * InputParams and Type: 
     * OutputParams and Type: 
     */
    /*public function getCities($regionId = NULL) {
        $regionId = $this->input->post('regionId');
        if (isset($regionId) && $regionId != '') {
            $html = '<option value="">--Select City--</option> ';

            $regionData = $this->get_single_row_by_id(TBL_REGIONS, 'id', $regionId, 'array');

            $this->db->select('	id, country_id, region_id, city, Code'); 
            $this->db->where('region_id', $regionData['id']);
            $result = $this->db->get(TBL_CITIES);
            if ($result->num_rows() > 0 )
            $data = $result->result_array();
            if (is_array($data) && !empty($data)) {
                foreach ($data as $cities) {
                    if ($regionData['region'] != $cities['city'])
                        $html .= '<option value="' . $cities['id'] . '">' . $cities['city'] . '</option>';
                }
            } else {
                $html = '';
                $html .= '<option value="">No Cities Available</option>';
            }
            return $html;
        } else {
            $this->db->select('	id, country_id, region_id, city, Code'); 
            $result = $this->db->get(TBL_CITIES);
            if ($result->num_rows() > 0 )
                return $result->result_array();
            else
                return FALSE;
        }
    }*/

}

/* End of file general_model.php */
/* Location: ./application/models/general_model.php */