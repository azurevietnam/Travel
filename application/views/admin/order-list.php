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
                <?php if(isset($order)) {
                    foreach ($order as $row) { ?>
                        <tr class="gradeX">
                            <td><a href="<?php echo base_url('tours/tours_detail/'.$row->TOURS_ID)?>"><?php echo $row->TOUR_TITLE?></a></td>
                            <td><?php echo $row->CUST_NAME?></td>
                            <td><?php echo $row->CUST_PHONE?></td>
                            <td><?php echo $row->DEPARTING_DATE?></td>
                            <td class="actions">
                                <?php if($row->STATUS == 1){ ?>
                                    <a href="<?php echo base_url('order/editOrder/'.$row->ORDER_ID)?>"><i class="fa fa-calendar" style="color:red"></i></a>
                                <?php }elseif($row->STATUS == 2){?>
                                    <a href="<?php echo base_url('order/editOrder/'.$row->ORDER_ID)?>"><i class="fa fa-paper-plane" style="color:red"></i></a>
                                <?php }else{?>
                                    <a href="<?php echo base_url('order/editOrder/'.$row->ORDER_ID)?>"><i class="fa fa-check" style="color:red"></i></a>
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