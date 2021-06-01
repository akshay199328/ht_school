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
              <span class="name"><?php print_r(the_content()); ?></span>
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
                  $featured_args_course = array(
                    'post_type' => 'course',
                    'post_status' => 'publish',
                    'posts_per_page' => 3,
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
                  if(!empty($course_id)){
                    $query_args = apply_filters('wplms_mycourses',array(
                        'post_type'=>'course',
                        'post__in'=>$course_id,
                        'posts_per_page'=>8,
                        'orderby' => 'post__in', 
                        'paged'=>$paged,
                    ));

                    $wp_query = new WP_Query($query_args);
                  }
                  if(!empty($wp_query)){
                    $i=0;
                    while ($wp_query->have_posts()){
                      $wp_query->the_post();
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
            <span class="category"><?php echo $category_array[0]->name; ?></span>
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
        </div>
                <?php $i++; }} ?>
                </div>
            </div>
        <?php posts_pagination(); ?>
      </div>
      
</section>
</main>
<?php
get_footer(vibe_get_footer());
?>