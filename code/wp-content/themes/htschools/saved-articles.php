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
    <div class="col-md-3 left_tabs">
        <div class="item-list-tabs no-ajax" id="subnav" role="navigation">
        	<ul class="">
        		<?php if ( bp_is_my_profile() ) bp_get_options_nav(); 
        		do_action('bp_course_get_options_sub_nav');
        		?>
        	</ul>
        	<ul>
        </div><!-- .item-list-tabs -->
    </div>
    <div class="col-md-9"> 
        <div class="profile-card transprent ">
            <h1>Saved Articles</h1>
            <div class="news-listing">
                <?php 
                    $article_data = wpfp_get_users_favorites();
                    foreach ($article_data as $post_id) {
                       
                    $post = get_post($post_id);

                    if ( has_post_thumbnail() ) { 
                        $featured_image = get_the_post_thumbnail_url();
                    }
                    $postDate = get_the_date('M d, Y H:i');
                    if($post->post_type == "post"){

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
                <div class="col-sm-2 col-md-2 mrg">
                    <div class="share-icon">
                        <ul>
                            <li>
                                <a href="#">
                                    <!-- <img src="<?php echo get_bloginfo('template_url')?>/assets/images/delete-icon.svg"/> -->
                                    <?php
                                        if(is_user_logged_in()){
                                          ?>
                                          <?php wpfp_link(); ?>
                                                <?php }else{
                                          $url = "/login-register";
                                          ?>
                                             <a href="<?php echo get_site_url().$url; ?>"><i class="bi bi-bookmark"></i></a> 
                                          <?php
                                      }
                                  ?>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.addtoany.com/share" class="a2a_dd">
                                    <svg xmlns="" width="16" height="16" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
                                        <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"></path>
                                    </svg>
                                </a>
                            </li>
                        </ul>  
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                    </div>
                </div>
                
            </div>
            <?php 
             }
            }
            ?>
            <div class="empty_cart_div">
                <div class="empty_article_image"></div>
                <h4>Nothing Here But Us!</h4>
                <p>All your saved articles will appear here.</p>
                <button class="empty_btn">Explore Editor’s Desk</button>
            </div>
        </div>
    </div>
</div>

<div id="empty"></div>
<?php do_action( 'bp_after_member_settings_template' ); ?>
</div>		
<?php

vibe_include_template("profile/bottom.php");  

get_footer( vibe_get_footer() ); 