<?php
/*
 * Filename:grid_view.php
 * projectname:sa4i
 * Date created:October 14, 2017
 * Created by: Hemant Jaiswal
 * Purpose: This file will show the shows grid
 */
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2><?php echo $page_title; ?></h2>
        <ol class="breadcrumb">
            <li>
                <?php echo anchor($this->config->item('admin_path') . 'dashboard', 'Home');?>
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
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Nitin All companies assigned to this account</h5>
                    <div class="ibox-tools">
                        <?php echo anchor($this->config->item('admin_path') . 'companies/add', 'Add Company', array('class' => 'btn btn-primary btn-xs'));?>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row m-b-sm m-t-sm">
<!--                        <div class="col-md-1">
                            <button type="button" id="loading-example-btn" class="btn btn-white btn-sm" ><i class="fa fa-refresh"></i> Refresh</button>
                        </div>-->
<!--                        <div class="col-md-11">
                            <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span></div>
                        </div>-->
                    </div>

                    <div class="company-list">

                        <table id="table_id" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Company Name</th>
                                    <th>Company Owner</th>
                                    <th>Registration Number</th>
                                    <th>Email</th>
                                    <!--<th>Password</th>-->
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php 
                                if ($companies) { 
                                    foreach ($companies as $company) {
                                    ?>
                                    <tr>
                                        <td class="company-title">
                                            <?php echo $company->company_name; ?>
                                        </td>
                                        <td class="company-owne">
                                            <?php echo $company->owner_name; ?>
                                        </td>
                                        <td class="company-registration">
                                            <?php echo $company->registration_no; ?>
                                        </td>
                                        <td class="company-registration">
                                            <?php echo $company->email; ?>
                                        </td>
<!--                                        <td class="company-registration">
                                            <?php // echo $company->password; ?>
                                        </td>-->
                                        <td class="company-status">
                                            <?php if($company->is_active == 1){
                                                echo '<span class="badge badge-primary">Active</span>';
                                            }
                                             else
                                             {
                                                echo '<span class="badge badge-warning">Inactive</span>';
                                             }
                                            ?>
                                        </td>
                                        <td class="company-actions">
                                            
                                            <button class="btn btn-outline btn-success btn-sm dim" onclick="view_company(<?php echo $company->id;?>)"><i class="fa fa-eye"></i></button>
                                            <button class="btn btn-outline btn-info btn-sm dim" onclick="edit_company(<?php echo $company->id;?>)"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-outline btn-danger btn-sm dim" onclick="delete_company(<?php echo $company->id;?>)"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php }
                                } else {
                                    ?><tr><td colspan="6" align="centre">No Companies found.</td></tr><?php
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
   <script>
$(document).ready(function() {
   $('#table_id').DataTable();
} );

//$(document).ready(function() {
//   $('#table_id').DataTable( {
//       dom: 'Bfrtip',
//       buttons:[
//           'csv', 'excel', 'pdf', 'print'
//       ]
//   } );
//} );

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
function confirm()
    {
        $('#confirmDelete').modal('show');
    }
    function delete_company(id)
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
         url : "<?php echo site_url('index.php/admin/companies/company_delete')?>/"+id,
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
    
    function edit_company(id)
    {
      $.ajax({
        url : "<?php echo site_url('index.php/admin/companies/ajax_edit/')?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {          console.log(data.is_active);
            $('[name="id"]').val(data.id);
            $('[name="name"]').val(data.company_name);
            $('[name="owner"]').val(data.owner_name);
            $('[name="registration"]').val(data.registration_no);
            $('[name="phone"]').val(data.phone);
            $('[name="address"]').val(data.address);
            $('[name="email"]').val(data.email);
//            $('[name="password"]').val(data.password);
            $('[name="active"]').val(data.is_active);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Update Company'); // Set title to Bootstrap modal title
 
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
            url : "<?php echo site_url('index.php/admin/companies/companies_update')?>",
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
    function view_company(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
      $.ajax({
        url : "<?php echo site_url('index.php/admin/companies/ajax_edit/')?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
           debugger;
           console.log(data.is_active);
             document.getElementById("name").innerHTML = data.company_name;
             document.getElementById("owner").innerHTML = data.owner_name;
             document.getElementById("registration").innerHTML = data.registration_no;
             document.getElementById("phone").innerHTML = data.phone;
             document.getElementById("address").innerHTML = data.address;
             document.getElementById("email").innerHTML = data.email;
             
            $('#modal_form1').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Company Details'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
    
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

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h3 class="modal-title">Update Machine</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="myform" class="form-horizontal">
                    <input type="hidden" value="" name="id"/>
                        <div class="form-body">
                            <div class="form-group">
                               <label class="control-label col-md-3">Name</label>
                                <div class="col-md-9">
                                    <input name="name"  placeholder="Name" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3">Owner</label>
                              <div class="col-md-9">
                                  <input name="owner"  placeholder="Owner" class="form-control" type="text">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3">Registration Number</label>
                              <div class="col-md-9">
                                  <input name="registration"  placeholder="Registration Number" class="form-control" type="text">
                              </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Phone</label>
                                <div class="col-md-9">
                                    <input name="phone"  placeholder="Phone" class="form-control" type="text">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-3">Address</label>
                                <div class="col-md-9">
                                    <input name="address"  placeholder="Address" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Email</label>
                                <div class="col-md-9">
                                    <input name="email"  placeholder="Email" class="form-control" type="text">
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
                                    <input name="password"  placeholder="Password" class="form-control" type="text">
                                </div>
                            </div>
<!--                            <div class="form-group">
                                <label class="control-label col-md-3">Password</label>
                                <div class="col-md-9">
                                    <input name="password"  placeholder="Brand Name" class="form-control" type="text">
                                </div>
                            </div>-->
                            <div class="form-group">
                                <label class="control-label col-md-3">Status</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="active" name="active" selected="selected">
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>                                    
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
              <label class="control-label col-md-6"> Name</label>
              <div class="col-md-6">
                <!--<input name="book_isbn" placeholder="Book ISBN" class="form-control" type="text">-->
                 <label name="book_isbn" id="name" class="control-label col-md-3"></label>
              </div>
            </div>
              <div class="col-md-6 form-group">
              <label class="control-label col-md-6">Owner</label>
              <div class="col-md-6">
                <!--<input name="book_isbn" placeholder="Book ISBN" class="form-control" type="text">-->
                 <label name="book_isbn" id="owner" class="control-label col-md-3"></label>
              </div>
            </div>
              </div>
               <div class="row col-md-12">
            <div class="col-md-6 form-group">
              <label class="control-label col-md-6">Registration No.</label>
              <div class="col-md-6">
                <!--<input name="book_isbn" placeholder="Book ISBN" class="form-control" type="text">-->
                 <label name="book_isbn" id="registration" class="control-label col-md-3"></label>
              </div>
            </div>
              <div class="col-md-6 form-group">
              <label class="control-label col-md-6">Phone</label>
              <div class="col-md-6">
                <!--<input name="book_isbn" placeholder="Book ISBN" class="form-control" type="text">-->
                 <label name="book_isbn" id="phone" class="control-label col-md-3"></label>
              </div>
            </div>
              </div>
               <div class="row col-md-12">
            <div class="col-md-6 form-group">
              <label class="control-label col-md-6">Address</label>
              <div class="col-md-6">
                <!--<input name="book_isbn" placeholder="Book ISBN" class="form-control" type="text">-->
                 <label name="book_isbn" id="address" class="control-label col-md-3"></label>
              </div>
            </div>
              <div class="col-md-6 form-group">
              <label class="control-label col-md-6">Email </label>
              <div class="col-md-6">
                <!--<input name="book_isbn" placeholder="Book ISBN" class="form-control" type="text">-->
                 <label name="book_isbn" id="email" class="control-label col-md-3"></label>
              </div>
            </div>
              </div> <div class="row col-md-12">
            
              </div>
						<div class="form-group">
						</div>
 
          </div>
        </form>
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
				<button type="button" class="btn btn-danger" onclick="delete_company(<?php echo $company->id;?>)"> Delete </button>
			</div>
		</div>
	</div>
</div>