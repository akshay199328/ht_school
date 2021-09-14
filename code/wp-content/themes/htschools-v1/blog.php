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
<style>
  .pagesidebar{display: none;}
</style>
<section id="All" class="home-section editor_desk articles">
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
        <div id="All" data-anchor="All" class="articles">
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
                  <div class="copy">
                    <span class="date-time cvb">
                      <?php echo strtoupper(get_post_meta(get_the_ID(), 'news_location', true));?> <?php echo get_the_date('M d, Y H:i'); ?>
                    </span>
                    <h2 class="article-title">
                        <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
                    </h2>
                </div>
            </div>
                  <?php
                       }endwhile; endif; ?>
        
      </div>
      <div class="link-article">
          <div class="advertisement">
            <?php
              if ( is_active_sidebar( 'news_landing_mid_banner' ) ) : ?>
               <?php dynamic_sidebar( 'news_landing_mid_banner' ); ?>
            
               <img src="'.get_bloginfo('template_url').'/assets/images/editore-desk/advertisement1.png'" class="img-fluid">
             </div>
             <ul class="full_width_list">
                <?php if ($Query->have_posts()) : while ($Query->have_posts()) : $Query->the_post();
                          if( $Query->current_post != 0 ) {
                  ?>
                  <li>
                    <span class="date-time"><?php echo strtoupper(get_post_meta(get_the_ID(), 'news_location', true));?> <?php echo get_the_date('M d, Y H:i'); ?></span>
                    <h2 class="article-title">
                      <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
                    </h2>
                  </li>
                  <?php
                       }
                endwhile; endif; ?>
              </ul>

           <?php endif; ?>
         
      </div>
      <div class="col-lg-12 center full-advertisement">
        <img src="/assets/images/editore-desk/advertisement3.png" />
        <?php
        if ( is_active_sidebar( 'news_landing_top_banner' ) ) : ?>
         <?php dynamic_sidebar( 'news_landing_top_banner' ); ?>
       <?php endif; ?>
     </div>
   </div>
</section>

<div class="home-section editor_desk remove-leftpadding">
<section class="home-copy">

<?php $count=12;foreach ($menuitems as $key => $menu) { 
   if($menu->title != 'Infographics' && $menu->title != 'Videos'){
  ?>
  <div id="<?php echo $menu->ID; ?>" data-anchor="<?php echo $menu->ID; ?>" class="articles">
    <div class="home-padding">
      <div class="section-header">

        <!-- <?php if($menu->title != 'Infographics' && $menu->title != 'Videos'){?> -->

        <h2 class="semi_medium-title"><?php echo $menu->title;?></h2 >
        <a class="view-all" href="<?php echo $menu->url; ?>" target="_blank">View More</a>
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
            if( $Query->current_post == 0 ) {?>
            <div class="featured">
              <div class="image">
                <?php if ( has_post_thumbnail() ) {
                  $featured_image = get_the_post_thumbnail_url();
                }?>

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
                    if( $Query->current_post != 0 ){?>
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
                  <?php } endif; $counter++; endwhile; endif; ?>

                  <?php if ($Query->have_posts()) : $counter1 = 0; while ($Query->have_posts()) : $Query->the_post();
                      if ($counter1 > 2) :
                        if( $Query->current_post != 0 && $counter1 <= 4){?>
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
                <ul class="">
                  <?php if ($Query->have_posts()) : $counter1 = 0; while ($Query->have_posts()) : $Query->the_post();
                    if ($counter1 > 3) :
                      if( $Query->current_post != 0 ){?>
                        <li>
                          <span class="date-time"><?php echo strtoupper(get_post_meta(get_the_ID(), 'news_location', true));?> <?php echo get_the_date('M d, Y H:i'); ?></span>
                          <h2 class="article-title">
                            <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
                          </h2>
                        </li>
                    <?php
                    }
                  endif; $counter1++; endwhile; endif; ?>
                </ul>
              </div>

              <?php if ($Query->have_posts() && ($key % 2 == 1)) :?>
                <div class="col-lg-12 center full-advertisement">
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
        <?php } ?>
      </div>
    </div>

  <?php }} ?>
  </section>
</div>


<?php $count=12;foreach ($menuitems as $key => $menu) { 
   
  ?>

    <?php if($menu->title == 'Infographics'){?>
  <section class="home-section infographics articles" id="<?php echo $menu->ID; ?>" data-anchor="<?php echo $menu->ID; ?>">
    <div class="home-copy">
      <header class="section-header">
        <h2 class="semi_medium-title">Infographics</h2>
          <a class="view-all" href="#!">View More</a>
      </header>
        <div class="owl-carousel owl-theme student_slider">
          <?php
            $args1 = array(
              'post_type' => 'post',
              'post_status' => 'publish',
              'category_name' => 'Infographics',
            );
            $Query1 = new WP_Query( $args1 );
            
            if ($Query1->have_posts()) : while ($Query1->have_posts()) : $Query1->the_post();
              if( $Query->current_post != 0 ) {
            //  $custom_fields = get_post_custom();
            //  $url = wp_get_attachment_url($custom_fields['image'][0]); 
          ?>
          <div class="item">
            <div class="course-card">
              <figure class="video">
                <?php if ( has_post_thumbnail() ) {
                      $featured_image = get_the_post_thumbnail_url();
                    }
                    ?>
                <a href="<?php the_permalink(); ?>"><img src="<?php echo $featured_image; ?>" class="img-fluid"></a>
                <!-- <img src="<?php echo $url;?>"> -->
                  <!-- <a class="play" href="#!"><span class="time">3:20</span></a> -->
              </figure>
              <div class="course-copy">
                  <footer class="course-footer">
                    <div class="left">
                      
                      <div class="copy">
                          <span class="date-time">
                            <?php echo strtoupper(get_post_meta(get_the_ID(), 'news_location', true));?> <?php echo get_the_date('M d, Y H:i'); ?>
                          </span>
                          <h2 class="article-title">
                            <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
                          </h2>
                        </div>
                    </div>
                  </footer>
                </div>
              </div>
            </div>
            <?php
             } endwhile; endif;
            ?> 
        </div>
        </div>
    </section>
<?php } ?>
<?php } ?>

<?php $count=12;foreach ($menuitems as $key => $menu) { 
   
  ?>
     <?php if($menu->title == 'Videos'){ ?>
  <section class="home-section videos articles" id="<?php echo $menu->ID; ?>" data-anchor="<?php echo $menu->ID; ?>">
    <div class="home-copy">
         
      <header class="section-header">
        <h2 class="semi_medium-title">Videos</h2>
          <a class="view-all" href="#!">View More</a>
      </header>
      <div class="owl-carousel owl-theme student_slider">
        <?php
            $args1 = array(
              'post_type' => 'post',
              'post_status' => 'publish',
              'category_name' => 'Videos',
            );
            $Query1 = new WP_Query( $args1 );
        
            if ($Query1->have_posts()) : while ($Query1->have_posts()) : $Query1->the_post();
              if( $Query->current_post != 0 ) {
              //$custom_fields = get_post_custom();
             // $url = wp_get_attachment_url($custom_fields['image'][0]); 
            ?>
            <div class="item">
              <div class="course-card">
                <figure class="video">
                  <?php if ( has_post_thumbnail() ) {
                      $featured_image = get_the_post_thumbnail_url();
                    }
                    ?>
                <a href="#!"><img src="<?php echo $featured_image; ?>" class="img-fluid"></a>

                  <!-- <img src="<?php echo $url;?>">
                  <a class="play" href="#!"> --><!-- <span class="time">3:20</span> --></a>
                </figure>
                <div class="course-copy">
                  <span class="date-time">
                            <?php echo strtoupper(get_post_meta(get_the_ID(), 'news_location', true));?> <?php echo get_the_date('M d, Y H:i'); ?>
                          </span>
                  <h2 class="course-title"><a href="#!"><?php echo the_content(); ?></a></h2>
                  
                </div>
              </div>
            </div>
          <?php
           } endwhile; endif;
          ?> 
        </div>
          </div>
    </section>
<?php } ?>
 <?php } ?>    


<?php
  get_footer(vibe_get_footer());
?>