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
  <section class="top-section home-section editor_desk" >
    <?php do_action('wplms_before_title'); ?>
    <div class="home-copy">
      <div class="pagetitle breadcrumbs background-breadcrumbs">
            <?php
            $breadcrumbs=get_post_meta(get_the_ID(),'vibe_breadcrumbs',true);
            if(vibe_validate($breadcrumbs) || empty($breadcrumbs))
              vibe_breadcrumbs();
            ?>
          <header class="section-header">
            <h2 class="semi_medium-title"><?php the_title(); ?></h2>
            <?php the_sub_title(); ?>
          </header>
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


<!-- ======= Featured ======= -->

<section id="All" data-anchor="All" class="home-section editor_desk">
  <div class="featured_tablist mrg">
        <ul class="tablist left_tab">
      <?php
      ?>
        <li class="active news-li" data-scroll="All" id="All"><a href="#" data-id="All">Latest</a></li>
      <?php
      foreach ($menuitems as $menu) {
        ?>
        <li id="<?php echo $menu->ID; ?>" class="news-li" data-scroll="<?php echo $menu->ID; ?>"><a href="<?php echo $menu->url; ?> " data-id="<?php echo $menu->ID; ?>"><?php echo $menu->title; ?></a></li>
        <?php
      }
      ?>
      </ul>
    </div>
    <!-- <div class="featured_headeing">
      <h1>Featured News</h1>
    </div> -->
    <?php
    $args = array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'posts_per_page' => 4,
      'order'=>'DESC',
    );
    $Query = new WP_Query( $args );
    if ($Query->have_posts()) : while ($Query->have_posts()) : $Query->the_post();
      if( $Query->current_post == 0 ) {
        ?>
        <div class="articles">
        <div class="featured">
            <div class="image">
          <?php if ( has_post_thumbnail() ) {
              $featured_image = get_the_post_thumbnail_url();
            }
            ?>
              <a href="<?php the_permalink(); ?>"> 
                <img src="<?php echo $featured_image; ?>" class="img-fluid">
              </a>
            </div>
            <span class="date-time"><?php echo strtoupper(get_post_meta(get_the_ID(), 'news_location', true));?> <?php echo get_the_date('M d, Y H:i'); ?></span>
            <h2 class="article-title">
              <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
            </h2>
        </div>
      <?php } endwhile; endif;?>
      <div class="img-artlce">
                <?php if ($Query->have_posts()) : while ($Query->have_posts()) : $Query->the_post();
                          if( $Query->current_post != 0 ) {
                  ?>
        <div class="column">
              
                  <div class="image">
                    <?php if ( has_post_thumbnail() ) {
                      $featured_image = get_the_post_thumbnail_url();
                    }
                    ?>
                    <a href="<?php the_permalink(); ?>"> 
                      <img src="<?php echo $featured_image; ?>" class="img-fluid">
                    </a>
                  </div>
                  <span class="date-time">
                    <?php echo strtoupper(get_post_meta(get_the_ID(), 'news_location', true));?> <?php echo get_the_date('M d, Y H:i'); ?>
                  </span>
                  <h2 class="article-title">
                      <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
                  </h2>
            </div>
                  <?php
                       }

                endwhile; endif; ?>
        
      </div>
      <div class="link-article">
        <?php
            if ( is_active_sidebar( 'news_landing_mid_banner' ) ) : ?>
             <?php dynamic_sidebar( 'news_landing_mid_banner' ); ?>
           <?php endif; ?>
          <ul>
              <li>
                  <span class="date-time">JUL 07, 2021 16:00</span>
                  <h2 class="article-title"><a href="#!">Game-Based Learning: How it makes kids smarter</a></h2>
              </li>
              <li>
                  <span class="date-time">JUL 07, 2021 16:00</span>
                  <h2 class="article-title"><a href="#!">How artificial intelligence is transforming classrooms</a></h2>
              </li>
              <li>
                  <span class="date-time">JUL 07, 2021 16:00</span>
                  <h2 class="article-title"><a href="#!">Is bacteria linked to the way babies experience fear?</a></h2>
              </li>
              <li>
                  <span class="date-time">JUL 07, 2021 16:00</span>
                  <h2 class="article-title"><a href="#!">Will 2021 see more Indian students opting to study abroad?</a></h2>
              </li>
              <li>
                  <span class="date-time">JUL 07, 2021 16:00</span>
                  <h2 class="article-title"><a href="#!">Do you pass on your anxiety to your kids? Here’s how to stop it</a></h2>
              </li>
          </ul>
      </div>
      <div class="col-lg-12 center">
        <?php
        if ( is_active_sidebar( 'news_landing_top_banner' ) ) : ?>
         <?php dynamic_sidebar( 'news_landing_top_banner' ); ?>
       <?php endif; ?>
     </div>
   </div>
</section>

<div class="home-section editor_desk remove-leftpadding">
<section class="home-copy">

<?php $count=12;foreach ($menuitems as $key => $menu) { ?>
  <div id="<?php echo $menu->ID; ?>" data-anchor="<?php echo $menu->ID; ?>" class="articles">
  <div class="home-padding">
<div class="section-header">
        <h2 class="semi_medium-title"><?php echo $menu->title; ?></h2 >
        <a class="view-all" href="#!">View More</a>
      </div>
    <?php
        $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'category_name' => $menu->title,
        'posts_per_page' => 7,
      );
      $Query = new WP_Query( $args );
      if ($Query->have_posts()) :
      ?>
      
      <?php
      endif;
      if ($Query->have_posts()) : while ($Query->have_posts()) : $Query->the_post();
        if( $Query->current_post == 0 ) {
          ?>
          <div class="featured">
              <div class="image">
              <?php if ( has_post_thumbnail() ) {
                $featured_image = get_the_post_thumbnail_url();
              }
              ?>

              <a href="<?php the_permalink(); ?>"> <img src="<?php echo $featured_image; ?>" class="img-fluid"></a>
            </div>
              <span class="date-time"><?php echo strtoupper(get_post_meta(get_the_ID(), 'news_location', true));?> <?php echo get_the_date('M d, Y H:i'); ?>
              </span>

              <h2 class="article-title">
                <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
              </h2>
            </div>
        <?php } endwhile; endif;?>
        <div class="img-artlce">
           
                <?php if ($Query->have_posts()) : $counter = 0; while ($Query->have_posts()) : $Query->the_post();
                  if ($counter <= 2) :
                  if( $Query->current_post != 0 ){
                  ?>
                  <div class="column">
                    <div class="image">
                        <a href="<?php the_permalink(); ?>"> <img src="<?php echo $featured_image; ?>" class="img-fluid"></a>
                    </div>
                    <div class="copy">
                        <span class="date-time">
                          <?php echo strtoupper(get_post_meta(get_the_ID(), 'news_location', true));?> <?php echo get_the_date('M d, Y H:i'); ?>
                            
                        </span>
                        <h2 class="article-title">
                          <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
                        </h2>
                    </div>
                  </div>
                  <?php
                  }
                endif; $counter++; endwhile; endif; ?>
          <?php if ($Query->have_posts()) : $counter1 = 0; while ($Query->have_posts()) : $Query->the_post();
                  if ($counter1 > 2) :
                  if( $Query->current_post != 0 && $counter1 <= 4){
                  ?>
                  <div class="column">
                     <div class="image">
                        <a href="<?php the_permalink(); ?>"> <img src="<?php echo $featured_image; ?>" class="img-fluid"></a>
                      </div>
                      <div class="copy">
                          <span class="date-time">
                            <?php echo strtoupper(get_post_meta(get_the_ID(), 'news_location', true));?> <?php echo get_the_date('M d, Y H:i'); ?>
                              
                            </span>
                          <h2 class="article-title">
                            <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
                          </h2>
                      </div>
                  </div>
                  <?php
                  }
                endif; $counter1++; endwhile; endif; ?>
        </div>
        <div class="link-article">
                            <ul>
                                <li>
                                    <span class="date-time">JUL 07, 2021 16:00</span>
                                    <h2 class="article-title"><a href="#!">Game-Based Learning: How it makes kids smarter</a></h2>
                                </li>
                                <li>
                                    <span class="date-time">JUL 07, 2021 16:00</span>
                                    <h2 class="article-title"><a href="#!">How artificial intelligence is transforming classrooms</a></h2>
                                </li>
                                <li>
                                    <span class="date-time">JUL 07, 2021 16:00</span>
                                    <h2 class="article-title"><a href="#!">Is bacteria linked to the way babies experience fear?</a></h2>
                                </li>
                                <li>
                                    <span class="date-time">JUL 07, 2021 16:00</span>
                                    <h2 class="article-title"><a href="#!">Will 2021 see more Indian students opting to study abroad?</a></h2>
                                </li>
                                <li>
                                    <span class="date-time">JUL 07, 2021 16:00</span>
                                    <h2 class="article-title"><a href="#!">Do you pass on your anxiety to your kids? Here’s how to stop it</a></h2>
                                </li>
                            </ul>
                        </div>
        <?php if ($Query->have_posts() && ($key % 2 == 1)) :?>
          <div class="col-lg-12 center">
            <?php /*
            if ( is_active_sidebar( 'news_landing_footer_banner' ) ) : ?>
             <?php dynamic_sidebar( 'news_landing_footer_banner' ); ?>
           <?php endif; */?>

          <!-- //1055314/HT_School_Desktop_Section/HT_School_Desk_Section_Footer_Billboard-->
            <div id='div-gpt-ad-1619596100543-<?php echo $count;?>'>
              <script>
                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1619596100543-<?php echo $count;?>'); });
              </script>
            </div>
          </div>
        <?php $count++; endif;?>
      </div>
    </div>
  <?php } ?>
  </section>
</div>
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