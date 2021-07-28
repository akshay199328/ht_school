<?php
/**
 * Template Name: Event Template
 */

if ( !defined( 'ABSPATH' ) ) exit;

include("includes/lead.php");

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
      $course_status33 = $results1->course_status33;

      $purchase_status = $course_status11+$course_status22+$course_status33;

    ?>
      <div class="column view_codeathon_course" data-id="<?php echo $course_1; ?>">
        <span class="title">Classes IV - V</span>
        <span class="video">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="<?php echo get_post_meta($course_1,'vibe_trailer_link',true); ?>" allowfullscreen></iframe>
          </div>
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
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="<?php echo get_post_meta($course_2,'vibe_trailer_link',true); ?>" allowfullscreen></iframe>
          </div>
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
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="<?php echo get_post_meta($course_3,'vibe_trailer_link',true); ?>" allowfullscreen></iframe>
          </div>
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
    <h2 class="section-title">About Our Partners</h2>
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
                <a class="read-more" href="<?php echo $custom_fields['link'][0];?>">Visit Partner >></a>
              </div>
            </div>
        </div>
      <?php endwhile;endif; ?>
    </div>
  </div>
</section>

<section class="section-wrapper videos" id="Partner_says">
  <div class="section-copy">
    <h2 class="section-title">What Our Partners Say</h2>
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
        <a class="play videoplay" href="#!" data-bs-toggle="modal" data-bs-target="#video1-popup" data-title="<?php echo $custom_fields['event_what_our_partner_title'][0];?>" data-youtubecode="<?php echo $youtubecode; ?>"><img src="<?php echo get_bloginfo('template_url'); ?>/images/video-play.svg"></a>
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
    <h2 class="section-title">Our Partners Logos</h2>
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
<?php include("includes/footer.php"); ?>