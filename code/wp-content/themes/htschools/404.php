<?php
/*if ( ! defined( 'ABSPATH' ) ) exit;

if(is_404()){
	$error404 = vibe_get_option('error404');
    if(isset($error404)){
        $page_id=  intval($error404);
        if(function_exists('icl_object_id')){
	        $page_id = icl_object_id($page_id, 'page', true);
	    }
        wp_redirect( get_permalink( $page_id ),301); 
        exit;
    }
    
}*/
?>
<?php
/**
 * Template Name: My Courses
 */
if ( !defined( 'ABSPATH' ) ) exit;

get_header(vibe_get_header());
?>
<main id="main">
	<section class="page_not_found grey-background">
	  <div class="container">
	    <div class="row">
	      <div class="details">
	        <img src="<?php echo get_bloginfo('template_url').'/assets/images/404.png'?>" class="img-fluid" />
	        <h6>PAGE NOT FOUND</h6>
	        <p>We are sorry, but the page you are looking for can't be found.</p>
	        <a href="<?php echo  get_bloginfo('url').'/courses'?>"><button class="btn">Explore our Courses</button></a>
	      </div>
	    </div>
	  </div>
	</section>
</main>
<?php
get_footer(vibe_get_footer());
?>
