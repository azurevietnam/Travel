<?php
/**
 * Created by PhpStorm.
 * User: HaiLong
 * Date: 5/27/2015
 * Time: 10:04 PM
 */


?>
<!-- Place this tag in your head or just before your close body tag. -->
<script src="https://apis.google.com/js/platform.js" async defer>
    {lang: 'vi'}
</script>

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
            <?php if(isset($tour_detail)){
                foreach($tour_detail as $row){ ?>
            <div id="main" class="col-md-9">
                <div class="col-md-7 featured-gallery image-box">
                    <?php if(isset($imgData)){?>
                    <div class="flexslider photo-gallery style1" id="post-slideshow1" data-sync="#post-carousel1" data-func-on-start="showTourDetailedDiscount">
                        <ul class="slides">
                            <?php foreach($imgData as $store){?>
                            <li ><img src = "<?php echo base_url($store->IMG_URL) ?>" alt = "<?php echo $store->IMG_ALT ?>" /></li >
                            <?php }?>
                        </ul>
                    </div>
                    <div class="flexslider image-carousel style1" id="post-carousel1"  data-animation="slide" data-item-width="70" data-item-margin="10" data-sync="#post-slideshow1">
                        <ul class="slides">
                            <?php foreach($imgData as $store){?>
                                    <li ><img src = "<?php echo base_url($store->IMG_URL) ?>" alt = "<?php echo $store->IMG_ALT ?>" /></li >
                            <?php }?>
                        </ul>
                    </div>
                <?php }?>
                </div>
                <div id="tour-details" class="col-md-5 VungChuaTravel-box">
                    <div class="small-box table-wrapper full-width">
                        <dl class="term-description">
                            <dt><?php echo $this->lang->line('tourCode')?>:</dt> <dd><?php echo $row->TOURS_ID ?></dd>
                            <dt><?php echo $this->lang->line('tourday')?>:</dt><dd><?php echo $row->TOURS_LENGTH?> - <?php echo $this->lang->line('day')?></dd>
                            <dt><?php echo $this->lang->line('departs')?>:</dt><dd><?php echo $row->START_DEPARTURE_TIME?></dd>
                            <dt><?php echo $this->lang->line('departs')?>:</dt><dd><?php echo $row->LOCATION?> - <?php echo $row->NATIONAL?></dd>
                            <dt><?php echo $this->lang->line('transportation')?>:</dt><dd><?php echo $row->TRANSPORT?></dd>
                            <dt><?php echo $this->lang->line('price')?>:</dt><dd <?php if($row->DISCOUNT != 0){echo 'style="text-decoration: line-through; color: red"';}?>><?php echo $row->TOUR_PRICE?> <?php echo $this->lang->line('currency')?></dd>
                            <dt><?php echo $this->lang->line('promotion')?>:</dt><dd><?php if($row->DISCOUNT == 0){echo $row->DISCOUNT;}else{echo $row->DISCOUNT_PRICE;}?> <?php echo $this->lang->line('currency')?></dd>
                            <div align="center">
                            <a href="<?php echo base_url()?>tours/tours_booking/<?php echo $tourID?>" class="button green btn-small uppercase"><?php echo $this->lang->line('booknow')?></a>
                            </div>
                            <dt></dt><dd></dd>
                            <div align="center">
                                <div class="fb-like" data-href="<?php echo base_url('tours/tours_detail/'.$row->TEXT_LINK)?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                                <div class="g-plusone" data-size="medium" data-annotation="none"></div>
                                <a href="#" class="button blue btn-sm uppercase"><i class="fa fa-youtube"></i></a>
                                <a href="skype:dieuhanh.vungchuatravel?call" class="button blue btn-sm uppercase"><i class="fa fa-skype"></i></a>
                            </div>
                        </dl>
                    </div>
                </div>
                <div class="col-md-12 tab-container">
                    <ul class="tabs">
                        <li class="active"><a href="#tours-schedule-tab" data-toggle="tab"><?php echo $this->lang->line('tourschedule')?></a></li>
                        <li><a href="#tours-price-tab" data-toggle="tab"><?php echo $this->lang->line('tourprice') ?></a></li>
                        <li><a href="#tours-note-tab" data-toggle="tab"><?php echo $this->lang->line('tournote') ?></a></li>
                        <li><a href="#download-tab" data-toggle="tab">Download</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tours-schedule-tab">
                            <h2><?php echo $row->TOURS_TIT?></h2>
                            <p><?php echo $row->TOUR_CNT?></p>
                            <?php foreach($tour_schedule as $row1){
                                echo '<h2>'. $row1->DEPARTURE_TIME.' - '.$row1->ARRIVAL_TIME.'</h2>
                                        <p>'.$row1->CONTENT.'</p>';
                            }
                            ?>
                        </div>

                        <div class="tab-pane fade" id="tours-price-tab">
                            <p><?php echo $row->PRICE_CNT?></p>
                        </div>

                        <div class="tab-pane fade" id="tours-note-tab">
                            <p><?php echo $row->REMARK?></p>
                        </div>
                        <div class="tab-pane fade" id="download-tab">
                            <p>Comming Soon.</p>
                        </div>
                    </div>
                </div>
                <div class="fb-comments" data-href="<?php echo base_url()?>tours/tours_detail/<?php echo $row->TEXT_LINK?>" data-width="800px" data-numposts="5" data-colorscheme="light"></div>
            </div>
            <?php } }?>
            <div class="col-md-3 sidebar">
                <div class="col-sm-12 support-box" align="center">
                    <h2><?php echo $this->lang->line('oSupport'); ?></h2>
                    <ul class="discover">
                        <li class="col-xs-6"><i class="fa fa-phone" style="font-size: x-large; color: #12a0c3"></i></li>
                        <li class="col-xs-6"><i class="fa fa-phone" style="font-size: x-large; color: #12a0c3"></i></li>
                        <li class="col-xs-6"><b style="color: #12a0c3">0523.82.88.82</b></li>
                        <li class="col-xs-6"><b style="color: #12a0c3">0949.07.86.86</b></li>
                        <li class="col-xs-6"><a title="vungchuatravel" href="skype:dieuhanh.vungchuatravel?call"><i class="fa fa-skype" style="font-size: x-large; color: #12a0c3"></i></a></li>
                        <li class="col-xs-6"><a title="dieuhanh.vungchuatravel" href="skype:dieuhanh.vungchuatravel?call"><i class="fa fa-skype" style="font-size: x-large; color: #12a0c3"></i></a></li>
                        <li class="col-xs-6"><a title="vungchuatravel" href="ymsgr:SendIM?vungchuatravel"><img src="http://opi.yahoo.com/online?u=vungchuatravel&amp;m=g&amp;t=1"/></a></li>
                        <li class="col-xs-6"><a title="dieuhanh.vungchuatravel" href="ymsgr:SendIM?dieuhanh.vungchuatravel"><img src="http://opi.yahoo.com/online?u=dieuhanh.vungchuatravel&amp;m=g&amp;t=1" /></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 sidebar" align="center">
                <div class="VungChuaTravel-box">
                    <h2><?php echo $this->lang->line('mostSold'); ?></h2>
                    <div class="image-box style14">
                        <?php foreach($mostSoldTour as $row){?>
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