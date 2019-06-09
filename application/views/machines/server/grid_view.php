<?php
/*
 * Filename:grid_view.php
 * projectname:sa4i
 * Date created:October 26, 2017
 * Created by: Hemant Jaiswal
 * Purpose: This file will show the machines grid
 */
?>
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
<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>All machines assigned to this account</h5>
                    <div class="ibox-tools">
                        <?php echo anchor('machines/add', 'Create new machine', array('class' => 'btn btn-primary btn-xs'));?>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row m-b-sm m-t-sm">
                        <div class="col-md-1">
                            <button type="button" id="loading-example-btn" class="btn btn-white btn-sm" ><i class="fa fa-refresh"></i> Refresh</button>
                        </div>
                        <div class="col-md-11">
                            <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span></div>
                        </div>
                    </div>

                    <div class="machine-list">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Machine Name</th>
                                    <th>Machine Type</th>
                                    <th>Machine Code</th>
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
                                            <span class="label label-primary"><?php if($machine->is_active == 1) echo 'Active'; else echo 'Unactive';?></span>
                                        </td>
                                        <td class="machine-actions">
                                            <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                            <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                        </td>
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

    /*setTimeout(function() {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 4000
        };
        toastr.success('Machines list', 'Welcome to SA4I');
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