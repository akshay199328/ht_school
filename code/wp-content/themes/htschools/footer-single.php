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
<div id="footerbottom">
    <div class="<?php echo vibe_get_container(); ?>">
        <div class="row">
            <div class="col-md-3">
                <h2 id="footerlogo">
                <?php
                    $url = apply_filters('wplms_logo_url',VIBE_URL.'/assets/images/logo.png','footer');
                    if(!empty($url)){
                ?>    

                    <a href="<?php echo vibe_site_url('','logo'); ?>"><img src="<?php  echo vibe_sanitizer($url,'url'); ?>" alt="<?php echo get_bloginfo('name'); ?>" /></a>
                <?php 
                    }
                ?>
                </h2>
                <?php $copyright=vibe_get_option('copyright'); echo (isset($copyright)?do_shortcode($copyright):'&copy; 2013, All rights reserved.'); ?>
            </div>
            <div class="col-md-9">
                <?php
                    $footerbottom_right = vibe_get_option('footerbottom_right');
                    if(isset($footerbottom_right) && $footerbottom_right){
                        echo '<div id="footer_social_icons">';
                        echo vibe_socialicons();
                        echo '</div>';
                    }else{
                        ?>
                        <div id="footermenu">
                            <?php
                                    $args = array(
                                        'theme_location'  => 'footer-menu',
                                        'container'       => '',
                                        'depth'           => 1,
                                        'menu_class'      => 'footermenu',
                                        'fallback_cb'     => 'vibe_set_menu',
                                    );
                                    wp_nav_menu( $args );
                            ?>
                        </div> 
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<footer id="footer" class="footer">
  <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-8 col-md-12 footer-info ">
            <div class="col-lg-5 col-md-12 footer-info mrg">
              <a href="index.html" class="logo d-flex align-items-center">
                <img src="http://testourcode.com/htschools-web/wp-content/uploads/2021/03/logo.png" class="img-fluid" alt="">
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
                <a href="#" class="twitter"><i class="bi bi-wifi bx bxl-wifi"></i></a>
              </div>
            </div>
          </div>
          <div class="col-sm-12 middle-detils footer-links">
            <div class="col-lg-12 col-12 mrg">
              <ul>
                  <li><a href="#">Our Courses</a></li>
                  <li><a href="#">News</a></li>
              </ul>
            </div>
            <div class="col-lg-12 col-12 about-links mrg">
              <ul>
                <li><a href="#">About Ht School</a></li>
                <li><a href="#">CareerMate</a></li>
                <li><a href="#">Code-a-thon</a></li>
                <li><a href="#">Scholarship</a></li>
                <li><a href="#">Olympiad</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-12 bottom-detils">
            <p class="copyright">Copyright © 2021 HTDSL. All rights reserved.</p>
            <div class="col-lg-12 col-12 links mrg">
              <ul>
                <li><a href="#">Terms and Conditions</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Use</a></li>
                <li><a href="#">Code of Ethics</a></li>
                <li><a href="#">Cancellation Policy</a></li>
                <li><a href="#">Disclaimer</a></li>
                <li><a href="#">Contact Us</a></li>
              </ul>
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