<?php

/**
 * BuddyPress - Users Header
 *
 * @package BuddyPress
 * @subpackage bp-default
 */
if ( !defined( 'ABSPATH' ) ) exit;
?>
<style type="text/css">.material #content{margin-top:100px;}</style>
<?php do_action( 'bp_before_member_header' ); ?>
<div class="<?php echo vibe_get_container(); ?>">
	<div class="row">
		<div class="col-md-1">
			<div id="item-header-avatar">
				<a href="<?php bp_displayed_user_link(); ?>">
					<?php bp_displayed_user_avatar( 'type=full' ); ?>
				</a>

			</div><!-- #item-header-avatar -->
		</div>
		<div class="col-md-2">
			<h3>
					<a href="<?php bp_displayed_user_link(); ?>"><?php bp_displayed_user_fullname(); ?></a>
				</h3>

				<?php bp_displayed_user_email(); ?>

		</div>
		<div class="col-md-9">
			<div id="item-nav" class="">
			<h2> My Profile</h2>
			<div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
				<div class="<?php echo vibe_get_container(); ?>">
					<div class="row">
						<div class="col-md-9 col-md-offset-3">
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

