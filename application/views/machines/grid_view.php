<?php
/*
 * Filename:grid_view.php
 * projectname:sa4i
 * Date created:October 26, 2017
 * Created by: Hemant Jaiswal
 * Purpose: This file will show the machines grid
 */

?>
<style>
    div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    margin-top: -30px;
}
</style>

<?php
function printQRCode($url, $size = 100) {
    return '<img src="http://chart.apis.google.com/chart?chs=' . $size . 'x' . $size . '&cht=qr&chl=' . urlencode($url) . '" />';
}

?>
 
<link href="<?php echo site_url($this->config->item('theme_path')); ?>css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">
<div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
        
        <div class="wrapper wrapper-content">
            
            <div class="ibox">
                <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <br><br><br>
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
                    <h5>All machines assigned to this account.</h5>
                    <div class="ibox-tools">
                        <?php echo anchor('machines/create_qr', 'Print All QR', array('class' => 'btn btn-primary btn-xs'));?>
			<?php echo anchor('machines/all_barcode', 'Print All Bar-code', array('class' => 'btn btn-primary btn-xs'));?>
                        <?php echo anchor('machines/add', 'Add Machine', array('class' => 'btn btn-primary btn-xs'));?>
                    </div>
                </div>
                    <div class="machine-list">

                        <table id="table_id" class="table table-bordered table-hover table-striped tablesorter">
                            <thead>
                                <tr>
                                    <th style="text-align: center">Machine Name</th>
                                    <th style="text-align: center">Machine Type</th>
                                    <th style="text-align: center">Inventory Number</th>
                                    <th style="text-align: center">QRcode</th>
                                    <th style="text-align: center">Barcode</th>
                                    <th style="text-align: center">Nfccode</th>
                                    <th style="text-align: center">Status</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php 
                              
                                if ($machines) { 
                                    foreach ($machines as $machine) {
                                    ?>
                                    <tr align="center">
                                        <td class="machine-name">
                                            <?php 
                                            echo $machine->machine_name;
                                            ?>
                                        </td>
                                        <td class="machine-type">
                                            <?php echo $machine->machine_type; ?>
                                        </td>
                                        <td class="machine-code">
                                            <?php echo $machine->machine_code; ?>
                                            </td>
                                            <td class="machine-type">
                                            <?php echo anchor('machines/create_qr_id/'.$machine->id, '<i class="fa fa-qrcode"></i>', array('class' => 'btn btn-success btn-sm'));?>
                                        </td>
                                        <td class="machine-type">
                                            <?php echo anchor('machines/create_barcode_id/'.$machine->id, '<i class="fa fa-barcode"></i>', array('class' => 'btn btn-success btn-sm'));?>
                                        </td>
                                        
                                         <td class="machine-type">
                                            <button class="btn btn-outline btn-danger btn-sm dim" onclick="nfc_gen(<?php echo $machine->id;?>)"><i class="fa fa-nfccode"></i></button>
                                           
                                        </td>
                                        <td class="machine-status">
                                             <?php  if($machine->is_active==1 ){
                                          echo " <span class=\"badge badge-primary\">Active</span>";
                                            }
                                            else{
                                         echo " <span class=\"badge badge-warning\">Inactive</span>";
                                        }
                                        ?></td>
                                        <td class="machine-actions">
                                            <button class="btn  btn-success btn-sm" onclick="view_machine(<?php echo $machine->id;?>)"><i class="fa fa-eye"></i></button>
                                            <!--<button class="btn btn-outline btn-info btn-sm dim" onclick="edit_book(<?php // echo $machine->id;?>)"><i class="fa fa-pencil"></i></button>-->
                                             <?php echo anchor('machines/machine_edit/'.$machine->id, '<i class="fa fa-pencil"></i>', array('class' => 'btn btn-info btn-sm'));?>
                                            <button class="btn  btn-danger btn-sm " onclick="delete_machine(<?php echo $machine->id;?>)"><i class="fa fa-trash"></i></button>
                                           
                                        </td>
                                    </tr>
                                <?php }
                                } else {
                                    ?><tr><td colspan="6" align="centre">No machines found.</td></tr><?php
                                } 
                                ?>   
                            </tbody>
                        </table>
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>
</div>
</div>    
<script type="text/javascript" src="<?php echo site_url(); ?>js/jquery-3.1.1.min.js"></script>  

<!--<script src="<?php // echo site_url($this->config->item('theme_path')); ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>-->
<!--<script type="text/javascript" src="jquery.zohoviewer.min.js"></script>-->

 <script >  




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
    function nfcconfirm()
    {
        $('#nfcRequest').modal('show');
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
         url : "<?php echo site_url('index.php/machines/machine_delete')?>/"+id,
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
    
  function nfc_gen(id)
    {
//        alert(id);
//       bootbox.confirm("Are you sure want to generate NFC?", function(result) {
// 
//       if(result){
//         // AJAX Request
//         $.ajax({
//           url : "<?php // echo site_url('index.php/machines/nfc_request')?>/"+id,
//            type: "POST",
//            dataType: "JSON",
//            success: function(data)
//            {
//               location.reload();
//            }
//         });
//       }
// 
//    });
    
    
    
    
    bootbox.dialog({
        message: "Are you sure you want to generate NFC ?",
        title: "NFC !",
        buttons: {
        success: {
        label: "No",
        className: "btn-success",
        callback: function() {
        $('.bootbox').modal('hide');
        }
        },
        danger: {
        label: "Generate!",
        className: "btn-danger",
        callback: function() {
        $.ajax({
         url : "<?php echo site_url('index.php/machines/nfc_request')?>/"+id,
         type: "POST",
         dataType: "JSON",
        })
        
        }
        }
        }
        });
    }
    
    
function edit_book(id)
    {
        alert(id);
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
 
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/machines/ajax_edit/')?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            console.log(data.id);
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
            $('#machine_pdf_name').html(data.title);
                if(data.url == null){
                    $('#imgurl_name').html("No Image");
                    ($('#imgurl').attr('href','uploads/no_image.png'));
                    $('#img_url').attr('src','uploads/no_image.png');
                } else {
                    $('#imgurl_name').html(data.url);
                    ($('#imgurl').attr('href','uploads/'+data.url));
                    $('#img_url').attr('src','uploads/'+data.url);
                }
                if(data.description == null){
                    $('#imgdescription_name').html("No Image");
                    ($('#imgdescription').attr('href','uploads/no_image.png'));
                    $('#img_description').attr('src','uploads/no_image.png');
                } else{
                    $('#imgdescription_name').html(data.description);
                    ($('#imgdescription').attr('href','uploads/'+data.description));
                    $('#img_description').attr('src','uploads/'+data.description);
                }
            $('#machine_pdf').html('<a href="http://localhost/sa4i/uploads/'+data.title+'" target="_blank" >View PDF</a>');
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Update Machine'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            //alert('Error get data from ajax');
        }
    });
    }
    
     function view_machine(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
 
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/machines/ajax_edit/')?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
//            console.log(data);
           $("#qrcodeDiv").load('http://sa4i.leoinfotech.in/application/views/qrview.php?machineName='+data.bar_code+'');
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
		if(data.url == null){
			($('#urldesc').attr('href','http://sa4i.leoinfotech.in/uploads/no_image.png'));
			$('#url').attr('src','uploads/no_image.png');
		} else {
			$('#url').attr('src','uploads/'+data.url);
			($('#urldesc').attr('href','uploads/'+data.url));}
             

             //$('#url2').attr('src','uploads/'+data.description);
             //($('#title').attr('src','uploads/'+data.title));
             //($('#url2desc').attr('href','uploads/'+data.description));
		if(data.description == null){
			($('#url2desc').attr('href','http://sa4i.leoinfotech.in/uploads/no_image.png'));
			$('#url2').attr('src','uploads/no_image.png');
		} else {
			$('#url2').attr('src','uploads/'+data.description);
			($('#url2desc').attr('href','uploads/'+data.description));
			
		} 

            //($('#urldesc').attr('href','uploads/'+data.url));
            $('#monica').html('<a href="http://sa4i.leoinfotech.in/uploads/'+data.title+'" target="_blank" >View PDF</a>');
            $('#modal_form1').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Machine Details'); // Set title to Bootstrap modal title
 
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
            url : "<?php echo site_url('index.php/machines/book_update')?>",
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
                location.reload();
//                alert('Error adding / update data');
            }
        });
    }
    
</script>

<script type="text/javascript">
    $("#myform").on('submit',(function(e) {
    e.preventDefault();
         $.ajax({
                url : "<?php echo site_url('index.php/machines/machine_update')?>",
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
                    location.reload();
    //                alert('Error adding / update data');
                }
            });
    }));
</script>

<!-- Bootstrap modal For EDIT/UPDATE -->
  <div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body form">
                <!--<form action="#" id="myform" class="form-horizontal">-->
                    <form id="myform" action="#" method="post" enctype="multipart/form-data">
                <?php
//                            $attributes = array('name' => 'myform', 'id' => 'myform', 'class' => 'form-horizontal');
//                                    echo form_open_multipart(site_url('machines/machine_update'), $attributes);
                                ?>
               
                    <input type="hidden" value="" name="book_id"/>
                    <div class="form-body">
                        <div class="form-group">
                           <label class="control-label col-md-3">Machine Name <span style="color: red">*</span></label>
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
                            <label class="control-label col-md-3">Inventory Code <span style="color: red">*</span></label>
                            <div class="col-md-9">
                                <input name="mcode"  placeholder="Inventory Number" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Machine Description</label>
                          <div class="col-md-9">
                              <input name="mdesc"  placeholder="Machine Description" class="form-control" type="text">
                          </div>
                        </div>
			<div class="form-group">
                            <label class="control-label col-md-3">Invoice Number </label>
                            <div class="col-md-9">
                                <input name="inventory"  placeholder="Invoice Number" class="form-control" type="text">
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
                            <label class="control-label col-md-3">Serial No <span style="color: red">*</span></label>
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
                        <div class="row col-md-12" style="margin-top: 20px;" >
                            <!--<div class="col-md-1"></div>-->
                            <div class="col-md-4 file-box">
                                <div class="file">
                                    <a href="http://sa4i.leoinfotech.in/uploads/" data-gallery="" id="imgurl">
                                        <div class="image" style="height: 150px;width: 188px;">
                                            <img alt="image" id="img_url" class="img-responsive" src="">
                                        </div>
                                        <div class="file-name">
                                            <label id="imgurl_name"> </label>
                                        </div>
                                    </a>
                                </div>
                                <div>
                                    <input type="file" name="picture4" id="picture4" class="form-control ">
                                </div>
                            </div>
                            <div class="col-md-4 file-box">
                                <div class="file">
                                    <a href="http://sa4i.leoinfotech.in/uploads/" data-gallery="" id="imgdescription">
                                        <div class="image" style="height: 150px;width: 188px;">
                                            <img alt="image" id="img_description" class="img-responsive" src="">
                                        </div>
                                        <div class="file-name">
                                            <label id="imgdescription_name"> </label>
                                        </div>
                                    </a>
                                </div>
                                <div>
                                    <input type="file" name="picture5" id="picture5" class="form-control ">
                                </div>
                            </div>
                            <div class=" col-md-4 file-box">
                                <div class="file" style="height: 185px;">
                                    <a href="#">
                                        <span class="corner"></span>
                                        <div class="icon">
                                            <label id="machine_pdf"></label>
                                        </div>
                                        <div class="file-name">
                                            <label id="machine_pdf_name"> </label>
                                        </div>
                                    </a>
                                </div>
                                <div>
                                    <input type="file" name="picture6" id="picture6" class="form-control ">
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
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnSave1" onclick="update_save()" class="btn btn-primary">Save</button>
                        <!--<input type="submit" name="submit" id="submit" value="Save changes" title="Save changes" class="btn btn-primary" />-->
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <input id="button" type="submit" value="Value" name="update">
                    </div>
                </form>
            </div> 
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
    
<!-- Bootstrap modal For VIEW Machine Details -->

    <div class="modal fade" id="modal_form1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #afeac35e;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title">Machine Details</h3>
                </div>
                <div class="modal-body form" style="background-color: #afeac35e">
                    <form action="#" id="form" class="form-horizontal">
                        <input type="hidden" value="" name="book_id"/>
                        <div class="form-body success">
                            <div class="row col-md-12">
                                <div class="col-md-6 form-group">
                                    <div id="qrcodeDiv" style="margin-left: 12px"></div>
                                </div>
                                <div class="col-md-6">
                                    <div  id="qr_code" style="text-align: center;margin-top: -16px;"></div>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-6 form-group">
                                    <label class="control-label col-md-6">Machine Name :</label>
                                    <div class="col-md-6">
                                        <label name="book_isbn" id="mname" class="control-label"></label>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="control-label col-md-6">Machine Type :</label>
                                    <div class="col-md-6">
                                       <label name="book_isbn" id="mtype" class="control-label"></label>
                                    </div>   
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-6 form-group">
                                  <label class="control-label col-md-6">Machine Description :</label>
                                    <div class="col-md-6">
                                    <!--<input name="book_isbn" placeholder="Book ISBN" class="form-control" type="text">-->
                                        <label name="book_isbn" id="mdesc" class="control-label"></label>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                  <label class="control-label col-md-6">Inventory Code :</label>
                                    <div class="col-md-6">
                                        <label name="book_isbn" id="mcode" class="control-label"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-6 form-group">
                                  <label class="control-label col-md-6">Invoice Number :</label>
                                    <div class="col-md-6">
                                        <label name="book_isbn" id="inventory" class="control-label"></label>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                  <label class="control-label col-md-6">Loaction :</label>
                                    <div class="col-md-6">
                                        <label name="book_isbn" id="location" class="control-label"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-6 form-group">
                                  <label class="control-label col-md-6">Brand Name :</label>
                                    <div class="col-md-6">
                                        <label name="book_isbn" id="brand" class="control-label"></label>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                  <label class="control-label col-md-6">Serial Number :</label>
                                    <div class="col-md-6">
                                        <label name="book_isbn" id="serial" class="control-label"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-6 form-group">
                                  <label class="control-label col-md-6">Date Of Proof :</label>
                                  <div class="col-md-6">
                                        <label name="book_isbn" id="dtodesc" class="control-label"></label>
                                  </div>
                                </div>
                                <div class="col-md-6 form-group">
                                  <label class="control-label col-md-6">Next Check :</label>
                                  <div class="col-md-6">
                                        <label name="book_isbn" id="nextcheck" class="control-label"></label>
                                  </div>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-6 form-group">
                                    <label class="control-label col-md-6">Date of Buy :</label>
                                    <div class="col-md-6">
                                       <label name="book_isbn" id="dtobuy" class="control-label"></label>
                                    </div>
                                </div>
                                    <div class="col-md-6 form-group">
                                    <label class="control-label col-md-6">Price :</label>
                                    <div class="col-md-6">
                                       <label name="book_isbn" id="price" class="control-label "></label>
                                    </div>
                                    </div>
                            </div>     
                            <div class="row col-md-12 lightBoxGallery" >
                                <div class="col-md-1"></div>
                                <div class="col-md-3 file-box">
                                    <div class="file">
                                        <a href="http://sa4i.leoinfotech.in/uploads/" data-gallery="" id="urldesc">
                                            <div class="image" style="height: 150px;width: 185px;">                                     
                                                <img id="url" class="img-responsive" src="http://sa4i.leoinfotech.in/uploads/">
                                            </div>
                                            <div class="file-name">
                                                <label id="urlname"> </label>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-3 file-box">
                                    <div class="file">
                                        <a href="http://sa4i.leoinfotech.in/uploads/" data-gallery="" id="url2desc">
                                            <div class="image" style="height: 150px;width: 185px;">
                                                <img id="url2" class="img-responsive" src="http://sa4i.leoinfotech.in/uploads/">
                                            </div>
                                            <div class="file-name">
                                                <label id="descriptionname"> </label>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class=" col-md-3 file-box">
                                    <div class="file" style="height: 192px;width: 185px;">
                                        <a href="#">
                                            <span class="corner"></span>
                                            <div class="icon">
                                                <label id="monica"></label>
                                            </div>
                                            <div class="file-name">
                                                <label id="pdf"> </label>
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
                            <div class="form-group"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

  <!-- End Bootstrap modal -->
 
  </body>
</html>
 