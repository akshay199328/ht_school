<?php
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
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-12 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Learning for everyone</h1>
          <p data-aos="fade-up" data-aos-delay="400">supporting education through our products,</p>
          <!-- <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Get Started</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div> -->
        </div>
        <div class="col-lg-12 " data-aos="zoom-out" data-aos-delay="200">
          <div class="col-lg-9 mrg">
            <div class="hero-list">
              <ul>
                  <li>
                    <h6>Hindustan Times</h>
                    <h5>Scholarship Programme</h5>
                    <p>We seek to recognise and reward</p>
                    <a href="#">Get Started</a>
                  </li>
                  <li>
                    <h6>Hindustan Times</h>
                    <h5>CODE-A-THON</h5>
                    <p>an ideal platform for the students to learn coding and showcase the</p>
                    <a href="#">Get Started</a>
                  </li>
                  <li>
                    <h6>Hindustan Times</h>
                    <h5>CAREER MATE</h5>
                    <p>An initiative to help students across the nation to make an </p>
                    <a href="#">Get Started</a>
                  </li>
                  <li>
                    <h6>Hindustan Times</h>
                    <h5>Olympiad</h5>
                    <p>Identified as one of the world’s biggest Olympiads with a legacy of </p>
                    <a href="#">Get Started</a>
                  </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 mrg adworks">

            <img src="assets/img/adworks.png" class="img-responsive" alt="">
          </div>
          
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

<main id="main">
<!-- ======= Features Section ======= -->
  <section id="Popular-Courses" class="Popular-Courses">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-3">
             <header class="section-header">
                <h2>Popular Courses</h2>
                <p>We offer classes for all ages throughout the year.</p>
                <a href="#" class="exlore-link">Explore all Courses</a>
            </header>
            <div class="adworks">
              <img src="assets/img/adwork-2.jpg" class="img-responsive" alt="img-responsive">
            </div>
          </div>
          <div class="col-lg-9 mt-5 mt-lg-0 d-flex mrg">
            <div class="row align-self-center gy-4">
                <div class="col-md-12" data-aos="zoom-out" data-aos-delay="200">
                  <div class="course-box d-flex align-items-center">
                    <div class="col-lg-2 col-sm-12 mrg">
                        <img src="assets/img/data-science.jpg" class="img-responsive">
                    </div>
                    <div class="col-lg-8 col-sm-12 mrg">
                      <div class="middle-details">
                        <h6>Business Analytics</h6>
                        <h2>Data Science Masterclass for<br/> Non-Programmers</h2>
                        <p class="text-ellipsis">Master the skills to get computers to understand, process, and manipulate human language. Build models on real data, and get hands-on experience with sentiment analysis, machine translation, and</p>
                        <div class="col-lg-5 duration">
                          <div class="pull-left">
                            <p>Duration</p>
                            <h6>24 Sessions <span>60 days </span></h6>
                          </div>
                          <div class="pull-right">
                            <p>Age Limit</p>
                            <h6>7 - 12 yrs</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2 col-sm-12 mrg">
                      <div class="col-lg-12 right-details">
                        <div class="col-lg-12 share-icon">
                          <i class="bi bi-share"></i>
                        </div>
                        <div class="col-lg-12 course-button">
                            <h6>₹ 1,400</h6>
                            <a href="#" class="course-btn">Join Course</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12" data-aos="zoom-out" data-aos-delay="300">
                  <div class="course-box d-flex align-items-center">
                    <div class="col-lg-2 col-sm-12 mrg">
                        <img src="assets/img/freelance.jpg" class="img-responsive">
                    </div>
                    <div class="col-lg-8 col-sm-12 mrg">
                      <div class="middle-details">
                        <h6>Freelance & Entrepreneurship</h6>
                        <h2>Strategies for Launching Your<br>Creative Career</h2>
                        <p class="text-ellipsis">In this class Martina Flor, lettering artist and designer, unravels the nooks and crannies of being self-employed, providing practical tools and useful tips to start your own studio</p>
                        <div class="col-lg-5 duration">
                          <div class="pull-left">
                            <p>Duration</p>
                            <h6>24 Sessions <span>60 days </span></h6>
                          </div>
                          <div class="pull-right">
                            <p>Age Limit</p>
                            <h6>7 - 12 yrs</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2 col-sm-12 mrg">
                      <div class="col-lg-12 right-details">
                        <div class="col-lg-12 share-icon">
                          <i class="bi bi-share"></i>
                        </div>
                        <div class="col-lg-12 course-button">
                            <h6>₹ 1,400</h6>
                            <a href="#" class="course-btn">Join Course</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12" data-aos="zoom-out" data-aos-delay="400">
                  <div class="course-box d-flex align-items-center">
                    <div class="col-lg-2 col-sm-12 mrg">
                        <img src="assets/img/online-marketing.jpg" class="img-responsive">
                    </div>
                    <div class="col-lg-8 col-sm-12 mrg">
                      <div class="middle-details">
                        <h6>Online Marketing</h6>
                        <h2>E-Com Essentials: How to Start<br/>a Successful Online Business</h2>
                        <p class="text-ellipsis">Join BigCommerce’s Tracey Wallace for this one-hour class where you’ll dive into all the essentials and explore how to identify marketable products, create a store, and build a successful marketing strategy to drive traffic and sales. Tracey breaks down the process of getting started into a manageable step-by-step process that you can easily follow. You’ll learn how to:</p>
                        <div class="col-lg-5 duration">
                          <div class="pull-left">
                            <p>Duration</p>
                            <h6>24 Sessions <span>60 days </span></h6>
                          </div>
                          <div class="pull-right">
                            <p>Age Limit</p>
                            <h6>7 - 12 yrs</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2 col-sm-12 mrg">
                      <div class="col-lg-12 right-details">
                        <div class="col-lg-12 share-icon">
                          <i class="bi bi-share"></i>
                        </div>
                        <div class="col-lg-12 course-button">
                            <h6>₹ 1,400</h6>
                            <a href="#" class="course-btn">Join Course</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>

        </div> <!-- / row -->

      </div>

    </section><!-- End Features Section -->
    <section id="" class="Sci-fair">
      <div class="container">
        <div class="row gx-0">
          <div class="col-lg-12 mrg">
            <div class="col-sm-6 pull-left">
                <img src="assets/img/vivo.png" class="img-responsive"/>
                <img src="assets/img/atamnirbhar.png" class="img-responsive"/>
            </div>
            <div class="col-sm-6 pull-right">
                <img src="assets/img/PowerdBy.png" class="img-responsive"/>
            </div>
          </div>
          <div class="col-lg-12 mrg">
            <div class="Sci-heading" data-aos="zoom-out" data-aos-delay="200">
                <h1>National School<br/>Science Fair</h1>
            </div>
            <div class="Sci-para" data-aos="zoom-out" data-aos-delay="300">
                <p>An initiative dedicated to inspire a keen interest in science,</p>
                <a href="#" class="btn find-btn">Find out More</a>
            </div>
          </div>
        </div>
      </div>
    </section>
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
            <div class="col-sm-12 col-lg-4">
                <div class="details-left">
                  <?php
                    if ( has_post_thumbnail() ) {
                    ?>
                      <p><strong><?php echo get_the_date('M d, Y H:i'); ?></strong></p>
                      <?php $featured_image = get_the_post_thumbnail();
                      echo $featured_image;
                    
                  ?>
                  <div class="link">
                      <a href="#"><?php echo get_the_title() ?></a>
                  </div>
                  <?php 
                  } ?>
                </div>
            </div>
            <div class="col-sm-12 col-lg-8">
              <div class="details-middle">
                <!-- <div class="popularNew-heading">
                  <h5>Popular on<br/>HT School News</h5>
                </div> -->
                <ul>
                  <?php
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'category_name' => 'News',
                        'posts_per_page' => 5,
                    );
                    $Query = new WP_Query( $args );
                    if ($Query->have_posts()) : while ($Query->have_posts()) : $Query->the_post();
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
            <div class="col-lg-12 center">
                <img src="assets/img/adwork-3.png" />
            </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
            <div class="col-lg-12 infograph">
              <div class="heading">
                <h4>Infographics</h4>
              </div>
              <div class="details">
                  <div class="co-sm-12 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                      <img src="assets/img/fun-fantasy.jpg" class="img-responsive" />
                      <div class="content">
                        <p>DELHI Oct 13, 2020 20:04 IST</p>
                        <h3>Riveting Tales Of Fun And Fantasy</h3>
                      </div>
                  </div>
                  <div class="co-sm-12 col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                      <img src="assets/img/activities.jpg" class="img-responsive" />
                      <div class="content">
                        <p>DELHI Oct 13, 2020 20:04 IST</p>
                        <h3>5 Activities To Teach Your Kids About Money</h3>
                      </div>
                  </div>
                  <div class="co-sm-12 col-lg-4" data-aos="zoom-in" data-aos-delay="300">
                      <img src="assets/img/heritage-sites.jpg" class="img-responsive" />
                      <div class="content">
                        <p>DELHI Oct 13, 2020 20:04 IST</p>
                        <h3>Decoding UNESCO World Heritage Sites</h3>
                      </div>
                  </div>
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
                    <img src="<?php echo $url; ?>" class="testimonial-img img-responsive" alt="" >
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
            <img src="assets/img/adwork-4.jpg" />
        </div>
      </div>
      <!-- End Testimonials Section -->
    </section>
</main><!-- End #main -->

<?php
get_sidebar();
get_footer();
