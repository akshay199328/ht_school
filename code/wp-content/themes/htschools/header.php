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
            <ul class="menu">
              <span class="close-navigation"></span>
                <!--titular-->
              <!--   <?php
                    $args = array(
                        'theme_location'  => 'sidebar-menu',
                    );

                    wp_nav_menu( $args );
                ?> -->

                <?php
                   $menu_name = 'sidebar-menu'; //menu slug
                   $locations = get_nav_menu_locations();
                   $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
                   $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
                   //print_r($menuitems);
                   foreach ($menuitems as $menu) {  
                   $current = ( $_SERVER['REQUEST_URI'] == parse_url( $menu->url, PHP_URL_PATH ) ) ? 'active' : '';
                    if($menu->title == 'Home'){
                       echo '<li class="' . $current . '"><a href="' . $menu->url . '">' . $menu->title . '</a></li>';
                       
                        }else{
                          // Print menu item
                          echo '<li class="' . $current . '"><a href="' . $menu->url . '">' . $menu->title . '</a></li>';
                        } 
                    }
                   
               ?>
                
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
                           //print_r($menuitems);
                           echo "<nav class='menu-primary-menu-container'><ul id='menu-primary-menu' class='menu'>";
                           foreach ($menuitems as $menu) {  
                            $current = ( $_SERVER['REQUEST_URI'] == parse_url( $menu->url, PHP_URL_PATH ) ) ? 'active' : '';
                              if($menu->title == 'Home'){ 
                                echo '<li class="border-menu ' . $current . ' "><a href="' . $menu->url . '">' . $menu->title . '</a></li>';
                              }
                              else{
                                if(is_user_logged_in()){
                                  $user = wp_get_current_user();
                                  $username = $user->user_login;
                                  echo '<li class="custom-dropdown ' . $current . '"><a href="' . get_bloginfo('url') . '/my-courses">My Courses</a></li>';
                                }
                                else{
                                  echo '<li class="custom-dropdown ' . $current . '"><a href="' . $menu->url . '">Courses</a></li>';
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
                        $url = apply_filters('wplms_logo_url',VIBE_URL.'/assets/images/logo.png','header');
                        if(!empty($url)){
                    ?>
                        <a href="<?php echo vibe_site_url(); ?>" class="logo d-flex align-items-center"><img src="<?php  echo vibe_sanitizer($url,'url'); ?>" width="100" height="48" alt="<?php echo get_bloginfo('name'); ?>" /></a>
                    <?php
                        }
                    ?>
                </div>
                <div class="col-sm-10 col-lg-4 mrg right-menu">
                <ul class="topmenu custom_topmenu">

                    <?php
                    if(function_exists('is_wplms_4_0') && is_wplms_4_0()){
                        echo '<li class="vibebp-login">'.apply_filters('wplms_login_trigger','<a href="'.get_bloginfo('url').'/login-register" rel="nofollow" >
                          <span class="icon"><img src="'.get_bloginfo('template_url').'/assets/images/login-profile.svg"/></span>
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
                   echo "<ul class='after_loginspace'><li class='search-icon'><a href='/?s'><img src=".get_bloginfo('template_url')."/assets/images/search.svg></a></li>";
                   do_action('woocommerce_add_to_cart_fragments'); 
                   if (is_user_logged_in()){
                       /*do_action('notification_fragments');*/
                    }
                   foreach ($menuitems as $menu) {  ?>
                       <li><a href="<?php echo $menu->url; ?>"><span class="icon"><img src="<?php bloginfo('template_url'); ?>/assets/images/ePaper-icon.svg"/></span><span class="text"><?php echo $menu->title; ?></span></a></li>
                   <?php }
                   echo "</ul>";
                   ?>
                </div>
            </div>
        </div>
        <div id="close-navigation-header">


        
