<?php

/**
 * WPLMS- DASHBOARD TEMPLATE
 */

if ( !defined( 'ABSPATH' ) ) exit;

if(!is_user_logged_in()){
	wp_redirect(home_url(),'302');
}

get_header( vibe_get_header() ); 

$profile_layout = vibe_get_customizer('profile_layout');

vibe_include_template("profile/top$profile_layout.php");  
?>

<div class="wplms-dashboard row">
	<div class="col-sm-12 dashboard-info">
		<div class="col-sm-12 col-md-3 mrg">
			<div class="left-listing">
				<ul class="mobile-slider">
					<?php global $wpdb;    
					$user = wp_get_current_user();
			            $query = apply_filters('wplms_usermeta_direct_query',$wpdb->prepare("SELECT DISTINCT posts.post_title AS course,posts.ID AS course_id FROM ht_posts AS posts LEFT JOIN ht_postmeta AS rel ON posts.ID = rel.post_id WHERE posts.post_type = 'course' AND posts.post_status = 'publish' AND rel.meta_key REGEXP '^[0-9]+$' AND rel.meta_key = '".$user->ID."' ORDER BY rel.meta_key"));
			            $result = $wpdb->get_results($query);
			            
			            foreach($result as $course){
			                $args['post__in'][]=$course->course_id;
			            }
			            $query_args = apply_filters('wplms_mycourses',array(
			                'post_type'=>'course',
			                'post__in'=>$args['post__in']
			            ));

			            $course_query = new WP_Query($query_args);
			            global $bp,$wpdb;
			            while($course_query->have_posts()){
	                    $course_query->the_post();
	                    global $post;
			            
			        ?>
					<li class="item dashboard-li" value="<?php echo get_the_ID();?>">
						<input type="hidden" class="course_id" >
						<a href="#">
							<div class="col-xs-3 col-sm-3 col-md-3 mrg">
								<?php bp_course_avatar(); ?>
							</div>
							<div class="col-xs-9 col-sm-9 col-md-9 mrg">
								<!-- <h4><?php bp_course_title();?></h4> -->
								<h4><?php echo $post->post_title?></h4>
							</div>
						</a>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<div class="col-sm-12 col-md-6 mrg">
			<div class="middle-table">
				<table class="table table-responsive">
					<thead>
						<tr>
							<th>Rank</th>
							<th>Participant</th>
							<th>Points</th>
						</tr>
					</thead>
					<tbody id="data">
						
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-sm-12 col-md-3 mrg">
			<div class="right-details">
				<h2>Top Rankers</h2>
				<ul>
					<li>
						<div class="col-xs-8 col-sm-9 col-md-9 mrg">
							<div class="content">
								<p>Rank 1</p>
								<h5>Sarthak Tushar Malankar</h5>
								<span class="light">300 Pts</span>
							</div>
						</div>
						<div class="col-xs-4 col-sm-3 col-md-3 right_img mrg">
							<img src="<?php echo get_bloginfo('template_url');?>/assets/images/gold.svg" class="img-gold"/>
						</div>
					</li>
					<li>
						<div class="col-xs-8 col-sm-9 col-md-9 mrg">
							<div class="content">
								<p>Rank 1</p>
								<h5>Sarthak Tushar Malankar</h5>
								<span class="light">300 Pts</span>
							</div>
						</div>
						<div class="col-xs-4 col-sm-3 col-md-3 right_img mrg">
							<img src="<?php echo get_bloginfo('template_url');?>/assets/images/gold.svg" class="img-gold"/>
						</div>
					</li>
					<li>
						<div class="col-xs-8 col-sm-9 col-md-9 mrg">
							<div class="content">
								<p>Rank 1</p>
								<h5>Sarthak Tushar Malankar</h5>
								<span class="light">300 Pts</span>
							</div>
						</div>
						<div class="col-xs-4 col-sm-3 col-md-3 right_img mrg">
							<img src="<?php echo get_bloginfo('template_url');?>/assets/images/gold.svg" class="img-gold"/>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		(function($) {
			$(document).ready(function() {
	            /* Select link with an id of first and a class of big.*/
	            var course_id = $("ul .dashboard-li:first").val();
	            getScore(course_id);
         	});	
			$('.dashboard-li').click(function(e){
			  e.preventDefault();
			  	$('.mobile-slider li').removeClass("active");
    			$(this).addClass("active");
			  var course_id = $(this).val();
			  getScore(course_id);
			})

			function getScore(course_id){
				$.ajax({
				    type: 'POST',
				    url: "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
				    data: {"action": "load-filter", course_id: course_id },
				    success: function(response) {
				    	if(response.length > 0){

				    		$('#data').html(response);
				    	}
				    }
			  	});
			}

		})( jQuery );
	</script>
	<?php do_action( 'bp_before_dashboard_body' ); ?>
	<?php
		/*if(current_user_can('edit_posts')){
			$sidebar = apply_filters('wplms_instructor_sidebar','instructor_sidebar');
            if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : endif; 
		}else{
            $sidebar = apply_filters('wplms_student_sidebar','student_sidebar');
            if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : endif; 
		}*/
	?>
	<?php do_action( 'bp_after_dashboard_body' ); ?>
</div>	<!-- .wplms-dashbaord -->
<?php

vibe_include_template("profile/bottom.php");  

get_footer( vibe_get_footer() );  						