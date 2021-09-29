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
<?php } ?>
<?php 
$page_for_posts = get_option('page_for_testimonial');
//echo "<pre>"; print_r($page_for_posts); echo "</pre>";
$blog = get_post($page_for_posts);   
//echo "<pre>"; print_r($blog); echo "</pre>";

$post_description = $blog->post_content;
$post_excerpt = $blog->post_excerpt;
//the_field('date');
//$testimonial_video_link = the_field('video_link');
//echo "<pre>"; print_r($testimonial_video_link); echo "</pre>";

//$author_id = $blog->post_author;
// Post Date
$postDate = get_the_date('M d, Y H:i');

// Author details
//$author_name = get_the_author_meta( 'display_name', $author_id );
//$author_url = get_the_author_meta( 'user_url', $author_id );
//$author_email = get_the_author_meta( 'user_email', $author_id );
//$author_biographical_info = get_the_author_meta( 'description', $author_id );
//$author_user_profile = get_avatar_url($author_id);
//$author_company = get_the_author_meta( 'last_name', $author_id );

// Post Thumbnail
if ( has_post_thumbnail() ) { 
  $featured_image = get_the_post_thumbnail_url();
}

//$postCreatorName = get_post_meta(get_the_ID(), 'post_creator_name', true);
// Current Post Tags List.
//$topics = wp_get_post_tags(get_the_ID());
?>
<div class="editor-details_page">
    <div class="editor_detail">
      <div class="editor_header">
        <?php
            $breadcrumbs=get_post_meta(get_the_ID(),'vibe_breadcrumbs',true);
            if(vibe_validate($breadcrumbs) || empty($breadcrumbs))
                vibe_breadcrumbs(); 
        ?>
        <div class="editor_socio">
          <h1><?php the_title(); ?></h1>
          <div class="pull-left">
              <p>By <strong><?php echo $postCreatorName;; ?>,</strong>
                  <span class="post_date"><?php echo $postDate; ?></span>
              </p>
          </div>         
          <div class="pull-right">

            <div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="<?php echo get_bloginfo('url')?>/testimonial/<?php the_title();?>" data-a2a-title="<?php echo the_title(). ' - '.get_bloginfo(); ?>" data-id="<?php echo $blog->ID;?>">

            <?php
             if(is_user_logged_in()){
              ?>
              <?php wpfp_course_link(); ?>
            <?php }else{
              $url = "/login-register";
            ?>
            <a href="<?php echo get_site_url().$url; ?>" class="icon-bookmark"><i class="add-wishlist" title="Add to Wishlist"></i>
              <svg xmlns="http://www.w3.org/2000/svg" width="36.5" height="36.5" viewBox="0 0 36.5 36.5">
                  <g id="Group_20919" data-name="Group 20919" transform="translate(-1511.75 -411.75)">
                    <path id="Path_39339" data-name="Path 39339" d="M867.548,402.337h14v17l-7-6.458-7,6.458Z" transform="translate(655.952 19.163)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"/>
                    <rect id="Rectangle_4660" data-name="Rectangle 4660" width="35" height="35" rx="17.5" transform="translate(1512.5 412.5)" fill="none" stroke="#222221" stroke-miterlimit="10" stroke-width="1.5"/>
                  </g>
              </svg>
            </a>
            <?php } ?>                    
              
                <a class="a2a_button_facebook icon-facebook"><svg xmlns="http://www.w3.org/2000/svg" width="36.5" height="36.5" viewBox="0 0 36.5 36.5">
                  <g id="Group_20915" data-name="Group 20915" transform="translate(0.25 0.25)">
                    <rect id="Rectangle_4659" data-name="Rectangle 4659" width="35" height="35" rx="17.5" transform="translate(0.5 0.5)" fill="none" stroke="#222221" stroke-miterlimit="10" stroke-width="1.5"/>
                    <path id="Path_39334" data-name="Path 39334" d="M386.946,154.033h4.362v-9.077h3.044l.325-3.039h-3.368v-1.731c0-.717.173-1,1.008-1h2.361v-3.154h-3.021c-3.246,0-4.71,1.188-4.71,3.461v2.423h-2.27v3.077h2.27Z" transform="translate(-371.676 -127.033)" fill="#222221"/>
                  </g>
              </svg></a>
                <a class="a2a_button_twitter icon-twitter"><svg xmlns="http://www.w3.org/2000/svg" width="36.5" height="36.5" viewBox="0 0 36.5 36.5">
                  <g id="Group_20912" data-name="Group 20912" transform="translate(0.75 0.75)">
                    <path id="Path_39330" data-name="Path 39330" d="M277.616,163.505h0a17.5,17.5,0,0,1-17.5-17.5h0a17.5,17.5,0,0,1,17.5-17.5h0a17.5,17.5,0,0,1,17.5,17.5h0A17.5,17.5,0,0,1,277.616,163.505Z" transform="translate(-260.116 -128.505)" fill="none" stroke="#222221" stroke-miterlimit="10" stroke-width="1.5"/>
                    <path id="Path_39331" data-name="Path 39331" d="M269.007,152.755a10.86,10.86,0,0,0,16.715-9.679,7.757,7.757,0,0,0,1.905-1.984,7.6,7.6,0,0,1-2.194.6,3.835,3.835,0,0,0,1.679-2.121,7.649,7.649,0,0,1-2.425.93,3.823,3.823,0,0,0-6.51,3.5,10.829,10.829,0,0,1-7.873-4,3.844,3.844,0,0,0,1.182,5.117,3.8,3.8,0,0,1-1.731-.48,3.835,3.835,0,0,0,3.064,3.807,3.812,3.812,0,0,1-1.724.064,3.823,3.823,0,0,0,3.568,2.662A7.664,7.664,0,0,1,269.007,152.755Z" transform="translate(-260.817 -129.386)" fill="#222221"/>
                  </g>
              </svg></a>                
                <a class="a2a_button_google_gmail icon-google"><svg xmlns="http://www.w3.org/2000/svg" width="36.5" height="36.5" viewBox="0 0 36.5 36.5">
                <g id="Group_20914" data-name="Group 20914" transform="translate(0.573 0.75)">
                  <rect id="Rectangle_4658" data-name="Rectangle 4658" width="35" height="35" rx="17.5" transform="translate(0.177 0)" fill="none" stroke="#222221" stroke-miterlimit="10" stroke-width="1.5"/>
                  <g id="Group_20913" data-name="Group 20913" transform="translate(5.159 9.881)">
                    <path id="Path_39332" data-name="Path 39332" d="M336.014,146.427h-7.082l.008,2.028h4.775a4.687,4.687,0,0,1-4.647,3.985,5.556,5.556,0,1,1,3.777-9.63l1.568-1.351a7.616,7.616,0,1,0-5.345,13.041c4.039,0,6.958-3.081,6.958-7.287Z" transform="translate(-321.452 -139.268)" fill="#222221"/>
                    <path id="Path_39333" data-name="Path 39333" d="M347.651,146.881h-2.924v-2.924h-1.865v2.924h-2.924v1.865h2.924v2.924h1.865v-2.924h2.924Z" transform="translate(-322.976 -139.638)" fill="#222221"/>
                  </g>
                </g>
              </svg></a>
                <a class="a2a_button_instagram icon-insta"><svg xmlns="http://www.w3.org/2000/svg" width="36.5" height="36.5" viewBox="0 0 36.5 36.5">
                <g id="Group_21451" data-name="Group 21451" transform="translate(0.75 0.75)">
                  <path id="Path_39335" data-name="Path 39335" d="M444.19,163.505h0a17.5,17.5,0,0,1-17.5-17.5h0a17.5,17.5,0,0,1,17.5-17.5h0a17.5,17.5,0,0,1,17.5,17.5h0A17.5,17.5,0,0,1,444.19,163.505Z" transform="translate(-426.69 -128.505)" fill="none" stroke="#222221" stroke-miterlimit="10" stroke-width="1.5"/>
                  <g id="Group_20916" data-name="Group 20916" transform="translate(7.888 7.888)">
                    <path id="Path_39336" data-name="Path 39336" d="M444.9,138.833c2.566,0,2.87.01,3.885.056a5.326,5.326,0,0,1,1.784.332,3.177,3.177,0,0,1,1.824,1.824,5.327,5.327,0,0,1,.332,1.784c.046,1.014.056,1.318.056,3.885s-.01,2.87-.056,3.884a5.329,5.329,0,0,1-.332,1.785,3.177,3.177,0,0,1-1.824,1.824,5.308,5.308,0,0,1-1.784.331c-1.014.046-1.317.056-3.885.056s-2.87-.01-3.884-.056a5.316,5.316,0,0,1-1.785-.331,3.183,3.183,0,0,1-1.824-1.824,5.307,5.307,0,0,1-.331-1.785c-.046-1.013-.056-1.317-.056-3.884s.01-2.87.056-3.885a5.306,5.306,0,0,1,.331-1.784,3.183,3.183,0,0,1,1.824-1.824,5.334,5.334,0,0,1,1.785-.332c1.013-.046,1.317-.056,3.884-.056m0-1.732c-2.611,0-2.938.012-3.963.058a7.063,7.063,0,0,0-2.333.447,4.915,4.915,0,0,0-2.81,2.811,7.037,7.037,0,0,0-.447,2.333c-.047,1.025-.058,1.352-.058,3.963s.011,2.938.058,3.963a7.037,7.037,0,0,0,.447,2.333,4.915,4.915,0,0,0,2.81,2.811,7.086,7.086,0,0,0,2.333.447c1.025.046,1.352.057,3.963.057s2.938-.011,3.963-.057a7.087,7.087,0,0,0,2.333-.447,4.92,4.92,0,0,0,2.811-2.811,7.062,7.062,0,0,0,.447-2.333c.047-1.025.058-1.352.058-3.963s-.011-2.938-.058-3.963a7.062,7.062,0,0,0-.447-2.333,4.92,4.92,0,0,0-2.811-2.811,7.063,7.063,0,0,0-2.333-.447c-1.025-.046-1.352-.058-3.963-.058" transform="translate(-435.286 -137.101)" fill="#222221"/>
                    <path id="Path_39337" data-name="Path 39337" d="M445.3,142.178a4.936,4.936,0,1,0,4.936,4.936,4.936,4.936,0,0,0-4.936-4.936m0,8.139a3.2,3.2,0,1,1,3.2-3.2,3.2,3.2,0,0,1-3.2,3.2" transform="translate(-435.686 -137.501)" fill="#222221"/>
                    <path id="Path_39338" data-name="Path 39338" d="M452.345,141.867a1.153,1.153,0,1,1-1.153-1.153,1.153,1.153,0,0,1,1.153,1.153" transform="translate(-436.449 -137.386)" fill="#222221"/>
                  </g>
                </g>
              </svg></a>
                                  
            <!-- <a href="#!" class="icon-attachment">
              <svg xmlns="http://www.w3.org/2000/svg" width="36.5" height="36.5" viewBox="0 0 36.5 36.5">
                <g id="Group_20917" data-name="Group 20917" transform="translate(0.25 0.25)">
                  <path id="Path_39335" data-name="Path 39335" d="M444.19,163.505h0a17.5,17.5,0,0,1-17.5-17.5h0a17.5,17.5,0,0,1,17.5-17.5h0a17.5,17.5,0,0,1,17.5,17.5h0A17.5,17.5,0,0,1,444.19,163.505Z" transform="translate(-426.19 -128.005)" fill="none" stroke="#222221" stroke-miterlimit="10" stroke-width="1.5"/>
                  <g id="Group_21452" data-name="Group 21452" transform="translate(-3.505 -3.506)">
                    <path id="Path_39679" data-name="Path 39679" d="M19.086,29.207A4.442,4.442,0,0,1,12.8,22.925l3.49-3.49a4.449,4.449,0,0,1,6.282,0,.9.9,0,0,1,.573,1.019.74.74,0,0,1-.857.6,1.335,1.335,0,0,1-.764-.573,2.938,2.938,0,0,0-4.188,0l-3.49,3.49a2.961,2.961,0,0,0,4.188,4.188l3.316-3.316a.74.74,0,1,1,1.061,1.033l-.014.014-3.316,3.316Zm6.631-6.631a4.449,4.449,0,0,1-6.282,0,.74.74,0,0,1,1.047-1.047h0a2.938,2.938,0,0,0,4.188,0l3.49-3.49a2.961,2.961,0,0,0-4.188-4.188l-3.316,3.316a.74.74,0,0,1-1.062-1.032l.015-.015L22.925,12.8a4.442,4.442,0,0,1,6.282,6.282l-3.49,3.49Z"/>
                  </g>
                </g>
              </svg>
            </a> -->
</div><script async src="https://static.addtoany.com/menu/page.js"></script>

          </div>
        </div>
        <div class="border_text">
               <!-- <?php $sub_title = get_post_meta(get_the_ID(),'vibe_subtitle',true);
              echo wp_trim_words( $sub_title, 18, NULL )
              ?>  -->
              <?php echo $post_excerpt; ?> 
              <!-- In this session, experts talk about ways to help children boost social skills through remote classes. --> 
          </div> 
      </div>
      <div class="content-left testimonial-content">
          
          <!-- <iframe src="https://www.youtube.com/embed/yBo10BCif2Y" width="640" height="360" frameborder="0" allowfullscreen></iframe> -->
           <?php  echo the_field('video_link'); ?>
        <!-- <?php echo $testimonial_video_link;?> -->


            <!-- <img src="<?php echo $featured_image; ?>"> -->
            <!--     <?php if(get_post_meta(get_the_ID(), 'image_caption', true)){?>
            <p class="newsdetail_caption"><?php echo get_post_meta(get_the_ID(), 'image_caption', true); ?>
                <?php } else{?>
            <p class="newsdetail_caption"><?php echo the_post_thumbnail_caption(); ?>
                <?php }?> -->

          <p><?php 
               $post_content = get_post_field('post_content', $post->ID);
                                        
                ob_start();
                dynamic_sidebar('news_landing_mid_banner');
                $addDisplay = ob_get_contents();
                ob_end_clean();

                $ad_code = '<div class="adsense advertisement">' . $addDisplay . '</div>';
                                      
                $post_content = $ad_code . $post_content;

                echo $post_content;
                                        /*if ( $post_content != '' ) {

                                          $post_content = prefix_insert_after_words( $ad_code,75, $post_content );
                                        }*/
                ?></p>
          <!-- <div class="advertisement center">
              <img src="/images/ad.png" />
          </div> -->
      </div>
    </div>
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
