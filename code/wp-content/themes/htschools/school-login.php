<?php

$_SESSION['previousPageUrl']="";
if(isset($_SERVER['HTTP_REFERER'])){
  $_SESSION['previousPageUrl']=$_SERVER['HTTP_REFERER'];
}

/**
 * Template Name: School Login  (Site Lock)
 */
global $bp;

 global $current_user;
get_currentuserinfo();
 $email=$current_user->user_email; 
 $users = $wpdb->get_results("SELECT user_nicename FROM ht_users WHERE user_email='" .$email . "'");
  $username = $users[0]->user_nicename;

if(is_user_logged_in()){
    wp_redirect($parent = get_site_url().'/members-directory/'.$username.'/school_dashboard/');
    exit();
}

get_header(vibe_get_header());

if ( have_posts() ) : while ( have_posts() ) : the_post();

$id = vibe_get_bp_page_id('register');
if(empty($id)){
    $id = get_the_ID();
}
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full' );

$userIdentifier = isset($_COOKIE['PHPSESSID']) ? $_COOKIE['PHPSESSID'] : "";
?>
<!-- <style>header,footer,#headertop,#footerbottom{display:none;}</style> -->
<style type="text/css">
    .otp-ontent #otp input {
        margin-top: 10px;
    }
    input[type=number], input[type=search], input[type=time], input[type=text], input[type=password], input[type=email], input[type=url], input[type=image], textarea {
      border: 1px solid rgba(0, 0, 0, .08);
      /* padding: 5px; */
    }
    .login-box-1{
      width: 100%;
      margin: 0px auto;
      background: #F8F8F8;
    }
    .social_signin {
       left: unset;
       text-align: center;
      }


    .abcRioButton.abcRioButtonLightBlue {
        /*! width: 100% !important; */
        margin: 0 auto;
        display: inline-block;
        border-radius: 4px;
      }

      .abcRioButtonLightBlue {
        background-color: #fff;
        color: #757575;
        margin: 0 auto;
      }
</style>
<main id="main">
  <section class="login">
    <div class="innerheader-space"></div>
    <div class="container">


      <div class="row">
        <div class="login-box">
          <div class="loginContent_left">
            <div class="login-left">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/login-back.jpg" class="img-fluid"/>
            </div>
          </div>



          <div class="loginContent_right">

            <div class="login-right" id="login-step-1">
              <h4> School Login</h4>
              <form method="POST" id="ht_reg_email">
                <input type="hidden" name="action" value="reg_send_otp">
                <input type="hidden" name="prevPageurl" value="<?php echo $_SERVER['HTTP_REFERER']; ?>">
               
                <div class="form-group">
                  <input type="email" name="email" id="email" class="form-control" placeholder="Email ID">
                  <p class="error" style="display: none;" id="ht_otp_error"></p>
                </div>
                <button  id="ht_reg_email_btn" type="button" class="btn submit_btn">
                  Next
                </button>
              </form>
              <div class="form-footer">
                <!-- <a href="#">Already Registered?</a> <a href="#" class="login-link">Login</a> -->
                <p>By logging in, you agree to our <a href="<?php echo get_bloginfo('url').'/terms-of-use'?>">Terms of Service</a> and<a href="<?php echo get_bloginfo('url').'/privacy-policy'?>"> Privacy Policy.</a></p>
              </div>
            </div>

            <div class="login-right otp-ontent" id="login-step-2" style="display: none;">
              <form method="POST" id="otp-verification-form">
                    <input type="hidden" name="action" value="school_reg_verify_otp">
                  <h4>OTP Verification</h4>

                  <div class="content">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/otp-verification.png" class="img-fluid">
                    <p id="email-otp-message"></p>
                  </div>
                  <div id="otp" class="flex justify-center">
                    <input class="text-center form-control to_next email_otp" type="text" name="num_1" maxlength="1" />
                    <input class="text-center form-control to_next email_otp" type="text" name="num_2" maxlength="1" />
                    <input class="text-center form-control to_next email_otp" type="text" name="num_3" maxlength="1" />
                    <input class="text-center form-control to_next email_otp" type="text" name="num_4" maxlength="1" />
                    <input class="text-center form-control to_next email_otp" type="text" name="num_5" maxlength="1" />
                    <input class="text-center form-control to_next email_otp" type="text" name="num_6" maxlength="1" />
                  </div>
                  <p class="error" style="display: none;" id="ht_resend_error"></p>
                  <div class="resend-info">
                    <div class="pull-left">
                      <p>Valid For: <span class="timer" id="reg-otp-timer">10:00</span></p>
                    </div>
                    <div class="pull-right">
                      <a href="javascript:void(0)" class="resend-link" id="resend-otp-link" style="display: none;">Resend OTP</a>
                    </div>
                  </div>
                  <div class="otp_button">
                    <button type="submit" class="btn arrow_btn">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                      </svg>
                    </button>
                    <button type="button" class="btn submit_btn" id="verify-otp-btn">Verify OTP</button>
                  </div>
                </form>
            </div>

            <div class="login-right otp-ontent" id="login-step-3" style="display: none;">
                <h4>Register</h4>
                <div class="content">
                  <p>Please provide all information for <a href="javascript:void(0);" id="reg-email-wrap" style="color: #000;"></a></p>
                </div>
                <form method="POST" id="reg_form">
                    <input type="hidden" name="action" value="reg_new_user">
                    <div class="form-group">
                        <input type="text" class="form-control reg_fields" name="first_name" id="first_name" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control reg_fields" name="last_name" id="last_name" placeholder="Last Name">
                    </div>
                    <div class="form-group from-countrynum">
                        <input type="text" class="form-control reg_fields" name="mobile" id="mobile" placeholder="Mobile Number">
                        <span class="country-code">+91</span>
                    </div>
                    <div class="switch">
                        <input type="radio" class="switch-input user_radio_btn" name="user_gender" value="female" id="gen_female" checked>
                        <label for="gen_female" class="switch-label switch-label-off">
                            <span>Female</span>
                        </label>
                        <input type="radio" class="switch-input admin_radio_btn" name="user_gender" value="male" id="gen_male">
                        <label for="gen_male" class="switch-label switch-label-on">
                            <span>Male</span>
                        </label>
                        <span class="slider2"></span>
                    </div>
                    <p class="error" style="display: none;" id="ht_reg_error"></p>
                    <div class="register_btn">
                        <p>Fill all Information to proceed</p>
                        <button type="button" class="btn submit_btn" id="reg_submit">
                            Next
                        </button>
                    </div>
                </form>

            </div>


            <div class="login-right otp-ontent" id="login-step-4" style="display: none;">
                <form method="POST" id="mobile-otp-verification-form">
                    <input type="hidden" name="action" value="reg_verify_mob_otp">
                    <h4>OTP Verification</h4>

                    <div class="content">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/otp-verification.png" class="img-fluid">
                      <p id="mobile-otp-message"></p>
                    </div>
                    <div id="otp" class="flex justify-center mobile-otp">
                      <input class="text-center form-control to_next mobile_otp" type="text" name="num_1" maxlength="1" />
                      <input class="text-center form-control to_next mobile_otp" type="text" name="num_2" maxlength="1" />
                      <input class="text-center form-control to_next mobile_otp" type="text" name="num_3" maxlength="1" />
                      <input class="text-center form-control to_next mobile_otp" type="text" name="num_4" maxlength="1" />
                      <input class="text-center form-control to_next mobile_otp" type="text" name="num_5" maxlength="1" />
                      <input class="text-center form-control to_next mobile_otp" type="text" name="num_6" maxlength="1" />
                    </div>
                    <p class="error" style="display: none;" id="mobile_resend_error"></p>
                    <div class="resend-info">
                      <div class="pull-left">
                        <p>Valid For: <span class="timer" id="mob-otp-timer">10:00</span></p>
                      </div>
                      <div class="pull-right">
                        <a href="javascript:void(0)" class="resend-link" id="resend-mob-link" style="display: none;">Resend OTP</a>
                      </div>
                    </div>

                    <div class="otp_button">
                      <button type="submit" class="btn arrow_btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                        </svg>
                      </button>
                      <button type="button" class="btn submit_btn" id="verify-mob-otp-btn">Verify OTP</button>
                    </div>

                </form>
            </div>

           <div class="login-box-1 register-box" id="login-step-5" style="display: none;">
              <div class="col-sm-12 col-md-12 mrg pull-left">
                <div class="congrts_section">
                  <p class="congrat_small">congratulations!</p>
                  <p>You are now registered</p>
                </div>
                  <div class="login-right">
                  <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/images/thank-you.svg" class="img-fluid"/> -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="353.201" height="554.382" viewBox="0 0 353.201 554.382">
  <g id="Group_15330" data-name="Group 15330" transform="translate(-91.148 -218.326)">
    <path id="Rectangle_3562" data-name="Rectangle 3562" d="M6.047,0h0a6.047,6.047,0,0,1,6.047,6.047V37.929a6.047,6.047,0,0,1-6.047,6.047h0A6.047,6.047,0,0,1,0,37.929V6.047A6.047,6.047,0,0,1,6.047,0Z" transform="translate(111.689 563.186) rotate(-123.649)" fill="#cc2733"/>
    <rect id="Rectangle_3563" data-name="Rectangle 3563" width="12.094" height="43.979" rx="6.047" transform="matrix(0.728, -0.686, 0.686, 0.728, 405.381, 433.53)" fill="#fbd738"/>
    <rect id="Rectangle_3564" data-name="Rectangle 3564" width="12.094" height="43.979" rx="6.047" transform="matrix(0.909, 0.417, -0.417, 0.909, 167.396, 218.326)" fill="#fbd738"/>
    <path id="Rectangle_3565" data-name="Rectangle 3565" d="M6.046,0h0a6.047,6.047,0,0,1,6.047,6.047V37.932a6.046,6.046,0,0,1-6.046,6.046h0A6.047,6.047,0,0,1,0,37.931V6.046A6.046,6.046,0,0,1,6.046,0Z" transform="translate(432.585 256.642) rotate(96.014)" fill="#5ab8ff"/>
    <rect id="Rectangle_3566" data-name="Rectangle 3566" width="12.094" height="43.978" rx="6.047" transform="translate(386.885 593.462) rotate(-162.046)" fill="#5ab8ff"/>
    <circle id="Ellipse_398" data-name="Ellipse 398" cx="8.526" cy="8.526" r="8.526" transform="translate(91.148 319.139) rotate(-76.239)" fill="#cc2733"/>
    <circle id="Ellipse_399" data-name="Ellipse 399" cx="8.526" cy="8.526" r="8.526" transform="translate(121.492 658.816)" fill="#ffebd0"/>
    <circle id="Ellipse_400" data-name="Ellipse 400" cx="8.526" cy="8.526" r="8.526" transform="translate(303.157 268.91)" fill="#ffebd0"/>
    <g id="Group_15331" data-name="Group 15331" transform="translate(153.473 334.447)">
      <circle id="Ellipse_397" data-name="Ellipse 397" cx="8.526" cy="8.526" r="8.526" transform="translate(200.911 411.651) rotate(-76.659)" fill="#cc2733"/>
      <path id="Path_29818" data-name="Path 29818" d="M300.344,406.928s15.781,86.214,65.419,82.991l-19.352-28.7s20.6,23.974,26.673,24.1c-8.541-12.572-17-25.056-20.244-32.055a152.853,152.853,0,0,1-10.186-26.474C327.388,410.322,312.458,399.714,300.344,406.928Z" transform="translate(-171.076 -385.749)"/>
      <path id="Path_29819" data-name="Path 29819" d="M223,413.748s1.129,87.639-48.2,94.042L188.262,475.9s-15.592,27.493-21.53,28.783c5.958-13.982,11.854-27.862,13.688-35.354a152.907,152.907,0,0,0,4.894-27.941C197.121,422.29,209.726,409,223,413.748Z" transform="translate(-151.702 -386.932)"/>
      <path id="Path_29820" data-name="Path 29820" d="M249.794,843.19l-17.625,1.462,4.721-162.469,27.444-6.339C259.365,718.483,251.553,809.817,249.794,843.19Z" transform="translate(-161.191 -425.078)" fill="#bdc5c6"/>
      <ellipse id="Ellipse_401" data-name="Ellipse 401" cx="31.008" cy="23.712" rx="31.008" ry="23.712" transform="translate(78.742 229.009)" fill="#003054"/>
      <path id="Path_29821" data-name="Path 29821" d="M302.1,846.809l18.1.37L310.144,683.223l-26.228-.514C289.8,725.877,299.624,813.022,302.1,846.809Z" transform="translate(-168.694 -426.074)" fill="#bdc5c6"/>
      <path id="Path_29822" data-name="Path 29822" d="M303.992,542.36h-68.65l2.025,44.793-.205.931,1.866,66.268c28.8,21.6,60.658,9.7,60.658,9.7l3.336-17.287.439-71.379-.119-.081Z" transform="translate(-161.651 -405.722)" fill="#003054"/>
      <path id="Path_29823" data-name="Path 29823" d="M277.781,516.672c-2.495-1.684-9.211-3.17-10.067-2.788-.856-.382-7.572,1.1-10.067,2.788-15.184,10.249-38.623,16.792-38.64,32.385,0,0,.31,11.173,8.289,11.173h80.834c7.979,0,8.289-11.172,8.289-11.172C316.4,533.464,292.965,526.921,277.781,516.672Z" transform="translate(-159.282 -401.583)" fill="#003054"/>
      <path id="Path_29824" data-name="Path 29824" d="M282.226,516.672c-2.495-1.684-9.211-3.17-10.067-2.788-.856-.382-7.572,1.1-10.067,2.788a122.6,122.6,0,0,1-10.651,6.238c-13.548,7.251,55.085,7.3,41.578.077A123.651,123.651,0,0,1,282.226,516.672Z" transform="translate(-163.727 -401.583)" fill="#c9d2d3"/>
      <path id="Path_29825" data-name="Path 29825" d="M282.72,523.217c0,4.246-18.349,4.246-18.349,0V492.433H282.72Z" transform="translate(-165.86 -398.482)" fill="#cb8c7e"/>
      <ellipse id="Ellipse_402" data-name="Ellipse 402" cx="13.101" cy="8.83" rx="13.101" ry="8.83" transform="translate(131.306 87.451) rotate(-87.594)" fill="#cb8c7e"/>
      <ellipse id="Ellipse_403" data-name="Ellipse 403" cx="8.831" cy="13.101" rx="8.831" ry="13.101" transform="translate(56.284 71.152) rotate(-14.807)" fill="#cb8c7e"/>
      <path id="Path_29826" data-name="Path 29826" d="M268.315,499.117h0a36.532,36.532,0,0,1-39.9-32.824l-2.926-30.08a36.533,36.533,0,0,1,32.824-39.9h0a36.533,36.533,0,0,1,39.9,32.825l2.926,30.079A36.532,36.532,0,0,1,268.315,499.117Z" transform="translate(-160.197 -384.519)" fill="#df9987"/>
      <path id="Path_29827" data-name="Path 29827" d="M243.861,467.915c.327,3.191,2.21,5.612,4.207,5.409s3.352-2.957,3.027-6.147-2.209-5.612-4.207-5.409S243.535,464.725,243.861,467.915Z" transform="translate(-162.879 -394.034)" fill="#242d22"/>
      <path id="Path_29828" data-name="Path 29828" d="M287.42,463.679c.326,3.191,2.209,5.612,4.207,5.408s3.353-2.956,3.027-6.147-2.209-5.612-4.207-5.408S287.094,460.489,287.42,463.679Z" transform="translate(-169.195 -393.419)" fill="#242d22"/>
      <path id="Path_29829" data-name="Path 29829" d="M282.3,483.666,258.341,485.7a1.7,1.7,0,0,0-1.466,2.249c1.338,3.858,5.223,11.678,14.567,10.887,9.328-.791,11.95-9.137,12.674-13.176A1.7,1.7,0,0,0,282.3,483.666Z" transform="translate(-164.759 -397.21)" fill="#fff"/>
      <path id="Path_29830" data-name="Path 29830" d="M257.8,517.974l-11.525,6.976,14.52,19.259,10.956-13.724Z" transform="translate(-163.237 -402.185)" fill="#e4eeef"/>
      <path id="Path_29831" data-name="Path 29831" d="M287.171,517.53l13.193,8.037L286.223,543.8l-10.5-13.534Z" transform="translate(-167.506 -402.122)" fill="#e4eeef"/>
      <path id="Path_29832" data-name="Path 29832" d="M287.977,396.841s1.7-19.855,25.925-12.762c16.185,4.738,27.091,39.646,27.091,39.646Z" transform="translate(-169.283 -382.548)"/>
      <path id="Path_29833" data-name="Path 29833" d="M235.186,401.715s-5.489-19.157-27.9-7.527c-14.969,7.769-18.945,44.124-18.945,44.124Z" transform="translate(-154.836 -383.692)"/>
      <path id="Path_29834" data-name="Path 29834" d="M301.082,404.566l-15.132-6.328a4.022,4.022,0,0,1-2.168-5.363l.673-1.487a4.311,4.311,0,0,1,5.559-2.132l15.133,6.329a4.02,4.02,0,0,1,2.167,5.363l-.673,1.488A4.31,4.31,0,0,1,301.082,404.566Z" transform="translate(-168.624 -383.472)" fill="#fbd738"/>
      <path id="Path_29835" data-name="Path 29835" d="M224.733,411.779l13.629-9.126a4.021,4.021,0,0,0,1.094-5.681l-.946-1.329a4.311,4.311,0,0,0-5.865-1.021l-13.629,9.126a4.02,4.02,0,0,0-1.094,5.68l.946,1.33A4.311,4.311,0,0,0,224.733,411.779Z" transform="translate(-159.018 -384.193)" fill="#fbd738"/>
      <path id="Path_29836" data-name="Path 29836" d="M249.811,394.949s-57.758,7.746-20.572,73.971l1.235-2.226c1.925-9.987-4.625-30.607,3.42-50.039C236.939,409.3,240.222,402.033,249.811,394.949Z" transform="translate(-158.956 -384.346)" fill="#1a1a1a"/>
      <path id="Path_29837" data-name="Path 29837" d="M270.487,393.474s58.792-4.366,35.065,67.783l-.443.235C297.667,456.172,309.736,412.069,270.487,393.474Z" transform="translate(-166.747 -384.125)" fill="#1a1a1a"/>
      <path id="Path_29838" data-name="Path 29838" d="M244.532,427.808,251.093,448l7.537-.856,24.985-3.126-.959-13.59,6.192,13.3,7.542-.842c-3.894-41.9-31.178-49.4-31.178-49.4l-12.885,1.253c-24.63,7.975-17.158,56.212-17.158,56.212l10.041-2.5Z" transform="translate(-161.471 -384.133)" fill="#1a1a1a"/>
      <path id="Path_29839" data-name="Path 29839" d="M315.279,745.606c-24.8,5.643-68.782,3.567-93.717-2.047L235.816,640.43l65.208-.606Z" transform="translate(-159.652 -419.855)" fill="#003054"/>
      <rect id="Rectangle_3567" data-name="Rectangle 3567" width="66.421" height="6.369" transform="translate(75.557 218.15)" fill="#e4eeef"/>
      <rect id="Rectangle_3568" data-name="Rectangle 3568" width="20.321" height="13.365" transform="translate(98.001 214.651)" fill="#003054"/>
      <g id="Group_15327" data-name="Group 15327" transform="translate(41.56 413.849)">
        <path id="Path_29840" data-name="Path 29840" d="M246.65,889.783l-48.764.175h0c-.852-7.905,4.195-14.313,11.271-14.313h37.751Z" transform="translate(-197.766 -867.899)" fill="#003054"/>
        <path id="Path_29841" data-name="Path 29841" d="M225.686,877.169l5.693-5.651,17.86.08a1.724,1.724,0,0,1,1.717,1.725l0,3.845Z" transform="translate(-201.811 -867.3)" fill="#003054"/>
        <path id="Path_29842" data-name="Path 29842" d="M211.675,874.4s16.3.834,21.761-7.81l13.989,3.583s.114,12.8-28.548,12.34Z" transform="translate(-199.779 -866.585)" fill="#bdc5c6"/>
        <path id="Path_29843" data-name="Path 29843" d="M220.567,889.783l-22.685.175h0c-.811-7.905,3.989-14.313,10.722-14.313h2.156c5.416,0,9.806,5.418,9.806,12.1Z" transform="translate(-197.766 -867.899)" fill="#094a72"/>
        <path id="Path_29844" data-name="Path 29844" d="M197.761,894.618h48.726l.055-3.063H197.816Z" transform="translate(-197.761 -870.206)" fill="#bdc5c6"/>
        <path id="Path_29845" data-name="Path 29845" d="M226.618,873.48s10.577,3.184,10.8,12.056l4.777.227s-1.478-13.535-11.373-13.989Z" transform="translate(-201.946 -867.337)" fill="#003054"/>
      </g>
      <g id="Group_15328" data-name="Group 15328" transform="translate(131.054 413.849)">
        <path id="Path_29846" data-name="Path 29846" d="M302.7,889.783l48.764.175h0c.852-7.905-4.194-14.313-11.271-14.313H302.436Z" transform="translate(-302.434 -867.899)" fill="#003054"/>
        <path id="Path_29847" data-name="Path 29847" d="M327.7,877.169l-5.694-5.651-17.859.08a1.724,1.724,0,0,0-1.718,1.725l0,3.845Z" transform="translate(-302.433 -867.3)" fill="#003054"/>
        <path id="Path_29848" data-name="Path 29848" d="M339.937,874.4s-16.3.834-21.76-7.81l-13.989,3.583s-.114,12.8,28.547,12.34Z" transform="translate(-302.687 -866.585)" fill="#bdc5c6"/>
        <path id="Path_29849" data-name="Path 29849" d="M333.246,889.783l22.685.175h0c.811-7.905-3.989-14.313-10.722-14.313h-2.156c-5.416,0-9.806,5.418-9.806,12.1Z" transform="translate(-306.901 -867.899)" fill="#094a72"/>
        <path id="Path_29850" data-name="Path 29850" d="M351.641,894.618H302.915l-.055-3.063h48.726Z" transform="translate(-302.495 -870.206)" fill="#bdc5c6"/>
        <path id="Path_29851" data-name="Path 29851" d="M328.414,873.48s-10.577,3.184-10.8,12.056l-4.777.227s1.478-13.535,11.374-13.989Z" transform="translate(-303.941 -867.337)" fill="#003054"/>
      </g>
      <path id="Path_29852" data-name="Path 29852" d="M276.752,474.573s-.657,5.713-5.864,6.219c-4.667.454-7.091-4.643-7.091-4.643a22.1,22.1,0,0,0,6.772.788A18.383,18.383,0,0,0,276.752,474.573Z" transform="translate(-165.777 -395.892)" fill="#cb8c7e"/>
      <path id="Path_29853" data-name="Path 29853" d="M389.975,454.116s-.512,79.861-56.813,89.142l.721-22.64s38.246-.251,41.418-65.893Z" transform="translate(-175.835 -392.926)" fill="#cb8c7e"/>
      <path id="Path_29854" data-name="Path 29854" d="M323.282,562.586a185.2,185.2,0,0,0,32.3-18.845l-11.954-19.972-33.835,16.713a11.561,11.561,0,0,0-5.133,15.707h0A14.29,14.29,0,0,0,323.282,562.586Z" transform="translate(-171.513 -403.026)" fill="#003054"/>
      <path id="Path_29855" data-name="Path 29855" d="M353.822,549.63,342.1,530.709l2.87-1.693,11.268,19Z" transform="translate(-177.131 -403.787)" fill="#e4eeef"/>
      <path id="Path_29856" data-name="Path 29856" d="M379.524,460.769,369.4,448.75,368.368,431c0-3.762,4.746.531,5.07,2.485l1.275,7.684,1.1-8.926.065-.724a3.773,3.773,0,0,1,4.179-3.382l13.948.842a5.39,5.39,0,0,1,5.081,5.6c-.905,8.629-2.594,24.891-2.5,25.4C396.708,460.663,379.524,460.769,379.524,460.769Z" transform="translate(-180.941 -389.157)" fill="#cb8c7e"/>
      <path id="Path_29857" data-name="Path 29857" d="M153.87,454.116s.512,79.861,56.813,89.142l-.721-22.64s-38.246-.251-41.418-65.893Z" transform="translate(-149.837 -392.926)" fill="#cb8c7e"/>
      <path id="Path_29858" data-name="Path 29858" d="M221.341,562.586a185.159,185.159,0,0,1-32.3-18.845l11.953-19.972,33.835,16.713a11.561,11.561,0,0,1,5.133,15.707h0A14.29,14.29,0,0,1,221.341,562.586Z" transform="translate(-154.937 -403.026)" fill="#003054"/>
      <path id="Path_29859" data-name="Path 29859" d="M197.262,549.63l11.727-18.921-2.87-1.693-11.268,19Z" transform="translate(-155.779 -403.787)" fill="#e4eeef"/>
      <path id="Path_29860" data-name="Path 29860" d="M168.743,460.769,178.87,448.75,179.9,431c0-3.762-4.746.531-5.07,2.485l-1.275,7.684-1.1-8.926-.065-.724a3.774,3.774,0,0,0-4.179-3.382l-13.948.842a5.39,5.39,0,0,0-5.081,5.6c.905,8.629,2.594,24.891,2.5,25.4C151.559,460.663,168.743,460.769,168.743,460.769Z" transform="translate(-149.153 -389.157)" fill="#cb8c7e"/>
      <g id="Group_15329" data-name="Group 15329" transform="translate(69.792 123.351)">
        <path id="Path_29861" data-name="Path 29861" d="M301.386,526.819l-29.92,40.622,9.879,5.639L313.42,533.72C311.135,530.456,306.8,528.484,301.386,526.819Z" transform="translate(-236.681 -526.819)" fill="#4cb0ed"/>
        <path id="Path_29862" data-name="Path 29862" d="M263.449,578.929v7.8h1.47v-6.581h15.445v6.581h1.6v-7.8Z" transform="translate(-235.518 -534.375)" fill="#95a4a5"/>
        <path id="Path_29863" data-name="Path 29863" d="M240.914,527.711l34.532,45.5H260.9L230.781,533.54C231.91,529.372,238.725,527.711,240.914,527.711Z" transform="translate(-230.781 -526.948)" fill="#5ab8ff"/>
      </g>
      <g id="Group_15332" data-name="Group 15332" transform="translate(39.818 118.378)">
        <circle id="Ellipse_404" data-name="Ellipse 404" cx="38.416" cy="38.416" r="38.416" transform="translate(17.31 114.417) rotate(-67.759)" fill="#fac73b"/>
        <g id="Group_15333" data-name="Group 15333" transform="translate(36.658 63.653)">
          <circle id="Ellipse_405" data-name="Ellipse 405" cx="25.539" cy="25.539" r="25.539" transform="translate(0 11.807) rotate(-13.365)" fill="#fab13b"/>
          <circle id="Ellipse_406" data-name="Ellipse 406" cx="21.961" cy="21.961" r="21.961" transform="translate(8.931 8.79)" fill="#fade3b"/>
        </g>
      </g>
    </g>
  </g>
</svg>


                  </div>
                </div>
              </div>
              <!-- <div class="explore_btn">
                <button type="button" class="btn submit_btn" id="reloadpage" style="display: none;">Explore Courses & Workshops</button>
                </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <input type="hidden" name="preUrl" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" data-preUrl="<?php echo $_SERVER['HTTP_REFERER']; ?>" id="preUrl">
  </section><!-- End login -->
</main>
<?php
endwhile;
endif;
/*if(!empty($_POST['signup_submit'])){ */
?>
<!-- <script>
jQuery(window).load(function(){
   jQuery('#login_page_register_tab').tab('show');
});
</script> -->
<script type="text/javascript">

    jQuery(document).ready(function(){
      document.addEventListener("paste", function(e) {
        // if the target is a text input
        if (e.target.type === "text") {
         var data = e.clipboardData.getData('Text');
         // split clipboard text into single characters
         data = data.split('');
         // find all other text inputs
         [].forEach.call(document.querySelectorAll(".email_otp"), (node, index) => {
            // And set input value to the relative character
            node.value = data[index];
            jQuery("#verify-otp-btn").removeAttr("disabled");
          });
        }
        if (e.target.type === "text") {
         var data = e.clipboardData.getData('Text');
         // split clipboard text into single characters
         data = data.split('');
         // find all other text inputs
         [].forEach.call(document.querySelectorAll(".mobile_otp"), (node, index) => {
            // And set input value to the relative character
            node.value = data[index];
            jQuery("#verify-mob-otp-btn").removeAttr("disabled");
          });
        }
      });
      jQuery(".email_otp").keydown(function(event){
        var key = event.keyCode || event.charCode;
        if((key == 8 || key == 46) && jQuery(this).val() ==''){
          jQuery(this).prev('input').focus();
        }
      })
      jQuery(".mobile_otp").keydown(function(event){
        var key = event.keyCode || event.charCode;
        if((key == 8 || key == 46) && jQuery(this).val() ==''){
          jQuery(this).prev('input').focus();
        }
      })
        jQuery("#verify-otp-btn").prop("disabled", true);
        jQuery("#verify-mob-otp-btn").prop("disabled", true);

        jQuery('#otp').find('input').each(function() {
            jQuery(this).on('keyup', function(e) {
              var parent = jQuery(jQuery(this).parent());
              if (e.keyCode === 8 || e.keyCode === 37) {
                var prev = parent.find('input#' + jQuery(this).data('previous'));
                if (prev.length) {
                  jQuery(prev).select();
                }
              } else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
                var next = parent.find('input#' + jQuery(this).data('next'));
                if (next.length) {
                  jQuery(next).select();
                }
              }
              var counter = 0;
              jQuery('#otp').find('input').each(function() {
                if (jQuery(this).val() == '') {
                  counter++;
                } else {

                }
              });

              if (counter > 0) {
                jQuery('#verify-otp-btn').prop("disabled", true);
                } else {
                  jQuery('#verify-otp-btn').prop("disabled", false);
                }
            });
          });
        jQuery('.mobile-otp').find('input').each(function() {
            jQuery(this).on('keyup', function(e) {
              var parent = jQuery(jQuery(this).parent());
              if (e.keyCode === 8 || e.keyCode === 37) {
                var prev = parent.find('input#' + jQuery(this).data('previous'));
                if (prev.length) {
                  jQuery(prev).select();
                }
              } else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
                var next = parent.find('input#' + jQuery(this).data('next'));
                if (next.length) {
                  jQuery(next).select();
                }
              }
              var counter = 0;
              jQuery('.mobile-otp').find('input').each(function() {
                if (jQuery(this).val() == '') {
                  counter++;
                } else {

                }
              });

              if (counter > 0) {
                jQuery('#verify-mob-otp-btn').prop("disabled", true);
                } else {
                  jQuery('#verify-mob-otp-btn').prop("disabled", false);
                }
            });
          });

        jQuery("#reloadpage").click(function(){
            //window.location.reload();
            let preUrl = jQuery("#preUrl").attr("data-preUrl");
            alert(preUrl);
            window.location.replace(preUrl);
            // var session = sessionStorage.getItem('bp_user');
            // var result = jQuery.parseJSON(session);
            // window.location.href = site_url + '/members-directory/' + result['user_nicename'];
        });
        jQuery("#verify-mob-otp-btn").click(function(){
            jQuery("#verify-mob-otp-btn").html("Please wait...");
            jQuery("#verify-mob-otp-btn").attr("disabled", "disabled");

            jQuery.ajax({
                type : "POST",
                dataType : "json",
                url : "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
                data : jQuery("#mobile-otp-verification-form").serialize() + '&screenWidth=' + window.screen.availWidth + '&screenHeight=' + window.screen.availHeight,
                success: function(response) {
                    jQuery("#verify-mob-otp-btn").html("Verify OTP");
                    jQuery("#verify-mob-otp-btn").removeAttr("disabled");

                    let otpVerificationMoegObj = {
                      "Type"          : "phone number",
                      "Email"         : "",
                      "Phone number"  : response.mobile,
                      "Status"        : response.status == 1 ? "success" : "failure",
                      "Failure reason": response.status == 1 ? "" : response.message,
                    };

                    otpVerificationMoegObj.event = "mo_OTP_verification";
                    dataLayer.push(otpVerificationMoegObj);
                    // Moengage.track_event("OTP_verification", otpVerificationMoegObj);

                    if(response.status == 1){
                        sessionStorage.setItem('bp_user',response.user);
                        console.log("user login success");
                        jQuery("#login-step-4").hide();
                        jQuery("#login-step-5").show();
                        var session = sessionStorage.getItem('bp_user');
                        var result = jQuery.parseJSON(session);
                        var login_url = sessionStorage.getItem('login_url');

                        /*ga('send', 'event', 'Signup', 'successful', result['user_id']);
                        console.log(login_url);*/

                        /*let signUpObj = {
                          "event"          : 'sign_up',
                          "user_identifier": result['ID'],
                          "session_source" : "",
                          "utm_tags"       : "",
                          "timestamp"      : "<?php echo date('c', time()); ?>",
                          "sl_on"          : "<?php echo date('c', time()); ?>",
                          "sl_method"      : "web",
                          "email"          : result['user_email'],
                          "phone_number"   : result['mobile'],
                          "status"         : "success",
                          "failure_reason" : "",
                        };
                        dataLayer.push(signUpObj);*/

                        if(login_url == 1){
                          window.setTimeout(function() {
                            window.location.href = site_url + '/members-directory/' + result['user_nicename'];
                          }, 5000);
                        }
                        else{
                          let preUrl = jQuery("#preUrl").attr("data-preUrl");
                          window.setTimeout(function() {
                            window.location.replace(preUrl);
                          }, 5000);
                        }
                        sessionStorage.setItem('login_url',0);
                        /* if(response.previous_page_url != ''){
                            window.location.replace(response.previous_page_url);
                          }else{
                            jQuery("#reloadpage").show();
                          }*/
                       jQuery("#reloadpage").show();
                    }else{
                        jQuery('#mobile-otp-verification-form').trigger("reset");
                        jQuery("#mobile_resend_error").html(response.message);
                        jQuery("#mobile_resend_error").show();
                        setTimeout(function(){
                            jQuery("#mobile_resend_error").html('');
                            jQuery("#mobile_resend_error").hide();
                        }, 5000);
                    }
                }
            });
        });

        jQuery("#reg_submit").click(function(){
            jQuery('.mobile_otp').val('');
            jQuery("#reg_submit").html("Please wait...");
            jQuery("#reg_submit").attr("disabled", "disabled");

            jQuery.ajax({
                type : "POST",
                dataType : "json",
                url : "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
                data : jQuery("#reg_form").serialize(),
                success: function(response) {
                    jQuery("#reg_submit").html("Next");
                    jQuery("#reg_submit").removeAttr("disabled");
                    jQuery("#verify-mob-otp-btn").prop("disabled", true);
                    if(response.status == 1){
                        jQuery("#mobile-otp-message").html(response.message);
                        jQuery("#login-step-3").hide();
                        jQuery("#login-step-4").show();
                        startTimer2();
                    }else{
                        jQuery("#ht_reg_error").html(response.message);
                        jQuery("#ht_reg_error").show();
                        setTimeout(function(){
                            jQuery("#ht_reg_error").html('');
                            jQuery("#ht_reg_error").hide();
                        }, 5000);
                    }
                }
            });
        });

        jQuery("#ht_reg_email_btn").click(function(e){
            if(jQuery('#email').val() == ''){
              jQuery("#ht_otp_error").html('Please enter Email Id');
              jQuery("#ht_otp_error").show();
              return false;
            }
            else{
              jQuery("#ht_otp_error").html('');
              jQuery("#ht_otp_error").hide();
              jQuery("#ht_reg_email_btn").html("Please wait...");
              jQuery("#ht_reg_email_btn").attr("disabled", "disabled");

              jQuery.ajax({
                  type : "POST",
                  dataType : "json",
                  url : "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
                  data : jQuery("#ht_reg_email").serialize(),
                  success: function(response) {
                      jQuery("#ht_reg_email_btn").html("Next");
                      jQuery("#ht_reg_email_btn").removeAttr("disabled");

                      if(response.status == 1){

                          jQuery("#email-otp-message").html(response.message);
                          jQuery("#login-step-1").hide();
                          jQuery("#login-step-2").show();
                          startTimer();
                      }else{

                          let logInObj = {
                            "event"          : 'log_in',
                            "user_identifier": "<?php echo $userIdentifier; ?>",
                            "session_source" : "",
                            "utm_tags"       : "",
                            "timestamp"      : "<?php echo date('c', time()); ?>",
                            "sl_on"          : "<?php echo date('c', time()); ?>",
                            "sl_method"      : "web",
                            "email"          : jQuery('#email').val(),
                            "phone_number"   : "",
                            "status"         : "failure",
                            "failure_reason" : response.message,
                          };
                          dataLayer.push(logInObj);

                          jQuery("#ht_otp_error").html(response.message);
                          jQuery("#ht_otp_error").show();
                          setTimeout(function(){
                              jQuery("#ht_otp_error").html('');
                              jQuery("#ht_otp_error").hide();
                          }, 5000);
                      }
                  }
              });
            }
        });

        jQuery(".to_next").keyup(function(e){
            if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105)) {
              jQuery(this).next().focus();
            }
        });

        jQuery(".to_next").keydown(function(e){
            // jQuery(this).val('');
            if (e.keyCode === 13) {
              if($("#verify-otp-btn").is(":visible"))     $("#verify-otp-btn").trigger('click');
              if($("#verify-mob-otp-btn").is(":visible")) $("#verify-mob-otp-btn").trigger('click');
              return false;
            }
        });

        jQuery("#email").keydown(function(e){
            if (e.keyCode === 13) {
              $("#ht_reg_email_btn").trigger('click');
              return false;
            }
        });

        jQuery(".reg_fields").keydown(function(e){
            if (e.keyCode === 13) {

              if($("#first_name").val() != "" && $("#last_name").val() != "" && $("#mobile").val() != "") {
                $("#reg_submit").trigger('click');
              }

              return false;
            }
        });

        jQuery("#resend-otp-link").click(function(){
          jQuery.ajax({
                type : "POST",
                dataType : "json",
                url : "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
                data : jQuery("#ht_reg_email").serialize(),
                success: function(response) {
                    if(response.status == 1){
                      $('#otp-verification-form').trigger("reset");
                      var otp_timer = $('#reg-otp-timer').text();
                      if(otp_timer == '0:00'){
                        document.getElementById('reg-otp-timer').innerHTML = "10:00";
                      }
                      jQuery("#resend-otp-link").hide();
                      startTimer();
                    }else{
                        jQuery("#ht_resend_error").html(response.message);
                        jQuery("#ht_resend_error").show();
                        setTimeout(function(){
                            jQuery("#ht_resend_error").html('');
                            jQuery("#ht_resend_error").hide();
                        }, 5000);
                    }
                }
            });
        });

        jQuery("#resend-mob-link").click(function(){
            jQuery.ajax({
                type : "POST",
                dataType : "json",
                url : "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
                data : jQuery("#reg_form").serialize(),
                success: function(response) {
                    if(response.status == 1){
                      $('#mobile-otp-verification-form').trigger("reset");
                      var otp_timer = $('#mob-otp-timer').text();
                      if(otp_timer == '0:00'){
                        document.getElementById('mob-otp-timer').innerHTML = "10:00";
                      }
                        jQuery("#resend-mob-link").hide();
                        startTimer2();
                    }else{
                        jQuery("#mobile_resend_error").html(response.message);
                        jQuery("#mobile_resend_error").show();
                        setTimeout(function(){
                            jQuery("#mobile_resend_error").html('');
                            jQuery("#mobile_resend_error").hide();
                        }, 5000);
                    }
                }
            });
        });

        jQuery("#verify-otp-btn").click(function(){
          jQuery("#verify-otp-btn").html("Please wait...");
            jQuery("#verify-otp-btn").attr("disabled", "disabled");

          jQuery.ajax({
                type : "POST",
                dataType : "json",
                url : "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
                data : jQuery("#otp-verification-form").serialize() + '&screenWidth=' + window.screen.availWidth + '&screenHeight=' + window.screen.availHeight,
                success: function(response) {
                  jQuery("#verify-otp-btn").html("Verify OTP");
                    jQuery("#verify-otp-btn").removeAttr("disabled");
                    let otpVerificationMoegObj = {
                      "Type"          : "email",
                      "Email"         : response.email,
                      "Phone number"  : "",
                      "Status"        : response.status == 1 ? "success" : "failure",
                      "Failure reason": response.status == 1 ? "" : response.message,
                    };

                    otpVerificationMoegObj.event = "mo_OTP_verification";
                    dataLayer.push(otpVerificationMoegObj);
                    // Moengage.track_event("OTP_verification", otpVerificationMoegObj);

                    if(response.status == 1){
                      if(response.is_registered == 1){
                        sessionStorage.setItem('bp_user',response.user);
                        var user = jQuery.parseJSON(response.user);

                        /*ga('send', 'event', 'Login', 'successful', user.ID);*/

                        let logInObj = {
                          "event"          : 'log_in',
                          "user_identifier": user.ID,
                          "session_source" : "",
                          "utm_tags"       : "",
                          "timestamp"      : "<?php echo date('c', time()); ?>",
                          "sl_on"          : "<?php echo date('c', time()); ?>",
                          "sl_method"      : "web",
                        };

                        let logInMoegObj = {
                          "User identifier": user.ID,
                          "Session source" : "",
                          "Timestamp"      : "<?php echo date('c', time()); ?>",
                          "UTM tags"       : "",
                          "Last login on"  : "",
                          "Login type"     : "email",
                        };

                        dataLayer.push(logInObj);
                        logInMoegObj.event = "mo_Logged_In";
                        dataLayer.push(logInMoegObj);
                        // Moengage.track_event("Logged_In", logInMoegObj);

                        jQuery.ajax({
                          type : "POST",
                          dataType : "json",
                          url : "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
                          data : {"action": "user_purchase_details", user_id: user.ID },
                          success: function(response) {
                            console.log(response);
                            let userPurchaseDetailsMoegObj = {
                              "User identifier" : user.ID,
                              "Total Purchase"  : response.total_purchase,
                              "First Purchase"  : response.first_purchase,
                              "Last Purchase"  : response.last_purchase,
                              "Area of Interest"  : response.area_of_interest,
                            }
                            userPurchaseDetailsMoegObj.event = "mo_user_purchase_updated";
                            dataLayer.push({ ecommerce: null }); 
                            dataLayer.push(userPurchaseDetailsMoegObj);

                          }
                        });
                        if(response.previous_page_url != ''){
                          window.location.replace(response.previous_page_url);
                        }else{
                          window.location.reload();
                        }
                      }else{
                            jQuery("#reg-email-wrap").html(response.email);
                            jQuery("#login-step-2").hide();
                            jQuery("#login-step-3").show();
                        }
                    }else{
                        jQuery('#otp-verification-form').trigger("reset");
                        jQuery("#ht_resend_error").html(response.message);
                        jQuery("#ht_resend_error").show();
                        setTimeout(function(){
                            jQuery("#ht_resend_error").html('');
                            jQuery("#ht_resend_error").hide();
                        }, 5000);
                    }
                }
            });
        });

    });


    function startTimer() {
        var presentTime = document.getElementById('reg-otp-timer').innerHTML;
        var timeArray = presentTime.split(/[:]+/);
        var m = timeArray[0];
        var s = checkSecond((timeArray[1] - 1));
        if(m == 0 && s == 0){
          jQuery("#resend-otp-link").show();
          $('.to_next').find('input:text').val('');
          document.getElementById('reg-otp-timer').innerHTML = m + ":" + s;
          return;
        }
        else if(m !=0 && s== 0){
          jQuery("#resend-otp-link").show();
          jQuery('.to_next').find('input:text').val('');
        }
        else if(m < 0){
          document.getElementById('reg-otp-timer').innerHTML = "0:00";
          return;
        }

        if(s == 59){
            m = m - 1;
        }
        document.getElementById('reg-otp-timer').innerHTML = m + ":" + s;
        setTimeout(startTimer, 1000);
    }

    // window.setTimeout(function() {
    //   jQuery("#resend-otp-link").show();
    //   jQuery('.to_next').find('input:text').val('');
    // },20 * 1000)

    function startTimer2() {
        var presentTime = document.getElementById('mob-otp-timer').innerHTML;
        var timeArray = presentTime.split(/[:]+/);
        var m = timeArray[0];
        var s = checkSecond((timeArray[1] - 1));

        if(m == 0 && s == 0){
          jQuery("#resend-mob-link").show();
          jQuery('.to_next').find('input:text').val('');
          document.getElementById('mob-otp-timer').innerHTML = m + ":" + s;
            return;
        }
        else if(m !=0 && s== 0){
          jQuery("#resend-mob-link").show();
          jQuery('.to_next').find('input:text').val('');
        }
        else if(m < 0){
          document.getElementById('mob-otp-timer').innerHTML = "0:00";
          return;
        }

        if(s == 59){
            m = m - 1;
        }
        document.getElementById('mob-otp-timer').innerHTML = m + ":" + s;
        setTimeout(startTimer2, 1000);
    }

    function checkSecond(sec) {
        if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
        if (sec < 0) {sec = "59"};
        return sec;
    }
</script>
<?php
/*}*/
get_footer( vibe_get_footer() );