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
    <div class=""> 
        <div class="profile-card">
            <h1>Your Referral Code</h1>
            <div class="col-sm-9 mrg">
                <div class="refferal_textbox">
                    <!-- <label for="coupon_code">Coupon:</label> -->
                     <input type="text" class="input-text" placeholder=" Http://Mywebsite.Com/Product-1/?Ref=123"> 
                    <button type="submit" class="copy_link" name="" value="Copy Link">
                        Copy Link
                    </button>
                </div>
            </div>
            <div class="col-sm-3 mrg">
                <div class="refferal_social">
                    <ul>
                        <li>
                            <a href="#">
                                <img src="<?php echo get_bloginfo('template_url')?>/assets/images/facebook.svg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="<?php echo get_bloginfo('template_url')?>/assets/images/whatsapp.svg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="<?php echo get_bloginfo('template_url')?>/assets/images/linkdin.svg"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="<?php echo get_bloginfo('template_url')?>/assets/images/email.svg"/>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
        </div>
    </div> 
    
</div
<?php do_action( 'bp_after_member_settings_template' ); ?>
		
<?php

vibe_include_template("profile/bottom.php");  

get_footer( vibe_get_footer() ); 