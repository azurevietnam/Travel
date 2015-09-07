<?php
/**
 * Created by PhpStorm.
 * User: POSCO_ICT_HAILONG
 * Date: 28/05/2015
 * Time: 11:20 AM
 */
?>
<script type="text/javascript">
$(document).ready(function() {
    var track_load = 0; //total loaded record group(s)
    var loading  = false; //to prevents multipal ajax loads
    var pages = <?php echo $pages ?>; //total record group(s)

    $('#tour-list').load("<?php echo base_url()?>tours/loadPost/<?php echo $CATE_ID?>", {'group_no':track_load}, function() {track_load++;}); //load first group

    $(window).scroll(function() { //detect page scroll
    if($(window).scrollTop() + $(window).height() >= $(document).height()-600)  //user scrolled to bottom of the page?
        {
            if (track_load <= pages -1 && loading == false) //there's more data to load
            {
                loading = true; //prevent further ajax loading

            //load data from the server using a HTTP POST request
            $.post('<?php echo base_url()?>tours/loadPost/<?php echo $CATE_ID?>', {'group_no': track_load}, function (data) {

                $("#tour-list").append(data); //append received data into the element

                track_load++; //loaded group increment

                loading = false;

            }).fail(function (xhr, ajaxOptions, thrownError) { //any errors?

                alert(thrownError); //alert with HTTP error
                loading = false;
            });
            }
        }
    });
});
</script>
<div class="page-title-container">
    <div class="container">
        <div class="page-title pull-left">

        </div>
        <ul class="breadcrumbs pull-right">
            <li><a href="<?php echo base_url()?>"><?php echo $this->lang->line('home'); ?></a></li>
            <li><a href="<?php echo base_url()?>tours/tours_list/all"><?php echo $this->lang->line('tours'); ?></a></li>
            <li><a href="<?php echo base_url()?>tours/tours_list/<?php echo $CATE_ID?>"><?php if($CATE_ID=='all'){echo $this->lang->line('all');}
                    else{echo $CATE_ID;}; ?></a></li>
        </ul>
    </div>
</div>

<section id="content">
    <div class="container">
        <div id="main">
            <div class="row add-clearfix image-box style1 tour-locations" id="tour-list">

            </div>
        </div>
    </div>
</section>