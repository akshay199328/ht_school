
<section id="content" class="dashboard_content">

	<div id="buddypress">
		<div class="member_header main dashboard_header">

			<?php

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
	
	    <div class="<?php echo vibe_get_container(); ?>">
	    	
	        <div class="row">	
				<div class="col-md-12">
					<div class="padder dashboard_accountinfo">
						