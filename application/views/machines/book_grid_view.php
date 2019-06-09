

<link href="<?php echo site_url($this->config->item('theme_path')); ?>css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">
<style>
    div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    margin-top: -30px;
}
</style>
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
                    <h5>All machines assigned to this account</h5>
                    <div class="ibox-tools">
                        <?php echo anchor('book_machine/add', 'Book new machine', array('class' => 'btn btn-primary btn-xs'));?>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="machine-list">

                        <table  id="table_id"class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="text-align: center">Machine Name</th>
                                    <th style="text-align: center">Machine Type</th>
                                    <th style="text-align: center">Machine Code</th>
                                    <th style="text-align: center">Status</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php 
                              
                                if ($machines) { 
                                    foreach ($machines as $machine) {
                                    ?>
                                    <tr style="text-align: center">
                                        <td class="machine-name">
                                            <?php echo $machine->machine_name; ?>
                                        </td>
                                        <td class="machine-type">
                                            <?php echo $machine->machine_type; ?>
                                        </td>
                                        <td class="machine-code">
                                            <?php echo $machine->machine_code; ?>
                                        </td>
                                        <td class="machine-status">
                                             <?php  if($machine->is_booked==1 ){
                                          echo " <span class=\"badge badge-primary\">Booked</span>";
                                            }
                                            elseif($machine->is_booked==0) {
                                              echo " <span class=\"badge badge-warning\">Available</span>";  
                                            }
                                            else{
                                          echo "  <span class=\"label label-success\"  onclick=\"qr_code($machine->id)\">Book Now</span>";
                                        }
                                        ?></td>
                                        <td class="machine-actions">
                                            <?php  if($machine->is_booked==0 ){
                                           echo " <button class=\"btn btn-info  btn-sm\" onclick=\"machine_book($machine->id)\" >Book Now</button>";
                                            }
                                            else{
                                          echo " <button class=\"btn btn-danger btn-sm\"  onclick=\"Cancel_machine($machine->id)\">Cancel</button>";
                                        }
                                       ?></td>
                                    </tr>
                                <?php }
                                } else {
                                    ?><tr><td colspan="6" align="centre">No machines found.</td></tr><?php
                                } 
                                ?>   
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>
<script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
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
 <script >  
$(document).ready( function () {
    var save_method; //for save method string
    var table;
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

function Cancel_machine(id)
    {
      if(confirm('Are you sure Cancel this Booking?'))
      {
        
          $.ajax({
            url : "<?php echo site_url('index.php/Book_machine/machine_cancel')?>/"+id,
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
    }
function machine_book(id)
    {
      $.ajax({
        url : "<?php echo site_url('index.php/book_machine/contMachineBook/')?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="book_id"]').val(data.id);
            $('[name="machine_name"]').val(data.machine_name);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Book Machine'); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
    
    function update_save()
    {   
//        alert('mmm');
        debugger;
          $.ajax({
            url : "<?php echo site_url('index.php/book_machine/bookmachine')?>",
            type: "POST",
            data:  $('#myform').serialize(),
            dataType: "JSON",
            success: function(data)
            {
//                alert ('mm');
               $('#modal_form').modal('hide');
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }
 
</script>

<!-- Bootstrap modal -->
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
                                    <input name="machine_name"  placeholder="Machine Name" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3">Start Date</label>
                              <div class="col-md-9">
                                  <input name="start_date"  placeholder="Machine Type" class="form-control" type="date" value="<?php echo date('Y-m-d');?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3">End Date</label>
                              <div class="col-md-9">
                                  <input name="end_date"  placeholder="Machine Description" class="form-control required" type="date" required="">
                                  <?php //  echo form_error('end_date', "<div class=\"error\">", '</div>' . "\n"); ?>
                              </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Comment</label>
                                <div class="col-md-9">
                                    <input name="comment"  placeholder="Comment" class="form-control" type="text">
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
    
  </body>
</html>