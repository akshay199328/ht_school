<?php

/**
 * BuddyPress - Users Profile
 *
 * @package BuddyPress
 * @subpackage bp-default
 */
if ( !defined( 'ABSPATH' ) ) exit;
?>
<?php
	$profileType = get_profile_data('Profile Type');
	/*$current_user = wp_get_current_user();*/
?>
<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
	<ul class="left_tab">
		<?php //bp_get_options_nav(); ?>
		<li id="public-personal-li" class="<?php if($profileType != 'Parent'){ echo "current selected"; } ?>">
			<a id="profile-type-student" href="javascript:void(0);">I am a Student</a>
		</li>
		<li id="edit-personal-li" class="<?php if($profileType == 'Parent'){ echo "current selected"; } ?>">
			<a id="profile-type-parent" href="javascript:void(0);">I am a Parent</a>
		</li>
		<!-- <li id="claim-parent-child">			
			<a id="profile-type-claim-code" href="<?php echo home_url(); ?>/members-directory/<?php echo $current_user->user_login; ?>/settings/claim/">Claim Parent / Child</a>
		</li> -->
	</ul>
</div><!-- .item-list-tabs -->

<?php
do_action('wplms_after_single_item_list_tabs');
/**
 * Fires before the display of member profile content.
 *
 * @since 1.1.0
 */

if (bp_current_action() != 'public') {
	do_action( 'bp_before_profile_content' ); 
}

?>

<div class="profile">

<?php switch ( bp_current_action() ) :

	// Edit
	case 'edit'   :
		bp_get_template_part( 'members/single/profile/edit' );
		break;

	// Change Avatar
	case 'change-avatar' :
		bp_get_template_part( 'members/single/profile/change-avatar' );
		break;

	// Change Cover Image
	case 'change-cover-image' :
		bp_get_template_part( 'members/single/profile/change-cover-image' );
		break;

	// Compose
	case 'public' :

		// Display XProfile
		if ( bp_is_active( 'xprofile' ) )
			bp_get_template_part( 'members/single/profile/profile-loop' );

		// Display WordPress profile (fallback)
		else
			bp_get_template_part( 'members/single/profile/profile-wp' );

		break;

	// Any other
	default :
		bp_get_template_part( 'members/single/plugins' );
		break;
endswitch; ?>
</div><!-- .profile -->

<?php

/**
 * Fires after the display of member profile content.
 *
 * @since 1.1.0
 */
do_action( 'bp_after_profile_content' ); ?>

