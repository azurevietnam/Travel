<?php
/**
 * Created by PhpStorm.
 * User: POSCO_ICT_HAILONG
 * Date: 7/18/2015
 * Time: 4:34 PM
 */
$locationStatus = '';
if(isset($status)){
    if($status == 'success'){
        $locationStatus == "ok";
    }else{
        $locationStatus == "fail";
    }
}
?>

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Quản Lý Tour</h2>

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
                        <a href="#" class="fa fa-caret-<?php if($locationStatus=='ok' || $locationStatus==''){echo 'up';}else{echo 'down';}?>"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">Thêm Mới Địa Điểm</h2>
                </header>
                <div class="panel-body" <?php if($locationStatus=='ok' || $locationStatus==''){echo 'style="display: none"';}else{echo '';}?>>
                    <form class="form-horizontal form-bordered" action="<?php echo base_url('admin_tours/addNational')?>" method="post">
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Quốc Gia</label>
                                <div class="col-md-7">
                                    <div class="input-group mb-md">
                                        <input type="text" class="form-control" name="add_national" id="add_national" placeholder="Thêm Quốc Gia">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary" type="submit"> Thêm </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form class="form-horizontal form-bordered" action="<?php echo base_url('admin_tours/addLocation')?>" method="post">
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tỉnh Thành</label>
                                <div class="col-md-2">
                                    <?php echo form_error('nationaChk'); ?><?php echo form_error('sysError'); ?>
                                    <select data-plugin-selectTwo class="form-control populate" name="drb_national" id="drb_national">
                                        <optgroup label="Chọn Quốc Gia">
                                            <option value="">Chọn Quốc Gia</option>
                                            <?php if(isset($national)){
                                                foreach ($national as $nation) {
                                                    echo '<option value="'.$nation->NATIONAL_ID.'">'.$nation->NATIONAL_NAME.'</option>';
                                                }

                                            }
                                            ?>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group mb-md">
                                        <input type="text" class="form-control" name="add_province_vi" id="add_province_vi" placeholder="Vi.Nm">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group mb-md">
                                        <input type="text" class="form-control" name="add_province_en" id="add_province_en" placeholder="Eng.Nm">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary" type="submit"> Thêm </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <?php echo form_error('national'); ?><?php echo form_error('drb_national'); ?><?php echo form_error('add_province_vi'); ?><?php echo form_error('add_province_en'); ?>
                                </div>
                            </div>
                        </div>
                    </form>
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

                    <h2 class="panel-title">Cập Nhật Tour</h2>
                </header>
                <div class="panel-body">
                    <form class="form-horizontal form-bordered" id="postForm" action="<?php echo base_url('admin_tours/updateTour')?>" method="post" onsubmit="return postForm()" enctype="multipart/form-data">
                        <?php if(isset($tourData)){
                            foreach($tourData as $row){
                            ?>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="col-md-6 control-label">
                                        <?php if($this->form_validation->run() == false){echo validation_errors();}?>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="tourID" id="tourID" value="<?php echo $tourID?>">
                                <label class="col-md-3 control-label">Quốc Gia</label>
                                <div class="col-md-3">
                                    <?php echo form_error('nationaChk'); ?><?php echo form_error('sysError'); ?>
                                    <select required data-plugin-selectTwo class="form-control populate" name="drb_national" id="drb_national">
                                        <optgroup label="Chọn Quốc Gia">
                                            <?php if(isset($national)){
                                                foreach ($national as $nation) { ?>
                                                    <option value="<?php echo $nation->NATIONAL_ID ?>" <?php if($nation->NATIONAL_ID == $row->NATIONAL_ID){echo 'selected';}?>><?php echo $nation->NATIONAL_NAME ?></option>;
                                                <?php }}?>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <?php echo form_error('locationViChk'); ?><?php echo form_error('locationEnChk'); ?>
                                    <select data-plugin-selectTwo class="form-control populate" name="drb_province" id="drb_province">
                                        <optgroup label="Chọn Tỉnh Thành">
                                            <option value="<?php echo $row->LOCATION_ID?>"><?php echo $row->LOCATION_NM?></option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Danh Mục</label>
                                <div class="col-md-6">
                                    <select data-plugin-selectTwo class="form-control populate" name="drb_category" id="drb_category" required="required">
                                        <optgroup label="Chọn Danh Mục">
                                            <?php if(isset($category)){
                                                foreach($category as $cate){ ?>
                                                    <option value="<?php echo $cate->CATEGORY_ID?>" <?php if($row->CATEGORY_ID = $cate->CATEGORY_ID){echo 'selected';}?>><?php echo $cate->CATEGORY_NM_VI?></option>;
                                                <?php }}?>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Phân Loại Bài Đăng</label>
                                <div class="col-md-3">
                                    <label  class="col-md-8 control-label"">Bài Đăng Nổi Bật:</label>
                                    <select class="form-control" data-plugin-multiselect id="rpv_yn" name="rpv_yn">
                                        <optgroup label="Bài Đăng Nổi Bật">
                                            <option value="Y" selected>Có</option>
                                            <option value="N">Không</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label  class="col-md-8 control-label"">Hiển Thị:</label>
                                    <select class="form-control" data-plugin-multiselect id="display_yn" name="display_yn">
                                        <optgroup label="Hiển Thị Bài Đăng">
                                            <option value="Y" selected>Có</option>
                                            <option value="N">Không</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tiêu Đề</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="vi_title" id="vi_title" value="<?php echo $row->TOURS_TIT_VI?>" placeholder="Tiêu đề tiếng Việt" required="required">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="en_title" id="en_title" value="<?php echo $row->TOURS_TIT_EN?>" placeholder="Tiêu đề tiếng Anh" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nội Dung Ngắn</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" rows="3" id="shrt_cnt_vi" name="shrt_cnt_vi" placeholder="Tiếng Việt" required="required"><?php echo $row->TOURS_SHRT_CNT_VI?></textarea>
                                </div>
                                <div class="col-md-4">
                                    <textarea class="form-control" rows="3" id="shrt_cnt_en" name="shrt_cnt_en" placeholder="Tiếng Anh" required="required"><?php echo $row->TOURS_SHRT_CNT_EN?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nội Dung Tiếng Việt</label>
                                <div class="col-md-8">
                                    <textarea class="summernote" name="content_vi" id="content_vi" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'><?php echo $row->TOURS_CNT_VI?></textarea>
<!--                                    <div class="summernote" id="vi_content" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'>Start typing...</div>-->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nội Dung Tiếng Anh</label>
                                <div class="col-md-8">
<!--                                    <div class="summernote_en" name="vi_content" id="vi_content" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'></div>-->
                                    <textarea class="summernote" name="content_en" id="content_en" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'><?php echo $row->TOURS_CNT_EN?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Hình Đại Diện</label>
                                <div class="col-md-6">
                                    <input type="hidden" name="rpv_img_old" id="rpv_img_old" value="<?php echo $row->TOURS_RPV_IMG_URL?>">
                                    <img src="<?php if(strlen($row->TOURS_RPV_IMG_URL)> 0){ echo base_url($row->TOURS_RPV_IMG_URL);}else{echo base_url('resources/images/no-image.jpg');}?>" width="270" height="160">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="fa fa-file fileupload-exists"></i>
                                                <span class="fileupload-preview"></span>
                                            </div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileupload-exists">Change</span>
                                                    <span class="fileupload-new">Select file</span>
                                                    <input type="file" name="rpv_img"/>
                                                </span>
                                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Số Ngày</label>
                                <div class="col-md-1">
                                    <input type="text" class="form-control" name="tour_length" id="tour_length" value="<?php echo $row->TOURS_LENGTH?>" placeholder="" required="required">
                                </div>
                                <label class="col-md-2 control-label">Phương Tiện:</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="trans_vi" id="trans_vi" value="<?php echo $row->TOURS_TRANSPORT_VI?>" placeholder="Phương tiện Vi" required="required">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="trans_en" id="trans_en" value="<?php echo $row->TOURS_TRANSPORT_EN?>" placeholder="Phương tiện En" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="priceCntVi">Nội Dung Giá Thành VI</label>
                                <div class="col-md-8">
                                    <textarea class="summernote" name="price_cnt_vi" id="price_cnt_vi" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'><?php echo $row->TOURS_PRICE_CNT_VI?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="priceCntEn">Nội Dung Giá Thành EN</label>
                                <div class="col-md-8">
                                    <textarea class="summernote" name="price_cnt_en" id="price_cnt_en" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'><?php echo $row->TOURS_PRICE_CNT_EN?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="note_vi">Lưu Ý VI</label>
                                <div class="col-md-8">
                                    <textarea class="summernote" name="note_vi" id="note_vi" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'><?php echo $row->TOURS_REMARK_VI?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="note_en">Lưu Ý EN</label>
                                <div class="col-md-8">
                                    <textarea class="summernote" name="note_en" id="note_en" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'><?php echo $row->TOURS_REMARK_EN?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Giá</label>
                                <div class="col-md-3">
                                    <div class="input-group mb-md">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" class="form-control" placeholder="Giá VND" id="price_vi" name="price_vi" value="<?php echo $row->TOURS_PRICE_VI?>" required="required">
                                        <span class="input-group-addon ">.00</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group mb-md">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" class="form-control" placeholder="Giá USD" id="price_en" name="price_en" value="<?php echo $row->TOURS_PRICE_EN?>" required="required">
                                        <span class="input-group-addon ">.00</span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group mb-md">
                                        <span class="input-group-addon">KM</span>
                                        <input type="text" class="form-control" id="discount" name="discount" value="<?php echo $row->DISCOUNT?>">
                                        <span class="input-group-addon btn-warning">%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Khởi Hành - Xuất Phát</label>
                                <div class="col-md-2">
                                    <select data-plugin-selectTwo class="form-control populate" name="str_dpt_national" id="str_dpt_national">
                                        <optgroup label="Quốc Gia">
                                            <option value="<?php echo $row->START_DEPARTURE_NATIONAL_ID?>"><?php echo $row->START_DEPARTURE_NATIONAL_NAME?></option>
                                            <?php if(isset($national)){
                                                foreach ($national as $nation) {
                                                    echo '<option value="'.$nation->NATIONAL_ID.'">'.$nation->NATIONAL_NAME.'</option>';
                                                }

                                            }
                                            ?>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select data-plugin-selectTwo class="form-control populate" name="str_dpt_province" id="str_dpt_province">
                                        <optgroup label="Tỉnh Thành">
                                            <option value="<?php echo $row->START_DEPARTURE_LOCATION?>"><?php echo $row->START_DEPARTURE_LOCATION_NM?></option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
                                        <input type="text" value="<?php echo $row->START_DEPARTURE_TIME?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "minuteStep": 15 }' id="str_dpt_time" name="str_dpt_time" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Khởi Hành - Đến</label>
                                <div class="col-md-2">
                                    <select data-plugin-selectTwo class="form-control populate" name="str_arv_national" id="str_arv_national">
                                        <optgroup label="Quốc Gia">
                                            <option value="<?php echo $row->START_ARRIVAL_NATIONAL_ID?>"><?php echo $row->START_ARRIVAL_NATIONAL_NAME?></option>
                                            <?php if(isset($national)){
                                                foreach ($national as $nation) {
                                                    echo '<option value="'.$nation->NATIONAL_ID.'">'.$nation->NATIONAL_NAME.'</option>';
                                                }

                                            }
                                            ?>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select data-plugin-selectTwo class="form-control populate" name="str_arv_province" id="str_arv_province">
                                        <optgroup label="Tỉnh Thành">
                                            <option value="<?php echo $row->START_ARRIVAL_LOCATION?>"><?php echo $row->START_ARRIVAL_LOCATION_NM?></option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
                                        <input type="text" value="<?php echo $row->START_ARRIVAL_TIME?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "minuteStep": 15 }' id="str_arv_time" name="str_arv_time" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Trở Về - Xuất Phát</label>
                                <div class="col-md-2">
                                    <select data-plugin-selectTwo class="form-control populate" name="end_dpt_national" id="end_dpt_national">
                                        <optgroup label="Quốc Gia">
                                            <option value="<?php echo $row->END_DEPARTURE_NATIONAL_ID?>"><?php echo $row->END_DEPARTURE_NATIONAL_NAME?></option>
                                            <?php if(isset($national)){
                                                foreach ($national as $nation) {
                                                    echo '<option value="'.$nation->NATIONAL_ID.'">'.$nation->NATIONAL_NAME.'</option>';
                                                }

                                            }
                                            ?>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select data-plugin-selectTwo class="form-control populate" name="end_dpt_province" id="end_dpt_province">
                                        <optgroup label="Tỉnh Thành">
                                            <option value="<?php echo $row->END_DEPARTURE_LOCATION?>"><?php echo $row->END_DEPARTURE_LOCATION_NM?></option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
                                        <input type="text" value="<?php echo $row->END_DEPARTURE_TIME?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "minuteStep": 15 }' id="end_dpt_time" name="end_dpt_time" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Trở Về - Đến</label>
                                <div class="col-md-2">
                                    <select data-plugin-selectTwo class="form-control populate" name="end_arv_national" id="end_arv_national">
                                        <optgroup label="Quốc Gia">
                                            <option value="<?php echo $row->END_ARRIVAL_NATIONAL_ID?>"><?php echo $row->END_ARRIVAL_NATIONAL_NAME?></option>
                                            <?php if(isset($national)){
                                                foreach ($national as $nation) {
                                                    echo '<option value="'.$nation->NATIONAL_ID.'">'.$nation->NATIONAL_NAME.'</option>';
                                                }

                                            }
                                            ?>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select data-plugin-selectTwo class="form-control populate" name="end_arv_province" id="end_arv_province">
                                        <optgroup label="Tỉnh Thành">
                                            <option value="<?php echo $row->END_ARRIVAL_LOCATION?>"><?php echo $row->END_ARRIVAL_LOCATION_NM?></option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
                                        <input type="text" value="<?php echo $row->END_ARRIVAL_TIME?>" data-plugin-timepicker class="form-control" data-plugin-options='{ "minuteStep": 15 }' id="end_arv_time" name="end_arv_time" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Google Map</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="x_place" id="x_place" value="<?php echo $row->MAP_PLACE_X?>" placeholder="Tọa độ X" required="required">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="y_place" id="y_place" value="<?php echo $row->MAP_PLACE_Y?>" placeholder="Tọa độ Y" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tags-input" class="col-md-3 control-label">Meta Title</label>
                                <div class="col-md-6">
                                    <input name="vi_meta_title" id="vi_meta_title" type="text" class="form-control"  value="<?php echo $row->META_TITLE_VI?>" placeholder="Meta Title Vi" required="required"/></br>
                                    <input name="en_meta_title" id="en_meta_title" type="text" class="form-control"  value="<?php echo $row->META_TITLE_EN?>" placeholder="Meta Title En" required="required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tags-input" class="col-md-3 control-label">Description</label>
                                <div class="col-md-6">
                                    <input name="vi_description" id="vi_description" class="form-control" value="<?php echo $row->DESCRIPTION_VI?>" placeholder="Description Vi" required="required"/></br>
                                    <input name="en_description" id="en_description" class="form-control" value="<?php echo $row->DESCRIPTION_EN?>" placeholder="Description En" required="required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tags-input" class="col-md-3 control-label">Từ Khóa VI</label>
                                <div class="col-md-6">
                                    <input name="vi_keywords" id="vi_keywords" data-role="tagsinput" data-tag-class="label label-primary" class="form-control" value="<?php echo $row->KEYWORDS_VI?>" placeholder="Key Words Vi" required="required"/>
                                    <input name="en_keywords" id="en_keywords" data-role="tagsinput" data-tag-class="label label-primary" class="form-control" value="<?php echo $row->KEYWORDS_EN?>" placeholder="Key Words En" required="required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-3 col-xs-11">
                                    <button class="btn btn-primary" type="button" onclick="history.go(-1);"> Trở Lại </button>
                                </div>
                                <div class="col-md-3 col-xs-11">
                                    <button class="btn btn-primary" type="submit"> Cập Nhật </button>
                                </div>
                            </div>
                        </div>
                        <?php }
                        }else{ ?>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12" align="center">
                                    <label for="tags-input" control-label">Missing Data</label>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <!-- end: page -->
</section>