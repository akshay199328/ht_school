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
<div class="item-list-tabs no-ajax <?php if ( !bp_is_my_profile() ) echo 'notmyprofile'; ?>" id="subnav" role="navigation">
	<ul>
		<?php if ( bp_is_my_profile() ) bp_get_options_nav(); 
		do_action('bp_course_get_options_sub_nav');
		?>
	</ul>
</div><!-- .item-list-tabs -->

<?php do_action( 'bp_after_member_settings_template' ); ?>
	<div id="item-body">
        <p>No Courses Found</p>
    </div>
<?php

vibe_include_template("profile/bottom.php");  

get_footer( vibe_get_footer() );  