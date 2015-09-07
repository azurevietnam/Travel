<?php
/**
 * Created by PhpStorm.
 * User: HaiLong
 * Date: 4/14/2015
 * Time: 9:56 PM
 */

$user_language = $this->session->userdata('language');
if(strlen($this->session->userdata('language'))<1){
    $user_language = $this->session->userdata('language');
    $this->lang->load('vietnam', $user_language);
}else{
    $user_language = $this->session->userdata('language');
    $this->lang->load($user_language, $user_language);
}

if(isset($metaData)){
    foreach($metaData as $metaRow){
        $metaTitle = $metaRow->META_TITLE;
        $metaDesc = $metaRow->DESCRIPTION;
        $metaKey = $metaRow->KEYWORDS;
    }
}

?>
<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html xmlns="http://www.w3.org/1999/html"> <!--<![endif]-->
<head>
    <!-- Page Title -->
    <title><?php echo (isset($metaTitle)) ? $metaTitle : $this->lang->line('title');?></title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="keywords" content="<?php echo (isset($metaKey)) ? $metaKey : $this->lang->line('keyword');?>" />
    <meta name="description" content="<?php echo (isset($metaDesc)) ? $metaDesc : $this->lang->line('description');?>"/>
    <meta name="author" content="Hai Long">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Theme Styles -->
    <link rel="icon" type="image/png" href="<?php echo base_url()?>resources/images/vc-icon.png" />
    <link rel="shortcut icon" href="<?php echo base_url()?>resources/images/favicon.ico" />

    <link rel="stylesheet" href="<?php echo base_url()?>resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>resources/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,800|Shadows+Into+Light' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url()?>resources/css/animate.min.css">

    <!-- Current Page Styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>resources/components/revolution_slider/css/settings.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>resources/components/revolution_slider/css/style.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>resources/components/jquery.bxslider/jquery.bxslider.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>resources/components/flexslider/flexslider.css" media="screen" />

    <!-- Main Style -->
    <link id="main-style" rel="stylesheet" href="<?php echo base_url()?>resources/css/style.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="<?php echo base_url()?>resources/css/custom.css">

    <!-- Updated Styles -->
    <link rel="stylesheet" href="<?php echo base_url()?>resources/css/updates.css">

    <!-- Updated Styles -->
    <link rel="stylesheet" href="<?php echo base_url()?>resources/css/updates.css">

    <!-- Responsive Styles -->
    <link rel="stylesheet" href="<?php echo base_url()?>resources/css/responsive.css">

    <!-- CSS for IE -->
    <!--[if lte IE 9]>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>resources/css/ie.css" />
    <![endif]-->


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->

    <!-- Javascript Page Loader -->
    <script type="text/javascript" src="<?php echo base_url()?>resources/js/pace.min.js" data-pace-options='{ "ajax": false }'></script>
    <script type="text/javascript" src="<?php echo base_url()?>resources/js/page-loading.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

    <!-- jQuery REVOLUTION Slider -->
    <script type="text/javascript" src="<?php echo base_url()?>resources/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>resources/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript">
        function setLang(lang){
            window.location.href = "<?php echo base_url()?>PagesConfig/setLang/"+lang;
        }
    </script>
    <!-- REVOLUTION BANNER CSS SETTINGS -->
<!--    <link rel="stylesheet" type="text/css" href="--><?php //echo base_url()?><!--resources/css/revolution_slider/jssettings.css" media="screen" />-->
</head>

<body>
<div id="page-wrapper">
    <header id="header" class="navbar-static-top">
        <div class="topnav hidden-xs">
            <div class="container" id="setlang">
                <ul class="quick-menu pull-left">
                    <li><a href="#"><?php echo $this->lang->line('account'); ?></a></li>
                    <li class="ribbon">
                        <?php if ($user_language === 'english') {?>
                        <a href="#" class="lang-flag en-us">EN</a>
                        <ul class="menu mini">
                            <li class="active"><a href="#" id="aenlag" onclick="return setLang('en')" title="English" class="lang-flag en-us">English (US)</a></li>
                            <li class="active"><a href="#" id="avilang" onclick="return setLang('vi')" title="Việt Nam" class="lang-flag vi-vn">Việt Nam (VN)</a></li>
                        </ul>
                        <?php }else  {?>
                        <a href="#" class="lang-flag vi-vn">VI</a>
                        <ul class="menu mini">
                            <li class="active"><a href="#" id="avilang" onclick="return setLang('vi')" title="Việt Nam" class="lang-flag vi-vn">Việt Nam (VN)</a></li>
                            <li class="active"><a href="#" id="aenlag" onclick="return setLang('en')" title="English" class="lang-flag en-us">English (US)</a></li>
                        </ul>
                        <?php } ?>
                    </li>
                </ul>
                <ul class="quick-menu pull-right">
                    <li><a href="#travelo-login" class="soap-popupbox"><?php echo $this->lang->line('login'); ?></a></li>
                    <li><a href="#travelo-signup" class="soap-popupbox"><?php echo $this->lang->line('singup'); ?></a></li>
                    <li class="ribbon currency">
                        <a href="#" title="">USD</a>
                        <ul class="menu mini">
                            <li><a href="#" title="AUD">AUD</a></li>
                            <li><a href="#" title="BRL">BRL</a></li>
                            <li class="active"><a href="#" title="USD">USD</a></li>
                            <li><a href="#" title="CAD">CAD</a></li>
                            <li><a href="#" title="CHF">CHF</a></li>
                            <li><a href="#" title="CNY">CNY</a></li>
                            <li><a href="#" title="CZK">CZK</a></li>
                            <li><a href="#" title="DKK">DKK</a></li>
                            <li><a href="#" title="EUR">EUR</a></li>
                            <li><a href="#" title="GBP">GBP</a></li>
                            <li><a href="#" title="HKD">HKD</a></li>
                            <li><a href="#" title="HUF">HUF</a></li>
                            <li><a href="#" title="IDR">IDR</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-header">

            <a href="#mobile-menu-01" data-toggle="collapse" class="mobile-menu-toggle">
                Mobile Menu Toggle
            </a>

            <div class="container">
                <h1 class="logo navbar-brand">
                    <a href="<?php echo base_url()?>" title="<?php echo (isset($metaTitle)) ? $metaTitle : $this->lang->line('title');?>">
                        <img src="<?php echo base_url()?>resources/images/logo.png" alt="<?php echo (isset($metaDesc)) ? $metaDesc : $this->lang->line('description');?>" />
                    </a>
                </h1>

                <nav id="main-menu" role="navigation">
                    <ul class="menu">
                        <li class="menu-item-has-children">
                            <a href="#"><?php echo $this->lang->line('aboutus'); ?></a>
                            <ul>
                                <li><a href="#"><?php echo $this->lang->line('ourcompany'); ?></a></li>
                                <li><a href="#"><?php echo $this->lang->line('openletter'); ?></a></li>
                                <li><a href="#"><?php echo $this->lang->line('vision'); ?></a></li>
                                <li><a href="#"><?php echo $this->lang->line('vungchua-daoyen'); ?></a></li>
                                <li><a href="#"><?php echo $this->lang->line('vonguyengiap-cate'); ?></a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="<?php echo base_url()?>tours/tours_list/all"><?php echo $this->lang->line('tours'); ?></a>
                            <ul>
                                <li><a href="#"><?php echo $this->lang->line('toquangbinh'); ?></a></li>
                                <li><a href="#"><?php echo $this->lang->line('fromquangbinh'); ?></a></li>
                                <li><a href="#"><?php echo $this->lang->line('dailytour'); ?></a></li>
                                <li><a href="#"><?php echo $this->lang->line('requesttour'); ?></a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#"><?php echo $this->lang->line('service'); ?></a>
                            <ul>
                                <li><a href="#"><?php echo $this->lang->line('roomorder'); ?></a></li>
                                <li><a href="#"><?php echo $this->lang->line('airplaneticket'); ?></a></li>
                                <li><a href="#"><?php echo $this->lang->line('busTicket'); ?></a></li>
                                <li><a href="#"><?php echo $this->lang->line('carForRent'); ?></a></li>
                                <li><a href="#"><?php echo $this->lang->line('visa'); ?></a></li>
                                <li><a href="#"><?php echo $this->lang->line('pickUpAriport'); ?></a></li>
                                <li><a href="#"><?php echo $this->lang->line('org-event'); ?></a></li>
                                <li><a href="#"><?php echo $this->lang->line('translator'); ?></a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="<?php echo base_url()?>hotels/hotels_list/all"><?php echo $this->lang->line('hotels'); ?></a>
                            <ul>
                                <li class="menu-item-has-children"><a href="#"><?php echo $this->lang->line('hotelsQB'); ?></a>
                                    <ul>
                                        <li><a href="#"><?php echo $this->lang->line('homestay'); ?></a></li>
                                        <li><a href="#"><?php echo $this->lang->line('1star'); ?></a></li>
                                        <li><a href="#"><?php echo $this->lang->line('2star'); ?></a></li>
                                        <li><a href="#"><?php echo $this->lang->line('3star'); ?></a></li>
                                        <li><a href="#"><?php echo $this->lang->line('4star'); ?></a></li>
                                        <li><a href="#"><?php echo $this->lang->line('5star'); ?></a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#"><?php echo $this->lang->line('htOutQb'); ?></a>
                                    <ul>
                                        <li><a href="#"><?php echo $this->lang->line('hanoi'); ?></a></li>
                                        <li><a href="#"><?php echo $this->lang->line('sapa'); ?></a></li>
                                        <li><a href="#"><?php echo $this->lang->line('hue'); ?></a></li>
                                        <li><a href="#"><?php echo $this->lang->line('danang'); ?></a></li>
                                        <li><a href="#"><?php echo $this->lang->line('nhatrang'); ?></a></li>
                                        <li><a href="#"><?php echo $this->lang->line('hochiminh'); ?></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#"><?php echo $this->lang->line('restaurant'); ?></a>
                            <ul>
                                <li><a href="#"><?php echo $this->lang->line('rtrQB'); ?></a></li>
                                <li><a href="#"><?php echo $this->lang->line('rtrOutQB'); ?></a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#"><?php echo $this->lang->line('guide'); ?></a>
                            <ul>
                                <li><a href="#"><?php echo $this->lang->line('necLoc'); ?></a></li>
                                <li><a href="#"><?php echo $this->lang->line('shopping'); ?></a></li>
                                <li><a href="#"><?php echo $this->lang->line('cafe'); ?></a></li>
                                <li><a href="#"><?php echo $this->lang->line('food'); ?></a></li>
                                <li><a href="#"><?php echo $this->lang->line('spa'); ?></a></li>
                                <li><a href="#"><?php echo $this->lang->line('medical'); ?></a></li>
                                <li><a href="#"><?php echo $this->lang->line('necPhone'); ?></a></li>
                                <li><a href="#"><?php echo $this->lang->line('tvlExp'); ?></a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children megamenu-menu">
                            <a href="#"><?php echo $this->lang->line('contact'); ?></a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#"><?php echo $this->lang->line('payment'); ?></a>
                        </li>
                    </ul>
                </nav>
            </div>

            <nav id="mobile-menu-01" class="mobile-menu collapse">
                <ul id="mobile-primary-menu" class="menu">
                    <li class="menu-item-has-children">
                        <a href="<?php echo base_url()?>"><?php echo $this->lang->line('home'); ?></a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#"><?php echo $this->lang->line('hotels'); ?></a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#"><?php echo $this->lang->line('flights'); ?></a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#"><?php echo $this->lang->line('cars'); ?></a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#"><?php echo $this->lang->line('tours'); ?></a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Pages</a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Shortcodes</a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Bonus</a>
                    </li>
                </ul>

                <ul class="mobile-topnav container">
                    <li><a href="#">MY ACCOUNT</a></li>
                    <li class="ribbon language menu-color-skin">
                        <a href="#" data-toggle="collapse">ENGLISH</a>
                        <ul class="menu mini">
                            <li><a href="#" title="Dansk">Dansk</a></li>
                            <li><a href="#" title="Deutsch">Deutsch</a></li>
                            <li class="active"><a href="#" title="English">English</a></li>
                            <li><a href="#" title="Español">Español</a></li>
                            <li><a href="#" title="Français">Français</a></li>
                            <li><a href="#" title="Italiano">Italiano</a></li>
                            <li><a href="#" title="Magyar">Magyar</a></li>
                            <li><a href="#" title="Nederlands">Nederlands</a></li>
                            <li><a href="#" title="Norsk">Norsk</a></li>
                            <li><a href="#" title="Polski">Polski</a></li>
                            <li><a href="#" title="Português">Português</a></li>
                            <li><a href="#" title="Suomi">Suomi</a></li>
                            <li><a href="#" title="Svenska">Svenska</a></li>
                        </ul>
                    </li>
                    <li><a href="#travelo-login" class="soap-popupbox">LOGIN</a></li>
                    <li><a href="#travelo-signup" class="soap-popupbox">SIGNUP</a></li>
                    <li class="ribbon currency menu-color-skin">
                        <a href="#">USD</a>
                        <ul class="menu mini">
                            <li><a href="#" title="AUD">AUD</a></li>
                            <li><a href="#" title="BRL">BRL</a></li>
                            <li class="active"><a href="#" title="USD">USD</a></li>
                            <li><a href="#" title="CAD">CAD</a></li>
                            <li><a href="#" title="CHF">CHF</a></li>
                            <li><a href="#" title="CNY">CNY</a></li>
                            <li><a href="#" title="CZK">CZK</a></li>
                            <li><a href="#" title="DKK">DKK</a></li>
                            <li><a href="#" title="EUR">EUR</a></li>
                            <li><a href="#" title="GBP">GBP</a></li>
                            <li><a href="#" title="HKD">HKD</a></li>
                            <li><a href="#" title="HUF">HUF</a></li>
                            <li><a href="#" title="IDR">IDR</a></li>
                        </ul>
                    </li>
                </ul>

            </nav>
        </div>
        <div id="travelo-signup" class="travelo-signup-box travelo-box">
            <div class="login-social">
                <a href="#" class="button login-facebook"><i class="soap-icon-facebook"></i><?php echo $this->lang->line('loginfacebook'); ?></a>
                <a href="#" class="button login-googleplus"><i class="soap-icon-googleplus"></i><?php echo $this->lang->line('logingoogle'); ?></a>
            </div>
            <div class="seperator"><label><?php echo $this->lang->line('or'); ?></label></div>
            <div class="simple-signup">
                <div class="text-center signup-email-section">
                    <a href="#" class="signup-email"><i class="soap-icon-letter"></i><?php echo $this->lang->line('signupwemail'); ?></a>
                </div>
                <p class="description"><?php echo $this->lang->line('signuptern'); ?></p>
            </div>
            <div class="email-signup">
                <form>
                    <div class="form-group">
                        <input type="text" class="input-text full-width" placeholder="first name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="input-text full-width" placeholder="last name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="input-text full-width" placeholder="email address">
                    </div>
                    <div class="form-group">
                        <input type="password" class="input-text full-width" placeholder="password">
                    </div>
                    <div class="form-group">
                        <input type="password" class="input-text full-width" placeholder="confirm password">
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"><?php echo $this->lang->line('tellmeaboutvct'); ?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="description"><?php echo $this->lang->line('signuptern'); ?></p>
                    </div>
                    <button type="submit" class="full-width btn-medium"><?php echo $this->lang->line('singup'); ?></button>
                </form>
            </div>
            <div class="seperator"></div>
            <p><?php echo $this->lang->line('askmember'); ?><a href="#travelo-login" class="goto-login soap-popupbox"><?php echo $this->lang->line('login'); ?></a></p>
        </div>
        <div id="travelo-login" class="travelo-login-box travelo-box">
            <div class="login-social">
                <a href="#" class="button login-facebook"><i class="soap-icon-facebook"></i><?php echo $this->lang->line('loginfacebook'); ?></a>
                <a href="#" class="button login-googleplus"><i class="soap-icon-googleplus"></i><?php echo $this->lang->line('logingoogle'); ?></a>
            </div>
            <div class="seperator"><label><?php echo $this->lang->line('or'); ?></label></div>
            <form>
                <div class="form-group">
                    <input type="text" class="input-text full-width" placeholder="email address">
                </div>
                <div class="form-group">
                    <input type="password" class="input-text full-width" placeholder="password">
                </div>
                <div class="form-group">
                    <a href="#" class="forgot-password pull-right"><?php echo $this->lang->line('forgotpass'); ?></a>
                    <div class="checkbox checkbox-inline">
                        <label>
                            <input type="checkbox"> <?php echo $this->lang->line('rememberme'); ?>
                        </label>
                    </div>
                </div>
                <button type="submit" class="full-width btn-medium"><?php echo $this->lang->line('login'); ?></button>
            </form>
            <div class="seperator"></div>
            <p><?php echo $this->lang->line('donthaveacc'); ?><a href="#travelo-signup" class="goto-signup soap-popupbox"><?php echo $this->lang->line('singup'); ?></a></p>
        </div>
    </header>

    <div id="slideshow">
        <div class="fullwidthbanner-container">
            <div class="revolution-slider" style="height: 0; overflow: hidden;">
                <ul>    <!-- SLIDE  -->
                    <!-- Slide1 -->
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="1500">
                        <!-- MAIN IMAGE -->
                        <img src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide1/bg.jpg" alt="">
                        <!-- LAYERS -->

                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption lfb fadeout"
                             data-x="center" data-hoffset="0"
                             data-y="bottom" data-voffset="0"
                             data-speed="300" data-endspeed="300"
                             data-start="400"
                             data-easing="Power3.easeInOut"
                             style="z-index: 1">
                            <img alt="" src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide1/stage.png">
                        </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption tp-fade fadeout"
                             data-x="center" data-hoffset="0"
                             data-y="bottom" data-voffset="0"
                             data-speed="300" data-endspeed="300"
                             data-start="800"
                             data-easing="Power3.easeInOut"
                             style="z-index: 2;">
                            <img alt="" src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide1/tree.png">
                        </div>

                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption lfl str" data-x="756" data-y="500" data-speed="1500" data-start="1100" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1500" style="z-index: 3;">
                            <img src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide1/shadow.png" alt="">
                        </div>

                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption sfr stl" data-x="801" data-y="319" data-speed="1500" data-start="1400" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1500" style="z-index: 4;">
                            <img src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide1/brifcase.png" alt="">
                        </div>

                        <!-- LAYER NR. 5 -->
                        <div class="tp-caption sfr skewtoleft" data-x="718" data-y="357" data-speed="1500" data-start="1700" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1500" style="z-index: 5;">
                            <img src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide1/plate.png" alt="">
                        </div>

                        <!-- LAYER NR. 6 -->
                        <div class="tp-caption sfr stb" data-x="798" data-y="450" data-speed="1500" data-start="2000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1500" style="z-index: 6;">
                            <img src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide1/watch.png" alt="">
                        </div>

                        <!-- LAYER NR. 7 -->
                        <div class="tp-caption sfr stl " data-x="773" data-y="315" data-speed="1500" data-start="2300" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 7;"><img src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide1/cap.png" alt="">
                        </div>

                        <!-- LAYER NR. 8 -->
                        <div class="tp-caption customin fadeout"
                             data-x="center" data-hoffset="320"
                             data-y="160"
                             data-customin="x:1000;y:360;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="1000" data-endspeed="600"
                             data-start="3000"
                             data-easing="easeOutQuad"
                             style="z-index: 8;">
                            <img alt="" src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide1/plane.png">
                        </div>

                        <!-- LAYER NR. 9 -->
                        <div class="tp-caption sft tp-resizeme"
                             data-x="250"
                             data-y="center" data-voffset="40"
                             data-speed="600" data-endspeed="600"
                             data-start="3600"
                             data-easing="easeOutQuad"
                             style="z-index: 9;">
                            <p class="caption-small-title"><?php echo $this->lang->line('welcome'); ?></p>
                            <p class="caption-medium-title"><?php echo $this->lang->line('welcome1title'); ?></p>
                        </div>

                        <!-- LAYER NR. 10 -->
                        <div class="tp-caption largewhitebg_button1 lfl stl" data-x="310" data-y="395" data-speed="1500" data-start="3200" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1500" data-linktoslide="1" style="z-index: 10;">
                            <a href="#"><?php echo $this->lang->line('bytour'); ?></a>
                        </div>

                        <!-- LAYER NR. 10 -->
                        <div class="tp-caption largewhitebg_button1 lfr str tp-resizeme" data-x="444" data-y="395" data-speed="1500" data-start="3500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1500" data-linktoslide="1" style="z-index: 11;">
                            <a href="#"><?php echo $this->lang->line('moreinfo'); ?></a>
                        </div>
                    </li>

                    <!-- Slide2 -->
                    <li data-transition="zoomout" data-slotamount="7" data-masterspeed="1500">
                        <!-- MAIN IMAGE -->
                        <img src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide2/bg.jpg" alt="">
                        <!-- LAYERS -->

                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption lfl str start" data-x="576" data-y="260" data-speed="1500" data-start="500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1500" style="z-index: 2;"><img style="width: 650px; height: 385px;" src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide2/quangbinhquan.png" alt="">
                        </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption lfr stl start" data-x="27" data-y="359" data-speed="1500" data-start="800" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1500" style="z-index: 3;"><img style="width: 267px; height: 187px;" src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide2/island.png" alt="">
                        </div>

                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption lfb stt start" data-x="266" data-y="479" data-speed="1500" data-start="1100" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 4;"><img style="width: 25px; height: 34px;" src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide2/ballon.png" alt="">
                        </div>


                        <!-- LAYER NR. 5 -->
                        <div class="tp-caption large_bold_white_med_2 lfb str tp-resizeme start" data-x="25" data-y="181" data-speed="1500" data-start="1700" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 6;">
                            <p class="caption-big-title"><?php echo $this->lang->line('lets'); ?><strong><i><?php echo $this->lang->line('discover'); ?></i></strong><?php echo $this->lang->line('twtogether'); ?></p>
                        </div>

                        <!-- LAYER NR. 6 -->
                        <div class="tp-caption lft stl start" data-x="22" data-y="230" data-speed="1500" data-start="2000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1500" style="z-index: 7;"><img style="width: 43px; height: 32px;" src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide2/pleane.png" alt="">
                        </div>

                        <!-- LAYER NR. 7 -->
                        <div class="tp-caption sfl stl start" data-x="23" data-y="273" data-speed="1500" data-start="2300" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1300" style="z-index: 8;"><img style="width: 43px; height: 32px;" src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide2/buil.png" alt="">
                        </div>

                        <!-- LAYER NR. 8 -->
                        <div class="tp-caption sfl stt start" data-x="18" data-y="317" data-speed="1500" data-start="2600" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1500" style="z-index: 9;"><img style="width: 43px; height: 32px;" src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide2/watch.png" alt="">
                        </div>

                        <!-- LAYER NR. 9 -->
                        <div class="tp-caption sfl stl start" data-x="18" data-y="354" data-speed="1500" data-start="2900" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1500" style="z-index: 10;"><img style="width: 43px; height: 31px;" src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide2/man.png" alt="">
                        </div>

                        <!-- LAYER NR. 10 -->
                        <div class="tp-caption large_bold_white_med lft str tp-resizeme start" data-x="72" data-y="230" data-speed="1500" data-start="3200" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 11;">
                            <span class="caption-medium-title"><?php echo $this->lang->line('over'); ?><strong> 500 </strong><?php echo $this->lang->line('airlines'); ?></span>
                        </div>

                        <!-- LAYER NR. 11 -->
                        <div class="tp-caption large_bold_white_med lft stl tp-resizeme start" data-x="73" data-y="274" data-speed="1500" data-start="3500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 12;">
                            <span class="caption-medium-title"><?php echo $this->lang->line('morethan'); ?><strong>13,000</strong><?php echo $this->lang->line('places'); ?></span>
                        </div>

                        <!-- LAYER NR. 12 -->
                        <div class="tp-caption large_bold_white_med lft stt tp-resizeme start" data-x="73" data-y="318" data-speed="1500" data-start="3800" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 13;">
                            <span class="caption-medium-title"><?php echo $this->lang->line('bstPrcWrt'); ?></span>
                        </div>

                        <!-- LAYER NR. 13 -->
                        <div class="tp-caption large_bold_white_med lft stl tp-resizeme start" data-x="75" data-y="357" data-speed="1500" data-start="4100" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 14;">
                            <span class="caption-medium-title"><?php echo $this->lang->line('custCare'); ?></span>
                        </div>

                        <!-- LAYER NR. 14 -->
                        <div class="tp-caption tp-resizeme start hasclicklistener" data-x="29" data-y="410" data-speed="1500" data-start="4400" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1300" data-linktoslide="1" style="z-index: 15; ">
                            <a class="link link-home-slider-blue" href="#"><?php echo $this->lang->line('findOutMore'); ?></a>
                        </div>
                    </li>

                    <!-- Slide3 -->
                    <li data-transition="slidedown" data-slotamount="7" data-masterspeed="1500">
                        <!-- MAIN IMAGE -->
                        <img src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide3/bg.jpg" alt="">
                        <!-- LAYERS -->

                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption lfr start"
                             data-x="right" data-hoffset="10"
                             data-y="center" data-voffset="0"
                             data-speed="400"
                             data-start="1000"
                             data-easing="Power3.easeInOut"
                             style="z-index: 2;">
                            <img alt="" src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide3/cloud.png">
                        </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption customin fadeout start"
                             data-x="right" data-hoffset="60"
                             data-y="bottom"
                             data-customin="x:800;y:450;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:846;transformOrigin:50% 50%;"
                             data-speed="600"
                             data-start="1600"
                             data-easing="Power3.easeInOut"
                             style="z-index: 16;">
                            <img alt="" src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide3/hand.png">
                        </div>

                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption sfb fadeout start"
                             data-x="right" data-hoffset="-307"
                             data-y="134"
                             data-speed="400"
                             data-start="1700"
                             data-easing="Power3.easeInOut"
                             style="z-index: 4;">
                            <img alt="" src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide3/balloon.png">
                        </div>

                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption customin fadeout start"
                             data-x="center" data-hoffset="-24"
                             data-y="139"
                             data-customin="x:1000;y:360;z:-250;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="300"
                             data-start="2100"
                             data-easing="Power3.easeInOut"
                             style="z-index: 5;">
                            <img alt="" src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide3/plane.png">
                        </div>

                        <!-- LAYER NR. 5 -->
                        <div class="tp-caption sfb start"
                             data-x="right" data-hoffset="-440"
                             data-y="72"
                             data-speed="300"
                             data-start="2100"
                             data-easing="Power3.easeInOut"
                             style="z-index: 15;">
                            <img alt="" src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide3/newyork.png">
                        </div>

                        <!-- LAYER NR. 6 -->
                        <div class="tp-caption sfb start"
                             data-x="right" data-hoffset="-413"
                             data-y="30"
                             data-speed="300"
                             data-start="2300"
                             data-easing="Power3.easeInOut"
                             style="z-index: 14;">
                            <img alt="" src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide3/london.png">
                        </div>

                        <!-- LAYER NR. 7 -->
                        <div class="tp-caption sfb start"
                             data-x="right" data-hoffset="-481"
                             data-y="178"
                             data-speed="300"
                             data-start="2500"
                             data-easing="Power3.easeInOut"
                             style="z-index: 13;">
                            <img alt="" src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide3/building.png">
                        </div>

                        <!-- LAYER NR. 8 -->
                        <div class="tp-caption sfb start"
                             data-x="right" data-hoffset="-342"
                             data-y="183"
                             data-speed="300"
                             data-start="2700"
                             data-easing="Power3.easeInOut"
                             style="z-index: 12;">
                            <img alt="" src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide3/sydney.png">
                        </div>

                        <!-- LAYER NR. 9 -->
                        <div class="tp-caption sfb start"
                             data-x="right" data-hoffset="-365"
                             data-y="98"
                             data-speed="300"
                             data-start="2900"
                             data-easing="Power3.easeInOut"
                             style="z-index: 11;">
                            <img alt="" src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide3/paris.png">
                        </div>

                        <!-- LAYER NR. 10 -->
                        <div class="tp-caption sfb start"
                             data-x="right" data-hoffset="-367"
                             data-y="152"
                             data-speed="300"
                             data-start="3100"
                             data-easing="Power3.easeInOut"
                             style="z-index: 10;">
                            <img alt="" src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide3/building2.png">
                        </div>

                        <!-- LAYER NR. 11 -->
                        <div class="tp-caption sfb start"
                             data-x="right" data-hoffset="-381"
                             data-y="134"
                             data-speed="300"
                             data-start="3300"
                             data-easing="Power3.easeInOut"
                             style="z-index: 9;">
                            <img alt="" src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide3/building3.png">
                        </div>

                        <!-- LAYER NR. 12 -->
                        <div class="tp-caption sfb start"
                             data-x="right" data-hoffset="-498"
                             data-y="201"
                             data-speed="300"
                             data-start="3500"
                             data-easing="Power3.easeInOut"
                             style="z-index: 8;">
                            <img alt="" src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide3/building4.png">
                        </div>

                        <!-- LAYER NR. 13 -->
                        <div class="tp-caption sfb start"
                             data-x="right" data-hoffset="-437"
                             data-y="117"
                             data-speed="300"
                             data-start="3700"
                             data-easing="Power3.easeInOut"
                             style="z-index: 7;">
                            <img alt="" src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide3/building5.png">
                        </div>

                        <!-- LAYER NR. 14 -->
                        <div class="tp-caption sfb start"
                             data-x="right" data-hoffset="-486"
                             data-y="116"
                             data-speed="300"
                             data-start="3900"
                             data-easing="Power3.easeInOut"
                             style="z-index: 6;">
                            <img alt="" src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide3/italy.png">
                        </div>

                        <!-- LAYER NR. 15 -->
                        <div class="tp-caption lfr stl tp-resizeme start" data-x="25" data-y="181" data-speed="1500" data-start="4000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 17;">
                            <p class="caption-big-title"><?php echo $this->lang->line('lets'); ?> <strong><i><?php echo $this->lang->line('discover'); ?></i></strong> <?php echo $this->lang->line('twtogether'); ?></p>
                        </div>

                        <!-- LAYER NR. 16 -->
                        <div class="tp-caption sfb stb start" data-x="22" data-y="230" data-speed="1500" data-start="4200" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1500" style="z-index: 18;"><img style="width: 43px; height: 32px;" src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide2/pleane.png" alt="">
                        </div>

                        <!-- LAYER NR. 17 -->
                        <div class="tp-caption large_bold_white_med sfb stb tp-resizeme start" data-x="72" data-y="230" data-speed="1500" data-start="4400" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 19;">
                            <span class="caption-medium-title"><?php echo $this->lang->line('over'); ?><strong> 500 </strong><?php echo $this->lang->line('airlines'); ?></span>
                        </div>

                        <!-- LAYER NR. 18 -->
                        <div class="tp-caption sfb stb start" data-x="23" data-y="273" data-speed="1500" data-start="4600" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1300" style="z-index: 20;"><img style="width: 43px; height: 32px;" src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide2/buil.png" alt="">
                        </div>

                        <!-- LAYER NR. 19 -->
                        <div class="tp-caption large_bold_white_med lft stl tp-resizeme start" data-x="73" data-y="274" data-speed="1500" data-start="4700" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 21;">
                            <span class="caption-medium-title"><?php echo $this->lang->line('morethan'); ?> <strong>13,000</strong> <?php echo $this->lang->line('places'); ?></span>
                        </div>

                        <!-- LAYER NR. 20 -->
                        <div class="tp-caption sfl stt start" data-x="18" data-y="317" data-speed="1500" data-start="4900" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1500" style="z-index: 22;"><img style="width: 43px; height: 32px;" src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide2/watch.png" alt="">
                        </div>

                        <!-- LAYER NR. 21 -->
                        <div class="tp-caption large_bold_white_med lft stt tp-resizeme start" data-x="73" data-y="318" data-speed="1500" data-start="5100" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 23;">
                            <span class="caption-medium-title"><?php echo $this->lang->line('bstPrcWrt'); ?></span>
                        </div>

                        <!-- LAYER NR. 22 -->
                        <div class="tp-caption sfl stl start" data-x="18" data-y="354" data-speed="1500" data-start="5300" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1500" style="z-index: 24;"><img style="width: 43px; height: 31px;" src="<?php echo base_url()?>resources/images/sliders/revolution_slider/slider1/slide2/man.png" alt="">
                        </div>

                        <!-- LAYER NR. 23 -->
                        <div class="tp-caption large_bold_white_med lft stl tp-resizeme start" data-x="75" data-y="357" data-speed="1500" data-start="5500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 25;">
                            <span class="caption-medium-title"><?php echo $this->lang->line('custCare'); ?></span>
                        </div>

                        <!-- LAYER NR. 24 -->
                        <div class="tp-caption tp-resizeme start hasclicklistener" data-x="29" data-y="410" data-speed="1500" data-start="5700" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1300" data-linktoslide="1" style="z-index: 26; ">
                            <a class="link link-home-slider-blue" href="#"><?php echo $this->lang->line('findOutMore'); ?></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <section id="content">
        <div class="search-box-wrapper">
            <div class="search-box container">
                <ul class="search-tabs clearfix">
                    <li class="active"><a href="#tours-tab" data-toggle="tab"><?php echo $this->lang->line('tours'); ?></a></li>
                    <li><a href="#hotels-tab" data-toggle="tab"><?php echo $this->lang->line('hotels'); ?></a></li>
                    <li><a href="#booking-tab" data-toggle="tab"><?php echo $this->lang->line('booking'); ?></a></li>
<!--                    <li><a href="#cars-tab" data-toggle="tab">CARS</a></li>-->
<!--                    <li><a href="#cruises-tab" data-toggle="tab">CRUISES</a></li>-->
<!--                    <li><a href="#flight-status-tab" data-toggle="tab">FLIGHT STATUS</a></li>-->
<!--                    <li><a href="#online-checkin-tab" data-toggle="tab">ONLINE CHECK IN</a></li>-->
                </ul>
                <div class="visible-mobile">
                    <ul id="mobile-search-tabs" class="search-tabs clearfix">
                        <li class="active"><a href="#tours-tab"><?php echo $this->lang->line('tours'); ?></a></li>
                        <li><a href="#hotels-tab"><?php echo $this->lang->line('hotels'); ?></a></li>
                        <li><a href="#booking-tab"><?php echo $this->lang->line('booking'); ?></a></li>
<!--                        <li><a href="#cars-tab">CARS</a></li>-->
<!--                        <li><a href="#cruises-tab">CRUISES</a></li>-->
<!--                        <li><a href="#flight-status-tab">FLIGHT STATUS</a></li>-->
<!--                        <li><a href="#online-checkin-tab">ONLINE CHECK IN</a></li>-->
                    </ul>
                </div>

                <div class="search-tab-content">

                    <div class="tab-pane fade" id="tours-tab">
                        <form action="flight-list-view.html" method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4 class="title">Where</h4>
                                    <div class="form-group">
                                        <label>Leaving From</label>
                                        <input type="text" class="input-text full-width" placeholder="city, distirct or specific airpot" />
                                    </div>
                                    <div class="form-group">
                                        <label>Going To</label>
                                        <input type="text" class="input-text full-width" placeholder="city, distirct or specific airpot" />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <h4 class="title">When</h4>
                                    <label>Departing On</label>
                                    <div class="form-group row">
                                        <div class="col-xs-6">
                                            <div class="datepicker-wrap">
                                                <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="selector">
                                                <select class="full-width">
                                                    <option value="1">anytime</option>
                                                    <option value="2">morning</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <label>Arriving On</label>
                                    <div class="form-group row">
                                        <div class="col-xs-6">
                                            <div class="datepicker-wrap">
                                                <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="selector">
                                                <select class="full-width">
                                                    <option value="1">anytime</option>
                                                    <option value="2">morning</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <h4 class="title">Who</h4>
                                    <div class="form-group row">
                                        <div class="col-xs-3">
                                            <label>Adults</label>
                                            <div class="selector">
                                                <select class="full-width">
                                                    <option value="1">01</option>
                                                    <option value="2">02</option>
                                                    <option value="3">03</option>
                                                    <option value="4">04</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <label>Kids</label>
                                            <div class="selector">
                                                <select class="full-width">
                                                    <option value="1">01</option>
                                                    <option value="2">02</option>
                                                    <option value="3">03</option>
                                                    <option value="4">04</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <label>Promo Code</label>
                                            <input type="text" class="input-text full-width" placeholder="type here" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-3">
                                            <label>Infants</label>
                                            <div class="selector">
                                                <select class="full-width">
                                                    <option value="1">01</option>
                                                    <option value="2">02</option>
                                                    <option value="3">03</option>
                                                    <option value="4">04</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 pull-right">
                                            <label>&nbsp;</label>
                                            <button class="full-width icon-check">SERACH NOW</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade active in" id="hotels-tab">
                        <form action="hotel-list-view.html" method="post">
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-3">
                                    <h4 class="title">Where</h4>
                                    <label>Your Destination</label>
                                    <input type="text" class="input-text full-width" placeholder="enter a destination or hotel name" />
                                </div>

                                <div class="form-group col-sm-6 col-md-4">
                                    <h4 class="title">When</h4>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label>Check In</label>
                                            <div class="datepicker-wrap">
                                                <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <label>Check Out</label>
                                            <div class="datepicker-wrap">
                                                <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-sm-6 col-md-3">
                                    <h4 class="title">Who</h4>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <label>Rooms</label>
                                            <div class="selector">
                                                <select class="full-width">
                                                    <option value="1">01</option>
                                                    <option value="2">02</option>
                                                    <option value="3">03</option>
                                                    <option value="4">04</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <label>Adults</label>
                                            <div class="selector">
                                                <select class="full-width">
                                                    <option value="1">01</option>
                                                    <option value="2">02</option>
                                                    <option value="3">03</option>
                                                    <option value="4">04</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <label>Kids</label>
                                            <div class="selector">
                                                <select class="full-width">
                                                    <option value="1">01</option>
                                                    <option value="2">02</option>
                                                    <option value="3">03</option>
                                                    <option value="4">04</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-sm-6 col-md-2 fixheight">
                                    <label class="hidden-xs">&nbsp;</label>
                                    <button type="submit" class="full-width icon-check animated" data-animation-type="bounce" data-animation-duration="1">SEARCH NOW</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="booking-tab">
                        <form action="flight-list-view.html" method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4 class="title">Where</h4>
                                    <div class="form-group">
                                        <label>Leaving From</label>
                                        <input type="text" class="input-text full-width" placeholder="city, distirct or specific airpot" />
                                    </div>
                                    <div class="form-group">
                                        <label>Going To</label>
                                        <input type="text" class="input-text full-width" placeholder="city, distirct or specific airpot" />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <h4 class="title">When</h4>
                                    <label>Departing On</label>
                                    <div class="form-group row">
                                        <div class="col-xs-6">
                                            <div class="datepicker-wrap">
                                                <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="selector">
                                                <select class="full-width">
                                                    <option value="1">anytime</option>
                                                    <option value="2">morning</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <label>Arriving On</label>
                                    <div class="form-group row">
                                        <div class="col-xs-6">
                                            <div class="datepicker-wrap">
                                                <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="selector">
                                                <select class="full-width">
                                                    <option value="1">anytime</option>
                                                    <option value="2">morning</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <h4 class="title">Who</h4>
                                    <div class="form-group row">
                                        <div class="col-xs-3">
                                            <label>Adults</label>
                                            <div class="selector">
                                                <select class="full-width">
                                                    <option value="1">01</option>
                                                    <option value="2">02</option>
                                                    <option value="3">03</option>
                                                    <option value="4">04</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <label>Kids</label>
                                            <div class="selector">
                                                <select class="full-width">
                                                    <option value="1">01</option>
                                                    <option value="2">02</option>
                                                    <option value="3">03</option>
                                                    <option value="4">04</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <label>Promo Code</label>
                                            <input type="text" class="input-text full-width" placeholder="type here" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-3">
                                            <label>Rooms</label>
                                            <div class="selector">
                                                <select class="full-width">
                                                    <option value="1">01</option>
                                                    <option value="2">02</option>
                                                    <option value="3">03</option>
                                                    <option value="4">04</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 pull-right">
                                            <label>&nbsp;</label>
                                            <button class="full-width icon-check">SERACH NOW</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="online-checkin-tab">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="title">Where</h4>
                                    <div class="form-group row">
                                        <div class="col-xs-6">
                                            <label>Leaving From</label>
                                            <input type="text" class="input-text full-width" placeholder="enter a city or place name" />
                                        </div>
                                        <div class="col-xs-6">
                                            <label>Going To</label>
                                            <input type="text" class="input-text full-width" placeholder="enter a city or place name" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-6 col-md-2">
                                    <h4 class="title">When</h4>
                                    <div class="form-group">
                                        <label>Departure Date</label>
                                        <div class="datepicker-wrap">
                                            <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-6 col-md-2">
                                    <h4 class="title">Who</h4>
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" class="input-text full-width" placeholder="enter your full name" />
                                    </div>
                                </div>
                                <div class="form-group col-md-2 fixheight">
                                    <label class="hidden-xs">&nbsp;</label>
                                    <button class="icon-check full-width">SEARCH NOW</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>