<?php
/*
 * Filename:detail_view.php
 * projectname:sa4i
 * Date created:October 14, 2017
 * Created by:Hemant Jaiswal
 * Purpose: This file will display the show detail form
 */
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2><?php echo $page_title; ?></h2>
        <ol class="breadcrumb">
            <li>
                <?php echo anchor($this->config->item('admin_path') . 'dashboard', 'Home');?>
            </li>
            <li>
                <?php echo anchor($this->config->item('admin_path') . 'companies', 'Companies list');?>
            </li>
            <li class="active">
            	<strong><?php echo $page_title; ?></strong>
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add Company</h5>
                        </div>
                        <div class="ibox-content">
                        	<?php
				            $attributes = array('name' => 'company_form', 'id' => 'company_form', 'class' => 'form-horizontal');
				            echo form_open_multipart(site_url($this->config->item('admin_path') . 'companies/' . $action), $attributes);
				            ?>
                                
                               	<div class="form-group"><label class="col-sm-2 control-label">Name<span style="color: red">*</span></label>
                                    <div class="col-sm-10"><input type="text" name="company_name" id="company_name" placeholder="Company Name" class="form-control required"></div>
                                    <?php echo form_error('company_name', "<div class=\"error\">", '</div>' . "\n"); ?>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Owner</label>
                                    <div class="col-sm-10"><input type="text" name="owner_name" id="owner_name" placeholder="Owner Name" class="form-control"></div>
                                    <?php // echo form_error('owner_name', "<div class=\"error\">", '</div>' . "\n"); ?>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Registration Number<span style="color: red">*</span></label>
                                    <div class="col-sm-10"><input type="text" name="registration_no" id="registration_no" placeholder="Registration Number" class="form-control"></div>
                                    <?php echo form_error('registration_no', "<div class=\"error\">", '</div>' . "\n"); ?>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Phone</label>
                                    <div class="col-sm-10"><input type="text" name="phone" id="phone" placeholder="Phone Number" class="form-control"></div>
                                    <?php // echo form_error('phone', "<div class=\"error\">", '</div>' . "\n"); ?>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Address</label>
                                    <div class="col-sm-10"><textarea name="address" id="address" placeholder="Address" class="form-control"></textarea></div>
                                    <?php // echo form_error('address', "<div class=\"error\">", '</div>' . "\n"); ?>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group" ><label class="col-sm-2 control-label">Email<span style="color: red">*</span></label>
                                    <div class="col-sm-10"><input type="text" name="email" autocomplete="nope" id="email" placeholder="Email" class="form-control required email" ></div>
                                    <?php echo form_error('email', "<div class=\"error\">", '</div>' . "\n"); ?>
                                </div>
                                <div class="hr-line-dashed"></div>

                             	<div class="form-group" ><label class="col-sm-2 control-label">Password<span style="color: red">*</span></label>
                             		<div class="col-sm-10"><input type="password" name="password" id="password" placeholder="Password" class="form-control required" ></div>
                             		<?php echo form_error('password', "<div class=\"error\">", '</div>' . "\n"); ?>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <input type="reset" name="reset" value="Clear" title="Clear" class="btn btn-white" />
                                        <input type="submit" name="submit" id="submit" value="Save changes" title="Save changes" class="btn btn-primary" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.validate.js"></script> 
<script type="text/javascript" src="<?php echo site_url(); ?>js/additional-methods.js"></script>
<script>
$(document).ready(function(){
//        $('input').attr('autocomplete', 'off');
	$("#company_form").validate();

    /*setTimeout(function() {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 4000
        };
        toastr.success('Add company', 'Welcome to SA4I');
    }, 1300);*/

    $('#loading-example-btn').click(function () {
        btn = $(this);
        simpleLoad(btn, true)

        // Ajax example
//                $.ajax().always(function () {
//                    simpleLoad($(this), false)
//                });

        simpleLoad(btn, false)
    });
});

function simpleLoad(btn, state) {
    if (state) {
        btn.children().addClass('fa-spin');
        btn.contents().last().replaceWith(" Loading");
    } else {
        setTimeout(function () {
            btn.children().removeClass('fa-spin');
            btn.contents().last().replaceWith(" Refresh");
        }, 2000);
    }
}
</script>