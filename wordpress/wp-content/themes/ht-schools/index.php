<?php
/*
Template Name: Home page
*/
/**
 * Home page
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

<!-- ======= Hero Section ======= -->
<?php
  if ( is_active_sidebar( 'home-hero-section' ) ) : ?>
  <?php dynamic_sidebar( 'home-hero-section' ); ?>      
<?php endif; ?>
<main id="main">
<!-- ======= Features Section ======= -->
  <section id="Popular-Courses" class="Popular-Courses">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-4">
             <header class="section-header">
                <h2>Popular Courses</h2>
                <p>We offer classes for all ages throughout the year.</p>
                <a href="#" class="exlore-link">Explore all Courses</a>
            </header>
            <div class="adworks">
              <?php
              if ( is_active_sidebar( 'popular-courses' ) ) : ?>
                <?php dynamic_sidebar( 'popular-courses' ); ?>      
              <?php endif; ?>
            </div>
          </div>
          <div class="col-lg-8 mt-5 mt-lg-0 d-flex mrg">
            <div class="row align-self-center gy-4">
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
                  $age = $custom_fields['age'][0];
              ?>
                <div class="col-md-12 space" data-aos="zoom-out" data-aos-delay="200">
                  <div class="course-box d-flex align-items-center">
                    <div class="col-lg-2 col-sm-12 mrg">
                      <?php 
                        if ( has_post_thumbnail() ) { 
                          $image_url = get_the_post_thumbnail_url();
                        }
                      ?>
                      <img src="<?php echo $image_url; ?>" class="img-fluid">
                    </div>
                    <div class="col-lg-7 col-sm-12 mrg">
                      <div class="middle-details">
                        <h6>Business Analytics</h6>
                        <h2><?php echo get_the_title() ?></h2>
                        <?php
                        $char_limit = 50; //character limit
                        $content = $post->post_content; //contents saved in a variable
                        ?>
                        <p class="text-ellipsis"><?php echo substr(strip_tags($content), 0, $char_limit);  ?>...</p>
                        <div class="col-lg-5 duration mrg">
                          <div class="pull-left">
                            <p>Duration</p>
                            <h6><span><?php echo $duration;?> days </span></h6>
                          </div>
                          <div class="pull-right">
                            <p>Age Limit</p>
                            <h6>7 - 12 yrs</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-sm-12 mrg">
                      <div class="col-lg-12 right-details mrg">
                        <div class="col-lg-12 share-icon mrg">
                          <i class="bi bi-share"></i>
                        </div>
                        <div class="col-lg-12 course-button mrg">
                            <h6>₹ 1,400</h6>
                            <a href="#" class="course-btn">Join Course</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endwhile; endif; ?>
            </div>
          </div>

        </div> <!-- / row -->

      </div>

    </section><!-- End Features Section -->
    <!-- ======= Competitors Section ======= -->
    <!-- <section id="" class="competitive">
    <?php   // start by setting up the query
    $query_banner = new WP_Query( array(
        'post_type' => 'banner',
        'banner_groups' => 'home'
    ));
 
   
    if ( $query_banner->have_posts() ) {?>
        <div class="container">
        <div class="row gx-0">
          <?php echo do_shortcode('[banner id="102"]'); ?>
        </div>
      </div>
    <?php } else{
      echo "nothing";
    } ?>
      
    </section> -->
    <!-- End Competitors Section -->

    <!-- ======= Competitors Section ======= -->
      <?php
        if ( is_active_sidebar( 'home-competitive-section' ) ) : ?>
        <?php dynamic_sidebar( 'home-competitive-section' ); ?>      
      <?php endif; ?>
    <!-- End Competitors Section -->

    <!-- ======= Latest News Section ======= -->
    <section id="" class="latest-news">
      <div class="container">
        <div class="row gx-0">
          <div class="col-sm-12">
              <div class="header-heading">
                <h2>Latest News</h2>
                <a href="#" class="news-btn">All News</a>
              </div>
          </div>
          <?php
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'category_name' => 'News',
            );
            $Query = new WP_Query( $args );
            if ($Query->have_posts()) : while ($Query->have_posts()) : $Query->the_post();
              if( $Query->current_post == 0 ) { 
        ?>
          <div class="col-sm-12 col-lg-4">
            <div class="details-left">
              <p><strong><?php echo get_the_date('M d, Y H:i'); ?></strong></p>
              <?php if ( has_post_thumbnail() ) { 
                $featured_image = get_the_post_thumbnail_url();
              }
              ?>
              <img src="<?php echo $featured_image; ?>" class="img-fluid">
              <div class="link">
                <a href="#"><?php echo get_the_title() ?></a>
              </div>
            </div>
          </div>
        <?php } endwhile; endif;?>
          <div class="col-sm-12 col-lg-8">
            <div class="details-middle">
              <ul>
                <?php if ($Query->have_posts()) : while ($Query->have_posts()) : $Query->the_post();
                      // if( $Query->current_post != 0 ) { 
                  ?>
                    <li>
                      <p><strong><?php echo get_the_date('M d, Y H:i'); ?></strong></p>
                      <div class="link">
                          <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
                      </div>
                    </li>
                  <?php 
                  // }
                  endwhile; endif; ?>
              </ul>
            </div>
          </div>
          <div class="col-lg-12 center">
            <?php
              if ( is_active_sidebar( 'home-news' ) ) : ?>
              <?php dynamic_sidebar( 'home-news' ); ?>      
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php the_widget( 'WP_Widget_Custom_HTML', $instance, $args ); ?> 
      <div class="container">
        <div class="row">
            <div class="col-lg-12 infograph">
              <div class="heading">
                <h4>Infographics</h4>
              </div>
              <div class="details">
                <?php
                  $args1 = array(
                      'post_type' => 'infographics',
                      'post_status' => 'publish',
                      
                  );
                  $Query1 = new WP_Query( $args1 );
                  // print_r($Query1);
                  
                  // print_r(get_post_custom());
                  if ($Query1->have_posts()) : while ($Query1->have_posts()) : $Query1->the_post(); 
                      $custom_fields = get_post_custom();
                      $image_url = wp_get_attachment_url($custom_fields['image'][0]);
                    
                ?>
                  <div class="co-sm-12 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                      <img src="<?php echo $image_url; ?>" class="img-fluid" />
                      <div class="content">
                        <p><?php echo get_the_date('M d, Y H:i'); ?></p>
                        <h3><?php echo $custom_fields['infographic_content'][0] ?></h3>
                      </div>
                  </div>
                <?php endwhile;endif;?>
              </div>
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
              'post_type' => 'testimonial',
              'post_status' => 'publish',
              
          );
          $Query1 = new WP_Query( $args1 );
          // print_r($Query1);
          
          // print_r(get_post_custom());
          if ($Query1->have_posts()) : while ($Query1->have_posts()) : $Query1->the_post(); 
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
                    <img src="<?php echo $url; ?>" class="testimonial-img img-fluid" alt="" >
                  </div>
                  <div class="col-sm-12 col-lg-9 mrg">
                    <h3><?php echo $custom_fields['profile_name'][0] ?></h3>
                    <h4><?php echo $custom_fields['designation'][0] ?></h4>
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
get_sidebar();
get_footer();
