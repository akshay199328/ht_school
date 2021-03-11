<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php 

    // WordPress 5.2 wp_body_open implementation
    if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    } else {
        do_action( 'wp_body_open' );
    }

?>

 <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <div class="col-lg-4 mrg left-menu">
          <nav id="navbar" class="navbar navbar-expand-xl p-0">
            <?php
                wp_nav_menu(array(
                'theme_location'    => 'primary',
                'container'       => 'div',
                'container_id'    => 'main-nav',
                'container_class' => 'collapse navbar-collapse justify-content-end',
                'menu_id'         => false,
                'menu_class'      => 'navbar-nav',
                'depth'           => 3,
                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                'walker'          => new wp_bootstrap_navwalker()
                ));
            ?>
            
          </nav>
      </div>
      <div id="" class="middle-menu col-lg-4">
        <?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
            <a href="<?php echo esc_url( home_url( '/' )); ?>" class="logo d-flex align-items-center">
                <img src="<?php echo esc_url(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
            </a>
        <?php else : ?>
            <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>" class="logo d-flex align-items-center"><?php esc_url(bloginfo('name')); ?></a>
        <?php endif; ?>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </div><!-- .navbar -->
      <div class="col-lg-4 mrg right-menu">
          <nav id="navbar" class="navbar navbar-expand-xl p-0">
            <?php
                wp_nav_menu(array(
                'theme_location'    => 'secondary',
                'container'       => 'div',
                'container_id'    => 'main-nav',
                'container_class' => 'collapse navbar-collapse justify-content-end',
                'menu_id'         => false,
                'menu_class'      => 'navbar-nav',
                'depth'           => 3,
                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                'walker'          => new wp_bootstrap_navwalker()
                ));
            ?>
            
          </nav>
      </div>

    </div>
  </header><!-- End Header -->