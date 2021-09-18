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
<footer class="footer-wrapper">
	  <div class="footer-top">
	 	<svg class="logo" id="Group_18593" data-name="Group 18593" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 133.758 39.892">
                <title>HT-Schools</title>
            <defs>
            <clipPath id="clip-path">
            <path id="Path_24" data-name="Path 24" d="M350.052,13.031A12.594,12.594,0,0,1,354.6,30.162a12.534,12.534,0,0,1-21.682-12.581,12.594,12.594,0,0,1,17.131-4.551Z" transform="translate(-331.25 -11.36)"/>
            </clipPath>
            </defs>
            <path id="Path_1" data-name="Path 1" d="M112.088,17.8a15.148,15.148,0,0,0,1.853.87A25.968,25.968,0,0,1,117.2,20.23a7.431,7.431,0,0,1,2.344,2.228,6.245,6.245,0,0,1,1.016,3.654,6.858,6.858,0,0,1-4.065,6.454,10.293,10.293,0,0,1-4.456.917,11.929,11.929,0,0,1-4.194-.852,23.56,23.56,0,0,1-4.194-2.064l2.359-5.668a33.675,33.675,0,0,0,3.211,1.736,6.235,6.235,0,0,0,2.359.721,2.5,2.5,0,0,0,1.361-.328,1.032,1.032,0,0,0,.509-.917q0-.424-.572-.768a15.279,15.279,0,0,0-1.85-.87,22.3,22.3,0,0,1-3.211-1.54,7.468,7.468,0,0,1-2.308-2.246,6.307,6.307,0,0,1-1-3.654,7.308,7.308,0,0,1,1.031-3.881,6.819,6.819,0,0,1,2.934-2.606,10,10,0,0,1,4.39-.917,11.686,11.686,0,0,1,4.03.768,18.533,18.533,0,0,1,3.8,1.885L118.3,17.722a14.25,14.25,0,0,0-2.555-1.343,6.829,6.829,0,0,0-2.555-.557,2.049,2.049,0,0,0-1.212.328,1.028,1.028,0,0,0-.459.885C111.516,17.317,111.706,17.573,112.088,17.8Z" transform="translate(-73.064 -6.762)" fill="#fff"/>
            <path id="Path_2" data-name="Path 2" d="M182.836,31.671a12.571,12.571,0,0,1-3.291,1.424,13.371,13.371,0,0,1-3.622.509A12.2,12.2,0,0,1,169.9,32.13a10.494,10.494,0,0,1-4.146-4.161,12.533,12.533,0,0,1-1.489-6.192,12.565,12.565,0,0,1,1.489-6.192,10.475,10.475,0,0,1,4.146-4.161,12.2,12.2,0,0,1,6.028-1.474,14.058,14.058,0,0,1,6.585,1.7l-2.392,5.766A5.953,5.953,0,0,0,177,16.535a5.775,5.775,0,0,0-2.7.655,5.176,5.176,0,0,0-2.016,1.85,5.357,5.357,0,0,0,.015,5.5,5.161,5.161,0,0,0,2.013,1.835,5.739,5.739,0,0,0,2.654.64,5.663,5.663,0,0,0,3.473-1.147Z" transform="translate(-115.795 -6.987)" fill="#fff"/>
            <g id="Group_2" data-name="Group 2" transform="translate(0 2.153)">
            <g id="qu6ZpE.tif_1_">
            <g id="Group_1" data-name="Group 1">
            <path id="Path_3" data-name="Path 3" d="M13.358,7.23h.754a.466.466,0,0,0,.2.03,6.614,6.614,0,0,1,1.031.077,14.394,14.394,0,0,1,3.774.971,14.152,14.152,0,0,1,4.31,2.767,11.991,11.991,0,0,1,2.04,2.555,13.321,13.321,0,0,1,1.954,6.418,13.767,13.767,0,0,1-.491,4.5,13.176,13.176,0,0,1-3.711,6.124,13.543,13.543,0,0,1-4.128,2.588,13.939,13.939,0,0,1-4.447,1.013,14.534,14.534,0,0,1-3.577-.208,13.825,13.825,0,0,1-4.054-1.433,13.009,13.009,0,0,1-3.523-2.692A13.684,13.684,0,0,1,.039,21.758a13.948,13.948,0,0,1,.048-2.615A13.714,13.714,0,0,1,1.608,14.3a12.376,12.376,0,0,1,2.966-3.738A14.145,14.145,0,0,1,12.548,7.29,6.177,6.177,0,0,0,13.358,7.23ZM7.767,19.87V25c0,.429,0,.372-.369.378a3.422,3.422,0,0,0-1.179.1c-.226.083-.459.143-.688.214l-.661.2c-.039.012-.086.024-.11-.024s.006-.071.03-.1.063-.071.1-.1c.164-.185.366-.328.533-.506.274-.289.536-.587.8-.885a2.216,2.216,0,0,0,.614-1.5q0-4.043,0-8.083c0-.191-.054-.241-.244-.235a1.37,1.37,0,0,0-.155.018,5.548,5.548,0,0,1-1.156.051,9.243,9.243,0,0,0-1.313-.092A1.585,1.585,0,0,0,2.54,16.793a.14.14,0,0,0,.143.1c.086-.006.086-.071.1-.137a.667.667,0,0,1,.694-.643c.366-.027.733-.027,1.1-.021a1.043,1.043,0,0,0,.563-.164c.3-.176.611-.343.917-.512.036-.021.08-.054.113-.009s-.018.066-.039.092c-.289.4-.581.8-.867,1.209a3.446,3.446,0,0,0-.673,1.436,7.3,7.3,0,0,0-.051,1.111c0,.208-.012.22-.223.22-.292,0-.587,0-.879,0a.279.279,0,0,0-.262.134c-.274.393-.557.783-.837,1.173-.045.066-.1.134-.06.214s.131.071.208.071h1.9c.206,0,.22.018.223.226,0,.873.006,1.748,0,2.621a2.893,2.893,0,0,1-.435,1.471A13.09,13.09,0,0,1,3.2,26.735c-.048.06-.11.119-.071.208s.134.089.217.089H6.633A.349.349,0,0,0,6.814,27c.465-.271.894-.6,1.352-.882a.383.383,0,0,0,.182-.369c-.006-1.182,0-2.365,0-3.547,0-.334,0-.67,0-1,0-.08.009-.176.116-.17.277.018.554-.042.831-.009a4.14,4.14,0,0,0,.768.006c.39-.027.39-.033.39.351v3.863a.346.346,0,0,0,.083.289c.459.429.914.861,1.373,1.287.211.2.3.191.545.024.3-.208.608-.405.914-.608.226-.149.459-.295.679-.453.125-.089.125-.191.006-.265-.36-.223-.673-.512-1.028-.745a.314.314,0,0,1-.152-.286c0-.932,0-1.861,0-2.794,0-1.072.006-2.144,0-3.217a16.408,16.408,0,0,1,.173-3.127c.051-.268.077-.539.1-.81.018-.185-.063-.232-.226-.152-.131.066-.262.134-.39.2-.6.334-1.2.676-1.814.995a.489.489,0,0,0-.319.521c.03,1.036.012,2.073.012,3.106,0,.2-.03.226-.229.226-.533,0-1.066,0-1.6,0-.253,0-.265-.012-.265-.265V14.679c0-.069,0-.137,0-.2,0-.042-.012-.092-.057-.1a.687.687,0,0,0-.417,0c-.1.039-.06.158-.063.241C7.764,16.377,7.767,18.122,7.767,19.87Zm10.621.923c0,.974,0,1.948,0,2.919a.58.58,0,0,1-.143.4,2.61,2.61,0,0,0-.2.244c-.086.125-.182.122-.289.03a3.811,3.811,0,0,1-.891-1.1,4.484,4.484,0,0,1-.471-2.538,4.982,4.982,0,0,1,.548-1.82,4.286,4.286,0,0,1,.578-.876c.054-.063.1-.134.042-.214s-.113-.033-.17-.009a5.117,5.117,0,0,0-2.171,1.668,4.067,4.067,0,0,0-.7,1.477A4.936,4.936,0,0,0,15,24.588a3.783,3.783,0,0,0,.551.777,5.519,5.519,0,0,0,.956.828,4.634,4.634,0,0,0,1.439.646,6.266,6.266,0,0,0,1.915.143,5.161,5.161,0,0,0,3.127-1.257,3.789,3.789,0,0,0,1.31-2.594c.009-.074.012-.152-.08-.182s-.128.042-.164.107a3.55,3.55,0,0,1-.378.536,3.727,3.727,0,0,1-1.412,1.042c-.17.071-.185.06-.185-.128V17c0-.42,0-.414.429-.453a1.64,1.64,0,0,0,1.212-.667,4.344,4.344,0,0,0,.715-1.921c.009-.048.012-.1-.042-.122a.112.112,0,0,0-.131.021,2.123,2.123,0,0,0-.158.173,1.326,1.326,0,0,1-.905.509,7.681,7.681,0,0,1-1.456.021c-.944-.06-1.879-.223-2.826-.283a5.682,5.682,0,0,0-2.487.271,2.645,2.645,0,0,0-.786.45,2.277,2.277,0,0,0-.771,1.3,2.961,2.961,0,0,0,.11,1.424.217.217,0,0,0,.128.167c.131.042.217-.015.253-.17a1.667,1.667,0,0,1,1.069-1.239,4.13,4.13,0,0,1,1.543-.235,14.157,14.157,0,0,1,2.186.188c.045.006.107,0,.122.057s-.051.071-.089.092c-.48.259-.944.545-1.442.762a.607.607,0,0,0-.381.67C18.394,18.941,18.385,19.867,18.388,20.793Z" transform="translate(0 -7.23)" fill="#fff"/>
            <path id="Path_4" data-name="Path 4" d="M64.95,42.722v3.94c0,.244,0,.25-.241.3a5.211,5.211,0,0,1-2.424-.027c-.167-.042-.325-.113-.488-.17-.039-.015-.086-.024-.086-.077s.045-.066.08-.086c.378-.2.756-.405,1.132-.608.194-.1.381-.217.581-.313a.314.314,0,0,0,.188-.337c-.006-.59,0-1.182,0-1.772,0-1.4,0-2.794,0-4.191a.422.422,0,0,1,.155-.354,2.851,2.851,0,0,0,.366-.343c.194-.232.438-.146.67-.128.068,0,.071.066.074.119,0,.1,0,.188,0,.283C64.95,40.211,64.95,41.468,64.95,42.722Z" transform="translate(-43.331 -29.206)" fill="#fff"/>
            </g>
            </g>
            </g>
            <g id="Group_3" data-name="Group 3" transform="translate(30.616 32.543)">
            <path id="Path_5" data-name="Path 5" d="M106.758,103.82a1.264,1.264,0,0,1,.817.395,1.284,1.284,0,0,1,.331.92,1.439,1.439,0,0,1-.474,1.14,1.915,1.915,0,0,1-1.3.414H104.16V101.11h1.865a2.028,2.028,0,0,1,1.315.387,1.3,1.3,0,0,1,.478,1.064A1.168,1.168,0,0,1,106.758,103.82Zm-.773-1.9h-.909v1.53h.909a1.022,1.022,0,0,0,.673-.2.78.78,0,0,0,0-1.128A1.04,1.04,0,0,0,105.985,101.915Zm.128,3.969a.9.9,0,0,0,.646-.223.815.815,0,0,0,.231-.622.737.737,0,0,0-.239-.57.892.892,0,0,0-.63-.219h-1.044v1.634Z" transform="translate(-104.16 -101.11)" fill="#fff"/>
            <path id="Path_6" data-name="Path 6" d="M118.226,105.79h.869v3.73a1.76,1.76,0,0,1-.486,1.323,1.8,1.8,0,0,1-1.259.43,1.925,1.925,0,0,1-1.275-.383,1.265,1.265,0,0,1-.414-.964h.877a.688.688,0,0,0,.211.474.889.889,0,0,0,.586.155.83.83,0,0,0,.654-.267,1.223,1.223,0,0,0,.239-.833v-.47a1.271,1.271,0,0,1-1.2.614,1.248,1.248,0,0,1-1.016-.426,1.7,1.7,0,0,1-.355-1.12V105.79h.869v2.08c0,.642.267.964.8.964a.774.774,0,0,0,.665-.311,1.345,1.345,0,0,0,.227-.813Z" transform="translate(-111.077 -103.925)" fill="#fff"/>
            <path id="Path_7" data-name="Path 7" d="M132.18,106.689V101.11h.917v2.4h2.3v-2.4h.916v5.579H135.4V104.33h-2.3v2.359Z" transform="translate(-121.014 -101.11)" fill="#fff"/>
            <path id="Path_8" data-name="Path 8" d="M146.048,102.314a.665.665,0,1,1,.183-.458A.625.625,0,0,1,146.048,102.314Zm-.9,4.435v-3.714h.869v3.714Z" transform="translate(-128.69 -101.17)" fill="#fff"/>
            <path id="Path_9" data-name="Path 9" d="M150.44,109.36v-3.714h.869v.518a1.285,1.285,0,0,1,1.211-.614q1.357,0,1.355,1.474v2.335h-.869v-1.937a1.556,1.556,0,0,0-.183-.869.713.713,0,0,0-.63-.263.814.814,0,0,0-.654.267,1.122,1.122,0,0,0-.231.761v2.04Z" transform="translate(-131.998 -103.781)" fill="#fff"/>
            <path id="Path_10" data-name="Path 10" d="M164.073,101.11h.869v5.579h-.869v-.5a1.12,1.12,0,0,1-.5.434,1.59,1.59,0,0,1-.689.163,1.691,1.691,0,0,1-1.347-.55,2.058,2.058,0,0,1-.478-1.4,2.008,2.008,0,0,1,.5-1.4,1.726,1.726,0,0,1,1.347-.554,1.46,1.46,0,0,1,.685.159,1.16,1.16,0,0,1,.478.438Zm-1.06,4.9a1.01,1.01,0,0,0,.817-.335,1.4,1.4,0,0,0,0-1.69,1.14,1.14,0,0,0-1.61,0,1.384,1.384,0,0,0,0,1.7A1,1,0,0,0,163.013,106.011Z" transform="translate(-138.386 -101.11)" fill="#fff"/>
            <path id="Path_11" data-name="Path 11" d="M174.879,109.6a1.356,1.356,0,0,1-1-.375,1.49,1.49,0,0,1-.375-1.1V105.79h.869v2.12a1.2,1.2,0,0,0,.175.709.672.672,0,0,0,.582.239.823.823,0,0,0,.685-.267,1.1,1.1,0,0,0,.215-.705v-2.1h.869V109.5h-.869v-.518A1.2,1.2,0,0,1,174.879,109.6Z" transform="translate(-145.869 -103.925)" fill="#fff"/>
            <path id="Path_12" data-name="Path 12" d="M185.7,109.455a1.742,1.742,0,0,1-1.14-.359,1.1,1.1,0,0,1-.438-.877h.869a.463.463,0,0,0,.211.391.922.922,0,0,0,.546.151.594.594,0,0,0,.391-.12.4.4,0,0,0,.143-.319.356.356,0,0,0-.279-.391l-.956-.263a.98.98,0,0,1-.8-1.028.956.956,0,0,1,.4-.777,1.606,1.606,0,0,1,1.028-.315,1.648,1.648,0,0,1,1.088.319,1.041,1.041,0,0,1,.379.837h-.853a.427.427,0,0,0-.171-.363.762.762,0,0,0-.474-.132.639.639,0,0,0-.383.108.328.328,0,0,0-.151.275.391.391,0,0,0,.319.4l.885.255a1.3,1.3,0,0,1,.622.379.9.9,0,0,1,.239.618,1.1,1.1,0,0,1-.387.877A1.6,1.6,0,0,1,185.7,109.455Z" transform="translate(-152.257 -103.781)" fill="#fff"/>
            <path id="Path_13" data-name="Path 13" d="M194.9,107.074a2.638,2.638,0,0,0,.438-.032v.765a3.749,3.749,0,0,1-.646.048,2.05,2.05,0,0,1-.375-.032,1.386,1.386,0,0,1-.375-.147.763.763,0,0,1-.335-.4,1.9,1.9,0,0,1-.12-.725v-1.729h-.63v-.725h.63V102.97h.869v1.124h.853v.725h-.853v1.53a.927.927,0,0,0,.127.586A.526.526,0,0,0,194.9,107.074Z" transform="translate(-157.514 -102.229)" fill="#fff"/>
            <path id="Path_14" data-name="Path 14" d="M202.105,109.455a1.691,1.691,0,0,1-1.347-.55,2.058,2.058,0,0,1-.478-1.4,2.008,2.008,0,0,1,.5-1.4,1.726,1.726,0,0,1,1.347-.554,1.46,1.46,0,0,1,.685.159,1.159,1.159,0,0,1,.478.438v-.5h.869v3.714h-.869v-.5a1.12,1.12,0,0,1-.5.434A1.59,1.59,0,0,1,202.105,109.455Zm.128-.773a1.01,1.01,0,0,0,.817-.335,1.4,1.4,0,0,0,0-1.69,1.14,1.14,0,0,0-1.61,0,1.384,1.384,0,0,0,0,1.7A1,1,0,0,0,202.233,108.682Z" transform="translate(-161.977 -103.781)" fill="#fff"/>
            <path id="Path_15" data-name="Path 15" d="M212.82,109.36v-3.714h.869v.518a1.285,1.285,0,0,1,1.211-.614q1.357,0,1.355,1.474v2.335h-.869v-1.937a1.556,1.556,0,0,0-.183-.869.713.713,0,0,0-.63-.263.814.814,0,0,0-.654.267,1.122,1.122,0,0,0-.231.761v2.04Z" transform="translate(-169.52 -103.781)" fill="#fff"/>
            <path id="Path_16" data-name="Path 16" d="M229.458,106.689v-4.718H227.84v-.861H232v.861h-1.626v4.718Z" transform="translate(-178.555 -101.11)" fill="#fff"/>
            <path id="Path_17" data-name="Path 17" d="M240.168,102.314a.665.665,0,1,1,.183-.458A.625.625,0,0,1,240.168,102.314Zm-.9,4.435v-3.714h.869v3.714Z" transform="translate(-185.304 -101.17)" fill="#fff"/>
            <path id="Path_18" data-name="Path 18" d="M244.56,109.36v-3.714h.869v.518a1.029,1.029,0,0,1,.406-.442,1.167,1.167,0,0,1,.63-.171,1.143,1.143,0,0,1,1.171.661,1.106,1.106,0,0,1,.446-.474,1.329,1.329,0,0,1,.693-.187q1.339,0,1.339,1.458v2.351h-.869v-2.184q0-.885-.693-.885a.713.713,0,0,0-.574.243,1.334,1.334,0,0,0-.207.857v1.969H246.9v-2.192c0-.586-.227-.877-.677-.877a.727.727,0,0,0-.586.243,1.332,1.332,0,0,0-.211.857v1.969Z" transform="translate(-188.612 -103.781)" fill="#fff"/>
            <path id="Path_19" data-name="Path 19" d="M264.142,107.311q0,.143-.024.478h-2.758a.9.9,0,0,0,.287.673,1.11,1.11,0,0,0,.749.235.838.838,0,0,0,.829-.422h.877a1.272,1.272,0,0,1-.562.849,1.955,1.955,0,0,1-1.144.331,1.838,1.838,0,0,1-1.387-.526,2.251,2.251,0,0,1,0-2.849,1.786,1.786,0,0,1,1.359-.53,1.743,1.743,0,0,1,1.287.49A1.724,1.724,0,0,1,264.142,107.311Zm-2.781-.183h1.929a.885.885,0,0,0-.251-.661.956.956,0,0,0-.689-.231,1.011,1.011,0,0,0-.717.247A.874.874,0,0,0,261.361,107.128Z" transform="translate(-198.2 -103.781)" fill="#fff"/>
            <path id="Path_20" data-name="Path 20" d="M272.618,109.455a1.742,1.742,0,0,1-1.14-.359,1.1,1.1,0,0,1-.438-.877h.869a.463.463,0,0,0,.211.391.922.922,0,0,0,.546.151.593.593,0,0,0,.39-.12.4.4,0,0,0,.144-.319.356.356,0,0,0-.279-.391l-.956-.263a.98.98,0,0,1-.8-1.028.956.956,0,0,1,.4-.777,1.606,1.606,0,0,1,1.028-.315,1.648,1.648,0,0,1,1.088.319,1.041,1.041,0,0,1,.379.837H273.2a.427.427,0,0,0-.171-.363.762.762,0,0,0-.474-.132.639.639,0,0,0-.383.108.328.328,0,0,0-.151.275.391.391,0,0,0,.319.4l.885.255a1.3,1.3,0,0,1,.622.379.9.9,0,0,1,.239.618,1.1,1.1,0,0,1-.387.877A1.6,1.6,0,0,1,272.618,109.455Z" transform="translate(-204.54 -103.781)" fill="#fff"/>
            </g>
            <g id="Group_7" data-name="Group 7" transform="translate(97.571 1.147)">
            <path id="Path_21" data-name="Path 21" d="M363.7,97.715H353.687a1.058,1.058,0,0,1-1.057-1.057h0a1.058,1.058,0,0,1,1.057-1.057H363.7a1.058,1.058,0,0,1,1.057,1.057h0A1.056,1.056,0,0,1,363.7,97.715Z" transform="translate(-346.262 -67.112)" fill="#ff6417"/>
            <path id="Path_22" data-name="Path 22" d="M365.722,107.845h-7.035a1.058,1.058,0,0,1-1.057-1.057h0a1.058,1.058,0,0,1,1.057-1.057h7.035a1.058,1.058,0,0,1,1.057,1.057h0A1.054,1.054,0,0,1,365.722,107.845Z" transform="translate(-349.773 -74.225)" fill="#ff6417"/>
            <g id="Group_5" data-name="Group 5" transform="translate(0 2.237)">
            <g id="Group_4" data-name="Group 4" clip-path="url(#clip-path)">
            <path id="Path_23" data-name="Path 23" d="M354.593,17.582a12.534,12.534,0,0,0-21.682,12.581,12.354,12.354,0,0,0,4.551,4.551c.244.143.491.274.742.4a.924.924,0,0,1,.9-.873.871.871,0,0,1,.518.17,1.585,1.585,0,0,1,1.48-1.254,2.086,2.086,0,0,1,1.5.655l.4-5.835v-.527h1.817l.4,6.326a2.1,2.1,0,0,1,1.477-.619,1.58,1.58,0,0,1,1.471,1.209.887.887,0,0,1,.447-.128.922.922,0,0,1,.891.754c.176-.092.351-.182.524-.283a12.453,12.453,0,0,0,6.222-10.841A12.238,12.238,0,0,0,354.593,17.582Z" transform="translate(-331.243 -11.36)" fill="#ff6417"/>
            </g>
            </g>
            <g id="Group_6" data-name="Group 6" transform="translate(6.18)">
            <path id="Path_25" data-name="Path 25" d="M366.774,6.078l-.063.134L365.69,8.425l.057,12.637h4.339V8.2l-2.2-4.354Z" transform="translate(-361.613 -3.85)" fill="#fff"/>
            <rect id="Rectangle_1" data-name="Rectangle 1" width="1.45" height="12.843" transform="translate(5.572 4.399)" fill="#ff6417"/>
            <path id="Path_26" data-name="Path 26" d="M356.194,43.88l.045,5.313L352,49.17V48.026S356.134,43.88,356.194,43.88Z" transform="translate(-352 -31.958)" fill="#fff"/>
            <path id="Path_27" data-name="Path 27" d="M369.33,6.078h2.2L370.444,3.85Z" transform="translate(-364.169 -3.85)" fill="#ff6417"/>
            <path id="Path_28" data-name="Path 28" d="M380.375,43.8l-.045,5.337,4.226-.027V47.97S380.434,43.8,380.375,43.8Z" transform="translate(-371.893 -31.902)" fill="#fff"/>
            <path id="Path_29" data-name="Path 29" d="M368.649,62.38h-4.685a.493.493,0,0,1-.494-.494v-.211a.493.493,0,0,1,.494-.494h4.685a.493.493,0,0,1,.494.494v.211A.5.5,0,0,1,368.649,62.38Z" transform="translate(-360.054 -44.105)" fill="#fff"/>
            </g>
            </g>
            <g id="Group_8" data-name="Group 8" transform="translate(68.299 3.78)">
            <path id="Path_30" data-name="Path 30" d="M287.662,23.062a9.019,9.019,0,0,0,1.483,1.915V12.7h-.637a9.159,9.159,0,0,0-.843,1.212,9.229,9.229,0,0,0,0,9.149Z" transform="translate(-270.081 -12.697)" fill="#fff"/>
            <path id="Path_31" data-name="Path 31" d="M248.044,23.65a10.413,10.413,0,0,1,0-10.347c.122-.211.25-.414.387-.614h-5.474v7.666h-3.833V12.693H231.49V35.626h7.634V27.96h3.833v7.666h7.6V26.554A10.083,10.083,0,0,1,248.044,23.65Z" transform="translate(-231.49 -12.69)" fill="#fff"/>
            </g>
            <path id="Path_32" data-name="Path 32" d="M412.688,24.17V8.87H405.12v3.592a13.386,13.386,0,0,1,0,19.324V31.8h14.186V24.17Z" transform="translate(-285.548 -6.228)" fill="#fff"/>
            <path id="Path_33" data-name="Path 33" d="M298.308,15.9a13.286,13.286,0,0,1,5.37-10.737c-.075-.143-.146-.283-.226-.423A9.522,9.522,0,0,0,285.68,9.522a9.478,9.478,0,0,0,9.522,9.522,9.536,9.536,0,0,0,3.345-.593A13.918,13.918,0,0,1,298.308,15.9Zm-1.322-3.357a3.5,3.5,0,0,1-3.514,0,3.536,3.536,0,0,1-1.287-1.272,3.358,3.358,0,0,1-.471-1.745,3.461,3.461,0,0,1,.471-1.757,3.585,3.585,0,0,1,1.287-1.3,3.423,3.423,0,0,1,3.514,0,3.576,3.576,0,0,1,1.284,1.3,3.434,3.434,0,0,1,.474,1.757,3.368,3.368,0,0,1-.474,1.745A3.5,3.5,0,0,1,296.986,12.539Z" transform="translate(-201.386)" fill="#fff"/>
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
		  <div class="footer-copy">
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
			  <h2 class="scbscribe">Subscribe Now</h2>
			 <?php
			  if ( is_active_sidebar( 'newsletter-form' ) ) :
				dynamic_sidebar( 'newsletter-form' );
				?>
			  <?php endif; ?>
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

	#errotherSchoolMsg{
	    color: red;
    font-size: 12px;
    display: block;
    margin-bottom: 15px;
    margin-top: 5px;
}

#errchildotherSchoolMsg{
	    color: red;
    font-size: 12px;
    display: block;
    margin-bottom: 15px;
    margin-top: 5px;
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
								  <select name="grade" id="grade">
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
									  <select name="division" id="section">
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

			$("#user_school_other").on("change", function (event, ui) {
				var other_val = $("#user_school_other").val();

				if(other_val != ""){
					jQuery.ajax({
					    type : "POST",
					    dataType : "json",
					    url : "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
					    data : {"action": "check_school_other",check_school_other : other_val},
					    success: function(response) {
						//alert(response.status);
						//alert(response.response);	
					        if(response.status == 1){
					        	jQuery("#errotherSchoolMsg").text('School name is already exists!');
					        	jQuery("#user_school_other").val('');
					        }
					    }
					});
				}
			});

			var countryUrl = '<?php echo home_url(); ?>/wp-admin/admin-ajax.php';

			$( "#user_country_data" ).autocomplete({
				  source: function (request, response) {
					 $.ajax({
						dataType: "json",
						type : 'POST',
						data: {"action": "get_countries", term: request.term},
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

			var stateUrl = '<?php echo home_url(); ?>/wp-admin/admin-ajax.php';

			$( "#user_state" ).autocomplete({
				source: function (request, response) {
					 $.ajax({
						dataType: "json",
						type : 'POST',
						data: {"action": "get_states",term: request.term, country: window.selectedCountry },
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

							let profilePopupUpdatedMoegObj = {
							 	"User identifier"	: parseInt(jQuery("#user_identifier").val()),
								"School"	: jQuery("#user_school_data").val(),
								"Grade/Standard"	: jQuery("#grade").val(),
								"Section/Division"	: jQuery("#division").val(),
								"Country"	    : jQuery("input[name=user_country_data]").val(),
								"State"	    : jQuery("input[name=user_state]").val(),
								"City"	    : jQuery("input[name=user_city]").val(),
								"Date of Birth"	    : jQuery("input[name=user_dob_display]").val(),
								"Gender"	    : jQuery("input[name=user_gender]").val(),
								
							}
						   	profilePopupUpdatedMoegObj.event = "mo_profile_updated";
						   	dataLayer.push({ ecommerce: null }); 
						   	dataLayer.push(profilePopupUpdatedMoegObj);

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
								<label for="child_school">Name of your School</label>
								<input type="text" class="form-control edit-inline" id="child_school" name="child_school" placeholder="Find your School">
								<input type="hidden" name="child_school_id" id="child_school_id">
					  		</div>

					  		<div class="form-group" style="display:none" id="child_other_school">							
								<input type="text" class="form-control edit-inline" id="child_user_school_other" name="child_user_school_other" placeholder="Please enter others school name" value="" >
								<span id="errchildotherSchoolMsg"></span>
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
  <div class="sharing-course modal fade" id="open_editor_share" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- <button class="sharing close-button" type="submit"></button> -->
            <button type="button" class="close sharing close-button" data-dismiss="modal" aria-label="Close"></button>
            <div class="course-list">
                <h4 class="title">Share This Article</h4>
                <div class="list">
                    <figure class="image"><a href="#!"><img src="" id="editor_image"></a></figure>
                    <div class="course-detail">
                        <div class="header">
                            <a class="category" href="#!"></a>
                            <span id="editor_category"></span>
                        </div>
                        <h3 class="course-title" id="editor_title"></h3>
                        <div class="footer">
                            <span class="price" id="editor_date"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="course-share">
                <div class="copy">
                    <input type="text" name="" value="" id="editor_url" class="copyUrl" readonly>
                    <button class="button" type="submit" onclick="copyFunction('editor_url','editor_success_msg')">Copy</button>
                </div>
                <p class="success_msg" id="editor_success_msg"></p>
                <div class="social" id="share_data">
                    <!-- <a href="#!" class="facebook"></a>
                    <a href="#!" class="twitter"></a>
                    <a href="#!" class="pinterest"></a>
                    <a href="#!" class="whatsapp"></a> -->
                    
                </div>

            </div>
          </div>
      </div>
</div>

<div class="sharing-course modal fade" id="open_testimonial_share" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
           <!--  <button class="sharing close-button" type="submit"></button> -->
            <button type="button" class="close sharing close-button" data-dismiss="modal" aria-label="Close">
          
        </button>
            <div class="course-list">
                <h4 class="title">Share This Testimonial</h4>
                <div class="list">
                    <figure class="image"><a href="#!"><img src="" id="testimonial_image"></a></figure>
                    <div class="course-detail">
                        <div class="header">
                            <a class="category" href="#!"></a>
                            <span id="testimonial_title"></span>
                        </div>
                        <h3 class="course-title" id="testimonial_name"></h3>
                        <div class="footer">
                            <span class="price" id="testimonial_designation"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="course-share">
                <div class="copy">
                    <input type="text" name="" value="" id="testimonial_url" class="copyUrl" readonly>
                    <button class="button" type="submit" onclick="copyFunction('testimonial_url','testimonial_success_msg')">Copy</button>
                </div>
                <p class="success_msg" id="testimonial_success_msg"></p>
                <div class="social" id="testimonial_share_data">
                    <!-- <a href="#!" class="facebook"></a>
                    <a href="#!" class="twitter"></a>
                    <a href="#!" class="pinterest"></a>
                    <a href="#!" class="whatsapp"></a> -->
  
                </div>

            </div>
          </div>
      </div>
</div>

<div class="sharing-course modal fade" id="open_popular_share" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
           <!--  <button class="sharing close-button" type="submit"></button> -->
            <button type="button" class="close sharing close-button" data-dismiss="modal" aria-label="Close">
          
        </button>
            <div class="course-list">
                <h4 class="title">Share This Course</h4>
                <div class="list">
                    <figure class="image"><a href="#!"><img src="" id="course_image"></a></figure>
                    <div class="course-detail">
                        <div class="header" id="cat_header">
                            
                        </div>
                        <h3 class="course-title" id="course_name"></h3>
                        <div class="footer" id="course_price">
                        </div>
                    </div>
                </div>
            </div>
            <div class="course-share">
                <div class="copy">
                    <input type="text" name="" value="" id="course_url" class="copyUrl" readonly>
                    <button class="button" type="submit" onclick="copyFunction('course_url','course_success_msg')">Copy</button>
                </div>
                <p class="success_msg" id="course_success_msg"></p>
                <div class="social" id="course_share_data">
                    <!-- <a href="#!" class="facebook"></a>
                    <a href="#!" class="twitter"></a>
                    <a href="#!" class="pinterest"></a>
                    <a href="#!" class="whatsapp"></a> -->
  
                </div>

            </div>
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
			var userPurchaseDetailsMoegObj = JSON.parse('<?php echo json_encode($_SESSION["sign_up_data"]["moengage_purchase"]); ?>');
			console.log(signUpDataLayerObj);
			dataLayer.push(signUpDataLayerObj);

			signUpDataMoengObj.event = "mo_" + "<?php echo $_SESSION['sign_up_data']['moengage_type']; ?>";
			dataLayer.push({ ecommerce: null }); 
			dataLayer.push(signUpDataMoengObj);

			userPurchaseDetailsMoegObj.event = "mo_" + "<?php echo $_SESSION['sign_up_data']['moengage_type_purchase']; ?>";
			dataLayer.push({ ecommerce: null }); 
			dataLayer.push(userPurchaseDetailsMoegObj);
			// Moengage.track_event("<?php //echo $_SESSION['sign_up_data']['moengage_type_purchase']; ?>", userPurchaseDetailsMoegObj);
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

    jQuery('.close-tag').click(function(){
        var val = jQuery(this).data('id');
        jQuery('input:checkbox[value="' + val + '"]').trigger('click');
    })
    jQuery('#close-sort-tag').click(function(){
        var val = jQuery(this).data('id');
        jQuery('#sort_by').val('').trigger('change');
    })

	jQuery( ".epaper a" ).click(function() {
	  let ePaperViewedMoegObj = {
			"User identifier"	: parseInt(jQuery("#user_identifier").val()),
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
			"User identifier"	: parseInt(jQuery("#user_identifier").val()),
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
  jQuery('.age').click(function(){
    if(window.innerWidth > 768){
        applyFilter();
    }
  });
  jQuery('.sessions').click(function(){
    if(window.innerWidth > 768){
        applyFilter();
    }
  });
  jQuery('#category_filter .category').click(function(){
    if(window.innerWidth > 768){
        applyFilter();
    }
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

		jQuery('#course_price_'+courseID).val(price);
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
					url : "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
					data : {"action": "get_product_slot",course_id : course_id},
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
									url : "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
									data : {"action": "get_product_slot_time",course_id : course_id,selected_slot_date:selected_slot_date},
									
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

				window.dataLayer = window.dataLayer || [];
				window.dataLayer.push({
				  event: 'eec.add',
				  ecommerce: {
				    add: {
				      actionField: {
				        list: 'Shopping cart'
				      },
				      products: [{
				       	price				: parseInt(jQuery("#course_price_" + courseID).val()),
					    name			: jQuery("#course_name_" + courseID).val(),
					   id 		        : parseInt(jQuery("#course_id_" + courseID).val()),
					   category		: jQuery("#course_category_" + courseID).val(),
					   course_url		: jQuery("#course_url_" + courseID).val(),
					  course_partner	: jQuery("#course_partner_" + courseID).val(),
					  category_id		: parseInt(jQuery("#category_id_" + courseID).val()),
					  age_group		: jQuery("#age_group_" + courseID).val(),
					  course_duration	: jQuery("#course_duration_" + courseID).val(),
					  session_duration	: jQuery("#session_duration_" + courseID).val(),
					  wishlisted_course	: jQuery("#wishlisted_course_" + courseID).val() == "1" ? true : false,
			
				      }]
				    }
				  }
				});
				
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
					"user_identifier"	: parseInt(jQuery("#footer_user_identifier").val()),
					"session_source"	: jQuery("#footer_session_source").val(),
					"timestamp"			: jQuery("#footer_timestamp").val(),
					"utm_tags"			: jQuery("#footer_utm_tags").val(),
					"ecommerce"			: {
						"items" : addToCartItem,
					}
				};

				let addToCartMoegObj = {
					"User identifier"	: parseInt(jQuery("#footer_user_identifier").val()),
					"Session source"	: jQuery("#footer_session_source").val(),
					"Timestamp"			: jQuery("#footer_timestamp").val(),
					"UTM tags"			: jQuery("#footer_utm_tags").val(),
					"Course name"		: jQuery("#course_name_" + courseID).val(),
					"Course URL"		: jQuery("#course_url_" + courseID).val(),
					"Course category"	: jQuery("#course_category_" + courseID).val(),
					"Course partner"	: jQuery("#course_partner_" + courseID).val(),
					"Category ID"		: parseInt(jQuery("#category_id_" + courseID).val()),
					"Course ID"			: parseInt(jQuery("#course_id_" + courseID).val()),
					"Course Price"		: parseInt(jQuery("#course_price_" + courseID).val()),
					"Age group"			: jQuery("#age_group_" + courseID).val(),
					"Course duration"	: jQuery("#course_duration_" + courseID).val(),
					"Session duration"	: jQuery("#session_duration_" + courseID).val(),	
					"wishlisted_course"	: jQuery("#wishlisted_course_" + courseID).val() == "1" ? true : false,
				
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
				"user_identifier"	: parseInt(jQuery("#footer_user_identifier").val()),
				"session_source"	: jQuery("#footer_session_source").val(),
				"timestamp"			: jQuery("#footer_timestamp").val(),
				"utm_tags"			: jQuery("#footer_utm_tags").val(),
				"ecommerce"			: {
					"items" : addToWishlistItem,
				}
			};

			let addWishlistMoegObj = {
				"User identifier"	: parseInt(jQuery("#footer_user_identifier").val()),
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
				"user_identifier"	: parseInt(jQuery("#footer_user_identifier").val()),
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
				"user_identifier"	: parseInt(jQuery("#footer_user_identifier").val()),
				"session_source"	: jQuery("#footer_session_source").val(),
				"timestamp"			: jQuery("#footer_timestamp").val(),
				"utm_tags"			: jQuery("#footer_utm_tags").val(),
				"ecommerce"			: {
					"items" : allCourseItem,
				}
			};

			if(itemListName == "other_courses")	allCourseObj.item_list_name = itemListName;

			let allCourseListMoegObj = {
				"User identifier"	: parseInt(jQuery("#footer_user_identifier").val()),
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
				"User identifier"	: parseInt(jQuery("#footer_user_identifier").val()),
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
    
    jQuery('.editor_share').click(function(){
        var editors_id = $(this).data("id");
        var editors_name = jQuery("#editors_name_" + editors_id).val();
        var editors_image = jQuery("#editors_image_" + editors_id).val();
        var editors_category = jQuery("#editors_category_" + editors_id).val();
        var editors_postdate = jQuery("#editors_postdate_" + editors_id).val();
        var editors_url = jQuery("#editors_url_" + editors_id).val();
        jQuery('#editor_image').attr('src',editors_image);
        jQuery('#editor_category').text(editors_category);
        jQuery('#editor_title').text(editors_name);
        jQuery('#editor_date').text(editors_postdate);
        jQuery('#editor_url').val(editors_url);
        jQuery('#share_data').html('<div class="a2a_kit a2a_kit_size_32 a2a_default_style" id="testimonial_share_data" data-a2a-url="'+editors_url+'" data-a2a-title="'+editors_name+'" data-id="'+editors_id+'"><a class="a2a_button_facebook"></a><a class="a2a_button_twitter"></a><a class="a2a_button_pinterest"></a><a class="a2a_button_google_gmail"></a><a class="a2a_button_whatsapp"></a><a class="a2a_button_telegram"></a></div>');
         var s = document.createElement("script");
        s.type = "text/javascript";
        s.src = "https://static.addtoany.com/menu/page.js";
        jQuery('#testimonial_share_data').append(s);
    })

    jQuery('.testimonial_share').click(function(){
        var testimonial_id = $(this).data("id");
        var testimonial_title = jQuery("#testimonial_title_" + testimonial_id).val();
        var testimonial_name = jQuery("#testimonial_name_" + testimonial_id).val();
        var testimonial_image = jQuery("#testimonial_image_" + testimonial_id).val();
        var testimonial_designation = jQuery("#testimonial_designation_" + testimonial_id).val();
        var testimonial_url = jQuery("#testimonial_url_" + testimonial_id).val();
        
        jQuery('#testimonial_image').attr('src',testimonial_image);
        jQuery('#testimonial_designation').text(testimonial_designation);
        jQuery('#testimonial_title').html(testimonial_title);
        jQuery('#testimonial_name').text(testimonial_name);
        jQuery('#testimonial_url').val(testimonial_url);
        jQuery('#testimonial_share_data').html('<div class="a2a_kit a2a_kit_size_32 a2a_default_style" id="testimonial_share_data" data-a2a-url="'+testimonial_url+'" data-a2a-title="'+testimonial_title+'" data-id="'+testimonial_id+'"><a class="a2a_button_facebook"></a><a class="a2a_button_twitter"></a><a class="a2a_button_pinterest"></a><a class="a2a_button_google_gmail"></a><a class="a2a_button_whatsapp"></a><a class="a2a_button_telegram"></a></div>');
         var s = document.createElement("script");
        s.type = "text/javascript";
        s.src = "https://static.addtoany.com/menu/page.js";
        jQuery('#testimonial_share_data').append(s);
        })
    
    jQuery('.course_share').click(function(){
        var course_id = jQuery(this).data("id");
        var course_name = jQuery("#course_name_" + course_id).val();
        var course_image = jQuery("#course_image_" + course_id).val();
        var course_category = jQuery("#course_category_" + course_id).val();
        var course_url = jQuery("#course_url_" + course_id).val();
        var course_type = jQuery("#course_type_" + course_id).val();
        var course_badge = jQuery("#course_badge_" + course_id).val();
        var course_price_share = $('#course_price_share_' + course_id).html();
        
        jQuery('#course_image').attr('src',course_image);
        jQuery('#course_name').text(course_name);
        jQuery('#course_price').html(course_price_share);
        jQuery('#cat_header').html('<a class="category" id="course_category" href="#!"></a><span class="badge '+course_badge+'">'+course_type+'</span>');
        jQuery('#course_url').val(course_url);
        jQuery('#course_share_data').html('<div class="a2a_kit a2a_kit_size_32 a2a_default_style" id="course_share_data" data-a2a-url="'+course_url+'" data-a2a-title="'+course_name+'" data-id="'+course_id+'"><a class="a2a_button_facebook"></a><a class="a2a_button_twitter"></a><a class="a2a_button_pinterest"></a><a class="a2a_button_google_gmail"></a><a class="a2a_button_whatsapp"></a><a class="a2a_button_telegram"></a></div>');
         var s = document.createElement("script");
        s.type = "text/javascript";
        s.src = "https://static.addtoany.com/menu/page.js";
        jQuery('#course_share_data').append(s);
    })

    function copyFunction(id,msgId) {
        var copyText = document.getElementById(id);
        copyText.select();
        copyText.setSelectionRange(0, 99999)
        document.execCommand("copy");
        document.getElementById(msgId).innerHTML = "Link Copied Successfully";
        setTimeout(function(){ $("#" + msgId).html(''); }, 5000);
    }

    function copyUrl() {
        var copyText = document.getElementsByClassName('copyText');
        copyText[0].select();
        copyText[0].setSelectionRange(0, 99999)
        document.execCommand("copy");
        document.getElementsByClassName('successMsg')[0].innerHTML = "Link Copied Successfully";
        setTimeout(function(){ $(".successMsg").html(''); }, 5000);
    }
    jQuery('.close-button').click(function(){
        jQuery(".modal").modal('hide');
        jQuery("#open_testimonial_share").modal('hide');
    })
</script>

<?php
wp_footer();
?>
</body>
</html>