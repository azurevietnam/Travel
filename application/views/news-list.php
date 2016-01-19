<?php
/**
 * Created by PhpStorm.
 * User: POSCO_ICT_HAILONG
 * Date: 9/9/2015
 * Time: 11:27 AM
 */
?>
<script type="text/javascript">
    $(document).ready(function() {
        var track_load = 0; //total loaded record group(s)
        var loading  = false; //to prevents multipal ajax loads
        var pages = <?php echo $pages ?>; //total record group(s)

            $('#newsList').load("<?php echo base_url('home/loadNews/'.$CATE_ID)?>", {'group_no':track_load}, function() {track_load++;}); //load first group

        $("#loadMore").click(function() { //detect page scroll

            if (track_load <= pages -1 && loading == false) //there's more data to load
            {
                loading = true; //prevent further ajax loading

                //load data from the server using a HTTP POST request
                $.post('<?php echo base_url()?>home/loadNews/<?php echo $CATE_ID?>', {'group_no': track_load}, function (data) {

                    $("#newsList").append(data); //append received data into the element

                    track_load++; //loaded group increment

                    loading = false;

                }).fail(function (xhr, ajaxOptions, thrownError) { //any errors?

                    alert(thrownError); //alert with HTTP error
                    loading = false;
                });
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
            <li><a href="<?php echo base_url()?>tours/tours_list/"></a></li>
        </ul>
    </div>
</div>
<section id="content">
    <div class="container">
        <div id="main">
            <div class="row">
                <div class="hotel-list">
                    <div class="row image-box hotel listing-style1" id="newsList">
                    </div>
                </div>
                <a href="#" class="uppercase full-width button btn-large" id="loadMore" name="loadMore">load more listing</a>
            </div>
        </div>
    </div>
</section>
