<?php
/**
 * Template Name: Event Template
 */

if ( !defined( 'ABSPATH' ) ) exit;

include("includes/lead.php");

$results1 = $wpdb->get_results("SELECT `ID` FROM `ht_posts` WHERE `post_type` = 'events' ORDER BY `ID` ASC LIMIT 1");
foreach($results1 as $row1){ 
  $post_id = $row1->ID; 
}

function getData($wpdb, $post_id, $meta_key){

  $results = $wpdb->get_results( "SELECT * FROM `ht_postmeta` WHERE `post_id` = '$post_id' AND `meta_key` = '$meta_key'");
  foreach($results as $row){ 
    return $row->meta_value; 
  }

}

$course_1 = getData($wpdb, $post_id, 'course_1');
$course_2 = getData($wpdb, $post_id, 'course_2');
$course_3 = getData($wpdb, $post_id, 'course_3');

?>
<div class="owl-carousel owl-theme home_slider">
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

<section class="section-wrapper about-code">
  <?php 
    $results = $wpdb->get_results( "SELECT * FROM `ht_postmeta` WHERE `post_id` = '$post_id' AND `meta_key` = 'about_ht_codeathon'");
    foreach($results as $row){ 
      $about_ht_codeathon = $row->meta_value; 
    }
  ?>
  <div class="section-copy">
    <?php echo $about_ht_codeathon; ?>
  </div>
</section>

<!--<section class="section-wrapper ad">
  <img src="images/ad.png">
</section>-->

<section class="section-wrapper learning">
  <div class="section-copy">
    <span class="left-doodle"></span>
    <h2 class="section-title">Learning Modules</h2>
    <div class="column-wrapper">
    <?php 
      $product_id1 = get_post_meta($course_1,'vibe_product',true);
        
      global $woocommerce;
      $woocommerce->cart->add_to_cart($product_id1);

    ?>
      <div class="column">
        <span class="title">Classes IV - V</span>
        <span class="video"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($course_1), 'thumbnail'); ?>"></span>
        <span class="sub-title"><?php echo get_the_title($course_1); ?></span>
        <p><?php echo get_the_excerpt($course_1); ?></p>
        <a class="enroll" href="<?php echo $woocommerce->cart->get_cart_url(); ?>">Enroll Now</a>
      </div>
    <?php 
      $product_id2 = get_post_meta($course_2,'vibe_product',true);
        
      global $woocommerce;
      $woocommerce->cart->add_to_cart($product_id2);

    ?>
      <div class="column">
        <span class="title">Classes VI - VII</span>
        <span class="video"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($course_2), 'thumbnail'); ?>"></span>
        <span class="sub-title"><?php echo get_the_title($course_2); ?></span>
        <p><?php echo get_the_excerpt($course_2); ?></p>
        <a class="enroll" href="<?php echo $woocommerce->cart->get_cart_url(); ?>">Enroll Now</a>
      </div>
    <?php 
      $product_id3 = get_post_meta($course_3,'vibe_product',true);
        
      global $woocommerce;
      $woocommerce->cart->add_to_cart($product_id3);

    ?>
      <div class="column">
        <span class="title">Classes VIII - IX</span>
        <span class="video"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($course_3), 'thumbnail'); ?>"></span>
        <span class="sub-title"><?php echo get_the_title($course_3); ?></span>
        <p><?php echo get_the_excerpt($course_3); ?></p>
        <a class="enroll" href="<?php echo $woocommerce->cart->get_cart_url(); ?>">Enroll Now</a>
      </div>
    </div>
  </div>
<span class="gray-code"></span>
<span class="code"></span>
</section>

<section class="section-wrapper it-works">
  <?php 
    $results = $wpdb->get_results( "SELECT * FROM `ht_postmeta` WHERE `post_id` = '$post_id' AND `meta_key` = 'how_it_works'");
    foreach($results as $row){ 
      $how_it_works = $row->meta_value; 
    }
  ?>
  <div class="section-copy">
    <h2 class="section-title">How it works</h2>
    <?php echo $how_it_works; ?>
  </div>
</section>

<section class="section-wrapper about">
  <div class="section-copy">
    <h2 class="section-title">About Our Partners</h2>
    <div class="owl-carousel owl-theme about_slider">
      <?php
        $args1 = array(
          'post_type' => 'about_our_partners',
          'post_status' => 'publish',
          'orderby' => 'publish_date',
          'order' => 'DESC',        
          'nopaging' => true
        );
        $Query1 = new WP_Query( $args1 );
        
        if ($Query1->have_posts()) : while ($Query1->have_posts()) : $Query1->the_post();
          $custom_fields = get_post_custom();
          $image_url = wp_get_attachment_url($custom_fields['upload_image'][0]);
      ?>
        <div class="item">
            <div class="partner-copy">
              <figure class="image"><img src="<?php echo $image_url; ?>"></figure>
              <div class="copy">
                <h3 class="title">Lorem ipsum dolor sit amet,<?php //echo $custom_fields['event_blog_title'][0];?></h3>
                <p><?php echo $custom_fields['description'][0];?></p>
                <a class="read-more" href="<?php echo $custom_fields['link'][0];?>">Visit Partner >></a>
              </div>
            </div>
        </div>
      <?php endwhile;endif; ?>
    </div>
  </div>
</section>

<section class="section-wrapper videos">
  <div class="section-copy">
    <h2 class="section-title">What Our Partners Say</h2>
    <div class="owl-carousel owl-theme says_slider">
      <?php
        $args1 = array(
          'post_type' => 'what_our_partners_sa',
          'post_status' => 'publish',
          'orderby' => 'publish_date',
          'order' => 'DESC',        
          'nopaging' => true
        );
        $Query1 = new WP_Query( $args1 );
        
        if ($Query1->have_posts()) : while ($Query1->have_posts()) : $Query1->the_post();
          $custom_fields = get_post_custom();
      ?>
        <div class="item-video">
            <a class="owl-video" href="<?php echo $custom_fields['link'][0];?>"></a>
        </div>
      <?php endwhile;endif; ?>
    </div>
  </div>
</section>

<section class="section-wrapper partners">
  <div class="section-copy">
    <h2 class="section-title">Our Partners Logo</h2>
    <div class="owl-carousel owl-theme partners_slider">
      <?php
        $args1 = array(
          'post_type' => 'our_partners_logos',
          'post_status' => 'publish',
          'orderby' => 'publish_date',
          'order' => 'DESC',        
          'nopaging' => true
        );
        $Query1 = new WP_Query( $args1 );
        
        if ($Query1->have_posts()) : while ($Query1->have_posts()) : $Query1->the_post();
          $custom_fields = get_post_custom();
          $image_url = wp_get_attachment_url($custom_fields['upload_image'][0]);
      ?>
        <div class="item">
            <span class="logo"><img src="<?php echo $image_url; ?>"></span>
        </div>
      <?php endwhile;endif; ?>
    </div>
  </div>
</section>

<section class="section-wrapper school">
  <div class="section-copy">
    <h2 class="section-title">School Logos</h2>
    <div class="owl-carousel owl-theme school_slider">
      <?php
        $args1 = array(
          'post_type' => 'school_logos',
          'post_status' => 'publish',
          'orderby' => 'publish_date',
          'order' => 'DESC',        
          'nopaging' => true
        );
        $Query1 = new WP_Query( $args1 );
        
        if ($Query1->have_posts()) : while ($Query1->have_posts()) : $Query1->the_post();
          $custom_fields = get_post_custom();
          $image_url = wp_get_attachment_url($custom_fields['upload_image'][0]);
      ?>
        <div class="item">
            <span class="logo"><img src="<?php echo $image_url; ?>"></span>
        </div>
      <?php endwhile;endif; ?>
    </div>
  </div>
</section>

<section class="section-wrapper blogs">
  <div class="section-copy">
    <h2 class="section-title">Blogs</h2>
    <div class="owl-carousel owl-theme blog_slider">
      <?php
        $args1 = array(
          'post_type' => 'event_blogs',
          'post_status' => 'publish',
          'orderby' => 'publish_date',
          'order' => 'DESC',        
          'nopaging' => true
        );
        $Query1 = new WP_Query( $args1 );
        
        if ($Query1->have_posts()) : while ($Query1->have_posts()) : $Query1->the_post();
          $custom_fields = get_post_custom();
          $image_url = wp_get_attachment_url($custom_fields['upload_image'][0]);
      ?>
        <div class="item">
            <span class="image"><img src="<?php echo $image_url; ?>"></span>
            <h3 class="blog-title"><a href="#!"><?php echo $custom_fields['event_blog_title'][0];?></a></h3>
            <p><?php echo $custom_fields['description'][0];?></p>
            <a class="read-more" href="<?php echo $custom_fields['link'][0];?>">Read More >></a>
        </div>
      <?php endwhile;endif; ?>
    </div>
  </div>
</section>
<?php
include("includes/footer.php");
?>