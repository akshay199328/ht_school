<?php

/**
 * BuddyPress - Users Home
 *
 * @package BuddyPress
 * @subpackage bp-default
 */
if ( !defined( 'ABSPATH' ) ) exit;

do_action('wplms_before_member_profile');

get_header( vibe_get_header() ); 

$profile_layout = vibe_get_customizer('profile_layout');
$user_id= get_current_user_id();
$user = new WP_User( $user_id );
$user_role=strval( wp_sprintf_l( '%l', $user->roles ));

if($user_role=='instructor'){

	$profile_layout = 'blank';
}
if($profile_layout == 'blank'){
	vibe_include_template("profile/$profile_layout.php");  
}else{

vibe_include_template("profile/top$profile_layout.php");  
?>
<div id="item-body">
	<?php do_action( 'template_notices' ); ?>
	
	<?php do_action( 'bp_before_member_body' );


	if ( bp_is_user_activity() || !bp_current_component() ) :
		locate_template( array( 'members/single/activity.php'  ), true );

	 elseif ( bp_is_user_blogs() ) :
		locate_template( array( 'members/single/blogs.php'     ), true );

	elseif ( bp_is_user_friends() ) :
		locate_template( array( 'members/single/friends.php'   ), true );

	elseif ( bp_is_user_groups() ) :
		locate_template( array( 'members/single/groups.php'    ), true );

	elseif ( bp_is_user_messages() ) :
		locate_template( array( 'members/single/messages.php'  ), true );

	elseif ( bp_is_user_notifications() ) :
		locate_template( array( 'members/single/notifications.php'  ), true );

	elseif ( bp_is_user_profile() ) :
		locate_template( array( 'members/single/profile.php'   ), true );

	elseif (function_exists('bp_is_user_forums') &&  bp_is_user_forums() ) :
		locate_template( array( 'members/single/forums.php'    ), true );

	elseif ( bp_is_user_settings() ) :
		locate_template( array( 'members/single/settings.php'  ), true );

	elseif ( bp_is_user_course() ) :
		locate_template( array( 'members/single/course.php'    ), true );

	// If nothing sticks, load a generic template
	else :
		locate_template( array( 'members/single/plugins.php'   ), true );

	endif;

	do_action( 'bp_after_member_body' ); ?>

</div><!-- #item-body -->

<?php do_action( 'bp_after_member_home_content' ); ?>
<?php
vibe_include_template("profile/bottom.php");  
}
get_footer( vibe_get_footer() );  

do_action('wplms_after_member_profile');
