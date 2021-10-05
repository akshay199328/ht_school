<?php

/**
 * BuddyPress - Users Header
 *
 * @package BuddyPress
 * @subpackage bp-default
 */
if ( !defined( 'ABSPATH' ) ) exit;

$current_user = wp_get_current_user();

if($current_user->user_firstname != '')
	$first_name = $current_user->user_firstname;
if($current_user->user_lastname != '')
	$last_name = $current_user->user_lastname;
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
<div class="dashboard-container">
	<div class="breadcrumb">
		<?php
            $breadcrumbs=get_post_meta(get_the_ID(),'vibe_breadcrumbs',true);
            if(vibe_validate($breadcrumbs) || empty($breadcrumbs))
                vibe_breadcrumbs(); 
        ?>
	</div>
	<div class="copy-left">
		<div id="item-header-avatar">
						<a href="<?php bp_displayed_user_link(); ?>">
							<?php bp_displayed_user_avatar( 'type=full' ); ?>
						</a>
					</div><!-- #item-header-avatar -->
					<div class="Profile_details">
						<h3>
							<a href="<?php bp_displayed_user_link(); ?>"><?php echo $first_name.' '.$last_name;
							?></a>
						</h3>
						<p><?php bp_displayed_user_email(); ?></p>
						<a class="avtar-button" href="<?php echo home_url(); ?>/members-directory/<?php echo $current_user->user_nicename; ?>/profile/change-avatar">Change Avatar</a>
					</div>
			</div>
		<div class="copy-right">
			<div id="item-nav" class="myprofile_content">
			<?php 
				global $current_user;
				get_currentuserinfo();
				 $email=$current_user->user_email; 
				 $users = $wpdb->get_results("SELECT user_nicename FROM ht_users WHERE user_email='" .$email . "'");
				  $username = $users[0]->user_nicename;
				$current_page = $current_url="https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
				$parent_page = get_bloginfo('url').'/members-directory/'.$username.'/parent_dashboard/';
				
				if ($current_page == $parent_page) { ?>
					<h2> My Child's Profile</h2>
			<?php	}else {?>
			<h2> My Profile</h2>
		<?php } ?>
			<div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
				<ul id="dashboard_menu">
					<?php bp_get_displayed_user_nav(); ?>
					<?php do_action( 'bp_member_options_nav' ); ?>
				</ul> 
			</div>
		</div><!-- #item-nav -->
	</div>
</div><!-- #item-header-content -->

<?php do_action( 'bp_after_member_header' ); ?>

