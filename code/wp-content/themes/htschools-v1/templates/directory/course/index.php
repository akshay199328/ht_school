<?php

if ( ! defined( 'ABSPATH' ) ) exit;
$id= vibe_get_bp_page_id('course');

$title=get_post_meta($id,'vibe_title',true);

if(!isset($title) || !$title || (vibe_validate($title))){

?>
<section class="breadcrumbs background-breadcrumbs">
	<div class="innerheader-space"></div>
	<?php do_action('wplms_before_title'); ?>
    <div class="<?php echo vibe_get_container(); ?>">
        <div class="">
             <div class="">
                <div class="">
                	<?php 
                        $breadcrumbs=get_post_meta($id,'vibe_breadcrumbs',true);
                        if(!isset($breadcrumbs) || !$breadcrumbs || vibe_validate($breadcrumbs)){
                            vibe_breadcrumbs();
                        }
                        
                		if(is_tax()){
                			echo '<h2>';
                			single_cat_title();
                			echo '</h2>';
                			echo do_shortcode(category_description());
                		}else{
	                		echo '<h2>'.vibe_get_title($id).'</h2>';
	                		the_sub_title($id);
                		} 
                	?>
                </div>
            </div>
            <div class="col-md-3 col-sm-4">
            	<?php 
            		do_action('wplms_be_instructor_button');	
				?>
            </div>
        </div>
    </div>
</section>
<?php
}
?>
<section id="Popular-Courses" class="all_course_page">
	<div id="buddypress">
    	<div class="<?php echo vibe_get_container(); ?>">
			<?php do_action( 'bp_before_directory_course_page' ); ?>
			<!-- <div class="padder"> -->
				<?php do_action( 'bp_before_directory_course' ); ?>
				<div class="row">
					<!-- <div class="sticky_content"> -->
						<div class="col-lg-9 col-sm-12 mrg  top-pagination hide-progress">
							<form action="" method="post" id="course-directory-form" class="hide-search dir-form">

								<?php do_action( 'bp_before_directory_course_content' ); ?>

								<?php do_action( 'template_notices' ); ?>
								<div class="item-list-tabs" id="subnav" role="navigation">
									<ul>
										<?php do_action( 'bp_course_directory_course_types' ); ?>
										<li>
											<div class="dir-search" role="search">
												<?php bp_directory_course_search_form(); ?>
											</div>
										</li>
										<li class="switch_view">
											<div class="grid_list_wrapper">
												<a id="list_view" class="active"><i class="icon-list-1"></i></a>
												<a id="grid_view"><i class="icon-grid"></i></a>
											</div>
										</li>
										<li id="course-order-select" class="last filter">

											<label for="course-order-by"><?php _e( 'Order By:', 'vibe' ); ?></label>
											<select id="course-order-by">
												<?php
												?>
													<option value=""><?php _e( 'Select Order', 'vibe' ); ?></option>
													<option value="newest"><?php _e( 'Newly Published', 'vibe' ); ?></option>
													<option value="alphabetical"><?php _e( 'Alphabetical', 'vibe' ); ?></option>
													<option value="popular"><?php _e( 'Most Members', 'vibe' ); ?></option>
													<option value="rated"><?php _e( 'Highest Rated', 'vibe' ); ?></option>
													<option value="start_date"><?php _e( 'Start Date', 'vibe' ); ?></option>
												<?php do_action( 'bp_course_directory_order_options' ); ?>
											</select>
										</li>
									</ul>
								</div>
								<div id="course-dir-list" class="course dir-list">
								<?php locate_template( array( 'course/course-loop.php' ), true ); ?>
								</div><!-- #courses-dir-list -->

								<?php do_action( 'bp_directory_course_content' ); ?>

								<?php wp_nonce_field( 'directory_course', '_wpnonce-course-filter' ); ?>

								<?php do_action( 'bp_after_directory_course_content' ); ?>

							</form><!-- #course-directory-form -->
						</div>	
						<div class="col-lg-3 mrg adworks desktop-add right-adwork right_spacing">
			            	<?php
				              if ( is_active_sidebar( 'banner-1' ) ) : ?>
				              <?php dynamic_sidebar( 'banner-1' ); ?>      
				            <?php endif; ?>
			        	</div>
						<div class="col-md-12 col-sm-8 mrg">
							<?php
								$sidebar = apply_filters('wplms_sidebar','buddypress',$id);
				                if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : ?>
			               	<?php endif; ?>
						</div>
					<!-- </div> -->
					<?php do_action( 'bp_after_directory_course' ); ?>
				<!--</div> .padder -->
				<?php do_action( 'bp_after_directory_course_page' ); ?>
				<div class="col-md-12 col-sm-12">
					<?php
						$sidebar = apply_filters('wplms_sidebar','competitive-section');
			            if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : ?>
			       	<?php endif; ?>
				</div>
			</div><!-- #content -->
			
		</div>
	</div>
</section>
<?php