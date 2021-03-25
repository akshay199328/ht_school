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
<section id="title">
    <?php do_action('wplms_before_title'); ?>
    <div class="<?php echo vibe_get_container(); ?>">
        <div class="row">
            <div class="col-md-12">
                <div class="pagetitle">
                    <?php
                        $breadcrumbs=get_post_meta(get_the_ID(),'vibe_breadcrumbs',true);
                        if(vibe_validate($breadcrumbs) || empty($breadcrumbs))
                            vibe_breadcrumbs(); 
                    ?>
                    <h1><?php the_title(); ?></h1>
                    <?php the_sub_title(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
?>

    <!-- ======= Latest News Section ======= -->
    <section id="" class="latest-news">
      <div class="container">
        <div class="row gx-0">
        
          <?php
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'category_name' => 'News',
                'posts_per_page' => 6,
            );
            $Query = new WP_Query( $args );
            if ($Query->have_posts()) : while ($Query->have_posts()) : $Query->the_post();
              if( $Query->current_post == 0 ) { 
        ?>
          <div class="col-sm-12 col-lg-4">
            <div class="details-left">
              <p><strong><?php echo get_the_date('M d, Y H:i'); ?></strong></p>
              <?php if ( has_post_thumbnail() ) { 
                $featured_image = get_the_post_thumbnail_url();
              }
              ?>
              <a href="<?php the_permalink(); ?>"> <img src="<?php echo $featured_image; ?>" class="img-fluid"></a>
              <div class="link">
                <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
              </div>
            </div>
          </div>
        <?php } endwhile; endif;?>
          <div class="col-sm-12 col-lg-4">
            <div class="details-middle">
              <ul>
                <?php if ($Query->have_posts()) : while ($Query->have_posts()) : $Query->the_post();
                      // if( $Query->current_post != 0 ) { 
                  ?>
                    <li>
                      <p><strong><?php echo get_the_date('M d, Y H:i'); ?></strong></p>
                      <div class="link">
                          <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
                      </div>
                    </li>
                  <?php 
                  // }
                  endwhile; endif; ?>
              </ul>
            </div>
          </div>
            <div class="col-sm-12 col-lg-4">
              <div class="details-middle">
                
              </div>
            </div>
          <div class="col-lg-12 center">
            <?php
              if ( is_active_sidebar( 'latest-news-bottom' ) ) : ?>
              <?php dynamic_sidebar( 'latest-news-bottom' ); ?>      
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>
  <!-- ======= Latest News Section ======= -->
    <section id="" class="latest-news">
      <div class="container">
        <div class="row gx-0">
        
          <?php
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'category_name' => 'News',
                'posts_per_page' => 6,
                'meta_key'=>'post_views_count',
                'orderby'=>'meta_value_num'
            );
            $Query = new WP_Query( $args );
            if ($Query->have_posts()) : while ($Query->have_posts()) : $Query->the_post();
              if( $Query->current_post == 0 ) { 
        ?>
          <div class="col-sm-12 col-lg-4">
            <div class="details-left">
              <p><strong><?php echo get_the_date('M d, Y H:i'); ?></strong></p>
              <?php if ( has_post_thumbnail() ) { 
                $featured_image = get_the_post_thumbnail_url();
              }
              ?>
              <img src="<?php echo $featured_image; ?>" class="img-fluid">
              <div class="link">
                <a href="#"><?php echo get_the_title() ?></a>
              </div>
            </div>
          </div>
        <?php } endwhile; endif;?>
          <div class="col-sm-12 col-lg-4">
            <div class="details-middle">
              <ul>
                <?php if ($Query->have_posts()) : while ($Query->have_posts()) : $Query->the_post();
                      // if( $Query->current_post != 0 ) { 
                  ?>
                    <li>
                      <p><strong><?php echo get_the_date('M d, Y H:i'); ?></strong></p>
                      <div class="link">
                          <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
                      </div>
                    </li>
                  <?php 
                  // }
                  endwhile; endif; ?>
              </ul>
            </div>
          </div>
            <div class="col-sm-12 col-lg-4">
              <div class="details-middle">
                
              </div>
            </div>
          <div class="col-lg-12 center">
            <?php
              if ( is_active_sidebar( 'latest-news-bottom' ) ) : ?>
              <?php dynamic_sidebar( 'latest-news-bottom' ); ?>      
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>

      <div class="container">
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
      </div>
<?php
get_footer(vibe_get_footer());
?>