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


<!-- ======= Featured ======= -->

<section id="All" data-anchor="All" class="latest-news grey-background">
  <div class="container">
    <div class="">
      <div class="">
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
        <div class="col-sm-12 col-md-4 col-lg-4 mrg">
          <div class="details-left">

            <?php if ( has_post_thumbnail() ) {
              $featured_image = get_the_post_thumbnail_url();
            }
            ?>
            <a href="<?php the_permalink(); ?>"> <img src="<?php echo $featured_image; ?>" class="img-fluid"></a>
            <div class="news-date">
              <p><strong><?php echo strtoupper(get_post_meta(get_the_ID(), 'news_location', true));?> <?php echo get_the_date('M d, Y H:i'); ?></strong></p>
            </div>
            <div class="link">
              <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
            </div>
          </div>
        </div>
      <?php } endwhile; endif;?>
      <div class="col-sm-12 col-md-8 col-lg-8 custom_margin">
        <div class="col-sm-12 col-md-6 col-lg-6 remove_mob_margin">
            <div class="details-middle">
              <ul class="full_width_list">
                <?php if ($Query->have_posts()) : while ($Query->have_posts()) : $Query->the_post();
                          if( $Query->current_post != 0 ) {
                  ?>
                  <li>
                    <p><strong><?php echo strtoupper(get_post_meta(get_the_ID(), 'news_location', true));?> <?php echo get_the_date('M d, Y H:i'); ?></strong></p>
                    <div class="link">
                      <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
                    </div>
                  </li>
                  <?php
                       }
                endwhile; endif; ?>
              </ul>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 remove_mob_margin">
          <div class="details-middle adwork">
            <?php
            if ( is_active_sidebar( 'news_landing_mid_banner' ) ) : ?>
             <?php dynamic_sidebar( 'news_landing_mid_banner' ); ?>
           <?php endif; ?>
          </div>
        </div>
      </div>

      <div class="col-lg-12 center">
        <?php
        if ( is_active_sidebar( 'news_landing_top_banner' ) ) : ?>
         <?php dynamic_sidebar( 'news_landing_top_banner' ); ?>
       <?php endif; ?>
     </div>
    </div>
  </div>
</section>

<div class="home-section editor_desk">
<section class="home-copy">

<?php $count=12;foreach ($menuitems as $key => $menu) { ?>
<div class="section-header">
        <h2 class="large-title"><?php echo $menu->title; ?></h2 >
        <a class="view-all" href="#!">View More</a>
      </div>
  <div id="<?php echo $menu->ID; ?>" data-anchor="<?php echo $menu->ID; ?>" class="articles">
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
          <div class="column">
                <?php if ($Query->have_posts()) : $counter1 = 0; while ($Query->have_posts()) : $Query->the_post();
                  if ($counter1 > 2) :
                  if( $Query->current_post != 0 && $counter1 <= 4){
                  ?>
                  <li>
                    <a href="<?php the_permalink(); ?>"> <img src="<?php echo $featured_image; ?>" class="img-fluid"></a>
                    <p><strong><?php echo strtoupper(get_post_meta(get_the_ID(), 'news_location', true));?> <?php echo get_the_date('M d, Y H:i'); ?></strong></p>
                    <div class="link">
                      <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
                    </div>
                  </li>
                  <?php
                  }
                endif; $counter1++; endwhile; endif; ?>
              </div>
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
  <?php } ?>
  </section>
</div>
  <!-- End Most Interview -->
      <!-- <div class="container">
        <div class="row">
            <div class="col-lg-12 infograph">
              <div class="heading">
                <h4>Infographics</h4>
              </div>
              <div class="details mobile-slider">
                <?php
                  $args1 = array(
                      'post_type' => 'infographics',
                      'post_status' => 'publish',

                  );
                  $Query1 = new WP_Query( $args1 );

                  // print_r(get_post_custom());
                  if ($Query1->have_posts()) : while ($Query1->have_posts()) : $Query1->the_post();
                      $custom_fields = get_post_custom();
                      $image_url = wp_get_attachment_url($custom_fields['image'][0]);

                ?>
                  <div class="co-sm-12 col-lg-4 item" data-aos="zoom-in" data-aos-delay="100">
                      <a href="<?php the_permalink(); ?>"> <img src="<?php echo $image_url; ?>" class="img-fluid" /></a>
                      <div class="content">
                        <p><?php echo get_the_date('M d, Y H:i'); ?></p>
                        <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                      </div>
                  </div>
                <?php endwhile;endif;?>
              </div>
            </div>
          </div>
        </div> -->
        <?php
        get_footer(vibe_get_footer());
        ?>