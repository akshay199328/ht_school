<?php 
global $wpdb;
				$current_user = wp_get_current_user();
				 $email=$current_user->user_email; 
				 $users = $wpdb->get_results("SELECT user_nicename FROM ht_users WHERE user_email='" .$email . "'");
				  $username = $users[0]->user_nicename;
				$current_page = $current_url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
				$parent_page = get_bloginfo('url').'/members-directory/'.$username.'/school_dashboard/';
				
				?>

<style type="text/css">
	.edit-profile-link {
		float: right;
		color: #000;
		border: 1px solid #000;
		padding: 0px 15px;
	}
	.profile-heading h3 {
		float: left;
	}
</style>
<section id="content" class="dashboard_content">

	<div id="buddypress">
		<div class="member_header main dashboard_header">

			<?php

			$current_user = wp_get_current_user();

			/**
			 * Fires before the display of member home content.
			 *
			 * @since BuddyPress (1.2.0)
			 */
			do_action( 'bp_before_member_home_content' ); ?>

				<div id="item-header" class="<?php 
						$image = bp_attachments_get_user_has_cover_image();echo (empty($image)?'':'cover_image')?>" role="complementary">
					<?php
						bp_get_template_part( 'members/single/member-header2' );
					?>

				</div><!-- #item-header -->

		</div><!-- #item-header -->
		<div class="profile-heading">
			<div class="<?php echo vibe_get_container(); ?>">
	    		<div class="row">
	    			<div class="col-md-12 heading-align">
		    			<div class="pull-left">
		    				<h3 id="profile_current_menu"></h3>
		    			</div>
		    			<div class="pull-right">
		    				<a href="<?php echo home_url(); ?>/members-directory/<?php echo $current_user->user_nicename; ?>/profile/edit" class="edit-profile-link"><img src=<?php echo get_bloginfo('template_url').'/assets/images/profile-edit.svg'?>>Edit</a>
		    			</div>
	    			</div>
	    		</div>
	    	</div>
		</div>
		

			<?php 
				
				if ($current_page == $parent_page) { ?>
					<div class="">
	    <div class="school-dashboard">
	    	
	        <div class="">	
	        	<div class="">
					<div class="padder dashboard_accountinfo">
					
			<?php	}else {?>
				<div class="dashboard">
		  <div class="dashboard-container">
	    	
	        <div class="">	
	        	<div class="">
					<div class="padder dashboard_accountinfo">

		<?php } ?>
				
						

