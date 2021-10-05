<?php

/**
 * BuddyPress Active Courses
 *
 * @package BuddyPress
 * @subpackage bp-default
 */

get_header( vibe_get_header() );

$profile_layout = vibe_get_customizer('profile_layout');

vibe_include_template("profile/top$profile_layout.php");
/*do_action( 'bp_before_member_course_content' ); */
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
            $courses_with_types = apply_filters('wplms_usermeta_direct_query',$wpdb->prepare("SELECT posts.ID as id FROM {$wpdb->posts} AS posts LEFT JOIN {$wpdb->usermeta} AS meta ON posts.ID = meta.meta_key WHERE   posts.post_type   = %s AND   posts.post_status   = %s AND   meta.user_id   = %d",'course','publish',$user->ID));
            $result = $wpdb->get_results($courses_with_types);
            foreach($result as $course){

                $type = bp_course_get_user_course_status($user->ID,$course->id);
                if($type != 4){
                    $args['post__in'][]=$course->id;
                }
                $statuses[$course->id]= intval($type);
            }

            $paged = ( isset( $_GET['vp'] ) ) ? $_GET['vp'] : 1;
            if(!empty($args['post__in'])){
                $query_args = apply_filters('wplms_mycourses',array(
                    'post_type'=>'course',
                    'post__in'=>$args['post__in'],
                    'posts_per_page'=>6,
                    'paged'=>$paged
                ),$user->ID);

                $wp_query = new WP_Query($query_args);

            if(!empty($wp_query)){
            ?>

                <section id="Popular-Courses" class="">


                    <?php while($wp_query->have_posts()){
                        $wp_query->the_post();
                        global $post;
                        $custom_fields = get_post_custom();
                        $duration = $custom_fields['vibe_validity'][0];
                         $course_type="";
            $course_type = $custom_fields['vibe_course_type'][0];

            $str1="LIVE CLASSES";
            $str2="BLENDED";
            $str3="SELF PACED";
        
    if(strcmp($str2, $course_type)==0){
       $badge_class = "blue";
    }
    elseif(strcmp($str3, $course_type)==0){
       $badge_class = "green";
    }
    elseif(strcmp($str1, $course_type)==0){
       $badge_class = "red";
    }
    else{
      $badge_class = "";
    } 
                        $durationParameter = get_post_meta($post->ID,'vibe_course_validity_parameter',true);
                        $session = $custom_fields['vibe_course_sessions'][0];
                        $age_limit = $custom_fields['vibe_course_age_group'][0];
                        $category_array = get_the_terms( $post->ID, 'course-cat');
                        $excerpt = get_post_field('post_excerpt', $post->ID);
                        $courseID = $post->ID;
                        $courseslug=get_the_permalink($courseID);
                        $usersFavorites = wpfp_get_users_favorites();
                        $user = wp_get_current_user();

                        if(!is_array($usersFavorites)) $usersFavorites = array();

                        $coursePartner = "";

                        $cb_course_id = get_post_meta($courseID,'celeb_school_course_id',true);
                        if ($cb_course_id) {
                          $coursePartner = "Celebrity School";
                        }

                        $aiws_course_id = get_post_meta($courseID,'aiws_program_id',true);
                        if ($aiws_course_id) {
                          $coursePartner = "AIWS";
                        }
                        $progress = bp_course_get_user_progress($user->id,$post->ID);
                        if($statuses[$post->ID]>2){$progress = 100;}
                        $custom_fields = get_post_custom();
                        $duration = $custom_fields['vibe_validity'][0];
                        $durationParameter = get_post_meta($post->ID,'vibe_course_validity_parameter',true);
                        $session = $custom_fields['vibe_course_sessions'][0];
                    ?>
                <div class="col-md-12 mrg space <?php echo $course_classes; ?>" data-aos="zoom-out" data-aos-delay="200">
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
            <div class="course-box mycourse_box">
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
                                 <?php if (!empty($course_type)){ ?>                            
                <span class="badge <?php echo $badge_class;?>"><?php echo $course_type; ?></span> 
            <?php }?>
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
                            <tr class="table_progressbar">
                                <td class="right-details">
                                    <?php
                                        $course_progress = empty($progress)?0:intval($progress);
                                    ?>
                                    <?php
                                        echo '<div class="course_home_progress" data-id="'.$post->ID.'"><div><span></span><span class="progress_value">'.$course_progress.' % Complete</span></div><div class="progress course_progress"><div class="bar animate stretchRight load" style="width: '.$course_progress.'%; background: #00D98E;"></div></div></div>';
                                    ?>
                                </td>
                            </tr>
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
                                                <h4><?php // echo $author_company; ?></h4>
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
        <?php }?> <div class="pagination-links"><?php echo custom_pagination( $wp_query ); ?></div>
    </div>
    <input type="hidden" id="user_identifier" value="<?php echo $userIdentifier;?>">
    <input type="hidden" id="timestamp" value="<?php echo date('c', time());?>">
    <input type="hidden" id="session_source">
    <input type="hidden" id="utm_tags">
</section>
    <?php } else{ ?>
        <div class="empty_cart_div">
            <div class="empty_course_image"></div>
            <h4>No Courses here! You're missing out on some cool stuff!</h4>
            <a href="<?php echo get_home_url();?>/courses/"><button class="empty_btn">Explore Courses</button></a>
        </div>
    <?php } }else{ ?>
        <div class="empty_cart_div">
            <div class="empty_course_image"></div>
            <h4>No Courses here! You're missing out on some cool stuff!</h4>
            <a href="<?php echo get_home_url();?>/courses/"><button class="empty_btn">Explore Courses</button></a>
        </div>
    <?php }
    ?>

</div><!-- #item-body -->

<?php do_action( 'bp_after_member_settings_template' ); ?>
<?php

vibe_include_template("profile/bottom.php");

get_footer( vibe_get_footer() );