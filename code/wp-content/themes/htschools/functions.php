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
        'name'          => esc_html__( 'Home page trending courses banner', 'wp-bootstrap-starter' ),
        'id'            => 'homepage-mid-banner',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );


    register_sidebar( array(
        'name'          => esc_html__( 'Home page footer  banner', 'wp-bootstrap-starter' ),
        'id'            => 'homepage-footer-banner',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
      register_sidebar( array(
        'name'          => esc_html__( 'Course listing page RHS banner', 'wp-bootstrap-starter' ),
        'id'            => 'course_section_rhs_banner',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
     register_sidebar( array(
            'name'          => esc_html__( 'news landing top banner', 'wp-bootstrap-starter' ),
            'id'            => 'news_landing_top_banner',
            'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );

    register_sidebar( array(
            'name'          => esc_html__( 'news page mid banner', 'wp-bootstrap-starter' ),
            'id'            => 'news_landing_mid_banner',
            'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );

register_sidebar( array(
            'name'          => esc_html__( 'story section footer banner', 'wp-bootstrap-starter' ),
            'id'            => 'story_banner_billboard',
            'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
  register_sidebar( array(
            'name'          => esc_html__( 'news section footer banner', 'wp-bootstrap-starter' ),
            'id'            => 'news_landing_footer_banner',
            'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
    register_sidebar( array(
        'name'          => esc_html__( 'banner_300_250', 'wp-bootstrap-starter' ),
        'id'            => 'banner_300_250',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
  register_sidebar( array(
        'name'          => esc_html__( 'instructor_banner', 'wp-bootstrap-starter' ),
        'id'            => 'instructor_banner',
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
        'name'          => esc_html__( 'Story page banner', 'wp-bootstrap-starter' ),
        'id'            => 'story-top-banner',
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
if(!is_admin()){
  wp_enqueue_style( 'wplms-customizer-css2', get_template_directory_uri(). '/style.css' );
  wp_enqueue_style( 'wplms-custom', get_template_directory_uri(). '/custom.css' );
  wp_enqueue_style( 'wplms-bootstrap-icons', get_template_directory_uri(). '/assets/vendor/bootstrap-icons/bootstrap-icons.css' );
  wp_enqueue_style( 'wplms-bootstrap', get_template_directory_uri(). '/assets/vendor/bootstrap/css/bootstrap.css' );
  wp_enqueue_style( 'wplms-font', get_template_directory_uri(). '/assets/css/font.css' );
  wp_enqueue_style( 'wplms-owl-carousel', get_template_directory_uri(). '/assets/css/owl.carousel.min.css' );
  wp_enqueue_style( 'wplms-navigation', get_template_directory_uri(). '/navigation.css' );
  wp_enqueue_style( 'wplms-responsive', get_template_directory_uri(). '/assets/css/responsive.css' );
  wp_enqueue_script( 'wplms-jquery', get_template_directory_uri(). '/assets/js/jquery.min.js', '', '', true );
  wp_enqueue_script( 'wplms-carousel', 'https://cdn.boomcdn.com/libs/owl-carousel/2.3.4/owl.carousel.min.js', '', '', true );
  wp_enqueue_script( 'wplms-main-js', get_template_directory_uri(). '/assets/js/main.js', '', '', true );
  wp_enqueue_script( 'wplms-mobile-js', get_template_directory_uri(). '/assets/js/mobile.js', '', '', true );
  wp_enqueue_script( 'wplms-navigation', get_template_directory_uri(). '/assets/js/navigation-custom.js', '', '', true );
  wp_enqueue_script( 'wplms-circle', get_template_directory_uri(). '/assets/js/circle.js', '', '', true );
}
function wpse_enqueue_datepicker() {
    // Load the datepicker script (pre-registered in WordPress).
    wp_enqueue_script( 'jquery-ui-datepicker' );
    wp_enqueue_script( 'jquery-ui-autocomplete' );
    // You need styling for the datepicker. For simplicity I've linked to the jQuery UI CSS on a CDN.
    wp_register_style( 'jquery-ui', 'https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css' );
    wp_enqueue_style( 'jquery-ui' );  
}
add_action( 'wp_enqueue_scripts', 'wpse_enqueue_datepicker' );

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
/*        $location = $_SERVER['HTTP_REFERER'];
        wp_safe_redirect($location);
        exit();*/
        $t = 1005;
        $url = add_query_arg(
          'redirect_to',
          get_permalink($pagid),
            site_url($t) // your my acount url
          );
        wp_redirect($url);
        exit;
    }
}

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
    $_SESSION['previousPageUrl'] = $_REQUEST['prevPageurl'];

    $name = 'HT School';
    $fromEmail = get_option('admin_email');
    $message = "Your OTP for login or registration on Ht School is: " . $newOTP;
    $email = "prashant.c@fortune4.in";
    $subject = "HT School | One Time Password";
    $headers = 'From: '. $email . "\r\n" .
      'Reply-To: ' . $email . "\r\n";

    // ob_start();
    // include('email-templates/otp-confirmation.php');
    // $email_content = ob_get_contents();
    // ob_end_clean();
    // add_filter( 'wp_mail_content_type', 'set_html_content_type' );
    $sent = wp_mail($requestEmail, $subject, $message, $headers);
    //remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
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

function set_html_content_type() {
return 'text/html';
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
        $response['previous_page_url'] = $_SESSION['previousPageUrl'];
    
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
        xprofile_set_field_data('Gender', $user_id, trim($userGender));
        xprofile_set_field_data('Phone', $user_id, trim($userMobile));

        $user = get_user_by( 'ID', $user_id ); 
        if( $user ) {
            $response['is_registered'] = 1;
            wp_set_current_user( $user_id, $user->user_login );
            wp_set_auth_cookie( $user_id );
            do_action( 'wp_login', $user->user_login, $user);
            $userData = $user->data;
            $userData->avatar =  get_avatar_url( $user->ID );
            $response['user'] = json_encode($userData);
            $response['previous_page_url'] = $_SESSION['previousPageUrl'];
        }

        $response['status'] = 1;
        $response['message'] = 'OTP verified successfully.';
    } else {
        $response['message'] = 'Invalid OTP entered.';
    }
    echo json_encode($response); exit;
}

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
      <img alt="View your shopping cart" src="<?php echo get_bloginfo('template_url');?>/assets/images/cart.svg">
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
    $savePageId = 1005; // your checkout page id
    if(!is_user_logged_in() && is_page($pageid))
    {
        $url = add_query_arg(
            'redirect_to',
            get_permalink($pagid),
            site_url('/login-register/') // your my acount url
        );
        wp_redirect($url);
        exit;
    }elseif(!is_user_logged_in() && is_page($savePageId)){
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

add_filter( 'wc_add_to_cart_message_html', 'empty_wc_add_to_cart_message');
function empty_wc_add_to_cart_message( $message, $products ) { 
    return ''; 
}; 

// Filter will do its magic before the fields are passed to the template.
add_filter('woocommerce_checkout_fields', function($fields) {
   global $current_user;
    $fname = get_user_meta( $current_user->ID, 'first_name', true );
    $lname = get_user_meta( $current_user->ID, 'last_name', true );
    $address_1 = get_user_meta( $current_user->ID, 'billing_address_1', true ); 
    $address_2 = get_user_meta( $current_user->ID, 'billing_address_2', true );
    $city = get_user_meta( $current_user->ID, 'billing_city', true );
    $state = get_user_meta( $current_user->ID, 'billing_state', true );
    $postcode = get_user_meta( $current_user->ID, 'billing_postcode', true );
    $billing_email = get_user_meta( $current_user->ID, 'billing_email', true );
    $billing_phone = get_user_meta( $current_user->ID, 'billing_phone', true );
    if(!is_null($fname)) {
      $fields['billing']['billing_first_name']['default'] = $fname;
    }
    if(!is_null($lname)) {
      $fields['billing']['billing_last_name']['default'] = $lname;
    }
    if(!is_null($billing_email)) {
      $fields['billing']['billing_email']['default'] = $billing_email;
    }
    if(!is_null($billing_phone)) {
      $fields['billing']['billing_phone']['default'] = $billing_phone;
    }
    if(!is_null($city)) {
      $fields['billing']['billing_city']['default'] = $city;
    }
    if(!is_null($postcode)) {
      $fields['billing']['billing_postcode']['default'] = $postcode;
    }
    if(!is_null($address_1)) {
      $fields['billing']['billing_address_1']['default'] = $address_1;
    }
    if(!is_null($address_2)) {
      $fields['billing']['billing_address_2']['default'] = $address_2;
    }
    if(!is_null($state)) {
      $fields['billing']['billing_state']['default'] = $state;
    }
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


function get_profile_data( $field, $user_id = 0, $multi_format = 'array' ) {

  if ( empty( $user_id ) ) {
    $user_id = bp_loggedin_user_id();
  }

  if ( empty( $user_id ) ) {
    return false;
  }

  if ( is_numeric( $field ) ) {
    $field_id = $field;
  } else {
    $field_id = xprofile_get_field_id_from_name( $field );
  }

  if ( empty( $field_id ) ) {
    return false;
  }

  $values = maybe_unserialize( BP_XProfile_ProfileData::get_value_byid( $field_id, $user_id ) );

  if ( is_array( $values ) ) {
    $data = array();
    foreach( (array) $values as $value ) {

      /**
       * Filters the field data value for a specific field for the user.
       *
       * @since 1.0.0
       *
       * @param string $value    Value saved for the field.
       * @param int    $field_id ID of the field being displayed.
       * @param int    $user_id  ID of the user being displayed.
       */
      $data[] = $value;
    }

    if ( 'comma' == $multi_format ) {
      $data = implode( ', ', $data );
    }
  } else {
    /** This filter is documented in bp-xprofile/bp-xprofile-functions.php */
    $data = $values;
  }

  return $data;
}

add_action("wp_ajax_save_custom_profile", "save_custom_profile");
add_action( 'wp_ajax_nopriv_save_custom_profile', 'save_custom_profile' ); 

function save_custom_profile(){
    
    $response = array(
        'status' => 0,
        'message' => 'Unable to save profile, please try again',
        'profile_complete' => 0
    );

    $user_id = bp_loggedin_user_id();

    try{
        $args = array(
            'ID'         => $user_id,
            'first_name' => esc_attr( $_POST['first_name'] ),
            'last_name' => esc_attr( $_POST['last_name'] )
        );
        wp_update_user( $args );

        xprofile_set_field_data('Birthday', $user_id, trim($_REQUEST['user_dob']) . " 00:00:00");
        xprofile_set_field_data('Gender', $user_id, trim($_REQUEST['user_gender']));
        xprofile_set_field_data('Phone', $user_id, trim($_REQUEST['user_mobile']));
        xprofile_set_field_data('Country', $user_id, trim($_REQUEST['user_country']));
        xprofile_set_field_data('State', $user_id, trim($_REQUEST['user_state']));
        xprofile_set_field_data('City', $user_id, trim($_REQUEST['user_city']));
        xprofile_set_field_data('Linked School', $user_id, trim($_REQUEST['user_school']));

        if(esc_attr( $_POST['first_name']) != "" 
          && esc_attr( $_POST['last_name']) != ""
            && trim($_REQUEST['user_dob']) != ""
            && trim($_REQUEST['user_gender']) != ""
            && trim($_REQUEST['user_country']) != ""
            && trim($_REQUEST['user_state']) != ""
            && trim($_REQUEST['user_city']) != ""
            && trim($_REQUEST['user_school']) != ""
      ){
            $response['profile_complete'] = 1;
          }

        $response['status'] = 1;
        $response['message'] = 'Profile updated successfully.';
        
    }catch(Exception $e){

    }

    echo json_encode($response); exit;
}

add_action("wp_ajax_save_child_entry", "save_child_entry");
add_action( 'wp_ajax_nopriv_save_child_entry', 'save_child_entry' ); 

function save_child_entry(){
    global $wpdb;

    $response = array(
        'status' => 0,
        'message' => 'Unable to add child entry, please try again'
    );

    $user_id = bp_loggedin_user_id();

    try{
        
        $wpdb->insert($wpdb->prefix . "parent_child_mapping", array(
            'parent_id' => $user_id,
            'child_id' => 0,
            'child_name' => esc_attr($_REQUEST['child_name']),
            'school_id' => esc_attr($_REQUEST['child_school_id']),
            'school_name' => esc_attr($_REQUEST['child_school']),
            'grade' => esc_attr($_REQUEST['grade']),
            'division' => esc_attr($_REQUEST['division'])
        ));

        xprofile_set_field_data('Profile Type', $user_id, "Parent");

        $response = array(
            'status' => 1,
            'message' => 'Child added successfully.'
        );
    }catch(Exception $e){

    }

    echo json_encode($response); exit;
}

add_action("wp_ajax_get_countries", "get_countries");
add_action( 'wp_ajax_nopriv_get_countries', 'get_countries' ); 

function get_countries(){
    global $wpdb;
    
    $response = array();

    $results = $wpdb->get_results( "SELECT country_id, country_name FROM " . $wpdb->prefix . "country_master WHERE country_name LIKE '" . esc_attr($_REQUEST['term']) . "%'" );

    foreach ($results as $data) {
        $row = array();
        $row['label'] = $data->country_name;
        $row['value'] = $data->country_id;

        $response[] = $row;
    }

    echo json_encode($response); exit;
}

add_action("wp_ajax_get_schools", "get_schools");
add_action( 'wp_ajax_nopriv_get_schools', 'get_schools' ); 

// function get_schools(){
//     global $wpdb;
    
//     $response = array();

//     $args = array(
//         'role'    => 'School',
//         'orderby' => 'user_nicename',
//         'order'   => 'ASC'
//     );
//     $results = get_users( $args );

    
//     foreach ($results as $data) {
//         $row = array();
//         $row['label'] = $data->display_name;
//         $row['value'] = $data->id;

//         $response[] = $row;
//     }

//     echo json_encode($response); exit;
// }

function get_schools(){
    global $wpdb;
    
    $response = array();
    $results = $wpdb->get_results("SELECT DISTINCT ht_users.ID, ht_users.user_nicename,ht_users.display_name 
    FROM ht_users INNER JOIN ht_usermeta 
    ON ht_users.ID = ht_usermeta.user_id 
    WHERE ht_usermeta.meta_key='ht_user_level' and ht_usermeta.meta_value='0' AND ht_users.display_name LIKE '" . esc_attr($_REQUEST['term']) . "%' ORDER BY ht_users.user_nicename");
    
    foreach ($results as $data) {
      $row = array();
      $row['label'] = $data->display_name;
      $row['value'] = $data->ID;

      $response[] = $row;
    }
    echo json_encode($response); exit;
}

function get_schools_old(){
    global $wpdb;
    
    $response = array();

    $results = $wpdb->get_results( "SELECT school_id, school_name FROM " . $wpdb->prefix . "school_master WHERE school_name LIKE '" . esc_attr($_REQUEST['term']) . "%'" );

    foreach ($results as $data) {
        $row = array();
        $row['label'] = $data->school_name;
        $row['value'] = $data->school_id;

        $response[] = $row;
    }

    echo json_encode($response); exit;
}

add_action("wp_ajax_get_states", "get_states");
add_action( 'wp_ajax_nopriv_get_states', 'get_states' ); 

function get_states(){
    global $wpdb;
    
    $response = array();

    $results = $wpdb->get_results( "SELECT state_id, state_name FROM " . $wpdb->prefix . "state_master WHERE country_id in(select country_id from " . $wpdb->prefix . "country_master where country_name = '" . esc_attr($_REQUEST['country']) . "') AND state_name LIKE '" . esc_attr($_REQUEST['term']) . "%'" );

    foreach ($results as $data) {
        $row = array();
       /* $row['label'] = $data->state_name;
        $row['value'] = $data->state_id;*/

        $response[] = $data->state_name;
    }

    echo json_encode($response); exit;
}

function cart_script_disabled(){
   wp_dequeue_script( 'wc-cart' );
}
add_action( 'wp_enqueue_scripts', 'cart_script_disabled' );

/**
 * AUTO COMPLETE PAID ORDERS IN WOOCOMMERCE
 */
add_action( 'woocommerce_thankyou', 'custom_woocommerce_auto_complete_paid_order', 10, 1 );
function custom_woocommerce_auto_complete_paid_order( $order_id ) {
    if ( ! $order_id )
    return;

    $order = wc_get_order( $order_id );

    // No updated status for orders delivered with Bank wire, Cash on delivery and Cheque payment methods.
    if ( ( 'bacs' == get_post_meta($order_id, '_payment_method', true) ) || ( 'cod' == get_post_meta($order_id, '_payment_method', true) ) || ( 'cheque' == get_post_meta($order_id, '_payment_method', true) ) ) {
        return;
    } 
    // For paid Orders with all others payment methods (with paid status "processing")
    elseif( $order->get_status()  === 'processing' ) {
        $order->update_status( 'completed' );
    }
}
// Social Login Redirect
add_filter('facebook_login_redirect_url', function($redirectUrl, $provider){
      if(isset($_SESSION['previousPageUrl'])){
        $redirectUrl = $_SESSION['previousPageUrl'];
      }
    return $redirectUrl;
}, 10, 2);


add_filter('google_login_redirect_url', function($redirectUrl, $provider){

 // print_r($_SESSION);exit;
  if(isset($_SESSION['previousPageUrl'])){
    $redirectUrl = $_SESSION['previousPageUrl'];
       return $redirectUrl;
  }
}, 10, 2);

function wpfp_save_link( $return = 0, $action = "", $show_span = 1, $args = array() ) {
    global $post;
    //print_r($post);
    $post_id = $post->ID;
    //$post_id = &$post->ID;
    extract($args);
    $str = "";
    if ($show_span)
        $str = "<span class='wpfp-span'>";
    $str .= wpfp_before_link_img();
    $str .= wpfp_loading_img();
    if ($action == "remove"):
        $str .= wpfp_hhtml($post_id, wpfp_get_option('remove_favorite'), "remove");
    elseif ($action == "add"):
        $str .= wpfp_hhtml($post_id, wpfp_get_option('add_favorite'), "add");
    elseif (wpfp_check_favorited($post_id)):
        $str .= wpfp_hhtml($post_id, wpfp_get_option('remove_favorite'), "remove");
    else:
        $str .= wpfp_hhtml($post_id, wpfp_get_option('add_favorite'), "add");
    endif;
    if ($show_span)
        $str .= "</span>";
    if ($return) { return $str; } else { echo $str; }
}

function wpfp_hhtml($post_id, $opt, $action) {

  $opt = "<img src='".get_bloginfo('template_url')."/assets/images/delete-icon.svg'>";
    $link = "<a class='wpfp-link' href='?wpfpaction=".$action."&amp;postid=". esc_attr($post_id) . "'>". $opt ."</a>";
    $link = apply_filters( 'wpfp_link_html', $link );
    return $link;
}

add_action( 'admin_post_adaptiveweb_save_profile_form', 'adaptiveweb_save_profile_form' );
function adaptiveweb_save_profile_form() {
  
  if(!isset($_REQUEST['user_id'])) return;

  do_action('acf/save_post', $_REQUEST['user_id']);

  wp_redirect(add_query_arg('updated', 'success', wp_get_referer()));
  exit;
}

function wpb_logged_in_menu() {
  // register_nav_menu('sidebar-menu',__( 'Sidebar Menu' ));
  register_nav_menus( array(
    'logged-in-menu' => esc_html__( 'Logged In Menu'),
  ) );
}
add_action( 'init', 'wpb_logged_in_menu' );

function get_display_name($user_id) {
    if (!$user = get_userdata($user_id))
        return false;
    return $user->data->display_name;
}
add_action( 'wp_ajax_nopriv_load-filter', 'prefix_load_cat_posts' );
add_action( 'wp_ajax_load-filter', 'prefix_load_cat_posts' );

function prefix_load_cat_posts () {
  global $post,$wpdb;
  $course_id = $_POST[ 'course_id' ];
  $user = wp_get_current_user();
  $query =apply_filters('wplms_usermeta_direct_query',$wpdb->prepare("SELECT posts.post_title AS course,rel.meta_key AS user_id, rel.meta_value AS score,posts.ID AS course_id FROM ht_posts AS posts LEFT JOIN ht_postmeta AS rel ON posts.ID = rel.post_id WHERE posts.post_type = 'course' AND posts.post_status = 'publish' AND rel.meta_key REGEXP '^[0-9]+$' AND posts.ID='".$course_id."' ORDER BY rel.meta_value DESC"));
  $result = $wpdb->get_results($query);
    if ($wpdb->num_rows<=0) {
      echo '0';
    }
    else
    {
      $array1 = array();
      $array2 = array();
      foreach($result as $course){
        if($course->user_id == $user->ID){
          array_push($array1,$course);
        }
        else{
          array_push($array2,$course);
        }
        
      }

      $dashboard_data = array_merge($array1,$array2);
      $i = 0;
      foreach($dashboard_data as $course){
        $rank = $i + 1;
        if($course->user_id == $user->ID){
          $response = '<tr style="background: #D5EBFF;">';
        }
        else{
          $response = '<tr>';
        }
        $response .= '<td scope="row"><span class="circle">'.$rank.'</span></td>';
        if($course->user_id == $user->ID){
          $response .= '<td>You</td>';
        }else{

          $response .= '<td>'. get_display_name($course->user_id) .'</td>';
        }
        $response .= '<td>'. $course->score .'</td>';
        $response .= '</tr>';
        echo $response;
        $i++;
      }
    }

  wp_reset_postdata(); 

  die(1); 
}

add_action( 'wp_ajax_nopriv_get-rank', 'get_rank' );
add_action( 'wp_ajax_get-rank', 'get_rank' );

function get_rank () {
  global $post,$wpdb;
  $course_id = $_POST[ 'course_id' ];
  $user = wp_get_current_user();
  $query =apply_filters('wplms_usermeta_direct_query',$wpdb->prepare("SELECT posts.post_title AS course,rel.meta_key AS user_id, rel.meta_value AS score,posts.ID AS course_id FROM ht_posts AS posts LEFT JOIN ht_postmeta AS rel ON posts.ID = rel.post_id WHERE posts.post_type = 'course' AND posts.post_status = 'publish' AND rel.meta_key REGEXP '^[0-9]+$' AND posts.ID='".$course_id."' ORDER BY rel.meta_value DESC LIMIT 0,3"));
  $result = $wpdb->get_results($query);

    foreach($result as $course){
      $response = '<li><div class="col-xs-8 col-sm-9 col-md-9 mrg"><div class="content">';
      $response.='<p>Rank 1</p>';
      $response.='<h5>'.get_display_name($course->user_id).'</h5>';
      $response.='<span class="light">'.$course->score.' Pts</span>';
      $response.='</div></div><div class="col-xs-4 col-sm-3 col-md-3 right_img mrg">';
      $response.='<img src='.get_bloginfo('template_url').'/assets/images/gold.svg class="img-gold"/></div>';
      $response.='</li>';
      echo $response;
  }
}
function change_woocommerce_order_number($order_id) {
  $order = new WC_Order( $order_id );
  $items = $order->get_items(); 
  foreach ($items as $item_id => $product ) {
    $gen_id = rand(1000,9999);
    return $order_id = $item_id.$gen_id;
}
}
add_filter('woocommerce_order_number', 'change_woocommerce_order_number');



function modify_search_query( $query ) {
  // Make sure this isn't the admin or is the main query
  if( is_admin() || ! $query->is_main_query() ) {
    return;
  }

  // Make sure this isn't the WooCommerce product search form
  if( isset($_GET['post_type']) && ($_GET['post_type'] == 'product') ) {
    return;
  }

  if( $query->is_search() ) {
    $in_search_post_types = get_post_types( array( 'exclude_from_search' => false ) );

    // The post types you're removing (example: 'product' and 'page')
    $post_types_to_remove = array( 'product', 'page' );

    foreach( $post_types_to_remove as $post_type_to_remove ) {
      if( is_array( $in_search_post_types ) && in_array( $post_type_to_remove, $in_search_post_types ) ) {
        unset( $in_search_post_types[ $post_type_to_remove ] );
        $query->set( 'post_type', $in_search_post_types );
      }
    }
  }

}
add_action( 'pre_get_posts', 'modify_search_query' );

function get_the_course_tags( $post_id, $post_tag ) {
  $terms = get_the_terms( $post_id, $post_tag );

  /**
   * Filters the array of tags for the given post.
   *
   * @since 2.3.0
   *
   * @see get_the_terms()
   *
   * @param WP_Term[]|false|WP_Error $terms Array of WP_Term objects on success, false if there are no terms
   *                                        or the post does not exist, WP_Error on failure.
   */
  return apply_filters( 'get_the_tags', $terms );
}
// add_action('admin_head', 'my_custom_fonts');
// function my_custom_fonts() {
//   echo '<style>
//     .interest-field{
//       display: none;
//     }
// </style>';
// echo '<script>
// jQuery(function($){
//   $(document).ready(function($) {
//     $("#interest-field").parent().parent().prev().hide();
//     $("h2:contains(user interest)").hide();
//   });
//   });
// </script>';
// }
add_filter('vibe_option_custom_sections','wplms_one_course_section');
function wplms_one_course_section($sections){
    $sections[1]['fields'][] = array(
    'id' => 'headertop_logo',
    'type' => 'upload',
    'title' => __('Upload Logo for Course header', 'vibe'), 
    'sub_desc' => __('Upload your logo', 'vibe'),
    'desc' => __('This Logo is shown in header.', 'vibe'),
    'std' => VIBE_URL.'/images/logo.png'
    );
    return $sections;
}

function sc_tf_get_tags_as_array($post_id){
    global $wpdb;
    $tbl_terms = $wpdb->prefix . "terms";
    $tbl_term_relationships = $wpdb->prefix . "term_relationships";

    $sql = "SELECT name FROM $tbl_terms WHERE term_id in (SELECT term_taxonomy_id FROM $tbl_term_relationships WHERE object_id='$post_id');";
    $results = $wpdb->get_results($sql);

    if($results){
        foreach($results as $row){
            $tags_list[] = $row->name;
        }
    }

    return $tags_list;
}
function wpfp_course_link( $return = 0, $action = "", $show_span = 1, $args = array() ) {
    global $post;
    //print_r($post);
    $post_id = $post->ID;
    //$post_id = &$post->ID;
    $title1 = "Bookmark this Course";
    $title2 = "Remove Bookmark";
    extract($args);
    $str = "";
    if ($show_span)
        $str = "<span class='wpfp-span'>";
    $str .= wpfp_before_link_img();
    $str .= wpfp_loading_img();
    if ($action == "remove"):
        $str .= wpfp_course_link_html($post_id, wpfp_get_option('remove_favorite'), "remove",$title2);
    elseif ($action == "add"):
        $str .= wpfp_course_link_html($post_id, wpfp_get_option('add_favorite'), "add",$title1);
    elseif (wpfp_check_favorited($post_id)):
        $str .= wpfp_course_link_html($post_id, wpfp_get_option('remove_favorite'), "remove",$title2);
    else:
        $str .= wpfp_course_link_html($post_id, wpfp_get_option('add_favorite'), "add",$title1);
    endif;
    if ($show_span)
        $str .= "</span>";
    if ($return) { return $str; } else { echo $str; }
}

function wpfp_course_link_html($post_id, $opt, $action, $title) {
  $link = "<a class='wpfp-link' href='?wpfpaction=".$action."&amp;postid=". esc_attr($post_id) . "' title='". $title ."' rel='nofollow'>". $opt ."</a>";
  $link = apply_filters( 'wpfp_course_link_html', $link );
  return $link;
}

function wpfp_post_link( $return = 0, $action = "", $show_span = 1, $args = array() ) {
    global $post;
    //print_r($post);
    $post_id = $post->ID;
    //$post_id = &$post->ID;
    $title1 = "Bookmark this Article";
    $title2 = "Remove Bookmark";
    extract($args);
    $str = "";
    if ($show_span)
        $str = "<span class='wpfp-span'>";
    $str .= wpfp_before_link_img();
    $str .= wpfp_loading_img();
    if ($action == "remove"):
        $str .= wpfp_post_link_html($post_id, wpfp_get_option('remove_favorite'), "remove",$title2);
    elseif ($action == "add"):
        $str .= wpfp_post_link_html($post_id, wpfp_get_option('add_favorite'), "add",$title1);
    elseif (wpfp_check_favorited($post_id)):
        $str .= wpfp_post_link_html($post_id, wpfp_get_option('remove_favorite'), "remove",$title2);
    else:
        $str .= wpfp_post_link_html($post_id, wpfp_get_option('add_favorite'), "add",$title1);
    endif;
    if ($show_span)
        $str .= "</span>";
    if ($return) { return $str; } else { echo $str; }
}

function wpfp_post_link_html($post_id, $opt, $action, $title) {
  $link = "<a class='wpfp-link' href='?wpfpaction=".$action."&amp;postid=". esc_attr($post_id) . "' title='". $title ."' rel='nofollow'>". $opt ."</a>";
  $link = apply_filters( 'wpfp_post_link_html', $link );
  return $link;
}

add_shortcode( 'username', 'wpc_shortcode_username' );
function wpc_shortcode_username() {
    $current_user = wp_get_current_user();
    $username = $current_user->user_login;
    if(!$username || empty($username) || $username == ''){
      return get_bloginfo('url').'/login-register';
    }
    else{
      return get_bloginfo('url').'/members-directory/'.$username;
    }
}

add_shortcode( 'contact-adwork', 'wpc_shortcode_contact_adwork' );
function wpc_shortcode_contact_adwork() {
    
      return dynamic_sidebar( 'banner-2' );      
    
}

//Insert ads after second paragraph of single post content.
 
//add_filter( 'the_content', 'prefix_insert_post_ads' );
 
function prefix_insert_post_ads( $content ) {
     
 
    if ( is_single() && ! is_admin() ) {
        ob_start();
        dynamic_sidebar('news_landing_mid_banner');
        $addDisplay = ob_get_contents();
        ob_end_clean();
        
       // $ad_code = '</div><div class="col-sm-12 col-lg-6 pull-right mrg">' . $addDisplay . '</div></div><div class="row"><div class="col-sm-12 col-lg-12 pull-left mrg">';
        $ad_code = '<div align="right" style="float: right;margin-left: 15px;">' . $addDisplay . '</div>';
        $content = prefix_insert_after_paragraph( $ad_code, 1, $content );
        //$content = prefix_insert_after_position( $ad_code,650, $content );
    }
     
    return $content;
}
  
// Parent Function that makes the magic happen
  
function prefix_insert_after_paragraph( $insertion, $paragraph_id, $content ) {
    $closing_p = '</p>';
    $paragraphs = explode( $closing_p, $content );
    foreach ($paragraphs as $index => $paragraph) {
 
        if ( trim( $paragraph ) ) {
            $paragraphs[$index] .= $closing_p;
        }
 
        if ( $paragraph_id == $index + 1 ) {
            $paragraphs[$index] .= $insertion;
        }
    }
     
    return implode( '', $paragraphs );
}
    
function prefix_insert_after_words( $insertion, $count, $content ) {
    $closing_p = ' ';
    $paragraphs = explode( $closing_p, $content );
    foreach ($paragraphs as $index => $paragraph) {
 
        if ( trim( $paragraph ) ) {
            $paragraphs[$index] .= $closing_p;
        }
 
        if ( $count == $index + 1 ) {
            $paragraphs[$index] .= $insertion;
        }
    }
     
    return implode( '', $paragraphs );
}
  
function prefix_insert_after_position( $insertion, $position, $content ) {
    $content = substr_replace($content, $insertion, $position, 0);
    return $content;
}

function split_string_by_words($text, $splitLength = 25)
{
    // explode the text into an array of words
    $wordArray = explode(' ', $text);

    // Too many words
    if( sizeof($wordArray) > $splitLength )
    {
        // Split words into two arrays
        $firstWordArray = array_slice($wordArray, 0, $splitLength);
        $lastWordArray = array_slice($wordArray, $splitLength+1, sizeof($wordArray));

        // Turn array back into two split strings 
        $firstString = implode(' ', $firstWordArray);
        $lastString = implode(' ', $lastWordArray);
        return array($firstString, $lastString);
    }
    // if our array is under the limit, just send it straight back
    return array($text);
}

add_action( 'wp_ajax_save_my_data', 'acf_form_head' );
add_action( 'wp_ajax_nopriv_save_my_data', 'acf_form_head' );

// add_filter( 'clean_url', function( $url ) {
//     if ( FALSE === strpos( $url, '.js' ) ) {
//         // not our file
//         return $url;
//     }
//     // Must be a ', not "!
//     return "$url' defer='defer";
// }, 11, 1 );

function posts_pagination() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
    //print_r($paged);
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="pagination"><ul>' . "\n";
    
    if ( $paged != 1 )
        echo '<li class="page-num page-num-first pagination_arrow prev"><a href='.get_pagenum_link(1).'>'.__('<img src='.get_bloginfo('template_url').'/assets/images/double_arrow-prev.svg>').' </a></li>';

    /** Previous Post Link */
    if ( get_previous_posts_link('<img src='.get_bloginfo('template_url').'/assets/images/page-prev.svg>') )
        printf( '<li class="pagination_arrow prev">%s</li>' . "\n", get_previous_posts_link('<img src='.get_bloginfo('template_url').'/assets/images/page-prev.svg class="angle-prev">') );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
    

    /** Next Post Link */
    if ( get_next_posts_link('<img  src='.get_bloginfo('template_url').'/assets/images/page-next.svg>') )
        printf( '<li class="pagination_arrow next">%s</li>' . "\n", get_next_posts_link('<img src='.get_bloginfo('template_url').'/assets/images/page-next.svg class="angle-next">') );
    if ( $paged != $max )
        echo '<li class="page-num page-num-last"><a href='.get_pagenum_link($max).'> '.__('<img src='.get_bloginfo('template_url').'/assets/images/double_arrow-next.svg>').'</a></li>';
 
    echo '</ul></div>' . "\n";
 
}


add_action( 'woocommerce_api_start-cs-course', 'start_cs_course');

function start_cs_course(){
    $courseId = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;

    if($courseId <= 0){
        wp_redirect(get_bloginfo('url'));
        exit;
    }

    if(!is_user_logged_in()){
        wp_redirect(get_bloginfo('url'));
        exit;
    }

    $userId = get_current_user_id();

    if(!bp_course_is_member($courseId, $userId)){
        wp_redirect(get_bloginfo('url'));
        exit;    
    }

    $cb_course_id = get_post_meta($courseId,'celeb_school_course_id',true);

    $cb_user_email = get_user_meta($userId, 'cb_user_login_email', true);
    if($cb_user_email != ''){
        $cb_user_password = md5($cb_user_email);

        $signupResponse = login_cb_user($cb_user_email, $cb_user_password);
        if($signupResponse != false){
            $cbCourseResponse = cb_course_delivery($cb_user_email, $cb_course_id, $signupResponse);

            $cbCourseResponseArray = json_decode($cbCourseResponse, true);
            if(isset($cbCourseResponseArray['page_url'])){
                $cb_course_link = $cbCourseResponseArray['page_url'];
                wp_redirect($cb_course_link);
            }else{
                echo "Error occured while loading the course."; exit;
            }
        }else{
            echo "Error occured while loading the course. Please Try again."; exit;
        }

    }else{
        $cbUserEmail = "ht_user_" . $userId . "_" . rand(1000,9999) . "@htschools.com";
        update_user_meta($userId, 'cb_user_login_email', $cbUserEmail);

        $signupResponse = signup_cb_user("John Doe", $cbUserEmail, md5($cbUserEmail));
        if($signupResponse != false){
            $cbCourseResponse = cb_course_delivery($cbUserEmail, $cb_course_id, $signupResponse);

            $cbCourseResponseArray = json_decode($cbCourseResponse, true);
            if(isset($cbCourseResponseArray['page_url'])){
                $cb_course_link = $cbCourseResponseArray['page_url'];
                wp_redirect($cb_course_link);
            }else{
                echo "SSO Error occured while loading the course."; exit;
            }
        }else{
            echo "SSO Error occured while loading the course. Please Try again."; exit;
        }
    }
}


function signup_cb_user($userName, $email, $password){

    $userData = array(
        'name' => $userName,
        'email' => $email,
        'password' => $password,
        'social_platform' => 'htschools',
        'slug_url' => ''
    );

    $wpcs_options = get_option('wpcs_options');

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $wpcs_options['cs_api_url'] . '/api/user/manual/signup',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => json_encode($userData),
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        //'Cookie: connect.sid=s%3Aa3J2Lr96Kw73Dl542b5k5UNEnLy4uqo5.dMw9IYD96YHjlu5SZoRKm%2BAMc3YNJz8iSl41EUerdeM'
      ),
    ));

    $response = curl_exec($curl);
    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    if($httpcode == 200){
        return $response;
    }else{
        return false;
    }
}

function login_cb_user($email, $password){

    $userData = array(
        'email' => $email,
        'password' => $password
    );

    $wpcs_options = get_option('wpcs_options');

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $wpcs_options['cs_api_url'] . '/api/user/manual/login',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => json_encode($userData),
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        //'Cookie: connect.sid=s%3Aa3J2Lr96Kw73Dl542b5k5UNEnLy4uqo5.dMw9IYD96YHjlu5SZoRKm%2BAMc3YNJz8iSl41EUerdeM'
      ),
    ));

    $response = curl_exec($curl);
    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    if($httpcode == 200){
        return $response;
    }else{
        return false;
    }
}

function cb_course_delivery($email, $courseId, $authToken){

    $curl = curl_init();

    $postData = array(
        'email' => $email,
        'subscribed_course_id' => $courseId,
        'source' => 'htschools-web'
    );

    $wpcs_options = get_option('wpcs_options');
    $cs_api_url = $wpcs_options['cs_api_url'] . '/api/order/htCourseDelivery';

    curl_setopt_array($curl, array(
      CURLOPT_URL => $cs_api_url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>json_encode($postData),
      CURLOPT_HTTPHEADER => array(
        'x-auth-token: ' . $authToken,
        'Content-Type: application/json',
        //'Cookie: connect.sid=s%3Aa3J2Lr96Kw73Dl542b5k5UNEnLy4uqo5.dMw9IYD96YHjlu5SZoRKm%2BAMc3YNJz8iSl41EUerdeM'
      ),
    ));

    $response = curl_exec($curl);
    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    if($httpcode == 200){
        return $response;
    }else{
        return false;
    }
}
