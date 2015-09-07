<section role="main" class="content-body">
    <header class="page-header">
        <h2>Quản Lý Bài Viết</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="<?php base_url('index/admin')?>">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Tours</span></li>
                <li><span>Bài Viết</span></li>
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

            <h2 class="panel-title">Tours</h2>
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-md">
                        <a href="<?php echo base_url('admin_tours/addTour')?>"> <button id="Add" class="btn btn-primary">Tạo Mới <i class="fa fa-plus"></i></button> </a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                <tr>
                    <th>Tên Tour</th>
                    <th>Danh Mục</th>
                    <th>Hot Tour</th>
                    <th>Kích Hoạt</th>
                    <th>Tùy Chọn</th>
                </tr>
                </thead>
                <tbody>
                <?php if(isset($alltour)) {
                    foreach ($alltour as $tour) { ?>
                        <tr class="gradeX">
                            <td><a href="<?php echo base_url('admin_tours/editTour/'.$tour->TOURS_ID) ?>"><?php echo $tour->TOURS_TIT_VI ?></a></td>
                            <td><?php echo $tour->CATE_NAME ?></td>
                            <td>
                                <div class="form-group" align="center">
                                    <div class="switch switch-sm switch-danger">
                                        <input type="checkbox" name="switch" data-plugin-ios-switch " <?php echo($tour->RPV_YN == "Y" ? "checked" : '') ?>/>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group" align="center">
                                    <div class="switch switch-sm switch-primary">
                                        <input type="checkbox" name="switch" data-plugin-ios-switch " <?php echo($tour->DISPLAY_YN == "Y" ? "checked" : '')?>/>
                                    </div>
                                </div>
                            </td>
                            <td class="actions">
                                <a href="<?php echo base_url('admin_tours/images/' . $tour->TOURS_ID)?>"><i class="fa fa-file-photo-o"<?php echo($tour->IMG_CNT <= 0 ? 'style="color:red"' : 'style="color:blue"')?>></i></a>
                                <a href="<?php echo base_url('admin_tours/schedule/' . $tour->TOURS_ID) ?>"><i class="fa fa-list-alt" <?php echo($tour->SCHEDULE_CNT <= 0 ? 'style="color:red"' : 'style="color:blue"')?>></i></a>
                                <a href="<?php echo base_url('admin_tours/editTour/' . $tour->TOURS_ID) ?>"><i class="fa fa-pencil"></i></a>
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