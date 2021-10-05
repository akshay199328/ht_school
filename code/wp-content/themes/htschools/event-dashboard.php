<?php 
/**
 * Template Name: Event Dashboard
 */

if ( !defined( 'ABSPATH' ) ) exit;


get_header(vibe_get_header());

include("includes/lead-dashboard.php"); 

if ( !is_user_logged_in() ) {
    $url = site_url();
    header('Location: '.$url);
}


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
$user_zone = get_profile_data('Event Zone');
$school_id = get_profile_data('Linked School');

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

$child = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix . "parent_child_mapping WHERE child_id = " . $user_id );

//$courseID = 204;

do_action('wplms_course_curriculum_section',$courseID);

$course_curriculum = ht_course_get_full_course_curriculum($courseID); 
$countlesson=count($course_curriculum);
$course_units = [];
foreach($course_curriculum as $lesson){
    if($lesson['type'] == 'section'){
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


function getQuizPointsTypeCount($quiz_type,$courseID){
    $course_curriculum = bp_course_get_full_course_curriculum($courseID);
    $quiz_arr = array();
    foreach($course_curriculum as $row){
      if($row['type'] == 'quiz'){
        $quiz_arr[] = $row['id'];
      }
    }
    $video_quiz = array();
    $chapter_quiz = array();
    $course_quiz = array();
    foreach($quiz_arr as $quiz_id){
      $event_quiz_type = get_post_meta($quiz_id,'vibe_event_quiz_type',true);
      if($event_quiz_type == $quiz_type){
        $total_quiz[] = $quiz_id;
      }
    }
    if($total_quiz){
      return count($total_quiz);
    }
    else{
      return 0;
    }
}

function getQuizPoints($userID,$quiz_type,$courseID){
    global $wpdb;
    /*$table_name = "ht_mycred_log";
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
      $my_cred_table = 'ht_mycred_log';
    }
    else{
      $my_cred_table = 'ht_myCRED_log';
    }
    $sql = $wpdb->get_results("SELECT count(id) as total_quiz FROM $my_cred_table WHERE ref='".$ref."' AND user_id = '".$userID."' and data = '".$courseID."' and ctype = 'mycred_intellectual' ");
    
    $quiz_creds_json = json_decode( json_encode($sql), true);
    return $quiz_creds_json[0]['total_quiz'];*/

    $course_curriculum = bp_course_get_full_course_curriculum($courseID);
    $quiz_arr = array();
    foreach($course_curriculum as $row){
      if($row['type'] == 'quiz'){
        $quiz_arr[] = $row['id'];
      }
    }
    $quizCountNew=0;
    foreach($quiz_arr as $quiz_id){

      $event_quiz_type = get_post_meta($quiz_id,'vibe_event_quiz_type',true);
      
      if($event_quiz_type == $quiz_type){

        $quiz_status = 'quiz_status'.$quiz_id;

        $sql = $wpdb->get_row("SELECT count(umeta_id) as quizCount FROM `ht_usermeta` WHERE user_id = '".$userID."' and meta_key = '".$quiz_status."' and meta_value = '4' ");
        $quizCount = $sql->quizCount;

        if($quizCount != 0){
          $quizCountNew = $quizCountNew+1;
        }
      }

    }

    $quizCountNew=$quizCountNew;

    return $quizCountNew;
}

function getVideosCount($courseID){
    $course_curriculum = bp_course_get_full_course_curriculum($courseID);
    $unit_arr = array();
    foreach($course_curriculum as $row){
        if($row['type'] == 'unit'){
          $unit_arr[] = $row['id'];
        }
    }
    foreach($unit_arr as $unit_id){

      $event_unit_type = get_post_meta($unit_id,'vibe_type',true);
      
      if($event_unit_type == 'play'){

        $total_unit[] = $unit_id;

      }
    }

    if($total_unit){
      return count($total_unit);
    }else{
      return 0;
    }
}
function getVideoPoints($userID,$courseID){
    global $wpdb;
    $table_name = "ht_mycred_log";
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
      $my_cred_table = 'ht_mycred_log';
    }
    else{
      $my_cred_table = 'ht_myCRED_log';
    }
    $sql = $wpdb->get_results("SELECT count(id) as total_quiz FROM $my_cred_table WHERE ref='video_watched' AND user_id = '".$userID."' and data = '".$courseID."' and ctype = 'mycred_intellectual' ");
    
    $unit_creds_json = json_decode( json_encode($sql), true);
    return $unit_creds_json[0]['total_quiz'];
}

$metakey = 'progress'.$courseID;
$results1 = $wpdb->get_results("SELECT `meta_value` FROM `ht_usermeta` WHERE `user_id` = '$userID' AND `meta_key` = '$metakey'");
foreach($results1 as $row1){ 
    $progressVal = $row1->meta_value; 
}

if($progressVal != ''){
    $progressVal = $progressVal;
}else{
    $progressVal=0;
}



$resultsZone = $wpdb->get_results("SELECT `id` FROM `ht_bp_xprofile_fields` WHERE `name` = 'Event Zone'");
foreach($resultsZone as $rowZone){ 
    $zonePriID = $rowZone->id; 
}

$resultsSchool = $wpdb->get_results("SELECT `id` FROM `ht_bp_xprofile_fields` WHERE `name` = 'Linked School'");
foreach($resultsSchool as $rowSchool){ 
    $schoolPriID = $rowSchool->id; 
}


// Zone Listing
$table_name = "ht_mycred_log";
if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
      $my_cred_table = 'ht_mycred_log';
  }
  else{
      $my_cred_table = 'ht_myCRED_log';
  }


  $sql = "SELECT posts.post_title AS course,posts.ID AS course_id,umeta.user_id AS user_id,users.display_name
        FROM ht_usermeta AS umeta
        LEFT JOIN ht_posts AS posts ON umeta.meta_key = posts.ID
        LEFT JOIN ht_users AS users ON users.Id = umeta.user_id
        LEFT JOIN ht_bp_xprofile_data AS xprofile ON xprofile.user_id = umeta.user_id
        WHERE   posts.post_type     = 'course'
        AND     posts.post_status   = 'publish'
        AND posts.ID = '$courseID'
        AND xprofile.value = '$user_zone' 
        AND xprofile.field_id = '$zonePriID' 
        AND     umeta.meta_key REGEXP '^[0-9]+$'
        ORDER BY umeta.user_id DESC";


  /*$sql = "SELECT posts.post_title AS course,rel.meta_key AS user_id, posts.ID AS course_id 
          FROM ht_posts AS posts 
          LEFT JOIN ht_postmeta AS rel ON posts.ID = rel.post_id 
          LEFT JOIN ht_bp_xprofile_data AS xprofile ON xprofile.user_id = rel.meta_key
          WHERE posts.post_type = 'course' AND rel.meta_key REGEXP '^[0-9]+$' AND posts.post_status = 'publish' AND xprofile.value = '$user_zone' AND xprofile.field_id = '$zonePriID' AND posts.ID='".$courseID."' ";*/

  /*$sql = "SELECT posts.post_title AS course, rel.meta_key AS user_id, posts.ID AS course_id
            FROM ht_usermeta AS umeta
            LEFT JOIN ht_posts AS posts ON umeta.meta_key = posts.ID
            LEFT JOIN ht_postmeta AS rel ON posts.ID = rel.post_id
            LEFT JOIN ht_users AS users ON users.Id = umeta.user_id
            LEFT JOIN ht_bp_xprofile_data AS xprofile ON xprofile.user_id = users.Id
            WHERE   posts.post_type     = 'course'
            AND     posts.post_status   = 'publish'
            AND     posts.id    = '$courseID'
            AND     xprofile.value = '$user_zone'
            AND     rel.meta_key REGEXP '^[0-9]+$'
            GROUP BY rel.meta_key
            ORDER BY umeta.user_id DESC";*/

  $leaderboard_result = $wpdb->get_results($sql);
  foreach($leaderboard_result as $key1 => $v){
    $sql = $wpdb->get_results("SELECT sum(creds) as total_creds FROM $my_cred_table WHERE user_id = '".$v->user_id."' and ref !='signup_referral' and ctype !='mycred_default' ");
    foreach($sql as $key => $csm){
      if($csm->total_creds != ''){
        $leaderboard_result[$key1]->points = $csm->total_creds;
      }
      else{
        $leaderboard_result[$key1]->points = 0;
      }
    }
  }
$price = array_column($leaderboard_result, 'points');
array_multisort($price, SORT_DESC, $leaderboard_result);
foreach($leaderboard_result as $key2 => $v2)
{
  $rank = $key2 + 1;
  $leaderboard_result[$key2]->rank = $rank;
}
$firstThreeElements = array_slice($leaderboard_result, 0, 3);
$first_rank = 0;
$second_rank = 0;
$third_rank = 0;
foreach($leaderboard_result as $key1 => $rank)
{
    if($leaderboard_result[$key1]->rank == 1){
        $first_rank = $leaderboard_result[$key1]->user_id;
    }
    if($leaderboard_result[$key1]->rank == 2){
        $second_rank = $leaderboard_result[$key1]->user_id;
    }
    if($leaderboard_result[$key1]->rank == 3){
        $third_rank = $leaderboard_result[$key1]->user_id;
    }
}

$user_rank = array();

foreach($leaderboard_result as $key => $csm)
{
   
    if($leaderboard_result[$key]->user_id == $userID){
      $user_rank[] = $leaderboard_result[$key]->rank;
    }
}
if($user_rank){
    
    $current_user_rank = implode($user_rank);
    $prev_rank = $current_user_rank - 4;
    $next_rank = $current_user_rank + 5;

    $prev_rank_array = array();
    $next_rank_array = array();
    foreach($leaderboard_result as $key => $v)
    {
        if($leaderboard_result[$key]->rank <= $current_user_rank && $leaderboard_result[$key]->rank >= $prev_rank){
      $prev_rank_array[] = $v;
    }
    if($leaderboard_result[$key]->rank > $current_user_rank && $leaderboard_result[$key]->rank <= $next_rank){
      $next_rank_array[] = $v;
    }
    //$leaderboard_result[$key]['flag'] = 1;
    }
    $user_rank_list = array_merge($prev_rank_array,$next_rank_array);
}
else{
    $user_rank_list = $leaderboard_result;
}


// School Listing
$table_name = "ht_mycred_log";
if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
      $my_cred_table = 'ht_mycred_log';
  }
  else{
      $my_cred_table = 'ht_myCRED_log';
  }


  $sql = "SELECT posts.post_title AS course,posts.ID AS course_id,umeta.user_id AS user_id,users.display_name
        FROM ht_usermeta AS umeta
        LEFT JOIN ht_posts AS posts ON umeta.meta_key = posts.ID
        LEFT JOIN ht_users AS users ON users.Id = umeta.user_id
        LEFT JOIN ht_bp_xprofile_data AS xprofile ON xprofile.user_id = umeta.user_id
        WHERE   posts.post_type     = 'course'
        AND     posts.post_status   = 'publish'
        AND posts.ID = '$courseID'
        AND xprofile.value = '$school_id' 
        AND xprofile.field_id = '$schoolPriID' 
        AND     umeta.meta_key REGEXP '^[0-9]+$'
        ORDER BY umeta.user_id DESC";

  /*$sql = "SELECT posts.post_title AS course,rel.meta_key AS user_id, posts.ID AS course_id 
          FROM ht_posts AS posts 
          LEFT JOIN ht_postmeta AS rel ON posts.ID = rel.post_id 
          LEFT JOIN ht_bp_xprofile_data AS xprofile ON xprofile.user_id = rel.meta_key
          WHERE posts.post_type = 'course' AND rel.meta_key REGEXP '^[0-9]+$' AND posts.post_status = 'publish' AND xprofile.value = '$school_id' AND xprofile.field_id = '$schoolPriID' AND posts.ID='".$courseID."' ";*/

  /*$sql = "SELECT posts.post_title AS course, rel.meta_key AS user_id, posts.ID AS course_id
            FROM ht_usermeta AS umeta
            LEFT JOIN ht_posts AS posts ON umeta.meta_key = posts.ID
            LEFT JOIN ht_postmeta AS rel ON posts.ID = rel.post_id
            LEFT JOIN ht_users AS users ON users.Id = umeta.user_id
            LEFT JOIN ht_bp_xprofile_data AS xprofile ON xprofile.user_id = users.Id
            WHERE   posts.post_type     = 'course'
            AND     posts.post_status   = 'publish'
            AND     posts.id    = '$courseID'
            AND     xprofile.value = '$school_id'
            AND     rel.meta_key REGEXP '^[0-9]+$'
            GROUP BY rel.meta_key
            ORDER BY umeta.user_id DESC";*/

  $leaderboard_result = $wpdb->get_results($sql);
  foreach($leaderboard_result as $key1 => $v){
    $sql = $wpdb->get_results("SELECT sum(creds) as total_creds FROM $my_cred_table WHERE user_id = '".$v->user_id."' and ref !='signup_referral' and ctype !='mycred_default' ");
    foreach($sql as $key => $csm){
      if($csm->total_creds != ''){
        $leaderboard_result[$key1]->points = $csm->total_creds;
      }
      else{
        $leaderboard_result[$key1]->points = 0;
      }
    }
  }
$price = array_column($leaderboard_result, 'points');
array_multisort($price, SORT_DESC, $leaderboard_result);
foreach($leaderboard_result as $key2 => $v2)
{
  $rank = $key2 + 1;
  $leaderboard_result[$key2]->rank = $rank;
}
$firstThreeElements = array_slice($leaderboard_result, 0, 3);
/*$first_rank = 0;
$second_rank = 0;
$third_rank = 0;
foreach($leaderboard_result as $key1 => $rank)
{
    if($leaderboard_result[$key1]->rank == 1){
        $first_rank = $leaderboard_result[$key1]->user_id;
    }
    if($leaderboard_result[$key1]->rank == 2){
        $second_rank = $leaderboard_result[$key1]->user_id;
    }
    if($leaderboard_result[$key1]->rank == 3){
        $third_rank = $leaderboard_result[$key1]->user_id;
    }
}*/

$user_rank = array();

foreach($leaderboard_result as $key => $csm){
    if($leaderboard_result[$key]->user_id == $userID){
      $user_rank[] = $leaderboard_result[$key]->rank;
    }
}

if($user_rank){
    
    $current_user_rank1 = implode($user_rank);
    $prev_rank = $current_user_rank1 - 4;
    $next_rank = $current_user_rank1 + 5;

    $prev_rank_array = array();
    $next_rank_array = array();
    foreach($leaderboard_result as $key => $v){
        if($leaderboard_result[$key]->rank <= $current_user_rank1 && $leaderboard_result[$key]->rank >= $prev_rank){
      $prev_rank_array[] = $v;
    }
    if($leaderboard_result[$key]->rank > $current_user_rank1 && $leaderboard_result[$key]->rank <= $next_rank){
      $next_rank_array[] = $v;
    }
    //$leaderboard_result[$key]['flag'] = 1;
    }
    $user_rank_list_school = array_merge($prev_rank_array,$next_rank_array);
}else{
    $user_rank_list_school = $leaderboard_result;
}

$resultsRank = $wpdb->get_row("SELECT count(umeta.user_id) as totalCount
          FROM ht_usermeta AS umeta
          LEFT JOIN ht_posts AS posts ON umeta.meta_key = posts.ID
          LEFT JOIN ht_users AS users ON users.Id = umeta.user_id
          LEFT JOIN ht_bp_xprofile_data AS xprofile ON xprofile.user_id = umeta.user_id
          WHERE   posts.post_type     = 'course'
          AND     posts.post_status   = 'publish'
          AND posts.ID = '$courseID'
          AND xprofile.value = '$user_zone' 
          AND xprofile.field_id = '$zonePriID' 
          AND     umeta.meta_key REGEXP '^[0-9]+$'
          ORDER BY umeta.user_id DESC");
$totalRank = $resultsRank->totalCount;


$resultsRank2 = $wpdb->get_row("SELECT count(umeta.user_id) as totalCount
          FROM ht_usermeta AS umeta
          LEFT JOIN ht_posts AS posts ON umeta.meta_key = posts.ID
          LEFT JOIN ht_users AS users ON users.Id = umeta.user_id
          LEFT JOIN ht_bp_xprofile_data AS xprofile ON xprofile.user_id = umeta.user_id
          WHERE   posts.post_type     = 'course'
          AND     posts.post_status   = 'publish'
          AND posts.ID = '$courseID'
          AND xprofile.value = '$school_id' 
          AND xprofile.field_id = '$schoolPriID' 
          AND     umeta.meta_key REGEXP '^[0-9]+$'
          ORDER BY umeta.user_id DESC");
$totalRank2 = $resultsRank2->totalCount;

$progress = bp_course_get_user_progress($userID,$courseID);
$course_progress = empty($progress)?0:intval($progress);


$resultsState = $wpdb->get_results("SELECT CONCAT(UPPER(SUBSTRING(state_name,1,1)),
  LOWER(SUBSTRING(state_name,2)) ) as state_name FROM `ht_state_master` WHERE `country_id` = '1' order by `state_name` asc");


// Quiz status count
$course_quiz = [];
foreach($course_curriculum as $lesson){
    if($lesson['type'] == 'quiz'){
        array_push($course_quiz, $lesson);
    }
}

$quizCompleteCount=0;
foreach($course_quiz as $quiz_units){ 

  $quizID = $quiz_units['id'];

  $quiz_status = 'quiz_status'.$quizID;

  $resultsQuiz = $wpdb->get_results("SELECT * FROM `ht_usermeta` WHERE `user_id` = '$userID' and `meta_key` = '$quiz_status'");
  $meta_value = $resultsQuiz[0]->meta_value;

  if($meta_value == 4){
    $quizCompleteCount=$quizCompleteCount+1;
  }

}

$resultsQuizTotal = $wpdb->get_results("SELECT count(id) as total_quiz_points FROM $my_cred_table WHERE user_id = '".$userID."' and data = '".$courseID."'");
$total_quiz_points = $resultsQuizTotal[0]->total_quiz_points;

//$retakes=apply_filters('wplms_quiz_retake_count',get_post_meta($item,'vibe_quiz_retakes',true),$item,$course,$user_id);


if($quizCompleteCount >= 3){ 
  if($total_quiz_points == 0){
    include("includes/codeathon-certificate.php");
  }
}

?>
<style type="text/css">
.page-template-event-dashboard .pusher .header{display: none!important}
.ui-autocomplete {
    z-index: 9999!important;
    background: #fff;
    width: 20%!important;
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

.ui-autocomplete li.ui-menu-item:last-child .ui-menu-item-wrapper,
    .ui-autocomplete li.ui-menu-item:last-child:hover .ui-menu-item-wrapper {
        background-color: #d5ebff!important;
        color: #000;        
    }   

    #errotherSchoolMsg{
        color: red;
    font-size: 12px;
    display: block;
    margin-bottom: 15px;
    margin-top: 5px;
    }
    ul.typeahead.dropdown-menu{
      width: 100%
    }
    .typeahead li a {
        padding: 9px 12px;
        white-space: normal;
    }
</style>  
<section class="dashboard-wrapper">
    <div class="container">
        <!-- <div class="notice-board">
            <div class="pull-left">
                <h6>Notice Board</h6>
                <p>Get 20% discount on cuemath coupon. Please use the <strong>Code CM20P123.</strong></p>
            </div>
            <div class="pull-right">
                <div class="board_point">
                    <h6>Points</h6>
                    <h3><?php //echo $points; ?></h3>
                </div>
            </div> 
        </div>-->
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
                    <button class="nav-link disabled" id="mock-tab" data-bs-toggle="tab" data-bs-target="#mock" type="button" role="tab" aria-controls="mock" aria-selected="false">
                        <svg  class="lock" xmlns="http://www.w3.org/2000/svg" width="17.126" height="22.53" viewBox="0 0 17.126 22.53">
                            <path id="Shape_928" data-name="Shape 928" d="M3267.128,358.12h-.038V355.43h-.035a1.971,1.971,0,0,0,0-.2,6.7,6.7,0,0,0-6.917-6.233,6.842,6.842,0,0,0-6.44,6.931v2.19h-.167a1.769,1.769,0,0,0-1.765,1.781v9.843a1.769,1.769,0,0,0,1.765,1.781h13.6a1.769,1.769,0,0,0,1.765-1.781V359.9A1.769,1.769,0,0,0,3267.128,358.12Zm-10.5-2.238a3.878,3.878,0,0,1,3.411-3.9,3.776,3.776,0,0,1,4.1,3.346c0,.033.01.111.02.221v2.571h-7.534Zm4.794,9.387a.358.358,0,0,0-.167.361V367.8a.751.751,0,0,1-.406.722.829.829,0,0,1-1.241-.722v-2.166a.342.342,0,0,0-.167-.337,1.674,1.674,0,0,1,1.264-3.008,1.691,1.691,0,0,1,1.383,1.636A1.6,1.6,0,0,1,3261.427,365.268Z" transform="translate(-3251.767 -348.995)" fill="#004ba6" opacity="0.502"/>
                        </svg>
                        Mock Qualifier
                        <div class="info-pop">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17.834" height="17.836" viewBox="0 0 17.834 17.836" class="declaration">
                                <path id="Shape_924" data-name="Shape 924" d="M3192.22,367.219a8.916,8.916,0,1,0-12.979-.392l.083.062a4.207,4.207,0,0,1-1.834,2.081.351.351,0,0,0,.1.659,5.044,5.044,0,0,0,3.791-1.03l.02.021A8.941,8.941,0,0,0,3192.22,367.219Zm-5.933-11.806a1.463,1.463,0,0,1,0,2.926,1.463,1.463,0,1,1,0-2.926Zm-2.328,9.375c.062-.515.144-1.051.247-1.566.144-.907.31-1.813.474-2.72,0-.062.02-.123.02-.165,0-.371-.124-.515-.494-.556a3.3,3.3,0,0,1-.474-.082.331.331,0,0,1-.247-.371.318.318,0,0,1,.329-.288,1.755,1.755,0,0,1,.33-.021h2.76a.494.494,0,0,1,.556.494,5.617,5.617,0,0,1-.082.845c-.185,1.03-.371,2.081-.577,3.111-.062.35-.123.68-.164,1.03a1.311,1.311,0,0,0,.041.494.384.384,0,0,0,.432.31,2.3,2.3,0,0,0,.536-.144c.144-.062.268-.145.412-.206a.233.233,0,0,1,.33.288.879.879,0,0,1-.206.351,2.722,2.722,0,0,1-1.916.865,5.994,5.994,0,0,1-1.051-.062A1.622,1.622,0,0,1,3183.959,364.788Z" transform="translate(-3176.997 -351.997)" fill="#fff"/>
                            </svg>
                            <div id="pop" class="pop_mock">
                                <ul>
                                    <li>There will be two mock tests available for students to attempt before the qualifier. These mock tests will help the students prepare for the actual qualifier.</li>
                                    <li>To reach the qualifier, a student needs to complete all the Videos, Video Quizzes, Chapter Quizzes and Course Quizzes.</li>
                                </ul>
                            </div>
                        </div>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link disabled" id="qualifier-tab" data-bs-toggle="tab" data-bs-target="#qualifier" type="button" role="tab" aria-controls="qualifier" aria-selected="false">
                       <svg  class="lock" xmlns="http://www.w3.org/2000/svg" width="17.126" height="22.53" viewBox="0 0 17.126 22.53">
                            <path id="Shape_928" data-name="Shape 928" d="M3267.128,358.12h-.038V355.43h-.035a1.971,1.971,0,0,0,0-.2,6.7,6.7,0,0,0-6.917-6.233,6.842,6.842,0,0,0-6.44,6.931v2.19h-.167a1.769,1.769,0,0,0-1.765,1.781v9.843a1.769,1.769,0,0,0,1.765,1.781h13.6a1.769,1.769,0,0,0,1.765-1.781V359.9A1.769,1.769,0,0,0,3267.128,358.12Zm-10.5-2.238a3.878,3.878,0,0,1,3.411-3.9,3.776,3.776,0,0,1,4.1,3.346c0,.033.01.111.02.221v2.571h-7.534Zm4.794,9.387a.358.358,0,0,0-.167.361V367.8a.751.751,0,0,1-.406.722.829.829,0,0,1-1.241-.722v-2.166a.342.342,0,0,0-.167-.337,1.674,1.674,0,0,1,1.264-3.008,1.691,1.691,0,0,1,1.383,1.636A1.6,1.6,0,0,1,3261.427,365.268Z" transform="translate(-3251.767 -348.995)" fill="#004ba6" opacity="0.502"/>
                        </svg>
                       Qualifier
                       <div class="info-pop">
                           <svg xmlns="http://www.w3.org/2000/svg" width="17.834" height="17.836" viewBox="0 0 17.834 17.836" class="declaration">
                                <path id="Shape_924" data-name="Shape 924" d="M3192.22,367.219a8.916,8.916,0,1,0-12.979-.392l.083.062a4.207,4.207,0,0,1-1.834,2.081.351.351,0,0,0,.1.659,5.044,5.044,0,0,0,3.791-1.03l.02.021A8.941,8.941,0,0,0,3192.22,367.219Zm-5.933-11.806a1.463,1.463,0,0,1,0,2.926,1.463,1.463,0,1,1,0-2.926Zm-2.328,9.375c.062-.515.144-1.051.247-1.566.144-.907.31-1.813.474-2.72,0-.062.02-.123.02-.165,0-.371-.124-.515-.494-.556a3.3,3.3,0,0,1-.474-.082.331.331,0,0,1-.247-.371.318.318,0,0,1,.329-.288,1.755,1.755,0,0,1,.33-.021h2.76a.494.494,0,0,1,.556.494,5.617,5.617,0,0,1-.082.845c-.185,1.03-.371,2.081-.577,3.111-.062.35-.123.68-.164,1.03a1.311,1.311,0,0,0,.041.494.384.384,0,0,0,.432.31,2.3,2.3,0,0,0,.536-.144c.144-.062.268-.145.412-.206a.233.233,0,0,1,.33.288.879.879,0,0,1-.206.351,2.722,2.722,0,0,1-1.916.865,5.994,5.994,0,0,1-1.051-.062A1.622,1.622,0,0,1,3183.959,364.788Z" transform="translate(-3176.997 -351.997)" fill="#fff"/>
                            </svg>
                            <div id="pop" class="pop_qualifier">
                                <ul>
                                    <li>To reach the qualifier, a student needs to complete all the Videos, Video Quizzes, chapter Quizzes and Course Quizzes.</li>
                                </ul>
                            </div>
                        </div>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link disabled" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
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
                                        <span class="" data-bs-toggle="modal" data-bs-target="#learning_popup">
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
                                                        <a href="https://api.whatsapp.com//send?text=Hey, I have completed <?php echo $progressVal; ?>% of <?php echo get_the_title($courseID); ?> with Hindustan Times Codeathon. Join today at www.htcodeathon.com and participate in one of India's biggest coding olympiads. 
                                                        Learn. Participate. Win
                                                        " target="_blank">
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
                                                        <a href="https://twitter.com/intent/tweet?text=Hey, I have completed <?php echo $progressVal; ?>%25 of <?php echo get_the_title($courseID); ?> with Hindustan Times Codeathon. Join today at www.htcodeathon.com and participate in one of India's biggest coding olympiads. Learn. Participate. Win" target="_blank">
                                                            <svg id="icons8-twitter-circled" xmlns="http://www.w3.org/2000/svg" width="47.685" height="47.685" viewBox="0 0 47.685 47.685">
                                                                <path id="Path_88" data-name="Path 88" d="M27.842,4A23.842,23.842,0,1,0,51.685,27.842,23.842,23.842,0,0,0,27.842,4Z" transform="translate(-4 -4)" fill="#03a9f4"/>
                                                                <path id="Path_89" data-name="Path 89" d="M40.611,17.527a13.383,13.383,0,0,1-3.576,1.049c1.214-.72,3.139-2.22,3.576-3.576a17.065,17.065,0,0,1-4.522,1.636,5.761,5.761,0,0,0-9.784,4.325v2.384c-4.768,0-9.418-3.632-12.311-7.153a5.738,5.738,0,0,0-.8,2.929c0,2.168,1.992,4.369,3.569,5.416a11.065,11.065,0,0,1-3.576-1.192v.068a5.345,5.345,0,0,0,4.664,5.272,7.465,7.465,0,0,1-3.386.621c.746,2.307,4.5,3.526,7.067,3.576-2.01,1.558-5.593,2.384-8.345,2.384A8.785,8.785,0,0,1,12,35.239a18.539,18.539,0,0,0,9.537,2.412c10.8,0,16.69-8.247,16.69-15.939,0-.253-.008-1.1-.021-1.347a9.057,9.057,0,0,0,2.406-2.837" transform="translate(-2.463 -1.887)" fill="#fff"/>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                    <li value="facebook">
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_bloginfo('url')?>&quote=Hey, I have completed <?php echo $progressVal; ?>% of <?php echo get_the_title($courseID); ?> with Hindustan Times Codeathon. Join today at www.htcodeathon.com and participate in one of India's biggest coding olympiads. 
                                                        Learn. Participate. Win" target="_blank">
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
                                            <?php if($quizCompleteCount >= 3){ 
                                                    if($total_quiz_points == 0){
                                                      echo '<div class="download" style="width: 55%; float: left; margin-right: 15px;">';
                                                                user_certificate($courseID,$userID);
                                                      echo '</div>
                                                            <button type="button" data-bs-toggle="modal" data-bs-target="#practice-popup" class="practice_btn btn" style="margin-top: 10px;">Practice</button>';
                                                    }else{
                                                      echo '<div class="resume_btn">';
                                                            the_course_button($courseID);
                                                      echo '</div>
                                                            <button type="button" data-bs-toggle="modal" data-bs-target="#practice-popup" class="practice_btn btn">Practice</button>';
                                                    }
                                                  }else{
                                                    echo '<div class="resume_btn">';
                                                            the_course_button($courseID);
                                                    echo '</div>
                                                          <button type="button" data-bs-toggle="modal" data-bs-target="#practice-popup" class="practice_btn btn">Practice</button>';
                                                  }
                                                    
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-sm-12 top_progress pull-left">
                                <div class="progress">
                                    <div class="progress-bar w-<?php echo $course_progress; ?>" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="details_footer">
                              <?php if($countunit > 1){ ?>
                                <span class="head">Total Chapters: <?php echo $countunit; ?></span>
                              <?php }else{ ?>
                                <span class="head">Total Chapter: <?php echo $countunit; ?></span>
                              <?php } ?>
                                <div class="tab_scroll">
                                <?php 
                                  foreach($course_units as $lesson_units){ 
                                    $lessonId = get_post($lesson['id']); ?>
                                    <div class="list">
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 mrg pull-left">
                                            <h5 class="course_section_link"><?php echo $lesson_units['title'];?>
                                                <!-- <span class="toggle_icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17.218" height="9.64" viewBox="0 0 17.218 9.64">
                                                        <path id="Shape_788" data-name="Shape 788" d="M4655.289,1203.774l7.2,7.226,7.195-7.226" transform="translate(-4653.875 -1202.36)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                                    </svg>
                                                </span> -->
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
                                        <!-- <div class="col-12 col-md-12 col-sm-12 mrg mobile-show">
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
                                        </div> -->
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
                                <!-- <div class="pull-right">
                                    <span class="total_point">Total<span class="break">Points</span> </span>
                                    <span class="points">
                                        <div id="pop" class="pop_mock">
                                            <p>Refresh page to see latest points</p>
                                        </div>
                                        <?php //echo $total_points; ?>
                                    </span>
                                </div> -->
                                <div class="board-button">
                                    <button type="button" class="earn-points-btn">VIEW POINT DETAILS</button>
                                </div>
                            </div>
                            <div class="earn-points">
                                <div class="pull-left">
                                    <h6>Earn Points</h6>
                                </div>
                                <div class="board-button">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#refer-popup">REFERRALS</button>
                                    <!-- <button type="button" data-bs-toggle="modal" data-bs-target="#">UPLOAD PROJECT</button> -->
                                </div>
                            </div>
                        </div>
                        <div class="leader_board">
                            <div class="col-12 col-sm-12 mrg">
                                <div class="pull-left">
                                    <span class="head">Leaderboard 
                                        <span class="share share-zone">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" viewBox="0 0 25 16">
                                                <path id="Shape_874" data-name="Shape 874" d="M3516.475,431l9.524,7.407-9.524,7.408v-3.852c-.507-.023-9.338-.306-15.476,5.037,2.457-7.534,10.171-10.811,15.476-12.148Z" transform="translate(-3500.999 -430.999)"></path>
                                            </svg>
                                            <div class="toggle-share ">
                                                <h6>Share with your Friends</h6>
                                                <ul id="social_share">
                                                    <li value="whatsapp">
                                                        <a href="https://api.whatsapp.com//send?text=Hey! I am ranked <?php echo $current_user_rank; ?> out of <?php echo $totalRank; ?> users in my zone on Hindustan Times Codeathon. Join today at www.htcodeathon.com and participate in one of India's biggest coding olympiads. Learn. Participate. Win." target="_blank">
                                                            <svg id="icons8-whatsapp" xmlns="http://www.w3.org/2000/svg" width="47.685" height="47.888" viewBox="0 0 47.685 47.888">
                                                                <path id="Path_83" data-name="Path 83" d="M4.868,50.51l3.2-11.686A22.56,22.56,0,1,1,27.617,50.119h-.01a22.534,22.534,0,0,1-10.78-2.746Z" transform="translate(-3.679 -3.812)" fill="#fff"></path>
                                                                <path id="Path_84" data-name="Path 84" d="M4.962,51.2a.594.594,0,0,1-.573-.75L7.525,39a23.15,23.15,0,1,1,9.321,9.1L5.113,51.178A.543.543,0,0,1,4.962,51.2Z" transform="translate(-3.773 -3.906)" fill="#fff"></path>
                                                                <path id="Path_85" data-name="Path 85" d="M27.8,5.188a22.56,22.56,0,0,1,0,45.119H27.8a22.534,22.534,0,0,1-10.78-2.746L5.056,50.7l3.2-11.686A22.562,22.562,0,0,1,27.8,5.188m0,45.119h0m0,0h0M27.8,4h0A23.753,23.753,0,0,0,6.981,39.171L3.91,50.386a1.188,1.188,0,0,0,1.448,1.463l11.51-3.018A23.749,23.749,0,1,0,27.8,4Z" transform="translate(-3.868 -4)" fill="#cfd8dc"></path>
                                                                <path id="Path_86" data-name="Path 86" d="M40.246,13.7A18.752,18.752,0,0,0,11.1,36.924l.447.709-1.9,6.916,7.1-1.861.686.406a18.714,18.714,0,0,0,9.543,2.613h.007A18.751,18.751,0,0,0,40.246,13.7Z" transform="translate(-3.046 -3.209)" fill="#40c351"></path>
                                                                <path id="Path_87" data-name="Path 87" d="M20.191,16.2c-.422-.939-.866-.958-1.269-.974-.329-.014-.7-.013-1.08-.013a2.072,2.072,0,0,0-1.5.706,6.318,6.318,0,0,0-1.974,4.7c0,2.773,2.02,5.454,2.3,5.829s3.9,6.249,9.629,8.508c4.761,1.877,5.731,1.5,6.764,1.41s3.335-1.363,3.8-2.679a4.72,4.72,0,0,0,.329-2.679c-.141-.235-.517-.375-1.08-.658s-3.335-1.646-3.852-1.833-.892-.282-1.269.283-1.455,1.833-1.785,2.209-.658.424-1.221.141a15.429,15.429,0,0,1-4.533-2.8,16.982,16.982,0,0,1-3.136-3.9c-.329-.563-.036-.869.247-1.15.253-.253.563-.658.846-.987a3.855,3.855,0,0,0,.563-.94,1.037,1.037,0,0,0-.048-.987C21.787,20.1,20.692,17.316,20.191,16.2Z" transform="translate(-1.892 -1.89)" fill="#fff" fill-rule="evenodd"></path>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                    <li value="twitter">
                                                        <a href="https://twitter.com/intent/tweet?text=Hey! I am ranked <?php echo $current_user_rank; ?> out of <?php echo $totalRank; ?> users in my zone on Hindustan Times Codeathon. Join today at www.htcodeathon.com and participate in one of India's biggest coding olympiads. Learn. Participate. Win." target="_blank">
                                                            <svg id="icons8-twitter-circled" xmlns="http://www.w3.org/2000/svg" width="47.685" height="47.685" viewBox="0 0 47.685 47.685">
                                                                <path id="Path_88" data-name="Path 88" d="M27.842,4A23.842,23.842,0,1,0,51.685,27.842,23.842,23.842,0,0,0,27.842,4Z" transform="translate(-4 -4)" fill="#03a9f4"></path>
                                                                <path id="Path_89" data-name="Path 89" d="M40.611,17.527a13.383,13.383,0,0,1-3.576,1.049c1.214-.72,3.139-2.22,3.576-3.576a17.065,17.065,0,0,1-4.522,1.636,5.761,5.761,0,0,0-9.784,4.325v2.384c-4.768,0-9.418-3.632-12.311-7.153a5.738,5.738,0,0,0-.8,2.929c0,2.168,1.992,4.369,3.569,5.416a11.065,11.065,0,0,1-3.576-1.192v.068a5.345,5.345,0,0,0,4.664,5.272,7.465,7.465,0,0,1-3.386.621c.746,2.307,4.5,3.526,7.067,3.576-2.01,1.558-5.593,2.384-8.345,2.384A8.785,8.785,0,0,1,12,35.239a18.539,18.539,0,0,0,9.537,2.412c10.8,0,16.69-8.247,16.69-15.939,0-.253-.008-1.1-.021-1.347a9.057,9.057,0,0,0,2.406-2.837" transform="translate(-2.463 -1.887)" fill="#fff"></path>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                    <li value="facebook">
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_bloginfo('url')?>&quote=Hey! I am ranked <?php echo $current_user_rank; ?> out of <?php echo $totalRank; ?> users in my zone on Hindustan Times Codeathon. Join today at www.htcodeathon.com and participate in one of India's biggest coding olympiads. Learn. Participate. Win." target="_blank">
                                                            <svg id="icons8-facebook" xmlns="http://www.w3.org/2000/svg" width="47.685" height="47.685" viewBox="0 0 47.685 47.685">
                                                                <path id="Path_90" data-name="Path 90" d="M28.842,5A23.842,23.842,0,1,0,52.685,28.842,23.842,23.842,0,0,0,28.842,5Z" transform="translate(-5 -5)" fill="#1976d3"></path>
                                                                <path id="Path_91" data-name="Path 91" d="M29.15,33.174h6.17l.969-6.268h-7.14V23.48c0-2.6.851-4.913,3.286-4.913h3.914V13.1a33.247,33.247,0,0,0-4.89-.3c-5.739,0-9.1,3.031-9.1,9.935v4.17h-5.9v6.268h5.9V50.4a23.891,23.891,0,0,0,3.566.295,24,24,0,0,0,3.228-.243Z" transform="translate(-2.08 -3.012)" fill="#fff"></path>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </span>
                                        <span class="share share-schools" style="display: none;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" viewBox="0 0 25 16">
                                                <path id="Shape_874" data-name="Shape 874" d="M3516.475,431l9.524,7.407-9.524,7.408v-3.852c-.507-.023-9.338-.306-15.476,5.037,2.457-7.534,10.171-10.811,15.476-12.148Z" transform="translate(-3500.999 -430.999)"></path>
                                            </svg>
                                            <div class="toggle-share ">
                                                <h6>Share with your Friends</h6>
                                                <ul id="social_share">
                                                    <li value="whatsapp">
                                                        <a href="https://api.whatsapp.com//send?text=Hey! I am now ranked <?php echo $current_user_rank1; ?> out of <?php echo $totalRank2; ?> users in my school on Hindustan Times Codeathon. Join today at www.htcodeathon.com and participate in one of India's biggest coding olympiads Learn. Participate. Win." target="_blank">
                                                            <svg id="icons8-whatsapp" xmlns="http://www.w3.org/2000/svg" width="47.685" height="47.888" viewBox="0 0 47.685 47.888">
                                                                <path id="Path_83" data-name="Path 83" d="M4.868,50.51l3.2-11.686A22.56,22.56,0,1,1,27.617,50.119h-.01a22.534,22.534,0,0,1-10.78-2.746Z" transform="translate(-3.679 -3.812)" fill="#fff"></path>
                                                                <path id="Path_84" data-name="Path 84" d="M4.962,51.2a.594.594,0,0,1-.573-.75L7.525,39a23.15,23.15,0,1,1,9.321,9.1L5.113,51.178A.543.543,0,0,1,4.962,51.2Z" transform="translate(-3.773 -3.906)" fill="#fff"></path>
                                                                <path id="Path_85" data-name="Path 85" d="M27.8,5.188a22.56,22.56,0,0,1,0,45.119H27.8a22.534,22.534,0,0,1-10.78-2.746L5.056,50.7l3.2-11.686A22.562,22.562,0,0,1,27.8,5.188m0,45.119h0m0,0h0M27.8,4h0A23.753,23.753,0,0,0,6.981,39.171L3.91,50.386a1.188,1.188,0,0,0,1.448,1.463l11.51-3.018A23.749,23.749,0,1,0,27.8,4Z" transform="translate(-3.868 -4)" fill="#cfd8dc"></path>
                                                                <path id="Path_86" data-name="Path 86" d="M40.246,13.7A18.752,18.752,0,0,0,11.1,36.924l.447.709-1.9,6.916,7.1-1.861.686.406a18.714,18.714,0,0,0,9.543,2.613h.007A18.751,18.751,0,0,0,40.246,13.7Z" transform="translate(-3.046 -3.209)" fill="#40c351"></path>
                                                                <path id="Path_87" data-name="Path 87" d="M20.191,16.2c-.422-.939-.866-.958-1.269-.974-.329-.014-.7-.013-1.08-.013a2.072,2.072,0,0,0-1.5.706,6.318,6.318,0,0,0-1.974,4.7c0,2.773,2.02,5.454,2.3,5.829s3.9,6.249,9.629,8.508c4.761,1.877,5.731,1.5,6.764,1.41s3.335-1.363,3.8-2.679a4.72,4.72,0,0,0,.329-2.679c-.141-.235-.517-.375-1.08-.658s-3.335-1.646-3.852-1.833-.892-.282-1.269.283-1.455,1.833-1.785,2.209-.658.424-1.221.141a15.429,15.429,0,0,1-4.533-2.8,16.982,16.982,0,0,1-3.136-3.9c-.329-.563-.036-.869.247-1.15.253-.253.563-.658.846-.987a3.855,3.855,0,0,0,.563-.94,1.037,1.037,0,0,0-.048-.987C21.787,20.1,20.692,17.316,20.191,16.2Z" transform="translate(-1.892 -1.89)" fill="#fff" fill-rule="evenodd"></path>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                    <li value="twitter">
                                                        <a href="https://twitter.com/intent/tweet?text=Hey! I am now ranked <?php echo $current_user_rank1; ?> out of <?php echo $totalRank2; ?> users in my school on Hindustan Times Codeathon. Join today at www.htcodeathon.com and participate in one of India's biggest coding olympiads Learn. Participate. Win." target="_blank">
                                                            <svg id="icons8-twitter-circled" xmlns="http://www.w3.org/2000/svg" width="47.685" height="47.685" viewBox="0 0 47.685 47.685">
                                                                <path id="Path_88" data-name="Path 88" d="M27.842,4A23.842,23.842,0,1,0,51.685,27.842,23.842,23.842,0,0,0,27.842,4Z" transform="translate(-4 -4)" fill="#03a9f4"></path>
                                                                <path id="Path_89" data-name="Path 89" d="M40.611,17.527a13.383,13.383,0,0,1-3.576,1.049c1.214-.72,3.139-2.22,3.576-3.576a17.065,17.065,0,0,1-4.522,1.636,5.761,5.761,0,0,0-9.784,4.325v2.384c-4.768,0-9.418-3.632-12.311-7.153a5.738,5.738,0,0,0-.8,2.929c0,2.168,1.992,4.369,3.569,5.416a11.065,11.065,0,0,1-3.576-1.192v.068a5.345,5.345,0,0,0,4.664,5.272,7.465,7.465,0,0,1-3.386.621c.746,2.307,4.5,3.526,7.067,3.576-2.01,1.558-5.593,2.384-8.345,2.384A8.785,8.785,0,0,1,12,35.239a18.539,18.539,0,0,0,9.537,2.412c10.8,0,16.69-8.247,16.69-15.939,0-.253-.008-1.1-.021-1.347a9.057,9.057,0,0,0,2.406-2.837" transform="translate(-2.463 -1.887)" fill="#fff"></path>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                    <li value="facebook">
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_bloginfo('url')?>&quote=Hey! I am now ranked <?php echo $current_user_rank1; ?> out of <?php echo $totalRank2; ?> users in my school on Hindustan Times Codeathon. Join today at www.htcodeathon.com and participate in one of India's biggest coding olympiads Learn. Participate. Win." target="_blank">
                                                            <svg id="icons8-facebook" xmlns="http://www.w3.org/2000/svg" width="47.685" height="47.685" viewBox="0 0 47.685 47.685">
                                                                <path id="Path_90" data-name="Path 90" d="M28.842,5A23.842,23.842,0,1,0,52.685,28.842,23.842,23.842,0,0,0,28.842,5Z" transform="translate(-5 -5)" fill="#1976d3"></path>
                                                                <path id="Path_91" data-name="Path 91" d="M29.15,33.174h6.17l.969-6.268h-7.14V23.48c0-2.6.851-4.913,3.286-4.913h3.914V13.1a33.247,33.247,0,0,0-4.89-.3c-5.739,0-9.1,3.031-9.1,9.935v4.17h-5.9v6.268h5.9V50.4a23.891,23.891,0,0,0,3.566.295,24,24,0,0,0,3.228-.243Z" transform="translate(-2.08 -3.012)" fill="#fff"></path>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </span>
                                    </span>
                                </div>
                                <div class="pull-right">
                                    <h6><span class="rank"><?php echo $current_user_rank; ?></span><p>Your Rank<span><?php echo $user_zone; ?> Zone</span></p> </h6>
                                </div>
                            </div>
                            <div class="rank-people">
                                <?php 
                                  $first_rank_fname_len = strlen(get_user_meta($first_rank,'first_name',true));
                                  $second_rank_fname_len = strlen(get_user_meta($second_rank,'first_name',true));
                                  $third_rank_fname_len = strlen(get_user_meta($third_rank,'first_name',true));
                                  $first_rank_lname_len = strlen(get_user_meta($first_rank,'last_name',true));
                                  $second_rank_lname_len = strlen(get_user_meta($second_rank,'last_name',true));
                                  $third_rank_lname_len = strlen(get_user_meta($third_rank,'last_name',true));
                                ?>
                                <span class="rank-two">
                                    <figure>
                                      <?php if(bp_core_fetch_avatar(array('item_id' => $second_rank)) != ''){
                                              echo bp_core_fetch_avatar(array('item_id' => $second_rank));
                                            }else{ ?>
                                        <img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/avatar.jpg">
                                      <?php } ?>
                                    </figure>
                                    <?php if($second_rank_fname_len > 8){ ?>
                                      <p class="name"><?php echo substr(get_user_meta($second_rank,'first_name',true),0,8); ?>...</p>
                                    <?php }else{ ?>
                                      <p class="name"><?php echo get_user_meta($second_rank,'first_name',true); ?></p>
                                    <?php } ?>
                                    <?php if($second_rank_lname_len > 8){ ?>
                                      <p class="name"><?php echo substr(get_user_meta($second_rank,'last_name',true),0,8); ?>...</p>
                                    <?php }else{ ?>
                                      <p class="name"><?php echo get_user_meta($second_rank,'last_name',true); ?></p>
                                    <?php } ?>
                                </span>
                                <span class="rank-one">
                                    <figure>
                                      <?php if(bp_core_fetch_avatar(array('item_id' => $first_rank)) != ''){
                                              echo bp_core_fetch_avatar(array('item_id' => $first_rank));
                                            }else{ ?>
                                        <img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/avatar.jpg">
                                      <?php } ?>
                                    </figure>
                                    <?php if($first_rank_fname_len > 8){ ?>
                                      <p class="name"><?php echo substr(get_user_meta($first_rank,'first_name',true),0,8); ?>...</p>
                                    <?php }else{ ?>
                                      <p class="name"><?php echo get_user_meta($first_rank,'first_name',true); ?></p>
                                    <?php } ?>
                                    <?php if($first_rank_lname_len > 8){ ?>
                                      <p class="name"><?php echo substr(get_user_meta($first_rank,'last_name',true),0,8); ?>...</p>
                                    <?php }else{ ?>
                                      <p class="name"><?php echo get_user_meta($first_rank,'last_name',true); ?></p>
                                    <?php } ?>
                                </span>
                                <span class="rank-three">
                                    <figure>
                                      <?php if(bp_core_fetch_avatar(array('item_id' => $third_rank)) != ''){
                                              echo bp_core_fetch_avatar(array('item_id' => $third_rank));
                                            }else{ ?>
                                        <img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/avatar.jpg">
                                      <?php } ?>
                                    </figure>
                                    <?php if($third_rank_fname_len > 8){ ?>
                                      <p class="name"><?php echo substr(get_user_meta($third_rank,'first_name',true),0,8); ?>...</p>
                                    <?php }else{ ?>
                                      <p class="name"><?php echo get_user_meta($third_rank,'first_name',true); ?></p>
                                    <?php } ?>
                                    <?php if($third_rank_lname_len > 8){ ?>
                                      <p class="name"><?php echo substr(get_user_meta($third_rank,'last_name',true),0,8); ?>...</p>
                                    <?php }else{ ?>
                                      <p class="name"><?php echo get_user_meta($third_rank,'last_name',true); ?></p>
                                    <?php } ?>
                                </span>
                            </div>
                            <div class="board-list">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active zoneBtn" id="pills-zone-tab" data-bs-toggle="pill" data-bs-target="#pills-zone" type="button" role="tab" aria-controls="pills-zone" aria-selected="true">ZONES</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link schoolsBtn" id="pills-school-tab" data-bs-toggle="pill" data-bs-target="#pills-school" type="button" role="tab" aria-controls="pills-school" aria-selected="false">SCHOOLS</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-zone" role="tabpanel" aria-labelledby="pills-zone-tab">
                                        <div class="tab_scroll">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody id="rankdatazone">
                                                        <?php foreach($user_rank_list as $user_rank_data){ ?>
                                                        <tr>
                                                            <td><?php echo $user_rank_data->rank?></td>
                                                            <td><?php echo get_user_meta($user_rank_data->user_id,'first_name',true); ?> <?php echo get_user_meta($user_rank_data->user_id,'last_name',true); ?></td>
                                                            <td class="numbers"><?php echo $user_rank_data->points ?></td>
                                                        </tr>
                                                        <?php }?>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-school" role="tabpanel" aria-labelledby="pills-school-tab">
                                        <div class="tab_scroll">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody id="rankdataschool">
                                                        <?php foreach($user_rank_list_school as $user_rank_data){ ?>
                                                        <tr>
                                                            <td><?php echo $user_rank_data->rank?></td>
                                                            <td><?php echo get_user_meta($user_rank_data->user_id,'first_name',true); ?> <?php echo get_user_meta($user_rank_data->user_id,'last_name',true); ?></td>
                                                            <td class="numbers"><?php echo $user_rank_data->points ?></td>
                                                        </tr>
                                                        <?php }?>
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
<section class="section-wrapper about" id="About_Partners">
  <div class="section-copy">
    <h2 class="section-title">PARTNERS</h2>
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
              <figure class="image"><img src="<?php echo $image_url; ?>"></figure>
              <div class="copy">
                <h3 class="title"><?php echo $custom_fields['about_our_partners_title'][0];?></h3>
                <p><?php echo $custom_fields['description'][0];?></p>
                <a class="read-more" href="<?php echo $custom_fields['link'][0];?>">Visit Partner >></a>
              </div>
            </div>
        </div>
      <?php endwhile;endif; ?>
    </div>
  </div>
</section>
    <section class="section-wrapper partners dashboard_partner">
        <div class="section-copy">
            <h2 class="section-title">Our Partners</h2>
            <div class="static-slider-wrapper">
            <ul class="static-slider">
      <?php
        $args1 = array(
          'post_type' => 'event_our_partners_l',
          'post_status' => 'publish',
          'orderby' => 'publish_date',
          'order' => 'ASC',        
          'nopaging' => true
        );
        $Query1 = new WP_Query( $args1 );
        
        if ($Query1->have_posts()) : while ($Query1->have_posts()) : $Query1->the_post();
          $custom_fields = get_post_custom();
          $image_url = wp_get_attachment_url($custom_fields['upload_image'][0]);
      ?>
      <li><img src="<?php echo $image_url; ?>"></li>
      <?php endwhile;endif; ?>
    </ul>
    </div>
            <?php /*
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
            </div> */ ?>
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
                            <input type="text" id="myInput" value="<?php echo get_home_url().'/?mref='.do_shortcode('[mycred_affiliate_id]'); ?>" >
                            <button type="button" onclick="myFunction()" class="copy_button">Copy</button>
                        </div>
                        <p id="successMsg"></p>
                    </div>
                </div>
                <div class="pull-right">
                    <div class="share-option">
                        <h6>Share Code:</h6>
                        <ul>
                            <li>
                                <a href="https://api.whatsapp.com//send?text=Hey! My referral code is <?php echo get_home_url().'/?mref='.do_shortcode('[mycred_affiliate_id]'); ?>. Please use this referral code to register at www.htcodeathon.com and participate in one of India's biggest coding olympiads. Also earn points for your successful registration! Learn. Participate. Win" target="_blank">
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
                                <a href="https://twitter.com/intent/tweet?text=Hey! My referral code is <?php echo get_home_url().'/?mref='.do_shortcode('[mycred_affiliate_id]'); ?>. Please use this referral code to register at www.htcodeathon.com and participate in one of India's biggest coding olympiads. Also earn points for your successful registration! Learn. Participate. Win" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="59" height="59" viewBox="0 0 59 59">
                                        <g id="icons8-twitter-circled" transform="translate(-4 -4)">
                                            <path id="Path_88" data-name="Path 88" d="M33.5,4A29.5,29.5,0,1,0,63,33.5,29.5,29.5,0,0,0,33.5,4Z" fill="#03a9f4"/>
                                            <path id="Path_89" data-name="Path 89" d="M47.4,18.127a16.559,16.559,0,0,1-4.425,1.3c1.5-.891,3.884-2.746,4.425-4.425a21.115,21.115,0,0,1-5.595,2.024A7.06,7.06,0,0,0,36.51,15c-4.012,0-6.81,3.4-6.81,7.375v2.95c-5.9,0-11.652-4.494-15.232-8.85a7.1,7.1,0,0,0-.984,3.624c0,2.683,2.465,5.406,4.416,6.7a13.69,13.69,0,0,1-4.425-1.475v.084c0,3.491,2.45,5.862,5.77,6.522a9.236,9.236,0,0,1-4.189.768c.923,2.854,5.565,4.363,8.744,4.425-2.487,1.928-6.921,2.95-10.325,2.95A10.869,10.869,0,0,1,12,40.041a22.938,22.938,0,0,0,11.8,2.984c13.359,0,20.65-10.2,20.65-19.721,0-.313-.01-1.36-.027-1.667a11.207,11.207,0,0,0,2.977-3.51" transform="translate(3.8 5.225)" fill="#fff"/>
                                         </g>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_bloginfo('url')?>&quote=Hey! My referral code is <?php echo get_home_url().'/?mref='.do_shortcode('[mycred_affiliate_id]'); ?>. Please use this referral code to register at www.htcodeathon.com and participate in one of India's biggest coding olympiads. Also earn points for your successful registration! Learn. Participate. Win" target="_blank">
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
                <p>Type email addresses of your friends, separated by a comma.</p>
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
                    <h5 class="modal-title" id="exampleModalLabel" style="margin-bottom: 20px;">Complete your profile</h5>
                    <!-- <p>Lorem ipsum Dummy Text</p> -->
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
                                                    <label class="form-label">Email ID*</label>
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
                                                      <?php if($dob != '1970-01-01'){ ?>
                                                        <input id="user_dob_display" type="text" class="form-control" name="user_dob_display" placeholder="" value="<?php echo $dobDate; ?>" readonly>
                                                      <?php }else{ ?>
                                                        <input id="user_dob_display" type="text" class="form-control" name="user_dob_display" placeholder="mm/dd/yyyy" value="" readonly>
                                                      <?php } ?>
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
                                            <p>You earn</p>
                                            <span class="rating-points">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34.001" viewBox="0 0 34 34.001">
                                                <path id="Path_1757" data-name="Path 1757" d="M643.531-195a17,17,0,0,0-17,17,17,17,0,0,0,17,17,17,17,0,0,0,17-17A17,17,0,0,0,643.531-195Zm11.015,15.833-4.4,4.289,1.046,6.042a1.53,1.53,0,0,1-.615,1.491,1.5,1.5,0,0,1-1.615.122l-5.426-2.859-5.427,2.859a1.526,1.526,0,0,1-1.629-.122,1.559,1.559,0,0,1-.615-1.491l1.045-6.042-4.4-4.289a1.52,1.52,0,0,1-.385-1.568,1.534,1.534,0,0,1,1.246-1.045l6.057-.891,2.721-5.488a1.587,1.587,0,0,1,2.751,0l2.72,5.488,6.058.891a1.534,1.534,0,0,1,1.245,1.045A1.523,1.523,0,0,1,654.546-179.167Z" transform="translate(-626.531 195)" fill="#ffcd35"/>
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
                                    <li class="stepli1 completed active"></li>
                                    <li class="stepli2 active"></li>
                                    <li class="stepli3"></li>
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
                                                    <input type="text" class="form-control" id="user_school_data1" name="user_school_data" placeholder="" value="<?php echo $user_school_name; ?>">
                                                    <input type="hidden" id="user_school" name="user_school" value="<?php echo $user_school; ?>">
                                                </div>
                                                <span id="errSchoolMsg"></span>
                                            </div>
                                        </div>
                                        <div class="list" style="display:none" id="other_school11">
                                            <div class="form-group">
                                                <label class="form-label">Other School Name</label>
                                                <div>
                                                    <input type="text" class="form-control" id="user_school_other1" name="user_school_other" placeholder="Please enter others school name" value="" >         
                                                    <span id="errotherSchoolMsg"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list">
                                            <div class="form-group">
                                                <label class="form-label">Country*</label>
                                                <div class="input-group input-dropdown">
                                                  <select class="form-control" name="user_country_data" id="user_country_data1">
                                                      <option value="India" selected="selected">India</option>
                                                  </select>
                                                    <!-- <input type="text" class="form-control" id="user_country_data1" name="user_country_data" placeholder="Country" value="<?php //echo $country_name; ?>"> -->
                                                    <input type="hidden" id="user_country" name="user_country" value="1">
                                                </div>
                                                <span id="errCountryMsg"></span>
                                            </div>
                                        </div>
                                        <div class="list">
                                            <div class="form-group">
                                                <label class="form-label">State*</label>
                                                <div class="input-group input-dropdown">
                                                  <select class="form-control" name="user_state" id="user_state1">
                                                    <option value="">Select State</option>
                                                    <?php
                                                      foreach($resultsState as $rowState){ 
                                                        $state_name = $rowState->state_name; 
                                                        echo '<option value="'.$state_name.'"'; if($state_name == $user_state){ echo ' selected="selected"'; }
                                                        echo '>'.$state_name.'</option>';
                                                      }
                                                    ?>
                                                  </select>
                                                    <!-- <input type="text" class="form-control" id="user_state1" name="user_state" placeholder="" value="<?php //echo $user_state; ?>" autocomplete="off"> -->
                                                </div>
                                                <span id="errSteMsg"></span>
                                            </div>
                                        </div>
                                        <!-- <div class="list">
                                            <div class="form-group">
                                                <label class="form-label">City</label>
                                                <div class="input-group input-search">
                                                    <input type="text" class="form-control" id="user_city" name="user_city" placeholder="City" value="<?php echo $user_city; ?>">
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="list">
                                            <div class="form-group profile_dropdown">
                                                <label for="">Grade / Standard*</label>
                                                <div class="input-group input-dropdown">
                                                    <select class="form-control" name="grade" id="grade">
                                                        <option value="K1" <?php if($child[0]->grade=="K1") echo 'selected="selected"'; ?>>K1</option>
                                                        <option value="K2" <?php if($child[0]->grade=="K2") echo 'selected="selected"'; ?>>K2</option>
                                                        <option value="1" <?php if($child[0]->grade=="1") echo 'selected="selected"'; ?>>1</option>
                                                        <option value="2" <?php if($child[0]->grade=="2") echo 'selected="selected"'; ?>>2</option>
                                                        <option value="3" <?php if($child[0]->grade=="3") echo 'selected="selected"'; ?>>3</option>
                                                        <option value="4" <?php if($child[0]->grade=="4") echo 'selected="selected"'; ?>>4</option>
                                                        <option value="5" <?php if($child[0]->grade=="5") echo 'selected="selected"'; ?>>5</option>
                                                        <option value="6" <?php if($child[0]->grade=="6") echo 'selected="selected"'; ?>>6</option>
                                                        <option value="7" <?php if($child[0]->grade=="7") echo 'selected="selected"'; ?>>7</option>
                                                        <option value="8" <?php if($child[0]->grade=="8") echo 'selected="selected"'; ?>>8</option>
                                                        <option value="9" <?php if($child[0]->grade=="9") echo 'selected="selected"'; ?>>9</option>
                                                        <option value="10" <?php if($child[0]->grade=="10") echo 'selected="selected"'; ?>>10</option>
                                                        <option value="11" <?php if($child[0]->grade=="11") echo 'selected="selected"'; ?>>11</option>
                                                        <option value="12" <?php if($child[0]->grade=="12") echo 'selected="selected"'; ?>>12</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list">
                                            <div class="form-group profile_dropdown">
                                                <label for="">Section / Division* <?php echo $child->division?></label>
                                                <div class="input-group input-dropdown">
                                                    <select class="form-control" name="division" id="division">
                                                      <option value="A" <?php if($child[0]->division=="A") echo 'selected="selected"'; ?>>A</option>
                                                      <option value="B" <?php if($child[0]->division=="B") echo 'selected="selected"'; ?>>B</option>
                                                      <option value="C" <?php if($child[0]->division=="C") echo 'selected="selected"'; ?>>C</option>
                                                      <option value="D" <?php if($child[0]->division=="D") echo 'selected="selected"'; ?>>D</option>
                                                      <option value="E" <?php if($child[0]->division=="E") echo 'selected="selected"'; ?>>E</option>
                                                      <option value="F" <?php if($child[0]->division=="F") echo 'selected="selected"'; ?>>F</option>
                                                      <option value="G" <?php if($child[0]->division=="G") echo 'selected="selected"'; ?>>G</option>
                                                      <option value="H" <?php if($child[0]->division=="H") echo 'selected="selected"'; ?>>H</option>
                                                      <option value="I" <?php if($child[0]->division=="I") echo 'selected="selected"'; ?>>I</option>
                                                      <option value="J" <?php if($child[0]->division=="J") echo 'selected="selected"'; ?>>J</option>
                                                    </select>
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
                                                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34.001" viewBox="0 0 34 34.001">
                                                <path id="Path_1757" data-name="Path 1757" d="M643.531-195a17,17,0,0,0-17,17,17,17,0,0,0,17,17,17,17,0,0,0,17-17A17,17,0,0,0,643.531-195Zm11.015,15.833-4.4,4.289,1.046,6.042a1.53,1.53,0,0,1-.615,1.491,1.5,1.5,0,0,1-1.615.122l-5.426-2.859-5.427,2.859a1.526,1.526,0,0,1-1.629-.122,1.559,1.559,0,0,1-.615-1.491l1.045-6.042-4.4-4.289a1.52,1.52,0,0,1-.385-1.568,1.534,1.534,0,0,1,1.246-1.045l6.057-.891,2.721-5.488a1.587,1.587,0,0,1,2.751,0l2.72,5.488,6.058.891a1.534,1.534,0,0,1,1.245,1.045A1.523,1.523,0,0,1,654.546-179.167Z" transform="translate(-626.531 195)" fill="#ffcd35"/>
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
                                    <li class="stepli1 completed active"></li>
                                    <li class="stepli2 completed active"></li>
                                    <li class="stepli3 active"></li>
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
                                        <button type="button" id="inputfile2" style="display: none;"></button>
                                        <input type="hidden" id="school_card_img" value="" name="school_card_img">
                                    </div>
                                    <span class="text"> Upload your school ID card and<span class="block"></span> get 50 points instantly!</span>
                                    <span id="errSchoolIDMsg"></span>
                                    <input type="hidden" id="skip_dashboard" name="skip_dashboard" value="1">
                                    <!-- <button type="button" class="skip-button skipDashboard2" id="skipDashboard" style="cursor: pointer;">Skip to Dashboard</button> -->
                                </div>
                            </div>
                            <div class="float-end">
                                <div class="profile-ratingdetail">
                                    <div class="profile-pointrating">
                                        <p>You earn</p>
                                        <span class="rating-points">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34.001" viewBox="0 0 34 34.001">
                                                <path id="Path_1757" data-name="Path 1757" d="M643.531-195a17,17,0,0,0-17,17,17,17,0,0,0,17,17,17,17,0,0,0,17-17A17,17,0,0,0,643.531-195Zm11.015,15.833-4.4,4.289,1.046,6.042a1.53,1.53,0,0,1-.615,1.491,1.5,1.5,0,0,1-1.615.122l-5.426-2.859-5.427,2.859a1.526,1.526,0,0,1-1.629-.122,1.559,1.559,0,0,1-.615-1.491l1.045-6.042-4.4-4.289a1.52,1.52,0,0,1-.385-1.568,1.534,1.534,0,0,1,1.246-1.045l6.057-.891,2.721-5.488a1.587,1.587,0,0,1,2.751,0l2.72,5.488,6.058.891a1.534,1.534,0,0,1,1.245,1.045A1.523,1.523,0,0,1,654.546-179.167Z" transform="translate(-626.531 195)" fill="#ffcd35"/>
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

<div class="modal fade about-popup practice-popup" id="practice-popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tools and Software</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21.657" height="21.657" viewBox="0 0 21.657 21.657">
                      <g id="Group_8" data-name="Group 8" transform="translate(-1045.728 -811.172)">
                        <line id="Line_2" data-name="Line 2" x1="16" y2="16" transform="translate(1048.556 814)" fill="none" stroke="#373737" stroke-linecap="round" stroke-width="4"></line>
                        <line id="Line_3" data-name="Line 3" x2="16" y2="16" transform="translate(1048.556 814)" fill="none" stroke="#373737" stroke-linecap="round" stroke-width="4"></line>
                      </g>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <?php echo get_post_meta($courseID,'vibe_practice_popup',true); ?>
                <!-- <p>For App Development course we will be using App Inventor Platform developed by MIT. This is a drag n drop based coding platform used to develop apps for android mobile devices. You need internet connection and login using any gmail id to use this platform and this can be accessed from the link below:</p>
                <p class="highlight">App Inventor : <a href="http://ai2.appinventor.mit.edu/" target="_blank">ai2.appinventor.mit.edu</a></p>

                <p>For Website Designing, the software to be used is Brackets. The languages that you will use are HTML5, CSS3, and JS. You can download Brackets from the link below:</p>
                <p class="highlight">
                Brackets : <a href="http://brackets.io/" target="_blank">brackets.io</a>Scratch : <a href="https://scratch.mit.edu/" target="_blank">scratch.mit</a>
                </p>

                <p>For Game Development, the software to be used is Anaconda with PyGame module. The language that you will learn is Python. You can download Anaconda from the link below:</p>
                <p class="highlight">Anaconda : <a href="https://www.anaconda.com/" target="_blank">www.anaconda.com</a></p>
                
                <p>You can go and practice your video lessons on the software given above. However, for additional resources, you can practise by using IDE.</p>
                <p>An Online Integrated Development environment, also known as a web IDE or Cloud IDE, is a browser-based integrated development environment. An online IDE can be accessed from a web browser, such as Google Chrome or Internet Explorer, enabling software development on low-powered devices that are normally unsuitable.</p>
                <p> You can always go to your video lesson and practice using the IDE provided there, If you want to try more such IDEs below are some of the third party Online IDE you can use to practice what you have learned without having any software installed by clicking on the below links you will be redirected out of Codeathon website where you can practice. Happy Learning!</p> -->
            </div>
        </div>
    </div>
</div>
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
    <div class="earnpoints-wrapper">
        <button class="earn-points-btn" type="button"></button>
        <!-- <section class="section">
            <h3 class="earn-title first">Earn Points</h3>
            <div class="earnpoints-copy">
                <div class="points-wrapper">
                    <div class="column pink">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 7.429 6.958"><path id="Path_30439" data-name="Path 30439" d="M-3050.29-204.041a.559.559,0,0,0,.04-.142c0-.249.014-.5,0-.747a8.312,8.312,0,0,0-.1-.914c-.051-.292-.136-.577-.212-.864a4.4,4.4,0,0,0-.421-1.009,4.34,4.34,0,0,0-1.156-1.36,4.149,4.149,0,0,0-.971-.553,4.031,4.031,0,0,0-1.318-.283c-.145-.007-.152-.018-.152-.181,0-.253,0-.505,0-.758a1.437,1.437,0,0,0-.019-.148l-3.073,2.425,3.07,2.425a1.056,1.056,0,0,0,.021-.143c0-.256,0-.512,0-.768,0-.092.027-.131.107-.154a3.024,3.024,0,0,1,1.089-.12,2.932,2.932,0,0,1,.936.24,3.163,3.163,0,0,1,1.32,1.108,4.339,4.339,0,0,1,.618,1.248c.064.21.115.425.173.638a.463.463,0,0,0,.022.053Z" transform="translate(3057.672 210.999)"/></svg>
                        </span>
                        <span class="copy">
                            <span class="title">Social Sharing</span>
                            <span class="sub-title">Title</span>
                        </span>
                        <span class="number">+50</span>
                    </div>
                    <div class="column blue">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 7.43 7.427">
                                <path id="Path_30442" data-name="Path 30442" d="M-3335.585-575.428a3.72,3.72,0,0,1-3.719-3.707,3.72,3.72,0,0,1,3.715-3.719,3.72,3.72,0,0,1,3.715,3.711A3.72,3.72,0,0,1-3335.585-575.428Zm-.842-3.717h0q0,.558,0,1.115c0,.2.121.266.294.166l1.381-.8c.191-.11.383-.218.571-.331a.163.163,0,0,0,.006-.3c-.016-.011-.033-.02-.05-.03l-1.91-1.1c-.173-.1-.293-.03-.293.168Q-3336.427-579.7-3336.427-579.145Z" transform="translate(3339.304 582.854)"/>
                            </svg>
                        </span>
                        <span class="copy">
                            <span class="title">Video Quiz</span>
                            <span class="sub-title">Video Title</span>
                        </span>
                        <span class="number">+100</span>
                    </div>
                    <div class="column blue">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 7.43 7.427">
                                <path id="Path_30442" data-name="Path 30442" d="M-3335.585-575.428a3.72,3.72,0,0,1-3.719-3.707,3.72,3.72,0,0,1,3.715-3.719,3.72,3.72,0,0,1,3.715,3.711A3.72,3.72,0,0,1-3335.585-575.428Zm-.842-3.717h0q0,.558,0,1.115c0,.2.121.266.294.166l1.381-.8c.191-.11.383-.218.571-.331a.163.163,0,0,0,.006-.3c-.016-.011-.033-.02-.05-.03l-1.91-1.1c-.173-.1-.293-.03-.293.168Q-3336.427-579.7-3336.427-579.145Z" transform="translate(3339.304 582.854)"/>
                            </svg>
                        </span>
                        <span class="copy">
                            <span class="title">Watch Videos</span>
                            <span class="sub-title">Video Title</span>
                        </span>
                        <span class="number">+50</span>
                    </div>
                    <div class="column pink">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 7 8.747">
                                <path id="Path_30441" data-name="Path 30441" d="M-2468.3,258.727c-.885,0-1.771.006-2.656,0a.829.829,0,0,1-.815-.663.431.431,0,0,1-.008-.087q0-1.814,0-3.627a.835.835,0,0,1,.562-.792.75.75,0,0,1,.315-.052c.072.005.144,0,.216,0s.077-.016.077-.076c0-.476,0-.953-.007-1.429a1.5,1.5,0,0,1,.163-.692,2.288,2.288,0,0,1,.879-.986,2.057,2.057,0,0,1,.439-.181,2.713,2.713,0,0,1,.933-.141,2.407,2.407,0,0,1,1.178.351,2.156,2.156,0,0,1,.923,1.037,1.331,1.331,0,0,1,.126.539c0,.18.009.359.007.539a.337.337,0,0,1-.044.145.519.519,0,0,1-.718.218.479.479,0,0,1-.235-.415c0-.115-.008-.23,0-.344a.754.754,0,0,0-.145-.46,1.285,1.285,0,0,0-.706-.52,2.327,2.327,0,0,0-.4-.093.873.873,0,0,0-.26.017,1.5,1.5,0,0,0-.7.283,1.4,1.4,0,0,0-.411.566.171.171,0,0,0-.006.066c0,.5,0,.993,0,1.49,0,.068.015.086.084.086q1.921,0,3.842.014a.956.956,0,0,1,.536.151.751.751,0,0,1,.344.65c.006.434,0,.867,0,1.3,0,.748-.007,1.5-.008,2.245a.829.829,0,0,1-.669.85,1.1,1.1,0,0,1-.239.028q-1.3,0-2.6,0Zm-.357-1.769h0v.182a.267.267,0,0,0,.161.259.563.563,0,0,0,.581-.042.263.263,0,0,0,.119-.236c0-.137,0-.274-.005-.411a.088.088,0,0,1,.058-.092,1.137,1.137,0,0,0,.153-.1,1.023,1.023,0,0,0,.275-1.084,1.019,1.019,0,0,0-1.413-.615,1.02,1.02,0,0,0-.546,1.2,1,1,0,0,0,.555.648.085.085,0,0,1,.06.092C-2468.662,256.828-2468.658,256.893-2468.658,256.958Z" transform="translate(2471.781 -250)"/>
                            </svg>
                        </span>
                        <span class="copy">
                            <span class="title">Login Daily</span>
                            <span class="sub-title">Title</span>
                        </span>
                        <span class="number">+50</span>
                    </div>
                    <div class="column pink">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 5.477 3.745">
                                <g id="Group_15942" data-name="Group 15942" transform="translate(1.496 -1.382)">
                                <path id="Path_30443" data-name="Path 30443" d="M-3108.466-375.123a1.893,1.893,0,0,1,.946-.769l.084-.03-.034-.021a1.173,1.173,0,0,1-.576-.878,1.009,1.009,0,0,1,.029-.41,1.212,1.212,0,0,1,.685-.806,1.228,1.228,0,0,1,.871-.071,1.25,1.25,0,0,1,.677.459,1.157,1.157,0,0,1,.23.556,1.074,1.074,0,0,1-.006.32,1.175,1.175,0,0,1-.124.368,1.174,1.174,0,0,1-.455.469l-.02.013.008.007.02.007a1.786,1.786,0,0,1,.336.156,1.926,1.926,0,0,1,.638.611,1.77,1.77,0,0,1,.256.631.049.049,0,0,1,0,.023.153.153,0,0,1-.106.076h-3.584a.105.105,0,0,1-.1-.055.1.1,0,0,1-.017-.079A1.866,1.866,0,0,1-3108.466-375.123Z" transform="translate(3108.881 379.539)"/>
                                <path id="Path_30444" data-name="Path 30444" d="M-1400.9,351.337a.181.181,0,0,1,.206-.2h.469c.077,0,.065,0,.066-.064,0-.15,0-.3,0-.451a.18.18,0,0,1,.2-.2h.161a.181.181,0,0,1,.195.2c0,.157,0,.313,0,.47,0,.036.011.046.046.046q.255,0,.51,0a.177.177,0,0,1,.187.19c0,.045,0,.09,0,.136a.181.181,0,0,1-.2.2c-.165,0-.33,0-.5,0-.035,0-.046.009-.046.045,0,.159,0,.318,0,.477a.179.179,0,0,1-.19.191h-.165a.18.18,0,0,1-.2-.2q0-.233,0-.466v-.047l-.047,0h-.5a.179.179,0,0,1-.2-.2Q-1400.9,351.4-1400.9,351.337Z" transform="translate(1399.405 -348.304)"/>
                                </g>
                            </svg>
                        </span>
                        <span class="copy">
                            <span class="title">Login Daily</span>
                            <span class="sub-title">Title</span>
                        </span>
                        <span class="number">+50</span>
                    </div>
                    <div class="column blue">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 7 6.125">
                            <path id="Path_30445" data-name="Path 30445" d="M-34.035,32.2H-33a1.107,1.107,0,0,0,1.107-1.1V27.182a1.165,1.165,0,0,0-1.283-1.094h-4.779a1.084,1.084,0,0,0-.938,1.1v3.921a1.106,1.106,0,0,0,1.106,1.106h1.574m-.486-1.265a.358.358,0,0,1-.361-.356.262.262,0,0,1,0-.045.361.361,0,0,1,.318-.318.358.358,0,0,1,.4.314.391.391,0,0,1,0,.045A.363.363,0,0,1-36.7,30.948Zm.9-1.961a1.466,1.466,0,0,1-.4.379.37.37,0,0,0-.2.343.162.162,0,0,1-.151.142h-.277a.166.166,0,0,1-.117-.05.156.156,0,0,1-.042-.117.922.922,0,0,1,.444-.8,1.055,1.055,0,0,0,.268-.253.424.424,0,0,0,.025-.443.512.512,0,0,0-.494-.268.519.519,0,0,0-.57.459.153.153,0,0,1-.151.126h-.281a.16.16,0,0,1-.121-.061.142.142,0,0,1-.026-.106,1.1,1.1,0,0,1,1.157-1,1.1,1.1,0,0,1,1.014.586A.982.982,0,0,1-35.8,28.987Zm2.486,1.894h-1.62a.292.292,0,0,1-.293-.237.284.284,0,0,1,.23-.329.262.262,0,0,1,.051,0h1.634a.285.285,0,0,1,.285.285.285.285,0,0,1-.285.285Zm0-1.45h-1.62a.292.292,0,0,1-.293-.237.284.284,0,0,1,.23-.329.262.262,0,0,1,.051,0h1.634a.285.285,0,0,1,.285.285.285.285,0,0,1-.285.285Zm0-1.45h-1.62a.292.292,0,0,1-.293-.237.284.284,0,0,1,.23-.329.262.262,0,0,1,.051,0h1.634a.285.285,0,0,1,.285.285.285.285,0,0,1-.285.285h0Z" transform="translate(38.893 -26.088)"/>
                            </svg>
                        </span>
                        <span class="copy">
                            <span class="title">Chapter Quiz</span>
                            <span class="sub-title">Chapter title</span>
                        </span>
                        <span class="tick">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9.755 9.755">
                            <path id="Subtraction_2" data-name="Subtraction 2" d="M-665.755,7.308a.676.676,0,0,1-.486-.213c-.334-.344-.679-.687-1.012-1.019l0,0-.455-.453a.63.63,0,0,1,0-.917.8.8,0,0,1,.375-.256.739.739,0,0,1,.179-.023.59.59,0,0,1,.423.178c.247.242.494.491.734.733l.19.191a.224.224,0,0,1,.023.032l.018.027.27-.266.007-.007c.145-.143.287-.282.427-.423l1.135-1.135.029-.029.575-.575a.641.641,0,0,1,.452-.194.646.646,0,0,1,.456.2l.026.025a.845.845,0,0,1,.2.255.625.625,0,0,1-.126.707q-.846.85-1.695,1.7l-.014.014-.408.408-.258.256c-.193.191-.392.388-.581.586A.66.66,0,0,1-665.755,7.308Z" transform="translate(670 0)" fill="#fff"/>
                            <g id="Group_18962" data-name="Group 18962" transform="translate(0 0)">
                            <path id="Path_30445" data-name="Path 30445" d="M2657.384,1614.088a4.877,4.877,0,1,1,4.879-4.874A4.879,4.879,0,0,1,2657.384,1614.088Zm-.65-4.172a.478.478,0,0,0-.041-.059c-.307-.308-.613-.619-.923-.924a.6.6,0,0,0-.6-.156.8.8,0,0,0-.375.256.628.628,0,0,0,0,.918c.491.492.988.978,1.471,1.477a.653.653,0,0,0,.964,0c.273-.286.558-.561.838-.841q1.058-1.059,2.117-2.118a.624.624,0,0,0,.126-.707.943.943,0,0,0-.226-.28.626.626,0,0,0-.908,0q-.87.87-1.74,1.74C2657.21,1609.449,2656.979,1609.674,2656.734,1609.916Z" transform="translate(-2652.508 -1604.333)" fill="#06ea8c"/>
                            </g>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </section> -->
        <section class="section total">
            <div class="section-header">
                <h3 class="earn-title">Total Points Earned</h3>
                <button type="button" data-bs-toggle="modal" data-bs-target="#total_earn_info" class="info">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17.834" height="17.836" viewBox="0 0 17.834 17.836" class="declaration">
                        <path id="Shape_924" data-name="Shape 924" d="M3192.22,367.219a8.916,8.916,0,1,0-12.979-.392l.083.062a4.207,4.207,0,0,1-1.834,2.081.351.351,0,0,0,.1.659,5.044,5.044,0,0,0,3.791-1.03l.02.021A8.941,8.941,0,0,0,3192.22,367.219Zm-5.933-11.806a1.463,1.463,0,0,1,0,2.926,1.463,1.463,0,1,1,0-2.926Zm-2.328,9.375c.062-.515.144-1.051.247-1.566.144-.907.31-1.813.474-2.72,0-.062.02-.123.02-.165,0-.371-.124-.515-.494-.556a3.3,3.3,0,0,1-.474-.082.331.331,0,0,1-.247-.371.318.318,0,0,1,.329-.288,1.755,1.755,0,0,1,.33-.021h2.76a.494.494,0,0,1,.556.494,5.617,5.617,0,0,1-.082.845c-.185,1.03-.371,2.081-.577,3.111-.062.35-.123.68-.164,1.03a1.311,1.311,0,0,0,.041.494.384.384,0,0,0,.432.31,2.3,2.3,0,0,0,.536-.144c.144-.062.268-.145.412-.206a.233.233,0,0,1,.33.288.879.879,0,0,1-.206.351,2.722,2.722,0,0,1-1.916.865,5.994,5.994,0,0,1-1.051-.062A1.622,1.622,0,0,1,3183.959,364.788Z" transform="translate(-3176.997 -351.997)" fill="#fff"></path>
                    </svg>
                </button>

                <div class="star">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.239" height="1.239" viewBox="0 0 1.239 1.239">
                      <g id="Group_15992" data-name="Group 15992" transform="translate(-1216 -475)">
                        <circle id="Ellipse_1821" data-name="Ellipse 1821" cx="0.551" cy="0.551" r="0.551" transform="translate(1216 475.061)" fill="#fff"/>
                        <path id="Path_30137" data-name="Path 30137" d="M627.15-195a.619.619,0,0,0-.619.619.619.619,0,0,0,.619.619.619.619,0,0,0,.619-.619A.619.619,0,0,0,627.15-195Zm.4.577-.16.156.038.22a.056.056,0,0,1-.022.054.055.055,0,0,1-.059,0l-.2-.1-.2.1a.056.056,0,0,1-.059,0,.057.057,0,0,1-.022-.054l.038-.22-.16-.156a.055.055,0,0,1-.014-.057.056.056,0,0,1,.045-.038l.221-.032.1-.2a.058.058,0,0,1,.1,0l.1.2.221.032a.056.056,0,0,1,.045.038A.055.055,0,0,1,627.552-194.423Z" transform="translate(589.469 670)" fill="#ffcd35"/>
                      </g>
                    </svg><?php echo $total_points; ?>
                </div>
            </div>
            <div class="earnpoints-copy">
                <div class="title">
                    <span class="section-title">Learning Points</span>
                    <span class="count"><?php echo $learning_points; ?></span>
                </div>
                <div class="points">
                    <div class="column">
                        <span class="rating"><?php echo getVideoPoints($userID,$courseID)?><span>/<?php echo getVideosCount($courseID)?></span></span>
                        <span class="copy">Videos Watched</span>
                        <span class="number">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1.239 1.239">
                              <g id="Group_15992" data-name="Group 15992" transform="translate(-1216 -475)">
                                <circle id="Ellipse_1821" data-name="Ellipse 1821" cx="0.551" cy="0.551" r="0.551" transform="translate(1216 475.061)" fill="#fff"/>
                                <path id="Path_30137" data-name="Path 30137" d="M627.15-195a.619.619,0,0,0-.619.619.619.619,0,0,0,.619.619.619.619,0,0,0,.619-.619A.619.619,0,0,0,627.15-195Zm.4.577-.16.156.038.22a.056.056,0,0,1-.022.054.055.055,0,0,1-.059,0l-.2-.1-.2.1a.056.056,0,0,1-.059,0,.057.057,0,0,1-.022-.054l.038-.22-.16-.156a.055.055,0,0,1-.014-.057.056.056,0,0,1,.045-.038l.221-.032.1-.2a.058.058,0,0,1,.1,0l.1.2.221.032a.056.056,0,0,1,.045.038A.055.055,0,0,1,627.552-194.423Z" transform="translate(589.469 670)" fill="#ffcd35"/>
                              </g>
                            </svg>
                            <span><?php echo earnPointsVideo($userID,'video_watched',$courseID); ?></span>
                        </span>
                    </div>
                    <div class="column">
                        <span class="rating"><?php echo getQuizPoints($userID,'video',$courseID)?><span>/<?php echo getQuizPointsTypeCount('video',$courseID)?></span></span>
                        <span class="copy">Video Quizzes Attempted</span>
                        <span class="number">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1.239 1.239">
                              <g id="Group_15992" data-name="Group 15992" transform="translate(-1216 -475)">
                                <circle id="Ellipse_1821" data-name="Ellipse 1821" cx="0.551" cy="0.551" r="0.551" transform="translate(1216 475.061)" fill="#fff"/>
                                <path id="Path_30137" data-name="Path 30137" d="M627.15-195a.619.619,0,0,0-.619.619.619.619,0,0,0,.619.619.619.619,0,0,0,.619-.619A.619.619,0,0,0,627.15-195Zm.4.577-.16.156.038.22a.056.056,0,0,1-.022.054.055.055,0,0,1-.059,0l-.2-.1-.2.1a.056.056,0,0,1-.059,0,.057.057,0,0,1-.022-.054l.038-.22-.16-.156a.055.055,0,0,1-.014-.057.056.056,0,0,1,.045-.038l.221-.032.1-.2a.058.058,0,0,1,.1,0l.1.2.221.032a.056.056,0,0,1,.045.038A.055.055,0,0,1,627.552-194.423Z" transform="translate(589.469 670)" fill="#ffcd35"/>
                              </g>
                            </svg>
                            <span><?php echo earnPointsVideo($userID,'video_points',$courseID); ?></span>
                        </span>
                    </div>
                    <div class="column">
                        <span class="rating"><?php echo getQuizPoints($userID,'chapter',$courseID)?><span>/<?php echo getQuizPointsTypeCount('chapter',$courseID)?></span></span>
                        <span class="copy">Chapter Quizzes Attempted</span>
                        <span class="number">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1.239 1.239">
                              <g id="Group_15992" data-name="Group 15992" transform="translate(-1216 -475)">
                                <circle id="Ellipse_1821" data-name="Ellipse 1821" cx="0.551" cy="0.551" r="0.551" transform="translate(1216 475.061)" fill="#fff"/>
                                <path id="Path_30137" data-name="Path 30137" d="M627.15-195a.619.619,0,0,0-.619.619.619.619,0,0,0,.619.619.619.619,0,0,0,.619-.619A.619.619,0,0,0,627.15-195Zm.4.577-.16.156.038.22a.056.056,0,0,1-.022.054.055.055,0,0,1-.059,0l-.2-.1-.2.1a.056.056,0,0,1-.059,0,.057.057,0,0,1-.022-.054l.038-.22-.16-.156a.055.055,0,0,1-.014-.057.056.056,0,0,1,.045-.038l.221-.032.1-.2a.058.058,0,0,1,.1,0l.1.2.221.032a.056.056,0,0,1,.045.038A.055.055,0,0,1,627.552-194.423Z" transform="translate(589.469 670)" fill="#ffcd35"/>
                              </g>
                            </svg>
                            <span><?php echo earnPointsVideo($userID,'chapter_points',$courseID); ?></span>
                        </span>
                    </div>
                    <div class="column">
                        <span class="rating"><?php echo getQuizPoints($userID,'course',$courseID)?><span>/<?php echo getQuizPointsTypeCount('course',$courseID)?></span></span>
                        <span class="copy">Course Quiz Attempted</span>
                        <span class="number">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1.239 1.239">
                              <g id="Group_15992" data-name="Group 15992" transform="translate(-1216 -475)">
                                <circle id="Ellipse_1821" data-name="Ellipse 1821" cx="0.551" cy="0.551" r="0.551" transform="translate(1216 475.061)" fill="#fff"/>
                                <path id="Path_30137" data-name="Path 30137" d="M627.15-195a.619.619,0,0,0-.619.619.619.619,0,0,0,.619.619.619.619,0,0,0,.619-.619A.619.619,0,0,0,627.15-195Zm.4.577-.16.156.038.22a.056.056,0,0,1-.022.054.055.055,0,0,1-.059,0l-.2-.1-.2.1a.056.056,0,0,1-.059,0,.057.057,0,0,1-.022-.054l.038-.22-.16-.156a.055.055,0,0,1-.014-.057.056.056,0,0,1,.045-.038l.221-.032.1-.2a.058.058,0,0,1,.1,0l.1.2.221.032a.056.056,0,0,1,.045.038A.055.055,0,0,1,627.552-194.423Z" transform="translate(589.469 670)" fill="#ffcd35"/>
                              </g>
                            </svg>
                            <span><?php echo earnPointsVideo($userID,'course_points',$courseID); ?></span>
                        </span>
                    </div>
                </div>
                <div class="title">
                    <span class="section-title">Engagement Points</span>
                    <span class="count red"><?php echo $engagement_points; ?></span>
                </div>
                <div class="points engagement">
                    <div class="column">
                        <span class="copy">Social Media Sharing</span>
                        <span class="number">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1.239 1.239">
                              <g id="Group_15992" data-name="Group 15992" transform="translate(-1216 -475)">
                                <circle id="Ellipse_1821" data-name="Ellipse 1821" cx="0.551" cy="0.551" r="0.551" transform="translate(1216 475.061)" fill="#fff"/>
                                <path id="Path_30137" data-name="Path 30137" d="M627.15-195a.619.619,0,0,0-.619.619.619.619,0,0,0,.619.619.619.619,0,0,0,.619-.619A.619.619,0,0,0,627.15-195Zm.4.577-.16.156.038.22a.056.056,0,0,1-.022.054.055.055,0,0,1-.059,0l-.2-.1-.2.1a.056.056,0,0,1-.059,0,.057.057,0,0,1-.022-.054l.038-.22-.16-.156a.055.055,0,0,1-.014-.057.056.056,0,0,1,.045-.038l.221-.032.1-.2a.058.058,0,0,1,.1,0l.1.2.221.032a.056.056,0,0,1,.045.038A.055.055,0,0,1,627.552-194.423Z" transform="translate(589.469 670)" fill="#ffcd35"/>
                              </g>
                            </svg>
                            <span><?php echo earnPointsLogReg($userID,'social_sharing'); ?></span>
                        </span>
                    </div>
                    <div class="column">
                        <span class="copy">Daily Login</span>
                        <span class="number">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1.239 1.239">
                              <g id="Group_15992" data-name="Group 15992" transform="translate(-1216 -475)">
                                <circle id="Ellipse_1821" data-name="Ellipse 1821" cx="0.551" cy="0.551" r="0.551" transform="translate(1216 475.061)" fill="#fff"/>
                                <path id="Path_30137" data-name="Path 30137" d="M627.15-195a.619.619,0,0,0-.619.619.619.619,0,0,0,.619.619.619.619,0,0,0,.619-.619A.619.619,0,0,0,627.15-195Zm.4.577-.16.156.038.22a.056.056,0,0,1-.022.054.055.055,0,0,1-.059,0l-.2-.1-.2.1a.056.056,0,0,1-.059,0,.057.057,0,0,1-.022-.054l.038-.22-.16-.156a.055.055,0,0,1-.014-.057.056.056,0,0,1,.045-.038l.221-.032.1-.2a.058.058,0,0,1,.1,0l.1.2.221.032a.056.056,0,0,1,.045.038A.055.055,0,0,1,627.552-194.423Z" transform="translate(589.469 670)" fill="#ffcd35"/>
                              </g>
                            </svg>
                            <span><?php echo earnPointsLogReg($userID,'logging_in'); ?></span>
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9.755 9.755">
                            <path id="Subtraction_2" data-name="Subtraction 2" d="M-665.755,7.308a.676.676,0,0,1-.486-.213c-.334-.344-.679-.687-1.012-1.019l0,0-.455-.453a.63.63,0,0,1,0-.917.8.8,0,0,1,.375-.256.739.739,0,0,1,.179-.023.59.59,0,0,1,.423.178c.247.242.494.491.734.733l.19.191a.224.224,0,0,1,.023.032l.018.027.27-.266.007-.007c.145-.143.287-.282.427-.423l1.135-1.135.029-.029.575-.575a.641.641,0,0,1,.452-.194.646.646,0,0,1,.456.2l.026.025a.845.845,0,0,1,.2.255.625.625,0,0,1-.126.707q-.846.85-1.695,1.7l-.014.014-.408.408-.258.256c-.193.191-.392.388-.581.586A.66.66,0,0,1-665.755,7.308Z" transform="translate(670 0)" fill="#fff"/>
                            <g id="Group_18962" data-name="Group 18962" transform="translate(0 0)">
                            <path id="Path_30445" data-name="Path 30445" d="M2657.384,1614.088a4.877,4.877,0,1,1,4.879-4.874A4.879,4.879,0,0,1,2657.384,1614.088Zm-.65-4.172a.478.478,0,0,0-.041-.059c-.307-.308-.613-.619-.923-.924a.6.6,0,0,0-.6-.156.8.8,0,0,0-.375.256.628.628,0,0,0,0,.918c.491.492.988.978,1.471,1.477a.653.653,0,0,0,.964,0c.273-.286.558-.561.838-.841q1.058-1.059,2.117-2.118a.624.624,0,0,0,.126-.707.943.943,0,0,0-.226-.28.626.626,0,0,0-.908,0q-.87.87-1.74,1.74C2657.21,1609.449,2656.979,1609.674,2656.734,1609.916Z" transform="translate(-2652.508 -1604.333)" fill="#06ea8c"/>
                            </g>
                            </svg> -->
                        </span>
                    </div>
                    <div class="column">
                        <span class="copy">Registration</span>
                        <span class="number">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1.239 1.239">
                              <g id="Group_15992" data-name="Group 15992" transform="translate(-1216 -475)">
                                <circle id="Ellipse_1821" data-name="Ellipse 1821" cx="0.551" cy="0.551" r="0.551" transform="translate(1216 475.061)" fill="#fff"/>
                                <path id="Path_30137" data-name="Path 30137" d="M627.15-195a.619.619,0,0,0-.619.619.619.619,0,0,0,.619.619.619.619,0,0,0,.619-.619A.619.619,0,0,0,627.15-195Zm.4.577-.16.156.038.22a.056.056,0,0,1-.022.054.055.055,0,0,1-.059,0l-.2-.1-.2.1a.056.056,0,0,1-.059,0,.057.057,0,0,1-.022-.054l.038-.22-.16-.156a.055.055,0,0,1-.014-.057.056.056,0,0,1,.045-.038l.221-.032.1-.2a.058.058,0,0,1,.1,0l.1.2.221.032a.056.056,0,0,1,.045.038A.055.055,0,0,1,627.552-194.423Z" transform="translate(589.469 670)" fill="#ffcd35"/>
                              </g>
                            </svg>
                            <span><?php echo earnPointsLogReg($userID,'registration'); ?></span>
                        </span>
                    </div>
                    <div class="column">
                        <span class="copy">Referral Registration</span>
                        <span class="number">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1.239 1.239">
                              <g id="Group_15992" data-name="Group 15992" transform="translate(-1216 -475)">
                                <circle id="Ellipse_1821" data-name="Ellipse 1821" cx="0.551" cy="0.551" r="0.551" transform="translate(1216 475.061)" fill="#fff"/>
                                <path id="Path_30137" data-name="Path 30137" d="M627.15-195a.619.619,0,0,0-.619.619.619.619,0,0,0,.619.619.619.619,0,0,0,.619-.619A.619.619,0,0,0,627.15-195Zm.4.577-.16.156.038.22a.056.056,0,0,1-.022.054.055.055,0,0,1-.059,0l-.2-.1-.2.1a.056.056,0,0,1-.059,0,.057.057,0,0,1-.022-.054l.038-.22-.16-.156a.055.055,0,0,1-.014-.057.056.056,0,0,1,.045-.038l.221-.032.1-.2a.058.058,0,0,1,.1,0l.1.2.221.032a.056.056,0,0,1,.045.038A.055.055,0,0,1,627.552-194.423Z" transform="translate(589.469 670)" fill="#ffcd35"/>
                              </g>
                            </svg>
                            <span><?php echo earnPointsLogReg($userID,'referral_registration_payment'); ?></span>
                        </span>
                    </div>
                    <div class="column">
                        <span class="copy">Onboarding Points</span>
                        <span class="number">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1.239 1.239">
                              <g id="Group_15992" data-name="Group 15992" transform="translate(-1216 -475)">
                                <circle id="Ellipse_1821" data-name="Ellipse 1821" cx="0.551" cy="0.551" r="0.551" transform="translate(1216 475.061)" fill="#fff"/>
                                <path id="Path_30137" data-name="Path 30137" d="M627.15-195a.619.619,0,0,0-.619.619.619.619,0,0,0,.619.619.619.619,0,0,0,.619-.619A.619.619,0,0,0,627.15-195Zm.4.577-.16.156.038.22a.056.056,0,0,1-.022.054.055.055,0,0,1-.059,0l-.2-.1-.2.1a.056.056,0,0,1-.059,0,.057.057,0,0,1-.022-.054l.038-.22-.16-.156a.055.055,0,0,1-.014-.057.056.056,0,0,1,.045-.038l.221-.032.1-.2a.058.058,0,0,1,.1,0l.1.2.221.032a.056.056,0,0,1,.045.038A.055.055,0,0,1,627.552-194.423Z" transform="translate(589.469 670)" fill="#ffcd35"/>
                              </g>
                            </svg>
                            <span><?php echo $onboarding_points; ?></span>
                        </span>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade about-popup points_system" id="total_earn_info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Point System</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="21.657" height="21.657" viewBox="0 0 21.657 21.657">
                          <g id="Group_8" data-name="Group 8" transform="translate(-1045.728 -811.172)">
                            <line id="Line_2" data-name="Line 2" x1="16" y2="16" transform="translate(1048.556 814)" fill="none" stroke="#373737" stroke-linecap="round" stroke-width="4"></line>
                            <line id="Line_3" data-name="Line 3" x2="16" y2="16" transform="translate(1048.556 814)" fill="none" stroke="#373737" stroke-linecap="round" stroke-width="4"></line>
                          </g>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>Points will be awarded for every student interaction. They are divided into two types.
                            <ul>
                                <li>Engagement Points:
                                    <ul>
                                        <li>Registration – On successful registration</li>
                                        <li>Payment – On successful payment</li>
                                        <li>Referral Registration – On successfully registration using your referral code</li>
                                        <li>School ID Upload – On successfully uploading your School ID to your profile</li>
                                        <li>Photo Upload - On successfully uploading your photograph to your profile</li>
                                        <li>Social Sharing – For every Social sharing</li>
                                        <li>Everyday Login – For Regular login on the Codeathon website</li>
                                        <li>Project upload – On successfully uploading project file</li>
                                    </ul>
                                </li>
                                <li>Intellectual Points:
                                    <ul>
                                        <li>Video Watch – On watching video lectures</li>
                                        <li>Video Quiz – Score obtained on video quizzes</li>
                                        <li>Chapter Quiz – Score obtained on Chapter quizzes</li>
                                        <li>Course Quiz – Score obtained on Course quizzes</li>
                                        <li>Qualifier – Score obtained on Qualifier quiz</li>
                                    </ul>
                                </li>
                            </ul>
                            <li>A student will qualify for the Codeathon Finale on the basis of the points they have acquired during the entire program.</li>
                            <li>The top 100 students from each zone and each category will be selected based on their performance in the qualifier and the total score.</li>
                            <li>The finalists will be chosen based on their overall performance and points collected till the end of the qualifiers.</li>
                            <li>Details of the point system will be provided to each student through their personal dashboard.</li>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<span class="overlay"></span>

<script type="text/javascript">
jQuery(document).ready(function(){
    
    jQuery('.course-filter-wrapper').remove();
    jQuery('.page-template-event-dashboard #footer.new-footer').remove();
    jQuery('#wplms-customizer-css2-css').remove();

    jQuery('.course_section_link').click(function(){
        jQuery('.the_course_button .course_button ').trigger('click');
    })
})
</script>
<!-- Modal -->
<div class="modal fade about-popup" id="learning_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Learning</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" width="21.657" height="21.657" viewBox="0 0 21.657 21.657">
              <g id="Group_8" data-name="Group 8" transform="translate(-1045.728 -811.172)">
                <line id="Line_2" data-name="Line 2" x1="16" y2="16" transform="translate(1048.556 814)" fill="none" stroke="#373737" stroke-linecap="round" stroke-width="4"></line>
                <line id="Line_3" data-name="Line 3" x2="16" y2="16" transform="translate(1048.556 814)" fill="none" stroke="#373737" stroke-linecap="round" stroke-width="4"></line>
              </g>
            </svg>
        </button>
      </div>
      <div class="modal-body">
        <ul>
            <li>The course content will comprise the following elements:
                <ol>
                    <li>Multiple Chapters: The course is divided into multiple chapters.</li>
                    <li>Video Content: These will be self-paced learning modules (Video and Text content).</li>
                    <li>Video Quizzes: These will appear once the student completes a video.</li>
                    <li>Chapter Quizzes: These will appear at the end of every chapter.</li>
                    <li>Course Quiz: This will appear at the end of the course.</li>
                </ol>
            </li>
            <li>To reach the Qualifiers, a student needs to complete all the Videos, Video Quizzes, Chapter Quizzes and the Course Quiz.</li>
        </ul>
      </div>
      
    </div>
  </div>
</div>
<?php
  get_footer(vibe_get_footer());
?>
<?php include("includes/footer.php"); ?>