<?php
/**
 * Template Name: Event Prelaunch page
 */
if ( !defined( 'ABSPATH' ) ) exit;

get_header(vibe_get_header());
?>
<link href="<?php echo get_bloginfo('template_url'); ?>/assets/css/codeathon-bootstrap.css" rel="stylesheet">
<link href="<?php echo get_bloginfo('template_url'); ?>/assets/css/codeathon.min.css?<?php echo date("H:i:s");?>" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
<link rel="icon" type="image/svg" href="<?php echo bloginfo('template_url')?>/assets/images/favicon.svg"/>
<?php
$user = wp_get_current_user();
$userIdentifier = $user->ID;

$results1 = $wpdb->get_results("SELECT `ID` FROM `ht_posts` WHERE `post_type` = 'events' and post_status = 'publish' ORDER BY `ID`");
foreach($results1 as $row1){ 
  $post_id = $row1->ID; 
} 
?>
<div class="owl-carousel owl-theme home_slider <?php echo $dotBannerCount; ?>">
  <?php
    $args1 = array(
      'post_type' => 'event_banner',
      'post_status' => 'publish',
      'orderby' => 'publish_date',
      'order' => 'DESC',        
      'meta_query'  => array(
        'relation'  => 'AND',
        array(
          'key'   =>'select_event',
          'value'   =>$post_id,
          'compare' => '='
          )
        )
    );
    $Query1 = new WP_Query( $args1 );
    
    if ($Query1->have_posts()) : while ($Query1->have_posts()) : $Query1->the_post();
      $custom_fields = get_post_custom();
      $image_url = wp_get_attachment_url($custom_fields['upload_image'][0]);
  ?>
  <div class="item">
      <img src="<?php echo $image_url; ?>">
      <div class="caption">
          <?php echo $custom_fields['description'][0];?>
      </div>
  </div>
  <?php endwhile;endif; ?>
</div>

<section class="section-wrapper learning">
	<div class="section-copy">
		<span class="left-doodle"></span>
		<h2 class="section-title">Learning Modules</h2>
		<div class="column-wrapper">
			<div class="column">
    			<span class="title">Classes IV - V</span>
    			<span class="video"><img src="images/learning/01.jpeg"></span>
    			<span class="sub-title">Website Development with HTML & CSS</span>
    			<p>HTML is the foundation of all web pages. It defines the structure of a page, CSS defines its style and Javascript adds functionality. </p>
    			<a class="enroll" href="#!">Enroll Now</a>
    		</div>
    		<div class="column">
    			<span class="title">Classes VI - VII</span>
    			<span class="video"><img src="images/learning/01.jpeg"></span>
    			<span class="sub-title">Website Development with HTML & CSS</span>
    			<p>HTML is the foundation of all web pages. It defines the structure of a page, CSS defines its style and Javascript adds functionality. </p>
    			<a class="enroll" href="#!">Enroll Now</a>
    		</div>
    		<div class="column">
    			<span class="title">Classes VIII - IX</span>
    			<span class="video"><img src="images/learning/01.jpeg"></span>
    			<span class="sub-title">Game Development with Python</span>
    			<p>HTML is the foundation of all web pages. It defines the structure of a page, CSS defines its style and Javascript adds functionality. </p>
    			<a class="enroll" href="#!">Enroll Now</a>
    		</div>
		</div>
	</div>
	<span class="gray-code"></span>
	<span class="code"></span>
</section>
<?php include("includes/footer.php"); ?>