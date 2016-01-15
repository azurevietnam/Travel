<?php
/**
 * Created by PhpStorm.
 * User: HaiLong
 * Date: 4/12/2015
 * Time: 3:19 PM
 */

?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<section id="content">
    <!--     Popuplar Destinations-->
    <div class="section container">
        <?php if(isset($mainCate)){?>
        <div class="row image-box style20">
            <?php foreach($mainCate as $row){?>
            <div class="col-sm-4">
                <article class="box" style="background-color:  <?php echo $row->COLOR_CD ?>">
                    <figure class="animated" data-animation-type="fadeInDown" data-animation-delay="0">
                        <figcaption>
                            <h3 class="caption-title"><?php echo $row->CATE_NAME ?></h3>
                            <hr/>
                            <span><?php echo $row->CATE_DESC ?></span>
                        </figcaption>
                        <a href="<?php if($row->CATEGORY_ID == 'T00001'){echo base_url('home/tourGroup/Q');}else { echo base_url('tours/tours_list/'.$row->CATEGORY_ID);}?>"><img src="<?php echo base_url('resources/images/icon/arrow.png')?>" ></a>
                    </figure>
                </article>
            </div>
            <?php }?>
        </div>
        <?php }?>
    </div>
    <!-- Features section -->
    <div class="features section global-map-area parallax" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-sms-6 col-sm-6 col-md-4">
                    <div class="tabs-right">
                        <ul class="navy nav-tabs">
                            <li class="active"><a href="#a1" data-toggle="tab"><?php echo $this->lang->line('hotels');?></a></li>
                            <li class="s-tab"><a href="#b1" data-toggle="tab"><?php echo $this->lang->line('restaurant');?></a></li>
                            <li class="t-tab"><a href="#c1" data-toggle="tab"><?php echo $this->lang->line('carForRent');?></a></li>
                            <li class="f-tab"><a href="#d1" data-toggle="tab">Tour</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="a1">
                                <form id="hotelReqForm" method="post" action="<?php echo base_url('home/insertHotelRequest')?>" enctype="multipart/form-data">
                                <h4><?php echo $this->lang->line('hotels');?></h4>
                                <hr/>
                                <ul class="list-group-hor pull-left">
                                    <li class="row">
                                        <div class="col-sms-8 col-sm-8 col-md-6">
                                            <input type="text" class="input-text" placeholder="<?php echo $this->lang->line('name');?>" name="c_name" id="c_name" required/>
                                        </div>
                                        <div class="col-sms-8 col-sm-8 col-md-6">
                                            <input type="text" class="input-text" placeholder="<?php echo $this->lang->line('phonenum');?>" name="c_phone" id="c_phone" required/>
                                        </div>
                                    </li>
                                    <li class="row">
                                        <div class="col-sms-8 col-sm-8 col-md-6">
                                            <input type="email" class="input-text" placeholder="<?php echo $this->lang->line('email');?>" name="c_email" id="c_email" required/>
                                        </div>
                                        <div class="col-sms-8 col-sm-8 col-md-6">
                                            <input type="text" class="input-text" placeholder="<?php echo $this->lang->line('address');?>" name="c_address" id="c_address" required/>
                                        </div>
                                    </li>
                                    <li class="row">
                                        <div class="col-sms-8 col-sm-8 col-md-6">
                                            <div class="selector">
                                                <select class="full-width" name="h_type" id="h_type">
                                                    <option value="<?php echo $this->lang->line('motel');?>" selected><?php echo $this->lang->line('motel');?></option>
                                                    <option value="<?php echo $this->lang->line('1star');?>"><?php echo $this->lang->line('1star');?></option>
                                                    <option value="<?php echo $this->lang->line('2star');?>"><?php echo $this->lang->line('2star');?></option>
                                                    <option value="<?php echo $this->lang->line('3star');?>"><?php echo $this->lang->line('3star');?></option>
                                                    <option value="<?php echo $this->lang->line('4star');?>"><?php echo $this->lang->line('4star');?></option>
                                                    <option value="<?php echo $this->lang->line('5star');?>"><?php echo $this->lang->line('5star');?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sms-8 col-sm-8 col-md-6">
                                            <input type="number" class="input-text" placeholder="<?php echo $this->lang->line('room');?>" name="h_room" id="h_room"/>
                                        </div>
                                    </li>
                                    <li class="row">
                                        <div class="col-sms-8 col-sm-8 col-md-6">
                                            <div class="datepicker-wrap">
                                                <input type="text" class="input-text1 full-width" placeholder="<?php echo $this->lang->line('fromdate');?>" name="f_date" id="f_date" required/>
                                            </div>
                                        </div>
                                        <div class="col-sms-8 col-sm-8 col-md-6">
                                            <div class="datepicker-wrap">
                                                <input type="text" class="input-text1 full-width" placeholder="<?php echo $this->lang->line('todate');?>" name="t_date" id="t_date" required/>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="row">
                                        <div class="col-sms-8 col-sm-8 col-md-6">
                                            <input type="number" class="input-text" placeholder="<?php echo $this->lang->line('adult');?>" name="a_adult" id="a_adult"/>
                                        </div>
                                        <div class="col-sms-8 col-sm-8 col-md-6">
                                            <input type="number" class="input-text" placeholder="<?php echo $this->lang->line('kids');?>" name="a_kid" id="a_kid"/>
                                        </div>
                                    </li>
                                    <li class="row">
                                        <textarea class="input-text input-request" rows="1" id="c_request" name="c_request"><?php echo $this->lang->line('request');?></textarea>
                                    </li>
                                    <li class="row">
                                        <div class="box-element" align="center">
                                            <button type="submit" class="full-width btn-medium" ><?php echo $this->lang->line('submit');?></button>
                                        </div>
                                    </li>
                                </ul>
                                </form>
                            </div>
                            <div class="tab-pane" id="b1">
                                <form id="restReqForm" method="post" action="<?php echo base_url('home/insertRestaurantRequest')?>" enctype="multipart/form-data">
                                    <h4><?php echo $this->lang->line('restaurant');?></h4>
                                    <hr/>
                                    <ul class="list-group-hor pull-left">
                                        <li class="row">
                                            <div class="col-sms-8 col-sm-8 col-md-6">
                                                <input type="text" class="input-text" placeholder="<?php echo $this->lang->line('name');?>" name="c_name" id="c_name" required/>
                                            </div>
                                            <div class="col-sms-8 col-sm-8 col-md-6">
                                                <input type="text" class="input-text" placeholder="<?php echo $this->lang->line('phonenum');?>" name="c_phone" id="c_phone" required/>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <div class="col-sms-8 col-sm-8 col-md-6">
                                                <input type="email" class="input-text" placeholder="<?php echo $this->lang->line('email');?>" name="c_email" id="c_email" required/>
                                            </div>
                                            <div class="col-sms-8 col-sm-8 col-md-6">
                                                <input type="text" class="input-text" placeholder="<?php echo $this->lang->line('address');?>" name="c_address" id="c_address" required/>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <div class="col-sms-8 col-sm-8 col-md-6">
                                                <input type="number" name="c_meal" id="c_meal" class="input-text" placeholder="<?php echo $this->lang->line('meal');?>" required/>
                                            </div>
                                            <div class="col-sms-8 col-sm-8 col-md-6">

                                            </div>
                                        </li>
                                        <li class="row">
                                            <div class="col-sms-8 col-sm-8 col-md-6">
                                                <div class="datepicker-wrap">
                                                    <input type="text" class="input-text1 full-width" placeholder="<?php echo $this->lang->line('fromdate');?>" name="f_date1" id="f_date1" required/>
                                                </div>
                                            </div>
                                            <div class="col-sms-8 col-sm-8 col-md-6">
                                                <div class="datepicker-wrap">
                                                    <input type="text" class="input-text1 full-width" placeholder="<?php echo $this->lang->line('todate');?>" name="t_date1" id="t_date1" required/>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <div class="col-sms-8 col-sm-8 col-md-6">
                                                <input type="number" class="input-text" placeholder="<?php echo $this->lang->line('adult');?>" name="a_adult" id="a_adult"/>
                                            </div>
                                            <div class="col-sms-8 col-sm-8 col-md-6">
                                                <input type="number" class="input-text" placeholder="<?php echo $this->lang->line('kids');?>" name="a_kid" id="a_kid"/>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <textarea class="input-text input-request" rows="1" id="c_request" name="c_request"><?php echo $this->lang->line('request');?></textarea>
                                        </li>
                                        <li class="row">
                                            <button type="submit" class="full-width btn-medium" ><?php echo $this->lang->line('submit');?></button>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                            <div class="tab-pane" id="c1">
                                <form id="carReqForm" method="post" action="<?php echo base_url('home/insertCarRequest')?>" enctype="multipart/form-data">
                                    <h4><?php echo $this->lang->line('carForRent');?></h4>
                                    <hr/>
                                    <ul class="list-group-hor pull-left">
                                        <li class="row">
                                            <div class="col-sms-8 col-sm-8 col-md-6">
                                                <input type="text" class="input-text" placeholder="<?php echo $this->lang->line('name');?>" name="c_name" id="c_name" required/>
                                            </div>
                                            <div class="col-sms-8 col-sm-8 col-md-6">
                                                <input type="text" class="input-text" placeholder="<?php echo $this->lang->line('phonenum');?>" name="c_phone" id="c_phone" required/>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <div class="col-sms-8 col-sm-8 col-md-6">
                                                <input type="email" class="input-text" placeholder="<?php echo $this->lang->line('email');?>" name="c_email" id="c_email" required/>
                                            </div>
                                            <div class="col-sms-8 col-sm-8 col-md-6">
                                                <input type="text" class="input-text" placeholder="<?php echo $this->lang->line('address');?>" name="c_address" id="c_address" required/>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <div class="col-sms-8 col-sm-8 col-md-6">
                                                <div class="selector">
                                                    <select class="full-width" name="c_type" id="c_type">
                                                        <option value="04 <?php echo $this->lang->line('seats');?>">04 <?php echo $this->lang->line('seats');?></option>
                                                        <option value="7 <?php echo $this->lang->line('seats');?>">07 <?php echo $this->lang->line('seats');?></option>
                                                        <option value="12 <?php echo $this->lang->line('seats');?>">12 <?php echo $this->lang->line('seats');?></option>
                                                        <option value="19 <?php echo $this->lang->line('seats');?>">19 <?php echo $this->lang->line('seats');?></option>
                                                        <option value="24 <?php echo $this->lang->line('seats');?>">24 <?php echo $this->lang->line('seats');?></option>
                                                        <option value="45 <?php echo $this->lang->line('seats');?>">45 <?php echo $this->lang->line('seats');?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sms-8 col-sm-8 col-md-6">
                                                    <input type="number" class="input-text" placeholder="<?php echo $this->lang->line('quantity');?>" name="c_quantity" id="c_quantity" required/>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <div class="col-sms-8 col-sm-8 col-md-6">
                                                <div class="datepicker-wrap">
                                                    <input type="text" class="input-text1 full-width" placeholder="<?php echo $this->lang->line('fromdate');?>" name="f_date2" id="f_date2" required/>
                                                </div>
                                            </div>
                                            <div class="col-sms-8 col-sm-8 col-md-6">
                                                <div class="datepicker-wrap">
                                                    <input type="text" class="input-text1 full-width" placeholder="<?php echo $this->lang->line('todate');?>" name="t_date2" id="t_date2" required/>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="row">

                                            <div class="col-sms-8 col-sm-8 col-md-3">
<!--                                                <div class="selector">-->
<!--                                                    <select class="full-width">-->
<!--                                                        <option value="1">01</option>-->
<!--                                                        <option value="2">02</option>-->
<!--                                                        <option value="3">03</option>-->
<!--                                                        <option value="4">04</option>-->
<!--                                                    </select>-->
<!--                                                </div>-->
                                            </div>
                                            <div class="col-sms-8 col-sm-8 col-md-3">
                                                <label class="text-label"> </label>
                                            </div>

                                            <div class="col-sms-8 col-sm-8 col-md-3">
<!--                                                <div class="selector">-->
<!--                                                    <select class="full-width">-->
<!--                                                        <option value="1">01</option>-->
<!--                                                        <option value="2">02</option>-->
<!--                                                        <option value="3">03</option>-->
<!--                                                        <option value="4">04</option>-->
<!--                                                    </select>-->
<!--                                                </div>-->
                                            </div>
                                            <div class="col-sms-8 col-sm-8 col-md-3">
                                                <label class="text-label"> </label>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <textarea class="input-text input-request" rows="1" id="c_request" name="c_request"><?php echo $this->lang->line('request');?></textarea>
                                        </li>
                                        <li class="row">
                                            <div class="box-element" align="center">
                                                <button type="submit" class="full-width btn-medium" ><?php echo $this->lang->line('submit');?></button>
                                            </div>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                            <div class="tab-pane" id="d1">
                                <form id="tourReqForm" method="post" action="<?php echo base_url('home/insertTourRequest')?>" enctype="multipart/form-data">
                                    <h4>Tour</h4>
                                    <hr/>
                                    <ul class="list-group-hor pull-left">
                                        <li class="row">
                                            <div class="col-sms-8 col-sm-8 col-md-6">
                                                <input type="text" class="input-text" placeholder="<?php echo $this->lang->line('name');?>" name="c_name" id="c_name" required/>
                                            </div>
                                            <div class="col-sms-8 col-sm-8 col-md-6">
                                                <input type="text" class="input-text" placeholder="<?php echo $this->lang->line('phonenum');?>" name="c_phone" id="c_phone" required/>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <div class="col-sms-8 col-sm-8 col-md-6">
                                                <input type="email" class="input-text" placeholder="<?php echo $this->lang->line('email');?>" name="c_email" id="c_email" required/>
                                            </div>
                                            <div class="col-sms-8 col-sm-8 col-md-6">
                                                <input type="text" class="input-text" placeholder="<?php echo $this->lang->line('address');?>" name="c_address" id="c_address" required/>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <div class="col-sms-8 col-sm-8 col-md-6">
                                                <div class="selector" id="drb_cateGrp" name="drb_cateGrp">
                                                    <select class="full-width">
                                                        <option value="">--- Chọn Tour ---</option>
                                                        <?php if(isset($toursCate)){
                                                            foreach ($toursCate as $TC) {
                                                                echo '<option value="'.$TC->CATEGORY_ID.'">'.$TC->CATE_NAME.'</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sms-8 col-sm-8 col-md-6">
                                                <div class="selector">
                                                    <select class="full-width" name="drb_tourGrp" id="drb_tourGrp">
                                                        <option value="">--- Chọn Tour ---</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <div class="col-sms-8 col-sm-8 col-md-6">
                                                <div class="datepicker-wrap">
                                                    <input type="text" class="input-text1 full-width" placeholder="<?php echo $this->lang->line('fromdate');?>" name="f_date3" id="f_date3" required/>
                                                </div>
                                            </div>
                                            <div class="col-sms-8 col-sm-8 col-md-6">
                                                <div class="datepicker-wrap">
                                                    <input type="text" class="input-text1 full-width" placeholder="<?php echo $this->lang->line('todate');?>" name="t_date3" id="t_date3" required/>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <div class="col-sms-8 col-sm-8 col-md-6">
                                                <input type="number" class="input-text" placeholder="<?php echo $this->lang->line('adult');?>" name="a_adult" id="a_adult"/>
                                            </div>
                                            <div class="col-sms-8 col-sm-8 col-md-6">
                                                <input type="number" class="input-text" placeholder="<?php echo $this->lang->line('kids');?>" name="a_kid" id="a_kid"/>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <textarea class="input-text input-request" rows="1" id="c_request" name="c_request"><?php echo $this->lang->line('request');?></textarea>
                                        </li>
                                        <li class="row">
                                            <div class="box-element" align="center">
                                                <button type="submit" class="full-width btn-medium" ><?php echo $this->lang->line('submit');?></button>
                                            </div>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div><!-- /tab-content -->
                    </div>
                </div>
                <div class="col-sms-6 col-sm-6 col-md-4">
                    <div class="tabs-top">
                        <ul class="navx ver-tabs">
                            <li class="active"><a href="#a4" data-toggle="tab"><span><?php echo $this->lang->line('news');?></span></a></li>
                            <li class="s-tab"><a href="#b4" data-toggle="tab"><span><?php echo $this->lang->line('promotion');?></span></a></li>
                            <li class="t-tab"><a href="#c4" data-toggle="tab"><span><?php echo $this->lang->line('faq');?></span></a></li>
                        </ul>
                        <div class="tab-top-content">
                            <div class="tab-pane active" id="a4">
                                <ul class="list-group pull-left">
                                    <?php if(isset($newsData)){
                                        foreach ($newsData as $row){?>
                                    <li class="list-group-item">
                                        <a href="<?php echo base_url('home/news/'.$row->NEWS_ID)?>"><?php echo $row->NEWS_TITLE?></a>
                                    </li>
                                    <?php } }?>
                                </ul>
                            </div>
                            <div class="tab-pane" id="b4">
                                <ul class="list-group pull-left">
                                    <?php if(isset($promotionData)){
                                        foreach ($promotionData as $row){?>
                                            <li class="list-group-item">
                                                <a href="<?php echo base_url('home/news/'.$row->NEWS_ID)?>"><?php echo $row->NEWS_TITLE?></a>
                                            </li>
                                        <?php } }?>
                                </ul>
                            </div>
                            <div class="tab-pane" id="c4">
                                <ul class="list-group pull-left">
<!--                                    <li class="list-group-item">-->
<!--                                        <a href="#"> tin tuc khuyen mai hoi dap tin tuc khuyen mai hoi daptin tuc khuyen mai hoi dap</a>-->
<!--                                    </li>-->
<!--                                    <li class="list-group-item">-->
<!--                                        <a href="#"> tin tuc khuyen mai hoi dap tin tuc khuyen mai hoi daptin tuc khuyen mai hoi dap</a>-->
<!--                                    </li>-->
<!--                                    <li class="list-group-item">-->
<!--                                        <a href="#"> tin tuc khuyen mai hoi dap tin tuc khuyen mai hoi daptin tuc khuyen mai hoi dap</a>-->
<!--                                    </li>-->
<!--                                    <li class="list-group-item">-->
<!--                                        <a href="#"> tin tuc khuyen mai hoi dap tin tuc khuyen mai hoi daptin tuc khuyen mai hoi dap</a>-->
<!--                                    </li>-->
<!--                                    <li class="list-group-item">-->
<!--                                        <a href="#"> tin tuc khuyen mai hoi dap tin tuc khuyen mai hoi daptin tuc khuyen mai hoi dap</a>-->
<!--                                    </li>-->
<!--                                    <li class="list-group-item">-->
<!--                                        <a href="#"> tin tuc khuyen mai hoi dap tin tuc khuyen mai hoi daptin tuc khuyen mai hoi dap</a>-->
<!--                                    </li>-->
<!--                                    <li class="list-group-item">-->
<!--                                        <a href="#"> tin tuc khuyen mai hoi dap tin tuc khuyen mai hoi daptin tuc khuyen mai hoi dap</a>-->
<!--                                    </li>-->
                                </ul>
                            </div>
                        </div><!-- /tab-content -->
                    </div>
                </div>
                <div class="col-sms-6 col-sm-6 col-md-4">
                    <ul class="box-new">
                        <h4><?php echo $this->lang->line('vonguyengiap-cate')?></h4>
                        <hr/>
                        <?php if(isset($generalData)){
                            foreach($generalData as $row){?>
                        <li>
                            <div class="box-new-block">
                                <div class="box-img">
                                    <a href="<?php echo base_url('home/news/'.$row->NEWS_ID)?>">
                                        <img src="<?php echo base_url($row->NEWS_RPV_IMG)?>" alt="" width="63" height="63" />
                                    </a>
                                </div>
                                <div class="box-content">
                                    <h5 class="box-new-title"><a href="<?php echo base_url('home/news/'.$row->NEWS_ID)?>"><?php echo $row->NEWS_TITLE?></a></h5>
                                    <div class="box-description">
                                        <p><?php echo $row->NEWS_SHRT_CNT?></p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php }
                        }?>
                        <div class="box-element" align="center">
                            <a href="#" title="" class="button">SEE ALL</a>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="row image-box style7">
                <div class="col-sms-8 col-sm-8 col-md-6">
                    <div class="advisory">
                        <div class="fb-like"></div>
<!--                        <div class="col-md-3">-->
<!--                            <div class="img-box">-->
<!--                                <div class="fb-like"></div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-md-9">-->
<!--                            Vung chua travel group and support-->
<!--                        </div>-->
                    </div>
                </div>
                <div class="col-sms-8 col-sm-8 col-md-6">
                    <div class="advisory">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="input-req full-width" placeholder="<?php echo $this->lang->line('name');?>" />
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="input-req full-width" placeholder="<?php echo $this->lang->line('emailadd');?>" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <label><?php echo $this->lang->line('iwantreceive');?> <span class="skin-color"><?php echo $this->lang->line('vungchua');?></span> <?php echo $this->lang->line('iwantreceive1');?></label>
                            </div>
                            <div class="col-md-4" align="center">
                                <button class="rcp-btn"><?php echo $this->lang->line('reg');?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--     Addvise Section-->
    <div class="section container">
        <h2>Linked</h2>
        <div class="investor-slideshow image-carousel style2 investor-list" data-animation="slide" data-item-width="170" data-item-margin="30">
            <ul class="slides">
                <li>
                    <div class="VungChuaTravel-box">
                        <a href="#"><img src="<?php echo base_url("resources/images/investor/1.png")?>" alt=""></a>
                    </div>
                </li>
                <li>
                    <div class="VungChuaTravel-box">
                        <a href="#"><img src="<?php echo base_url("resources/images/investor/2.png")?>" alt=""></a>
                    </div>
                </li>
                <li>
                    <div class="VungChuaTravel-box">
                        <a href="#"><img src="<?php echo base_url("resources/images/investor/3.png")?>" alt=""></a>
                    </div>
                </li>
                <li>
                    <div class="VungChuaTravel-box">
                        <a href="#"><img src="<?php echo base_url("resources/images/investor/4.png")?>" alt=""></a>
                    </div>
                </li>
                <li>
                    <div class="VungChuaTravel-box">
                        <a href="#"><img src="<?php echo base_url("resources/images/investor/5.png")?>" alt=""></a>
                    </div>
                </li>
                <li>
                    <div class="VungChuaTravel-box">
                        <a href="#"><img src="<?php echo base_url("resources/images/investor/6.png")?>" alt=""></a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>