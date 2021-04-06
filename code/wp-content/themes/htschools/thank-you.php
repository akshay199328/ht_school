<?php
/**
 * Template Name: Thank you
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
  <h1>Thank You</h1>
<?php
get_footer(vibe_get_footer());
?>