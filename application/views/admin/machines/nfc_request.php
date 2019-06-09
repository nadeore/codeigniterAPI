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
                    <h5>All Machines assigned to this account</h5>
                    
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
                                    <th>Machine Code</th>
                                    <th>Machine Type</th>
                                    <th>Location</th>
                                    <th>NFC Code</th>
                                    <!--<th>Status</th>-->
                                    <!--<th>Action</th>-->
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
                                        <td class="company-registration">
                                            <?php echo $machine->machine_type; ?>
                                        </td>
                                        <td class="company-registration">
                                            <?php echo $machine->location; ?>
                                        </td>
                                        
                                        <td class="company-registration">
                                          <button class="btn btn-outline btn-success btn-sm dim" onclick="nfc(<?php echo $machine->id;?>)"><i class="fa fa-nfc"></i></button> 
                                        </td>
                                        
<!--                                        <td class="company-actions">
                                            <button class="btn btn-outline btn-success btn-sm dim" onclick="view_machine(<?php // echo $machine->id;?>)"><i class="fa fa-eye"></i></button>
                                            <button class="btn btn-outline btn-info btn-sm dim" onclick="edit_book(<?php // echo $machine->id;?>)"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-outline btn-danger btn-sm dim" onclick="confirm(<?php // echo $machine->id;?>)"><i class="fa fa-trash"></i></button>
                                        </td>-->
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


    function nfc()
    {
        $('#generate_nfc').modal('show');
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
  
    
    function create_nfc(id)
    {
          $.ajax({
              
            url : "<?php echo site_url('index.php/admin/machines/create_nfc')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
//               location.reload();
               $('#generate_nfc').modal('hide');
               document.getElementById("nfccode").innerHTML = data.nfc_code;
//            alert(data.nfc_code);
//            console.log(data);
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Update Machine'); // Set titl
            
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
    }
    
    function refresh(){
    location.reload();
    }
   
</script>

<div id="generate_nfc" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					
				</div>	
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title1">Generate NFC</h4>	
                
			</div>
                    <div class="modal-body" style="font-family: 'Varela Round', sans-serif;">
				<p>Do you really want to generate NFC?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-danger" onclick="create_nfc(<?php echo $machine->id;?>)"> Generate </button>
			</div>
		</div>
	</div>
</div>

<div id="modal_form" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					
				</div>	
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title1">Generated NFC</h4>	
                
			</div>
                   
                    <div class="modal-body" style="font-family: 'Varela Round', sans-serif;">
                        <p>Successfully generated Nfc code</p>
				<label name="nfccode" id="nfccode" class="control-label"></label>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="refresh()">Close</button>
			</div>
		</div>
	</div>
</div>