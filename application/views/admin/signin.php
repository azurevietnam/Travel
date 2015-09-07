<?php
/**
 * Created by PhpStorm.
 * User: POSCO_ICT_HAILONG
 * Date: 7/10/2015
 * Time: 11:45 AM
 */?>
<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

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
                <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Đăng Nhập</h2>
            </div>
            <div class="panel-body">
                <form action="<?php echo base_url()?>admin/login" method="post">
                    <span class="required"><?php if(isset($error_msg)){echo $error_msg;}?></span>
                    <div class="form-group mb-lg">
                        <label>Tên đăng nhập</label>
                        <div class="input-group input-group-icon">
                            <input name="username" type="text" class="form-control input-lg" required/>
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
                        </div>
                    </div>
                    <div class="form-group mb-lg">
                        <div class="clearfix">
                            <label class="pull-left">Mật Khẩu</label>
                            <a href="pages-recover-password.html" class="pull-right">Quên mật khẩu?</a>
                        </div>
                        <div class="input-group input-group-icon">
                            <input name="password" type="password" class="form-control input-lg" required/>
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="checkbox-custom checkbox-default">
                                <input id="RememberMe" name="rememberme" type="checkbox"/>
                                <label for="RememberMe">Nhớ tài khoản</label>
                            </div>
                        </div>
                        <div class="col-sm-4 text-right">
                            <button type="submit" class="btn btn-primary hidden-xs">Đăng Nhập</button>
                            <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Đăng Nhập</button>
                        </div>
                    </div>

							<span class="mt-lg mb-lg line-thru text-center text-uppercase">
								<span>or</span>
							</span>

                    <div class="mb-xs text-center">
                        <a class="btn btn-facebook mb-md ml-xs mr-xs">Kết nối <i class="fa fa-facebook"></i></a>
                        <a class="btn btn-twitter mb-md ml-xs mr-xs">Kết nối <i class="fa fa-twitter"></i></a>
                    </div>

                    <p class="text-center">Bạn chưa có tài khoản? <a href="<?php echo base_url()?>admin/signup">Đăng Ký!</a>

                </form>
            </div>
        </div>

        <p class="text-center text-muted mt-md mb-md">&copy; Copyright 20154. All Rights Reserved.</p>
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