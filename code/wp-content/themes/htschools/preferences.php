<?php

/**
 * BuddyPress Preferences
 *
 * @package BuddyPress
 * @subpackage bp-default
 */

acf_form_head();
get_header( vibe_get_header() ); 
$profile_layout = vibe_get_customizer('profile_layout');

vibe_include_template("profile/top$profile_layout.php");  
?>
<div id="item-body">
    <div class="col-md-3 left_tabs pull-left">
        <div class="item-list-tabs no-ajax" id="subnav" role="navigation">
        	<ul class="left_tab">
        		<?php if ( bp_is_my_profile() ) bp_get_options_nav(); 
        		do_action('bp_course_get_options_sub_nav');
        		?>
        	</ul>
        	<ul>
        </div><!-- .item-list-tabs -->
    </div>
    <div class="col-md-9 pull-left"> 
        <div class="profile-card">
            <h1>What are your Interests / Hobbies?</h1>
            <div class="col-md-12 col-sm-12 profile_searchbox mrg">
                <form action="" id="search-form" method="get">
                    
                    <?php acf_form();?>
                    <div class="search_value">
                    <?php 
                        $user = wp_get_current_user();

                        $options = array(
                          // 'field_groups' => ['group_5cbd99ef0f584'],
                          'fields' => ['interest'],
                          'form_attributes' => array(
                            'method' => 'POST',
                            'action' => admin_url("admin-post.php"),
                          ),
                          'html_before_fields' => sprintf(
                            '<input type="hidden" name="action" value="adaptiveweb_save_profile_form">
                            <input type="hidden" name="user_id" value="user_%s">',
                            $user->ID
                          ),
                          'post_id' => "user_{$user->ID}",
                          'form' => true,
                          'html_submit_button' => '<button type="submit" class="acf-button button button-primary button-large" value="Update Profile">Update Interests</button>',
                          'updated_message' => __("Your Interest(s) have been updated. Check out the Recommended Courses!", 'acf'),
                          'html_updated_message'  => '<div id="message" class="updated"><p>%s</p></div>',
                        );
                        
                        acf_form($options);

                    ?>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>

<?php do_action( 'bp_after_member_settings_template' ); ?>
		
<?php

vibe_include_template("profile/bottom.php");  

get_footer( vibe_get_footer() );  