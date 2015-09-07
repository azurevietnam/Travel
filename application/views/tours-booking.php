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
            <div id="main" class="col-sms-6 col-sm-8 col-md-9">
                <div class="booking-section travelo-box">

                    <form name="booking" class="booking-form" onsubmit="return validateForm()" method="post" action="<?php echo base_url()?>tours/tours_order/<?php echo $tourID?>">
                        <div class="person-information">
                            <h2><?php echo $this->lang->line('personalinfo');?></h2>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">
                                    <label><?php echo $this->lang->line('name');?></label>
                                    <input type="text" name="name" class="input-text full-width" value="" placeholder=""  autofocus/>
                                </div>
                                <div class="col-sm-6 col-md-5">
                                    <label><?php echo $this->lang->line('phonenum');?></label>
                                    <input type="text" name="phone_number" class="input-text full-width" value="" placeholder="" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">
                                    <label><?php echo $this->lang->line('emailadd');?></label>
                                    <input type="email" name="email_address" class="input-text full-width" value="" placeholder="" required/>
                                </div>
                                <div class="col-sm-6 col-md-5">
                                    <label><?php echo $this->lang->line('address');?></label>
                                    <input type="text" name="address" class="input-text full-width" value="" placeholder="" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">
                                    <label><?php echo $this->lang->line('departuredate');?></label>
                                    <div class="datepicker-wrap">
                                        <input type="text" name="departure_date" class="input-text full-width" placeholder="mm/dd/yy" value="" required/>
                                    </div>
<!--                                    <input type="date" name="departure_date" class="input-text full-width" value="" placeholder="" required/>-->
                                </div>
                                <div class="col-sm-6 col-md-5">
                                    <label><?php echo $this->lang->line('adult');?></label>
                                    <input type="number" name="adultnumber" class="input-text full-width" value="" placeholder="" max="100"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">
                                    <label><?php echo $this->lang->line('kids');?></label>
                                    <input type="number" name="kidnumber" class="input-text full-width" value="" placeholder="" max="100"/>
                                </div>
                                <div class="col-sm-6 col-md-5">
                                    <label><?php echo $this->lang->line('infant');?></label>
                                    <input type="number" name="infantnumber" class="input-text full-width" value="" placeholder="" max="100"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <label><?php echo $this->lang->line('request');?></label>
<!--                                    <input type="text" name="address" class="input-text input-request" value="" placeholder="" required/>-->
                                    <textarea name="request" class="input-text input-request" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="is_receive_promotion" value="1"> <?php echo $this->lang->line('iwantreceive');?> <span class="skin-color"><?php echo $this->lang->line('vungchua');?></span> <?php echo $this->lang->line('iwantreceive1');?>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="form-group row">
                            <div class="col-sm-6 col-md-5">
                                <button type="submit" class="full-width btn-large" ><?php echo $this->lang->line('confirmbooking');?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="sidebar col-sms-6 col-sm-4 col-md-3">
                <div class="booking-details travelo-box">
                    <h4><?php echo $this->lang->line('bookingdetail');?></h4>
                    <?php foreach($tour_detail as $row){?>
                    <article class="tour-detail">
                        <figure class="clearfix">
                            <a title="" href="<?php echo base_url()?>tours/tours_detail/<?php echo $row->TOURS_ID?>" class="middle-block"><img class="middle-item" alt="" src="<?php echo base_url()?><?php echo $row->TOURS_RPV_IMG_URL?>"></a>
                            <div class="travel-title">
                                <h5 class="box-title"><?php echo $row->TOURS_TIT?><small><?php echo $row->TOURS_LENGTH?> <?php echo $this->lang->line('day'); ?></small></h5>
                                <a href="<?php echo base_url()?>tours/tours_detail/<?php echo $row->TOURS_ID?>" class="button green"><?php echo $this->lang->line('edit');?></a>
                            </div>
                        </figure>
                        <div class="details">
                            <div class="icon-box style11 full-width">
                                <div class="icon-wrapper">
                                    <i class="soap-icon-calendar"></i>
                                </div>
                                <dl class="details">
                                    <dt class="skin-color"><?php echo $this->lang->line('date');?></dt>
                                    <dd></dd>
                                </dl>
                            </div>
                            <div class="icon-box style11 full-width">
                                <div class="icon-wrapper">
                                    <i class="soap-icon-clock"></i>
                                </div>
                                <dl class="details">
                                    <dt class="skin-color"><?php echo $this->lang->line('duration');?></dt>
                                    <dd><?php echo $row->TOURS_LENGTH?> - <?php echo $this->lang->line('day'); ?></dd>
                                </dl>
                            </div>
                            <div class="icon-box style11 full-width">
                                <div class="icon-wrapper">
                                    <i class="soap-icon-departure"></i>
                                </div>
                                <dl class="details">
                                    <dt class="skin-color"><?php echo $this->lang->line('location'); ?></dt>
                                    <dd><?php echo $row->LOCATION?> - <?php echo $row->NATIONAL?></dd>
                                </dl>
                            </div>
                        </div>
                    </article>
                    <?php ;}?>

                    <h4>Other Details</h4>
                    <dl class="other-details">
<!--                        <dt class="feature">Tour:</dt><dd class="value">3 days</dd>-->
<!--                        <dt class="feature">Extra benefits:</dt><dd class="value">No</dd>-->
<!--                        <dt class="feature">taxes and fees:</dt><dd class="value">Free</dd>-->
                        <dt class="total-price"><?php echo $this->lang->line('totalprice'); ?></dt>
                            <dd class="total-price-value"><?php echo $row->PRICE?> <?php echo $this->lang->line('currency')?></dd>
                    </dl>
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