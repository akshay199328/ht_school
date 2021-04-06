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
    <div class="details-left fixed_banner">
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
                        echo "<p>".$excerpt."</p>";
                      }
                      else{
                        $content = wp_trim_words( $post->post_content, 40 );
                        echo "<p>".esc_html( $content )."</p>";
                      }
                      if(get_post_meta($post->ID,'vibe_course_age_group',true) != '') {
                        $ageGroup = get_post_meta($post->ID,'vibe_course_age_group',true);
                      }
                      if(get_post_meta($post->ID,'vibe_course_certificate',true) == 'H'){
                          $totalStudent =  "No";
                        }else{
                          $totalStudent = "Yes";
                        }
                      if(get_post_meta($post->ID,'vibe_duration',true) != '') {
                        $duration = get_post_meta($post->ID,'vibe_duration',true);
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
                      $courseDetails = array();

                      $courseDetails[] = array(
                        'Age Group' => $ageGroup,
                        'Certification' => $totalStudent,
                        'Course Duration' => $duration,
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
                    <?php the_course_price(); ?>
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
                              <ul class="nav nav-tabs" id="">
                                  <li class="nav-item">
                                    <a class="nav-link scrollto active" href="#overview">Overview</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link scrollto" href="#objective">Objective</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link scrollto" href="#curriculum">Curriculum</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link scrollto" href="#instructor">Instructor</a>
                                </li>

                                <div class="share-icon">
                                    <a href="https://www.addtoany.com/share" class="a2a_dd"><svg xmlns="" width="16" height="16" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
                                      <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"></path>
                                    </svg></a>
                                     <script async src="https://static.addtoany.com/menu/page.js"></script>
                                     <div class="top-icon">
                               <?php
                               if(is_user_logged_in()){
                                ?>
                                <li style="list-style-type: none;"><?php wpfp_link(); ?></li>
                              <?php }else{
                                $url = "/login-register";
                                ?>
                                <li style="list-style-type: none;"><a href="<?php echo get_site_url().$url; ?>"><i class="bi bi-bookmark"></i></a></li> 
                                <?php
                              }
                              ?>
                            </div>
                                  </div>

                              </ul>
                              
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 content-about">
                        <div class="content tab-content left-spacing" id="">
                          <div class="col-sm-12 about-details mrg">
                                  <div class="heading">
                                    <h3>About The Course</h3>
                                  </div>
                                  <div class="col-sm-12 col-lg-6 pull-left mrg">
                                      <p><?php 
                                      $post_content = get_post_field('post_content', $post->ID);
                                      if ( $post_content != '' ) {
                                        echo $post_content;
                                      }
                                      ?></p>
                                  </div>
                                  <div class="col-sm-12 col-lg-6 mrg pull-right">
                                    <div class="adworks">
                                      <div class="col-sm-12 adworks-head mrg">
                                        <?php
                                          if ( is_active_sidebar( 'banner-2' ) ) : ?>
                                          <?php dynamic_sidebar( 'banner-2' ); ?>      
                                        <?php endif; ?>
                                      </div>
                                    </div>
                                    <div class="col-sm-12 tab-video mrg">
                                       <?php echo get_post_meta($post->ID,'video_embed',true);?>
                         
                                    </div>
                                  </div>
<!--                                   <div class="col-sm-12 course-for background-yellow">
                                    <h5>Who This Course Is For</h5>
                                    <p>
                                    <?php echo get_post_meta($post->ID,'vibe_course_message',true);?>
                                    </p>
                                  </div> -->
                                  <?php if(get_post_meta($post->ID,'who_this_course_Is_for_first_block',true))
                                  {?>
                                  <div class="col-sm-12 course-for background-yellow">
                                    <h5>Who Is This Course For?</h5>
                                    <p><?php echo get_post_meta($post->ID,'who_this_course_Is_for_first_block',true); ?></p>
                                  </div>
                                <?php }?>
                                  <div class="col-sm-12 course-list mrg">
                                    <h5>Who Is This Course For?</h5>
                                    <div class="col-sm-12 course-listslider mrg">
                                      <?php echo get_the_term_list_search(get_the_ID(),'course-tag'); ?>
                                      <!-- <span class="item"><a href="#"><h6>CSS</h6></a></span>
                                      <span class="item"><a href="#"><h6>CSS3</h6></a></span>
                                      <span class="item"><a href="#"><h6>Javascript</h6></a></span>
                                      <span class="item"><a href="#"><h6>HTML5</h6></a></span>
                                      <span class="item"><a href="#"><h6>BootStrap</h6></a></span>
                                      <span class="item"><a href="#"><h6>Front End</h6></a></span>
                                      <span class="item"><a href="#"><h6>PHP</h6></a></span> -->
                                    </div>  
                                  </div>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
<!--             <div class="learing-goals" id="benefits">
              <div class="container">
                <div class="">
                  <div class="col-sm-12 col-lg-12 pull-right left-spacing">
                    <?php echo get_post_meta($post->ID,'learning_goals',true);?>
                    <div class="col-lg-12 mrg adworks-head">
                     <div style="width: 728px; height: 90px; background: #428bca; color: #fff; line-height: 90px; text-align: center; ">banner</div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <div class="learing-goals" id="objective">
              <div class="container">
                <div class="">
                  <div class="col-sm-12 col-lg-12 pull-right left-spacing">
                    <div class="heading">
                      <h3>Course Objectives</h3>
                      <p><?php echo get_post_meta($post->ID,'vibe_learning_goals',true);?></p>
                    </div>
                    <div class="list">
                      <?php echo get_post_meta($post->ID,'learning_goals_list',true); ?>
                    </div>
                    <!-- <div class="col-lg-12 mrg adworks-head">
                      <a href="#">Adworks</a>
                      <img src="assets/img/adwork-4.jpg" class="img-fluid">
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
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
                      <!-- <div class="cv-detilslist">
                        <?php $lectures = bp_course_get_curriculum_units(get_the_ID()); ?>
                        <span><h6><?php echo get_post_meta($post->ID,'vibe_course_sessions',true)?> Sessions</h6></span>
                        <span><h6><?php echo get_post_meta($post->ID,'vibe_course_lectures',true);?> lectures</h6></span>
                        <span><h6><?php echo get_post_meta($post->ID,'vibe_duration',true);?> Days</h6></span>
                      </div> -->
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-12 mrg list">
                     
                      <?php locate_template( array( 'course/single/curriculum.php'  ), true );?>
                      <?php $curriculum_count = count(bp_course_get_curriculum_units(get_the_ID())); 
                        if($curriculum_count > 4) {
                      ?>
                      <div class="viewall-session">
                        <a href="#" class="all-session" id="view_all_sessions">View all Sessions</a>
                      </div>
                    <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
                        //echo "<pre>";print_r($author_company);exit;

                    ?>
                    <div class="instructor-detailsMini">
                        <div class="col-sm-12 col-lg-7 pull-left mrg">
                          <div class="profile mt-auto">
                            <div class="col-lg-12 profile-content">
                              <div class="profileimg-name">
                                <div class="col-xs-4 col-sm-2 col-lg-4 mrg profile-img pull-left">
                                  <img src="<?php echo $author_user_profile; ?>" class="rounded-circle img-fluid" alt="">
                                </div>
                                <div class="col-xs-6 col-sm-4 co-lg-3 pull-left">
                                  <h3 class="name"><?php echo $author_name; ?></h3>
                                  <h4><?php echo $author_company; ?></h4>
                                  <div class="double-border"></div>
                                  <h6>2,192,534 <span>Students</span></h6>
                                </div>
                              </div>
                              <div class="clearfix"></div>
                              <div class="co-lg-12">
                                <p><?php echo $author_biographical_info; ?></p>
                                <!-- <span class="see-profilelink"><a href="<?php echo $author_url; ?>">See Profile</a></span> -->
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-lg-5 mrg pull-right">
                          <div class="adworks">
                            <div class="col-sm-12 adworks-head mrg">
                                <?php
                                  if ( is_active_sidebar( 'banner-2' ) ) : ?>
                                  <?php dynamic_sidebar( 'banner-2' ); ?>      
                                <?php endif; ?>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="other-courses grey-background">
              <div class="container">
                <div class="">
                  <div class="col-sm-12 col-lg-12 pull-right left-spacing">
                    <div class="heading">
                      <h3>Other Courses</h3>
                    </div>
                    <div class="list mobile-slider">

                      <?php do_action('wplms_single_course_content_end');?>

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