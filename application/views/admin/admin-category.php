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
                        <a href="<?php echo base_url('Category/addCate')?>"> <button id="Add" class="btn btn-primary">Tạo Mới <i class="fa fa-plus"></i></button> </a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                <tr>
                    <th>Danh Mục</th>
                    <th>Mã Danh Mục</th>
                    <th>Nhóm Danh Mục</th>
                    <th>Cập Nhật</th>
                </tr>
                </thead>
                <tbody>
                <?php if(isset($cateList)) {
                    foreach ($cateList as $cate) { ?>
                        <tr class="gradeX">
                            <td><a href="<?php echo base_url('Category/editCate/'.$cate->CATEGORY_ID) ?>"><?php echo $cate->CATEGORY_NM_VI ?></a></td>
                            <td><?php echo $cate->CATEGORY_ID ?></td>
                            <td><?php echo $cate->GROUP_NAME ?></td>
                            <td class="actions">
                                <a href="<?php echo base_url('Category/editCate/' . $cate->CATEGORY_ID) ?>"><i class="fa fa-pencil" style="color:blue"></i></a>
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