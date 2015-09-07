<?php
/**
 * Created by PhpStorm.
 * User: POSCO_ICT_HAILONG
 * Date: 7/14/2015
 * Time: 1:59 PM
 */?>

<aside id="sidebar-right" class="sidebar-right">
    <div class="nano">
        <div class="nano-content">
            <a href="#" class="mobile-close visible-xs">
                Collapse <i class="fa fa-chevron-right"></i>
            </a>

            <div class="sidebar-right-wrapper">

                <div class="sidebar-widget widget-calendar">
                    <h6>Upcoming Tasks</h6>
                    <div data-plugin-datepicker data-plugin-skin="dark" ></div>

                    <ul>
                        <li>
                            <time datetime="2014-04-19T00:00+00:00">04/19/2014</time>
                            <span>Company Meeting</span>
                        </li>
                    </ul>
                </div>

                <div class="sidebar-widget widget-friends">
                    <h6>Friends</h6>
                    <ul>
                        <li class="status-online">
                            <figure class="profile-picture">
                                <img src="<?php echo base_url('admin/images/!sample-user.jpg')?>" alt="Joseph Doe" class="img-circle">
                            </figure>
                            <div class="profile-info">
                                <span class="name">Joseph Doe Junior</span>
                                <span class="title">Hey, how are you?</span>
                            </div>
                        </li>
                        <li class="status-online">
                            <figure class="profile-picture">
                                <img src="<?php echo base_url('admin/images/!sample-user.jpg')?>" alt="Joseph Doe" class="img-circle">
                            </figure>
                            <div class="profile-info">
                                <span class="name">Joseph Doe Junior</span>
                                <span class="title">Hey, how are you?</span>
                            </div>
                        </li>
                        <li class="status-offline">
                            <figure class="profile-picture">
                                <img src="<?php echo base_url('admin/images/!sample-user.jpg')?>" alt="Joseph Doe" class="img-circle">
                            </figure>
                            <div class="profile-info">
                                <span class="name">Joseph Doe Junior</span>
                                <span class="title">Hey, how are you?</span>
                            </div>
                        </li>
                        <li class="status-offline">
                            <figure class="profile-picture">
                                <img src="<?php echo base_url('admin/images/!sample-user.jpg')?>" alt="Joseph Doe" class="img-circle">
                            </figure>
                            <div class="profile-info">
                                <span class="name">Joseph Doe Junior</span>
                                <span class="title">Hey, how are you?</span>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</aside>
</section>
<!-- Vendor -->
<script src="<?php echo base_url()?>admin/vendor/jquery/jquery.js"></script>
<script src="<?php echo base_url()?>admin/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="<?php echo base_url()?>admin/vendor/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url()?>admin/vendor/nanoscroller/nanoscroller.js"></script>
<script src="<?php echo base_url()?>admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url()?>admin/vendor/magnific-popup/magnific-popup.js"></script>
<script src="<?php echo base_url()?>admin/vendor/jquery-placeholder/jquery.placeholder.js"></script>

<!-- Specific Page Vendor -->
<script src="<?php echo base_url()?>admin/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
<script src="<?php echo base_url()?>admin/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
<script src="<?php echo base_url()?>admin/vendor/jquery-appear/jquery.appear.js"></script>
<script src="<?php echo base_url()?>admin/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="<?php echo base_url()?>admin/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
<script src="<?php echo base_url()?>admin/vendor/flot/jquery.flot.js"></script>
<script src="<?php echo base_url()?>admin/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
<script src="<?php echo base_url()?>admin/vendor/flot/jquery.flot.pie.js"></script>
<script src="<?php echo base_url()?>admin/vendor/flot/jquery.flot.categories.js"></script>
<script src="<?php echo base_url()?>admin/vendor/flot/jquery.flot.resize.js"></script>
<script src="<?php echo base_url()?>admin/vendor/jquery-sparkline/jquery.sparkline.js"></script>
<script src="<?php echo base_url()?>admin/vendor/raphael/raphael.js"></script>
<script src="<?php echo base_url()?>admin/vendor/morris/morris.js"></script>
<script src="<?php echo base_url()?>admin/vendor/gauge/gauge.js"></script>
<script src="<?php echo base_url()?>admin/vendor/snap-svg/snap.svg.js"></script>
<script src="<?php echo base_url()?>admin/vendor/liquid-meter/liquid.meter.js"></script>
<script src="<?php echo base_url()?>admin/vendor/jqvmap/jquery.vmap.js"></script>
<script src="<?php echo base_url()?>admin/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
<script src="<?php echo base_url()?>admin/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
<script src="<?php echo base_url()?>admin/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
<script src="<?php echo base_url()?>admin/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
<script src="<?php echo base_url()?>admin/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
<script src="<?php echo base_url()?>admin/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
<script src="<?php echo base_url()?>admin/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
<script src="<?php echo base_url()?>admin/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>
<script src="<?php echo base_url()?>admin/vendor/select2/select2.js"></script>
<script src="<?php echo base_url()?>admin/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url()?>admin/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
<script src="<?php echo base_url()?>admin/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
<script src="<?php echo base_url()?>admin/vendor/ios7-switch/ios7-switch.js"></script>
<script src="<?php echo base_url()?>admin/vendor/summernote/summernote.js"></script>

<script src="<?php echo base_url()?>admin/vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
<script src="<?php echo base_url()?>admin/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
<script src="<?php echo base_url()?>admin/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="<?php echo base_url()?>admin/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script src="<?php echo base_url()?>admin/vendor/fuelux/js/spinner.js"></script>
<script src="<?php echo base_url()?>admin/vendor/dropzone/dropzone.js"></script>
<script src="<?php echo base_url()?>admin/vendor/bootstrap-markdown/js/markdown.js"></script>
<script src="<?php echo base_url()?>admin/vendor/bootstrap-markdown/js/to-markdown.js"></script>
<script src="<?php echo base_url()?>admin/vendor/bootstrap-markdown/js/bootstrap-markdown.js"></script>
<script src="<?php echo base_url()?>admin/vendor/codemirror/lib/codemirror.js"></script>
<script src="<?php echo base_url()?>admin/vendor/codemirror/addon/selection/active-line.js"></script>
<script src="<?php echo base_url()?>admin/vendor/codemirror/addon/edit/matchbrackets.js"></script>
<script src="<?php echo base_url()?>admin/vendor/codemirror/mode/javascript/javascript.js"></script>
<script src="<?php echo base_url()?>admin/vendor/codemirror/mode/xml/xml.js"></script>
<script src="<?php echo base_url()?>admin/vendor/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<script src="<?php echo base_url()?>admin/vendor/codemirror/mode/css/css.js"></script>
<script src="<?php echo base_url()?>admin/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
<script src="<?php echo base_url()?>admin/vendor/jquery-autosize/jquery.autosize.js"></script>
<script src="<?php echo base_url()?>admin/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="<?php echo base_url()?>admin/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="<?php echo base_url()?>admin/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="<?php echo base_url()?>admin/javascripts/theme.init.js"></script>
<!-- Examples -->
<script src="<?php echo base_url()?>admin/javascripts/tables/examples.datatables.default.js"></script>
<script src="<?php echo base_url()?>admin/javascripts/tables/examples.datatables.row.with.details.js"></script>
<script src="<?php echo base_url()?>admin/javascripts/tables/examples.datatables.tabletools.js"></script>

</body>
</html>