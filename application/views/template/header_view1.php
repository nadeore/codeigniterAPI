<?php
/*
*Filename:header_view.php
*projectname:SA4I
*Date created:October 16, 2017
*Created by:Hemant Jaiswal
*Purpose: This file is used for header content of the page
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SA4I - Landing Page</title>
     <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
  
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/af-2.2.2/b-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/af-2.2.2/b-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/datatables.min.js"></script>
<!--  <script src="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> </script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"> </script>-->
  
    <!-- Bootstrap core CSS -->
    <link href="<?php echo site_url($this->config->item('theme_path')); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="<?php echo site_url($this->config->item('theme_path')); ?>css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="<?php echo site_url($this->config->item('theme_path')); ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo site_url($this->config->item('theme_path')); ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo site_url($this->config->item('theme_path')); ?>css/style.css" rel="stylesheet">
   <link href="<?php echo site_url($this->config->item('theme_path')); ?>css/plugins/dataTables/datatables.min.css" rel="stylesheet">
<!--    <link href="<?php // echo site_url($this->config->item('theme_path')); ?>css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">
    
   


    Data picker 
   
 <script src="<?php // echo site_url($this->config->item('theme_path')); ?>js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>-->
    <style>
        .landing-page .navbar-default .nav li a {
  color: #1ab394;
  font-family: 'Open Sans', helvetica, arial, sans-serif;
  font-weight: 700;
  letter-spacing: 1px;
  text-transform: uppercase;
  font-size: 14px;
}
    </style>
</head>
<body id="page-top" class="landing-page no-skin-config">
<div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php echo anchor('', 'SA4I', array('class'=>'navbar-brand'));?>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
<!--                        <li><a class="page-scroll" href="#page-top" >Home</a></li>
                        <li><a class="page-scroll" href="#features">Features</a></li>
                        <li><a class="page-scroll" href="#team">Team</a></li>
                        <li><a class="page-scroll" href="#testimonials">Testimonials</a></li>
                        <li><a class="page-scroll" href="#pricing">Pricing</a></li>-->
                        <!--<li><a class="page-scroll" href="#contact">Contact</a></li>-->
                        <?php if($this->session->userdata('user_id')){?>
                            <li><?php echo anchor('workers', 'Workers', array('class'=>'page-scroll'));?></li>
                            <li><?php echo anchor('machines', 'Machines', array('class'=>'page-scroll'));?></li>
                            <li><?php echo anchor('book_machine', 'Book Machine', array('class'=>'page-scroll'));?></li>
                            <li><?php echo anchor('booklist', 'Booking List', array('class'=>'page-scroll'));?></li>
                            <li><?php echo anchor('login/out', 'Logout', array('class'=>'page-scroll'));?></li>
                        <?php } else {?>
                            <li><?php echo anchor('login', 'Login', array('class'=>'page-scroll'));?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
</div>