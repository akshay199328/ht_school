<?php
// If this file is called directly, abort.
if(!defined('WPINC')){ die; }

$wpaiws_options = get_option('wpaiws_options');

require_once(ABSPATH . 'wp-admin/includes/media.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');

if ( isset($_POST['submit']) )
{
	$wpaiws_options['aiws_api_url'] = htmlspecialchars($_POST['aiws_api_url']);
	$wpaiws_options['access_token'] = htmlspecialchars($_POST['access_token']);
	update_option('wpaiws_options', $wpaiws_options);
}

$wpaiws_options = get_option('wpaiws_options');

if ( isset($_GET['action'] ) )
{
	if($_GET['action'] == 'sync-courses') {
		require_once("libs/course-api.php");
	}

	if(count($errorList) > 0)
	{
		echo '<div class="error">';
			foreach ($errorList as $key => $value) {
				echo '<p><strong>'.$value.'</strong></p>';
			}
		echo '</div>';
	}
	else
	{
		echo '<div id="message" class="updated fade"><p><strong>Success. New courses added: '.$count.'</strong></p></div>';
	}
} ?>

<div class="wrap">
<h2><?php _e('AIWS Configuration', 'wp-aiws-school'); ?></h2>

<div class="metabox-holder" id="poststuff">
<div class="meta-box-sortables">
<script>
	jQuery(document).ready(function($) {
		$('.postbox').children('h3, .handlediv').click(function(){ $(this).siblings('.inside').toggle();});
		$('#wpcs-sync-data').click(function(){
			return confirm('All course master data will be updated, are you sure ?');
		});
	});
</script>
<div class="wrap">
<form action="" method="post">

<div class="postbox">
	 <div class="inside" style="display: block;">
		<table class="form-table">
			<tr>
				<th><?php _e("API URL", "wp-aiws-school") ?></th><td><input type="text" name="aiws_api_url" value="<?php echo stripslashes($wpaiws_options['aiws_api_url']); ?>" /></td>
			</tr>
			<tr>
				<th><?php _e("Access Token", "wp-aiws-school") ?></th><td><input type="text" name="access_token" value="<?php echo stripslashes($wpaiws_options['access_token']); ?>" /></td>
			</tr>
			<tr>
				<th></th>
				<td>
					<input type="submit" name="submit" class="button button-primary" value="<?php _e('Update options &raquo;'); ?>" />
				</td>
			</tr>
			<!-- <tr>
				<th></th>
				<td>
					<div class="submitbox">
						<div id="delete-action">
							<a href="?page=wp-aiws-school&amp;action=sync-courses-cat" id="wpaiws-sync-cat" class="button">Sync Courses Categories</a>
						</div>
					</div>
				</td>
			</tr> -->
			<tr>
				<th></th>
				<td>
					<div class="submitbox">
						<div id="delete-action">
							<a href="?page=wp-aiws-school&amp;action=sync-courses" id="wpaiws-sync-cat" class="button">Sync Courses</a>
						</div>
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>
</form>
</div>
</div>
