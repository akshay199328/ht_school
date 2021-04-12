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
     <ul class="">
      <?php if ( bp_is_my_profile() ) bp_get_options_nav(); 
      do_action('bp_course_get_options_sub_nav');
      ?>
    </ul>
    <ul>
    </div><!-- .item-list-tabs -->
  </div>
  <div class="col-md-9 pull-left"> 
    <div class="profile-card transprent">
      <h1>Saved Courses</h1>
      <?php 
      $course_data = wpfp_get_users_favorites();
      $count_array = []; 
      foreach ($course_data as $post_id) {
       $post = get_post($post_id);
       if($post->post_type == "course"){
        array_push($count_array, $post->ID);
      }
    }
    $count = count($count_array);
    foreach ($course_data as $post_id) {

      $post = get_post($post_id);

      if ( has_post_thumbnail() ) { 
        $featured_image = get_the_post_thumbnail_url();
      }
      $postDate = get_the_date('M d, Y H:i');
      $custom_fields = get_post_custom();
      $duration = $custom_fields['vibe_duration'][0];
      $age_limit = $custom_fields['vibe_course_age_group'][0];
      $category_array = get_the_terms( $post->ID, 'course-cat');
      $excerpt = get_post_field('post_excerpt', $post->ID);
      if($post->post_type == "course"){
        ?>
        <div class="course-box dotted-border">
          <div class="col-xs-2 col-sm-2 col-lg-2 pull-left mrg">
            <?php 
            if ( has_post_thumbnail() ) { 
              $image_url = get_the_post_thumbnail_url();
            }
            ?>
            <a href="<?php echo get_permalink($post->ID);?>"> <img src="<?php echo $image_url; ?>" class="img-fluid"></a>
          </div>
          <div class="col-xs-10 col-sm-10 col-lg-10 pull-left mrg">
            <div class="col-sm-12 col-lg-9 pull-left mrg">
              <div class="middle-details">
                <h6><?php echo $category_array[0]->name; ?></h6>
                <h2><?php echo bp_course_title(); ?></h2>
                <div class="col-lg-12 share-icon mrg">
                  <i class="bi bi-share"></i>
                </div>
                <?php if ( $excerpt != '' ) {
                  echo "<p>".wp_trim_words( $excerpt, 30, NULL )."</p>";
                }  ?>
                <div class="col-lg-7 duration mrg">
                  <div class="pull-left">
                    <p>Duration</p>
                    <?php if(get_post_meta($post->ID,'vibe_duration',true) == '') { ?>
                      <h6>--</h6>
                    <?php } else{ ?>
                      <h6><span><?php echo get_post_meta($post->ID,'vibe_duration',true);?></span> Days</h6>
                    <?php }?>
                  </div>
                  <div class="pull-right">
                    <p>Age Group</p>
                    <?php if($age_limit == '') { ?>
                      <h6>--</h6>
                    <?php } else{ ?>
                      <h6><?php echo $age_limit;?></h6>
                    <?php }?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-lg-3 pull-left mrg">
              <div class="col-lg-12 right-details pull-left mrg">
                <div class="share-icon">
                  <ul>
                    <li>
                      <a href="#">
                        <!-- <img src="<?php echo get_bloginfo('template_url')?>/assets/images/delete-icon.svg"/> -->
                        <?php
                        if(is_user_logged_in()){
                          ?>
                          <?php wpfp_save_link(); ?>
                        <?php }else{
                          $url = "/login-register";
                          ?>
                          <a href="<?php echo get_site_url().$url; ?>"><i class="bi bi-bookmark"></i></a> 
                          <?php
                        }
                        ?>
                      </a>
                    </li>
                    <li class="hover_share">
                      <img src="<?php echo get_bloginfo('template_url');?>/assets/images/share-icon.svg">
                      <div class="display_icon">
                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="<?php echo get_bloginfo('url')?>/course/<?php echo $post->post_name;?>" data-a2a-title="<?php echo $post->post_title. ' - '.get_bloginfo(); ?>">
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
                </div>
                <div class="col-lg-12 course-button">
                  <h6 ><?php 
                  the_course_price();
                  ?></h6>
                  <?php the_course_button(); ?>
                </div>

              </div>
            </div>

          </div>
        </div>
      <?php }
    }
    ?>
  </div>
  <?php if($count < 1){ ?>
    <div class="empty_cart_div">
      <div class="empty_course_image"></div>
      <h4>You Don’t Have Any Courses <br/>Saved Till Now. </h4>
      <a href="<?php echo get_home_url();?>/courses/"><button class="empty_btn">Explore Courses</button></a>
    </div>
  <?php } ?>
</div>
</div>
<div class="right_feedback">
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
</div>
<?php do_action( 'bp_after_member_settings_template' ); ?>

<?php

vibe_include_template("profile/bottom.php");  

get_footer( vibe_get_footer() ); 