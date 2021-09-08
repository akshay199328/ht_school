<?php
/**
 * news Style Content Block
 */

if ( ! defined( 'ABSPATH' ) ) exit;

if ( function_exists('get_coauthors')) {
    $coauthors = get_coauthors( $id );
    $instructors = array();
    if(isset($coauthors)){
        foreach($coauthors as $k=>$inst){

            $instructor_id = $inst->ID;
            $displayname = bp_core_get_user_displayname($instructor_id);
            $author_posts_url = get_author_posts_url( $instructor_id );
            $instructor = '<a href="'.$author_posts_url.'">'.$displayname.'</a>';
            $instructors[] = $instructor;
        }
    }
}


$post_id = get_the_ID();
if ( has_post_thumbnail() ) {
    $featured_image = get_the_post_thumbnail_url();
}
$topics = wp_get_post_tags(get_the_ID());
$categoryList = get_the_category_list('','');
$postDate = get_the_date('M d, Y H:i');
if(!empty($instructors)){
    $instructor = implode(',', $instructors);
}else{
    $instructor_id = get_the_author_meta( 'ID' );
    $author_posts_url = get_author_posts_url( $instructor_id );
    $displayname = get_the_author_meta( 'display_name' );
    $instructor = '<a href="'.$author_posts_url.'">'.$displayname.'</a>';
}
$post = get_post($post_id);

?>

<div class="column">
    <div class="course-card">
        <figure class="image">
            <div class="featured">
                <a href="<?php echo get_permalink(); ?>">
                    <img src="<?php echo $featured_image; ?>" /> 
                </a>
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
                    <a href="#bookmark!">
                        <svg class="bookmark" xmlns="http://www.w3.org/2000/svg" width="17" height="21.146" viewBox="0 0 17 21.146"><path id="Path_38323" data-name="Path 38323" d="M31.409,38.413,35.5,34.368l4.091,4.045a2.083,2.083,0,0,0,2.79.074A1.773,1.773,0,0,0,43,37.147v-14.3A2.964,2.964,0,0,0,39.932,20H31.068A2.964,2.964,0,0,0,28,22.849V37.159A1.906,1.906,0,0,0,29.965,39a2.049,2.049,0,0,0,1.444-.575Z" transform="translate(-27 -19)"></path></svg>
                    </a>
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



<!-- <?php

echo ' <div class="blogpost">
        <div class="meta">
           <div class="date">
            <p class="day"><span>'.sprintf('%02d', get_the_time('j')).'</span></p>
            <p class="month">'.get_the_time('M').'\''.get_the_time('y').'</p>
           </div>
        </div>
        '.(has_post_thumbnail($post_id)?'
        <div class="featured">
            <a href="'.get_permalink().'">'.get_the_post_thumbnail($post_id,'full').'</a>
        </div>':'').'
        <div class="excerpt '.(has_post_thumbnail($post_id)?'thumb':'').'">
            <h3><a href="'.get_permalink().'">'.get_the_title().'</a></h3>
            <div class="cats">
                '.get_the_category_list('','').'
                <p>
                '.$instructor.'
                </p>
            </div>
            <p>'.get_the_excerpt().'</p>
            <a href="'.get_permalink().'" class="link">'.__('Read More','vibe').'</a>
        </div>
    </div>';
?> -->