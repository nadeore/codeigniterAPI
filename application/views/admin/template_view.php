<?php
/*
*Filename:template_view.php
*projectname:sa4i
*Date created:October 14, 2017
*Created by:Hemant Jaiswal
*Purpose: This file is used to load full template
*/

if(!empty($header) && $this->session->userdata('admin_id')) echo $header;
//if(!empty($header_bar)) echo $header_bar;
//if(!empty($navigator) && $this->session->userdata('admin_id')) echo $navigator; 
if(!empty($main_content)) echo $main_content;
if(!empty($toastr)) echo $toastr;
//if(!empty($footer_bar)) echo $footer_bar;
if(!empty($footer) && $this->session->userdata('admin_id')) echo $footer;