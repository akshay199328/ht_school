<?php
/**
 * Template Name: Home page
 */
if ( !defined( 'ABSPATH' ) ) exit;

get_header(vibe_get_header());
?>
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
          <div class="col-sm-12 col-lg-4 mrg">
             <header class="section-header">
                <h2>Popular Courses</h2>
                <p>We offer classes for all ages throughout the year.</p>
                <a href="<?php echo get_home_url();?>/courses/" class="exlore-link desktop-btn">Explore all Courses</a>
            </header>
            <div class="adworks">
              <?php
              if ( is_active_sidebar( 'banner-2' ) ) : ?>
              <?php dynamic_sidebar( 'banner-2' ); ?>      
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
                        <?php
                        $char_limit = 50; //character limit
                        $content = $post->post_content; //contents saved in a variable

                        ?>
                        <p class=""><?php echo substr(strip_tags($content), 0, $char_limit);  ?></p>
                        <div class="col-lg-7 duration mrg">
                          <div class="pull-left">
                            <p>Duration</p>
                            <h6><span><?php echo $duration;?></span> Days</h6>
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
            <a href="<?php echo get_home_url();?>/courses/" class="exlore-link mobile-btn">Explore all Courses</a>
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
        if ( is_active_sidebar( 'competitive-section' ) ) : ?>
        <?php dynamic_sidebar( 'competitive-section' ); ?>      
      <?php endif; ?>
    <!-- End Competitors Section -->

    <!-- ======= Latest News Section ======= -->
    <section id="" class="latest-news">
      <div class="container">
        <div class="row gx-0">
          <div class="col-sm-12">
              <div class="header-heading">
                <h2>Latest News</h2>
                <a href="<?php echo get_home_url();?>/news" class="news-btn">All News</a>
              </div>
          </div>
          <?php
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                //'category_name' => 'Expert','Interview','Featured',
                'posts_per_page' => 4,
                'order'=>'DESC',
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
                <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
              </div>
            </div>
          </div>
        <?php } endwhile; endif;?>
          <div class="col-sm-12 col-lg-4">
            <div class="details-middle">
              <ul>
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
            <div class="col-sm-12 col-lg-4">
              <div class="details-middle">
                <div class="popularNew-heading">
                  <h5>Popular on<br/>HT School News</h5>
                </div>
                <ul>
                    <?php
                        //query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC&category_name=Expert&posts_per_page=4');
                        query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC&posts_per_page=3');
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
            </div>
          <div class="col-lg-12 center">
            <?php
              if ( is_active_sidebar( 'banner-3' ) ) : ?>
              <?php dynamic_sidebar( 'banner-3' ); ?>      
            <?php endif; ?>
          </div>
        </div>
      </div>
       
<!--       <div class="container">
        <div class="row">
            <div class="col-lg-12 infograph">
              <div class="heading">
                <h4>Infographics</h4>
              </div>
              <div class="details mobile-slider">
                <?php
                  $args1 = array(
                      'post_type' => 'infographics',
                      'post_status' => 'publish',
                      
                  );
                  $Query1 = new WP_Query( $args1 );
                  
                  // print_r(get_post_custom());
                  if ($Query1->have_posts()) : while ($Query1->have_posts()) : $Query1->the_post(); 
                      $custom_fields = get_post_custom();
                      $image_url = wp_get_attachment_url($custom_fields['image'][0]);
                    
                ?>
                  <div class="co-sm-12 col-lg-4 item" data-aos="zoom-in" data-aos-delay="100">
                      <img src="<?php echo $image_url; ?>" class="img-fluid" />
                      <div class="content">
                        <p><?php echo get_the_date('M d, Y H:i'); ?></p>
                        <h3><?php echo get_the_title(); ?></h3>
                      </div>
                  </div>
                <?php endwhile;endif;?>
              </div>
            </div>
          </div>
      </div> -->
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
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="testimonial-img img-fluid" alt="" >
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