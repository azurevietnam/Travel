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

        $('#tourList').load("<?php echo base_url()?>tours/loadPost/<?php echo $CATE_ID?>", {'group_no':track_load}, function() {track_load++;}); //load first group

        $("#loadMore").click(function() { //detect page scroll

            if (track_load <= pages -1 && loading == false) //there's more data to load
            {
                loading = true; //prevent further ajax loading

                //load data from the server using a HTTP POST request
                $.post('<?php echo base_url()?>tours/loadPost/<?php echo $CATE_ID?>', {'group_no': track_load}, function (data) {

                    $("#tourList").append(data); //append received data into the element

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
                <div class="col-sm-4 col-md-3">
                    <h4 class="search-results-title"><i class="soap-icon-search"></i><b>1,984</b> results found.</h4>
                    <div class="toggle-container filters-container">
                        <div class="panel style1 arrow-right">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#price-filter" class="collapsed">Price</a>
                            </h4>
                            <div id="price-filter" class="panel-collapse collapse">
                                <div class="panel-content">
                                    <div id="price-range"></div>
                                    <br />
                                    <span class="min-price-label pull-left"></span>
                                    <input type="hidden" id="min_price" name="min_price" value=""/>
                                    <span class="max-price-label pull-right"></span>
                                    <input type="hidden" id="max_price" name="max_price" value=""/>
                                    <div class="clearer"></div>
                                </div><!-- end content -->
                            </div>
                        </div>

                        <div class="panel style1 arrow-right">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#rating-filter" class="collapsed">User Rating</a>
                            </h4>
                            <div id="rating-filter" class="panel-collapse collapse">
                                <div class="panel-content">
                                    <div id="rating" class="five-stars-container editable-rating"></div>
                                    <br />
                                    <small>2458 REVIEWS</small>
                                </div>
                            </div>
                        </div>

                        <div class="panel style1 arrow-right">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#modify-search-panel" class="collapsed">Modify Search</a>
                            </h4>
                            <div id="modify-search-panel" class="panel-collapse collapse">
                                <div class="panel-content">
                                    <form method="post">
                                        <div class="form-group">
                                            <label>destination</label>
                                            <input type="text" class="input-text full-width" placeholder="" value="Paris" />
                                        </div>
                                        <div class="form-group">
                                            <label>check in</label>
                                            <div class="datepicker-wrap">
                                                <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>check out</label>
                                            <div class="datepicker-wrap">
                                                <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                            </div>
                                        </div>
                                        <br />
                                        <button class="btn-medium icon-check uppercase full-width">search again</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-md-9">
                    <div class="sort-by-section clearfix">
                        <h4 class="sort-by-title block-sm">Sort results by:</h4>
                        <ul class="sort-bar clearfix block-sm">
                            <li class="sort-by-name"><a class="sort-by-container" href="#"><span>name</span></a></li>
                            <li class="sort-by-price"><a class="sort-by-container" href="#"><span>price</span></a></li>
                            <li class="clearer visible-sms"></li>
                            <li class="sort-by-rating active"><a class="sort-by-container" href="#"><span>rating</span></a></li>
                            <li class="sort-by-popularity"><a class="sort-by-container" href="#"><span>popularity</span></a></li>
                        </ul>

                        <ul class="swap-tiles clearfix block-sm">
                            <li class="swap-list">
                                <a href="#"><i class="soap-icon-list"></i></a>
                            </li>
                            <li class="swap-grid active">
                                <a href="#"><i class="soap-icon-grid"></i></a>
                            </li>
                            <li class="swap-block">
                                <a href="#"><i class="soap-icon-block"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="hotel-list">
                        <div class="row image-box hotel listing-style1" id="tourList">
                        </div>
                    </div>
                    <a href="#" class="uppercase full-width button btn-large" id="loadMore" name="loadMore">load more listing</a>
                </div>
            </div>
        </div>
    </div>
</section>
