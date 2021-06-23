<?php
/**
 * Template Name: My Courses
 */
if ( !defined( 'ABSPATH' ) ) exit;

get_header(vibe_get_header());
?>
<main id="main">
  <section class="breadcrumbs background-breadcrumbs">
      <div class="innerheader-space"></div>
      <div class="container">
        <?php
          $breadcrumbs=get_post_meta($id,'vibe_breadcrumbs',true);
            if(!isset($breadcrumbs) || !$breadcrumbs || vibe_validate($breadcrumbs)){
                vibe_breadcrumbs();
            }
          echo '<h2>'.vibe_get_title($id).'</h2>';
          the_sub_title($id);
        ?>
      </div>
    </section>
    <section id="Popular-Courses" class="">
      <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="row">
            <?php
                $user = wp_get_current_user();
                $userIdentifier = "";

                if(isset($user->ID) && $user->ID > 0)
                {
                  $userIdentifier = $user->ID;
                }
                else if(isset($_COOKIE['PHPSESSID']))
                {
                  $userIdentifier = $_COOKIE['PHPSESSID'];
                }
                $page_object = get_queried_object();
                $term_id = $page_object->term_id;
                $args = array(
                  'post_type' => 'course',
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'course-cat',
                      'field' => 'term_id',
                      'terms' => $term_id
                    )
                  )
                );
      				$wp_query = new WP_Query( $args ); 

                  ?>
                  <div class="col-lg-9 mrg all-courses-left">
                  <div class="">
                  <div class="col-md-12 mrg space" data-aos="zoom-out" data-aos-delay="200">
                    <?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
                    global $post;
                    $custom_fields = get_post_custom();
                    $duration = $custom_fields['vibe_validity'][0];
                    $durationParameter = get_post_meta($post->ID,'vibe_course_validity_parameter',true);
                    $session = $custom_fields['vibe_course_sessions'][0];
                    $age_limit = $custom_fields['vibe_course_age_group'][0];
                    $category_array = get_the_terms( $post->ID, 'course-cat');
                    $excerpt = get_post_field('post_excerpt', $post->ID);
                    $courseID = $post->ID;
                    $courseslug=get_site_url().'/?p='.$courseID;
                    $usersFavorites = wpfp_get_users_favorites();
                    $user = wp_get_current_user();

                    $coursePartner = "";

                    $cb_course_id = get_post_meta($courseID,'celeb_school_course_id',true);
                    if ($cb_course_id) {
                      $coursePartner = "Celebrity School";
                    }

                    $aiws_course_id = get_post_meta($courseID,'aiws_program_id',true);
                    if ($aiws_course_id) {
                      $coursePartner = "AIWS";
                    }
                    $progress = bp_course_get_user_progress($user->id,$post->ID);
                    if($statuses[$post->ID]>2){$progress = 100;}
                    $custom_fields = get_post_custom();
                    $duration = $custom_fields['vibe_validity'][0];
                    $durationParameter = get_post_meta($post->ID,'vibe_course_validity_parameter',true);
                    $session = $custom_fields['vibe_course_sessions'][0]; ?>
                  <div class="course-box dotted-border all_courses_list" data-id="<?php echo $post->ID;?>">
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
                    <table width="100%">
                      <tbody>
                        <tr>
                          <td class="tableTd_left">
                              <?php bp_course_avatar(); 
                                $category_array = get_the_terms( $post->ID, 'course-cat');
                                $excerpt = get_post_field('post_excerpt', $post->ID);
                               ?>
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
                                  <?php if(get_post_meta($post->ID,'vibe_course_age_group',true) == '') { ?>
                                    <h6>--</h6>
                                  <?php } else{ ?>
                                    <h6><?php echo get_post_meta($post->ID,'vibe_course_age_group',true);?><span> yrs</span></h6>
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
                                      <img src="<?php echo get_bloginfo('template_url');?>/assets/images/share-icon.svg" alt="share icon" title="share icon">
                                      <div class="display_icon">
                                        <h6>Share <span><i class="bi bi-x close-share"></i></span></h6>
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
                                </td>
                              </tr>
                              <tr class="border_button">
                                <td class="course-button">
                                  <h6 ><?php 
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
                    
                </div>
                <?php endwhile; endif; posts_pagination();?>
                    </div>
                </div>
    </div>
    <div class="col-lg-3 mrg adworks desktop-add right-adwork right_spacing">
        <?php
            if ( is_active_sidebar( 'course_section_rhs_banner' ) ) : ?>
            <?php dynamic_sidebar( 'course_section_rhs_banner' ); ?>      
        <?php endif; ?>
    </div>
</div>
<input type="hidden" id="user_identifier" value="<?php echo $userIdentifier;?>">
<input type="hidden" id="timestamp" value="<?php echo date('c', time());?>">
<input type="hidden" id="session_source">
<input type="hidden" id="utm_tags">
</section>
<div class="col-md-12 col-sm-12">
    <?php
      $sidebar = apply_filters('wplms_sidebar','competitive-section');
            if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : ?>
        <?php endif; ?>
  </div>
</main>
<?php
get_footer(vibe_get_footer());
?>