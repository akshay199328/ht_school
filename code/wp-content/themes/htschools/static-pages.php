<?php
/**
 * Template Name: Static Pages
 */

get_header(vibe_get_header());
if ( have_posts() ) : while ( have_posts() ) : the_post();

$title=get_post_meta(get_the_ID(),'vibe_title',true);
if(vibe_validate($title) || empty($title)){
?>
<div class="innerheader-space"></div>

<?php
}
?>
<section id="content" class="static_content grey-background">
    <div class="<?php echo vibe_get_container(); ?>">
        <div class="row">
            <div class="col-md-12 ">
              <div class="breadcrumbs">
                  <?php
                      $breadcrumbs=get_post_meta(get_the_ID(),'vibe_breadcrumbs',true);
                      if(vibe_validate($breadcrumbs) || empty($breadcrumbs))
                          vibe_breadcrumbs(); 
                  ?>
                  
                  <?php the_sub_title(); ?>
              </div>
            </div>
            <div class="details">
                <div class="col-md-3 col-sm-4">
                    <div class="sidebar">
                       <ul class="border-link">
                            <?php
                               $menu_name = 'footer-menu'; //menu slug
                               $locations = get_nav_menu_locations();
                               $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
                               $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
                               //print_r($menuitems);
                               foreach ($menuitems as $menu) {  
                                if($menu->title != 'Contact Us'){
                                   echo '<li><a href="' . $menu->url . '">' . $menu->title . '</a></li>';
                                }
                               }
                           ?>

                        </ul>
                    </div>
                </div>
                <div class="col-md-9 col-sm-8">
                    <div class="content">
                      <div class="pagetitle">
                        <h1><?php the_title(); ?></h1> 
                      </div>
                      
                        <?php
                            the_content();
                           
                         ?>
                    </div>
                    <?php
                    
                    endwhile;
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