<?php 

function leadeboardList($courseID,$zone){

    global $wpdb;
    $table_name = "ht_mycred_log";
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
      $my_cred_table = 'ht_mycred_log';
    }
    else{
      $my_cred_table = 'ht_myCRED_log';
    }


    $resultsZone = $wpdb->get_results("SELECT `id` FROM `ht_bp_xprofile_fields` WHERE `name` = 'Event Zone'");
    foreach($resultsZone as $rowZone){ 
        $zonePriID = $rowZone->id; 
    }

    $sql = "SELECT posts.post_title AS course,posts.ID AS course_id,umeta.user_id AS user_id,users.display_name
            FROM ht_usermeta AS umeta
            LEFT JOIN ht_posts AS posts ON umeta.meta_key = posts.ID
            LEFT JOIN ht_users AS users ON users.Id = umeta.user_id
            LEFT JOIN ht_bp_xprofile_data AS xprofile ON xprofile.user_id = umeta.user_id
            WHERE   posts.post_type     = 'course'
            AND     posts.post_status   = 'publish'
            AND posts.ID = '$courseID'
            AND xprofile.value = '$zone' 
            AND xprofile.field_id = '$zonePriID' 
            AND     umeta.meta_key REGEXP '^[0-9]+$'
            ORDER BY umeta.user_id DESC";

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
    
    $user_rank = array();

    foreach($leaderboard_result as $key => $csm)
    {
       
        if($leaderboard_result[$key]->user_id == $userID){
          $user_rank[] = $leaderboard_result[$key]->rank;
        }
    }

    foreach($leaderboard_result as $user_rank_data){

        if($user_rank_data->rank <= 10){

            $resultsSchool = $wpdb->get_results("SELECT `id` FROM `ht_bp_xprofile_fields` WHERE `name` = 'Linked School'");
            foreach($resultsSchool as $rowSchool){ 
                $schoolPriID = $rowSchool->id; 
            }

            $resultsSchool = $wpdb->get_results("SELECT `value` FROM `ht_bp_xprofile_data` WHERE `user_id` = '$user_rank_data->user_id' AND `field_id` = '$schoolPriID'");
            foreach($resultsSchool as $rowSchool){ 
                $schoolID = $rowSchool->value; 
            }

            $user_school_name = get_user_by('id', $schoolID)->display_name;

            echo '<li>
                    <span class="serial-number">'.$user_rank_data->rank.'</span>
                    <div class="student-profile">
                        <!--<img src="https://randomuser.me/api/portraits/women/8.jpg">-->';
                        echo bp_core_fetch_avatar(array('item_id' => $user_rank_data->user_id));
                        echo '<div class="copy">
                            <span class="name">'.get_user_meta($user_rank_data->user_id,'first_name',true).' '.get_user_meta($user_rank_data->user_id,'last_name',true).'</span>
                            <span class="school">'.$user_school_name.'</span>
                        </div>
                    </div>
                    <div class="school-profile">
                        <!--<img src="https://uilogos.co/img/logomark/earth.png">-->
                        <div class="copy">
                            <span class="school">'.$user_school_name.'</span>
                        </div>
                    </div>
                    <div class="zone">'.ucfirst($zone).'</div>
                    <div class="points">'.$user_rank_data->points.'</div>
                </li>';

        }else{

            break;
            
        }
        
    }

}
?>