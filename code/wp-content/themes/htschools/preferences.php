<?php

/**
 * BuddyPress Preferences
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
        <div class="item-list-tabs no-ajax" id="subnav" role="navigation">
        	<ul>
				<?php $user_domain = bp_displayed_user_domain() ? bp_displayed_user_domain() : bp_loggedin_user_domain(); 
					$preference_link = trailingslashit( $user_domain );
				//bp_get_options_nav(); ?>
				<li id="public-personal-li" class="current selected">
					<a id="profile-type-student" href="<?php echo $preference_link.'preference'?>">Areas of Interest</a>
				</li>
				<li id="edit-personal-li">
					<a id="profile-type-parent" href="<?php echo $preference_link.'preference/saved-courses'?>">Saved Courses</a>
				</li>
				<li id="edit-personal-li">
					<a id="profile-type-parent" href="<?php echo $preference_link.'preference/saved-articles'?>">Saved Articles</a>
				</li>
				<li id="edit-personal-li">
					<a id="profile-type-parent" href="<?php echo $preference_link.'preference/referral-code'?>">Referral Code</a>
				</li>
			</ul>
        </div><!-- .item-list-tabs -->
    </div>
</div>
<?php do_action( 'bp_after_member_settings_template' ); ?>
		
<?php

vibe_include_template("profile/bottom.php");  

get_footer( vibe_get_footer() );  