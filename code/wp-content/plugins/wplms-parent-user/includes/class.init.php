<?php
/**
 * WPLMS PARENT USER Init
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

class Wplms_Parent_User_Init{

	public static $instance;
    public static function init(){

        if ( is_null( self::$instance ) )
            self::$instance = new Wplms_Parent_User_Init();
        return self::$instance;
        
    }

	private function __construct(){
		
		add_action( 'bp_setup_nav', array($this,'adding_children_setup_nav' ),10);
		add_action( 'bp_setup_nav', array($this,'claim_code_setup_nav' ),1);

		add_filter('wplms_dashboard_student_id',array($this,'reset_to_child_id'));

		add_filter('lms_general_settings',array($this,'set_parent_member_type'));
		add_filter('wplms_dashboard_widget_scripts',array($this,'dashboard_scripts'));

		add_action('wp_enqueue_scripts',array($this,'enqueue_scripts'));

		add_action('wp_ajax_claim_user_code',array($this,'claim_user_code'));

		add_filter('wplms_verify_user_id',array($this,'verify_parent'),10,2);

		
		add_filter('vibebp_member_dashboard',array($this,'student_instructor_sidebar'),1,2);
	}

	function student_instructor_sidebar($sidebar,$user_id){
		if($sidebar=='parent_sidebar'){
			$inits = WPLMS_4_Filters::init();
			remove_filter('vibebp_member_dashboard',array($inits,'student_instructor_sidebar'),10,2);
		}
		return $sidebar;
	}
		
	function verify_parent($user,$child_user_id){
		$childs = get_user_meta( $user->id, 'vibe_childs',false);
		if(in_array($child_user_id, $childs)){
			$user = get_user_by('id',$child_user_id);
        	$user->id = $child_user_id;
		}
		return $user;
	}

	function claim_code_setup_nav(){

		//if(bp_current_component() == 'settings' && bp_current_action() == 'general'){

			bp_core_new_subnav_item(
					array(
					'name' 		  => __('Claim Parent/Child','wplms-parent-user'),
					'slug' 		  => _x('claim','parent slug','wplms-parent-user'),
					'parent_slug'     => bp_get_settings_slug(),
					'parent_url'      => bp_core_get_user_domain( bp_displayed_user_id() ).'/'.bp_get_settings_slug().'/',
					'screen_function' => array($this,'student_claim_code'),
					'position' 	  =>  $position,
					'user_has_access' => (bp_is_my_profile() || current_user_can('manage_options')) // Only the logged in user can access this on his/her profile
				)
			);

		//}
	}

	function student_claim_code(){
		add_action( 'bp_template_title',  function(){_ex('Claim Parent/Child','title in profile settings','wplms-parent-user');},1);
		add_action( 'bp_template_content',  array($this,'student_claim_screen_content' ),1);

		bp_core_load_template( apply_filters( 'bp_core_template_plugin',  'members/single/plugins' ) );
	}

	function student_claim_screen_content(){

	  	$code = wplms_parent_get_child_claim_code();
	  	?>
	  	<div class="wplms_parent_user_claim_block_wrapper">
		  	<div class="claim_your_parent claim_settings_block">
	   			<span><?php _e('Your claim code for Guardians/Parents (Parents can claim you as their child using this code) ','wplms-parent-user'); ?></span>
	   			<strong><?php echo ($code); ?></strong>
		   </div>
	  	<?php

	  	$code = wplms_parent_get_parent_claim_code();
	  	?>
		  	<div class="claim_your_student claim_settings_block">
	   			<span><?php _e('Your claim code for Ward/Children ( Child/Student/Wards can claim you as their parent using this code )','wplms-parent-user'); ?></span>
	   			<strong><?php echo ($code); ?></strong>
		   </div>
		   <div class="claim_settings_block wplms_parent_input_block">
		   		<input type="text" class="claim_ward_code" name="claim_ward_code" placeholder="<?php _e('Enter Claim Code','wplms-parent-user'); ?>">
		   		<a class="button center claim_user"><?php _e('Claim','wplms-parent-user'); ?></a>
		   		<?php wp_nonce_field('security','security'); ?>
		   </div>
	    </div>
	    <?php 

	  	$children = wplms_parent_get_children(bp_displayed_user_id());

	  	if(!empty($children)){
	  		?>
	  		<h3 class="title"><span><?php _e('Your Chidren','wplms-parent-user'); ?></span></h3>
	  		<div class="wplms_parent_children_wrapper">
	  			<?php
	  			foreach($children as $user_id){
	  				echo '<div class="wplms_parent_user">
	  				<img src="'.bp_core_fetch_avatar(array(
								'item_id' => $user_id,
								'object'  => 'user',
								'html'	  => false
							)).'" /><span>'.bp_core_get_user_displayname($user_id).'</span>
	  				</div>';
	  			}
	  			?>
	  		</div>
	  		<?php
	  	}

	  	$parents = wplms_parent_get_parents(bp_displayed_user_id());
	  	if(!empty($parents)){
	  		?>
	  		<h3 class="title"><span><?php _e('Your Parents','wplms-parent-user'); ?></span></h3>
	  		<div class="wplms_parent_parents_wrapper">
	  			<?php
	  			foreach($parents as $user_id){
	  				echo '<div class="wplms_parent_user">
	  				<img src="'.bp_core_fetch_avatar(array(
								'item_id' => $user_id,
								'object'  => 'user',
								'html'	  => false
							)).'" /><span>'.bp_core_get_user_displayname($user_id).'</span>
	  				</div>';
	  			}
	  			?>
	  		</div>
	  		<?php
	  	}
	  	?>
	   <style>
	   .wplms_parent_user_claim_block_wrapper{
	   	border:1px solid rgba(0,0,0,0.08);
	   	padding:10px;
	   }
	    .claim_settings_block{
	   		margin:10px 0 0;
	   		display:grid;grid-gap:10px;
	   		grid-template-columns:2fr 1fr;align-items:center;
	    }.claim_settings_block strong{
	    	padding:10px;background:rgba(0,0,0,0.02);
	    	border-radius:5px;
	    }.wplms_parent_children_wrapper,.wplms_parent_parents_wrapper {
		    margin: 10px 0;
		    display: grid;grid-gap:10px;
		    grid-template-columns: repeat(auto-fill,minmax(120px,180px));
		}
		.wplms_parent_user {
		    display: grid;
		    grid-template-columns: 48px 1fr;
		    align-items: center;
		    grid-gap: 10px;
		    padding: 10px;
		    border: 1px solid rgba(0,0,0,0.08);
		}

		.wplms_parent_user img {
		    width: 100%;
		    height: auto;
		    border-radius: 50%;
		}
		</style>
		<script>
			jQuery(document).ready(function($){
				$('.claim_ward_code').on('keyup',function(){
					$('.wplms_parent_input_block .message').remove();
				});
				$('.claim_user').on('click',function(){

					$('.wplms_parent_input_block .message').remove();
					
					if($(this).hasClass('loading'))
						return;
					let $this = $(this);
					$(this).addClass('loading');
					$.ajax({
			          	type: "POST",
			          	url: ajaxurl,
			          	dataType:'json',
			          	data: { action: 'claim_user_code',
			                  security:$('#security').val(),
			                  code:$('.claim_ward_code').val(),
			                  user_id: <?php echo bp_displayed_user_id(); ?>
			                },
			          	cache: false,
			          	success: function (json) {
			          		$this.removeClass('loading');
			            	if(json.status){
			            		$('.wplms_parent_input_block').append('<div class="message success">'+json.message+'</div>');
			            	}else{
			            		$('.wplms_parent_input_block').append('<div class="message error">'+json.message+'</div>');
			            	}
			          	}
			        });
				});
			});
		</script>
	  	<?php

	}

	function enqueue_scripts(){
		global $bp;

		if(bp_current_component() == 'children'){
			wplms_dashboard_widget_scripts();
		}
	}

	function dashboard_scripts($arr){
		global $bp;
		$arr[]='children';
		return $arr;
	}
	function set_parent_member_type($args){

		$args[]=array(
					'label'=>__('WPLMS Parent User Role','vibe-customtypes' ),
					'type'=> 'heading',
				);
		$args[]=array(
						'label' => __('Student Login redirect','vibe-customtypes'),
						'name' =>'student_login_redirect',
						'class' => '',
						'type' => 'select',
						'options'=>Array(),
					);
		return $args;
	}
	function reset_to_child_id($user_id){
		if(!empty($this->get_child_data()) && !empty(bp_current_action())){

			if(!empty($this->get_child_data(bp_current_action())) ){
				return $this->get_child_data(bp_current_action())->ID;
			}

		}

		return $user_id;
	}
	/**
	 * adds the profile user nav link
	 */

	function adding_children_setup_nav($user) {

	  	$parent_id = bp_displayed_user_id();
	  	//get user meta for multiple children
	  	$child_users = get_user_meta($parent_id, 'vibe_childs', FALSE);

	  	if(!empty($child_users)) {

	  		global $bp;

		  	$children = __('children','wplms-parent-user');

		  	$parent_link = trailingslashit( bp_loggedin_user_domain() . $children );

		    
		  	$first_user = array();
			//foreach usermeta fetch the child name and slug and run subnav item in loop
			$position = 0;
			foreach($child_users as $user_id) {
	  			$user_data = get_userdata($user_id);
	  			if(empty($first_user)){
					$first_user = $user_data;

					$args = apply_filters('wplms_parent_user_children_setup_nav',array(
					    'name' => __( 'Children', 'wplms-parent-user' ),
					    'slug' => $children,
					    'default_subnav_slug' => $first_user->user_nicename,
					    'position' => 80,
					    'screen_function' => array($this,'action_child_content'),
					    'item_css_id' => 'children',
				    ));

				  	bp_core_new_nav_item( $args );
	  			}
	  			$this->child_data[$user_data->user_nicename] = $user_data;
	  			$position+=30;
	  			bp_core_new_subnav_item(
	  				array(
						'name' 		  => $user_data->display_name,
						'slug' 		  => $user_data->user_nicename,
						'parent_slug'     => $children,
						'parent_url'      => $parent_link,
						'screen_function' => array($this,'action_child_content'),
						'position' 	  =>  $position,
						'user_has_access' => (bp_is_my_profile() || current_user_can('manage_options')) // Only the logged in user can access this on his/her profile
					)
				);
	  		}
	  	} 
	}

	function get_child_data($slug = null){
		if(!empty($slug)){
			return $this->child_data[$slug];
		}
		return $this->child_data;
	}



	function action_child_content() {
		add_action('bp_template_title',array($this,'child_content_title'));
		add_action('bp_template_content',array($this,'child_content'));
		bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );		
		exit;
	}

	function child_content_title(){
		echo $this->child_data[bp_current_action()]->display_name;
	}

	function child_content() {
		?>
		<div class="row">
		<?php
		$sidebar = apply_filters('wplms_parent_sidebar','parent_sidebar');
       	if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : endif;
       	?>
       	</div>
       	<?php
	}

	 function get_child_course_data($user_id) {
	 	echo $user_id;
	 }

	 function claim_user_code(){

      	if ( !isset($_POST['security']) || !wp_verify_nonce($_POST['security'],'security') || !is_user_logged_in() || strlen($_POST['code']) !== 12){
         	_e('Security check Failed. Contact Administrator.','wplms-parent-user');
         	die();
      	}

      	$code = $_POST['code'];
      	$user_id = intval($_POST['user_id']);

      	if($user_id === get_current_user_id() && !current_user_can('manage_options')){
      		echo json_encode(Array('status'=>0,'message'=>__('Can not add yourself as child or parent !','wplms-parent-user')));
      	}

      	global $wpdb;
      	$child_id_array = $wpdb->get_results($wpdb->prepare("SELECT user_id,meta_key FROM {$wpdb->usermeta} WHERE meta_key IN ('child_claim_code','parent_claim_code') AND meta_value = '%s'",$code),ARRAY_A);

      	if(!empty($child_id_array)){
      		$child_id = $child_id_array[0]['user_id'];

      		if($child_id_array[0]['meta_key'] == 'parent_claim_code'){
      			$parent_id = $child_id;

      			$children = wplms_parent_get_children($parent_id);

      			if(!in_array($child_id,$children)){
		      		wplms_parent_add_child($parent_id,$user_id);
		      		echo json_encode(Array('status'=>1,'message'=>__('Parent Added','wplms-parent-user')));
		      		
		      	}else{
		      		echo json_encode(Array('status'=>0,'message'=>__('User already a child','wplms-parent-user')));
		      	}
      		}
      		if($child_id_array[0]['meta_key'] == 'child_claim_code'){
      			$children = wplms_parent_get_children($user_id);

		      	if(!in_array($child_id,$children)){
		      		wplms_parent_add_child($user_id,$child_id);
		      		echo json_encode(Array('status'=>1,'message'=>__('Child Added','wplms-parent-user')));
		      		
		      	}else{
		      		echo json_encode(Array('status'=>0,'message'=>__('User already a child','wplms-parent-user')));
		      	}
      		}
      	}else{
      		echo json_encode(Array('status'=>0,'message'=>__('Invalid code !','wplms-parent-user').$wpdb->prepare("SELECT user_id,meta_key FROM {$wpdb->usermeta} WHERE meta_key IN ('child_claim_code','parent_claim_code') AND meta_value = %s",$code)));
      	}

      	

      	die();
	}
}
Wplms_Parent_User_Init::init();



