<?php
require_once dirname( __DIR__ ) . '/wp-load.php';

date_default_timezone_set("Asia/Kolkata");

$cronResult['cs_unique_users']			= 0;
$cronResult['cs_courses_check']			= 0;
$cronResult['cs_completed_courses']		= 0;

function markUserCourseComplete($userID, $courseID, $courseCurrentProgress = 0)
{
	if($courseCurrentProgress > 0)
	{
		update_user_meta($userID, "progress" . $courseID, $courseCurrentProgress);

		if($courseCurrentProgress == 100)
		{
			$marks = 100;
			update_user_meta($userID, "course_status" . $courseID, 4);
			update_post_meta($courseID, $userID, $marks);
			do_action('wplms_evaluate_course', $courseID, $marks, $userID, 1);
		}
	}
}

// Get page count
$perPage	= 10;
$fileName	= ABSPATH . "cs_count.txt";

function writeCountFile($saveCount)
{
	global $fileName;
	$file = fopen($fileName, "w");
	fwrite($file, $saveCount);
	fclose($file);
}

function getCountFromFile()
{
	global $fileName;
	$count = file_get_contents($fileName);
	return $count == "" ? 0 : $count;
}

if(!file_exists($fileName))
{
	writeCountFile(0);
}

$pageCount	= getCountFromFile();
$extraSql	= " ORDER BY user_id ASC LIMIT " . ($perPage * $pageCount) . ", " . $perPage;

// CS Courses
$getUsersSql  = "SELECT user_id, meta_key, meta_value FROM ht_usermeta WHERE meta_key = 'cs_enroll_courses_info'";
$getUsersSql .= $extraSql;

$csUsersList = $wpdb->get_results($getUsersSql);

writeCountFile(count($csUsersList) == $perPage ? (++$pageCount) : 0);

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

				if(isset($courseStatus['course_complete_percent']) && $courseStatus['course_complete_percent'] > 0)
				{
					if($courseStatus['course_complete_percent'] == 100)
					{
						$cronResult['cs_completed_courses']++;
						$courseInfo[$courseKey]['course_completed'] = 1;
					}

					$hasChange = true;
					$courseInfo[$courseKey]['course_complete_percent'] = $courseStatus['course_complete_percent'];

					markUserCourseComplete($userValue->user_id, $courseValue['course_id'], $courseStatus['course_complete_percent']);
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