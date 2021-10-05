<?php
/**
 * WPLMS S3 Init
 *
 * @author 		VibeThemes
 * @category 	Admin
 * @package 	Wplms-Parent-User/Includes
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/*@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
		* ADDED SELECT CHILD OPTION IN USER PROFILE
		* NOT ADDED PARENT ID IN CHILD PROFILE
		* DATA SAVED IN USER META

		* Each sub-tab profile content : Courses (with progress, attendance), Results, (optional ->) Activity , Messages ( if active ), Notifications ( if active) Dashboard Widget for Parent : Student card direct access.
		* By pass Profile Visibility option set in Vibe options panel for parent.
		* provision : Download Child Student's results , right from dashboard


@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@*/

class Wplms_Parent_Dashboard_Init{

	public static $instance;
    public static function init(){

        if ( is_null( self::$instance ) )
            self::$instance = new Wplms_Parent_Dashboard_Init();
        return self::$instance;
        
    }

    function __construct(){
    	add_action('widgets_init',array($this,'parent_sidebar'));

    	// Add parent widgets
    }


	function parent_sidebar(){
		if(function_exists('register_sidebar')){
			register_sidebar( array(
				'name' => __('Parent Sidebar','wplms-parent-user'),
				'id' => 'parent_sidebar',
				'before_widget' => '<div id="%1$s" class="%2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="dash_widget_title">',
				'after_title' => '</h4>',
		        'description'   => __('This is the dashboard sidebar for Parents','wplms-parent-user')
			) );
		}
	}
}

Wplms_Parent_Dashboard_Init::init();
