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
    <div class="col-md-3">
        <div class="item-list-tabs no-ajax <?php if ( !bp_is_my_profile() ) echo 'notmyprofile'; ?>" id="subnav" role="navigation">
        	<ul>
        		<?php if ( bp_is_my_profile() ) bp_get_options_nav(); 
        		do_action('bp_course_get_options_sub_nav');
        		?>
        	</ul>
        </div><!-- .item-list-tabs -->
    </div>

    <div class="col-md-9">      
          	<?php
                $user = wp_get_current_user();
                //print_r($user->ID);
                
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
                ),2);

                $course_query = new WP_Query($query_args);
                global $bp,$wpdb;


               /*if($course_query->have_posts()){
                    $return['status']=1;
                    $courses = array();
                    while($course_query->have_posts()){
                        $course_query->the_post();
                        global $post;


                        $retakes = bp_course_get_course_retakes($post->ID);

                        
                        $course_retakes = bp_course_get_course_retakes($post->ID,2);



                        $authors=array($post->post_author);
                        $authors = apply_filters('wplms_course_instructors',$authors,$post->ID);
                        $progress = bp_course_get_user_progress(2,$post->ID);
                        if($statuses[$post->ID]>2){$progress = 100;}
                        
                        $start_date = bp_course_get_start_date($post->ID,2);
                        if(strpos($start_date,'-') !== false){
                            $start_date = strtotime($start_date);
                        }


                        $_course_data = array(
                            'id'                    => $post->ID,
                            'name'                  => $post->post_title,
                            'excerpt'               => $post->post_excerpt,
                            'description'           => do_shortcode($post->post_content),
                            'user_progress'         => empty($progress)?0:intval($progress),
                            'user_status'           => $statuses[$post->ID],
                            'duration'              => bp_course_get_course_duration($post->ID,2),
                            'user_expiry'           => bp_course_get_user_expiry_time(2,$post->ID),
                            'start_date'            => $start_date,
                            'display_start_date'    => $start_date?date(get_option('date_format'),$start_date):'',
                            'instructor'            => $authors,    
                            'menu_order'            => $post->menu_order,
                            'link'                  => get_permalink($post->ID),
                            'course_retakes'        => bp_course_get_course_retakes($post->ID,2),
                            'user_retakes'          => bp_course_get_user_course_retakes($post->ID,2),
                        );



                        $stop_course_status = apply_filters('wplms_before_course_status_api',false,$post->ID,2);

                        if($stop_course_status && is_array($stop_course_status) && !empty($stop_course_status['error_code'])){
                            $_course_data['error'] = $stop_course_status;

                        }


                        $courses[]=$_course_data;

                    }
                    unset($return['message']);
                    $return['courses']=$courses;
                    $return['total']=$course_query->found_posts;
                }*/
                
                ?>
                
                    <section id="Popular-Courses" class="">
                 

                    <div class="col-md-12 mrg space <?php echo $course_classes; ?>" data-aos="zoom-out" data-aos-delay="200">
                <?php while($course_query->have_posts()){
                        $course_query->the_post();
                        global $post;
                        $progress = bp_course_get_user_progress($user->id,$post->ID);
                        if($statuses[$post->ID]>2){$progress = 100;}
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
                            <br/>
                            <br/>
                            <?php wp_trim_words(bp_course_desc(), 30); ?>
                            <br/>

                            <div class="learing-goals" id="benefits">
                                <div class="container">
                                    <div class="">
                                        <div class="col-sm-12 col-lg-12 pull-right left-spacing">
                                            <?php if(get_post_meta($post->ID,'vibe_learning_goals',true) > 0){ ?>
                                                <div class="heading">
                                                    <h3>Objective</h3>
                                                    <?php echo get_post_meta($post->ID,'vibe_learning_goals',true);?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 pull-left mrg">
                        <div class="col-lg-12 right-details pull-left mrg">
                            <div class="col-lg-12 course-button">
                                <?php
                                    $course_progress = empty($progress)?0:intval($progress);
                                ?>
                                <?php  
                                echo '<div class="course_home_progress" data-id="'.$post->ID.'"><div><span></span><span>'.$course_progress.'</span></div><div class="progress course_progress"><div class="bar animate stretchRight load" style="width: '.$course_progress.'%; background: var(--primary);"></div></div></div>'; ?>
                                <h6><?php the_course_price(); ?></h6>
                                <?php the_course_button(); ?> 
                            </div>
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
                            <div class="col-sm-12 col-lg-7 pull-left mrg">
                                <div class="profile mt-auto">
                                    <div class="col-lg-12 profile-content">
                                        <div class="profileimg-name">
                                            <div class="col-xs-4 col-sm-2 col-lg-4 mrg profile-img pull-left">
                                                <img src="<?php echo $author_user_profile; ?>" class="rounded-circle img-fluid" alt="">
                                            </div>
                                            <div class="col-xs-6 col-sm-4 co-lg-3 pull-left">
                                                <h3 class="name"><strong><?php echo $author_name; ?></strong></h3>
                                                <h4><?php echo $author_company; ?></h4>
                                            </div>
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