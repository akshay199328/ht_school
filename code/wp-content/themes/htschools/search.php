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
<section id="title">
    <?php do_action('wplms_before_title'); ?>
    <div class="<?php echo vibe_get_container(); ?>">
        <div class="row">
            <div class="col-md-12">
                <div class="pagetitle">
                    <?php vibe_breadcrumbs(); ?>  
                    <h1><?php //_e('Search Results for "', 'vibe'); the_search_query(); ?></h1>
                    <h5><?php //echo vibe_sanitizer($total_results).__(' results found','vibe');  ?></h5>
                </div>
            </div>

        </div>
    </div>
    <div class="<?php echo vibe_get_container(); ?>">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="search_section">
                    <div class="search_icon"></div>
                    <input type="text" name="search" placeholder="Search HT School">
                </div>
            </div>
        </div>
    </div>


</section>

<?php
get_footer(vibe_get_footer());
?>