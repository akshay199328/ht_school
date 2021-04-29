<?php

/**
 * BuddyPress Saved Course
 *
 * @package BuddyPress
 * @subpackage bp-default
 */

get_header( vibe_get_header() ); 

$profile_layout = vibe_get_customizer('profile_layout');

vibe_include_template("profile/top$profile_layout.php");  
?>
<div id="item-body">
    <div class="col-md-3 left_tabs pull-left">
        <div class="item-list-tabs no-ajax" id="subnav" role="navigation">
        	<ul class="left_tab">
        		<?php if ( bp_is_my_profile() ) bp_get_options_nav(); 
        		do_action('bp_course_get_options_sub_nav');
        		?>
        	</ul>
        	<ul>
        </div><!-- .item-list-tabs -->
    </div>
    <div class="col-md-9 pull-left"> 
        <div class="profile-card transprent ">
            <h1>Saved Articles</h1>
            <div class="news-listing">
                <?php 
                    $article_data = wpfp_get_users_favorites();
                    $count_array = []; 
                    foreach ($article_data as $post_id) {
                        $post = get_post($post_id);
                        if($post->post_type == "post"){
                            array_push($count_array, $post->ID);
                        }
                    }
                    $count = count($count_array);
                    foreach ($article_data as $post_id) {
                       
                    $post = get_post($post_id);

                    if ( has_post_thumbnail() ) { 
                        $featured_image = get_the_post_thumbnail_url();
                    }
                    $postDate = get_the_date('M d, Y H:i');
                    if($post->post_type == "post"){

                ?>
                <div class="blogpost">
                    <div class="col-xs-2 col-sm-2 col-md-2 mrg pull-left">
                        <div class="featured">
                            <a href="<?php echo get_permalink(); ?>"><img src="<?php echo $featured_image; ?>"> </a>
                        </div>
                    </div>
                    <div class="col-xs-10 col-sm-10 col-md-10 mrg pull-right">
                        <div class="col-sm-10 col-md-10 mrg ">
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
                        <div class="col-xs-2 col-sm-2 col-md-2 mrg news_icons">
                            <div class="share-icon">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <!-- <img src="<?php echo get_bloginfo('template_url')?>/assets/images/delete-icon.svg"/> -->
                                            <?php
                                                if(is_user_logged_in()){
                                                  ?>
                                                  <?php wpfp_save_link(); ?>
                                                        <?php }else{
                                                  $url = "/login-register";
                                                  ?>
                                                     <a href="<?php echo get_site_url().$url; ?>"><i class="bookmark-remove"></i></a> 
                                                  <?php
                                              }
                                          ?>
                                        </a>
                                    </li>
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
                                </ul>  
                                <script async src="https://static.addtoany.com/menu/page.js"></script>
                            </div>
                        </div>
                    </div>
                
                
            </div>
            <?php 
             }
            }
            if($count < 1){
            ?>
            <div class="empty_cart_div">
                <div class="empty_article_image"></div>
                <h4>Nothing Here But Us!</h4>
                <p>All your saved articles will appear here.</p>
                <a href="<?php echo get_home_url();?>/editorsdesk/"><button class="empty_btn">Explore Editor’s Desk</button></a>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<div id="empty"></div>
<?php do_action( 'bp_after_member_settings_template' ); ?>
</div>		
<?php

vibe_include_template("profile/bottom.php");  

get_footer( vibe_get_footer() ); 