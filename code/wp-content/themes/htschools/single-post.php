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

$postCreatorName = get_post_meta(get_the_ID(), 'post_creator_name', true);
// Current Post Tags List.
$topics = wp_get_post_tags(get_the_ID());

?>
<div id="content ">
  <div class="innerheader-space"></div>

  <div class="news-main grey-background">
    <div class="sticky_content">
    <div class="details-left fixed_banner image_background">
      <div class="<?php echo vibe_get_container(); ?>">
        <div class="row">
          <div class="col-md-12 col-sm-12 category-news">
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
              <img src="<?php echo $featured_image; ?>">
              <?php if(get_post_meta(get_the_ID(), 'image_caption', true)){?>
                <p class="newsdetail_caption"><?php echo get_post_meta(get_the_ID(), 'image_caption', true); ?>
              <?php } else{?>
              <p class="newsdetail_caption"><?php echo the_post_thumbnail_caption(); ?>
            <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="pull-right right-section grey-background">
         <div class="<?php echo vibe_get_container(); ?>">
          <div class="row">
    <div class="col-md-12 col-sm-12 details-right pull-right">
      <div class="about-details mrg right_content">
      <div class="content-right">
        <div class="details">
          <div class="post-creator">
            <p>By <strong><?php echo $postCreatorName;; ?>,</strong> <br><?php echo $postDate; ?></p>
            <!--   <p><?php echo $postDate; ?></p> -->
           <div class="share-icon">
            <ul>

              <li class="hover_share">
                <img src="<?php echo get_bloginfo('template_url');?>/assets/images/share-icon.svg">
                <div class="display_icon">
                  <h6>Share <span><i class="bi bi-x close-share"></i></span></h6>
                  <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                    <a class="a2a_button_facebook"></a>
                    <a class="a2a_button_twitter"></a>
                    <a class="a2a_button_pinterest"></a>
                    <a class="a2a_button_google_gmail"></a>
                    <a class="a2a_button_whatsapp"></a>
                    <a class="a2a_button_telegram"></a>
                  </div><script async src="https://static.addtoany.com/menu/page.js"></script>
                </div>
              </li>
                <li>
                <?php
                 if(is_user_logged_in()){
                  ?>
                  <li style="list-style-type: none;"><?php wpfp_post_link(); ?></li>
                <?php }else{
                  $url = "/login-register";
                  ?>
                  <li style="list-style-type: none;"><a href="<?php echo get_site_url().$url; ?>"><i class="bookmark-remove" title="Remove this course"></i></a></li> 
                  <?php
                }
                ?>
              </li>
          </ul> 
        </div>
          </div>
          </div>
          <div class="content-default-list">
            <div class="row">
              <div class="col-sm-12 col-lg-6 pull-left mrg">
                <?php the_content(); ?>
              </div>
            </div>
        </div>
        <div class="topic_details">
          <?php
          if ( is_active_sidebar( 'banner-4' ) ) : ?>
            <?php dynamic_sidebar( 'banner-4' ); ?>      
          <?php endif; ?>
          <br>
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
              <li><a href="/?s=<?php echo $tag->name; ?>"><?php echo $tag->name; ?></a></li>
              <?php
            }
            ?>
          </ul>
        </div>
        <div class="col-lg-12 center mrg">
<!--             <?php
            if ( is_active_sidebar( 'banner-3' ) ) : ?>
              <?php dynamic_sidebar( 'banner-3' ); ?>      
              <?php endif; ?> -->
            </div>
          </div>



        </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- releted news -->
<div class="releted_news_section">
  <div class="container">
    <div class="col-sm-12 col-md-4 mrg">
      <div class="atwork_img">
          <?php
          if ( is_active_sidebar( 'banner-2' ) ) : ?>
            <?php dynamic_sidebar( 'banner-2' ); ?>      
          <?php endif; ?>
      </div>
    </div>
    <div class="col-sm-12 col-md-8 mrg">
        <div class="related_post details">
          <?php
                // Related Posts
          $tags = wp_get_post_tags(get_the_ID());
          if ($tags) {
            echo '<h2>Related News</h2>';
            $first_tag = $tags[0]->term_id;

            $args=array(
              'tag__in' => array($first_tag),
              'post__not_in' => array(get_the_ID()),
              'posts_per_page'=>5,
            );
            $my_query = new WP_Query($args);
                     // print_r($my_query);
            //echo "<pre>";print_r($my_query);exit;
            ?>
              <div class="details-middle devide">
                <ul class="news_two_data">
            <?php 
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
        </ul>
      </div>
      </div>
    </div>
  </div>
</div>
          <!-- releted news -->
  </div>
  


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





<?php
get_footer(vibe_get_footer());
?>
