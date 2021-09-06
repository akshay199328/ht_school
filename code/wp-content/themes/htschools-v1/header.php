<?php
//Header File
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  
<meta charset="UTF-8">
<!-- <link rel="icon" type="image/svg" href="<?php echo bloginfo('template_url')?>/assets/images/favicon.svg"/> -->
<link rel="icon" href="data:image/svg+xml,%3Csvg id='Group_7' data-name='Group 7' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='35.752' height='48.47' viewBox='0 0 35.752 48.47'%3E%3Cdefs%3E%3CclipPath id='clip-path'%3E%3Cpath id='Path_39683' data-name='Path 39683' d='M685.768,315.427a18.047,18.047,0,1,1-26.861,15.885q0-.128,0-.257a18.006,18.006,0,0,1,17.976-18.037A17.8,17.8,0,0,1,685.768,315.427Z' transform='translate(-658.906 -313.019)' fill='none'/%3E%3C/clipPath%3E%3C/defs%3E%3Cpath id='Path_21' data-name='Path 21' d='M704.9,440.424h-14.3a1.517,1.517,0,0,1-1.51-1.524h0a1.517,1.517,0,0,1,1.51-1.525H704.9a1.518,1.518,0,0,1,1.511,1.525h0a1.515,1.515,0,0,1-1.505,1.524Z' transform='translate(-679.983 -396.303)' fill='%23ff6417'/%3E%3Cpath id='Path_22' data-name='Path 22' d='M707.7,454.717H697.648a1.518,1.518,0,0,1-1.511-1.525h0a1.518,1.518,0,0,1,1.511-1.524H707.7a1.518,1.518,0,0,1,1.51,1.524h0a1.512,1.512,0,0,1-1.5,1.525Z' transform='translate(-684.91 -406.247)' fill='%23ff6417'/%3E%3Cg id='Group_5' data-name='Group 5' transform='translate(0 3.229)'%3E%3Cg id='Group_21487' data-name='Group 21487'%3E%3Cg id='Group_21486' data-name='Group 21486' clip-path='url(%23clip-path)'%3E%3Cg id='Group_4' data-name='Group 4' transform='translate(-0.004 -0.068)'%3E%3Cpath id='Path_23' data-name='Path 23' d='M692.256,321.828a17.787,17.787,0,0,0-24.413-6.622,18.208,18.208,0,0,0-.061,31.321c.349.207.7.395,1.06.576a1.325,1.325,0,0,1,1.289-1.258,1.235,1.235,0,0,1,.74.245,2.27,2.27,0,0,1,2.115-1.808,2.968,2.968,0,0,1,2.149.945l.574-8.408v-.765h2.6l.574,9.12a2.993,2.993,0,0,1,2.11-.893,2.262,2.262,0,0,1,2.1,1.744,1.259,1.259,0,0,1,.634-.183,1.321,1.321,0,0,1,1.268,1.086c.251-.133.5-.262.749-.407a17.985,17.985,0,0,0,8.889-15.629A17.77,17.77,0,0,0,692.256,321.828Z' transform='translate(-658.892 -312.794)' fill='%23ff6417'/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3Cg id='Group_6' data-name='Group 6' transform='translate(8.83)'%3E%3Cpath id='Path_25' data-name='Path 25' d='M709.051,305.621l-.09.193L707.5,309l.081,18.219h6.2V308.687l-3.14-6.278Z' transform='translate(-701.678 -302.409)' fill='%23fff'/%3E%3Crect id='Rectangle_1' data-name='Rectangle 1' width='2.072' height='18.516' transform='translate(7.961 6.342)' fill='%23ff6417'/%3E%3Cpath id='Path_26' data-name='Path 26' d='M694.179,358.893l.064,7.66-6.054-.035v-1.645S694.094,358.893,694.179,358.893Z' transform='translate(-688.188 -341.704)' fill='%23fff'/%3E%3Cpath id='Path_27' data-name='Path 27' d='M712.64,305.621h3.143l-1.549-3.212Z' transform='translate(-705.267 -302.409)'/%3E%3Cpath id='Path_28' data-name='Path 28' d='M728.225,358.782l-.063,7.694,6.041-.038v-1.645S728.31,358.782,728.225,358.782Z' transform='translate(-716.108 -341.627)' fill='%23fff'/%3E%3Cpath id='Path_29' data-name='Path 29' d='M711.771,385.034h-6.693a.708.708,0,0,1-.706-.709v-.308a.708.708,0,0,1,.7-.713h6.7a.707.707,0,0,1,.706.709v.309A.711.711,0,0,1,711.771,385.034Z' transform='translate(-699.492 -358.687)' fill='%23fff'/%3E%3C/g%3E%3C/svg%3E%0A">

<?php
$page_id     = get_the_ID();
  $post_data  = get_post_meta($page_id);
  
  if(isset($post_data['_yoast_wpseo_canonical'])){ ?>

    <link rel="canonical" href="<?php  echo $post_data['_yoast_wpseo_canonical'][0];?>" />
  <?php 
  }

    wp_head();
?>
<script type="text/javascript">
   var site_url = '<?php bloginfo('url'); ?>';
</script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MXXRRC3');</script>
<!-- End Google Tag Manager -->
<script type="text/javascript">
  (function(i,s,o,g,r,a,m,n){i.moengage_object=r;t={};q=function(f){return function(){(i.moengage_q=i.moengage_q||[]).push({f:f,a:arguments})}};f=['track_event','add_user_attribute','add_first_name','add_last_name','add_email','add_mobile','add_user_name','add_gender','add_birthday','destroy_session','add_unique_user_id','moe_events','call_web_push','track','location_type_attribute'],h={onsite:["getData","registerCallback"]};for(k in f){t[f[k]]=q(f[k])}for(k in h)for(l in h[k]){null==t[k]&&(t[k]={}),t[k][h[k][l]]=q(k+"."+h[k][l])}a=s.createElement(o);m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m);i.moe=i.moe||function(){n=arguments[0];return t};a.onload=function(){if(n){i[r]=moe(n)}}})(window,document,'script','https://cdn.moengage.com/webpush/moe_webSdk.min.latest.js','Moengage')

  Moengage = moe({
    app_id:"5G83B74ZQGQUARJAI23JB9JY_DEBUG",
    debug_logs: 1
  });
</script>

<?php global $wp;

$currentSlug = add_query_arg( array(), $wp->request );
$currentSlug = $currentSlug ? $currentSlug : "home";
$currentSlug = explode('/', $currentSlug)[0];

// If current page is news detail page
if(strlen($currentSlug) > 20)   $currentSlug = "news_details";

$allowAdsPageList = array("home", "courses", "course", "editorsdesk", "my-courses", "news_details");
if(in_array($currentSlug, $allowAdsPageList)) require_once('google-ads.php');
?>

</head>
<body <?php body_class(); ?>>
<!-- <div id="global" class="global"> -->
    <?php
        get_template_part('mobile','sidebar');
    ?>
    <span class="overlay"></span>
    <!-- Push -->
        <?php
            $fix=vibe_get_option('header_fix');
        ?>
    <header class="header-wrapper">
        <div class="header-copy">
            <div class="left-side">
            <button class="home-button" type="submit">
                <span class="burger"></span>
            </button>
            <?php
                $template_file = get_post_meta( get_the_ID(), '_wp_page_template', TRUE );
                //print_r($template_file);
                    $url = apply_filters('wplms_logo_url',VIBE_URL.'/assets/images/logo.png','header');
                    if(!empty($url)){
            ?>
            <?php if ( is_page_template('all-courses.php') || is_page_template('my-course.php') ) { ?>
                <a href="<?php echo vibe_site_url(); ?>" class="homeicon"><img src="<?php $logo_top = vibe_get_option('headertop_logo'); echo isset($logo_top)?$logo_top:apply_filters('wplms_logo_url',VIBE_URL.'/images/logo.png'); ?>" alt="<?php echo get_bloginfo('name'); ?>" title="<?php echo get_bloginfo('name'); ?>" /></a>

            <?php
                }
            else{?>
                <a href="<?php echo vibe_site_url(); ?>" class="logo"><img src="<?php  echo vibe_sanitizer($url,'url'); ?>" width="100" height="48" alt="<?php echo get_bloginfo('name'); ?>" title="<?php echo get_bloginfo('name'); ?>" /></a>

            <?php }
                }
            ?>
            <!-- <a class="logo" href="index.html">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 142.437 43">
                    <title>HT-SCHOOLS</title>
                  <defs>
                    <clipPath id="clip-path">
                      <path id="Path_24" data-name="Path 24" d="M351.24,13.136a13.39,13.39,0,0,1,4.838,18.214,13.326,13.326,0,0,1-23.052-13.375,13.39,13.39,0,0,1,18.214-4.838Z" transform="translate(-331.25 -11.36)"/>
                    </clipPath>
                  </defs>
                  <g id="Group_15963" data-name="Group 15963" style="isolation: isolate">
                    <path id="Path_1" data-name="Path 1" d="M112.621,18.319a16.107,16.107,0,0,0,1.97.925,27.61,27.61,0,0,1,3.464,1.656,7.9,7.9,0,0,1,2.492,2.369,6.64,6.64,0,0,1,1.08,3.885,7.291,7.291,0,0,1-4.322,6.862,10.943,10.943,0,0,1-4.737.975,12.682,12.682,0,0,1-4.458-.906,25.048,25.048,0,0,1-4.458-2.194l2.508-6.026a35.8,35.8,0,0,0,3.413,1.846,6.629,6.629,0,0,0,2.508.766,2.652,2.652,0,0,0,1.447-.348,1.1,1.1,0,0,0,.541-.975q0-.451-.608-.817a16.244,16.244,0,0,0-1.966-.925,23.71,23.71,0,0,1-3.413-1.637,7.94,7.94,0,0,1-2.454-2.388,6.705,6.705,0,0,1-1.064-3.885,7.77,7.77,0,0,1,1.1-4.126,7.25,7.25,0,0,1,3.119-2.771,10.629,10.629,0,0,1,4.667-.975,12.425,12.425,0,0,1,4.284.817,19.7,19.7,0,0,1,4.04,2l-2.543,5.782a15.152,15.152,0,0,0-2.717-1.428,7.26,7.26,0,0,0-2.717-.592,2.179,2.179,0,0,0-1.289.348,1.092,1.092,0,0,0-.488.94C112.013,17.8,112.215,18.075,112.621,18.319Z" transform="translate(-71.072 -6.581)" fill="#38bbd1"/>
                    <path id="Path_2" data-name="Path 2" d="M184.01,33.043a13.364,13.364,0,0,1-3.5,1.514,14.216,14.216,0,0,1-3.85.541,12.976,12.976,0,0,1-6.409-1.567,11.156,11.156,0,0,1-4.408-4.424,13.325,13.325,0,0,1-1.583-6.583,13.359,13.359,0,0,1,1.583-6.583,11.137,11.137,0,0,1,4.408-4.424A12.975,12.975,0,0,1,176.66,9.95a14.945,14.945,0,0,1,7,1.811l-2.543,6.13a6.329,6.329,0,0,0-3.309-.94,6.14,6.14,0,0,0-2.875.7,5.5,5.5,0,0,0-2.144,1.966,5.7,5.7,0,0,0,.016,5.852,5.487,5.487,0,0,0,2.141,1.951,6.1,6.1,0,0,0,2.821.681,6.02,6.02,0,0,0,3.692-1.219Z" transform="translate(-112.637 -6.799)" fill="#05d17d"/>
                    <g id="Group_2" data-name="Group 2" transform="translate(0 2.289)">
                      <circle id="Ellipse_1" data-name="Ellipse 1" cx="13.926" cy="13.926" r="13.926" transform="translate(0.659 0.389)" fill="#fff"/>
                      <g id="qu6ZpE.tif_1_">
                        <g id="Group_1" data-name="Group 1">
                          <path id="Path_3" data-name="Path 3" d="M14.2,7.23H15a.5.5,0,0,0,.212.032,7.032,7.032,0,0,1,1.1.082,15.3,15.3,0,0,1,4.012,1.032A15.046,15.046,0,0,1,24.9,11.318a12.749,12.749,0,0,1,2.169,2.717,14.162,14.162,0,0,1,2.077,6.824,14.637,14.637,0,0,1-.522,4.788,14.008,14.008,0,0,1-3.945,6.51,14.4,14.4,0,0,1-4.389,2.752,14.82,14.82,0,0,1-4.728,1.077,15.452,15.452,0,0,1-3.8-.222,14.7,14.7,0,0,1-4.31-1.523,13.831,13.831,0,0,1-3.746-2.863,14.548,14.548,0,0,1-3.667-8.7A14.829,14.829,0,0,1,.092,19.9,14.58,14.58,0,0,1,1.71,14.75a13.158,13.158,0,0,1,3.154-3.974A15.038,15.038,0,0,1,13.34,7.293,6.567,6.567,0,0,0,14.2,7.23ZM8.258,20.669v5.456c0,.456,0,.4-.393.4a3.639,3.639,0,0,0-1.254.108c-.241.089-.488.152-.731.228s-.469.142-.7.212c-.041.013-.092.025-.117-.025s.006-.076.032-.1.066-.076.1-.111c.174-.2.389-.348.567-.538.291-.307.57-.624.849-.94a2.356,2.356,0,0,0,.652-1.6q0-4.3,0-8.594c0-.2-.057-.256-.26-.25a1.457,1.457,0,0,0-.165.019,5.9,5.9,0,0,1-1.229.054,9.828,9.828,0,0,0-1.4-.1A1.686,1.686,0,0,0,2.7,17.4a.149.149,0,0,0,.152.1c.092-.006.092-.076.1-.146a.709.709,0,0,1,.738-.684c.389-.028.779-.028,1.168-.022a1.109,1.109,0,0,0,.6-.174c.323-.187.649-.364.975-.545.038-.022.085-.057.12-.009s-.019.07-.041.1c-.307.427-.617.855-.921,1.286a3.663,3.663,0,0,0-.716,1.526,7.764,7.764,0,0,0-.054,1.181c0,.222-.013.234-.237.234-.31,0-.624,0-.934,0a.3.3,0,0,0-.279.142c-.291.418-.592.833-.89,1.248-.047.07-.1.142-.063.228s.139.076.222.076h2.02c.218,0,.234.019.237.241,0,.928.006,1.859,0,2.787a3.076,3.076,0,0,1-.462,1.564,13.917,13.917,0,0,1-1.029,1.434c-.051.063-.117.127-.076.222s.142.095.231.095H7.052a.372.372,0,0,0,.193-.038c.494-.288.95-.636,1.438-.937a.407.407,0,0,0,.193-.393c-.006-1.257,0-2.514,0-3.771,0-.355,0-.712,0-1.067,0-.085.01-.187.123-.18.294.019.589-.044.883-.009a4.4,4.4,0,0,0,.817.006c.415-.028.415-.035.415.374v4.107a.368.368,0,0,0,.089.307c.488.456.972.915,1.46,1.368.225.209.317.2.579.025.32-.222.646-.431.972-.646.241-.158.488-.313.722-.481.133-.095.133-.2.006-.282-.383-.237-.716-.545-1.092-.792a.334.334,0,0,1-.161-.3c0-.991,0-1.979,0-2.97,0-1.14.006-2.28,0-3.42a17.445,17.445,0,0,1,.184-3.325c.054-.285.082-.573.111-.861.019-.2-.066-.247-.241-.161-.139.07-.279.142-.415.215-.643.355-1.279.719-1.928,1.058a.52.52,0,0,0-.339.554c.032,1.1.013,2.2.013,3.3,0,.209-.032.241-.244.241-.567,0-1.134,0-1.7,0-.269,0-.282-.013-.282-.282V15.149c0-.073,0-.146,0-.215,0-.044-.013-.1-.06-.111a.73.73,0,0,0-.443,0c-.1.041-.063.168-.066.256C8.255,16.954,8.258,18.81,8.258,20.669Zm11.292.982c0,1.035,0,2.071,0,3.1a.617.617,0,0,1-.152.427,2.773,2.773,0,0,0-.209.26c-.092.133-.193.13-.307.032a4.052,4.052,0,0,1-.947-1.175,4.767,4.767,0,0,1-.5-2.7,5.3,5.3,0,0,1,.583-1.935,4.557,4.557,0,0,1,.614-.931c.057-.066.1-.142.044-.228s-.12-.035-.18-.009A5.44,5.44,0,0,0,16.19,20.27a4.324,4.324,0,0,0-.744,1.571,5.248,5.248,0,0,0,.5,3.844,4.022,4.022,0,0,0,.586.826,5.868,5.868,0,0,0,1.016.88,4.927,4.927,0,0,0,1.529.687,6.662,6.662,0,0,0,2.036.152,5.487,5.487,0,0,0,3.325-1.336,4.029,4.029,0,0,0,1.393-2.758c.009-.079.013-.161-.085-.193s-.136.044-.174.114a3.774,3.774,0,0,1-.4.57,3.962,3.962,0,0,1-1.5,1.108c-.18.076-.2.063-.2-.136V17.622c0-.446,0-.44.456-.481a1.744,1.744,0,0,0,1.289-.709,4.619,4.619,0,0,0,.76-2.042c.009-.051.013-.1-.044-.13a.12.12,0,0,0-.139.022,2.255,2.255,0,0,0-.168.184,1.41,1.41,0,0,1-.963.541,8.166,8.166,0,0,1-1.548.022c-1-.063-2-.237-3.005-.3a6.042,6.042,0,0,0-2.644.288,2.812,2.812,0,0,0-.836.478,2.421,2.421,0,0,0-.82,1.381,3.148,3.148,0,0,0,.117,1.514.23.23,0,0,0,.136.177c.139.044.231-.016.269-.18a1.772,1.772,0,0,1,1.137-1.317,4.391,4.391,0,0,1,1.64-.25,15.051,15.051,0,0,1,2.324.2c.047.006.114,0,.13.06s-.054.076-.095.1c-.51.275-1,.579-1.533.811a.645.645,0,0,0-.405.712C19.556,19.681,19.547,20.666,19.55,21.65Z" transform="translate(0 -7.23)" fill="#00b1cd"/>
                          <path id="Path_4" data-name="Path 4" d="M65.155,42.987v4.189c0,.26,0,.266-.256.32a5.54,5.54,0,0,1-2.578-.028c-.177-.044-.345-.12-.519-.18-.041-.016-.092-.025-.092-.082s.048-.07.086-.092c.4-.215.8-.431,1.2-.646.206-.111.405-.231.617-.332a.334.334,0,0,0,.2-.358c-.006-.627,0-1.257,0-1.884,0-1.485,0-2.97,0-4.455a.448.448,0,0,1,.165-.377,3.031,3.031,0,0,0,.389-.364c.206-.247.465-.155.712-.136.073,0,.076.07.079.127,0,.1,0,.2,0,.3C65.155,40.318,65.155,41.654,65.155,42.987Z" transform="translate(-42.169 -28.617)" fill="#00b1cd"/>
                        </g>
                      </g>
                    </g>
                    <g id="Group_3" data-name="Group 3" transform="translate(32.659 35.188)">
                      <path id="Path_5" data-name="Path 5" d="M106.922,103.991a1.344,1.344,0,0,1,.868.419,1.365,1.365,0,0,1,.352.979,1.53,1.53,0,0,1-.5,1.212,2.036,2.036,0,0,1-1.385.441H104.16V101.11h1.983a2.156,2.156,0,0,1,1.4.411,1.379,1.379,0,0,1,.508,1.131A1.242,1.242,0,0,1,106.922,103.991Zm-.822-2.025h-.966v1.627h.966a1.086,1.086,0,0,0,.716-.216.829.829,0,0,0,0-1.2A1.106,1.106,0,0,0,106.1,101.966Zm.136,4.22a.958.958,0,0,0,.686-.237.866.866,0,0,0,.246-.661.784.784,0,0,0-.254-.606.948.948,0,0,0-.669-.233h-1.11v1.737Z" transform="translate(-104.16 -101.11)"/>
                      <path id="Path_6" data-name="Path 6" d="M118.388,105.79h.924v3.965a1.871,1.871,0,0,1-.517,1.407,1.908,1.908,0,0,1-1.339.458,2.047,2.047,0,0,1-1.356-.407,1.345,1.345,0,0,1-.441-1.025h.932a.731.731,0,0,0,.225.5.945.945,0,0,0,.623.165.883.883,0,0,0,.695-.284,1.3,1.3,0,0,0,.254-.885v-.5a1.352,1.352,0,0,1-1.271.652,1.326,1.326,0,0,1-1.08-.453,1.806,1.806,0,0,1-.377-1.19V105.79h.924V108c0,.682.284,1.025.856,1.025a.823.823,0,0,0,.708-.33,1.43,1.43,0,0,0,.241-.864Z" transform="translate(-110.788 -103.807)"/>
                      <path id="Path_7" data-name="Path 7" d="M132.18,107.041V101.11h.974v2.55H135.6v-2.55h.974v5.931H135.6v-2.508h-2.449v2.508Z" transform="translate(-120.309 -101.11)"/>
                      <path id="Path_8" data-name="Path 8" d="M146.118,102.384a.706.706,0,1,1,.195-.487A.664.664,0,0,1,146.118,102.384Zm-.957,4.715V103.15h.924V107.1Z" transform="translate(-127.663 -101.168)"/>
                      <path id="Path_9" data-name="Path 9" d="M150.44,109.6v-3.949h.924v.551a1.366,1.366,0,0,1,1.288-.652q1.443,0,1.44,1.568V109.6h-.924v-2.059a1.654,1.654,0,0,0-.195-.924.758.758,0,0,0-.669-.28.865.865,0,0,0-.695.284,1.192,1.192,0,0,0-.246.809V109.6Z" transform="translate(-130.833 -103.669)"/>
                      <path id="Path_10" data-name="Path 10" d="M164.263,101.11h.924v5.931h-.924v-.534a1.191,1.191,0,0,1-.53.462,1.691,1.691,0,0,1-.733.174,1.8,1.8,0,0,1-1.432-.585,2.188,2.188,0,0,1-.508-1.491,2.135,2.135,0,0,1,.534-1.487,1.835,1.835,0,0,1,1.432-.589,1.552,1.552,0,0,1,.729.169,1.233,1.233,0,0,1,.508.466Zm-1.127,5.211a1.074,1.074,0,0,0,.869-.356,1.491,1.491,0,0,0,0-1.8,1.212,1.212,0,0,0-1.712,0,1.471,1.471,0,0,0,0,1.8A1.058,1.058,0,0,0,163.136,106.321Z" transform="translate(-136.954 -101.11)"/>
                      <path id="Path_11" data-name="Path 11" d="M174.966,109.84a1.442,1.442,0,0,1-1.068-.4,1.584,1.584,0,0,1-.4-1.169V105.79h.924v2.254a1.276,1.276,0,0,0,.186.754.714.714,0,0,0,.619.254.875.875,0,0,0,.729-.284,1.164,1.164,0,0,0,.229-.75V105.79h.924v3.949h-.924v-.551A1.28,1.28,0,0,1,174.966,109.84Z" transform="translate(-144.123 -103.807)"/>
                      <path id="Path_12" data-name="Path 12" d="M185.8,109.7a1.852,1.852,0,0,1-1.212-.381,1.165,1.165,0,0,1-.466-.932h.924a.492.492,0,0,0,.225.415.98.98,0,0,0,.58.161.631.631,0,0,0,.415-.127.421.421,0,0,0,.153-.339.379.379,0,0,0-.3-.415l-1.017-.28a1.042,1.042,0,0,1-.856-1.093,1.016,1.016,0,0,1,.424-.826,1.707,1.707,0,0,1,1.093-.335,1.752,1.752,0,0,1,1.157.339,1.107,1.107,0,0,1,.4.89h-.907a.454.454,0,0,0-.182-.386.81.81,0,0,0-.5-.14.679.679,0,0,0-.407.114.349.349,0,0,0-.161.292.416.416,0,0,0,.339.424l.941.271a1.385,1.385,0,0,1,.661.4.955.955,0,0,1,.254.657,1.167,1.167,0,0,1-.411.932A1.7,1.7,0,0,1,185.8,109.7Z" transform="translate(-150.244 -103.669)"/>
                      <path id="Path_13" data-name="Path 13" d="M195.029,107.334a2.8,2.8,0,0,0,.466-.034v.813a3.984,3.984,0,0,1-.686.051,2.181,2.181,0,0,1-.4-.034,1.474,1.474,0,0,1-.4-.157.811.811,0,0,1-.356-.428,2.022,2.022,0,0,1-.127-.771v-1.839h-.669v-.771h.669V102.97h.924v1.195h.907v.771h-.907v1.627a.986.986,0,0,0,.136.623A.56.56,0,0,0,195.029,107.334Z" transform="translate(-155.281 -102.182)"/>
                      <path id="Path_14" data-name="Path 14" d="M202.22,109.7a1.8,1.8,0,0,1-1.432-.585,2.188,2.188,0,0,1-.508-1.491,2.135,2.135,0,0,1,.534-1.487,1.835,1.835,0,0,1,1.432-.589,1.552,1.552,0,0,1,.729.169,1.233,1.233,0,0,1,.508.466v-.534h.924V109.6h-.924v-.534a1.191,1.191,0,0,1-.53.462A1.69,1.69,0,0,1,202.22,109.7Zm.136-.822a1.074,1.074,0,0,0,.869-.356,1.491,1.491,0,0,0,0-1.8,1.212,1.212,0,0,0-1.712,0,1.471,1.471,0,0,0,0,1.8A1.058,1.058,0,0,0,202.356,108.88Z" transform="translate(-159.557 -103.669)"/>
                      <path id="Path_15" data-name="Path 15" d="M212.82,109.6v-3.949h.924v.551a1.366,1.366,0,0,1,1.288-.652q1.443,0,1.44,1.568V109.6h-.924v-2.059a1.655,1.655,0,0,0-.195-.924.758.758,0,0,0-.669-.28.865.865,0,0,0-.695.284,1.192,1.192,0,0,0-.246.809V109.6Z" transform="translate(-166.785 -103.669)"/>
                      <path id="Path_16" data-name="Path 16" d="M229.56,107.041v-5.016h-1.72v-.915h4.423v.915h-1.729v5.016Z" transform="translate(-175.441 -101.11)"/>
                      <path id="Path_17" data-name="Path 17" d="M240.238,102.384a.707.707,0,1,1,.195-.487A.664.664,0,0,1,240.238,102.384Zm-.957,4.715V103.15h.924V107.1Z" transform="translate(-181.908 -101.168)"/>
                      <path id="Path_18" data-name="Path 18" d="M244.56,109.6v-3.949h.924v.551a1.094,1.094,0,0,1,.432-.47,1.24,1.24,0,0,1,.669-.182,1.215,1.215,0,0,1,1.246.7,1.175,1.175,0,0,1,.475-.5,1.413,1.413,0,0,1,.737-.2q1.424,0,1.424,1.551v2.5h-.924v-2.322q0-.941-.737-.941a.758.758,0,0,0-.61.258,1.418,1.418,0,0,0-.22.911V109.6h-.924v-2.33c0-.623-.241-.932-.72-.932a.773.773,0,0,0-.623.258,1.416,1.416,0,0,0-.225.911V109.6h-.924Z" transform="translate(-185.078 -103.669)"/>
                      <path id="Path_19" data-name="Path 19" d="M264.372,107.423q0,.153-.025.508h-2.932a.955.955,0,0,0,.305.716,1.18,1.18,0,0,0,.8.25.891.891,0,0,0,.881-.449h.932a1.353,1.353,0,0,1-.6.9,2.079,2.079,0,0,1-1.216.352,1.954,1.954,0,0,1-1.474-.559,2.393,2.393,0,0,1,0-3.029,1.9,1.9,0,0,1,1.445-.563,1.853,1.853,0,0,1,1.368.521A1.833,1.833,0,0,1,264.372,107.423Zm-2.957-.195h2.051a.942.942,0,0,0-.267-.7,1.016,1.016,0,0,0-.733-.246,1.075,1.075,0,0,0-.763.263A.93.93,0,0,0,261.415,107.228Z" transform="translate(-194.265 -103.669)"/>
                      <path id="Path_20" data-name="Path 20" d="M272.718,109.7a1.852,1.852,0,0,1-1.212-.381,1.165,1.165,0,0,1-.466-.932h.924a.492.492,0,0,0,.224.415.98.98,0,0,0,.58.161.631.631,0,0,0,.415-.127.42.42,0,0,0,.153-.339.379.379,0,0,0-.3-.415l-1.017-.28a1.042,1.042,0,0,1-.856-1.093,1.016,1.016,0,0,1,.424-.826,1.707,1.707,0,0,1,1.093-.335,1.752,1.752,0,0,1,1.157.339,1.107,1.107,0,0,1,.4.89h-.907a.453.453,0,0,0-.182-.386.81.81,0,0,0-.5-.14.679.679,0,0,0-.407.114.349.349,0,0,0-.161.292.416.416,0,0,0,.339.424l.94.271a1.385,1.385,0,0,1,.661.4.955.955,0,0,1,.254.657,1.167,1.167,0,0,1-.411.932A1.7,1.7,0,0,1,272.718,109.7Z" transform="translate(-200.339 -103.669)"/>
                    </g>
                    <g id="Group_7" data-name="Group 7" transform="translate(103.964 1.219)">
                      <path id="Path_21" data-name="Path 21" d="M364.4,97.848H353.754a1.124,1.124,0,0,1-1.124-1.124h0a1.124,1.124,0,0,1,1.124-1.124H364.4a1.124,1.124,0,0,1,1.124,1.124h0A1.122,1.122,0,0,1,364.4,97.848Z" transform="translate(-345.86 -64.724)" fill="#ff6417"/>
                      <path id="Path_22" data-name="Path 22" d="M366.233,107.978h-7.479a1.124,1.124,0,0,1-1.124-1.124h0a1.124,1.124,0,0,1,1.124-1.124h7.479a1.124,1.124,0,0,1,1.124,1.124h0A1.12,1.12,0,0,1,366.233,107.978Z" transform="translate(-349.277 -71.647)" fill="#ff6417"/>
                      <g id="Group_5" data-name="Group 5" transform="translate(0 2.378)">
                        <g id="Group_4" data-name="Group 4" clip-path="url(#clip-path)">
                          <path id="Path_23" data-name="Path 23" d="M356.069,17.975A13.326,13.326,0,0,0,333.016,31.35a13.135,13.135,0,0,0,4.838,4.838c.26.152.522.291.789.424a.982.982,0,0,1,.959-.928.926.926,0,0,1,.551.18,1.685,1.685,0,0,1,1.574-1.333,2.218,2.218,0,0,1,1.6.7l.427-6.2v-.56h1.932l.427,6.726a2.236,2.236,0,0,1,1.571-.659,1.679,1.679,0,0,1,1.564,1.286.943.943,0,0,1,.475-.136.98.98,0,0,1,.947.8c.187-.1.374-.193.557-.3a13.24,13.24,0,0,0,6.615-11.526A13.011,13.011,0,0,0,356.069,17.975Z" transform="translate(-331.243 -11.36)" fill="#ff6417"/>
                        </g>
                      </g>
                      <g id="Group_6" data-name="Group 6" transform="translate(6.571)">
                        <path id="Path_25" data-name="Path 25" d="M366.843,6.219l-.066.142L365.69,8.714l.06,13.436h4.614V8.479L368.027,3.85Z" transform="translate(-361.355 -3.85)" fill="#fff"/>
                        <rect id="Rectangle_1" data-name="Rectangle 1" width="1.542" height="13.654" transform="translate(5.925 4.677)" fill="#ff6417"/>
                        <path id="Path_26" data-name="Path 26" d="M356.459,43.88l.047,5.649L352,49.5V48.288S356.4,43.88,356.459,43.88Z" transform="translate(-352 -31.204)" fill="#fff"/>
                        <path id="Path_27" data-name="Path 27" d="M369.33,6.219h2.337L370.514,3.85Z" transform="translate(-363.842 -3.85)" fill="#ff6417"/>
                        <path id="Path_28" data-name="Path 28" d="M380.378,43.8l-.048,5.674,4.493-.028V48.233S380.441,43.8,380.378,43.8Z" transform="translate(-371.359 -31.15)" fill="#fff"/>
                        <path id="Path_29" data-name="Path 29" d="M368.977,62.456H364a.524.524,0,0,1-.526-.526v-.225A.524.524,0,0,1,364,61.18h4.981a.524.524,0,0,1,.526.526v.225A.526.526,0,0,1,368.977,62.456Z" transform="translate(-359.838 -43.026)" fill="#fff"/>
                      </g>
                    </g>
                    <g id="Group_8" data-name="Group 8" transform="translate(72.75 4.018)">
                      <path id="Path_30" data-name="Path 30" d="M287.739,23.716a9.584,9.584,0,0,0,1.577,2.036V12.7h-.678a9.735,9.735,0,0,0-.9,1.289,9.811,9.811,0,0,0,0,9.728Z" transform="translate(-269.047 -12.697)" fill="#0087ff"/>
                      <path id="Path_31" data-name="Path 31" d="M249.09,24.343a11.071,11.071,0,0,1,0-11c.13-.225.266-.44.412-.652h-5.82v8.151h-4.075V12.693H231.49V37.075h8.116V28.925h4.075v8.151h8.081V27.43A10.72,10.72,0,0,1,249.09,24.343Z" transform="translate(-231.49 -12.69)" fill="#0087ff"/>
                    </g>
                    <path id="Path_32" data-name="Path 32" d="M413.166,25.136V8.87H405.12v3.819a14.231,14.231,0,0,1,0,20.544v.019H420.2V25.136Z" transform="translate(-277.765 -6.061)" fill="#a463ff"/>
                    <path id="Path_33" data-name="Path 33" d="M299.106,16.9a14.125,14.125,0,0,1,5.709-11.415c-.079-.152-.155-.3-.241-.45a10.123,10.123,0,0,0-18.895,5.089A10.077,10.077,0,0,0,295.8,20.247a10.138,10.138,0,0,0,3.556-.63A14.8,14.8,0,0,1,299.106,16.9ZM297.7,13.331a3.718,3.718,0,0,1-3.736,0,3.759,3.759,0,0,1-1.368-1.352,3.571,3.571,0,0,1-.5-1.856,3.679,3.679,0,0,1,.5-1.868,3.811,3.811,0,0,1,1.368-1.381,3.639,3.639,0,0,1,3.736,0,3.8,3.8,0,0,1,1.365,1.381,3.651,3.651,0,0,1,.5,1.868,3.581,3.581,0,0,1-.5,1.856A3.726,3.726,0,0,1,297.7,13.331Z" transform="translate(-195.894 0)" fill="#ffc522"/>
                  </g>
                </svg>
            </a> -->
            <?php


               $menu_name = 'main-menu'; //menu slug
               $locations = get_nav_menu_locations();
               $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
               $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );

               $logged_in_menu_name = 'logged-in-menu'; //menu slug
               $logged_in_locations = get_nav_menu_locations();
               $logged_in_menu = wp_get_nav_menu_object( $logged_in_locations[ $logged_in_menu_name ] );
               $logged_in_menuitems = wp_get_nav_menu_items( $logged_in_menu->term_id, array( 'order' => 'DESC' ) );
               //print_r($menuitems);
               global $post;
                $post_slug = $post->post_name;
               echo "<ul>";
               foreach ($menuitems as $menu) {
                $current = ( $_SERVER['REQUEST_URI'] == parse_url( $menu->url, PHP_URL_PATH ) ) ? 'active' : '';
                  if($menu->title == 'Menu'){
                  $home= 'Home';
                  $home_url= get_bloginfo('url');
                    echo '<li class="' . $current . ' "><a href ="'.$home_url.'" class="link">' . $home . '</a></li>';
                  }
                  else{
                  if($post_slug != 'login-register'){
                    if(is_user_logged_in()){
                      foreach ($logged_in_menuitems as $loggedin_menu) {
                      $current_logged_in = ( $_SERVER['REQUEST_URI'] == parse_url( $loggedin_menu->url, PHP_URL_PATH ) ) ? 'active' : '';
                        echo '<li class="my-course ' . $current_logged_in . '"><a href="' . $loggedin_menu->url . '" class="link">'.$loggedin_menu->title.'</a></li>';
                    }
                      }
                    else{
                      echo '<li class="' . $current . '"><a href="' . $menu->url . '" class="link">'.$menu->title.'</a></li>';
                    }
                  }
               }}
              echo "</ul></nav>";

            ?>
                <!-- <ul>
                    <li class="active"><a href="#!" class="link">Home</a></li>
                    <li><a href="#!" class="link">Courses</a></li>
                    <li><a href="#!" class="link">ePaper</a></li>
                </ul> -->
            </div>

            <div class="search">
                <form>
                <input type="search" name="" placeholder="Search">
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26.414" height="26.418" viewBox="0 0 26.414 26.418"> <g id="Group_20730" data-name="Group 20730" transform="translate(-1037 -30)"> <g id="Ellipse_31" data-name="Ellipse 31" transform="translate(1037 30)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"> <ellipse cx="11.667" cy="11.669" rx="11.667" ry="11.669" stroke="none"/> <ellipse cx="11.667" cy="11.669" rx="10.667" ry="10.669" fill="none"/> </g> <path id="Path_9" data-name="Path 9" d="M26,26l5.333,5.333" transform="translate(1030.667 23.67)" fill="#fff" stroke="#000" stroke-linecap="round" stroke-width="2"/> </g> </svg>
                </button>
                </form>
            </div>

            <div class="right-side">
                <!-- <a href="#!" class="cart">
                    <span class="total">10</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="25" viewBox="0 0 30 25"><g id="Group_15698" data-name="Group 15698" transform="translate(-970 -26.458)"> <g id="Group_15651" data-name="Group 15651" transform="translate(971 27.458)"> <path id="Path_30160" data-name="Path 30160" d="M-11952.5,9580.5h3.877l5.87,17.555h13.838" transform="translate(11952.5 -9580.5)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/> <path id="Path_30161" data-name="Path 30161" d="M-11898.5,9610.5h22.9l-4.449,10.313h-14.859" transform="translate(11903.602 -9607.27)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/> <g id="Ellipse_440" data-name="Ellipse 440" transform="translate(8.975 20.39)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"> <circle cx="1.805" cy="1.805" r="1.805" stroke="none"/> <circle cx="1.805" cy="1.805" r="0.805" fill="none"/> </g> <g id="Ellipse_441" data-name="Ellipse 441" transform="translate(19.747 20.39)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"> <circle cx="1.805" cy="1.805" r="1.805" stroke="none"/> <circle cx="1.805" cy="1.805" r="0.805" fill="none"/> </g> </g> </g>
                    </svg>
                </a> -->
                <?php do_action('woocommerce_add_to_cart_fragments'); ?>
                <!-- <a class="login" href="#!">Login</a> -->
                
                <ul class="dropdown profile">

                    <?php
                    // if(function_exists('is_wplms_4_0') && is_wplms_4_0()){
                    //     echo '<li class="vibebp-login">'.apply_filters('wplms_login_trigger','<a class="dropdown-toggle" href="'.get_bloginfo('url').'/login-register" rel="nofollow" >
                    //       <span class="icon"><img src="'.get_bloginfo('template_url').'/assets/images/login-profile.svg" alt="Login Profile" title="Login Profile"/></span>
                    //       <span class="text">'.__('Login','vibe').'</span>
                    //       </a>').'</li>';
                    //     do_action('wp_head_wplms_login');
                    // }else{
                    if(function_exists('is_wplms_4_0') && is_wplms_4_0()){
                        echo '<li class="vibebp-login">'.apply_filters('wplms_login_trigger','<a class="login" href="'.get_bloginfo('url').'/login-register">'.__('Login','vibe').'</a>').'</li>';
                        do_action('wp_head_wplms_login');
                    }else{


                      if ( !is_page_template('event-dashboard.php')){
                    if ( function_exists('bp_loggedin_user_link') && is_user_logged_in() ) :
                        ?>
                            <li><a href="<?php bp_loggedin_user_link(); ?>" class="smallimg vbplogin dropdown-toggle"><?php $n=vbp_current_user_notification_count(); echo ((isset($n) && $n)?'<em></em>':''); bp_loggedin_user_avatar( 'type=full' ); ?><?php bp_loggedin_user_fullname(); ?></a></li>
                            <?php do_action('wplms_header_top_login'); ?>

                    <?php
                    else :
                        ?>
                            <li>
                              
                              <a href="<?php get_bloginfo('url')?>/login-register" class="vbplogin dropdown-toggle"><?php _e('Login','vibe'); ?></a>
                            </li>
                            <li><?php
                                $enable_signup = apply_filters('wplms_enable_signup',0);
                                if ( $enable_signup ) :
                                $registration_link = apply_filters('wplms_buddypress_registration_link',site_url( BP_REGISTER_SLUG . '/' ));
                                printf( __( '<a href="%s" class="vbpregister dropdown-toggle" title="'.__('Create an account','vibe').'">'.__('Sign Up','vibe').'</a> ', 'vibe' ), $registration_link );
                            endif; ?>
                            </li>
                    <?php
                    endif;
                }}
                ?>
                </ul>
            </div>
        </div>
    </header>
    <div class="navigation-wrapper">
        <button class="home-button" type="button"></button>
        <ul class="top">
        <?php
            $current_user = wp_get_current_user();
            $username = $current_user->user_nicename;    
            $args = array(
                'theme_location'  => 'sidebar-menu',
            );

            wp_nav_menu( $args );
        ?>
            <!-- <li><a href="#!">Home</a></li>
            <li><a href="#!">Explore Courses</a></li>
            <li><a href="#!">Editor's Desk</a></li>
            <li><a href="#!">About HT School</a></li>
            <li><a href="#!">Career Mate</a></li>
            <li><a href="#!">Code A thon</a></li>
            <li><a href="#!">Scholarship</a></li>
            <li><a href="#!">Olympiad</a></li> -->
        </ul>
        
        <ul class="bottom">
            <?php
               $menu_name = 'footer-menu'; //menu slug
               $locations = get_nav_menu_locations();
               $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
               $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
               //print_r($menuitems);
               foreach ($menuitems as $menu) {
                   echo '<li><a href="' . $menu->url . '">' . $menu->title . '</a></li>';
               }
            ?>
        </ul>
           <!--  <li><a href="#!">Contact Us</a></li>
            <li><a href="#!">Cookie Policy</a></li>
            <li><a href="#!">Privacy Policy</a></li>
            <li><a href="#!">Terms of Use</a></li>
            <li><a href="#!">Product Terms and Conditions</a></li>
        </ul> -->
    </div>
        <div id="close-navigation-header">



