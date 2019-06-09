<?php
/*
*Filename:footer_view.php
*projectname:SA4I
*Date created:October 16, 2017
*Created by:Hemant Jaiswal
*Purpose: This file is used for footer content of the page
*/
?>
<!--<section id="contact" class="gray-section contact">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Contact Us</h1>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
            </div>
        </div>
        <div class="row m-b-lg">
            <div class="col-lg-3 col-lg-offset-3">
                <address>
                    <strong><span class="navy">Company name, Inc.</span></strong><br/>
                    795 Folsom Ave, Suite 600<br/>
                    San Francisco, CA 94107<br/>
                    <abbr title="Phone">P:</abbr> (123) 456-7890
                </address>
            </div>
            <div class="col-lg-4">
                <p class="text-color">
                    Consectetur adipisicing elit. Aut eaque, totam corporis laboriosam veritatis quis ad perspiciatis, totam corporis laboriosam veritatis, consectetur adipisicing elit quos non quis ad perspiciatis, totam corporis ea,
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="<?php // echo base_url();?>index.php/Contactus/index" class="btn btn-primary">Send us mail</a>
                <p class="m-t-sm">
                    Or follow us on social platform
                </p>
                <ul class="list-inline social-icon">
                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                <p><strong>Copyright</strong> &copy; <?php //echo date('Y').' '.$this->config->item('site_name');?>.<br/> consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
            </div>
        </div>
    </div>
</section>-->

<!--    <div class="footer no-print" id="Footer">
        <div>
            <strong>Copyright</strong> &copy; <?php echo date('Y').' '.$this->config->item('site_name');?>. All rights reserved.
        </div>
    </div>-->


    <footer class="footer" id="Footer">
        <strong>Copyright</strong> &copy; <?php echo date('Y').' '.$this->config->item('site_name');?>. All rights reserved.
    </footer>

 <!--<script src="<?php // echo site_url($this->config->item('theme_path')); ?>js/plugins/dataTables/datatables.min.js"></script>-->
<!-- Mainly scripts -->
<script src="<?php echo site_url($this->config->item('theme_path')); ?>js/jquery-3.1.1.min.js"></script>
<!--<script src="<?php // echo site_url($this->config->item('theme_path')); ?>js/jquery-2.1.1.js"></script>-->
<script src="<?php echo site_url($this->config->item('theme_path')); ?>js/bootstrap.min.js"></script>
<script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo site_url($this->config->item('theme_path')); ?>js/bootbox.min.js"></script>
<!-- Custom and plugin javascript -->
<script src="<?php echo site_url($this->config->item('theme_path')); ?>js/inspinia.js"></script>
<script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/pace/pace.min.js"></script>
<script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/wow/wow.min.js"></script>
<script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/dataTables/datatables.min.js"></script>
<!--<script src="<?php // echo site_url($this->config->item('theme_path')); ?>jquery.PrintArea.js" type="text/JavaScript" language="javascript"></script>-->
<script>

    $(document).ready(function () {

        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
    });

    var cbpAnimatedHeader = (function() {
        var docElem = document.documentElement,
                header = document.querySelector( '.navbar-default' ),
                didScroll = false,
                changeHeaderOn = 200;
        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }
        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();

    })();

    // Activate WOW.js plugin for animation on scrol
    new WOW().init();

</script>

</body>

</html>