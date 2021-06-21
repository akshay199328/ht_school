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
		                    $duration = $custom_fields['vibe_validity'][0];
		                    $durationParameter = get_post_meta($post->ID,'vibe_course_validity_parameter',true);
		                    $session = $custom_fields['vibe_course_sessions'][0];
						?>
		
            	<div class="col-md-12 mrg space <?php echo $course_classes; ?>" data-aos="zoom-out" data-aos-delay="200">
            	 	<div class="course-box">
                <table width="100%">
                  <tbody>
                    <tr>
                      <td class="tableTd_left">
                          <?php bp_course_avatar(); ?>
                      </td>
                      <td class="middle-details tableTd_middle">
                        <table width="100%">
	                        <tr>
	                            <td>
	                                <?php 
				                        $category_array = get_the_terms( $post->ID, 'course-cat');
				                    ?>
				                    <h6><?php echo $category_array[0]->name; ?></h6>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                              <h2><?php bp_course_title(); ?></h2>
	                            </td>
	                        </tr>
                          	<tr class="course_para">
	                            <td>
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
	                            </td>
                          	</tr>
                          <tr class="duration">
                            <td>
                              	<p>Duration</p>
                                <?php if($duration == '') { ?>
                                <h6>--</h6>
                                <?php } else{ ?>
                                <h6><?php if($duration != ''){echo $duration; }?><span><?php if($durationParameter != ''){echo ' '.calculate_duration($durationParameter); }?> </span></h6>
                                <?php }?>
                            </td>
                            <td>
                              	<p>Age Group</p>
		                        <?php if(get_post_meta($post->ID,'vibe_course_age_group',true) == '') { ?>
		                        <h6>--</h6>
		                        <?php } else{ ?>
		                            <h6><?php echo get_post_meta($post->ID,'vibe_course_age_group',true);?><span> yrs</span></h6>
		                        <?php }?>
                            </td>
                          </tr>
                        </table>
                      </td>
                      <td class="tableTd_right right-details">
                        <table width="100%" class="button_table">
                            <tr class="border_button">
                                <td class="course-button">
                                    <h6><?php the_course_price(); ?></h6>
                                      <?php the_course_button(); ?> 
                                </td>
                            </tr>
                            <tr class="profilecou-instructor">
                                <td>
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
                                </td>
                            </tr>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
                
            </div>
        	</div>
				<?php	}
				}else{ ?>
					<div class="empty_cart_div">
		                <div class="empty_course_image"></div>
		                <h4>No courses completed as yet, but we're sure you're on your way to excellence!</h4>
		                <a href="<?php echo get_home_url();?>/courses/"><button class="empty_btn">Explore Courses</button></a>
		            </div>

				<?php }
				}
				else{?>
					<div class="empty_cart_div">
		                <div class="empty_course_image"></div>
		                <h4>No courses completed as yet, but we're sure you're on your way to excellence!</h4>
		                <a href="<?php echo get_home_url();?>/courses/"><button class="empty_btn">Explore Courses</button></a>
		            </div>
				<?php }

				?>
   	</section>
</div>
<?php

vibe_include_template("profile/bottom.php");  

get_footer( vibe_get_footer() );  