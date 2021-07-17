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
        <header id="header" class="header sleek transparent <?php if(isset($fix) && $fix){echo 'fix';} ?>">
            <div class="<?php echo vibe_get_container(); ?>">
                <div class="col-lg-4 mrg left-menu">
                    <nav id="navbar" class="navbar navbar-expand-xl p-0">
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
                    </nav>
                </div>
                     <div id="" class="middle-menu col-lg-4">
                        <i class="bi bi-list mobile-nav-toggle"></i>
                        <?php 
                            $url = apply_filters('wplms_logo_url',VIBE_URL.'/assets/images/logo.png','header');
                            if(!empty($url)){
                        ?>
                        
                            <a href="<?php echo vibe_site_url('','logo'); ?>" class="logo d-flex align-items-center"><img src="<?php  echo vibe_sanitizer($url,'url'); ?>" alt="<?php echo get_bloginfo('name'); ?>" /></a>
                        <?php

                            }
                            ?>
                    </div>
                    <div class="col-lg-4 mrg right-menu">
                        <nav id="navbar" class="navbar navbar-expand-xl p-0">
                            <?php
                                $args = apply_filters('wplms-top-menu',array(
                                     'theme_location'  => 'top-menu',
                                     'container'       => 'nav',
                                     'menu_class'      => 'menu',
                                     'walker'          => new vibe_walker,
                                     'fallback_cb'     => 'vibe_set_menu'
                                 ));
                                wp_nav_menu( $args ); 
                            ?>
                        </nav>
                    </div>
                    <a id="trigger">
                        <span class="lines"></span>
                    </a>
                </div>
            </div>
        </header>
