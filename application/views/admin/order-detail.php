<section role="main" class="content-body">
    <?php if(isset($tourOrderDetail)){?>
    <header class="page-header">
        <h2>Đặt Tour</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="<?php echo base_url('admin/index')?>">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><a href="<?php echo base_url('order/getNewTourOrder')?>"><span>Đặt Tour</span></a></li>
                <li><span>Chi Tiết</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>
    <?php }elseif(isset($hotelOrderDetail)){?>
        <header class="page-header">
            <h2>Đặt Khách Sạn</h2>

            <div class="right-wrapper pull-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="<?php echo base_url('admin/index')?>">
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    <li><a href="<?php echo base_url('order/getNewHotelOrder')?>"><span>Đặt Khách Sạn</span></a></li>
                    <li><span>Chi Tiết</span></li>
                </ol>

                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
            </div>
        </header>
    <?php }elseif(isset($restOrderDetail)){?>
        <header class="page-header">
            <h2>Đặt Nhà Hàng</h2>

            <div class="right-wrapper pull-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="<?php echo base_url('admin/index')?>">
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    <li><a href="<?php echo base_url('order/getNewRestOrder')?>"><span>Đặt Nhà Hàng</span></a></li>
                    <li><span>Chi Tiết</span></li>
                </ol>

                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
            </div>
        </header>
    <?php }elseif(isset($carOrderDetail)){?>
        <header class="page-header">
            <h2>Đặt Xe</h2>

            <div class="right-wrapper pull-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="<?php echo base_url('admin/index')?>">
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    <li><a href="<?php echo base_url('order/getNewCarOrder')?>"><span>Đặt Xe</span></a></li>
                    <li><span>Chi Tiết</span></li>
                </ol>

                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
            </div>
        </header>
    <?php }?>

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
        if(isset($tourOrderDetail)){?>
            <form class="form-horizontal form-bordered" id="imageForm" action="<?php echo base_url('order/updateTourOrder')?>" method="post" onsubmit="" enctype="multipart/form-data">
                <?php foreach ($tourOrderDetail as $row) {
                    ?>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tour</label>
                            <div class="col-md-8">
                                <label class="control-label"><?php echo $row->TOURS_ID?> - <?php echo $row->TOUR_TITLE?></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Ghi Chú</label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="3" id="user_note" name="user_note" data-plugin-textarea-autosize><?php echo $row->USER_NOTE?></textarea>
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
                                    <input type="text" data-plugin-datepicker class="form-control" name="ord_f_date" id="ord_f_date" value="<?php echo date('m-d-Y',strtotime($row->FROM_DATE))?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Địa Chỉ</label>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo $row->CUST_ADDRESS?></label>
                            </div>
                            <label class="col-md-2 control-label">Ngày Kết Thúc</label>
                            <div class="col-md-3">
                                <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                    <input type="text" data-plugin-datepicker class="form-control" name="ord_t_date" id="ord_t_date" value="<?php echo date('m-d-Y',strtotime($row->TO_DATE))?>">
                                </div>
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
        <?php }elseif(isset($hotelOrderDetail)){?>
            <form class="form-horizontal form-bordered" id="imageForm" action="<?php echo base_url('order/updateHotelOrder')?>" method="post" onsubmit="" enctype="multipart/form-data">
                <?php foreach ($hotelOrderDetail as $row) {
                    ?>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Khach Sạn</label>
                            <div class="col-md-8">
                                <label class="control-label"><?php echo $row->HOTEL_ID?> - <?php echo $row->HOTEL_NM?></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Ghi Chú</label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="3" id="user_note" name="user_note" data-plugin-textarea-autosize><?php echo $row->USER_NOTE?></textarea>
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
                            <label class="col-md-2 control-label">Từ Ngày</label>
                            <div class="col-md-3">
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                    <input type="text" data-plugin-datepicker class="form-control" name="ord_f_date" id="ord_f_date" value="<?php echo date('m-d-Y',strtotime($row->FROM_DATE))?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Địa Chỉ</label>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo $row->CUST_ADDRESS?></label>
                            </div>
                            <label class="col-md-2 control-label">Đến Ngày</label>
                            <div class="col-md-3">
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                    <input type="text" data-plugin-datepicker class="form-control" name="ord_t_date" id="ord_t_date" value="<?php echo date('m-d-Y',strtotime($row->TO_DATE))?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Loại Khách Sạn</label>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo $row->HOTEL_TP?></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Loại Phòng</label>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo $row->ROOM_TP?></label>
                            </div>
                            <label class="col-md-2 control-label">Số Lượng</label>
                            <div class="col-md-1">
                                <label class="control-label"><?php echo $row->ROOM_QTY?></label>
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
                                        <option value="1" selected>Đặt Khách Sạn</option>
                                        <option value="2">Bắt Đầu</option>
                                        <option value="3">Hoàn Thành</option>
                                    <?php }elseif($row->STATUS == 2){?>
                                        <option value="1">Đặt Khách Sạn</option>
                                        <option value="2" selected>Bắt Đầu</option>
                                        <option value="3">Hoàn Thành</option>
                                    <?php }else{?>
                                        <option value="1">Đặt Khách Sạn</option>
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
        <?php }elseif(isset($restOrderDetail)){?>
            <form class="form-horizontal form-bordered" id="imageForm" action="<?php echo base_url('order/updateRestOrder')?>" method="post" onsubmit="" enctype="multipart/form-data">
                <?php foreach ($restOrderDetail as $row) {
                    ?>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nhà Hàng</label>
                            <div class="col-md-6">
                                <label class="control-label"><?php echo $row->RESTAURANT_ID?> - <?php echo $row->REST_NM?></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Ghi Chú</label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="3" id="user_note" name="user_note" data-plugin-textarea-autosize><?php echo $row->USER_NOTE?></textarea>
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
                            <label class="col-md-2 control-label">Ngày Bắt Đầu</label>
                            <div class="col-md-3">
                                <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                    <input type="text" data-plugin-datepicker class="form-control" name="ord_f_date" id="ord_f_date" value="<?php echo date('m-d-Y',strtotime($row->FROM_DATE))?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Địa Chỉ</label>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo $row->CUST_ADDRESS?></label>
                            </div>
                            <label class="col-md-2 control-label">Ngày Kết Thúc</label>
                            <div class="col-md-3">
                                <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                    <input type="text" data-plugin-datepicker class="form-control" name="ord_t_date" id="ord_t_date" value="<?php echo date('m-d-Y',strtotime($row->TO_DATE))?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Loại Nhà Hàng</label>
                            <div class="col-md-1">
                                <label class="control-label"><?php echo $row->RESTAURANT_TP?></label>
                            </div>
                            <label class="col-md-2 control-label">Suất Ăn</label>
                            <div class="col-md-1">
                                <label class="control-label"><?php echo $row->MEALS?></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Người Lớn</label>
                            <div class="col-md-1">
                                <label class="control-label"><?php echo $row->ADULT_QTY?></label>
                            </div>
                            <label class="col-md-2 control-label">Trẻ Nhỏ</label>
                            <div class="col-md-1">
                                <label class="control-label"><?php echo $row->KID_QTY?></label>
                            </div>
                            <label class="col-md-2 control-label">Em Bé</label>
                            <div class="col-md-1">
                                <label class="control-label"><?php echo $row->INFAN_QTY?></label>
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
                                        <option value="1" selected>Đặt Nhà Hàng</option>
                                        <option value="2">Bắt Đầu</option>
                                        <option value="3">Hoàn Thành</option>
                                    <?php }elseif($row->STATUS == 2){?>
                                        <option value="1">Đặt Nhà Hàng</option>
                                        <option value="2" selected>Bắt Đầu</option>
                                        <option value="3">Hoàn Thành</option>
                                    <?php }else{?>
                                        <option value="1">Đặt Nhà Hàng</option>
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
        <?php }elseif(isset($carOrderDetail)){?>
            <form class="form-horizontal form-bordered" id="imageForm" action="<?php echo base_url('order/updateCarOrder')?>" method="post" onsubmit="" enctype="multipart/form-data">
                <?php foreach ($carOrderDetail as $row) {
                    ?>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Loại Xe</label>
                            <div class="col-md-6">
                                <label class="control-label"><?php echo $row->CAR_TP?></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Hạng Xe</label>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo $row->CAR_CLASS?></label>
                            </div>
                            <label class="col-md-2 control-label">Số Lượng</label>
                            <div class="col-md-2">
                                <label class="control-label"><b><?php echo $row->CAR_QTY?></b></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Ghi Chú</label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="3" id="user_note" name="user_note" data-plugin-textarea-autosize><?php echo $row->USER_NOTE?></textarea>
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
                            <label class="col-md-2 control-label">Từ Ngày</label>
                            <div class="col-md-3">
                                <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                    <input type="text" data-plugin-datepicker class="form-control" name="ord_f_date" id="ord_f_date" value="<?php echo date('m-d-Y',strtotime($row->FROM_DATE))?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Địa Chỉ</label>
                            <div class="col-md-3">
                                <label class="control-label"><?php echo $row->CUST_ADDRESS?></label>
                            </div>
                            <label class="col-md-2 control-label">Ngày Kết Thúc</label>
                            <div class="col-md-3">
                                <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                    <input type="text" data-plugin-datepicker class="form-control" name="ord_t_date" id="ord_t_date" value="<?php echo date('m-d-Y',strtotime($row->TO_DATE))?>">
                                </div>
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
                                        <option value="1" selected>Đặt Xe</option>
                                        <option value="2">Bắt Đầu</option>
                                        <option value="3">Hoàn Thành</option>
                                    <?php }elseif($row->STATUS == 2){?>
                                        <option value="1">Đặt Xe</option>
                                        <option value="2" selected>Bắt Đầu</option>
                                        <option value="3">Hoàn Thành</option>
                                    <?php }else{?>
                                        <option value="1">Đặt Xe</option>
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