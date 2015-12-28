<?php
/**
 * Created by PhpStorm.
 * User: HAILONG_ICT
 * Date: 12/18/2015
 * Time: 10:55 AM
 */
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
            <div class="form-group">
                <div class="col-md-6">
                    <select required data-plugin-selectTwo class="form-control populate" name="drb_newCate" id="drb_newCate">
                        <optgroup label="Chọn Quốc Gia">
                            <option value="">--- Chọn Danh Mục ---</option>
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
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>
            </div>
        </header>
        <div class="panel-body" id="newsListCnt">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-md">
                        <a href="<?php echo base_url('admin_news/newsEdit')?>"> <button id="Add" class="btn btn-primary">Tạo Mới <i class="fa fa-plus"></i></button> </a>
                    </div>
                </div>
            </div>
            <div id="newsListCnt1" name="newsListCnt1">
            </div>
        </div>
    </section>
    <!-- end: page -->
</section>