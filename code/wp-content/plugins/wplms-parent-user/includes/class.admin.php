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

class Wplms_Parent_User_Admin_Init{

	public static $instance;
    public static function init(){

        if ( is_null( self::$instance ) )
            self::$instance = new Wplms_Parent_User_Admin_Init();
        return self::$instance;
        
    }

	private function __construct(){
		add_action('bp_members_admin_user_metaboxes',array($this,'wplms_user_type_list'), 10,2);
		add_action('wp_ajax_select_users_child',array($this,'select_users_child'));
		add_action('wp_ajax_add_bulk_children',array($this,'add_bulk_children'));
		add_action('wp_ajax_remove_child_users',array($this,'remove_child_users'));

		add_action('admin_enqueue_scripts',array($this,'enqueue_scripts'));
	}



	function remove_child_users(){
		$parent_id = $_POST['parent_id'];
		$child_id = $_POST['child_id'];

		if(delete_user_meta($parent_id, 'vibe_childs', $child_id))
			echo 1;

		die();
    }

    function add_bulk_children(){
		
        $parent_id = $_POST['parent_id'];
        if ( !isset($_POST['security']) || !wp_verify_nonce($_POST['security'],'parent_user') ){
            echo 'Security check failed !';
            die();
        }
        
        $child_users = get_user_meta($parent_id, 'vibe_childs', FALSE);
        
        
        $members = $_POST['members'];
        $html = '';
        foreach($members as $user_id){
          
          	if(!empty($user_id)){
          		if(!in_array($user_id, $child_users)){

          			add_user_meta( $parent_id, 'vibe_childs', $user_id);
          			 $html .= '
				    <li id="s'.$user_id.'">
		                '.bp_core_fetch_avatar ( array( 'item_id' => $user_id, 'type' => 'thumb' ) ).'
		                <strong>'.bp_core_get_user_displayname( $user_id ).'</strong>
		                <a class="tip remove_user_child" data-parent="'.$parent_id.'" data-user="'.$user_id.'" title="" data-original-title="'.__('Remove Child from this Parent','wplms-parent-user').'"><span class="dashicons dashicons-no remove"></span></a>
	                </li>'; 

          		}
          	}
        }
        echo $html;
        die();
    }

	function select_users_child(){
      
       $parent_id = $_POST['parent_id'];
       if ( !isset($_POST['security']) || !wp_verify_nonce($_POST['security'],'parent_user') ){
           echo 'Security check failed !';
           die();
       }
       global $wpdb;
       $term= '';
       if(!empty($_POST['q']['term'])){
           $term = sanitize_text_field($_POST['q']['term']);
       }

       $q = "
           SELECT ID, display_name FROM {$wpdb->users}
           WHERE (
               user_login LIKE '%$term%'
               OR user_nicename LIKE '%$term%'
               OR user_email LIKE '%$term%'
               OR user_url LIKE '%$term%'
               OR display_name LIKE '%$term%'
               )";
       $users = $wpdb->get_results($q);

       $user_list = array();
         // Check for results
       if (!empty($users)) {
           foreach($users as $user){
               $user_list[] = array(
                 'id'=>$user->ID,
                 'image'=>bp_core_fetch_avatar(array('item_id' => $user->ID, 'type' => 'thumb', 'width' => 32, 'height' => 32, 'html'=>false)),
                 'text'=>$user->display_name
               );
           }
           echo json_encode($user_list);
       } else {
           echo json_encode(array('id'=>'','text'=>_x('No Users found !','No users found in Course - admin - add users area','wplms-parent-user')));
       }
       die();
   }

	function wplms_user_type_list($list){

		if(function_exists('bp_get_member_types')) {
			

			if (current_user_can('manage_options') ) {
				
				add_meta_box(
					'bp_members_select_parent_children',
					_x( 'Add Ward', 'Select child', 'wplms-parent-user' ),
					array( $this, 'add_child_model' ),
					get_current_screen()->id,
					'side',
					'core'
				);
			}

		}
	}

	function enqueue_scripts($hook){

		if( $hook == 'users_page_bp-profile-edit'){
			wp_enqueue_script('customselect2-pu',plugins_url('../assets/js/select2.min.js',__FILE__),array('jquery'));
	        wp_enqueue_script('parent-user-js',plugins_url('../assets/js/parent-user.js',__FILE__),array('customselect2-pu'),WPLMS_PARENT_USER_VERSION);
	        wp_enqueue_style('customselect2-pu',plugins_url('../assets/css/select2.min.css',__FILE__));
	        
	        
	        $parent_id = $this->parent_id;

			
			$parent_user_strings = array( 
	            'ajax_url' => admin_url( 'admin-ajax.php' ) ,
	            'more_chars'=> __( 'Please enter more characters','wplms-parent-user'),
	            'security' => wp_create_nonce('parent_user'),
	            'creating' => _x('Adding...','','wplms-parent-user'),
	            'editing' => _x('Editing...','','wplms-parent-user'),
	            'deleting' => _x('Deleting...','','wplms-parent-user'),
	            'unable_add_students' => _x('No User Found','','wplms-parent-user'),
	            'adding_students' => _x('Adding Students','','wplms-parent-user'),
	            'successfuly_added_students' => _x('Student added successfully','','wplms-parent-user'),
	            'parent_id' => $parent_id

	        );

			wp_localize_script( 'parent-user-js', 'parent_user_strings', $parent_user_strings );
		}

	}

	public function add_child_model( $user = null ) {

		

		$parent_id = $user->data->ID;

		
		$child_users = get_user_meta($parent_id, 'vibe_childs', FALSE);

	    ?>
		<div class="add_bulk_children">
			<ul class = "children">
				<?php if(!empty($child_users)) { 
					foreach( $child_users as $child) { 
						$user_id = $child;
						echo '<li id="s'.$user_id.'">
				                '.bp_core_fetch_avatar ( array( 'item_id' => $user_id, 'type' => 'thumb' ) ).'

				                <strong>'.bp_core_get_user_displayname( $user_id ).'</strong>

				                <a class="tip remove_user_child" data-parent="'.$parent_id.'" data-user="'.$user_id.'" title="" data-original-title="'.__('Remove Child from this Parent','wplms-parent-user').'"><span class="dashicons dashicons-no remove"></span></a>
					               
			                </li>'; 
				     }
				} ?>
			</ul>
			<select id="student_usernames" style="width: 100%" class="selectusers" data-placeholder="<?php esc_html_e('Enter Student Usernames/Emails, separated by comma','wplms-parent-user'); ?>" multiple>
			</select>

			<a href="#" id="add_student_to_parent" class="button full"> <?php esc_html_e('Add Children','wplms-parent-user'); ?>  </a>

		</div>
		<style>
		.children li{
		    display: grid;
		    align-items: center;
		    grid-gap: 10px;
		    grid-template-columns: 48px 1fr 10px;
		    margin-bottom: 10px;
		    padding-bottom: 10px;
		}
		.children li img {
		    width: 100%;
		    height: auto;
		    border-radius: 50%;
		}

		.remove_user_child{
			color:#f12857;
		}
		</style><script>window.parent_user_strings.parent_id = <?php echo $parent_id; ?></script>
		<?php 
	}
}

Wplms_Parent_User_Admin_Init::init();