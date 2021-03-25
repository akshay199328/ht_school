<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<footer>
    <div class="<?php echo vibe_get_container(); ?>">
        <?php if(vibe_get_option('offload_scripts')){echo '<div class="footertop">';} ?>
            <div class="row">
                <?php if(!vibe_get_option('offload_scripts')){echo '<div class="footertop">';} ?>
                <?php 
                            if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar('topfootersidebar') ) : ?>
                <?php endif; ?>
            </div>
        </div>
    </div> 
    <div id="scrolltop">
        <a><i class="vicon vicon-angle-double-up"></i><span><?php _e('top','vibe'); ?></span></a>
    </div>
</footer>
<!-- <div id="footerbottom" class="footer-top footer">
    <div class="<?php echo vibe_get_container(); ?>">
        <div class="row">
            <div class="col-lg-5 col-md-12 footer-info">
                <a href="index.html" class="logo d-flex align-items-center">
                  <h1>Footer</h1>
                </a>
            </div>
        </div>
    </div>
</div> -->
z
<footer id="footer" class="footer">
  <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-8 col-md-12 footer-info ">
            <div class="col-lg-5 col-md-12 footer-info mrg">
              <a href="index.html" class="logo d-flex align-items-center">
                <img src="<?php echo get_template_directory_uri()?>/assets/images/footer-logo.png" class="img-fluid" alt="">
                <!-- <span>FlexStart</span> -->
              </a>
            </div>
            <div class="col-lg-12 col-md-12 footer-info mrg">
              <p>Supporting education through our products,</p>
            </div>
          </div>

          <div class="col-sm-12 col-lg-4 social-links mrg">
            <div class="col-sm-8 col-lg-8 col-md-8 pull-left mrg">
              
              <div class="socio-list">
                <span class="social-heading">Follow us on</span>
                <a href="#" class="twitter"><i class="bi bi-linkedin bx bxl-linkedin"></i></a>
                <a href="#" class="facebook"><i class="bi bi-twitter"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i></a>
              </div>
            </div>
            <div class="col-sm-4 col-lg-4 col-md-4 pull-right mrg">
              
              <div class="socio-list">
                <span class="social-heading">RSS Feed</span>
                <a href="<?php bloginfo('rss2_url'); ?>" target="_blank" class="twitter"><i class="bi bi-wifi bx bxl-wifi"></i></a>
              </div>
            </div>
          </div>
          <div class="col-sm-12 middle-detils footer-links">
            <div class="col-lg-12 col-12 mrg">
              <ul>
                  <li><a href="<?php echo get_site_url();?>/all-courses">Our Courses</a></li>
                  <li><a href="<?php echo get_site_url();?>/news">News</a></li>
              </ul>
            </div>
            <div class="col-lg-12 col-12 about-links mrg">
              <ul>
                <li><a href="#">About Ht School</a></li>
                <li><a href="https://www.hindustancareermate.com/" target="_blank">CareerMate</a></li>
                <li><a href="https://www.htcodeathon.com/" target="_blank">Code-a-thon</a></li>
                <li><a href="https://www.htscholarship.in/" target="_blank">Scholarship</a></li>
                <li><a href="https://www.hindustanolympiad.in/" target="_blank">Olympiad</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-12 bottom-detils">
          <p class="copyright">Copyright © 2021 HTDSL. All rights reserved.</p>
            <div class="col-lg-12 col-12 links mrg">
              <div id="footermenu">
                            <?php
                                    $args = array(
                                        'theme_location'  => 'footer-menu',
                                        'container'       => '',
                                        'depth'           => 1,
                                        'menu_class'      => '',
                                        'fallback_cb'     => 'vibe_set_menu',
                                    );
                                    wp_nav_menu( $args );
                            ?>
                        </div> 
            </div>
          </div>
      </div>
    </div>
</footer>
</div><!-- END PUSHER -->
</div><!-- END MAIN -->
	<!-- SCRIPTS -->
<?php
wp_footer();
?> 
</body>
</html>