<?php
/**
 * Created by PhpStorm.
 * User: POSCO_ICT_HAILONG
 * Date: 7/10/2015
 * Time: 1:46 PM
 */
$username = $this->session->userdata('username');
if(!$username)
{
    redirect(base_url('admin/signin'));
}
?>
<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <meta name="keywords" content="Vung Chua Travel" />
    <meta name="description" content="Vung Chua Travel - Admin Pages">
    <meta name="author" content="vungchuatravel.com">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>admin/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>admin/vendor/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>admin/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>admin/vendor/bootstrap-datepicker/css/datepicker3.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>admin/stylesheets/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>admin/stylesheets/skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>admin/stylesheets/theme-custom.css">

    <!-- Head Libs -->
    <script src="<?php echo base_url()?>admin/vendor/modernizr/modernizr.js"></script>

</head>
<body>
<!-- start: page -->
<section class="body-sign">
    <div class="center-sign">
        <a href="/" class="logo pull-left">
            <img src="<?php echo base_url()?>admin/images/logo.png" height="54" alt="Porto Admin" />
        </a>

        <div class="panel panel-sign">
            <div class="panel-title-sign mt-xl text-right">
                <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Đăng Ký</h2>
            </div>
            <div class="panel-body">
                <div class="validation-message">
                    <ul></ul>
                </div>
                <form  action="<?php echo base_url()?>admin/adminRegister" method="post">
                    <span class="required"><?php echo form_error('username')?></span>
                    <span class="required"><?php echo form_error('email')?></span>
                    <span class="required"><?php echo form_error('password')?></span>
                    <span class="required"><?php echo form_error('pwd_confirm')?></span>
                    <span class="required"><?php if(isset($existUser)){echo $existUser;}?></span>
                    <div class="form-group mb-lg">
                        <label>Tên đăng nhập</label><span class="required">*</span>
                        <input name="username" type="text" class="form-control input-lg" title="Hãy nhập username." placeholder="eg.: hailong" value="<?php echo set_value('username')?>" required/>
                    </div>

                    <div class="form-group mb-lg">
                        <label>Địa chỉ E-mail</label><span class="required">*</span>
                        <input name="email" type="email" class="form-control input-lg" title="Hãy nhập địa chỉ email." placeholder="eg.: hailong@abc.com" required/>
                    </div>

                    <div class="form-group mb-none">
                        <div class="row">
                            <div class="col-sm-6 mb-lg">
                                <label>Mật khẩu</label><span class="required">*</span>
                                <input name="password" type="password" class="form-control input-lg" required/>
                            </div>
                            <div class="col-sm-6 mb-lg">
                                <label>Xác nhận mật khẩu</label><span class="required">*</span>
                                <input name="pwd_confirm" type="password" class="form-control input-lg" required/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="checkbox-custom checkbox-default">
                                <input id="AgreeTerms" name="agreeterms" type="checkbox" required="checked"/>
                                <label for="AgreeTerms">Tôi đồng ý với <a href="#">Các điều khoản sử dụng</a></label>
                            </div>
                        </div>
                        <div class="col-sm-4 text-right">
                            <button type="submit" class="btn btn-primary hidden-xs">Đăng Ký</button>
                            <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Đăng Ký</button>
                        </div>
                    </div>

							<span class="mt-lg mb-lg line-thru text-center text-uppercase">
								<span>Hoặc</span>
							</span>

                    <div class="mb-xs text-center">
                        <a class="btn btn-facebook mb-md ml-xs mr-xs">Kết nối <i class="fa fa-facebook"></i></a>
                        <a class="btn btn-twitter mb-md ml-xs mr-xs">Kết nối <i class="fa fa-twitter"></i></a>
                    </div>

                    <p class="text-center">Đã có tài khoản? <a href="<?php echo base_url()?>admin/signin">Đăng Nhập!</a>

                </form>
            </div>
        </div>

        <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2014. All Rights Reserved.</p>
    </div>
</section>
<!-- end: page -->

<!-- Vendor -->
<script src="<?php echo base_url()?>admin/vendor/jquery/jquery.js"></script>
<script src="<?php echo base_url()?>admin/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="<?php echo base_url()?>admin/vendor/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url()?>admin/vendor/nanoscroller/nanoscroller.js"></script>
<script src="<?php echo base_url()?>admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url()?>admin/vendor/magnific-popup/magnific-popup.js"></script>
<script src="<?php echo base_url()?>admin/vendor/jquery-placeholder/jquery.placeholder.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="<?php echo base_url()?>admin/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="<?php echo base_url()?>admin/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="<?php echo base_url()?>admin/javascripts/theme.init.js"></script>

</body>
</html>