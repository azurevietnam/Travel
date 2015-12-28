<?php
/**
 * Created by PhpStorm.
 * User: HAILONG_ICT
 * Date: 12/21/2015
 * Time: 10:01 AM
 */
?>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Quản Lý Tin Tức</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="<?php echo base_url('admin/index')?>">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Tin Tức</span></li>
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

                    <h2 class="panel-title">Tin Tức Edit</h2>
                </header>
                <div class="panel-body">
                    <?php if(isset($postData)){?>
                    <form class="form-horizontal form-bordered" id="postForm" action="<?php echo base_url('admin_News/updateNews')?>" method="post" onsubmit="return postForm()" enctype="multipart/form-data">
                        <?php foreach($postData as $row){?>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="col-md-6 control-label">
                                            <input type="hidden" id="news_id" name="news_id" value="<?php echo $row->NEWS_ID?>">
                                            <?php if($this->form_validation->run() == false){echo validation_errors();}?>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Danh Mục</label>
                                    <div class="col-md-6">
                                        <select data-plugin-selectTwo class="form-control populate" name="drb_category" id="drb_category" required="required">
                                            <optgroup label="Chọn Danh Mục">
                                                <?php if(isset($newsCate)){
                                                    foreach ($newsCate as $rowCate) {
                                                        echo '<option value="'.$rowCate->CATEGORY_ID.'"'.($row->CATEGORY_ID == $rowCate->CATEGORY_ID ? 'selected' : '').'>'.$rowCate->CATEGORY_NM_VI.'</option>';
                                                    }
                                                }
                                                ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tiêu Đề</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="vi_title" id="vi_title" value="<?php echo $row->NEWS_TITLE_VI ?>" placeholder="Tiêu đề tiếng Việt" required="required">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="en_title" id="en_title" value="<?php echo $row->NEWS_TITLE_EN ?>" placeholder="Tiêu đề tiếng Anh" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">  </label>
                                    <div class="col-md-3">
                                        <label control-label">Hiển Thị:</label>
                                        <select class="form-control" data-plugin-multiselect id="display_yn" name="display_yn">
                                            <optgroup label="Hiển Thị Bài Đăng">
                                                <option value="1" <?php echo ($row->STATUS == 1 ? 'selected' : '') ?> >Có</option>
                                                <option value="0" <?php echo ($row->STATUS == 0 ? 'selected' : '') ?> >Không</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nội Dung Ngắn</label>
                                    <div class="col-md-4">
                                        <textarea class="form-control" rows="3" id="shrt_cnt_vi" name="shrt_cnt_vi" placeholder="Tiếng Việt" required="required"><?php echo $row->NEWS_SHRT_CNT_VI ?></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <textarea class="form-control" rows="3" id="shrt_cnt_en" name="shrt_cnt_en" placeholder="Tiếng Anh" required="required"><?php echo $row->NEWS_SHRT_CNT_EN ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <textarea class="summernote" name="content_vi" id="content_vi" data-plugin-summernote data-plugin-options='{ "height": 300, "codemirror": { "theme": "ambiance" } }'><?php echo $row->NEWS_CONTENT_VI ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <textarea class="summernote" name="content_en" id="content_en" data-plugin-summernote data-plugin-options='{ "height": 300, "codemirror": { "theme": "ambiance" } }'><?php echo $row->NEWS_CONTENT_EN ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Hình Đại Diện</label>
                                    <div class="col-md-6">
                                        <input type="hidden" name="rpv_img_old" id="rpv_img_old" value="<?php echo $row->NEWS_RPV_IMG?>">
                                        <img src="<?php if(strlen($row->NEWS_RPV_IMG)> 0){ echo base_url($row->NEWS_RPV_IMG);}else{echo base_url('resources/images/no-image.jpg');}?>" width="270" height="160">
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
                                    <label for="tags-input" class="col-md-3 control-label">Meta Title</label>
                                    <div class="col-md-6">
                                        <input name="vi_meta_title" id="vi_meta_title" type="text" class="form-control"  value="<?php echo $row->META_TITLE_VI?>" placeholder="Meta Title Vi" required="required"/></br>
                                        <input name="en_meta_title" id="en_meta_title" type="text" class="form-control"  value="<?php echo $row->META_TITLE_EN?>" placeholder="Meta Title En" required="required"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tags-input" class="col-md-3 control-label">Description</label>
                                    <div class="col-md-6">
                                        <input name="vi_description" id="vi_description" class="form-control" value="<?php echo $row->META_DESC_VI?>" placeholder="Description Vi" required="required"/></br>
                                        <input name="en_description" id="en_description" class="form-control" value="<?php echo $row->META_DESC_EN?>" placeholder="Description En" required="required"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tags-input" class="col-md-3 control-label">Từ Khóa VI</label>
                                    <div class="col-md-6">
                                        <input name="vi_keywords" id="vi_keywords" data-role="tagsinput" data-tag-class="label label-primary" class="form-control" value="<?php echo $row->META_KEYWORD_VI?>" placeholder="Key Words Vi" required="required"/>
                                        <input name="en_keywords" id="en_keywords" data-role="tagsinput" data-tag-class="label label-primary" class="form-control" value="<?php echo $row->META_KEYWORD_EN?>" placeholder="Key Words En" required="required"/>
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
                        <?php }?>
                    </form>
                    <?php }else{?>
                    <form class="form-horizontal form-bordered" id="postForm" action="<?php echo base_url('admin_news/insertNews')?>" method="post" onsubmit="return postForm()" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Danh Mục</label>
                                <div class="col-md-6">
                                    <select data-plugin-selectTwo class="form-control populate" name="drb_category" id="drb_category" required="required">
                                        <optgroup label="Chọn Danh Mục">
                                            <?php if(isset($newsCate)){
                                                foreach ($newsCate as $row) {
                                                    echo '<option value="'.$row->CATEGORY_ID.'">'.$row->CATEGORY_NM_VI.'</option>';
                                                }
                                            }
                                            ?>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tiêu Đề</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="vi_title" id="vi_title" value="" placeholder="Tiêu đề tiếng Việt" required="required">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="en_title" id="en_title" value="" placeholder="Tiêu đề tiếng Anh" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nội Dung Ngắn</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" rows="3" id="shrt_cnt_vi" name="shrt_cnt_vi" placeholder="Tiếng Việt" required="required"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <textarea class="form-control" rows="3" id="shrt_cnt_en" name="shrt_cnt_en" placeholder="Tiếng Anh" required="required"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea class="summernote" name="content_vi" id="content_vi" data-plugin-summernote data-plugin-options='{ "height": 300, "codemirror": { "theme": "ambiance" } }'>Nội Dung Tiếng Việt...</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea class="summernote" name="content_en" id="content_en" data-plugin-summernote data-plugin-options='{ "height": 300, "codemirror": { "theme": "ambiance" } }'>Nội Dung Tiếng Anh...</textarea>
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
                                                    <input type="file" name="rpv_img"/>
                                                </span>
                                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tags-input" class="col-md-3 control-label">Meta Title</label>
                                <div class="col-md-6">
                                    <input name="vi_meta_title" id="vi_meta_title" type="text" class="form-control"  value="" placeholder="Meta Title Vi" required="required"/></br>
                                    <input name="en_meta_title" id="en_meta_title" type="text" class="form-control"  value="" placeholder="Meta Title En" required="required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tags-input" class="col-md-3 control-label">Description</label>
                                <div class="col-md-6">
                                    <input name="vi_description" id="vi_description" class="form-control" value="" placeholder="Description Vi" required="required"/></br>
                                    <input name="en_description" id="en_description" class="form-control" value="" placeholder="Description En" required="required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tags-input" class="col-md-3 control-label">Từ Khóa VI</label>
                                <div class="col-md-6">
                                    <input name="vi_keywords" id="vi_keywords" data-role="tagsinput" data-tag-class="label label-primary" class="form-control" value="" placeholder="Key Words Vi" required="required"/>
                                    <input name="en_keywords" id="en_keywords" data-role="tagsinput" data-tag-class="label label-primary" class="form-control" value="" placeholder="Key Words En" required="required"/>
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
                    </form>
                    <?php }?>
                </div>
            </section>
        </div>
    </div>
    <!-- end: page -->
</section>