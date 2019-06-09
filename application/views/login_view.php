<?php
/*
*Filename:login_view.php
*projectname:sa4i
*Date created:October 16, 2017
*Created by:Hemant Jaiswal
*Purpose: This file is used load login template
*/
?>
<div class="loginColumns animated fadeInDown">
    <div class="row">
        <span class="logo"><img src="<?php echo site_url($this->config->item('images_path')); ?>logo.png"></span>
    </div>
    <div class="row">

        <div class="col-md-6">
            <h2 class="font-bold">xvxcvxcvxcvWelcome to <?php echo $this->config->item('site_name');?></h2>
            <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            <p>When an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            <p><small>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</small></p>
        </div>
        <div class="col-md-6">
            <div class="ibox-content">
                <h2>Login</h2>
                <form class="h2m-t login_form" name="company_login_form" id="company_login_form" role="form" action="<?php echo site_url('login/in'); ?>" method="post">
                    <div class="form-group">
                        <input type="email" name="email" id="email" size="20" maxlength="30" value="" class="form-control required email" placeholder="Username" required=""/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" size="20" maxlength="16" class="form-control required" placeholder="Password" required="" />
                    </div>
                    <input type="submit" class="btn btn-primary block full-width m-b" name="login" value="Login" title="Login" />
                    <a href="#">
                        <small>Forgot password?</small>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>

        
<script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.validate.js"></script> 
<script type="text/javascript" src="<?php echo site_url(); ?>js/additional-methods.js"></script>
<script>
$(document).ready(function(){

  $("#company_login_form").validate();

  /*setTimeout(function() {
  toastr.options = {
  closeButton: true,
  progressBar: true,
  showMethod: 'slideDown',
  timeOut: 4000
  };
  toastr.success('Add company', 'Welcome to SA4I');
  }, 1300);*/
});
</script>