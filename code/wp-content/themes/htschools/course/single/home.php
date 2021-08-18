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

             $custom_fields = get_post_custom();                         
                                                 
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
          ?>
          <img class="course_background_img" src="<?php echo $attachment_element;?>" onerror="this.style.display='none'">
            <div class="container">
                <div class="">
                  <div class="breadcrumbs">
                    <?php vibe_breadcrumbs(); ?>
                  </div>

                  <div class="content"> 

<div>
                  <?php if (!empty($course_type)){ ?>                            
                <span class="badge <?php echo $badge_class;?>"><?php echo $course_type; ?></span> 
            <?php }?> 
</div>

                    <h2><?php bp_course_name(); ?></h2>
                    <?php
                      $courseID = $post->ID;
                      $courseIDViewItem = $post->ID;
                      $category_array = get_the_terms( $courseID, 'course-cat');
                      $courseslug=get_the_permalink($courseID);
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
                        'Age Group' => $ageGroup.' Years',
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
                <div class="course-fees">
                  <div class="">
                        <h4 class="custom-price" data-id="<?php echo $post->ID;?>"><?php the_course_price(); ?></h4>
                         <div class="<?php echo strtolower($course_type) == 'live classes' ? 'live_course_class' : ''; ?>">
                          <?php the_course_button(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="course_name_<?php echo $courseID;?>" value="<?php echo $post->post_title;?>">
            <input type="hidden" id="course_url_<?php echo $courseID;?>" value="<?php echo $courseslug;?>">
            <input type="hidden" id="course_category_<?php echo $courseID;?>" value="<?php echo $category_array[0]->name;?>">
            <input type="hidden" id="course_partner_<?php echo $courseID;?>" value="<?php echo $coursePartner;?>">
            <input type="hidden" id="category_id_<?php echo $courseID;?>" value="<?php echo $category_array[0]->term_id;?>">
            <input type="hidden" id="course_id_<?php echo $courseID;?>" value="<?php echo $courseID;?>">
            <input type="hidden" id="course_price_<?php echo $courseID;?>" value="0">
            <input type="hidden" id="course_tax_<?php echo $courseID;?>" value="0">
            <input type="hidden" id="age_group_<?php echo $courseID;?>" value="<?php echo get_post_meta($courseID,'vibe_course_age_group',true)?>">
            <input type="hidden" id="course_duration_<?php echo $courseID;?>" value="<?php echo get_post_meta($courseID, "vibe_validity", true);?>">
            <input type="hidden" id="session_duration_<?php echo $courseID;?>" value="<?php echo get_post_meta($courseID, "vibe_course_session_length", true);?>">
            <input type="hidden" id="wishlisted_course_<?php echo $courseID;?>" value="<?php echo in_array($courseID, $usersFavorites) ? '1' : '0';?>">
            
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
                                          <li style="list-style-type: none;"><a href="<?php echo get_site_url().$url; ?>"><i class="add-wishlist" title="Add to Wishlist"></i></a></li> 
                                          <?php
                                        }
                                        ?>
                                        <li class="hover_share">
                                    <img src="<?php echo get_bloginfo('template_url');?>/assets/images/share-icon.svg">
                                    <div class="display_icon">
                                      <h6>Share <span><i class="bi bi-x close-share"></i></span></h6>
                                      <div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-id="<?php echo $courseID;?>">
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
                                    <div class="col-sm-12 col-lg-12 mrg">
                                        <!-- <div class="about-course">
                                          <div class="copy">
                                            <p>In his first-ever online class, Dabboo Ratnani, the iconic Fashion Photographer teaches his signature lighting techniques, camera settings and fine art compositing to help you capture iconic photos.</p>
                                            <p>He practically shows his entire fashion portfolio shoot and shares his secret sauce for outdoor, indoor and mobile photography.</p>
                                            <p>In this course, Dabboo Ratnani also shares his journey from an Assistant Photographer to an iconic Celebrity Photographer. He also shares how he got his first big assignment.</p>
                                          </div>
                                          <div class="video-ad">
                                            <iframe allowfullscreen="allowfullscreen" width="100%" src="https://www.youtube.com/embed/PeMlRe2iCGM?enablejsapi=1&amp;origin=https%3A%2F%2Fht.fortune4.org" data-gtm-yt-inspected-44670490_15="true" id="189347671" data-gtm-yt-inspected-1_25="true"></iframe>

                                            <div class="adsense">Google AdSense</div>
                                          </div>
                                        </div> -->

                                        <div class="about-course">
                                        <p><?php 
                                        $post_content = get_post_field('post_content', $post->ID);
                                        
                                        ob_start();
                                        dynamic_sidebar('news_landing_mid_banner');
                                        $addDisplay = ob_get_contents();
                                        ob_end_clean();

                                        $videoContent = '';
                                        $trailer_link = get_post_meta($post->ID,'vibe_trailer_link',true);
                                        if(strlen(trim($trailer_link))){
                                          $videoContent = '<div class="video-ad">
                                                              <iframe allowfullscreen="allowfullscreen" width="100%" height="240" src="' . get_post_meta($post->ID,'vibe_trailer_link',true) . '"></iframe></div>

                                                           ';
                                        }

                                        $ad_code = '<div class="adsense">' . $addDisplay . '</div>';
                                        //$closeDiv = '</div>';
                                        
                                        $post_content =  $videoContent.$ad_code.$post_content;

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
                      <?php /*$curriculum_count = count(bp_course_get_curriculum_units(get_the_ID())); 
                        if($curriculum_count > 4) {*/
                      ?>
                      <!-- <div class="viewall-session">
                        <a href="#" class="all-session" id="view_all_sessions">View All Sessions</a>
                      </div> -->
                    <?php /*} */?>
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
                        $author_company = get_the_author_meta( 'profession', $author_id );
                        $student_count = get_the_author_meta( 'student_count', $author_id );
                        $args = array(
                          'field'   => 'About', // Field name or ID.
                          'user_id' => $author_id // Default
                          );
                        ob_start();
                        dynamic_sidebar('instructor_banner');
                        $addDisplay = ob_get_contents();
                        ob_end_clean();

                        $ad_code = '<div class="google-adsense">' . $addDisplay . '</div>';
                        
                        $author_biographical_info = $ad_code . '<p>'.$author_biographical_info.'</p>';

                    ?>
                    <div class="instructor-detailsMini">
                        <div class="col-sm-12 col-md-12 col-lg-12 pull-left mrg">
                          <div class="profile mt-auto">
                            <div class="col-lg-12 profile-content">
                              <div class="clearfix"></div>
                              <div class="co-lg-12">
                                
                                  <div class="profileimg-name" align="left">
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
                                  <div class="instructor-copy"><?php echo $author_biographical_info; ?></div>
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
                  'posts_per_page' => 3,
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
                          $duration = $custom_fields['vibe_validity'][0]; 
                          $age_limit = $custom_fields['vibe_course_age_group'][0];
                          $category_array = get_the_terms( $post->ID, 'course-cat');
                          $durationParameter = get_post_meta($post->ID,'vibe_course_validity_parameter',true);
                          $courseID = $post->ID;
                          $courseslug=get_the_permalink($courseID);
                          $coursePartner = "";
                          $cb_course_id = get_post_meta($courseID,'celeb_school_course_id',true);
                          if ($cb_course_id) {
                            $coursePartner = "Celebrity School";
                          }

                          $aiws_course_id = get_post_meta($courseID,'aiws_program_id',true);
                          if ($aiws_course_id) {
                            $coursePartner = "AIWS";
                          }
                    ?>

                      <div class="col-sm-12 col-lg-4 mrg card item all_courses_list" data-name="other_courses" data-id="<?php echo $post->ID;?>">
                        <div class="details">
                          <div class="custom-price" style="display: none;" data-id="<?php echo $post->ID;?>"><?php the_course_price(); ?></div>
                          <h4><?php echo $category_array[0]->name;?></h4>
                          <?php bp_course_avatar(); ?>                                   
                          <h3><?php bp_course_title(); ?></h3>
                          <div class="col-sm-12 mrg session duration">
                            <h6><img src="<?php echo get_bloginfo('template_url')?>/assets/images/otherc-icon.png" class="img-fluid" />
                            <?php if($duration != ''){echo $duration; }?><span><?php if($durationParameter != ''){echo ' '.calculate_duration($durationParameter); }?> </span>
                          </h6>
                          </div>
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
                          <input type="hidden" id="wishlisted_course_<?php echo $courseID;?>" value="<?php //echo in_array($courseID, $usersFavorites) ? '1' : '0';?>">
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

        <input type="hidden" id="user_identifier" value="<?php echo $userIdentifier;?>">
        <input type="hidden" id="timestamp" value="<?php echo date('c', time());?>">
        <input type="hidden" id="session_source">
        <input type="hidden" id="utm_tags">

        <script type="text/javascript">
          jQuery(document).ready(function(){
            let courseID = '<?php echo $courseIDViewItem;?>';

            var viewCourseItem = [];
            viewCourseItem.push({
              "price"           : jQuery("#course_price_" + courseID).val(),
              "item_name"       : jQuery("#course_name_" + courseID).val(),
              "course_url"      : jQuery("#course_url_" + courseID).val(),
              "item_category"   : jQuery("#course_category_" + courseID).val(),
              "course_partner"  : jQuery("#course_partner_" + courseID).val(),
              "category_id"     : parseInt(jQuery("#category_id_" + courseID).val()),
              "item_id"         : parseInt(jQuery("#course_id_" + courseID).val()),
              "age_group"       : jQuery("#age_group_" + courseID).val(),
              "course_duration" : jQuery("#course_duration_" + courseID).val(),
              "session_duration": jQuery("#session_duration_" + courseID).val(),
            });

            let viewCourseObj = {
              "event"          : 'view_item',
              "user_identifier": parseInt(jQuery("#footer_user_identifier").val()),
              "session_source" : jQuery("#footer_session_source").val(),
              "timestamp"      : jQuery("#footer_timestamp").val(),
              "utm_tags"       : jQuery("#footer_utm_tags").val(),
              "ecommerce"      : {
                "items" : viewCourseItem,
              }
            };

            let viewCourseMoegObj = {
              "Course Category" : jQuery("#course_category_" + courseID).val(),
              "Category ID"     : parseInt(jQuery("#category_id_" + courseID).val()),
              "Course name"     : jQuery("#course_name_" + courseID).val(),
              "Course ID"       : parseInt(jQuery("#course_id_" + courseID).val()),
              "Age group"       : jQuery("#age_group_" + courseID).val(),
              "Course Price"    : parseInt(jQuery("#course_price_" + courseID).val()),
              "Course duration" : jQuery("#course_duration_" + courseID).val(),
              "Session duration": jQuery("#session_duration_" + courseID).val(),
              "Course URL"      : jQuery("#course_url_" + courseID).val(),
              "Course partner"  : jQuery("#course_partner_" + courseID).val(),
              "Timestamp"       : jQuery("#footer_timestamp").val(),
              "Session source"  : jQuery("#footer_session_source").val(),
              "UTM tags"        : jQuery("#footer_utm_tags").val(),
              "User identifier" : parseInt(jQuery("#footer_user_identifier").val()),
            };

            // dataLayer.push({ ecommerce: null });
            dataLayer.push(viewCourseObj);
            console.log(viewCourseObj);

            viewCourseMoegObj.event = "mo_Course_Viewed";
            dataLayer.push(viewCourseMoegObj);
            // Moengage.track_event("Course_Viewed", viewCourseMoegObj);
          });
        </script>
</main>

<?php
endwhile; endif; 
?>
<?php get_footer( vibe_get_footer() );  