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
			<?php do_action( 'bp_after_member_settings_template' ); 
			$user = wp_get_current_user();
            // print_r($user->user_login);
            //print_r($user->ID);
			$finished_courses = bp_course_get_user_courses($user->ID,'course_evaluated');
			foreach($finished_courses as $courseId){
                $type = bp_course_get_user_course_status($user->ID,$courseId);
                if($type == 4){    
                    $args['post__in'][]=$courseId;
                }
            }
			if(!empty($finished_courses)){
				$query_args = array(
					'post_type'=>'course',
					'post_status'=>'publish',
					'post__in'=>$args['post__in']
				);
				$results  = new WP_query($query_args);
				$courses = array();
				if($results->have_posts()){
					$badges = bp_course_get_user_badges($user->ID); 
					$certificates = bp_course_get_user_certificates($user->ID);
					while($results->have_posts()){
						$results->the_post();
						$marks = bp_course_get_marks($user->ID,get_the_ID());
						$has_certificate = (!empty($certificates) && in_Array(get_the_ID(),$certificates))?1:0;
						$has_badge = (!empty($badges) && in_array(get_the_ID(),$badges)?1:0);

						$grade = array(
							'label'=>'',
							'key'=>'',
							'value'=>$marks
						);
						if($has_certificate){
							$grade['label']= _x('Passed','certificate status','wplms');
							$grade['key']= 'passed';
						}
						if($has_badge){
							$grade['label'] .= ' '._x('Excelled','certificate status','wplms');
							$grade['key'] .= 'excel';
						}
						$courses[]=array(
							'id'=>get_the_ID(),
							'img'=>get_the_post_thumbnail_url(),
							'title'=>get_the_title(),
							'instructor'=>apply_filters('wplms_course_instructor',get_the_author_id()),
							'certificate'=>$has_certificate,
							'badge'=>$has_badge,
							'grade'=>$grade,
						);
							$custom_fields = get_post_custom();
		                    $duration = $custom_fields['vibe_duration'][0];
		                    $session = $custom_fields['vibe_course_sessions'][0];
						?>
		
            	 	<div class="course-box">
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
			                <div class="col-lg-7 duration mrg">
				                <div class="pull-left">
				                  <p>Duration</p>
	                              <?php if($duration == '') { ?>
	                              <h6>--</h6>
	                              <?php } else{ ?>
	                              <h6><?php if($duration != ''){echo $duration; }?><span><?php if($duration != ''){echo ' Days'; }?> </span></h6>
	                              <?php }?>
				                </div>
				                <div class="pull-right">
				                	<p>Age Group</p>
				                	<?php if(get_post_meta($post->ID,'vibe_course_age_group',true) == '') { ?>
				                		<h6>--</h6>
				                	<?php } else{ ?>
				                		<h6><?php echo get_post_meta($post->ID,'vibe_course_age_group',true);?><span> yrs</span></h6>
				                	<?php }?>
				                </div>
				            </div>
			                        </div>
			                    </div>
			                    <div class="col-sm-12 col-lg-3 pull-left mrg">
			                        <div class="col-lg-12 right-details pull-left mrg">
			                            <div class="col-lg-12 course-button">
			                                <h6><?php the_course_price(); ?></h6>
			                                <?php the_course_button(); ?> 
			                                <!-- <a href="<?php echo get_bloginfo('url')?>/certificates/my-certificate/?c=<?php echo $post->ID?>&u=<?php echo $user->ID?>">Certificate</a> -->
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
			                                            <img src="<?php echo $author_user_profile; ?>" class="rounded-circle img-fluid" alt="Author User Profile" title="Author User Profile">
			                                        </div>
			                                        <div class="clearfix"></div>
			                                        <div class="profile-heading">
			                                            <h3 class="name"><strong><?php echo $author_name; ?></strong></h3>
			                                            <h4><?php echo $author_company; ?></h4>
			                                        </div>
			                                        <div class="clearfix"></div>
													
			                                    </div>
												<div class="download">
														<?php user_certificate($post->ID,$user->ID);?>
												</div>
			                                </div>
			                            </div>
			                </div>
			            </div>
			        
			    		</div>
			 		</div>
				<?php	}
				}else{
					echo '<h1>You have not completed any course till now</h1>';
				}
				}
				else{
					echo '<h1>You have not completed any course till now</h1>';
				}

				?>
        </div>
   	</section>
</div>
<?php

vibe_include_template("profile/bottom.php");  

get_footer( vibe_get_footer() );  