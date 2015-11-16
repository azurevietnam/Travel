<?php
/**
 * Created by PhpStorm.
 * User: HaiLong
 * Date: 4/14/2015
 * Time: 9:56 PM
 */
if(!($this->session->userdata('language'))){
    $this->session->set_userdata('language', 'vietnam');
    $this->session->set_userdata('lang_code', 'VI');
}

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
    <meta property="og:type" content="website" />

    <meta property="og:site_name" content="Vung Chua Travel" />

    <meta property="og:title" content="<?php echo (isset($metaTitle)) ? $metaTitle : $this->lang->line('title');?>" />

    <meta property="fb:admins" content="vungchuatravel" />

    <meta property="og:url" content="<?php echo base_url().uri_string()?>" />

    <meta property="og:description" content="<?php echo (isset($metaDesc)) ? $metaDesc : $this->lang->line('description');?>"/>
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
    <link href="http://fonts.googleapis.com/css?family=Arial:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
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


    <script type='text/javascript'> var pageUrl = "<?php echo base_url()?>"</script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->

    <!-- Javascript Page Loader -->
    <script type="text/javascript" src="<?php echo base_url()?>resources/js/pace.min.js" data-pace-options='{ "ajax": false }'></script>
<!--    <script type="text/javascript" src="--><?php //echo base_url()?><!--resources/js/page-loading.js"></script>-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

    <!-- jQuery REVOLUTION Slider -->
    <script type="text/javascript" src="<?php echo base_url()?>resources/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>resources/js/jquery.themepunch.revolution.min.js"></script>

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
                                <li class="active"><a href="<?php echo base_url()?>PagesConfig/setLang/en" title="English" class="lang-flag en-us">English (US)</a></li>
                                <li class="active"><a href="<?php echo base_url()?>PagesConfig/setLang/vi" title="Việt Nam" class="lang-flag vi-vn">Việt Nam (VN)</a></li>
                            </ul>
                        <?php }else  {?>
                            <a href="#" class="lang-flag vi-vn">VI</a>
                            <ul class="menu mini">
                                <li class="active"><a href="<?php echo base_url()?>PagesConfig/setLang/vi" title="Việt Nam" class="lang-flag vi-vn">Việt Nam (VN)</a></li>
                                <li class="active"><a href="<?php echo base_url()?>PagesConfig/setLang/en" title="English" class="lang-flag en-us">English (US)</a></li>
                            </ul>
                        <?php } ?>
                    </li>
                    <li class="googleplus"><a title="googleplus" href="#" data-toggle="tooltip"><i class="soap-icon-googleplus"> google+</i></a></li>
                    <li class="facebook"><a title="facebook" href="https://www.facebook.com/vungchuatravel" data-toggle="tooltip"><i class="soap-icon-facebook"> facebook</i></a></li>
                    <li class="skype"><a title="skype" href="#" data-toggle="tooltip"><i class="soap-icon-skype"></i> dieuhanh.vungchuatravel</a></li>
                    <li class="phone"><a title="phone" href="#" data-toggle="tooltip"><i class="soap-icon-phone"></i> (052) 382 88 82</a></li>
                </ul>
                <ul class="quick-menu pull-right">
                    <li><a href="#VungChuaTravel-login" class="soap-popupbox"><?php echo $this->lang->line('login'); ?></a></li>
                    <li><a href="#VungChuaTravel-signup" class="soap-popupbox"><?php echo $this->lang->line('singup'); ?></a></li>
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
                    <a href="<?php echo base_url()?>" title="VungChuaTravel - home">
                        <img src="<?php echo base_url()?>resources/images/logo.png" alt="VungChuaTravel HTML5 Template" />
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
                    <li><a href="#VungChuaTravel-login" class="soap-popupbox">LOGIN</a></li>
                    <li><a href="#VungChuaTravel-signup" class="soap-popupbox">SIGNUP</a></li>
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
        <div id="VungChuaTravel-signup" class="VungChuaTravel-signup-box VungChuaTravel-box">
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
            <p><?php echo $this->lang->line('askmember'); ?><a href="#VungChuaTravel-login" class="goto-login soap-popupbox"><?php echo $this->lang->line('login'); ?></a></p>
        </div>
        <div id="VungChuaTravel-login" class="VungChuaTravel-login-box VungChuaTravel-box">
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
            <p><?php echo $this->lang->line('donthaveacc'); ?><a href="#VungChuaTravel-signup" class="goto-signup soap-popupbox"><?php echo $this->lang->line('singup'); ?></a></p>
        </div>
    </header>