<?php
/**
 * Template Name: Latest News
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
                'orderby'=>'DESC',
            );
            $Query = new WP_Query( $args ); 
        ?>

          <div class="col-sm-12 col-lg-4">
            <div class="details-middle">
              <div>
                <?php if ($Query->have_posts()) : while ($Query->have_posts()) : $Query->the_post();
                      // if( $Query->current_post != 0 ) { 
                  ?>
                  <div class="col-sm-8">
                      <p><strong><?php echo get_the_date('M d, Y H:i'); ?></strong></p>
                      <div class="link">
                          <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
                      </div>
                  </div>
                  <?php 
                  // }
                  endwhile; endif; ?>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

<?php
get_footer(vibe_get_footer());
?>