<?php

if (isset($_GET["post_type"]) && $_GET["post_type"] == 'course'){ 
    if(file_exists(get_stylesheet_directory(). '/search-incourse.php')){
        load_template(get_stylesheet_directory() . '/search-incourse.php'); 
        exit();
    }
    if(file_exists(get_template_directory(). '/search-incourse.php')){
        load_template(get_template_directory() . '/search-incourse.php'); 
        exit();
    }
}

get_header(vibe_get_header());
global $wp_query;
$total_results = $wp_query->found_posts;
?>
<section id="title" class="search_page">
    <?php do_action('wplms_before_title'); ?>
    <div class="<?php echo vibe_get_container(); ?>">
        <div class="row">
            <div class="col-md-12">
                <div class="pagetitle">
                    <?php vibe_breadcrumbs(); ?>  
                    <h1><?php _e('Search Results  ', 'vibe');  ?></h1>
                    <h5><?php echo vibe_sanitizer($total_results).__(' results found','vibe');  ?></h5>
                </div>
            </div>

        </div>
    </div>
    <div class="<?php echo vibe_get_container(); ?>">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <form action="<?php echo home_url(); ?>" id="search-form" method="get">
                   <div class="search_section">
                    <div class="search_icon"></div>
                    <input type="text" name="s" id="s" placeholder="Search HT School" onblur="if(this.placeholder=='')this.placeholder='Search HT School'"
                    onfocus="if(this.placeholder=='Search HT School')this.placeholder=''" />
                    <input type="hidden" value="submit" />
                </div> 
                 
                </form>
                
            </div>
        </div>
    </div>


</section>


<section id="content">
    <div class="<?php echo vibe_get_container(); ?>">
        <div class="row">
        <div class="col-md-9 col-sm-8">
            <div class="content blogpost-search_bottom">
                <?php
                    if ( have_posts() ) : while ( have_posts() ) : the_post();

                    $categories = get_the_category();
                    $cats='<ul>';
                    if($categories){
                        foreach($categories as $category) {
                            $cats .= '<li><a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s","vibe" ), $category->cat_name ) ) . '">'.$category->cat_name.'</a></li>';
                        }
                    }
                    $cats .='</ul>';
                    
                    if(function_exists('vibe_get_option')){
                        
                           get_template_part('content','searchdefault');
                        
                    }
                    endwhile;
                    else:
                        echo '<h3>'.__('Sorry, No results found.','vibe').'</h3>';
                    endif;
                    custom_pagination_search();
                ?>
            </div>
        </div>
        <div class="col-md-3 col-sm-4">
            <div class="sidebar">
                <?php
                    $sidebar = apply_filters('wplms_sidebar','searchsidebar');
                    if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : ?>
                    <?php endif; ?>
            </div>
        </div>
        </div>
    </div>
</section>

<?php 

if(isset($_GET['s'])&& (count_chars($_GET['s'])>=3)){?>

<script type="text/javascript">
          jQuery( ".excerpt h3 a" ).click(function() {
            let SearchMoegObj = {
                "User identifier"   : jQuery("#footer_user_identifier").val(),
                "Session source"    : jQuery("#footer_session_source").val(),
                "Timestamp"         : jQuery("#footer_timestamp").val(),
                "Search query"          : '<?php echo $_GET["s"];?>',
                "Search suggestion clicked"          : "",
                "Search result clickeds"          :  jQuery(this).text(),               
            }
            Moengage.track_event("Searched", SearchMoegObj);

        });

</script>
   
<?php }?>



<?php
get_footer(vibe_get_footer());
?>