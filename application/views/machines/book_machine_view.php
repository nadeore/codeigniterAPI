<?php
/*
 * Filename:detail_view.php
 * projectname:sa4i
 * Date created:October 26, 2017
 * Created by:Hemant Jaiswal
 * Purpose: This file will display the machine detail form
 */
?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="<?php echo site_url($this->config->item('theme_path')); ?>css/plugins/datapicker/datepicker3.css" rel="stylesheet">  

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <br><br><br>
        <h2><?php echo $page_title; ?></h2>
        <ol class="breadcrumb">
            <li>
                <?php echo anchor('home', 'Home');?>
            </li>
            <li>
                <?php echo anchor('machines', 'Book Machines');?>
            </li>
            <li class="active">
            	<strong><?php echo $page_title; ?></strong>
            </li>
        </ol>
    </div>
</div>
                        <div class="ibox-title">
                            <h5>Book machine</h5>
                        </div>
                       
                        
                        
                        <div class="ibox-content">
                            
                        	<?php
				            $attributes = array('name' => 'machine_form', 'id' => 'machine_form', 'class' => 'form-horizontal');
				            echo form_open_multipart(site_url('book_machine/' . $action), $attributes);
//				            ?>
                            
                                <div class="form-group"><label class="col-sm-2 control-label">Machine Name</label>
                                    <div class="col-sm-10">
                                       
                                        <select name="machine_name" class="form-control" id="machine_name">
                                           <option>-- Select --</option>
                                                <?php foreach($bookmachine as $each){ ?>
                                               <option value= "<?php echo $each['id']; ?>" name="<?php echo $each['id']; ?>"><?php echo $each['machine_name']; ?></option>
                                                <?php } ?>
                                    </select>
                                    </div>
                                    <?php echo form_error('machine_name', "<div class=\"error\">", '</div>' . "\n"); ?>
                                </div>
                                <div class="hr-line-dashed"></div>

                                 <div class="form-group" id="data_1"><label class="col-sm-2 control-label">Start Date</label>
                                    <div class="col-sm-10">
                                        <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" name="start_date" id="start_date" value="<?php echo date('Y-m-d');?>">
                                    <?php echo form_error('start_date', "<div class=\"error\">", '</div>' . "\n"); ?>
                                </div>
                                    </div>
                                    
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                                <div class="form-group" id="data_2"><label class="col-sm-2 control-label">End Date</label>
                                    <div class="col-sm-10">
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" class="form-control" placeholder="Select Date" name="end_date" id="end_date">
                                             <?php echo form_error('end_date', "<div class=\"error\">", '</div>' . "\n"); ?>
                                </div>
                                    </div>
                                   
                                </div>
                                
                                <div class="hr-line-dashed"></div>

                                 <div class="form-group"><label class="col-sm-2 control-label">Comment</label>
                                    <div class="col-sm-10"><input type="text" name="comment" id="comment" placeholder="Comment" class="form-control required">
                                    <?php echo form_error('comment', "<div class=\"error\">", '</div>' . "\n"); ?></div>
                                    
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
<!-- <script src="<?php // echo site_url($this->config->item('theme_path')); ?>js/jquery-3.1.1.min.js"></script>
 <script src="<?php // echo site_url($this->config->item('theme_path')); ?>js/bootstrap.min.js"></script>-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--<script type="text/javascript" src="<?php // echo site_url(); ?>js/jquery.validate.js"></script> 
<script type="text/javascript" src="<?php // echo site_url(); ?>js/additional-methods.js"></script>-->
<script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/cropper/cropper.min.js"></script>
    <script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
<script>
$(document).ready(function(){

//	$("#machine_form").validate();
        
        
        $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
            
            $('#data_2 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

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