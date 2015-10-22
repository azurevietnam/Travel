<?php
/**
 * Created by PhpStorm.
 * User: HaiLong
 * Date: 4/14/2015
 * Time: 9:56 PM
 */?>
<footer id="footer" class="style3">
    <div class="footer-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <h2><?php echo $this->lang->line('discover1'); ?></h2>
                    <ul class="discover triangle hover row">
                        <li class="active col-xs-6"><a href="#"><?php echo $this->lang->line('aboutus'); ?></a></li>
                        <li class="col-xs-6"><a href="#"><?php echo $this->lang->line('recruitment'); ?></a></li>
                        <li class="col-xs-6"><a href="#"><?php echo $this->lang->line('openletter'); ?></a></li>
                        <li class="col-xs-6"><a href="#"><?php echo $this->lang->line('investment'); ?></a></li>
                        <li class="col-xs-6"><a href="#"><?php echo $this->lang->line('vision'); ?></a></li>
                        <li class="col-xs-6"><a href="#"><?php echo $this->lang->line('agency'); ?></a></li>
                        <li class="col-xs-6"><a href="#"><?php echo $this->lang->line('commitment'); ?></a></li>
                        <li class="col-xs-6"><a href="#"><?php echo $this->lang->line('organization'); ?></a></li>
                        <li class="col-xs-6"><a href="#"><?php echo $this->lang->line('linked'); ?></a></li>
                        <li class="col-xs-6"><a href="#"><?php echo $this->lang->line('sitemap'); ?></a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" style="line-height: 2em">
                    <h2><?php echo $this->lang->line('aboutvctravel'); ?></h2>
                    <b><?php echo $this->lang->line('headquarter'); ?>:</b> <?php echo $this->lang->line('vcAddress'); ?><br />
                    <b><?php echo $this->lang->line('branch'); ?>:</b> <?php echo $this->lang->line('brAddress'); ?><br />
                    <b>Tel:</b> (052)3 82 88 82 - Fax: (052)3 852 999<br />
                    <b>Hotline:</b> 0905 99 79 89 / 0915 21 83 88 - Mr.Dung<br />
                    <b>Email:</b> vungchuatravel@gmail.com<br />
                    <b>Hotline:</b> 0949 07 86 86 / 0905 99 79 89<br />
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" align="center">
                    <h2><?php echo $this->lang->line('oSupport'); ?></h2>
                    <ul class="discover">
                        <li class="col-xs-6"><i class="fa fa-phone" style="font-size: x-large; color: #12a0c3"></i></li>
                        <li class="col-xs-6"><i class="fa fa-phone" style="font-size: x-large; color: #12a0c3"></i></li>
                        <li class="col-xs-6"><b style="color: #12a0c3">0523.82.88.82</b></li>
                        <li class="col-xs-6"><b style="color: #12a0c3">0949.07.86.86</b></li>
                        <li class="col-xs-6"><a title="vungchuatravel" href="skype:dieuhanh.vungchuatravel?call"><i class="fa fa-skype" style="font-size: x-large; color: #12a0c3"></i></a></li>
                        <li class="col-xs-6"><a title="vungchuatravel" href="ymsgr:SendIM?vungchuatravel"><img src="http://opi.yahoo.com/online?u=vungchuatravel&amp;m=g&amp;t=2"/></a></li>
                        <li class="col-xs-6"><a title="dieuhanh.vungchuatravel" href="skype:dieuhanh.vungchuatravel?call"><i class="fa fa-skype" style="font-size: x-large; color: #12a0c3"></i></a></li>
                        <li class="col-xs-6"><a title="dieuhanh.vungchuatravel" href="ymsgr:SendIM?dieuhanh.vungchuatravel"><img src="http://opi.yahoo.com/online?u=dieuhanh.vungchuatravel&amp;m=g&amp;t=2" /></a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                    <b style="color: #12a0c3"><?php echo $this->lang->line('aboutvctraveldesc'); ?></b>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom gray-area">
        <div class="container">
            <div class="logo pull-left">
                <a href="<?php echo base_url()?>" title="<?php echo (isset($metaTitle)) ? $metaTitle : $this->lang->line('title');?>">
                    <img src="<?php echo base_url()?>resources/images/logo.png" alt="<?php echo (isset($metaDesc)) ? $metaDesc : $this->lang->line('description');?>" />
                </a>
            </div>
            <div class="pull-right">
                <a id="back-to-top" href="#" class="animated" data-animation-type="bounce"><i class="soap-icon-longarrow-up circle"></i></a>
            </div>
            <div class="copyright pull-right">
                <p><?php echo $this->lang->line('cpyRight'); ?></p>
            </div>
        </div>
    </div>
</footer>
</div>

<div id="social-share" class="social-share">
    <ul>
        <li><a href="https://www.facebook.com/vungchuatravel"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
        <li><a href="skype:dieuhanh.vungchuatravel?call"><i class="fa fa-skype"></i></a></li>
        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
        <li><a href="#"><i class="fa fa-flickr"></i></a></li>
    </ul>
</div>

<!-- Javascript -->
<script type="text/javascript" src="<?php echo base_url()?>resources/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>resources/js/jquery.noconflict.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>resources/js/modernizr.2.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>resources/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>resources/js/jquery.placeholder.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>resources/js/jquery-ui.1.10.4.min.js"></script>

<!-- Twitter Bootstrap -->
<script type="text/javascript" src="<?php echo base_url()?>resources/js/bootstrap.min.js"></script>

<!-- load revolution slider scripts -->
<script type="text/javascript" src="<?php echo base_url()?>resources/components/revolution_slider/js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>resources/components/revolution_slider/js/jquery.themepunch.revolution.min.js"></script>

<!-- load BXSlider scripts -->
<script type="text/javascript" src="<?php echo base_url()?>resources/components/jquery.bxslider/jquery.bxslider.min.js"></script>

<!-- Google Map Api -->
<script type='text/javascript' src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
<script type="text/javascript" src="<?php echo base_url()?>resources/js/gmap3.min.js"></script>

<!-- Flex Slider -->
<script type="text/javascript" src="<?php echo base_url()?>resources/components/flexslider/jquery.flexslider.js"></script>

<!-- parallax -->
<script type="text/javascript" src="<?php echo base_url()?>resources/js/jquery.stellar.min.js"></script>

<!-- waypoint -->
<script type="text/javascript" src="<?php echo base_url()?>resources/js/waypoints.min.js"></script>

<!-- load page Javascript -->
<script type="text/javascript" src="<?php echo base_url()?>resources/js/theme-scripts.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>resources/js/scripts.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>resources/js/custom.js"></script>

</body>
</html>