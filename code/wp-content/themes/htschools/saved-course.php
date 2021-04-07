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
        <div class="profile-card transprent">
            <h1>Saved Courses</h1>
            <?php 
                $article_data = wpfp_get_users_favorites();
                foreach ($article_data as $post_id) {
                   
                  $post = get_post($post_id);

                  if ( has_post_thumbnail() ) { 
                      $featured_image = get_the_post_thumbnail_url();
                  }
                  $postDate = get_the_date('M d, Y H:i');
                  $custom_fields = get_post_custom();
                    $duration = $custom_fields['vibe_duration'][0];
                    $age_limit = $custom_fields['vibe_course_age_group'][0];
                    $category_array = get_the_terms( $post->ID, 'course-cat');
                    $excerpt = get_post_field('post_excerpt', $post->ID);
                  if($post->post_type == "course"){
                  ?>
                  <div class="course-box dotted-border">
                    <div class="col-xs-2 col-sm-2 col-lg-2 pull-left mrg">
                        <?php 
                        if ( has_post_thumbnail() ) { 
                          $image_url = get_the_post_thumbnail_url();
                        }
                      ?>
                     <a href="<?php echo get_permalink($post->ID);?>"> <img src="<?php echo $image_url; ?>" class="img-fluid"></a>
                    </div>
                    <div class="col-xs-10 col-sm-10 col-lg-10 pull-left mrg">
                      <div class="col-sm-12 col-lg-9 pull-left mrg">
                        <div class="middle-details">
                            <h6><?php echo $category_array[0]->name; ?></h6>
                          <h2><?php echo bp_course_title(); ?></h2>
                          <div class="col-lg-12 share-icon mrg">
                            <i class="bi bi-share"></i>
                          </div>
                          <?php if ( $excerpt != '' ) {
                            echo "<p>".wp_trim_words( $excerpt, 30, NULL )."</p>";
                          }  ?>
                          <div class="col-lg-7 duration mrg">
                            <div class="pull-left">
                              <p>Duration</p>
                              <?php if(get_post_meta($post->ID,'vibe_duration',true) == '') { ?>
                                <h6>--</h6>
                              <?php } else{ ?>
                                <h6><span><?php echo get_post_meta($post->ID,'vibe_duration',true);?></span> Days</h6>
                              <?php }?>
                            </div>
                            <div class="pull-right">
                                <p>Age Group</p>
                                <?php if($age_limit == '') { ?>
                                <h6>--</h6>
                                <?php } else{ ?>
                                <h6><?php echo $age_limit;?></h6>
                                <?php }?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-lg-3 pull-left mrg">
                        <div class="col-lg-12 right-details pull-left mrg">
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
                            <div class="col-lg-12 course-button">
                                <h6 ><?php 
                                    the_course_price();
                                ?></h6>
                                <?php the_course_button(); ?>
                          </div>
                          
                        </div>
                      </div>
                     
                    </div>
                </div>
            <?php }
          }
            ?>
        </div>
        <div class="empty_cart_div">
            <div class="empty_course_image"></div>
            <h4>You Don’t Have Any Courses <br/>Saved Till Now. </h4>
            <button class="empty_btn">Explore Courses</button>
        </div>
    </div>
</div>

<?php do_action( 'bp_after_member_settings_template' ); ?>
		
<?php

vibe_include_template("profile/bottom.php");  

get_footer( vibe_get_footer() ); 