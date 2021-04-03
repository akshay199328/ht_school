<?php
/**
 * Template Name: Login Page (Site Lock)
 */
global $bp;

if(is_user_logged_in()){
    wp_redirect(bp_loggedin_user_domain());
    exit();
}

get_header(vibe_get_header());

if ( have_posts() ) : while ( have_posts() ) : the_post();

$id = vibe_get_bp_page_id('register');
if(empty($id)){
    $id = get_the_ID();
}
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full' );
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
      width: 740px;
      margin: 0px auto;
      background: #F8F8F8;
    }
</style>
<main id="main">
  <section class="login">
    <div class="innerheader-space"></div>
    <div class="container">


      <div class="row">
        <div class="login-box">
          <div class="col-sm-12 col-md-6 mrg pull-left">
            <div class="login-left">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/login-back.jpg" class="img-fluid"/>
            </div>
          </div>



          <div class="col-sm-12 col-md-6 mrg pull-right">




            <div class="login-right" id="login-step-1">
              <h4>Login or Register</h4>
              <form method="POST" id="ht_reg_email">
                <input type="hidden" name="action" value="reg_send_otp">
                <input type="hidden" name="prevPageurl" value="<?php echo $_SERVER['HTTP_REFERER']; ?>">
                <?php
                if(class_exists('NextendSocialLogin', false)){
                  echo NextendSocialLogin::renderButtonsWithContainer();
                }
                ?>
                <div class="option_or">
                  <span>OR</span>
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control" placeholder="Enter email">
                  <p class="error" style="display: none;" id="ht_otp_error"></p>
                </div>
                <button  id="ht_reg_email_btn" type="button" class="btn submit_btn">
                  Next
                </button>
              </form>
              <div class="form-footer">
                <a href="#">Already Registered?</a> <a href="#" class="login-link">Login</a>
                <p>By logging in, you agree to our Terms of Service and Privacy Policy</p>
              </div>
            </div>

            <div class="login-right otp-ontent" id="login-step-2" style="display: none;">
              <form id="otp-verification-form">
                    <input type="hidden" name="action" value="reg_verify_otp">
                  <h4>OTP Verification</h4>
                  
                  <div class="content">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/otp-verification.png" class="img-fluid">
                    <p id="email-otp-message"></p>
                  </div>
                  <div id="otp" class="flex justify-center">
                    <input class="text-center form-control to_next" type="text" name="num_1" maxlength="1" />
                    <input class="text-center form-control to_next" type="text" name="num_2" maxlength="1" />
                    <input class="text-center form-control to_next" type="text" name="num_3" maxlength="1" />
                    <input class="text-center form-control to_next" type="text" name="num_4" maxlength="1" />
                    <input class="text-center form-control to_next" type="text" name="num_5" maxlength="1" />
                    <input class="text-center form-control to_next" type="text" name="num_6" maxlength="1" />
                  </div>
                  <p class="error" style="display: none;" id="ht_resend_error"></p>
                  <div class="resend-info">
                    <div class="pull-left">
                      <p>Resend In: <span class="timer" id="reg-otp-timer">00:30</span></p>
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
                  
                  <!-- <div class="form-footer">
                    <a href="#">Already Registered?</a> <a href="#" class="login-link">Login</a>
                    <p>By logging in, you agree to our Terms of Service and Privacy Policy</p>
                  </div> -->
                </form>
            </div>

            <div class="login-right otp-ontent" id="login-step-3" style="display: none;">
                <h4>Register</h4>
                <div class="content">
                  <p>Please provide all information for <a href="javascript:void(0);" id="reg-email-wrap" style="color: #000;"></a></p>
                </div>
                <form id="reg_form">
                    <input type="hidden" name="action" value="reg_new_user">
                    <div class="form-group">
                        <input type="text" class="form-control" name="first_name" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                    </div>
                    <div class="form-group from-countrynum">
                        <input type="text" class="form-control" name="mobile" placeholder="Mobile Number">
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
                <form id="mobile-otp-verification-form">
                    <input type="hidden" name="action" value="reg_verify_mob_otp">
                    <h4>OTP Verification</h4>
                    
                    <div class="content">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/otp-verification.png" class="img-fluid">
                      <p id="mobile-otp-message"></p>
                    </div>
                    <div id="otp" class="flex justify-center">
                      <input class="text-center form-control to_next" type="text" name="num_1" maxlength="1" />
                      <input class="text-center form-control to_next" type="text" name="num_2" maxlength="1" />
                      <input class="text-center form-control to_next" type="text" name="num_3" maxlength="1" />
                      <input class="text-center form-control to_next" type="text" name="num_4" maxlength="1" />
                      <input class="text-center form-control to_next" type="text" name="num_5" maxlength="1" />
                      <input class="text-center form-control to_next" type="text" name="num_6" maxlength="1" />
                    </div>
                    <p class="error" style="display: none;" id="mobile_resend_error"></p>
                    <div class="resend-info">
                      <div class="pull-left">
                        <p>Resend In: <span class="timer" id="mob-otp-timer">00:30</span></p>
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

                    
                    <!-- <div class="form-footer">
                      <a href="#">Already Registered?</a> <a href="#" class="login-link">Login</a>
                      <p>By logging in, you agree to our Terms of Service and Privacy Policy</p>
                    </div> -->
                </form>
            </div>


<!--             <div class="login-box register-box" id="login-step-5" style="display: none;">
                <div class="col-sm-12 col-md-6 mrg pull-left">
                    <div class="login-left">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/login-back.jpg" class="img-fluid"/>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mrg pull-right">
                    <div class="login-right message-content">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/thank-you.svg" class="img-fluid"/>
                    </div>
                </div>

                <button type="button" class="btn submit_btn" id="reloadpage">My Account</button>
            </div> -->

            <div class="login-box-1 register-box" id="login-step-5" style="display: none;">
              <div class="col-sm-12 col-md-6 mrg pull-left">
                <div class="congrts_section">
                  <p class="congrat_small">congratulations!</p>
                  <p>You are now registered</p>
                </div>
                  <div class="login-right">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/thank-you.svg" class="img-fluid"/>
                  </div>
                </div>
              </div>
              <div class="explore_btn">
                <button type="button" class="btn submit_btn" id="reloadpage" style="display: none;">Explore Courses & Workshops</button>
                </div>
            </div>
            
            



          </div>


        </div>
      </div>      
    </div>
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

        jQuery("#reloadpage").click(function(){
            window.location.reload();
        });
        jQuery("#verify-mob-otp-btn").click(function(){
            jQuery("#verify-mob-otp-btn").html("Please wait...");
            jQuery("#verify-mob-otp-btn").attr("disabled", "disabled");

            jQuery.ajax({
                type : "POST",
                dataType : "json",
                url : "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
                data : jQuery("#mobile-otp-verification-form").serialize(),
                success: function(response) {
                    jQuery("#verify-mob-otp-btn").html("Verify OTP");
                    jQuery("#verify-mob-otp-btn").removeAttr("disabled");

                    if(response.status == 1){
                        sessionStorage.setItem('bp_user',response.user);
                        jQuery("#login-step-4").hide();
                        jQuery("#login-step-5").show();
                        jQuery("#reloadpage").show();
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

        jQuery("#reg_submit").click(function(){
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

                    if(response.status == 1){
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
                        jQuery("#ht_otp_error").html(response.message);
                        jQuery("#ht_otp_error").show();
                        setTimeout(function(){
                            jQuery("#ht_otp_error").html('');
                            jQuery("#ht_otp_error").hide();
                        }, 5000);
                    }
                }
            });               
        });

        jQuery(".to_next").keyup(function(){
            jQuery(this).next().focus();
        });

        jQuery(".to_next").keydown(function(){
            jQuery(this).val('');
        });

        jQuery("#resend-otp-link").click(function(){
          jQuery.ajax({
                type : "POST",
                dataType : "json",
                url : "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
                data : jQuery("#ht_reg_email").serialize(),
                success: function(response) {
                    if(response.status == 1){
                      document.getElementById('reg-otp-timer').innerHTML = "00:30";
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
                        document.getElementById('mob-otp-timer').innerHTML = "00:30";
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
                data : jQuery("#otp-verification-form").serialize(),
                success: function(response) {
                  jQuery("#verify-otp-btn").html("Verify OTP");
                    jQuery("#verify-otp-btn").removeAttr("disabled");

                    if(response.status == 1){
                      if(response.is_registered == 1){
                        sessionStorage.setItem('bp_user',response.user);
                        
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
            return;
        }

        if(s == 59){
            m = m - 1;
        }
        document.getElementById('reg-otp-timer').innerHTML = m + ":" + s;
        setTimeout(startTimer, 1000);
    }

    function startTimer2() {
        var presentTime = document.getElementById('mob-otp-timer').innerHTML;
        var timeArray = presentTime.split(/[:]+/);
        var m = timeArray[0];
        var s = checkSecond((timeArray[1] - 1));

        if(m == 0 && s == 0){
            jQuery("#resend-mob-link").show();
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