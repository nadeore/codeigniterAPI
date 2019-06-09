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
<!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
 

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
//    alert(idList);
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
    
//    function ChangeTaskStatus(active) {
//
//               var id = ReturnSelectedIds('selectgridrow');
//                alert(id);
//           $.ajax({
//              
//            url : "<?php // echo site_url('index.php/admin/machines/create_qr_id')?>/"+id,
//            type: "POST",
//            dataType: "JSON",
//            success: function(data)
//            {
//               alert(data);
//            },
//            error: function (jqXHR, textStatus, errorThrown)
//            {
//                alert('Error deleting data');
//            }
//        });
//           }
           
           function ChangeTaskStatus(id) {

               var id = ReturnSelectedIds('selectgridrow');
                alert(id);
//            location.href = "book_machine.html?id=" + id + "";
            <?php echo anchor($this->config->item('admin_path') . 'machines/create_qr_id/'+id);?>
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
                    <h5>All Machines assigned to this account.</h5>
                    <div class="ibox-tools">
                        <?php echo anchor($this->config->item('admin_path') . 'machines/add', 'Add Machine', array('class' => 'btn btn-primary btn-xs'));?>
                        <?php echo anchor($this->config->item('admin_path') . 'machines/create_qr', 'Print All QR', array('class' => 'btn btn-primary btn-xs'));?>
                        <?php echo anchor($this->config->item('admin_path') . 'machines/create_barcode', 'All Barcode', array('class' => 'btn btn-primary btn-xs'));?>
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
                    ?>  <div class="col-md-11"> 
                            <div id="divStatusButtons" class="pad margin no-print" style="display: none;">
                                  <?php echo anchor($this->config->item('admin_path') . 'machines/create_qr', 'Print QR', array('class' => 'btn btn-primary btn-xs'));?>
                                <button id="btnOrderStatusSubmitted" type="submit"  class="btn btn-danger" onclick="ChangeTaskStatus(2);">print Qr</button>&nbsp;
                            </div>
                        </div>
                    <?php 
                            }
                        } 
                    ?> 
                    <div class="company-list">
                        <table id="table_id" class="table table-hover">
                            <thead>
                                <tr>
                                    <!--<th>Id</th>-->
                                    <th>Company Name</th>
                                    <th>Machine Name</th>
                                    <!--<th>Machine Code</th>-->
                                    <th>Machine Type</th>
                                    <th>Location</th>
                                    <th>QRcode</th>
                                    <th>Barcode</th>
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
<!--                                        <td class="company-actions">
                                            <input type="checkbox" value=" <?php // echo $machine->id; ?>" class="selectgridrow" id="chkid" onchange="ToggleAction(this)">
                                        </td>-->
                                        <td class="company-title">
                                           
                                            <?php echo $machine->company_name; ?>
                                        </td>
                                        <td class="company-owne">
                                             <?php echo $machine->machine_name; ?>
                                        </td>
                                        <td class="company-registration">
                                            <?php echo $machine->machine_code; ?>
                                        </td>
<!--                                        <td class="company-registration">
                                            <?php // echo $machine->machine_type; ?>
                                        </td>-->
                                        <td class="company-registration">
                                            <?php echo $machine->location; ?>
                                        </td>
                                        <td class="company-registration">
                                            <!--<button class="btn btn-success btn-sm" onclick="bar_code(<?php // echo $machine->id;?>)"><i class="fa fa-barcode"></i></button>-->
                                        <?php echo anchor($this->config->item('admin_path'). 'machines/create_qr_id/'.$machine->id, '<i class="fa fa-qrcode"></i>', array('class' => 'btn btn-success btn-sm'));?>
                                        
                                        </td>
                                        <td class="company-registration">
                                          <?php  //if($machine->	qr_code!= 0 ){
                                                // echo " <button class=\"btn btn-info btn-sm\"  ><i class=\"fa fa-barcode\"></i></button>";
                                            //}
                                            //else{
                                                //echo " <button class=\"btn btn-success btn-sm\"  onclick=\"qr_code($machine->id)\"><i class=\"fa fa-qrcode\"></i></button>";
                                        //}
                                        //?>
                                            <?php echo anchor($this->config->item('admin_path').'machines/create_barcode_id/'.$machine->id, '<i class="fa fa-barcode"></i>', array('class' => 'btn btn-info btn-sm'));?>
                                        </td>
                                        <td class="company-registration">
                                         <?php  if($machine-> nfc_code==NULL ){
                                          echo " <button class=\"btn btn-white btn-sm\"  ><i class=\"fa fa-barcode\"></i></button>";
                                            }
                                            else{
//                                          echo " <button class=\"btn btn-success btn-sm\"  onclick=\"qr_code($machine->id)\"><i class=\"fa fa-barcode\"></i></button>";
                                               echo $machine->nfc_code;
                                        }  ?>
                                        </td>
                                        <td class="company-status">
                                            <?php 
                                            if($machine->is_active == 1)
                                            {
                                                echo '<span class="badge badge-primary">Active</span>';
                                            }
                                             else 
                                             {
                                                 echo '<span class="badge badge-warning">Inactive</span>'; 
                                             }
                                              ?> 
                                        </td>
                                        <td class="company-actions">
                                            
                                            <button class="btn  btn-success btn-sm" onclick="view_machine(<?php echo $machine->id;?>)"><i class="fa fa-eye"></i></button>
                                            <?php echo anchor($this->config->item('admin_path') .'machines/machine_edit/'.$machine->id, '<i class="fa fa-pencil"></i>', array('class' => 'btn btn-info btn-sm'));?>
                                            <button class="btn  btn-danger btn-sm " onclick="delete_machine(<?php echo $machine->id;?>)"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php }
                                } else {
                                  
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
$(document).ready(function() {
   $('#table_id').DataTable( {
       dom: 'Bfrtip',
       buttons:[
           'csv', 'excel', 'pdf', 'print'
       ]
   } );
} );

</script>
<script>
$(document).ready(function(){
    $('#loading-example-btn').click(function () {
        btn = $(this);
        simpleLoad(btn, true)
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

function confirm()
    {
        $('#confirmDelete').modal('show');
    }
function edit_book(id)
    {
      $.ajax({
        url : "<?php echo site_url('index.php/admin/machines/ajax_edit/')?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
           console.log(data);
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
            $('[name="active"]').val(data.is_active);
 
 
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Update Machine'); // Set titl
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
            url : "<?php echo site_url('index.php/admin/machines/book_update/')?>",
            type: "POST",
            data:  $('#myform').serialize(),
            dataType: "JSON",
            success: function(data)
            {
                console.log(data);
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
          url : "<?php echo site_url('index.php/admin/machines/machine_delete')?>/"+id,
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
    
    function view_machine(id)
    {  
//      $('#modal_form1').modal('handleUpdate'); 
//      $("#modal_form1").modal();
//      $('#modal_form1').modal('toggle');  
//$('#modal_form1').toggle();
//        $(".modal_form1").on("hidden.bs.modal", function(){
//            $(this).removeData();
//        });
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
      $.ajax({
        url : "<?php echo site_url('index.php/admin/machines/ajax_edit/')?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('#modal_form1').toggle();
           console.log(data.bar_code);
//           $("#barcodeDiv").load('http://sa4i.leoinfotech.in/application/views/'+data.bar_code'');
//           $("#qrcodeDiv").load('http://sa4i.leoinfotech.in/application/views/qrview.php?machineName='+data.bar_code+'');
//           $("#barcodeDiv").append('<img class="image" src="http://sa4i.leoinfotech.in/application/views/'+data.bar_code+'.gif">');
             document.getElementById("barcodeDiv").innerHTML = '<img src="http://sa4i.leoinfotech.in/application/views/'+data.bar_code+'.gif" />';   
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
             $('#url').attr('src','http://sa4i.leoinfotech.in/uploads/'+data.url);
              $('#description').attr('src','http://sa4i.leoinfotech.in/uploads/'+data.description);
              $('#title').attr('src','http://sa4i.leoinfotech.in/uploads/'+data.title);
             $('#viewdesc').attr('href','http://sa4i.leoinfotech.in/uploads/'+data.description);
             $('#urldesc').attr('href','http://sa4i.leoinfotech.in/uploads/'+data.url);
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
                                <label class="control-label col-md-3">Inventory Code</label>
                                <div class="col-md-9">
                                    <input name="mcode"  placeholder="Machine Code" class="form-control" type="text">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-3">Invoice Number </label>
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
            <div class="col-md-6">
                <div id="barcodeDiv">
                </div>
            </div>
              <div class="col-md-5" >
                  <div  id="qr_code"style="text-align: center;margin-top: -20px;"></div>
            </div>
              </div>
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
              <label class="control-label col-md-6">Inventory Code</label>
              <div class="col-md-6">
                 <label name="book_isbn" id="mcode" class="control-label"></label>
              </div>
            </div>
              </div>
               <div class="row col-md-12">
            <div class="col-md-6 form-group">
              <label class="control-label col-md-6">Invoice Number</label>
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
                <div class="col-md-1">

                </div>
                <div class="col-md-3 file-box">
                    <div class="file">
                        <a href="http://sa4i.leoinfotech.in/uploads/" data-gallery="" id="urldesc">
                            <div class="image">
                                <img alt="image" id="url" class="img-responsive" src="http://sa4i.leoinfotech.in/uploads/">
                            </div>
                            <div class="file-name">
                                 <label id="urlname"> </label>
                            </div>
                        </a>
                    </div>
                </div>
                    <div class="col-md-3 file-box">
                                <div class="file">
                                    <a href="http://localhost/sa4i/uploads/" data-gallery="" id="viewdesc">

                                        <div class="image">
                                            <img alt="image" id="description" class="img-responsive" src="http://localhost/sa4i/uploads/">
                                        </div>
                                        <div class="file-name">
                                            <label id="descriptionname"> </label>
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
                                <a class="close">×</a>
                                <a class="play-pause"></a>
                                <ol class="indicator"></ol>
                            </div>
                       </div>
            
			<div class="form-group">
			</div>
          </div>
        </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
   