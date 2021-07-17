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
        <header class="center sleek <?php if(isset($fix) && $fix){echo 'fix';} ?>">
            <div class="<?php echo vibe_get_container(); ?>">
                <div class="row">
                    <div class="col-md-4 col-sm-0 col-xs-0 col-0">
                        <?php

                            $args = apply_filters('wplms-main-menu',array(
                                 'theme_location'  => 'main-menu',
                                 'container'       => 'nav',
                                 'menu_class'      => 'menu',
                                 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                 'walker'          => new vibe_walker,
                                 'fallback_cb'     => 'vibe_set_menu'
                             ));
                            wp_nav_menu( $args ); 

                        ?>   
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 col-4">
                        <?php
                         if(is_front_page()){
                                echo '<h1 id="logo">';
                            }else{
                                echo '<h2 id="logo">';
                            }

                            $url = apply_filters('wplms_logo_url',VIBE_URL.'/assets/images/logo.png','header');
                            if(!empty($url)){
                            ?>
                        
                            <a href="<?php echo vibe_site_url(); ?>"><img src="<?php  echo vibe_sanitizer($url,'url'); ?>" alt="<?php echo get_bloginfo('name'); ?>" title="<?php echo get_bloginfo('name'); ?>" /></a>
                        <?php
                            }

                            if(is_front_page()){
                                echo '</h1>';
                            }else{
                                echo '</h2>';
                            }
                        ?>
                    </div>
                    <div class="col-md-4 col-sm-8 col-xs-8 col-8">
                       <ul class="topmenu">
                            <?php 
                            if(function_exists('is_wplms_4_0') && is_wplms_4_0()){

                                echo '<li>'.apply_filters('wplms_login_trigger','<a href="#login" rel="nofollow" class=" vibebp-login"><span>'.__('LOGIN','vibe').'</span></a>').'</li>';
                                
                                do_action('wp_head_wplms_login');
                            }else{


                                if ( function_exists('bp_loggedin_user_link') && is_user_logged_in() ) :
                                ?>
                                <li><a href="<?php bp_loggedin_user_link(); ?>" class="smallimg vbplogin"><?php $n=vbp_current_user_notification_count(); echo ((isset($n) && $n)?'<em></em>':''); bp_loggedin_user_avatar( 'type=full' ); ?><span><?php bp_loggedin_user_fullname(); ?></span></a></li>
                                <?php 
                                else:
                                ?>
                                <li><a href="#login" rel="nofollow" class=" vbplogin"><span><?php _e('LOGIN','vibe'); ?></span></a></li>
                                <?php 
                                endif;
                            }
                            ?>
                            <li><a id="new_searchicon"><i class="vicon vicon-search"></i></a></li>
                            <?php
                            if (apply_filters('wplms_show_mini_cart',function_exists('woocommerce_mini_cart'))) { global $woocommerce;
                            ?>
                            <li><a class=" vbpcart"><span class="vicon vicon-shopping-cart"><?php echo (($woocommerce->cart->cart_contents_count)?'<em>'.$woocommerce->cart->cart_contents_count.'</em>':''); ?></span></a>
                            <div class="woocart"><div class="widget_shopping_cart_content"><?php woocommerce_mini_cart(); ?></div></div>
                            </li>
                            <?php
                            }
                            ?>
                            <?php do_action('wplms_header_top_login'); ?>
                        </ul>
                        <?php

                        if(!function_exists('is_wplms_4_0') || !is_wplms_4_0()){

                             $style = vibe_get_login_style();
                            if(empty($style)){
                                $style='default_login';
                            }
                        ?>
                            <div id="vibe_bp_login" class="<?php echo vibe_sanitizer($style,'text'); ?>">
                            <?php
                                vibe_include_template("login/$style.php");
                             ?>
                           </div>
                       <?php
                       }
                       ?>
                    </div>
                    <a id="trigger">
                        <span class="lines"></span>
                    </a>
                </div>
            </div>
        </header>
