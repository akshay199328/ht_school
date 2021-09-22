<style type="text/css">
  .countColor p{
    font-family: 'GT-Walsheim-Pro'!important;
  }
</style>
<?php 
/**
 * The template for displaying Course home
 *
 * Override this template by copying it to yourtheme/course/single/home.php
 *
 * @author    VibeThemes
 * @package   vibe-course-module/templates
 * @version     2.1
 */
if ( !defined( 'ABSPATH' ) ) exit;
do_action('wplms_before_single_course');

get_header( vibe_get_header() ); 

$course_layout = vibe_get_customizer('course_layout');
if ( bp_course_has_items() ) : while ( bp_course_has_items() ) : bp_course_the_item();
do_action('wplms_course_curriculum_section',$id);

$course_curriculum = ht_course_get_full_course_curriculum($id); 
//print_r($course_curriculum);

/*======================================*/

function extractVideoID($url){
   
   if(preg_match('/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/', $url, $video))
   {
     $videoType = "youtube";
     $videoId = $video[7];
   }
   else if (preg_match('#(?:https?://)?(?:www.)?(?:player.)?vimeo.com/(?:[a-z]*/)*([0-9]{6,11})[?]?.*#', $url, $m)) 
    {
        $videoType = "vimeo";
        $videoId = $m[1];       
    }
    return $videoType."-".$videoId;
}
 
function getYouTubeThumbnailImage($video_id) {
    return "https://i3.ytimg.com/vi/$video_id/hqdefault.jpg"; //pass 0,1,2,3 for different sizes like 0.jpg, 1.jpg
}
 
function getVimeoThumb($id)
{
    $arr_vimeo = unserialize(file_get_contents("https://vimeo.com/api/v2/video/$id.php"));
    //return $arr_vimeo[0]['thumbnail_small']; // returns small thumbnail
    //return $arr_vimeo[0]['thumbnail_medium']; // returns medium thumbnail
    return $arr_vimeo[0]['thumbnail_large']; // returns large thumbnail
}

//$video_url = "https://youtu.be/pbekOEr0Wo0";
//$video_url = "https://vimeo.com/76979871";

$video_url = get_post_meta($post->ID,'vibe_trailer_link',true);
$video_info = extractVideoID($video_url);
$vInfo = explode("-",$video_info);
$videoType = $vInfo[0];
$video_id = $vInfo[1];

if($videoType=="youtube")
{
    $thumbnail =  getYouTubeThumbnailImage($video_id);
}
else if($videoType=="vimeo")
{
    $thumbnail =  getVimeoThumb($video_id);
}


//echo "video_url = ".$video_url."<br/>videoType = ".$videoType."<br>thumbnail =".$thumbnail; 
//exit;
//return $videoType."-".$thumbnail;
/*======================================*/


?>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<div class="course-detail">
        <nav aria-label="breadcrumb" class="breadcrumb-wrapper">
            <?php vibe_breadcrumbs(); ?>  
            <!-- <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Course</a></li>
                <li class="breadcrumb-item"><a href="#">Dance</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ganesh Acharya Learn Dance</li>
            </ol> -->
        </nav>
      <div class="course-banner">
         <?php $gallery_data = get_post_meta($post->ID,'vibe_course_background_image',true); 
            //echo $attachment_element = wp_get_attachment_image( $gallery_data);
             $attachment_element = wp_get_attachment_url( $gallery_data);   

             $custom_fields = get_post_custom();                         
                                                 
            $course_type="";
            $course_type = $custom_fields['vibe_course_type'][0];

            $str1="LIVE CLASSES";
            $str2="BLENDED";
            $str3="SELF PACED";
        
            if(strcmp($str2, $course_type)==0){
               $badge_class = "blue";
            }
            elseif(strcmp($str3, $course_type)==0){
               $badge_class = "green";
            }
            elseif(strcmp($str1, $course_type)==0){
               $badge_class = "red";
            }
            else{
              $badge_class = "";
            }   

            $category_array = get_the_terms( $post->ID, 'course-cat');

          ?>

        <a href="#!" class="bg-wrapper">
            <!-- <img src="https://i.pinimg.com/originals/1a/2a/1b/1a2a1b471c5990dc8a4b91d57c8f940c.jpg" class="bg"> -->
            <img src="<?php echo $thumbnail;?>" class="bg">
        </a>
        <div class="detail">
            <div class="copy">
                <div class="eyebrow">
                  <span class="category"><?php echo $category_array[0]->name; ?></span>
                  <?php if (!empty($course_type)){ ?>   
                    <span class="badge <?php echo $badge_class;?>"><?php echo $course_type; ?></span>
                    <?php }?> 
                    </div>
                    <h1 class="course-title"><?php bp_course_name(); ?></h1>
                 <?php
                    
                      $courseID = $post->ID;
                      $courseIDViewItem = $post->ID;
                     
                     /* echo "==>".$courseID*/
                     
                      $courseslug=get_the_permalink($courseID);
                      $usersFavorites = wpfp_get_users_favorites();
                      $user = wp_get_current_user();
                      $userIdentifier = "";

                      if(!is_array($usersFavorites)) $usersFavorites = array();

                      if(isset($user->ID) && $user->ID > 0)
                      {
                        $userIdentifier = $user->ID;
                      }
                      else if(isset($_COOKIE['PHPSESSID']))
                      {
                        $userIdentifier = $_COOKIE['PHPSESSID'];
                      }
                      $coursePartner = "";

                        $cb_course_id = get_post_meta($courseID,'celeb_school_course_id',true);
                        if ($cb_course_id) {
                          $coursePartner = "Celebrity School";
                        }

                        $aiws_course_id = get_post_meta($courseID,'aiws_program_id',true);
                        if ($aiws_course_id) {
                          $coursePartner = "AIWS";
                        }
                      $excerpt = get_post_field('post_excerpt', $post->ID);
                      if ( $excerpt != '' ) {
                        echo "<p class='description'>".wp_trim_words( $excerpt, 22, NULL )."</p>";
                      }
                      if(get_post_meta($post->ID,'vibe_course_age_group',true) != '') {
                        $ageGroup = get_post_meta($post->ID,'vibe_course_age_group',true);
                      }
                      if(get_post_meta($post->ID,'vibe_course_certificate',true) == 'H'){
                          $totalStudent =  "No";
                        }else{
                          $totalStudent = "Yes";
                        }
                      if(get_post_meta($post->ID,'vibe_validity',true) != '') {
                        $duration = get_post_meta($post->ID,'vibe_validity',true);
                      }
                      if(get_post_meta($post->ID,'vibe_course_frequency',true) != '') {
                        $frequency = get_post_meta($post->ID,'vibe_course_frequency',true);
                      }
                      if(get_post_meta($post->ID,'vibe_course_sessions',true) != '') {
                        $session = get_post_meta($post->ID,'vibe_course_sessions',true);
                      }
                      if(get_post_meta($post->ID,'vibe_course_session_length',true) != '') {
                        $sessionLength = get_post_meta($post->ID,'vibe_course_session_length',true);
                      }
                      if(get_post_meta($post->ID,'vibe_course_validity_parameter',true) != '') {
                        $courseDurationParameter = get_post_meta($post->ID,'vibe_course_validity_parameter',true);
                      }
                      if(get_post_meta($post->ID,'vibe_duration',true) != '') {
                        $validity = get_post_meta($post->ID,'vibe_duration',true);
                      }
                      if(get_post_meta($post->ID,'vibe_course_duration_parameter',true) != '') {
                        $courseValidityParameter = get_post_meta($post->ID,'vibe_course_duration_parameter',true);
                      }
                      if(get_post_meta($post->ID,'vibe_level',true) != '') {
                        $courseLevel = get_post_meta($post->ID,'vibe_level',true);
                      }
                      if(get_post_meta($post->ID,'vibe_start_date',true) != '') {
                        $courseStartDate = get_post_meta($post->ID,'vibe_start_date',true);
                      }
                      if($courseStartDate!='' && $validity!='' && $courseValidityParameter!='' )
                      {
                        $courseValidity = $validity." ".calculate_duration($courseValidityParameter);
                        $date = date_create($courseStartDate);
                        date_add($date,date_interval_create_from_date_string($courseValidity));
                        $courseValidTillDate = date_format($date,"Y-m-d");


                        $courseValidTill = date("jS F Y", strtotime($courseValidTillDate));
                      }

                      $trailer_link = get_post_meta($post->ID,'vibe_trailer_link',true);
                    ?>
                
               <!--  <p class="ratings">Ratings</p> -->

                <?php
                   if(is_user_logged_in()){
                    
                     wpfp_course_link(); 
                   }else{
                    $url = "/login-register";
                    ?>
                   <!--  <li style="list-style-type: none;"><a href="<?php //echo get_site_url().$url; ?>"><i class="add-wishlist" title="Add to Wishlist"></i></a></li> -->

                   <a href="<?php echo get_site_url().$url; ?>"><i class="add-wishlist" title="Add to Wishlist"></i></a>

                   <button class="wishlist added" type="button"><a href="<?php echo get_site_url().$url; ?>">Add to Wishlist </a></button>
                  <!--  <button class="wishlist added" type="button">Add to Wishlist</button> -->
                    <?php
                  }
                  ?>
                <!-- <button class="wishlist added" type="button">Add to Wishlist</button> -->
            </div>
            <div class="detail-card-wrapper">
                <div class="detail-card">
                  <div id ="thumbnailImage">
                    <a class="video-image" >
                        <!-- <img src="https://i.pinimg.com/originals/1a/2a/1b/1a2a1b471c5990dc8a4b91d57c8f940c.jpg" class="thumbnail">
                        <span class="play"></span> -->
                        <img src="<?php echo $thumbnail; ?>" class="thumbnail">
                        <span class="play"></span>
                    </a>
                  </div>
                  <!-- <input type="hidden" name="video_type" id="video_type" value="<?php echo $videoType ;?>">
                  <input type="hidden" name="video_thumbnail" id="video_thumbnail" value="<?php echo $thumbnail;?>">
                  <input type="hidden" name="video_url" id="video_url" value="<?php echo $video_url;?>"> -->

                    <div class="video-ad" id="videoFrame" style="display: none;"><iframe allowfullscreen="allowfullscreen" width="100%" height="240" src="<?php echo get_post_meta($post->ID,'vibe_trailer_link',true) ;?>"></iframe></div>

                    <div class="content">
                        <div class="bar">                          
                            <div class="left"><span class="pricing" data-id="<?php echo $post->ID;?>"><?php the_course_price(); ?></span><!-- <span class="gst">+ GST</span> --></div>
                            <button class="join-course" type="button"><!-- Join this course -->
                               <?php the_course_button(); ?>
                            </button>
                        </div>
                        <div class="fields-wrapper">
                            <h4 class="title">This Course Includes</h4>
                            <ul>
                                <li>
                                    <span class="attribute"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="31" viewBox="0 0 32 31">
                                  <g id="Group_21045" data-name="Group 21045" transform="translate(-2.006 -3.567)">
                                    <path id="Path_39437" data-name="Path 39437" d="M32.721,46.772a.545.545,0,0,0-.681.278,3.93,3.93,0,0,1-7.168.153.518.518,0,0,0-.972.356.551.551,0,0,0,.04.085A4.966,4.966,0,0,0,33,47.453.545.545,0,0,0,32.721,46.772Z" transform="translate(-10.3 -19.639)"></path>
                                    <path id="Path_39438" data-name="Path 39438" d="M23.131,37.07a.518.518,0,0,0-.769-.692,2.475,2.475,0,0,1-1.9,1.025,2.556,2.556,0,0,1-1.673-.981.512.512,0,0,0-.715-.118l0,0a.545.545,0,0,0-.136.725,3.553,3.553,0,0,0,2.447,1.406h.142A3.493,3.493,0,0,0,23.131,37.07Z" transform="translate(-7.429 -14.849)"></path>
                                    <path id="Path_39439" data-name="Path 39439" d="M40.683,36.244a2.448,2.448,0,0,1-1.9,1.025,2.55,2.55,0,0,1-1.673-.981.545.545,0,1,0-.839.61A3.571,3.571,0,0,0,38.748,38.3h.136a3.515,3.515,0,0,0,2.589-1.368.525.525,0,0,0-.79-.692Z" transform="translate(-15.966 -14.715)"></path>
                                    <path id="Path_39440" data-name="Path 39440" d="M29.969,17.065c-.08-1.417-.533-5.195-2.827-7.413a6.114,6.114,0,0,0-4.87-1.635c-1.141.076-2.182.169-3.1.251-5.707.512-7.43.665-9.191-4.361a.532.532,0,0,0-.533-.338.465.465,0,0,0-.187.06A10.223,10.223,0,0,0,4.59,9.516a10.017,10.017,0,0,0,1.3,7.566,4.669,4.669,0,0,0-3.831,5.34,4.613,4.613,0,0,0,4.53,3.97h.331a12.025,12.025,0,0,0,11.127,8.176,12.015,12.015,0,0,0,11.122-8.176h.261a4.689,4.689,0,0,0,.533-9.332ZM5.561,9.8A9.132,9.132,0,0,1,9.241,4.861C11.225,10.017,13.658,9.8,19.264,9.3c.912-.082,1.947-.174,3.078-.251A5.15,5.15,0,0,1,26.449,10.4c2.08,1.995,2.448,5.609,2.512,6.808-4.449,1.014-5.985-3.816-6.049-4.05a.5.5,0,0,0-.9-.147,12.873,12.873,0,0,1-9.3,5.156c-2.427.234-4.694-.218-5.681-1.134C5.475,14.448,4.979,12.017,5.561,9.8ZM3.016,21.709A3.627,3.627,0,0,1,6.089,18.1v3.608a13.707,13.707,0,0,0,.5,3.652A3.619,3.619,0,0,1,3.016,21.709ZM18.042,33.521c-6.033,0-10.94-5.3-10.94-11.812V18.346a9,9,0,0,0,4.31.927,13.6,13.6,0,0,0,1.4-.071A14.02,14.02,0,0,0,22.3,14.345c.741,1.592,2.736,4.7,6.678,3.925v3.439C28.977,28.223,24.07,33.521,18.042,33.521ZM29.5,25.345a13.843,13.843,0,0,0,.491-3.647V18.1a3.638,3.638,0,0,1,2.944,4.188A3.594,3.594,0,0,1,29.5,25.345Z" transform="translate(0)"></path>
                                  </g>
                                </svg>Age Group</span>
                                    <span class="value"><?php echo $ageGroup." Yrs";?></span>
                                </li>
                                <li>
                                    <span class="attribute"><svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29">
                                    <path id="Path_39441" data-name="Path 39441" d="M22.5,8A14.5,14.5,0,1,0,37,22.5,14.511,14.511,0,0,0,22.5,8Zm0,1.381A13.119,13.119,0,1,1,9.381,22.5,13.109,13.109,0,0,1,22.5,9.381Zm0,2.762a.69.69,0,0,0-.69.69V22.5a.683.683,0,0,0,.345.593l7.779,4.488a.687.687,0,1,0,.69-1.187L23.19,22.1V12.833A.69.69,0,0,0,22.5,12.143Z" transform="translate(-8 -8)"></path>
                                  </svg>Course Duration</span>
                                    <span class="value"><?php echo $duration.' '.calculate_duration($courseDurationParameter);?></span>
                                </li>
                                <li>
                                    <span class="attribute"><svg xmlns="http://www.w3.org/2000/svg" width="28.773" height="32.643" viewBox="0 0 28.773 32.643">
                                    <g id="Group_21041" data-name="Group 21041" transform="translate(-13.29 -8.688)">
                                      <path id="Path_39446" data-name="Path 39446" d="M40.3,32.562l-7.751-3.614V20.394a.77.77,0,1,0-1.54,0v9.043a.77.77,0,0,0,.444.7l8.2,3.822a.77.77,0,1,0,.651-1.4Z" transform="translate(-4.075 -2.516)"></path>
                                      <path id="Path_39447" data-name="Path 39447" d="M39.425,16.286a13.057,13.057,0,0,1,1.219,1.583.77.77,0,1,0,1.3-.828A14.878,14.878,0,0,0,40,14.628l0-.005,0,0-.032-.035a14.351,14.351,0,0,0-2.375-1.923.77.77,0,1,0-.832,1.3,12.508,12.508,0,0,1,1.583,1.235l-.958.958a.763.763,0,0,0-.156.234A14.251,14.251,0,0,0,28.42,12.7a.759.759,0,0,0,.049-.247V10.252a19.854,19.854,0,0,1,3.265.4.771.771,0,0,0,.32-1.508,21.607,21.607,0,0,0-4.343-.456l-.012,0-.009,0-.064,0a20.907,20.907,0,0,0-4.291.436.77.77,0,0,0,.318,1.507,19.175,19.175,0,0,1,3.277-.385v2.21a.762.762,0,0,0,.049.24,14.358,14.358,0,1,0,11.259,4.7.772.772,0,0,0,.234-.156Zm-11.8,23.505A12.794,12.794,0,1,1,40.419,27,12.809,12.809,0,0,1,27.625,39.791Z" transform="translate(0)"></path>
                                    </g>
                                  </svg>Session Duration</span>
                                    <span class="value"><?php echo $sessionLength;?></span>
                                </li>
                                <li>
                                    <span class="attribute"><svg xmlns="http://www.w3.org/2000/svg" width="22.456" height="31.44" viewBox="0 0 22.456 31.44">
                                    <g id="Group_21040" data-name="Group 21040" transform="translate(-12 -4)">
                                      <g id="Group_21039" data-name="Group 21039" transform="translate(12 4)">
                                        <path id="Path_39444" data-name="Path 39444" d="M30.337,18.659,33.373,15.7a.562.562,0,0,0-.312-.958l-4.195-.609-1.876-3.8a.584.584,0,0,0-1.007,0l-1.876,3.8-4.195.609a.562.562,0,0,0-.312.958l3.036,2.959-.716,4.178a.561.561,0,0,0,.814.592l3.754-1.972,3.753,1.972a.561.561,0,0,0,.813-.592Zm-1.156-.1.574,3.348-3.006-1.58a.56.56,0,0,0-.522,0l-3.006,1.58.574-3.348a.562.562,0,0,0-.161-.5L21.2,15.691l3.361-.488a.561.561,0,0,0,.423-.307l1.5-3.046,1.5,3.046a.561.561,0,0,0,.423.307l3.361.488-2.432,2.37A.562.562,0,0,0,29.181,18.558Z" transform="translate(-15.259 -6.651)"></path>
                                        <path id="Path_39445" data-name="Path 39445" d="M34.431,32.463l-3.348-10.6a10.667,10.667,0,1,0-15.707,0l-3.348,10.6a.562.562,0,0,0,.733.7l4.088-1.533L19.4,35.2a.561.561,0,0,0,.456.235.574.574,0,0,0,.1-.008.562.562,0,0,0,.444-.4l2.695-9.7c.045,0,.088.006.132.006s.088-.006.132-.007l2.695,9.7a.563.563,0,0,0,.444.4.527.527,0,0,0,.1.009.56.56,0,0,0,.456-.235l2.557-3.579L33.7,33.158a.561.561,0,0,0,.733-.694ZM19.634,33.6,17.51,30.622a.559.559,0,0,0-.654-.2L13.445,31.7l2.83-8.964a10.615,10.615,0,0,0,5.677,2.512ZM13.684,14.667a9.544,9.544,0,1,1,9.544,9.544A9.555,9.555,0,0,1,13.684,14.667ZM29.6,30.422a.56.56,0,0,0-.654.2l-2.124,2.973-2.318-8.346a10.615,10.615,0,0,0,5.677-2.512l2.83,8.964Z" transform="translate(-12 -4)"></path>
                                      </g>
                                    </g>
                                  </svg>Certificate of completion</span>
                                    <span class="value"><?php echo $totalStudent;?></span>
                                </li>
                                <li>
                                    <span class="attribute"><svg xmlns="http://www.w3.org/2000/svg" width="33.113" height="29.269" viewBox="0 0 33.113 29.269">
                                      <g id="Group_21011" data-name="Group 21011" transform="translate(-2 -4.465)">
                                        <path id="Path_39415" data-name="Path 39415" d="M35.113,34.419,2,34.4V32.934l33.113.033Z" transform="translate(0 -0.685)"></path>
                                        <g id="Group_21008" data-name="Group 21008" transform="translate(5.8 8.215)">
                                          <path id="Path_39416" data-name="Path 39416" d="M13.775,43.5H7.4V33h6.3V43.5ZM8.9,42h3.3V34.5H8.9Z" transform="translate(-7.4 -18)"></path>
                                          <path id="Path_39417" data-name="Path 39417" d="M26.6,41H20.3V23h6.3Zm-4.8-1.5h3.3v-15H21.8Z" transform="translate(-10.819 -15.5)"></path>
                                          <path id="Path_39418" data-name="Path 39418" d="M39.5,38.5H33.2V13h6.3ZM34.625,37h3.3V14.5h-3.3Z" transform="translate(-14.237 -13)"></path>
                                        </g>
                                        <g id="Group_21010" data-name="Group 21010" transform="translate(5.8 4.465)">
                                          <path id="Path_39419" data-name="Path 39419" d="M10.175,21.5,9.5,20.15C14.3,17.825,20,12.575,23.45,7.4l1.275.825C21.2,13.625,15.2,19.1,10.175,21.5Z" transform="translate(-9.5 -5)"></path>
                                          <g id="Group_21009" data-name="Group 21009" transform="translate(11.175)">
                                            <path id="Path_39420" data-name="Path 39420" d="M24.4,5.55l6.3,3.675L29.35,4.2Z" transform="translate(-24.4 -4.2)"></path>
                                          </g>
                                        </g>
                                      </g>
                                    </svg>Level</span>
                                    <span class="value"><?php echo $courseLevel;?></span>
                                </li>
                                <li>
                                    <span class="attribute"><svg xmlns="http://www.w3.org/2000/svg" width="28.253" height="28.253" viewBox="0 0 28.253 28.253">
                                      <g id="Group_20970" data-name="Group 20970" transform="translate(-2 -2)">
                                        <path id="Path_39365" data-name="Path 39365" d="M16,41.779a.642.642,0,0,0,.642.642h8.99a.642.642,0,0,0,.642-.642V40.495A4.5,4.5,0,0,0,21.779,36H20.495A4.5,4.5,0,0,0,16,40.495Zm1.284-1.284a3.214,3.214,0,0,1,3.211-3.211h1.284a3.214,3.214,0,0,1,3.211,3.211v.642H17.284Z" transform="translate(-5.01 -12.168)"></path>
                                        <path id="Path_39366" data-name="Path 39366" d="M20,28.568v.642a2.568,2.568,0,1,0,5.137,0v-.642a2.568,2.568,0,1,0-5.137,0Zm3.853,0v.642a1.284,1.284,0,1,1-2.568,0v-.642a1.284,1.284,0,1,1,2.568,0Z" transform="translate(-6.442 -8.589)"></path>
                                        <path id="Path_39367" data-name="Path 39367" d="M4,38.495v1.284a.642.642,0,0,0,.642.642H9.779a.642.642,0,1,0,0-1.284H5.284v-.642a3.214,3.214,0,0,1,3.211-3.211H9.779a3.173,3.173,0,0,1,1.623.442.642.642,0,1,0,.658-1.1A4.454,4.454,0,0,0,9.779,34H8.495A4.5,4.5,0,0,0,4,38.495Z" transform="translate(-0.716 -11.452)"></path>
                                        <path id="Path_39368" data-name="Path 39368" d="M13.137,27.211v-.642a2.568,2.568,0,1,0-5.137,0v.642a2.568,2.568,0,1,0,5.137,0Zm-3.853,0v-.642a1.284,1.284,0,1,1,2.568,0v.642a1.284,1.284,0,0,1-2.568,0Z" transform="translate(-2.147 -7.873)"></path>
                                        <path id="Path_39369" data-name="Path 39369" d="M33.554,39.137a.642.642,0,1,0,0,1.284h5.137a.642.642,0,0,0,.642-.642V38.495A4.5,4.5,0,0,0,34.838,34H33.554a4.454,4.454,0,0,0-2.281.623.642.642,0,0,0,.658,1.1h0a3.173,3.173,0,0,1,1.623-.442h1.284a3.214,3.214,0,0,1,3.211,3.211v.642Z" transform="translate(-10.364 -11.452)"></path>
                                        <path id="Path_39370" data-name="Path 39370" d="M34.568,24A2.569,2.569,0,0,0,32,26.568v.642a2.568,2.568,0,1,0,5.137,0v-.642A2.569,2.569,0,0,0,34.568,24Zm1.284,3.211a1.284,1.284,0,0,1-2.568,0v-.642a1.284,1.284,0,0,1,2.568,0Z" transform="translate(-10.737 -7.873)"></path>
                                        <path id="Path_39371" data-name="Path 39371" d="M27.042,2H5.211A3.214,3.214,0,0,0,2,5.211V16.769a3.211,3.211,0,0,0,1.605,2.778.643.643,0,1,0,.642-1.113,1.926,1.926,0,0,1-.963-1.665V5.211A1.926,1.926,0,0,1,5.211,3.284H27.042a1.926,1.926,0,0,1,1.926,1.926V16.769a1.926,1.926,0,0,1-.963,1.665.643.643,0,1,0,.642,1.113,3.211,3.211,0,0,0,1.605-2.778V5.211A3.214,3.214,0,0,0,27.042,2Z"></path>
                                        <path id="Path_39372" data-name="Path 39372" d="M26.669,12.583,18.963,8.088A.642.642,0,0,0,18,8.643v8.99a.642.642,0,0,0,.963.555l7.705-4.495a.642.642,0,0,0,0-1.11Zm-7.384,3.932V9.761l5.789,3.377Z" transform="translate(-5.726 -2.148)"></path>
                                      </g>
                                    </svg>Sessions</span>
                                    <span class="value"><?php echo $session." Sessions";?></span>
                                </li>
                                <li>
                                    <span class="attribute"><svg xmlns="http://www.w3.org/2000/svg" width="28.614" height="29.513" viewBox="0 0 28.614 29.513">
                                      <g id="Group_21043" data-name="Group 21043" transform="translate(-22.89 -21.961)">
                                        <g id="Group_21042" data-name="Group 21042" transform="translate(23.648 22.661)">
                                          <path id="Path_39448" data-name="Path 39448" d="M27.038,46.208a.529.529,0,0,1-.707-.2l-2.611-4.53a.533.533,0,0,1,.182-.712l2.321-1.423a1.011,1.011,0,0,0,.438-.783l0-3.693a1.025,1.025,0,0,0-.438-.783L23.9,32.665a.53.53,0,0,1-.182-.712l2.615-4.528a.532.532,0,0,1,.707-.2l2.392,1.3a1.015,1.015,0,0,0,.9-.012l3.2-1.845a1.026,1.026,0,0,0,.459-.77l.071-2.722a.53.53,0,0,1,.525-.514l5.229,0a.532.532,0,0,1,.525.513l.071,2.722a1.016,1.016,0,0,0,.459.771l3.2,1.847a1.027,1.027,0,0,0,.9.012l2.393-1.3a.529.529,0,0,1,.707.2l2.611,4.53a.533.533,0,0,1-.182.712l-2.321,1.423a1.011,1.011,0,0,0-.438.783l0,3.693a1.025,1.025,0,0,0,.438.783L50.5,40.77a.53.53,0,0,1,.182.712L48.063,46.01a.532.532,0,0,1-.707.2l-2.392-1.3a1.015,1.015,0,0,0-.9.012l-3.2,1.845a1.026,1.026,0,0,0-.459.77l-.071,2.722a.53.53,0,0,1-.525.514l-5.229,0a.532.532,0,0,1-.525-.513l-.071-2.722a1.016,1.016,0,0,0-.459-.771l-3.2-1.847a1.027,1.027,0,0,0-.9-.012Zm7.074-4.147a6.17,6.17,0,1,0-2.258-8.428A6.169,6.169,0,0,0,34.112,42.061Z" transform="translate(-23.648 -22.661)" fill="none" stroke="#000" stroke-width="1.4"></path>
                                        </g>
                                      </g>
                                    </svg>Frequency</span>
                                    <span class="value"><?php echo $frequency;?></span>
                                </li>
                                <li>
                                    <span class="attribute"><svg xmlns="http://www.w3.org/2000/svg" width="26.353" height="27.396" viewBox="0 0 26.353 27.396">
                                      <g id="Group_21044" data-name="Group 21044" transform="translate(-54.541 -46.562)">
                                        <path id="Path_39449" data-name="Path 39449" d="M54.541,70.688a3.274,3.274,0,0,0,3.27,3.27H72.556A.654.654,0,0,0,73,73.782L80.686,66.6a.654.654,0,0,0,.207-.478V51.852a3.274,3.274,0,0,0-3.27-3.27H75.472V47.216a.654.654,0,1,0-1.308,0v1.365H61.271V47.216a.654.654,0,1,0-1.308,0v1.365H57.811a3.274,3.274,0,0,0-3.27,3.27Zm1.308,0V57.045H79.585v8.45H74.4a2.619,2.619,0,0,0-2.616,2.616V72.65H57.811A1.964,1.964,0,0,1,55.849,70.688Zm22.7-3.885-5.466,5.11v-3.8A1.31,1.31,0,0,1,74.4,66.8ZM57.811,49.89h2.152v1.958a.654.654,0,1,0,1.308,0V49.89H74.164v1.958a.654.654,0,1,0,1.308,0V49.89h2.152a1.964,1.964,0,0,1,1.962,1.962v3.885H55.849V51.852A1.964,1.964,0,0,1,57.811,49.89Z" transform="translate(0 0)"></path>
                                      </g>
                                    </svg>Course Valid till</span>
                                    <span class="value"><?php echo  $courseValidTill; ?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="social">
                            <div class="share"><span>Share</span></div>

                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="<?php echo get_permalink(); ?>" data-a2a-title="<?php bp_course_name();?>" data-id="<?php echo $courseID;?>">
                              <a class="a2a_button_facebook"></a>
                              <a class="a2a_button_twitter"></a>
                              <a class="a2a_button_pinterest"></a>
                              <a class="a2a_button_google_gmail"></a>
                              <a class="a2a_button_whatsapp"></a>
                              <a class="a2a_button_telegram"></a>
                            </div>
                            <!-- <div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-id="<?php echo $courseID;?>"> -->
                           <!--  <a href="#!" class="facebook"></a>
                            <a href="#!" class="twitter"></a>
                            <a href="#!" class="pinterest"></a>
                            <a href="#!" class="whatsapp"></a> -->
                           <!--  </div><script async src="https://static.addtoany.com/menu/page.js"></script>    -->                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    <!--   <div class="course-overlay">
        <div class="heading-wrapper">
            <h2 class="small-title">Ganesh Acharya Learn Dance</h2>
            <p class="ratings">Ratings</p>
        </div>
        <div class="links-price">
            <ul id="header-scroll">
                <li><a href="#overview" class="overview">Overview</a></li>
                <li><a href="#objectives" class="objectives">Objectives</a></li>
                <li><a href="#curriculum" class="curriculum">Curriculum</a></li>
                <li><a href="#instructor" class="instructor">Instructor</a></li>
                <li><a href="#reviews" class="reviews">Reviews</a></li>
            </ul>
            <div class="bar">
                <div class="left"><span class="pricing">₹999</span><span class="gst">+ GST</span></div>
                <button class="join-course" type="button">Join this course</button>
            </div>
        </div>
      </div> -->
        <div class="section-navigation">
            <ul id="header-scroll">
                <li><a href="#overview" class="overview">Overview</a></li>
                <li><a href="#objectives" class="objectives">Objectives</a></li>
                <li><a href="#curriculum" class="curriculum">Curriculum</a></li>
                <li><a href="#instructor" class="instructor">instructor</a></li>
               <!--  <li><a href="#reviews" class="reviews">Reviews</a></li> -->
            </ul>
        </div>
        <section class="section-wrapper overview" id="overview">
            <h2 class="medium-title">About The Course</h2>
            <p><?php   $post_content = get_post_field('post_content', $post->ID);
            echo $post_content;
             ?></p>
            <!-- <p>Ganesh Acharya teaches you everything from basic dance steps to advanced dance techniques. He also teaches you to come up with a signature dance step for any music. In this course, Ganesh Acharya demonstrates all the Basic Indian and Western dance steps every dancer should know. He also teaches the step taught to Ranveer Singh, which became the most famous dance step in his career.</p>
            <p>Ganesh Acharya teaches his signature choreography style and the thought process behind it. He also explains how he comes up with the hook step for any song. You will also learn the waves dance steps to add unique variations to your dancing style.</p>
            <p>In this course, Ganesh Acharya shares his journey from being a Background Dancer to the most sought-after Celebrity Choreographer in Bollywood.</p> -->

            <?php 
                $who_this_course = get_post_meta($post->ID,'vibe_who_this_course_Is_for_first_block',true);
                if(strlen(trim($who_this_course))) : 
            ?>
              <h3 class="small-title">Who Is This Course For?</h3>
              <p><?php echo get_post_meta($post->ID,'vibe_who_this_course_Is_for_first_block',true); ?></p>

             <?php endif;?>

            <?php if(get_the_term_list_search(get_the_ID(),'course-tag')) : ?>
                <h3 class="related-title">Related Tags</h3>
                <div class="related-wrapper">
                    
                   
                    <ul>
                      <?php echo get_the_term_list_search(get_the_ID(),'course-tag'); ?>
                        <!-- <li><a href="#!Breath">Breath</a></li>
                        <li><a href="#!MicrophoneControl">Microphone Control</a></li>
                        <li><a href="#!Riyaz">Riyaz</a></li>
                        <li><a href="#!VocalTechniques">Vocal Techniques</a></li>
                        <li><a href="#!VoiceProtection">Voice Protection</a></li> -->
                    </ul>
                </div>
            <?php endif;?>
        </section>
         <?php if(strlen(trim(get_post_meta($post->ID,'vibe_learning_goals',true)))) : ?>
        <section class="section-wrapper objectives" id="objectives">
            <h2 class="medium-title">Course Objectives</h2>
             <?php echo get_post_meta($post->ID,'vibe_learning_goals',true);?>
        </section>

         <?php endif;
         // if(count(bp_course_get_curriculum_units(get_the_ID()))) : 
          ?>

        <section class="section-wrapper curriculum" id="curriculum">
            <h2 class="medium-title">Curriculum</h2>
            <!-- <h3 class="small-title">Section 1 : Introduction</h3> -->
            
                <?php locate_template( array( 'course/single/curriculum_new.php'  ), true );?>           
        </section>

        <?php
              $course_id=get_the_ID();
              $post_tmp = get_post($course_id);
              $author_id = $post_tmp->post_author;
              $author_info = get_userdata($author_id);
              $author_name = get_the_author_meta( 'display_name', $author_id );
              $author_url = get_the_author_meta( 'user_url', $author_id );
              $author_email = get_the_author_meta( 'user_email', $author_id );
              $author_biographical_info = get_the_author_meta( 'description', $author_id );
              $author_user_profile = get_avatar_url($author_id);
              $author_company = get_the_author_meta( 'profession', $author_id );
              $student_count = get_the_author_meta( 'student_count', $author_id );
              $args = array(
                'field'   => 'About', // Field name or ID.
                'user_id' => $author_id // Default
                );
              /*ob_start();
              dynamic_sidebar('instructor_banner');
              $addDisplay = ob_get_contents();
              ob_end_clean();

              $ad_code = '<div class="google-adsense">' . $addDisplay . '</div>';
              
              $author_biographical_info = $ad_code . '<p>'.$author_biographical_info.'</p>';*/
              $author_biographical_info = $author_biographical_info;
        ?>
        <section class="section-wrapper instructor" id="instructor">
            <h2 class="medium-title">Instructor</h2>
            <div class="author clearfix">
                <div class="top">
                    <div class="image"><img src="<?php echo $author_user_profile; ?>"></div>
                    <div>
                    <h3 class="small-title"><?php echo $author_name; ?></h3>
                    <span class="designation"><?php echo $author_company; ?></span>
                    </div>
                </div>
                <p class="about"><?php echo $author_biographical_info; ?></p>
            </div>
        </section>
       <!--  <section class="section-wrapper reviews" id="reviews">
            <h2 class="medium-title">Reviews</h2>

            <?php //echo "rating-->".get_post_meta($post->ID,'vibe_thumb_rating',true) ;?>
            <?php //echo myreview_button();?>
        </section> -->


    <!-- Related Course  Section :- -->
        <?php 
          $user = wp_get_current_user();
          $userIdentifier = "";
          $users_courses = array();
          if(isset($user->ID) && $user->ID > 0)
          {
            $userIdentifier = $user->ID;
            $courses_with_types = apply_filters('wplms_usermeta_direct_query',$wpdb->prepare("SELECT posts.ID as id FROM {$wpdb->posts} AS posts LEFT JOIN {$wpdb->usermeta} AS meta ON posts.ID = meta.meta_key WHERE   posts.post_type   = %s AND   posts.post_status   = %s AND   meta.user_id   = %d",'course','publish',$user->ID));
              $result = $wpdb->get_results($courses_with_types);

              foreach($result as $course){
                $users_courses[]=$course->id;
              }
          }
          else if(isset($_COOKIE['PHPSESSID']))
          {
            $userIdentifier = $_COOKIE['PHPSESSID'];
          }

            $tags_by_course_id = get_the_terms($post->ID, 'course-tag' );
            $tag_array = array();
            $coursearray = array();
           // print_r($tags_by_course_id);
            if(!empty(get_the_terms($post->ID, 'course-tag' ))){
              foreach(get_the_terms($post->ID, 'course-tag' ) as $tag) {
                $tag_array[] = $tag->term_id ;
              }
            }
            
            if ($tag_array) {
              foreach($tag_array as $tag) {
                $courses_ids = $wpdb->get_col( $wpdb->prepare( "SELECT object_id FROM $wpdb->term_relationships WHERE term_taxonomy_id = '".$tag."'") );
                foreach ($courses_ids as $course_id) {
                    $coursearray[] = $course_id;
                }
              }
              
               $relatedCourse = array_diff($coursearray,array(get_the_ID()));
              $related_course_id = array_unique(array_diff($coursearray,array(get_the_ID())));
              if( !empty( $related_course_id ) ) {
                  $query_args = apply_filters('wplms_mycourses',array(
                  'post_type'=>'course',
                  'posts_per_page' => 3,
                  'post__in'=>$related_course_id
                  ),$user->ID);
                  $Query_course = new WP_Query($query_args);
              }
            }
            //print_r($related_course_id);
            if($Query_course && $Query_course->have_posts()){

        ?>



        <div class="related-course">
            <h3 class="medium-title">Related Courses</h3>
            <div class="course-wrapper">
               <?php 
                    if ($Query_course->have_posts()) : while ($Query_course->have_posts()) : $Query_course->the_post();
                        $custom_fields = get_post_custom();   
                        $duration = $custom_fields['vibe_validity'][0]; 
                        $age_limit = $custom_fields['vibe_course_age_group'][0];
                        $category_array = get_the_terms( $post->ID, 'course-cat');
                        $durationParameter = get_post_meta($post->ID,'vibe_course_validity_parameter',true);
                        $courseID = $post->ID;
                        //$courseslug=get_site_url().'/?p='.$courseID;
                        $courseslug=get_the_permalink($courseID);

                        $coursePartner = "";
                        $cb_course_id = get_post_meta($courseID,'celeb_school_course_id',true);
                        if ($cb_course_id) {
                          $coursePartner = "Celebrity School";
                        }

                        $aiws_course_id = get_post_meta($courseID,'aiws_program_id',true);
                        if ($aiws_course_id) {
                          $coursePartner = "AIWS";
                        }


                      $course_type="";
                      $course_type = $custom_fields['vibe_course_type'][0];

                      $str1="LIVE CLASSES";
                      $str2="BLENDED";
                      $str3="SELF-PACED";
                    
                      if(strcmp($str2, $course_type)==0){
                         $badge_class = "blue";
                      }
                      elseif(strcmp($str3, $course_type)==0){
                         $badge_class = "green";
                      }
                      elseif(strcmp($str1, $course_type)==0){
                         $badge_class = "red";
                      }
                      else{
                        $badge_class = "";
                      }

                      if ( has_post_thumbnail() ) {
                          $image_url = get_the_post_thumbnail_url();
                        }
                        $pid=get_post_meta($courseID,'vibe_product',true);
                        $pid=apply_filters('wplms_course_product_id',$pid,$courseID,0);

                        if(is_numeric($pid) && bp_course_get_post_type($pid) == 'product'){
                          $pid=get_permalink($pid);
                          $check=vibe_get_option('direct_checkout');
                          $check =intval($check);
                          if(isset($check) &&  $check){
                            $pid .= '?redirect';
                          }
                        }
                        $coming_soon = get_post_meta($courseID,'vibe_coming_soon',true);  
                  ?>  


                <div class="column">
                    <div class="course-card">
                        <figure class="image"><img alt="<?php echo $post->post_title; ?>" src="<?php echo $image_url;?>"></figure>
                        <div class="course-copy">
                            <header class="course-header">
                                <a class="category" href="#"><?php echo $category_array[0]->name;?></a>
                                <span class="badge <?php echo $badge_class;?>"><?php echo $course_type; ?></span>
                            </header>
                            <h2 class="course-title"><a href="<?php echo get_permalink($post->ID);?>"><?php echo bp_course_title(); ?></a></h2>
                            <footer class="course-footer">
                               <?php /*if (in_array($post->ID, $users_courses)){
                                    the_course_button(); 
                                  }*/
                                  ?> 
                                <div class="left" id="course_price_share_<?php echo $post->ID;?>">
                                    <span class="price"data-id="<?php echo $post->ID;?>"><?php the_course_price(); ?></span><!-- <span class="gst">+ GST</span> -->
                                </div>
                                <div class="right">
                                  <?php if (!in_array($post->ID, $users_courses) && $coming_soon != 'S'){ ?>
                                    <a href='<?php echo $pid;?>'>
                                        <svg class="cart" xmlns="http://www.w3.org/2000/svg" width="26" height="21.587" viewBox="0 0 26 21.587"> <g id="Group_20746" data-name="Group 20746" transform="translate(1 1)"> <g id="Group_15651" data-name="Group 15651" transform="translate(0 0)"> <path id="Path_30160" data-name="Path 30160" d="M-11952.5,9580.5h3.393l5.136,15.36h12.108" transform="translate(11952.5 -9580.5)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> <path id="Path_30161" data-name="Path 30161" d="M-11898.5,9610.5h20.038l-3.893,9.023h-13" transform="translate(11902.465 -9607.673)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> <g id="Ellipse_440" data-name="Ellipse 440" transform="translate(7.67 17.428)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"> <circle cx="1.579" cy="1.579" r="1.579" stroke="none"></circle> <circle cx="1.579" cy="1.579" r="0.579" fill="none"></circle> </g> <g id="Ellipse_441" data-name="Ellipse 441" transform="translate(16.874 17.428)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"> <circle cx="1.579" cy="1.579" r="1.579" stroke="none"></circle> <circle cx="1.579" cy="1.579" r="0.579" fill="none"></circle> </g> </g> </g> </svg>
                                      
                                    </a>
                                    <?php }
                                     if(is_user_logged_in())
                                     {
                                       wpfp_course_link(); 
                                     }
                                      else{
                                      $url = "/login-register";
                                      ?>
                                      <a href="<?php echo get_site_url().$url; ?>"><i class="add-wishlist" title="Add to Wishlist"></i></a>
                                      <?php
                                    }
                                    ?>
                                    <!-- <a href="#bookmark!">
                                        <svg class="bookmark filled" xmlns="http://www.w3.org/2000/svg" width="17" height="21.146" viewBox="0 0 17 21.146"><path id="Path_38323" data-name="Path 38323" d="M31.409,38.413,35.5,34.368l4.091,4.045a2.083,2.083,0,0,0,2.79.074A1.773,1.773,0,0,0,43,37.147v-14.3A2.964,2.964,0,0,0,39.932,20H31.068A2.964,2.964,0,0,0,28,22.849V37.159A1.906,1.906,0,0,0,29.965,39a2.049,2.049,0,0,0,1.444-.575Z" transform="translate(-27 -19)"></path></svg>
                                    </a> -->
                                   <a href="#share!" class="course_share" data-toggle="modal" data-target="#open_popular_share" data-id="<?php echo $courseID;?>">
                                        <svg class="share" xmlns="http://www.w3.org/2000/svg" width="25.445" height="19.4" viewBox="0 0 25.445 19.4"> <g id="Group_20744" data-name="Group 20744" transform="translate(0.205 0.2)" style="isolation: isolate"> <path id="Path_38322" data-name="Path 38322" d="M21.417,21a.53.53,0,0,1,.275.133l9.091,8.188a.724.724,0,0,1,.1.919.626.626,0,0,1-.1.114l-9.091,8.188a.52.52,0,0,1-.8-.12.723.723,0,0,1-.118-.392V34.746a18.89,18.89,0,0,0-4.705.389,17.55,17.55,0,0,0-9.127,4.7.518.518,0,0,1-.8-.062.733.733,0,0,1-.113-.634C8.4,30.71,15.625,26.694,20.778,25.094V21.655a.618.618,0,0,1,.564-.66A.446.446,0,0,1,21.417,21Zm.5,1.985v2.6a.645.645,0,0,1-.426.634C17,27.53,10.737,30.858,7.913,37.407a19.292,19.292,0,0,1,7.964-3.562,21.972,21.972,0,0,1,5.5-.4.621.621,0,0,1,.542.655v2.589l7.6-6.848Z" transform="translate(-6.003 -20.995)" stroke-width="0.4"></path> </g> </svg>
                                    </a>
                                </div>

                            <input type="hidden" id="course_name_<?php echo $courseID;?>" value="<?php echo $post->post_title;?>">
                            <input type="hidden" id="course_url_<?php echo $courseID;?>" value="<?php echo $courseslug;?>">
                            <input type="hidden" id="course_image_<?php echo $courseID;?>" value="<?php echo $image_url;?>">
                            <input type="hidden" id="course_category_<?php echo $courseID;?>" value="<?php echo $category_array[0]->name;?>">
                            <input type="hidden" id="course_type_<?php echo $courseID;?>" value="<?php echo $course_type;?>">
                            <input type="hidden" id="course_badge_<?php echo $courseID;?>" value="<?php echo $badge_class;?>">
                            <input type="hidden" id="course_partner_<?php echo $courseID;?>" value="<?php echo $coursePartner;?>">
                            <input type="hidden" id="category_id_<?php echo $courseID;?>" value="<?php echo $category_array[0]->term_id;?>">
                            <input type="hidden" id="course_id_<?php echo $courseID;?>" value="<?php echo $courseID;?>">
                            <input type="hidden" id="course_price_<?php echo $courseID;?>" value="0">
                            <input type="hidden" id="course_tax_<?php echo $courseID;?>" value="0">
                            <input type="hidden" id="age_group_<?php echo $courseID;?>" value="<?php echo $age_limit;?>">
                            <input type="hidden" id="course_duration_<?php echo $courseID;?>" value="<?php echo get_post_meta($courseID, "vibe_validity", true);?>">
                            <input type="hidden" id="session_duration_<?php echo $courseID;?>" value="<?php echo get_post_meta($courseID, "vibe_course_session_length", true);?>">
                            <input type="hidden" id="wishlisted_course_<?php echo $courseID;?>" value="<?php //echo in_array($courseID, $usersFavorites) ? '1' : '0';?>">
                            </footer>
                        </div>
                    </div>
                </div>
                 <?php endwhile;endif;
                      ?>

            </div>
        </div>
<?php } ?>
    </div>

<?php
endwhile; endif; 
?>
<?php get_footer( vibe_get_footer() );  ?>

<script type="text/javascript">
    window.onbeforeunload = null;
    (function($) {
$(".video-image").on("click", function (event, ui) {
       
        
//alert("video_url"+video_url);
        $("#thumbnailImage").hide();
        $("#videoFrame").show();

        /* var video_type = $("#video_type").val();   
        var video_thumbnail = $("#video_thumbnail").val();   
        var video_url = $("#video_url").val(); 


       if(video_url != ""){
          jQuery.ajax({
              type : "POST",
              dataType : "json",
              url : "<?php //echo home_url(); ?>/wp-admin/admin-ajax.php",
              data : {"action": "display_video_iframe",video_url : video_url,course_id : courseID},
              success: function(response) {   
              alert("response=>"+response.response);        
                  if(response.status == 1){
                    jQuery("#thumbnailVideo").html(response.response);                   
                  }
              }
          });
        }*/
      });

    })( jQuery );
</script>

