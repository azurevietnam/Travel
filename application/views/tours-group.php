<?php
/**
 * Created by PhpStorm.
 * User: HAILONG_ICT
 * Date: 12/28/2015
 * Time: 1:13 PM
 */
?>

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
                                <a href="#"><img src="<?php echo base_url('resources/images/icon/arrow.png')?>" ></a>
                            </figure>
                        </article>
                    </div>
                <?php }?>
            </div>
        <?php }?>
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
                                <a href="#"><img src="<?php echo base_url('resources/images/icon/arrow.png')?>" ></a>
                            </figure>
                        </article>
                    </div>
                <?php }?>
            </div>
        <?php }?>
    </div>
</section>
