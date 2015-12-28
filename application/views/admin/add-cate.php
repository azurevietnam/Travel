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
                <li><a href="<?php echo base_url('Category/index')?>"><span>Danh Mục</span></a></li>
                <li><a href="<?php echo base_url('Category/insertCate')?>"><span>Thêm Mới</span></a></li>
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
                <h2 class="panel-title">Thêm Danh Mục</h2>
            </header>
            <div class="panel-body">
                <form class="form-horizontal form-bordered" id="postForm" action="<?php echo base_url('Category/insertCate/')?>" method="post" onsubmit="" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Danh Mục</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="cate_title_vi" id="cate_title_vi" placeholder="Danh Mục - Vi" required="required">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="cate_title_en" id="cate_title_en" placeholder="Danh Mục - En" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Giới Thiệu</label>
                            <div class="col-md-4">
                                <textarea class="form-control" rows="3" id="cate_desc_vi" name="cate_desc_vi" placeholder="Giới Thiệu - Vi" required="required"></textarea>
                            </div>
                            <div class="col-md-4">
                                <textarea class="form-control" rows="3" id="cate_desc_en" name="cate_desc_en" placeholder="Giới Thiệu - En" required="required"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Vị trí hiển thị</label>
                            <div class="col-md-4">
                                <select class="form-control" data-plugin-multiselect id="main_cate" name="main_cate">
                                    <optgroup label="Nhóm danh mục">
                                        <option value="0" selected>Không hiển thị</option>
                                        <option value="1">Vị trí 1</option>
                                        <option value="2">Vị trí 2</option>
                                        <option value="3">Vị trí 3</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="text" data-plugin-colorpicker class="colorpicker-rgba form-control" value="#2196f3" data-horizontal="true" name="color_cd" id="color_cd"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Hình Đại Diện</label>
                            <div class="col-md-6">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="input-append">
                                        <div class="uneditable-input">
                                            <i class="fa fa-file fileupload-exists"></i>
                                            <span class="fileupload-preview"></span>
                                        </div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileupload-exists">Change</span>
                                                    <span class="fileupload-new">Select file</span>
                                                    <input type="file" name="rpv_img" required/>
                                                </span>
                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nhóm - Danh Mục</label>
                            <div class="col-md-4">
                                <select class="form-control input-sm mb-md" id="cate_grp" name="cate_grp">
                                    <optgroup label="Nhóm danh mục">
                                        <?php if(isset($cateGroup)){
                                            foreach($cateGroup as $grp){?>
                                        <option value="<?php echo $grp->GROUP_ID?>"><?php echo $grp->GROUP_NAME?></option>
                                        <?php }}?>
                                    </optgroup>
                                </select>
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