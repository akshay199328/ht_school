<?php

/**
 * BuddyPress Saved Course
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
        	<ul class="">
        		<?php if ( bp_is_my_profile() ) bp_get_options_nav(); 
        		do_action('bp_course_get_options_sub_nav');
        		?>
        	</ul>
        	<ul>
        </div><!-- .item-list-tabs -->
    </div>
</div>
<div class="col-md-9"> 
    <div class="course_nofound">
        <h1>Saved Articles</h1>
    </div>
    <?php 
    $post_id = wpfp_get_users_favorites();
    foreach ($post_id as $key) {
        $title=get_post_meta($key,'vibe_title',true);
    print_r($title);
    $post = get_post($key);
    print_r($post);
    
    }
    // print_r(wpfp_get_users_favorites());
    //echo do_shortcode( '[wp-favorite-posts]' ); ?>
</div

<?php do_action( 'bp_after_member_settings_template' ); ?>
		
<?php

vibe_include_template("profile/bottom.php");  

get_footer( vibe_get_footer() ); 