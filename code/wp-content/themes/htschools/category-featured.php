<?php
if ( ! defined( 'ABSPATH' ) ) exit;
get_header(vibe_get_header());
?>
  <div class="innerheader-space"></div>
<section class="news-listing grey-background">
  <div class="<?php echo vibe_get_container(); ?>">
    <div class="">
    <div class="breadcrumbs background-breadcrumbs">
      <?php vibe_breadcrumbs(); ?>  
    </div>
    <div class="course-tablist">
      <div class="tablist">
      <?php
          $menu_name = 'news-menu'; //menu slug
          $locations = get_nav_menu_locations();
          $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
          $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
          global $wp;
          $current_url = home_url(add_query_arg(array(), $wp->request));

          foreach ($menuitems as $menu) {  
            if($current_url."/" == $menu->url){    
              ?>
              <li><a href="<?php echo $menu->url; ?> "class="active"><?php echo $menu->title; ?></a></li>
              <?php 
            }else{
              ?>
              <li><a href="<?php echo $menu->url; ?>" ><?php echo $menu->title; ?></a></li>
              <?php
            }
          }
      ?>
      </div>
      <div class="pagetitle">
      <h1>
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
      </h1>
      <h5><?php echo term_description(); ?></h5>
      </div>
      <div class="col-sm-12 col-md-9 mrg content-left">
        <div class="content">
        <?php
          if ( have_posts() ) : while ( have_posts() ) : the_post();

          $check = apply_filters('wplms_archive',false);
          
          if(empty($check) && function_exists('vibe_get_option')){
              $default_archive = vibe_get_option('default_archive');
              if(!empty($default_archive)){
                  get_template_part('content',$default_archive);
              }else{
                 get_template_part('content','default');
              }
          }
          endwhile;
          endif;
          pagination();
        ?>
      </div>
      </div>
      <div class="col-sm-12 col-md-3 content-right mrg">
        <div class="sidebar">
                    <?php
                    if ( is_active_sidebar( 'banner-2' ) ) :
                        dynamic_sidebar( 'banner-2' );      
                    endif;

            echo "<h3>"."Expert News"."<h3>";
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'category_name' => 'Expert',
                'posts_per_page' => 6,
            );
            $Query = new WP_Query( $args );
            if ($Query->have_posts()) : while ($Query->have_posts()) : $Query->the_post();
                      // if( $Query->current_post != 0 ) { 
              ?>
              <div class="list" >
                  <div class="date"><strong><?php echo strtoupper(get_post_meta(get_the_ID(), 'news_location', true));?> <?php echo get_the_date('M d, Y H:i'); ?></strong></div>
                  <div class="link">
                      <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
                  </div>
                </div>

              <?php 
                  // }
          endwhile; endif;

                    if ( is_active_sidebar( 'banner-2' ) ) :
                        dynamic_sidebar( 'banner-2' );      
                    endif;
                    $sidebar = apply_filters('wplms_sidebar','mainsidebar');
                    if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : ?>
                    <?php endif; ?>
          </div>
      </div>
      
    </div>
    
    </div>
  </div>
</section>
<section id="" class="latest-news news_latest-news lts_news">
  <div class="container">
    <div class="row gx-0">
      <div class="pagetitle">
        <h1>Interview News</h1>
      </div>
          <?php
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'category_name' => 'Interview',
                'posts_per_page' => 6,
            );
            $Query = new WP_Query( $args );
        ?>
                  <div class="col-sm-12 col-lg-12 mrg">
            <div class="details-middle">
              <ul>
                <?php if ($Query->have_posts()) : while ($Query->have_posts()) : $Query->the_post();

                  ?>
                    <li>
                      <p><strong><?php echo strtoupper(get_post_meta(get_the_ID(), 'news_location', true));?> <?php echo get_the_date('M d, Y H:i'); ?></strong></p>
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

        </div>
      </div>
    </section>
<?php
get_footer(vibe_get_footer());
?>