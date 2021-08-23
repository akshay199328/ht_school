<?php
/**
 * Template Name: Home page
 */
if ( !defined( 'ABSPATH' ) ) exit;

get_header(vibe_get_header());
?>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- ======= Hero Section ======= -->

<main id="main">
 <!-- ======= Hero Section ======= -->

<!-- End Hero -->
<div class="owl-carousel owl-theme home_slider" id="home_slider">
  <?php
    $args1 = array(
      'post_type' => 'banner',
      'post_status' => 'publish',
      'orderby' => 'publish_date',
      'order' => 'DESC',      
      'nopaging' => true


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
            <h2 class="slider-title"><?php echo $custom_fields['banner_title'][0];?></h3>
            <?php $sub_title = $custom_fields['banner_sub_title'][0]; if($sub_title != '') { ?>
          <?php } ?>
            <a class="main-button" href="<?php echo $custom_fields['cta_link'][0];?>" target="_blank"><?php echo $custom_fields['cta_text'][0];?></a>
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
              <a target="_blank" href="https://www.hindustancareermate.com/" class="column item">
                  <img src="<?php echo get_bloginfo('template_url')?>/assets/images/learning/career-mate.png">
                  <span>Get Started</span>
              </a>
              <!-- <a target="_blank" href="https://www.htcodeathon.com/" class="column item"> -->
                <a target="_blank" href="<?php echo get_bloginfo('url')?>/course-cat/coding-competition/" class="column item">
                  <img src="<?php echo get_bloginfo('template_url')?>/assets/images/learning/code-thon.png">
                  <span>Get Started</span>
              </a>
              <a target="_blank" href="https://www.lenovoscholarship.com/" class="column item">
                  <img src="<?php echo get_bloginfo('template_url')?>/assets/images/learning/scholarships.png">
                  <span>Get Started</span>
              </a>
              <a target="_blank" href="https://www.hindustanolympiad.in/" class="column">
                  <img src="<?php echo get_bloginfo('template_url')?>/assets/images/learning/olympiad.png">
                  <span>Get Started</span>
              </a>
          </div>
      </div>
      <!--  -->
      <div class="ad homecourse_adwork">
        <?php
        if ( is_active_sidebar( 'homepage-mid-banner' ) ) : ?>
          <?php dynamic_sidebar( 'homepage-mid-banner' ); ?>
        <?php endif; ?>
      </div>
  </div>
</section>
  <section class="home-section popular-courses">
    <div class="home-copy">
      <h2 class="medium-title">Popular Courses</h2>
      <div class="owl-carousel owl-theme course_slider">
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
          'meta_query'  => array(
            'relation'  => 'AND',
            array(
              'key'   =>'vibe_course_event',
              'value'   => '0',
              'compare' => '='
              )
            )
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
              'meta_query'  => array(
              'relation'  => 'AND',
                array(
                  'key'   =>'vibe_course_event',
                  'value'   => '0',
                  'compare' => '='
                  )
                )
          ));

          $Query_course = new WP_Query($query_args);
        }
        if(!empty($Query_course)){
          $i = 0;
        while ($Query_course->have_posts())
        {
          $Query_course->the_post();
          global $post;
          $custom_fields = get_post_custom(); 
         // echo "<pre>";print_r($custom_fields);echo "</pre>";
          $duration = $custom_fields['vibe_validity'][0];
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
          $durationParameter = get_post_meta($post->ID,'vibe_course_validity_parameter',true);
          $session = $custom_fields['vibe_course_sessions'][0];
          $age_limit = $custom_fields['vibe_course_age_group'][0];
          $category_array = get_the_terms( $post->ID, 'course-cat');
          $courseID = $post->ID;
           $courseslug=get_the_permalink($courseID);
          $usersFavorites = wpfp_get_users_favorites();
          $coursePartner = "";

            $cb_course_id = get_post_meta($courseID,'celeb_school_course_id',true);
            if ($cb_course_id) {
              $coursePartner = "Celebrity School";
            }

            $aiws_course_id = get_post_meta($courseID,'aiws_program_id',true);
            if ($aiws_course_id) {
              $coursePartner = "AIWS";
            }
            if ( has_post_thumbnail() ) {
                $image_url = get_the_post_thumbnail_url();
              }
          ?>

        <div class="item">
          <div class="course-card">
            <figure class="image"><img alt="Acting Lessons by Nawazuddin Siddiqui" src="<?php echo $image_url;?>"></figure>
            <div class="course-copy">
              <header class="course-header">
                <a class="category" href="<?php echo get_permalink($post->ID);?>"><?php echo $category_array[0]->name; ?></a>
                <span class="badge <?php echo $badge_class;?>"><?php echo $course_type; ?></span>
              </header>
              <h2 class="course-title"><a href="<?php echo get_permalink($post->ID);?>"><?php echo bp_course_title(); ?></a></h2>
              <footer class="course-footer">
                <div class="left">
                  <span class="price" data-id="<?php echo $post->ID;?>"><?php the_course_price(); ?></span>
                </div>
                <div class="right">
                  <a href="#!">
                  <svg class="cart" xmlns="http://www.w3.org/2000/svg" width="26" height="21.587" viewBox="0 0 26 21.587"> <g id="Group_20746" data-name="Group 20746" transform="translate(1 1)"> <g id="Group_15651" data-name="Group 15651" transform="translate(0 0)"> <path id="Path_30160" data-name="Path 30160" d="M-11952.5,9580.5h3.393l5.136,15.36h12.108" transform="translate(11952.5 -9580.5)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/> <path id="Path_30161" data-name="Path 30161" d="M-11898.5,9610.5h20.038l-3.893,9.023h-13" transform="translate(11902.465 -9607.673)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/> <g id="Ellipse_440" data-name="Ellipse 440" transform="translate(7.67 17.428)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"> <circle cx="1.579" cy="1.579" r="1.579" stroke="none"/> <circle cx="1.579" cy="1.579" r="0.579" fill="none"/> </g> <g id="Ellipse_441" data-name="Ellipse 441" transform="translate(16.874 17.428)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"> <circle cx="1.579" cy="1.579" r="1.579" stroke="none"/> <circle cx="1.579" cy="1.579" r="0.579" fill="none"/> </g> </g> </g> </svg>
                  </a>
                  <a href="#!">
                  <svg class="bookmark filled" xmlns="http://www.w3.org/2000/svg" width="17" height="21.146" viewBox="0 0 17 21.146"><path id="Path_38323" data-name="Path 38323" d="M31.409,38.413,35.5,34.368l4.091,4.045a2.083,2.083,0,0,0,2.79.074A1.773,1.773,0,0,0,43,37.147v-14.3A2.964,2.964,0,0,0,39.932,20H31.068A2.964,2.964,0,0,0,28,22.849V37.159A1.906,1.906,0,0,0,29.965,39a2.049,2.049,0,0,0,1.444-.575Z" transform="translate(-27 -19)"/></svg>
                  </a>
                  <a href="#!">
                  <svg class="share" xmlns="http://www.w3.org/2000/svg" width="25.445" height="19.4" viewBox="0 0 25.445 19.4"> <g id="Group_20744" data-name="Group 20744" transform="translate(0.205 0.2)" style="isolation: isolate"> <path id="Path_38322" data-name="Path 38322" d="M21.417,21a.53.53,0,0,1,.275.133l9.091,8.188a.724.724,0,0,1,.1.919.626.626,0,0,1-.1.114l-9.091,8.188a.52.52,0,0,1-.8-.12.723.723,0,0,1-.118-.392V34.746a18.89,18.89,0,0,0-4.705.389,17.55,17.55,0,0,0-9.127,4.7.518.518,0,0,1-.8-.062.733.733,0,0,1-.113-.634C8.4,30.71,15.625,26.694,20.778,25.094V21.655a.618.618,0,0,1,.564-.66A.446.446,0,0,1,21.417,21Zm.5,1.985v2.6a.645.645,0,0,1-.426.634C17,27.53,10.737,30.858,7.913,37.407a19.292,19.292,0,0,1,7.964-3.562,21.972,21.972,0,0,1,5.5-.4.621.621,0,0,1,.542.655v2.589l7.6-6.848Z" transform="translate(-6.003 -20.995)" stroke-width="0.4"/> </g> </svg>
                  </a>
                </div>
              </footer>
            </div>
          </div>
        </div>
        
        <?php }} ?>
      </div>
    </div>
  </section>

  <section class="home-section categories-section">
    <div class="home-copy">
          <header class="section-header">
              <h2 class="medium-title">Categories</h2>
          </header>
          <?php
            $course_category_terms = get_terms( array(
                'taxonomy'   => "course-cat",
            ));
          ?>
      <div class="owl-carousel owl-theme categories_slider">
        <?php 
          foreach($course_category_terms as $term){
            $thumbnail_id = get_term_meta($term->term_id,'course_cat_thumbnail_id',true);
            $cat_img = wp_get_attachment_image($thumbnail_id);

        ?>
        <div class="item">
          <div class="category">
            <figure class="image"><a href="<?php echo get_bloginfo('url').'/course-cat/'.$term->slug.''?>" target="_blank"><?php echo $cat_img;?></a></figure>
            <span class="title"><?php echo $term->name;?></span>
          </div>
        </div>
      <?php }?>
      </div>
    </div>
  </section>

  <!-- ======= Latest News Section ======= -->
  <section id="" class="latest-news home_latest_news">
    <div class="container">
      <div class="row gx-0">
        <div class="col-sm-12">
          <div class="header-heading">
            <h2>Editor's Desk</h2>
            <a href="<?php echo get_home_url();?>/editorsdesk" class="large-button">All Articles</a>
          </div>
        </div>
        <?php
        $args = array(
          'post_type' => 'post',
          'post_status' => 'publish',
          //'category_name' => 'Expert','Interview','Featured',
          'posts_per_page' => 10,
          'order'=>'DESC',
          'orderby' => 'publish_date',
        );
        $Query = new WP_Query( $args );
        if ($Query->have_posts()) : while ($Query->have_posts()) : $Query->the_post();
          if( $Query->current_post == 0 ) {
            ?>
            <div class="col-sm-12 col-lg-5 homeDetails-left">
              <div class="details-left">
               
              <?php if ( has_post_thumbnail() ) {
                $featured_image = get_the_post_thumbnail_url();

              ?>

              <img alt="featured image" title="featured image" src="<?php echo $featured_image; ?>" class="img-fluid" height="auto" width="auto">
            <?php } ?>
              <br/>
              <div class="news-date">
                <p><strong><?php echo get_the_date('M d, Y H:i'); ?></strong></p>
              </div>
              <div class="link">
                <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
              </div>
            
              <?php } if( $Query->current_post == 1 ) {?>
              
            </div>
            <div class="details-middle">
                <ul class="">
                  <li>
                    <p><strong><?php echo get_the_date('M d, Y H:i'); ?></strong></p>
                    <div class="link">
                      <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
                    </div>
                  </li>
                </ul>
              </div>
          </div>
        <?php  } endwhile; endif;?>
        <div class="col-sm-12 col-lg-7 home_news-leftspacing">
          <div class="col-sm-12 col-lg-6 mrg">
            <div class="details-middle">
              <ul class="">
                <?php  if ($Query->have_posts()) : $counter = 0; while ($Query->have_posts()) : $Query->the_post();
                  if ($counter <= 5) :
                  if( $Query->current_post != 0 &&  $Query->current_post != 1 && $Query->current_post <=10) {
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
          <div class="col-sm-12 col-lg-6 mrg newsRight_sect">
            <div class="details-middle">
              <ul class="">
                <?php if ($Query->have_posts()) : $counter1 = 0; while ($Query->have_posts()) : $Query->the_post();
                  if ($counter1 > 6) :
                  if( $Query->current_post != 0 &&  $Query->current_post != 1) {
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
    <section class="home-section student-testimonials">
      <div class="home-copy">
        <header class="section-header">
            <h2 class="large-title">Student Testimonials</h2>
            <a class="view-all" href="#!">View More</a>
        </header>
      <div class="owl-carousel owl-theme student_slider">
        <?php
        $args1 = array(
          'post_type' => 'testimonials',
          'post_status' => 'publish',

        );
        $Query1 = new WP_Query( $args1 );
        
        if ($Query1->have_posts()) : while ($Query1->have_posts()) : $Query1->the_post();
          $custom_fields = get_post_custom();
          $url = wp_get_attachment_url($custom_fields['image'][0]); 
        ?>
          <div class="item">
            <div class="course-card">
              <figure class="video">
                <img src="<?php echo $url;?>">
                <a class="play" href="#!"><span class="time">3:20</span></a>
              </figure>
              <div class="course-copy">
                <h2 class="course-title"><a href="#!"><?php echo the_content(); ?></a></h2>
                <footer class="course-footer">
                  <div class="left">
                    <div class="profile">
                      <span class="name"><?php echo $custom_fields['vibe_testimonial_author_name'][0] ?></span>
                      <span class="position"><?php echo $custom_fields['vibe_testimonial_author_designation'][0] ?></span>
                    </div>
                  </div>
                  <div class="right">
                    <a href="#!">
                    <svg class="share" xmlns="http://www.w3.org/2000/svg" width="25.445" height="19.4" viewBox="0 0 25.445 19.4"> <g id="Group_20744" data-name="Group 20744" transform="translate(0.205 0.2)" style="isolation: isolate"> <path id="Path_38322" data-name="Path 38322" d="M21.417,21a.53.53,0,0,1,.275.133l9.091,8.188a.724.724,0,0,1,.1.919.626.626,0,0,1-.1.114l-9.091,8.188a.52.52,0,0,1-.8-.12.723.723,0,0,1-.118-.392V34.746a18.89,18.89,0,0,0-4.705.389,17.55,17.55,0,0,0-9.127,4.7.518.518,0,0,1-.8-.062.733.733,0,0,1-.113-.634C8.4,30.71,15.625,26.694,20.778,25.094V21.655a.618.618,0,0,1,.564-.66A.446.446,0,0,1,21.417,21Zm.5,1.985v2.6a.645.645,0,0,1-.426.634C17,27.53,10.737,30.858,7.913,37.407a19.292,19.292,0,0,1,7.964-3.562,21.972,21.972,0,0,1,5.5-.4.621.621,0,0,1,.542.655v2.589l7.6-6.848Z" transform="translate(-6.003 -20.995)" stroke-width="0.4"/> </g> </svg>
                    </a>
                  </div>
                </footer>
              </div>
            </div>
          </div>
        <?php
          endwhile; endif;
        ?> 
        </div>
      </div>
  </section>
  </main><!-- End #main -->

  <?php
  get_footer(vibe_get_footer());
  ?>