<?php
require_once dirname( __DIR__ ) . '/wp-load.php';

date_default_timezone_set("Asia/Kolkata");

$cronResult['aiws_unique_users']		= 0;
$cronResult['aiws_courses_check']		= 0;
$cronResult['aiws_completed_courses']	= 0;
$cronResult['cs_unique_users']			= 0;
$cronResult['cs_courses_check']			= 0;
$cronResult['cs_completed_courses']		= 0;

function markUserCourseComplete($userID, $courseID)
{
	$certificates = get_user_meta($userID, 'certificates', true);

	if(isset($certificates) && is_array($certificates))
	{
		if(!in_array($courseID, $certificates)) $certificates[] = $courseID;
	}
	else
	{
	    $certificates = array($courseID);
	}

	update_user_meta($userID, "course_status" . $courseID, 4);
	update_user_meta($userID, "progress" . $courseID, 100);
	update_user_meta($userID, "certificates", $certificates);
}

// AIWS Courses
$getUsersSql = "SELECT user_id, meta_key, meta_value FROM ht_usermeta WHERE meta_key = 'aiws_user_login_id'";

$aiwsUsersList = $wpdb->get_results($wpdb->prepare($getUsersSql));

if(count($aiwsUsersList) > 0)
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

		logAiwsResponse($params, $response);

		if($httpCode == 200)
		{
			return json_decode($response, true);
		}
		else
		{
			return false;
		}
	}

	foreach ($aiwsUsersList as $userKey => $userValue)
	{
		$cronResult['aiws_unique_users']++;
		$courseInfo = get_user_meta($userValue->user_id, 'aiws_enroll_courses_info', true);

		if(is_array($courseInfo))
		{
			$hasChange = false;

			foreach ($courseInfo as $courseKey => $courseValue)
			{
				// If course complete flag is marked as completed then skip is user
				if(isset($courseValue['course_completed']) && $courseValue['course_completed'] == 1)
				{
					continue;
				}

				$cronResult['aiws_courses_check']++;
				$courseStatus = check_course_status($courseValue['user_id'], $courseValue['product_id']);

				if(strtolower($courseStatus['success']) == "success")
				{
					if($courseStatus['program_status'] == 1)
					{
						$hasChange = true;
						$cronResult['aiws_completed_courses']++;

						$courseInfo[$courseKey]['course_completed']	= 1;
						$courseInfo[$courseKey]['completed_on']		= $courseStatus['completedtimestamp'];

						markUserCourseComplete($userValue->user_id, $courseValue['course_id']);
					}
				}
			}

			if($hasChange)
			{
				update_user_meta($userValue->user_id, 'aiws_enroll_courses_info', $courseInfo);
			}
		}
	}
}

// CS Courses
$getUsersSql = "SELECT user_id, meta_key, meta_value FROM ht_usermeta WHERE meta_key = 'cs_enroll_courses_info'";

$csUsersList = $wpdb->get_results($wpdb->prepare($getUsersSql));

if(count($csUsersList) > 0)
{
	$wpcs_options	= get_option('wpcs_options');
	$xAuthToken		= "";

	function generate_cs_token()
	{
		global $wpcs_options;

		$params["email"]	= $wpcs_options['integration_id'];
		$params["password"]	= "HTSchools";

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL             => $wpcs_options['cs_api_url'] . "/api/user/manual/login",
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

		logCSResponse($wpcs_options['cs_api_url'] . "/api/user/manual/login", $params, $response);

		if($httpCode == 200)
		{
			return $response;
		}
		else
		{
			return false;
		}
	}

	function check_cs_course_status($userEmail, $albumID)
	{
		global $wpcs_options, $xAuthToken;

		$params["user_email"]	= $userEmail;
		$params["album_id"]		= $albumID;

		if($xAuthToken == "")	$xAuthToken = generate_cs_token();

		$headers = array();
		$headers[] = 'x-auth-token: ' . $xAuthToken;

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL             => $wpcs_options['cs_api_url'] . "/api/lastVideo/ht_course_progress",
			CURLOPT_RETURNTRANSFER  => true,
			CURLOPT_ENCODING        => '',
			CURLOPT_MAXREDIRS       => 10,
			CURLOPT_TIMEOUT         => 0,
			CURLOPT_FOLLOWLOCATION  => true,
			CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST   => 'POST',
			CURLOPT_HTTPHEADER   	=> $headers,
			CURLOPT_POSTFIELDS      => http_build_query($params),
		));

		$response = curl_exec($curl);
		$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);

		logCSResponse($wpcs_options['cs_api_url'] . "/api/lastVideo/ht_course_progress", $params, $response);

		if($httpCode == 200)
		{
			return json_decode($response, true);
		}
		else
		{
			return false;
		}
	}

	foreach ($csUsersList as $userKey => $userValue)
	{
		$cronResult['cs_unique_users']++;

		$courseInfo = unserialize($userValue->meta_value);

		if(is_array($courseInfo))
		{
			$hasChange = false;

			$csEmailID = get_user_meta($userValue->user_id, 'cb_user_login_email', true);

			foreach ($courseInfo as $courseKey => $courseValue)
			{
				// If course complete flag is marked as completed then skip is user
				if(isset($courseValue['course_completed']) && $courseValue['course_completed'] == 1)
				{
					continue;
				}

				$cronResult['cs_courses_check']++;
				$courseStatus = check_cs_course_status($csEmailID, $courseValue['cs_course_id']);

				if($courseStatus['status'] == "1")
				{
					$hasChange = true;
					$cronResult['cs_completed_courses']++;

					$courseInfo[$courseKey]['course_completed']			= 1;
					$courseInfo[$courseKey]['course_complete_percent']	= $courseStatus['course_complete_percent'];

					markUserCourseComplete($userValue->user_id, $courseValue['course_id']);
				}
			}

			if($hasChange)
			{
				update_user_meta($userValue->user_id, 'cs_enroll_courses_info', $courseInfo);
			}
		}
	}
}

// Log cron result
$filePath = ABSPATH . "cron_logs.txt";

$content  = date('Y-m-d H:i:s')."\n";
$content .= json_encode($cronResult)."\n";
$content .= "--------------------------------------------------\n";

$file = fopen($filePath, "a");
fwrite($file, $content);
fclose($file);

echo json_encode($cronResult);exit;