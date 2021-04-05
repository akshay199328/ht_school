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
        	<ul class="">
        		<?php if ( bp_is_my_profile() ) bp_get_options_nav(); 
        		do_action('bp_course_get_options_sub_nav');
        		?>
        	</ul>
        </div><!-- .item-list-tabs -->
    </div>

    <div class="col-md-9">      
      	<?php
            $user = wp_get_current_user();
            // print_r($user->user_login);
            // print_r($user->ID);
            
            global $wpdb;    
            $courses_with_types = apply_filters('wplms_usermeta_direct_query',$wpdb->prepare("
            SELECT posts.ID as id
            FROM {$wpdb->posts} AS posts
            LEFT JOIN {$wpdb->usermeta} AS meta ON posts.ID = meta.meta_key
            WHERE   posts.post_type   = %s
            AND   posts.post_status   = %s
            AND   meta.user_id   = %d
            AND   meta.meta_value > %d
            ",'course','publish',$user->ID,time()));
            $result = $wpdb->get_results($courses_with_types);

            foreach($result as $course){
                    
                $args['post__in'][]=$course->id;
                $type = bp_course_get_user_course_status($user->ID,$course->id);
                
                $statuses[$course->id]= intval($type);
            }

            $query_args = apply_filters('wplms_mycourses',array(
                'post_type'=>'course',
                'posts_per_page'=>12,
                'paged'=>$args['paged'],
                's'=>$args['s'],
                'post__in'=>$args['post__in']
            ),$user->ID);

            $course_query = new WP_Query($query_args);
            global $bp,$wpdb;
            
            ?>
            
                <section id="Popular-Courses" class="">
             

                <div class="col-md-12 mrg space <?php echo $course_classes; ?>" data-aos="zoom-out" data-aos-delay="200">
            <?php while($course_query->have_posts()){
                    $course_query->the_post();
                    global $post;
                    $progress = bp_course_get_user_progress($user->id,$post->ID);
                    if($statuses[$post->ID]>2){$progress = 100;}
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
                    echo "<p>".$excerpt."</p>";
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
                	<?php if(get_post_meta($post->ID,'vibe_course_age_group',true) == '') { ?>
                		<h6>--</h6>
                	<?php } else{ ?>
                		<h6><?php echo get_post_meta($post->ID,'vibe_course_age_group',true);?></h6>
                	<?php }?>
                </div>
                            
                            <div class="learing-goals">
                                <div class="">
                                    <div class="">
                                        <div class="col-sm-12 col-lg-12 mrg">
                                            <div class="heading">
                                                <h3>Objective</h3>
                                                <?php echo get_post_meta($post->ID,'vibe_learning_goals',true);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 pull-left mrg">
                        <div class="col-lg-12 right-details pull-left mrg">
                            <div class="col-lg-12 mrg">
                                <?php
                                    $course_progress = empty($progress)?0:intval($progress);
                                ?>
                                <?php  
                                echo '<div class="course_home_progress" data-id="'.$post->ID.'"><div><span></span><span class="progress_value">'.$course_progress.' % Complete</span></div><div class="progress course_progress"><div class="bar animate stretchRight load" style="width: '.$course_progress.'px; background: #00D98E;"></div></div></div>'; ?>
                            </div>
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
        <?php } ?>
        </div>
    </div>
</section>
	

</div><!-- #item-body -->

<?php do_action( 'bp_after_member_settings_template' ); ?>
		
<?php

vibe_include_template("profile/bottom.php");  

get_footer( vibe_get_footer() );  