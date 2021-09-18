<?php
/**
 * Template Name: Testimonial Listing
 */
if ( !defined( 'ABSPATH' ) ) exit;

get_header(vibe_get_header());


?>

<!-- <script async src="https://static.addtoany.com/menu/page.js"></script> -->
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
                'posts_per_page' => 10,
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
                            <a class="play" href="<?php echo get_permalink(); ?>"></a>
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
                                      <?php echo $custom_fields['vibe_testimonial_author_name'][0] ?>
                                        
                                    </h5>
                                    <h6>
                                      <?php echo $custom_fields['vibe_testimonial_author_designation'][0] ?>
                                        
                                    </h6> 
                                </div>
                               <!--  <div class="cats">
                                    <ul class="post-categories">
                                        <?php //echo $categoryList;
                                            //echo $instructor;
                                        ?>
                                    </ul>
                                </div>  -->                               
                               <!--  <p><?php //echo the_content();?></p> -->
                            </div>
                        </div>
                        <footer class="course-footer">
                    
                    <div class="right">
                    <a href="" class="hover_share testimonial_share" data-toggle="modal" data-target="#open_testimonial_share" data-id="<?php echo get_the_ID();?>">
                      <input type="hidden" id="testimonial_id_<?php echo get_the_ID();?>" value="<?php echo get_the_ID();?>" data-id="<?php echo get_the_ID();?>">
                      <input type="hidden" id="testimonial_title_<?php echo get_the_ID();?>" value="<?php echo the_content(); ?>">
                      <input type="hidden" id="testimonial_name_<?php echo get_the_ID();?>" value="<?php echo $custom_fields['vibe_testimonial_author_name'][0] ?>">
                      <input type="hidden" id="testimonial_image_<?php echo get_the_ID();?>" value="<?php echo get_the_post_thumbnail_url(); ?>">
                      <input type="hidden" id="testimonial_designation_<?php echo get_the_ID();?>" value="<?php echo $custom_fields['vibe_testimonial_author_designation'][0] ?>">
                      <input type="hidden" id="testimonial_url_<?php echo get_the_ID();?>" value="<?php echo get_permalink(); ?>">
                    <svg class="share" xmlns="http://www.w3.org/2000/svg" width="25.445" height="19.4" viewBox="0 0 25.445 19.4"> <g id="Group_20744" data-name="Group 20744" transform="translate(0.205 0.2)" style="isolation: isolate"> <path id="Path_38322" data-name="Path 38322" d="M21.417,21a.53.53,0,0,1,.275.133l9.091,8.188a.724.724,0,0,1,.1.919.626.626,0,0,1-.1.114l-9.091,8.188a.52.52,0,0,1-.8-.12.723.723,0,0,1-.118-.392V34.746a18.89,18.89,0,0,0-4.705.389,17.55,17.55,0,0,0-9.127,4.7.518.518,0,0,1-.8-.062.733.733,0,0,1-.113-.634C8.4,30.71,15.625,26.694,20.778,25.094V21.655a.618.618,0,0,1,.564-.66A.446.446,0,0,1,21.417,21Zm.5,1.985v2.6a.645.645,0,0,1-.426.634C17,27.53,10.737,30.858,7.913,37.407a19.292,19.292,0,0,1,7.964-3.562,21.972,21.972,0,0,1,5.5-.4.621.621,0,0,1,.542.655v2.589l7.6-6.848Z" transform="translate(-6.003 -20.995)" stroke-width="0.4"/> </g> </svg>
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
                                <!-- <div class="cats">
                                    <ul class="post-categories">
                                        <?php //echo $categoryList;
                                            //echo $instructor;
                                        ?>
                                    </ul>
                                </div> -->
                               
                            </div>
                        </div>
                        <footer class="course-footer">
                        
                    <div class="right">
                    <a href="" class="hover_share testimonial_share" data-toggle="modal" data-target="#open_testimonial_share" data-id="<?php echo get_the_ID();?>">
                      <input type="hidden" id="testimonial_id_<?php echo get_the_ID();?>" value="<?php echo get_the_ID();?>" data-id="<?php echo get_the_ID();?>">
                      <input type="hidden" id="testimonial_title_<?php echo get_the_ID();?>" value="<?php echo the_content(); ?>">
                      <input type="hidden" id="testimonial_name_<?php echo get_the_ID();?>" value="<?php echo $custom_fields['vibe_testimonial_author_name'][0] ?>">
                      <input type="hidden" id="testimonial_image_<?php echo get_the_ID();?>" value="<?php echo get_the_post_thumbnail_url(); ?>">
                      <input type="hidden" id="testimonial_designation_<?php echo get_the_ID();?>" value="<?php echo $custom_fields['vibe_testimonial_author_designation'][0] ?>">
                      <input type="hidden" id="testimonial_url_<?php echo get_the_ID();?>" value="<?php echo get_permalink(); ?>">
                    <svg class="share" xmlns="http://www.w3.org/2000/svg" width="25.445" height="19.4" viewBox="0 0 25.445 19.4"> <g id="Group_20744" data-name="Group 20744" transform="translate(0.205 0.2)" style="isolation: isolate"> <path id="Path_38322" data-name="Path 38322" d="M21.417,21a.53.53,0,0,1,.275.133l9.091,8.188a.724.724,0,0,1,.1.919.626.626,0,0,1-.1.114l-9.091,8.188a.52.52,0,0,1-.8-.12.723.723,0,0,1-.118-.392V34.746a18.89,18.89,0,0,0-4.705.389,17.55,17.55,0,0,0-9.127,4.7.518.518,0,0,1-.8-.062.733.733,0,0,1-.113-.634C8.4,30.71,15.625,26.694,20.778,25.094V21.655a.618.618,0,0,1,.564-.66A.446.446,0,0,1,21.417,21Zm.5,1.985v2.6a.645.645,0,0,1-.426.634C17,27.53,10.737,30.858,7.913,37.407a19.292,19.292,0,0,1,7.964-3.562,21.972,21.972,0,0,1,5.5-.4.621.621,0,0,1,.542.655v2.589l7.6-6.848Z" transform="translate(-6.003 -20.995)" stroke-width="0.4"/> </g> </svg>
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