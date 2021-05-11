<style type="text/css">
  .countColor p{
    font-family: 'GT-Walsheim-Pro'!important;
  }
</style>
<?php 
/**
 * The template for displaying Course home
 *
 * Override this template by copying it to yourtheme/course/single/home.php
 *
 * @author    VibeThemes
 * @package   vibe-course-module/templates
 * @version     2.1
 */
if ( !defined( 'ABSPATH' ) ) exit;
do_action('wplms_before_single_course');

get_header( vibe_get_header() ); 

$course_layout = vibe_get_customizer('course_layout');
if ( bp_course_has_items() ) : while ( bp_course_has_items() ) : bp_course_the_item();
do_action('wplms_course_curriculum_section',$id);

$course_curriculum = ht_course_get_full_course_curriculum($id); 

?>
<style>
  
</style>
<main id="main">
      <div class="innerheader-space course-space"></div>
      <div class="sticky_content">
    <div class="details-left fixed_banner course_fixedBanner">
          <?php $gallery_data = get_post_meta($post->ID,'vibe_course_background_image',true); 
            //echo $attachment_element = wp_get_attachment_image( $gallery_data);
             $attachment_element = wp_get_attachment_url( $gallery_data);
          ?>
          <img class="course_background_img" src="<?php echo $attachment_element;?>" onerror="this.style.display='none'">
            <div class="container">
                <div class="">
                  <div class="breadcrumbs">
                    <?php vibe_breadcrumbs(); ?>
                  </div>
                  <div class="content">
                    <h2><?php bp_course_name(); ?></h2>
                    <?php
                      $excerpt = get_post_field('post_excerpt', $post->ID);
                      if ( $excerpt != '' ) {
                        echo "<p>".wp_trim_words( $excerpt, 22, NULL )."</p>";
                      }
                      if(get_post_meta($post->ID,'vibe_course_age_group',true) != '') {
                        $ageGroup = get_post_meta($post->ID,'vibe_course_age_group',true);
                      }
                      if(get_post_meta($post->ID,'vibe_course_certificate',true) == 'H'){
                          $totalStudent =  "No";
                        }else{
                          $totalStudent = "Yes";
                        }
                      if(get_post_meta($post->ID,'vibe_validity',true) != '') {
                        $duration = get_post_meta($post->ID,'vibe_validity',true);
                      }
                      if(get_post_meta($post->ID,'vibe_course_frequency',true) != '') {
                        $frequency = get_post_meta($post->ID,'vibe_course_frequency',true);
                      }
                      if(get_post_meta($post->ID,'vibe_course_sessions',true) != '') {
                        $session = get_post_meta($post->ID,'vibe_course_sessions',true);
                      }
                      if(get_post_meta($post->ID,'vibe_course_session_length',true) != '') {
                        $sessionLength = get_post_meta($post->ID,'vibe_course_session_length',true);
                      }
                      if(get_post_meta($post->ID,'vibe_course_validity_parameter',true) != '') {
                        $courseDurationParameter = get_post_meta($post->ID,'vibe_course_validity_parameter',true);
                      }
                      $courseDetails = array();
                      $courseDetails[] = array(
                        'Age Group' => $ageGroup.' yrs',
                        'Certification' => $totalStudent,
                        'Course Duration' => $duration.' '.calculate_duration($courseDurationParameter),
                        'Frequency' => $frequency,
                        'Number of Sessions' => $session ,
                        'Session Duration' => $sessionLength,

                      );

                    ?>

                    <ul>
                        <?php 
                        $temp = 2;
                        foreach ($courseDetails[0] as $key => $value) {
                          if($value != ''){
                            if($temp%2 == 0){
                              ?>
                              <li>
                              <div class="col-xs-6 col-sm-6 col-lg-6 pull-left mrg">
                                <p><?php echo $key; ?></p>
                                <h6><?php echo $value; ?></h6>
                              </div>
                              <?php
                            }else{
                              ?>
                              <div class="col-xs-6 col-sm-6 col-lg-6 pull-right mrg">
                                <p><?php echo $key; ?></p>
                                <h6><?php echo $value; ?></h6>
                              </div>
                            </li>
                              <?php
                            } 
                          $temp++;
                          } 
                        } ?>

                    </ul>
                    
                  </div>
                </div>
            </div>
            <div class="course-fees">
              <div class="container">
                    <h4><?php the_course_price(); ?></h4>
                     <?php the_course_button(); ?>
                </div>
            </div>
        </div>
        <div class="pull-right right-section">
            <div class="course-aboutDetails grey-background" id="overview">
              <div class="container">
                <div class="">
                    <div class="col-sm-12 col-lg-12 mrg details-right pull-right">
                      <div class="fixedmenu-tabs">
                        <div class="container">
                          <div class="row">
                              <ul class="nav nav-tabs left_tab" id="">
                                  <li class="nav-item">
                                    <a class="nav-link scrollto active" href="#overview">Overview</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link scrollto" href="#objective">Objectives</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link scrollto" href="#curriculum">Curriculum</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link scrollto" href="#instructor">Instructor</a>
                                </li>
                              </ul>
                              <div class="share-icon">
                              <ul>
                                
                                  
                                      <?php
                                         if(is_user_logged_in()){
                                          ?>
                                          <li style="list-style-type: none;"><?php wpfp_course_link(); ?></li>
                                        <?php }else{
                                          $url = "/login-register";
                                          ?>
                                          <li style="list-style-type: none;"><a href="<?php echo get_site_url().$url; ?>"><i class="bookmark-remove" title="Bookmark this course"></i></a></li> 
                                          <?php
                                        }
                                        ?>
                                        <li class="hover_share">
                                    <img src="<?php echo get_bloginfo('template_url');?>/assets/images/share-icon.svg">
                                    <div class="display_icon">
                                      <h6>Share <span><i class="bi bi-x close-share"></i></span></h6>
                                      <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
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
                            
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 content-about">
                        <div class="content tab-content left-spacing" id="">
                          <div class="col-sm-12 about-details mrg">
                                  <div class="heading">
                                    <h3>About the Course</h3>
                                  </div>

                                  <div class="row content-default-list">
                                    <div class="">
                                    <div class="col-sm-12 col-lg-12 mrg">
                                        <p><?php 
                                        $post_content = get_post_field('post_content', $post->ID);
                                        
                                        ob_start();
                                        dynamic_sidebar('news_landing_mid_banner');
                                        $addDisplay = ob_get_contents();
                                        ob_end_clean();

                                        $videoContent = '';
                                        $trailer_link = get_post_meta($post->ID,'vibe_trailer_link',true);
                                        if(strlen(trim($trailer_link))){
                                          $videoContent = '<div align="right" style="float: right;margin-left: 15px;">
                                                              <iframe allowfullscreen="allowfullscreen" width="100%" height="240" src="' . get_post_meta($post->ID,'vibe_trailer_link',true) . '"></iframe>
                                                           </div>';
                                        }

                                        $ad_code = '<div align="right" style="float: right; margin-top:15px; margin-left: 15px;margin-bottom: 15px;">' . $addDisplay . '</div>';
                                        
                                        $post_content =  $videoContent.$ad_code .$post_content;

                                        echo $post_content;
                                        ?></p>
                                    </div>
                                  </div>
                                  </div>
                                  <div class="col-sm-12 col-lg-6 mrg pull-right">
                                      
                                  </div>
                                  <?php 
                                    $who_this_course = get_post_meta($post->ID,'vibe_who_this_course_Is_for_first_block',true);
                                  if(strlen(trim($who_this_course))) : 
                                  ?>
                                  <div class="col-sm-12 course-for background-yellow">
                                    <h5>Who Is This Course For?</h5>
                                    <p><?php echo get_post_meta($post->ID,'vibe_who_this_course_Is_for_first_block',true); ?></p>
                                  </div>
                                <?php endif;?>
                                  <?php if(get_the_term_list_search(get_the_ID(),'course-tag')) : ?>
                                  <div class="col-sm-12 course-list mrg">
                                    <h5>Related Tags</h5>
                                    <div class="col-sm-12 course-listslider mrg">
                                      <?php echo get_the_term_list_search(get_the_ID(),'course-tag'); ?>
                                    </div>  
                                  </div>
                                <?php endif;?>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <?php if(strlen(trim(get_post_meta($post->ID,'vibe_learning_goals',true)))) : ?>
            <div class="learing-goals" id="objective">
              <div class="container">
                <div class="">
                  <div class="col-sm-12 col-lg-12 pull-right left-spacing">
                    <div class="heading">
                      <h3>Course Objectives</h3>
                    </div>
                    <div class="content-default-list">
                      <?php echo get_post_meta($post->ID,'vibe_learning_goals',true);?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endif;
          if(count(bp_course_get_curriculum_units(get_the_ID()))) : 
          ?>

            <div class="course-curriculum grey-background" id="curriculum">
              <div class="container">
                <div class="">
                  <div class="col-sm-12 col-lg-12 pull-right left-spacing">
                    <div class="col-sm-12 col-lg-3 mrg pull-left">
                      <div class="heading">
                        <h3>Curriculum</h3>
                      </div>
                    </div>
                    
                    <div class="col-sm-12 col-lg-9 mrg pull-left">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-12 mrg list">
                     
                      <?php locate_template( array( 'course/single/curriculum.php'  ), true );?>
                      <?php $curriculum_count = count(bp_course_get_curriculum_units(get_the_ID())); 
                        if($curriculum_count > 4) {
                      ?>
                      <div class="viewall-session">
                        <a href="#" class="all-session" id="view_all_sessions">View All Sessions</a>
                      </div>
                    <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endif;?>
            <div class="course-instructor" id="instructor">
              <div class="container">
                <div class="">
                  <div class="col-sm-12 col-lg-12 pull-right left-spacing">
                    <div class="heading">
                      <h3>Instructor</h3>
                    </div>
                    <?php
                        $course_id=get_the_ID();
                        $post_tmp = get_post($course_id);
                        $author_id = $post_tmp->post_author;
                        $author_info = get_userdata($author_id);
                        $author_name = get_the_author_meta( 'display_name', $author_id );
                        $author_url = get_the_author_meta( 'user_url', $author_id );
                        $author_email = get_the_author_meta( 'user_email', $author_id );
                        $author_biographical_info = get_the_author_meta( 'description', $author_id );
                        $author_user_profile = get_avatar_url($author_id);
                        $author_company = get_the_author_meta( 'last_name', $author_id );
                        $student_count = get_the_author_meta( 'student_count', $author_id );
                        $args = array(
                          'field'   => 'About', // Field name or ID.
                          'user_id' => $author_id // Default
                          );
                        ob_start();
                        dynamic_sidebar('instructor_banner');
                        $addDisplay = ob_get_contents();
                        ob_end_clean();

                        $ad_code = '<div align="right" style="float: right;margin-left: 15px;;margin-bottom: 15px;">' . $addDisplay . '</div>';
                        
                        $author_biographical_info = $ad_code .$author_biographical_info;

                    ?>
                    <div class="instructor-detailsMini">
                        <div class="col-sm-12 col-md-12 col-lg-12 pull-left mrg">
                          <div class="profile mt-auto">
                            <div class="col-lg-12 profile-content">
                              <div class="clearfix"></div>
                              <div class="co-lg-12">
                                
                                  <div class="profileimg-name" align="left" style="float: left; width: 260px;margin-bottom: 15px;">
                                    <div class="col-xs-4 col-sm-2 col-lg-4 mrg profile-img pull-left">
                                      <img src="<?php echo $author_user_profile; ?>" class="rounded-circle img-fluid" alt="">
                                    </div>
                                    <div class="col-xs-8 col-sm-8 co-lg-8 pull-left padding_right">
                                      <h3 class="name"><?php echo $author_name; ?></h3>
                                      <h4><?php echo $author_company; ?></h4>
                                      <div class="double-border"></div>
                                      <!-- <h6>2,192,534 <span>Students</span></h6> -->
                                    </div>
                                  </div>
                                  <?php echo $author_biographical_info; ?>
                                <!-- <span class="see-profilelink"><a href="<?php echo $author_url; ?>">See Profile</a></span> -->
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <?php /*do_action('wplms_single_course_content_end');*/ ?>
            <?php 
            $tags_by_course_id = get_the_terms($post_id, 'course-tag' );
            $tag_array = array();
            $coursearray = array();
            //print_r($tags_by_course_id);
            if(!empty(get_the_terms($post_id, 'course-tag' ))){
              foreach(get_the_terms($post_id, 'course-tag' ) as $tag) {
                $tag_array[] = $tag->term_id ;
              }
            }
            if ($tag_array) {
              foreach($tag_array as $tag) {
                $courses_ids = $wpdb->get_col( $wpdb->prepare( "SELECT object_id FROM $wpdb->term_relationships WHERE term_taxonomy_id = '".$tag."'") );
                foreach ($courses_ids as $course_id) {
                    $coursearray[] = $course_id;
                }
              }
              $related_course_id = array_unique(array_diff($coursearray,array(get_the_ID())));
              if( !empty( $related_course_id ) ) {
                  $query_args = apply_filters('wplms_mycourses',array(
                  'post_type'=>'course',
                  'posts_per_page' => 4,
                  'post__in'=>$related_course_id
                  ),$user->ID);
                  $Query_course = new WP_Query($query_args);
              }
            }
            if($Query_course && $Query_course->have_posts()){?>

            <div class="other-courses grey-background">
              <div class="container">
                <div class="">
                  <div class="col-sm-12 col-lg-12 pull-right left-spacing">
                    <div class="heading">
                      <h3>Other Courses</h3>
                    </div>
                    <div class="list mobile-slider">
                    <?php if ($Query_course->have_posts()) : while ($Query_course->have_posts()) : $Query_course->the_post();
                          $custom_fields = get_post_custom();
                          $duration = $custom_fields['vibe_duration'][0];
                          $age_limit = $custom_fields['vibe_course_age_group'][0];
                          $category_array = get_the_terms( $post->ID, 'course-cat');
                    ?>

                      <div class="col-sm-12 col-lg-4 mrg card item">
                        <div class="details">
                          <h4><?php echo $category_array[0]->name;?></h4>
                          <?php bp_course_avatar(); ?>
                          <h3><?php bp_course_title(); ?></h3>
                          <div class="col-sm-12 mrg session duration">
                            <h6><img src="<?php echo get_bloginfo('template_url')?>/assets/images/otherc-icon.png" class="img-fluid" />
                            <?php if($duration != ''){echo $duration; }?><span><?php if($duration != ''){echo ' Days'; }?> </span>
                          </h6>
                          </div>
                          <div class="other-courses_join-btn">
                            <?php the_course_button(); ?> 
                          </div>
                        </div>
                      </div>
                      <?php endwhile;endif;}
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


</main>

<?php
endwhile; endif; 
?>
<?php get_footer( vibe_get_footer() );  