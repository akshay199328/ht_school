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
			<ul>
				<?php if ( bp_is_my_profile() ) bp_get_options_nav(); 
				do_action('bp_course_get_options_sub_nav');
				?>
			</ul>
		</div><!-- .item-list-tabs -->
	</div>

<?php do_action( 'bp_after_member_settings_template' ); ?>
	<div class="col-md-9"> 
        <div class="course_nofound">
            <h1>You have not completed any course till now</h1>
        </div>
    </div>
</div>
<?php

vibe_include_template("profile/bottom.php");  

get_footer( vibe_get_footer() );  