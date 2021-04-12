<?php

/**
 * BuddyPress Notification Settings
 *
 * @package BuddyPress
 * @subpackage bp-default
 */

get_header( vibe_get_header() ); 

$profile_layout = vibe_get_customizer('profile_layout');

vibe_include_template("profile/top$profile_layout.php");  
?>
<div id="item-body">
    <div class="col-md-3 left_tabs">
        <div class="item-list-tabs no-ajax <?php if ( !bp_is_my_profile() ) echo 'notmyprofile'; ?>" id="subnav" role="navigation">
        	<ul class="left_tab">
        		<?php if ( bp_is_my_profile() ) bp_get_options_nav(); 
        		do_action('bp_course_get_options_sub_nav');
        		?>
        	</ul>
        </div><!-- .item-list-tabs -->
    </div>
    <div class="col-md-9">      
	    <section id="Popular-Courses" class="">
     

<div class="col-md-12 mrg space <?php echo $course_classes; ?>" data-aos="zoom-out" data-aos-delay="200">
          	<?php

                        $args_course_count = array(
                            'post_type' => 'course',
                            'post_status' => 'publish',
                        );
                        $Query_course_count = new WP_Query( $args_course_count );
                        $reCount = 0;
                        if ($Query_course_count->have_posts()) : while ($Query_course_count->have_posts()) : $Query_course_count->the_post();
                          $custom_fields_count = get_post_custom();
                          $recommended_courses_count = $custom_fields_count['vibe_recommended_course'][0];
                          if($recommended_courses_count == 'Y') {
                            $reCount++;
                          }
                        endwhile; endif;


		                $args_course = array(
		                    'post_type' => 'course',
		                    'post_status' => 'publish',
		                );
		                $Query_course = new WP_Query( $args_course );
                        if($reCount > 0){
		                if ($Query_course->have_posts()) : while ($Query_course->have_posts()) : $Query_course->the_post();
		                  $custom_fields = get_post_custom();
		                  $duration = $custom_fields['vibe_duration'][0];
		                  $age_limit = $custom_fields['vibe_course_age_group'][0];
		                  $category_array = get_the_terms( $post->ID, 'course-cat');
		                  $recommended_courses = $custom_fields['vibe_recommended_course'][0];
                          if($recommended_courses == 'Y') {
                  ?>
          <div class="course-box dotted-border">
            <div class="col-xs-2 col-sm-2 col-lg-2 pull-left mrg">
                <?php bp_course_avatar(); ?>
            </div>
            <div class="col-xs-10 col-sm-10 col-lg-10 pull-left mrg">
            	<div class="col-sm-12 col-lg-9 pull-left mrg">
              	<div class="middle-details">
                <?php 
                	$category_array = get_the_terms( $post->ID, 'course-cat');
                ?>
                <h6><?php echo $category_array[0]->name; ?></h6>
                <h2><?php bp_course_title(); ?></h2>
                <?php
                  $excerpt = get_post_field('post_excerpt', $post->ID);
                  if ( $excerpt != '' ) {
                    echo "<p>".wp_trim_words( $excerpt, 30, NULL )."</p>";
                  }
                  else{
                    $content = wp_trim_words( $post->post_content, 20 );
                    echo "<p>".esc_html( $content )."</p>";
                  }
                ?>
                <div class="col-xs-6 col-sm-6 col-lg-6 pull-left mrg">
                <p>Sessions</p>
                <?php if(get_post_meta($post->ID,'vibe_course_sessions',true) == '') { ?>
                	<h6>--</h6>
                <?php } else{ ?>
                	<!-- <h6><?php echo $courselesson;?></h6> -->
                	<h6><?php echo get_post_meta($post->ID,'vibe_course_sessions',true);?> <?php echo $duration;?> Days</h6>
                <?php }?>
                </div>
                <div class="col-xs-6 col-sm-6 col-lg-6 pull-right mrg">
                	<p>Age Group</p>
                	<?php if($age_limit) { ?>
                		<h6>--</h6>
                	<?php } else{ ?>
                		<h6><?php echo $age_limit;?></h6>
                	<?php }?>
                </div>
                
                <!-- <div class="learing-goals">
                    <div class="">
                        <div class="">
                            <div class="col-sm-12 col-lg-12 mrg">
                                <div class="heading">
                                    <h3>Objective</h3>
                                    <div class="list">
                                        <?php echo get_post_meta($post->ID,'vibe_learning_goals',true);?>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
              </div>
            </div>
            <div class="col-sm-12 col-lg-3 pull-left mrg">
                        <div class="col-lg-12 right-details pull-left mrg">
                            <div class="col-lg-12 course-button">
                                
                                <h6><?php the_course_price(); ?></h6>
                                <?php the_course_button(); ?> 
                            </div>
                            <div class="profilecou-instructor">
                                <div class="heading">
                                    <h3>Instructor</h3>
                                </div>
                                <?php
                                
                                $course_id=get_the_ID();
                                $post_tmp = get_post($course_id);
                                $author_id = $post_tmp->post_author;
                                $author_info = get_userdata($author_id);
                                $author_name = get_the_author_meta( 'display_name', $author_id );
                                $author_url = get_the_author_meta( 'user_url', $author_id );
                                $author_user_profile = get_avatar_url($author_id);
                                $author_company = get_the_author_meta( 'last_name', $author_id );
                                ?>
                                <div class="col-sm-12 col-lg-12 mrg">
                                    <div class="profile-content mt-auto">
                                        <div class="profile-img">
                                            <img src="<?php echo $author_user_profile; ?>" class="rounded-circle img-fluid" alt="">
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="profile-heading">
                                            <h3 class="name"><strong><?php echo $author_name; ?></strong></h3>
                                            <h4><?php echo $author_company; ?></h4>
                                        </div>
                                        <div class="clearfix"></div>
                                     </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
            </div>
            </div>
            <?php } endwhile; endif;}else{
                ?>
                <div class="course_nofound">
                    <h1>No Courses Found</h1>
                </div>
                <?php
            } ?>
        </div>
    </div>
</section>
	

</div><!-- #item-body -->

<?php do_action( 'bp_after_member_settings_template' ); ?>
		
<?php

vibe_include_template("profile/bottom.php");  

get_footer( vibe_get_footer() );  