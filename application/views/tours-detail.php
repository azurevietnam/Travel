<?php
/**
 * Created by PhpStorm.
 * User: HaiLong
 * Date: 5/27/2015
 * Time: 10:04 PM
 */
$NATIONAL = "";
$LOCATION = "";
$CATEGORY_ID = "";
$TOURS_TIT = "";
$TOUR_CNT = "";
$TOURS_LENGTH = "";
$TRANSPORT = "";
$PRICE_CNT = "";
$REMARK = "";
$TOUR_PRICE = "";
$DISCOUNT = "";
$START_ARRIVAL_LOCATION = "";
$START_DEPARTURE_LOCATION = "";
$START_ARRIVAL_TIME = "";
$START_DEPARTURE_TIME = "";
$END_ARRIVAL_LOCATION = "";
$END_DEPARTURE_LOCATION = "";
$END_ARRIVAL_TIME = "";
$END_DEPARTURE_TIME = "";
$MAP_PLACE_X = "";
$MAP_PLACE_Y = "";

if(isset($tour_detail)){
    foreach ($tour_detail as $row) {
        $NATIONAL = $row->NATIONAL;
        $LOCATION = $row->LOCATION;
        $CATEGORY_ID = $row->CATEGORY_ID;
        $TOURS_TIT = $row->TOURS_TIT;
        $TOUR_CNT = $row->TOUR_CNT;
        $TOURS_LENGTH = $row->TOURS_LENGTH;
        $TRANSPORT = $row->TRANSPORT;
        $PRICE_CNT = $row->PRICE_CNT;
        $REMARK = $row->REMARK;
        $TOUR_PRICE = $row->TOUR_PRICE;
        $DISCOUNT = $row->DISCOUNT;
        $START_ARRIVAL_LOCATION = $row->START_ARRIVAL_LOCATION;
        $START_DEPARTURE_LOCATION = $row->START_DEPARTURE_LOCATION;
        $START_ARRIVAL_TIME = $row->START_ARRIVAL_TIME;
        $START_DEPARTURE_TIME = $row->START_DEPARTURE_TIME;
        $END_ARRIVAL_LOCATION = $row->END_ARRIVAL_LOCATION;
        $END_DEPARTURE_LOCATION = $row->END_DEPARTURE_LOCATION;
        $END_ARRIVAL_TIME = $row->END_ARRIVAL_TIME;
        $END_DEPARTURE_TIME = $row->END_DEPARTURE_TIME;
        $MAP_PLACE_X = $row->MAP_PLACE_X;
        $MAP_PLACE_Y = $row->MAP_PLACE_Y;
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
            <li><a href="<?php echo base_url()?>tours/tours_list/all"><?php echo $this->lang->line('tours'); ?></a></li>
            <li><a href="<?php echo base_url()?>tours/tours_detail/<?php echo $tourID?>"><?php if($tourID=='all'){echo $this->lang->line('all');}
                    else{echo $tourID;}; ?></a></li>
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

                <div id="tour-details" class="VungChuaTravel-box">
                    <div class="intro small-box table-wrapper full-width hidden-table-sms">
                        <div class="col-sm-4 table-cell VungChuaTravel-box">
                            <dl class="term-description">
                                <dt><?php echo $this->lang->line('location')?>:</dt><dd><?php echo $LOCATION?> - <?php echo $NATIONAL?></dd>
                                <dt><?php echo $this->lang->line('transportation')?>:</dt><dd><?php echo $TRANSPORT?></dd>
                                <dt><?php echo $this->lang->line('price')?>:</dt><dd><?php echo $TOUR_PRICE?> <?php echo $this->lang->line('currency')?></dd>
                                <dt><?php echo $this->lang->line('tourday')?>:</dt><dd><?php echo $TOURS_LENGTH?> - <?php echo $this->lang->line('day')?></dd>
                                <dt><?php echo $this->lang->line('discount')?>:</dt><dd><?php echo $DISCOUNT?>%</dd>
                            </dl>
                        </div>
                        <div class="col-sm-8 table-cell">
                            <div class="detailed-features">
                                <div class="price-section clearfix">
                                    <div class="details">
                                        <h4 class="box-title"><?php echo $TOURS_TIT?><small><?php echo $TOURS_LENGTH?> - <?php echo $this->lang->line('day')?></small></h4>
                                    </div>
                                    <div class="details">
                                        <span class="price"><?php echo $TOUR_PRICE?> <?php echo $this->lang->line('currency')?></span>
                                        <a href="<?php echo base_url()?>tours/tours_booking/<?php echo $tourID?>" class="button green btn-small uppercase"><?php echo $this->lang->line('booknow')?></a>
                                    </div>
                                </div>
                                <div class="flights table-wrapper">
                                    <div class="table-row">
                                        <div class="table-cell">
                                            <h4 class="box-title"><?php echo $START_DEPARTURE_LOCATION?> - <?php echo $START_ARRIVAL_LOCATION?><small></small></h4>
                                        </div>
                                        <div class="table-cell">
                                            <i class="icon soap-icon-plane-right take-off"></i>
                                            <dl><dt><?php echo $this->lang->line('departs')?></dt><dd><?php echo $START_DEPARTURE_TIME?></dd></dl>
                                        </div>
                                        <div class="table-cell">
                                            <i class="icon soap-icon-plane-right landing"></i>
                                            <dl><dt><?php echo $this->lang->line('arrives')?></dt><dd><?php echo $START_ARRIVAL_TIME?></dd></dl>
                                        </div>
                                    </div>
                                    <div class="table-row">
                                        <div class="table-cell">
                                            <h4 class="box-title"><?php echo $END_DEPARTURE_LOCATION?> - <?php echo $END_ARRIVAL_LOCATION?><small></small></h4>
                                        </div>
                                        <div class="table-cell">
                                            <i class="icon soap-icon-plane-right take-off"></i>
                                            <dl><dt><?php echo $this->lang->line('departs')?></dt><dd><?php echo $END_DEPARTURE_TIME?></dd></dl>
                                        </div>
                                        <div class="table-cell">
                                            <i class="icon soap-icon-plane-right landing"></i>
                                            <dl><dt><?php echo $this->lang->line('arrives')?></dt><dd><?php echo $END_ARRIVAL_TIME?></dd></dl>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tour-google-map block"></div>
                        <div class="tab-container">
                            <ul class="tabs">
                                <li class="active"><a href="#tours-schedule-tab" data-toggle="tab"><?php echo $this->lang->line('tourschedule'); ?></a></li>
                                <li><a href="#tours-price-tab" data-toggle="tab"><?php echo $this->lang->line('tourprice'); ?></a></li>
                                <li><a href="#tours-note-tab" data-toggle="tab"><?php echo $this->lang->line('tournote'); ?></a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tours-schedule-tab">
                                    <h2><?php echo $TOURS_TIT?></h2>
                                    <p><?php echo $TOUR_CNT?></p>
                                    <?php foreach($tour_schedule as $row){
                                        echo '<h2>'. $row->DEPARTURE_TIME.' - '.$row->ARRIVAL_TIME.'</h2>
                                                <p>'.$row->CONTENT.'</p>';
                                    }
                                    ?>
                                </div>

                                <div class="tab-pane fade" id="tours-price-tab">
                                    <p><?php echo $PRICE_CNT?></p>
                                </div>

                                <div class="tab-pane fade" id="tours-note-tab">
                                    <p><?php echo $REMARK?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="fb-comments" data-href="<?php echo base_url()?>tours/tours_detail/<?php echo $tourID?>" data-width="800px" data-numposts="5" data-colorscheme="light"></div>
            </div>
            <div class="sidebar col-md-3">
                <div class="VungChuaTravel-box">
                    <h4 class="box-title"><?php echo $this->lang->line('tourrelated'); ?></h4>
                    <div class="image-box style14">
                        <?php foreach($tour_relation as $row){?>
                        <article class="box">
                            <figure>
                                <a href="<?php echo base_url()?>tours/tours_detail/<?php echo $row->TOURS_ID?>" title=""><img width="63" height="59" src="<?php echo base_url()?><?php echo $row->TOURS_RPV_IMG_URL?>" alt=""></a>
                            </figure>
                            <div class="details">
                                <h5 class="box-title"><a href="<?php echo base_url()?>tours/tours_detail/<?php echo $row->TOURS_ID?>"><?php echo $row->TOURS_TIT?></a></h5>
                                <label class="price-wrapper"><span class="price-per-unit"><?php echo $row->PRICE?></span><?php echo $this->lang->line('currency'); ?></label><br>
                                <label class="price-wrapper"><span class="price-per-unit"><?php echo $row->TOURS_LENGTH?></span><?php echo $this->lang->line('day'); ?></label>
                            </div>
                        </article>
                        <?php ;}?>
                    </div>
                </div>
                <div class="VungChuaTravel-box book-with-us-box">
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
                <div class="VungChuaTravel-box contact-box">
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