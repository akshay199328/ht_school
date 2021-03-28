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
                       echo '<li class="' . $current . '"><a href="' . $menu->url . '">' . $menu->title . '</a><span class="close-navigation"></span></li>';
                       
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
                        $args = apply_filters('wplms-main-menu',array(
                             'theme_location'  => 'main-menu',
                             'container'       => 'nav',
                             'menu_class'      => 'menu',
                             // 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s<li><a id="new_searchicon"><i class="vicon vicon-search"></i></a></li></ul>',
                             'walker'          => new vibe_walker,
                             'fallback_cb'     => 'vibe_set_menu'
                         ));
                        wp_nav_menu( $args ); 
                    ?>
                    <a id="trigger">
                        <span class="lines"></span>
                    </a> 
                </div>
                <div class="middle-menu col-lg-4">
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
                <div class="col-lg-4 mrg right-menu">
                <ul class="topmenu custom_topmenu">
                    <?php
                    if(function_exists('is_wplms_4_0') && is_wplms_4_0()){
                        echo '<li class="vibebp-login">'.apply_filters('wplms_login_trigger','<a href="#login" rel="nofollow" ><span>'.__('Login','vibe').'</span></a>').'</li>';
                        do_action('wp_head_wplms_login');
                    }else{

                    
                    if ( function_exists('bp_loggedin_user_link') && is_user_logged_in() ) :
                        ?>
                            <li><a href="<?php bp_loggedin_user_link(); ?>" class="smallimg vbplogin"><?php $n=vbp_current_user_notification_count(); echo ((isset($n) && $n)?'<em></em>':''); bp_loggedin_user_avatar( 'type=full' ); ?><?php bp_loggedin_user_fullname(); ?></a></li>
                            <?php do_action('wplms_header_top_login'); ?>
                        
                    <?php
                    else :
                        ?>
                            <li><a href="#login" class="vbplogin"><?php _e('Login','vibe'); ?></a></li>
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
                   if (is_user_logged_in()){
                       do_action('woocommerce_add_to_cart_fragments'); 
                    }
                ?>
                <?php
                   $menu_name = 'top-menu'; //menu slug
                   $locations = get_nav_menu_locations();
                   $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
                   $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
                   //print_r($menuitems);
                   echo "<ul>";
                   foreach ($menuitems as $menu) {  ?>
                       <li><a href="<?php echo $menu->url; ?>"></a><span class="icon"><img src="<?php bloginfo('template_url'); ?>/assets/images/ePaper-icon.png"/></span><span class="text"><?php echo $menu->title; ?></span></span></li>
                   <?php }
                   echo "</ul>";
                   ?>
                </div>
            </div>
        </div>
        
