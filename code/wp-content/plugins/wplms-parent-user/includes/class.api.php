<?php
/**
 * WplmsParentUser_Api API
 *
 * @author 		VibeThemes
 * @category 	Init
 * @package 	WplmsParentUser/Includes
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WplmsParentUser_Api{

	public static $instance;
    
    public static function init(){

        if ( is_null( self::$instance ) )
            self::$instance = new WplmsParentUser_Api();
        return self::$instance;
    }

	private function __construct(){
		add_action('rest_api_init',array($this,'register_api_endpoints'));
	}


	function register_api_endpoints(){

        register_rest_route( WPLMS_PARENT_USER_API_NAMESPACE, '/claim-codes', array(
            array(
                'methods'             =>  'POST',
                'callback'            =>  array( $this, 'get_my_claim_codes' ),
                'permission_callback' => array( $this, 'user_permissions_check' ),
            ),
        ));

        register_rest_route( WPLMS_PARENT_USER_API_NAMESPACE, '/new-claim', array(
            array(
                'methods'             =>  'POST',
                'callback'            =>  array( $this, 'new_claim' ),
                'permission_callback' => array( $this, 'user_permissions_check' ),
            ),
        ));
        register_rest_route( WPLMS_PARENT_USER_API_NAMESPACE, '/remove-child', array(
            array(
                'methods'             =>  'POST',
                'callback'            =>  array( $this, 'remove_child' ),
                'permission_callback' => array( $this, 'user_permissions_check' ),
            ),
        ));


        register_rest_route( WPLMS_PARENT_USER_API_NAMESPACE, '/parents', array(
            array(
                'methods'             =>  'POST',
                'callback'            =>  array( $this, 'get_parents' ),
                'permission_callback' => array( $this, 'user_permissions_check' ),
            ),
        ));

        register_rest_route( WPLMS_PARENT_USER_API_NAMESPACE, '/childs', array(
            array(
                'methods'             =>  'POST',
                'callback'            =>  array( $this, 'get_childs' ),
                'permission_callback' => array( $this, 'user_permissions_check' ),
            ),
        ));


        

    }

    function user_permissions_check($request){
    	$body = json_decode($request->get_body(),true);
        if(!empty($body['token'])){
            global $wpdb;
            $this->user = apply_filters('vibebp_api_get_user_from_token','',$body['token']);
            if(!empty($this->user)){
                return true;
            }
        }
        return false;
    }

    function get_user_by_id($id){
        if(empty($this->users[$id])){
            $this->users[$id] = array(
                'user_id'=>$id,
                'nickname'=>bp_core_get_user_displayname($id),
                'image'=>get_avatar_url($id)
            );
        }
        return $this->users[$id];
    }

    function get_my_claim_codes($request){
        $body = json_decode($request->get_body(),true);
        $user_id = $this->user->id;
        $data = array(
            'status' => 1,
            'message' => __('Claim codes found','wplms-parent-user'),
            'codes' => array(
                'child' => wplms_parent_get_child_claim_code($user_id),
                'parent' => wplms_parent_get_parent_claim_code($user_id)
            )
        );
        $data = apply_filters('wplms_parent_user_get_my_claim_code',$data,$request);
        return new WP_REST_Response($data, 200);
    }

    function remove_child($request){
        $body = json_decode($request->get_body(),true);
        $child_id = $body['child'];
        $user_id = $this->user->id;
        $deleted = delete_user_meta($user_id, 'vibe_childs', $child_id);
        $return  = array('status'=>false,'message'=>_x('Something went wrong','','wplms-parent-user'));
        if($deleted){
            $return  = array('status'=>true,'message'=>_x('Child Removed','','wplms-parent-user'));
        }
        return new WP_REST_Response($return, 200);
    }

    function new_claim($request){
        $body = json_decode($request->get_body(),true);
        $code = $body['code'];
        $user_id = $this->user->id;
        if(!empty($code)){
            global $wpdb;
            $child_id_array = $wpdb->get_results($wpdb->prepare("SELECT user_id,meta_key FROM {$wpdb->usermeta} WHERE meta_key IN ('child_claim_code','parent_claim_code') AND meta_value = '%s'",$code),ARRAY_A);
            if(!empty($child_id_array)){
                $child_id = $child_id_array[0]['user_id'];
                if($this->user->id==$child_id){
                    if($child_id_array[0]['meta_key']== 'parent_claim_code'){
                        $data = array('status'=>0,'message'=>__('You cannot become your own parent!','wplms-parent-user'));
                        return new WP_REST_Response($data, 200);
                    }else{
                        $data = array('status'=>0,'message'=>__('You cannot become your own child!','wplms-parent-user'));
                        return new WP_REST_Response($data, 200);
                    }
                    
                }
                if($child_id_array[0]['meta_key'] == 'parent_claim_code'){
                    $parent_id = $child_id;
                    $children = wplms_parent_get_children($parent_id);
                    if(!in_array($child_id,$children)){
                        wplms_parent_add_child($parent_id,$user_id);
                        $data = Array('status'=>1,'message'=>__('Parent Added','wplms-parent-user'));
                    }else{
                        $data = Array('status'=>0,'message'=>__('User already a child','wplms-parent-user'));
                    }
                }
                if($child_id_array[0]['meta_key'] == 'child_claim_code'){
                    $children = wplms_parent_get_children($user_id);
                    if(!in_array($child_id,$children)){
                        wplms_parent_add_child($user_id,$child_id);
                        $data = Array('status'=>1,'message'=>__('Child Added','wplms-parent-user'));
                    }else{
                        $data = Array('status'=>0,'message'=>__('User already a child','wplms-parent-user'));
                    }
                }
            }else{
                $data = Array('status'=>0,'message'=>__('Invalid code !','wplms-parent-user'));
            }
        }else{
            $data = Array('status'=>0,'message'=>__('Data missing!','wplms-parent-user'));
        }
        $data = apply_filters('wplms_parent_user_new_claim',$data,$request);
        return new WP_REST_Response($data, 200);
    }

    function get_parents($request){
        $parents = wplms_parent_get_parents($this->user->id);
        $users = array();
        $data = array('status'=>0,'message'=>__('No Parents Found','wplms-parent-user'));
        if(!empty($parents) && count($parents)){
            foreach ($parents as $key => $id) { $users[] = $this->get_user_by_id($id); }
            $data = array( 'status' => 1, 'parents' => $users, 'message' => __('Parents Found','wplms-parent-user'));
        }
        $data = apply_filters('wplms_parent_user_get_parents',$data,$request);
        return new WP_REST_Response($data, 200);
    }

    function get_childs($request){
        $childs = wplms_parent_get_children($this->user->id);
        $users = array();
        $data = array('status'=>0,'message'=>__('No Parents Found','wplms-parent-user'));
        if(!empty($childs) && count($childs)){
            foreach ($childs as $key => $id) { $users[] = $this->get_user_by_id($id); }
            $data = array( 'status' => 1, 'childs' => $users, 'message' => __('Parents Found','wplms-parent-user'));
        }
        $data = apply_filters('wplms_parent_user_get_childs',$data,$request);
        return new WP_REST_Response($data, 200);
    }

    


}

WplmsParentUser_Api::init();