<?php
// This function is no longer required
exit;
require_once dirname( __DIR__ ) . '/wp-load.php';

date_default_timezone_set("Asia/Kolkata");

$cronResult['email_queue']	= 0;
$cronResult['email_sent']	= 0;


$sql = "SELECT * FROM ht_email_queue WHERE is_sent = 0 LIMIT 30";

$queueResult = $wpdb->get_results($sql);

if(count($queueResult) > 0)
{
	$cronResult['email_queue'] = count($queueResult);

	foreach ($queueResult as $key => $value)
	{
		$emailHeaders = $emailAttachments = array();

		if($value->email_headers != "")
		{
			$emailHeaders = json_decode($value->email_headers, true);
		}

		$mailSentResponse = wp_mail( $value->email_id, $value->email_subject, $value->email_body, $emailHeaders, $emailAttachments );

		if($mailSentResponse)
		{
			$updateSql = "UPDATE ht_email_queue SET is_sent = 1, sent_on = NOW() WHERE id = '".$value->id."'";
			$wpdb->query($updateSql);
			$cronResult['email_sent']++;
		}
		else
		{
			$updateSql = "UPDATE ht_email_queue SET is_sent = 2 WHERE id = '".$value->id."'";
			$wpdb->query($updateSql);
		}
	}

	$archiveSql = "INSERT INTO ht_archive_email_logs (queue_id, email_id, user_id, email_subject, email_body, email_headers, attachments, sent_on, queue_created_on, archived_on) (SELECT id AS 'queue_id', email_id, user_id, email_subject, email_body, email_headers, attachments, sent_on, created_on, NOW() FROM ht_email_queue WHERE is_sent = 1)";
	$wpdb->query($archiveSql);

	$archiveSql = "DELETE FROM ht_email_queue WHERE is_sent = 1";
	$wpdb->query($archiveSql);

	/*$countSql = "SELECT COUNT(1) AS total FROM ht_email_queue WHERE is_sent = 0";

	$countResult = $wpdb->get_results($countSql);

	if(count($countResult) > 0 && $countResult[0]->total == 0)
	{
	}*/
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