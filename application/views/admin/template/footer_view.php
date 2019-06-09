<?php
/*
*Filename:footer_view.php
*projectname:sa4i
*Date created:October 14, 2017
*Created by:Hemant Jaiswal
*Purpose: This file is used for footer content of the page
*/
?>         
            <div class="footer">
                <div>
                    <strong>Copyright</strong> &copy; <?php echo date('Y').' '.$this->config->item('site_name');?>. All rights reserved.
                </div>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/dataTables/datatables.min.js"></script>
    <script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo site_url($this->config->item('theme_path')); ?>js/bootbox.min.js"></script>

    <!-- Peity -->
    <script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?php echo site_url($this->config->item('theme_path')); ?>js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo site_url($this->config->item('theme_path')); ?>js/inspinia.js"></script>
    <script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="<?php echo site_url($this->config->item('theme_path')); ?>js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/chartJs/Chart.min.js"></script>


    <script>
        $(document).ready(function() {
            var data1 = [
                [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
            ];
            var data2 = [
                [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
            ];
            $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                data1, data2
            ],
                    {
                        series: {
                            lines: {
                                show: false,
                                fill: true
                            },
                            splines: {
                                show: true,
                                tension: 0.4,
                                lineWidth: 1,
                                fill: 0.4
                            },
                            points: {
                                radius: 0,
                                show: true
                            },
                            shadowSize: 2
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#d5d5d5",
                            borderWidth: 1,
                            color: '#d5d5d5'
                        },
                        colors: ["#1ab394", "#1C84C6"],
                        xaxis:{
                        },
                        yaxis: {
                            ticks: 4
                        },
                        tooltip: false
                    }
            );
        });
    </script>
</body>
</html>