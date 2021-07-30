<?php
/**
 * Template Name: Event Prelaunch page
 */
if ( !defined( 'ABSPATH' ) ) exit;

get_header(vibe_get_header());
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
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

function getData($wpdb, $post_id, $meta_key){

  $results = $wpdb->get_results( "SELECT * FROM `ht_postmeta` WHERE `post_id` = '$post_id' AND `meta_key` = '$meta_key'");
  foreach($results as $row){ 
    return $row->meta_value; 
  }

}


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


$course_1 = getData($wpdb, $post_id, 'learning_modules_course_1');
$course_2 = getData($wpdb, $post_id, 'learning_modules_course_2');
$course_3 = getData($wpdb, $post_id, 'learning_modules_course_3');

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
      $course_status33 = $results1->course_status33;

      $purchase_status = $course_status11+$course_status22+$course_status33;

    ?>
      <div class="column view_codeathon_course" data-id="<?php echo $course_1; ?>">
        <span class="title">Classes IV - V</span>
        <span class="video">
          <a class="play" href="#!"><img src="<?php echo get_bloginfo('template_url'); ?>/images/video-play.svg"></a>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 242 157.001">
            <path id="Subtraction_1" data-name="Subtraction 1" d="M-652-6903H-894v-157h242v157Zm-12.483-1.955a31.32,31.32,0,0,1,7.574.748l.174.043.144.036c.345.086.67.167.785.182a6.129,6.129,0,0,0,1.012.1c1.377,0,2.02-.789,2.151-2.628a24.333,24.333,0,0,0-.064-5.428,39.7,39.7,0,0,1-.283-4.506c-.224-15.934-.188-32.137-.154-47.807v-.015c.013-5.774.026-11.744.026-17.616,0-6.046-.009-12.119-.018-17.993-.026-16.7-.053-33.961.132-50.944.024-2.239-.16-3.933-1.134-4.917-.817-.826-2.156-1.179-4.478-1.179h-.252c-11.018.119-23.1.174-38.026.174-7.849,0-15.829-.015-23.545-.029h-.029c-6.645-.013-12.217-.022-17.809-.027-1.59,0-3.208-.142-4.772-.276h-.01l-.084-.007c-.363-.031-.725-.062-1.084-.091-15.27-1.238-31.253-1.866-47.505-1.866-8.08,0-16.22.158-24.194.47-6.029.236-12.018.534-17.81.822l-.105.005c-12.832.639-24.952,1.243-37.618,1.243-5.624,0-10.87-.119-16.038-.364-.323-.015-.627-.023-.9-.023-1.741,0-2.822.306-3.5.991-.775.778-1.1,2.1-1.092,4.435.184,45.854.186,92.578.005,138.874-.01,2.434.32,3.762,1.138,4.583s2.115,1.146,4.5,1.146h.081c28.967-.081,58.422-.087,86.907-.093h.249c27.833-.006,56.614-.012,85.105-.087,2.266-.006,4.528-.1,6.716-.185,2.227-.089,4.53-.182,6.779-.182a41.187,41.187,0,0,1,14.006,2.054,10.992,10.992,0,0,0,3.793.554c.471,0,.938-.014,1.432-.028l.082,0h.042c.57-.018,1.084-.032,1.613-.032.652,0,1.233.023,1.775.07.959.082,2.019.121,3.242.121,1.726,0,3.5-.077,5.371-.158h.008l.073,0C-668.338-6904.868-666.368-6904.955-664.484-6904.955Z" transform="translate(894 7060)" fill="#fff"/>
          </svg>
          <img class="video-hero" src="https://images.unsplash.com/photo-1594671581654-cc7ed83167bb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=400&q=80">
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
        <a class="enroll add_to_wishlist_codeathon" href="<?php echo wc_get_cart_url() . '?add-to-cart=' . $product_id1 ?>" data-id="<?php echo $course_1; ?>">Enroll Now</a>
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
          <button class="enroll" disabled>Enroll Now</button>
        <?php } ?>
      <?php } ?>
      </div>
      <div class="column view_codeathon_course" data-id="<?php echo $course_2; ?>">
        <span class="title">Classes VI - VII</span>
        <span class="video">
          <a class="play" href="#!"><img src="<?php echo get_bloginfo('template_url'); ?>/images/video-play.svg"></a>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 242 157.001">
            <path id="Subtraction_1" data-name="Subtraction 1" d="M-652-6903H-894v-157h242v157Zm-12.483-1.955a31.32,31.32,0,0,1,7.574.748l.174.043.144.036c.345.086.67.167.785.182a6.129,6.129,0,0,0,1.012.1c1.377,0,2.02-.789,2.151-2.628a24.333,24.333,0,0,0-.064-5.428,39.7,39.7,0,0,1-.283-4.506c-.224-15.934-.188-32.137-.154-47.807v-.015c.013-5.774.026-11.744.026-17.616,0-6.046-.009-12.119-.018-17.993-.026-16.7-.053-33.961.132-50.944.024-2.239-.16-3.933-1.134-4.917-.817-.826-2.156-1.179-4.478-1.179h-.252c-11.018.119-23.1.174-38.026.174-7.849,0-15.829-.015-23.545-.029h-.029c-6.645-.013-12.217-.022-17.809-.027-1.59,0-3.208-.142-4.772-.276h-.01l-.084-.007c-.363-.031-.725-.062-1.084-.091-15.27-1.238-31.253-1.866-47.505-1.866-8.08,0-16.22.158-24.194.47-6.029.236-12.018.534-17.81.822l-.105.005c-12.832.639-24.952,1.243-37.618,1.243-5.624,0-10.87-.119-16.038-.364-.323-.015-.627-.023-.9-.023-1.741,0-2.822.306-3.5.991-.775.778-1.1,2.1-1.092,4.435.184,45.854.186,92.578.005,138.874-.01,2.434.32,3.762,1.138,4.583s2.115,1.146,4.5,1.146h.081c28.967-.081,58.422-.087,86.907-.093h.249c27.833-.006,56.614-.012,85.105-.087,2.266-.006,4.528-.1,6.716-.185,2.227-.089,4.53-.182,6.779-.182a41.187,41.187,0,0,1,14.006,2.054,10.992,10.992,0,0,0,3.793.554c.471,0,.938-.014,1.432-.028l.082,0h.042c.57-.018,1.084-.032,1.613-.032.652,0,1.233.023,1.775.07.959.082,2.019.121,3.242.121,1.726,0,3.5-.077,5.371-.158h.008l.073,0C-668.338-6904.868-666.368-6904.955-664.484-6904.955Z" transform="translate(894 7060)" fill="#fff"/>
          </svg>
          <img class="video-hero" src="https://images.unsplash.com/photo-1588097225091-90fc89255934?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=400&q=80">
          <!-- <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="<?php echo get_post_meta($course_2,'vibe_trailer_link',true); ?>" allowfullscreen></iframe>
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
          <a class="enroll add_to_wishlist_codeathon" href="<?php echo wc_get_cart_url() . '?add-to-cart=' . $product_id2 ?>" data-id="<?php echo $course_3; ?>">Enroll Now</a>
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
            <button class="enroll" disabled>Enroll Now</button>
          <?php } ?>
        <?php } ?>
      </div>
      <div class="column view_codeathon_course" data-id="<?php echo $course_3; ?>">
        <span class="title">Classes VIII - IX</span>
        <span class="video">
          <a class="play" href="#!"><img src="<?php echo get_bloginfo('template_url'); ?>/images/video-play.svg"></a>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 242 157.001">
            <path id="Subtraction_1" data-name="Subtraction 1" d="M-652-6903H-894v-157h242v157Zm-12.483-1.955a31.32,31.32,0,0,1,7.574.748l.174.043.144.036c.345.086.67.167.785.182a6.129,6.129,0,0,0,1.012.1c1.377,0,2.02-.789,2.151-2.628a24.333,24.333,0,0,0-.064-5.428,39.7,39.7,0,0,1-.283-4.506c-.224-15.934-.188-32.137-.154-47.807v-.015c.013-5.774.026-11.744.026-17.616,0-6.046-.009-12.119-.018-17.993-.026-16.7-.053-33.961.132-50.944.024-2.239-.16-3.933-1.134-4.917-.817-.826-2.156-1.179-4.478-1.179h-.252c-11.018.119-23.1.174-38.026.174-7.849,0-15.829-.015-23.545-.029h-.029c-6.645-.013-12.217-.022-17.809-.027-1.59,0-3.208-.142-4.772-.276h-.01l-.084-.007c-.363-.031-.725-.062-1.084-.091-15.27-1.238-31.253-1.866-47.505-1.866-8.08,0-16.22.158-24.194.47-6.029.236-12.018.534-17.81.822l-.105.005c-12.832.639-24.952,1.243-37.618,1.243-5.624,0-10.87-.119-16.038-.364-.323-.015-.627-.023-.9-.023-1.741,0-2.822.306-3.5.991-.775.778-1.1,2.1-1.092,4.435.184,45.854.186,92.578.005,138.874-.01,2.434.32,3.762,1.138,4.583s2.115,1.146,4.5,1.146h.081c28.967-.081,58.422-.087,86.907-.093h.249c27.833-.006,56.614-.012,85.105-.087,2.266-.006,4.528-.1,6.716-.185,2.227-.089,4.53-.182,6.779-.182a41.187,41.187,0,0,1,14.006,2.054,10.992,10.992,0,0,0,3.793.554c.471,0,.938-.014,1.432-.028l.082,0h.042c.57-.018,1.084-.032,1.613-.032.652,0,1.233.023,1.775.07.959.082,2.019.121,3.242.121,1.726,0,3.5-.077,5.371-.158h.008l.073,0C-668.338-6904.868-666.368-6904.955-664.484-6904.955Z" transform="translate(894 7060)" fill="#fff"/>
          </svg>
          <img class="video-hero" src="https://images.unsplash.com/photo-1597773150796-e5c14ebecbf5?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=400&q=80">
          <!-- <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="<?php echo get_post_meta($course_3,'vibe_trailer_link',true); ?>" allowfullscreen></iframe>
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
          <a class="enroll add_to_wishlist_codeathon" href="<?php echo wc_get_cart_url() . '?add-to-cart=' . $product_id3 ?>" data-id="<?php echo $course_3; ?>">Enroll Now</a>
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
            <button class="enroll" disabled>Enroll Now</button>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
  </div>
<span class="gray-code"></span>
<span class="code"></span>
</section>



<?php include("includes/footer.php"); ?>