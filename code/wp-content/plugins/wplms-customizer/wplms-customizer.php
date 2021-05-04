<?php
/*
Plugin Name: WPLMS Customizer Plugin
Plugin URI: http://www.Vibethemes.com
Description: A simple WordPress plugin to modify WPLMS template
Version: 1.0
Author: VibeThemes
Author URI: http://www.vibethemes.com
License: GPL2
*/
/*
Copyright 2014  VibeThemes  (email : vibethemes@gmail.com)

wplms_customizer program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

wplms_customizer program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with wplms_customizer program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


include_once 'classes/customizer_class.php';



if(class_exists('WPLMS_Customizer_Plugin_Class'))
{	
    // instantiate the plugin class
    $wplms_customizer = new WPLMS_Customizer_Plugin_Class();
}


add_action( 'bp_setup_nav', 'bp_remove_profile_menus', 999 );

function bp_remove_profile_menus() {
	bp_core_remove_nav_item( 'messages' );

	bp_core_remove_nav_item( 'shop' );
	bp_core_remove_nav_item( 'commissions' );
	bp_core_remove_nav_item( 'notifications' );
	bp_core_remove_nav_item( 'zoom_meeting' );
	bp_core_remove_nav_item( 'friends' );
	bp_core_remove_nav_item( 'settings' );
	bp_core_remove_nav_item( 'activity' );
	bp_core_remove_nav_item( 'course-stats' );
	bp_core_remove_nav_item( 'assignment_results' );
  bp_core_remove_nav_item( 'dashboard' );
}

function rt_change_profile_tab_order() {
   global $bp;

   $bp->members->nav->edit_nav( array(
      'position' => 10,
   ), 'profile' );
   $bp->members->nav->edit_nav( array(
      'position' => 20,
   ), 'dashboard' );
   $bp->members->nav->edit_nav( array(
      'position' => 30,
   ), 'course' );
   $bp->members->nav->edit_nav( array(
	'name' => 'Account Info',
	), 'profile' );
   $bp->members->nav->edit_nav( array(
	'name' => 'Account Info',
	), 'profile' );
   $bp->members->nav->edit_nav( array(
	'name' => 'My Courses',
	), 'course' );
}
add_action( 'bp_init', 'rt_change_profile_tab_order', 999 );

function bp_remove_nav_item() {
    global $bp;
    $current_user   = wp_get_current_user();
    $role_name      = $current_user->roles[0];
    if($role_name==='administrator' || $role_name==='admin' || $role_name==='student' || $role_name==='instructor'){
    
    bp_core_remove_subnav_item( $bp->course->slug, 'course-stats' );
    bp_core_remove_subnav_item( $bp->course->slug, 'quiz_results' );
    bp_core_remove_subnav_item( $bp->course->slug, 'assignment_results' );
    bp_core_remove_subnav_item( $bp->course->slug, 'notes_reviews' );
    bp_core_remove_subnav_item( $bp->course->slug, 'instructor_controls' );
    bp_core_remove_subnav_item( $bp->course->slug, 'manage_courses' );
    bp_core_remove_subnav_item( $bp->course->slug, 'manage_quizzes' );
    bp_core_remove_subnav_item( $bp->course->slug, 'manage_assignments' );
    bp_core_remove_subnav_item( $bp->course->slug, 'manage_students' );
    bp_core_remove_subnav_item( $bp->course->slug, 'manage_questions' );
    bp_core_remove_subnav_item( $bp->course->slug, 'qna' );
    bp_core_remove_subnav_item( $bp->course->slug, 'course_search' );
    bp_core_remove_subnav_item( $bp->course->slug, 'manage_reports' );
    bp_core_remove_subnav_item( $bp->course->slug, 'enrolled_course' );
  }
}
add_action( 'wp', 'bp_remove_nav_item' );

/*function bpcodex_remove_group_manager_subnav_tabs() {   
    // site admin will see all tabs
    if ( ! bp_is_group() || ! ( bp_is_current_action( 'admin' ) && bp_action_variable( 0 ) ) || is_super_admin() ) {
        return;
    }
       // all subnav items are listed here.
       // comment those you want to show
        $hide_tabs = array(             
        //  'group-settings'    => 1,
            'delete-group'      => 1,
            'change-avatar'      => 1,
        //  'group-invites'     => 1,
            'manage-members'    => 1,
        //  'forum'             => 1,
        //  'group-cover-image' => 1
        );
                   
        $parent_nav_slug = bp_get_current_group_slug() . '_manage';
  
    //Remove the nav items
    foreach ( array_keys( $hide_tabs ) as $tab ) {
        bp_core_remove_subnav_item( $parent_nav_slug, $tab, 'groups' );
    }   
}
add_action( 'bp_actions', 'bpcodex_remove_group_manager_subnav_tabs' );*/

add_action('init',function(){

  register_taxonomy( 'course-tag', array( 'course'),

      array(

        'labels' => array(

          'name' => 'Tag',

          'menu_name' => 'Tag',

          'singular_name' => 'Tag',

          'add_new_item' => 'Add New Tag',

          'all_items' => 'All Tags'

        ),

        'public' => true,

        'hierarchical' => false,

        'show_in_menu' => 'lms',

        'show_ui' => true,

        'show_admin_column' => true,

        'show_in_nav_menus' => true,

        'rewrite' => array( 'slug' => 'course-tag', 'hierarchical' => true, 'with_front' => true ),

      )

    );

});

add_filter('wplms_course_metabox','custom_add_second_button_link');

function custom_add_second_button_link($metabox){

  $metabox['Custom_button_link'] = array(

          'label' => __('Custom Button Link','vibe-customtypes'),

          'desc'  => __('custom button link.','vibe-customtypes'),

          'id'    => 'Custom_button_link',

          'type'  => 'text',

          'std'   => ""

      );

  return $metabox;

}
add_filter('wplms_course_metabox','custom_learning_goals');

function custom_learning_goals($field1){
  $prefix = 'vibe_';
  $field1[]=array( // Text Input
  'label' => __('Learning Goals','vibe-learninggoals'), // <label>
  'desc'  => __('Learning Goals','vibe-learninggoals'), // description
  'id'    => $prefix.'learning_goals', // field id and name
  'type'  => 'editor' // type of field
                       );
  return $field1;
   
}
add_filter('wplms_course_metabox','custom_who_this_course_for');
function custom_who_this_course_for($field1){
  $prefix = 'vibe_';
  $field1[]=array( // Text Input
  'label' => __('Who Is This Course For?','vibe-who_this_course_Is_for_first_block'), // <label>
  'desc'  => __('Who Is This Course For?','vibe-who_this_course_Is_for_first_block'), // description
  'id'    => $prefix.'who_this_course_Is_for_first_block', // field id and name
  'type'  => 'textarea' // type of field
                       );
  return $field1;
   
}
add_filter('wplms_course_metabox','custom_age_group');
function custom_age_group($field1){
  $prefix = 'vibe_';
  $field1[]=array( // Text Input
  'label' => __('Course Age Group','vibe-courseagegroup'), // <label>
  'desc'  => __('Course Age Group','vibe-courseagegroup'), // description
  'id'    => $prefix.'course_age_group', // field id and name
  'type'  => 'text' // type of field
                       );
  return $field1;
   
}

add_filter('wplms_course_metabox','custom_frequency');
function custom_frequency($field1){
  $prefix = 'vibe_';
  $field1[]=array( // Text Input
  'label' => __('Frequency','vibe-frequency'), // <label>
  'desc'  => __('Frequency','vibe-frequency'), // description
  'id'    => $prefix.'course_frequency', // field id and name
  'type'  => 'text' // type of field
                       );
  return $field1;
   
}
add_filter('wplms_course_metabox','custom_sessions');
function custom_sessions($field1){
  $prefix = 'vibe_';
  $field1[]=array( // Text Input
  'label' => __('Sessions','vibe-sessions'), // <label>
  'desc'  => __('Sessions','vibe-sessions'), // description
  'id'    => $prefix.'course_sessions', // field id and name
  'type'  => 'text' // type of field
                       );
  return $field1;
   
}

add_filter('wplms_course_metabox','custom_session_length');
function custom_session_length($field1){
  $prefix = 'vibe_';
  $field1[]=array( // Text Input
  'label' => __('Session Length','vibe-session_length'), // <label>
  'desc'  => __('Session Length','vibe-session_length'), // description
  'id'    => $prefix.'course_session_length', // field id and name
  'type'  => 'text' // type of field
                       );
  return $field1;
   
}

add_filter('wplms_course_metabox','custom_lectures');
function custom_lectures($field1){
  $prefix = 'vibe_';
  $field1[]=array( // Text Input
  'label' => __('Lectures','vibe-session_length'), // <label>
  'desc'  => __('Lectures','vibe-session_length'), // description
  'id'    => $prefix.'course_lectures', // field id and name
  'type'  => 'text' // type of field
                       );
  return $field1;
   
}

add_filter('wplms_course_metabox','custom_background_image');
function custom_background_image($field1){
  $prefix = 'vibe_';
  $field1[]=array( // Text Input
  'label' => __('Background Image','vibe-background-image'), // <label>
  'desc'  => __('Background Image for Course Details','vibe-background-image'), // description
  'id'    => $prefix.'course_background_image', // field id and name
  'type'  => 'image' // type of field
  );
  return $field1;
}

add_filter('wplms_course_metabox','custom_course_recommended');
function custom_course_recommended($field1){
  $prefix = 'vibe_';
  $field1[]=array(
    'label'=> __('Recommended Course','vibe-recommended-course' ),
    'text'=>__('Recommended Course','vibe-recommended-course' ),
    'type'=> 'select',
    'options'  => array('H'=>__('Yes','vibe-recommended-course' ),'S'=>__('No','vibe-recommended-course' )),
    'style'=>'',
    'id' => $prefix.'recommended_course',
    'from'=> 'meta',
    'default'=>'S',
    'is_child'=>true,
    'desc'=> __('Recommended Course.','vibe-recommended-course' )
  );
  return $field1;
}

// Set up Cutsom BP navigation
add_action( 'bp_setup_nav', 'my_setup_nav' );
function my_setup_nav() {
      global $bp;

      bp_core_new_nav_item( array( 
            'name' => __( 'Preferences', 'buddypress' ), 
            'slug' => 'preference', 
            'position' => 30,
            'screen_function' => 'preferences_template', 
            'default_subnav_slug' => 'preference',
      ) );

}

// Load a page template for your custom item. You'll need to have an item-one-template.php and item-two-template.php in your theme root.


function bp_page_nav(){
    global $bp;
 
    $user_domain = bp_displayed_user_domain() ? bp_displayed_user_domain() : bp_loggedin_user_domain();
    $course_link = trailingslashit( $user_domain . $bp->course->slug );
    // print_r($bp->course->slug);
    // print_r( $course_link);
    bp_core_new_subnav_item( array(
    'name' => __( 'Active Courses', 'buddypress navigation' ), 
    'slug' => 'course',
    'parent_url' => $user_domain,
    'parent_slug' => $bp->course->slug,
    'screen_function' => 'active_course_template',
    'position' => 20
 
    ) );

    bp_core_new_subnav_item( array(
    'name' => __( 'Recommended Courses', 'buddypress' ), 
    'slug' => 'recommended-course',
    'parent_url' => $course_link,
    'parent_slug' => $bp->course->slug,
    'screen_function' => 'recommended_course_template',
    'position' => 20
 
    ) );

     bp_core_new_subnav_item( array(
    'name' => __( 'Past Courses', 'buddypress' ), 
    'slug' => 'past-course',
    'parent_url' => $course_link,
    'parent_slug' => $bp->course->slug,
    'screen_function' => 'past_course_template',
    'position' => 20
 
    ) );

     bp_core_new_subnav_item( array(
    'name' => __( 'Areas of Interest', 'buddypress navigation' ), 
    'slug' => 'preference',
    'parent_url' => $user_domain.'preference',
    'parent_slug' => 'preference',
    'screen_function' => 'preferences_template',
    'position' => 30
 
    ) );
    
     bp_core_new_subnav_item( array(
    'name' => __( 'Saved Courses', 'buddypress' ), 
    'slug' => 'saved-course',
    'parent_url' => $user_domain.'preference/',
    'parent_slug' => 'preference',
    'screen_function' => 'saved_course_template',
    'position' => 30
    
    ) );

    bp_core_new_subnav_item( array(
    'name' => __( 'Saved Articles', 'buddypress' ), 
    'slug' => 'saved-articles',
    'parent_url' => $user_domain.'preference/',
    'parent_slug' => 'preference',
    'screen_function' => 'saved_articles_template',
    'position' => 30
    
    ) );

    // bp_core_new_subnav_item( array(
    // 'name' => __( 'Referral Code', 'buddypress' ), 
    // 'slug' => 'referral-code',
    // 'parent_url' => $user_domain.'preference/',
    // 'parent_slug' => 'preference',
    // 'screen_function' => 'referral_code_template',
    // 'position' => 30
    
    // ) ); 
}
add_action('bp_setup_nav', 'bp_page_nav', 10 );

function active_course_template() {
      bp_core_load_template( 'active-course' );
}
function recommended_course_template() {
      bp_core_load_template( 'recommended-course' );
}

function past_course_template() {
      bp_core_load_template( 'past-course' );
}
function preferences_template() {
      bp_core_load_template( 'preferences' );
}
function saved_course_template() {
      bp_core_load_template( 'saved-course' );
}
function saved_articles_template() {
      bp_core_load_template( 'saved-articles' );
}
function referral_code_template() {
      bp_core_load_template( 'referral-code' );
} 


// add_action('init','wplms_remove_snapshot_for_all',11);
// function wplms_remove_snapshot_for_all(){
//   remove_action('bp_before_profile_content','show_profile_snapshot');
// }
// add_action('bp_before_profile_content','custom_show_profile_snapshot');

function user_certificate($course_id,$user_id){
   global $bp;
   $certis=vibe_sanitize(get_user_meta($user_id,'certificates',false));
   
     if(isset($certis) && is_Array($certis) && count($certis)){
          if(isset($certis) && is_Array($certis)) 
            foreach($certis as $certi){
              if($certi == $course_id){
                echo '<a href="'.bp_get_course_certificate('user_id='.$user_id.'&course_id='.$course_id).'" target="_blank" class="dwn-box"><span class="dwn-name">Download Certificate</span><span class="dwn-img"><image src="'.get_bloginfo('template_url').'/assets/images/dwn-icon.png"></span><a href="'.bp_get_course_certificate('user_id='.$user_id.'&course_id='.$course_id).'" target="_blank"></a>';
              }
           }
           
    }
}

// Extra Fields for Celebrity API.

add_filter('wplms_course_metabox','custom_artist_name');
function custom_artist_name($field1){
  $prefix = 'vibe_';
  $field1[]=array( // Text Input
  'label' => __('Artist Name','vibe-artist-name'), // <label>
  'desc'  => __('Artist Name','vibe-artist-name'), // description
  'id'    => $prefix.'artist_name', // field id and name
  'type'  => 'text' // type of field
                       );
  return $field1;
   
}

add_filter('wplms_course_metabox','custom_rank');
function custom_rank($field1){
  $prefix = 'vibe_';
  $field1[]=array( // Text Input
  'label' => __('Rank','vibe-rank'), // <label>
  'desc'  => __('Rank','vibe-rank'), // description
  'id'    => $prefix.'rank', // field id and name
  'type'  => 'text' // type of field
                       );
  return $field1;
   
}

add_filter('wplms_course_metabox','custom_artist_profession');
function custom_artist_profession($field1){
  $prefix = 'vibe_';
  $field1[]=array( // Text Input
  'label' => __('Prefession','vibe-artist-profession'), // <label>
  'desc'  => __('Prefession','vibe-artist-profession'), // description
  'id'    => $prefix.'profession', // field id and name
  'type'  => 'text' // type of field
                       );
  return $field1;
   
}

add_filter('wplms_course_metabox','custom_trailer_link');
function custom_trailer_link($field1){
  $prefix = 'vibe_';
  $field1[]=array( // Text Input
  'label' => __('Trailer Link','vibe-trailer-link'), // <label>
  'desc'  => __('Trailer Link','vibe-trailer-link'), // description
  'id'    => $prefix.'trailer_link', // field id and name
  'type'  => 'textarea' // type of field
                       );
  return $field1;
   
}

add_filter('wplms_course_metabox','custom_promocode_applied');
function custom_promocode_applied($field1){
  $prefix = 'vibe_';
  $field1[]=array( // Text Input
  'label' => __('PromoCode Applied','vibe-promocode-applied'), // <label>
  'desc'  => __('PromoCode Applied','vibe-promocode-applied'), // description
  'id'    => $prefix.'promocode_applied', // field id and name
  'type'  => 'text' // type of field
                       );
  return $field1;
   
}

add_filter('wplms_unit_metabox','custom_video');

function custom_video($settings){
  $settings [] = array( // Text Input
    'label' => 'Video Thumbnail', // <label>
    'desc'  => 'Add video thumbnail link', // description
    'id'  => 'vibe_video', // field id and name
    'type'  => 'textarea', // type of field
  );
  return $settings;
}


