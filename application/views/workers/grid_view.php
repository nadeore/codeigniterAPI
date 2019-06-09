<?php
/*
 * Filename:grid_view.php
 * projectname:sa4i
 * Date created:October 27, 2017
 * Created by: Hemant Jaiswal
 * Purpose: This file will show the workers grid
 */
?>
<style>
    div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    margin-top: -30px;
}
</style>

<div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">
            <div class="ibox">
                <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2><?php echo $page_title; ?></h2>
        <ol class="breadcrumb">
            <li>
                <?php echo anchor('home', 'Home');?>
            </li>
            <li class="active">
                <strong><?php echo $page_title; ?></strong>
            </li>
        </ol>
    </div>
</div>
                <div class="ibox-title">
                    <h5>All workers assigned to this account</h5>
                    <div class="ibox-tools">
                        <?php echo anchor('workers/add', 'Add worker', array('class' => 'btn btn-primary btn-xs'));?>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="worker-list">

                        <table id="table_id" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th style="text-align: center">Worker Name</th>
                                    <th style="text-align: center">Phone</th>
                                    <th style="text-align: center">Email</th>
                                    <th style="text-align: center">Status</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php 
                                if ($workers) { 
                                    foreach ($workers as $worker) {
                                    ?>
                                    <tr style="text-align: center">
                                        <td class="worker-name">
                                            <?php echo $worker->first_name." ".$worker->last_name; ?>
                                        </td>
                                        <td class="worker-phone">
                                            <?php echo $worker->phone; ?>
                                        </td>
                                        <td class="worker-email">
                                            <?php echo $worker->email; ?>
                                        </td>
                                        
                                        <td class="company-registration">
                                          <?php  if($worker->is_active == 1){
                                          echo " <span class=\"badge badge-primary\">Active</span>";
                                            }
                                            else{
                                          echo " <span class=\"badge badge-warning\">Inactive</span>";
                                       
                                        }
                                        ?></td>
                                        <td class="worker-actions">
                                            <button class="btn btn-outline btn-success btn-sm dim" onclick="view_worker(<?php echo $worker->id;?>)"><i class="fa fa-eye"></i></button>
                                            <button class="btn btn-outline btn-info btn-sm dim" onclick="edit_worker(<?php echo $worker->id;?>)"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-outline btn-danger btn-sm dim" onclick="workerConfirm(<?php echo $worker->id;?>)"><i class="fa fa-trash"></i></button>
                                            
                                        </td>
                                    </tr>
                                <?php }
                                } else {
                                    ?><tr><td colspan="6" align="centre">No worker found.</td></tr><?php
                                } 
                                ?>   
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h3 class="modal-title">Update Machine</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="myform" class="form-horizontal">
                    <input type="hidden" value="" name="book_id"/>
                        <div class="form-body">
                            <div class="form-group">
                               <label class="control-label col-md-3">First Name</label>
                                <div class="col-md-9">
                                    <input name="wfname"  placeholder="First Name" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3">Last Name</label>
                              <div class="col-md-9">
                                  <input name="wlname"  placeholder="Last Name" class="form-control" type="text">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3">Email</label>
                              <div class="col-md-9">
                                  <input name="wemail"  placeholder="Email" class="form-control" type="text">
                              </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Phone</label>
                                <div class="col-md-9">
                                    <input name="wphone"  placeholder="Phone" class="form-control" type="text">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-3">Address</label>
                                <div class="col-md-9">
                                    <input name="waddress"  placeholder="Address" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Change Password</label>
                                <div class="col-md-8">
                                    <label for="chkPassport">
                                        
                                    <input type="checkbox" id="chkPassport" />
                                    
                                </label>
                                </div>
                            </div>
                            <div class="form-group" id="chngepass" style="display: none">
                                <label class="control-label col-md-3">Password</label>
                                <div class="col-md-9">
                                    <input name="wpassword"  placeholder="Password" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Status</label>
                                <div class="col-md-9">
                                    <!--<input name="password"  placeholder="Brand Name" class="form-control" type="text">-->
                                    <select class="form-control" id="active" name="active">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                  </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btnSave1" onclick="update_save()" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                </form>
          </div> 
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<!-- <script type="text/javascript">

$(document).ready(function() {
   $('#table_id').DataTable( {
       dom: 'Bfrtip',
       buttons:[
           'csv', 'excel', 'pdf', 'print'
       ]
   } );
} );

</script>-->

<script type="text/javascript">
    $(function () {
        $("#chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#chngepass").show();
            } else {
                $("#chngepass").hide();
            }
        });
    });
</script>
<script>
$(document).ready(function(){
    $('#loading-example-btn').click(function () {
        btn = $(this);
        simpleLoad(btn, true)
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

function edit_worker(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/workers/ajax_edit/')?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="book_id"]').val(data.id);
            $('[name="wfname"]').val(data.first_name);
            $('[name="wlname"]').val(data.last_name);
            $('[name="wemail"]').val(data.email);
            $('[name="wphone"]').val(data.phone);
            $('[name="waddress"]').val(data.address);
//            $('[name="wpassword"]').val(data.password);
            $('[name="active"]').val(data.is_active);
//            $('[name="active"]').val(data.is_active);
 
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Update Worker Details'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
    
    function view_worker(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/workers/ajax_edit/')?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
             document.getElementById("wfname").innerHTML = data.first_name;
             document.getElementById("wlname").innerHTML = data.last_name;
             document.getElementById("wemail").innerHTML = data.email;
             document.getElementById("wphone").innerHTML = data.phone;
             document.getElementById("waddress").innerHTML = data.address;
//             document.getElementById("wpassword").innerHTML = data.password;
             
            $('#modal_form1').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Worker Details'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
    
    function update_save()
    {
          $.ajax({
            url : "<?php echo site_url('index.php/workers/book_update')?>",
            type: "POST",
            data:  $('#myform').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               $('#modal_form').modal('hide');
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }
    
    
    
    function workerConfirm(id)
    {
        bootbox.dialog({
        message: "Are you sure you want to Delete ?",
        title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
            buttons: {
                success: {
                label: "No",
                className: "btn-success",
                    callback: function() {
                    $('.bootbox').modal('hide');
                    }
                },
                danger: {
                label: "Delete!",
                className: "btn-danger",
                    callback: function() {
                        $.ajax({
                         url : "<?php echo site_url('index.php/workers/worker_delete/')?>/"+id,
                         type: "POST",
                         dataType: "JSON",
                        })
                        .done(function(response){
                            location.reload();
                        })
                    }
                }
            }
        });
    }
    
    
</script>

<div class="modal fade" id="modal_form1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Machine Details</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="book_id"/>
          <div class="form-body">
              <div class="row col-md-12">
            <div class="col-md-6 form-group">
              <label class="control-label col-md-6">First Name :</label>
              <div class="col-md-6">
                 <label name="wfname" id="wfname" class="control-label"></label>
              </div>
            </div>
              <div class="col-md-6 form-group">
              <label class="control-label col-md-6">Last Name :</label>
              <div class="col-md-6">
                 <label name="wlname" id="wlname" class="control-label"></label>
              </div>
            </div>
              </div>
               <div class="row col-md-12">
            <div class="col-md-6 form-group">
              <label class="control-label col-md-6">Email :</label>
              <div class="col-md-6">
                 <label name="wemail" id="wemail" class="control-label"></label>
              </div>
            </div>
              <div class="col-md-6 form-group">
              <label class="control-label col-md-6">Phone :</label>
              <div class="col-md-6">
                 <label name="wphone" id="wphone" class="control-label"></label>
              </div>
            </div>
              </div>
               <div class="row col-md-12">
            <div class="col-md-6 form-group">
              <label class="control-label col-md-6">Address</label>
              <div class="col-md-6">
                 <label name="waddress" id="waddress" class="control-label"></label>
              </div>
            </div>
<!--              <div class="col-md-6 form-group">
              <label class="control-label col-md-6">Password </label>
              <div class="col-md-6">
                 <label name="wpassword" id="wpassword" class="control-label"></label>
              </div>
            </div>-->
              </div> 
		<div class="form-group">

		</div>
 
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
    <div id="confirmDelete" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					
				</div>	
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title1">Delete this record</h4>	
                
			</div>
                    <div class="modal-body" style="font-family: 'Varela Round', sans-serif;">
				<p>Do you really want to delete this record?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-danger" onclick="delete_machine(<?php echo $worker->id;?>)"> Delete </button>
			</div>
		</div>
	</div>
</div>