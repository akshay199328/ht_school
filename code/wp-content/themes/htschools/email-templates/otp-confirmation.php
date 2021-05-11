<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>OTP Verification</title>
  <style type="text/css">
  .wrapper{padding:30px}
  .code{padding:6px 10px;}
  .footer{display:flex;justify-content:space-between;}
    @media (max-width:430px){
        .wrapper{padding:30px 20px}
        .code{padding:4px 8px;font-size:16px}
        .footer{flex-direction:column}
    }
  </style>
</head>

<body style="background-color:#ddd;margin:0;font-family:system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Liberation Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">
    <div style="max-width:650px;margin:20px auto;border:2px solid #ccc">
    <div class="wrapper" style="background-color:#FFF;">
        <div style="text-align:center;margin-bottom:30px;">
            <a href="<?php echo get_bloginfo('url')?>"><img src="<?php echo get_bloginfo('template_url')?>/assets/images/Header-logo-big_Web.png"/></a>
            <img src="<?php echo get_bloginfo('template_url')?>/assets/images/logo-news-letter.png" alt="">
            <h1>Verify Your Email</h1>
        </div>
        <div class="content" style="padding:20px;font-size:18px;">
            <p style="margin-bottom:30px;">Hi <a href="mailto:<?php echo $requestEmail;?>" style="color:#017be8;text-decoration:none;"><?php echo $requestEmail;?>,</a></p>
            <p style="margin-bottom:30px;line-height:1.5">Please use the OTP <span class="code" style="background-color:#d5ebff;margin:0 8px;padding:6px 10px;line-height:1;font-weight:500"><?php  echo $newOTP;?></span> to register on HT School.</p>
            <p style="line-height:1.5;">Happy Learning!<br>
            <span style="font-weight:500">Team HT School</span></p>
        </div>
    </div>
    <div class="footer" style="background-color:#000;color:#FFF;padding:30px;font-size:13px;display:flex;justify-content:space-between;">
        <div>
            <p style="color:#d5ebff;margin:0 0 8px 0;">Copyright © 2021 HTDSL. All rights reserved.</p>
            <a href="<?php echo get_bloginfo('url')?>/terms-of-use" style="color:#d5ebff;margin-right:10px;text-decoration:none;">Terms and Conditions</a>
            <a href="<?php echo get_bloginfo('url')?>/privacy-policy" style="color:#d5ebff;margin-right:10px;text-decoration:none;">Privacy Policy</a>
            <a href="#!" style="color:#d5ebff;margin-right:10px;text-decoration:none;">Disclaimer</a>
            <a href="<?php echo get_bloginfo('url')?>/contact-us" style="color:#d5ebff;margin-right:10px;text-decoration:none;">Contact Us</a>
        </div>
        <div style="font-size:20px">
            <a style="color:#FFF;margin-left:8px;text-decoration:none;" href="https://www.linkedin.com/company/htschool">
              <img src="<?php echo get_bloginfo('template_url')?>/assets/images/linkdin.png" />
            </a>
            
            <a style="color:#FFF;margin-left:8px;text-decoration:none;" href="https://twitter.com/htschool1">
              <img src="<?php echo get_bloginfo('template_url')?>/assets/images/twitter.png" />
            </a>
            
            <a style="color:#FFF;margin-left:8px;text-decoration:none;" href="https://www.facebook.com/HTSchool-111960910982690/">
              <img src="<?php echo get_bloginfo('template_url')?>/assets/images/facebook.png" />
            </a>
            
            <a style="color:#FFF;margin-left:8px;text-decoration:none;" href="https://www.instagram.com/htschool/">
              <img src="<?php echo get_bloginfo('template_url')?>/assets/images/instagram.png" />
            </a>
            
        </div>
    </div>
    </div>
</body>
</html>