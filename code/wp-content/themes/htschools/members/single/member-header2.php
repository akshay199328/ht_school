<?php

/**
 * BuddyPress - Users Header
 *
 * @package BuddyPress
 * @subpackage bp-default
 */
if ( !defined( 'ABSPATH' ) ) exit;
?>
<style type="text/css">.material #content{margin-top:0px;}</style>
<?php do_action( 'bp_before_member_header' ); ?>
<div class="<?php echo vibe_get_container(); ?>">
	<div class="innerheader-space"></div>
	<div class="">
		<div class="col-xs-12 col-md-4 mrg">
			<div class="details_align">
				<div class="col-xs-12 col-md-3 mrg">
					<div id="item-header-avatar">
						<a href="<?php bp_displayed_user_link(); ?>">
							<?php bp_displayed_user_avatar( 'type=full' ); ?>
						</a>
					</div><!-- #item-header-avatar -->
				</div>
				<div class="co-xs-12 col-md-9 mrg">
					<div class="Profile_details">
						<h3>
							<a href="<?php bp_displayed_user_link(); ?>"><?php bp_displayed_user_fullname(); ?></a>
						</h3>
						<p><?php bp_displayed_user_email(); ?></p>
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

