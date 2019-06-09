<style>
    div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    margin-top: -30px;
}
</style>

<link href="<?php echo site_url($this->config->item('theme_path')); ?>css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">

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
                </div>
                <div class="ibox-content">
                    <div class="machine-list">

                        <table id="table_id" class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="text-align: center">Machine Name</th>
                                    <th style="text-align: center">Booking From</th>
                                    <th style="text-align: center">Booking To</th>
<!--                                    <th>Booking from</th>
                                    <th>Booking to</th>-->
                                    <th style="text-align: center">Status</th>
                                    
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
                                            <?php echo $machine->booking_from; ?>
                                        </td>
                                        <td class="machine-code">
                                            <?php echo $machine->booking_to; ?>
                                        </td>
                                        <td class="machine-status">
                                             <?php  if($machine->is_booked==1 ){
                                          echo " <span class=\"badge badge-primary\">Booked</span>";
                                            }
                                            else{
                                          echo "  <span class=\"badge badge-success\">Cancel</span>";
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
      $('#table_id').DataTable();
  
    var save_method; //for save method string
    var table;

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


</script>
  </body>
</html>