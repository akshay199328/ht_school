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
	'name' => 'My Course',
	), 'course' );
}
add_action( 'bp_init', 'rt_change_profile_tab_order', 999 );

function bpcodex_remove_group_manager_subnav_tabs() {   
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
add_action( 'bp_actions', 'bpcodex_remove_group_manager_subnav_tabs' );

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
  'desc'  => __('Background Image','vibe-background-image'), // description
  'id'    => $prefix.'course_background_image', // field id and name
  'type'  => 'image' // type of field
  );
  return $field1;
}