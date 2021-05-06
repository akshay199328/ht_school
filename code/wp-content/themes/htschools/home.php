<?php
/**
 * Template Name: Home page
 */
if ( !defined( 'ABSPATH' ) ) exit;

get_header(vibe_get_header());
?>
<!-- ======= Hero Section ======= -->

<main id="main">
 <!-- ======= Hero Section ======= -->
 <section id="hero" class="hero">
  <div class="header-space"></div>
  <div class="col-lg-12 mrg home_slider owl-carousel owl-theme">
    <?php
    $args1 = array(
      'post_type' => 'banner',
      'post_status' => 'publish',
      'orderby' => 'id',
      'order'   => 'ASC',

    );
    $Query1 = new WP_Query( $args1 );

    if ($Query1->have_posts()) : while ($Query1->have_posts()) : $Query1->the_post(); 
      $custom_fields = get_post_custom();
      $image_url = wp_get_attachment_url($custom_fields['banner_image'][0]);
      $mobile_image = wp_get_attachment_url($custom_fields['mobile_image'][0]);
      ?>
      <div class="col-lg-12 mrg item">
        <div class="container">
          <div class="homecarousel_text">
            <div class="col-sm-12 col-md-6 mrg">
              <div class="pull-left">

                <h1><?php echo $custom_fields['banner_title'][0];?></h1>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 mrg">
              <div class="pull-right">
                <p><?php print_r(the_content()); ?></p>
                <a href="<?php echo $custom_fields['cta_link'][0];?>" class="learn_morebtn"><?php echo $custom_fields['cta_text'][0];?></a>
              </div>
            </div>  
          </div>
        </div>
        <img alt="desktop" title="desktop" src="<?php echo $image_url; ?>" class="desktop_img" />
        <img alt="mobile" title="mobile" src="<?php echo $mobile_image; ?>" class="mobile_img" />
      </div>
    <?php endwhile;endif; ?>
  </div>

</section><!-- End Hero -->
<?php
if ( is_active_sidebar( 'home-hero-section' ) ) : ?>
  <?php dynamic_sidebar( 'home-hero-section' ); ?>      
<?php endif; ?>
<!-- ======= Features Section ======= -->
<section id="Popular-Courses" class="Popular-Courses">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <div class="col-sm-12 col-lg-4 mrg">
       <header class="section-header">
        <h2>TRENDING COURSES</h2> 
        <p>Access the world’s activities, anytime anywhere.</p>
        <a href="<?php echo get_home_url();?>/courses/" class="exlore-link desktop-btn">Discover All Courses</a>
      </header>
      <div class="adworks">
        <?php
        if ( is_active_sidebar( 'homepage-mid-banner' ) ) : ?>
          <?php dynamic_sidebar( 'homepage-mid-banner' ); ?>      
        <?php endif; ?>
      </div>
    </div>
    <div class="col-sm-12 col-lg-8 mrg">
      <div class="align-self-center courses-slider gy-4">
        <?php
        $args_course = array(
          'post_type' => 'course',
          'post_status' => 'publish',
          'posts_per_page' => 3,
        );
        $Query_course = new WP_Query( $args_course );
        if ($Query_course->have_posts()) : while ($Query_course->have_posts()) : $Query_course->the_post();
          $custom_fields = get_post_custom();
          $duration = $custom_fields['vibe_duration'][0];
          $durationParameter = get_post_meta($post->ID,'vibe_course_duration_parameter',true);
          $session = $custom_fields['vibe_course_sessions'][0];
          $age_limit = $custom_fields['vibe_course_age_group'][0];
          $category_array = get_the_terms( $post->ID, 'course-cat');
          ?>
          <div class="col-md-12 mrg space" data-aos="zoom-out" data-aos-delay="200">
            <div class="course-box">
              <div class="col-xs-2 col-sm-2 col-lg-2 pull-left mrg">
                <?php 
                if ( has_post_thumbnail() ) { 
                  $image_url = get_the_post_thumbnail_url();
                }
                ?>
                <a href="<?php echo get_permalink($post->ID);?>"> <img alt="Celebrity Course" src="<?php echo $image_url; ?>" class="img-fluid"  /></a>
              </div>
              <div class="col-xs-10 col-sm-10 col-lg-10 pull-left mrg">
                <div class="col-sm-12 col-lg-9 pull-left mrg">
                  <div class="middle-details">
                    <h6><?php echo $category_array[0]->name; ?></h6>
                    <h2><?php echo bp_course_title(); ?></h2>
                    <div class="col-lg-12 share-icon mrg">
                      <i class="bi bi-share"></i>
                    </div>
                    <?php
                    $excerpt = get_post_field('post_excerpt', $post->ID);
                    ?>
                    <?php if ( $excerpt != '' ) {
                      echo "<p>".wp_trim_words( $excerpt, 20, NULL )."</p>";
                    }  ?>
                    <div class="col-lg-7 duration mrg">
                      <div class="pull-left">
                        <p>Duration</p>
                        <?php if($duration == '') { ?>
                          <h6>--</h6>
                        <?php } else{ ?>
                          <h6><?php if($duration != ''){echo $duration; }?><span><?php if($durationParameter != ''){echo ' '.calculate_duration($durationParameter); }?> </span></h6>
                        <?php }?>
                      </div>
                      <div class="pull-right">
                        <p>Age Group</p>
                        <?php if($age_limit == '') { ?>
                          <h6>--</h6>
                        <?php } else{ ?>
                          <h6><?php echo $age_limit;?><span> yrs</span></h6>
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
                          <img alt="share icon" title="share icon" src="<?php echo get_bloginfo('template_url');?>/assets/images/share-icon.svg">
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
                    <div class="col-lg-12 course-button mrg">
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
        </div>
      <?php endwhile; endif; ?>

    </div>
    <a href="<?php echo get_home_url();?>/courses/" class="exlore-link mobile-btn">Discover Courses</a>
  </div>

</div> <!-- / row -->

</div>

</section><!-- End Features Section -->


  <!-- ======= Latest News Section ======= -->
  <section id="" class="latest-news home_latest_news">
    <div class="container">
      <div class="row gx-0">
        <div class="col-sm-12">
          <div class="header-heading">
            <h2>Editor's Desk</h2>
            <a href="<?php echo get_home_url();?>/editorsdesk" class="news-btn">All Articles</a>
          </div>
        </div>
        <?php
        $args = array(
          'post_type' => 'post',
          'post_status' => 'publish',
          //'category_name' => 'Expert','Interview','Featured',
          'posts_per_page' => 9,
          'order'=>'DESC',
        );
        $Query = new WP_Query( $args );
        if ($Query->have_posts()) : while ($Query->have_posts()) : $Query->the_post();
          if( $Query->current_post == 0 ) { 
            ?>
            <div class="col-sm-12 col-lg-4 homeDetails-left">
              <div class="details-left">
               <div class="news-date">
                <p><strong><?php echo get_the_date('M d, Y H:i'); ?></strong></p>
              </div>
              <?php if ( has_post_thumbnail() ) { 
                $featured_image = get_the_post_thumbnail_url();
              
              ?>
              <img alt="featured image" title="featured image" src="<?php echo $featured_image; ?>" class="img-fluid">
            <?php } ?>
              <br/>
              <div class="link">
                <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
              </div>
            </div>
          </div>
        <?php } endwhile; endif;?>
        <div class="col-sm-12 col-lg-8 home_news-leftspacing">
          <div class="col-sm-12 col-lg-12 mrg">
            <div class="details-middle">
              <ul class="news_two_data">
                <?php if ($Query->have_posts()) : while ($Query->have_posts()) : $Query->the_post();
                  if( $Query->current_post != 0 ) { 
                    ?>
                    <li>
                      <p><strong><?php echo get_the_date('M d, Y H:i'); ?></strong></p>
                      <div class="link">
                        <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
                      </div>
                    </li>
                    <?php 
                  }
                endwhile; endif; ?>
              </ul>
            </div>
          </div>
          <!-- <div class="col-sm-12 col-lg-6 mrg">
              <div class="details-middle">
                <div class="popularNew-heading">
                  <h5>Popular on<br/>HT School News</h5>
                </div>
                <ul>
                    <?php
                        //query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC&category_name=Expert&posts_per_page=4');
                        query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC&posts_per_page=4');
                        if (have_posts()) : while (have_posts()) : the_post();
                        ?>
                            <li>
                                <p><strong><?php echo get_the_date('M d, Y H:i'); ?></strong></p>
                                <div class="link">
                                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                            </li>
                        <?php
                        endwhile; endif;
                        wp_reset_query();
                    ?>
                </ul>
              </div>
            </div> -->
          </div>
          <div class="col-lg-12 center">
            <?php
            if ( is_active_sidebar( 'homepage-footer-banner' ) ) : ?>
              <?php dynamic_sidebar( 'homepage-footer-banner' ); ?>      
            <?php endif; ?>
          </div>
        </div>
      </div>

    <!-- ======= Testimonials Section ======= -->
        <div class="container testimonials" data-aos="fade-up">

          <div class="heading">
            <h4>Testimonials</h4>
          </div>

          <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="200">
            <div class="swiper-wrapper">
              <?php
              $args1 = array(
                'post_type' => 'testimonials',
                'post_status' => 'publish',

              );
              $Query1 = new WP_Query( $args1 );

          // print_r(get_post_custom());
              if ($Query1->have_posts()) : while ($Query1->have_posts()) : $Query1->the_post(); 
                print_r(get_post_custom());
                $custom_fields = get_post_custom();
                $url = wp_get_attachment_url($custom_fields['image'][0]);
                ?>
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="profile-content">

                     <?php echo the_content(); ?>

                   </div>
                   <div class="profile profile-name mt-auto">
                    <div class="col-sm-12 col-lg-3 mrg">
                      <img alt="testimonial" title="testimonial" src="<?php echo get_the_post_thumbnail_url(); ?>" class="testimonial-img img-fluid" alt="" >
                    </div>
                    <div class="col-sm-12 col-lg-9 mrg">
                      <h3><?php echo $custom_fields['vibe_testimonial_author_name'][0] ?></h3>
                      <h4><?php echo $custom_fields['vibe_testimonial_author_designation'][0] ?></h4>
                    </div>
                  </div>
                </div>
              </div><!-- End testimonial item -->


              <?php 
            endwhile; endif; ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>
        <div class="col-lg-12 center">
          <?php
          if ( is_active_sidebar( 'home-testimonial' ) ) : ?>
            <?php dynamic_sidebar( 'home-testimonial' ); ?>      
          <?php endif; ?>
        </div>
      </div>
      <!-- End Testimonials Section -->
    </section>

  </main><!-- End #main -->

  <?php
  get_footer(vibe_get_footer());
  ?>