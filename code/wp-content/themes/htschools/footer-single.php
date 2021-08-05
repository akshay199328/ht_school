<?php
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<!-- <div id="footerbottom" class="footer-top footer">
	<div class="<?php echo vibe_get_container(); ?>">
		<div class="row">
			<div class="col-lg-5 col-md-12 footer-info">
				<a href="index.html" class="logo d-flex align-items-center">
				  <h1>Footer</h1>
				</a>
			</div>
		</div>
	</div>
</div>-- -->
<?php $userIdentifier = ""; $loggedInUserID = get_current_user_id();

if(isset($loggedInUserID) && $loggedInUserID > 0)
{
	$userIdentifier 	= $loggedInUserID;
	$loggedInUserInfo	= get_userdata($loggedInUserID);
	echo '<input type="hidden" id="footer_user_email" value="'.(isset($loggedInUserInfo->data->user_email) ? $loggedInUserInfo->data->user_email : "").'">';
}
else if(isset($_COOKIE['PHPSESSID']))
{
	$userIdentifier = $_COOKIE['PHPSESSID'];
} ?>

<input type="hidden" id="footer_user_identifier" value="<?php echo $userIdentifier; ?>">
<input type="hidden" id="footer_timestamp" value="<?php echo date('c', time()); ?>">
<input type="hidden" id="footer_session_source">
<input type="hidden" id="footer_utm_tags">
<?php //require(''); ?>
<footer id="footer" class="new-footer">
	  <div class="new-footer-copy">
	 <div class="footer-check" style="padding:0px;float: left;">
		  <h1 class="heading"></h1>
	  </div>
		<div class="new-footer-top">
		  <svg viewBox="0 0 168.5 46.323" xmlns="http://www.w3.org/2000/svg">
		  <defs>
		  <clipPath id="a">
		  <path transform="translate(-331.25 -11.36)" d="m354.94 13.465a15.865 15.865 0 0 1 5.733 21.581 15.762 15.762 0 0 1-29.419-7.924 15.805 15.805 0 0 1 23.686-13.657z" data-name="Path 24"/>
		  </clipPath>
		  </defs>
		  <g transform="translate(0)" data-name="Group 15628">
		  <path transform="translate(-65.12 -6.017)" d="M114.279,19.925a19.083,19.083,0,0,0,2.334,1.1,32.713,32.713,0,0,1,4.1,1.962,9.362,9.362,0,0,1,2.953,2.806,7.867,7.867,0,0,1,1.279,4.6,8.639,8.639,0,0,1-5.121,8.13,12.967,12.967,0,0,1-5.613,1.156,15.027,15.027,0,0,1-5.283-1.073,29.678,29.678,0,0,1-5.283-2.6l2.972-7.14a42.423,42.423,0,0,0,4.045,2.187,7.855,7.855,0,0,0,2.972.908,3.142,3.142,0,0,0,1.715-.413,1.3,1.3,0,0,0,.642-1.156q0-.535-.72-.968a19.247,19.247,0,0,0-2.33-1.1,28.1,28.1,0,0,1-4.045-1.94,9.408,9.408,0,0,1-2.908-2.829,7.945,7.945,0,0,1-1.261-4.6,9.206,9.206,0,0,1,1.3-4.889,8.59,8.59,0,0,1,3.7-3.283,12.594,12.594,0,0,1,5.53-1.156,14.721,14.721,0,0,1,5.076.968,23.346,23.346,0,0,1,4.788,2.375l-3.013,6.851a17.952,17.952,0,0,0-3.219-1.692,8.6,8.6,0,0,0-3.219-.7,2.582,2.582,0,0,0-1.527.413,1.294,1.294,0,0,0-.578,1.114C113.559,19.314,113.8,19.636,114.279,19.925Z" fill="#fff" data-name="Path 1"/>
		  <path transform="translate(-103.21 -6.217)" d="M187.661,37.313a15.836,15.836,0,0,1-4.146,1.793,16.844,16.844,0,0,1-4.562.642,15.374,15.374,0,0,1-7.594-1.857,13.219,13.219,0,0,1-5.223-5.241,15.788,15.788,0,0,1-1.876-7.8,15.829,15.829,0,0,1,1.876-7.8,13.2,13.2,0,0,1,5.223-5.241,15.374,15.374,0,0,1,7.594-1.857,17.709,17.709,0,0,1,8.3,2.146l-3.013,7.264a7.5,7.5,0,0,0-3.921-1.114,7.276,7.276,0,0,0-3.407.825,6.52,6.52,0,0,0-2.54,2.33,6.748,6.748,0,0,0,.019,6.934,6.5,6.5,0,0,0,2.536,2.311,7.229,7.229,0,0,0,3.343.807,7.133,7.133,0,0,0,4.375-1.444Z" fill="#fff" data-name="Path 2"/>
		  <g transform="translate(0 2.713)" data-name="Group 2">
		  <circle transform="translate(.78 .461)" cx="16.501" cy="16.501" r="16.501" data-name="Ellipse 1"/>
		  <g fill="#fff" data-name="Group 1">
		  <path transform="translate(0 -7.23)" d="M16.827,7.23h.949a.587.587,0,0,0,.251.038,8.332,8.332,0,0,1,1.3.1A18.132,18.132,0,0,1,24.08,8.588a17.828,17.828,0,0,1,5.429,3.486,15.106,15.106,0,0,1,2.57,3.219,16.781,16.781,0,0,1,2.461,8.085,17.343,17.343,0,0,1-.619,5.673,16.6,16.6,0,0,1-4.675,7.714,17.06,17.06,0,0,1-5.2,3.26,17.56,17.56,0,0,1-5.6,1.276,18.309,18.309,0,0,1-4.506-.263,17.416,17.416,0,0,1-5.106-1.8,16.388,16.388,0,0,1-4.439-3.392A17.238,17.238,0,0,1,.049,25.532a17.571,17.571,0,0,1,.06-3.294,17.276,17.276,0,0,1,1.917-6.1,15.591,15.591,0,0,1,3.737-4.709A17.819,17.819,0,0,1,15.807,7.305,7.782,7.782,0,0,0,16.827,7.23ZM9.785,23.153v6.465c0,.54,0,.469-.465.476a4.311,4.311,0,0,0-1.486.128c-.285.105-.578.18-.867.27s-.555.169-.833.251c-.049.015-.109.03-.139-.03s.008-.09.038-.124.079-.09.12-.131c.206-.233.461-.413.672-.638.345-.364.675-.739,1.006-1.114A2.791,2.791,0,0,0,8.6,26.815q-.006-5.093,0-10.183c0-.24-.068-.3-.308-.3a1.727,1.727,0,0,0-.2.023,6.99,6.99,0,0,1-1.456.064,11.644,11.644,0,0,0-1.655-.116A2,2,0,0,0,3.2,19.278a.177.177,0,0,0,.18.124c.109-.008.109-.09.12-.173a.84.84,0,0,1,.874-.81c.461-.034.923-.034,1.384-.026a1.314,1.314,0,0,0,.709-.206c.383-.221.769-.431,1.156-.645.045-.026.1-.068.143-.011s-.023.083-.049.116c-.364.507-.732,1.013-1.092,1.523a4.341,4.341,0,0,0-.848,1.808,9.2,9.2,0,0,0-.064,1.4c0,.263-.015.278-.281.278-.368,0-.739,0-1.107,0a.352.352,0,0,0-.33.169c-.345.5-.7.987-1.054,1.478-.056.083-.124.169-.075.27.053.116.165.09.263.09H5.523c.259,0,.278.023.281.285,0,1.1.008,2.2,0,3.3A3.644,3.644,0,0,1,5.256,30.1a16.489,16.489,0,0,1-1.219,1.7c-.06.075-.139.15-.09.263s.169.113.274.113H8.356a.44.44,0,0,0,.229-.045c.585-.341,1.126-.754,1.7-1.111a.483.483,0,0,0,.229-.465c-.008-1.49,0-2.979,0-4.469,0-.42,0-.844,0-1.264,0-.1.011-.221.146-.214.349.023.7-.053,1.047-.011a5.215,5.215,0,0,0,.968.008c.492-.034.492-.041.492.443v4.866a.436.436,0,0,0,.105.364c.578.54,1.152,1.084,1.73,1.621.266.248.375.24.687.03.379-.263.765-.51,1.152-.765.285-.188.578-.371.855-.57.158-.113.158-.24.008-.334-.454-.281-.848-.645-1.294-.938a.4.4,0,0,1-.191-.36c0-1.174,0-2.345,0-3.519,0-1.351.008-2.7,0-4.052a20.67,20.67,0,0,1,.218-3.94c.064-.338.1-.679.131-1.021.023-.233-.079-.293-.285-.191-.165.083-.33.169-.492.255-.762.42-1.516.852-2.285,1.253a.617.617,0,0,0-.4.657c.038,1.306.015,2.611.015,3.913,0,.248-.038.285-.289.285-.672,0-1.343,0-2.019,0-.319,0-.334-.015-.334-.334V16.614c0-.086,0-.173,0-.255,0-.053-.015-.116-.071-.131a.865.865,0,0,0-.525,0c-.124.049-.075.2-.079.3C9.781,18.752,9.785,20.951,9.785,23.153Zm13.379,1.163c0,1.227,0,2.454,0,3.677a.731.731,0,0,1-.18.507,3.288,3.288,0,0,0-.248.308c-.109.158-.229.154-.364.038a4.8,4.8,0,0,1-1.122-1.392,5.648,5.648,0,0,1-.593-3.2,6.276,6.276,0,0,1,.69-2.292,5.4,5.4,0,0,1,.728-1.1c.068-.079.12-.169.053-.27s-.143-.041-.214-.011a6.446,6.446,0,0,0-2.735,2.1,5.123,5.123,0,0,0-.882,1.861,6.218,6.218,0,0,0,.6,4.555,4.766,4.766,0,0,0,.694.979,6.953,6.953,0,0,0,1.2,1.043,5.838,5.838,0,0,0,1.812.814,7.894,7.894,0,0,0,2.413.18,6.5,6.5,0,0,0,3.94-1.583,4.774,4.774,0,0,0,1.651-3.268c.011-.094.015-.191-.1-.229s-.161.053-.206.135a4.472,4.472,0,0,1-.476.675,4.694,4.694,0,0,1-1.778,1.313c-.214.09-.233.075-.233-.161V19.544c0-.529,0-.522.54-.57a2.066,2.066,0,0,0,1.527-.84,5.473,5.473,0,0,0,.9-2.42c.011-.06.015-.124-.053-.154a.142.142,0,0,0-.165.026,2.674,2.674,0,0,0-.2.218,1.67,1.67,0,0,1-1.141.642,9.676,9.676,0,0,1-1.835.026c-1.189-.075-2.367-.281-3.561-.356a7.159,7.159,0,0,0-3.133.341,3.332,3.332,0,0,0-.991.567,2.868,2.868,0,0,0-.972,1.636,3.73,3.73,0,0,0,.139,1.793.273.273,0,0,0,.161.21c.165.053.274-.019.319-.214A2.1,2.1,0,0,1,20.7,18.887a5.2,5.2,0,0,1,1.944-.3,17.834,17.834,0,0,1,2.754.236c.056.008.135,0,.154.071s-.064.09-.113.116c-.6.326-1.189.687-1.816.96a.764.764,0,0,0-.48.844C23.172,21.983,23.161,23.15,23.164,24.316Z" data-name="Path 3"/>
		  <path transform="translate(-38.557 -26.785)" d="M65.792,43.811v4.964c0,.308,0,.315-.3.379a6.565,6.565,0,0,1-3.054-.034c-.21-.053-.409-.143-.615-.214-.049-.019-.109-.03-.109-.1s.056-.083.1-.109c.477-.255.953-.51,1.426-.765.244-.131.48-.274.732-.394a.4.4,0,0,0,.236-.424c-.007-.743,0-1.49,0-2.232,0-1.76,0-3.519,0-5.279a.531.531,0,0,1,.2-.446,3.591,3.591,0,0,0,.461-.431c.244-.293.552-.184.844-.161.086,0,.09.083.094.15,0,.12,0,.236,0,.356C65.792,40.648,65.792,42.232,65.792,43.811Z" data-name="Path 4"/>
		  </g>
		  </g>
		  <g transform="translate(38.568 39.404)" fill="#fff" data-name="Group 3">
		  <path transform="translate(-104.16 -101.11)" d="M106.606,103.661a1.19,1.19,0,0,1,.769.371,1.209,1.209,0,0,1,.311.867,1.355,1.355,0,0,1-.446,1.073,1.8,1.8,0,0,1-1.227.39H104.16V101.11h1.756a1.909,1.909,0,0,1,1.238.364,1.221,1.221,0,0,1,.45,1A1.1,1.1,0,0,1,106.606,103.661Zm-.728-1.793h-.855v1.441h.855a.962.962,0,0,0,.634-.191.734.734,0,0,0,0-1.062A.979.979,0,0,0,105.878,101.868ZM106,105.6a.848.848,0,0,0,.608-.21.767.767,0,0,0,.218-.585.694.694,0,0,0-.225-.537.839.839,0,0,0-.593-.206h-.983V105.6Z" data-name="Path 5"/>
		  <path transform="translate(-111.34 -104.03)" d="M118.076,105.79h.818V109.3a1.657,1.657,0,0,1-.458,1.246,1.69,1.69,0,0,1-1.186.405,1.813,1.813,0,0,1-1.2-.36,1.191,1.191,0,0,1-.39-.908h.825a.647.647,0,0,0,.2.446.837.837,0,0,0,.552.146.782.782,0,0,0,.615-.251,1.151,1.151,0,0,0,.225-.784V108.8a1.2,1.2,0,0,1-1.126.578,1.175,1.175,0,0,1-.957-.4,1.6,1.6,0,0,1-.334-1.054V105.79h.818v1.959c0,.6.251.908.758.908a.729.729,0,0,0,.627-.293,1.267,1.267,0,0,0,.214-.765Z" data-name="Path 6"/>
		  <path transform="translate(-121.67 -101.11)" d="M132.18,106.363V101.11h.863v2.259h2.169V101.11h.863v5.253h-.863v-2.221h-2.169v2.221Z" data-name="Path 7"/>
		  <path transform="translate(-129.64 -101.17)" d="M145.983,102.249a.626.626,0,1,1,.173-.431A.588.588,0,0,1,145.983,102.249Zm-.848,4.176v-3.5h.818v3.5Z" data-name="Path 8"/>
		  <path transform="translate(-133.08 -103.88)" d="M150.44,109.137v-3.5h.818v.488a1.21,1.21,0,0,1,1.141-.578q1.278,0,1.276,1.388v2.2h-.818v-1.823a1.465,1.465,0,0,0-.173-.818.672.672,0,0,0-.593-.248.766.766,0,0,0-.615.251,1.056,1.056,0,0,0-.218.717v1.921Z" data-name="Path 9"/>
		  <path transform="translate(-139.71 -101.11)" d="M163.9,101.11h.818v5.253H163.9v-.473a1.055,1.055,0,0,1-.469.409,1.5,1.5,0,0,1-.649.154,1.592,1.592,0,0,1-1.268-.518,1.938,1.938,0,0,1-.45-1.321,1.891,1.891,0,0,1,.473-1.317,1.625,1.625,0,0,1,1.268-.522,1.374,1.374,0,0,1,.645.15,1.092,1.092,0,0,1,.45.413Zm-1,4.615a.951.951,0,0,0,.769-.315,1.321,1.321,0,0,0,0-1.591,1.073,1.073,0,0,0-1.516,0,1.3,1.3,0,0,0,0,1.6A.937.937,0,0,0,162.9,105.725Z" data-name="Path 10"/>
		  <path transform="translate(-147.48 -104.03)" d="M174.8,109.377a1.277,1.277,0,0,1-.946-.353,1.4,1.4,0,0,1-.353-1.036v-2.2h.818v2a1.13,1.13,0,0,0,.165.668.632.632,0,0,0,.548.225.775.775,0,0,0,.645-.251,1.031,1.031,0,0,0,.2-.664V105.79h.818v3.5h-.818V108.8A1.133,1.133,0,0,1,174.8,109.377Z" data-name="Path 11"/>
		  <path transform="translate(-154.12 -103.88)" d="M185.606,109.227a1.64,1.64,0,0,1-1.073-.338,1.032,1.032,0,0,1-.413-.825h.818a.436.436,0,0,0,.2.368.868.868,0,0,0,.514.143.559.559,0,0,0,.368-.113.373.373,0,0,0,.135-.3.336.336,0,0,0-.263-.368l-.9-.248a.923.923,0,0,1-.758-.968.9.9,0,0,1,.375-.732,1.512,1.512,0,0,1,.968-.3,1.551,1.551,0,0,1,1.024.3.98.98,0,0,1,.356.788h-.8a.4.4,0,0,0-.161-.341.717.717,0,0,0-.446-.124.6.6,0,0,0-.36.1.309.309,0,0,0-.143.259.369.369,0,0,0,.3.375l.833.24a1.226,1.226,0,0,1,.585.356.845.845,0,0,1,.225.582,1.034,1.034,0,0,1-.364.825A1.506,1.506,0,0,1,185.606,109.227Z" data-name="Path 12"/>
		  <path transform="translate(-159.58 -102.27)" d="M194.781,106.835a2.484,2.484,0,0,0,.413-.03v.72a3.529,3.529,0,0,1-.608.045,1.933,1.933,0,0,1-.353-.03,1.3,1.3,0,0,1-.353-.139.718.718,0,0,1-.315-.379,1.791,1.791,0,0,1-.113-.683v-1.628h-.593v-.683h.593V102.97h.818v1.058h.8v.683h-.8v1.441a.873.873,0,0,0,.12.552A.5.5,0,0,0,194.781,106.835Z" data-name="Path 13"/>
		  <path transform="translate(-164.22 -103.88)" d="M202,109.227a1.592,1.592,0,0,1-1.268-.518,1.938,1.938,0,0,1-.45-1.321,1.891,1.891,0,0,1,.473-1.317,1.625,1.625,0,0,1,1.268-.522,1.374,1.374,0,0,1,.645.15,1.092,1.092,0,0,1,.45.413v-.473h.818v3.5h-.818v-.473a1.054,1.054,0,0,1-.469.409A1.5,1.5,0,0,1,202,109.227Zm.12-.728a.951.951,0,0,0,.769-.315,1.321,1.321,0,0,0,0-1.591,1.073,1.073,0,0,0-1.516,0,1.3,1.3,0,0,0,0,1.6A.937.937,0,0,0,202.118,108.5Z" data-name="Path 14"/>
		  <path transform="translate(-172.05 -103.88)" d="M212.82,109.137v-3.5h.818v.488a1.21,1.21,0,0,1,1.141-.578q1.278,0,1.276,1.388v2.2h-.818v-1.823a1.465,1.465,0,0,0-.173-.818.672.672,0,0,0-.593-.248.766.766,0,0,0-.615.251,1.056,1.056,0,0,0-.218.717v1.921Z" data-name="Path 15"/>
		  <path transform="translate(-181.44 -101.11)" d="m229.36 106.36v-4.443h-1.523v-0.81h3.917v0.81h-1.531v4.442z" data-name="Path 16"/>
		  <path transform="translate(-188.45 -101.17)" d="M240.1,102.249a.626.626,0,1,1,.173-.431A.588.588,0,0,1,240.1,102.249Zm-.848,4.176v-3.5h.818v3.5Z" data-name="Path 17"/>
		  <path transform="translate(-191.88 -103.88)" d="M244.56,109.137v-3.5h.818v.488a.968.968,0,0,1,.383-.416,1.1,1.1,0,0,1,.593-.161,1.076,1.076,0,0,1,1.1.623,1.042,1.042,0,0,1,.42-.446,1.252,1.252,0,0,1,.653-.176q1.261,0,1.261,1.373v2.214h-.818v-2.056q0-.833-.653-.833a.671.671,0,0,0-.54.229,1.256,1.256,0,0,0-.2.807v1.853h-.818v-2.064c0-.552-.214-.825-.638-.825a.685.685,0,0,0-.552.229,1.254,1.254,0,0,0-.2.807v1.853h-.818Z" data-name="Path 18"/>
		  <path transform="translate(-201.84 -103.88)" d="M263.929,107.208q0,.135-.023.45h-2.6a.846.846,0,0,0,.27.634,1.045,1.045,0,0,0,.705.221.789.789,0,0,0,.78-.4h.825a1.2,1.2,0,0,1-.529.8,1.841,1.841,0,0,1-1.077.311,1.731,1.731,0,0,1-1.306-.5,2.12,2.12,0,0,1,0-2.683,1.681,1.681,0,0,1,1.279-.5,1.641,1.641,0,0,1,1.212.461A1.623,1.623,0,0,1,263.929,107.208Zm-2.619-.173h1.816a.834.834,0,0,0-.236-.623.9.9,0,0,0-.649-.218.952.952,0,0,0-.675.233A.823.823,0,0,0,261.31,107.036Z" data-name="Path 19"/>
		  <path transform="translate(-208.43 -103.88)" d="M272.526,109.227a1.64,1.64,0,0,1-1.073-.338,1.032,1.032,0,0,1-.413-.825h.818a.436.436,0,0,0,.2.368.868.868,0,0,0,.514.143.559.559,0,0,0,.368-.113.373.373,0,0,0,.135-.3.336.336,0,0,0-.263-.368l-.9-.248a.923.923,0,0,1-.758-.968.9.9,0,0,1,.375-.732,1.512,1.512,0,0,1,.968-.3,1.551,1.551,0,0,1,1.024.3.98.98,0,0,1,.356.788h-.8a.4.4,0,0,0-.161-.341.717.717,0,0,0-.446-.124.6.6,0,0,0-.36.1.309.309,0,0,0-.143.259.368.368,0,0,0,.3.375l.833.24a1.226,1.226,0,0,1,.585.356.845.845,0,0,1,.225.582,1.034,1.034,0,0,1-.364.825A1.506,1.506,0,0,1,272.526,109.227Z" data-name="Path 20"/>
		  </g>
		  <g transform="translate(122.91 1.445)" data-name="Group 7">
		  <path transform="translate(-344.61 -59.707)" d="m366.58 98.264h-12.614a1.332 1.332 0 0 1-1.332-1.332 1.332 1.332 0 0 1 1.332-1.332h12.614a1.332 1.332 0 0 1 1.332 1.332 1.33 1.33 0 0 1-1.332 1.332z" fill="#ff6417" data-name="Path 21"/>
		  <path transform="translate(-347.73 -66.037)" d="m367.82 108.39h-8.862a1.332 1.332 0 0 1-1.332-1.332 1.332 1.332 0 0 1 1.332-1.332h8.862a1.332 1.332 0 0 1 1.332 1.332 1.328 1.328 0 0 1-1.332 1.332z" fill="#ff6417" data-name="Path 22"/>
		  <g transform="translate(0 2.818)" data-name="Group 5">
		  <g clip-path="url(#a)" data-name="Group 4">
		  <path transform="translate(-331.24 -11.36)" d="M360.659,19.2a15.762,15.762,0,0,0-29.419,7.924,15.687,15.687,0,0,0,7.838,13.657c.308.18.619.345.934.5a1.164,1.164,0,0,1,1.137-1.1,1.1,1.1,0,0,1,.653.214,2,2,0,0,1,1.865-1.58,2.628,2.628,0,0,1,1.895.825l.507-7.35v-.664h2.289l.506,7.969a2.65,2.65,0,0,1,1.861-.78,1.99,1.99,0,0,1,1.853,1.523,1.117,1.117,0,0,1,.563-.161,1.162,1.162,0,0,1,1.122.949c.221-.116.443-.229.66-.356a15.688,15.688,0,0,0,7.838-13.657A15.417,15.417,0,0,0,360.659,19.2Z" fill="#ff6417" data-name="Path 23"/>
		  </g>
		  </g>
		  <g transform="translate(7.785)" data-name="Group 6">
		  <path transform="translate(-360.55 -3.85)" d="M367.056,6.656l-.079.169L365.69,9.613l.071,15.92h5.467V9.335L368.459,3.85Z" fill="#fff" data-name="Path 25"/>
		  <rect transform="translate(7.02 5.542)" width="1.827" height="16.178" fill="#ff6417" data-name="Rectangle 1"/>
		  <path transform="translate(-352 -28.861)" d="m357.28 43.88 0.056 6.693-5.339-0.03v-1.443s5.208-5.22 5.283-5.22z" fill="#fff" data-name="Path 26"/>
		  <path transform="translate(-362.83 -3.85)" d="m369.33 6.656h2.77l-1.367-2.806z" fill="#ff6417" data-name="Path 27"/>
		  <path transform="translate(-369.7 -28.811)" d="m380.39 43.8-0.056 6.723 5.324-0.034v-1.436s-5.193-5.253-5.268-5.253z" fill="#fff" data-name="Path 28"/>
		  <path transform="translate(-359.17 -39.67)" d="M369.995,62.692h-5.9a.621.621,0,0,1-.623-.623V61.8a.621.621,0,0,1,.623-.623h5.9a.621.621,0,0,1,.623.623v.266A.624.624,0,0,1,369.995,62.692Z" fill="#fff" data-name="Path 29"/>
		  </g>
		  </g>
		  <g transform="translate(86.038 4.761)" fill="#fff" data-name="Group 8">
		  <path transform="translate(-265.83 -12.696)" d="M287.977,25.753a11.361,11.361,0,0,0,1.869,2.413V12.7h-.8a11.536,11.536,0,0,0-1.062,1.527,11.626,11.626,0,0,0,0,11.526Z" data-name="Path 30"/>
		  <path transform="translate(-231.49 -12.69)" d="M252.343,26.5a13.118,13.118,0,0,1,0-13.034c.154-.266.315-.522.488-.773h-6.9v9.658h-4.829V12.694H231.49v28.89h9.616V31.926h4.829v9.658h9.575V30.155A12.7,12.7,0,0,1,252.343,26.5Z" data-name="Path 31"/>
		  </g>
		  <path transform="translate(-254.49 -5.542)" d="M414.654,28.144V8.87H405.12v4.525a16.862,16.862,0,0,1,0,24.343v.023h17.87V28.144Z" fill="#fff" data-name="Path 32"/>
		  <path transform="translate(-179.49)" d="M301.588,20.024A16.736,16.736,0,0,1,308.353,6.5c-.094-.18-.184-.356-.285-.533a12,12,0,0,0-22.388,6.029A11.94,11.94,0,0,0,297.675,23.99a12.012,12.012,0,0,0,4.213-.747A17.539,17.539,0,0,1,301.588,20.024ZM299.922,15.8a4.405,4.405,0,0,1-4.427,0,4.454,4.454,0,0,1-1.621-1.6,4.23,4.23,0,0,1-.593-2.2,4.36,4.36,0,0,1,.593-2.214A4.515,4.515,0,0,1,295.5,8.145a4.312,4.312,0,0,1,4.427,0,4.506,4.506,0,0,1,1.617,1.636,4.326,4.326,0,0,1,.6,2.214,4.244,4.244,0,0,1-.6,2.2A4.415,4.415,0,0,1,299.922,15.8Z" fill="#fff" data-name="Path 33"/>
		  </g>
		  </svg>

		  <div class="social">
			<a target="_blank" href="https://www.facebook.com/HTSchool-111960910982690/" class="facebook"><span class="name"></span></a>
			<a target="_blank" href="https://twitter.com/htschool1" class="twitter"><span class="name"></span></a>
			<a target="_blank" href="https://www.linkedin.com/company/htschool" class="linkedin"><span class="name"></span></a>
			<a target="_blank" href="https://www.youtube.com/user/ht" class="youtube"><span class="name"></span></a>
			<a target="_blank" href="https://www.instagram.com/htschool/" class="instagram"><span class="name"></span></a>
			<a target="_blank" href="<?php bloginfo('rss2_url'); ?>" class="rss"><span class="name"></span></a>
		  </div>
		</div>

		  <div class="new-footer-links">
			<div class="column">
			  <?php
				$args = array(
				  'theme_location'  => 'footer-left-menu',
				);
				wp_nav_menu( $args );
			  ?>
			</div>
			<div class="column">
			  <?php
				$args = array(
				  'theme_location'  => 'footer-middle-menu',
				);
				wp_nav_menu( $args );
			  ?>
			</div>

			<div class="column">
			  <?php
				$args = array(
					'theme_location'  => 'footer-menu',
					'container'       => '',
					'depth'           => 1,
					'menu_class'      => '',
					'fallback_cb'     => 'vibe_set_menu',
				);
				wp_nav_menu( $args );
			  ?>
			</div>

			<div class="column newsletter">
			  <h6 class="new-footer-title">Subscribe Now</h6>
			 <?php
			  if ( is_active_sidebar( 'newsletter-form' ) ) :
				dynamic_sidebar( 'newsletter-form' );
				?>
			  <?php endif; ?>
			</div>
		  </div>
	  </div>
	  <div class="copyright">Copyright &copy; <?php echo date("Y");?> HTML. All rights reserved.</div>
</footer>
</div><!-- END PUSHER -->
</div><!-- END MAIN -->
  <!-- SCRIPTS -->

<?php if(is_user_logged_in()){ ?>

<style>
  #profileModal{
		-webkit-box-align: center !important;
	-ms-flex-align: center !important;
	align-items: center !important;
	/*display: flex;*/
  }
  #profileModal.modal.modal-box.fade.in{
	display: flex!important;
  }
	.ui-widget-content.ui-autocomplete{
		z-index: 99999;
	}
  #profileModal .modal-content {
	/*top: 139px;*/
		border-radius: 0px;
	background: #fff;
  }

#profileModal .ul-nav>li.active>a{
		color: #fff;
	background-color: #0d9ce8;
	border: 1px solid deepskyblue;
  /*  padding: 2px 65px 2px 65px;*/
	border-radius: 0px;
  }
  #profileModal .ul-nav>li.active>a:after{
	content:'';
	position: absolute;
	left: 0;
	right: 0;
	margin: 0 auto;
	margin-top: 20px;
	width: 0;
	height: 0;
	border-top: 10px solid #0d9ce8;
	border-left: 10px solid transparent;
	border-right: 10px solid transparent;
  }

 #profileModal .ul-nav>li>a {
border: 1px solid deepskyblue;
	padding: 2px 10px;
	border-radius: 0px;
	color:deepskyblue;
 }
 #profileModal .ul-nav>li>a:hover{
  background-color: #0d9ce8;
	color: #ffffff;
 }
 #profileModal .ul-nav{
  margin-bottom: 25px;
 }
  #profileModal .mnav{
	margin-left:1px;
  }

  #profileModal .in-class{
		background-color: #fff;
	margin-bottom: 10px;
	border: 0px !important;
	border-bottom: 1px solid #ccc !important;
	padding: 6px 1px;
	font-size: 18px;
	border-radius: 0px;
	box-shadow: none;
	font-weight: 500;
  }
  #profileModal .input-group{
	 background-color: white;
	margin-bottom: 10px;
	border: 0px !important;
	border-bottom: 1px solid #ccc !important;
	padding: 0px 1px;
	font-size: 16px;
	border-radius: 0px;
	box-shadow: none;
  }
  #profileModal .s-class{
	border:none;
	padding: 6px 1px;
	background-color: white;
	border: 0px !important;
	border-radius: 0px;
	box-shadow: none !important;
  }
  #profileModal label{
	font-weight: 500;
	margin-bottom: 0px;
	font-size: 14px;
	color: #bbb;
  }
  #profileModal .n-btn{
	padding: 10px 50px 10px 50px !important;
	margin-top: 50px;
	margin-bottom: 20px;
  }
   #profileModal .sl-btn{
	padding: 10px 50px 10px 50px !important;
	margin-top: 10px;
	margin-bottom: 0px;
   }
 #profileModal .input-group-addon{
	border:none;
	background-color: #fff;
	color: #afafaf;
	line-height: normal;
	vertical-align: bottom;
	padding-bottom: 10px;
  }
  #profileModal .b-class{
	padding: 30px;
  }
.tabDetails{
  padding: 0px 18px 0px 16px;
}
.tabDetails .nav>li{
	  width: 150px;
	}
.tabDetails .nav>li, .nav>li>a{
	  text-align: center;
}
.tabDetails .form-group .radio_switch{
	  margin-bottom: 10px;
}
  @media only screen and (max-device-width: 480px) {
	.tabDetails .nav>li{
		  width: 120px;
		  text-align: center;
	}
   .tabDetails .nav>li, .tabDetails .nav>li>a{
		  padding: 5px 25px 5px 25px;
	 }
	#profileModal .n-btn{
	margin-top: 12px;
	margin-bottom: 0px;
	padding: 15px 50px 15px 50px !important;
  }
  #profileModal .sl-btn{
	margin-top: 10px;
	margin-bottom: 0px;
	padding: 15px 50px 15px 50px !important;
   }
	#profileModal .ul-nav>li.active>a:after{
	margin-top: 23px;
	border-top: 10px solid #0d9ce8;
	border-left: 10px solid transparent;
	border-right: 10px solid transparent;
  }
}

.ui-autocomplete li.ui-menu-item:last-child .ui-menu-item-wrapper,
	.ui-autocomplete li.ui-menu-item:last-child:hover .ui-menu-item-wrapper {
		background-color: #d5ebff!important;
    	color: #000;    	
	}

</style>


<?php

  $currentUser = wp_get_current_user();
  $user_id = bp_loggedin_user_id();
  $args = array(
		  'field'   => 'Phone', // Field name or ID.
		  );

  $user_mobile = get_profile_data('Phone', $user_id);
  $user_birthday = get_profile_data('Birthday', $user_id);
  $user_gender = get_profile_data('Gender', $user_id);
  $user_country = get_profile_data('Country', $user_id);
  $user_state = get_profile_data('State', $user_id);
  $user_city = get_profile_data('City', $user_id);

  $dob = strtotime($user_birthday);

  $user_school_name = "";
	$user_school = get_profile_data('Linked School');
	if(intval($user_school) > 0){
		$user_school_name = get_user_by('id', $user_school)->display_name;
	}

?>


<div class="modal modal-box fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
		  <div class="modal-title" id="profileModalLabel">
			<img src="<?php echo get_bloginfo('url')?>/wp-content/uploads/2021/03/logo-popup.png" class="modal-img" alt="Logo" title="Logo"/>
		   <!-- <p class="modal-text"> Thank you for getting in touch!</p> -->
			<!-- <p class="modal-text">Welcome to</p>
			<p class="modal-para">Data Science Masterclass for Non-Programmers</p> -->
			<!-- <p class="modal-text">Congratulations on completing the Data Science Masterclass for Non-Programmers successfully. </p> -->
			<p class="modal-text">Complete your profile</p>
		  </div>
		  <button type="button" class="close close_modal" data-dismiss="modal" aria-label="Close">
			<span>&times;</span>
		  </button>
	  </div>
	  <div class="modal-body b-class">
		<div class="row">
			<form id="profile-edit-form" name="profile-form" class="standard-form">
				<input type="hidden" name="action" value="save_custom_profile">
				<div class="col-md-9 col-sm-9 mrg">
				  <div class="tabDetails">
					<ul class=" ul-nav nav nav-pills nav-fill ">
						<li class="active" ><a data-toggle="pill"  href="#step1">Step 1</a></li>
						<li><a data-toggle="pill" class="mnav" id="profile_step_2"  href="#step2">Step 2</a></li>
					</ul>

					<div class="tab-content">
						<div class="tab-pane fade in active" id="step1">
							<div class="row">
								<div class="col-md-12">
									<label>First Name*</label>
								</div>
								<div class="col-md-12">
									<input type="text" name="first_name"  value="<?php echo $currentUser->user_firstname; ?>" placeholder="First name" class=" in-class form-control user_field" id="user_firstname">
									<span id="errFirstName"></span>
								</div>

								<div class="col-md-12">
									<label>Last Name*</label>
								</div>
								<div class="col-md-12">
									<input type="text" name="last_name"  value="<?php echo $currentUser->user_lastname; ?>" placeholder="Last name" class=" in-class form-control user_field" id="user_lastname">
									<span id="errLastName"></span>
								</div>

								<div class="col-md-12">
									<label>Email id*</label>
								</div>
								<div class="col-md-12">
									<input type="email" name="user_email"  value="<?php echo $currentUser->user_email; ?>" readonly placeholder="Email id"  class="in-class form-control user_field"/>
								</div>

								<div class="col-md-12">
									<label>Mobile Number*</label>
								</div>
								<div class="col-md-12">
									<input type="text" name="user_mobile" placeholder="Mobile Number" maxlength="10" id="user_mobile" value="<?php echo $user_mobile ?>" class="in-class form-control user_field"/>
									<span id="errMobileMsg"></span>
								</div>

								<div class="col-md-12">
									<label>Date of Birth*</label>
								</div>
								<div class="col-md-12">
									<input id="user_dob_display" type="text" class="in-class form-control user_field" name="user_dob_display" placeholder="Date of Birth" value="<?php echo date("d/m/Y", $dob); ?>" readonly>
									<input id="user_dob" type="hidden" name="user_dob" value="<?php echo date("Y-m-d", $dob); ?>">
									<!-- <input type="date" name=""  placeholder="DD / MM / YYYY" class="in-class form-control" />              -->
								</div>

								<div class="col-md-12">
									<button type="button" id="profile_next_step" class="btn n-btn">Next</button>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="step2">
							<div class="row">
							  <div class="col-md-12">
								  <div class="form-group ">
									<label> Select Gender</label> <br/>
									<div class="radio_switch">
										<div class="switch" style="height: unset;">
											<input type="radio" class="switch-input user_radio_btn user_field" name="user_gender" value="Female" id="one" <?php if($user_gender == '' || $user_gender == null){ echo "checked"; } else if($user_gender == 'Female'){ echo "checked"; } ?>>
											<label for="one" class="switch-label switch-label-off">
												<span>Female</span>
											</label>
											<input type="radio" class="switch-input admin_radio_btn" name="user_gender" value="Male" id="two" <?php if($user_gender == 'Male'){ echo "checked"; } ?>>
											<label for="two" class="switch-label switch-label-on">
												<span>Male</span>
											</label>
											<span class="slider2"></span>
										</div>
									</div>
								</div>
							  </div>
								<!-- <div class="col-md-12">
									<label>School name*</label>
								</div> -->
								<div class="col-md-12">
								  <label for="user_school_data">School*</label>
								  <span class="school_note">Please type in your school and location if you can't find it in the list. (e.g., St. Paul's School Darjeeling)</span>
									<div class="col-md-12 input-group">

										<input type="text" class="s-class form-control user_field" id="user_school_data" name="user_school_data" placeholder="Select School" value="<?php echo $user_school_name; ?>">
										<span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
										<input type="hidden" id="user_school" name="user_school" value="<?php echo $user_school; ?>">				
									</div>

									<span id="errSchoolMsg"></span>
									
								</div>

								<div class="col-md-12">
									<!-- <div style="display:none" id="other_school">
										<input type="text" id="user_school_other" name="user_school_other" placeholder="Please enter other school name" value="" >
										<span id="errotherSchoolMsg"></span>
									</div> -->

									<div id="other_school" class="input-group" style="display:none">
										<input type="text" class="s-class form-control" id="user_school_other" name="user_school_other" placeholder="Please enter other school name" value="">
										<span id="errotherSchoolMsg"></span>
									</div>
								</div>
								
								<!-- <div class="col-md-12">
									<label>Country</label>
								</div>
								<div class="col-md-12">
									<div class="input-group">
										<input type="type"  id="user_country_data" name="user_country_data" placeholder="Select Country" value="<?php echo $user_country; ?>" class="s-class form-control user_field" />
										<input type="hidden" id="user_country" name="user_country" value="<?php echo $user_country; ?>">
										<span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
									</div>
								</div> -->

								<!-- <div class="col-md-12">
									<label>State</label>
								</div>
								<div class="col-md-12">
									<div class="input-group">
										<input type="type" id="user_state" name="user_state" placeholder="Select State" value="<?php echo $user_state; ?>" class="s-class form-control user_field" />
										<span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
									</div>
								</div> -->


								<?php $child = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix . "parent_child_mapping WHERE child_id = " . $user_id ); ?>
								<div class="col-md-12">
								  <label for="">Grade / Standard</label>
								  <div class="col-md-12 mrg">
									<div class="input-group popup_dropdown">
								  <select name="grade">
									<option value="1st" <?php if($child[0]->grade=="1st") echo 'selected="selected"'; ?>>1st</option>
									<option value="2nd" <?php if($child[0]->grade=="2nd") echo 'selected="selected"'; ?>>2nd</option>
									<option value="3rd" <?php if($child[0]->grade=="3rd") echo 'selected="selected"'; ?>>3rd</option>
									<option value="4th" <?php if($child[0]->grade=="4th") echo 'selected="selected"'; ?>>4th</option>
									<option value="5th" <?php if($child[0]->grade=="5th") echo 'selected="selected"'; ?>>5th</option>
									<option value="6th" <?php if($child[0]->grade=="6th") echo 'selected="selected"'; ?>>6th</option>
									<option value="7th" <?php if($child[0]->grade=="7th") echo 'selected="selected"'; ?>>7th</option>
									<option value="8th" <?php if($child[0]->grade=="8th") echo 'selected="selected"'; ?>>8th</option>
									<option value="9th" <?php if($child[0]->grade=="9th") echo 'selected="selected"'; ?>>9th</option>
									<option value="10th" <?php if($child[0]->grade=="10th") echo 'selected="selected"'; ?>>10th</option>
								  </select>
								  </div>
								</div>
								</div>
								<div class="col-md-12">
								  <label for="">Section / Division</label>
								  <div class="col-md-12 mrg">
									<div class="input-group popup_dropdown">
									  <select name="division">
										<option value="A" <?php if($child[0]->division=="A") echo 'selected="selected"'; ?>>A</option>
										<option value="B" <?php if($child[0]->division=="B") echo 'selected="selected"'; ?>>B</option>
										<option value="C" <?php if($child[0]->division=="C") echo 'selected="selected"'; ?>>C</option>
										<option value="D" <?php if($child[0]->division=="D") echo 'selected="selected"'; ?>>D</option>
									  </select>
									</div>
								  </div>
								</div>
								<div class="col-md-12">
									<label>City</label>
								</div>
								<div class="col-md-12">
									<div class="input-group">
										<input type="type"  id="user_city" name="user_city" placeholder="Select City" value="<?php echo $user_city; ?>" class="s-class form-control user_field" />
										<span class="input-group-addon"><i class="fa " aria-hidden="true"></i></span>
									</div>
								</div>
								<div class="col-md-12">
									<p class="error" id="response_message" style="display: none;"></p>
									<button type="button" class="btn sl-btn"  id="profile_submit">Start Learning</button>

								</div>
							</div>
						</div>
					  </div>
					</div>
				</div>
				<div class="col-md-3 col-sm-3">
					<!-- progress bra -->
					<!-- <div class="progressbar-full">
						<div class="pull-left">
							<div class="progress_new">
								<div class="overlay"></div>
								<div class="left"></div>
								<div class="right"></div>

							</div>
						</div>
						<div class="pull-left">
							<span class="title timer" data-from="0" data-to="30" data-speed="1800">70% <span class="light">Completed</span></span>
						</div>
					</div> -->
					<div class="circles-container bg-white">
						<div class="circlebar" id="progress-new" data-circle-startTime=0 data-circle-maxValue="100" data-circle-dialWidth=5 data-circle-size="80px" data-circle-type="progress">
							<div class="loader-bg">
								<div class="text">00:00:00</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>

	</div>
	</div>
  </div>
</div>
<script type="text/javascript">
	window.onbeforeunload = null;
	(function($) {
		$(document).ready(function(){
			$("#user_mobile").keypress(function (e) {
			  var mobNum = $(this).val();
				if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				  $("#errMobileMsg").text("Please enter Digits Only");
				  return false;
				}
				else{
				  $("#errMobileMsg").text('');
				}
			});

			$("#user_mobile").on("blur", function(){
			  var mobNum = $('#user_mobile').val();
				  var filter = /^(?!0+$)\d{8,}$/;
				  if (!filter.test(mobNum)) {
					  $("#errMobileMsg").text('Not a valid number');
					  return false;
				  }
				  else if(mobNum.length!=10){
					$("#errMobileMsg").text("Please enter 10 digit mobile number");
					  return false;
				  }
				  else{
					$("#errMobileMsg").text("");
					return true;
				  }
			});
			function validate()
			{
			  $("#errMobileMsg").text("");
			  $("#errFirstName").text("");
			  $("#errLastName").text("");
				var mobNum = $('#user_mobile').val();
				var firstName = $('#user_firstname').val();
				var lastName = $('#user_lastname').val();
				
				if($('#user_school_other').val() !=""){
              		var otherschool = $('#user_school_other').val();
              		 if(otherschool == '' || otherschool == undefined){
                  	$("#errotherSchoolMsg").text("Please enter school name");
                  	isValid = false;
                  }
              	}

				  var filter = /^(?!0+$)\d{8,}$/;
				  var isValid = true;
				  if(mobNum == '' || mobNum == undefined){
					$("#errMobileMsg").text('Please enter mobile number');
					isValid = false;
				  }
				  else if (!filter.test(mobNum)) {
					  $("#errMobileMsg").text('Not a valid number');
					  isValid = false;
				  }
				  else if(mobNum.length!=10){
					$("#errMobileMsg").text("Please enter 10 digit mobile number");
					  isValid = false;
				  }

				  if(firstName == '' || firstName == undefined){
					$("#errFirstName").text("Please enter first name");
					isValid = false;
				  }

				  if(lastName == '' || lastName == undefined){
					$("#errLastName").text("Please enter last name");
					isValid = false;
				  }

				  return isValid;
			}

			function schoolValidate(){
			  $("#errSchoolMsg").text("");
			  var userSchool = $('#user_school_data').val();
			  if(userSchool == '' || userSchool == undefined){
				$("#errSchoolMsg").text("Please select school name");
				isValid = false;
			  }
			  else{
				$("#errSchoolMsg").text("");
				isValid = true;
			  }

			  return isValid;
			}

			$("#user_firstname").keypress(function(e) {
			  var keyCode = e.keyCode || e.which;

			  $("#errFirstName").text("");

			  //Regex for Valid Characters i.e. Alphabets.
			  var regex = /^[A-Za-z]+$/;

			  //Validate TextBox value against the Regex.
			  var isValid = regex.test(String.fromCharCode(keyCode));
			  if (!isValid) {
				  $("#errFirstName").text("Please enter only alphabets");
			  }

			  return isValid;

			});
			$("#user_lastname").keypress(function(e) {
			  var keyCode = e.keyCode || e.which;

			  $("#errLastName").text("");

			  //Regex for Valid Characters i.e. Alphabets.
			  var regex = /^[A-Za-z]+$/;

			  //Validate TextBox value against the Regex.
			  var isValid = regex.test(String.fromCharCode(keyCode));
			  if (!isValid) {
				  $("#errLastName").text("Please enter only alphabets");
			  }

			  return isValid;

			});

			updateProgressBar();
			function updateProgressBar(){
			  var count=0;
			  $(".user_field").each(function(){
				  count = count+($.trim($(this).val())=="" ? 1 : 0);
			  });
			  var filled_count = 10 - count;
			  var total_count = 10;
			  var total_percent = (filled_count/total_count) * 100;
			  $("#progress-new").attr("data-circle-maxValue",total_percent);
			}
			$(".close_modal").unbind();
			$(".close_modal").click(function(){
				$("#profileModal").modal("hide");
				window.location.reload();
			});

			var ajaxurl = "<?php echo home_url(); ?>/wp-admin/admin-ajax.php";
			$('form#modalAjaxTrying :submit').click(function(event){
				event.preventDefault();
				var form_data = {'action' : 'acf/validate_save_post'};
				$('form#modalAjaxTrying :input').each(function(){
				form_data[$(this).attr('name')] = $(this).val()
				})

				form_data.action = 'save_my_data';
				$.post(ajaxurl, form_data)
				.done(function(save_data){
				// alert('Added successFully :');

				})

			})
			window.selectedCountry = "<?php echo $user_country; ?>";

			if($("#user_dob_display").length > 0) {
				$("#user_dob_display").datepicker({
					altField: "#user_dob",
					altFormat: "yy-mm-dd",
					changeMonth: true,
					changeYear: true,
					yearRange: '1980:-3',
					maxDate: '-3y',
				});
			}

			$("#profile_next_step").click(function(){
			  if(validate() != true){
				return false;
			  }
			  else{
				$("#profile_step_2").click();
				updateProgressBar();
				var prefs = {
					element: ".circlebar"
				};
				$('.circlebar').each(function() {
					prefs.element = $(this);
					new Circlebar(prefs);
				});
			  }
			});

		  var schoolUrl = '<?php echo home_url(); ?>/wp-admin/admin-ajax.php?action=get_schools';

			$( "#user_school_data" ).autocomplete({
				source: function (request, response) {
					 $.ajax({
						dataType: "json",
						type : 'POST',
						data: { term: request.term},
						url: schoolUrl,
						success: function(data) {
							response(data);
						},
						error: function(data) {
						}
					});
				},
				minLength: 2,
				select: function(event, ui) {
					event.preventDefault();
					$("#user_school_data").val(ui.item.label);
					$("#user_school").val(ui.item.value);
				},
				response: function(event, ui){
					ui.content.push({value:"Others", label:"Others"});
				}
			});

			$("#user_school_data").on("keyup", function (event, ui) {		var other_val = $("#user_school_data").val();
   
    			if(other_val === "Others"){
					$("#other_school").show();							
				}
				else{
					$('#other_school').slideUp();						
					$("#user_school_other").val('');						
				}	
			});

			$("#user_school_data").on("change", function (event, ui) {
				var other_val = $("#user_school_data").val();
   
    			if(other_val === "Others"){
					$("#other_school").show();							
				}
				else{
					$('#other_school').slideUp();						
					$("#user_school_other").val('');						
				}		
			});

			$('.ui-autocomplete').on('click', '.ui-menu-item', function(){
    			$("#user_school_data").trigger('click');
			});

			$("#user_school_data").click(function(){
    			var other_val = $("#user_school_data").val();
    			
    			if(other_val === "Others"){
					$("#other_school").show();							
				}
				else{
					$('#other_school').slideUp();						
					$("#user_school_other").val('');		
				}	
			});

			var countryUrl = '<?php echo home_url(); ?>/wp-admin/admin-ajax.php?action=get_countries';

			$( "#user_country_data" ).autocomplete({
				  source: function (request, response) {
					 $.ajax({
						dataType: "json",
						type : 'POST',
						data: { term: request.term},
						url: countryUrl,
						success: function(data) {
							response(data);
						},
						error: function(data) {
						}
					});
				},
				minLength: 2,
				select: function(event, ui) {
					event.preventDefault();
					$("#user_country_data").val(ui.item.label);
					$("#user_country").val(ui.item.label);
					window.selectedCountry = ui.item.label;
				},
			});

			var stateUrl = '<?php echo home_url(); ?>/wp-admin/admin-ajax.php?action=get_states';

			$( "#user_state" ).autocomplete({
				source: function (request, response) {
					 $.ajax({
						dataType: "json",
						type : 'POST',
						data: { term: request.term, country: window.selectedCountry },
						url: stateUrl,
						success: function(data) {
							response(data);
						},
						error: function(data) {
						}
					});
				},
				minLength: 2,
				select: function(event, ui) {
					event.preventDefault();
					$("#user_state").val(ui.item.label);
				},
			});

			$("#profile_submit").click(function(){
			  if(schoolValidate() != true){
				return false;
			  }
			  else{
				$("#profile_submit").html("Please wait...");
				$("#profile_submit").attr("disabled", "disabled");

				var form_data = {'action' : 'acf/validate_save_post'};
				$.ajax({
					type : "POST",
					dataType : "json",
					url : "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
					data : $("#profile-edit-form").serialize(),
					success: function(response) {
						$("#profile_submit").html("Submit");
						$("#profile_submit").removeAttr("disabled");
						window.onbeforeunload = null;
						if(response.status == 1){
							updateProgressBar();
							var prefs = {
								element: ".circlebar"
							};
							$('.circlebar').each(function() {
								prefs.element = $(this);
								new Circlebar(prefs);
							});
							$("#response_message").html(response.message);
							$("#response_message").addClass('success');
							$("#response_message").removeClass('error');
							$("#response_message").show();

							if(response.profile_complete == 1){
								window.checkProfile = false;
								$("#profileModal").modal("hide");
								$(".button_cource_id_" + window.selectedCourseId).click();
							}

							setTimeout(function(){
								$("#response_message").html('');
								$("#response_message").hide();
							}, 5000);

						}else{
							$("#response_message").html(response.message);
							$("#response_message").addClass('error');
							$("#response_message").removeClass('success');
							$("#response_message").show();
							setTimeout(function(){
								$("#response_message").html('');
								$("#response_message").hide();
							}, 5000);
						}
					}
				});
			  }
			});

		});
	})( jQuery );
</script>
<?php } ?>


<!--edit child pop up Modal -->
<div class="modal right fade" id="edit-child-profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel2">Child 1</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

			</div>
			<form id="child-edit-form" class="standard-form">
			  <input type="hidden" name="action" value="save_child_entry">
			  <div class="modal-body">
					<div class="child-form child-form-pop">
					  <div class="add-pic">
						  <span class="add-name">Add Pic</span>
						  <span class="pic">
							<img src="<?php echo get_bloginfo('template_url')?>/assets/images/profile-img.svg" height="auto" width="100%">
						  </span>
					  </div>
					  <div class="form-group">
						<label for="">Child's Name</label>
						<input type="text" class="form-control edit-inline" id="child_name" name="child_name" placeholder="Enter Child's Name">
					  </div>
					  <div class="form-group profile_search">
						<label for="">Name of your School</label>
						<input type="text" class="form-control edit-inline" id="child_school" name="child_school" placeholder="Find your School">
						<input type="hidden" name="child_school_id" id="child_school_id">
					  </div>
					  <div class="form-group profile_dropdown">
						<label for="">Grade / Standard</label>
						<select name="grade">
						  <option value="1st">1st</option>
						  <option value="2nd">2nd</option>
						  <option value="3rd">3rd</option>
						  <option value="4th">4th</option>
						  <option value="5th">5th</option>
						  <option value="6th">6th</option>
						  <option value="7th">7th</option>
						  <option value="8th">8th</option>
						  <option value="9th">9th</option>
						  <option value="10th">10th</option>
						</select>
					  </div>
					  <div class="form-group profile_dropdown">
						<label for="">Section / Division</label>
						<select name="division">
						  <option value="A">A</option>
						  <option value="B">B</option>
						  <option value="C">C</option>
						  <option value="D">D</option>
						</select>
					  </div>
					  <div class="content">
						<p class="error" id="child_form_error" style="display: none;"></p>
						<button type="button" class="btn" id="submit-child-btn">Add a Child</button>
					  </div>
					</div>
			  </div>
			</form>
		</div>
		<!-- modal-content -->
	</div>
	<!-- modal-dialog -->
</div>
<!-- modal -->
<!--no mobile support pop up Modal -->
<div class="modal modal-box fade contact-popup overlayCenter_popup" id="NomobileSuppportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
		  <div class="modal-title" id="exampleModalLabel">
			<img src="<?php echo bloginfo('template_url').'/assets/images/logo-modal.svg'?>" class="modal-img" height="auto" width="100%"/>
		  </div>
		  <button type="button" class="close" data-dismiss="modal" id="close_popup" aria-label="Close">
			<span>&times;</span>
		  </button>
	  </div>
	  <div class="modal-body">
		<p>Please use a Laptop/Desktop to go through the Course Videos, Quizzes and submit Assignments.</p>
	  </div>
	</div>
  </div>
</div>
<div class="course-filter-wrapper">
	<div class="course-filter-header">
		<h3 class="filter-title">Filter By</h3>
		<button class="course-close" type="button"></button>
	</div>
	<form action="<?php echo site_url('/'); ?>" method="get" id="searchform" class="course-filter-copy">
		  <span class="section-title">Sessions</span>
		  <?php
			$session_array = array(array("name"=>"1 - 10 Sessions",
			  "value"=>"1,10"),
			  array("name"=>"11 - 20 Sessions",
			  "value"=>"11,20"),
			  array("name"=>"21 - 30 Sessions",
			  "value"=>"21,30"),
			  array("name"=>"31+ Sessions",
			  "value"=>"31"),
			);
			$i = 0;
			if(isset($_GET['session'])){
			  $get_session = $_GET['session'];
			}
			if(isset($_GET['session'])){
			  $session_selected_array = array();
			  $get_session = $_GET['session'];
			  $selected_session = explode(",",$get_session);
			  if(count($selected_session) == 1 ){
				$sessionFirstEle = $selected_session[0];
				$session_selected_array['0'] =  $sessionFirstEle;
			  }
			  else if(count($selected_session) == 2 ){
				$sessionFirstEle = $selected_session[0];
				$sessionSecondEle = $selected_session[1];
				$session_selected_array['0'] =  $sessionFirstEle.','.$sessionSecondEle;
			  }
			  else if(count($selected_session) == 3 ){
				$sessionFirstEle = $selected_session[0];
				$sessionSecondEle = $selected_session[1];
				$sessionThirdEle = $selected_session[2];
				$session_selected_array['0'] =  $sessionFirstEle.','.$sessionSecondEle;
				$session_selected_array['1'] =  $sessionThirdEle;
			  }
			  else if(count($selected_session) == 4){
				$sessionFirstEle = $selected_session[0];
				$sessionSecondEle = $selected_session[1];
				$sessionThirdEle = $selected_session[2];
				$sessionFourthEle = $selected_session[3];
				$session_selected_array['0'] =  $sessionFirstEle.','.$sessionSecondEle;
				$session_selected_array['1'] =  $sessionThirdEle.','.$sessionFourthEle;
			  }
			  else if(count($selected_session) == 5){
				$sessionFirstEle = $selected_session[0];
				$sessionSecondEle = $selected_session[1];
				$sessionThirdEle = $selected_session[2];
				$sessionFourthEle = $selected_session[3];
				$sessionFifthEle = $selected_session[4];
				$session_selected_array['0'] =  $sessionFirstEle.','.$sessionSecondEle;
				$session_selected_array['1'] =  $sessionThirdEle.','.$sessionFourthEle;
				$session_selected_array['2'] =  $sessionFifthEle;
			  }
			  else if(count($selected_session) == 6){
				$sessionFirstEle = $selected_session[0];
				$sessionSecondEle = $selected_session[1];
				$sessionThirdEle = $selected_session[2];
				$sessionFourthEle = $selected_session[3];
				$sessionFifthEle = $selected_session[4];
				$sessionSixthEle = $selected_session[5];
				$session_selected_array['0'] =  $sessionFirstEle.','.$sessionSecondEle;
				$session_selected_array['1'] =  $sessionThirdEle.','.$sessionFourthEle;
				$session_selected_array['2'] =  $sessionFifthEle.','.$sessionSixthEle;
			  }
			  else if(count($selected_session) == 7){
				$sessionFirstEle = $selected_session[0];
				$sessionSecondEle = $selected_session[1];
				$sessionThirdEle = $selected_session[2];
				$sessionFourthEle = $selected_session[3];
				$sessionFifthEle = $selected_session[4];
				$sessionSixthEle = $selected_session[5];
				$sessionSeventhEle = $selected_session[6];
				$session_selected_array['0'] =  $sessionFirstEle.','.$sessionSecondEle;
				$session_selected_array['1'] =  $sessionThirdEle.','.$sessionFourthEle;
				$session_selected_array['2'] =  $sessionFifthEle.','.$sessionSixthEle;
				$session_selected_array['3'] =  $sessionSeventhEle;
			  }
			}
		  ?>
		  <ul>
			<?php foreach($session_array as $sessions){
			  if( $session_selected_array && in_array( $sessions['value'], $session_selected_array ) ){
				$session_selected = 'checked';
			  }
			  else{
				$session_selected = '';
			  }
			?>
			  <li>
				  <label for="session<?php echo $i;?>" id="">
					  <span class="copy"><?php echo $sessions['name']?></span>
					  <input type="checkbox" name="sessions" value="<?php echo $sessions['value']?>" <?php echo $session_selected;?>>
				  </label>
			  </li>
			<?php $i++; } ?>
		  </ul>
		  <span class="section-title">Age</span>
		  <?php
			$age_array = array(array("name"=>"3 - 7 Years",
			  "value"=>"3,7"),
			  array("name"=>"8 - 11 Years",
			  "value"=>"8,11"),
			  array("name"=>"12 - 16 Years",
			  "value"=>"12,16"),
			  array("name"=>"17+ Years",
			  "value"=>"17"),
			);
			$i = 0;
			if(isset($_GET['age'])){
			  $age_selected_array = array();
			  $get_age = $_GET['age'];
			  $selected_age = explode(",",$get_age);
			  if(count($selected_age) == 1 ){
				$ageFirstEle = $selected_age[0];
				$age_selected_array['0'] =  $ageFirstEle;
			  }
			  else if(count($selected_age) == 2 ){
				$ageFirstEle = $selected_age[0];
				$ageSecondEle = $selected_age[1];
				$age_selected_array['0'] =  $ageFirstEle.','.$ageSecondEle;
			  }
			  else if(count($selected_age) == 3 ){
				$ageFirstEle = $selected_age[0];
				$ageSecondEle = $selected_age[1];
				$ageThirdEle = $selected_age[2];
				$age_selected_array['0'] =  $ageFirstEle.','.$ageSecondEle;
				$age_selected_array['1'] =  $ageThirdEle;
			  }
			  else if(count($selected_age) == 4){
				$ageFirstEle = $selected_age[0];
				$ageSecondEle = $selected_age[1];
				$ageThirdEle = $selected_age[2];
				$ageFourthEle = $selected_age[3];
				$age_selected_array['0'] =  $ageFirstEle.','.$ageSecondEle;
				$age_selected_array['1'] =  $ageThirdEle.','.$ageFourthEle;
			  }
			  else if(count($selected_age) == 5){
				$ageFirstEle = $selected_age[0];
				$ageSecondEle = $selected_age[1];
				$ageThirdEle = $selected_age[2];
				$ageFourthEle = $selected_age[3];
				$ageFifthEle = $selected_age[4];
				$age_selected_array['0'] =  $ageFirstEle.','.$ageSecondEle;
				$age_selected_array['1'] =  $ageThirdEle.','.$ageFourthEle;
				$age_selected_array['2'] =  $ageFifthEle;
			  }
			  else if(count($selected_age) == 6){
				$ageFirstEle = $selected_age[0];
				$ageSecondEle = $selected_age[1];
				$ageThirdEle = $selected_age[2];
				$ageFourthEle = $selected_age[3];
				$ageFifthEle = $selected_age[4];
				$ageSixthEle = $selected_age[5];
				$age_selected_array['0'] =  $ageFirstEle.','.$ageSecondEle;
				$age_selected_array['1'] =  $ageThirdEle.','.$ageFourthEle;
				$age_selected_array['2'] =  $ageFifthEle.','.$ageSixthEle;
			  }
			  else if(count($selected_age) == 7){
				$ageFirstEle = $selected_age[0];
				$ageSecondEle = $selected_age[1];
				$ageThirdEle = $selected_age[2];
				$ageFourthEle = $selected_age[3];
				$ageFifthEle = $selected_age[4];
				$ageSixthEle = $selected_age[5];
				$ageSeventhEle = $selected_age[6];
				$age_selected_array['0'] =  $ageFirstEle.','.$ageSecondEle;
				$age_selected_array['1'] =  $ageThirdEle.','.$ageFourthEle;
				$age_selected_array['2'] =  $ageFifthEle.','.$ageSixthEle;
				$age_selected_array['3'] =  $ageSeventhEle;
			  }
			}
		  ?>
		  <ul>
			<?php foreach($age_array as $age){
			  if( $age_selected_array && in_array( $age['value'], $age_selected_array ) ){
				$age_selected = 'checked';
			  }
			  else{
				$age_selected = '';
			  }
			?>
			  <li>
				<label for="age<?php echo $i;?>" id="">
					<span class="copy"><?php echo $age['name']?></span>
					<input type="checkbox" name="age" value="<?php echo $age['value']?>" <?php echo $age_selected;?>>
				</label>
			  </li>
			<?php $i++; } ?>
		  </ul>
		  <span class="section-title">Course Categories</span>
		   <ul>
		  <?php
		  $args = apply_filters('wplms_course_nav_cats',array(
			  'taxonomy'=>'course-cat',
			  'hide_empty'=>false,
			  'hierarchial'=>1,
			));

		  $course_category_array = get_terms($args);
		  $course_category = json_decode( json_encode($course_category_array), true);

		  $i = 0;
		  if(isset($_GET['category'])){
			$get_category = $_GET['category'];
		  }
		  $selected_category = explode(",",$get_category);
		  foreach($course_category as $category){
			if(in_array($category['term_id'],$selected_category)){
			  $category_selected = 'checked';
			}
			else{
			  $category_selected = '';
			}
		  ?>
			  <li>
				  <label for="category<?php echo $i;?>" id="">
					  <span class="copy"><?php echo $category['name']?></span>
					  <input type="checkbox" name="category" value="<?php echo $category['term_id'];?>" <?php echo $category_selected;?>>
				  </label>
			  </li>
		<?php $i++;}?>
		  </ul>
	</form>
	<div class="filter-action">
		<button class="white-button" type="button" id="apply_filters">Apply Filters</button>
		<button class="reset" type="button" id="reset">Reset</button>
	</div>
</div>
<div class="modal" id="liveCourseModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      	<div class="modal-header">
            <div class="header-close"></div>
            <div class="header-logo"></div>
            <div class="submitheading"><h1 id="live_course_name"></h1></div>
          	</div>

    <form class="variations_form cart live-course-details" data-product_id="" data-product_variations="false" id="product_slot">
    	<div class="alert-note" style="display: none;">
              <span class="light-red">
                <img src="<?php echo bloginfo('template_url')?>/assets/images/alert.svg">Please select the Preferred Date and Time Slot to join the course.
              </span>
            </div>
    	<div class="batch_details">
	       		<div class="batch_list">
	              	<div class="heading">
	                	<h6>Select Preferred Date</h6>
	              	</div>
	      			<div id="div1"></div>
	      		</div>
	      		<div class="batch_list" id="select-time-slot" style="display: none;">
	             	<div class="heading">
	                	<h6>Select Time Slot</h6>
	              	</div>
	          		<div id="div2"></div>
	          	</div>
	        </div>
	        <div id="spinner-show">
	        	<div class="spinner-img"></div>
	        </div>
    	<input type="hidden" name="action" value="get_variation">
    	<input type="hidden" name="attribute_slot-date" id="attribute_slot-date" value="">
    	<input type="hidden" name="attribute_slot-time" id="attribute_slot-time" value="">
  
		<input type="hidden" name="add-to-cart" value="" id="add-to-cart"/>
		<input type="hidden" name="product_id" value="" id="product_id"/>
		<input type="hidden" name="cart_url" id="cart_url" value="<?php echo wc_get_cart_url() ?>" />
		<input type="hidden" name="variation_id" class="variation_id" value="0" id="variation_id"/>
        <div class="note" style="display: none;">
            <span class="light-blue" id="slot_note"></span>
        </div>
		<div class="transparent-note" style="display:none;">
          	<span class="transparent">
            	The class schedule is subject to change. Please note that the final schedule will be communicated over email.
          	</span>
        </div>
		<div class="livecourse_button">
	    	<button type="button" class="btn" id="join_this_course">Join this Course</button>
	  	</div>
	</form>
        
      </div>
    </div>
  </div>
<!-- modal -->

<?php do_action('woocommerce_check_and_trigger_signup_tag'); ?>
<?php if(isset($_SESSION['sign_up_data']))
{ ?>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			var signUpDataLayerObj = JSON.parse('<?php echo json_encode($_SESSION["sign_up_data"]["datalayer"]); ?>');
			var signUpDataMoengObj = JSON.parse('<?php echo json_encode($_SESSION["sign_up_data"]["moengage"]); ?>');
			console.log(signUpDataLayerObj);
			dataLayer.push(signUpDataLayerObj);

			signUpDataMoengObj.event = "mo_" + "<?php echo $_SESSION['sign_up_data']['moengage_type']; ?>";
			dataLayer.push({ ecommerce: null }); 
			dataLayer.push(signUpDataMoengObj);
			// Moengage.track_event("<?php //echo $_SESSION['sign_up_data']['moengage_type']; ?>", signUpDataMoengObj);
		});
	</script>
	<?php unset($_SESSION['sign_up_data']);
} ?>

<script type="text/javascript">
	jQuery('#reset').click(function(){
		jQuery("input[name='category']:checkbox").prop('checked',false);
		jQuery("input[name='sessions']:checkbox").prop('checked',false);
		jQuery("input[name='age']:checkbox").prop('checked',false);
	})

	jQuery( ".epaper a" ).click(function() {
	  let ePaperViewedMoegObj = {
			"User identifier"	: jQuery("#user_identifier").val(),
			"Session source"	: jQuery("#session_source").val(),
			"Timestamp"			: jQuery("#timestamp").val(),
			"UTM tags"			: jQuery("#utm_tags").val(),
		}
	   	ePaperViewedMoegObj.event = "mo_ePaper_Viewed";
	   	dataLayer.push({ ecommerce: null }); 
	   	dataLayer.push(ePaperViewedMoegObj);
	   	// Moengage.track_event("ePaper_Viewed", ePaperViewedMoegObj);
	});
	jQuery( ".logos a" ).click(function() {
		let visitedMoejObj = {
			"User identifier"	: jQuery("#user_identifier").val(),
			"Session source"	: jQuery("#session_source").val(),
			"Timestamp"			: jQuery("#timestamp").val(),
			"UTM tags"			: jQuery("#utm_tags").val(),
			"HT Property name"	: jQuery(this).attr("href"),
		}

		visitedMoejObj.event = "mo_HT_Property_Visited";
		dataLayer.push({ ecommerce: null }); 
		dataLayer.push(visitedMoejObj);
		// Moengage.track_event("HT_Property_Visited", visitedMoejObj);

		let visitedObj = {
			"event"		: 'ht_property_visited',
			"ecommerce"	: {
				"items" : jQuery(this).attr("href"),
			}
		};

		dataLayer.push(visitedObj);
	});

  jQuery('#close_popup').click(function(){
	location.reload();
  });

  jQuery('#apply_filters').click(function(){
	applyFilter();
  });

  jQuery('#sort_by').change(function(){
	applyFilter();
  });

  function applyFilter() {
	var form_data = {};

	var temp1 = [];
	jQuery("input:checkbox[name=category]:checked").each(function () {
	  temp1.push(jQuery(this).val());
	});

	var temp2 = [];
	jQuery("input:checkbox[name=sessions]:checked").each(function () {
	  temp2.push(jQuery(this).val());
	});

	var temp3 = [];
	jQuery("input:checkbox[name=age]:checked").each(function () {
	  temp3.push(jQuery(this).val());
	});

	var sort_by = jQuery("#sort_by").val();

	if(temp1.length > 0)  form_data.category = temp1.join(",");
	if(temp2.length > 0)  form_data.session = temp2.join(",");
	if(temp3.length > 0)  form_data.age = temp3.join(",");
	if(sort_by != '' && sort_by != undefined) form_data.sort_by = sort_by;

	var current_url = site_url+'/courses/'.split('?')[0];

	if(Object.keys(form_data).length === 0) {
	  window.location.href = current_url;
	} else {
	  window.location.href = current_url + '?' + jQuery.param(form_data);
	}
  }

</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
	document.addEventListener( 'wpcf7mailsent', function( event ) {
		jQuery('.new-footer #submit-email').hide();
		jQuery('.new-footer #emailAddress').hide();
		jQuery('.new-footer .screen-reader-response').hide();
	}, false );

	jQuery('.custom-price').each(function(){
		let price    = 0;
		let courseID = jQuery(this).attr('data-id');

		if(jQuery(this).find('.woocommerce-Price-amount').length > 0) {
			price = jQuery(this).find('.woocommerce-Price-amount').html().replace(/<[^>]*>?/gm, "").replace("₹", "").replace(",", "");
		}

		jQuery('#course_price_'+courseID).val(parseFloat(price).toFixed(2));
	});

	jQuery(document).ready(function(){
		jQuery('.live_course_class .the_course_button').click(function(e){
			jQuery(".alert-note").css('display','none');
			var course_id = jQuery(this).data('id');
			var course_name = jQuery('#course_name_' + course_id).val();
			jQuery('#live_course_name').text(course_name);
			jQuery('#div2').html('');
			jQuery('#div1').html('');
			jQuery('#select-time-slot').css('display','none');
			jQuery('.note').css('display','none');
			jQuery('.transparent-note').hide();
			if(jQuery(this).find('a').text().toLowerCase() == "join course") {
				e.preventDefault();
				var link = jQuery(this).find('a').attr("href");
				var removeLink = jQuery(this).find('a').attr("href", 'javascript:void(0)');
				jQuery('#div1').html('');
				jQuery("#spinner-show").addClass('spinner-show');
				jQuery(".spinner-img").show();
				jQuery('#slot_note').text('');
				jQuery.ajax({
					type : "POST",
					dataType : "json",
					url : "<?php echo home_url(); ?>/wp-admin/admin-ajax.php?action=get_product_slot",
					data : {course_id : course_id},
					success: function(response) {
						if(response == 0){
							window.location.href = link;
						}
						else{
							jQuery("#spinner-show").removeClass('spinner-show');
							jQuery(".spinner-img").hide();
							jQuery("#add-to-cart").val(response.product_id);
							jQuery("#product_id").val(response.product_id);
							var html = '';
							response.slot_date.forEach(function(element) {  
							    html += "<span class='list' id='slot_date'><input type='radio' name='slot_date' value='"+element+"'>"+moment(element).format('D MMM')+"</span>";  
							}); 
							jQuery('#div1').append(html);
							jQuery('.list input:radio[name="slot_date"]').change(function(){
								// jQuery("input:radio[name='slot_date']:checked").parent().addClass("checked");
								jQuery('input:not(:checked)').parent().removeClass("selected");
	        					jQuery('input:checked').parent().addClass("selected");
								
								var selected_slot_date = jQuery(this).val();
								// jQuery(this).parent().addClass('selected');
								jQuery('#attribute_slot-date').val(selected_slot_date);
								jQuery("#spinner-show").addClass('spinner-show');
								jQuery(".spinner-img").show();
								jQuery('.note').css('display','none');
								jQuery('#slot_note').text('');
								jQuery('.transparent-note').hide();
						        jQuery.ajax({
									type : "POST",
									dataType : "json",
									url : "<?php echo home_url(); ?>/wp-admin/admin-ajax.php?action=get_product_slot_time",
									data : {course_id : course_id,selected_slot_date:selected_slot_date},
									
									success: function(response) {
									jQuery("#spinner-show").removeClass('spinner-show');
									jQuery(".spinner-img").hide();
										jQuery('#div2').html('');
										var html = '';
										response.forEach(function(element) { 
											var disabled_class = '' 
											if(element.max_qty <=0){
												disabled_class = 'disable'
											}
										    html += "<span class='list time "+disabled_class+" ' id='slot_time'><input type='radio' name='slot_time' value='"+element.slot_time+"'>"+moment(element.slot_time, ["HH:mm"]).format("hh:mm A")+"</span>";  
										}); 
										jQuery('#select-time-slot').css('display','block');

										jQuery('#div2').append(html);
										jQuery("#div2" ).change(function(){

											jQuery('input:not(:checked)').parent().removeClass("selected");
	        								jQuery('input:checked').parent().addClass("selected");
											var sort_time = jQuery("input:radio[name=slot_time]:checked").val();
											// jQuery("input:radio[name=slot_time]").parent().addClass('selected');
											jQuery('#attribute_slot-time').val(sort_time);
											jQuery("#spinner-show").addClass('spinner-show');
											jQuery(".spinner-img").show();
											jQuery.ajax({
													type : "POST",
												dataType : "json",
												url : "<?php echo home_url(); ?>/?wc-ajax=get_variation",
												data : jQuery("#product_slot").serialize(),
													success: function(data) {
														jQuery('#variation_id').val(data.variation_id);
														jQuery('.note').css('display','block');
														jQuery('#slot_note').html(jQuery(data.variation_description).text());
														jQuery('.transparent-note').show();
														jQuery("#spinner-show").removeClass('spinner-show');
														jQuery(".spinner-img").hide();
													},
													error: function(data) {
													}
												});
										});
										
										//jQuery("#liveCourseModal").modal("show");
									}
								});
						    });
							jQuery("#liveCourseModal").modal("show");
						}
					}
				});
			}
		});

		jQuery('.the_course_button').click(function(e){
			if(jQuery(this).find('a').text().toLowerCase() == "join course") {

				e.preventDefault();
				var link = jQuery(this).find('a').attr("href");

				var addToCartItem	= [];
				let courseID		= jQuery(this).attr('data-id');

				addToCartItem.push({
					"price"				: jQuery("#course_price_" + courseID).val(),
					"item_name"			: jQuery("#course_name_" + courseID).val(),
					"item_id"			: parseInt(jQuery("#course_id_" + courseID).val()),
					"item_category"		: jQuery("#course_category_" + courseID).val(),
					"course_url"		: jQuery("#course_url_" + courseID).val(),
					"course_partner"	: jQuery("#course_partner_" + courseID).val(),
					"category_id"		: parseInt(jQuery("#category_id_" + courseID).val()),
					"age_group"			: jQuery("#age_group_" + courseID).val(),
					"course_duration"	: jQuery("#course_duration_" + courseID).val(),
					"session_duration"	: jQuery("#session_duration_" + courseID).val(),
					"wishlisted_course"	: jQuery("#wishlisted_course_" + courseID).val() == "1" ? true : false,
				});

				let addToCartObj = {
					"event"				: 'add_to_cart',
					"user_identifier"	: jQuery("#footer_user_identifier").val(),
					"session_source"	: jQuery("#footer_session_source").val(),
					"timestamp"			: jQuery("#footer_timestamp").val(),
					"utm_tags"			: jQuery("#footer_utm_tags").val(),
					"ecommerce"			: {
						"items" : addToCartItem,
					}
				};

				let addToCartMoegObj = {
					"User identifier"	: jQuery("#footer_user_identifier").val(),
					"Session source"	: jQuery("#footer_session_source").val(),
					"Timestamp"			: jQuery("#footer_timestamp").val(),
					"UTM tags"			: jQuery("#footer_utm_tags").val(),
					"Course name"		: jQuery("#course_name_" + courseID).val(),
					"Course URL"		: jQuery("#course_url_" + courseID).val(),
					"Course category"	: jQuery("#course_category_" + courseID).val(),
					"Course partner"	: jQuery("#course_partner_" + courseID).val(),
					"Category ID"		: parseInt(jQuery("#category_id_" + courseID).val()),
					"Course ID"			: parseInt(jQuery("#course_id_" + courseID).val()),
					"Course Price"		: jQuery("#course_price_" + courseID).val(),
					"Age group"			: jQuery("#age_group_" + courseID).val(),
					"Course duration"	: jQuery("#course_duration_" + courseID).val(),
					"Session duration"	: jQuery("#session_duration_" + courseID).val(),
					"Wishlisted course"	: jQuery("#wishlisted_course_" + courseID).val(),
				};

				// dataLayer.push({ ecommerce: null });
				dataLayer.push(addToCartObj);
				console.log(addToCartObj);
				addToCartMoegObj.event = "mo_Added_To_Cart";
				dataLayer.push(addToCartMoegObj);
				// Moengage.track_event("Added_To_Cart", addToCartMoegObj);

				setTimeout(function(){
					window.location.href = link;
				}, 500);
			}
		});

		jQuery('.add_to_wishlist').click(function(e){

			e.preventDefault();
			var addToWishlistItem	= [];
			let courseID			= jQuery(this).attr('data-id');
			var link				= jQuery(this).attr("href");

			addToWishlistItem.push({
				"price"				: jQuery("#course_price_" + courseID).val(),
				"item_name"			: jQuery("#course_name_" + courseID).val(),
				"course_url"		: jQuery("#course_url_" + courseID).val(),
				"item_category"		: jQuery("#course_category_" + courseID).val(),
				"course_partner"	: jQuery("#course_partner_" + courseID).val(),
				"category_id"		: parseInt(jQuery("#category_id_" + courseID).val()),
				"item_id"			: parseInt(jQuery("#course_id_" + courseID).val()),
				"age_group"			: jQuery("#age_group_" + courseID).val(),
				"course_duration"	: jQuery("#course_duration_" + courseID).val(),
				"session_duration"	: jQuery("#session_duration_" + courseID).val(),
			});

			let addWishlistObj = {
				"event"				: 'add_to_wishlist',
				"user_identifier"	: jQuery("#footer_user_identifier").val(),
				"session_source"	: jQuery("#footer_session_source").val(),
				"timestamp"			: jQuery("#footer_timestamp").val(),
				"utm_tags"			: jQuery("#footer_utm_tags").val(),
				"ecommerce"			: {
					"items" : addToWishlistItem,
				}
			};

			let addWishlistMoegObj = {
				"User identifier"	: jQuery("#footer_user_identifier").val(),
				"Session source"	: jQuery("#footer_session_source").val(),
				"Timestamp"			: jQuery("#footer_timestamp").val(),
				"UTM tags"			: jQuery("#footer_utm_tags").val(),
				"Course name"		: jQuery("#course_name_" + courseID).val(),
				"Course URL"		: jQuery("#course_url_" + courseID).val(),
				"Course category"	: jQuery("#course_category_" + courseID).val(),
				"Course partner"	: jQuery("#course_partner_" + courseID).val(),
				"Course ID"			: parseInt(jQuery("#course_id_" + courseID).val()),
				"Age Group"			: jQuery("#age_group_" + courseID).val(),
				"Session duration"	: jQuery("#course_duration_" + courseID).val(),
				"Course duration"	: jQuery("#session_duration_" + courseID).val(),
				"Course price"		: jQuery("#course_price_" + courseID).val(),
			};

			// dataLayer.push({ ecommerce: null });
			dataLayer.push(addWishlistObj);
			console.log(addWishlistObj);
	        dataLayer.push({ ecommerce: null });
			addWishlistMoegObj.event = "mo_Course_Wishlisted";
			dataLayer.push(addWishlistMoegObj);
			// Moengage.track_event("Course_Wishlisted", addWishlistMoegObj);

			setTimeout(function(){
				window.location.href = link;
			}, 500);
		});

		jQuery('.select_course_item').click(function(e){

			e.preventDefault();
			var selectCourseItem	= [];
			let courseID			= jQuery(this).attr('data-id');
			var link				= jQuery(this).attr("href");

			selectCourseItem.push({
				"price"				: jQuery("#course_price_" + courseID).val(),
				"item_name"			: jQuery("#course_name_" + courseID).val(),
				"course_url"		: jQuery("#course_url_" + courseID).val(),
				"item_category"		: jQuery("#course_category_" + courseID).val(),
				"course_partner"	: jQuery("#course_partner_" + courseID).val(),
				"category_id"		: parseInt(jQuery("#category_id_" + courseID).val()),
				"item_id"			: parseInt(jQuery("#course_id_" + courseID).val()),
				"age_group"			: jQuery("#age_group_" + courseID).val(),
				"course_duration"	: jQuery("#course_duration_" + courseID).val(),
				"session_duration"	: jQuery("#session_duration_" + courseID).val(),
			});

			let selectCourseObj = {
				"event"				: 'select_item',
				"user_identifier"	: jQuery("#footer_user_identifier").val(),
				"session_source"	: jQuery("#footer_session_source").val(),
				"timestamp"			: jQuery("#footer_timestamp").val(),
				"utm_tags"			: jQuery("#footer_utm_tags").val(),
				"ecommerce"			: {
					"items" : selectCourseItem,
				}
			};

			// dataLayer.push({ ecommerce: null });
			dataLayer.push(selectCourseObj);
			console.log(selectCourseObj);

			setTimeout(function(){
				window.location.href = link;
			}, 500);
		});

		if(jQuery('.all_courses_list').length > 0) {

			var itemListName	= "";
			var allCourseItem	= [];

			jQuery('.all_courses_list').each(function(){

				let courseID = jQuery(this).attr('data-id');

				if(typeof jQuery(this).attr('data-name') != "undefined") {
					itemListName = jQuery(this).attr('data-name');
				}

				allCourseItem.push({
					"price"				: jQuery("#course_price_" + courseID).val(),
					"item_name"			: jQuery("#course_name_" + courseID).val(),
					"course_url"		: jQuery("#course_url_" + courseID).val(),
					"item_category"		: jQuery("#course_category_" + courseID).val(),
					"course_partner"	: jQuery("#course_partner_" + courseID).val(),
					"category_id"		: parseInt(jQuery("#category_id_" + courseID).val()),
					"item_id"			: parseInt(jQuery("#course_id_" + courseID).val()),
					"age_group"			: jQuery("#age_group_" + courseID).val(),
					"course_duration"	: jQuery("#course_duration_" + courseID).val(),
					"session_duration"	: jQuery("#session_duration_" + courseID).val(),
				});
			});

			let allCourseObj = {
				"event"				: 'view_item_list',
				"user_identifier"	: jQuery("#footer_user_identifier").val(),
				"session_source"	: jQuery("#footer_session_source").val(),
				"timestamp"			: jQuery("#footer_timestamp").val(),
				"utm_tags"			: jQuery("#footer_utm_tags").val(),
				"ecommerce"			: {
					"items" : allCourseItem,
				}
			};

			if(itemListName == "other_courses")	allCourseObj.item_list_name = itemListName;

			let allCourseListMoegObj = {
				"User identifier"	: jQuery("#footer_user_identifier").val(),
				"Session source"	: jQuery("#footer_session_source").val(),
				"Timestamp"			: jQuery("#footer_timestamp").val(),
				"UTM tags"			: jQuery("#footer_utm_tags").val(),
			}

			if(allCourseItem.length > 0) {
				// dataLayer.push({ ecommerce: null });
				dataLayer.push(allCourseObj);
				console.log(allCourseObj);

				if(itemListName == "course") {
					
					allCourseListMoegObj.event = "mo_All_Courses_Viewed";
					dataLayer.push({ ecommerce: null }); 
					dataLayer.push(allCourseListMoegObj);
					// Moengage.track_event("All_Courses_Viewed", allCourseListMoegObj);
				}
			}
		}

		jQuery('.a2a_button_facebook').click(function(e){
			courseShared(jQuery(this).parent().attr('data-id'), 'facebook');
		});

		jQuery('.a2a_button_twitter').click(function(e){
			courseShared(jQuery(this).parent().attr('data-id'), 'twitter');
		});

		jQuery('.a2a_button_pinterest').click(function(e){
			courseShared(jQuery(this).parent().attr('data-id'), 'pinterest');
		});

		jQuery('.a2a_button_google_gmail').click(function(e){
			courseShared(jQuery(this).parent().attr('data-id'), 'gmail');
		});

		jQuery('.a2a_button_whatsapp').click(function(e){
			courseShared(jQuery(this).parent().attr('data-id'), 'whatsapp');
		});

		jQuery('.a2a_button_telegram').click(function(e){
			courseShared(jQuery(this).parent().attr('data-id'), 'telegram');
		});

		function courseShared(courseID, shareChannel) {
			let courseSharedMoegObj = {
				"User identifier"	: jQuery("#footer_user_identifier").val(),
				"Session source"	: jQuery("#footer_session_source").val(),
				"Timestamp"			: jQuery("#footer_timestamp").val(),
				"UTM tags"			: jQuery("#footer_utm_tags").val(),
				"Course name"		: jQuery("#course_name_" + courseID).val(),
				"Course URL"		: jQuery("#course_url_" + courseID).val(),
				"Course category"	: jQuery("#course_category_" + courseID).val(),
				"Course ID"			: parseInt(jQuery("#course_id_" + courseID).val()),
				"Course partner"	: jQuery("#course_partner_" + courseID).val(),
				"Age Group"			: jQuery("#age_group_" + courseID).val(),
				"Session duration"	: jQuery("#course_duration_" + courseID).val(),
				"Course duration"	: jQuery("#session_duration_" + courseID).val(),
				"Course price"		: jQuery("#course_price_" + courseID).val(),
				"Share channel"		: shareChannel,
			}

			courseSharedMoegObj.event = "mo_Course_Shared";
			dataLayer.push({ ecommerce: null }); 
			dataLayer.push(courseSharedMoegObj);
			// Moengage.track_event("Course_Shared", courseSharedMoegObj););
		}
	});
	jQuery( "#slot-time" ).change(function(){
		jQuery.ajax({
				type : "POST",
			dataType : "json",
			url : "<?php echo home_url(); ?>/?wc-ajax=get_variation",
			data : jQuery("#product_slot").serialize(),
				success: function(data) {
					jQuery('#variation_id').val(data.variation_id);
				},
				error: function(data) {
				}
			});
	});
	jQuery(".header-close").click(function(){
		jQuery('#liveCourseModal').modal("hide");
	});
	jQuery("#join_this_course").click(function(){
		// var slot_date = jQuery("input[name='attribute_slot-date']:checked").val();
		// var slot_time = jQuery("input[name='attribute_slot-time']:checked").val();
		var slot_date = jQuery("input[name='slot_date']:checked").val();
		var slot_time = jQuery("input[name='slot_time']:checked").val();
		var cart_url = jQuery("#cart_url").val();
		
		var variation_id = jQuery('#variation_id').val();
		if(slot_date == '' || slot_date == undefined || slot_date == null){
			jQuery(".alert-note").css('display','block');
		}
		else if(slot_time == '' || slot_time == undefined || slot_time == null){
			jQuery(".alert-note").css('display','block');
		}
		else{
			window.location.href = cart_url + "?add-to-cart=" + variation_id;
		}
	})
</script>

<?php
wp_footer();
?>
</body>
</html>