<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
    <?php get_template_part( 'footer-widget' ); ?>
	<footer id="colophon" class="footer site-footer <?php echo wp_bootstrap_starter_bg_class(); ?>" role="contentinfo">
	    <div class="footer-top">
	      <div class="container">
	        <div class="row gy-4">
	          <div class="col-lg-5 col-md-12 footer-info">
	            <a href="index.html" class="logo d-flex align-items-center">
	              <!-- <img src="assets/img/logo.png" alt=""> -->
	              <h1>Footer</h1>
	            </a>
	          </div>
	        </div>
	      </div>
	    </div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>