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

            <div class="blogpost">
                <div class="col-sm-12 col-md-2 mrg">
                    <div class="featured">
                        <a href="<?php echo get_permalink(); ?>"><img src="<?php echo $featured_image; ?>"> </a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 mrg">
                    
                    <div class="excerpt thumb">
                        <div class="meta">
                         <div class="date">
                            <?php echo strtoupper(get_post_meta(get_the_ID(), 'news_location', true));?> <?php echo $postDate; ?>
                        </div>
                    </div>
                        <h3>
                            <a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a>
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
                <div class="col-sm-12 col-md-2 mrg news_icons">
                     
                   <div class="share-icon">

                    <ul>       
                        <li class="hover_share">
                        <img src="<?php echo get_bloginfo('template_url');?>/assets/images/share-icon.svg">
                        <div class="display_icon">
                            <h6>Share <span><i class="bi bi-x close-share"></i></span></h6>
                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="<?php echo get_bloginfo('url')?>/<?php echo $post->post_name;?>" data-a2a-title="<?php echo $post->post_title. ' - '.get_bloginfo(); ?>">
                                <a class="a2a_button_facebook"></a>
                                <a class="a2a_button_twitter"></a>
                                <a class="a2a_button_pinterest"></a>
                                <a class="a2a_button_google_gmail"></a>
                                <a class="a2a_button_whatsapp"></a>
                                <a class="a2a_button_telegram"></a>
                            </div><script async src="https://static.addtoany.com/menu/page.js"></script>
                        </div>
                      </li>
                        <li>
                        <?php
                            if(is_user_logged_in()){
                                ?>
                                <li style="list-style-type: none;"><?php wpfp_post_link(); ?></li>
                            <?php }else{
                                $url = "/login-register";
                                ?>
                                   <li><a href="<?php echo get_site_url().$url; ?>"><i class="bookmark-remove" title="Bookmark this article"></i></a></li> 
                                <?php
                            }
                        ?>
                        </li>
                     </ul> 
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