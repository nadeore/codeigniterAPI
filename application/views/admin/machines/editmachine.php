<?php
/*
 * Filename:detail_view.php
 * projectname:sa4i
 * Date created:October 26, 2017
 * Created by:Hemant Jaiswal
 * Purpose: This file will display the machine detail form
 */
?>
 <!--<link href="<?php //echo site_url($this->config->item('theme_path')); ?>css/plugins/datapicker/datepicker3.css" rel="stylesheet">-->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <br><br><br>
        <h2><?php echo $page_title; ?></h2>
        <ol class="breadcrumb">
            <li>
                <?php echo anchor($this->config->item('admin_path') . 'dashboard', 'Home');?>
            </li>
            <li>
                <?php echo anchor($this->config->item('admin_path') . 'machines', 'Machines list');?>
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
				            echo form_open_multipart(site_url($this->config->item('admin_path') . 'machines/' . $action), $attributes);
				            ?>
                                           
                                <div class="form-group"><label class="col-sm-2 control-label required">Company Name<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                       
                                        <select name="company_name" class="form-control" id="company_name" required>
                                           <option>-- Select Company--</option>
                                                <?php foreach($addcompanies as $each){ ?>
                                               <option value= "<?php echo $each->company_id;?>"><?php echo $each->company_name; ?></option>
                                                <?php } ?>
                                    </select>
                                    </div>
                                    <?php echo form_error('company_name', "<div class=\"error\">", '</div>' . "\n"); ?>
                                </div>
                            <input type="hidden" name="id" id="id" placeholder="Machine Name" class="form-control" value="<?php if(isset($mdetails)) echo $mdetails->id; ?>">
                             <div class="hr-line-dashed"></div>
                               	<div class="form-group"><label class="col-sm-2 control-label required">Machine Name<span style="color: red">*</span></label>
                                    <div class="col-sm-10"><input type="text" name="machine_name" id="machine_name" placeholder="Machine Name" class="form-control required" value="<?php if(isset($mdetails)) echo $mdetails->machine_name; ?>"/></div>
                                    <?php echo form_error('machine_name', "<div class=\"error\">", '</div>' . "\n"); ?>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label required">Machine Type</label>
                                    <div class="col-sm-10"><input type="text" name="machine_type" id="machine_type" placeholder="Machine Type" class="form-control" value="<?php if(isset($mdetails))echo $mdetails->machine_type; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label required">Inventory Code<span style="color: red">*</span></label>
                                    <div class="col-sm-10"><input type="text" name="machine_code" id="machine_code" placeholder="Machine Code" class="form-control required" value="<?php if(isset($mdetails)) echo $mdetails->machine_code; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label required">Machine Description</label>
                                    <div class="col-sm-10"><textarea name="machine_description" id="machine_description" placeholder="Machine Description" class="form-control" value="<?php if(isset($mdetails)) echo $mdetails->machine_description; ?>"></textarea></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Inventory Number</label>
                                    <div class="col-sm-10"><input type="text" name="inventory_number" id="inventory_number" placeholder="Inventory Number" class="form-control" value="<?php if(isset($mdetails)) echo $mdetails->inventory_number; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                 <div class="form-group"><label class="col-sm-2 control-label required">Location</label>
                                    <div class="col-sm-10"><input type="text" name="location" id="location" placeholder="Location" class="form-control" value="<?php if(isset($mdetails)) echo $mdetails->location; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                 <div class="form-group"><label class="col-sm-2 control-label">Brand Name</label>
                                    <div class="col-sm-10"><input type="text" name="brand_name" id="brand_name" placeholder="Brand Name" class="form-control" value="<?php if(isset($mdetails)) echo $mdetails->brand_name; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                 <div class="form-group"><label class="col-sm-2 control-label required">Serial Number<span style="color: red">*</span></label>
                                    <div class="col-sm-10"><input type="text" name="serial_number" id="serial_number" placeholder="Serial Number" class="form-control required" value="<?php if(isset($mdetails)) echo $mdetails->serial_number; ?>"></div>
                                     <?php echo form_error('serial_number', "<div class=\"error\">", '</div>' . "\n"); ?>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label required">Date Of Proof</label>
                                    <div class="col-sm-10"><input type="date" name="date_of_proof" id="date_of_proof" placeholder="Date Of Proof" class="form-control" value="<?php if(isset($mdetails)) echo $mdetails->date_of_proof; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label required">Next Check</label>
                                    <div class="col-sm-10"><input type="date" name="next_check" id="next_check" placeholder="Next Check" class="form-control" value="<?php if(isset($mdetails)) echo $mdetails->next_check; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                 <div class="form-group"><label class="col-sm-2 control-label required">Date Of Buy</label>
                                    <div class="col-sm-10"><input type="date" name="date_of_buy" id="date_of_buy" placeholder="Date of Buy" class="form-control" value="<?php if(isset($mdetails)) echo $mdetails->date_of_buy; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group" ><label class="col-sm-2 control-label required">Price</label>
                                    <div class="col-sm-10"><input type="int" name="price" id="price" placeholder="Price" class="form-control" value="<?php if(isset($mdetails)) echo $mdetails->price; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                                 <div class="row col-md-12" style="margin-top: 20px;    margin-left: 25%;" >
                                <div class="col-md-4 file-box">
                                    <p><img src="http://sa4i.leoinfotech.in/uploads/<?php if(isset($mdetails)) echo $mdetails->url;?>" height="150" width="150" /></p>
                                    <input class="input-group" type="file" name="picture" accept="image/*" />
                                </div>
                            
                            <div class="col-md-4 file-box">
                                <p><img src="http://sa4i.leoinfotech.in/uploads/<?php if(isset($mdetails)) echo $mdetails->description;?>" height="150" width="150" /></p>
                                    <input class="input-group" type="file" name="picture1" accept="image/*" />
                            </div>
                            <div class=" col-md-4 file-box">
                                <p><iframe  src="http://sa4i.leoinfotech.in/uploads/<?php if(isset($mdetails)) echo $mdetails->title;?>" height="150" width="150" ></iframe ></p>
                                    <input class="input-group" type="file" name="picture2" />
                            </div>
                            
                        </div>
                                <div style="float: right;" ><i>* Indicates Required fields</i></div>
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
<!--<script src="<?php //echo site_url($this->config->item('theme_path')); ?>js/plugins/datapicker/bootstrap-datepicker.js"></script>-->

 
<script>
$(document).ready(function(){

	$("#machine_form").validate();
        
         $('#data_1 .input-group.date').datepicker({
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