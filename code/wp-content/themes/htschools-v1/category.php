<?php
if ( ! defined( 'ABSPATH' ) ) exit;
get_header(vibe_get_header());
?>
<section class="home-section editor_desk editor_desk_listing">
  <div class="">
    <div class="">
    <div class="breadcrumbs background-breadcrumbs">
      <?php vibe_breadcrumbs(); ?>  
    </div>
    <div class="course-tablist">
      <div class="featured_tablist">
        <ul class="tablist left_tab">
      <?php
          $menu_name = 'news-menu'; //menu slug
          $locations = get_nav_menu_locations();
          $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
          $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
          global $wp;
          $current_url = home_url(add_query_arg(array(), $wp->request));
          ?>
          <li><a href="<?php echo get_site_url(); ?>/editorsdesk">Latest</a></li>
          <?php
          foreach ($menuitems as $menu) {  
            if($current_url."/" == $menu->url){    
              ?>
              <li class="active"><a href="<?php echo $menu->url; ?>" ><?php echo $menu->title; ?></a></li>
              <?php 
            }else{
              ?>
              <li><a href="<?php echo $menu->url; ?> "><?php echo $menu->title; ?></a></li>
              <?php
            }
          }
      ?>
    </ul>
      </div>
      <div class="section-header">
          <h2 class="semi_medium-title">
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
          <!-- <h5><?php echo term_description(); ?></h5> -->
      </div>
    </div>
      <div class="content-left">
        <div class="top_article">
    <div class="column">
    <div class="course-card">
        <figure class="image">
            <div class="featured">

                <a href="<?php echo get_permalink(); ?>">
                  <?php if ( has_post_thumbnail() ) {
                      $featured_image = get_the_post_thumbnail_url();
                  }?>
                    <img src="<?php echo $featured_image; ?>" /> 
                </a>
                
                <a class="play" href="#!"></a>
            </div>
        </figure>
        <div class="course-copy">
            <div class="">
                <div class="excerpt thumb">
                    <div class="meta">
                         <div class="date">
                          <?php $postDate = get_the_date('M d, Y H:i');?>
                            <?php echo strtoupper(get_post_meta(get_the_ID(), 'news_location', true));?> <?php echo $postDate; ?>
                        </div>
                    </div>
                    <h3>
                        <a href="<?php echo get_permalink(); ?>">
                            <?php echo get_the_title(); ?>
                        </a>
                    </h3>
                    <div class="cats">
                        <ul class="post-categories">
                            <?php //echo $categoryList;
                                //echo $instructor;
                            ?>
                        </ul>
                    </div>
                    <p><?php echo wp_trim_words( get_the_excerpt(), 30); ?></p>
                </div>
            </div>
            <footer class="course-footer">
                <div class="right">
                    <?php
                        if(is_user_logged_in()){
                            ?>
                                <a href="#" style="list-style-type: none;">
                                    <?php wpfp_post_link(); ?>
                                </a>
                            <?php 
                        }else{
                            $url = "/login-register";
                            ?>
                               <a href="<?php echo get_site_url().$url; ?>">
                                    <i class="bookmark-remove" title="Bookmark this article"></i>
                                </a>
                            <?php
                        }
                    ?>
                    <?php
                   if(is_user_logged_in()){
                    ?>
                    <?php wpfp_course_link(); ?>
                  <?php }else{
                    $url = "/login-register";
                    ?>
                    <a href="<?php echo get_site_url().$url; ?>"><i class="add-wishlist" title="Add to Wishlist"></i></a>
                    <?php
                  }
                  ?>
                    <a href="" class="hover_share editor_share" data-toggle="modal" data-target="#open_editor_share" id="editor_share" data-id="<?php echo get_the_ID();?>">
                      <input type="hidden" id="editors_id_<?php echo get_the_ID();?>" value="<?php echo get_the_ID();?>" data-id="<?php echo get_the_ID();?>">
                      <input type="hidden" id="editors_name_<?php echo get_the_ID();?>" value="<?php echo get_the_title();?>">
                      <input type="hidden" id="editors_image_<?php echo get_the_ID();?>" value="<?php echo $featured_image;?>">
                      <input type="hidden" id="editors_postdate_<?php echo get_the_ID();?>" value="<?php echo $postDate;?>">
                      <input type="hidden" id="editors_category_<?php echo get_the_ID();?>" value="<?php single_cat_title();?>">
                      <input type="hidden" id="editors_url_<?php echo get_the_ID();?>" value="<?php echo get_permalink(); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25.445" height="19.4" viewBox="0 0 25.445 19.4">
                            <g id="Group_21136" data-name="Group 21136" transform="translate(0.205 0.2)" style="isolation: isolate">
                                <path id="Path_38322" data-name="Path 38322" d="M21.417,21a.53.53,0,0,1,.275.133l9.091,8.188a.724.724,0,0,1,.1.919.626.626,0,0,1-.1.114l-9.091,8.188a.52.52,0,0,1-.8-.12.723.723,0,0,1-.118-.392V34.746a18.89,18.89,0,0,0-4.705.389,17.55,17.55,0,0,0-9.127,4.7.518.518,0,0,1-.8-.062.733.733,0,0,1-.113-.634C8.4,30.71,15.625,26.694,20.778,25.094V21.655a.618.618,0,0,1,.564-.66A.446.446,0,0,1,21.417,21Zm.5,1.985v2.6a.645.645,0,0,1-.426.634C17,27.53,10.737,30.858,7.913,37.407a19.292,19.292,0,0,1,7.964-3.562,21.972,21.972,0,0,1,5.5-.4.621.621,0,0,1,.542.655v2.589l7.6-6.848Z" transform="translate(-6.003 -20.995)" fill="#ff5a5a" stroke="#ff5a5a" stroke-width="0.4"/>
                            </g>
                        </svg>
                    </a>
                </div>
            </footer>
            
        </div>
    </div>
</div>
  </div>
        <div class="course-wrapper">
        <?php
        $counter = 0;
          if ( have_posts() ) : while ( have_posts() ) : the_post();
          if($counter != 0) {
            $check = apply_filters('wplms_archive',false);
            
            if(empty($check) && function_exists('vibe_get_option')){
                $default_archive = vibe_get_option('default_archive');
                if(!empty($default_archive)){
                    get_template_part('content',$default_archive);
                }else{
                   get_template_part('content','default');
                }
            }
          }
          $counter++;
          endwhile;
          endif;
          //pagination();
          
          posts_pagination();
        ?>
      </div>
      </div>
      <div class="link-article content-right">
        <div class="category_topAD">
          <?php
            if ( is_active_sidebar( 'instructor_banner' ) ) :
                dynamic_sidebar( 'instructor_banner' );      
            endif;
          ?>
        </div>
        <?php
          query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC&posts_per_page=4');
          if (have_posts()){
          ?>
          
        <div class="sidebar">
          <h3>Most Popular</h3>
          <ul>
            <?php if (have_posts()) : $counter = 0; while (have_posts()) : the_post();
                if ($counter <= 5) {
              ?>
              
                
              
              <li>
                  <span class="date-time">
                    <?php echo strtoupper(get_post_meta(get_the_ID(), 'news_location', true));?> <?php echo get_the_date('M d, Y H:i'); ?>
                      
                  </span>
                  <h2 class="article-title">
                      <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
                  </h2>
              </li>

              <?php 
                  }
              $counter++;
          endwhile; endif;

                    
                    $sidebar = apply_filters('wplms_sidebar','mainsidebar');
                    if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : ?>
                    <?php endif; ?>
              </ul>
          </div>
        <?php } ?>
          <div class="category_bottomAD">
            <?php

              if ( is_active_sidebar( 'news_landing_mid_banner' ) ) :
                  dynamic_sidebar( 'news_landing_mid_banner' );      
              endif;
             ?>
          </div>
      </div>
      
    
    
    </div>
  </div>
</section>
<?php

get_footer(vibe_get_footer());
?>