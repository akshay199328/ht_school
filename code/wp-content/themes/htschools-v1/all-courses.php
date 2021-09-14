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
                    <label for="session<?php echo $i;?>">
                        <span><?php echo $sessions['name']?></span>
                        <input type="checkbox" name="sessions" class="sessions" value="<?php echo $sessions['value']?>" <?php echo $session_selected;?>>
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
                    <label for="age<?php echo $i;?>" id="">
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
                    <label for="category<?php echo $i;?>" id="">
                        <span><?php echo $category['name']?></span>
                        <input type="checkbox" name="category" class="category" value="<?php echo $category['term_id'];?>" <?php echo $category_selected;?>>
                    </label>
                    <?php $i++;}?>
                </div>
            </div>
            <div class="filter-footer">
                <button type="submit">Cancel</button>
                <button type="submit">Apply</button>
            </div>
        </div>
        <div class="all-courses">
            <div class="header">
                <h3 class="all-courses-title">All Our Courses</h3>
                <div class="sort">
                    Sort by : <select id="sort_by">
                        <option value="popular" <?php if(isset($_GET['sort_by']) && $_GET['sort_by'] == "popular") echo 'selected="selected"';?>>Most Popular</option>
                        <option value="rated" <?php if(isset($_GET['sort_by']) && $_GET['sort_by'] == "rated") echo 'selected="selected"';?>>Highest Rated</option>
                        <option value="newest" <?php if(isset($_GET['sort_by']) && $_GET['sort_by'] == "newest") echo 'selected="selected"';?>>Newly Added</option>
                    </select>
                </div>
            </div>
            <div class="filter-tags" id="filter-tags">
                <span class="tag">21 - 30 Sessions<button class="close" type="submit"></button></span>
                <span class="tag">21 - 30 Sessions<button class="close" type="submit"></button></span>
                <span class="tag">Artificial Intelligence<button class="close" type="submit"></button></span>
                <span class="tag">Voice Protection<button class="close" type="submit"></button></span>
            </div>
            <div class="course-wrapper">
                <?php
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
                  if(!empty($wp_query)){
                    $i=0;
                    if ($wp_query->have_posts()){
                    while ($wp_query->have_posts()) : $wp_query->the_post();
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
                      $user = wp_get_current_user();
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
                    ?>
                    
                    <div class="column">
                        <div class="course-card">
                            <figure class="image"><img alt="<?php echo $post->post_title ?>" src="<?php echo $image_url;?>"></figure>
                            <div class="course-copy">
                                <header class="course-header">
                                    <a class="category" href="#"></a><?php echo $category_array[0]->name;?></a>
                                    <span class="badge <?php echo $badge_class;?>"><?php echo $course_type;?></span>
                                </header>
                                <h2 class="course-title"><a href="#!"><?php echo bp_course_title(); ?></a></h2>
                                <footer class="course-footer">
                                    <div class="left">
                                        <?php the_course_button();?>
                                        <?php the_course_price();?>
                                    </div>
                                    <div class="right">
                                        <a href="#!">
                                            <svg class="cart" xmlns="http://www.w3.org/2000/svg" width="26" height="21.587" viewBox="0 0 26 21.587"> <g id="Group_20746" data-name="Group 20746" transform="translate(1 1)"> <g id="Group_15651" data-name="Group 15651" transform="translate(0 0)"> <path id="Path_30160" data-name="Path 30160" d="M-11952.5,9580.5h3.393l5.136,15.36h12.108" transform="translate(11952.5 -9580.5)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/> <path id="Path_30161" data-name="Path 30161" d="M-11898.5,9610.5h20.038l-3.893,9.023h-13" transform="translate(11902.465 -9607.673)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/> <g id="Ellipse_440" data-name="Ellipse 440" transform="translate(7.67 17.428)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"> <circle cx="1.579" cy="1.579" r="1.579" stroke="none"/> <circle cx="1.579" cy="1.579" r="0.579" fill="none"/> </g> <g id="Ellipse_441" data-name="Ellipse 441" transform="translate(16.874 17.428)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"> <circle cx="1.579" cy="1.579" r="1.579" stroke="none"/> <circle cx="1.579" cy="1.579" r="0.579" fill="none"/> </g> </g> </g> </svg>
                                        </a>
                                        <a href="#!">
                                            <svg class="bookmark filled" xmlns="http://www.w3.org/2000/svg" width="17" height="21.146" viewBox="0 0 17 21.146"><path id="Path_38323" data-name="Path 38323" d="M31.409,38.413,35.5,34.368l4.091,4.045a2.083,2.083,0,0,0,2.79.074A1.773,1.773,0,0,0,43,37.147v-14.3A2.964,2.964,0,0,0,39.932,20H31.068A2.964,2.964,0,0,0,28,22.849V37.159A1.906,1.906,0,0,0,29.965,39a2.049,2.049,0,0,0,1.444-.575Z" transform="translate(-27 -19)"/></svg>
                                        </a>
                                        <a href="#!" class="sharing">
                                            <svg class="share" xmlns="http://www.w3.org/2000/svg" width="25.445" height="19.4" viewBox="0 0 25.445 19.4"> <g id="Group_20744" data-name="Group 20744" transform="translate(0.205 0.2)" style="isolation: isolate"> <path id="Path_38322" data-name="Path 38322" d="M21.417,21a.53.53,0,0,1,.275.133l9.091,8.188a.724.724,0,0,1,.1.919.626.626,0,0,1-.1.114l-9.091,8.188a.52.52,0,0,1-.8-.12.723.723,0,0,1-.118-.392V34.746a18.89,18.89,0,0,0-4.705.389,17.55,17.55,0,0,0-9.127,4.7.518.518,0,0,1-.8-.062.733.733,0,0,1-.113-.634C8.4,30.71,15.625,26.694,20.778,25.094V21.655a.618.618,0,0,1,.564-.66A.446.446,0,0,1,21.417,21Zm.5,1.985v2.6a.645.645,0,0,1-.426.634C17,27.53,10.737,30.858,7.913,37.407a19.292,19.292,0,0,1,7.964-3.562,21.972,21.972,0,0,1,5.5-.4.621.621,0,0,1,.542.655v2.589l7.6-6.848Z" transform="translate(-6.003 -20.995)" stroke-width="0.4"/> </g> </svg>
                                        </a>
                                    </div>
                                </footer>
                            </div>
                        </div>
                    </div>
                <?php }$i++; endwhile;}} ?>
            </div>
        </div>
    </div>
</main>
 
<?php
get_footer(vibe_get_footer());
?>