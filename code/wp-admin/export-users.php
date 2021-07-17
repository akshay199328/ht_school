<?php
require_once __DIR__ . '/admin.php';
date_default_timezone_set("Asia/Kolkata");

function array2csv($dataArray)
{
	if (count($dataArray) == 0) {
		return null;
	}
	ob_start();
	$df = fopen("php://output", 'w');
	// fputcsv($df, array_keys(reset($dataArray)));
	foreach ($dataArray as $row) {
		fputcsv($df, $row);
	}
	fclose($df);
	return ob_get_clean();
}

function generateCsv($fieldsOrderList, $actualData, $fileName)
{
	$dataArray = array();

	foreach ($fieldsOrderList as $keyOrder => $valueOrder)
	{
		$dataArray[0][$keyOrder] = $valueOrder;
	}

	foreach($actualData as $dataKey => $dataValue)
	{
		foreach ($fieldsOrderList as $keyOrder => $valueOrder)
		{
			$dataArray[($dataKey + 1)][$keyOrder] = isset($dataValue[$keyOrder]) ? $dataValue[$keyOrder] : '';
		}
	}

	// disable caching
	$now = gmdate("D, d M Y H:i:s");
	header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
	header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
	header("Last-Modified: {$now} GMT");

	// force downloadSendHeaders
	header("Content-Type: application/force-download");
	header("Content-Type: application/octet-stream");
	header("Content-Type: application/download");

	// disposition / encoding on response body
	header("Content-Disposition: attachment;filename={$fileName}");
	header("Content-Transfer-Encoding: binary");

	echo array2csv($dataArray);
	exit;
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	if(isset($_POST['user_id']) && $_POST['user_id'] > 0)
	{
		$usersSql  = "SELECT users.ID, users.user_login, users.user_email, users.user_registered ";
		$usersSql .= "FROM ht_users AS users ";
		$usersSql .= "INNER JOIN ht_usermeta AS meta ON users.ID = meta.user_id ";
		$usersSql .= "WHERE meta.meta_key = 'ht_capabilities' AND meta.meta_value LIKE '%student%' AND users.ID >= '".$_POST['user_id']."' ";
		$usersSql .= "ORDER BY users.ID ASC";
print_r($usersSql);
		$usersList	= $wpdb->get_results($usersSql);
print_r($usersList);die;
		$userMetaKeys = array(
			"first_name",
			"last_name",
			"gender",
			"mobile",
			"user_registered",
		);

		$fileName		= "users_".date("Y_m_d_H_i").".csv";
		$fieldHeaders	= array("user_login", "user_email", "first_name", "last_name", "gender", "mobile", "registered_on", "school_name");
		$actualData		= array();

		$schoolFieldID = 0;
		$schoolFieldIDSql = "SELECT ID FROM ht_bp_xprofile_fields WHERE name = 'Linked School'";

		$schoolFieldIDList = $wpdb->get_results($wpdb->prepare($schoolFieldIDSql, []));

		if(count($schoolFieldIDList) > 0)	$schoolFieldID = $schoolFieldIDList[0]->ID;

		$maxCourses = 0;

		foreach ($usersList as $key => $value)
		{
			$temp = array();

			$temp[] = $value->user_login;
			$temp[] = $value->user_email;

			foreach ($userMetaKeys as $key1 => $value1)
			{
				if($value1 == "role") {
					$temp[] = $userRole;

				} else if($value1 == "user_registered") {
					$temp[] = $value->user_registered;

				} else {
					$temp[] = get_user_meta( $value->ID, $value1, true );
				}
			}

			// School Name
			$schoolName = "";

			$schoolIDSql = "SELECT value FROM ht_bp_xprofile_data WHERE user_id = '%s' AND field_id = '%s'";
			$schoolIDList = $wpdb->get_results($wpdb->prepare($schoolIDSql, [$value->ID, $schoolFieldID]));

			if(count($schoolIDList) > 0)
			{
				$schoolName = get_user_meta( $schoolIDList[0]->value, "nickname", true );
			}

			$temp[] = $schoolName;

			// Courses List
			$courseListSql  = "SELECT meta.user_id, meta.meta_key AS course_id, posts.post_title AS course_name ";
			$courseListSql .= "FROM ht_usermeta AS meta ";
			$courseListSql .= "LEFT JOIN ht_posts AS posts ON posts.ID = meta.meta_key ";
			$courseListSql .= "WHERE user_id = '%s' AND posts.post_type = 'course' AND posts.post_status = 'publish' AND meta_key REGEXP '^[0-9]+$' ";
			$courseListSql .= "ORDER BY meta.umeta_id ASC";

			$coursesList = $wpdb->get_results($wpdb->prepare($courseListSql, [$value->ID]));

			if(count($coursesList) > $maxCourses) $maxCourses = count($coursesList);

			foreach ($coursesList as $key2 => $value2)
			{
				if($value2->course_name != null && $value2->course_name != "")
				{
					$temp[] = $value2->course_name;
				}
			}

			$actualData[] = $temp;
		}

		for ($i=1; $i <= $maxCourses; $i++)
		{
			$fieldHeaders[] = "course_".$i;
		}

		generateCsv($fieldHeaders, $actualData, $fileName);
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Users Export &lsaquo; HT School &#8212; WordPress</title>
</head>
<body>
	<form method="post">
		<input type="number" name="user_id" placeholder="Pleas Enter User ID">
		<button>Export CSV</button>
	</form>
</body>
</html>