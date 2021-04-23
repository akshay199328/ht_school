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
                    $args_course = array(
                        'post_type' => 'course',
                        'post_status' => 'publish',
                        'posts_per_page'=>20,
                    );
                    $Query_course = new WP_Query( $args_course );
                    if ($Query_course->have_posts()) : while ($Query_course->have_posts()) : $Query_course->the_post();
                      $custom_fields = get_post_custom();
                      $duration = $custom_fields['vibe_duration'][0];
                      $session = $custom_fields['vibe_course_sessions'][0];
                      $age_limit = $custom_fields['vibe_course_age_group'][0];
                      $category_array = get_the_terms( $post->ID, 'course-cat');
                      $excerpt = get_post_field('post_excerpt', $post->ID);
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
                              <?php if($duration == '') { ?>
                              <h6>--</h6>
                              <?php } else{ ?>
                              <h6><?php if($duration != ''){echo $duration; }?><span><?php if($duration != ''){echo ' Days'; }?> </span></h6>
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
                              <li class="hover_share">
                                <img src="<?php echo get_bloginfo('template_url');?>/assets/images/share-icon.svg">
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
                          </div>
                          <div class="col-lg-12 course-button">

                              <h6 ><?php 
                                the_course_price();
                            ?>
                            </h6>
                            <?php the_course_button(); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3 mrg adworks desktop-add right-adwork right_spacing">
            <?php
              if ( is_active_sidebar( 'banner-1' ) ) : ?>
              <?php dynamic_sidebar( 'banner-1' ); ?>      
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