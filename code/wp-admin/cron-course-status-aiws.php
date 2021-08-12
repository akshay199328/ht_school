<?php
require_once dirname( __DIR__ ) . '/wp-load.php';

date_default_timezone_set("Asia/Kolkata");

$cronResult['aiws_unique_users']		= 0;
$cronResult['aiws_courses_check']		= 0;
$cronResult['aiws_completed_courses']	= 0;

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
$fileName	= ABSPATH . "aiws_count.txt";

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
	return file_get_contents($fileName);
}

if(!file_exists($fileName))
{
	writeCountFile(0);
}

$pageCount	= getCountFromFile();
$extraSql	= " ORDER BY user_id ASC LIMIT " . ($perPage * $pageCount) . ", " . $perPage;

// AIWS Courses
$getUsersSql  = "SELECT user_id, meta_key, meta_value FROM ht_usermeta WHERE meta_key = 'aiws_user_login_id'";
$getUsersSql .= $extraSql;

$aiwsUsersList = $wpdb->get_results($getUsersSql);

writeCountFile(count($aiwsUsersList) == $perPage ? (++$pageCount) : 0);

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

						markUserCourseComplete($userValue->user_id, $courseValue['course_id'], 100);
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

// Log cron result
$filePath = ABSPATH . "cron_logs.txt";

$content  = date('Y-m-d H:i:s')."\n";
$content .= json_encode($cronResult)."\n";
$content .= "--------------------------------------------------\n";

$file = fopen($filePath, "a");
fwrite($file, $content);
fclose($file);

echo json_encode($cronResult);exit;