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
          	<?php

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
                global $wpdb;    
                $courses_with_types = apply_filters('wplms_usermeta_direct_query',$wpdb->prepare("SELECT posts.ID as id FROM {$wpdb->posts} AS posts LEFT JOIN {$wpdb->usermeta} AS meta ON posts.ID = meta.meta_key WHERE   posts.post_type   = %s AND   posts.post_status   = %s AND   meta.user_id   = %d AND   meta.meta_value > %d",'course','publish',$user->ID,time()));
                    $result = $wpdb->get_results($courses_with_types);
                    $active_courses = array();
                foreach($result as $course){
                    $active_courses[] = $course->id;
                    $args['post__in'][]=$course->id;
                    $type = bp_course_get_user_course_status($user->ID,$course->id);
                    $statuses[$course->id]= intval($type);
                }
                
                    $tag_array = array();
                    if(!empty($args['post__in'])){
                        foreach ($args['post__in'] as $post_id) {
                            if(!empty(get_the_terms($post_id, 'course-tag' ))){

                               foreach(get_the_terms($post_id, 'course-tag' ) as $tag) {
                                  $tag_array[] = $tag->term_id ;
                               }
                            }
                        }
                    }
                    if(!empty($tag_array)){
                        $specialtopic = $tag_array;
                    }
                    else{
                        $specialtopic = get_field('interest', 'user_' . $user->ID);
                    }
                    $coursearray = array();
                    if ($specialtopic) {
                      foreach($specialtopic as $tag) {
                        /*echo $tag->term_id . ' ';
                        $term_array[] = $tag->term_id; */
                        $ids = $wpdb->get_col( $wpdb->prepare( "SELECT object_id FROM $wpdb->term_relationships WHERE term_taxonomy_id = '".$tag."'") );
                        /* $ids = $wpdb->get_col( $wpdb->prepare( "SELECT object_id FROM $wpdb->term_relationships WHERE term_taxonomy_id = %d", '193' ) );
                        //$args['post__in'] = $ids;*/

                        foreach ($ids as $course_id) {
                            $coursearray[] = $course_id;
                        }
                      }
                        $args['post__in'] = $coursearray;
                        $unique_courses = array_unique($args['post__in']);
                        $recommended_courses = array_diff($unique_courses,$active_courses);
                        if( !empty( $recommended_courses ) ) {
                            $query_args = apply_filters('wplms_mycourses',array(
                            'post_type'=>'course',
                            'posts_per_page' => 2,
                            'post__in'=>$recommended_courses
                            ),$user->ID);
                            $Query_course = new WP_Query($query_args);
                        }
                    }
                    
                    if($Query_course != NULL){

                    if ($Query_course->have_posts()) : while ($Query_course->have_posts()) : $Query_course->the_post();
                          $custom_fields = get_post_custom();
                          $duration = $custom_fields['vibe_validity'][0];
                          $durationParameter = get_post_meta($post->ID,'vibe_course_validity_parameter',true);
                          $age_limit = $custom_fields['vibe_course_age_group'][0];
                          $category_array = get_the_terms( $post->ID, 'course-cat');
                          $courseID = $post->ID;
                          $courseslug=get_site_url().'/?p='.$courseID;
                          $usersFavorites = wpfp_get_users_favorites();
                          $coursePartner = "";

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
                              <h6><?php echo $category_array[0]->name;?></h6>
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
                                <?php if($age_limit == ''){  ?>
                                    <h6>--</h6>
                                <?php } else{ ?>
                                    <h6><?php echo $age_limit;?><span> yrs</span></h6>
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
        <?php  endwhile; else: ?>
            <div class="empty_cart_div">
                <div class="empty_course_image"></div>
                <h4>No recommended courses as yet! Check out all our fun courses!</h4>
                <a href="<?php echo get_home_url();?>/courses/"><button class="empty_btn">Explore Courses</button></a>
            </div>
        <?php endif; } else{
                ?>
                <div class="empty_cart_div">
                    <div class="empty_course_image"></div>
                    <h4>No recommended courses as yet! Check out all our fun courses!</h4>
                    <a href="<?php echo get_home_url();?>/courses/"><button class="empty_btn">Explore Courses</button></a>
                </div>
            <?php } ?>
          <input type="hidden" id="user_identifier" value="<?php echo $userIdentifier;?>">
          <input type="hidden" id="timestamp" value="<?php echo date('c', time());?>">
          <input type="hidden" id="session_source">
          <input type="hidden" id="utm_tags">
        </section>
	

</div><!-- #item-body -->

<?php do_action( 'bp_after_member_settings_template' ); ?>
		
<?php

vibe_include_template("profile/bottom.php");  

get_footer( vibe_get_footer() );  