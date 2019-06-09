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


        <div class="col-md-12">
            <div class="ibox-content">
                <h2>Contact Us</h2>
        <form class="h2m-t login_form" name="company_login_form" id="company_login_form" role="form" action="<?php echo site_url('Contactus/send_mail'); ?>" method="post">
                   <div class="form-group">
                        <input type="text" name="cname" id="cname" value="" class="form-control required email" placeholder="Company Name" required=""/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="cperson" id="cperson" class="form-control required email" placeholder="Contact Person" required=""/>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control required email" placeholder="Email Address" required=""/>
                    </div>
                     <div class="form-group">
                         <input type="text" name="mobile" id="mobile" class="form-control required email" placeholder="Telefon Number" required="" maxlength="10"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="street" id="street" class="form-control required email" placeholder="Street With Number" required=""/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="zipcode" id="zipcode" class="form-control required email" placeholder="Zip code with city" required=""/>
                    </div>
<!--                    <div class="form-group">
                        <textarea name="message" id="message" placeholder="Message" class="form-control required"></textarea>
                    </div>-->
                    <input type="submit" class="btn btn-primary block full-width m-b" name="login" value="SEND MAIL" title="Login" />
                    
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