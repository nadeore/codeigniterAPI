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
                    <h5>All companies assigned to this account</h5>
                    <div class="ibox-tools">
                        <a onclick="printDiv('printableArea')" id="print_button1" class="btn btn-primary"><i class="fa fa-print"></i> Print Qr </a>
                    </div>
                </div>
                <div class="ibox-content"id="printableArea">
                    
                    <div class="company-list">

                        <table class="table table-hover">
                                <?php
//                                print_r($barcode);
                                if ($barcode) { 
                                    foreach ($barcode as $machine) {
                                    ?>
                            <div class="col-md-2 file-box" style="margin-left: 30px; width: 400px;">
                                <div class="file">
                                   
                                    <div class="image" style="text-align: center;"> 
                                        <img class="image" src="http://sa4i.leoinfotech.in/application/views/<?php echo $machine->bar_code;?>.gif">			
                                        </div>
                                        <div class="file-name" style="text-align: center;">
                                            <label id="descriptionname"> 
                                            <?php echo $machine->machine_name; ?>    
                                            </label>
                                        </div>
                                </div>
                            </div>
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
</div>
   
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
</script>
<script>
   function printDiv(printableArea) {
     var printContents = document.getElementById(printableArea).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
function myFunction() {
    window.print();
}
  </script>

