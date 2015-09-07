<?php
/**
 * Created by PhpStorm.
 * User: POSCO_ICT_HAILONG
 * Date: 8/19/2015
 * Time: 4:37 PM
 */
?>

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Quản Lý Images Tour</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="<?php echo base_url('admin/index')?>">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Tour</span></li>
                <li><span>Thêm Mới</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>

    <!-- start: page -->
<div class="row">
    <div class="col-xs-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>
                </div>

                <h2 class="panel-title">Lịch Trình Tour</h2>
            </header>
            <div class="panel-body">
                <?php $index=1;
                if(isset($tourSchedule)){?>
                    <form class="form-horizontal form-bordered" id="imageForm" action="<?php echo base_url('admin_tours/updateSchedule')?>" method="post" onsubmit="" enctype="multipart/form-data">
                        <?php foreach ($tourSchedule as $row) {
                        ?>
                        <div class="row">
                            <div class="form-group" id="schGrp<?php echo $index?>">
                                <div class="col-md-1">
                                    <input type="hidden" value="<?php echo $row->SCHEDULE_ID ?>" name="scheID_<?php echo $index?>" id="scheID_<?php echo $index?>">
                                </div>
                                <div class="col-md-1">
                                    <input type="text" class="form-control" name="txt_day_<?php echo $index?>" id="txt_day_<?php echo $index?>"
                                           placeholder="Day" value="<?php echo $row->DAYS?>" required="required">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="start_time_<?php echo $index?>" id="start_time_<?php echo $index?>"
                                           placeholder="Thời gian bắt đầu. (06:30 AM)" value="<?php echo $row->DEPARTURE_TIME?>" required="required">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="end_time_<?php echo $index?>" id="end_time_<?php echo $index?>"
                                           placeholder="Thời gian kết thúc. (06:30 PM)" value="<?php echo $row->ARRIVAL_TIME?>" required="required">
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" data-plugin-multiselect id="cbxUpdate<?php echo $index?>"
                                            onchange="changeStatus('schGrp<?php echo $index?>', 'cbxUpdate<?php echo $index?>', 'ctnGrp<?php echo $index?>')" name="cbxUpdate<?php echo $index?>">
                                        <option value="U" selected>Update</option>
                                        <option value="D">Delete</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="ctnGrp<?php echo $index?>">
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-5">
                                    <textarea class="form-control" rows="5" id="cnt_vi_<?php echo $index?>" name="cnt_vi_<?php echo $index?>" placeholder="Nội dung kế hoạch - Tiếng Việt" required="required"><?php echo $row->SCHEDULE_CONTENT_VI?></textarea>
                                </div>
                                <div class="col-md-5">
                                    <textarea class="form-control" rows="5" id="cnt_en_<?php echo $index?>" name="cnt_en_<?php echo $index?>" placeholder="Nội dung kế hoạch - Tiếng Anh" required="required"><?php echo $row->SCHEDULE_CONTENT_EN?></textarea>
                                </div>
                            </div>
                        </div>
                            <hr/>
                        <?php $index++; }?>
                        <div class="row" style="margin-top: 20px" align="center">
                            <div class="form-group">
                                <input type="hidden" value="<?php echo $tourID ?>" name="tourID" id="tourID">
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
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>
                </div>
                <h2 class="panel-title">Thêm Lịch Trình Tour</h2>
            </header>
            <div class="panel-body">
                <form class="form-horizontal form-bordered" id="postForm" action="<?php echo base_url('admin_tours/insertSchedule/')?>" method="post" onsubmit="" enctype="multipart/form-data">
                    <div class="row" id="schedule_upload">
                    </div>
                    <div class="row">
                        <input type="hidden" name="tourID" value="<?php echo $tourID?>">
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-4 col-xs-11">
                                <button class="btn btn-info" type="button" id="add_schedule"> Thêm Kế Hoạch</button>
                            </div>
                            <div class="col-md-4 col-xs-11">
                                <button class="btn btn-primary" type="submit"> Thêm </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
<!-- end: page -->
</section>
</div>