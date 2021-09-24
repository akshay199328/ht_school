<?php
/**
 * Template Name: All Courses page
 */
if ( !defined( 'ABSPATH' ) ) exit;

get_header(vibe_get_header());
?>
<main id="main">
  <!-- <section class="breadcrumbs background-breadcrumbs">
      <div class="innerheader-space"></div>
      <div class="container">
        <?php
          $breadcrumbs=get_post_meta($id,'vibe_breadcrumbs',true);
            if(!isset($breadcrumbs) || !$breadcrumbs || vibe_validate($breadcrumbs)){
                vibe_breadcrumbs();
            }
        ?>
      </div>
    </section> -->
<div class="owl-carousel owl-theme course_listing_slider" >
  <?php
    $args1 = array(
      'post_type' => 'banner',
      'post_status' => 'publish',
      'orderby' => 'publish_date',
      'order' => 'DESC',      
      'nopaging' => true
    );
    $Query1 = new WP_Query( $args1 );

    if ($Query1->have_posts()) : while ($Query1->have_posts()) : $Query1->the_post();
      $custom_fields = get_post_custom();
      $image_url = wp_get_attachment_url($custom_fields['banner_image'][0]);
      $mobile_image = wp_get_attachment_url($custom_fields['mobile_image'][0]);
      ?>
    <div class="item">
        <img src="<?php echo $image_url; ?>">
        <div class="caption">
            <h2 class="slider-title"><?php echo $custom_fields['banner_title'][0];?></h3>
            <?php $sub_title = $custom_fields['banner_sub_title'][0]; if($sub_title != '') { ?>
          <?php } ?>
            <a class="main-button" href="<?php echo $custom_fields['cta_link'][0];?>" target="_blank"><?php echo $custom_fields['cta_text'][0];?></a>
        </div>
    </div>
  <?php endwhile;endif; ?>
</div>
    <?php 
        $user = wp_get_current_user();
        $session_array = array(array("name"=>"1 - 10 Sessions",
          "value"=>"1,10"),
          array("name"=>"11 - 20 Sessions",
          "value"=>"11,20"),
          array("name"=>"21 - 30 Sessions",
          "value"=>"21,30"),
          array("name"=>"31+ Sessions",
          "value"=>"31"),
        );
        $i = 0;
            if(isset($_GET['session'])){
              $get_session = $_GET['session'];
            }
            if(isset($_GET['session'])){
              $session_selected_array = array();
              $get_session = $_GET['session'];
              $selected_session = explode(",",$get_session);
              if(count($selected_session) == 1 ){
                $sessionFirstEle = $selected_session[0];
                $session_selected_array['0'] =  $sessionFirstEle;
              }
              else if(count($selected_session) == 2 ){
                $sessionFirstEle = $selected_session[0];
                $sessionSecondEle = $selected_session[1];
                $session_selected_array['0'] =  $sessionFirstEle.','.$sessionSecondEle;
              }
              else if(count($selected_session) == 3 ){
                $sessionFirstEle = $selected_session[0];
                $sessionSecondEle = $selected_session[1];
                $sessionThirdEle = $selected_session[2];
                $session_selected_array['0'] =  $sessionFirstEle.','.$sessionSecondEle;
                $session_selected_array['1'] =  $sessionThirdEle;
              }
              else if(count($selected_session) == 4){
                $sessionFirstEle = $selected_session[0];
                $sessionSecondEle = $selected_session[1];
                $sessionThirdEle = $selected_session[2];
                $sessionFourthEle = $selected_session[3];
                $session_selected_array['0'] =  $sessionFirstEle.','.$sessionSecondEle;
                $session_selected_array['1'] =  $sessionThirdEle.','.$sessionFourthEle;
              }
              else if(count($selected_session) == 5){
                $sessionFirstEle = $selected_session[0];
                $sessionSecondEle = $selected_session[1];
                $sessionThirdEle = $selected_session[2];
                $sessionFourthEle = $selected_session[3];
                $sessionFifthEle = $selected_session[4];
                $session_selected_array['0'] =  $sessionFirstEle.','.$sessionSecondEle;
                $session_selected_array['1'] =  $sessionThirdEle.','.$sessionFourthEle;
                $session_selected_array['2'] =  $sessionFifthEle;
              }
              else if(count($selected_session) == 6){
                $sessionFirstEle = $selected_session[0];
                $sessionSecondEle = $selected_session[1];
                $sessionThirdEle = $selected_session[2];
                $sessionFourthEle = $selected_session[3];
                $sessionFifthEle = $selected_session[4];
                $sessionSixthEle = $selected_session[5];
                $session_selected_array['0'] =  $sessionFirstEle.','.$sessionSecondEle;
                $session_selected_array['1'] =  $sessionThirdEle.','.$sessionFourthEle;
                $session_selected_array['2'] =  $sessionFifthEle.','.$sessionSixthEle;
              }
              else if(count($selected_session) == 7){
                $sessionFirstEle = $selected_session[0];
                $sessionSecondEle = $selected_session[1];
                $sessionThirdEle = $selected_session[2];
                $sessionFourthEle = $selected_session[3];
                $sessionFifthEle = $selected_session[4];
                $sessionSixthEle = $selected_session[5];
                $sessionSeventhEle = $selected_session[6];
                $session_selected_array['0'] =  $sessionFirstEle.','.$sessionSecondEle;
                $session_selected_array['1'] =  $sessionThirdEle.','.$sessionFourthEle;
                $session_selected_array['2'] =  $sessionFifthEle.','.$sessionSixthEle;
                $session_selected_array['3'] =  $sessionSeventhEle;
              }
            }
        $age_array = array(array("name"=>"3 - 7 Years",
          "value"=>"3,7"),
          array("name"=>"8 - 11 Years",
          "value"=>"8,11"),
          array("name"=>"12 - 16 Years",
          "value"=>"12,16"),
          array("name"=>"17+ Years",
          "value"=>"17"),
        );
        $args = apply_filters('wplms_course_nav_cats',array(
          'taxonomy'=>'course-cat',
          'hide_empty'=>false,
          'hierarchial'=>1,
        ));

        $course_category_array = get_terms($args);
        $course_category = json_decode( json_encode($course_category_array), true);
    ?>
        <div class="course_main_wrapper">
        <div class="filter-overlay">
            <button class="filter-button">Filters</button>
        </div>
        <div class="filter-wrapper">
            <div class="filter-header">
                <span class="title">Filter By</span>
                <button class="reset" id="reset">Reset</button>
            </div>
            <div class="section">
                <span class="title">Session</span>
                <div class="copy">
                <?php foreach($session_array as $sessions){
                    if( $session_selected_array && in_array( $sessions['value'], $session_selected_array ) ){
                        $session_selected = 'checked';
                    }
                    else{
                        $session_selected = '';
                    }
                ?>
                    <label for="session<?php echo $i;?>" id="session_filter">
                        <span><?php echo $sessions['name']?></span>
                        <input type="checkbox" name="sessions" class="sessions" id="session<?php echo $i;?>" value="<?php echo $sessions['value']?>" <?php echo $session_selected;?>>
                    </label>
                <?php $i++; } ?>
                </div>
            </div>
            <div class="section">
                <span class="title">Age</span>
                <?php
            $age_array = array(array("name"=>"3 - 7 Years",
              "value"=>"3,7"),
              array("name"=>"8 - 11 Years",
              "value"=>"8,11"),
              array("name"=>"12 - 16 Years",
              "value"=>"12,16"),
              array("name"=>"17+ Years",
              "value"=>"17"),
            );
            $i = 0;
            if(isset($_GET['age'])){
              $age_selected_array = array();
              $get_age = $_GET['age'];
              $selected_age = explode(",",$get_age);
              if(count($selected_age) == 1 ){
                $ageFirstEle = $selected_age[0];
                $age_selected_array['0'] =  $ageFirstEle;
              }
              else if(count($selected_age) == 2 ){
                $ageFirstEle = $selected_age[0];
                $ageSecondEle = $selected_age[1];
                $age_selected_array['0'] =  $ageFirstEle.','.$ageSecondEle;
              }
              else if(count($selected_age) == 3 ){
                $ageFirstEle = $selected_age[0];
                $ageSecondEle = $selected_age[1];
                $ageThirdEle = $selected_age[2];
                $age_selected_array['0'] =  $ageFirstEle.','.$ageSecondEle;
                $age_selected_array['1'] =  $ageThirdEle;
              }
              else if(count($selected_age) == 4){
                $ageFirstEle = $selected_age[0];
                $ageSecondEle = $selected_age[1];
                $ageThirdEle = $selected_age[2];
                $ageFourthEle = $selected_age[3];
                $age_selected_array['0'] =  $ageFirstEle.','.$ageSecondEle;
                $age_selected_array['1'] =  $ageThirdEle.','.$ageFourthEle;
              }
              else if(count($selected_age) == 5){
                $ageFirstEle = $selected_age[0];
                $ageSecondEle = $selected_age[1];
                $ageThirdEle = $selected_age[2];
                $ageFourthEle = $selected_age[3];
                $ageFifthEle = $selected_age[4];
                $age_selected_array['0'] =  $ageFirstEle.','.$ageSecondEle;
                $age_selected_array['1'] =  $ageThirdEle.','.$ageFourthEle;
                $age_selected_array['2'] =  $ageFifthEle;
              }
              else if(count($selected_age) == 6){
                $ageFirstEle = $selected_age[0];
                $ageSecondEle = $selected_age[1];
                $ageThirdEle = $selected_age[2];
                $ageFourthEle = $selected_age[3];
                $ageFifthEle = $selected_age[4];
                $ageSixthEle = $selected_age[5];
                $age_selected_array['0'] =  $ageFirstEle.','.$ageSecondEle;
                $age_selected_array['1'] =  $ageThirdEle.','.$ageFourthEle;
                $age_selected_array['2'] =  $ageFifthEle.','.$ageSixthEle;
              }
              else if(count($selected_age) == 7){
                $ageFirstEle = $selected_age[0];
                $ageSecondEle = $selected_age[1];
                $ageThirdEle = $selected_age[2];
                $ageFourthEle = $selected_age[3];
                $ageFifthEle = $selected_age[4];
                $ageSixthEle = $selected_age[5];
                $ageSeventhEle = $selected_age[6];
                $age_selected_array['0'] =  $ageFirstEle.','.$ageSecondEle;
                $age_selected_array['1'] =  $ageThirdEle.','.$ageFourthEle;
                $age_selected_array['2'] =  $ageFifthEle.','.$ageSixthEle;
                $age_selected_array['3'] =  $ageSeventhEle;
              }
            }
            
          ?>
                <div class="copy">
                <?php
                    foreach($age_array as $age){
                    if( $age_selected_array && in_array( $age['value'], $age_selected_array ) ){
                        $age_selected = 'checked';
                    }
                    else{
                        $age_selected = '';
                    } 
                ?>
                    <label for="age<?php echo $i;?>" id="age_filter">
                        <span><?php echo $age['name']?></span>
                        <input type="checkbox" name="age" id="age" class="age" value="<?php echo $age['value']?>" <?php echo $age_selected;?>>
                    </label>
                <?php $i++; } ?>
                </div>
            </div>
            <div class="section">
                <span class="title">Course categories</span>
                <div class="copy">
                    <?php
                        $i = 0;
                        if(isset($_GET['category'])){
                            $get_category = $_GET['category'];
                        }
                        $selected_category = explode(",",$get_category);
                        foreach($course_category as $category){
                        if(in_array($category['term_id'],$selected_category)){
                          $category_selected = 'checked';
                        }
                        else{
                          $category_selected = '';
                        } 
                    ?>
                    <label for="category<?php echo $i;?>" id="category_filter">
                        <span><?php echo $category['name']?></span>
                        <input type="checkbox" name="category" class="category" value="<?php echo $category['term_id'];?>" id="category<?php echo $i;?>" <?php echo $category_selected;?>>
                    </label>
                    <?php $i++;}?>
                </div>
            </div>
            <div class="filter-footer">
                <button type="submit" id="cancel_filters">Cancel</button>
                <button type="submit" id="apply_filters">Apply</button>
            </div>
        </div>
        <div class="all-courses">
            <div class="header">
                <h3 class="all-courses-title">All Our Courses</h3>
                <div class="sort">
                    Sort by : <select id="sort_by">
                        <option value="">Select</option>
                        <option value="popular" <?php if(isset($_GET['sort_by']) && $_GET['sort_by'] == "popular") echo 'selected="selected"';?>>Most Popular</option>
                        <option value="rated" <?php if(isset($_GET['sort_by']) && $_GET['sort_by'] == "rated") echo 'selected="selected"';?>>Highest Rated</option>
                        <option value="newest" <?php if(isset($_GET['sort_by']) && $_GET['sort_by'] == "newest") echo 'selected="selected"';?>>Newly Added</option>
                    </select>
                </div>
            </div>
            <div class="filter-tags" id="filter-tags">
                <?php 
                    foreach($age_array as $age){
                    if( $age_selected_array && in_array( $age['value'], $age_selected_array ) ){
                ?>
                <span class="tag"><?php echo $age['name']?><button class="close close-tag" type="submit" data-id="<?php echo $age['value']?>"></button></span>
                <?php }} ?>
                <?php 
                    if( isset($_GET['sort_by']) ){
                ?>
                <span class="tag"><?php echo $_GET['sort_by'];?><button class="close" id="close-sort-tag" type="submit" ></button></span>
                <?php } 
                foreach($session_array as $sessions){
                    if( $session_selected_array && in_array( $sessions['value'], $session_selected_array ) ){
                ?>
                <span class="tag"><?php echo $sessions['name']?><button class="close close-tag" type="submit" data-id="<?php echo $sessions['value']?>"></button></span>
            <?php }}
                foreach($course_category as $category){
                    if(in_array($category['term_id'],$selected_category)){
             ?>
             <span class="tag"><?php echo $category['name']?><button class="close close-tag" type="submit" data-id="<?php echo $category['term_id'];?>"></button></span>
            <?php }} ?>
            </div>
            <div class="course-wrapper" id="course-wrapper">
                
                <?php
                    $users_courses = array();
                    if(isset($user->ID) && $user->ID > 0)
                    {
                      $userIdentifier = $user->ID;
                      $courses_with_types = apply_filters('wplms_usermeta_direct_query',$wpdb->prepare("SELECT posts.ID as id FROM {$wpdb->posts} AS posts LEFT JOIN {$wpdb->usermeta} AS meta ON posts.ID = meta.meta_key WHERE   posts.post_type   = %s AND   posts.post_status   = %s AND   meta.user_id   = %d",'course','publish',$user->ID));
                        $result = $wpdb->get_results($courses_with_types);

                        foreach($result as $course){
                          $users_courses[]=$course->id;
                        }
                    }
                  $featured_args_course = array(
                    'post_type' => 'course',
                    'post_status' => 'publish',
                    'meta_query'  => array(
                    'relation'  => 'AND',
                    'nopaging' => true,
                    array(
                      'key'   =>'featured',
                      'value'   => 1,
                      'compare' => '='
                      )
                    )
                  );
                  $featured_query_course = new WP_Query( $featured_args_course );
                  $course_id = array();
                  if ($featured_query_course->have_posts()) : while ($featured_query_course->have_posts()) : $featured_query_course->the_post();
                    $course_id[] = $post->ID;
                  endwhile;
                  endif;
                  $args_all_course = array(
                    'post_type' => 'course',
                    'post_status' => 'publish',
                    'nopaging' => true
                  );  
                  $all_course = new WP_Query( $args_all_course );
                  if ($all_course->have_posts()) : while ($all_course->have_posts()) : $all_course->the_post();
                    if (!in_array($post->ID, $course_id)){
                      $course_id[] = $post->ID;
                    }
                  endwhile;
                  endif;
                  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                  /*if(!empty($course_id)){
                    $query_args = apply_filters('wplms_mycourses',array(
                        'post_type'=>'course',
                        'post__in'=>$course_id,
                        'posts_per_page'=>8,
                        'orderby' => 'post__in', 
                        'paged'=>$paged,
                    ));

                    $wp_query = new WP_Query($query_args);
                  }*/
                  global $wpdb;
                  if (empty($_GET['sort_by']) && empty($_GET['session']) && empty($_GET['age']) && empty($_GET['category'])) {
                    if(!empty($course_id)){
                      $query_args = apply_filters('wplms_mycourses',array(
                          'post_type'=>'course',
                          'post__in'=>$course_id,
                          'post_status' => 'publish',
                          'nopaging' => true,
                          'orderby' => 'post__in', 
                          'meta_query'  => array(
                          'relation'  => 'AND',
                          array(
                            'key'   =>'vibe_course_event',
                            'value'   => '0',
                            'compare' => '='
                            )
                          )
                      ));

                      $wp_query = new WP_Query($query_args);
                    }
                  }
                  
                  if(isset($_GET['sort_by']) && empty($_GET['session']) && empty($_GET['age']) && empty($_GET['category'])){
                    $args=array('post_type' => 'course','post_status' => 'publish','nopaging' => true);
          
                    $sort_by = $_GET;
                      $filter = $sort_by['sort_by'];
                      switch($filter){
                        case 'popular':
                          $args['orderby'] = 'meta_value_num';
                          $args['meta_key'] = 'vibe_students';
                        break;
                        case 'newest':
                          $args['orderby'] = 'date';
                        break;
                        case 'rated':
                          $args['orderby'] = 'meta_value_num';
                          $args['meta_key'] = 'average_rating';
                        break;
                      }
                    $sortby_query = new WP_Query( $args );
                    $allcourse_id = array();
                    if ($sortby_query->have_posts()) : while ($sortby_query->have_posts()) : $sortby_query->the_post();
                      $allcourse_id[] = $post->ID;
                    endwhile;
                    endif;
                    $args_all_course = array(
                      'post_type' => 'course',
                      'post_status' => 'publish',
                      'order'=>'DESC',
                        'orderby' => 'publish_date',
                      'nopaging' => true
                    );   
                    $all_course = new WP_Query( $args_all_course );
                    if ($all_course->have_posts()) : while ($all_course->have_posts()) : $all_course->the_post();
                      if (!in_array($post->ID, $allcourse_id)){
                        $allcourse_id[] = $post->ID;
                      }
                    endwhile;
                    endif;
                    $args_all_course = array(
                      'post_type'=>'course',
                      'post__in'=>$allcourse_id,
                      'nopaging' => true,
                      'orderby' => 'post__in',
                    );   
                    $wp_query = new WP_Query( $args_all_course );
                    //echo "Last SQL-Query: {$wp_query->request}";
                  }

                  if(isset($_GET['category']) && empty($_GET['session']) && empty($_GET['age']) && empty($_GET['sort_by']) ){
                    $category_filter = explode(",",$_GET['category']);
                    $args = array(
                        'post_type' => 'course',
                        'order'=>'DESC',
                        'orderby' => 'publish_date',
                        'nopaging' => true,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'course-cat',
                                'field'    => 'term_id',
                                'terms'    => $category_filter
                            )
                        ),
                    );
                    $wp_query = new WP_Query( $args );

                  }

                  if(isset($_GET['sort_by']) && isset($_GET['category']) && empty($_GET['age']) && empty($_GET['session'])){
                    $category_filter = explode(",",$_GET['category']);
                    $sort_by = $_GET;
                    $filter = $sort_by['sort_by'];
                    $args = array(
                        'post_type' => 'course',
                        'nopaging' => true,
                        'order'=>'DESC',
                        'orderby' => 'publish_date',
                        'tax_query' => array(
                          array(
                              'taxonomy' => 'course-cat',
                              'field'    => 'term_id',
                              'terms'    => $category_filter
                          )
                        ),
                    );
                    switch($filter){
                      case 'popular':
                        $args['orderby'] = 'meta_value_num';
                        $args['meta_key'] = 'vibe_students';
                      break;
                      case 'newest':
                        $args['orderby'] = 'date';
                      break;
                      case 'rated':
                        $args['orderby'] = 'meta_value_num';
                        $args['meta_key'] = 'average_rating';
                      break;
                    }
                    $wp_query = new WP_Query( $args );
                  }

                  if(isset($_GET['session']) && empty($_GET['sort_by']) && empty($_GET['category']) && empty($_GET['age'])){
                    $sessions_filter = explode(",",$_GET['session']);
                      $firstEle = $sessions_filter[0];
                      $lastEle = $sessions_filter[count($sessions_filter) - 1];
                      if($lastEle == 31){
                        $filter_value = $firstEle.',500';
                      }
                      else{
                        $filter_value = $firstEle.','.$lastEle;
                      }
                      $session_filter_value = explode(",",$filter_value);
                    $meta_query = array();
                    $args = array(
                      'post_type' => 'course',
                      'nopaging' => true,
                      'orderby'  => 'meta_value_num', 
                      );
                    $args['meta_query'] = $meta_query;
                    if(in_array('31', $session_filter_value)){
                      $meta_query[] = array(
                        'key' => 'vibe_course_sessions',
                        'value' => 31,
                        'compare' => '>=',
                        'type'    => 'NUMERIC',
                      );
                    }
                    else{ 
                       $meta_query[] = array(
                        'key' => 'vibe_course_sessions',
                        'value' => $session_filter_value,
                        'compare' => 'BETWEEN',
                        'type'      => 'NUMERIC',
                      );
                    }
                    $args['meta_query'] = $meta_query;
                    $wp_query = new WP_Query( $args );
                    //echo "Last SQL-Query: {$wp_query->request}";
                  }

                  if(isset($_GET['session']) && isset($_GET['sort_by']) && empty($_GET['category']) && empty($_GET['age'])){
                    $sort_by = $_GET;
                    $filter = $sort_by['sort_by'];
                    $sessions_filter = explode(",",$_GET['session']);
                    $firstEle = $sessions_filter[0];
                    $lastEle = $sessions_filter[count($sessions_filter) - 1];
                    if($lastEle == 31){
                      $filter_value = $firstEle.',500';
                    }
                    else{
                      $filter_value = $firstEle.','.$lastEle;
                    }
                    $session_filter_value = explode(",",$filter_value);
                    $meta_query = array();
                    $args = array(
                     'post_type' => 'course',
                      'nopaging' => true,
                       'orderby'  => 'meta_value_num', 
                      );
                    switch($filter){
                      case 'popular':
                        $args['orderby'] = 'meta_value_num';
                        $args['meta_key'] = 'vibe_students';
                      break;
                      case 'newest':
                        $args['orderby'] = 'date';
                      break;
                      case 'rated':
                        $args['orderby'] = 'meta_value_num';
                        $args['meta_key'] = 'average_rating';
                      break;
                    }
                    $args['meta_query'] = $meta_query;
                    if(in_array('31', $session_filter_value)){
                      $meta_query[] = array(
                        'key' => 'vibe_course_sessions',
                        'value' => 31,
                        'compare' => '>=',
                        'type'    => 'NUMERIC',
                      );
                    }
                    else{ 
                       $meta_query[] = array(
                        'key' => 'vibe_course_sessions',
                        'value' => $session_filter_value,
                        'compare' => 'BETWEEN',
                        'type'      => 'NUMERIC',
                      );
                    }
                    $args['meta_query'] = $meta_query;
                    $wp_query = new WP_Query( $args );
                  }

                  if(isset($_GET['session']) && isset($_GET['category']) && empty($_GET['age']) && empty($_GET['sort_by'])){
                    $sessions_filter = explode(",",$_GET['session']);
                    $category_filter = explode(",",$_GET['category']);
                    $firstEle = $sessions_filter[0];
                    $lastEle = $sessions_filter[count($sessions_filter) - 1];
                    if($lastEle == 31){
                      $filter_value = $firstEle.',500';
                    }
                    else{
                      $filter_value = $firstEle.','.$lastEle;
                    }
                    $session_filter_value = explode(",",$filter_value);
                    $meta_query = array();
                    $args = array(
                     'post_type' => 'course',
                      'nopaging' => true,
                       'orderby'  => 'meta_value_num', 
                       'tax_query' => array(
                          array(
                              'taxonomy' => 'course-cat',
                              'field'    => 'term_id',
                              'terms'    => $category_filter
                          )
                        ),
                      );
                    $args['meta_query'] = $meta_query;
                    if(in_array('31', $session_filter_value)){
                      $meta_query[] = array(
                        'key' => 'vibe_course_sessions',
                        'value' => 31,
                        'compare' => '>=',
                        'type'    => 'NUMERIC',
                      );
                    }
                    else{ 
                       $meta_query[] = array(
                        'key' => 'vibe_course_sessions',
                        'value' => $session_filter_value,
                        'compare' => 'BETWEEN',
                        'type'      => 'NUMERIC',
                      );
                    }
                    $args['meta_query'] = $meta_query;
                    $wp_query = new WP_Query( $args );
                  }

                  if(isset($_GET['session']) && isset($_GET['category']) && isset($_GET['sort_by']) && empty($_GET['age'])){
                    $sessions_filter = explode(",",$_GET['session']);
                    $category_filter = explode(",",$_GET['category']);
                    $firstEle = $sessions_filter[0];
                    $lastEle = $sessions_filter[count($sessions_filter) - 1];
                    if($lastEle == 31){
                      $filter_value = $firstEle.',500';
                    }
                    else{
                      $filter_value = $firstEle.','.$lastEle;
                    }
                    $session_filter_value = explode(",",$filter_value);
                    $meta_query = array();
                    $args = array(
                     'post_type' => 'course',
                      'nopaging' => true,
                       'orderby'  => 'meta_value_num', 
                       'tax_query' => array(
                          array(
                              'taxonomy' => 'course-cat',
                              'field'    => 'term_id',
                              'terms'    => $category_filter
                          )
                        ),
                      );
                    $filter = $_GET['sort_by'];
                    switch($filter){
                      case 'popular':
                        $args['orderby'] = 'meta_value_num';
                        $args['meta_key'] = 'vibe_students';
                      break;
                      case 'newest':
                        $args['orderby'] = 'date';
                      break;
                      case 'rated':
                        $args['orderby'] = 'meta_value_num';
                        $args['meta_key'] = 'average_rating';
                      break;
                    }
                    $args['meta_query'] = $meta_query;
                    if(in_array('31', $session_filter_value)){
                      $meta_query[] = array(
                        'key' => 'vibe_course_sessions',
                        'value' => 31,
                        'compare' => '>=',
                        'type'    => 'NUMERIC',
                      );
                    }
                    else{ 
                       $meta_query[] = array(
                        'key' => 'vibe_course_sessions',
                        'value' => $session_filter_value,
                        'compare' => 'BETWEEN',
                        'type'      => 'NUMERIC',
                      );
                    }
                    $args['meta_query'] = $meta_query;
                    $wp_query = new WP_Query( $args );
                  }

                  if(isset($_GET['age']) && empty($_GET['session']) && empty($_GET['category']) && empty($_GET['sort_by'])){
                    if($_GET['age'] == 17){
                      $custom_age = '17,100';
                      $age_filter = explode(",",$custom_age);
                    }
                    else{
                      $age_filter = explode(",",$_GET['age']);
                    }
                    
                    $ageFirstEle = $age_filter[0];
                    if($age_filter[count($age_filter) - 1] == 17){
                      $ageLastEle = 100;
                    }
                    else{
                      $ageLastEle = $age_filter[count($age_filter) - 1];
                    }
                    
                    $age = $wpdb->prepare("SELECT SQL_CALC_FOUND_ROWS ht_posts.ID FROM ht_posts INNER JOIN ht_postmeta ON ( ht_posts.ID = ht_postmeta.post_id ) LEFT JOIN ht_postmeta AS rel ON ht_posts.ID = rel.post_id WHERE 1=1 AND ht_posts.post_type = 'course' AND (ht_posts.post_status = 'publish' OR ht_posts.post_status = 'acf-disabled') AND rel.meta_key= 'vibe_course_age_group' AND SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', -1) != '' AND (SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', 1) <= ".$ageLastEle." AND SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', -1) >= ".$ageFirstEle.") GROUP BY ht_posts.ID ORDER BY ht_postmeta.meta_value+0 DESC");
                    $age_result = $wpdb->get_results($age);
                    foreach($age_result as $course){
                      $age_args['post__in'][]=$course->ID;
                    }
                    if(!empty($age_args['post__in'])){
                      $query_args = array(
                       'post_type' => 'course',
                        'nopaging' => true,
                        'post__in'=>$age_args['post__in'],
                        
                        );
                      $wp_query = new WP_Query($query_args);
                    }
                  }

                  if(isset($_GET['age']) && isset($_GET['category'])  && empty($_GET['session'])  && empty($_GET['sort_by']) ){
                    if($_GET['age'] == 17){
                      $custom_age = '17,100';
                      $age_filter = explode(",",$custom_age);
                    }
                    else{
                      $age_filter = explode(",",$_GET['age']);
                    }
                    $ageFirstEle = $age_filter[0];
                    $ageLastEle = $age_filter[count($age_filter) - 1];
                    $age_with_category = $wpdb->prepare("SELECT  ht_posts.post_title AS course,ht_posts.ID FROM ht_posts LEFT JOIN ht_postmeta AS rel ON ht_posts.ID = rel.post_id LEFT JOIN ht_term_relationships ON (ht_posts.ID = ht_term_relationships.object_id) WHERE 1=1 AND ( ht_term_relationships.term_taxonomy_id IN (".$_GET['category'].") ) AND ht_posts.post_type = 'course' AND (ht_posts.post_status = 'publish' OR ht_posts.post_status = 'acf-disabled' OR ht_posts.post_author = 2 AND ht_posts.post_status = 'private') AND rel.meta_key= 'vibe_course_age_group' AND SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', -1) != '' AND (SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', 1) <= ".$ageLastEle." AND SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', -1) >= ".$ageFirstEle.") GROUP BY ht_posts.ID ORDER BY ht_posts.post_date DESC ");
                    $age_with_category_result = $wpdb->get_results($age_with_category);
                    foreach($age_with_category_result as $course){
                      $age_with_category_args['post__in'][]=$course->ID;
                    }
                    if(!empty($age_with_category_args['post__in'])){
                      $query_args = array(
                               'post_type' => 'course',
                                'nopaging' => true,
                                'post__in'=>$age_with_category_args['post__in'],
                                
                                );
                      $wp_query = new WP_Query($query_args);
                    }
                  }
                  if(isset($_GET['age']) && isset($_GET['category']) && isset($_GET['session']) && empty($_GET['sort_by'])){
                    if($_GET['age'] == 17){
                      $custom_age = '17,100';
                      
                      $age_filter = explode(",",$custom_age);
                    }
                    else{
                      $age_filter = explode(",",$_GET['age']);
                    }
                    $sessions_filter = explode(",",$_GET['session']);
                    $firstEle = $sessions_filter[0];
                    $lastEle = $sessions_filter[count($sessions_filter) - 1];
                    if($lastEle == 31){
                      $first_value = $firstEle;
                      $second_value = "500";
                    }
                    else{
                      $first_value = $firstEle;
                      $second_value = $lastEle;
                    }
                    $session_filter_value = explode(",",$filter_value);
                    
                    $ageFirstEle = $age_filter[0];
                    $ageLastEle = $age_filter[count($age_filter) - 1];
                    $age_with_category = "SELECT  ht_posts.post_title AS course,ht_posts.ID FROM ht_posts LEFT JOIN ht_postmeta ON ht_posts.ID = ht_postmeta.post_id LEFT JOIN ht_postmeta AS rel ON ht_posts.ID = rel.post_id LEFT JOIN ht_term_relationships ON (ht_posts.ID = ht_term_relationships.object_id) WHERE 1=1 AND ( ht_term_relationships.term_taxonomy_id IN (".$_GET['category'].") ) AND ht_posts.post_type = 'course' AND (ht_posts.post_status = 'publish' OR ht_posts.post_status = 'acf-disabled' OR ht_posts.post_author = 2 AND ht_posts.post_status = 'private') AND ( ( ht_postmeta.meta_key = 'vibe_course_sessions'";
                   
                      $age_with_category .= " AND CAST(ht_postmeta.meta_value AS SIGNED) BETWEEN ".$first_value." AND ".$second_value." ) )";
                   
                      $age_with_category .= " AND rel.meta_key= 'vibe_course_age_group' AND SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', -1) != '' AND (SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', 1) <= ".$ageLastEle." AND SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', -1) >= ".$ageFirstEle.") GROUP BY ht_posts.ID ORDER BY ht_posts.post_date DESC ";
                    $age_with_category_result = $wpdb->get_results($age_with_category);
                    foreach($age_with_category_result as $course){
                      $age_with_category_args['post__in'][]=$course->ID;
                    }
                    if(!empty($age_with_category_args['post__in'])){
                      $query_args = array(
                               'post_type' => 'course',
                                'nopaging' => true,
                                'post__in'=>$age_with_category_args['post__in'],
                                
                                );
                      $wp_query = new WP_Query($query_args);
                    }
                    
                  }

                  if(isset($_GET['age']) && isset($_GET['category']) && isset($_GET['session']) && isset($_GET['sort_by'])){
                    $sortby_filter = $_GET['sort_by'];
                    if($_GET['age'] == 17){
                      $custom_age = '17,100';
                      $age_filter = explode(",",$custom_age);
                    }
                    else{
                      $age_filter = explode(",",$_GET['age']);
                    }
                    $sessions_filter = explode(",",$_GET['session']);
                    $firstEle = $sessions_filter[0];
                    $lastEle = $sessions_filter[count($sessions_filter) - 1];
                    
                    $ageFirstEle = $age_filter[0];
                    $ageLastEle = $age_filter[count($age_filter) - 1];
                    $age_session_sortby_category = "SELECT  ht_posts.post_title AS course,ht_posts.ID FROM ht_posts LEFT JOIN ht_postmeta AS rel ON ht_posts.ID = rel.post_id LEFT JOIN ht_postmeta AS meta2 ON ht_posts.ID = meta2.post_id LEFT JOIN ht_term_relationships ON (ht_posts.ID = ht_term_relationships.object_id) WHERE 1=1 AND ( ht_term_relationships.term_taxonomy_id IN (".$_GET['category'].") ) AND ht_posts.post_type = 'course' AND (ht_posts.post_status = 'publish' OR ht_posts.post_status = 'acf-disabled' OR ht_posts.post_author = 2 AND ht_posts.post_status = 'private') AND ( ( rel.meta_key = 'vibe_course_sessions'";
                    if(in_array(31, $sessions_filter)){
                      $age_session_sortby_category .= " AND CAST(ht_postmeta.meta_value AS SIGNED) >= '31' ) )";
                    }
                    else{
                      $age_session_sortby_category .= "  AND CAST(rel.meta_value AS SIGNED) BETWEEN ".$firstEle." AND ".$lastEle." ) )";
                    }
                    $age_session_sortby_category .= " AND rel.meta_key= 'vibe_course_age_group' AND SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', -1) != '' AND (SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', 1) <= ".$ageLastEle." AND SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', -1) >= ".$ageFirstEle.")";
                    if($sortby_filter == 'rated')
                    $age_session_sortby_category .= " AND ( meta2.meta_key = 'average_rating' )"; 
                    if($sortby_filter == 'popular')
                    $age_session_sortby_category .= " AND ( meta2.meta_key = 'vibe_students' )";
                    $age_session_sortby_category .= " GROUP BY ht_posts.ID ORDER BY ht_posts.post_date DESC ";
                    //print_r($age_session_sortby_category);
                    $age_session_sortby_category_result = $wpdb->get_results($age_session_sortby_category);
                    foreach($age_session_sortby_category_result as $course){
                      $age_session_sortby_category_args['post__in'][]=$course->ID;
                    }
                    if(!empty($age_session_sortby_category_args['post__in'])){
                      $query_args = array(
                       'post_type' => 'course',
                        'nopaging' => true,
                        'post__in'=>$age_session_sortby_category_args['post__in'],
                        
                        );
                      $wp_query = new WP_Query($query_args);
                    }
                    
                  }

                  if(isset($_GET['age']) && isset($_GET['session']) && empty($_GET['sort_by']) && empty($_GET['category'])){
                    if($_GET['age'] == 17){
                      $custom_age = '17,100';
                      $age_filter = explode(",",$custom_age);
                    }
                    else{
                      $age_filter = explode(",",$_GET['age']);
                    }
                    $sessions_filter = explode(",",$_GET['session']);
                    $firstEle = $sessions_filter[0];
                    $lastEle = $sessions_filter[count($sessions_filter) - 1];

                    $ageFirstEle = $age_filter[0];
                    $ageLastEle = $age_filter[count($age_filter) - 1];
                    $age_with_session = "SELECT SQL_CALC_FOUND_ROWS ht_posts.ID FROM ht_posts INNER JOIN ht_postmeta ON ( ht_posts.ID = ht_postmeta.post_id ) LEFT JOIN ht_postmeta AS rel ON ht_posts.ID = rel.post_id WHERE 1=1 AND ( ( ht_postmeta.meta_key = 'vibe_course_sessions' ";
                    if($lastEle == 31){
                      $filter_age_first_value = $firstEle;
                      $filter_age_second_value = '500';
                    }
                    else{
                      $filter_age_first_value = $firstEle;
                      $filter_age_second_value = $lastEle;
                    }

                    // if(in_array(31, $sessions_filter)){
                    //   $age_with_session .= " AND CAST(ht_postmeta.meta_value AS SIGNED) >= '31' ) )";
                    // }
                    // else{
                      $age_with_session .= " AND CAST(ht_postmeta.meta_value AS SIGNED) BETWEEN ".$filter_age_first_value." AND ".$filter_age_second_value." ) )";
                    //}
                    $age_with_session .= " AND ht_posts.post_type = 'course' AND (ht_posts.post_status = 'publish' OR ht_posts.post_status = 'acf-disabled') AND rel.meta_key= 'vibe_course_age_group' AND SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', -1) != '' AND (SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', 1) <= ".$ageLastEle." AND SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', -1) >= ".$ageFirstEle.") GROUP BY ht_posts.ID ORDER BY ht_postmeta.meta_value+0 DESC ";
                    
                    $age_with_session_result = $wpdb->get_results($age_with_session);
                    foreach($age_with_session_result as $course){
                      $age_with_session_args['post__in'][]=$course->ID;
                    }
                    if(!empty($age_with_session_args['post__in'])){
                      $query_args = array(
                       'post_type' => 'course',
                        'nopaging' => true,
                        'post__in'=>$age_with_session_args['post__in'],
                        
                        );
                      $wp_query = new WP_Query($query_args);
                    }
                  }

                  if(isset($_GET['age']) && isset($_GET['sort_by']) && empty($_GET['category']) && empty($_GET['session'])){
                    if($_GET['age'] == 17){
                      $custom_age = '17,100';
                      $age_filter = explode(",",$custom_age);
                    }
                    else{
                      $age_filter = explode(",",$_GET['age']);
                    }
                    $sortby_filter = $_GET['sort_by'];
                    // $firstEle = $sessions_filter[0];
                    // $lastEle = $sessions_filter[count($sessions_filter) - 1];
                    
                    $ageFirstEle = $age_filter[0];
                    $ageLastEle = $age_filter[count($age_filter) - 1];

                    $age_with_sortby = "SELECT SQL_CALC_FOUND_ROWS ht_posts.ID FROM ht_posts INNER JOIN ht_postmeta ON ( ht_posts.ID = ht_postmeta.post_id ) LEFT JOIN ht_postmeta AS rel ON ht_posts.ID = rel.post_id  WHERE 1=1";
                    if($sortby_filter == 'rated')
                    $age_with_sortby .= " AND ( ( ht_postmeta.meta_key = 'average_rating' ) )"; 
                    if($sortby_filter == 'popular')
                    $age_with_sortby .= " AND ( ( ht_postmeta.meta_key = 'vibe_students' ) )";
                    $age_with_sortby .= " AND ht_posts.post_type = 'course' AND (ht_posts.post_status = 'publish' OR ht_posts.post_status = 'acf-disabled')"; 
                    $age_with_sortby .= " AND rel.meta_key= 'vibe_course_age_group' AND SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', -1) != '' AND (SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', 1) <= ".$ageLastEle." AND SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', -1) >= ".$ageFirstEle.") GROUP BY ht_posts.ID ORDER BY rel.meta_value+0 DESC ";
                    $age_with_sortby_result = $wpdb->get_results($age_with_sortby);

                    if($sortby_filter == 'newest')
                    $age_with_sortby = $wpdb->prepare("SELECT SQL_CALC_FOUND_ROWS ht_posts.ID FROM ht_posts LEFT JOIN ht_postmeta AS rel ON ht_posts.ID = rel.post_id WHERE 1=1 AND ht_posts.post_type = 'course' AND (ht_posts.post_status = 'publish' OR ht_posts.post_status = 'acf-disabled') AND rel.meta_key= 'vibe_course_age_group' AND SUBSTRING_INDEX(rel.meta_value, '-', 2) != '' AND SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', -1) != '' AND (SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', 1) <= ".$ageLastEle." AND SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', -1) >= ".$ageFirstEle.") ORDER BY ht_posts.post_date DESC");
                    $age_with_sortby_result = $wpdb->get_results($age_with_sortby);
                   
                    foreach($age_with_sortby_result as $course){
                      $age_with_sortby_args['post__in'][]=$course->ID;
                    }
                    if(!empty($age_with_sortby_args['post__in'])){
                      $query_args = array(
                               'post_type' => 'course',
                                'nopaging' => true,
                                'post__in'=>$age_with_sortby_args['post__in'],
                                
                                );
                      $wp_query = new WP_Query($query_args);
                    }
                  }

                  if(isset($_GET['age']) && isset($_GET['sort_by']) && isset($_GET['session']) && empty($_GET['category'])){
                    if($_GET['age'] == 17){
                      $custom_age = '17,100';
                      $age_filter = explode(",",$custom_age);
                    }
                    else{
                      $age_filter = explode(",",$_GET['age']);
                    }
                    $sortby_filter = $_GET['sort_by'];
                    $sessions_filter = explode(",",$_GET['session']);
                    $firstEle = $sessions_filter[0];
                    $lastEle = $sessions_filter[count($sessions_filter) - 1];
                    
                    $ageFirstEle = $age_filter[0];
                    $ageLastEle = $age_filter[count($age_filter) - 1];

                    $age_sortby_session = "SELECT SQL_CALC_FOUND_ROWS ht_posts.ID FROM ht_posts INNER JOIN ht_postmeta ON ( ht_posts.ID = ht_postmeta.post_id ) LEFT JOIN ht_postmeta AS rel ON ht_posts.ID = rel.post_id LEFT JOIN ht_postmeta AS meta2 ON ht_posts.ID = meta2.post_id WHERE 1=1";
                    if($sortby_filter == 'rated')
                    $age_sortby_session .= " AND ( ( ht_postmeta.meta_key = 'average_rating' ) )"; 
                    if($sortby_filter == 'popular')
                    $age_sortby_session .= " AND ( ( ht_postmeta.meta_key = 'vibe_students' ) )";
                    $age_sortby_session .= " AND ht_posts.post_type = 'course' AND (ht_posts.post_status = 'publish' OR ht_posts.post_status = 'acf-disabled')"; 
                    $age_sortby_session .= " AND rel.meta_key= 'vibe_course_age_group' AND SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', -1) != '' AND (SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', 1) <= ".$ageLastEle." AND SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', -1) >= ".$ageFirstEle.") AND ( ( meta2.meta_key = 'vibe_course_sessions'";
                    if(in_array(31, $sessions_filter)){
                      $age_with_session .= " AND CAST(ht_postmeta.meta_value AS SIGNED) >= '31' ) )";
                    }
                    else{
                      $age_sortby_session .= " AND CAST(meta2.meta_value AS SIGNED) BETWEEN ".$firstEle." AND ".$lastEle." ) ) ";
                    }
                    $age_sortby_session .= " GROUP BY ht_posts.ID ORDER BY rel.meta_value+0 DESC";
                    $age_sortby_session_result = $wpdb->get_results($age_sortby_session);
                    if($sortby_filter == 'newest')
                    $age_sortby_session = $wpdb->prepare("SELECT SQL_CALC_FOUND_ROWS ht_posts.ID FROM ht_posts LEFT JOIN ht_postmeta AS rel ON ht_posts.ID = rel.post_id WHERE 1=1 AND ht_posts.post_type = 'course' AND (ht_posts.post_status = 'publish' OR ht_posts.post_status = 'acf-disabled') AND rel.meta_key= 'vibe_course_age_group' AND SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', -1) != '' AND (SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', 1) <= ".$ageLastEle." AND SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', -1) >= ".$ageFirstEle.") ORDER BY ht_posts.post_date DESC ");
                    $age_sortby_session_result = $wpdb->get_results($age_sortby_session);
                   
                    foreach($age_sortby_session_result as $course){
                      $age_sortby_session_args['post__in'][]=$course->ID;
                    }
                    if(!empty($age_sortby_session_args['post__in'])){
                      $query_args = array(
                               'post_type' => 'course',
                                'nopaging' => true,
                                'post__in'=>$age_sortby_session_args['post__in'],
                                
                                );
                      $wp_query = new WP_Query($query_args);
                    }
                  }

                  if(isset($_GET['age']) && isset($_GET['sort_by']) && isset($_GET['category']) && empty($_GET['session'])){
                    if($_GET['age'] == 17){
                      $custom_age = '17,100';
                      $age_filter = explode(",",$custom_age);
                    }
                    else{
                      $age_filter = explode(",",$_GET['age']);
                    }
                    $sortby_filter = $_GET['sort_by'];
                    $sessions_filter = explode(",",$_GET['session']);
                    $firstEle = $sessions_filter[0];
                    $lastEle = $sessions_filter[count($sessions_filter) - 1];
                    
                    $ageFirstEle = $age_filter[0];
                    $ageLastEle = $age_filter[count($age_filter) - 1];

                    $age_sortbycategory = "SELECT  ht_posts.post_title AS course,ht_posts.ID FROM ht_posts LEFT JOIN ht_postmeta ON ht_posts.ID = ht_postmeta.post_id LEFT JOIN ht_postmeta AS rel ON ht_posts.ID = rel.post_id LEFT JOIN ht_term_relationships ON (ht_posts.ID = ht_term_relationships.object_id) WHERE 1=1 AND ( ht_term_relationships.term_taxonomy_id IN (".$_GET['category'].") ) AND ht_posts.post_type = 'course' AND (ht_posts.post_status = 'publish' OR ht_posts.post_status = 'acf-disabled' OR ht_posts.post_author = 2 AND ht_posts.post_status = 'private') ";
                    if($sortby_filter == 'rated')
                    $age_sortbycategory .= " AND ( ( ht_postmeta.meta_key = 'average_rating' ) )"; 
                    if($sortby_filter == 'popular')
                    $age_sortbycategory .= " AND ( ( ht_postmeta.meta_key = 'vibe_students' ) )";
                    $age_sortbycategory .= " AND ht_posts.post_type = 'course' AND (ht_posts.post_status = 'publish' OR ht_posts.post_status = 'acf-disabled')"; 
                    $age_sortbycategory .= " AND rel.meta_key= 'vibe_course_age_group' AND SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', -1) != '' AND (SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', 1) <= ".$ageLastEle." AND SUBSTRING_INDEX(REGEXP_REPLACE(rel.meta_value, '[^\\\d]', '-'), '-', -1) >= ".$ageFirstEle.")";
                    $age_sortbycategory .= " GROUP BY ht_posts.ID ORDER BY rel.meta_value+0 DESC";
                    $age_sortbycategory_result = $wpdb->get_results($age_sortbycategory);
                    if($sortby_filter == 'newest')
                    $age_sortbycategory = $wpdb->prepare("SELECT SQL_CALC_FOUND_ROWS ht_posts.ID FROM ht_posts LEFT JOIN ht_postmeta AS rel ON ht_posts.ID = rel.post_id WHERE 1=1 AND ht_posts.post_type = 'course' AND (ht_posts.post_status = 'publish' OR ht_posts.post_status = 'acf-disabled') AND rel.meta_key= 'vibe_course_age_group' AND SUBSTRING_INDEX(rel.meta_value, '-', -1) != '' AND (SUBSTRING_INDEX(rel.meta_value, '-', -1) <= ".$ageLastEle." AND SUBSTRING_INDEX(rel.meta_value, '-', -1) >= ".$ageFirstEle.") ORDER BY ht_posts.post_date DESC");
                    $age_sortbycategory_result = $wpdb->get_results($age_sortbycategory);
                      foreach($age_sortbycategory_result as $course){
                        $age_sortbycategory_args['post__in'][]=$course->ID;
                      }
                      if(!empty($age_sortbycategory_args['post__in'])){
                      $query_args = array(
                       'post_type' => 'course',
                        'nopaging' => true,
                        'post__in'=>$age_sortbycategory_args['post__in'],
                        
                        );
                      $wp_query = new WP_Query($query_args);
                    }
                    }
                    $filter_courses_id = array();
                    $i = 0;
                    if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
                        global $post;
                        
                        if(!in_array($post->ID, $users_courses)){
                            $featured = get_post_meta($post->ID,'featured',true);
                            $filter_courses_id[$i]['course_id'] = $post->ID;
                            if($featured == 1){
                                $filter_courses_id[$i]['featured']= 1;
                            }
                            else{
                                $filter_courses_id[$i]['featured']= 0;
                            }
                        }
                        $i++;
                    endwhile;
                    endif;
                    
                    $sort_array = array_column($filter_courses_id, 'featured');
                    array_multisort($sort_array, SORT_DESC, $filter_courses_id);
                    $sort_courses = array();
                    
                    foreach($filter_courses_id as $subKey => $courses){
                        $sort_courses[] = $courses['course_id'];
                    }
                    
                    $query_args = array(
                      'post_type'=>'course',
                      'post__in'=>$sort_courses,
                      'posts_per_page'=>16,
                      'post_status' => 'publish',
                      'orderby' => 'post__in', 
                      'paged'=>$paged
                    );
                    
                    $wp_query_new = new WP_Query($query_args);
                    
                  if(!empty($wp_query_new) && !empty($sort_courses)){
                    $i=0;
                    if ($wp_query_new->have_posts()){
                    while ($wp_query_new->have_posts()) : $wp_query_new->the_post();
                    if(get_post_type() == 'course'){
                        global $post;
                      $custom_fields = get_post_custom();
                      $duration = $custom_fields['vibe_validity'][0];
                      $course_type="";
                        $course_type = $custom_fields['vibe_course_type'][0];

                        $str1="LIVE CLASSES";
                        $str2="BLENDED";
                        $str3="SELF-PACED";
                    
                        if(strcmp($str2, $course_type)==0){
                           $badge_class = "blue";
                        }
                        elseif(strcmp($str3, $course_type)==0){
                           $badge_class = "green";
                        }
                        elseif(strcmp($str1, $course_type)==0){
                           $badge_class = "red";
                        }
                        else{
                          $badge_class = "";
                        } 
                      $durationParameter = get_post_meta($post->ID,'vibe_course_validity_parameter',true);
                      $session = $custom_fields['vibe_course_sessions'][0];
                      $age_limit = $custom_fields['vibe_course_age_group'][0];
                      $category_array = get_the_terms( $post->ID, 'course-cat');
                      $excerpt = get_post_field('post_excerpt', $post->ID);
                        $courseID = $post->ID;
                      $courseslug=get_the_permalink($courseID);
                      $usersFavorites = wpfp_get_users_favorites();
                      
                      $userIdentifier = "";

                      if(!is_array($usersFavorites)) $usersFavorites = array();

                      if(isset($user->ID) && $user->ID > 0)
                      {
                        $userIdentifier = $user->ID;
                      }
                      else if(isset($_COOKIE['PHPSESSID']))
                      {
                        $userIdentifier = $_COOKIE['PHPSESSID'];
                      }
                      $coursePartner = "";

                        $cb_course_id = get_post_meta($courseID,'celeb_school_course_id',true);
                        if ($cb_course_id) {
                          $coursePartner = "Celebrity School";
                        }

                        $aiws_course_id = get_post_meta($courseID,'aiws_program_id',true);
                        if ($aiws_course_id) {
                          $coursePartner = "AIWS";
                        }
                        if ( has_post_thumbnail() ) {
                            $image_url = get_the_post_thumbnail_url();
                        }
                        $pid=get_post_meta($courseID,'vibe_product',true);
                        $pid=apply_filters('wplms_course_product_id',$pid,$courseID,0);

                        if(is_numeric($pid) && bp_course_get_post_type($pid) == 'product'){
                          $pid=get_permalink($pid);
                          $check=vibe_get_option('direct_checkout');
                          $check =intval($check);
                          if(isset($check) &&  $check){
                            $pid .= '?redirect';
                          }
                        }
                        if($courseID == $sort_courses[15] && count($sort_courses) > 16  ){
                            $add_class = 'load-more';
                        }
                   
                    ?>
                    <div class="column">
                        <div class="course-card <?php echo $add_class;?>">
                            <?php if($courseID == $sort_courses[15] && count($sort_courses) > 16 ){ ?>
                            <a class="load-more" href="#!" id="more_posts">Load More</a>
                            <?php } ?>
                            <figure class="image"><img alt="<?php echo $post->post_title ?>" src="<?php echo $image_url;?>"></figure>
                            <div class="course-copy">
                                <header class="course-header">
                                    <a class="category" href="#"><?php echo $category_array[0]->name;?></a>
                                    <span class="badge <?php echo $badge_class;?>"><?php echo $course_type;?></span>
                                </header>
                                <h2 class="course-title"><a href="#!"><?php echo bp_course_title(); ?></a></h2>
                                <footer class="course-footer">
                                    <div class="left" id="course_price_share_<?php echo $post->ID;?>">
                                        <?php if (in_array($post->ID, $users_courses)){
                                            the_course_button(); 
                                        }?>
                                        <?php the_course_price();?>
                                    </div>
                                    <div class="right">
                                        <?php if (!in_array($post->ID, $users_courses) && $coming_soon != 'S'){?>
                                        <a href="<?php echo $pid;?>">
                                            <svg class="cart" xmlns="http://www.w3.org/2000/svg" width="26" height="21.587" viewBox="0 0 26 21.587"> <g id="Group_20746" data-name="Group 20746" transform="translate(1 1)"> <g id="Group_15651" data-name="Group 15651" transform="translate(0 0)"> <path id="Path_30160" data-name="Path 30160" d="M-11952.5,9580.5h3.393l5.136,15.36h12.108" transform="translate(11952.5 -9580.5)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/> <path id="Path_30161" data-name="Path 30161" d="M-11898.5,9610.5h20.038l-3.893,9.023h-13" transform="translate(11902.465 -9607.673)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/> <g id="Ellipse_440" data-name="Ellipse 440" transform="translate(7.67 17.428)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"> <circle cx="1.579" cy="1.579" r="1.579" stroke="none"/> <circle cx="1.579" cy="1.579" r="0.579" fill="none"/> </g> <g id="Ellipse_441" data-name="Ellipse 441" transform="translate(16.874 17.428)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"> <circle cx="1.579" cy="1.579" r="1.579" stroke="none"/> <circle cx="1.579" cy="1.579" r="0.579" fill="none"/> </g> </g> </g> </svg>
                                        </a>
                                        <?php 
                                          }
                                           if(is_user_logged_in()){
                                            ?>
                                            <?php wpfp_course_link(); ?>
                                          <?php }else{
                                            $url = "/login-register";
                                            ?>
                                            <a href="<?php echo get_site_url().$url; ?>"><i class="add-wishlist" title="Add to Wishlist"></i></a>
                                            <?php
                                          }
                                          ?>
                                        <a href="#share!" class="course_share" data-toggle="modal" data-target="#open_popular_share" data-id="<?php echo $courseID;?>">
                                            <svg class="share" xmlns="http://www.w3.org/2000/svg" width="25.445" height="19.4" viewBox="0 0 25.445 19.4"> <g id="Group_20744" data-name="Group 20744" transform="translate(0.205 0.2)" style="isolation: isolate"> <path id="Path_38322" data-name="Path 38322" d="M21.417,21a.53.53,0,0,1,.275.133l9.091,8.188a.724.724,0,0,1,.1.919.626.626,0,0,1-.1.114l-9.091,8.188a.52.52,0,0,1-.8-.12.723.723,0,0,1-.118-.392V34.746a18.89,18.89,0,0,0-4.705.389,17.55,17.55,0,0,0-9.127,4.7.518.518,0,0,1-.8-.062.733.733,0,0,1-.113-.634C8.4,30.71,15.625,26.694,20.778,25.094V21.655a.618.618,0,0,1,.564-.66A.446.446,0,0,1,21.417,21Zm.5,1.985v2.6a.645.645,0,0,1-.426.634C17,27.53,10.737,30.858,7.913,37.407a19.292,19.292,0,0,1,7.964-3.562,21.972,21.972,0,0,1,5.5-.4.621.621,0,0,1,.542.655v2.589l7.6-6.848Z" transform="translate(-6.003 -20.995)" stroke-width="0.4"/> </g> </svg>
                                        </a>
                                    </div>
                                </footer>

                            </div>
                        </div>
                        <input type="hidden" id="course_name_<?php echo $courseID;?>" value="<?php echo $post->post_title;?>">
                        <input type="hidden" id="course_url_<?php echo $courseID;?>" value="<?php echo $courseslug;?>">
                        <input type="hidden" id="course_image_<?php echo $courseID;?>" value="<?php echo $image_url;?>">
                        <input type="hidden" id="course_badge_<?php echo $courseID;?>" value="<?php echo $badge_class;?>">
                        <input type="hidden" id="course_type_<?php echo $courseID;?>" value="<?php echo $course_type;?>">
                        <input type="hidden" id="course_category_<?php echo $courseID;?>" value="<?php echo $category_array[0]->name;?>">
                        <input type="hidden" id="course_partner_<?php echo $courseID;?>" value="<?php echo $coursePartner;?>">
                        <input type="hidden" id="category_id_<?php echo $courseID;?>" value="<?php echo $category_array[0]->term_id;?>">
                        <input type="hidden" id="course_id_<?php echo $courseID;?>" value="<?php echo $courseID;?>">
                        <input type="hidden" id="course_price_<?php echo $courseID;?>" value="0">
                        <input type="hidden" id="course_tax_<?php echo $courseID;?>" value="0">
                        <input type="hidden" id="age_group_<?php echo $courseID;?>" value="<?php echo $age_limit;?>">
                        <input type="hidden" id="course_duration_<?php echo $courseID;?>" value="<?php echo get_post_meta($courseID, "vibe_validity", true);?>">
                        <input type="hidden" id="session_duration_<?php echo $courseID;?>" value="<?php echo get_post_meta($courseID, "vibe_course_session_length", true);?>">
                        <input type="hidden" id="wishlisted_course_<?php echo $courseID;?>" value="<?php echo in_array($courseID, $usersFavorites) ? '1' : '0';?>">
                    </div>
                <?php }else{
                  ?>
                  <div class="no-data">
                    <img src="<?php echo bloginfo('template_url')?>/assets/images/nofilter-icon.png">
                    <p>No Courses That Match The Selected Filters!<br/>Please Reset Filters And Try Again.</p>
                    <a href="<?php echo bloginfo('url')?>/courses" class="black-button">Reset Filters</a>
                  </div>
                <?php }$i++; endwhile;}else{?>
                  <div class="no-data">
                    <img src="<?php echo bloginfo('template_url')?>/assets/images/nofilter-icon.png">
                    <p>No courses that match the selected filters! Please reset filters and try again.</p>
                    <a href="<?php echo bloginfo('url')?>/courses" class="black-button">Reset Filters</a>
                  </div>
                <?php }}else{?>
                  <div class="no-data">
                    <img src="<?php echo bloginfo('template_url')?>/assets/images/nofilter-icon.png">
                    <p>No courses that match the selected filters! Please reset filters and try again.</p>
                    <a href="<?php echo bloginfo('url')?>/courses" class="black-button">Reset Filters</a>
                  </div>
                <?php } ?>
                <!-- <div id="more_posts">Load More</div> -->
            </div>
        </div>
        <div class="loader" id="show-loader" style="opacity:0;visibility: hidden;">
            <div class="dots"></div>
        </div>
    </div>
</main>
<?php
get_footer(vibe_get_footer());
?>