<?php

/**
 * WPLMS- DASHBOARD TEMPLATE
 */

if ( !defined( 'ABSPATH' ) ) exit;

if(!is_user_logged_in()){
    wp_redirect(home_url(),'302');
}

get_header( vibe_get_header() ); 

$profile_layout = vibe_get_customizer('profile_layout');
$user_id= get_current_user_id();
$user = new WP_User( $user_id );
$user_role=strval( wp_sprintf_l( '%l', $user->roles ));

if($user_role=='instructor'){

    $profile_layout = 'blank';
}
$user = wp_get_current_user();

vibe_include_template("profile/top$profile_layout.php"); 

?>

<div class="wplms-dashboard row">
    <div class="col-sm-12 dashboard-info">
        <div class="col-sm-12 col-md-3 mrg">
            <div class="left-listing">
                <div class="tab">
  <button class="tablinks active" id="Event" onclick="CouseEvent(event, 'Events')">Events</button>
  <button class="tablinks" id="Course" onclick="CouseEvent(event, 'Courses')">Courses</button>
</div>

<div id="Events" class="tabcontents Events">
    <ul class="mobile-slider scroll">
                    <?php global $wpdb;    
                    $user = wp_get_current_user();
                        $query = apply_filters('wplms_usermeta_direct_query',$wpdb->prepare("SELECT DISTINCT posts.post_title AS course,posts.ID AS course_id FROM ht_posts AS posts LEFT JOIN ht_postmeta AS rel ON posts.ID = rel.post_id WHERE posts.post_type = 'course' AND posts.post_status = 'publish' AND rel.meta_key REGEXP '^[0-9]+$' AND rel.meta_key = '".$user->ID."' ORDER BY rel.meta_key"));
                        $result = $wpdb->get_results($query);
                        
                        foreach($result as $course){
                            $args['post__in'][]=$course->course_id;
                        }
                        $query_args = apply_filters('wplms_mycourses',array(
                            'post_type'=>'course',
                            'post__in'=>$args['post__in'],
                            'post_status' => 'publish',
                            'order' =>'ASC',
                            'posts_per_page' =>100,
                            /*'meta_query' => array(
                              'relation' => 'AND',
                              array(
                                'key' => 'vibe_leader_board',
                                'value' => 'Yes',
                                'comapare' => '='
                                )  
                              )*/
                            'meta_query' => array(
                              'relation' => 'AND',
                              array(
                                'key' => 'vibe_course_event',
                                'value' => '1',
                                'comapare' => '='
                                )  
                              )   
                        ));

                        $course_query = new WP_Query($query_args);


                        global $bp,$wpdb;
                        while($course_query->have_posts()){
                        $course_query->the_post();
                        global $post;
                        
                    ?>
                    <li class="item edashboard-li" value="<?php echo get_the_ID();?>">
                        <input type="hidden" class="course_id" >
                        <a href="#">
                            <div class="col-xs-3 col-sm-3 col-md-3 mrg">
                                <?php 
                                if ( has_post_thumbnail() ) { 
                                  $image_url = get_the_post_thumbnail_url();
                                }
                              ?>
                             <img src="<?php echo $image_url; ?>" class="img-fluid">
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9 mrg">
                                <!-- <h4><?php bp_course_title();?></h4> -->
                                <h4><?php echo $post->post_title?></h4>
                            </div>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
</div>

<div id="Courses" class="tabcontents" style="display:none;">
  <ul class="mobile-slider scroll">
                    <?php global $wpdb;    
                    $user = wp_get_current_user();
                        $query = apply_filters('wplms_usermeta_direct_query',$wpdb->prepare("SELECT DISTINCT posts.post_title AS course,posts.ID AS course_id FROM ht_posts AS posts LEFT JOIN ht_postmeta AS rel ON posts.ID = rel.post_id WHERE posts.post_type = 'course' AND posts.post_status = 'publish' AND rel.meta_key REGEXP '^[0-9]+$' AND rel.meta_key = '".$user->ID."' ORDER BY rel.meta_key"));
                        $result = $wpdb->get_results($query);
                        
                        foreach($result as $course){
                            $args['post__in'][]=$course->course_id;
                        }
                        $query_args = apply_filters('wplms_mycourses',array(
                            'post_type'=>'course',
                            'post__in'=>$args['post__in'],
                            'post_status' => 'publish',
                            'order' =>'ASC',
                            'posts_per_page' =>100,
                            'meta_query' => array(
                              'relation' => 'AND',
                              array(
                                'key' => 'vibe_leader_board',
                                'value' => 'Yes',
                                'comapare' => '='
                                )  
                              )
                           
                        ));

                        $course_query = new WP_Query($query_args);

                        global $bp,$wpdb;
                        while($course_query->have_posts()){
                        $course_query->the_post();
                        global $post;
                        
                    ?>
                    <li class="item dashboard-li" value="<?php echo get_the_ID();?>">
                        <input type="hidden" class="course_id" >
                        <a href="#">
                            <div class="col-xs-3 col-sm-3 col-md-3 mrg">
                                <?php 
                                if ( has_post_thumbnail() ) { 
                                  $image_url = get_the_post_thumbnail_url();
                                }
                              ?>
                             <img src="<?php echo $image_url; ?>" class="img-fluid">
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9 mrg">
                                <!-- <h4><?php bp_course_title();?></h4> -->
                                <h4><?php echo $post->post_title?></h4>
                            </div>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
</div>


            </div>
        </div>
        <div class="col-sm-12 col-md-6 mrg">
            <div class="middle-table">
                <div id="user_rank">
                        
                </div>
                <table class="table table-responsive" id="myTable">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Participant</th>
                            <th>Points</th>
                        </tr>
                    </thead>
                    <tbody id="data">
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-12 col-md-3 mrg">
            <div class="right-details">
                <h2>Top Rankers</h2>
                <ul id="top_rankers">
                </ul>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        (function($) {
           $(document).ready(function() {
                /* Select link with an id of first and a class of big.*/
                var course_id = $("ul .edashboard-li:first").val();
                $("ul .edashboard-li:first").addClass("active");
                getScore(course_id);
                getRank(course_id);
                getUserRank(course_id);
            }); 
            $('.edashboard-li').click(function(e){
              e.preventDefault();
                $('.mobile-slider li').removeClass("active");
                $(this).addClass("active");
              var course_id = $(this).val();
              getScore(course_id);
              getRank(course_id);
              getUserRank(course_id);
            })
            $('#Event').click(function(e){
             
               e.preventDefault();
                var course_id = $("ul .edashboard-li:first").val();
                $("ul .edashboard-li:first").addClass("active");
              getScore(course_id);
              getRank(course_id);
              getUserRank(course_id);
            })
             
            $('.dashboard-li').click(function(e){
              e.preventDefault();
                $('.mobile-slider li').removeClass("active");
                $(this).addClass("active");
              var course_id = $(this).val();
              getScore(course_id);
              getRank(course_id);
              getUserRank(course_id);
            })

            $('#Course').click(function(e){
              
               e.preventDefault();
                $('.mobile-slider li').removeClass("active");
                var course_id = $("ul .dashboard-li:first").val();
                $("ul .dashboard-li:first").addClass("active");
              getScore(course_id);
              getRank(course_id);
              getUserRank(course_id);
                
            })
            

            function getScore(course_id){
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
                        data: {"action": "load-filter", course_id: course_id },
                        success: function(response) {
                            if(response.length > 0){
                                $('#data').html(response);
                            }
                        }
                    });
                }

            function getUserRank(course_id){
                            $.ajax({
                                type: 'POST',
                                url: "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
                                data: {"action": "get_user_rank", course_id: course_id },
                                success: function(response) {
                                    if(response.length > 0){
                                        $('#user_rank').html(response);
                                    }
                                }
                            });
                        }


            function getRank(course_id){
                $.ajax({
                    type: 'POST',
                    url: "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
                    data: {"action": "get-rank", course_id: course_id },
                    success: function(response) {
                        if(response.length > 0){
                            $('#top_rankers').html(response);
                        }
                    }
                });
            }

        })( jQuery );

function CouseEvent(evt, CouseEventName) {
  var i, tabcontents, tablinks;
  tabcontents = document.getElementsByClassName("tabcontents");
  for (i = 0; i < tabcontents.length; i++) {
    tabcontents[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(CouseEventName).style.display = "block";
  evt.currentTarget.className += " active";
}

    </script>
    <?php do_action( 'bp_before_dashboard_body' ); ?>
    <?php
        /*if(current_user_can('edit_posts')){
            $sidebar = apply_filters('wplms_instructor_sidebar','instructor_sidebar');
            if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : endif; 
        }else{
            $sidebar = apply_filters('wplms_student_sidebar','student_sidebar');
            if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : endif; 
        }*/
    ?>
    <?php do_action( 'bp_after_dashboard_body' ); ?>
</div>  <!-- .wplms-dashbaord -->
<?php

vibe_include_template("profile/bottom.php");  

get_footer( vibe_get_footer() );