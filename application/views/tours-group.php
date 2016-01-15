<?php
/**
 * Created by PhpStorm.
 * User: HAILONG_ICT
 * Date: 12/28/2015
 * Time: 1:13 PM
 */
?>
<script type="text/javascript">
    Waves.init();
    Waves.attach('.flat-box', ['waves-block']);
    Waves.attach('.float-box', ['waves-block', 'waves-float']);
    Waves.attach('.waves-image');
</script>
<section id="content">
    <!--     Popuplar Destinations-->
    <div class="section container">
        <div class="cate-row">
            <?php if( isset($tourGroup)){
                foreach($tourGroup as $row){
            ?>
            <div class="col-sm-4-1">
                <a href="<?php echo base_url('tours/tours_list/'.$row->CATEGORY_ID)?>">
                    <article class="cate-box waves-float waves-effect" style="background-color: <?php echo $row->COLOR_CD?>">
                        <img src="<?php echo base_url($row->IMG_URL)?>">
                        <figure class="animated" data-animation-type="fadeInDown" data-animation-delay="0">
                            <figcaption>
                                <h3 class="caption-title" style="color: <?php echo $row->FONT_COLOR_CD?>"><?php echo $row->CATE_NM?></h3>
                                <hr/>
                                <span style="color:<?php echo $row->FONT_COLOR_CD?>;"><?php echo $row->CATE_DESC?></span>
                            </figcaption>
                        </figure>
                    </article>
                </a>
            </div>
            <?php } }?>
        </div>
    </div>
</section>
