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
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <h2><?php echo $this->lang->line('discover1'); ?></h2>
                    <ul class="discover triangle hover row">
                        <li class="active col-xs-6"><a href="#"><?php echo $this->lang->line('discover1'); ?></a></li>
                        <li class="col-xs-6"><a href="#"><?php echo $this->lang->line('aboutus'); ?></a></li>
                        <li class="col-xs-6"><a href="#"><?php echo $this->lang->line('safety'); ?></a></li>
                        <li class="col-xs-6"><a href="#"><?php echo $this->lang->line('agency'); ?></a></li>
                        <li class="col-xs-6"><a href="#"><?php echo $this->lang->line('service'); ?></a></li>
                        <li class="col-xs-6"><a href="#"><?php echo $this->lang->line('sitemap'); ?></a></li>
                        <li class="col-xs-6"><a href="#"><?php echo $this->lang->line('policies'); ?></a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <h2>Travel News</h2>
                    <ul class="travel-news">
                        <li>
                            <div class="thumb">
                                <a href="#">
                                    <img src="<?php echo base_url()?>resources/images/news01.png" alt="" width="63" height="63" />
                                </a>
                            </div>
                            <div class="description">
                                <h5 class="s-title"><a href="#">Amazing Places</a></h5>
                                <p>Amazing places.</p>
                                <span class="date">25 Sep, 2013</span>
                            </div>
                        </li>
                        <li>
                            <div class="thumb">
                                <a href="#">
                                    <img src="<?php echo base_url()?>resources/images/news02.png" alt="" width="63" height="63" />
                                </a>
                            </div>
                            <div class="description">
                                <h5 class="s-title"><a href="#">Travel Insurance</a></h5>
                                <p>Travel Insurance.</p>
                                <span class="date">24 Sep, 2013</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <h2><?php echo $this->lang->line('maillist'); ?></h2>
                    <p><?php echo $this->lang->line('maillistdesc'); ?></p>
                    <br />
                    <div class="icon-check">
                        <input type="text" class="input-text full-width" placeholder="your email" />
                    </div>
                    <br />
                    <span><?php echo $this->lang->line('maillistdesc1'); ?></span>
                    <ul class="social-icons clearfix">
                        <li class="twitter"><a title="twitter" href="#" data-toggle="tooltip"><i class="soap-icon-twitter"></i></a></li>
                        <li class="googleplus"><a title="googleplus" href="#" data-toggle="tooltip"><i class="soap-icon-googleplus"></i></a></li>
                        <li class="facebook"><a title="facebook" href="https://www.facebook.com/vungchuatravel" data-toggle="tooltip"><i class="soap-icon-facebook"></i></a></li>
                        <li class="linkedin"><a title="linkedin" href="#" data-toggle="tooltip"><i class="soap-icon-linkedin"></i></a></li>
                        <li class="dribble"><a title="dribble" href="#" data-toggle="tooltip"><i class="soap-icon-dribble"></i></a></li>
                        <li class="flickr"><a title="flickr" href="#" data-toggle="tooltip"><i class="soap-icon-flickr"></i></a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <h2><?php echo $this->lang->line('aboutvctravel'); ?></h2>
                    <?php echo $this->lang->line('aboutvctraveldesc'); ?><br />
                    <?php echo $this->lang->line('vcAddress'); ?><br />
                    Tel: (052)3 82 88 82 - Fax: (052)3 852 999<br />
                    Email: vungchuatravel@gmail.com <br />
                    Hotline: 0949 07 86 86 / 0905 99 79 89
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

<!-- Flex Slider -->
<script type="text/javascript" src="<?php echo base_url()?>resources/components/flexslider/jquery.flexslider.js"></script>

<!-- parallax -->
<script type="text/javascript" src="<?php echo base_url()?>resources/js/jquery.stellar.min.js"></script>

<!-- parallax -->
<script type="text/javascript" src="<?php echo base_url()?>resources/js/jquery.stellar.min.js"></script>

<!-- waypoint -->
<script type="text/javascript" src="<?php echo base_url()?>resources/js/waypoints.min.js"></script>

<!-- load page Javascript -->
<script type="text/javascript" src="<?php echo base_url()?>resources/js/theme-scripts.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>resources/js/scripts.js"></script>

<script type="text/javascript">
    tjq(document).ready(function() {
        tjq('.revolution-slider').revolution(
            {
                dottedOverlay:"none",
                delay:8000,
                startwidth:1170,
                startheight:646,
                onHoverStop:"on",
                hideThumbs:10,
                fullWidth:"on",
                forceFullWidth:"on",
                navigationType:"none",
                shadow:0,
                spinner:"spinner4",
                hideTimerBar:"on"
            });
    });
</script>
</body>
</html>