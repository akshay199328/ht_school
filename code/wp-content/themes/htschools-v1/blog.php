<?php
/**
 * Template Name: News
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header(vibe_get_header());
$page_id = get_the_ID();

$title=get_post_meta(get_the_ID(),'vibe_title',true);
if(vibe_validate($title) || empty($title)){
  ?>
  <section class="news_heading">
    <div class="innerheader-space"></div>
    <?php do_action('wplms_before_title'); ?>
    <div class="<?php echo vibe_get_container(); ?>">
      <div class="row">
        <div class="col-md-12">
          <div class="pagetitle breadcrumbs background-breadcrumbs">
            <?php
            $breadcrumbs=get_post_meta(get_the_ID(),'vibe_breadcrumbs',true);
            if(vibe_validate($breadcrumbs) || empty($breadcrumbs))
              vibe_breadcrumbs();
            ?>
            <h2><?php the_title(); ?></h2>
            <?php the_sub_title(); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
}
?>
<?php
$menu_name = 'news-menu'; //menu slug
$locations = get_nav_menu_locations();
$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
?>
<section class="editor_desk">
  <section class="home-section">
      <div class="home-copy">
          <header class="section-header">
              <h2 class="large-title">Editor’s Desk</h2>
              <a class="view-all" href="#!">View More</a>
          </header>
        </div>
        <div class="home-copy">
          <div class="nav-tabs-wrapper">
            <ul class="nav nav-tabs" id="allCoursesLinks" role="tablist">
                <?php
                ?>
                <li class="nav-item" role="presentation">
                    <a class="nav-link " id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">Latest</a>
                </li>
                <?php
                  foreach ($menuitems as $menu) {
                ?>  
                <li class="nav-item" role="presentation" id="<?php echo $menu->ID; ?>">
                    <a class="nav-link " id="<?php echo $menu->ID; ?>" data-toggle="tab" href="<?php echo $menu->url; ?>" role="tab" aria-controls="all" aria-selected="true"><?php echo $menu->title; ?></a>
                </li>
                <?php
          }
          ?>
            </ul>
          </div>
        </div>
      </section>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            <div class="home-section">
              
            </div>
        </div>
      </div>
</section>
<section class="home-section infographics">
      <div class="home-copy">
        <header class="section-header">
            <h2 class="semi_medium-title">Infographics</h2>
            <a class="view-all" href="#!">View More</a>
        </header>
      <div class="owl-carousel owl-theme student_slider">
        <?php
        $args1 = array(
          'post_type' => 'testimonials',
          'post_status' => 'publish',

        );
        $Query1 = new WP_Query( $args1 );
        
        if ($Query1->have_posts()) : while ($Query1->have_posts()) : $Query1->the_post();
          $custom_fields = get_post_custom();
          $url = wp_get_attachment_url($custom_fields['image'][0]); 
        ?>
          <div class="item">
            <div class="course-card">
              <figure class="video">
                <img src="<?php echo $url;?>">
                <a class="play" href="#!"><span class="time">3:20</span></a>
              </figure>
              <div class="course-copy">
                <h2 class="course-title"><a href="#!"><?php echo the_content(); ?></a></h2>
                <footer class="course-footer">
                  <div class="left">
                    <div class="profile">
                      <span class="name"><?php echo $custom_fields['vibe_testimonial_author_name'][0] ?></span>
                      <span class="position"><?php echo $custom_fields['vibe_testimonial_author_designation'][0] ?></span>
                    </div>
                  </div>
                  <div class="right">
                    <a href="#!">
                    <svg class="share" xmlns="http://www.w3.org/2000/svg" width="25.445" height="19.4" viewBox="0 0 25.445 19.4"> <g id="Group_20744" data-name="Group 20744" transform="translate(0.205 0.2)" style="isolation: isolate"> <path id="Path_38322" data-name="Path 38322" d="M21.417,21a.53.53,0,0,1,.275.133l9.091,8.188a.724.724,0,0,1,.1.919.626.626,0,0,1-.1.114l-9.091,8.188a.52.52,0,0,1-.8-.12.723.723,0,0,1-.118-.392V34.746a18.89,18.89,0,0,0-4.705.389,17.55,17.55,0,0,0-9.127,4.7.518.518,0,0,1-.8-.062.733.733,0,0,1-.113-.634C8.4,30.71,15.625,26.694,20.778,25.094V21.655a.618.618,0,0,1,.564-.66A.446.446,0,0,1,21.417,21Zm.5,1.985v2.6a.645.645,0,0,1-.426.634C17,27.53,10.737,30.858,7.913,37.407a19.292,19.292,0,0,1,7.964-3.562,21.972,21.972,0,0,1,5.5-.4.621.621,0,0,1,.542.655v2.589l7.6-6.848Z" transform="translate(-6.003 -20.995)" stroke-width="0.4"/> </g> </svg>
                    </a>
                  </div>
                </footer>
              </div>
            </div>
          </div>
        <?php
          endwhile; endif;
        ?> 
        </div>
      </div>
  </section>

<section class="home-section videos">
      <div class="home-copy">
        <header class="section-header">
            <h2 class="semi_medium-title">Videos</h2>
            <a class="view-all" href="#!">View More</a>
        </header>
      <div class="owl-carousel owl-theme student_slider">
        <?php
        $args1 = array(
          'post_type' => 'testimonials',
          'post_status' => 'publish',

        );
        $Query1 = new WP_Query( $args1 );
        
        if ($Query1->have_posts()) : while ($Query1->have_posts()) : $Query1->the_post();
          $custom_fields = get_post_custom();
          $url = wp_get_attachment_url($custom_fields['image'][0]); 
        ?>
          <div class="item">
            <div class="course-card">
              <figure class="video">
                <img src="<?php echo $url;?>">
                <a class="play" href="#!"><span class="time">3:20</span></a>
              </figure>
              <div class="course-copy">
                <h2 class="course-title"><a href="#!"><?php echo the_content(); ?></a></h2>
                <footer class="course-footer">
                  <div class="left">
                    <div class="profile">
                      <span class="name"><?php echo $custom_fields['vibe_testimonial_author_name'][0] ?></span>
                      <span class="position"><?php echo $custom_fields['vibe_testimonial_author_designation'][0] ?></span>
                    </div>
                  </div>
                  <div class="right">
                    <a href="#!">
                    <svg class="share" xmlns="http://www.w3.org/2000/svg" width="25.445" height="19.4" viewBox="0 0 25.445 19.4"> <g id="Group_20744" data-name="Group 20744" transform="translate(0.205 0.2)" style="isolation: isolate"> <path id="Path_38322" data-name="Path 38322" d="M21.417,21a.53.53,0,0,1,.275.133l9.091,8.188a.724.724,0,0,1,.1.919.626.626,0,0,1-.1.114l-9.091,8.188a.52.52,0,0,1-.8-.12.723.723,0,0,1-.118-.392V34.746a18.89,18.89,0,0,0-4.705.389,17.55,17.55,0,0,0-9.127,4.7.518.518,0,0,1-.8-.062.733.733,0,0,1-.113-.634C8.4,30.71,15.625,26.694,20.778,25.094V21.655a.618.618,0,0,1,.564-.66A.446.446,0,0,1,21.417,21Zm.5,1.985v2.6a.645.645,0,0,1-.426.634C17,27.53,10.737,30.858,7.913,37.407a19.292,19.292,0,0,1,7.964-3.562,21.972,21.972,0,0,1,5.5-.4.621.621,0,0,1,.542.655v2.589l7.6-6.848Z" transform="translate(-6.003 -20.995)" stroke-width="0.4"/> </g> </svg>
                    </a>
                  </div>
                </footer>
              </div>
            </div>
          </div>
        <?php
          endwhile; endif;
        ?> 
        </div>
      </div>
  </section>

   <?php
        get_footer(vibe_get_footer());
        ?>