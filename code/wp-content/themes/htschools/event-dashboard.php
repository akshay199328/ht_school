<?php 
/**
 * Template Name: Event Dashboard
 */

if ( !defined( 'ABSPATH' ) ) exit;

include("includes/lead-dashboard.php"); 

//$redirectURL1 = bloginfo('url');
//$redirectURL = $redirectURL1."/code-a-thone";

/*if (!is_user_logged_in()){
    header("Location: ".$redirectURL."", TRUE, 301);
}*/

$current_user = wp_get_current_user();
$userID = $current_user->id; 

function credsPoints($userID){

    global $wpdb;
    $table_name = "ht_mycred_log";
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
        $my_cred_table = 'ht_mycred_log';
    }
    else{
        $my_cred_table = 'ht_myCRED_log';
    }
  $results = $wpdb->get_results("SELECT SUM(creds) as points FROM `$my_cred_table` WHERE `user_id` = '$userID'");
  foreach($results as $row){ 
    $points = $row->points; 
  }

  return $points;

}

$points = credsPoints($userID);
if($points != ''){
    $points = $points;
}else{
    $points = 0;
}


$currentUser = wp_get_current_user();
$user_id = bp_loggedin_user_id();
$args = array(
        'field'   => 'Phone', // Field name or ID.
        );

$user_mobile = get_profile_data('Phone');
$user_birthday = get_profile_data('Birthday');
$user_gender = get_profile_data('Gender');
$user_country = get_profile_data('Country');
$user_state = get_profile_data('State');
$user_city = get_profile_data('City');

$user_school_name = "";
$user_school = get_profile_data('Linked School');
if(intval($user_school) > 0){
    $user_school_name = get_user_by('id', $user_school)->display_name;
}

$dobDate = date('M d, Y',strtotime($user_birthday));
$dob = date('Y-m-d',strtotime($user_birthday));

$results = $wpdb->get_results("SELECT country_name FROM `ht_country_master` WHERE `country_id` = '$user_country'");
foreach($results as $row){ 
    $country_name = $row->country_name; 
}

$results2 = $wpdb->get_row("SELECT count(umeta_id) as profileStatus FROM `ht_usermeta` WHERE `user_id` = '$user_id' and `meta_key` = 'profile_status'");
$profileStatus = $results2->profileStatus;


$results11 = $wpdb->get_results("SELECT `ID` FROM `ht_posts` WHERE `post_type` = 'events' and post_status = 'publish' ORDER BY `ID`");
foreach($results11 as $row11){ 
  $post_id = $row11->ID; 
}

function getData($wpdb, $post_id, $meta_key){

  $results = $wpdb->get_results( "SELECT * FROM `ht_postmeta` WHERE `post_id` = '$post_id' AND `meta_key` = '$meta_key'");
  foreach($results as $row){ 
    return $row->meta_value; 
  }

}

$course_1 = getData($wpdb, $post_id, 'learning_modules_course_1');
$course_2 = getData($wpdb, $post_id, 'learning_modules_course_2');
$course_3 = getData($wpdb, $post_id, 'learning_modules_course_3');

$course_status1 = 'course_status'.$course_1;
$course_status2 = 'course_status'.$course_2;
$course_status3 = 'course_status'.$course_3;

$results1 = $wpdb->get_row("SELECT count(umeta_id) as course_status11 FROM `ht_usermeta` WHERE `user_id` = '$userID' and `meta_key` = '$course_status1'");
$course_status11 = $results1->course_status11;

$results2 = $wpdb->get_row("SELECT count(umeta_id) as course_status22 FROM `ht_usermeta` WHERE `user_id` = '$userID' and `meta_key` = '$course_status2'");
$course_status22 = $results2->course_status22;

$results3 = $wpdb->get_row("SELECT count(umeta_id) as course_status33 FROM `ht_usermeta` WHERE `user_id` = '$userID' and `meta_key` = '$course_status3'");
$course_status33 = $results2->course_status33;

if($course_status11 == 1){
    $courseID = $course_1;
}
if($course_status22 == 1){
    $courseID = $course_2;
}
if($course_status33 == 1){
    $courseID = $course_3;
}

//$courseID = 204;

do_action('wplms_course_curriculum_section',$courseID);

$course_curriculum = ht_course_get_full_course_curriculum($courseID); 
$countlesson=count($course_curriculum);
$course_units = [];
foreach($course_curriculum as $lesson){
    if($lesson['type'] == 'unit'){
        array_push($course_units, $lesson);
    }
}
$countunit=count($course_units);
$course_units_array = array_slice($course_units, 0, 4);
$counter=0;

$post = get_post($courseID);
$slug = $post->post_name;

$link = get_post_meta($courseID,'vibe_trailer_link',true);
$parts = explode("/", $link);
$viemocode = end($parts);

?>
<style type="text/css">
.ui-autocomplete {
    z-index: 9999!important;
    background: #fff;
    width: 30%!important;
    height: 250px;
    overflow-y: auto;
    border: 1px solid #ddd;
}
li.ui-menu-item {
    margin-left: -25px;
    padding: 5px;
    cursor: pointer;
}
li.ui-menu-item a{
    color: #000;
}
.ui-helper-hidden-accessible{
    display: none;
}
div#ui-datepicker-div{
    z-index: 9999!important;
}
</style>
<section class="dashboard-wrapper">
    <div class="container">
        <div class="notice-board">
            <div class="pull-left">
                <h6>Notice Board</h6>
                <p>Get 20% discount on cuemath coupon. Please use the <strong>Code CM20P123.</strong></p>
            </div>
            <!-- <div class="pull-right">
                <div class="board_point">
                    <h6>Points</h6>
                    <h3><?php echo $points; ?></h3>
                </div>
            </div> -->
        </div>
        <div class="dahboard_tab">
            <ul class="nav nav-tabs top-tab" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="learning-tab" data-bs-toggle="tab" data-bs-target="#learning" type="button" role="tab" aria-controls="learning" aria-selected="true">
                        <svg  class="lock" xmlns="http://www.w3.org/2000/svg" width="17.126" height="22.53" viewBox="0 0 17.126 22.53">
                            <path id="Shape_928" data-name="Shape 928" d="M3267.128,358.12h-.038V355.43h-.035a1.971,1.971,0,0,0,0-.2,6.7,6.7,0,0,0-6.917-6.233,6.842,6.842,0,0,0-6.44,6.931v2.19h-.167a1.769,1.769,0,0,0-1.765,1.781v9.843a1.769,1.769,0,0,0,1.765,1.781h13.6a1.769,1.769,0,0,0,1.765-1.781V359.9A1.769,1.769,0,0,0,3267.128,358.12Zm-10.5-2.238a3.878,3.878,0,0,1,3.411-3.9,3.776,3.776,0,0,1,4.1,3.346c0,.033.01.111.02.221v2.571h-7.534Zm4.794,9.387a.358.358,0,0,0-.167.361V367.8a.751.751,0,0,1-.406.722.829.829,0,0,1-1.241-.722v-2.166a.342.342,0,0,0-.167-.337,1.674,1.674,0,0,1,1.264-3.008,1.691,1.691,0,0,1,1.383,1.636A1.6,1.6,0,0,1,3261.427,365.268Z" transform="translate(-3251.767 -348.995)" fill="#004ba6" opacity="0.502"/>
                        </svg>

                        Learning
                        <svg xmlns="http://www.w3.org/2000/svg" width="17.834" height="17.836" viewBox="0 0 17.834 17.836" class="declaration">
                            <path id="Shape_924" data-name="Shape 924" d="M3192.22,367.219a8.916,8.916,0,1,0-12.979-.392l.083.062a4.207,4.207,0,0,1-1.834,2.081.351.351,0,0,0,.1.659,5.044,5.044,0,0,0,3.791-1.03l.02.021A8.941,8.941,0,0,0,3192.22,367.219Zm-5.933-11.806a1.463,1.463,0,0,1,0,2.926,1.463,1.463,0,1,1,0-2.926Zm-2.328,9.375c.062-.515.144-1.051.247-1.566.144-.907.31-1.813.474-2.72,0-.062.02-.123.02-.165,0-.371-.124-.515-.494-.556a3.3,3.3,0,0,1-.474-.082.331.331,0,0,1-.247-.371.318.318,0,0,1,.329-.288,1.755,1.755,0,0,1,.33-.021h2.76a.494.494,0,0,1,.556.494,5.617,5.617,0,0,1-.082.845c-.185,1.03-.371,2.081-.577,3.111-.062.35-.123.68-.164,1.03a1.311,1.311,0,0,0,.041.494.384.384,0,0,0,.432.31,2.3,2.3,0,0,0,.536-.144c.144-.062.268-.145.412-.206a.233.233,0,0,1,.33.288.879.879,0,0,1-.206.351,2.722,2.722,0,0,1-1.916.865,5.994,5.994,0,0,1-1.051-.062A1.622,1.622,0,0,1,3183.959,364.788Z" transform="translate(-3176.997 -351.997)" fill="#fff"/>
                        </svg>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="mock-tab" data-bs-toggle="tab" data-bs-target="#mock" type="button" role="tab" aria-controls="mock" aria-selected="false">
                        <svg  class="lock" xmlns="http://www.w3.org/2000/svg" width="17.126" height="22.53" viewBox="0 0 17.126 22.53">
                            <path id="Shape_928" data-name="Shape 928" d="M3267.128,358.12h-.038V355.43h-.035a1.971,1.971,0,0,0,0-.2,6.7,6.7,0,0,0-6.917-6.233,6.842,6.842,0,0,0-6.44,6.931v2.19h-.167a1.769,1.769,0,0,0-1.765,1.781v9.843a1.769,1.769,0,0,0,1.765,1.781h13.6a1.769,1.769,0,0,0,1.765-1.781V359.9A1.769,1.769,0,0,0,3267.128,358.12Zm-10.5-2.238a3.878,3.878,0,0,1,3.411-3.9,3.776,3.776,0,0,1,4.1,3.346c0,.033.01.111.02.221v2.571h-7.534Zm4.794,9.387a.358.358,0,0,0-.167.361V367.8a.751.751,0,0,1-.406.722.829.829,0,0,1-1.241-.722v-2.166a.342.342,0,0,0-.167-.337,1.674,1.674,0,0,1,1.264-3.008,1.691,1.691,0,0,1,1.383,1.636A1.6,1.6,0,0,1,3261.427,365.268Z" transform="translate(-3251.767 -348.995)" fill="#004ba6" opacity="0.502"/>
                        </svg>
                        Mock Qualifier
                        <svg xmlns="http://www.w3.org/2000/svg" width="17.834" height="17.836" viewBox="0 0 17.834 17.836" class="declaration">
                            <path id="Shape_924" data-name="Shape 924" d="M3192.22,367.219a8.916,8.916,0,1,0-12.979-.392l.083.062a4.207,4.207,0,0,1-1.834,2.081.351.351,0,0,0,.1.659,5.044,5.044,0,0,0,3.791-1.03l.02.021A8.941,8.941,0,0,0,3192.22,367.219Zm-5.933-11.806a1.463,1.463,0,0,1,0,2.926,1.463,1.463,0,1,1,0-2.926Zm-2.328,9.375c.062-.515.144-1.051.247-1.566.144-.907.31-1.813.474-2.72,0-.062.02-.123.02-.165,0-.371-.124-.515-.494-.556a3.3,3.3,0,0,1-.474-.082.331.331,0,0,1-.247-.371.318.318,0,0,1,.329-.288,1.755,1.755,0,0,1,.33-.021h2.76a.494.494,0,0,1,.556.494,5.617,5.617,0,0,1-.082.845c-.185,1.03-.371,2.081-.577,3.111-.062.35-.123.68-.164,1.03a1.311,1.311,0,0,0,.041.494.384.384,0,0,0,.432.31,2.3,2.3,0,0,0,.536-.144c.144-.062.268-.145.412-.206a.233.233,0,0,1,.33.288.879.879,0,0,1-.206.351,2.722,2.722,0,0,1-1.916.865,5.994,5.994,0,0,1-1.051-.062A1.622,1.622,0,0,1,3183.959,364.788Z" transform="translate(-3176.997 -351.997)" fill="#fff"/>
                        </svg>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="qualifier-tab" data-bs-toggle="tab" data-bs-target="#qualifier" type="button" role="tab" aria-controls="qualifier" aria-selected="false">
                       <svg  class="lock" xmlns="http://www.w3.org/2000/svg" width="17.126" height="22.53" viewBox="0 0 17.126 22.53">
                            <path id="Shape_928" data-name="Shape 928" d="M3267.128,358.12h-.038V355.43h-.035a1.971,1.971,0,0,0,0-.2,6.7,6.7,0,0,0-6.917-6.233,6.842,6.842,0,0,0-6.44,6.931v2.19h-.167a1.769,1.769,0,0,0-1.765,1.781v9.843a1.769,1.769,0,0,0,1.765,1.781h13.6a1.769,1.769,0,0,0,1.765-1.781V359.9A1.769,1.769,0,0,0,3267.128,358.12Zm-10.5-2.238a3.878,3.878,0,0,1,3.411-3.9,3.776,3.776,0,0,1,4.1,3.346c0,.033.01.111.02.221v2.571h-7.534Zm4.794,9.387a.358.358,0,0,0-.167.361V367.8a.751.751,0,0,1-.406.722.829.829,0,0,1-1.241-.722v-2.166a.342.342,0,0,0-.167-.337,1.674,1.674,0,0,1,1.264-3.008,1.691,1.691,0,0,1,1.383,1.636A1.6,1.6,0,0,1,3261.427,365.268Z" transform="translate(-3251.767 -348.995)" fill="#004ba6" opacity="0.502"/>
                        </svg>
                       Qualifier
                       <svg xmlns="http://www.w3.org/2000/svg" width="17.834" height="17.836" viewBox="0 0 17.834 17.836" class="declaration">
                            <path id="Shape_924" data-name="Shape 924" d="M3192.22,367.219a8.916,8.916,0,1,0-12.979-.392l.083.062a4.207,4.207,0,0,1-1.834,2.081.351.351,0,0,0,.1.659,5.044,5.044,0,0,0,3.791-1.03l.02.021A8.941,8.941,0,0,0,3192.22,367.219Zm-5.933-11.806a1.463,1.463,0,0,1,0,2.926,1.463,1.463,0,1,1,0-2.926Zm-2.328,9.375c.062-.515.144-1.051.247-1.566.144-.907.31-1.813.474-2.72,0-.062.02-.123.02-.165,0-.371-.124-.515-.494-.556a3.3,3.3,0,0,1-.474-.082.331.331,0,0,1-.247-.371.318.318,0,0,1,.329-.288,1.755,1.755,0,0,1,.33-.021h2.76a.494.494,0,0,1,.556.494,5.617,5.617,0,0,1-.082.845c-.185,1.03-.371,2.081-.577,3.111-.062.35-.123.68-.164,1.03a1.311,1.311,0,0,0,.041.494.384.384,0,0,0,.432.31,2.3,2.3,0,0,0,.536-.144c.144-.062.268-.145.412-.206a.233.233,0,0,1,.33.288.879.879,0,0,1-.206.351,2.722,2.722,0,0,1-1.916.865,5.994,5.994,0,0,1-1.051-.062A1.622,1.622,0,0,1,3183.959,364.788Z" transform="translate(-3176.997 -351.997)" fill="#fff"/>
                        </svg>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
                        <svg  class="lock" xmlns="http://www.w3.org/2000/svg" width="17.126" height="22.53" viewBox="0 0 17.126 22.53">
                            <path id="Shape_928" data-name="Shape 928" d="M3267.128,358.12h-.038V355.43h-.035a1.971,1.971,0,0,0,0-.2,6.7,6.7,0,0,0-6.917-6.233,6.842,6.842,0,0,0-6.44,6.931v2.19h-.167a1.769,1.769,0,0,0-1.765,1.781v9.843a1.769,1.769,0,0,0,1.765,1.781h13.6a1.769,1.769,0,0,0,1.765-1.781V359.9A1.769,1.769,0,0,0,3267.128,358.12Zm-10.5-2.238a3.878,3.878,0,0,1,3.411-3.9,3.776,3.776,0,0,1,4.1,3.346c0,.033.01.111.02.221v2.571h-7.534Zm4.794,9.387a.358.358,0,0,0-.167.361V367.8a.751.751,0,0,1-.406.722.829.829,0,0,1-1.241-.722v-2.166a.342.342,0,0,0-.167-.337,1.674,1.674,0,0,1,1.264-3.008,1.691,1.691,0,0,1,1.383,1.636A1.6,1.6,0,0,1,3261.427,365.268Z" transform="translate(-3251.767 -348.995)" fill="#004ba6" opacity="0.502"/>
                        </svg>
                        Finale
                        <svg xmlns="http://www.w3.org/2000/svg" width="17.834" height="17.836" viewBox="0 0 17.834 17.836" class="declaration">
                            <path id="Shape_924" data-name="Shape 924" d="M3192.22,367.219a8.916,8.916,0,1,0-12.979-.392l.083.062a4.207,4.207,0,0,1-1.834,2.081.351.351,0,0,0,.1.659,5.044,5.044,0,0,0,3.791-1.03l.02.021A8.941,8.941,0,0,0,3192.22,367.219Zm-5.933-11.806a1.463,1.463,0,0,1,0,2.926,1.463,1.463,0,1,1,0-2.926Zm-2.328,9.375c.062-.515.144-1.051.247-1.566.144-.907.31-1.813.474-2.72,0-.062.02-.123.02-.165,0-.371-.124-.515-.494-.556a3.3,3.3,0,0,1-.474-.082.331.331,0,0,1-.247-.371.318.318,0,0,1,.329-.288,1.755,1.755,0,0,1,.33-.021h2.76a.494.494,0,0,1,.556.494,5.617,5.617,0,0,1-.082.845c-.185,1.03-.371,2.081-.577,3.111-.062.35-.123.68-.164,1.03a1.311,1.311,0,0,0,.041.494.384.384,0,0,0,.432.31,2.3,2.3,0,0,0,.536-.144c.144-.062.268-.145.412-.206a.233.233,0,0,1,.33.288.879.879,0,0,1-.206.351,2.722,2.722,0,0,1-1.916.865,5.994,5.994,0,0,1-1.051-.062A1.622,1.622,0,0,1,3183.959,364.788Z" transform="translate(-3176.997 -351.997)" fill="#fff"/>
                        </svg>
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="learning" role="tabpanel" aria-labelledby="learning-tab">
                    <div class="col-12 col-md-7 col-sm-12  pull-left mrg">
                        <div class="leftcontent_tab">
                            <div class="details_header">
                                <div class="col-12 col-md-12 col-sm-12 mrg">
                                    <div class="option_share">
                                        <span class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17.834" height="17.836" viewBox="0 0 17.834 17.836">
                                                <path id="Shape_924_copy_4" data-name="Shape 924 copy 4" d="M3480.22,446.219a8.916,8.916,0,1,0-12.979-.391l.082.062a4.207,4.207,0,0,1-1.834,2.081.351.351,0,0,0,.1.659,5.044,5.044,0,0,0,3.791-1.03l.02.021A8.942,8.942,0,0,0,3480.22,446.219Zm-5.934-11.806a1.463,1.463,0,0,1,0,2.926,1.463,1.463,0,0,1,0-2.926Zm-2.328,9.375c.062-.515.144-1.051.248-1.566.144-.907.309-1.813.474-2.72,0-.062.02-.123.02-.165,0-.371-.124-.515-.494-.556a3.293,3.293,0,0,1-.474-.082.331.331,0,0,1-.247-.371.318.318,0,0,1,.329-.288,1.755,1.755,0,0,1,.33-.021h2.761a.494.494,0,0,1,.556.494,5.614,5.614,0,0,1-.082.845c-.185,1.03-.371,2.081-.577,3.112-.061.35-.124.68-.164,1.03a1.32,1.32,0,0,0,.041.495.385.385,0,0,0,.433.309,2.315,2.315,0,0,0,.536-.144c.144-.062.268-.145.412-.206a.233.233,0,0,1,.33.288.879.879,0,0,1-.206.351,2.722,2.722,0,0,1-1.916.865,6.007,6.007,0,0,1-1.051-.062A1.623,1.623,0,0,1,3471.959,443.788Z" transform="translate(-3464.997 -430.997)"/>
                                            </svg>
                                        </span>
                                        <span class="share">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" viewBox="0 0 25 16">
                                                <path id="Shape_874" data-name="Shape 874" d="M3516.475,431l9.524,7.407-9.524,7.408v-3.852c-.507-.023-9.338-.306-15.476,5.037,2.457-7.534,10.171-10.811,15.476-12.148Z" transform="translate(-3500.999 -430.999)"/>
                                            </svg>
                                            <div class="toggle-share ">
                                                <h6>Share with your Friends</h6>
                                                <ul id="social_share">
                                                    <li value="whatsapp">
                                                        <a href="https://api.whatsapp.com//send?text=<?php echo get_bloginfo('url'); ?>/course/<?php echo $slug; ?>" target="_blank">
                                                            <svg id="icons8-whatsapp" xmlns="http://www.w3.org/2000/svg" width="47.685" height="47.888" viewBox="0 0 47.685 47.888">
                                                                <path id="Path_83" data-name="Path 83" d="M4.868,50.51l3.2-11.686A22.56,22.56,0,1,1,27.617,50.119h-.01a22.534,22.534,0,0,1-10.78-2.746Z" transform="translate(-3.679 -3.812)" fill="#fff"/>
                                                                <path id="Path_84" data-name="Path 84" d="M4.962,51.2a.594.594,0,0,1-.573-.75L7.525,39a23.15,23.15,0,1,1,9.321,9.1L5.113,51.178A.543.543,0,0,1,4.962,51.2Z" transform="translate(-3.773 -3.906)" fill="#fff"/>
                                                                <path id="Path_85" data-name="Path 85" d="M27.8,5.188a22.56,22.56,0,0,1,0,45.119H27.8a22.534,22.534,0,0,1-10.78-2.746L5.056,50.7l3.2-11.686A22.562,22.562,0,0,1,27.8,5.188m0,45.119h0m0,0h0M27.8,4h0A23.753,23.753,0,0,0,6.981,39.171L3.91,50.386a1.188,1.188,0,0,0,1.448,1.463l11.51-3.018A23.749,23.749,0,1,0,27.8,4Z" transform="translate(-3.868 -4)" fill="#cfd8dc"/>
                                                                <path id="Path_86" data-name="Path 86" d="M40.246,13.7A18.752,18.752,0,0,0,11.1,36.924l.447.709-1.9,6.916,7.1-1.861.686.406a18.714,18.714,0,0,0,9.543,2.613h.007A18.751,18.751,0,0,0,40.246,13.7Z" transform="translate(-3.046 -3.209)" fill="#40c351"/>
                                                                <path id="Path_87" data-name="Path 87" d="M20.191,16.2c-.422-.939-.866-.958-1.269-.974-.329-.014-.7-.013-1.08-.013a2.072,2.072,0,0,0-1.5.706,6.318,6.318,0,0,0-1.974,4.7c0,2.773,2.02,5.454,2.3,5.829s3.9,6.249,9.629,8.508c4.761,1.877,5.731,1.5,6.764,1.41s3.335-1.363,3.8-2.679a4.72,4.72,0,0,0,.329-2.679c-.141-.235-.517-.375-1.08-.658s-3.335-1.646-3.852-1.833-.892-.282-1.269.283-1.455,1.833-1.785,2.209-.658.424-1.221.141a15.429,15.429,0,0,1-4.533-2.8,16.982,16.982,0,0,1-3.136-3.9c-.329-.563-.036-.869.247-1.15.253-.253.563-.658.846-.987a3.855,3.855,0,0,0,.563-.94,1.037,1.037,0,0,0-.048-.987C21.787,20.1,20.692,17.316,20.191,16.2Z" transform="translate(-1.892 -1.89)" fill="#fff" fill-rule="evenodd"/>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                    <li value="twitter">
                                                        <a href="https://twitter.com/intent/tweet?text=<?php echo get_bloginfo('url'); ?>/course/<?php echo $slug; ?>" target="_blank">
                                                            <svg id="icons8-twitter-circled" xmlns="http://www.w3.org/2000/svg" width="47.685" height="47.685" viewBox="0 0 47.685 47.685">
                                                                <path id="Path_88" data-name="Path 88" d="M27.842,4A23.842,23.842,0,1,0,51.685,27.842,23.842,23.842,0,0,0,27.842,4Z" transform="translate(-4 -4)" fill="#03a9f4"/>
                                                                <path id="Path_89" data-name="Path 89" d="M40.611,17.527a13.383,13.383,0,0,1-3.576,1.049c1.214-.72,3.139-2.22,3.576-3.576a17.065,17.065,0,0,1-4.522,1.636,5.761,5.761,0,0,0-9.784,4.325v2.384c-4.768,0-9.418-3.632-12.311-7.153a5.738,5.738,0,0,0-.8,2.929c0,2.168,1.992,4.369,3.569,5.416a11.065,11.065,0,0,1-3.576-1.192v.068a5.345,5.345,0,0,0,4.664,5.272,7.465,7.465,0,0,1-3.386.621c.746,2.307,4.5,3.526,7.067,3.576-2.01,1.558-5.593,2.384-8.345,2.384A8.785,8.785,0,0,1,12,35.239a18.539,18.539,0,0,0,9.537,2.412c10.8,0,16.69-8.247,16.69-15.939,0-.253-.008-1.1-.021-1.347a9.057,9.057,0,0,0,2.406-2.837" transform="translate(-2.463 -1.887)" fill="#fff"/>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                    <li value="facebook">
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_bloginfo('url'); ?>/course/<?php echo $slug; ?>" target="_blank">
                                                            <svg id="icons8-facebook" xmlns="http://www.w3.org/2000/svg" width="47.685" height="47.685" viewBox="0 0 47.685 47.685">
                                                                <path id="Path_90" data-name="Path 90" d="M28.842,5A23.842,23.842,0,1,0,52.685,28.842,23.842,23.842,0,0,0,28.842,5Z" transform="translate(-5 -5)" fill="#1976d3"/>
                                                                <path id="Path_91" data-name="Path 91" d="M29.15,33.174h6.17l.969-6.268h-7.14V23.48c0-2.6.851-4.913,3.286-4.913h3.914V13.1a33.247,33.247,0,0,0-4.89-.3c-5.739,0-9.1,3.031-9.1,9.935v4.17h-5.9v6.268h5.9V50.4a23.891,23.891,0,0,0,3.566.295,24,24,0,0,0,3.228-.243Z" transform="translate(-2.08 -3.012)" fill="#fff"/>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                                <div class="video_decp">
                                    <div class="col-12 col-md-4 col-sm-12 mrg pull-left">
                                        <!-- <iframe src="https://player.vimeo.com/video/40877088?portrait=0" width="100%" height="200" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe> -->
                                        <div class="dashboard_video">
                                            <!-- <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="<?php echo get_post_meta($courseID,'vibe_trailer_link',true); ?>" width="100%" allowfullscreen></iframe>
                                            </div> -->
                                            <iframe src="https://player.vimeo.com/video/<?php echo $viemocode; ?>" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="top:0; left:0; width:100%; height:100%;"></iframe>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-8 col-sm-12 mrg pull-left">
                                        <div class="details">
                                            <h4><?php echo get_the_title($courseID); ?></h4>
                                            <p><?php echo get_the_excerpt($courseID); ?></p>
                                            <button type="button" class="resume_btn btn"><a href="<?php echo get_bloginfo('url'); ?>/course/<?php echo $slug; ?>" style="color:#fff;">Resume Learning</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-sm-12 mrg pull-left">
                                <div class="progress">
                                    <div class="progress-bar w-40" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="details_footer">
                                <span class="head">Total Chapter: <?php echo $countunit; ?></span>
                                <div class="tab_scroll">
                                <?php 
                                  foreach($course_units as $lesson_units){ 
                                    $lessonId = get_post($lesson['id']); ?>
                                    <div class="list">
                                        <div class="col-12 col-lg-8 col-md-12 col-sm-12 mrg pull-left">
                                            <h5><a href="<?php echo get_bloginfo('url'); ?>/course/<?php echo $slug; ?>" style="color: #2d2d2d;"><?php echo $lesson_units['title'];?></a>
                                                <span class="toggle_icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17.218" height="9.64" viewBox="0 0 17.218 9.64">
                                                        <path id="Shape_788" data-name="Shape 788" d="M4655.289,1203.774l7.2,7.226,7.195-7.226" transform="translate(-4653.875 -1202.36)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                                    </svg>
                                                </span>
                                            </h5>
                                        </div>
                                        <!-- <div class="col-12 col-lg-4 col-md-12 col-sm-12 mobile-show mrg pull-right">
                                            <h6 class="">
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21.626" height="21.626" viewBox="0 0 21.626 21.626">
                                                        <path id="Shape_882" data-name="Shape 882" d="M3382.348,786.705a10.813,10.813,0,1,0,10.813,10.813A10.813,10.813,0,0,0,3382.348,786.705Zm7.006,10.071-2.8,2.728.665,3.843a.973.973,0,0,1-.391.949.957.957,0,0,1-1.027.078l-3.451-1.819-3.451,1.819a.972.972,0,0,1-1.037-.078.993.993,0,0,1-.391-.949l.665-3.843-2.8-2.728a.975.975,0,0,1,.548-1.662l3.852-.567,1.731-3.491a1.009,1.009,0,0,1,1.75,0l1.731,3.491,3.853.567a.976.976,0,0,1,.548,1.662Z" transform="translate(-3371.536 -786.705)" fill="#ffcd35"/>
                                                    </svg>
                                                </span>800 / 1000
                                            </h6>
                                        </div> -->
                                        <div class="col-12 col-md-12 col-sm-12 mrg mobile-show">
                                            <div class="progressbar">
                                                <span class="pull-left">
                                                    <p>Completed</p>
                                                </span>
                                                <span class="pull-right">
                                                    <h6>40%</h6>
                                                </span>
                                            </div>
                                            <div class="col-12 col-md-12 col-sm-12 mrg pull-left">
                                                <div class="progress">
                                                    <div class="progress-bar w-40" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 col-sm-12 pull-left mrg">
                        <div class="points_board">
                            <div class="top-points">
                                <div class="pull-left">
                                    <h6>Points</h6>
                                </div>
                                <div class="pull-right">
                                    <span class="total_point">Total<span class="break">Points</span> </span>
                                    <span class="points"><?php echo $points; ?></span>
                                </div>
                                <div class="board-button">
                                    <button type="button" data-toggle="modal" data-target="#exampleModal">VIEW POINTS DETAILS</button>
                                </div>
                            </div>
                            <div class="earn-points">
                                <div class="pull-left">
                                    <h6>Earn points</h6>
                                </div>
                                <div class="board-button">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#refer-popup">REFERRALS</button>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#">UPLOAD PROJECT</button>
                                </div>
                            </div>
                        </div>
                        <div class="leader_board">
                            <div class="col-12 col-sm-12 mrg">
                                <div class="pull-left">
                                    <span class="head">Leaderboard</span>
                                </div>
                                <div class="pull-right">
                                    <h6>Your Rank <span class="rank">08</span></h6>
                                </div>
                            </div>
                            <div class="rank-people">
                                <span class="rank-two">
                                    <figure>
                                        <img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/rank2.png">
                                    </figure>
                                    <p class="name">Dummy Name</p>
                                </span>
                                <span class="rank-one">
                                    <figure>
                                        <img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/rank1.png">
                                    </figure>
                                    <p class="name">Dummy Name</p>
                                </span>
                                <span class="rank-three">
                                    <figure>
                                        <img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/rank3.png">
                                    </figure>
                                    <p class="name">Dummy Name</p>
                                </span>
                            </div>
                            <div class="board-list">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-zone-tab" data-bs-toggle="pill" data-bs-target="#pills-zone" type="button" role="tab" aria-controls="pills-zone" aria-selected="true">ZONES</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-school-tab" data-bs-toggle="pill" data-bs-target="#pills-school" type="button" role="tab" aria-controls="pills-school" aria-selected="false">SCHOOLS</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-zone" role="tabpanel" aria-labelledby="pills-zone-tab">
                                        <div class="tab_scroll">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>01</td>
                                                            <td>Dummy name</td>
                                                            <td class="numbers">1000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>02</td>
                                                            <td>Dummy name</td>
                                                            <td class="numbers">800</td>
                                                        </tr>
                                                        <tr>
                                                            <td>03</td>
                                                            <td>Dummy name</td>
                                                            <td class="numbers">800</td>
                                                        </tr>
                                                        <tr>
                                                            <td>01</td>
                                                            <td>Dummy name</td>
                                                            <td class="numbers">1000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>02</td>
                                                            <td>Dummy name</td>
                                                            <td class="numbers">800</td>
                                                        </tr>
                                                        <tr>
                                                            <td>03</td>
                                                            <td>Dummy name</td>
                                                            <td class="numbers">800</td>
                                                        </tr>
                                                        <tr>
                                                            <td>01</td>
                                                            <td>Dummy name</td>
                                                            <td class="numbers">1000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>02</td>
                                                            <td>Dummy name</td>
                                                            <td class="numbers">800</td>
                                                        </tr>
                                                        <tr>
                                                            <td>03</td>
                                                            <td>Dummy name</td>
                                                            <td class="numbers">800</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-school" role="tabpanel" aria-labelledby="pills-school-tab">
                                        <div class="tab_scroll">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>01</td>
                                                            <td>Dummy name</td>
                                                            <td class="numbers">1000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>02</td>
                                                            <td>Dummy name</td>
                                                            <td class="numbers">800</td>
                                                        </tr>
                                                        <tr>
                                                            <td>03</td>
                                                            <td>Dummy name</td>
                                                            <td class="numbers">800</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="mock" role="tabpanel" aria-labelledby="mock-tab">
                    2
                </div>
                <div class="tab-pane fade" id="qualifier" role="tabpanel" aria-labelledby="qualifier-tab">
                    3
                </div>
                <div class="tab-pane fade" id="finale" role="tabpanel" aria-labelledby="finale-tab">
                    4
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-wrapper about">
        <div class="section-copy">
            <h2 class="section-title">About Our Partners</h2>
            <div class="owl-carousel owl-theme about_slider">
            <?php
                $args1 = array(
                  'post_type' => 'event_about_our_part',
                  'post_status' => 'publish',
                  'orderby' => 'publish_date',
                  'order' => 'DESC',        
                  'nopaging' => true
                );
                $Query1 = new WP_Query( $args1 );
                
                if ($Query1->have_posts()) : while ($Query1->have_posts()) : $Query1->the_post();
                  $custom_fields = get_post_custom();
                  $image_url = wp_get_attachment_url($custom_fields['upload_image'][0]);
            ?>
                <div class="item">
                    <div class="partner-copy">
                        <div class="col-12 col-sm-5 pull-left">
                            <figure class="image"><img src="<?php echo $image_url; ?>"></figure>
                        </div>
                        <div class="col-12 col-sm-7 pull-right">
                            <div class="copy">
                                <h3 class="title"><?php echo $custom_fields['about_our_partners_title'][0];?></h3>
                                <p><?php echo $custom_fields['description'][0];?></p>
                                <a class="read-more" href="<?php echo $custom_fields['link'][0];?>">Visit Partner >></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile;endif; ?>
            </div>
        </div>
    </section>
    <section class="section-wrapper partners dashboard_partner">
        <div class="section-copy">
            <h2 class="section-title">Our Partners Logo</h2>
            <div class="owl-carousel owl-theme partners_slider">
            <?php
                $args1 = array(
                  'post_type' => 'event_our_partners_l',
                  'post_status' => 'publish',
                  'orderby' => 'publish_date',
                  'order' => 'DESC',        
                  'nopaging' => true
                );
                $Query1 = new WP_Query( $args1 );
                
                if ($Query1->have_posts()) : while ($Query1->have_posts()) : $Query1->the_post();
                  $custom_fields = get_post_custom();
                  $image_url = wp_get_attachment_url($custom_fields['upload_image'][0]);
            ?>
                <div class="item">
                    <span class="logo"><img src="<?php echo $image_url; ?>"></span>
                </div>
            <?php endwhile;endif; ?>
            </div>
        </div>
    </section>

    <!-- Modal Refer Friends-->
    <div class="modal fade refer-popup" id="refer-popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog  modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Refer Friends</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" width="21.657" height="21.657" viewBox="0 0 21.657 21.657">
                  <g id="Group_8" data-name="Group 8" transform="translate(-1045.728 -811.172)">
                    <line id="Line_2" data-name="Line 2" x1="16" y2="16" transform="translate(1048.556 814)" fill="none" stroke="#373737" stroke-linecap="round" stroke-width="4"/>
                    <line id="Line_3" data-name="Line 3" x2="16" y2="16" transform="translate(1048.556 814)" fill="none" stroke="#373737" stroke-linecap="round" stroke-width="4"/>
                  </g>
                </svg>
            </button>
          </div>
          <div class="modal-body">
            <div class="refer-share">
                <div class="pull-left left_border">
                    <div class="share-link">
                        <h6>Your Referral Code:</h6>
                        <div class="link">
                            <!-- <span><?php //echo get_home_url().'/?mref='.do_shortcode('[mycred_affiliate_id]'); ?></span> -->
                            <input type="text" id="myInput" value="<?php echo get_home_url().'/?mref='.do_shortcode('[mycred_affiliate_id]'); ?>" style="width: 100%; padding: 10px; border: 3px solid #000000ad;">
                            <button type="button" onclick="myFunction()" class="copy_button">Copy</button>
                        </div>
                        <p id="successMsg"></p>
                    </div>
                </div>
                <div class="pull-right">
                    <div class="share-option">
                        <h6>Share code on</h6>
                        <ul>
                            <li>
                                <a href="https://api.whatsapp.com//send?text=My Referrals Code is : <?php echo get_home_url().'/?mref='.do_shortcode('[mycred_affiliate_id]'); ?>" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="59" height="59.251" viewBox="0 0 59 59.251">
                                        <g id="icons8-whatsapp" transform="translate(-3.868 -4)">
                                            <path id="Path_83" data-name="Path 83" d="M4.868,61.309l3.96-14.458A27.913,27.913,0,1,1,33.015,60.826H33a27.881,27.881,0,0,1-13.338-3.4Z" transform="translate(0.47 0.47)" fill="#fff"/>
                                            <path id="Path_84" data-name="Path 84" d="M5.1,62.279a.734.734,0,0,1-.709-.928l3.88-14.166A28.644,28.644,0,1,1,19.807,58.448L5.29,62.254A.672.672,0,0,1,5.1,62.279Z" transform="translate(0.235 0.235)" fill="#fff"/>
                                            <path id="Path_85" data-name="Path 85" d="M33.485,5.47a27.913,27.913,0,0,1,0,55.826h-.012a27.881,27.881,0,0,1-13.338-3.4l-14.8,3.881L9.3,47.321A27.916,27.916,0,0,1,33.485,5.47m0,55.826h0m0,0h0m0-57.3h0A29.39,29.39,0,0,0,7.72,47.516L3.92,61.393A1.47,1.47,0,0,0,5.712,63.2l14.241-3.734A29.385,29.385,0,1,0,33.485,4Z" transform="translate(0)" fill="#cfd8dc"/>
                                            <path id="Path_86" data-name="Path 86" d="M47.842,15.007A23.2,23.2,0,0,0,11.779,43.738l.553.878L9.987,53.173l8.781-2.3.848.5a23.154,23.154,0,0,0,11.808,3.233h.009a23.2,23.2,0,0,0,16.409-39.6Z" transform="translate(2.052 1.977)" fill="#40c351"/>
                                            <path id="Path_87" data-name="Path 87" d="M21.573,16.436C21.051,15.274,20.5,15.251,20,15.23c-.407-.018-.872-.016-1.336-.016a2.563,2.563,0,0,0-1.86.873A7.817,7.817,0,0,0,14.365,21.9c0,3.431,2.5,6.748,2.848,7.212s4.825,7.731,11.914,10.527c5.891,2.323,7.09,1.861,8.369,1.745S41.622,39.7,42.2,38.073a5.84,5.84,0,0,0,.407-3.315c-.175-.291-.639-.465-1.336-.814s-4.127-2.036-4.766-2.268-1.1-.348-1.57.35-1.8,2.268-2.208,2.733-.814.525-1.511.175a19.09,19.09,0,0,1-5.608-3.461,21.012,21.012,0,0,1-3.88-4.829c-.407-.7-.044-1.075.306-1.423.313-.313.7-.814,1.047-1.222a4.77,4.77,0,0,0,.7-1.163,1.283,1.283,0,0,0-.059-1.222C23.549,21.263,22.193,17.815,21.573,16.436Z" transform="translate(4.935 5.272)" fill="#fff" fill-rule="evenodd"/>
                                        </g>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/intent/tweet?text=My Referral Code is : <?php echo get_home_url().'/?mref='.do_shortcode('[mycred_affiliate_id]'); ?>" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="59" height="59" viewBox="0 0 59 59">
                                        <g id="icons8-twitter-circled" transform="translate(-4 -4)">
                                            <path id="Path_88" data-name="Path 88" d="M33.5,4A29.5,29.5,0,1,0,63,33.5,29.5,29.5,0,0,0,33.5,4Z" fill="#03a9f4"/>
                                            <path id="Path_89" data-name="Path 89" d="M47.4,18.127a16.559,16.559,0,0,1-4.425,1.3c1.5-.891,3.884-2.746,4.425-4.425a21.115,21.115,0,0,1-5.595,2.024A7.06,7.06,0,0,0,36.51,15c-4.012,0-6.81,3.4-6.81,7.375v2.95c-5.9,0-11.652-4.494-15.232-8.85a7.1,7.1,0,0,0-.984,3.624c0,2.683,2.465,5.406,4.416,6.7a13.69,13.69,0,0,1-4.425-1.475v.084c0,3.491,2.45,5.862,5.77,6.522a9.236,9.236,0,0,1-4.189.768c.923,2.854,5.565,4.363,8.744,4.425-2.487,1.928-6.921,2.95-10.325,2.95A10.869,10.869,0,0,1,12,40.041a22.938,22.938,0,0,0,11.8,2.984c13.359,0,20.65-10.2,20.65-19.721,0-.313-.01-1.36-.027-1.667a11.207,11.207,0,0,0,2.977-3.51" transform="translate(3.8 5.225)" fill="#fff"/>
                                         </g>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_bloginfo('url')?>&quote=My Referrals Code is : <?php echo get_home_url().'/?mref='.do_shortcode('[mycred_affiliate_id]'); ?>" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="59" height="59" viewBox="0 0 59 59">
                                        <g id="icons8-facebook" transform="translate(-5 -5)">
                                            <path id="Path_90" data-name="Path 90" d="M34.5,5A29.5,29.5,0,1,0,64,34.5,29.5,29.5,0,0,0,34.5,5Z" fill="#1976d3"/>
                                            <path id="Path_91" data-name="Path 91" d="M32.162,38.008H39.8l1.2-7.755H32.16V26.014c0-3.222,1.053-6.079,4.066-6.079h4.843V13.167a41.135,41.135,0,0,0-6.051-.366c-7.1,0-11.263,3.75-11.263,12.292v5.159h-7.3v7.755h7.3V59.324a29.56,29.56,0,0,0,4.413.365,29.694,29.694,0,0,0,3.993-.3Z" transform="translate(6.332 4.311)" fill="#fff"/>
                                        </g>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="refer-note">
                <h5>Invite your Friends</h5>
                <p>Type email addressed of your friends separated with comma.</p>
                <textarea id="refer_email"></textarea>
                <button type="button" class="send-button" id="send_invitation">Send Invitations</button>
            </div>
            <span id="refer_message" class="send-button" style="text-align: center;display: block;"></span>
          </div>
          
        </div>
      </div>
    </div>
    <!-- Points Details Modal -->
    <div class="modal fade refer-popup" id="profile-popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Complete your profile</h5>
                    <p>Lorem ipsum Dummy Text</p>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="21.657" height="21.657" viewBox="0 0 21.657 21.657">
                          <g id="Group_8" data-name="Group 8" transform="translate(-1045.728 -811.172)">
                            <line id="Line_2" data-name="Line 2" x1="16" y2="16" transform="translate(1048.556 814)" fill="none" stroke="#373737" stroke-linecap="round" stroke-width="4"/>
                            <line id="Line_3" data-name="Line 3" x2="16" y2="16" transform="translate(1048.556 814)" fill="none" stroke="#373737" stroke-linecap="round" stroke-width="4"/>
                          </g>
                        </svg>
                    </button> -->
                </div>
                <div class="modal-body">
                    <form class="row row-cols-lg-auto g-3 align-items-center" id="profile-edit-form-step1" type="POST">
                        <input type="hidden" name="action" value="save_custom_profile">
                        <div id="step-1">
                            <div class="profile-progress">
                                <ul class="progressbar">
                                    <li class="stepli1 active"></li>
                                    <li class="stepli2"></li>
                                    <li class="stepli3"></li>
                                </ul>
                            </div>
                                <div class="float-start">
                                    <div class="profile-form">
                                            <div class="list">
                                                <div class="form-group">
                                                    <label class="form-label">First Name*</label>
                                                    <input type="text" class="form-control" name="first_name" placeholder="First Name" value="<?php echo $currentUser->user_firstname; ?>" id="user_firstname">
                                                    <span id="errFirstName"></span>
                                                </div>
                                            </div>
                                            <div class="list">
                                                <div class="form-group">
                                                    <label class="form-label">Last Name*</label>
                                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="<?php echo $currentUser->user_lastname; ?>" id="user_lastname">
                                                    <span id="errLastName"></span>
                                                </div>
                                            </div>
                                            <div class="list">
                                                <div class="form-group">
                                                    <label class="form-label">Email Id*</label>
                                                    <input type="email" class="form-control" name="user_email" placeholder="" value="<?php echo $currentUser->user_email; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="list">
                                                <div class="form-group">
                                                    <label class="form-label">Mobile Number*</label>
                                                    <input type="text" class="form-control" name="user_mobile" id="user_mobile" placeholder="Mobile Number" maxlength="10" value="<?php echo $user_mobile ?>" >
                                                    <span id="errMobileMsg"></span>
                                                </div>
                                            </div>
                                            <div class="list">
                                                <div class="form-group">
                                                    <label class="form-label">Date of Birth*</label>
                                                    <div class="input-group input-date">
                                                        <!-- <input type="date" class="form-control" name="user_dob" id="user_dob" placeholder="mm/dd/yyyy" value="<?php //echo $dob; ?>"> -->
                                                        <input id="user_dob_display" type="text" class="form-control" name="user_dob_display" placeholder="" value="<?php echo $dobDate; ?>" readonly>
                                                        <input id="user_dob" type="hidden" name="user_dob" value="<?php echo $dob; ?>">
                                                        <!-- <div class="input-group-text">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="23.351" height="25.623" viewBox="0 0 23.351 25.623">
                                                                <path id="Path_101" data-name="Path 101" d="M21.848,4.562H19.513V3.281a1.173,1.173,0,1,0-2.335,0V4.562H10.173V3.281A1.228,1.228,0,0,0,9.005,2,1.228,1.228,0,0,0,7.838,3.281V4.562H5.5A3.685,3.685,0,0,0,2,8.406V23.78a3.685,3.685,0,0,0,3.5,3.843H21.848a3.685,3.685,0,0,0,3.5-3.843V8.406a3.685,3.685,0,0,0-3.5-3.843ZM23.016,23.78a1.228,1.228,0,0,1-1.168,1.281H5.5A1.228,1.228,0,0,1,4.335,23.78V14.812h18.68Zm0-11.53H4.335V8.406A1.228,1.228,0,0,1,5.5,7.125H7.838V8.406A1.228,1.228,0,0,0,9.005,9.687a1.228,1.228,0,0,0,1.168-1.281V7.125h7.005V8.406a1.173,1.173,0,1,0,2.335,0V7.125h2.335a1.228,1.228,0,0,1,1.168,1.281Z" transform="translate(-2 -2)" fill="#ccc"/>
                                                            </svg>
                                                        </div> -->
                                                    </div>
                                                    <span id="errDobMsg"></span>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="float-end">
                                    <div class="profile-ratingdetail">
                                        <div class="profile-pointrating">
                                            <p>Get points in each step</p>
                                            <span class="rating-points">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="34" height="34" viewBox="0 0 34 34">
                                                    <image id="Image_23" data-name="Image 23" width="34" height="34" xlink:href="data:image/png;base64,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"/>
                                                </svg>
                                                <span class="number">50</span> Points
                                            </span>
                                       </div> 
                                        <div class="profile-progressbar">
                                            <div class="c100 p40 big">
                                                <span class="complete-text">40% <p class="text">Completed</p></span>
                                                <div class="slice">
                                                    <div class="bar"></div>
                                                    <div class="fill"></div>
                                                </div>
                                            </div>
                                        </div>
                                       <button type="button" class="next-button" id="saveStep1">NEXT</button>
                                       <p id="response_message1" class="" style="margin: 10px 0; display: none;"></p>
                                    </div>
                                </div>
                        </div>

                        <div id="step-2">
                            <div class="profile-progress">
                                <ul class="progressbar">
                                    <li class="completed"></li>
                                    <li class="active"></li>
                                    <li></li>
                                </ul>
                            </div>
                                <div class="float-start">
                                    <div class="profile-form">
                                        <div class="list">
                                            <div class="form-group">
                                                <label class="form-label">Select Gender*</label>
                                                <div class="switch-field">
                                                    <input type="radio" class="switch-input user_radio_btn" name="user_gender" value="Female" id="one" <?php if($user_gender == '' || $user_gender == null){ echo "checked"; } else if($user_gender == 'Female'){ echo "checked"; } ?>>
                                                    <label for="one" class="switch-label switch-label-off">
                                                        <span>Female</span>
                                                    </label>
                                                    <input type="radio" class="switch-input admin_radio_btn" name="user_gender" value="Male" id="two" <?php if($user_gender == 'Male'){ echo "checked"; } ?>>
                                                    <label for="two" class="switch-label switch-label-on">
                                                        <span>Male</span>
                                                    </label>
                                                    <!-- <span class="slider2"></span> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list">
                                            <div class="form-group">
                                                <label class="form-label">School Name*</label>
                                                <div class="input-group input-search">
                                                    <input type="text" class="form-control" id="user_school_data" name="user_school_data" placeholder="" value="<?php echo $user_school_name; ?>">
                                                    <input type="hidden" id="user_school" name="user_school" value="<?php echo $user_school; ?>">
                                                </div>
                                                <span id="errSchoolMsg"></span>
                                            </div>
                                        </div>
                                        <div class="list">
                                            <div class="form-group">
                                                <label class="form-label">Country</label>
                                                <div class="input-group input-search">
                                                    <input type="text" class="form-control" id="user_country_data" name="user_country_data" placeholder="Country" value="<?php echo $country_name; ?>">
                                                    <input type="hidden" id="user_country" name="user_country" value="<?php echo $user_country; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list">
                                            <div class="form-group">
                                                <label class="form-label">City</label>
                                                <div class="input-group input-search">
                                                    <input type="text" class="form-control" id="user_city" name="user_city" placeholder="City" value="<?php echo $user_city; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="float-end">
                                    <div class="profile-ratingdetail">
                                        <div class="profile-pointrating">
                                            <p>Get points in each step</p>
                                            <span class="rating-points">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="34" height="34" viewBox="0 0 34 34">
                                                    <image id="Image_23" data-name="Image 23" width="34" height="34" xlink:href="data:image/png;base64,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"/>
                                                </svg>
                                                <span class="number">50</span> Points
                                            </span>
                                        </div> 
                                        <div class="profile-progressbar">
                                            <div class="c100 p70 big">
                                                <span class="complete-text">70% <p class="text">Completed</p></span>
                                                <div class="slice">
                                                    <div class="bar"></div>
                                                    <div class="fill"></div>
                                                </div>
                                            </div>
                                        </div>
                                       <button type="button" class="next-button step-2-next" id="saveStep2">NEXT</button>
                                       <p id="response_message2" class="" style="margin: 10px 0; display: none;"></p>
                                    </div>
                                </div>
                        </div>


                        <div id="step-3">
                            <div class="profile-progress">
                                <ul class="progressbar">
                                    <li class="completed"></li>
                                    <li class="completed"></li>
                                    <li class="active"></li>
                                </ul>
                            </div>
                            <div class="float-start">
                                <div class="profile-add">
                                    <div class="profile-image">
                                        <svg id="profile-add" xmlns="http://www.w3.org/2000/svg" width="209" height="210" viewBox="0 0 209 210">
                                            <g id="Group_145" data-name="Group 145" transform="translate(-419 -345)">
                                                <ellipse id="Ellipse_6" data-name="Ellipse 6" cx="104.5" cy="105" rx="104.5" ry="105" transform="translate(419 345)" fill="#e3e3e3"/>
                                                <g id="katman_2" data-name="katman 2" transform="translate(476 411.113)">
                                                  <path id="Path_102" data-name="Path 102" d="M22.551,4H9.62A8.62,8.62,0,0,0,1,12.62V64.341a8.62,8.62,0,0,0,8.62,8.62H87.2a8.62,8.62,0,0,0,8.62-8.62V12.62A8.62,8.62,0,0,0,87.2,4H57.031" transform="translate(-1 4.427)" fill="none" stroke="#bebebe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                                  <line id="Line_6" data-name="Line 6" x2="77.403" transform="translate(0.358 26.081)" fill="none" stroke="#bebebe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                                  <rect id="Rectangle_22" data-name="Rectangle 22" width="16.827" height="12.62" transform="translate(39.059 0)" fill="none" stroke="#bebebe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                                  <rect id="Rectangle_23" data-name="Rectangle 23" width="17.668" height="16.827" transform="translate(17.185 42.908)" fill="none" stroke="#bebebe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                                  <line id="Line_7" data-name="Line 7" x2="26.081" transform="translate(51.679 42.908)" fill="none" stroke="#bebebe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                                  <line id="Line_8" data-name="Line 8" x2="17.668" transform="translate(51.679 59.735)" fill="none" stroke="#bebebe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                                </g>
                                            </g>
                                        </svg>
                                        <div id="profileimage"></div>
                                        <input type="file" id="inputfile" value="">
                                        <input type="hidden" id="school_card_img" value="" name="school_card_img">
                                    </div>
                                    <span class="text"> School ID card to get<span class="block"></span> all 100 points instantly!!</span>
                                    <span id="errSchoolIDMsg"></span>
                                    <input type="hidden" id="skip_dashboard" name="skip_dashboard" value="1">
                                    <button type="button" class="skip-button skipDashboard2" id="skipDashboard" style="cursor: pointer;">Skip to Dashboard</button>
                                </div>
                            </div>
                            <div class="float-end">
                                <div class="profile-ratingdetail">
                                    <div class="profile-pointrating">
                                        <p>Get points in each step</p>
                                        <span class="rating-points">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="34" height="34" viewBox="0 0 34 34">
                                                <image id="Image_23" data-name="Image 23" width="34" height="34" xlink:href="data:image/png;base64,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"/>
                                            </svg>
                                            <span class="number">50</span> Points
                                        </span>
                                   </div> 
                                    <div class="profile-progressbar">
                                        <div class="c100 p100 big">
                                            <span class="complete-text">100% <p class="text">Completed</p></span>
                                            <div class="slice">
                                                <div class="bar"></div>
                                                <div class="fill"></div>
                                            </div>
                                        </div>
                                    </div>
                                   <button type="button" class="next-button" id="saveStep3">Save</button>
                                   <p id="response_message3" class="" style="margin: 10px 0; display: none;">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Referral Code -->
    <!-- Modal Congrats Popup -->
    <div class="modal fade congrats-popup" id="congrats-popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/codeathon.svg" class="codeathon-logo">
                    <div class="content">
                        <img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/dashboard/congrats-hero.png">
                        <p class="congrats">Congratulations!</p>
                        <h2 class="earned">You have earned</h2>
                        <span class="coupon">150 points</span>
                        <!-- <span class="coupon-1">50 points</span> -->
                        <a class="skip skipDashboard" style="cursor: pointer;">Skip to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade congrats-popup" id="congrats-popup2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/codeathon.svg" class="codeathon-logo">
                    <div class="content">
                        <img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/dashboard/congrats-hero.png">
                        <p class="congrats">Congratulations!</p>
                        <h2 class="earned">You have earned</h2>
                        <span class="coupon">100 points</span>
                        <!-- <span class="coupon-1">50 points</span> -->
                        <a class="skip skipDashboard" style="cursor: pointer;">Skip to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  document.getElementById("successMsg").innerHTML = "Referral Code Coiped Successfully";
}
</script>
<?php include("includes/footer.php"); ?>
