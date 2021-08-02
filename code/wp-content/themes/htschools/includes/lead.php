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
                <a href="#learning_section" class="register"><span class="caption">Register</span></a>
                <a href="<?php echo get_bloginfo('url'); ?>/login-register" class="login"><span class="caption">Login</span></a>
            <?php }else{ ?>
                <?php if($purchase_status == 0){ ?>
                    <a href="#learning_section" class="register dashboard"><span class="caption">Register</span></a>
                <?php }else{ ?>
                    <a href="<?php echo get_bloginfo('url'); ?>/event-dashboard" class="register dashboard"><span class="caption">Dashboard</span></a>
                <?php } ?>
                <a href="#!" class="ms-3 profile-click1">
                    <img loading="lazy" src="'.get_bloginfo('template_url').'/assets/images/avatar.jpg" class="avatar user-3001-avatar avatar-300 photo" width="50" height="50" alt="">
                </a>
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
                    <button class="home-button">
                            <span class="burger"></span>
                        </button>
                        <li>
                            <a href="<?php bp_loggedin_user_link(); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17.187" height="19.643" viewBox="0 0 17.187 19.643">
                                    <path id="Path_715" data-name="Path 715" d="M28.539,26.655c2.683,0,4.866-2.624,4.866-5.85,0-3.056-2-5.191-4.866-5.191s-4.866,2.134-4.866,5.191C23.673,24.031,25.856,26.655,28.539,26.655Zm0-9.9c2.226,0,3.722,1.627,3.722,4.048,0,2.6-1.67,4.708-3.722,4.708S24.817,23.4,24.817,20.8C24.817,18.383,26.313,16.756,28.539,16.756ZM29.067,27.8H28.012c-4.825,0-8.066,2.768-8.066,6.888a.572.572,0,0,0,1.144,0c0-4.241,3.729-5.746,6.922-5.746h1.055c3.194,0,6.923,1.505,6.923,5.746a.572.572,0,0,0,1.144,0C37.133,30.566,33.891,27.8,29.067,27.8Z" transform="translate(-19.946 -15.614)" fill="#848484"/>
                                </svg>
                                My profile
                            </a>
                        </li>
                        <li>
                            <a href="<?php bp_loggedin_user_link(); ?>/preference">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20.143" height="20.143" viewBox="0 0 20.143 20.143">
                                    <g id="Group_15303" data-name="Group 15303" transform="translate(0.25 0.25)">
                                        <path id="Path_717" data-name="Path 717" d="M19.642,28.543H17.425a1.165,1.165,0,0,1-1.132-1.206v-1.7a.508.508,0,0,0-.33-.449.073.073,0,0,1-.047-.024c-.047,0-.071-.024-.118-.047a.523.523,0,0,0-.519.095l-1.3,1.276a1.209,1.209,0,0,1-1.674,0l-1.6-1.607a1.162,1.162,0,0,1-.354-.851,1.2,1.2,0,0,1,.354-.851l1.226-1.229a.423.423,0,0,0,.118-.425v-.071a.444.444,0,0,0-.448-.236H9.808a1.216,1.216,0,0,1-1.108-1.3V17.693a1.133,1.133,0,0,1,1.108-1.206H11.6a.5.5,0,0,0,.448-.284c0-.024.024-.047.024-.071l.024-.047a.526.526,0,0,0-.094-.52l-1.25-1.276a1.216,1.216,0,0,1,0-1.678L12.355,11a1.209,1.209,0,0,1,1.674,0L15.3,12.257a.474.474,0,0,0,.519.095c.024,0,.047-.024.094-.024l.047-.024a.508.508,0,0,0,.33-.449v-1.8A1.124,1.124,0,0,1,17.425,8.9h2.217a1.105,1.105,0,0,1,1.108,1.158v1.8a.505.505,0,0,0,.307.425c.024,0,.071.024.094.024a.459.459,0,0,0,.519-.095L22.9,10.98a1.156,1.156,0,0,1,.849-.355h0a1.2,1.2,0,0,1,.849.355l1.6,1.607a1.193,1.193,0,0,1,0,1.678l-1.25,1.276a.469.469,0,0,0-.094.52l.047.118a.442.442,0,0,0,.448.284H27.07a1.272,1.272,0,0,1,1.273,1.206v2.222a1.356,1.356,0,0,1-1.273,1.3H25.348a.447.447,0,0,0-.448.26l-.094.142a.454.454,0,0,0,.141.4l1.226,1.229a1.125,1.125,0,0,1,.354.851,1.2,1.2,0,0,1-.354.851l-1.58,1.584a1.156,1.156,0,0,1-.849.355h0a1.2,1.2,0,0,1-.849-.355L21.67,25.281a.5.5,0,0,0-.542-.095c-.024,0-.047.024-.071.024a.505.505,0,0,0-.307.425v1.726A1.156,1.156,0,0,1,19.642,28.543Zm-4.009-4.16a1.02,1.02,0,0,1,.448.095.073.073,0,0,1,.047.024c.024,0,.071.024.094.024A1.2,1.2,0,0,1,17,25.636v1.7a.457.457,0,0,0,.424.5h2.217a.453.453,0,0,0,.4-.5V25.612a1.227,1.227,0,0,1,.755-1.087c.024,0,.047-.024.071-.024a1.153,1.153,0,0,1,1.3.26l1.226,1.229a.465.465,0,0,0,.33.142h0a.428.428,0,0,0,.33-.142l1.58-1.584a.467.467,0,0,0,.141-.331.43.43,0,0,0-.141-.331l-1.226-1.229a1.205,1.205,0,0,1-.259-1.324l.094-.236h.071a1.123,1.123,0,0,1,.943-.425h1.721a.654.654,0,0,0,.566-.591V17.717a.586.586,0,0,0-.566-.5H25.254a1.184,1.184,0,0,1-1.108-.733l-.047-.095a1.163,1.163,0,0,1,.259-1.276l1.25-1.276a.486.486,0,0,0,0-.686L24.1,11.524a.465.465,0,0,0-.33-.142h0a.428.428,0,0,0-.33.142l-1.226,1.229a1.156,1.156,0,0,1-1.273.26c-.024,0-.071-.024-.094-.024A1.227,1.227,0,0,1,20.09,11.9v-1.8a.408.408,0,0,0-.4-.449H17.472a.416.416,0,0,0-.424.449v1.8a1.22,1.22,0,0,1-.778,1.111c-.024,0-.047.024-.071.024s-.024.024-.047.024a1.156,1.156,0,0,1-1.273-.26L13.6,11.547a.483.483,0,0,0-.684,0l-1.6,1.607a.486.486,0,0,0,0,.686l1.25,1.276a1.216,1.216,0,0,1,.259,1.276l-.047.095A1.389,1.389,0,0,1,11.6,17.2H9.832c-.259,0-.4.236-.4.5v2.222c0,.284.165.591.4.591H11.6a1.151,1.151,0,0,1,1.014.52h.024l.071.142a1.194,1.194,0,0,1-.236,1.3L11.247,23.7a.458.458,0,0,0,0,.662l1.6,1.607a.483.483,0,0,0,.684,0l1.3-1.276A1.163,1.163,0,0,1,15.633,24.383Z" transform="translate(-8.7 -8.9)" fill="#848484" stroke="#848484" stroke-width="0.5"/>
                                        <path id="Path_718" data-name="Path 718" d="M38.115,42.43a4.515,4.515,0,1,1,4.515-4.515A4.523,4.523,0,0,1,38.115,42.43Zm0-8.192a3.7,3.7,0,1,0,3.7,3.7A3.709,3.709,0,0,0,38.115,34.238Z" transform="translate(-28.304 -28.168)" fill="#848484" stroke="#848484" stroke-width="0.5"/>
                                    </g>
                                </svg>
                                Preference
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo wp_logout_url( get_permalink() ); ?>" class="vibebp-logout">
                                <svg id="Group_15304" data-name="Group 15304" xmlns="http://www.w3.org/2000/svg" width="18.006" height="19.643" viewBox="0 0 18.006 19.643">
                                    <path id="Path_719" data-name="Path 719" d="M30.586,21.256A9,9,0,1,1,18.2,13.017a.7.7,0,0,1,.921.341.683.683,0,0,1-.345.909l-.057.022a7.483,7.483,0,0,0-4.188,9.792,7.646,7.646,0,0,0,9.918,4.134,7.483,7.483,0,0,0,4.188-9.791,7.565,7.565,0,0,0-4.188-4.135.684.684,0,0,1-.424-.876.7.7,0,0,1,.887-.419l.057.022A8.84,8.84,0,0,1,30.586,21.256Zm-9-.824a.691.691,0,0,0,.7-.687V11.187a.7.7,0,0,0-1.391,0v8.559A.691.691,0,0,0,21.583,20.432Z" transform="translate(-12.58 -10.5)" fill="#848484"/>
                                </svg>
                                Logout 
                            </a>
                        </li>
                    
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
                <a href="#learning_section" class="register"><span class="caption">Register</span></a>
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
                    <li><a href="<?php echo wp_logout_url( get_permalink() ); ?>" class="vibebp-logout"><span class="vicon"></span>Logout </a></li>
                </ul>
            <?php } ?>
            </div>
        </nav>
    </div>