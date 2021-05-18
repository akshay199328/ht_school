<?php
/**
 * Template Name: All Courses page
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
    <section id="Popular-Courses" class="all_course_page">
      
      <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="row">
          <div class="sticky_content">
          <div class="col-sm-12 col-md-9 col-lg-9 mrg">
            <div class="">
                <div class="col-md-12 mrg space" data-aos="zoom-out" data-aos-delay="200">
                  <?php
                  $featured_args_course = array(
                    'post_type' => 'course',
                    'post_status' => 'publish',
                    'posts_per_page' => 3,
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
                    'nopaging' => true
                  );  
                  $all_course = new WP_Query( $args_all_course );
                  if ($all_course->have_posts()) : while ($all_course->have_posts()) : $all_course->the_post();
                    if (!in_array($post->ID, $course_id)){
                      $course_id[] = $post->ID;
                    }
                  endwhile;
                  endif;
                  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                  if(!empty($course_id)){
                    $query_args = apply_filters('wplms_mycourses',array(
                        'post_type'=>'course',
                        'post__in'=>$course_id,
                        'posts_per_page'=>6,
                        'orderby' => 'post__in', 
                        'paged'=>$paged,
                    ));

                    $wp_query = new WP_Query($query_args);
                  }
                  if(!empty($wp_query)){
                    while ($wp_query->have_posts()){
                      $wp_query->the_post();
                        global $post;
                      $custom_fields = get_post_custom();
                      $duration = $custom_fields['vibe_validity'][0];
                      $durationParameter = get_post_meta($post->ID,'vibe_course_validity_parameter',true);
                      $session = $custom_fields['vibe_course_sessions'][0];
                      $age_limit = $custom_fields['vibe_course_age_group'][0];
                      $category_array = get_the_terms( $post->ID, 'course-cat');
                      $excerpt = get_post_field('post_excerpt', $post->ID);
                  ?>
                  <div class="course-box dotted-border">
                <table width="100%">
                  <tbody>
                    <tr>
                      <td class="tableTd_left">
                          <?php 
                              if ( has_post_thumbnail() ) { 
                                $image_url = get_the_post_thumbnail_url();
                              }
                          ?>
                          <a href="<?php echo get_permalink($post->ID);?>"> 
                            <img src="<?php echo $image_url; ?>" class="img-fluid" alt="" title="">
                          </a>
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
                              <?php
                                 if(is_user_logged_in()){
                                  ?>
                                  <li style="list-style-type: none;"><?php wpfp_course_link(); ?></li>
                                <?php }else{
                                  $url = "/login-register";
                                  ?>
                                  <li style="list-style-type: none;"><a href="<?php echo get_site_url().$url; ?>"><i class="bookmark-remove" title="Add to Wishlist"></i></a></li> 
                                  <?php
                                }
                                ?>
                              <li class="hover_share">
                                <img src="<?php echo get_bloginfo('template_url');?>/assets/images/share-icon.svg" alt="Share Icon" title="Share Icon">
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
                <?php }} posts_pagination();?>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3 mrg adworks desktop-add right-adwork right_spacing">
            <?php
              if ( is_active_sidebar( 'course_section_rhs_banner' ) ) : ?>
              <?php dynamic_sidebar( 'course_section_rhs_banner' ); ?>      
            <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
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