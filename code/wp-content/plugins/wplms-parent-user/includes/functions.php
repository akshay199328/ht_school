<?php
/*
General purpose functions
*/
if ( !defined( 'ABSPATH' ) ) exit; 


function wplms_parent_get_children($user_id){

	$children = apply_filters('wplms_parent_get_children',array(),$user_id);
	if(empty($children)){
		$children = get_user_meta($user_id,'vibe_childs',false);	
	}

	return $children;
}

function wplms_parent_get_parents($user_id){
	$parents = apply_filters('wplms_parent_get_parents',array(),$user_id);
	if(empty($parents)){
		global $wpdb;
		$parent_arr = $wpdb->get_results("SELECT user_id FROM {$wpdb->usermeta} WHERE meta_key = 'vibe_childs' AND meta_value = '$user_id'");
		if(!empty($parent_arr)){
			foreach($parent_arr as $parent){
				$parents[]=$parent->user_id;
			}
		}
	}
	return $parents;
}

function wplms_parent_get_child_claim_code($user_id=0){
	if(empty($user_id)){
		$user_id = bp_displayed_user_id();
	}
	$code = get_user_meta($user_id,'child_claim_code',true);
  	if(empty($code)){
  		$code = wp_generate_password(12,false,false);
  		update_user_meta($user_id,'child_claim_code',$code);
  	}
  	return $code;
}


function wplms_parent_get_parent_claim_code($user_id=0){
	if(empty($user_id)){
		$user_id = bp_displayed_user_id();
	}
	$code = get_user_meta($user_id,'parent_claim_code',true);
  	if(empty($code)){
  		$code = wp_generate_password(12,false,false);
  		update_user_meta($user_id,'parent_claim_code',$code);
  	}
  	return $code;
}
	 


function wplms_parent_add_child($parent_id,$child_id){
	add_user_meta($parent_id,'vibe_childs',$child_id);
}

