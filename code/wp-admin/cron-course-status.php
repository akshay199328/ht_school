<?php
require_once dirname( __DIR__ ) . '/wp-load.php';

/*error_reporting(E_ALL);
ini_set('display_errors', 'On');*/

$getUsersSql = "SELECT user_id, meta_key, meta_value FROM ht_usermeta WHERE meta_key = 'aiws_user_login_id'";
// $getUsersSql .= " ORDER BY user_id DESC ";

$courses_with_types = $wpdb->prepare($getUsersSql);

$usersList = $wpdb->get_results($courses_with_types);

if(count($usersList) > 1)
{
	$wpaiws_options = get_option('wpaiws_options');

	function check_course_status($aiwsUserID, $aiwsProgramID)
	{
		global $wpaiws_options;

		$params["wstoken"]				= $wpaiws_options['access_token'];
		$params["moodlewsrestformat"]	= "json";
		$params['wsfunction']			= "local_program_program_status";
		$params["userid"]				= $aiwsUserID;
		$params["programid"]			= $aiwsProgramID;

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL             => $wpaiws_options['aiws_api_url'] . "webservice/rest/server.php?",
			CURLOPT_RETURNTRANSFER  => true,
			CURLOPT_ENCODING        => '',
			CURLOPT_MAXREDIRS       => 10,
			CURLOPT_TIMEOUT         => 0,
			CURLOPT_FOLLOWLOCATION  => true,
			CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST   => 'POST',
			CURLOPT_POSTFIELDS      => http_build_query($params),
		));

		$response = curl_exec($curl);
		$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);

		if($httpCode == 200)
		{
			return json_decode($response, true);
		}
		else
		{
			return false;
		}
	}

	$totalCoursesChecked = 0;
	$totalCompletedCourses = 0;

	foreach ($usersList as $userKey => $userValue)
	{
		$courseInfo = get_user_meta($userValue->user_id, 'aiws_enroll_courses_info', true);

		if(is_array($courseInfo))
		{
			$hasChange = false;

			foreach ($courseInfo as $courseKey => $courseValue)
			{
				if(isset($courseValue['course_completed']) && $courseValue['course_completed'] == 1)
				{
					// If course complete flag is marked as completed then skip is user
					continue;
				}

				$totalCoursesChecked++;
				$courseStatus = check_course_status($courseValue['user_id'], $courseValue['product_id']);

				if(strtolower($courseStatus['success']) == "success")
				{
					if($courseStatus['program_status'] == 1)
					{
						$hasChange = true;
						$totalCompletedCourses++;
						$courseInfo[$courseKey]['course_completed'] = 1;
					}
				}
			}

			if($hasChange)
			{
				update_user_meta($userValue->user_id, 'aiws_enroll_courses_info', $courseInfo);
			}
		}
	}

	echo "Total courses checked: ".$totalCoursesChecked;
	echo "\n";
	echo "Total completed courses: ".$totalCompletedCourses;
}