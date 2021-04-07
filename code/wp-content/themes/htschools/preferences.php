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
        <h1>Area of Interest</h1>
    </div>
    <div class="profile-card">
        <h1>Your Interests</h1>
        <div class="col-md-12 col-sm-12 profile_searchbox mrg">
            <form action="" id="search-form" method="get">
               <div class="search_section">
                    <div class="search_icon"></div>
                    <input type="text" name="s" id="s" placeholder="Find an Interest to add" onblur="if(this.value=='')this.placeholder='Find an Interest to add'" onfocus="if(this.placeholder=='Find an Interest to add')this.placeholder=''">
                    <input type="hidden" value="submit">
                </div> 
                <div class="search_value">
                    <span><a href="#">CSS3 <i class="bi bi-x"></i></a></span>
                    <span><a href="#">Javascript <i class="bi bi-x"></i></a></span>
                    <span><a href="#">HTML5 <i class="bi bi-x"></i></a></span>
                    <span><a href="#">Front End <i class="bi bi-x"></i></a></span>
                    <span><a href="#">BootStrap <i class="bi bi-x"></i></a></span>
                    <span><a href="#">Data Science <i class="bi bi-x"></i></a></span>
                    <span><a href="#">CSS3 <i class="bi bi-x"></i></a></span>
                    <span><a href="#">CSS3 <i class="bi bi-x"></i></a></span>
                    <span><a href="#">Javascript <i class="bi bi-x"></i></a></span>
                </div>
            </form>
            
        </div>
    </div>
</div
<?php do_action( 'bp_after_member_settings_template' ); ?>
		
<?php

vibe_include_template("profile/bottom.php");  

get_footer( vibe_get_footer() );  