<?php $page_name = basename($_SERVER['PHP_SELF']); ?>
<?php
if($page_name=="index.php"){
    $page_classes=" home-page";
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="<?php echo get_bloginfo('template_url'); ?>/assets/css/codeathon-bootstrap.css" rel="stylesheet">
    <link href="<?php echo get_bloginfo('template_url'); ?>/assets/css/codeathon.min.css?<?php echo date("H:i:s");?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg" href="<?php echo bloginfo('template_url')?>/assets/images/favicon.svg"/>

    <title>Code A Thon - HT School</title>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MVTH49L');</script>
    <!-- End Google Tag Manager -->
  </head>
  <body class="<?=$page_classes?>">
    <header class="header-wrapper">
            <span class="codeathon">
                <img src="<?php echo get_bloginfo('template_url'); ?>/images/codeathon.svg">
            </span>
            <div class="group-logos">
                <div class="column">
                    <span class="title">PRESENTED BY</span>
                    <img src="<?php echo get_bloginfo('template_url'); ?>/images/group-logo/dell.png">
                </div>
                <div class="column">
                    <span class="title">PARTNER</span>
                    <img src="<?php echo get_bloginfo('template_url'); ?>/images/group-logo/delhi-sarkar.png">
                </div>
                <div class="column">
                    <span class="title">POWERED BY</span>
                    <img src="<?php echo get_bloginfo('template_url'); ?>/images/group-logo/ibm.png">
                </div>
                <div class="column">
                    <span class="title">CAUSE PARTNER</span>
                    <img src="<?php echo get_bloginfo('template_url'); ?>/images/group-logo/speed.png">
                </div>
            </div>
        <div class="header-right">
            <span class="ht-school">
                <a href="<?php echo get_bloginfo('url'); ?>" class="login">
                    <img src="<?php echo get_bloginfo('template_url'); ?>/images/ht-school.svg">
                </a>
            </span>
            <div class="account">
            <?php if (!is_user_logged_in()){ ?>
                <a href="<?php echo get_bloginfo('url'); ?>/login-register" class="register">Register</a>
                <a href="<?php echo get_bloginfo('url'); ?>/login-register" class="login">Login</a>
            <?php }else{ ?>
                <!-- <a href="<?php //echo get_bloginfo('url'); ?>/event-dashboard" class="login"><img src="<?php //echo get_bloginfo('template_url'); ?>/images/login-profile.png"></a> -->
                <a href="<?php echo get_bloginfo('url'); ?>/event-dashboard" class="register dashboard">My Dashboard</a>
                <ul class="topmenu custom_topmenu">
                <?php
                    if(function_exists('is_wplms_4_0') && is_wplms_4_0()){ ?>
                        <li style="list-style-type: none;"><a href="<?php bp_loggedin_user_link(); ?>" class="smallimg vbplogin"><img src="<?php echo get_bloginfo('template_url'); ?>/images/login-profile.png"> </a>
                        </li>
                        <?php do_action('wplms_header_top_login'); ?>
                   <?php } ?>
                </ul>
            <?php } ?>
            </div>
            <button class="home-button">
                <span class="burger"></span>
            </button>
        </div>
    </header>
    <div class="navigation-wrapper" id="header-scroll">
        <nav>
        <ul>
            <li><a href="#about_section">About Us</a></li>
            <li><a href="#learning_section">Learning Modules</a></li>
            <li><a href="#How_it_works">How it works</a></li>
            <li><a href="#About_Partners">About Our Partners</a></li>
            <li><a href="#Partner_says">What Our Partners Say</a></li>
            <li><a href="#blog">Blog</a></li>
        </ul>
        <div class="account">
            <?php if (!is_user_logged_in()){ ?>
                <a href="<?php echo get_bloginfo('url'); ?>/login-register" class="register">Register</a>
                <a href="<?php echo get_bloginfo('url'); ?>/login-register" class="login">Login</a>
            <?php }else{ ?>
                <!-- <a href="<?php //echo get_bloginfo('url'); ?>/event-dashboard" class="login"><img src="<?php //echo get_bloginfo('template_url'); ?>/images/login-profile.png"></a> -->
                <a href="<?php echo get_bloginfo('url'); ?>/event-dashboard" class="register dashboard">My Dashboard</a>
                <ul class="topmenu custom_topmenu">
                <?php
                    if(function_exists('is_wplms_4_0') && is_wplms_4_0()){ ?>
                        <li style="list-style-type: none;"><a href="<?php bp_loggedin_user_link(); ?>" class="smallimg vbplogin"><img src="<?php echo get_bloginfo('template_url'); ?>/images/login-profile.png"> </a>
                        </li>
                        <?php do_action('wplms_header_top_login'); ?>
                   <?php } ?>
                </ul>
            <?php } ?>
        </div>
        </nav>
    </div>