<?php
/*
 * Filename:detail_view.php
 * projectname:sa4i
 * Date created:October 26, 2017
 * Created by:Hemant Jaiswal
 * Purpose: This file will display the machine detail form
 */
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2><?php echo $page_title; ?></h2>
        <ol class="breadcrumb">
            <li>
                <?php echo anchor('home', 'Home');?>
            </li>
            <li>
                <?php echo anchor('machines', 'Machines list');?>
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
                            <h5>Add machine</h5>
                        </div>
                        <div class="ibox-content">
                        	<?php
				            $attributes = array('name' => 'machine_form', 'id' => 'machine_form', 'class' => 'form-horizontal');
				            echo form_open_multipart(site_url('machines/' . $action), $attributes);
				            ?>
                               	<div class="form-group"><label class="col-sm-2 control-label">Machine Name</label>
                                    <div class="col-sm-10"><input type="text" name="machine_name" id="machine_name" placeholder="Machine Name" class="form-control required"></div>
                                    <?php echo form_error('machine_name', "<div class=\"error\">", '</div>' . "\n"); ?>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Machine Type</label>
                                    <div class="col-sm-10"><input type="text" name="machine_type" id="machine_type" placeholder="Machine Type" class="form-control required"></div>
                                    <?php echo form_error('machine_type', "<div class=\"error\">", '</div>' . "\n"); ?>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Machine Code</label>
                                    <div class="col-sm-10"><input type="text" name="machine_code" id="machine_code" placeholder="Machine Code" class="form-control required"></div>
                                    <?php echo form_error('machine_code', "<div class=\"error\">", '</div>' . "\n"); ?>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Machine Description</label>
                                    <div class="col-sm-10"><textarea name="machine_description" id="machine_description" placeholder="Machine Description" class="form-control required"></textarea></div>
                                    <?php echo form_error('machine_description', "<div class=\"error\">", '</div>' . "\n"); ?>
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

	$("#machine_form").validate();

    /*setTimeout(function() {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 4000
        };
        toastr.success('Add machine', 'Welcome to SA4I');
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