<?php
/**
 * Template Name: My Courses page
 */
if ( !defined( 'ABSPATH' ) ) exit;

get_header(vibe_get_header());
?>
<main id="main">
	<section class="breadcrumbs background-breadcrumbs">
      <div class="innerheader-space"></div>
      <div class="container">
        <?php
        	$breadcrumbs=get_post_meta($id,'vibe_breadcrumbs',true);
            if(!isset($breadcrumbs) || !$breadcrumbs || vibe_validate($breadcrumbs)){
                vibe_breadcrumbs();
            }
        	echo '<h2>'.vibe_get_title($id).'</h2>';
	        the_sub_title($id);
        ?>
      </div>
    </section>
    <section id="Popular-Courses" class="">
      <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-8 mrg">
            <div class="">
                <div class="col-md-12 mrg space" data-aos="zoom-out" data-aos-delay="200">
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
                    while($course_query->have_posts()){
                    $course_query->the_post();
                    global $post;
                    $progress = bp_course_get_user_progress($user->id,$post->ID);
                    if($statuses[$post->ID]>2){$progress = 100;}
                  ?>
                  <div class="course-box dotted-border">
                    <div class="col-xs-2 col-sm-2 col-lg-2 pull-left mrg">
                        
                     <?php bp_course_avatar(); 
                      $category_array = get_the_terms( $post->ID, 'course-cat');
                     ?>
                    </div>
                    <div class="col-xs-10 col-sm-10 col-lg-10 pull-left mrg">
                      <div class="col-sm-12 col-lg-9 pull-left mrg">
                        <div class="middle-details">
                          	<h6><?php echo $category_array[0]->name; ?></h6>
                        	<h2><?php echo bp_course_title(); ?></h2>
                          <div class="col-lg-12 share-icon mrg">
                            <i class="bi bi-share"></i>
                          </div>
                          <p class=""><?php echo substr(strip_tags($content), 0, $char_limit);  ?></p>
                          <div class="col-lg-7 duration mrg">
                            <div class="pull-left">
                              <p>Duration</p>
                              <?php if(get_post_meta($post->ID,'vibe_duration',true) == '') { ?>
                                <h6>--</h6>
                              <?php } else{ ?>
                                <h6><span><?php echo get_post_meta($post->ID,'vibe_duration',true);?></span> Days</h6>
                              <?php }?>
                            </div>
                            <div class="pull-right">
	                            <p>Age Group</p>
                              <?php if(get_post_meta($post->ID,'vibe_course_age_group',true) == '') { ?>
                                <h6>--</h6>
                              <?php } else{ ?>
                                <h6><?php echo get_post_meta($post->ID,'vibe_course_age_group',true);?></h6>
                              <?php }?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-lg-3 pull-left mrg">
                        <div class="col-lg-12 right-details pull-left mrg">
                          
                          <div class="col-lg-12 course-button">
                              <h6 ><?php 
                                the_course_price();
                            ?>
                            </h6>
                            <?php the_course_button(); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mrg adworks desktop-add right-adwork">
            <?php
              if ( is_active_sidebar( 'banner-1' ) ) : ?>
              <?php dynamic_sidebar( 'banner-1' ); ?>      
            <?php endif; ?>
        </div>
    </div>
</div>
</section>
<div class="col-md-12 col-sm-12">
		<?php
			$sidebar = apply_filters('wplms_sidebar','competitive-section');
            if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : ?>
       	<?php endif; ?>
	</div>
</main>
<?php
get_footer(vibe_get_footer());
?>