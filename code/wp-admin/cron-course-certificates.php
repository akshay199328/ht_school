<?php
require_once dirname( __DIR__ ) . '/wp-load.php';

date_default_timezone_set("Asia/Kolkata");

$cronResult['total_user_courses']				= 0;
$cronResult['certificate_generated_percentage']	= 0;
$cronResult['certificate_generated_time_based']	= 0;

$sql  = "SELECT posts.post_title as course, umeta.user_id as user_id, posts.ID as course_id ";
$sql .= "FROM {$wpdb->usermeta} AS umeta ";
$sql .= "LEFT JOIN {$wpdb->posts} AS posts ON umeta.meta_key = posts.ID ";
$sql .= "WHERE posts.post_type = 'course' AND posts.post_status = 'publish' AND umeta.meta_key REGEXP '^[0-9]+$' ";
$sql .= "AND umeta.user_id IN (";
	$sql .= "SELECT users.ID FROM {$wpdb->users} users ";
	$sql .= "INNER JOIN {$wpdb->usermeta} AS meta ON users.ID = meta.user_id ";
	$sql .= "WHERE meta.meta_key = 'ht_capabilities' AND meta.meta_value LIKE '%student%' ";
$sql .= ")";

$userCourses = $wpdb->get_results($sql);

if(count($userCourses) > 0)
{
	$courseIDList = array_unique(array_column($userCourses, 'course_id'));

	$coursePercentageLimit = $courseDurationLimit = $userCoursesList = array();

	foreach($courseIDList as $key => $value)
	{
		$percentage	= get_post_meta($value, "vibe_certificate_course_complete_percentage", true);
		$duration	= get_post_meta($value, "vibe_certificate_course_complete_issue", true);

		$coursePercentageLimit[$value]	= $percentage	? $percentage : 0;
		$courseDurationLimit[$value]	= $duration		? $duration : 0;
	}

	foreach($userCourses as $key => $value)
	{
		$userCoursesList[$value->user_id][] = $value;
	}

	foreach ($userCoursesList as $userID => $userCourseInfo)
	{
		$hasChange = false;
		$userCertificates = get_user_meta($userID, 'certificates', true);

		if($userCertificates == "" || $userCertificates == null || !is_array($userCertificates))
		{
			$userCertificates = array();
		}

		foreach ($userCourseInfo as $key => $value)
		{
			if(!in_array($value->course_id, $userCertificates))
			{
				$cronResult['total_user_courses']++;

				$currentProgress = bp_course_get_user_progress($value->user_id, $value->course_id);

				// Time based
				$courseDuration = $courseDurationLimit[$value->course_id];

				/*if($courseDuration > 0)
				{
					$hasChange = true;
					$userCertificates[] = $value->course_id;
					$cronResult['certificate_generated_time_based']++;
					continue;
				}*/

				// Percentage based
				$requiredPercentage = $coursePercentageLimit[$value->course_id];

				if($requiredPercentage > 0 && $currentProgress >= $requiredPercentage)
				{
					$hasChange = true;
					$userCertificates[] = $value->course_id;
					$cronResult['certificate_generated_percentage']++;
					continue;
				}
			}
		}

		if($hasChange)
		{
			update_user_meta($userID, "certificates", $userCertificates);
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