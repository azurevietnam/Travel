<?php
/**
 * Created by PhpStorm.
 * User: HAILONG_ICT
 * Date: 12/30/2015
 * Time: 1:03 PM
 */

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
            <li><a href="<?php echo base_url()?>home/news_list/all"><?php echo $this->lang->line('news'); ?></a></li>
        </ul>
    </div>
</div>

<section id="content">
    <div class="container tour-detail-page">
        <div class="row">
            <?php if(isset($newsData)){
            foreach($newsData as $row){?>
            <div id="main" class="col-md-9">
                <div id="tour-details" class="VungChuaTravel-box">
                    <div class="tab-container">
                        <h1><?php echo $row->NEWS_TITLE?></h1>
                        <p style="font-weight: 600;"><?php echo $row->NEWS_SHRT_CNT?></p>
                        <p><?php echo $row->NEW_CNT?></p>
                    </div>
                </div>
                <div class="fb-comments" data-href="<?php echo base_url()?>home/news/<?php echo $row->NEWS_ID?>" data-width="800px" data-numposts="5" data-colorscheme="light"></div>
            </div>
            <?php } }?>
            <div class="sidebar col-md-3">
                <div class="VungChuaTravel-box">
                    <h4 class="box-title"><?php echo $this->lang->line('news'); ?></h4>
                    <div class="image-box style14">
                        <?php if(isset($newsRelation)){
                            foreach($newsRelation as $row){?>
                                <article class="box">
                                    <figure>
                                        <a href="<?php echo base_url('home/news/'.$row->NEWS_ID)?>" title=""><img width="63" height="59" src="<?php echo base_url($row->NEWS_RPV_IMG)?>" alt=""></a>
                                    </figure>
                                    <div class="details">
                                        <h5 class="box-title"><a href="<?php echo base_url('home/news/'.$row->NEWS_ID)?>"><?php echo $row->NEWS_TITLE?></a></h5>
                                    </div>
                                </article>
                                <?php ;}
                        }?>
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