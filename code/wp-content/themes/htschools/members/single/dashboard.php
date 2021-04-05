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
					<li class="active item">
						<div class="col-xs-3 col-sm-3 col-md-3 mrg">
							<!-- <img src="assets/images/dashboard-1.svg"/> -->
							<img src="<?php echo get_bloginfo('template_url');?>/assets/images/dashboard-1.svg" class="img-fluid"/>
						</div>
						<div class="col-xs-9 col-sm-9 col-md-9 mrg">
							<h4>Natural Language Processing</h4>
						</div>
					</li>
					<li class="item">
						<div class="col-xs-3 col-sm-3 col-md-3 mrg">
							<img src="<?php echo get_bloginfo('template_url');?>/assets/images/dashboard-1.svg" class="img-fluid"/>
						</div>
						<div class="col-xs-9 col-sm-9 col-md-9 mrg">
							<h4>Strategies for Launching Your Creative Career</h4>
						</div>
					</li>
					<li class="item">
						<div class="col-xs-3 col-sm-3 col-md-3 mrg">
							<img src="<?php echo get_bloginfo('template_url');?>/assets/images/dashboard-1.svg" class="img-fluid"/>
						</div>
						<div class="col-xs-9 col-sm-9 col-md-9 mrg">
							<h4>Data Science for Business Leaders</h4>
						</div>
					</li>
					<li class="item">
						<div class="col-xs-3 col-sm-3 col-md-3 mrg">
							<img src="<?php echo get_bloginfo('template_url');?>/assets/images/dashboard-1.svg" class="img-fluid"/>
						</div>
						<div class="col-xs-9 col-sm-9 col-md-9 mrg">
							<h4>Strategies for Launching Your Creative Career</h4>
						</div>
					</li>
					<li class="item">
						<div class="col-xs-3 col-sm-3 col-md-3 mrg">
							<img src="<?php echo get_bloginfo('template_url');?>/assets/images/dashboard-1.svg" class="img-fluid"/>
						</div>
						<div class="col-xs-9 col-sm-9 col-md-9 mrg">
							<h4>Data Science for Business Leaders</h4>
						</div>
					</li>
					<li class="item">
						<div class="col-xs-3 col-sm-3 col-md-3 mrg">
							<img src="<?php echo get_bloginfo('template_url');?>/assets/images/dashboard-1.svg" class="img-fluid"/>
						</div>
						<div class="col-xs-9 col-sm-9 col-md-9 mrg">
							<h4>Strategies for Launching Your Creative Career</h4>
						</div>
					</li>
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
					<tbody>
						<tr>
					      	<td scope="row"><span class="circle">15</span></td>
					      	<td>You</td>
					      	<td>400</td>
					    </tr>
					</tbody>
					<tbody>
					    <tr>
					      	<td scope="row"><span class="circle">16</span></td>
					      	<td>Deccan Chargers</td>
					      	<td>300</td>
					    </tr>
					</tbody>
					<tbody>
					    <tr>
					      	<td scope="row"><span class="circle">17</span></td>
					      	<td>Chennai Super Kings</td>
					      	<td>299</td>
					    </tr>
					</tbody>
					<tbody>
					    <tr>
					      	<td scope="row"><span class="circle">18</span></td>
					      	<td>Chennai Super Kings</td>
					      	<td>400</td>
					    </tr>
					</tbody>
					<tbody>
					    <tr>
					      	<td scope="row"><span class="circle">19</span></td>
					      	<td>Kolkata Knight Riders</td>
					      	<td>500</td>
					    </tr>
					</tbody>
					<tbody>
					    <tr>
					      	<td scope="row"><span class="circle">20</span></td>
					      	<td>Mumbai Indians</td>
					      	<td>400</td>
					    </tr>
					</tbody>
					<tbody>
					    <tr>
					      	<td scope="row"><span class="circle">21</span></td>
					      	<td>Kolkata Knight Riders</td>
					      	<td>400</td>
					    </tr>
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