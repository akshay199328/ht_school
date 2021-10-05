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

                  <div class="border_text"><?php $sub_title = get_post_meta(get_the_ID(),'vibe_subtitle',true);
                  echo wp_trim_words( $sub_title, 18, NULL )
                  ?></div>
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
    <div class="col-md-12 col-sm-12 details-right pull-right left-spacing">
      <div class="about-details mrg right_content">
      <div class="content-right">
        <div class="details">
          <div class="post-creator">
            <p>By <strong><?php echo $postCreatorName;; ?>,</strong><span class="post_date"><?php echo $postDate; ?></span></p>
            <!--   <p><?php echo $postDate; ?></p> -->
           <div class="share-icon">
            <ul>

              
                <?php
                 if(is_user_logged_in()){
                  ?>
                  <li style="list-style-type: none;"><?php wpfp_post_link(); ?></li>
                <?php }else{
                  $url = "/login-register";
                  ?>
                  <li style="list-style-type: none;"><a href="<?php echo get_site_url().$url; ?>"><i class="bookmark-remove" title="Bookmark this article"></i></a></li> 
                  <?php
                }
                ?>
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
          </ul> 
        </div>
          </div>
          </div>
          <div class="content-default-list">
            <div class="row">
              <div class="col-sm-12 col-lg-12 pull-left mrg">
                <p><?php 
                       $post_content = get_post_field('post_content', $post->ID);
                                        
                      ob_start();
                       dynamic_sidebar('news_landing_mid_banner');
                                        $addDisplay = ob_get_contents();
                                        ob_end_clean();

                                        $ad_code = '<div class="adsense">' . $addDisplay . '</div>';
                                        
                                        $post_content = $ad_code . $post_content;

                                        echo $post_content;
                                        /*if ( $post_content != '' ) {

                                          $post_content = prefix_insert_after_words( $ad_code,75, $post_content );
                                        }*/
                                        ?></p>

              </div>
            </div>
        </div>
        <div class="topic_details">
          <?php
          if ( is_active_sidebar( 'story-footer-banner' ) ) : ?>
            <?php dynamic_sidebar( 'story-footer-banner' ); ?>      
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
            if ( is_active_sidebar( 'story_banner_billboard' ) ) : ?>
              <?php dynamic_sidebar( 'story_banner_billboard' ); ?>      
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
<?php $tags = wp_get_post_tags(get_the_ID());
  if ($tags) {

    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
                $args=array(
                'tag__in' => $tag_ids,
                'post__not_in' => array($post->ID),
                'posts_per_page'=>6, 
                );

    $my_query = new WP_Query($args);
    if ($my_query->have_posts()){
  ?>
<div class="releted_news_section">
  <div class="container">
    
    <div class="col-sm-12 col-md-9 mrg">
        <div class="related_post details">
          <?php
                     // print_r($my_query);
            //echo "<pre>";print_r($my_query);exit;
            echo '<h2>Related News</h2>';
            ?>
            <div class="col-sm-12 col-md-6 mrg">
              <div class="details-middle devide">
                <ul class="">
                  <?php 
                  $counter = 0; while ($my_query->have_posts()) : $my_query->the_post();
                  if ($counter <= 2) :
                                        // if( $Query->current_post != 0 ) { 
                    ?>
                        <li>
                          <p><strong><?php echo strtoupper(get_post_meta(get_the_ID(), 'news_location', true));?> <?php echo get_the_date('M d, Y H:i'); ?></strong></p>
                          <div class="link">
                            <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
                          </div>
                        </li>
                    <?php 
                    endif; $counter++;
                     endwhile;               // }
               
                ?>
              </ul>
              <?php wp_reset_query();  ?>
            </div>
          </div>
          <div class="col-sm-12 col-md-6 mrg">
              <div class="details-middle devide">
                <ul class="">
                  <?php 
                  $counter1 = 0;
                  while ($my_query->have_posts()) : $my_query->the_post();
                    if ($counter1 > 2) :
                                        // if( $Query->current_post != 0 ) { 
                    ?>
                        <li>
                          <p><strong><?php echo strtoupper(get_post_meta(get_the_ID(), 'news_location', true));?> <?php echo get_the_date('M d, Y H:i'); ?></strong></p>
                          <div class="link">
                            <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
                          </div>
                        </li>
                    <?php 
                    endif; $counter1++;
                     endwhile;               // }
               
                ?>
              </ul>
              <?php wp_reset_query();  ?>
            </div>
          </div>    
      </div>
    </div>
    <div class="col-sm-12 col-md-3 mrg">
      <div class="atwork_img">
          <?php
          if ( is_active_sidebar( 'banner-3' ) ) : ?>
            <?php dynamic_sidebar( 'banner-3' ); ?>      
          <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php }}?>          <!-- releted news -->
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