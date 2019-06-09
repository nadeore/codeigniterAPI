<?php
/*
 * Filename:grid_view.php
 * projectname:sa4i
 * Date created:October 14, 2017
 * Created by: Hemant Jaiswal
 * Purpose: This file will show the shows grid
 */
?>
<?php
function printQRCode($url, $size = 100) {
    return '<img src="http://chart.apis.google.com/chart?chs=' . $size . 'x' . $size . '&cht=qr&chl=' . urlencode($url) . '" />';
}
?> 


   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    function ReturnSelectedIds(chkClassName){
    var idList = "";
    var index = 0;
    $('.' + chkClassName).each(function(){
        //this.checked = true;
        var isSelected = $(this).is(':checked');
                
        if(isSelected){
            idList = idList + "," + $(this).val();
        }
    });
    if(idList.length > 0){
        idList = idList.substring(1);
    }
    return idList;
}

function ToggleAction(chkValue) {
                IdList = ReturnSelectedIds('selectgridrow');
                if (IdList.length > 0) {
                    $('#divStatusButtons').show();
                } else {
                    $('#divStatusButtons').hide();
                }
            }
            
            function  function_delete(){
//                alert('abcd');
                      document.location = "http://localhost/sa4i/index.php/admin/machines/barcode";
//     url: "http://localhost/sa4i/index.php/admin/machines/barcode",
    }
    
      

</script>
 
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
                    <h5>All Machines assigned to this account</h5>
                    <div class="ibox-tools">
                        <?php echo anchor($this->config->item('admin_path') . 'machines/add', 'Create new machine', array('class' => 'btn btn-primary btn-xs'));?>
                    </div>
                </div>
                <div class="ibox-content">
<!--                    <div class="row m-b-sm m-t-sm">
                        <div class="col-md-1">
                            <button type="button" id="loading-example-btn" class="btn btn-white btn-sm" ><i class="fa fa-refresh"></i> Refresh</button>
                        </div>
                        <div class="col-md-11">
                            <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span></div>
                        </div>
                    </div>-->
                    <?php 
                                if ($machines) { 
                                    foreach ($machines as $machine) {
                                    ?>
                    <div class="col-md-11"> 
                                            <div id="divStatusButtons" class="pad margin no-print" style="display: none;">
                                                <button  type="button"  class="btn btn-success" id="sub">Start</button>
                                                <!--<button type="button"   onclick="<?php echo base_url()?>machines/bar">Sign Up</button>-->
                                                <!--<button type="button" class="btn btn-success" onclick="window.location='<?php echo site_url("Machines/barcode");?>'">Sign Up</button>-->
                                                <button id="btnOrderStatusSubmitted" type="submit"  class="btn btn-danger" onclick="ChangeTaskStatus(2);">End</button>&nbsp;
                                                <a id="btnSendEmail" class="btn btn-warning" data-toggle="modal" data-target="#compose-modal" ><i class="fa fa-pencil"></i>Cancel</a>&nbsp;
                                                <a style="display:none;" id="btnSendSms" class="btn btn-danger" data-toggle="modal" data-target="#compose-modal-sms" ><i class="fa fa-pencil"></i>Delete</a>&nbsp;
                                            </div>
                                        </div>
                    <?php }
                                } 
                                ?> 

                    <div class="company-list">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Machine Name</th>
                                    <th>Machine Description</th>
                                    <th>Machine Code</th>
                                    <th>Machine Type</th>
                                    <th>Location</th>
                                    <th>Barcode</th>
                                    <th>QRcode</th>
                                    <th>NFC Code</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if ($machines) { 
                                    foreach ($machines as $machine) {
                                    ?>
                                
                                    <tr>
                                        <td class="company-actions">
                                            <input type="checkbox" value=" <?php echo $machine->id; ?>" class="selectgridrow" id="chkid" onchange="ToggleAction(this)">
                                        </td>
                                        <td class="company-title">
                                            <?php echo $machine->machine_name; ?>
                                        </td>
                                        <td class="company-owne">
                                            <?php echo $machine->machine_description; ?>
                                        </td>
                                        <td class="company-registration">
                                            <?php echo $machine->machine_code; ?>
                                        </td>
                                        <td class="company-registration">
                                            <?php echo $machine->machine_type; ?>
                                        </td>
                                        <td class="company-registration">
                                            <?php echo $machine->location; ?>
                                        </td>
                                        <td class="company-registration">
                                            <button class="btn btn-success btn-sm"  onclick="bar_code(<?php echo $machine->id;?>)"><i class="fa fa-barcode"></i></button>
                                        
                                        </td>
                                        <td class="company-registration">
                                          <?php  if($machine->	qr_code!=0 ){
                                          echo " <button class=\"btn btn-info btn-sm\"  ><i class=\"fa fa-qrcode\"></i>QR</button>";
                                            }
                                            else{
                                          echo " <button class=\"btn btn-success btn-sm\"  onclick=\"qr_code($machine->id)\"><i class=\"fa fa-qrcode\"></i>QR</button>";
                                       
                                        }
                                        ?></td>
                                        <td class="company-registration">
                                          
                                        </td>
                                        <td class="company-status">
                                            <span class="label label-primary"><?php if($machine->is_active == 1) echo 'Active'; else echo 'Unactive';?></span>
                                        </td>
                                        <td class="company-actions">
                                            <a href="#" class="btn btn-white btn-sm" onclick="view_machine(<?php echo $machine->id;?>)" ><i class="fa fa-eye"></i></a>
                                            <a href="#" class="btn btn-success btn-sm" onclick="edit_book(<?php echo $machine->id;?>)"><i class="fa fa-pencil"></i></a>
                                            <button class="btn btn-danger btn-sm" onclick="delete_machine(<?php echo $machine->id;?>)"><i class="fa fa-trash"></i></button>
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

<div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"></i> Cancel Task </h4>
                    </div>
                    <form action="machines/barcode" method="post" id="experiment">
                        <div class="modal-body">

                            <div class="form-group">
                                <label> Do you want to cancel task.? </label>
                            </div>

                            <div class="form-group">
                                <textarea name="message" id="sms_message" class="form-control" placeholder="Enter cancel reason" style="height: 100px;"
                                          maxlength="160"></textarea>

                            </div>
                            <div class="form-group" style="color:#D11B21;" id="SmsAlert">
                            </div>
                        </div>
                        <div class="modal-footer clearfix">

                            <button type="button" id="emailclose" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> CLOSE </button>
                            <input type="submit" name="delete"  id="delete" value="Delete" />
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
<script>
$(document).ready(function(){

    /*setTimeout(function() {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 4000
        };
        toastr.success('Companies list', 'Welcome to SA4I');
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
    function start()
    {
        alert("OK");
    }
    
    
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
function edit_book(id)
    {
//      save_method = 'update';
//      $('#form')[0].reset(); // reset form on modals
      $.ajax({
        url : "<?php echo site_url('index.php/admin/machines/ajax_edit/')?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
//           console.log(data);
            $('[name="book_id"]').val(data.id);
            $('[name="mname"]').val(data.machine_name);
            $('[name="mdesc"]').val(data.machine_description);
            $('[name="mtype"]').val(data.machine_type);
            $('[name="mcode"]').val(data.machine_code);
            $('[name="inventory"]').val(data.inventory_number);
            $('[name="location"]').val(data.location);
            $('[name="brand"]').val(data.brand_name);
            $('[name="serial"]').val(data.serial_number);
            $('[name="proof"]').val(data.date_of_proof);
            $('[name="check"]').val(data.next_check);
            $('[name="buy"]').val(data.date_of_buy);
            $('[name="price"]').val(data.price);
 
 
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Update Machine'); // Set title to Bootstrap modal title
 
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
            url : "<?php echo site_url('index.php/admin/machines/book_update')?>",
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
    
    function qr_code(id)
    {
          $.ajax({
              
            url : "<?php echo site_url('index.php/admin/machines/qr_code')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
//                alert ("mmmm");
               
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
    }
    
    function bar_code(id)
    {
          $.ajax({
              
            url : "<?php echo site_url('index.php/admin/machines/bar_code')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
    }
    
    function delete_machine(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
              
            url : "<?php echo site_url('index.php/admin/machines/machine_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
//                alert ("mmmm");
               
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
 
      }
    }
    
    function view_machine(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
      $.ajax({
        url : "<?php echo site_url('index.php/admin/machines/ajax_edit/')?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
           debugger;
             document.getElementById("mname").innerHTML = data.machine_name;
             document.getElementById("mdesc").innerHTML = data.machine_description;
             document.getElementById("mtype").innerHTML = data.machine_type;
             document.getElementById("inventory").innerHTML = data.inventory_number;
             document.getElementById("location").innerHTML = data.location;
             document.getElementById("brand").innerHTML = data.brand_name;
             document.getElementById("serial").innerHTML = data.serial_number;
             document.getElementById("dtodesc").innerHTML = data.date_of_proof;
             document.getElementById("nextcheck").innerHTML = data.next_check;
             document.getElementById("dtobuy").innerHTML = data.date_of_buy;
             document.getElementById("price").innerHTML = data.price;
             document.getElementById("mcode").innerHTML = data.machine_code;
             document.getElementById("pdf").innerHTML = data.title;
             document.getElementById("descriptionname").innerHTML = data.description;
             document.getElementById("urlname").innerHTML = data.url;
              document.getElementById("qr_code").innerHTML = '<img src="http://chart.apis.google.com/chart?chs=120x120&cht=qr&chl='+data.qr_code+'" />';
//              document.getElementById("date").innerHTML = data.created_at;
//               document.getElementById("date1").innerHTML = data.created_at;
//                document.getElementById("date2").innerHTML = data.created_at;
//             document.getElementById("qr").innerHTML = data.qr_code;
             $('#url').attr('src','uploads/'+data.url);
              $('#description').attr('src','uploads/'+data.description);
               ($('#title').attr('src','uploads/'+data.title));
             ($('#viewdesc').attr('href','uploads/'+data.description));
             ($('#urldesc').attr('href','uploads/'+data.url));
            $('#modal_form1').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Machine Details'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

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
                    <input type="hidden" value="" name="book_id"/>
                        <div class="form-body">
                            <div class="form-group">
                               <label class="control-label col-md-3">Machine Name</label>
                                <div class="col-md-9">
                                    <input name="mname"  placeholder="Machine Name" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3">Machine Type</label>
                              <div class="col-md-9">
                                  <input name="mtype"  placeholder="Machine Type" class="form-control" type="text">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3">Machine Description</label>
                              <div class="col-md-9">
                                  <input name="mdesc"  placeholder="Machine Description" class="form-control" type="text">
                              </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Machine Code</label>
                                <div class="col-md-9">
                                    <input name="mcode"  placeholder="Machine Code" class="form-control" type="text">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-3">Inventory Number </label>
                                <div class="col-md-9">
                                    <input name="inventory"  placeholder="Inventory Number" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Location</label>
                                <div class="col-md-9">
                                    <input name="location"  placeholder="Location" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Brand Name</label>
                                <div class="col-md-9">
                                    <input name="brand"  placeholder="Brand Name" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Serial No</label>
                                <div class="col-md-9">
                                    <input name="serial"  placeholder="Serial No" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Date of proof</label>
                                <div class="col-md-9">
                                    <input name="proof"  placeholder="Date of proof" class="form-control" type="date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Next check</label>
                                <div class="col-md-9">
                                    <input name="check"  placeholder="Next check" class="form-control" type="date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Date of buy</label>
                                <div class="col-md-9">
                                    <input name="buy"  placeholder="Date of buy" class="form-control" type="date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Price</label>
                                <div class="col-md-9">
                                    <input name="price"  placeholder="Price" class="form-control" type="text">
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
              <label class="control-label col-md-6">Machine Name</label>
              <div class="col-md-6">
                 <label name="book_isbn" id="mname" class="control-label"></label>
              </div>
            </div>
              <div class="col-md-6 form-group">
              <label class="control-label col-md-6">Machine Type</label>
              <div class="col-md-6">
                 <label name="book_isbn" id="mtype" class="control-label"></label>
              </div>
            </div>
              </div>
               <div class="row col-md-12">
            <div class="col-md-6 form-group">
              <label class="control-label col-md-6">Machine Description</label>
              <div class="col-md-6">
                 <label name="book_isbn" id="mdesc" class="control-label"></label>
              </div>
            </div>
              <div class="col-md-6 form-group">
              <label class="control-label col-md-6">Machine Code</label>
              <div class="col-md-6">
                 <label name="book_isbn" id="mcode" class="control-label"></label>
              </div>
            </div>
              </div>
               <div class="row col-md-12">
            <div class="col-md-6 form-group">
              <label class="control-label col-md-6">Inventory Number</label>
              <div class="col-md-6">
                 <label name="book_isbn" id="inventory" class="control-label"></label>
              </div>
            </div>
              <div class="col-md-6 form-group">
              <label class="control-label col-md-6">Loaction </label>
              <div class="col-md-6">
                 <label name="book_isbn" id="location" class="control-label"></label>
              </div>
            </div>
              </div> <div class="row col-md-12">
            <div class="col-md-6 form-group">
              <label class="control-label col-md-6">Brand Name</label>
              <div class="col-md-6">
                 <label name="book_isbn" id="brand" class="control-label"></label>
              </div>
            </div>
              <div class="col-md-6 form-group">
              <label class="control-label col-md-6">Serial Number</label>
              <div class="col-md-6">
                 <label name="book_isbn" id="serial" class="control-label"></label>
              </div>
            </div>
              </div> <div class="row col-md-12">
            <div class="col-md-6 form-group">
              <label class="control-label col-md-6">Date Of Proof</label>
              <div class="col-md-6">
                 <label name="book_isbn" id="dtodesc" class="control-label"></label>
              </div>
            </div>
              <div class="col-md-6 form-group">
              <label class="control-label col-md-6">Next Check </label>
              <div class="col-md-6">
                 <label name="book_isbn" id="nextcheck" class="control-label"></label>
              </div>
            </div>
              </div> <div class="row col-md-12">
            <div class="col-md-6 form-group">
              <label class="control-label col-md-6">Date of Buy </label>
              <div class="col-md-6">
                 <label name="book_isbn" id="dtobuy" class="control-label"></label>
              </div>
            </div>
              <div class="col-md-6 form-group">
              <label class="control-label col-md-6">Price </label>
              <div class="col-md-6">
                 <label name="book_isbn" id="price" class="control-label"></label>
              </div>
            </div>
             </div>     
<div class="row col-md-12 lightBoxGallery" >
                      
                      <div class="col-md-2">
                          <label class="control-label col-md-6"   id="qr_code"></label>
                      </div>
                      <div class="col-md-3 file-box">
                                <div class="file">
                                    <a href="http://localhost/sa4i/uploads/" data-gallery="" id="urldesc">
<!--                                        <span class="corner"></span>-->

                                        <div class="image">
                                            <img alt="image" id="url" class="img-responsive" src="http://localhost/sa4i/uploads/">
                                        </div>
                                        <div class="file-name">
                                             <label id="urlname"> </label>
<!--                                            <br/>
                                            <small id="date"></small>-->
                                        </div>
                                    </a>
                                    
                                </div>
                            </div>
                    <div class="col-md-3 file-box">
                                <div class="file">
                                    <a href="http://localhost/sa4i/uploads/" data-gallery="" id="viewdesc">
<!--                                        <span class="corner"></span>-->

                                        <div class="image">
                                            <img alt="image" id="description" class="img-responsive" src="http://localhost/sa4i/uploads/">
                                        </div>
                                        <div class="file-name">
                                            <label id="descriptionname"> </label>
<!--                                            <br/>
                                            <small id="date1"></small>-->
                                        </div>
                                    </a>
                                     
                                </div>
                            </div>
                       <div class=" col-md-3 file-box">
                                <div class="file">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                                             <i class="fa fa-file"></i>
                                                        </div>
                                        <div class="file-name">
                                            <label id="pdf"> </label>
<!--                                            <br/>
                                            <small id="date2">Added: Fab 11, 2014</small>-->
                                        </div>
                                    </a>
                                </div>
                            </div>
							
			<div id="blueimp-gallery" class="blueimp-gallery">
                                <div class="slides"></div>
                                <h3 class="title"></h3>
                                <a class="prev">‹</a>
                                <a class="next">›</a>
                                <a class="play-pause"></a>
                                <ol class="indicator"></ol>
                            </div>
                      
                      
                       </div>
            
						<div class="form-group">
<!--							<label class="control-label col-md-3">Book Category</label>
							<div class="col-md-9">
								<input name="book_category" placeholder="Book Category" class="form-control" type="text">
 
							</div>-->
						</div>
 
          </div>
        </form>
          </div>
<!--          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>-->
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->