<?php
/* Schedule Name (string), name of action
 * Schedule Time (string), timing key from $schedules array e.g. custom_every_minute, custom_every_hour
 */
add_action('start_custom_schedule', function($scheduleName, $scheduleTime) {
	if ( ! wp_next_scheduled($scheduleName) )
	{
		wp_schedule_event(time() + 15, $scheduleTime, $scheduleName);
	}
}, 10, 2);

/* Schedule Name (string), name of action
 */
add_action('stop_custom_schedule', function($scheduleName) {
	wp_clear_scheduled_hook($scheduleName);
}, 10, 1);

function add_custom_cron_schedule($schedules)
{
	$schedules['custom_every_minute'] = array(
		'interval' => 60 * 1,
		'display'  => __('Every Minute'),
	);

	$schedules['custom_every_5_minute'] = array(
		'interval' => 60 * 5,
		'display'  => __('Every 5 Minute'),
	);

	$schedules['custom_every_hour'] = array(
		'interval' => 60 * 60,
		'display'  => __('Every Hour'),
	);

	return $schedules;
}
add_filter('cron_schedules', 'add_custom_cron_schedule');

add_action('send_user_email_via_queue', function() {
	global $wpdb;

	$sql = "SELECT * FROM ht_email_queue WHERE is_sent = 0 LIMIT 50";

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

		// Add data in archive table
		$archiveSql = "INSERT INTO ht_archive_email_logs (queue_id, email_id, user_id, email_subject, email_body, email_headers, attachments, sent_on, queue_created_on, archived_on) (SELECT id AS 'queue_id', email_id, user_id, email_subject, email_body, email_headers, attachments, sent_on, created_on, NOW() FROM ht_email_queue WHERE is_sent = 1)";
		$wpdb->query($archiveSql);

		// Remove sent data from email queue
		$archiveSql = "DELETE FROM ht_email_queue WHERE is_sent = 1";
		$wpdb->query($archiveSql);

		$countSql = "SELECT COUNT(1) AS total FROM ht_email_queue WHERE is_sent = 0";

		$countResult = $wpdb->get_results($countSql);

		if(count($countResult) > 0 && $countResult[0]->total == 0)
		{
			do_action("stop_custom_schedule", "send_user_email_via_queue");
		}
	}
});