<?php
if ( ! defined( 'ABSPATH' ) ) exit;
get_header(vibe_get_header());
?>
  <section class="top-section home-section editor_desk" >
    <!-- <?php do_action('wplms_before_title'); ?> -->
    <div class="home-copy">
      <div class="pagetitle breadcrumbs background-breadcrumbs">
            <?php
            $breadcrumbs=get_post_meta(get_the_ID(),'vibe_breadcrumbs',true);
            if(vibe_validate($breadcrumbs) || empty($breadcrumbs))
              vibe_breadcrumbs();
            ?>
            <!-- <header class="section-header">
              <h2 class="semi_medium-title"><?php the_title(); ?></h2>
              <?php the_sub_title(); ?>
            </header> -->
        </div>
    </div>
  </section>
<section id="All" class="home-section editor_desk">
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
              <li><a href="<?php echo $menu->url; ?> "class="active"><?php echo $menu->title; ?></a></li>
              <?php 
            }else{
              ?>
              <li><a href="<?php echo $menu->url; ?>" ><?php echo $menu->title; ?></a></li>
              <?php
            }
          }
      ?>
    </ul>
      </div>
      <header class="section-header">
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
          <h5><?php echo term_description(); ?></h5>
      </header>
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
          //pagination();
          
          posts_pagination();
        ?>
      </div>
      </div>
      <div class="col-sm-12 col-md-3 content-right mrg">
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
          <h3>Popular on HTSchool</h3>
            <?php if (have_posts()) : $counter = 0; while (have_posts()) : the_post();
                if ($counter <= 5) {
              ?>
              <div class="list" >
                  <div class="date"><strong><?php echo strtoupper(get_post_meta(get_the_ID(), 'news_location', true));?> <?php echo get_the_date('M d, Y H:i'); ?></strong></div>
                  <div class="link">
                      <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
                  </div>
                </div>

              <?php 
                  }
              $counter++;
          endwhile; endif;

                    
                    $sidebar = apply_filters('wplms_sidebar','mainsidebar');
                    if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : ?>
                    <?php endif; ?>
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
      
</section>
<?php

get_footer(vibe_get_footer());
?>