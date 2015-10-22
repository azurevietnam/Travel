<?php
/**
 * Created by PhpStorm.
 * User: HaiLong
 * Date: 4/12/2015
 * Time: 3:19 PM
 */

?>
    <!-- Popuplar Destinations -->
    <div class="destinations section">
        <div class="container">

            <h2><?php foreach($TourCate1 as $row) {echo $row->CATEGORY_NAME;} ?></h2>
            <div class="row add-clearfix image-box style1 tour-locations">
                <?php foreach ($Tour1 as $store){?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <article class="box">
                            <figure class="animated" data-animation-type="fadeInDown" data-animation-duration="1">
                                <a href="<?php echo base_url('popup/index/'.$store->IMG_GRP_ID)?>" title="" class="hover-effect popup-gallery">
                                    <img src="<?php if(strlen($store->TOURS_RPV_IMG_URL)> 0){ echo base_url($store->TOURS_RPV_IMG_URL);}else{echo base_url('resources/images/no-image.jpg');}?>" alt=""/>
                                </a>
                            </figure>
                            <div class="details">
                                    <h4 class="box-title"><a href="<?php echo base_url('tours/tours_detail/'.$store->TOURS_ID)?>"><div class="title-height"><?php echo $store->TOURS_TIT?></div><small><?php echo $store->LOCATION?> - <?php echo $store->NATIONAL?></small></a></h4>
                                <div class="content-height">
                                    <?php echo $store->SHORT_CNT.'...'?>
                                </div>
                                <div class="price">
                                <span><?php echo $store->TOURS_PRICE?> <?php echo $this->lang->line('currency')?></span>
                                </div>
                                <div class="align">
                                    <div class="time">
                                        <i class="soap-icon-clock yellow-color"></i>
                                        <span><?php echo $store->TOURS_LENGTH?> <?php echo $this->lang->line('day')?></span>
                                    </div>
                                </div>
                                <a href="<?php echo base_url('tours/tours_detail/'.$store->TOURS_ID)?>" class="button btn-small full-width"><?php echo $this->lang->line('booknow')?></a>
                            </div>
                        </article>
                    </div>
                <?php }?>
            </div>
            <a href="<?php echo base_url()?>tours/tours_list/<?php foreach($TourCate1 as $row) {echo $row->CATEGORY_ID;} ?>" class="button btn-large full-width uppercase"><?php echo $this->lang->line('loadmore'); ?> <?php foreach($TourCate1 as $row) {echo $row->CATEGORY_NAME;}?></a><br/>

            <br /><h2><?php foreach($TourCate2 as $row) {echo $row->CATEGORY_NAME;} ?></h2>
            <div class="row add-clearfix image-box style1 tour-locations">
                <?php foreach ($Tour2 as $store){?>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <article class="box">
                                <figure class="animated" data-animation-type="fadeInDown" data-animation-duration="1">
                                    <a href="<?php echo base_url('popup/index/'.$store->IMG_GRP_ID)?>" title="" class="hover-effect popup-gallery">
                                        <img src="<?php if(strlen($store->TOURS_RPV_IMG_URL)> 0){ echo base_url($store->TOURS_RPV_IMG_URL);}else{echo base_url('resources/images/no-image.jpg');}?>" alt=""/>
                                    </a>
                                </figure>
                                <div class="details">
                                    <h4 class="box-title"><a href="<?php echo base_url('tours/tours_detail/'.$store->TOURS_ID)?>"><div class="title-height"><?php echo $store->TOURS_TIT?></div><small><?php echo $store->LOCATION ?> - <?php echo $store->NATIONAL ?></small></a></span></h4>
                                    <div class="content-height">
                                        <?php echo $store->SHORT_CNT.'...' ?>
                                    </div>
                                    <div class="price">
                                        <span><?php echo $store->TOURS_PRICE ?> <?php echo $this->lang->line('currency')?></span>
                                    </div>
                                    <div class="align">
                                        <div class="time">
                                            <i class="soap-icon-clock yellow-color"></i>
                                            <span><?php echo $store->TOURS_LENGTH ?> <?php echo $this->lang->line('day')?></span>
                                        </div>
                                    </div>
                                    <a href="<?php echo base_url('tours/tours_detail/'.$store->TOURS_ID)?>" class="button btn-small full-width"><?php echo $this->lang->line('booknow')?></a>
                                </div>
                            </article>
                        </div>
                <?php }?>
            </div>
            <a href="<?php echo base_url()?>tours/tours_list/<?php foreach($TourCate2 as $row) {echo $row->CATEGORY_ID;} ?>" class="button btn-large full-width uppercase"><?php echo $this->lang->line('loadmore'); ?> <?php foreach($TourCate2 as $row) {echo $row->CATEGORY_NAME;} ?></a><br/>

            <br/>
            <div class="container">
            <div class="description text-center">
                <h2><?php foreach($TourCate3 as $row) {echo $row->CATEGORY_NAME;} ?></h2>
            </div>
            <div class="image-carousel style3 flex-slider" data-item-width="170" data-item-margin="30">
                <ul class="slides image-box style9">
                    <?php foreach ($Tour3 as $store){?>
                    <li>
                        <article class="box">
                            <figure>
                                <a href="<?php echo base_url('tours/tours_detail/'.$store->TOURS_ID)?>" title="" class="hover-effect yellow"><img src="<?php if(strlen($store->TOURS_RPV_IMG_URL)> 0){ echo base_url($store->TOURS_RPV_IMG_URL);}else{echo base_url('resources/images/no-image.jpg');}?>" alt="" width="170"/></a>
                            </figure>
                            <div class="details">
                                <h4 class="box-title"><?php echo $store->TOURS_TIT?></h4>
                                <a href="<?php echo base_url('tours/tours_detail/'.$store->TOURS_ID)?>" title="" class="button"><?php echo $store->TOURS_PRICE ?> <?php echo $this->lang->line('currency')?></a>
                            </div>
                        </article>
                    </li>
                    <?php }?>
                </ul>
            </div>
        </div>
            <a href="<?php echo base_url()?>tours/tours_list/<?php foreach($TourCate3 as $row) {echo $row->CATEGORY_ID;} ?>" class="button btn-large full-width uppercase"><?php echo $this->lang->line('loadmore'); ?> <?php foreach($TourCate3 as $row) {echo $row->CATEGORY_NAME;} ?></a><br/>

        </div>
    </div>

    <!-- Honeymoon -->
    <div class="honeymoon section global-map-area promo-box parallax" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="col-sm-6 content-section description pull-right">
                <h1 class="title"><?php echo $this->lang->line('honeymoontv'); ?></h1>
                <p><?php echo $this->lang->line('honeymoontvcnt'); ?></p>
                <div class="row places image-box style9">
                    <div class="col-xs-4">
                        <article class="box">
                            <figure>
                                <a href="hotel-list-view.html" title="" class="hover-effect yellow middle-block animated" data-animation-type="fadeInUp" data-animation-duration="1">
                                    <img src="<?php echo base_url()?>resources/images/places01.jpg" alt="" /></a>
                            </figure>
                            <div class="details">
                                <h4 class="box-title">Paris<small>(990 PLACES)</small></h4>
                                <a href="hotel-list-view.html" title="" class="button"><?php echo $this->lang->line('seeall'); ?></a>
                            </div>
                        </article>
                    </div>
                    <div class="col-xs-4">
                        <article class="box">
                            <figure>
                                <a href="hotel-list-view.html" title="" class="hover-effect yellow middle-block animated" data-animation-type="fadeInUp" data-animation-duration="1" data-animation-delay="0.4">
                                    <img src="<?php echo base_url()?>resources/images/places02.jpg" alt="" /></a>
                            </figure>
                            <div class="details">
                                <h4 class="box-title">Greece<small>(990 PLACES)</small></h4>
                                <a href="hotel-list-view.html" title="" class="button"><?php echo $this->lang->line('seeall'); ?></a>
                            </div>
                        </article>
                    </div>
                    <div class="col-xs-4">
                        <article class="box">
                            <figure>
                                <a href="hotel-list-view.html" title="" class="hover-effect yellow middle-block animated" data-animation-type="fadeInUp" data-animation-duration="1" data-animation-delay="0.8">
                                    <img src="<?php echo base_url()?>resources/images/places03.jpg" alt="" /></a>
                            </figure>
                            <div class="details">
                                <h4 class="box-title">Australia<small>(990 PLACES)</small></h4>
                                <a href="hotel-list-view.html" title="" class="button"><?php echo $this->lang->line('seeall'); ?></a>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 image-container no-margin">
                <img src="<?php echo base_url()?>resources/images/couple.png" alt="" class="animated" data-animation-type="fadeInUp" data-animation-duration="2">
            </div>
        </div>
    </div>

    <!-- Did you Know? section -->
    <div class="offers section">
        <div class="container">
            <h1 class="text-center"><?php echo $this->lang->line('didyouknow'); ?></h1>
            <p class="col-xs-9 center-block no-float text-center"><?php echo $this->lang->line('didyouknowcnt'); ?></p>
            <div class="row image-box style2">
                <div class="col-md-6">
                    <article class="box">
                        <figure class="animated" data-animation-type="fadeInLeft" data-animation-duration="1">
                            <a href="#" title=""><img src="<?php echo base_url()?>resources/images/offers01.png" alt="" width="270" height="192" /></a>
                        </figure>
                        <div class="details">
                            <h4><?php echo $this->lang->line('hirecar'); ?></h4>
                            <p><?php echo $this->lang->line('hirecarcnt'); ?></p>
                            <a href="#" title="" class="button"><?php echo $this->lang->line('seeall'); ?></a>
                        </div>
                    </article>
                </div>
                <div class="col-md-6">
                    <article class="box">
                        <figure class="animated" data-animation-type="fadeInLeft" data-animation-duration="1" data-animation-delay="0.4">
                            <a href="#" title=""><img src="<?php echo base_url()?>resources/images/offers02.png" alt="" width="270" height="192" /></a>
                        </figure>
                        <div class="details">
                            <h4><?php echo $this->lang->line('travel'); ?></h4>
                            <p><?php echo $this->lang->line('travelcnt'); ?></p>
                            <a href="#" title="" class="button"><?php echo $this->lang->line('seeall'); ?></a>
                        </div>
                    </article>
                </div>
                <div class="col-md-6">
                    <article class="box">
                        <figure class="animated" data-animation-type="fadeInLeft" data-animation-duration="1">
                            <a href="#" title=""><img src="<?php echo base_url()?>resources/images/offers03.png" alt="" width="270" height="192" /></a>
                        </figure>
                        <div class="details">
                            <h4><?php echo $this->lang->line('thingtodo'); ?></h4>
                            <p><?php echo $this->lang->line('thingtodocnt'); ?></p>
                            <a href="#" title="" class="button"><?php echo $this->lang->line('seeall'); ?></a>
                        </div>
                    </article>
                </div>
                <div class="col-md-6">
                    <article class="box">
                        <figure class="animated" data-animation-type="fadeInLeft" data-animation-duration="1" data-animation-delay="0.4">
                            <a href="#" title=""><img src="<?php echo base_url()?>resources/images/offers04.png" alt="" width="270" height="192" /></a>
                        </figure>
                        <div class="details">
                            <h4><?php echo $this->lang->line('shuttle'); ?></h4>
                            <p><?php echo $this->lang->line('shuttlecnt'); ?></p>
                            <a href="#" title="" class="button"><?php echo $this->lang->line('seeall'); ?></a>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
    <!-- Features section -->
    <div class="features section global-map-area parallax" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row image-box style7">
                <div class="col-sms-6 col-sm-6 col-md-3">
                    <article class="box">
                        <figure class="middle-block">
                            <img src="<?php echo base_url()?>resources/images/shortcodes/image-box/style07/1.jpg" alt="" class="middle-item" />
                            <span class="opacity-wrapper"></span>
                        </figure>
                        <div class="details">
                            <h4><a href="#"><?php echo $this->lang->line('bestprcguarantee'); ?></a></h4>
                            <p>
                                <?php echo $this->lang->line('bestprcguaranteecnt'); ?>
                            </p>
                        </div>
                    </article>
                </div>
                <div class="col-sms-6 col-sm-6 col-md-3">
                    <article class="box">
                        <figure class="middle-block">
                            <img src="<?php echo base_url()?>resources/images/shortcodes/image-box/style07/2.jpg" alt="" class="middle-item" />
                            <span class="opacity-wrapper"></span>
                        </figure>
                        <div class="details">
                            <h4><a href="#"><?php echo $this->lang->line('travelinsu'); ?></a></h4>
                            <p>
                                <?php echo $this->lang->line('travelinsucnt'); ?>
                            </p>
                        </div>
                    </article>
                </div>
                <div class="col-sms-6 col-sm-6 col-md-3">
                    <article class="box">
                        <figure class="middle-block">
                            <img src="<?php echo base_url()?>resources/images/shortcodes/image-box/style07/3.jpg" alt="" class="middle-item" />
                            <span class="opacity-wrapper"></span>
                        </figure>
                        <div class="details">
                            <h4><a href="#"><?php echo $this->lang->line('whychose'); ?></a></h4>
                            <p>
                                <?php echo $this->lang->line('whychosecnt'); ?>
                            </p>
                        </div>
                    </article>
                </div>
                <div class="col-sms-6 col-sm-6 col-md-3">
                    <article class="box">
                        <figure class="middle-block">
                            <img src="<?php echo base_url()?>resources/images/shortcodes/image-box/style07/4.jpg" alt="" class="middle-item" />
                            <span class="opacity-wrapper"></span>
                        </figure>
                        <div class="details">
                            <h4><a href="#"><?php echo $this->lang->line('needhelp'); ?></a></h4>
                            <p>
                                <?php echo $this->lang->line('needhelpcnt'); ?>
                            </p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>