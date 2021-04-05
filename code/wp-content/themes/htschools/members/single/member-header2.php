<?php

/**
 * BuddyPress - Users Header
 *
 * @package BuddyPress
 * @subpackage bp-default
 */
if ( !defined( 'ABSPATH' ) ) exit;

$current_user = wp_get_current_user();

?>
<style type="text/css">
	.simple-link{
		color: #000;
		text-decoration: underline;
		font-size: 10px;
	}
</style>
<style type="text/css">.material #content{margin-top:0px;}</style>
<?php do_action( 'bp_before_member_header' ); ?>
<div class="<?php echo vibe_get_container(); ?>">
	<div class="innerheader-space"></div>
	<div class="">
		<div class="col-xs-12 col-md-4 mrg">
			<div class="details_align">
				<div class="mrg">
					<div id="item-header-avatar">
						<a href="<?php bp_displayed_user_link(); ?>">
							<?php bp_displayed_user_avatar( 'type=full' ); ?>
						</a>
					</div><!-- #item-header-avatar -->
					<div class="Profile_details">
						<h3>
							<a href="<?php bp_displayed_user_link(); ?>"><?php bp_displayed_user_fullname(); ?></a>
						</h3>
						<p><?php bp_displayed_user_email(); ?></p>
						<a class="simple-link" href="<?php echo home_url(); ?>/members-directory/<?php echo $current_user->user_login; ?>/profile/change-avatar">Change Profile Picture</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-8 mrg">
			<div id="item-nav" class="myprofile_content">
			<h2> My Profile</h2>
			<div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
				<div class="<?php echo vibe_get_container(); ?>">
					<div class="row">
						<div class="col-md-12 mrg">
							<ul id="dashboard_menu">

								<?php bp_get_displayed_user_nav(); ?>

								<?php do_action( 'bp_member_options_nav' ); ?>

							</ul> 
						</div>
					</div>
				</div>
			</div>
		</div><!-- #item-nav -->
		</div>
	</div>
</div><!-- #item-header-content -->

<?php do_action( 'bp_after_member_header' ); ?>

