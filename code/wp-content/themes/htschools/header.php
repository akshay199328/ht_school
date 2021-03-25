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
        <div id="headertop" class="header <?php if(isset($fix) && $fix){echo 'fix';} ?>">
            <div class="fix-background">
  <div class="navegacion">
          <div class="menu-back">
            <ul class="menu">
                <!--titular-->
                <?php
                    $args = array(
                        'theme_location'  => 'sidebar-menu',
                    );

                    wp_nav_menu( $args );
                ?>
                
                <div class="bootom-link">
                    <ul>
                        <li><a href="#">Help & Support</a></li>
                        <li><a href="#">Contact us</a><li>
                    </ul>
                    <ul class="border-link">
                        <?php
                            $args = array(
                                'theme_location'  => 'footer-menu',
                                'container'       => '',
                                'depth'           => 1,
                                'menu_class'      => '',
                                'fallback_cb'     => 'vibe_set_menu',
                            );
                            wp_nav_menu( $args );
                        ?>
                    </ul>
                </div>
            </ul>
        </div>
    </div>
</div>
            <div class="<?php echo vibe_get_container(); ?>">
            
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
                        <a href="<?php echo vibe_site_url(); ?>"><img src="<?php  echo vibe_sanitizer($url,'url'); ?>" width="100" height="48" alt="<?php echo get_bloginfo('name'); ?>" /></a>
                    <?php
                        }
                    ?>
                </div>
                <div class="col-lg-4 mrg right-menu">
                <ul class="topmenu">
                    <?php
                    if(function_exists('is_wplms_4_0') && is_wplms_4_0()){
                        echo '<li>'.apply_filters('wplms_login_trigger','<a href="#login" rel="nofollow" class=" vibebp-login"><span>'.__('LOGIN','vibe').'</span></a>').'</li>';
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
                    $args = apply_filters('wplms-top-menu',array(
                        'theme_location'  => 'top-menu',
                        'container'       => '',
                        'depth'           => 1,
                        'menu_class'      => 'topmenu',
                        'fallback_cb'     => 'vibe_set_menu',
                    ));

                    wp_nav_menu( $args );
                ?>
                </div>
            </div>
        </div>
        
