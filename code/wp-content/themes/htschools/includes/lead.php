<?php $page_name = basename($_SERVER['PHP_SELF']); ?>
<?php
if($page_name=="index.php"){
    $page_classes=" home-page";
}

$user = wp_get_current_user();
$userIdentifier = $user->ID;

$results1 = $wpdb->get_results("SELECT `ID` FROM `ht_posts` WHERE `post_type` = 'events' and post_status = 'publish' ORDER BY `ID`");
foreach($results1 as $row1){ 
  $post_id = $row1->ID; 
}

function getData($wpdb, $post_id, $meta_key){

  $results = $wpdb->get_results( "SELECT * FROM `ht_postmeta` WHERE `post_id` = '$post_id' AND `meta_key` = '$meta_key'");
  foreach($results as $row){ 
    return $row->meta_value; 
  }

}

$course_1 = getData($wpdb, $post_id, 'learning_modules_course_1');
$course_2 = getData($wpdb, $post_id, 'learning_modules_course_2');
$course_3 = getData($wpdb, $post_id, 'learning_modules_course_3');

$course_status1 = 'course_status'.$course_1;
$course_status2 = 'course_status'.$course_2;
$course_status3 = 'course_status'.$course_3;

$results1 = $wpdb->get_row("SELECT count(umeta_id) as course_status11 FROM `ht_usermeta` WHERE `user_id` = '$userIdentifier' and `meta_key` = '$course_status1'");
$course_status11 = $results1->course_status11;

$results2 = $wpdb->get_row("SELECT count(umeta_id) as course_status22 FROM `ht_usermeta` WHERE `user_id` = '$userIdentifier' and `meta_key` = '$course_status2'");
$course_status22 = $results2->course_status22;

$results3 = $wpdb->get_row("SELECT count(umeta_id) as course_status33 FROM `ht_usermeta` WHERE `user_id` = '$userIdentifier' and `meta_key` = '$course_status3'");
$course_status33 = $results3->course_status33;

$purchase_status = $course_status11+$course_status22+$course_status33;

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
  <style type="text/css">
      .profile-click img { border: 4px solid #06ea8c; border-radius: 100%;}
      .profile-menu {
        z-index: 999;
        display: none;
        position: absolute;
        right: 0;
        top: 55px;
        background: #fff;
        box-shadow: 0 8px 10px #00000010;
        border-radius: 0;
        padding: 15px;
        border: 1px solid #e8e8e8;
        width: 15%;
        margin: 2% 8%;
    }
    .profile-menu li {
        display: block;
        text-align: left;
        color: #000;
        font-size: 15px;
        line-height: 40px;
        color: #4b4b4b;
        font-weight: 400;
        padding: 0 0;
    }
  </style>
  <body class="<?=$page_classes?> test">
    <header class="header-wrapper">
            <span class="codeathon">
                <img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/codeathon.svg">
            </span>
            <div class="group-logos">
                <div class="column">
                    <span class="title">PRESENTED BY</span>
                    <img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/group-logo/dell.png">
                </div>
                <div class="column">
                    <span class="title">PARTNER</span>
                    <img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/group-logo/delhi-sarkar.png">
                </div>
                <div class="column">
                    <span class="title">POWERED BY</span>
                    <img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/group-logo/ibm.png">
                </div>
                <div class="column">
                    <span class="title">CAUSE PARTNER</span>
                    <img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/group-logo/speed.png">
                </div>
            </div>
        <div class="header-right">
            <span class="ht-school">
                <a href="<?php echo get_bloginfo('url'); ?>" class="login">
                    <img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/ht-school.svg">
                </a>
            </span>
            <div class="account">
            <?php if (!is_user_logged_in()){ ?>
                <a href="<?php echo get_bloginfo('url'); ?>/login-register" class="register"><span class="caption">Register</span></a>
                <a href="<?php echo get_bloginfo('url'); ?>/login-register" class="login"><span class="caption">Login</span></a>
            <?php }else{ ?>
                <?php if($purchase_status == 0){ ?>
                    <a href="#learning_section" class="register dashboard"><span class="caption">Register</span></a>
                <?php }else{ ?>
                    <a href="<?php echo get_bloginfo('url'); ?>/event-dashboard" class="register dashboard"><span class="caption">Dashboard</span></a>
                <?php } ?>
                <a href="#!" class="ms-3 profile-click">
                    <?php 
                        $n=vbp_current_user_notification_count(); 
                        if($n != 0){
                            echo ((isset($n) && $n)?'<em></em>':''); 
                            bp_loggedin_user_avatar( 'type=full' ); 
                        }else{
                            echo '<img loading="lazy" src="'.get_bloginfo('template_url').'/assets/images/avatar.jpg" class="avatar user-3001-avatar avatar-300 photo" width="50" height="50" alt="">';
                        }
                    ?>
                </a>
                <ul class="profile-menu">
                    <li><a href="<?php bp_loggedin_user_link(); ?>">My profile</a></li>
                    <li><a href="<?php bp_loggedin_user_link(); ?>/preference">Preference</a></li>
                    <li><a href="#!" class="vibebp-logout"><span class="vicon"></span>Logout </a></li>
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
        </ul>
        <div class="account">
            <?php if (!is_user_logged_in()){ ?>
                <a href="<?php echo get_bloginfo('url'); ?>/login-register" class="register"><span class="caption">Register</span></a>
                <a href="<?php echo get_bloginfo('url'); ?>/login-register" class="login"><span class="caption">Login</span></a>
            <?php }else{ ?>
                <?php if($purchase_status == 0){ ?>
                    <a href="#learning_section" class="register dashboard"><span class="caption">Register</span></a>
                <?php }else{ ?>
                    <a href="<?php echo get_bloginfo('url'); ?>/event-dashboard" class="register dashboard"><span class="caption">Dashboard</span></a>
                <?php } ?>
                <a href="#!" class="ms-3 profile-click" style="display: none;">
                    <?php 
                        $n=vbp_current_user_notification_count(); 
                        if($n != 0){
                            echo ((isset($n) && $n)?'<em></em>':''); 
                            bp_loggedin_user_avatar( 'type=full' ); 
                        }else{
                            echo '<img loading="lazy" src="'.get_bloginfo('template_url').'/assets/images/avatar.jpg" class="avatar user-3001-avatar avatar-300 photo" width="50" height="50" alt="">';
                        }
                    ?>
                </a>
                <ul class="profile-menu">
                    <li><a href="<?php bp_loggedin_user_link(); ?>">My profile</a></li>
                    <li><a href="<?php bp_loggedin_user_link(); ?>/preference">Preference</a></li>
                    <li><a href="#!" class="vibebp-logout"><span class="vicon"></span>Logout </a></li>
                </ul>
            <?php } ?>
            </div>
        </nav>
    </div>