<?php
    if(isset($tourOrder)){
?>
        <section role="main" class="content-body">
            <header class="page-header">
                <h2>Đặt Tour</h2>

                <div class="right-wrapper pull-right">
                    <ol class="breadcrumbs">
                        <li>
                            <a href="<?php echo base_url('admin/index')?>">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li><a href="<?php echo base_url('order/getNewOrder')?>"><span>Đặt Tour</span></a></li>
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

                    <h2 class="panel-title">Đặt Tours</h2>
                </header>
                <div class="panel-body">
                    <table class="table table-bordered table-striped mb-none" id="datatable-default">
                        <thead>
                        <tr>
                            <th>Tên Tour</th>
                            <th>Khách Hàng</th>
                            <th>Số Điện Thoại</th>
                            <th>Ngày Khởi Hành</th>
                            <th>Trạng Thái</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($tourOrder)) {
                            foreach ($tourOrder as $row) { ?>
                                <tr class="gradeX">
                                    <td><a href="<?php echo base_url('tours/tours_detail/'.$row->TOURS_ID)?>"><?php echo $row->TOUR_TITLE?></a></td>
                                    <td><?php echo $row->CUST_NAME?></td>
                                    <td><?php echo $row->CUST_PHONE?></td>
                                    <td><?php echo $row->FROM_DATE?></td>
                                    <td class="actions">
                                        <?php if($row->STATUS == 1){ ?>
                                            <a href="<?php echo base_url('order/editTourOrder/'.$row->ORDER_ID)?>"><i class="fa fa-calendar" style="color:red"></i></a>
                                        <?php }elseif($row->STATUS == 2){?>
                                            <a href="<?php echo base_url('order/editTourOrder/'.$row->ORDER_ID)?>"><i class="fa fa-paper-plane" style="color:red"></i></a>
                                        <?php }else{?>
                                            <a href="<?php echo base_url('order/editTourOrder/'.$row->ORDER_ID)?>"><i class="fa fa-check" style="color:red"></i></a>
                                        <?php }?>
                                    </td>
                                </tr>
                            <?php }
                        }?>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- end: page -->
        </section>
<?php }else if(isset($hotelOrder)){?>
        <section role="main" class="content-body">
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

                    <h2 class="panel-title">Đặt Khách Sạn</h2>
                </header>
                <div class="panel-body">
                    <table class="table table-bordered table-striped mb-none" id="datatable-default">
                        <thead>
                        <tr>
                            <th>Khách Sạn</th>
                            <th>Loại Khách Sạn</th>
                            <th>Số Phòng</th>
                            <th>Khách Hàng</th>
                            <th>Số Điện Thoại</th>
                            <th>Từ Ngày</th>
                            <th>Trạng Thái</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($hotelOrder)) {
                            foreach ($hotelOrder as $row) { ?>
                                <tr class="gradeX">
                                    <td><a href="#"><?php echo $row->HOTEL_NM?></a></td>
                                    <td><?php echo $row->HOTEL_TP?></td>
                                    <td><?php echo $row->ROOM_QTY?></td>
                                    <td><?php echo $row->CUST_NAME?></td>
                                    <td><?php echo $row->CUST_PHONE?></td>
                                    <td><?php echo $row->FROM_DATE?></td>
                                    <td class="actions">
                                        <?php if($row->STATUS == 1){ ?>
                                            <a href="<?php echo base_url('order/editHotelOrder/'.$row->ORDER_ID)?>"><i class="fa fa-calendar" style="color:red"></i></a>
                                        <?php }elseif($row->STATUS == 2){?>
                                            <a href="<?php echo base_url('order/editHotelOrder/'.$row->ORDER_ID)?>"><i class="fa fa-paper-plane" style="color:red"></i></a>
                                        <?php }else{?>
                                            <a href="<?php echo base_url('order/editHotelOrder/'.$row->ORDER_ID)?>"><i class="fa fa-check" style="color:red"></i></a>
                                        <?php }?>
                                    </td>
                                </tr>
                            <?php }
                        }?>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- end: page -->
        </section>
<?php }else if(isset($restOrder)){?>
        <section role="main" class="content-body">
            <header class="page-header">
                <h2>Đặt Nhà Hàng</h2>

                <div class="right-wrapper pull-right">
                    <ol class="breadcrumbs">
                        <li>
                            <a href="<?php echo base_url('admin/index')?>">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li><a href="<?php echo base_url('order/getNewOrder')?>"><span>Đặt Nhà Hàng</span></a></li>
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

                    <h2 class="panel-title">Đặt Nhà Hàng</h2>
                </header>
                <div class="panel-body">
                    <table class="table table-bordered table-striped mb-none" id="datatable-default">
                        <thead>
                        <tr>
                            <th>Nhà Hàng</th>
                            <th>Khách Hàng</th>
                            <th>Số Điện Thoại</th>
                            <th>Từ Ngày</th>
                            <th>Trạng Thái</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($restOrder)) {
                            foreach ($restOrder as $row) { ?>
                                <tr class="gradeX">
                                    <td><a href="#"><?php echo $row->REST_NM?></a></td>
                                    <td><?php echo $row->CUST_NAME?></td>
                                    <td><?php echo $row->CUST_PHONE?></td>
                                    <td><?php echo $row->FROM_DATE?></td>
                                    <td class="actions">
                                        <?php if($row->STATUS == 1){ ?>
                                            <a href="<?php echo base_url('order/editRestOrder/'.$row->ORDER_ID)?>"><i class="fa fa-calendar" style="color:red"></i></a>
                                        <?php }elseif($row->STATUS == 2){?>
                                            <a href="<?php echo base_url('order/editRestOrder/'.$row->ORDER_ID)?>"><i class="fa fa-paper-plane" style="color:red"></i></a>
                                        <?php }else{?>
                                            <a href="<?php echo base_url('order/editRestOrder/'.$row->ORDER_ID)?>"><i class="fa fa-check" style="color:red"></i></a>
                                        <?php }?>
                                    </td>
                                </tr>
                            <?php }
                        }?>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- end: page -->
        </section>
<?php }else if(isset($carOrder)){?>
        <section role="main" class="content-body">
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

                    <h2 class="panel-title">Đặt Xe</h2>
                </header>
                <div class="panel-body">
                    <table class="table table-bordered table-striped mb-none" id="datatable-default">
                        <thead>
                        <tr>
                            <th>Loại Xe</th>
                            <th>Khách Hàng</th>
                            <th>Số Điện Thoại</th>
                            <th>Từ Ngày</th>
                            <th>Trạng Thái</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($carOrder)) {
                            foreach ($carOrder as $row) { ?>
                                <tr class="gradeX">
                                    <td><?php echo $row->CAR_TP?></td>
                                    <td><?php echo $row->CUST_NAME?></td>
                                    <td><?php echo $row->CUST_PHONE?></td>
                                    <td><?php echo $row->FROM_DATE?></td>
                                    <td class="actions">
                                        <?php if($row->STATUS == 1){ ?>
                                            <a href="<?php echo base_url('order/editCarOrder/'.$row->ORDER_ID)?>"><i class="fa fa-calendar" style="color:red"></i></a>
                                        <?php }elseif($row->STATUS == 2){?>
                                            <a href="<?php echo base_url('order/editCarOrder/'.$row->ORDER_ID)?>"><i class="fa fa-paper-plane" style="color:red"></i></a>
                                        <?php }else{?>
                                            <a href="<?php echo base_url('order/editCarOrder/'.$row->ORDER_ID)?>"><i class="fa fa-check" style="color:red"></i></a>
                                        <?php }?>
                                    </td>
                                </tr>
                            <?php }
                        }?>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- end: page -->
        </section>
<?php }?>
