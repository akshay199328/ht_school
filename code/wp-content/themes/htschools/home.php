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

<!-- End Hero -->
<div class="owl-carousel owl-theme home_slider">
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
    <div class="item">
        <img src="<?php echo $image_url; ?>">
        <div class="caption">
            <h3 class="caption-title"><?php echo $custom_fields['banner_title'][0];?></h3>
            <span class="name"><?php print_r(the_content()); ?></span>
            <a class="yellow-button" href="<?php echo $custom_fields['cta_link'][0];?>"><?php echo $custom_fields['cta_text'][0];?></a>
        </div>
    </div>
  <?php endwhile;endif; ?>
</div>
<section class="section learning-wrapper">
  <div class="section-copy learning-copy">
      <div class="section-head">
        <?php
        /*if ( is_active_sidebar( 'home-hero-section' ) ) : ?>
          <?php dynamic_sidebar( 'home-hero-section' ); ?>
        <?php endif; */?>
          <div class="header-copy">
              <h3 class="larger-title">Learning for everyone</h3>
              <p class="intro">supporting education through our products, programs, and philanthropy.</p>
          </div>
          <div class="logos">
              <a href="https://www.hindustancareermate.com/" class="column">
                  <img src="<?php echo get_bloginfo('template_url')?>/assets/images/learning/career-mate.png">
                  <span>Get Started</span>
              </a>
              <a href="https://www.htcodeathon.com/" class="column">
                  <img src="<?php echo get_bloginfo('template_url')?>/assets/images/learning/code-thon.png">
                  <span>Get Started</span>
              </a>
              <a href="https://www.lenovoscholarship.com/" class="column">
                  <img src="<?php echo get_bloginfo('template_url')?>/assets/images/learning/scholarships.png">
                  <span>Get Started</span>
              </a>
              <a href="https://www.hindustanolympiad.in/" class="column">
                  <img src="<?php echo get_bloginfo('template_url')?>/assets/images/learning/olympiad.png">
                  <span>Get Started</span>
              </a>
          </div>
      </div>
      <div class="ad homecourse_adwork">
        <?php
        if ( is_active_sidebar( 'homepage-mid-banner' ) ) : ?>
          <?php dynamic_sidebar( 'homepage-mid-banner' ); ?>
        <?php endif; ?>
      </div>
  </div>
</section>
<!-- ======= Features Section ======= -->
<section class="section popular-wrapper">
  <div class="section-copy">
    <div class="section-head">
        <div class="header-copy">
            <h3 class="larger-title">Popular Courses</h3>
            <p class="intro">Access the world’s activities, anytime anywhere.</p>
        </div>
        <a href="<?php echo get_home_url();?>/courses/" class="large-button">Discover All Courses</a>
    </div>
      <?php
          $featured_args_course = array(
            'post_type' => 'course',
            'post_status' => 'publish',
            'posts_per_page' => 8,
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
            'posts_per_page' => 8,
          );  
          $all_course = new WP_Query( $args_all_course );
          if ($all_course->have_posts()) : while ($all_course->have_posts()) : $all_course->the_post();
            if (!in_array($post->ID, $course_id)){
              $course_id[] = $post->ID;
            }
          endwhile;
          endif;
          if(!empty($course_id)){
            $query_args = apply_filters('wplms_mycourses',array(
                'post_type'=>'course',
                'post__in'=>$course_id,
                'posts_per_page'=>8,
                'orderby' => 'post__in', 
            ));

            $Query_course = new WP_Query($query_args);
          }
          if(!empty($Query_course)){
            $i = 0;
          while ($Query_course->have_posts()){
          $Query_course->the_post();
            global $post;
            $custom_fields = get_post_custom();
            $duration = $custom_fields['vibe_validity'][0];
            $durationParameter = get_post_meta($post->ID,'vibe_course_validity_parameter',true);
            $session = $custom_fields['vibe_course_sessions'][0];
            $age_limit = $custom_fields['vibe_course_age_group'][0];
            $category_array = get_the_terms( $post->ID, 'course-cat');
            if($i%4 == 0){
              if ($i != 0){
          ?>
            </div>
          <?php }?>
          <div class="courses-wrapper">
          <?php } ?>
        <div class="column">
            <span class="category"><?php echo $category_array[0]->name; ?></span>
            <?php
              if ( has_post_thumbnail() ) {
                $image_url = get_the_post_thumbnail_url();
              }
            ?>
            <a class="course-hero" href="<?php echo get_permalink($post->ID);?>"><img alt="Celebrity Course" src="<?php echo $image_url; ?>"></a>
            <div class="course-copy">
            <h3 class="course-title"><?php echo bp_course_title(); ?></h3>
            <ul class="data">
                <li>
                    <span class="attribute">Duration</span>
                    <?php if($duration == '') { ?>
                      <span class="value">--</span>
                    <?php } else{ ?>
                      <span class="value"><?php if($duration != ''){echo $duration; }?><strong><?php if($durationParameter != ''){echo ' '.calculate_duration($durationParameter); }?> </strong></span>
                    <?php }?>
                </li>
                <li>
                    <span class="attribute">Age Limit</span>
                    <?php if($age_limit == '') { ?>
                      <span class="value">--</span>
                    <?php } else{ ?>
                      <span class="value"><?php if($age_limit != ''){echo $age_limit.' ' ; }?><strong>yrs</strong></span>
                    <?php }?>
                </li>
            </ul>
            <div class="action">
                <div class="price"><?php the_course_price(); ?></div>
                <?php the_course_button(); ?>
            </div>
            <div class="share">
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
            </div>
        </div>
      <?php $i++; }}?>
    </div>
    </div>
  </div>
</section>
<!-- End Features Section -->

<section class="cards-wrapper">
  <?php
    $args1 = array(
      'post_type' => 'home_course_banner',
      'post_status' => 'publish',
      'orderby' => 'id',
      'posts_per_page' => 3,
      'order'   => 'ASC',
    );
    $Query1 = new WP_Query( $args1 );

    if ($Query1->have_posts()) : while ($Query1->have_posts()) : $Query1->the_post();
      $custom_fields = get_post_custom();
      $image_url = wp_get_attachment_url($custom_fields['banner_image'][0]);
      ?>
    <figure class="cards-copy">
        <img src="<?php echo $image_url; ?>">
        <figcaption class="caption">
            <h3 class="medium-title"><?php echo $custom_fields['banner_title'][0];?></h3>
            <a class="yellow-button" href="<?php echo $custom_fields['cta_link'][0];?>"><?php echo $custom_fields['cta_text'][0];?></a>
        </figcaption>
    </figure>
    <?php endwhile;endif; ?>
</section>

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
              <img alt="featured image" title="featured image" src="<?php echo $featured_image; ?>" class="img-fluid" height="auto" width="auto">
            <?php } ?>
              <br/>
              <div class="link">
                <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
              </div>
            </div>
          </div>
        <?php } endwhile; endif;?>
        <div class="col-sm-12 col-lg-8 home_news-leftspacing">
          <div class="col-sm-12 col-lg-6 mrg">
            <div class="details-middle">
              <ul class="">
                <?php  if ($Query->have_posts()) : $counter = 0; while ($Query->have_posts()) : $Query->the_post();
                  if ($counter <= 4) :
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
                endif; $counter++; endwhile; endif; ?>
              </ul>
            </div>
          </div>
          <div class="col-sm-12 col-lg-6 mrg">
            <div class="details-middle">
              <ul class="">
                <?php if ($Query->have_posts()) : $counter1 = 0; while ($Query->have_posts()) : $Query->the_post();
                  if ($counter1 > 4) :
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
                endif; $counter1++; endwhile; endif; ?>
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