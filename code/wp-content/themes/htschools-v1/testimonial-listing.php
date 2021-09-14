<?php
/**
 * Template Name: Testimonial Listing
 */
if ( !defined( 'ABSPATH' ) ) exit;

get_header(vibe_get_header());
?>
<section class="home-section editor_desk testimonial_listing">
  <div class="breadcrumbs background-breadcrumbs">
      <?php vibe_breadcrumbs(); ?>  
    </div>
    <div class="section-header">
          <h2 class="semi_medium-title">Testimonial Listing
            <?php
              if(is_month()){
                  single_month_title(' ');
              }elseif(is_year()){
                  echo get_the_time('Y');
              }else if(is_category()){
                  echo single_cat_title();
              }else if(is_tag()){
                   single_tag_title();
              }else if(is_tax()){
                  single_term_title();
              }else{
                  post_type_archive_title();
              }
            ?>
          </h2>
      </div>
      <div class="content-left">
        <div class="course-wrapper">
          <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
              $args1 = array(
                'post_type' => 'testimonials',
                'post_status' => 'publish',
                'order'=>'DESC',
                'orderby' => 'post_date',
                'posts_per_page' => 1,
                'paged'=>$paged
              );
              
              $wp_query = new WP_Query( $args1 );

              $i=0; 
              if ($wp_query->have_posts())
               {
                    while ($wp_query->have_posts()) 
                    {
                         $wp_query->the_post();
                
               
                         $custom_fields = get_post_custom();
                
                    if($i==0)
                    {
                      
                ?>
          <div class="top_article">
              <div class="column">
                <div class="course-card">
                    <figure class="image">
                        <div class="featured">
                            <a href="<?php echo get_permalink(); ?>">
                                <img alt="testimonial" title="testimonial" src="<?php echo get_the_post_thumbnail_url(); ?>" class="testimonial-img img-fluid" alt="" >
                            </a>
                            <a class="play" href="#!"></a>
                        </div>
                    </figure>
                    <div class="course-copy">
                        <div class="">
                            <div class="excerpt thumb">
                                <div class="meta">
                                     <div class="date">
                                        <?php echo strtoupper(get_post_meta(get_the_ID(), 'news_location', true));?> <?php echo $postDate; ?>
                                    </div>
                                </div>
                                <h3>
                                    <a href="<?php echo get_permalink(); ?>">
                                        <?php echo the_title(); ?>
                                    </a>
                                </h3>
                                <div class="cats">
                                    <ul class="post-categories">
                                        <?php //echo $categoryList;
                                            //echo $instructor;
                                        ?>
                                    </ul>
                                </div>
                                <!-- <p><?php echo wp_trim_words( get_the_excerpt(), 30); ?></p> -->
                                <p><?php echo the_content();?></p>
                            </div>
                        </div>
                        <footer class="course-footer">
                      <div class="right">
                         
                          <a href="<?php echo get_bloginfo('template_url');?>" class="hover_share">
                              <svg xmlns="http://www.w3.org/2000/svg" width="25.445" height="19.4" viewBox="0 0 25.445 19.4">
                                  <g id="Group_21136" data-name="Group 21136" transform="translate(0.205 0.2)" style="isolation: isolate">
                                      <path id="Path_38322" data-name="Path 38322" d="M21.417,21a.53.53,0,0,1,.275.133l9.091,8.188a.724.724,0,0,1,.1.919.626.626,0,0,1-.1.114l-9.091,8.188a.52.52,0,0,1-.8-.12.723.723,0,0,1-.118-.392V34.746a18.89,18.89,0,0,0-4.705.389,17.55,17.55,0,0,0-9.127,4.7.518.518,0,0,1-.8-.062.733.733,0,0,1-.113-.634C8.4,30.71,15.625,26.694,20.778,25.094V21.655a.618.618,0,0,1,.564-.66A.446.446,0,0,1,21.417,21Zm.5,1.985v2.6a.645.645,0,0,1-.426.634C17,27.53,10.737,30.858,7.913,37.407a19.292,19.292,0,0,1,7.964-3.562,21.972,21.972,0,0,1,5.5-.4.621.621,0,0,1,.542.655v2.589l7.6-6.848Z" transform="translate(-6.003 -20.995)" fill="#ff5a5a" stroke="#ff5a5a" stroke-width="0.4"/>
                                  </g>
                              </svg>
                              <!-- <div class="display_icon">
                                  <h6>Share <span><i class="bi bi-x close-share"></i></span></h6>
                                  <div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="<?php echo get_bloginfo('url')?>/<?php echo $post->post_name;?>" data-a2a-title="<?php echo $post->post_title. ' - '.get_bloginfo(); ?>" data-id="<?php echo $post->ID;?>">
                                      <a class="a2a_button_facebook"></a>
                                      <a class="a2a_button_twitter"></a>
                                      <a class="a2a_button_pinterest"></a>
                                      <a class="a2a_button_google_gmail"></a>
                                      <a class="a2a_button_whatsapp"></a>
                                      <a class="a2a_button_telegram"></a>
                                  </div><script async src="https://static.addtoany.com/menu/page.js"></script>
                              </div> -->
                          </a>
                      </div>
                  </footer>
                    </div>

                </div>
            </div>
      </div>
       <?php }

        else if($i>0) { ?>
      
       
                  <div class="column">
                <div class="course-card">
                    <figure class="image">
                        <div class="featured">
                            <a href="<?php echo get_permalink(); ?>">
                                <img alt="testimonial" title="testimonial" src="<?php echo get_the_post_thumbnail_url(); ?>" class="testimonial-img img-fluid" alt="" >
                            </a>
                            <a class="play" href="#!"><span class="time">3:20</span></a>
                        </div>
                    </figure>
                    <div class="course-copy">
                        <div class="">
                            <div class="excerpt thumb">
                                <div class="meta">
                                     <div class="date">
                                        <?php echo strtoupper(get_post_meta(get_the_ID(), 'news_location', true));?> <?php echo $postDate; ?>
                                    </div>
                                </div>
                                <h3>
                                    <a href="<?php echo get_permalink(); ?>">
                                        <?php echo the_title(); ?>
                                    </a>
                                </h3>
                                <div class="testimonial_detail">
                                    <h5>
                                      <?php echo " ".$custom_fields['vibe_testimonial_author_name'][0] ?>
                                        
                                    </h5>
                                    <h6>
                                      <?php echo " ".$custom_fields['vibe_testimonial_author_designation'][0] ?>
                                        
                                    </h6> 
                                </div>
                                <div class="cats">
                                    <ul class="post-categories">
                                        <?php //echo $categoryList;
                                            //echo $instructor;
                                        ?>
                                    </ul>
                                </div>
                                <!-- <p><?php echo wp_trim_words( get_the_excerpt(), 30); ?></p> -->
                                <!-- <p><?php echo wp_trim_words( the_content(), 30);?></p> -->
                            </div>
                        </div>
                        <footer class="course-footer">
                <div class="right">
                   
                    <a href="<?php echo get_bloginfo('template_url');?>" class="hover_share">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25.445" height="19.4" viewBox="0 0 25.445 19.4">
                            <g id="Group_21136" data-name="Group 21136" transform="translate(0.205 0.2)" style="isolation: isolate">
                                <path id="Path_38322" data-name="Path 38322" d="M21.417,21a.53.53,0,0,1,.275.133l9.091,8.188a.724.724,0,0,1,.1.919.626.626,0,0,1-.1.114l-9.091,8.188a.52.52,0,0,1-.8-.12.723.723,0,0,1-.118-.392V34.746a18.89,18.89,0,0,0-4.705.389,17.55,17.55,0,0,0-9.127,4.7.518.518,0,0,1-.8-.062.733.733,0,0,1-.113-.634C8.4,30.71,15.625,26.694,20.778,25.094V21.655a.618.618,0,0,1,.564-.66A.446.446,0,0,1,21.417,21Zm.5,1.985v2.6a.645.645,0,0,1-.426.634C17,27.53,10.737,30.858,7.913,37.407a19.292,19.292,0,0,1,7.964-3.562,21.972,21.972,0,0,1,5.5-.4.621.621,0,0,1,.542.655v2.589l7.6-6.848Z" transform="translate(-6.003 -20.995)" fill="#ff5a5a" stroke="#ff5a5a" stroke-width="0.4"/>
                            </g>
                        </svg>
                        <!-- <div class="display_icon">
                            <h6>Share <span><i class="bi bi-x close-share"></i></span></h6>
                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="<?php echo get_bloginfo('url')?>/<?php echo $post->post_name;?>" data-a2a-title="<?php echo $post->post_title. ' - '.get_bloginfo(); ?>" data-id="<?php echo $post->ID;?>">
                                <a class="a2a_button_facebook"></a>
                                <a class="a2a_button_twitter"></a>
                                <a class="a2a_button_pinterest"></a>
                                <a class="a2a_button_google_gmail"></a>
                                <a class="a2a_button_whatsapp"></a>
                                <a class="a2a_button_telegram"></a>
                            </div><script async src="https://static.addtoany.com/menu/page.js"></script>
                        </div> -->
                    </a>
                </div>
            </footer>
                    </div>
                </div>
            </div>

               

       <?php
              }
              $i++;?>
              
              <?php
            }
          } 
        posts_pagination();
        ?>
  </div>
    </div>
</section>
<!-- content -->
   

<?php
  get_footer(vibe_get_footer());
?>