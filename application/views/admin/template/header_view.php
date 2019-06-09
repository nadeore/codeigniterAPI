<?php
/*
 * Filename:header_view.php
 * projectname:sa4i
 * Date created:October 14, 2017
 * Created by:Hemant Jaiswal
 * Purpose: This file is used for header content of the page
 */
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo $this->config->item('site_name'); ?> | <?php echo $page_title; ?></title>

 
    <link href="<?php echo site_url($this->config->item('theme_path')); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo site_url($this->config->item('theme_path')); ?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="<?php echo site_url($this->config->item('theme_path')); ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo site_url($this->config->item('theme_path')); ?>css/style.css" rel="stylesheet">
    <link href="<?php echo site_url($this->config->item('css_path')); ?>style.css" rel="stylesheet">
    

    <script src="<?php echo site_url($this->config->item('theme_path')); ?>js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo site_url($this->config->item('theme_path')); ?>js/bootstrap.min.js"></script>

    
    <script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/select2/select2.full.min.js"></script>
    <script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/cropper/cropper.min.js"></script>
    <script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo site_url($this->config->item('images_path')); ?>profile_small.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Robert</strong>
                             </span>
                                <!--<span class="text-muted text-xs block"> Director <b class="caret"></b></span>--> 
                            </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <!-- <li><a href="profile.html">Profile</a></li>
                                <li class="divider"></li> -->
                                <li><?php echo anchor($this->config->item('admin_path') . 'login/out', 'Logout');?></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            <?php echo $this->config->item('site_name');?>
                        </div>
                    </li>
                    <li>
                        <?php echo anchor($this->config->item('admin_path') . 'dashboard', '<i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span>');?>
                    </li>
                    <li>
                        <?php echo anchor($this->config->item('admin_path') . 'companies', '<i class="fa fa-group"></i><span class="nav-label">Companies</span>');?>
                    </li>
                    <li>
                        <?php echo anchor($this->config->item('admin_path') . 'machines', '<i class="fa fa-group"></i><span class="nav-label">Machines</span>');?>
                    </li>
                    <li>
                        <?php echo anchor($this->config->item('admin_path') . 'machines/nfc', '<i class="fa fa-group"></i><span class="nav-label">NFC Request</span>');?>
                    </li>
                    
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome to <?php echo $this->config->item('site_name');?></span>
                        </li>
                        <li>
                            <?php echo anchor($this->config->item('admin_path') . 'login/out', '<i class="fa fa-sign-out"></i> Log out');?>
                        </li>
                    </ul>
                </nav>
            </div>