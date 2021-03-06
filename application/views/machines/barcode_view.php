<?php
/*
 * Filename:grid_view.php
 * projectname:sa4i
 * Date created:October 26, 2017
 * Created by: Hemant Jaiswal
 * Purpose: This file will show the machines grid
*/
                      
?>


<script type="text/javascript" src="<?php echo site_url(); ?>js/jquery-3.1.1.min.js"></script>  
<link href="<?php echo site_url($this->config->item('theme_path')); ?>css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">
<style media="print">
 @page { size: auto;  margin: 0.5mm; }
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
                    <!--<h5>All machines assigned to this account</h5>-->
			<h5>Machine Bar-code</h5>
                    <div class="title-action">
                        <a onclick="printDiv('printableArea')" id="print_button1" class="btn btn-primary"><i class="fa fa-print"></i> Print Barcode </a>
                    </div>
                </div>
                <div class="ibox-content" id="printableArea">

                    <div class="machine-list">

                        <table class="table table-hover">
                                <?php 
//                                print_r($barcode);
                                if ($barcode) { 
                                    foreach ($barcode as $machine) {
                                    ?>
                            <div class="col-md-2 file-box" style="margin-left: 30px; width: 550px;">
                                <div class="file">
                                   
                                    <div class="image" style="text-align: center; width: 526px;"> 

                                        <div id="barcodeDiv">
                                            <script>
                                                $(document).ready(function(){
                                                    $("#barcodeDiv").load("http://sa4i.leoinfotech.in/application/views/qrview.php?machineName=<?php echo $machine->bar_code; ?>");
                                                });
                                            </script>
                                        </div>
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
</div><script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>
<script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="jquery.zohoviewer.min.js"></script>
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
 
  </body>
</html>