<?php
//Header File
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  
<meta charset="UTF-8">
<!-- <link rel="icon" type="image/svg" href="<?php echo bloginfo('template_url')?>/assets/images/favicon.svg"/> -->
<link rel="icon" href="data:image/svg+xml,%3Csvg id='Group_7' data-name='Group 7' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='35.752' height='48.47' viewBox='0 0 35.752 48.47'%3E%3Cdefs%3E%3CclipPath id='clip-path'%3E%3Cpath id='Path_39683' data-name='Path 39683' d='M685.768,315.427a18.047,18.047,0,1,1-26.861,15.885q0-.128,0-.257a18.006,18.006,0,0,1,17.976-18.037A17.8,17.8,0,0,1,685.768,315.427Z' transform='translate(-658.906 -313.019)' fill='none'/%3E%3C/clipPath%3E%3C/defs%3E%3Cpath id='Path_21' data-name='Path 21' d='M704.9,440.424h-14.3a1.517,1.517,0,0,1-1.51-1.524h0a1.517,1.517,0,0,1,1.51-1.525H704.9a1.518,1.518,0,0,1,1.511,1.525h0a1.515,1.515,0,0,1-1.505,1.524Z' transform='translate(-679.983 -396.303)' fill='%23ff6417'/%3E%3Cpath id='Path_22' data-name='Path 22' d='M707.7,454.717H697.648a1.518,1.518,0,0,1-1.511-1.525h0a1.518,1.518,0,0,1,1.511-1.524H707.7a1.518,1.518,0,0,1,1.51,1.524h0a1.512,1.512,0,0,1-1.5,1.525Z' transform='translate(-684.91 -406.247)' fill='%23ff6417'/%3E%3Cg id='Group_5' data-name='Group 5' transform='translate(0 3.229)'%3E%3Cg id='Group_21487' data-name='Group 21487'%3E%3Cg id='Group_21486' data-name='Group 21486' clip-path='url(%23clip-path)'%3E%3Cg id='Group_4' data-name='Group 4' transform='translate(-0.004 -0.068)'%3E%3Cpath id='Path_23' data-name='Path 23' d='M692.256,321.828a17.787,17.787,0,0,0-24.413-6.622,18.208,18.208,0,0,0-.061,31.321c.349.207.7.395,1.06.576a1.325,1.325,0,0,1,1.289-1.258,1.235,1.235,0,0,1,.74.245,2.27,2.27,0,0,1,2.115-1.808,2.968,2.968,0,0,1,2.149.945l.574-8.408v-.765h2.6l.574,9.12a2.993,2.993,0,0,1,2.11-.893,2.262,2.262,0,0,1,2.1,1.744,1.259,1.259,0,0,1,.634-.183,1.321,1.321,0,0,1,1.268,1.086c.251-.133.5-.262.749-.407a17.985,17.985,0,0,0,8.889-15.629A17.77,17.77,0,0,0,692.256,321.828Z' transform='translate(-658.892 -312.794)' fill='%23ff6417'/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3Cg id='Group_6' data-name='Group 6' transform='translate(8.83)'%3E%3Cpath id='Path_25' data-name='Path 25' d='M709.051,305.621l-.09.193L707.5,309l.081,18.219h6.2V308.687l-3.14-6.278Z' transform='translate(-701.678 -302.409)' fill='%23fff'/%3E%3Crect id='Rectangle_1' data-name='Rectangle 1' width='2.072' height='18.516' transform='translate(7.961 6.342)' fill='%23ff6417'/%3E%3Cpath id='Path_26' data-name='Path 26' d='M694.179,358.893l.064,7.66-6.054-.035v-1.645S694.094,358.893,694.179,358.893Z' transform='translate(-688.188 -341.704)' fill='%23fff'/%3E%3Cpath id='Path_27' data-name='Path 27' d='M712.64,305.621h3.143l-1.549-3.212Z' transform='translate(-705.267 -302.409)'/%3E%3Cpath id='Path_28' data-name='Path 28' d='M728.225,358.782l-.063,7.694,6.041-.038v-1.645S728.31,358.782,728.225,358.782Z' transform='translate(-716.108 -341.627)' fill='%23fff'/%3E%3Cpath id='Path_29' data-name='Path 29' d='M711.771,385.034h-6.693a.708.708,0,0,1-.706-.709v-.308a.708.708,0,0,1,.7-.713h6.7a.707.707,0,0,1,.706.709v.309A.711.711,0,0,1,711.771,385.034Z' transform='translate(-699.492 -358.687)' fill='%23fff'/%3E%3C/g%3E%3C/svg%3E%0A">

<?php
$page_id     = get_the_ID();
  $post_data  = get_post_meta($page_id);
  
  if(isset($post_data['_yoast_wpseo_canonical'])){ ?>

    <link rel="canonical" href="<?php  echo $post_data['_yoast_wpseo_canonical'][0];?>" />
  <?php 
  }

    wp_head();
?>
<script type="text/javascript">
   var site_url = '<?php bloginfo('url'); ?>';
</script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MXXRRC3');</script>
<!-- End Google Tag Manager -->
<script type="text/javascript">
  (function(i,s,o,g,r,a,m,n){i.moengage_object=r;t={};q=function(f){return function(){(i.moengage_q=i.moengage_q||[]).push({f:f,a:arguments})}};f=['track_event','add_user_attribute','add_first_name','add_last_name','add_email','add_mobile','add_user_name','add_gender','add_birthday','destroy_session','add_unique_user_id','moe_events','call_web_push','track','location_type_attribute'],h={onsite:["getData","registerCallback"]};for(k in f){t[f[k]]=q(f[k])}for(k in h)for(l in h[k]){null==t[k]&&(t[k]={}),t[k][h[k][l]]=q(k+"."+h[k][l])}a=s.createElement(o);m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m);i.moe=i.moe||function(){n=arguments[0];return t};a.onload=function(){if(n){i[r]=moe(n)}}})(window,document,'script','https://cdn.moengage.com/webpush/moe_webSdk.min.latest.js','Moengage')

  Moengage = moe({
    app_id:"5G83B74ZQGQUARJAI23JB9JY_DEBUG",
    debug_logs: 1
  });
</script>

<?php global $wp;

$currentSlug = add_query_arg( array(), $wp->request );
$currentSlug = $currentSlug ? $currentSlug : "home";
$currentSlug = explode('/', $currentSlug)[0];

// If current page is news detail page
if(strlen($currentSlug) > 20)   $currentSlug = "news_details";

$allowAdsPageList = array("home", "courses", "course", "editorsdesk", "my-courses", "news_details");
if(in_array($currentSlug, $allowAdsPageList)) require_once('google-ads.php');
?>

</head>
<body <?php body_class(); ?>>
<!-- <div id="global" class="global"> -->
    <?php
        get_template_part('mobile','sidebar');
    ?>
    <span class="overlay"></span>
    <!-- Push -->
        <?php
            $fix=vibe_get_option('header_fix');
        ?>
    <header class="header-wrapper">
        <div class="header-copy">
            <div class="left-side">
            <button class="home-button" type="submit">
                <span class="burger"></span>
            </button>
            <?php
                $template_file = get_post_meta( get_the_ID(), '_wp_page_template', TRUE );
                //print_r($template_file);
                    $url = apply_filters('wplms_logo_url',VIBE_URL.'/assets/images/logo.png','header');
                    if(!empty($url)){
            ?>
            <?php if ( is_page_template('all-courses.php') || is_page_template('my-course.php') ) { ?>
                <a href="<?php echo vibe_site_url(); ?>" class="logo"><img src="<?php $logo_top = vibe_get_option('headertop_logo'); echo isset($logo_top)?$logo_top:apply_filters('wplms_logo_url',VIBE_URL.'/images/logo.png'); ?>" alt="<?php echo get_bloginfo('name'); ?>" title="<?php echo get_bloginfo('name'); ?>" /></a>

            <?php
                }
            else{?>
                <a href="<?php echo vibe_site_url(); ?>" class="logo"><img src="<?php  echo vibe_sanitizer($url,'url'); ?>" width="100" height="48" alt="<?php echo get_bloginfo('name'); ?>" title="<?php echo get_bloginfo('name'); ?>" /></a>

            <?php }
                }
            ?>
            <?php


               $menu_name = 'main-menu'; //menu slug
               $locations = get_nav_menu_locations();
               $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
               $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );

               $logged_in_menu_name = 'logged-in-menu'; //menu slug
               $logged_in_locations = get_nav_menu_locations();
               $logged_in_menu = wp_get_nav_menu_object( $logged_in_locations[ $logged_in_menu_name ] );
               $logged_in_menuitems = wp_get_nav_menu_items( $logged_in_menu->term_id, array( 'order' => 'DESC' ) );
               //print_r($menuitems);
               global $post;
                $post_slug = $post->post_name;
               echo "<ul>";
               foreach ($menuitems as $menu) {
                $current = ( $_SERVER['REQUEST_URI'] == parse_url( $menu->url, PHP_URL_PATH ) ) ? 'active' : '';
                  if($menu->title == 'Menu'){
                  $home= 'Home';
                  $home_url= get_bloginfo('url');
                    echo '<li class="home"><a href ="'.$home_url.'" class="link">' . $home . '</a></li>';
                  }
                  else if($menu->title == 'ePaper'){
                    echo '<li ><a href ="'.$menu->url.'" class="link">' . $menu->title . '</a></li>';
                  }
                  else{
                  if($post_slug != 'login-register'){
                    if(is_user_logged_in()){
                      foreach ($logged_in_menuitems as $loggedin_menu) {
                      $current_logged_in = ( $_SERVER['REQUEST_URI'] == parse_url( $loggedin_menu->url, PHP_URL_PATH ) ) ? 'active' : '';
                        echo '<li class="my-course ' . $current_logged_in . '"><a href="' . $loggedin_menu->url . '" class="link">'.$loggedin_menu->title.'</a></li>';
                    }
                      }
                    else{
                      echo '<li class="my-course ' . $current . '"><a href="' . $menu->url . '" class="link">'.$menu->title.'</a></li>';
                    }
                  }
               }}
              echo "</ul></nav>";

            ?>
                <!-- <ul>
                    <li class="active"><a href="#!" class="link">Home</a></li>
                    <li><a href="#!" class="link">Courses</a></li>
                    <li><a href="#!" class="link">ePaper</a></li>
                </ul> -->
            </div>

            <div class="search">
                <form>
                <input type="search" name="" placeholder="Search">
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26.414" height="26.418" viewBox="0 0 26.414 26.418"> <g id="Group_20730" data-name="Group 20730" transform="translate(-1037 -30)"> <g id="Ellipse_31" data-name="Ellipse 31" transform="translate(1037 30)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"> <ellipse cx="11.667" cy="11.669" rx="11.667" ry="11.669" stroke="none"/> <ellipse cx="11.667" cy="11.669" rx="10.667" ry="10.669" fill="none"/> </g> <path id="Path_9" data-name="Path 9" d="M26,26l5.333,5.333" transform="translate(1030.667 23.67)" fill="#fff" stroke="#000" stroke-linecap="round" stroke-width="2"/> </g> </svg>
                </button>
                </form>
            </div>
            <!-- <i class="bi bi-list mobile-nav-toggle" style="display: none;"></i> -->
            <div class="right-side">
                <!-- <a href="#!" class="cart">
                    <span class="total">10</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="25" viewBox="0 0 30 25"><g id="Group_15698" data-name="Group 15698" transform="translate(-970 -26.458)"> <g id="Group_15651" data-name="Group 15651" transform="translate(971 27.458)"> <path id="Path_30160" data-name="Path 30160" d="M-11952.5,9580.5h3.877l5.87,17.555h13.838" transform="translate(11952.5 -9580.5)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/> <path id="Path_30161" data-name="Path 30161" d="M-11898.5,9610.5h22.9l-4.449,10.313h-14.859" transform="translate(11903.602 -9607.27)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/> <g id="Ellipse_440" data-name="Ellipse 440" transform="translate(8.975 20.39)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"> <circle cx="1.805" cy="1.805" r="1.805" stroke="none"/> <circle cx="1.805" cy="1.805" r="0.805" fill="none"/> </g> <g id="Ellipse_441" data-name="Ellipse 441" transform="translate(19.747 20.39)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"> <circle cx="1.805" cy="1.805" r="1.805" stroke="none"/> <circle cx="1.805" cy="1.805" r="0.805" fill="none"/> </g> </g> </g>
                    </svg>
                </a> -->
                <?php do_action('woocommerce_add_to_cart_fragments'); ?>
                <!-- <a class="login" href="#!">Login</a> -->
                
                <ul class="dropdown profile">

                    <?php
                    // if(function_exists('is_wplms_4_0') && is_wplms_4_0()){
                    //     echo '<li class="vibebp-login">'.apply_filters('wplms_login_trigger','<a class="dropdown-toggle" href="'.get_bloginfo('url').'/login-register" rel="nofollow" >
                    //       <span class="icon"><img src="'.get_bloginfo('template_url').'/assets/images/login-profile.svg" alt="Login Profile" title="Login Profile"/></span>
                    //       <span class="text">'.__('Login','vibe').'</span>
                    //       </a>').'</li>';
                    //     do_action('wp_head_wplms_login');
                    // }else{
                    if(function_exists('is_wplms_4_0') && is_wplms_4_0()){
                        echo '<li class="vibebp-login">'.apply_filters('wplms_login_trigger','<a class="login" href="'.get_bloginfo('url').'/login-register">'.__('Login','vibe').'</a>').'</li>';
                        do_action('wp_head_wplms_login');
                    }else{


                      if ( !is_page_template('event-dashboard.php')){
                    if ( function_exists('bp_loggedin_user_link') && is_user_logged_in() ) :
                        ?>
                            <li><a href="<?php bp_loggedin_user_link(); ?>" class="smallimg vbplogin dropdown-toggle"><?php $n=vbp_current_user_notification_count(); echo ((isset($n) && $n)?'<em></em>':''); bp_loggedin_user_avatar( 'type=full' ); ?><?php bp_loggedin_user_fullname(); ?></a></li>
                            <?php do_action('wplms_header_top_login'); ?>

                    <?php
                    else :
                        ?>
                            <li>
                              
                              <a href="<?php get_bloginfo('url')?>/login-register" class="vbplogin dropdown-toggle"><?php _e('Login','vibe'); ?></a>
                            </li>
                            <li><?php
                                $enable_signup = apply_filters('wplms_enable_signup',0);
                                if ( $enable_signup ) :
                                $registration_link = apply_filters('wplms_buddypress_registration_link',site_url( BP_REGISTER_SLUG . '/' ));
                                printf( __( '<a href="%s" class="vbpregister dropdown-toggle" title="'.__('Create an account','vibe').'">'.__('Sign Up','vibe').'</a> ', 'vibe' ), $registration_link );
                            endif; ?>
                            </li>
                    <?php
                    endif;
                }}
                ?>
                </ul>
            </div>
        </div>
    </header>
    <div class="navigation-wrapper">
        <button class="home-button" type="button"></button>
        <ul class="top">
        <?php
            $current_user = wp_get_current_user();
            $username = $current_user->user_nicename;    
            $args = array(
                'theme_location'  => 'sidebar-menu',
            );

            wp_nav_menu( $args );
        ?>
        <!-- <li class="responsive">hello</li> -->
        </ul>
          <ul class="mobile">
              <li><a href='/?s'>Search</a></li>
              <?php if (!is_user_logged_in()){ ?>
                <li><a href="<?php echo get_bloginfo('url').'/login-register'?>">Login</a></li>
              <?php }else{ 
                  /*$args = array(
                      'theme_location'  => 'mobile-sidebar-menu',
                  );

                wp_nav_menu( $args );*/
              ?>
              <li><a href="<?php echo bloginfo('url').'/members-directory/'.$username.'"'?>"><span class="vicon"></span>My Profile </a></li>
              <li><a class="vibebp-logout" href="<?php echo wp_logout_url( get_permalink() ); ?>"><span class="vicon"></span>Logout </a></li>
              <?php }?>
          </ul>
        <ul class="bottom">
            <?php
               $menu_name = 'footer-menu'; //menu slug
               $locations = get_nav_menu_locations();
               $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
               $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
               //print_r($menuitems);
               foreach ($menuitems as $menu) {
                   echo '<li><a href="' . $menu->url . '">' . $menu->title . '</a></li>';
               }
            ?>
        </ul>
    </div>
        <div id="close-navigation-header">



