<?php
//Header File
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php
    wp_head();
?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MXXRRC3');</script>
<!-- End Google Tag Manager -->
<script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>
<script>
  window.googletag = window.googletag || {cmd: []};
  googletag.cmd.push(function() {
    googletag.defineSlot('/1055314/HT_School_Desktop_Home/HT_School_Desk_HP_MID_A_Mrec', [[300,250]], 'div-gpt-ad-1619596100543-0').addService(googletag.pubads());
    googletag.defineSlot('/1055314/HT_School_Desktop_Home/HT_School_Desk_HP_Footer_Billboard', [[728,90], [970,90], [970,250], [1290,250],[980,90], [970,90]], 'div-gpt-ad-1619596100543-1').addService(googletag.pubads());

    googletag.defineSlot('/1055314/HT_School_Desktop_Section/HT_School_Desk_Section_MID_A_Billboard', [[728,90], [970,90], [970,250], [1290,250],[980,90], [970,90]], 'div-gpt-ad-1619596100543-2').addService(googletag.pubads()); 
     googletag.defineSlot('/1055314/HT_School_Desktop_Section/HT_School_Desk_Section_MID_A_Mrec', [[728,90], [970,90], [970,250], [1290,250],[980,90], [970,90]], 'div-gpt-ad-1619596100543-3').addService(googletag.pubads());  
     googletag.defineSlot('/1055314/HT_School_Desktop_Story/HT_School_Desk_Story_MID_A_Billboard', [[728,90], [970,90], [970,250], [1290,250],[980,90], [970,90]], 'div-gpt-ad-1619596100543-4').addService(googletag.pubads());
     googletag.defineSlot('/1055314/HT_School_Desktop_Story/HT_School_Desk_Story_MID_A_Billboard', [[728,90], [970,90], [970,250], [1290,250],[980,90], [970,90]], 'div-gpt-ad-1619596100543-5').addService(googletag.pubads());     
    googletag.defineSlot('/1055314/HT_School_Desktop_Story/HT_School_Desk_Story_Footer_Billboard', [[728,90], [970,90], [970,250], [1290,250],[980,90], [970,90]], 'div-gpt-ad-1619596100543-6').addService(googletag.pubads());
    
      googletag.defineSlot('/1055314/HT_School_Desktop_Section/HT_School_Desk_Section_MID_A_Mrec', [[728,90], [970,90], [970,250], [1290,250],[980,90], [970,90]], 'div-gpt-ad-1619596100543-7').addService(googletag.pubads());
    googletag.defineSlot('/1055314/HT_School_Desktop_Story/HT_School_Desk_Story_MID_A_Mrec', [[728,90], [970,90], [970,250], [1290,250],[980,90], [970,90]], 'div-gpt-ad-1619596100543-8').addService(googletag.pubads());  
    googletag.pubads().enableSingleRequest();
    googletag.pubads().collapseEmptyDivs();
    googletag.enableServices();
  });
</script>
</head>
<body <?php body_class(); ?>>
<div id="global" class="global">
    <?php
        get_template_part('mobile','sidebar');
    ?>
    <div class="pusher">
        <?php
            $fix=vibe_get_option('header_fix');
        ?>
        <div id="" class="header fixed-top <?php if(isset($fix) && $fix){echo 'fix';} ?>">
            <div class="fix-background">
  <div class="navegacion">
          <div class="menu-back">
            <span class="close-navigation"></span>
            <ul class="menu">
              
                <!--titular-->
              <?php
                    $args = array(
                        'theme_location'  => 'sidebar-menu',
                    );

                    wp_nav_menu( $args );
                ?>

                
                <div class="mobile_menu">
                  <ul>
                      <li><a href='/?s'>Search</a></li>
                      <li><a href="<?php echo get_bloginfo('url').'/login-register'?>">Login</a></li>
                  </ul>
                </div>
                <div class="bootom-link">
                    <ul>
                        <?php
                            $args = array(
                                'theme_location'  => 'contact-menu',
                            );

                            wp_nav_menu( $args );
                        ?> 
                    </ul>
                    <ul class="border-link">
                        <?php
                           $menu_name = 'footer-menu'; //menu slug
                           $locations = get_nav_menu_locations();
                           $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
                           $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
                           //print_r($menuitems);
                           foreach ($menuitems as $menu) {  
                            if($menu->title != 'Contact Us'){
                               echo '<li><a href="' . $menu->url . '">' . $menu->title . '</a></li>';
                            }
                           }
                       ?>

                    </ul>
                    <ul class="border-link">
                        <p>© HT Media Limited All rights reserved.</p>
                    </ul>
                </div>
            </ul>
        </div>
    </div>
</div>


            <div class="<?php echo vibe_get_container(); ?> d-flex align-items-center justify-content-between" >
            
                <div class="col-lg-4 mrg left-menu">
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
                           echo "<nav class='menu-primary-menu-container'><ul id='menu-primary-menu' class='menu'>";
                           foreach ($menuitems as $menu) {  
                            $current = ( $_SERVER['REQUEST_URI'] == parse_url( $menu->url, PHP_URL_PATH ) ) ? 'active' : '';
                              if($menu->title == 'Menu'){ 
                                echo '<li class="border-menu ' . $current . ' "><a>' . $menu->title . '</a></li>';
                              }
                              else{
                                if(is_user_logged_in()){
                                  foreach ($logged_in_menuitems as $loggedin_menu) { 
                                  $current_logged_in = ( $_SERVER['REQUEST_URI'] == parse_url( $loggedin_menu->url, PHP_URL_PATH ) ) ? 'active' : '';
                                    echo '<li class="my-course ' . $current_logged_in . '"><a href="' . $loggedin_menu->url . '">'.$loggedin_menu->title.'</a></li>';
                                }
                                  }
                                else{
                                  echo '<li class="custom-dropdown ' . $current . '"><a href="' . $menu->url . '">'.$menu->title.'</a></li>';
                                }
                              }
                           }
                          echo "</ul></nav>";
                    ?>
                    <a id="trigger">
                        <span class="lines"></span>
                    </a> 
                </div>
                <div class="middle-menu col-sm-2 col-lg-4">
                    <i class="bi bi-list mobile-nav-toggle"></i>
                    <?php
                    $template_file = get_post_meta( get_the_ID(), '_wp_page_template', TRUE );
                    //print_r($template_file);
                        $url = apply_filters('wplms_logo_url',VIBE_URL.'/assets/images/logo.png','header');
                        if(!empty($url)){
                    ?>
                        <?php if ( is_page_template('all-courses.php') || is_page_template('my-course.php') ) { ?>
                        <a href="<?php echo vibe_site_url(); ?>" class="homeicon"><img src="<?php $logo_top = vibe_get_option('headertop_logo'); echo isset($logo_top)?$logo_top:apply_filters('wplms_logo_url',VIBE_URL.'/images/logo.png'); ?>" alt="<?php echo get_bloginfo('name'); ?>" title="<?php echo get_bloginfo('name'); ?>" /></a>
                        
                    <?php
                    }
                    else{?>
                        <a href="<?php echo vibe_site_url(); ?>" class="logo d-flex align-items-center"><img src="<?php  echo vibe_sanitizer($url,'url'); ?>" width="100" height="48" alt="<?php echo get_bloginfo('name'); ?>" title="<?php echo get_bloginfo('name'); ?>" /></a>

                    <?php }
                        }
                    ?>
                </div>
                <div class="col-sm-10 col-lg-4 mrg right-menu">
                <ul class="topmenu custom_topmenu">

                    <?php
                    if(function_exists('is_wplms_4_0') && is_wplms_4_0()){
                        echo '<li class="vibebp-login">'.apply_filters('wplms_login_trigger','<a href="'.get_bloginfo('url').'/login-register" rel="nofollow" >
                          <span class="icon"><img src="'.get_bloginfo('template_url').'/assets/images/login-profile.svg" alt="Login Profile" title="Login Profile"/></span>
                          <span class="text">'.__('Login','vibe').'</span>
                          </a>').'</li>';
                        do_action('wp_head_wplms_login');
                    }else{

                    
                    if ( function_exists('bp_loggedin_user_link') && is_user_logged_in() ) :
                        ?>
                            <li><a href="<?php bp_loggedin_user_link(); ?>" class="smallimg vbplogin"><?php $n=vbp_current_user_notification_count(); echo ((isset($n) && $n)?'<em></em>':''); bp_loggedin_user_avatar( 'type=full' ); ?><?php bp_loggedin_user_fullname(); ?></a></li>
                            <?php do_action('wplms_header_top_login'); ?>
                        
                    <?php
                    else :
                        ?>
                            <li><a href="<?php get_bloginfo('url')?>/login-register" class="vbplogin"><?php _e('Login','vibe'); ?></a></li>
                            <li><?php 
                                $enable_signup = apply_filters('wplms_enable_signup',0);
                                if ( $enable_signup ) : 
                                $registration_link = apply_filters('wplms_buddypress_registration_link',site_url( BP_REGISTER_SLUG . '/' ));
                                printf( __( '<a href="%s" class="vbpregister" title="'.__('Create an account','vibe').'">'.__('Sign Up','vibe').'</a> ', 'vibe' ), $registration_link );
                            endif; ?>
                            </li>
                    <?php
                    endif;
                }
                ?>
                </ul>

                <?php
                   $menu_name = 'top-menu'; //menu slug
                   $locations = get_nav_menu_locations();
                   $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
                   $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
                   //print_r($menuitems);
                   echo "<ul class='after_loginspace'><li class='search-icon'><a href='/?s'><img alt='Search' title='Search' src=".get_bloginfo('template_url')."/assets/images/search.svg></a></li>";
                   do_action('woocommerce_add_to_cart_fragments'); 
                   if (is_user_logged_in()){
                       /*do_action('notification_fragments');*/
                    }
                   echo "<li class='mobile-display'><a href='".get_bloginfo('url')."/editorsdesk'><img alt='News' title='News' src=".get_bloginfo('template_url')."/assets/images/news-icon.svg></a></li>";
                   foreach ($menuitems as $menu) {  ?>
                       <li><a href="<?php echo $menu->url; ?>" target="_blank"><span class="icon"><img alt='e-paper' title='e-paper' src="<?php bloginfo('template_url'); ?>/assets/images/ePaper-icon.svg"/></span><span class="text"><?php echo $menu->title; ?></span></a></li>
                   <?php }
                   echo "</ul>";
                   ?>
                </div>
            </div>
        </div>
        <div id="close-navigation-header">


        
