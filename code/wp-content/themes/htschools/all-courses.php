<?php
/**
 * Template Name: All Courses page
 */
if ( !defined( 'ABSPATH' ) ) exit;

get_header(vibe_get_header());
?>
<main id="main">
  <section class="breadcrumbs background-breadcrumbs">
      <div class="innerheader-space"></div>
      <div class="container">
        <?php
          $breadcrumbs=get_post_meta($id,'vibe_breadcrumbs',true);
            if(!isset($breadcrumbs) || !$breadcrumbs || vibe_validate($breadcrumbs)){
                vibe_breadcrumbs();
            }
        ?>
      </div>
    </section>
  <div class="owl-carousel owl-theme course_slider home_slider">
    <?php
      $args1 = array(
        'post_type' => 'banner',
        'post_status' => 'publish',
        'orderby' => 'id',
        'order'   => 'ASC',

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
              <h3 class="caption-title"><?php echo $custom_fields['banner_title'][0];?></h3>
              <?php $sub_title = $custom_fields['banner_sub_title'][0]; if($sub_title != '') { ?>
                <span class="name"><?php echo $sub_title; ?></span>
              <?php } ?>
              <a class="yellow-button" href="<?php echo $custom_fields['cta_link'][0];?>"><?php echo $custom_fields['cta_text'][0];?></a>
          </div>
      </div>
    <?php endwhile;endif; ?>
  </div>
    <section class="section popular-wrapper">
      <div class="section-copy">
        <div class="course-header">
          <h2 class="course-title">All Courses</h2>
          <div class="right-side">
            <select class="sort" id="sort_by">
              <option selected="selected" value="">Sort by:</option>
              <option value="popular" <?php if(isset($_GET['sort_by']) && $_GET['sort_by'] == "popular") echo 'selected="selected"';?>>Most Popular</option>
              <option value="rated" <?php if(isset($_GET['sort_by']) && $_GET['sort_by'] == "rated") echo 'selected="selected"';?>>Highest Rated</option>
              <option value="newest" <?php if(isset($_GET['sort_by']) && $_GET['sort_by'] == "newest") echo 'selected="selected"';?>>Newly Added</option>
            </select>
            <button class="filter-button" type="button">Filters
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                  <g id="Group_339" data-name="Group 339" transform="translate(-1071.5 -533.5)">
                  <line id="Line_92" data-name="Line 92" x2="12" transform="translate(1071.5 535.5)" fill="none" stroke="#000" stroke-width="1"/>
                  <line id="Line_93" data-name="Line 93" x2="12" transform="translate(1071.5 543.5)" fill="none" stroke="#000" stroke-width="1"/>
                  <line id="Line_94" data-name="Line 94" x2="12" transform="translate(1071.5 539.5)" fill="none" stroke="#000" stroke-width="1"/>
                  <circle id="Ellipse_174" data-name="Ellipse 174" cx="2" cy="2" r="2" transform="translate(1073 533.5)"/>
                  <circle id="Ellipse_175" data-name="Ellipse 175" cx="2" cy="2" r="2" transform="translate(1078 537.5)"/>
                  <circle id="Ellipse_176" data-name="Ellipse 176" cx="2" cy="2" r="2" transform="translate(1075 541.5)"/>
                  </g>
              </svg>
            </button>
          </div>
        </div>

                  <?php

                
                // exit;
                  $featured_args_course = array(
                    'post_type' => 'course',
                    'post_status' => 'publish',
                    'meta_query'  => array(
                    'relation'  => 'AND',
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
                  if (empty($_GET)) {
                    if(!empty($course_id)){
                      $query_args = apply_filters('wplms_mycourses',array(
                          'post_type'=>'course',
                          'post__in'=>$course_id,
                          'posts_per_page'=>16,
                          'post_status' => 'publish',
                          'orderby' => 'post__in', 
                          'paged'=>$paged,
                      ));

                      $wp_query = new WP_Query($query_args);
                    }
                  }
                  if(isset($_GET['sort_by']) && empty($_GET['session']) && empty($_GET['age']) && empty($_GET['category'])){
                    $args=array('post_type' => 'course','post_status' => 'publish','posts_per_page' => 16,'paged' => $paged);
          
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
                      'posts_per_page'=>16,
                      'paged'=>$paged,
                      'orderby' => 'post__in',
                    );   
                    $wp_query = new WP_Query( $args_all_course );
                    //echo "Last SQL-Query: {$wp_query->request}";
                  }

                  if(isset($_GET['category']) && empty($_GET['session']) && empty($_GET['age']) && empty($_GET['sort_by']) ){
                    $category_filter = explode(",",$_GET['category']);
                    $args = array(
                        'post_type' => 'course',
                        'posts_per_page'=>16,
                        'paged'=>$paged,
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
                        'posts_per_page'=>16,
                        'paged'=>$paged,
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
                        $args['posts_per_page'] = 16;
                      break;
                      case 'newest':
                        $args['orderby'] = 'date';
                        $args['posts_per_page'] = 16;
                      break;
                      case 'rated':
                        $args['orderby'] = 'meta_value_num';
                        $args['meta_key'] = 'average_rating';
                        $args['posts_per_page'] = 16;
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
                      'posts_per_page'=>16,
                      'paged'=>$paged,
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
                      'posts_per_page'=>16,
                      'paged'=>$paged,
                       'orderby'  => 'meta_value_num', 
                      );
                    switch($filter){
                      case 'popular':
                        $args['orderby'] = 'meta_value_num';
                        $args['meta_key'] = 'vibe_students';
                        $args['posts_per_page'] = 16;
                      break;
                      case 'newest':
                        $args['orderby'] = 'date';
                        $args['posts_per_page'] = 16;
                      break;
                      case 'rated':
                        $args['orderby'] = 'meta_value_num';
                        $args['meta_key'] = 'average_rating';
                        $args['posts_per_page'] = 16;
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
                      'posts_per_page'=>16,
                      'paged'=>$paged,
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
                      'posts_per_page'=>16,
                      'paged'=>$paged,
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
                        $args['posts_per_page'] = 16;
                      break;
                      case 'newest':
                        $args['orderby'] = 'date';
                        $args['posts_per_page'] = 16;
                      break;
                      case 'rated':
                        $args['orderby'] = 'meta_value_num';
                        $args['meta_key'] = 'average_rating';
                        $args['posts_per_page'] = 16;
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
                    $ageLastEle = $age_filter[count($age_filter) - 1];
                    $age = $wpdb->prepare("SELECT SQL_CALC_FOUND_ROWS ht_posts.ID FROM ht_posts INNER JOIN ht_postmeta ON ( ht_posts.ID = ht_postmeta.post_id ) LEFT JOIN ht_postmeta AS rel ON ht_posts.ID = rel.post_id WHERE 1=1 AND ht_posts.post_type = 'course' AND (ht_posts.post_status = 'publish' OR ht_posts.post_status = 'acf-disabled') AND rel.meta_key= 'vibe_course_age_group' AND SUBSTRING_INDEX(rel.meta_value, '-', 2) != '' AND (SUBSTRING_INDEX(rel.meta_value, '-', 1) <= ".$ageLastEle." AND SUBSTRING_INDEX(rel.meta_value, '-', 2) >= ".$ageFirstEle.") GROUP BY ht_posts.ID ORDER BY ht_postmeta.meta_value+0 DESC LIMIT 0, 16 ");
                    $age_result = $wpdb->get_results($age);
                    foreach($age_result as $course){
                      $age_args['post__in'][]=$course->ID;
                    }
                    if(!empty($age_args['post__in'])){
                      $query_args = array(
                       'post_type' => 'course',
                        'posts_per_page'=>16,
                        'paged'=>$paged,
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
                    $age_with_category = $wpdb->prepare("SELECT  ht_posts.post_title AS course,ht_posts.ID FROM ht_posts LEFT JOIN ht_postmeta AS rel ON ht_posts.ID = rel.post_id LEFT JOIN ht_term_relationships ON (ht_posts.ID = ht_term_relationships.object_id) WHERE 1=1 AND ( ht_term_relationships.term_taxonomy_id IN (".$_GET['category'].") ) AND ht_posts.post_type = 'course' AND (ht_posts.post_status = 'publish' OR ht_posts.post_status = 'acf-disabled' OR ht_posts.post_author = 2 AND ht_posts.post_status = 'private') AND rel.meta_key= 'vibe_course_age_group' AND SUBSTRING_INDEX(rel.meta_value, '-', 2) != '' AND (SUBSTRING_INDEX(rel.meta_value, '-', 1) <= ".$ageLastEle." AND SUBSTRING_INDEX(rel.meta_value, '-', 2) >= ".$ageFirstEle.") GROUP BY ht_posts.ID ORDER BY ht_posts.post_date DESC LIMIT 0, 16");
                    $age_with_category_result = $wpdb->get_results($age_with_category);
                    foreach($age_with_category_result as $course){
                      $age_with_category_args['post__in'][]=$course->ID;
                    }
                    if(!empty($age_with_category_args['post__in'])){
                      $query_args = array(
                               'post_type' => 'course',
                                'posts_per_page'=>16,
                                'paged'=>$paged,
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
                    $ageFirstEle = $age_filter[0];
                    $ageLastEle = $age_filter[count($age_filter) - 1];
                    $age_with_category = "SELECT  ht_posts.post_title AS course,ht_posts.ID FROM ht_posts LEFT JOIN ht_postmeta ON ht_posts.ID = ht_postmeta.post_id LEFT JOIN ht_postmeta AS rel ON ht_posts.ID = rel.post_id LEFT JOIN ht_term_relationships ON (ht_posts.ID = ht_term_relationships.object_id) WHERE 1=1 AND ( ht_term_relationships.term_taxonomy_id IN (".$_GET['category'].") ) AND ht_posts.post_type = 'course' AND (ht_posts.post_status = 'publish' OR ht_posts.post_status = 'acf-disabled' OR ht_posts.post_author = 2 AND ht_posts.post_status = 'private') AND ( ( ht_postmeta.meta_key = 'vibe_course_sessions'";
                    if(in_array(31, $sessions_filter)){
                      $age_session_sortby_category .= " AND CAST(ht_postmeta.meta_value AS SIGNED) >= '31' ) )";
                    }else{
                      $age_with_category .= " AND CAST(ht_postmeta.meta_value AS SIGNED) BETWEEN ".$firstEle." AND ".$lastEle." ) )";
                    }
                      $age_with_category .= " AND rel.meta_key= 'vibe_course_age_group' AND SUBSTRING_INDEX(rel.meta_value, '-', 2) != '' AND (SUBSTRING_INDEX(rel.meta_value, '-', 1) <= ".$ageLastEle." AND SUBSTRING_INDEX(rel.meta_value, '-', 2) >= ".$ageFirstEle.") GROUP BY ht_posts.ID ORDER BY ht_posts.post_date DESC LIMIT 0, 16";
                    $age_with_category_result = $wpdb->get_results($age_with_category);
                    foreach($age_with_category_result as $course){
                      $age_with_category_args['post__in'][]=$course->ID;
                    }
                    if(!empty($age_with_category_args['post__in'])){
                      $query_args = array(
                               'post_type' => 'course',
                                'posts_per_page'=>16,
                                'paged'=>$paged,
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
                    $age_session_sortby_category .= " AND rel.meta_key= 'vibe_course_age_group' AND SUBSTRING_INDEX(rel.meta_value, '-', 2) != '' AND (SUBSTRING_INDEX(rel.meta_value, '-', 1) <= ".$ageLastEle." AND SUBSTRING_INDEX(rel.meta_value, '-', 2) >= ".$ageFirstEle.")";
                    if($sortby_filter == 'rated')
                    $age_session_sortby_category .= " AND ( meta2.meta_key = 'average_rating' )"; 
                    if($sortby_filter == 'popular')
                    $age_session_sortby_category .= " AND ( meta2.meta_key = 'vibe_students' )";
                    $age_session_sortby_category .= " GROUP BY ht_posts.ID ORDER BY ht_posts.post_date DESC LIMIT 0, 16";
                    //print_r($age_session_sortby_category);
                    $age_session_sortby_category_result = $wpdb->get_results($age_session_sortby_category);
                    foreach($age_session_sortby_category_result as $course){
                      $age_session_sortby_category_args['post__in'][]=$course->ID;
                    }
                    if(!empty($age_session_sortby_category_args['post__in'])){
                      $query_args = array(
                               'post_type' => 'course',
                                'posts_per_page'=>16,
                                'paged'=>$paged,
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
                    if(in_array(31, $sessions_filter)){
                      $age_with_session .= " AND CAST(ht_postmeta.meta_value AS SIGNED) >= '31' ) )";
                    }
                    else{
                      $age_with_session .= " AND CAST(ht_postmeta.meta_value AS SIGNED) BETWEEN ".$firstEle." AND ".$lastEle." ) )";
                    }
                    $age_with_session .= " AND ht_posts.post_type = 'course' AND (ht_posts.post_status = 'publish' OR ht_posts.post_status = 'acf-disabled') AND rel.meta_key= 'vibe_course_age_group' AND SUBSTRING_INDEX(rel.meta_value, '-', 2) != '' AND (SUBSTRING_INDEX(rel.meta_value, '-', 1) <= ".$ageLastEle." AND SUBSTRING_INDEX(rel.meta_value, '-', 2) >= ".$ageFirstEle.") GROUP BY ht_posts.ID ORDER BY ht_postmeta.meta_value+0 DESC LIMIT 0, 16 ";
                    $age_with_session_result = $wpdb->get_results($age_with_session);
                    foreach($age_with_session_result as $course){
                      $age_with_session_args['post__in'][]=$course->ID;
                    }
                    if(!empty($age_with_session_args['post__in'])){
                      $query_args = array(
                       'post_type' => 'course',
                        'posts_per_page'=>16,
                        'paged'=>$paged,
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
                    $age_with_sortby .= " AND rel.meta_key= 'vibe_course_age_group' AND SUBSTRING_INDEX(rel.meta_value, '-', 2) != '' AND (SUBSTRING_INDEX(rel.meta_value, '-', 1) <= ".$ageLastEle." AND SUBSTRING_INDEX(rel.meta_value, '-', 2) >= ".$ageFirstEle.") GROUP BY ht_posts.ID ORDER BY rel.meta_value+0 DESC LIMIT 0, 16";
                    $age_with_sortby_result = $wpdb->get_results($age_with_sortby);

                    if($sortby_filter == 'newest')
                    $age_with_sortby = $wpdb->prepare("SELECT SQL_CALC_FOUND_ROWS ht_posts.ID FROM ht_posts LEFT JOIN ht_postmeta AS rel ON ht_posts.ID = rel.post_id WHERE 1=1 AND ht_posts.post_type = 'course' AND (ht_posts.post_status = 'publish' OR ht_posts.post_status = 'acf-disabled') AND rel.meta_key= 'vibe_course_age_group' AND SUBSTRING_INDEX(rel.meta_value, '-', 2) != '' AND (SUBSTRING_INDEX(rel.meta_value, '-', 1) <= ".$ageLastEle." AND SUBSTRING_INDEX(rel.meta_value, '-', 2) >= ".$ageFirstEle.") ORDER BY ht_posts.post_date DESC LIMIT 0, 16");
                    $age_with_sortby_result = $wpdb->get_results($age_with_sortby);
                   
                    foreach($age_with_sortby_result as $course){
                      $age_with_sortby_args['post__in'][]=$course->ID;
                    }
                    if(!empty($age_with_sortby_args['post__in'])){
                      $query_args = array(
                               'post_type' => 'course',
                                'posts_per_page'=>16,
                                'paged'=>$paged,
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
                    $age_sortby_session .= " AND rel.meta_key= 'vibe_course_age_group' AND SUBSTRING_INDEX(rel.meta_value, '-', 2) != '' AND (SUBSTRING_INDEX(rel.meta_value, '-', 1) <= ".$ageLastEle." AND SUBSTRING_INDEX(rel.meta_value, '-', 2) >= ".$ageFirstEle.") AND ( ( meta2.meta_key = 'vibe_course_sessions'";
                    if(in_array(31, $sessions_filter)){
                      $age_with_session .= " AND CAST(ht_postmeta.meta_value AS SIGNED) >= '31' ) )";
                    }
                    else{
                      $age_sortby_session .= " AND CAST(meta2.meta_value AS SIGNED) BETWEEN ".$firstEle." AND ".$lastEle." ) ) ";
                    }
                    $age_sortby_session .= " GROUP BY ht_posts.ID ORDER BY rel.meta_value+0 DESC LIMIT 0, 16";
                    $age_sortby_session_result = $wpdb->get_results($age_sortby_session);
                    if($sortby_filter == 'newest')
                    $age_sortby_session = $wpdb->prepare("SELECT SQL_CALC_FOUND_ROWS ht_posts.ID FROM ht_posts LEFT JOIN ht_postmeta AS rel ON ht_posts.ID = rel.post_id WHERE 1=1 AND ht_posts.post_type = 'course' AND (ht_posts.post_status = 'publish' OR ht_posts.post_status = 'acf-disabled') AND rel.meta_key= 'vibe_course_age_group' AND SUBSTRING_INDEX(rel.meta_value, '-', 2) != '' AND (SUBSTRING_INDEX(rel.meta_value, '-', 1) <= ".$ageLastEle." AND SUBSTRING_INDEX(rel.meta_value, '-', 2) >= ".$ageFirstEle.") ORDER BY ht_posts.post_date DESC LIMIT 0, 16");
                    $age_sortby_session_result = $wpdb->get_results($age_sortby_session);
                   
                    foreach($age_sortby_session_result as $course){
                      $age_sortby_session_args['post__in'][]=$course->ID;
                    }
                    if(!empty($age_sortby_session_args['post__in'])){
                      $query_args = array(
                               'post_type' => 'course',
                                'posts_per_page'=>16,
                                'paged'=>$paged,
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
                    $age_sortbycategory .= " AND rel.meta_key= 'vibe_course_age_group' AND SUBSTRING_INDEX(rel.meta_value, '-', 2) != '' AND (SUBSTRING_INDEX(rel.meta_value, '-', 1) <= ".$ageLastEle." AND SUBSTRING_INDEX(rel.meta_value, '-', 2) >= ".$ageFirstEle.")";
                    $age_sortbycategory .= " GROUP BY ht_posts.ID ORDER BY rel.meta_value+0 DESC LIMIT 0, 16";
                    $age_sortbycategory_result = $wpdb->get_results($age_sortbycategory);
                    if($sortby_filter == 'newest')
                    $age_sortbycategory = $wpdb->prepare("SELECT SQL_CALC_FOUND_ROWS ht_posts.ID FROM ht_posts LEFT JOIN ht_postmeta AS rel ON ht_posts.ID = rel.post_id WHERE 1=1 AND ht_posts.post_type = 'course' AND (ht_posts.post_status = 'publish' OR ht_posts.post_status = 'acf-disabled') AND rel.meta_key= 'vibe_course_age_group' AND SUBSTRING_INDEX(rel.meta_value, '-', 2) != '' AND (SUBSTRING_INDEX(rel.meta_value, '-', 1) <= ".$ageLastEle." AND SUBSTRING_INDEX(rel.meta_value, '-', 2) >= ".$ageFirstEle.") ORDER BY ht_posts.post_date DESC LIMIT 0, 16");
                    $age_sortbycategory_result = $wpdb->get_results($age_sortbycategory);
                      foreach($age_sortbycategory_result as $course){
                        $age_sortbycategory_args['post__in'][]=$course->ID;
                      }
                      if(!empty($age_sortbycategory_args['post__in'])){
                      $query_args = array(
                               'post_type' => 'course',
                                'posts_per_page'=>16,
                                'paged'=>$paged,
                                'post__in'=>$age_sortbycategory_args['post__in'],
                                
                                );
                      $wp_query = new WP_Query($query_args);
                    }
                    }

                  if(!empty($wp_query)){
                    $i=0;
                    if ($wp_query->have_posts()){
                    while ($wp_query->have_posts()) : $wp_query->the_post();
                    if(get_post_type() == 'course'){
                        global $post;
                      $custom_fields = get_post_custom();
                      $duration = $custom_fields['vibe_validity'][0];
                      $durationParameter = get_post_meta($post->ID,'vibe_course_validity_parameter',true);
                      $session = $custom_fields['vibe_course_sessions'][0];
                      $age_limit = $custom_fields['vibe_course_age_group'][0];
                      $category_array = get_the_terms( $post->ID, 'course-cat');
                      $excerpt = get_post_field('post_excerpt', $post->ID);
                  if($i%4 == 0){
                    if ($i != 0){
                    ?>
                      </div>
                    <?php }?>
                    <div class="courses-wrapper">
                  <?php } ?>
                  <div class="column">
                    <div class="column-header">
                      <span class="category"><?php echo $category_array[0]->name; ?></span>
                      <div class="share">
                <ul>
                  <?php
                     if(is_user_logged_in()){
                      ?>
                      <li style="list-style-type: none;"><?php wpfp_course_link(); ?></li>
                    <?php }else{
                      $url = "/login-register";
                      ?>
                      <li style="list-style-type: none;"><a href="<?php echo get_site_url().$url; ?>"><i class="add-wishlist" title="Add to Wishlist"></i></a></li> 
                      <?php
                    }
                    ?>
                  <li class="hover_share">
                    <img alt="share icon" title="share icon" src="<?php echo get_bloginfo('template_url');?>/assets/images/share-icon.svg">
                    <div class="display_icon">
                      <h6>Share <span><i class="bi bi-x close-share"></i></span></h6>
                      <div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="<?php echo get_bloginfo('url')?>/course/<?php echo $post->post_name;?>" data-a2a-title="<?php echo $post->post_title. ' - '.get_bloginfo(); ?>">
                        <a class="a2a_button_facebook"></a>
                        <a class="a2a_button_twitter"></a>
                        <a class="a2a_button_pinterest"></a>
                        <a class="a2a_button_google_gmail"></a>
                        <a class="a2a_button_whatsapp"></a>
                        <a class="a2a_button_telegram"></a>
                      </div><script async src="https://static.addtoany.com/menu/page.js"></script>
                    </div>
                  </li>
                </ul>
                <script async src="https://static.addtoany.com/menu/page.js"></script>
            </div>
                    </div>
            
            <?php
              if ( has_post_thumbnail() ) {
                $image_url = get_the_post_thumbnail_url();
              }
            ?>
            <a href="<?php echo get_permalink($post->ID);?>"><figure class="course-hero"><img alt="Celebrity Course" src="<?php echo $image_url; ?>"></figure></a>
            <div class="course-copy">
            <h3 class="course-title"><?php echo bp_course_title(); ?></h3>
            <ul class="data">
                <li>
                    <span class="attribute">Duration</span>
                    <?php if($duration == '') { ?>
                      <span class="value">--</span>
                    <?php } else{ ?>
                      <span class="value"><?php if($duration != ''){echo $duration; }?><strong><?php if($durationParameter != ''){echo ' '.calculate_duration($durationParameter); }?> </strong></span>
                    <?php }?>
                </li>
                <li>
                    <span class="attribute">Age Limit</span>
                    <?php if($age_limit == '') { ?>
                      <span class="value">--</span>
                    <?php } else{ ?>
                      <span class="value"><?php if($age_limit != ''){echo $age_limit.' ' ; }?><strong>yrs</strong></span>
                    <?php }?>
                </li>
            </ul>
            <div class="action">
                <div class="price"><?php the_course_price(); ?></div>
                <?php the_course_button(); ?>
            </div>
            
            </div>
        </div>
                <?php }else{
                  ?>
                  <div class="no-data">
                    <img src="<?php echo bloginfo('template_url')?>/assets/images/nofilter-icon.png">
                    <p>No courses that match the selected filters! Please reset filters and try again.</p>
                    <a href="<?php echo bloginfo('url')?>/courses" class="black-button">Reset Filters</a>
                  </div>
                <?php } $i++; endwhile;}else{?>
                  <div class="no-data">
                    <img src="<?php echo bloginfo('template_url')?>/assets/images/nofilter-icon.png">
                    <p>No courses that match the selected filters! Please reset filters and try again.</p>
                    <a href="<?php echo bloginfo('url')?>/courses" class="black-button">Reset Filters</a>
                  </div>
                <?php }} ?>
                </div>
            </div>
        <?php posts_pagination(); ?>
      </div>
      
</section>
</main>
<?php
get_footer(vibe_get_footer());
?>