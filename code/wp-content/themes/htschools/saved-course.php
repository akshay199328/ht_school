<?php

/**
 * BuddyPress Saved Course
 *
 * @package BuddyPress
 * @subpackage bp-default
 */

get_header( vibe_get_header() ); 

$profile_layout = vibe_get_customizer('profile_layout');

vibe_include_template("profile/top$profile_layout.php");  
?>
<div id="item-body">
  <div class="col-md-3 left_tabs pull-left">
    <div class="item-list-tabs no-ajax" id="subnav" role="navigation">
     <ul class="left_tab">
      <?php if ( bp_is_my_profile() ) bp_get_options_nav(); 
      do_action('bp_course_get_options_sub_nav');
      ?>
    </ul>
    <ul>
    </div><!-- .item-list-tabs -->
  </div>
  <div class="col-md-9 pull-left"> 
    <div class="profile-card transprent">
      <h1>Course Wishlist</h1>
      <?php 
      $course_data = wpfp_get_users_favorites();
      $count_array = []; 
      if(!empty($course_data)){
        foreach ($course_data as $post_id) {
         $post = get_post($post_id);
         if($post->post_type == "course"){
          array_push($count_array, $post->ID);
          }
        }
      }
    $count = count($count_array);
    if($count > 0){
    foreach ($course_data as $post_id) {

      $post = get_post($post_id);

      if ( has_post_thumbnail() ) { 
        $featured_image = get_the_post_thumbnail_url();
      }
      $postDate = get_the_date('M d, Y H:i');
      $custom_fields = get_post_custom();
      $duration = $custom_fields['vibe_validity'][0];
       $course_type="";
            $course_type = $custom_fields['vibe_course_type'][0];

            $str1="LIVE CLASSES";
            $str2="LIVE + SELF PACED";
            $str3="SELF PACED";
        
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
      $session = $custom_fields['vibe_course_sessions'][0];
      $age_limit = $custom_fields['vibe_course_age_group'][0];
      $category_array = get_the_terms( $post->ID, 'course-cat');
      $excerpt = get_post_field('post_excerpt', $post->ID);
      $durationParameter = get_post_meta($post->ID,'vibe_course_validity_parameter',true);
      $courseID = $post->ID;
      $courseslug=get_site_url().'/?p='.$courseID;
      $usersFavorites = wpfp_get_users_favorites();
      $user = wp_get_current_user();
      $userIdentifier = "";

      if(!is_array($usersFavorites)) $usersFavorites = array();

      if(isset($user->ID) && $user->ID > 0)
      {
        $userIdentifier = $user->ID;
      }
      else if(isset($_COOKIE['PHPSESSID']))
      {
        $userIdentifier = $_COOKIE['PHPSESSID'];
      }
      $coursePartner = "";

        $cb_course_id = get_post_meta($courseID,'celeb_school_course_id',true);
        if ($cb_course_id) {
          $coursePartner = "Celebrity School";
        }

        $aiws_course_id = get_post_meta($courseID,'aiws_program_id',true);
        if ($aiws_course_id) {
          $coursePartner = "AIWS";
        }
      if($post->post_type == "course"){
        ?>
        <div class="col-md-12 mrg space <?php echo $course_classes; ?>" data-aos="zoom-out" data-aos-delay="200">
        <div class="course-box dotted-border savedCourse_box">
                <table width="100%">
                  <tbody>
                    <tr>
                      <td class="tableTd_left">
                          <?php 
                            if ( has_post_thumbnail() ) { 
                              $image_url = get_the_post_thumbnail_url();
                            }
                            ?>
                            <a href="<?php echo get_permalink($post->ID);?>"> <img src="<?php echo $image_url; ?>" class="img-fluid"></a>
                      </td>
                      <td class="middle-details tableTd_middle">
                        <table width="100%">
                          <tr>
                            <td>
                              <h6><?php echo $category_array[0]->name; ?></h6>
                            </td>
                          </tr>
                          <tr>
                            <td>
                                 <?php if (!empty($course_type)){ ?>                            
                <span class="badge <?php echo $badge_class;?>"><?php echo $course_type; ?></span> 
            <?php }?>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <h2><?php echo bp_course_title(); ?></h2>
                            </td>
                          </tr>
                          <tr class="course_para">
                            <td>
                              <?php if ( $excerpt != '' ) {
                                echo "<p>".wp_trim_words( $excerpt, 30, NULL )."</p>";
                              }  ?>
                            </td>
                          </tr>
                          <tr class="duration">
                            <td>
                              <p>Duration</p>
                              <?php if($duration == '') { ?>
                              <h6>--</h6>
                              <?php } else{ ?>
                              <h6><?php if($duration != ''){echo $duration; }?><span><?php if($durationParameter != ''){echo ' '.calculate_duration($durationParameter); }?> </span></h6>
                              <?php }?>
                            </td>
                            <td>
                              <p>Age Group</p>
                                <?php if($age_limit == '') { ?>
                                  <h6>--</h6>
                                <?php } else{ ?>
                                  <h6><?php echo $age_limit;?><span> yrs</span></h6>
                                <?php }?>
                            </td>
                          </tr>
                        </table>
                      </td>
                      <td class="tableTd_right right-details">
                        <table width="100%" class="button_table">
                          <tr>
                            <td class="share-icon">
                              <ul>
                                <li>
                                  <a href="#">
                                    <?php
                                    if(is_user_logged_in()){
                                      ?>
                                      <?php wpfp_save_link(); ?>
                                    <?php }else{
                                      $url = "/login-register";
                                      ?>
                                      <a href="<?php echo get_site_url().$url; ?>"><i class="bookmark-remove"></i></a> 
                                      <?php
                                    }
                                    ?>
                                  </a>
                                </li>
                                <li class="hover_share">
                                  <img src="<?php echo get_bloginfo('template_url');?>/assets/images/share-icon.svg">
                                  <div class="display_icon">
                                    <h6>Share <span><i class="bi bi-x close-share"></i></span></h6>
                                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="<?php echo get_bloginfo('url')?>/course/<?php echo $post->post_name;?>" data-a2a-title="<?php echo $post->post_title. ' - '.get_bloginfo(); ?>" data-id="<?php echo $post->ID;?>">
                                      <a class="a2a_button_facebook"></a>
                                      <a class="a2a_button_twitter"></a>
                                      <a class="a2a_button_pinterest"></a>
                                      <a class="a2a_button_google_gmail"></a>
                                      <a class="a2a_button_whatsapp"></a>
                                      <a class="a2a_button_telegram"></a>
                                    </div><script async src="https://static.addtoany.com/menu/page.js"></script>
                                  </div>
                                </li>
                              </ul>  
                              <script async src="https://static.addtoany.com/menu/page.js"></script>
                            </td>
                          </tr>
                          <tr class="border_button">
                            <td class="course-button">
                              <h6 class="custom-price" data-id="<?php echo $post->ID;?>"><?php 
                                the_course_price();
                                ?>
                              </h6>
                              <?php the_course_button(); ?>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <input type="hidden" id="course_name_<?php echo $courseID;?>" value="<?php echo $post->post_title;?>">
                <input type="hidden" id="course_url_<?php echo $courseID;?>" value="<?php echo $courseslug;?>">
                <input type="hidden" id="course_category_<?php echo $courseID;?>" value="<?php echo $category_array[0]->name;?>">
                <input type="hidden" id="course_partner_<?php echo $courseID;?>" value="<?php echo $coursePartner;?>">
                <input type="hidden" id="category_id_<?php echo $courseID;?>" value="<?php echo $category_array[0]->term_id;?>">
                <input type="hidden" id="course_id_<?php echo $courseID;?>" value="<?php echo $courseID;?>">
                <input type="hidden" id="course_price_<?php echo $courseID;?>" value="0">
                <input type="hidden" id="course_tax_<?php echo $courseID;?>" value="0">
                <input type="hidden" id="age_group_<?php echo $courseID;?>" value="<?php echo $age_limit;?>">
                <input type="hidden" id="course_duration_<?php echo $courseID;?>" value="<?php echo get_post_meta($courseID, "vibe_validity", true);?>">
                <input type="hidden" id="session_duration_<?php echo $courseID;?>" value="<?php echo get_post_meta($courseID, "vibe_course_session_length", true);?>">
                <input type="hidden" id="wishlisted_course_<?php echo $courseID;?>" value="<?php echo in_array($courseID, $usersFavorites) ? '1' : '0';?>">
            </div>
        </div>
      <?php }
    }
    ?>
  </div>
  <?php }else{ ?>
  <div class="empty_cart_div">
    <div class="empty_course_image"></div>
    <h4>No courses on your wishlist as yet!</h4>
    <a href="<?php echo get_home_url();?>/courses/"><button class="empty_btn">Explore All Courses</button></a>
  </div>
<?php }?>
  <input type="hidden" id="user_identifier" value="<?php echo $userIdentifier;?>">
  <input type="hidden" id="timestamp" value="<?php echo date('c', time());?>">
  <input type="hidden" id="session_source">
  <input type="hidden" id="utm_tags">
</div>
</div>
<!-- <div class="right_feedback">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Strategies for Launching Your
    Creative Career</h5>
    <button type="button" class="close">
      <span>×</span>
    </button>
  </div>
  <div class="model_body">
    <p class="rate_course">Rate this Course*</p>
    <div class="rating_div">
      <span class="rate_star"></span>
      <span class="rate_star"></span>
      <span class="rate_star"></span>
      <span class="rate_star"></span>
      <span class="rate_star_wh"></span>
    </div>
    <div class="saved_coursebtn">
      <a class="savedbtn active">Insightful</a>
      <a class="savedbtn">Easy</a>
      <a class="savedbtn">Javascript</a>
      <a class="savedbtn">HTML5</a>
      <a class="savedbtn">BootStrap</a>
      <a class="savedbtn">Front End</a>
      <a class="savedbtn">PHP</a>
    </div>
  </div>
  <div class="saved_textarex your-message">
    <textarea name="your-message" cols="40" rows="10" placeholder="Would like to leave a feedback"></textarea>
  </div>
  <div class="saved_submitbtn">
    <button class="saved_feedbackbtn"><span>Submit Feedback</span></button>
  </div>
</div> -->
<?php do_action( 'bp_after_member_settings_template' ); ?>

<?php

vibe_include_template("profile/bottom.php");  

get_footer( vibe_get_footer() ); 