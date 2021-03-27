<?php
if ( ! defined( 'ABSPATH' ) ) exit;
get_header(vibe_get_header());
$page_id = get_the_ID();

$title=get_post_meta(get_the_ID(),'vibe_title',true);
if(vibe_validate($title) || empty($title)){
?>
<!-- <section id="title">
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
</section> -->
<?php
}
?>
<section id="content ">
  <div class="news-main">
    <div class="<?php echo vibe_get_container(); ?>">
      <div class="row">
        <div class="col-md-4 col-sm-12 category-news">
          <div class="content content-left">
            <?php do_action('wplms_before_title'); ?>
            <div class="pagetitle">
              <div class="breadcrumbs white-bread">
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
        <div class="col-md-8 col-sm-8">
          <div class="content-right">
            <div class="details">
                <?php the_content(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
$page_for_posts = get_option('page_for_posts');
$blog = get_post($page_for_posts);   
$author_id = $blog->post_author;

// Post Date
$postDate = get_the_date('M d, Y H:i');

// Author details
$author_name = get_the_author_meta( 'display_name', $author_id );
$author_url = get_the_author_meta( 'user_url', $author_id );
$author_email = get_the_author_meta( 'user_email', $author_id );
$author_biographical_info = get_the_author_meta( 'description', $author_id );
$author_user_profile = get_avatar_url($author_id);
$author_company = get_the_author_meta( 'last_name', $author_id );

// Post Thumbnail
if ( has_post_thumbnail() ) { 
    $featured_image = get_the_post_thumbnail_url();
}

// Current Post Tags List.
$topics = wp_get_post_tags(get_the_ID());

//echo "<pre>";print_r($topics);exit;


// Main Content of the post 
$location = strtoupper(get_post_meta(get_the_ID(), 'news_location', true));
    // the_content();
//End Main content of the post
    ?>
    <img src="<?php echo $featured_image; ?>">
    <?php $tagsCount = count($topics);
        if($tagsCount > 0 ){
    ?>
    <h2>Topics</h2>
    <?php
    }
    ?>
    <ul>
    <?php
    foreach ($topics as $tag) {
    ?>
        <li><?php echo $tag->name; ?></li>
    <?php
    }
    ?>
    </ul>
    <div class="col-lg-12 center">
        <?php
        if ( is_active_sidebar( 'latest-news-bottom' ) ) : ?>
          <?php dynamic_sidebar( 'latest-news-bottom' ); ?>      
      <?php endif; ?>
  </div>
    <?php
    // Related Posts
    $tags = wp_get_post_tags(get_the_ID());
    if ($tags) {
        echo 'Related Posts';
        $first_tag = $tags[0]->term_id;
        $args=array(
            'tag__in' => array($first_tag),
            'post__not_in' => array(get_the_ID()),
            'posts_per_page'=>5,
        );
        $my_query = new WP_Query($args);
//echo "<pre>";print_r($my_query);exit;

        if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
                      // if( $Query->current_post != 0 ) { 
          ?>
          <li>
              <p><strong><?php echo strtoupper(get_post_meta(get_the_ID(), 'news_location', true));?> <?php echo get_the_date('M d, Y H:i'); ?></strong></p>
              <div class="link">
                  <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
              </div>
          </li>
          <?php 
                  // }
      endwhile; endif;

      wp_reset_query();
  }
?>

<?php
    get_footer(vibe_get_footer());
?>