<section role="main" class="content-body">
    <header class="page-header">
        <h2>Đặt Tour</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><a href="<?php echo base_url('order/getNewOrder')?>"><span>Đặt Tour</span></a></li>
                <li><span>Chi Tiết</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>

    <!-- start: page -->
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>
            </div>

            <h2 class="panel-title">Order Detail</h2>
        </header>
        <div class="panel-body">
            <?php
            if(isset($orderDetail)){?>
                <form class="form-horizontal form-bordered" id="imageForm" action="<?php echo base_url('order/updateOrder')?>" method="post" onsubmit="" enctype="multipart/form-data">
                    <?php foreach ($orderDetail as $row) {
                        ?>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tour</label>
                                <div class="col-md-8">
                                    <label class="control-label"><?php echo $row->TOURS_ID?> - <?php echo $row->TOUR_TITLE?></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tên Khách Hàng</label>
                                <div class="col-md-3">
                                <label class="control-label"><b><?php echo $row->CUST_NAME?></b></label>
                                </div>
                                <label class="col-md-3 control-label">Số Điện Thoại</label>
                                <div class="col-md-3">
                                    <label class="control-label"><b><?php echo $row->CUST_PHONE?></b></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Email</label>
                                <div class="col-md-3">
                                    <label class="control-label"><?php echo $row->CUST_EMAIL?></label>
                                </div>
                                <label class="col-md-2 control-label">Ngày Khởi Hành</label>
                                <div class="col-md-3">
                                    <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                        <input type="text" data-plugin-datepicker class="form-control" name="ord_date" id="ord_date" value="<?php echo date('m-d-Y',strtotime($row->DEPARTING_DATE))?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Địa Chỉ</label>
                                <div class="col-md-8">
                                    <label class="control-label"><?php echo $row->CUST_ADDRESS?></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Người Lớn</label>
                                <div class="col-md-1">
                                    <label class="control-label"><?php echo $row->ADULTS?></label>
                                </div>
                                <label class="col-md-2 control-label">Trẻ Nhỏ</label>
                                <div class="col-md-1">
                                    <label class="control-label"><?php echo $row->KIDS?></label>
                                </div>
                                <label class="col-md-2 control-label">Em Bé</label>
                                <div class="col-md-1">
                                    <label class="control-label"><?php echo $row->INFANTS?></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Yêu Cầu</label>
                                <div class="col-md-8">
                                    <label class="control-label"><?php echo $row->CUST_CONTENT?></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Trạng Thái</label>
                                <div class="col-md-8">
                                    <select class="form-control" data-plugin-multiselect id="cbxStatus" name="cbxStatus">
                                        <?php if($row->STATUS == 1){?>
                                            <option value="1" selected>Đặt Tour</option>
                                            <option value="2">Bắt Đầu</option>
                                            <option value="3">Hoàn Thành</option>
                                        <?php }elseif($row->STATUS == 2){?>
                                            <option value="1">Đặt Tour</option>
                                            <option value="2" selected>Bắt Đầu</option>
                                            <option value="3">Hoàn Thành</option>
                                        <?php }else{?>
                                            <option value="1">Đặt Tour</option>
                                            <option value="2">Bắt Đầu</option>
                                            <option value="3" selected>Hoàn Thành</option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <?php }?>
                    <div class="row" style="margin-top: 20px" align="center">
                        <div class="form-group">
                            <input type="hidden" value="<?php echo $row->ORDER_ID?>" name="orderID" id="orderID">
                            <label class="col-md-4 control-label"> </label>
                            <div class="col-md-4 col-xs-11">
                                <button class="btn btn-info" type="submit" id="update_images"> Cập Nhật </button>
                            </div>
                        </div>
                    </div>
                </form>
            <?php }?>
        </div>
    </section>
    <!-- end: page -->
</section>