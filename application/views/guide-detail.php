<?php
/**
 * Created by PhpStorm.
 * User: HaiLong
 * Date: 5/27/2015
 * Time: 10:04 PM
 */
$TRAVEL_GUIDE_ID = "";
$CATEGORY_ID = "";
$NATIONAL = "";
$LOCATION = "";
$LOCATION_ID = "";
$GUIDE_TITLE = "";
$GUIDE_SRT_CNT = "";
$TRAVEL_GUIDE_RPV_IMG_URL = "";
$GUIDE_CONTENT = "";
$IMG_GRP_ID = "";

if(isset($guideDetail)){
    foreach ($guideDetail as $row) {
        $TRAVEL_GUIDE_ID = $row->TRAVEL_GUIDE_ID;
        $CATEGORY_ID = $row->CATEGORY_ID;
        $NATIONAL = $row->NATIONAL;
        $LOCATION = $row->LOCATION;
        $LOCATION_ID = $row->LOCATION_ID;
        $GUIDE_TITLE = $row->GUIDE_TITLE;
        $GUIDE_SRT_CNT = $row->GUIDE_SRT_CNT;
        $TRAVEL_GUIDE_RPV_IMG_URL = $row->TRAVEL_GUIDE_RPV_IMG_URL;
        $GUIDE_CONTENT = $row->GUIDE_CONTENT;
        $IMG_GRP_ID = $row->IMG_GRP_ID;
    }
}
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<div class="page-title-container" xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <div class="page-title pull-left">

        </div>
        <ul class="breadcrumbs pull-right">
            <li><a href="<?php echo base_url()?>"><?php echo $this->lang->line('home'); ?></a></li>
            <li><a href="<?php echo base_url()?>guides/guides_list/all"><?php echo $this->lang->line('guide'); ?></a></li>
            <li><a href="<?php echo base_url()?>guides/guide_detail/<?php echo $guideID?>"><?php echo $guideID; ?></a></li>
        </ul>
    </div>
</div>

<section id="content">
    <div class="container tour-detail-page">
        <div class="row">
            <div id="main" class="col-md-9">
                <div class="featured-gallery image-box">
                    <div class="flexslider photo-gallery style1" id="post-slideshow1" data-sync="#post-carousel1" data-func-on-start="showTourDetailedDiscount">
                        <ul class="slides">
                            <?php foreach ($imgData as $store) { echo '
                                <li ><img src = "'.base_url().$store->IMG_URL.'" alt = "'.$store->IMG_ALT.'" /></li >';
                            }?>
                        </ul>
                    </div>
                    <div class="flexslider image-carousel style1" id="post-carousel1"  data-animation="slide" data-item-width="70" data-item-margin="10" data-sync="#post-slideshow1">
                        <ul class="slides">
                            <ul class="slides">
                                <?php foreach ($imgData as $store) { echo '
                                <li ><img src = "'.base_url().$store->IMG_URL.'" alt = "'.$store->IMG_ALT.'" /></li >';
                                }?>
                            </ul>
                        </ul>
                    </div>
                </div>

                <div id="tour-details" class="travelo-box">
                    <div class="intro small-box table-wrapper full-width hidden-table-sms">
                        <div class="col-sm-4 table-cell travelo-box">
                            <dl class="term-description">
                                <dt><?php echo $this->lang->line('location')?>:</dt><dd><?php echo $LOCATION?> - <?php echo $NATIONAL?></dd>
                            </dl>
                        </div>
                        <div class="col-sm-8 table-cell travelo-box" align="center">
                                    <div class="box-title" >
                                        <span class="title1"><?php echo $GUIDE_TITLE?></span>
                                    </div>
                        </div>
                    </div>
                    <p><b><?php echo $GUIDE_SRT_CNT?></b></p>
                    <p><?php echo $GUIDE_CONTENT?></p>
                </div>
                <div class="fb-comments" data-href="<?php echo base_url('guides/guide_detail/'.$guideID)?>" data-width="800px" data-numposts="5" data-colorscheme="light"></div>
            </div>
            <div class="sidebar col-md-3">
                <div class="travelo-box">
                    <h4 class="box-title"><?php echo $this->lang->line('tourrelated'); ?></h4>
                    <div class="image-box style14">
                        <?php foreach($guideRelation as $row){?>
                            <article class="box">
                                <figure>
                                    <a href="<?php echo base_url()?>guides/guide_detail/<?php echo $row->TRAVEL_GUIDE_ID?>" title=""><img width="63" height="59" src="<?php echo base_url()?><?php echo $row->TRAVEL_GUIDE_RPV_IMG_URL?>" alt=""></a>
                                </figure>
                                <div class="details">
                                    <h5 class="box-title"><a href="<?php echo base_url()?>guides/guide_detail/<?php echo $row->TRAVEL_GUIDE_ID?>"><?php echo $row->GUIDE_TITLE?></a></h5>
                                </div>
                            </article>
                            <?php ;}?>
                    </div>
                </div>
                <div class="travelo-box book-with-us-box">
                    <h4><?php echo $this->lang->line('whychose'); ?></h4>
                    <ul>
                        <li>
                            <i class="soap-icon-hotel-1 circle"></i>
                            <h5 class="title"><a href="#"><?php echo $this->lang->line('1000hotel'); ?></a></h5>
                            <p><?php echo $this->lang->line('1000hotelcnt'); ?></p>
                        </li>
                        <li>
                            <i class="soap-icon-savings circle"></i>
                            <h5 class="title"><a href="#"><?php echo $this->lang->line('lowrate'); ?></a></h5>
                            <p><?php echo $this->lang->line('lowratecnt'); ?></p>
                        </li>
                        <li>
                            <i class="soap-icon-support circle"></i>
                            <h5 class="title"><a href="#"><?php echo $this->lang->line('exsupport'); ?></a></h5>
                            <p><?php echo $this->lang->line('exsupportcnt'); ?></p>
                        </li>
                    </ul>
                </div>
                <div class="travelo-box contact-box">
                    <h4 class="box-title"><?php echo $this->lang->line('needhelp'); ?></h4>
                    <p><?php echo $this->lang->line('needhelpcnt'); ?></p>
                    <address class="contact-details">
                        <span class="contact-phone"><i class="soap-icon-phone"></i>0905-99-79-89</span>
                        <br />
                        <a href="#" class="contact-email">hotro.vungchuatravel@gmail.com</a>
                    </address>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Javascript -->
<script type="text/javascript" src="<?php echo base_url()?>resources/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>resources/js/jquery.noconflict.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>resources/js/modernizr.2.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>resources/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>resources/js/jquery.placeholder.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>resources/js/jquery-ui.1.10.4.min.js"></script>

<!-- Twitter Bootstrap -->
<script type="text/javascript" src="<?php echo base_url()?>resources/js/bootstrap.js"></script>

<!-- parallax -->
<script type="text/javascript" src="<?php echo base_url()?>resources/js/jquery.stellar.min.js"></script>

<!-- waypoint -->
<script type="text/javascript" src="<?php echo base_url()?>resources/js/waypoints.min.js"></script>

<!-- Google Map Api -->
<script type='text/javascript' src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
<script type="text/javascript" src="<?php echo base_url()?>resources/js/gmap3.min.js"></script>

<!-- load page Javascript -->
<script type="text/javascript" src="<?php echo base_url()?>resources/js/theme-scripts.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>resources/js/scripts.js"></script>

<script type="text/javascript">
    tjq(".tour-google-map").gmap3({
        map: {
            options: {
                center: [<?php echo $MAP_PLACE_X?>, <?php echo $MAP_PLACE_Y?>],
                zoom: 12
            }
        },
        marker:{
            values: [
                {latLng:[<?php echo $MAP_PLACE_X?>, <?php echo $MAP_PLACE_Y?>], data:"<?php echo $START_ARRIVAL_LOCATION?>"}

            ],
            options: {
                draggable: false
            }
        }
    });
</script>