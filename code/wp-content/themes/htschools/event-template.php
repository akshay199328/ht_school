<?php
/**
 * Template Name: Event Template
 */

if ( !defined( 'ABSPATH' ) ) exit;

include("includes/lead.php");

function DB_Tables_Rows(){

  global $wpdb;
  $count_query = "SELECT count(*) FROM `ht_posts` WHERE `post_type` = 'event_banner' and post_status = 'publish'";
  $num = $wpdb->get_var($count_query);

  return  $num;

}

$bannerCount = DB_Tables_Rows();

if($bannerCount == 1){
  $dotBannerCount = "one";
}elseif($bannerCount == 2){
  $dotBannerCount = "two";
}elseif($bannerCount == 3){
  $dotBannerCount = "three";
}elseif($bannerCount == 4){
  $dotBannerCount = "four";
}elseif($bannerCount == 5){
  $dotBannerCount = "five";
}elseif($bannerCount == 6){
  $dotBannerCount = "six";
}elseif($bannerCount == 7){
  $dotBannerCount = "seven";
}elseif($bannerCount == 8){
  $dotBannerCount = "eight";
}elseif($bannerCount == 9){
  $dotBannerCount = "nine";
}elseif($bannerCount == 10){
  $dotBannerCount = "ten";
}else{
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

<section class="section-wrapper about-code" id="about_section">
  <?php 
    $results = $wpdb->get_results( "SELECT * FROM `ht_postmeta` WHERE `post_id` = '$post_id' AND `meta_key` = 'about_ht_codeathon'");
    foreach($results as $row){ 
      $about_ht_codeathon = $row->meta_value; 
    }

    $results2 = $wpdb->get_results( "SELECT * FROM `ht_postmeta` WHERE `post_id` = '$post_id' AND `meta_key` = 'about_popup'");
    foreach($results2 as $row2){ 
      $about_popup = $row2->meta_value; 
    }
  ?>
  <div class="section-copy">
    <?php echo $about_ht_codeathon; ?>
  </div>
</section>
<div class="modal fade about-popup" id="about-popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ABOUT ht codeathon</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21.657" height="21.657" viewBox="0 0 21.657 21.657">
                      <g id="Group_8" data-name="Group 8" transform="translate(-1045.728 -811.172)">
                        <line id="Line_2" data-name="Line 2" x1="16" y2="16" transform="translate(1048.556 814)" fill="none" stroke="#373737" stroke-linecap="round" stroke-width="4"/>
                        <line id="Line_3" data-name="Line 3" x2="16" y2="16" transform="translate(1048.556 814)" fill="none" stroke="#373737" stroke-linecap="round" stroke-width="4"/>
                      </g>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <?php echo $about_popup; ?>
            </div>
        </div>
    </div>
</div>

<section class="section-wrapper learning" id="learning_section">
  <div class="section-copy">
    <span class="left-doodle"></span>
    <h2 class="section-title">Learning Modules</h2>
    <div class="column-wrapper">
    <?php 
      $product_id1 = get_post_meta($course_1,'vibe_product',true);
      $product_id2 = get_post_meta($course_2,'vibe_product',true);
      $product_id3 = get_post_meta($course_3,'vibe_product',true);
        
      global $woocommerce;
      //$woocommerce->cart->add_to_cart($product_id1);  

      $course_status1 = 'course_status'.$course_1;
      $course_status2 = 'course_status'.$course_2;
      $course_status3 = 'course_status'.$course_3;

      $results1 = $wpdb->get_row("SELECT count(umeta_id) as course_status11 FROM `ht_usermeta` WHERE `user_id` = '$userIdentifier' and `meta_key` = '$course_status1'");
      $course_status11 = $results1->course_status11;

      $results2 = $wpdb->get_row("SELECT count(umeta_id) as course_status22 FROM `ht_usermeta` WHERE `user_id` = '$userIdentifier' and `meta_key` = '$course_status2'");
      $course_status22 = $results2->course_status22;

      $results3 = $wpdb->get_row("SELECT count(umeta_id) as course_status33 FROM `ht_usermeta` WHERE `user_id` = '$userIdentifier' and `meta_key` = '$course_status3'");
      $course_status33 = $results3->course_status33;

      $purchase_status = $course_status11+$course_status22+$course_status33;

      $link1 = get_post_meta($course_1,'vibe_trailer_link',true);
      $parts1 = explode("/", $link1);
      $viemocode1 = end($parts1);

      $link2 = get_post_meta($course_2,'vibe_trailer_link',true);
      $parts2 = explode("/", $link2);
      $viemocode2 = end($parts2);

      $link3 = get_post_meta($course_3,'vibe_trailer_link',true);
      $parts3 = explode("/", $link3);
      $viemocode3 = end($parts3);

    ?>
      <div class="column view_codeathon_course" data-id="<?php echo $course_1; ?>">
        <span class="title">Classes IV-V</span>
        <!-- <span class="video">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="<?php //echo get_post_meta($course_1,'vibe_trailer_link',true); ?>" allowfullscreen></iframe>
          </div>
        </span> -->
        <span class="video">
          <a class="play videoplayLearning" href="#!" data-bs-toggle="modal" data-bs-target="#video1-popup-learning" data-title="<?php echo get_the_title($course_1); ?>" data-viemocode="<?php echo $viemocode1; ?>"><img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/video-play.svg"></a>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 242 157.001">
            <path id="Subtraction_1" data-name="Subtraction 1" d="M-652-6903H-894v-157h242v157Zm-12.483-1.955a31.32,31.32,0,0,1,7.574.748l.174.043.144.036c.345.086.67.167.785.182a6.129,6.129,0,0,0,1.012.1c1.377,0,2.02-.789,2.151-2.628a24.333,24.333,0,0,0-.064-5.428,39.7,39.7,0,0,1-.283-4.506c-.224-15.934-.188-32.137-.154-47.807v-.015c.013-5.774.026-11.744.026-17.616,0-6.046-.009-12.119-.018-17.993-.026-16.7-.053-33.961.132-50.944.024-2.239-.16-3.933-1.134-4.917-.817-.826-2.156-1.179-4.478-1.179h-.252c-11.018.119-23.1.174-38.026.174-7.849,0-15.829-.015-23.545-.029h-.029c-6.645-.013-12.217-.022-17.809-.027-1.59,0-3.208-.142-4.772-.276h-.01l-.084-.007c-.363-.031-.725-.062-1.084-.091-15.27-1.238-31.253-1.866-47.505-1.866-8.08,0-16.22.158-24.194.47-6.029.236-12.018.534-17.81.822l-.105.005c-12.832.639-24.952,1.243-37.618,1.243-5.624,0-10.87-.119-16.038-.364-.323-.015-.627-.023-.9-.023-1.741,0-2.822.306-3.5.991-.775.778-1.1,2.1-1.092,4.435.184,45.854.186,92.578.005,138.874-.01,2.434.32,3.762,1.138,4.583s2.115,1.146,4.5,1.146h.081c28.967-.081,58.422-.087,86.907-.093h.249c27.833-.006,56.614-.012,85.105-.087,2.266-.006,4.528-.1,6.716-.185,2.227-.089,4.53-.182,6.779-.182a41.187,41.187,0,0,1,14.006,2.054,10.992,10.992,0,0,0,3.793.554c.471,0,.938-.014,1.432-.028l.082,0h.042c.57-.018,1.084-.032,1.613-.032.652,0,1.233.023,1.775.07.959.082,2.019.121,3.242.121,1.726,0,3.5-.077,5.371-.158h.008l.073,0C-668.338-6904.868-666.368-6904.955-664.484-6904.955Z" transform="translate(894 7060)" fill="#fff"/>
          </svg>
          <img class="video-hero" src="https://vumbnail.com/<?php echo $viemocode1; ?>.jpg">
          <!-- <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="<?php echo get_post_meta($course_1,'vibe_trailer_link',true); ?>" allowfullscreen></iframe>
          </div> -->
        </span>
        <span class="sub-title"><?php echo get_the_title($course_1); ?></span>
        <p><?php echo get_the_excerpt($course_1); ?></p>
      <?php if($purchase_status == 0){ ?>
        <?php
          $courseslug=get_site_url().'/?p='.$course_1;
          $category_array = get_the_terms($course_1,'course-cat');
          $coursePartner = "";
          $cb_course_id = get_post_meta($course_1,'celeb_school_course_id',true);
          if ($cb_course_id) {
            $coursePartner = "Celebrity School";
          }

          $aiws_course_id = get_post_meta($course_1,'aiws_program_id',true);
          if ($aiws_course_id) {
            $coursePartner = "AIWS";
          }

          $age_limit = get_post_meta($course_1,'vibe_course_age_group',true);
        ?>
        <a class="enroll add_to_wishlist_codeathon" href="<?php echo wc_get_cart_url() . '?add-to-cart=' . $product_id1 ?>" data-id="<?php echo $course_1; ?>">Enrol Now</a>
        <input type="hidden" id="course_name_<?php echo $course_1; ?>" value="<?php echo get_the_title($course_1); ?>">
        <input type="hidden" id="course_url_<?php echo $course_1; ?>" value="<?php echo $courseslug; ?>">
        <input type="hidden" id="course_category_<?php echo $course_1; ?>" value="<?php echo $category_array[0]->name;?>">
        <input type="hidden" id="course_partner_<?php echo $course_1; ?>" value="<?php echo $coursePartner; ?>">
        <input type="hidden" id="category_id_<?php echo $course_1; ?>" value="<?php echo $category_array[0]->term_id;?>">
        <input type="hidden" id="course_id_<?php echo $course_1; ?>" value="<?php echo $course_1; ?>">
        <input type="hidden" id="course_price_<?php echo $course_1; ?>" value="0">
        <input type="hidden" id="course_tax_<?php echo $course_1; ?>" value="0">
        <input type="hidden" id="age_group_<?php echo $course_1; ?>" value="<?php echo $age_limit;?>">
        <input type="hidden" id="course_duration_<?php echo $course_1; ?>" value="<?php echo get_post_meta($course_1, "vibe_validity", true);?>">
        <input type="hidden" id="session_duration_<?php echo $course_1; ?>" value="<?php echo get_post_meta($course_1, "vibe_course_session_length", true);?>">
        <input type="hidden" id="wishlisted_course_<?php echo $course_1; ?>" value="">
      <?php }else{ ?>
        <?php if($course_status11 == 1){ ?>
          <a class="enroll" href="<?php echo get_bloginfo('url'); ?>/event-dashboard">Go To Dashboard</a>
        <?php }else{ ?>
          <button class="enroll" disabled>Enrol Now</button>
        <?php } ?>
      <?php } ?>
      </div>
      <div class="column view_codeathon_course" data-id="<?php echo $course_2; ?>">
        <span class="title">Classes VI-VII</span>
        <span class="video">
          <a class="play videoplayLearning" href="#!" data-bs-toggle="modal" data-bs-target="#video1-popup-learning" data-title="<?php echo get_the_title($course_2); ?>" data-viemocode="<?php echo $viemocode2; ?>"><img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/video-play.svg"></a>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 242 157.001">
            <path id="Subtraction_1" data-name="Subtraction 1" d="M-652-6903H-894v-157h242v157Zm-12.483-1.955a31.32,31.32,0,0,1,7.574.748l.174.043.144.036c.345.086.67.167.785.182a6.129,6.129,0,0,0,1.012.1c1.377,0,2.02-.789,2.151-2.628a24.333,24.333,0,0,0-.064-5.428,39.7,39.7,0,0,1-.283-4.506c-.224-15.934-.188-32.137-.154-47.807v-.015c.013-5.774.026-11.744.026-17.616,0-6.046-.009-12.119-.018-17.993-.026-16.7-.053-33.961.132-50.944.024-2.239-.16-3.933-1.134-4.917-.817-.826-2.156-1.179-4.478-1.179h-.252c-11.018.119-23.1.174-38.026.174-7.849,0-15.829-.015-23.545-.029h-.029c-6.645-.013-12.217-.022-17.809-.027-1.59,0-3.208-.142-4.772-.276h-.01l-.084-.007c-.363-.031-.725-.062-1.084-.091-15.27-1.238-31.253-1.866-47.505-1.866-8.08,0-16.22.158-24.194.47-6.029.236-12.018.534-17.81.822l-.105.005c-12.832.639-24.952,1.243-37.618,1.243-5.624,0-10.87-.119-16.038-.364-.323-.015-.627-.023-.9-.023-1.741,0-2.822.306-3.5.991-.775.778-1.1,2.1-1.092,4.435.184,45.854.186,92.578.005,138.874-.01,2.434.32,3.762,1.138,4.583s2.115,1.146,4.5,1.146h.081c28.967-.081,58.422-.087,86.907-.093h.249c27.833-.006,56.614-.012,85.105-.087,2.266-.006,4.528-.1,6.716-.185,2.227-.089,4.53-.182,6.779-.182a41.187,41.187,0,0,1,14.006,2.054,10.992,10.992,0,0,0,3.793.554c.471,0,.938-.014,1.432-.028l.082,0h.042c.57-.018,1.084-.032,1.613-.032.652,0,1.233.023,1.775.07.959.082,2.019.121,3.242.121,1.726,0,3.5-.077,5.371-.158h.008l.073,0C-668.338-6904.868-666.368-6904.955-664.484-6904.955Z" transform="translate(894 7060)" fill="#fff"/>
          </svg>
          <img class="video-hero" src="https://vumbnail.com/<?php echo $viemocode2; ?>.jpg">
          <!-- <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="<?php echo get_post_meta($course_1,'vibe_trailer_link',true); ?>" allowfullscreen></iframe>
          </div> -->
        </span>
        <span class="sub-title"><?php echo get_the_title($course_2); ?></span>
        <p><?php echo get_the_excerpt($course_2); ?></p>
        <?php if($purchase_status == 0){ ?>
          <?php
            $courseslug=get_site_url().'/?p='.$course_2;
            $category_array = get_the_terms($course_2,'course-cat');
            $coursePartner = "";
            $cb_course_id = get_post_meta($course_2,'celeb_school_course_id',true);
            if ($cb_course_id) {
              $coursePartner = "Celebrity School";
            }

            $aiws_course_id = get_post_meta($course_2,'aiws_program_id',true);
            if ($aiws_course_id) {
              $coursePartner = "AIWS";
            }

            $age_limit = get_post_meta($course_2,'vibe_course_age_group',true);
          ?>
          <a class="enroll add_to_wishlist_codeathon" href="<?php echo wc_get_cart_url() . '?add-to-cart=' . $product_id2 ?>" data-id="<?php echo $course_3; ?>">Enrol Now</a>
          <input type="hidden" id="course_name_<?php echo $course_2; ?>" value="<?php echo get_the_title($course_2); ?>">
          <input type="hidden" id="course_url_<?php echo $course_2; ?>" value="<?php echo $courseslug; ?>">
          <input type="hidden" id="course_category_<?php echo $course_2; ?>" value="<?php echo $category_array[0]->name;?>">
          <input type="hidden" id="course_partner_<?php echo $course_2; ?>" value="<?php echo $coursePartner; ?>">
          <input type="hidden" id="category_id_<?php echo $course_2; ?>" value="<?php echo $category_array[0]->term_id;?>">
          <input type="hidden" id="course_id_<?php echo $course_2; ?>" value="<?php echo $course_2; ?>">
          <input type="hidden" id="course_price_<?php echo $course_2; ?>" value="0">
          <input type="hidden" id="course_tax_<?php echo $course_2; ?>" value="0">
          <input type="hidden" id="age_group_<?php echo $course_2; ?>" value="<?php echo $age_limit;?>">
          <input type="hidden" id="course_duration_<?php echo $course_2; ?>" value="<?php echo get_post_meta($course_2, "vibe_validity", true);?>">
          <input type="hidden" id="session_duration_<?php echo $course_2; ?>" value="<?php echo get_post_meta($course_2, "vibe_course_session_length", true);?>">
          <input type="hidden" id="wishlisted_course_<?php echo $course_2; ?>" value="">
        <?php }else{ ?>
          <?php if($course_status22 == 1){ ?>
            <a class="enroll" href="<?php echo get_bloginfo('url'); ?>/event-dashboard">Go To Dashboard</a>
          <?php }else{ ?>
            <button class="enroll" disabled>Enrol Now</button>
          <?php } ?>
        <?php } ?>
      </div>
      <div class="column view_codeathon_course" data-id="<?php echo $course_3; ?>">
        <span class="title">Classes VIII-IX</span>
        <span class="video">
          <a class="play videoplayLearning" href="#!" data-bs-toggle="modal" data-bs-target="#video1-popup-learning" data-title="<?php echo get_the_title($course_3); ?>" data-viemocode="<?php echo $viemocode3; ?>"><img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/video-play.svg"></a>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 242 157.001">
            <path id="Subtraction_1" data-name="Subtraction 1" d="M-652-6903H-894v-157h242v157Zm-12.483-1.955a31.32,31.32,0,0,1,7.574.748l.174.043.144.036c.345.086.67.167.785.182a6.129,6.129,0,0,0,1.012.1c1.377,0,2.02-.789,2.151-2.628a24.333,24.333,0,0,0-.064-5.428,39.7,39.7,0,0,1-.283-4.506c-.224-15.934-.188-32.137-.154-47.807v-.015c.013-5.774.026-11.744.026-17.616,0-6.046-.009-12.119-.018-17.993-.026-16.7-.053-33.961.132-50.944.024-2.239-.16-3.933-1.134-4.917-.817-.826-2.156-1.179-4.478-1.179h-.252c-11.018.119-23.1.174-38.026.174-7.849,0-15.829-.015-23.545-.029h-.029c-6.645-.013-12.217-.022-17.809-.027-1.59,0-3.208-.142-4.772-.276h-.01l-.084-.007c-.363-.031-.725-.062-1.084-.091-15.27-1.238-31.253-1.866-47.505-1.866-8.08,0-16.22.158-24.194.47-6.029.236-12.018.534-17.81.822l-.105.005c-12.832.639-24.952,1.243-37.618,1.243-5.624,0-10.87-.119-16.038-.364-.323-.015-.627-.023-.9-.023-1.741,0-2.822.306-3.5.991-.775.778-1.1,2.1-1.092,4.435.184,45.854.186,92.578.005,138.874-.01,2.434.32,3.762,1.138,4.583s2.115,1.146,4.5,1.146h.081c28.967-.081,58.422-.087,86.907-.093h.249c27.833-.006,56.614-.012,85.105-.087,2.266-.006,4.528-.1,6.716-.185,2.227-.089,4.53-.182,6.779-.182a41.187,41.187,0,0,1,14.006,2.054,10.992,10.992,0,0,0,3.793.554c.471,0,.938-.014,1.432-.028l.082,0h.042c.57-.018,1.084-.032,1.613-.032.652,0,1.233.023,1.775.07.959.082,2.019.121,3.242.121,1.726,0,3.5-.077,5.371-.158h.008l.073,0C-668.338-6904.868-666.368-6904.955-664.484-6904.955Z" transform="translate(894 7060)" fill="#fff"/>
          </svg>
          <img class="video-hero" src="https://vumbnail.com/<?php echo $viemocode3; ?>.jpg">
          <!-- <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="<?php echo get_post_meta($course_1,'vibe_trailer_link',true); ?>" allowfullscreen></iframe>
          </div> -->
        </span>
        <span class="sub-title"><?php echo get_the_title($course_3); ?></span>
        <p><?php echo get_the_excerpt($course_3); ?></p>
        <?php if($purchase_status == 0){ ?>
          <?php
            $courseslug=get_site_url().'/?p='.$course_3;
            $category_array = get_the_terms($course_3,'course-cat');
            $coursePartner = "";
            $cb_course_id = get_post_meta($course_3,'celeb_school_course_id',true);
            if ($cb_course_id) {
              $coursePartner = "Celebrity School";
            }

            $aiws_course_id = get_post_meta($course_3,'aiws_program_id',true);
            if ($aiws_course_id) {
              $coursePartner = "AIWS";
            }

            $age_limit = get_post_meta($course_3,'vibe_course_age_group',true);
          ?>
          <a class="enroll add_to_wishlist_codeathon" href="<?php echo wc_get_cart_url() . '?add-to-cart=' . $product_id3 ?>" data-id="<?php echo $course_3; ?>">Enrol Now</a>
          <input type="hidden" id="course_name_<?php echo $course_3; ?>" value="<?php echo get_the_title($course_3); ?>">
          <input type="hidden" id="course_url_<?php echo $course_3; ?>" value="<?php echo $courseslug; ?>">
          <input type="hidden" id="course_category_<?php echo $course_3; ?>" value="<?php echo $category_array[0]->name;?>">
          <input type="hidden" id="course_partner_<?php echo $course_3; ?>" value="<?php echo $coursePartner; ?>">
          <input type="hidden" id="category_id_<?php echo $course_3; ?>" value="<?php echo $category_array[0]->term_id;?>">
          <input type="hidden" id="course_id_<?php echo $course_3; ?>" value="<?php echo $course_3; ?>">
          <input type="hidden" id="course_price_<?php echo $course_3; ?>" value="0">
          <input type="hidden" id="course_tax_<?php echo $course_3; ?>" value="0">
          <input type="hidden" id="age_group_<?php echo $course_3; ?>" value="<?php echo $age_limit;?>">
          <input type="hidden" id="course_duration_<?php echo $course_3; ?>" value="<?php echo get_post_meta($course_3, "vibe_validity", true);?>">
          <input type="hidden" id="session_duration_<?php echo $course_3; ?>" value="<?php echo get_post_meta($course_3, "vibe_course_session_length", true);?>">
          <input type="hidden" id="wishlisted_course_<?php echo $course_3; ?>" value="">
        <?php }else{ ?>
          <?php if($course_status33 == 1){ ?>
            <a class="enroll" href="<?php echo get_bloginfo('url'); ?>/event-dashboard">Go To Dashboard</a>
          <?php }else{ ?>
            <button class="enroll" disabled>Enrol Now</button>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
  </div>
<span class="gray-code"></span>
<span class="code"></span>
</section>

<section class="section-wrapper it-works" id="How_it_works">
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

<section class="section-wrapper about" id="About_Partners">
  <div class="section-copy">
    <h2 class="section-title">Code-a-thon Sponsors</h2>
    <div class="owl-carousel owl-theme about_slider">
      <?php
        $args1 = array(
          'post_type' => 'event_about_our_part',
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
                <h3 class="title"><?php echo $custom_fields['about_our_partners_title'][0];?></h3>
                <p><?php echo $custom_fields['description'][0];?></p>
                <a class="read-more" href="<?php echo $custom_fields['link'][0];?>">Visit Sponsor >></a>
              </div>
            </div>
        </div>
      <?php endwhile;endif; ?>
    </div>
  </div>
</section>

<section class="section-wrapper videos" id="Partner_says">
  <div class="section-copy">
    <h2 class="section-title">Sponsor Testimonials</h2>
    <div class="owl-carousel owl-theme says_slider">
      <?php
        $args1 = array(
          'post_type' => 'event_what_our_partn',
          'post_status' => 'publish',
          'orderby' => 'publish_date',
          'order' => 'DESC',        
          'nopaging' => true
        );
        $Query1 = new WP_Query( $args1 );
        
        if ($Query1->have_posts()) : while ($Query1->have_posts()) : $Query1->the_post();
          $custom_fields = get_post_custom();
          $link = $custom_fields['link'][0];
          $parts = explode("/", $link);
          $youtubecode = end($parts);
      ?>
      <div class="item">
        <span class="image-copy">
        <a class="play videoplay" href="#!" data-bs-toggle="modal" data-bs-target="#video1-popup" data-title="<?php echo $custom_fields['event_what_our_partner_title'][0];?>" data-youtubecode="<?php echo $youtubecode; ?>"><img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/video-play.svg"></a>
        <img src="https://img.youtube.com/vi/<?php echo $youtubecode; ?>/maxresdefault.jpg" class="main">
      </span>
      <?php if($custom_fields['event_what_our_partner_title'][0] != ''){ ?>
        <span class="caption"><?php echo $custom_fields['event_what_our_partner_title'][0];?></span>
      <?php } ?>
      </div>
      <?php 
        endwhile;endif; 
      ?>
    </div>
    <?php /*
    <div id="customers-testimonials" class="owl-carousel">
      <?php
        $args1 = array(
          'post_type' => 'event_what_our_partn',
          'post_status' => 'publish',
          'orderby' => 'publish_date',
          'order' => 'DESC',        
          'nopaging' => true
        );
        $Query1 = new WP_Query( $args1 );
        
        if ($Query1->have_posts()) : while ($Query1->have_posts()) : $Query1->the_post();
          $custom_fields = get_post_custom();
      ?>
      <div class="item">
          <div class="video-wrapper">
            <iframe width="100%" src="<?php echo $custom_fields['link'][0];?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <span class="caption"><?php echo $custom_fields['event_what_our_partner_title'][0];?></span>
          </div>
      </div>
      <?php endwhile;endif; ?>
    </div> */ ?>
  </div>
</section>


<section class="section-wrapper partners">
  <div class="section-copy">
    <h2 class="section-title">Sponsor Logos</h2>
    <div class="owl-carousel owl-theme partners_slider">
      <?php
        $args1 = array(
          'post_type' => 'event_our_partners_l',
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
          'post_type' => 'event_school_logos',
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

<?php 
/*
<section class="section-wrapper blogs" id="blog">
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
            <h3 class="blog-title"><a href="#!"><?php echo $custom_fields['event_blogs_title'][0];?></a></h3>
            <p><?php echo $custom_fields['description'][0];?></p>
            <a class="read-more" href="<?php echo $custom_fields['link'][0];?>">Read More >></a>
        </div>
      <?php endwhile;endif; ?>
    </div>
  </div>
</section>
*/
?>

<div class="modal fade video1-popup" id="video1-popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title mb-4 videotitle" id="exampleModalLabel"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  <svg xmlns="http://www.w3.org/2000/svg" width="21.657" height="21.657" viewBox="0 0 21.657 21.657">
                    <g id="Group_8" data-name="Group 8" transform="translate(-1045.728 -811.172)">
                      <line id="Line_2" data-name="Line 2" x1="16" y2="16" transform="translate(1048.556 814)" fill="none" stroke="#373737" stroke-linecap="round" stroke-width="4"/>
                      <line id="Line_3" data-name="Line 3" x2="16" y2="16" transform="translate(1048.556 814)" fill="none" stroke="#373737" stroke-linecap="round" stroke-width="4"/>
                    </g>
                  </svg>
              </button>
          </div>
          <div class="modal-body">
              <iframe width="100%" height="350" src="" id="videolink" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
      </div>
  </div>
</div>
<div class="modal fade video1-popup" id="video1-popup-learning" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title mb-4 videotitlelearning" id="exampleModalLabel"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  <svg xmlns="http://www.w3.org/2000/svg" width="21.657" height="21.657" viewBox="0 0 21.657 21.657">
                    <g id="Group_8" data-name="Group 8" transform="translate(-1045.728 -811.172)">
                      <line id="Line_2" data-name="Line 2" x1="16" y2="16" transform="translate(1048.556 814)" fill="none" stroke="#373737" stroke-linecap="round" stroke-width="4"/>
                      <line id="Line_3" data-name="Line 3" x2="16" y2="16" transform="translate(1048.556 814)" fill="none" stroke="#373737" stroke-linecap="round" stroke-width="4"/>
                    </g>
                  </svg>
              </button>
          </div>
          <div class="modal-body">
              <div style="padding:56.25% 0 0 0;position:relative;"><iframe id="videolinklearning" src="" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
              <!-- <iframe id="videolinklearning" height="400" src="" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen="" style="top:0; left:0; width:100%;"></iframe> -->
          </div>
      </div>
  </div>
</div>
<?php include("includes/footer.php"); ?>