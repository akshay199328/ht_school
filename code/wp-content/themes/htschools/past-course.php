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
			$userIdentifier = "";

			if(isset($user->ID) && $user->ID > 0)
			{
			  $userIdentifier = $user->ID;
			}
			else if(isset($_COOKIE['PHPSESSID']))
			{
			  $userIdentifier = $_COOKIE['PHPSESSID'];
			}
			$finished_courses = bp_course_get_user_courses($user->ID,'course_evaluated');
			foreach($finished_courses as $courseId){
                $type = bp_course_get_user_course_status($user->ID,$courseId);
                if($type == 4){
                    $args['post__in'][]=$courseId;
                }
            }
            $paged = ( isset( $_GET['vp'] ) ) ? $_GET['vp'] : 1;
			if(!empty($finished_courses)){
				$query_args = array(
					'post_type'=>'course',
					'post_status'=>'publish',
					'posts_per_page'=>6,
					'post__in'=>$args['post__in'],
					'paged'=>$paged
				);
				$wp_query  = new WP_query($query_args);
				$courses = array();
				if($wp_query->have_posts()){
					$badges = bp_course_get_user_badges($user->ID);
					$certificates = bp_course_get_user_certificates($user->ID);
					while($wp_query->have_posts()){
						$wp_query->the_post();
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

						$custom_fields = get_post_custom();
						$duration = $custom_fields['vibe_validity'][0];
						$durationParameter = get_post_meta($post->ID,'vibe_course_validity_parameter',true);
						$age_limit = $custom_fields['vibe_course_age_group'][0];
						$category_array = get_the_terms( $post->ID, 'course-cat');
						$courseID = $post->ID;
						$courseslug=get_site_url().'/?p='.$courseID;
						$usersFavorites = wpfp_get_users_favorites();
						$coursePartner = "";

      					if(!is_array($usersFavorites)) $usersFavorites = array();

						$cb_course_id = get_post_meta($courseID,'celeb_school_course_id',true);
						if ($cb_course_id) {
							$coursePartner = "Celebrity School";
						}

						$aiws_course_id = get_post_meta($courseID,'aiws_program_id',true);
						if ($aiws_course_id) {
							$coursePartner = "AIWS";
						}
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
                                    <h6 class="custom-price" data-id="<?php echo $post->ID;?>"><?php the_course_price(); ?></h6>
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
                <input type="hidden" id="course_name_<?php echo $courseID;?>" value="<?php echo $post->post_title;?>">
                <input type="hidden" id="course_url_<?php echo $courseID;?>" value="<?php echo $courseslug;?>">
                <input type="hidden" id="course_category_<?php echo $courseID;?>" value="<?php echo $category_array[0]->name;?>">
                <input type="hidden" id="course_partner_<?php echo $courseID;?>" value="<?php echo $coursePartner;?>">
                <input type="hidden" id="category_id_<?php echo $courseID;?>" value="<?php echo $category_array[0]->term_id;?>">
                <input type="hidden" id="course_id_<?php echo $courseID;?>" value="<?php echo $courseID;?>">
                <input type="hidden" id="course_price_<?php echo $courseID;?>" value="0">
                <input type="hidden" id="course_tax_<?php echo $courseID;?>" value="0">
                <input type="hidden" id="age_group_<?php echo $courseID;?>" value="<?php echo $age_limit;?>">
                <input type="hidden" id="course_duration_<?php echo $courseID;?>" value="<?php echo get_post_meta($courseID, "vibe_validity", true);?>">
                <input type="hidden" id="session_duration_<?php echo $courseID;?>" value="<?php echo get_post_meta($courseID, "vibe_course_session_length", true);?>">
                <input type="hidden" id="wishlisted_course_<?php echo $courseID;?>" value="<?php echo in_array($courseID, $usersFavorites) ? '1' : '0';?>">
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
				<div class="pagination-links"><?php echo custom_pagination( $wp_query ); ?>
   	</section>
   	<input type="hidden" id="user_identifier" value="<?php echo $userIdentifier;?>">
   	<input type="hidden" id="timestamp" value="<?php echo date('c', time());?>">
   	<input type="hidden" id="session_source">
   	<input type="hidden" id="utm_tags">
</div>
<?php

vibe_include_template("profile/bottom.php");

get_footer( vibe_get_footer() );