<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if (!session_id()) {
    session_start();
}

if(!defined('WPLMS_THEME_FILE_INCLUDE_PATH')){
	define('WPLMS_THEME_FILE_INCLUDE_PATH',get_template_directory());
	//use this if you want to overwrite core functions from includes directory with your child theme
	//copy includes and _inc folder into your child them and define path constant to child theme
	
	//define('WPLMS_THEME_FILE_INCLUDE_PATH',get_stylesheet_directory());
}

if(defined('WPLMS_THEME_FILE_INCLUDE_PATH')){
	// Essentials
	include_once WPLMS_THEME_FILE_INCLUDE_PATH.'/includes/config.php';
	include_once WPLMS_THEME_FILE_INCLUDE_PATH.'/includes/init.php';

	// Register & Functions
	include_once WPLMS_THEME_FILE_INCLUDE_PATH.'/includes/register.php';
	include_once WPLMS_THEME_FILE_INCLUDE_PATH.'/includes/actions.php';
	include_once WPLMS_THEME_FILE_INCLUDE_PATH.'/includes/filters.php';
	include_once WPLMS_THEME_FILE_INCLUDE_PATH.'/includes/class.upgrade.php';
	include_once WPLMS_THEME_FILE_INCLUDE_PATH.'/includes/func.php';
	include_once WPLMS_THEME_FILE_INCLUDE_PATH.'/includes/ratings.php'; 
	// Customizer
	include_once WPLMS_THEME_FILE_INCLUDE_PATH.'/includes/customizer/customizer.php';
	include_once WPLMS_THEME_FILE_INCLUDE_PATH.'/includes/customizer/css.php';
	include_once WPLMS_THEME_FILE_INCLUDE_PATH.'/includes/vibe-menu.php';
	include_once WPLMS_THEME_FILE_INCLUDE_PATH.'/includes/notes-discussions.php';
	include_once WPLMS_THEME_FILE_INCLUDE_PATH.'/includes/wplms-woocommerce-checkout.php';

	if ( function_exists('bp_get_signup_allowed')) {
	    include_once WPLMS_THEME_FILE_INCLUDE_PATH.'/includes/bp-custom.php';
	}

	include_once WPLMS_THEME_FILE_INCLUDE_PATH.'/_inc/ajax.php';
	include_once WPLMS_THEME_FILE_INCLUDE_PATH.'/includes/buddydrive.php';
	//Widgets
	include_once WPLMS_THEME_FILE_INCLUDE_PATH.'/includes/widgets/custom_widgets.php';
	if ( function_exists('bp_get_signup_allowed')) {
	 include_once WPLMS_THEME_FILE_INCLUDE_PATH.'/includes/widgets/custom_bp_widgets.php';
	}
	if (function_exists('pmpro_hasMembershipLevel')) {
	    include_once WPLMS_THEME_FILE_INCLUDE_PATH.'/includes/pmpro-connect.php';
	}
	include_once WPLMS_THEME_FILE_INCLUDE_PATH.'/includes/widgets/advanced_woocommerce_widgets.php';
	include_once WPLMS_THEME_FILE_INCLUDE_PATH.'/includes/widgets/twitter.php';
	include_once WPLMS_THEME_FILE_INCLUDE_PATH.'/includes/widgets/flickr.php';

	//Misc
	include_once WPLMS_THEME_FILE_INCLUDE_PATH.'/includes/extras.php';

	//SETUP
	include_once WPLMS_THEME_FILE_INCLUDE_PATH.'/setup/wplms-install.php';
}
	
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_bootstrap_starter_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Competitive Section', 'wp-bootstrap-starter' ),
        'id'            => 'competitive-section',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'All Courses Sidebar', 'wp-bootstrap-starter' ),
        'id'            => 'all-courses-sidebar',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Home Hero Section', 'wp-bootstrap-starter' ),
        'id'            => 'home-hero-section',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Banner1', 'wp-bootstrap-starter' ),
        'id'            => 'banner-1',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Banner2', 'wp-bootstrap-starter' ),
        'id'            => 'banner-2',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Banner3', 'wp-bootstrap-starter' ),
        'id'            => 'banner-3',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Banner4', 'wp-bootstrap-starter' ),
        'id'            => 'banner-4',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Banner5', 'wp-bootstrap-starter' ),
        'id'            => 'banner-5',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
      'name'          => esc_html__( 'Saved Posts', 'wp-bootstrap-starter' ),
      'id'            => 'saved-posts',
      'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'wp_bootstrap_starter_widgets_init' );
// wp_enqueue_style( 'wplms-aos', get_template_directory_uri(). '/assets/vendor/aos/aos.css' );
wp_enqueue_style( 'wplms-customizer-css2', get_template_directory_uri(). '/style.css' );
wp_enqueue_style( 'wplms-custom', get_template_directory_uri(). '/custom.css' );
wp_enqueue_style( 'wplms-bootstrap-icons', get_template_directory_uri(). '/assets/vendor/bootstrap-icons/bootstrap-icons.css' );
wp_enqueue_style( 'wplms-bootstrap', get_template_directory_uri(). '/assets/vendor/bootstrap/css/bootstrap.css' );
wp_enqueue_style( 'wplms-font', get_template_directory_uri(). '/assets/css/font.css' );
wp_enqueue_style( 'wplms-owl-carousel', get_template_directory_uri(). '/assets/css/owl.carousel.min.css' );
wp_enqueue_style( 'wplms-navigation', get_template_directory_uri(). '/navigation.css' );
wp_enqueue_style( 'wplms-responsive', get_template_directory_uri(). '/assets/css/responsive.css' );
// wp_enqueue_script( 'wplms-aos-js', get_template_directory_uri(). '/assets/vendor/aos/aos.js', '', '', true );
/*add_action('wp_enqueue_scripts', 'no_more_jquery');
function no_more_jquery(){
    wp_deregister_script('jquery');
}*/
wp_enqueue_script( 'wplms-jquery', get_template_directory_uri(). '/assets/js/jquery.min.js', '', '', true );
wp_enqueue_script( 'wplms-carousel', 'https://cdn.boomcdn.com/libs/owl-carousel/2.3.4/owl.carousel.min.js', '', '', true );
// wp_enqueue_script( 'wplms-owl', get_template_directory_uri(). '/assets/js/owl-carousel.min.js', '', '', true );
wp_enqueue_script( 'wplms-main-js', get_template_directory_uri(). '/assets/js/main.js', '', '', true );
wp_enqueue_script( 'wplms-mobile-js', get_template_directory_uri(). '/assets/js/mobile.js', '', '', true );
wp_enqueue_script( 'wplms-navigation', get_template_directory_uri(). '/assets/js/navigation-custom.js', '', '', true );
// add_filter( 'wp_nav_menu_items','add_search_box', 10, 2 );
// function add_search_box( $items, $args ) {
//     if( !($args->theme_location == 'top-menu') ) 
//     return $items;
//     $searchbox = '<li class="search-icon"><a id="new_searchicon"><i class="bi bi-search"></i></a></li>';

//     return $searchbox.$items;

// }

/*
 * Set post views count using post meta
 */
function setPostViews($postID) {
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '0');
    }else{
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}


function the_course_price($args=NULL){
  echo get_the_course_price($args);
}


function get_the_course_price($args=NULL){
  $defaults=array(
    'course_id' =>get_the_ID(),
    );
  $r = wp_parse_args( $args, $defaults );
  extract( $r, EXTR_SKIP );

  $precourse=get_post_meta($course_id,'vibe_pre_course',true);
  $maximum = bp_course_get_max_students($course_id); 
  $badge=get_post_meta($course_id,'vibe_course_badge',true);
  $certificate=get_post_meta($course_id,'vibe_course_certificate',true);

  $level = vibe_get_option('level');
  if(isset($level) && $level)
    $levels=get_the_term_list( $course_id, 'level', '', ', ', '' );

  $location = vibe_get_option('location');
  if(isset($location) && $location)
    $location=get_the_term_list( $course_id, 'location', '', ', ', '' );

  $pre_course_html = '';
  if(!empty($precourse)){
    if(is_numeric($precourse)){
      $pre_course_html = '<a href="'.get_permalink($precourse).'">'.get_the_title($precourse).'</a>';
    }else if(is_array($precourse)){
       foreach($precourse as $k => $pre_course_id){
          $pre_course_html .= (empty($k)?'':' , ').'<a href="'.get_permalink($pre_course_id).'">'.get_the_title($pre_course_id).'</a>';
       }
    }
  }

  //Check Partial free course setting.
  $partial = 0;
  $partial_free_course = get_post_meta($course_id,'vibe_partial_free_course',true);
  if( vibe_validate($partial_free_course) ){
    if( is_user_logged_in() ){
      $partial = 1;
    }else{
      $partial = 0;
    }
  }

  // Display Course Details
  $course_details = array(
    'price' => bp_course_get_course_credits(array('id'=>$course_id,'partial'=>$partial)),
   /* 'precourse'=>(empty($precourse)?'':'<li class="course_precourse"><i class="icon-clipboard-1"></i> '.__('* REQUIRES','wplms').' '.$pre_course_html.' </li>'),
    'time' => '<li class="course_time"><i class="icon-clock"></i>'.get_the_course_time('course_id='.$course_id).'</li>',
    'location' => ((isset($location) && $location && strlen($location)>5)?'<li class="course_location"><i class="icon-map-pin-5"></i> '.$location.'</li>':''),
    'level' => ((isset($level) && $level && strlen($levels)>5)?'<li class="course_level"><i class="icon-bars"></i> '.$levels.'</li>':''),
    'seats' => ((isset($maximum) && is_numeric($maximum) && $maximum < 9999 )?'<li class="course_seats"><i class="icon-users"></i> '.$maximum.' '.__('SEATS','wplms').'</li>':''),
    'badge' => ((isset($badge) && $badge && $badge !=' ')?apply_filters('wplms_show_badge_popup_in_course_details','<li class="course_badge"><i class="icon-award-stroke"></i> '.__('Course Badge','wplms').'</li>',$course_id):''),

    'certificate'=> (vibe_validate($certificate)?apply_filters('wplms_show_certificate_popup_in_course_details','<li class="course_certificate"><i class="icon-certificate-file"></i>  '.__('Course Certificate','wplms').'</li>',$course_id):''),*/
    );

  $course_details = apply_filters('wplms_course_details_widget',$course_details,$course_id);

  global $post;
  $return =''; 
  foreach($course_details as $course_detail){
    if(isset($course_detail) && strlen($course_detail) > 5)
      $return .=$course_detail;
  }
  $return .=  '';
   return apply_filters('wplms_course_front_details',$return);
}


/*
*  GET COURSE CURRICULUM`
*/

if(!function_exists('ht_course_get_full_course_curriculum')){
  function ht_course_get_full_course_curriculum($course_id = NULL){
    $curriculum=array();
    global $post;
    if(empty($course_id) && $post->post_type == 'course')
      $course_id = $post->ID;

    if(!isset($course_id) || !is_numeric($course_id))
      return $curriculum;

    $course_items = bp_course_get_curriculum($course_id);
    if(!empty($course_items)){
      foreach($course_items as $key => $item){
        if(is_numeric($item)){
          $type = bp_course_get_post_type($item);
          $labels = $free_access = '';

          if($type == 'unit'){
            $vibe_type = get_post_meta($item,'vibe_type',true);
            $free_access = get_post_meta($item,'vibe_free',true);
            $labels = (vibe_validate($free_access)?'<span class="free">'.__('FREE','wplms').'</span>':'');  
          } 
          
          $duration = get_post_meta($item,'vibe_duration',true);
          if( empty($duration) )
            $duration = 0;
          $duration_parameter = apply_filters("vibe_".$type."_duration_parameter",60,$item);
          $total_duration = $duration*$duration_parameter;
          $duration = '<span class="time"><i class="vicon vicon-time"></i> '.(($duration >9998)?_x('Unlimited','Unlimited unit duration label','wplms'):(($total_duration >= 86400)?tofriendlytime($total_duration):gmdate("H:i:s",$total_duration))).'</span>';
          $curriculum_course_link = apply_filters('wplms_curriculum_course_link',0,$item,$course_id);

          $link = '';
          if(( vibe_validate($free_access) || (is_user_logged_in() && $post->post_author == get_current_user_id()) || current_user_can('manage_options') || $curriculum_course_link)){
            if(empty($curriculum_course_link)){
              $link = get_permalink($item);
              if(strpos($link, '?')){$link.='&';}else{$link .='?';}
              $link .='id='.$course_id;
            }else{
              $link = $curriculum_course_link;
            }
          }

          $curriculum[] = array(
            'id'    =>  $item,
            'key'   =>  $key,
            'type'    =>  $type,
            'icon'    =>  wplms_get_element_icon(wplms_get_element_type($item,$type)),
            'labels'  =>  apply_filters('bp_course_curriculum_item_labels',$labels,$item,$type),
            'title'   =>  get_the_title($item),
            'link'    =>  $link,  
            'duration'  =>  $duration,
            'extras'  =>  apply_filters('course_curriculum_extras',0,$item),
            'vibe_type'  =>  $vibe_type
          );  
        }else{
          $curriculum[] = array(
            'type'  =>  'section',
            'key' =>  $key,
            'title' =>  $item
          );  
        }
        
      }
    }

    return apply_filters('bp_course_get_full_course_curriculum',$curriculum,$course_id);
  }
}

// if ( (isset($_GET['action']) && $_GET['action'] != 'logout') || (isset($_POST['login_location']) && !empty($_POST['login_location'])) ) {
//     add_filter('login_redirect', 'my_login_redirect', 10, 3);
//     function my_login_redirect() {
//         $location = $_SERVER['HTTP_REFERER'];
//         wp_safe_redirect($location);
//         exit();
//     }
// }


function wpb_custom_new_menu() {
  // register_nav_menu('sidebar-menu',__( 'Sidebar Menu' ));
  register_nav_menus( array(
    'sidebar-menu' => esc_html__( 'Sidebar Menu'),
    'contact-menu' => esc_html__( 'Contact Menu'),
  ) );
}
add_action( 'init', 'wpb_custom_new_menu' );

function wpb_news_menu() {
  // register_nav_menu('sidebar-menu',__( 'Sidebar Menu' ));
  register_nav_menus( array(
    'news-menu' => esc_html__( 'News Menu'),
  ) );
}
add_action( 'init', 'wpb_news_menu' );

// Options Panel
get_template_part('vibe','options');

if ( (isset($_GET['action']) && $_GET['action'] != 'logout') || (isset($_POST['login_location']) && !empty($_POST['login_location'])) ) {
    add_filter('login_redirect', 'my_login_redirect', 10, 3);
    function my_login_redirect() {
        $location = $_SERVER['HTTP_REFERER'];
        wp_safe_redirect($location);
        exit();
    }
}

//   if(is_user_logged_in()){
// add_filter('wplms_take_this_course_button_label',function($credits){

//   return '<strong><span class="coming_soon">Join Course</span></strong>';

// });
// }

// Login Functionality
add_action("wp_ajax_reg_send_otp", "reg_send_otp");
add_action( 'wp_ajax_nopriv_reg_send_otp', 'reg_send_otp' ); 

function reg_send_otp(){

  $requestEmail = trim($_REQUEST['email']);
  $response = array(
    'status' => 0,
    'message' => 'Unable to generate OTP, please try again'
  );

  if (filter_var($requestEmail, FILTER_VALIDATE_EMAIL)) {
    $newOTP = mt_rand(100000,999999); 

    $_SESSION['user_otp'] = $newOTP;
    $_SESSION['user_otp_email'] = $requestEmail;
    $_SESSION['user_email_verified'] = 0;

    $name = 'HT School';
    $fromEmail = get_option('admin_email');
    $message = "Your OTP for login or registration on Ht School is: " . $newOTP;
    $email = "prashant.c@fortune4.in";
    $subject = "HT School | One Time Password";
    $headers = 'From: '. $email . "\r\n" .
      'Reply-To: ' . $email . "\r\n";

    //Here put your Validation and send mail
    $sent = wp_mail($requestEmail, $subject, strip_tags($message), $headers);
        if($sent) {
          $response['status'] = 1;
          $response['message'] = 'We have sent you a verification code at ' . $requestEmail . '. Please enter the code to verify your email.';
        }//message sent!
        else  {
          $response['status'] = 0;
          $response['message'] = 'Unable to send OTP on email. Please contact site administrator.';
        }//message wasn't sent

  } else {
    $response['message'] = 'Invalid email address entered.';
  }


  echo json_encode($response); exit;
}

add_action("wp_ajax_reg_verify_otp", "reg_verify_otp");
add_action( 'wp_ajax_nopriv_reg_verify_otp', 'reg_verify_otp' ); 

function reg_verify_otp(){

    $num1 = isset($_REQUEST['num_1']) ? intval($_REQUEST['num_1']) : 0;
    $num2 = isset($_REQUEST['num_2']) ? intval($_REQUEST['num_2']) : 0;
    $num3 = isset($_REQUEST['num_3']) ? intval($_REQUEST['num_3']) : 0;
    $num4 = isset($_REQUEST['num_4']) ? intval($_REQUEST['num_4']) : 0;
    $num5 = isset($_REQUEST['num_5']) ? intval($_REQUEST['num_5']) : 0;
    $num6 = isset($_REQUEST['num_6']) ? intval($_REQUEST['num_6']) : 0;

    $otp = $num1 . $num2 . $num3 . $num4 . $num5 . $num6;

    $response = array(
        'status' => 0,
        'is_registered' => 0,
        'email' => '',
        'message' => 'Unable to verify OTP, please try again'
    );

    if ($otp == $_SESSION['user_otp']) {
        unset($_SESSION['user_otp']);
        $userEmail = $_SESSION['user_otp_email'];
        $_SESSION['user_email_verified'] = 1;

        $reg = false;

        if(email_exists($userEmail)){
            $user = get_user_by( 'email', $userEmail ); 
            if( $user ) {
                $response['is_registered'] = 1;
                $user_id = $user->ID;
                wp_set_current_user( $user_id, $user->user_login );
                wp_set_auth_cookie( $user_id );
                do_action( 'wp_login', $user->user_login, $user);
                $userData = $user->data;
                $userData->avatar =  get_avatar_url( $user->ID );
                $response['user'] = json_encode($userData);
            }else{
                $reg = true;
            }
        }else{
            $reg = true;
        }

        if($reg){
            $response['email'] = $userEmail;
        }

        $response['status'] = 1;
        $response['message'] = 'OTP verified successfully.';
    } else {
        $response['message'] = 'Invalid OTP entered.';
    }

    echo json_encode($response); exit;

}

add_action("wp_ajax_reg_new_user", "reg_new_user");
add_action( 'wp_ajax_nopriv_reg_new_user', 'reg_new_user' ); 

function reg_new_user(){

    $response = array(
        'status' => 0,
        'message' => 'Unable to send OTP, please try again'
    );

    $first_name = trim($_REQUEST['first_name']);
    $last_name = trim($_REQUEST['last_name']);
    $mobile = trim($_REQUEST['mobile']);
    $gender = trim($_REQUEST['user_gender']);

    $errorMsg = array();

    if($first_name == ''){
        $errorMsg[] = 'Please enter First Name.';
    }

    if($last_name == ''){
        $errorMsg[] = 'Please enter Last Name.';
    }

    if($mobile == ''){
        $errorMsg[] = 'Please enter Mobile Number.';
    }else if(!preg_match('/^[0-9]{10}+$/', $mobile)){
        $errorMsg[] = 'Mobile No is not valid.';
    }

    if(empty($errorMsg)){
        $newOTP = mt_rand(100000,999999); 
        $_SESSION['user_otp'] = $newOTP;
        $_SESSION['user_otp_mobile'] = $mobile;
        $_SESSION['user_mobile_verified'] = 0;

        $_SESSION['new_user_email'] = $_SESSION['user_otp_email'];
        $_SESSION['new_user_first_name'] = $first_name;
        $_SESSION['new_user_last_name'] = $last_name;
        $_SESSION['new_user_mobile'] = $mobile;
        $_SESSION['new_user_gender'] = $gender;

        $message = 'Use this OTP ' . $newOTP . ' to complete registration on HT Schools.';

        $sent = send_sms($mobile, $message);

        if($sent) {
          $response['status'] = 1;
          $response['message'] = 'We have sent you a verification code on ' . $mobile . '. Please enter the code to verify your mobile number.';
        }//message sent!
        else  {
          $response['status'] = 0;
          $response['message'] = 'Unable to send OTP on mobile. Please contact site administrator.';
        }//message wasn't sent

    }else{
        $response['message'] = implode("<br/>", $errorMsg);
    }

    echo json_encode($response); exit;

}
function send_sms($mobile, $message){
    $myfile = fopen(__DIR__ . "/../../../otp.txt", "a") or die("Unable to open file!");
    $txt = $mobile . " : " . $message . "\n";
    fwrite($myfile, $txt);
    fclose($myfile);
    
    $url = 'http://admagister.net/api/mt/SendSMS?channel=Trans&DCS=0&flashsms=0&number=91' . $mobile . '&text=' . urlencode($message) . '&route=30&APIKey=' . ADMAGISTER_API_KEY . '&senderid=' . ADMAGISTER_SENDER_ID;
    
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $response = curl_exec($ch);
    if(!$response){
        return false;
    }
    curl_close($ch);
    return true;
}

add_action("wp_ajax_reg_verify_mob_otp", "reg_verify_mob_otp");
add_action( 'wp_ajax_nopriv_reg_verify_mob_otp', 'reg_verify_mob_otp' ); 

function reg_verify_mob_otp(){

    $num1 = isset($_REQUEST['num_1']) ? intval($_REQUEST['num_1']) : 0;
    $num2 = isset($_REQUEST['num_2']) ? intval($_REQUEST['num_2']) : 0;
    $num3 = isset($_REQUEST['num_3']) ? intval($_REQUEST['num_3']) : 0;
    $num4 = isset($_REQUEST['num_4']) ? intval($_REQUEST['num_4']) : 0;
    $num5 = isset($_REQUEST['num_5']) ? intval($_REQUEST['num_5']) : 0;
    $num6 = isset($_REQUEST['num_6']) ? intval($_REQUEST['num_6']) : 0;

    $otp = $num1 . $num2 . $num3 . $num4 . $num5 . $num6;

    $response = array(
        'status' => 0,
        'message' => 'Unable to verify OTP, please try again'
    );

    if ($otp == $_SESSION['user_otp']) {
        unset($_SESSION['user_otp']);
        $userEmail = $_SESSION['user_otp_email'];
        $_SESSION['user_mobile_verified'] = 1;
        $reg = false;

        $userEmail = $_SESSION['new_user_email'];
        $userFirstName = $_SESSION['new_user_first_name'];
        $userLastName = $_SESSION['new_user_last_name'];
        $userMobile = $_SESSION['new_user_mobile'];
        $userGender = $_SESSION['new_user_gender'];

        $user_id = wp_create_user( $userEmail, md5($userEmail) . mt_rand(100000,999999), $userEmail );

        wp_update_user([
            'ID' => $user_id,
            'first_name' => $userFirstName,
            'last_name' => $userLastName,
        ]);

        add_user_meta( $user_id, 'gender', $userGender);
        add_user_meta( $user_id, 'mobile', $userMobile);

        $user = get_user_by( 'ID', $user_id ); 
        if( $user ) {
            $response['is_registered'] = 1;
            wp_set_current_user( $user_id, $user->user_login );
            wp_set_auth_cookie( $user_id );
            do_action( 'wp_login', $user->user_login, $user);
            $userData = $user->data;
            $userData->avatar =  get_avatar_url( $user->ID );
            $response['user'] = json_encode($userData);
        }

        $response['status'] = 1;
        $response['message'] = 'OTP verified successfully.';
    } else {
        $response['message'] = 'Invalid OTP entered.';
    }

    echo json_encode($response); exit;

}

// add_filter('wplms_course_details_widget','wplms_show_unit_count_and_time');
// function wplms_show_unit_count_and_time($course_details){
//     $course_id = get_the_ID();
//     $units=bp_course_get_curriculum_units($course_id);
//     $course_details['units'] = '<li><i class="icon-grid-alt"></i>'.count($units).' Units</li>';
//     $duration = $total_duration = 0;
//     foreach($units as $unit){
//         $duration = get_post_meta($unit,'vibe_duration',true);
//         if(get_post_type($unit)=='unit'){
//            $unit_duration_parameter = apply_filters('vibe_unit_duration_parameter',60,$unit);
//         }elseif(get_post_type($unit)=='quiz'){
//            $unit_duration_parameter = apply_filters('vibe_quiz_duration_parameter',60,$unit);
//         }
        
//         $total_duration =  $total_duration + $duration*$unit_duration_parameter;
//      }
            
//      $course_details['units_duration'] = '<li><i class="icon-clock-1"></i>'.tofriendlytime(( $total_duration)).'</li>';
//      print_r($course_details);
//      return $course_details;
// }
// add_filter('wplms_course_details_widget','wplms_show_unit_count_and_time');
// function wplms_show_unit_count_and_time($course_details){
//     $course_id = get_the_ID();
//     $units=bp_course_get_curriculum_units($course_id);
//     $course_details['units'] = '<li><i class="icon-grid-alt"></i>'.count($units).' Units</li>';
//     $duration = $total_duration = 0;
//     foreach($units as $unit){
//         $duration = get_post_meta($unit,'vibe_duration',true);
//         if(get_post_type($unit)=='unit'){
//            $unit_duration_parameter = apply_filters('vibe_unit_duration_parameter',60,$unit);
//         }elseif(get_post_type($unit)=='quiz'){
//            $unit_duration_parameter = apply_filters('vibe_quiz_duration_parameter',60,$unit);
//         }
        
//         $total_duration =  $total_duration + $duration*$unit_duration_parameter;
//      }
            
//      $course_details['units_duration'] = '<li><i class="icon-clock-1"></i>'.tofriendlytime(( $total_duration)).'</li>';
//      print_r($course_details);
//      return $course_details;
// }



add_filter('wplms_course_credits','wplms_hide_course_credits_for_course_students',10,2);
function wplms_hide_course_credits_for_course_students($credits,$course_id){
  if(!is_user_logged_in()){
    return $credits;
  }
  $user_id = get_current_user_id();
  if(wplms_user_course_check($user_id,$course_id)){
    $credits = '';//'Subscribed'; //hide credits for course students and display "Subscribed" message
  }
  return $credits;
}


/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function my_header_add_to_cart_fragment( $fragments ) {
 
    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?><li><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
      <img src="<?php echo get_bloginfo('template_url');?>/assets/images/cart.svg">
      <?php
    if ( $count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
        <?php            
    }
        ?></a></li><?php
 
    //$fragments['a.cart-contents'] = ob_get_clean();
     
  //  return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment' );

function my_header_notification_fragment( $fragments ) {
 
    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?><li><a class="cart-contents" title="<?php _e( 'View your notification' ); ?>">
      <img src="<?php echo get_bloginfo('template_url');?>/assets/images/notification.svg">
      <?php
    if ( $count > 0 ) {
        ?>
        <span class="notification-contents-count"></span>
        <?php            
    }
        ?></a></li><?php
 
    //$fragments['a.cart-contents'] = ob_get_clean();
     
  //  return $fragments;
}
add_filter( 'notification_fragments', 'my_header_notification_fragment' );

add_action('template_redirect','check_if_logged_in');
function check_if_logged_in()
{
    $pageid = 25; // your checkout page id
    if(!is_user_logged_in() && is_page($pageid))
    {
        $url = add_query_arg(
            'redirect_to',
            get_permalink($pagid),
            site_url('/login-register/') // your my acount url
        );
        wp_redirect($url);
        exit;
    }
}

add_filter( 'woocommerce_billing_fields', 'wc_npr_filter_phone', 10, 1 
);
function wc_npr_filter_phone( $address_fields ) {
    $address_fields['billing_phone']['required'] = true;
    $address_fields['billing_country']['required'] = false;
    $address_fields['billing_last_name']['required'] = true;
    $address_fields['billing_city']['required'] = false;
    $address_fields['billing_postcode']['required'] = false;
    $address_fields['billing_email']['required'] = true;
    $address_fields['billing_state']['required'] = false;
    $address_fields['billing_address_1']['required'] = false;
    $address_fields['billing_address_2']['required'] = false;
    return $address_fields;

}

// Filter will do its magic before the fields are passed to the template.
add_filter('woocommerce_checkout_fields', function($fields) {

  // Do things with your fields like setting the
  // priority, label, required, etc.
  // or removing them

  // Example: Set the priorities straight
  // Probably not meant for this since priority is something
  // totally different than order.
  $fields['billing']['billing_first_name']['priority'] = 0;
  $fields['billing']['billing_last_name']['priority'] = 5;
  $fields['billing']['billing_email']['priority'] = 10;
  $fields['billing']['billing_phone']['priority'] = 15;
  $fields['billing']['billing_country']['priority'] = 20;
  $fields['billing']['billing_state']['priority'] = 25;
  $fields['billing']['billing_address_1']['priority'] = 30;
  $fields['billing']['billing_address_2']['priority'] = 35;
  $fields['billing']['billing_postcode']['priority'] = 40;
  $fields['billing']['billing_city']['priority'] = 45;

  // Sort the fields based on their 'priority'
  usort($fields['billing'], function($a, $b) {
    return $a['priority'] <=> $b['priority'];
  });

  // Send the fields to the function that receives the fields data
  return $fields;
});
function get_the_term_list_search( $post_id, $taxonomy, $before = '', $sep = '', $after = '' ) {
  $terms = get_the_terms( $post_id, $taxonomy );

  if ( is_wp_error( $terms ) ) {
    return $terms;
  }

  if ( empty( $terms ) ) {
    return false;
  }

  $links = array();

  foreach ( $terms as $term ) {
    $link = get_term_link( $term, $taxonomy );

    $homeurl=get_home_url().'/?s='.$term->name;
    if ( is_wp_error( $link ) ) {
      return $link;
    }
    $links[] = '<a href="' . $homeurl . '" rel="tag">' . $term->name . '</a>';
  }

  /**
   * Filters the term links for a given taxonomy.
   *
   * The dynamic portion of the filter name, `$taxonomy`, refers
   * to the taxonomy slug.
   *
   * @since 2.5.0
   *
   * @param string[] $links An array of term links.
   */
  $term_links = apply_filters( "term_links-{$taxonomy}", $links );  // phpcs:ignore WordPress.NamingConventions.ValidHookName.UseUnderscores

  return $before . implode( $sep, $term_links ) . $after;
}



add_filter( 'my_nav_menu_items', 'add_extra_item_to_nav_menu', 10, 2 );
function add_extra_item_to_nav_menu( $items, $args ) {
    if (is_user_logged_in() && $args->menu == 303) {
        $items .= '<li><a href="'. get_permalink( get_option('woocommerce_myaccount_page_id') ) .'">My Account</a></li>';
    }
    elseif (!is_user_logged_in() && $args->menu == 303) {
        $items .= '<li><a href="' . get_permalink( wc_get_page_id( 'myaccount' ) ) . '">Sign in  /  Register</a></li>';
    }
    return $items;
}