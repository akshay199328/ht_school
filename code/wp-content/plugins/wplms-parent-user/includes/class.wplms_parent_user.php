<?php
/**
 * Parent User Actions hooks React
 *
 * @author 		VibeThemes
 * @category 	Init
 * @package 	parentuser/Includes
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPLMS_PARENT_USER_COMPONENT{

	public static $instance;
    
    public static function init(){

        if ( is_null( self::$instance ) )
            self::$instance = new WPLMS_PARENT_USER_COMPONENT();
        return self::$instance;
    }

	private function __construct(){
        add_action( 'bp_setup_nav', array($this,'add_tab'), 100 );
		add_action('wp_enqueue_scripts',array($this,'scripts'));
		// claim in profile - setting
		//add_filter('vibebp_vars',function($vibebp){ $vibebp['settings']['profile_settings'][] = array('key'=>'wplms_parent_claim','label'=>'Claim');  return $vibebp;});

		add_filter('vibebp_component_icon',array($this,'set_icon'),10,2);
	}

	function set_icon($icon,$component_name){

        if($component_name == WPLMS_PARENT_USER_SLUG ){
            return 'vicon-user';
        }
        return $icon;
    }

	function add_tab(){
		global $bp;
	    bp_core_new_nav_item( array( 
	        'name' => __('Parent','wplms-parent-user'),
	        'slug' => WPLMS_PARENT_USER_SLUG, 
	        'item_css_id' => 'parent_user',
	        'screen_function' => array($this,'show_details'),
	        'default_subnav_slug' => 'home', 
	        'position' => 20
        ) );
        
    }
    
    function show_details(){}



	function scripts(){

		if(function_exists('bp_is_user') && bp_is_user() || apply_filters('vibebp_enqueue_profile_script',false)){

			$blog_id = '';
	        if(function_exists('get_current_blog_id')){
	            $blog_id = get_current_blog_id();
	        }

            
			$vibe_settings=apply_filters('vibeforms_script_args',array(
				'label'=>__('Parent-User','wplms-parent-user'),
				'parent_sidebar_id' => 'parent_sidebar',
				'api'=>array(
	                'url'=>get_rest_url($blog_id,WPLMS_PARENT_USER_API_NAMESPACE),
	            ),
	            'settings'=>array(
	            	'new_article_cap'=>'subscriber',
	            ),
				'translations'=>array(
					'childs'=>__('Childs','wplms-parent-user'),
					'parents'=>__('Parents','wplms-parent-user'),
					'no_parents'=>__('No Parents Found','wplms-parent-user'),
					'no_childs'=>__('No Childs Found','wplms-parent-user'),
					'enter_claim_code'=>__('Enter Claim Code','wplms-parent-user'),
					'claim_here'=>__('Claim Here','wplms-parent-user'),
					'my_code'=>__('My Code','wplms-parent-user'),
					'claim'=>__('Claim','wplms-parent-user'),
					'code_parent_claim_you_as_child' =>__('Your claim code for Guardians/Parents (Parents can claim you as their child using this code)','wplms-parent-user'),
					'code_child_claim_you_as_parent' =>__('Your claim code for Ward/Children ( Child/Student/Wards can claim you as their parent using this code)','wplms-parent-user'),
					'no_codes_found'=>__('No Codes Found','wplms-parent-user'),
					'add_child'=>__('Add Child','wplms-parent-user')
				)
			));


            /***********************Live**********************/
            
			wp_enqueue_script('wplmsparentuser',plugins_url('../assets/js/wplms-parent-user.js',__FILE__),array('wp-element','wp-data'),WPLMS_PARENT_USER_SCRIPT_VERSION,true);
            wp_localize_script('wplmsparentuser','wplmsparentuser',$vibe_settings);
            wp_enqueue_style('wplmsparentuser_css',plugins_url('../assets/css//wplms-parent-user.css',__FILE__),array(),WPLMS_PARENT_USER_SCRIPT_VERSION);
		}
	}
}

WPLMS_PARENT_USER_COMPONENT::init();