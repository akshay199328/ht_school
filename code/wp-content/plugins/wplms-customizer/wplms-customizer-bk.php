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

// function bpcodex_remove_group_manager_subnav_tabs() {   
//     // site admin will see all tabs
//     if ( ! bp_is_group() || ! ( bp_is_current_action( 'admin' ) && bp_action_variable( 0 ) ) || is_super_admin() ) {
//         return;
//     }
//        // all subnav items are listed here.
//        // comment those you want to show
//         $hide_tabs = array(             
//         //  'group-settings'    => 1,
//             'delete-group'      => 1,
//             'change-avatar'      => 1,
//         //  'group-invites'     => 1,
//             'manage-members'    => 1,
//         //  'forum'             => 1,
//         //  'group-cover-image' => 1
//         );
                   
//         $parent_nav_slug = bp_get_current_group_slug() . '_manage';
  
//     //Remove the nav items
//     foreach ( array_keys( $hide_tabs ) as $tab ) {
//         bp_core_remove_subnav_item( $parent_nav_slug, $tab, 'groups' );
//     }   
// }
// add_action( 'bp_actions', 'bpcodex_remove_group_manager_subnav_tabs' );

/* Remove Profile Visisbility Tab From Settings Subnav*/

function bpfr_hide_visibility_tab() {

if( bp_is_active( 'course' ) )

bp_core_remove_subnav_item( 'course', 'course-stats' );
bp_core_remove_subnav_item( 'course', 'quiz_results' );
bp_core_remove_subnav_item( 'course', 'assignment_results' );
bp_core_remove_subnav_item( 'course', 'notes_reviews' );
bp_core_remove_subnav_item( 'course', 'instructor_controls' );
bp_core_remove_subnav_item( 'course', 'manage_courses' );
bp_core_remove_subnav_item( 'course', 'manage_quizzes' );
bp_core_remove_subnav_item( 'course', 'manage_assignments' );
bp_core_remove_subnav_item( 'course', 'manage_students' );
bp_core_remove_subnav_item( 'course', 'manage_questions' );
bp_core_remove_subnav_item( 'course', 'qna' );
bp_core_remove_subnav_item( 'course', 'course_search' );

}

add_action( 'bp_ready', 'bpfr_hide_visibility_tab' );
