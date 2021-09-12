<?php
/**
 * Template Name: Home page
 */
if ( !defined( 'ABSPATH' ) ) exit;

get_header(vibe_get_header());
?>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- ======= Hero Section ======= -->

<main id="main">
 <!-- ======= Hero Section ======= -->

<!-- End Hero -->
<div class="owl-carousel owl-theme home_slider" id="home_slider">
  <?php
    $args1 = array(
      'post_type' => 'banner',
      'post_status' => 'publish',
      'orderby' => 'publish_date',
      'order' => 'DESC',      
      'nopaging' => true
    );
    $Query1 = new WP_Query( $args1 );

    if ($Query1->have_posts()) : while ($Query1->have_posts()) : $Query1->the_post();
      $custom_fields = get_post_custom();
      $image_url = wp_get_attachment_url($custom_fields['banner_image'][0]);
      $mobile_image = wp_get_attachment_url($custom_fields['mobile_image'][0]);
      ?>
    <div class="item">
        <img src="<?php echo $image_url; ?>">
        <div class="caption">
            <h2 class="slider-title"><?php echo $custom_fields['banner_title'][0];?></h3>
            <?php $sub_title = $custom_fields['banner_sub_title'][0]; if($sub_title != '') { ?>
          <?php } ?>
            <a class="main-button" href="<?php echo $custom_fields['cta_link'][0];?>" target="_blank"><?php echo $custom_fields['cta_text'][0];?></a>
        </div>
    </div>
  <?php endwhile;endif; ?>
</div>
  <section class="home-section popular-courses">
    <div class="home-copy">
      <h2 class="medium-title">Popular Courses</h2>
      <div class="owl-carousel owl-theme course_slider">
      <?php 
      
        $user = wp_get_current_user();
        $userIdentifier = "";
        $users_courses = array();
        if(isset($user->ID) && $user->ID > 0)
        {
          $userIdentifier = $user->ID;
          $courses_with_types = apply_filters('wplms_usermeta_direct_query',$wpdb->prepare("SELECT posts.ID as id FROM {$wpdb->posts} AS posts LEFT JOIN {$wpdb->usermeta} AS meta ON posts.ID = meta.meta_key WHERE   posts.post_type   = %s AND   posts.post_status   = %s AND   meta.user_id   = %d",'course','publish',$user->ID));
            $result = $wpdb->get_results($courses_with_types);

            foreach($result as $course){
              $users_courses[]=$course->id;
            }
        }
        else if(isset($_COOKIE['PHPSESSID']))
        {
          $userIdentifier = $_COOKIE['PHPSESSID'];
        }

        $featured_args_course = array(
          'post_type' => 'course',
          'post_status' => 'publish',
          'posts_per_page' => 8,
          'meta_query'  => array(
          'relation'  => 'AND',
          array(
            'key'   =>'featured',
            'value'   => 1,
            'compare' => '='
            )
          )
        );
        $featured_query_course = new WP_Query( $featured_args_course );
        $course_id = array();
        if ($featured_query_course->have_posts()) : while ($featured_query_course->have_posts()) : $featured_query_course->the_post();
          $course_id[] = $post->ID;
        endwhile;
        endif;
        $args_all_course = array(
          'post_type' => 'course',
          'post_status' => 'publish',
          'posts_per_page' => 8,
          'meta_query'  => array(
            'relation'  => 'AND',
            array(
              'key'   =>'vibe_course_event',
              'value'   => '0',
              'compare' => '='
              )
            )
        );  
          
        $all_course = new WP_Query( $args_all_course );
        if ($all_course->have_posts()) : while ($all_course->have_posts()) : $all_course->the_post();
          if (!in_array($post->ID, $course_id)){
            $course_id[] = $post->ID;
          }
        endwhile;
        endif;
        if(!empty($course_id)){
          $query_args = apply_filters('wplms_mycourses',array(
              'post_type'=>'course',
              'post__in'=>$course_id,
              'posts_per_page'=>8,
              'orderby' => 'post__in', 
              'meta_query'  => array(
              'relation'  => 'AND',
                array(
                  'key'   =>'vibe_course_event',
                  'value'   => '0',
                  'compare' => '='
                  )
                )
          ));

          $Query_course = new WP_Query($query_args);
        }
        if(!empty($Query_course)){
          $i = 0;
        while ($Query_course->have_posts())
        {
          $Query_course->the_post();
          global $post;
          $custom_fields = get_post_custom(); 
         // echo "<pre>";print_r($custom_fields);echo "</pre>";
          $duration = $custom_fields['vibe_validity'][0];
          $course_type="";
          $course_type = $custom_fields['vibe_course_type'][0];

          $str1="LIVE CLASSES";
          $str2="BLENDED";
          $str3="SELF-PACED";
        
          if(strcmp($str2, $course_type)==0){
             $badge_class = "blue";
          }
          elseif(strcmp($str3, $course_type)==0){
             $badge_class = "green";
          }
          elseif(strcmp($str1, $course_type)==0){
             $badge_class = "red";
          }
          else{
            $badge_class = "";
          }  
          $durationParameter = get_post_meta($post->ID,'vibe_course_validity_parameter',true);
          $session = $custom_fields['vibe_course_sessions'][0];
          $age_limit = $custom_fields['vibe_course_age_group'][0];
          $category_array = get_the_terms( $post->ID, 'course-cat');
          $courseID = $post->ID;
           $courseslug=get_the_permalink($courseID);
          $usersFavorites = wpfp_get_users_favorites();
          $coursePartner = "";

            $cb_course_id = get_post_meta($courseID,'celeb_school_course_id',true);
            if ($cb_course_id) {
              $coursePartner = "Celebrity School";
            }

            $aiws_course_id = get_post_meta($courseID,'aiws_program_id',true);
            if ($aiws_course_id) {
              $coursePartner = "AIWS";
            }
            if ( has_post_thumbnail() ) {
                $image_url = get_the_post_thumbnail_url();
              }
            $pid=get_post_meta($courseID,'vibe_product',true);
            $pid=apply_filters('wplms_course_product_id',$pid,$courseID,0);

            if(is_numeric($pid) && bp_course_get_post_type($pid) == 'product'){
              $pid=get_permalink($pid);
              $check=vibe_get_option('direct_checkout');
              $check =intval($check);
              if(isset($check) &&  $check){
                $pid .= '?redirect';
              }
            }
          ?>

        <div class="item">
          <div class="course-card">
            <figure class="image"><img alt="<?php echo $post->post_title; ?>" src="<?php echo $image_url;?>"></figure>
            <div class="course-copy">
              <header class="course-header">
                <a class="category" href="<?php echo get_permalink($post->ID);?>"><?php echo $category_array[0]->name; ?></a>
                <span class="badge <?php echo $badge_class;?>"><?php echo $course_type; ?></span>
              </header>
              <h2 class="course-title"><a href="<?php echo get_permalink($post->ID);?>"><?php echo bp_course_title(); ?></a></h2>
              <footer class="course-footer">
                <?php if (in_array($post->ID, $users_courses)){
                  the_course_button(); 
                }
                ?>
                <div class="left">
                  <span class="price" data-id="<?php echo $post->ID;?>"><?php the_course_price(); ?></span>
                </div>
                <div class="right">
                  <a href='<?php echo $pid;?>'>
                <?php if (!in_array($post->ID, $users_courses)){ ?>
                
                  <svg class="cart" xmlns="http://www.w3.org/2000/svg" width="26" height="21.587" viewBox="0 0 26 21.587"> <g id="Group_20746" data-name="Group 20746" transform="translate(1 1)"> <g id="Group_15651" data-name="Group 15651" transform="translate(0 0)"> <path id="Path_30160" data-name="Path 30160" d="M-11952.5,9580.5h3.393l5.136,15.36h12.108" transform="translate(11952.5 -9580.5)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/> <path id="Path_30161" data-name="Path 30161" d="M-11898.5,9610.5h20.038l-3.893,9.023h-13" transform="translate(11902.465 -9607.673)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/> <g id="Ellipse_440" data-name="Ellipse 440" transform="translate(7.67 17.428)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"> <circle cx="1.579" cy="1.579" r="1.579" stroke="none"/> <circle cx="1.579" cy="1.579" r="0.579" fill="none"/> </g> <g id="Ellipse_441" data-name="Ellipse 441" transform="translate(16.874 17.428)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"> <circle cx="1.579" cy="1.579" r="1.579" stroke="none"/> <circle cx="1.579" cy="1.579" r="0.579" fill="none"/> </g> </g> </g> </svg>
                  </a>
                  <?php
                  }
                   if(is_user_logged_in()){
                    ?>
                    <?php wpfp_course_link(); ?>
                  <?php }else{
                    $url = "/login-register";
                    ?>
                    <a href="<?php echo get_site_url().$url; ?>"><i class="add-wishlist" title="Add to Wishlist"></i></a>
                    <?php
                  }
                  ?>
                  <!-- <a href="#!">
                  <svg class="bookmark filled" xmlns="http://www.w3.org/2000/svg" width="17" height="21.146" viewBox="0 0 17 21.146"><path id="Path_38323" data-name="Path 38323" d="M31.409,38.413,35.5,34.368l4.091,4.045a2.083,2.083,0,0,0,2.79.074A1.773,1.773,0,0,0,43,37.147v-14.3A2.964,2.964,0,0,0,39.932,20H31.068A2.964,2.964,0,0,0,28,22.849V37.159A1.906,1.906,0,0,0,29.965,39a2.049,2.049,0,0,0,1.444-.575Z" transform="translate(-27 -19)"/></svg>
                  </a> -->
                  <a href="#share!" data-toggle="modal" data-target="#open_share_<?php echo $courseID;?>" >
                  <svg class="share" xmlns="http://www.w3.org/2000/svg" width="25.445" height="19.4" viewBox="0 0 25.445 19.4"> <g id="Group_20744" data-name="Group 20744" transform="translate(0.205 0.2)" style="isolation: isolate"> <path id="Path_38322" data-name="Path 38322" d="M21.417,21a.53.53,0,0,1,.275.133l9.091,8.188a.724.724,0,0,1,.1.919.626.626,0,0,1-.1.114l-9.091,8.188a.52.52,0,0,1-.8-.12.723.723,0,0,1-.118-.392V34.746a18.89,18.89,0,0,0-4.705.389,17.55,17.55,0,0,0-9.127,4.7.518.518,0,0,1-.8-.062.733.733,0,0,1-.113-.634C8.4,30.71,15.625,26.694,20.778,25.094V21.655a.618.618,0,0,1,.564-.66A.446.446,0,0,1,21.417,21Zm.5,1.985v2.6a.645.645,0,0,1-.426.634C17,27.53,10.737,30.858,7.913,37.407a19.292,19.292,0,0,1,7.964-3.562,21.972,21.972,0,0,1,5.5-.4.621.621,0,0,1,.542.655v2.589l7.6-6.848Z" transform="translate(-6.003 -20.995)" stroke-width="0.4"/> </g> </svg>
                  </a>
                </div>
              </footer>
              
            </div>
          </div>
        </div>
        <div class="sharing-course modal fade" id="open_share_<?php echo $courseID;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <!-- <button class="sharing close-button" type="submit"></button> -->
                <button type="button" class="close sharing close-button" data-dismiss="modal" aria-label="Close"></button>
                <div class="course-list">
                    <h4 class="title">Share This Course</h4>
                    <div class="list">
                        <figure class="image"><a href="#!"><img src="<?php echo $image_url;?>"></a></figure>
                        <div class="course-detail">
                            <div class="header">
                                <a class="category" href="#!"></a>
                                <span class="badge <?php echo $badge_class?>"><?php echo $course_type?></span>
                            </div>
                            <h3 class="course-title"><?php echo $post->title?></h3>
                            <div class="footer">
                                <span class="price"><?php the_course_price();?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="course-share">
                    <div class="copy">
                        <input type="text" name="" value="<?php echo get_bloginfo('url')?>/course/<?php echo $post->post_name;?>" id="popular_course_link" class="copyUrl" readonly>
                        <button class="button" type="submit" onclick="copyFunction('popular_course_link','popular_success_msg')">Copy</button>
                    </div>
                    <p class="success_msg" id="popular_success_msg"></p>
                    <div class="social">
                        <!-- <a href="#!" class="facebook"></a>
                        <a href="#!" class="twitter"></a>
                        <a href="#!" class="pinterest"></a>
                        <a href="#!" class="whatsapp"></a> -->
                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="<?php echo get_bloginfo('url')?>/course/<?php echo $post->post_name;?>" data-a2a-title="<?php echo $post->post_title. ' - '.get_bloginfo(); ?>" data-id="<?php echo $post->ID;?>">
                            <a class="a2a_button_facebook"></a>
                            <a class="a2a_button_twitter"></a>
                            <a class="a2a_button_pinterest"></a>
                            <a class="a2a_button_google_gmail"></a>
                            <a class="a2a_button_whatsapp"></a>
                            <a class="a2a_button_telegram"></a>
                      </div>
                    </div>

                </div>
              </div>
              </div>
              </div>
        <?php }} ?>
      </div>
    </div>
  </section>

  <section class="home-section categories-section">
    <div class="home-copy">
          <header class="section-header">
              <h2 class="medium-title">Categories</h2>
          </header>
          <?php
            $course_category_terms = get_terms( array(
                'taxonomy'   => "course-cat",
            ));
          ?>
      <div class="owl-carousel owl-theme categories_slider">
        <?php 
          foreach($course_category_terms as $term){
            $thumbnail_id = get_term_meta($term->term_id,'course_cat_thumbnail_id',true);
            $cat_img = wp_get_attachment_image($thumbnail_id);

        ?>
        <div class="item">
          <div class="category">
            <figure class="image"><a href="<?php echo get_bloginfo('url').'/course-cat/'.$term->slug.''?>" target="_blank"><?php echo $cat_img;?></a></figure>
            <span class="title"><?php echo $term->name;?></span>
          </div>
        </div>
      <?php }?>
      </div>
    </div>
  </section>

  <section class="home-section all-courses">
      <div class="home-copy">
        <header class="section-header">
          <h2 class="large-title">All Our Courses</h2>
          <a class="view-all" href="<?php echo bloginfo('url')?>/all-courses" target="_blank">View All</a>
        </header>
        <div class="nav-tabs-wrapper">
          <?php
          $course_category_terms = get_terms( array(
              'taxonomy'   => "course-cat",
          ));
          $tab_menu = '';
          $tab_content = '';
          $i = 0;
          $all_courses_settings .= '';
          $category_button_settings .= '';
          $bookmark_settings .= '';
          $user = wp_get_current_user();
          $users_courses = array();
          if(isset($user->ID) && $user->ID > 0)
          {
            $userIdentifier = $user->ID;
            $courses_with_types = apply_filters('wplms_usermeta_direct_query',$wpdb->prepare("SELECT posts.ID as id FROM {$wpdb->posts} AS posts LEFT JOIN {$wpdb->usermeta} AS meta ON posts.ID = meta.meta_key WHERE   posts.post_type   = %s AND   posts.post_status   = %s AND   meta.user_id   = %d",'course','publish',$user->ID));
              $result = $wpdb->get_results($courses_with_types);

              foreach($result as $course){
                $users_courses[]=$course->id;
              }
          }
          $args_all_courses = array(
            'post_type' => 'course',
            'post_status' => 'publish',
          );  
          
          $all_course = new WP_Query( $args_all_courses );
          $tab_menu .= '<li class="nav-item" role="presentation"><a class="nav-link active" id="all-course-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a></li>';
          $tab_content .= '<div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-course-tab"><div class="course-wrapper">';
          if ($all_course->have_posts()) : while ($all_course->have_posts()) : $all_course->the_post();
            global $post;
            $custom_fields = get_post_custom(); 
            ob_start();
            if (in_array($post->ID, $users_courses)){
              the_course_button();
            }
            $category_button_settings .= ob_get_clean();
            ob_start();
          the_course_price();
          $all_courses_settings .= ob_get_clean();
          ob_start();
          wpfp_course_link();
          $bookmark_settings .= ob_get_clean();
           // echo "<pre>";print_r($custom_fields);echo "</pre>";
            $duration = $custom_fields['vibe_validity'][0];
            $course_type="";
            $course_type = $custom_fields['vibe_course_type'][0];

            $str1="LIVE CLASSES";
            $str2="BLENDED";
            $str3="SELF-PACED";
          
            if(strcmp($str2, $course_type)==0){
               $badge_class = "blue";
            }
            elseif(strcmp($str3, $course_type)==0){
               $badge_class = "green";
            }
            elseif(strcmp($str1, $course_type)==0){
               $badge_class = "red";
            }
            else{
              $badge_class = "";
            }  
            $durationParameter = get_post_meta($post->ID,'vibe_course_validity_parameter',true);
            $session = $custom_fields['vibe_course_sessions'][0];
            $age_limit = $custom_fields['vibe_course_age_group'][0];
            $category_array = get_the_terms( $post->ID, 'course-cat');
            $courseID = $post->ID;
             $courseslug=get_the_permalink($courseID);
            $usersFavorites = wpfp_get_users_favorites();
            $coursePartner = "";

              $cb_course_id = get_post_meta($courseID,'celeb_school_course_id',true);
              if ($cb_course_id) {
                $coursePartner = "Celebrity School";
              }

              $aiws_course_id = get_post_meta($courseID,'aiws_program_id',true);
              if ($aiws_course_id) {
                $coursePartner = "AIWS";
              }
              
              if ( has_post_thumbnail() ) {
                  $image_url = get_the_post_thumbnail_url();
                }
                $pid=get_post_meta($courseID,'vibe_product',true);
                $pid=apply_filters('wplms_course_product_id',$pid,$courseID,0);

                if(is_numeric($pid) && bp_course_get_post_type($pid) == 'product'){
                  $pid=get_permalink($pid);
                  $check=vibe_get_option('direct_checkout');
                  $check =intval($check);
                  if(isset($check) &&  $check){
                    $pid .= '?redirect';
                  }
                }
                  $tab_content .= '<div class="column" data-id='.$post->ID.'>
              <div class="course-card">
                <figure class="image"><img alt="International Graded Guitar Exam Course" src="'. $image_url.'"></figure>
                <div class="course-copy">
                  <header class="course-header">
                    <a class="category" href="#">'.$category_array[0]->name.'</a>
                    <span class="badge '.$badge_class.'">'.$course_type.'</span>
                  </header>
                  <h2 class="course-title"><a href="'.get_permalink($post->ID).'">'. $post->post_title.'</a></h2>
                  <footer class="course-footer">';
                  $tab_content .= $category_button_settings;
                  $tab_content .= '<div class="left">
                      <span class="price">';
                  $tab_content .= $all_courses_settings;
                  $tab_content .='</span>
                    </div>
                    <div class="right">';
                    if (!in_array($post->ID, $users_courses)){
                      $tab_content .='<a href="'.$pid.'">
                      <svg class="cart" xmlns="http://www.w3.org/2000/svg" width="26" height="21.587" viewBox="0 0 26 21.587"> <g id="Group_20746" data-name="Group 20746" transform="translate(1 1)"> <g id="Group_15651" data-name="Group 15651" transform="translate(0 0)"> <path id="Path_30160" data-name="Path 30160" d="M-11952.5,9580.5h3.393l5.136,15.36h12.108" transform="translate(11952.5 -9580.5)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/> <path id="Path_30161" data-name="Path 30161" d="M-11898.5,9610.5h20.038l-3.893,9.023h-13" transform="translate(11902.465 -9607.673)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/> <g id="Ellipse_440" data-name="Ellipse 440" transform="translate(7.67 17.428)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"> <circle cx="1.579" cy="1.579" r="1.579" stroke="none"/> <circle cx="1.579" cy="1.579" r="0.579" fill="none"/> </g> <g id="Ellipse_441" data-name="Ellipse 441" transform="translate(16.874 17.428)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"> <circle cx="1.579" cy="1.579" r="1.579" stroke="none"/> <circle cx="1.579" cy="1.579" r="0.579" fill="none"/> </g> </g> </g> </svg>
                      </a>';
                    }
                    if(is_user_logged_in()){
                     $tab_content .= $bookmark_settings;
                    }
                    else{
                      $url = "/login-register";
                      $tab_content .='<a href="<?php echo get_site_url().$url; ?>"><i class="add-wishlist" title="Add to Wishlist"></i></a>';
                    }
                  
                      $tab_content .='
                      <a href="#share!" data-toggle="modal" data-target="#open_share_'.$courseID.'" >
                      <svg class="share" xmlns="http://www.w3.org/2000/svg" width="25.445" height="19.4" viewBox="0 0 25.445 19.4"> <g id="Group_20744" data-name="Group 20744" transform="translate(0.205 0.2)" style="isolation: isolate"> <path id="Path_38322" data-name="Path 38322" d="M21.417,21a.53.53,0,0,1,.275.133l9.091,8.188a.724.724,0,0,1,.1.919.626.626,0,0,1-.1.114l-9.091,8.188a.52.52,0,0,1-.8-.12.723.723,0,0,1-.118-.392V34.746a18.89,18.89,0,0,0-4.705.389,17.55,17.55,0,0,0-9.127,4.7.518.518,0,0,1-.8-.062.733.733,0,0,1-.113-.634C8.4,30.71,15.625,26.694,20.778,25.094V21.655a.618.618,0,0,1,.564-.66A.446.446,0,0,1,21.417,21Zm.5,1.985v2.6a.645.645,0,0,1-.426.634C17,27.53,10.737,30.858,7.913,37.407a19.292,19.292,0,0,1,7.964-3.562,21.972,21.972,0,0,1,5.5-.4.621.621,0,0,1,.542.655v2.589l7.6-6.848Z" transform="translate(-6.003 -20.995)" stroke-width="0.4"/> </g> </svg>
                      </a>
                    </div>
                  </footer>
                  <input type="hidden" class="course_id" data-id="'.$courseID.'" value="'.$courseID.'">
                  <input type="hidden" class="badge_class" data-id="'.$badge_class.'" value="'.$courseID.'">
                  <input type="hidden" class="course_id" data-id="'.$course_type.'" value="'.$courseID.'">
                  <input type="hidden" id="course_name_'.$courseID.'" value="'.$post->post_title.'">
                  <input type="hidden" id="course_url_'.$courseID.'" value="'.$courseslug.'">
                  <input type="hidden" id="course_category_'.$courseID.'" value="'.$category_array[0]->name.'">
                  <input type="hidden" id="course_partner_'.$courseID.'" value="'.$coursePartner.'">
                  <input type="hidden" id="category_id_'.$courseID.'" value="'.$category_array[0]->term_id.'">
                  <input type="hidden" id="course_id_'.$courseID.'" value="'.$courseID.'">
                  <input type="hidden" id="course_price_'.$courseID.'" value="0">
                  <input type="hidden" id="course_tax_'.$courseID.'" value="0">
                  <input type="hidden" id="age_group_'.$courseID.'" value="'.$age_limit.'">
                  <input type="hidden" id="course_duration_'.$courseID.'" value="'. get_post_meta($courseID, "vibe_validity", true).'">
                  <input type="hidden" id="session_duration_'.$courseID.'" value="'. get_post_meta($courseID, "vibe_course_session_length", true).'">
                  <input type="hidden" id="wishlisted_course_'.$courseID.'" value="0">
                </div>
              </div>
            </div>';
            $tab_content .= '<div class="sharing-course modal fade" id="open_share_'.$courseID.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
        <button type="button" class="close sharing close-button" data-dismiss="modal" aria-label="Close"></button>
        <div class="course-list">
            <h4 class="title">Share This Course</h4>
            <div class="list">
                <figure class="image"><a href="#!"><img src="'. $image_url.'"></a></figure>
                <div class="course-detail">
                    <div class="header">
                        <a class="category" href="#!"></a>
                        <span class="badge '.$badge_class.'">'.$course_type.'</span>
                    </div>
                    <h3 class="course-title">'.$post->post_title.'</h3>
                    <div class="footer">';
                    $tab_content .= $all_courses_settings;
                        
                    $tab_content .='</div>
                </div>
            </div>
        </div>
        <div class="course-share">
            <div class="copy">
                <input type="text" name="" value="'.$courseslug.'" class="copyText" readonly>
                <button class="button" type="submit" onclick="copyUrl()">Copy</button>
            </div>
            <p class="successMsg"></p>
            <div class="social">
                <!-- <a href="#!" class="facebook"></a>
                <a href="#!" class="twitter"></a>
                <a href="#!" class="pinterest"></a>
                <a href="#!" class="whatsapp"></a> -->
                <div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="'.get_bloginfo('url').'/course/'.$post->post_name.'" data-a2a-title="'.$post->post_title. ' - '.get_bloginfo().'" data-id="'.$post->ID.'">
                    <a class="a2a_button_facebook"></a>
                    <a class="a2a_button_twitter"></a>
                    <a class="a2a_button_pinterest"></a>
                    <a class="a2a_button_google_gmail"></a>
                    <a class="a2a_button_whatsapp"></a>
                    <a class="a2a_button_telegram"></a>
              </div>
            </div>
            </div>
            </div>
        </div>
    </div>';

            $all_courses_settings = '';
            $category_button_settings = '';
            $bookmark_settings = '';
            endwhile;
            endif;
          $tab_content .= '</div></div>';   
          $output_settings .= ''; 
          $button_output_settings .= ''; 
          $bookmark_output_settings .= ''; 

          foreach($course_category_terms as $term){
            $thumbnail_id = get_term_meta($term->term_id,'course_cat_thumbnail_id',true);
            $cat_img = wp_get_attachment_image($thumbnail_id);
            
            
              
          $tab_menu .= '
           <li class="nav-item" role="presentation"><a class="nav-link" id="contact-tab" data-toggle="tab" href="#course_cat_'.$term->term_id.'" role="tab" aria-controls="contact" aria-selected="false">'.$term->name.'</a></li>
          ';
          $tab_content .= '<div class="tab-pane fade show" id="course_cat_'.$term->term_id.'" role="tabpanel" aria-labelledby="'.$term->name.'-tab">
          ';
        
            $tab_content .='<div class="course-wrapper">';
            $args_category_course = array(
                'post_type' => 'course',
                'post_status' => 'publish',
                'tax_query' => array(
                  array(
                      'taxonomy' => 'course-cat',
                      'field'    => 'term_id',
                      'terms'    => $term->term_id
                  )
                ),
                // 'meta_query'  => array(
                //   'relation'  => 'AND',
                //   array(
                //     'key'   =>'vibe_course_event',
                //     'value'   => '0',
                //     'compare' => '='
                //     )
                //   )
              );  
            $category_course = new WP_Query( $args_category_course );
          //echo "Last SQL-Query: {$category_course->request}";
            if ($category_course->have_posts()) : while ($category_course->have_posts()) : $category_course->the_post();
            global $post;
            $custom_fields = get_post_custom(); 
           // echo "<pre>";print_r($custom_fields);echo "</pre>";
            $duration = $custom_fields['vibe_validity'][0];
            $course_type="";
            $course_type = $custom_fields['vibe_course_type'][0];

            $str1="LIVE CLASSES";
            $str2="BLENDED";
            $str3="SELF-PACED";
          
            if(strcmp($str2, $course_type)==0){
               $badge_class = "blue";
            }
            elseif(strcmp($str3, $course_type)==0){
               $badge_class = "green";
            }
            elseif(strcmp($str1, $course_type)==0){
               $badge_class = "red";
            }
            else{
              $badge_class = "";
            }  
            $durationParameter = get_post_meta($post->ID,'vibe_course_validity_parameter',true);
            $session = $custom_fields['vibe_course_sessions'][0];
            $age_limit = $custom_fields['vibe_course_age_group'][0];
            $category_array = get_the_terms( $post->ID, 'course-cat');
            $courseID = $post->ID;
             $courseslug=get_the_permalink($courseID);
            $usersFavorites = wpfp_get_users_favorites();
            $coursePartner = "";

              $cb_course_id = get_post_meta($courseID,'celeb_school_course_id',true);
              if ($cb_course_id) {
                $coursePartner = "Celebrity School";
              }

              $aiws_course_id = get_post_meta($courseID,'aiws_program_id',true);
              if ($aiws_course_id) {
                $coursePartner = "AIWS";
              }
              
              if ( has_post_thumbnail() ) {
                  $image_url = get_the_post_thumbnail_url();
                }
                ob_start();
          wpfp_course_link();
          $bookmark_output_settings .= ob_get_clean();
                
                  $tab_content .= '<div class="column">
              <div class="course-card">
                <figure class="image"><img alt="International Graded Guitar Exam Course" src="'. $image_url.'"></figure>
                <div class="course-copy">
                  <header class="course-header">
                    <a class="category" href="#">'.$category_array[0]->name.'</a>
                    <span class="badge '.$badge_class.'">'.$course_type.'</span>
                  </header>
                  <h2 class="course-title"><a href="'.get_permalink($post->ID).'">'. $post->post_title.'</a></h2>
                  <footer class="course-footer">';
                    ob_start();
                    if (in_array($post->ID, $users_courses)){
                      the_course_button();
                    }
                    $button_output_settings .= ob_get_clean();
                    $tab_content .= '<div class="left">';
                    $tab_content .= $button_output_settings;

                    $tab_content .= '<span class="price">';
                    ob_start();
                    the_course_price();
                    $output_settings .= ob_get_clean();
                    $tab_content .= $output_settings; 
                    $tab_content .='</span>
                    </div>
                    <div class="right">';
                    if (!in_array($post->ID, $users_courses)){
                      $tab_content .='<a href="'.$pid.'">
                      <svg class="cart" xmlns="http://www.w3.org/2000/svg" width="26" height="21.587" viewBox="0 0 26 21.587"> <g id="Group_20746" data-name="Group 20746" transform="translate(1 1)"> <g id="Group_15651" data-name="Group 15651" transform="translate(0 0)"> <path id="Path_30160" data-name="Path 30160" d="M-11952.5,9580.5h3.393l5.136,15.36h12.108" transform="translate(11952.5 -9580.5)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/> <path id="Path_30161" data-name="Path 30161" d="M-11898.5,9610.5h20.038l-3.893,9.023h-13" transform="translate(11902.465 -9607.673)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/> <g id="Ellipse_440" data-name="Ellipse 440" transform="translate(7.67 17.428)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"> <circle cx="1.579" cy="1.579" r="1.579" stroke="none"/> <circle cx="1.579" cy="1.579" r="0.579" fill="none"/> </g> <g id="Ellipse_441" data-name="Ellipse 441" transform="translate(16.874 17.428)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"> <circle cx="1.579" cy="1.579" r="1.579" stroke="none"/> <circle cx="1.579" cy="1.579" r="0.579" fill="none"/> </g> </g> </g> </svg>
                      </a>';
                      }
                      $tab_content .= $bookmark_output_settings;
                      $tab_content .= '<a href="#share!" data-toggle="modal" data-target="#open_share_'.$courseID.'" >
                      <svg class="share" xmlns="http://www.w3.org/2000/svg" width="25.445" height="19.4" viewBox="0 0 25.445 19.4"> <g id="Group_20744" data-name="Group 20744" transform="translate(0.205 0.2)" style="isolation: isolate"> <path id="Path_38322" data-name="Path 38322" d="M21.417,21a.53.53,0,0,1,.275.133l9.091,8.188a.724.724,0,0,1,.1.919.626.626,0,0,1-.1.114l-9.091,8.188a.52.52,0,0,1-.8-.12.723.723,0,0,1-.118-.392V34.746a18.89,18.89,0,0,0-4.705.389,17.55,17.55,0,0,0-9.127,4.7.518.518,0,0,1-.8-.062.733.733,0,0,1-.113-.634C8.4,30.71,15.625,26.694,20.778,25.094V21.655a.618.618,0,0,1,.564-.66A.446.446,0,0,1,21.417,21Zm.5,1.985v2.6a.645.645,0,0,1-.426.634C17,27.53,10.737,30.858,7.913,37.407a19.292,19.292,0,0,1,7.964-3.562,21.972,21.972,0,0,1,5.5-.4.621.621,0,0,1,.542.655v2.589l7.6-6.848Z" transform="translate(-6.003 -20.995)" stroke-width="0.4"/> </g> </svg>
                      </a>
                    </div>
                  </footer>
                  <input type="hidden" id="course_name_'.$courseID.'" value="'.$post->post_title.'">
                  <input type="hidden" id="course_url_'.$courseID.'" value="'.$courseslug.'">
                  <input type="hidden" id="course_category_'.$courseID.'" value="'.$category_array[0]->name.'">
                  <input type="hidden" id="course_partner_'.$courseID.'" value="'.$coursePartner.'">
                  <input type="hidden" id="category_id_'.$courseID.'" value="'.$category_array[0]->term_id.'">
                  <input type="hidden" id="course_id_'.$courseID.'" value="'.$courseID.'">
                  <input type="hidden" id="course_price_'.$courseID.'" value="0">
                  <input type="hidden" id="course_tax_'.$courseID.'" value="0">
                  <input type="hidden" id="age_group_'.$courseID.'" value="'.$age_limit.'">
                  <input type="hidden" id="course_duration_'.$courseID.'" value="'. get_post_meta($courseID, "vibe_validity", true).'">
                  <input type="hidden" id="session_duration_'.$courseID.'" value="'. get_post_meta($courseID, "vibe_course_session_length", true).'">
                  <input type="hidden" id="wishlisted_course_'.$courseID.'" value="0">
                </div>
              </div>
            </div><div class="sharing-course modal fade" id="open_share_'.$courseID.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
        <button type="button" class="close sharing close-button" data-dismiss="modal" aria-label="Close"></button>
        <div class="course-list">
            <h4 class="title">Share This Course</h4>
            <div class="list">
                <figure class="image"><a href="#!"><img src="'. $image_url.'"></a></figure>
                <div class="course-detail">
                    <div class="header">
                        <a class="category" href="#!"></a>
                        <span class="badge '.$badge_class.'">'.$course_type.'</span>
                    </div>
                    <h3 class="course-title">'.$post->post_title.'</h3>
                    <div class="footer">
                        <span class="price">';
                        $tab_content .= $output_settings;

                        $tab_content .='</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="course-share">
            <div class="copy">
                <input type="text" name="" value="'.$courseslug.'" class="copyText" readonly>
                <button class="button" type="submit" onclick="copyUrl()">Copy</button>
            </div>
            <p class="successMsg"></p>
            <div class="social">
                <!-- <a href="#!" class="facebook"></a>
                <a href="#!" class="twitter"></a>
                <a href="#!" class="pinterest"></a>
                <a href="#!" class="whatsapp"></a> -->
                <div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="'.get_bloginfo('url').'/course/'.$post->post_name.'" data-a2a-title="'.$post->post_title. ' - '.get_bloginfo().'" data-id="'.$post->ID.'">
                    <a class="a2a_button_facebook"></a>
                    <a class="a2a_button_twitter"></a>
                    <a class="a2a_button_pinterest"></a>
                    <a class="a2a_button_google_gmail"></a>
                    <a class="a2a_button_whatsapp"></a>
                    <a class="a2a_button_telegram"></a>
              </div>
            </div>
        </div>
    </div>
    </div>
    </div>';
                
                
             $output_settings = '';
             $button_output_settings = '';
             $bookmark_output_settings = '';
            endwhile;
            endif;
            $tab_content .= '</div></div>';
             $i++;
                  } ?>
        <ul class="nav nav-tabs" id="allCoursesLinks" role="tablist">
        
        <?php
   echo $tab_menu;
   ?>
      </ul>
            </div>
      <div class="tab-content" id="myTabContent">
        <!-- <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
          <div class="course-wrapper"> -->
            
             <?php
   echo $tab_content;
   ?>
          <!-- </div>
        </div> -->
        <!-- <div class="tab-pane fade" id="acting" role="tabpanel" aria-labelledby="acting-tab">Acting</div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">fdsfsd</div> -->
      </div>
      </div>
    </section>

<!--------------------------- CODE TO DO -------------------------------->

<section class="home-section about-htschool">
        <div class="copy">
            <h2 class="large-title">About HT School</h2>
            <p>Unveiling HT School, India’s smartest education initiative from the pioneering media group, Hindustan Times Join the HT School bandwagon to supplement your child’s academic excellence with real-life skills and the competitive edge that will set them up for success.</p>
        </div>
        <div class="logo-wrapper">
            <div class="logo">
                <div class="column">
                    <img src="<?php echo bloginfo('template_url')?>/assets/images/htschool/career-mate.jpg" alt="Career Mate">
                    <a class="view-all" href="#!">Career Mate</a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="6.165" height="74.246" viewBox="0 0 6.165 74.246"><path id="Path_39321" data-name="Path 39321" d="M1091.286,1950.1c-1.048-.067-2.038-.13-2.843-.131q-1.712,0-3.423-.005-1.817,0-3.634,0-2.573,0-5.144.023a.823.823,0,0,0-.83.839.878.878,0,0,0,.868.892c2,.021,4.124.03,6.682.03q2.879,0,5.759-.01,2.661-.008,5.325-.011c.406,0,1.006.054,1.7.116.919.083,1.96.177,2.907.177a4.736,4.736,0,0,0,2.46-.459,10.06,10.06,0,0,0,1.371-1.155c.894-.84,1.908-1.793,2.817-1.793a1.213,1.213,0,0,1,.372.057c.471.15.926.316,1.378.48a12.334,12.334,0,0,0,4.3.987c.581,0,1.162,0,1.744-.007.621,0,1.243-.007,1.865-.007a60,60,0,0,1,6.285.263,110.423,110.423,0,0,1,14.306,2.752.763.763,0,0,0,.179.022.8.8,0,0,0,.666-.377c.78-1.161,2.242-1.726,4.469-1.726a31.051,31.051,0,0,1,6.382.937l.462.1.171-.108c.252-.159.507-.316.762-.465l1.017-.592-1.136-.307a15.137,15.137,0,0,0-2.8-.557c-.582-.042-1.2-.116-1.851-.194a28.2,28.2,0,0,0-3.358-.27,8.557,8.557,0,0,0-2.787.4,5.749,5.749,0,0,0-2.147,1.225.967.967,0,0,1-.618.149,10.361,10.361,0,0,1-2.677-.613c-.388-.125-.724-.233-.98-.291a71.783,71.783,0,0,0-11.245-1.8c-1.216-.075-2.412-.107-3.568-.138a33.786,33.786,0,0,1-9.7-1.21,6.642,6.642,0,0,0-1.953-.332,2.765,2.765,0,0,0-2.419,1.105c-1.014,1.485-3.255,2.176-7.053,2.176C1093.979,1950.272,1092.548,1950.18,1091.286,1950.1Z" transform="translate(1953.155 -1075.412) rotate(90)" fill="#171724"/></svg>
                </div>
                <div class="column">
                    <img src="<?php echo bloginfo('template_url')?>/assets/images/htschool/olympiad.jpg" alt="Olympiad 2021">
                    <a class="view-all" href="#!">Olympiad 2021</a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="6.165" height="74.246" viewBox="0 0 6.165 74.246"><path id="Path_39321" data-name="Path 39321" d="M1091.286,1950.1c-1.048-.067-2.038-.13-2.843-.131q-1.712,0-3.423-.005-1.817,0-3.634,0-2.573,0-5.144.023a.823.823,0,0,0-.83.839.878.878,0,0,0,.868.892c2,.021,4.124.03,6.682.03q2.879,0,5.759-.01,2.661-.008,5.325-.011c.406,0,1.006.054,1.7.116.919.083,1.96.177,2.907.177a4.736,4.736,0,0,0,2.46-.459,10.06,10.06,0,0,0,1.371-1.155c.894-.84,1.908-1.793,2.817-1.793a1.213,1.213,0,0,1,.372.057c.471.15.926.316,1.378.48a12.334,12.334,0,0,0,4.3.987c.581,0,1.162,0,1.744-.007.621,0,1.243-.007,1.865-.007a60,60,0,0,1,6.285.263,110.423,110.423,0,0,1,14.306,2.752.763.763,0,0,0,.179.022.8.8,0,0,0,.666-.377c.78-1.161,2.242-1.726,4.469-1.726a31.051,31.051,0,0,1,6.382.937l.462.1.171-.108c.252-.159.507-.316.762-.465l1.017-.592-1.136-.307a15.137,15.137,0,0,0-2.8-.557c-.582-.042-1.2-.116-1.851-.194a28.2,28.2,0,0,0-3.358-.27,8.557,8.557,0,0,0-2.787.4,5.749,5.749,0,0,0-2.147,1.225.967.967,0,0,1-.618.149,10.361,10.361,0,0,1-2.677-.613c-.388-.125-.724-.233-.98-.291a71.783,71.783,0,0,0-11.245-1.8c-1.216-.075-2.412-.107-3.568-.138a33.786,33.786,0,0,1-9.7-1.21,6.642,6.642,0,0,0-1.953-.332,2.765,2.765,0,0,0-2.419,1.105c-1.014,1.485-3.255,2.176-7.053,2.176C1093.979,1950.272,1092.548,1950.18,1091.286,1950.1Z" transform="translate(1953.155 -1075.412) rotate(90)" fill="#171724"/></svg>
                </div>
                <div class="column">
                    <img src="<?php echo bloginfo('template_url')?>/assets/images/htschool/codeathon.jpg" alt="Code A Thon">
                    <a class="view-all" href="#!">Code A Thon</a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="6.165" height="74.246" viewBox="0 0 6.165 74.246"><path id="Path_39321" data-name="Path 39321" d="M1091.286,1950.1c-1.048-.067-2.038-.13-2.843-.131q-1.712,0-3.423-.005-1.817,0-3.634,0-2.573,0-5.144.023a.823.823,0,0,0-.83.839.878.878,0,0,0,.868.892c2,.021,4.124.03,6.682.03q2.879,0,5.759-.01,2.661-.008,5.325-.011c.406,0,1.006.054,1.7.116.919.083,1.96.177,2.907.177a4.736,4.736,0,0,0,2.46-.459,10.06,10.06,0,0,0,1.371-1.155c.894-.84,1.908-1.793,2.817-1.793a1.213,1.213,0,0,1,.372.057c.471.15.926.316,1.378.48a12.334,12.334,0,0,0,4.3.987c.581,0,1.162,0,1.744-.007.621,0,1.243-.007,1.865-.007a60,60,0,0,1,6.285.263,110.423,110.423,0,0,1,14.306,2.752.763.763,0,0,0,.179.022.8.8,0,0,0,.666-.377c.78-1.161,2.242-1.726,4.469-1.726a31.051,31.051,0,0,1,6.382.937l.462.1.171-.108c.252-.159.507-.316.762-.465l1.017-.592-1.136-.307a15.137,15.137,0,0,0-2.8-.557c-.582-.042-1.2-.116-1.851-.194a28.2,28.2,0,0,0-3.358-.27,8.557,8.557,0,0,0-2.787.4,5.749,5.749,0,0,0-2.147,1.225.967.967,0,0,1-.618.149,10.361,10.361,0,0,1-2.677-.613c-.388-.125-.724-.233-.98-.291a71.783,71.783,0,0,0-11.245-1.8c-1.216-.075-2.412-.107-3.568-.138a33.786,33.786,0,0,1-9.7-1.21,6.642,6.642,0,0,0-1.953-.332,2.765,2.765,0,0,0-2.419,1.105c-1.014,1.485-3.255,2.176-7.053,2.176C1093.979,1950.272,1092.548,1950.18,1091.286,1950.1Z" transform="translate(1953.155 -1075.412) rotate(90)" fill="#171724"/></svg>
                </div>
                <div class="column">
                    <img src="<?php echo bloginfo('template_url')?>/assets/images/htschool/scholarship.jpg" alt="Scholarship">
                    <a class="view-all" href="#!">Scholarship</a>

                </div>
            </div>
        </div>
    </section>

<!-- ======= Latest News Section ======= -->
<?php
$menu_name = 'news-menu'; //menu slug
$locations = get_nav_menu_locations();
$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
?>
<section class="home-section editor_desk">
  <div class="home-copy">
    <header class="section-header">
      <h2 class="large-title">Editor’s Desk</h2>
        <a class="view-all" href="<?php echo bloginfo('url')?>/editorsdesk" target="_blank">View More</a>
      </header>
     <!--  <li class="nav-item" role="presentation"><a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a></li> -->
      <?php 
      $editor_all_tab_menu = '';
      $editor_all_tab_content = '';
      $args_news = array(
          'post_type' => 'post',
          'post_status' => 'publish',
          'posts_per_page' => 10,
          'order'=>'DESC',
          'orderby' => 'publish_date',
        );
      $Query_news = new WP_Query( $args_news );

      $editor_all_tab_menu .= '<li class="nav-item" role="presentation"><a class="nav-link active" id="all-news-category" data-toggle="tab" href="#all-news" role="tab" aria-controls="all-news-category" aria-selected="true">All</a></li>';
      $editor_all_tab_content .= '
        <div class="tab-pane fade show active" id="all-news" role="tabpanel" aria-labelledby="all-news-category"><div class="articles">';
           if ($Query_news->have_posts()) : 

          while ($Query_news->have_posts()) : $Query_news->the_post();
          if( $Query_news->current_post == 0 ) {
      $editor_all_tab_content .= '
              <div class="featured">
                <div class="image">';
                  if ( has_post_thumbnail() ) {
                    $featured_image = get_the_post_thumbnail_url(); } 
                  $editor_all_tab_content .= '<a href='.post_permalink().'><img src='.$featured_image.'></a>
                </div>
                <span class="date-time">'.strtoupper(get_post_meta(get_the_ID(), 'news_location', true)).' '.get_the_date('M d, Y H:i').'</span>
                  <h2 class="article-title"><a href='.post_permalink().'>'.get_the_title().'</a></h2>
                  <p>'.get_the_title().'</p>
              </div>';
              } endwhile; endif;

          $editor_all_tab_content .= '<div class="img-artlce">';
                if ($Query_news->have_posts()) : while ($Query_news->have_posts()) : $Query_news->the_post();
                if( $Query_news->current_post >= 1 &&  $Query_news->current_post <= 4) {
                  
                $editor_all_tab_content .= '<div class="column">
                  <div class="image">';
                    if ( has_post_thumbnail() ) {
                      $featured_image = get_the_post_thumbnail_url();
                    }
                    
                    $editor_all_tab_content .= '<a href='.post_permalink().'><img src='.$featured_image.'></a></div>
                    <div class="copy">
                      <span class="date-time">'.strtoupper(get_post_meta(get_the_ID(), 'news_location', true)).' '.get_the_date('M d, Y H:i').'</span>
                  <h2 class="article-title"><a href='.post_permalink().'>'.get_the_title().'</a></h2>
                    </div>
                </div>';
                } endwhile; endif;  
              $editor_all_tab_content .= '</div><div class="link-article">
                <ul>';
                  if ($Query_news->have_posts()) : while ($Query_news->have_posts()) : $Query_news->the_post();
                          if( $Query_news->current_post >= 5 && $Query_news->current_post <= 9) {
                  
                  $editor_all_tab_content .= '<li>
                    <span class="date-time">'.strtoupper(get_post_meta(get_the_ID(), 'news_location', true)).' '.get_the_date('M d, Y H:i').'</span>
                  <h2 class="article-title"><a href='.post_permalink().'>'.get_the_title().'</a></h2>
                  </li>'; 
                  } endwhile; endif;                                
                $editor_all_tab_content .= '</ul>
            </div></div></div>';
      foreach ($menuitems as $menu) {
        $editor_all_tab_menu .= '<li id='.$menu->ID.' class="nav-item" role="presentation" data-scroll='.$menu->ID.'><a class="nav-link" id="all-tab" data-toggle="tab" href="#news_category_'.$menu->ID.'" role="tab" aria-controls="all" aria-selected="true" data-id='.$menu->ID.'>'.$menu->title.'</a></li>';  
        $args = array(
          'post_type' => 'post',
          'post_status' => 'publish',
          'category_name' => $menu->title,
          'posts_per_page' => 10,
          'order'=>'DESC',
          'orderby' => 'publish_date',
        );
        $Query = new WP_Query( $args );
        $editor_all_tab_content .='<div class="tab-pane fade show" id="news_category_'.$menu->ID.'" role="tabpanel" aria-labelledby="all-'.$menu->title.'">
            <div class="articles">';
        if ($Query->have_posts()) : 

          while ($Query->have_posts()) : $Query->the_post();
          if( $Query->current_post == 0 ) {
      $editor_all_tab_content .= '
              <div class="featured">
                <div class="image">';
                  if ( has_post_thumbnail() ) {
                    $featured_image = get_the_post_thumbnail_url(); } 
                  $editor_all_tab_content .= '<a href='.post_permalink().'><img src='.$featured_image.'></a>
                </div>
                <span class="date-time">'.strtoupper(get_post_meta(get_the_ID(), 'news_location', true)).' '.get_the_date('M d, Y H:i').'</span>
                  <h2 class="article-title"><a href='.post_permalink().'>'.get_the_title().'</a></h2>
                  <p>'.get_the_title().'</p>
              </div>';
              } endwhile; endif;

          $editor_all_tab_content .= '<div class="img-artlce">';
                if ($Query->have_posts()) : while ($Query->have_posts()) : $Query->the_post();
                if( $Query->current_post >= 1 &&  $Query->current_post <= 4) {
                  
                $editor_all_tab_content .= '<div class="column">
                  <div class="image">';
                    if ( has_post_thumbnail() ) {
                      $featured_image = get_the_post_thumbnail_url();
                    }
                    
                    $editor_all_tab_content .= '<a href='.post_permalink().'><img src='.$featured_image.'></a></div>
                    <div class="copy">
                      <span class="date-time">'.strtoupper(get_post_meta(get_the_ID(), 'news_location', true)).' '.get_the_date('M d, Y H:i').'</span>
                  <h2 class="article-title"><a href='.post_permalink().'>'.get_the_title().'</a></h2>
                    </div>
                </div>';
                } endwhile; endif;  
              $editor_all_tab_content .= '</div><div class="link-article">
                <ul>';
                  if ($Query->have_posts()) : while ($Query->have_posts()) : $Query->the_post();
                          if( $Query->current_post >= 5 && $Query->current_post <= 9) {
                  
                  $editor_all_tab_content .= '<li>
                    <span class="date-time">'.strtoupper(get_post_meta(get_the_ID(), 'news_location', true)).' '.get_the_date('M d, Y H:i').'</span>
                  <h2 class="article-title"><a href='.post_permalink().'>'.get_the_title().'</a></h2>
                  </li>'; 
                  } endwhile; endif;                                
                $editor_all_tab_content .= '</ul>
            </div></div></div>';

      } 




      ?> 
      <div class="nav-tabs-wrapper">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          
            <?php echo $editor_all_tab_menu;?>
                      
        </ul>
      </div>

     
          
        <div class="tab-content" id="myTabContent">
           <?php
           echo $editor_all_tab_content;
     ?>
      </div>
    </div>
  </section>

    <section class="home-section student-testimonials">
      <div class="home-copy">
        <header class="section-header">
            <h2 class="large-title">Student Testimonials</h2>
            <a class="view-all" href="#!">View More</a>
        </header>
      <div class="owl-carousel owl-theme student_slider">
        <?php
        $args1 = array(
          'post_type' => 'testimonials',
          'post_status' => 'publish',
        );
        $Query1 = new WP_Query( $args1 );
        $counter = 0;
        if ($Query1->have_posts()) : while ($Query1->have_posts()) : $Query1->the_post();
          $custom_fields = get_post_custom();
        ?>
          <div class="item">
            <div class="course-card">
              <figure class="video">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>">
                <!-- <a class="play" href="#!"><span class="time">3:20</span></a> -->
              </figure>
              <div class="course-copy">
                <h2 class="course-title"><a href="#!"><?php echo the_content(); ?></a></h2>
                <footer class="course-footer">
                  <div class="left">
                    <div class="profile">
                      <span class="name"><?php echo $custom_fields['vibe_testimonial_author_name'][0] ?></span>
                      <span class="position"><?php echo $custom_fields['vibe_testimonial_author_designation'][0] ?></span>
                    </div>
                  </div>
                  <div class="right">
                    <a href="" class="hover_share testimonial_share" data-toggle="modal" data-target="#open_testimonial_share" data-id="<?php echo get_the_ID();?>">
                      <input type="hidden" id="testimonial_id_<?php echo get_the_ID();?>" value="<?php echo get_the_ID();?>" data-id="<?php echo get_the_ID();?>">
                      <input type="hidden" id="testimonial_title_<?php echo get_the_ID();?>" value="<?php echo the_content(); ?>">
                      <input type="hidden" id="testimonial_name_<?php echo get_the_ID();?>" value="<?php echo $custom_fields['vibe_testimonial_author_name'][0] ?>">
                      <input type="hidden" id="testimonial_image_<?php echo get_the_ID();?>" value="<?php echo get_the_post_thumbnail_url(); ?>">
                      <input type="hidden" id="testimonial_designation_<?php echo get_the_ID();?>" value="<?php echo $custom_fields['vibe_testimonial_author_designation'][0] ?>">
                      <input type="hidden" id="testimonial_url_<?php echo get_the_ID();?>" value="<?php echo get_permalink(); ?>">
                    <svg class="share" xmlns="http://www.w3.org/2000/svg" width="25.445" height="19.4" viewBox="0 0 25.445 19.4"> <g id="Group_20744" data-name="Group 20744" transform="translate(0.205 0.2)" style="isolation: isolate"> <path id="Path_38322" data-name="Path 38322" d="M21.417,21a.53.53,0,0,1,.275.133l9.091,8.188a.724.724,0,0,1,.1.919.626.626,0,0,1-.1.114l-9.091,8.188a.52.52,0,0,1-.8-.12.723.723,0,0,1-.118-.392V34.746a18.89,18.89,0,0,0-4.705.389,17.55,17.55,0,0,0-9.127,4.7.518.518,0,0,1-.8-.062.733.733,0,0,1-.113-.634C8.4,30.71,15.625,26.694,20.778,25.094V21.655a.618.618,0,0,1,.564-.66A.446.446,0,0,1,21.417,21Zm.5,1.985v2.6a.645.645,0,0,1-.426.634C17,27.53,10.737,30.858,7.913,37.407a19.292,19.292,0,0,1,7.964-3.562,21.972,21.972,0,0,1,5.5-.4.621.621,0,0,1,.542.655v2.589l7.6-6.848Z" transform="translate(-6.003 -20.995)" stroke-width="0.4"/> </g> </svg>
                    </a>
                  </div>
                </footer>
              </div>
            </div>
          </div>
        <?php
        $counter++;
          endwhile; endif;
        ?> 
        </div>
      </div>
      
  </section>
  </main><!-- End #main -->
  <!-- <script type="text/javascript">
    jQuery('#all-course-tab').click(function(){
      jQuery('#myTabContent .tab-pane').removeClass('active');
      jQuery('#all').addClass('tab-pane fade show active in');
    });
  </script> -->
  <?php
  get_footer(vibe_get_footer());
  ?>