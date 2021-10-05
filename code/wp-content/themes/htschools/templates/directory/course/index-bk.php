<?php

if ( ! defined( 'ABSPATH' ) ) exit;
$id= vibe_get_bp_page_id('course');

$title=get_post_meta($id,'vibe_title',true);

if(!isset($title) || !$title || (vibe_validate($title))){

?>
<section class="course-listing" id="title">
	<div class="innerheader-space"></div>
	<?php do_action('wplms_before_title'); ?>
    <div class="<?php echo vibe_get_container(); ?>">
        <div class="">
             <div class="col-md-12 col-sm-12 mrg">
                <div class="pagetitle breadcrumbs background-breadcrumbs">
                	<?php 
                        $breadcrumbs=get_post_meta($id,'vibe_breadcrumbs',true);
                        if(!isset($breadcrumbs) || !$breadcrumbs || vibe_validate($breadcrumbs)){
                            vibe_breadcrumbs();
                        }
                        
                		if(is_tax()){
                			echo '<h1>';
                			single_cat_title();
                			echo '</h1>';
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
<section id="content">
	<div id="buddypress">
    <div class="<?php echo vibe_get_container(); ?>">

	<?php do_action( 'bp_before_directory_course_page' ); ?>

		<div class="padder">

		<?php do_action( 'bp_before_directory_course' ); ?>
		<div class="row">
			<div class="col-md-12 col-sm-12 mrg">
				<form action="" method="post" id="course-directory-form" class="dir-form">

					<?php do_action( 'bp_before_directory_course_content' ); ?>

					<?php do_action( 'template_notices' ); ?>

					<!-- <div class="item-list-tabs" role="navigation">
						<ul>
							<li class="selected" id="course-all"><a href="<?php echo trailingslashit( bp_get_root_domain() . '/' . bp_get_course_root_slug() ); ?>"><?php printf( __( 'All Courses <span>%s</span>', 'vibe' ), bp_course_get_total_course_count( ) ); ?></a></li>
							<?php if ( is_user_logged_in() ) : ?>
								<li id="course-personal"><a href="<?php echo trailingslashit( bp_loggedin_user_domain() . bp_get_course_slug()  ); ?>"><?php printf( __( 'My Courses <span>%s</span>', 'vibe' ), bp_course_get_total_course_count_for_user( bp_loggedin_user_id() ) ); ?></a></li>
								<?php if(is_user_instructor()): ?>
									<li id="course-instructor"><a href="<?php echo trailingslashit( bp_loggedin_user_domain() . bp_get_course_slug()  ); ?>"><?php printf( __( 'Instructing Courses <span>%s</span>', 'vibe' ), bp_course_get_instructor_course_count_for_user( bp_loggedin_user_id() ) ); ?></a></li>
								<?php endif; ?>		
							<?php endif; ?>
							<?php do_action( 'bp_course_directory_filter' ); ?>
						</ul>
					</div> -->
					<!-- .item-list-tabs -->
					<div id="course-dir-list" class="course dir-list">
					<?php locate_template( array( 'course/course-loop.php' ), true ); ?>
					</div><!-- #courses-dir-list -->

					<?php do_action( 'bp_directory_course_content' ); ?>

					<?php wp_nonce_field( 'directory_course', '_wpnonce-course-filter' ); ?>

					<?php do_action( 'bp_after_directory_course_content' ); ?>

				</form><!-- #course-directory-form -->
			</div>	
			<div class="col-md-12 col-sm-8 mrg">
				<?php
					$sidebar = apply_filters('wplms_sidebar','buddypress',$id);
	                if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : ?>
               	<?php endif; ?>
			</div>
		</div>	

		<?php do_action( 'bp_after_directory_course' ); ?>

		</div><!-- .padder -->
	
	<?php do_action( 'bp_after_directory_course_page' ); ?>
</div><!-- #content -->
	<div class="col-md-12 col-sm-12">
		<?php
			$sidebar = apply_filters('wplms_sidebar','competitive-section');
            if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : ?>
       	<?php endif; ?>
	</div>
</div>
</section>
<?php
