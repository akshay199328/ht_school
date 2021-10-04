<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>HTS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link rel="icon" type="image/png" href="https://htschool.hindustantimes.com/wp-content/themes/htschools/assets/images/favicon.svg">
  <link href="../asset/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor FONT CSS Files -->
  <link rel="stylesheet" href="../asset/css/font.css" type="text/css">
  <!-- Vendor CSS Files -->
  <link href="../asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../asset/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="../asset/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../asset/vendor/aos/aos.css" rel="stylesheet">
  <link href="../asset/vendor/remixicon/remixicon.css" rel="stylesheet">
  <!-- <link href="../asset/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> -->
  <!-- Template Main CSS File -->
  <link href="../asset/css/style.css" rel="stylesheet">
</head>
<body>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
<div class="container container-xl d-flex align-items-center justify-content-between">
  <div class="col-sm-1 col-lg-4 mrg left-menu">
      <a href="{{ route('auth.login') }}">
        <span>Home</span>
      </a>
  </div>
  <div id="" class="middle-menu col-sm-4 col-lg-4">
    <i class="bi bi-list mobile-nav-toggle"></i>
    <a href="{{ route('auth.login') }}" class="logo d-flex align-items-center">
        <img src="../asset/img/logo.png" alt="">
    </a>
  </div>
  <div class="col-sm-7 col-lg-4 mrg right-menu">
  </div>
</div>
</header><!-- End Header -->
<main id="main">
  <section class="login">
    <div class="innerheader-space"></div>
    <div class="container">
        <div class="row">
            <div class="login-box">
                <div class="col-sm-12 col-md-6 mrg pull-left">
                    <div class="login-left">
                        <img src="../asset/img/login-back.jpg" class="img-fluid"/>
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
    </div>
  </section>
</main>
<!-- ======= Footer ======= -->
{{-- @include('layouts.footer') --}}
<!-- Vendor JS Files -->
<script src="../asset/js/jquery.min.js"></script>
<script src="../asset/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../asset/vendor/aos/aos.js"></script>
<script src="../asset/vendor/swiper/swiper-bundle.min.js"></script>
<script src="../asset/vendor/glightbox/js/glightbox.min.js"></script>
<script src="../asset/js/owl.carousel.min.js"></script>
<!-- Template Main JS File -->
<script src="../asset/js/main.js"></script>
<script src="../asset/js/custom.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function(){

  document.addEventListener("paste", function(e) {
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
  });

  jQuery(".email_otp").keydown(function(event){
         var key = event.keyCode || event.charCode;
         if((key == 8 || key == 46) && jQuery(this).val() ==''){
           jQuery(this).prev('input').focus();
         }
      })

  jQuery("#verify-otp-btn").prop("disabled", true);

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

  jQuery("#ht_submit_email_btn").click(function(e){
      var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
      if(jQuery('#email').val() == ''){
        jQuery("#ht_otp_error").html('Please enter Email Id');
        jQuery("#ht_otp_error").show();
        return false;
      }
      else if(!emailReg.test(jQuery('#email').val())) 
      {    
          jQuery("#ht_otp_error").html('Invalid email address entered.');
          jQuery("#ht_otp_error").show();
          return false;
      }
      else{
        jQuery("#ht_otp_error").html('');
        jQuery("#ht_otp_error").hide();
        jQuery("#ht_submit_email_btn").html("Please wait...");
        jQuery("#ht_submit_email_btn").attr("disabled", "disabled");

        jQuery.ajax({
            type : "POST",
            dataType : "json",
            url: '{{route('postLogin')}}',//this is only changes
            data : jQuery("#ht_submit_email").serialize(),
            success: function(response) {
              console.log(response);
                jQuery("#ht_submit_email_btn").html("Next");
                jQuery("#ht_submit_email_btn").removeAttr("disabled");
                // console.log(response.resp);
                if(response.resp == 1){
                  jQuery("#email-otp-message").html(response.message);
                  jQuery("#login-step-1").hide();
                  jQuery("#login-step-2").show();
                  startTimer();
                  jQuery("#show_email").val(response.email);
                  jQuery("#show_otp_id").val(response.otp_id);
                }
                else if(response.resp == 2)
                {
                  jQuery("#ht_otp_error").html('Invalid email address entered.');
                  jQuery("#ht_otp_error").show();  
                }
                else{
                    jQuery("#ht_otp_error").html(response.message);
                    jQuery("#ht_otp_error").show();
                    setTimeout(function(){
                        jQuery("#ht_otp_error").html('');
                        jQuery("#ht_otp_error").hide();
                    }, 5000);
                    window.location.href = "";
                }
            }
        });
      }
    });
  });

  jQuery(".to_next").keyup(function(e){
      if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105)) {
        jQuery(this).next().focus();
      }
  });

  jQuery(".to_next").keydown(function(e){
      if (e.keyCode === 13) {
        if($("#verify-otp-btn").is(":visible"))     
          $("#verify-otp-btn").trigger('click');
        return false;
      }
  });

  jQuery("#email").keydown(function(e){
      if (e.keyCode === 13) {
        $("#ht_submit_email_btn").trigger('click');
        return false;
      }
  });

  jQuery("#resend-otp-link").click(function(){
    $('#show_otp_status').show();
    jQuery("#show_otp_status").val(0);
    jQuery.ajax({
          type : "POST",
          dataType : "json",
          url: '{{route('postLogin')}}',
          data : jQuery("#ht_submit_email").serialize(),
          success: function(response) {
              if(response.resp == 1){
                $('#otp-verification-form').trigger("reset");
                var otp_timer = $('#reg-otp-timer').text();
                if(otp_timer == '0:00'){
                  document.getElementById('reg-otp-timer').innerHTML = "01:00";
                }
                jQuery("#resend-otp-link").hide();
                jQuery("#show_email").val(response.email);
                jQuery("#show_otp_id").val(response.otp_id);
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

  jQuery("#verify-otp-btn").click(function(){
      var otp_timer = $('#reg-otp-timer').text();
      if(otp_timer != '0:00')
      {
        jQuery("#verify-otp-btn").html("Please wait...");
          jQuery("#verify-otp-btn").attr("disabled", "disabled");
        jQuery.ajax({
             type : "POST",
                dataType : "json",
                url: '{{route('postVerify')}}',
                data : jQuery("#otp-verification-form").serialize() + '&screenWidth=' + window.screen.availWidth + '&screenHeight=' + window.screen.availHeight,
                success: function(response) {
                  jQuery("#verify-otp-btn").html("Verify OTP");
                  jQuery("#verify-otp-btn").removeAttr("disabled");
                  if(response.resp == 1)
                  {
                    window.location.href = '{{url("dashboard")}}';
                  }
                  else if(response.resp == 2)
                  {
                    jQuery('#otp-verification-form').trigger("reset");
                    jQuery("#ht_resend_error").html('Invalid OTP entered.');
                    jQuery("#ht_resend_error").show();
                    setTimeout(function(){
                        jQuery("#ht_resend_error").html('');
                        jQuery("#ht_resend_error").hide();
                    }, 5000);
                  }
              }
            });
      }
      else
      {
        $('#show_otp_status').show();
        jQuery("#show_otp_status").val(1);

        jQuery("#verify-otp-btn").html("Verify OTP");
        jQuery("#verify-otp-btn").removeAttr("disabled");

        jQuery.ajax({
             type : "POST",
                dataType : "json",
                url: '{{route('postVerify')}}',
                data : jQuery("#otp-verification-form").serialize() + '&screenWidth=' + window.screen.availWidth + '&screenHeight=' + window.screen.availHeight,
                success: function(response) {
                  jQuery("#verify-otp-btn").removeAttr("disabled");
                  if(response.resp == 3)
                  {
                      jQuery('#otp-verification-form').trigger("reset");
                      jQuery("#ht_resend_error").html('OTP Expired.Please Click on Resend');
                      jQuery("#ht_resend_error").show();
                      setTimeout(function(){
                          jQuery("#ht_resend_error").html('');
                          jQuery("#ht_resend_error").hide();
                      }, 5000);
                  }
              }
            });
      }
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

  function check_timer() {
    alert($('#reg-otp-timer').val());
  }

  function checkSecond(sec) {
      if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
      if (sec < 0) {sec = "59"};
      return sec;
  }

  jQuery("#admin_submit_btn").click(function()
  {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

    if(jQuery('#email').val() == ''){
      jQuery("#admin_email_error").html('Please enter Email Id');
      jQuery("#admin_email_error").show();
      setTimeout(function(){
          jQuery("#admin_email_error").html('');
          jQuery("#admin_email_error").hide();
      }, 2000);
      return false;
    }
    else if(!emailReg.test(jQuery('#email').val())) 
    {    
        jQuery("#admin_email_error").html('Invalid email address entered.');
        jQuery("#admin_email_error").show();
        setTimeout(function(){
            jQuery("#admin_email_error").html('');
            jQuery("#admin_email_error").hide();
        }, 2000);
        return false;
    }
    else if(jQuery('#password_admin').val() == ''){
      jQuery("#admin_password_error").html('Please enter Password');
      jQuery("#admin_password_error").show();
      setTimeout(function(){
          jQuery("#admin_password_error").html('');
          jQuery("#admin_password_error").hide();
      }, 2000);
      return false;
    }
    else
    {
      jQuery("#admin_submit_btn").html("Please wait...");
        jQuery("#admin_submit_btn").attr("disabled", "disabled");
        jQuery.ajax({
             type : "POST",
                dataType : "json",
                url: '{{route('adminLogin')}}',
                data : jQuery("#admin_submit_email").serialize() + '&screenWidth=' + window.screen.availWidth + '&screenHeight=' + window.screen.availHeight,
                success: function(response) {
                  jQuery("#admin_submit_btn").html("Sign in");
                  jQuery("#admin_submit_btn").removeAttr("disabled");
                  console.log(response.resp);
                  if(response.resp == 1)
                  {
                    window.location.href = '{{url("admin-dashboard")}}'; 
                  }
                  else if(response.resp == 2)
                  {
                    jQuery("#admin_errors_invalid").show();
                    jQuery("#admin_errors_invalid").html('Invalid Password');
                    setTimeout(function(){
                        jQuery("#admin_errors_invalid").html('');
                        jQuery("#admin_errors_invalid").hide();
                    }, 2000);
                  }
                  else if (response.resp == 3)
                  {     
                    jQuery("#admin_errors_invalid").show();
                    jQuery("#admin_errors_invalid").html('Invalid User Name');
                    setTimeout(function(){
                        jQuery("#admin_errors_invalid").html('');
                        jQuery("#admin_errors_invalid").hide();
                    }, 2000);
                  }
              }
            });
    }
  });
</script>
</body>
</html>