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

                <h2 class="panel-title">Tour Images</h2>
            </header>
            <div class="panel-body">
                <?php $index=1;
                if(isset($tourImages)){?>
                    <form class="form-horizontal form-bordered" id="imageForm" action="<?php echo base_url('admin_tours/updateImages')?>" method="post" onsubmit="" enctype="multipart/form-data">
                        <div class="row">
                            <?php foreach($tourImages as $row){
                                if($index%3 ==0){
                                    echo '<div class="form-group">';
                                }
                                ?>
                                <div class="col-md-4">
                                    <img src="<?php echo base_url().$row->IMG_URL?>" alt="<?php echo $row->IMG_ALT?>" align="center" width="300" height="200">
<!--                                     <label class="col-md-4 control-label"></label>-->
                                    <div class="input-group" style="width:100%;">
                                        <input type="hidden" value="<?php echo $row->IMG_ID?>" name="imgID<?php echo $index?>" id="imgID<?php echo $index?>">
                                        <select class="form-control" data-plugin-multiselect id="cbxUpdate<?php echo $index?>" name="cbxUpdate<?php echo $index?>">
                                            <option value="U" selected>Update</option>
                                            <option value="D">Delete</option>
                                        </select>
                                        <input type="text" class="form-control" style="width:70%;" name="img_alt<?php echo $index?>" id="img_alt<?php echo $index?>" placeholder="Thẻ mô tả" value="<?php echo $row->IMG_ALT?>" required="required">
                                    </div>
                                    <?php if($index%3 ==0){
                                        echo '</div>';
                                    }?>
                            </div>
                            <?php $index ++;}?>
                        </div>
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
                <h2 class="panel-title">Add Tour Images</h2>
            </header>
            <div class="panel-body">
                <form class="form-horizontal form-bordered" id="postForm" action="<?php echo base_url('admin_tours/uploadImages/')?>" method="post" onsubmit="" enctype="multipart/form-data">
                    <div class="row" id="images_upload">
                    </div>
                    <div class="row">
                        <input type="hidden" name="tourID" value="<?php echo $tourID?>">
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-4 col-xs-11">
                                <button class="btn btn-info" type="button" id="add_images"> Thêm Ảnh</button>
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