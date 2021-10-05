<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
    <head>
        <meta charset="utf-8" />
        <!-- utf-8 works for most cases -->
        <meta name="viewport" content="width=device-width" />
        <!-- Forcing initial-scale shouldn't be necessary -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- Use the latest (edge) version of IE rendering engine -->
        <meta name="x-apple-disable-message-reformatting" />
        <!-- Disable auto-scale in iOS 10 Mail entirely -->
        <title></title>
        <!-- The title tag shows in email notifications, like Android 4.4. -->

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" />

        <!-- CSS Reset : BEGIN -->
        <style>
            /* What it does: Remove spaces around the email design added by some email clients. */
            /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
            html,
            body {
                margin: 0 auto !important;
                padding: 0 !important;
                height: 100% !important;
                width: 100% !important;
                background: #f1f1f1;
            }

            /* What it does: Stops email clients resizing small text. */
            * {
                -ms-text-size-adjust: 100%;
                -webkit-text-size-adjust: 100%;
            }

            /* What it does: Centers email on Android 4.4 */
            div[style*="margin: 16px 0"] {
                margin: 0 !important;
            }

            /* What it does: Stops Outlook from adding extra spacing to tables. */
            table,
            td {
                mso-table-lspace: 0pt !important;
                mso-table-rspace: 0pt !important;
            }

            /* What it does: Fixes webkit padding issue. */
            table {
                border-spacing: 0 !important;
                border-collapse: collapse !important;
                table-layout: fixed !important;
                /* margin: 0 auto !important; */
            }

            /* What it does: Uses a better rendering method when resizing images in IE. */
            img {
                -ms-interpolation-mode: bicubic;
            }

            /* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
            a {
                text-decoration: none;
            }

            /* What it does: A work-around for email clients meddling in triggered links. */
            *[x-apple-data-detectors],  /* iOS */
.unstyle-auto-detected-links *,
.aBn {
                border-bottom: 0 !important;
                cursor: default !important;
                color: inherit !important;
                text-decoration: none !important;
                font-size: inherit !important;
                font-family: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
            }

            /* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
            .a6S {
                display: none !important;
                opacity: 0.01 !important;
            }

            /* What it does: Prevents Gmail from changing the text color in conversation threads. */
            .im {
                color: inherit !important;
            }

            /* If the above doesn't work, add a .g-img class to any image in question. */
            img.g-img + div {
                display: none !important;
            }
            .purchase-table {
                width: 100%;
            }
            .purchase-table tr th {
                background-color: #d5ebff;
                font-size: 14px;
                text-align: left;
                color: #000;
                font-weight: 400;
                padding: 16px 30px;
            }
            .purchase-table tr th,
            .purchase-table tr td {
                border: 1px solid #ddd;
               
                color: #000;
            }
            .purchase-table tr td {
                font-weight: bold;
                font-size: 18px;
                padding: 20px 30px;
            }
            /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
            /* Create one of these media queries for each additional viewport size you'd like to fix */

            /* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
            @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
                u ~ div .email-container {
                    min-width: 320px !important;
                }
            }
            /* iPhone 6, 6S, 7, 8, and X */
            @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
                u ~ div .email-container {
                    min-width: 375px !important;
                }
            }
            /* iPhone 6+, 7+, and 8+ */
            @media only screen and (min-device-width: 414px) {
                u ~ div .email-container {
                    min-width: 414px !important;
                }
            }
        </style>

        <!-- CSS Reset : END -->

        <!-- Progressive Enhancements : BEGIN -->
        <style>
            .primary {
                background: #30e3ca;
            }
            .bg_white {
                background: #ffffff;
            }
            .bg_light {
                background: #fafafa;
            }
            .bg_black {
                background: #000000;
            }
            .bg_dark {
                background: rgba(0, 0, 0, 0.8);
            }
            .email-section {
                padding: 2.5em;
            }

            /*BUTTON*/
            .btn {
                padding: 10px 15px;
                display: inline-block;
            }
            .btn.btn-primary {
                border-radius: 5px;
                background: #30e3ca;
                color: #ffffff;
            }
            .btn.btn-white {
                border-radius: 5px;
                background: #ffffff;
                color: #000000;
            }
            .btn.btn-white-outline {
                border-radius: 5px;
                background: transparent;
                border: 1px solid #fff;
                color: #fff;
            }
            .btn.btn-black-outline {
                border-radius: 0px;
                background: transparent;
                border: 2px solid #000;
                color: #000;
                font-weight: 700;
            }

            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                font-family: "Lato", sans-serif;
                color: #000000;
                margin-top: 0;
                font-weight: 400;
            }

            body {
                font-family: "Lato", sans-serif;
                font-weight: 400;
                font-size: 15px;
                line-height: 1.8;
                color: rgba(0, 0, 0, 0.4);
            }

            a {
                color: #30e3ca;
            }

            table {
            }
            /*LOGO*/

            .logo h1 {
                margin: 0;
            }
            .logo h1 a {
                color: #30e3ca;
                font-size: 24px;
                font-weight: 700;
                font-family: "Lato", sans-serif;
            }
            .img-wrap{width: 50%;text-align: center;}
            @media only screen and (max-width: 768px) {
                /* For mobile phones: */
                .img-wrap{width:100%;}
                
            }
        </style>
    </head>

    <body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">
        <center style="width: 100%; background-color: #f1f1f1;">
            <div style="display: none; font-size: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
                &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
            </div>
            <div style="max-width: 650px; margin: 0 auto; border: 2px solid #ddd; border-bottom: 0;" class="email-container">
                <!-- BEGIN BODY -->
                <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
                    <tr>
                        <td valign="top" class="bg_white" style="padding: 30px 2.5em 0 2.5em;">
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td class="logo" style="text-align: center;">
                                        <h1>
                                            <a href="#" style="display: block; margin-bottom: 20px;"><img src="assets/img/Header-logo-big_Web.png" style="width: 183px; height: 49px;" /></a>
                                        </h1>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- end tr -->
                    <tr>
                        <td valign="middle" class="hero bg_white" style="padding: 0 0 35px 0;">
                            <img src="assets/img/purchase-successful.png" alt="" style="width: 100%; max-width: 523px; height: auto; margin: auto; display: block;" />
                        </td>
                    </tr>
                    <!-- end tr -->
                    <tr>
                        <td valign="middle" class="hero bg_white" style="padding: 0em 0 50px 0;">
                            <table>
                                <tr>
                                    <td>
                                        <div class="text" style="padding: 0 40px;">
                                            <p style="font-family: Arial; font-size: 18px; margin-top: 0; color: #000;">Hi Username,</p>
                                            <p style="font-size: 21px; font-weight: bold; color: #000;">Welcome to HT School, India's Learning Playground!</p>
                                            <p style="font-family: Arial; font-size: 18px; margin-top: 0; color: #000; margin-bottom: 0;">
                                                Please use the OTP Congratulations on enrolling for <span style="font-weight: bold;">E-Com Essentials: How to Start a Successful Online Business!</span>
                                            </p>
                                            <p style="font-family: Arial; font-size: 18px; color: #000;">We are glad you've joined us to build tommorow's future!</p>
                                            <table class="purchase-table">
                                                <tr>
                                                    <th style="width: 34%;">Your Payment of INR</th>
                                                    <th>Course Name</th>
                                                </tr>
                                                <tr>
                                                    <td syle="width: 34%;">₹ 25,000 + <span style="font-weight: 400; display: block;">taxes</span></td>
                                                    <td>E-Com Essentials: How to Start a Successful Online Business!</td>
                                                </tr>
                                            </table>
                                            <div style="display: flex; justify-content: space-between; flex-wrap: wrap; margin-bottom: 40px;">
                                                <div class="img-wrap">
                                                    <img src="assets/img/mailer-course.png" />
                                                    <a href="#" style="background-color: #000000; font-size: 16px; text-transform: capitalize; padding: 11px 30px; color: #fff; font-weight: 600; margin-bottom: 20px; display: inline-block;">
                                                        My Courses
                                                    </a>
                                                    <p style="margin-top: 0; color: #000; line-height: 22px;">Click to view your HT School courses/workshops.</p>
                                                </div>
                                                <div class="img-wrap">
                                                    <img src="assets/img/mailer-explorer-course.png" />
                                                    <a href="#" style="background-color: #000000; font-size: 16px; text-transform: capitalize; padding: 11px 30px; color: #fff; font-weight: 600; margin-bottom: 20px; display: inline-block;">
                                                        Explore All Courses
                                                    </a>
                                                    <p style="margin-top: 0; color: #000; line-height: 22px;">Explore All Courses and discover the fun world of learning that awaits you!</p>
                                                </div>
                                            </div>
                                            <p style="font-family: Arial; font-size: 18px; margin-top: 0; margin-bottom: 0px; color: #000;">Happy Learning!</p>
                                            <p style="font-family: Arial; font-size: 18px; margin-top: 0; font-weight: bold; color: #000; margin-bottom: 0;">Team HT School</p>
                                            <p style="font-family: Arial; font-size: 18px; text-align: left; margin-top: 0; margin-bottom: 0;"><a href="#" style="color: #0087ff;">https://ht.fortune4.org/</a></p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- end tr -->
                    <!-- 1 Column Text + Button : END -->
                </table>
                <table style="background-color: #000000;">
                    <tr>
                        <td style="padding: 19px 40px;">
                            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
                                <tr style="display: flex; justify-content: space-between; flex-wrap: wrap;">
                                    <td valign="middle">
                                        <span style="font-family: Arial; font-size: 10px; color: #d5ebff;">Copyright © 2021 HTDSL. All rights reserved.</span>
                                        <span style="display: block;">
                                            <ul style="font-family: Arial; display: flex; list-style-type: none; color: #d5ebff; padding: 0; font-size: 10px;">
                                                <li><a href="#" style="color: #d5ebff; text-decoration: none; margin-right: 17px; display: block; line-height: 13px;">Terms and Conditions</a></li>
                                                <li><a href="#" style="color: #d5ebff; text-decoration: none; margin-right: 17px; display: block; line-height: 13px;">Privacy Policy</a></li>
                                                <li><a href="#" style="color: #d5ebff; text-decoration: none; margin-right: 17px; display: block; line-height: 13px;">Disclaimer</a></li>
                                                <li><a href="#" style="color: #d5ebff; text-decoration: none; margin-right: 17px; display: block; line-height: 13px;">Contact Us</a></li>
                                            </ul>
                                        </span>
                                    </td>
                                    <td valign="middle" style="background-color: #000000;">
                                        <span style="display: block;">
                                            <ul style="display: flex; list-style-type: none; padding: 0;">
                                                <li>
                                                    <a href="#" style="margin-right: 15px;"><img src="assets/img/icon-linkedin.svg" /></a>
                                                </li>
                                                <li>
                                                    <a href="#" style="margin-right: 15px;"><img src="assets/img/icon-twitter.svg" /></a>
                                                </li>
                                                <li>
                                                    <a href="#" style="margin-right: 15px;"><img src="assets/img/icon-facebook.svg" /></a>
                                                </li>
                                                <li>
                                                    <a href="#" style="margin-right: 15px;"><img src="assets/img/icon-instagram.svg" /></a>
                                                </li>
                                            </ul>
                                        </span>
                                    </td>
                                </tr>
                                <!-- end: tr -->
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </center>
    </body>
</html>