<?php

// If this file is called directly, abort.
if(!defined('WPINC')){ die; }


$wpcs_options = get_option('wpcs_options');
require_once(ABSPATH . 'wp-admin/includes/media.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');

if ( isset($_POST['submit']) ) {
  $wpcs_options['integration_id'] = htmlspecialchars($_POST['integration_id']);
  $wpcs_options['cs_api_url'] = htmlspecialchars($_POST['cs_api_url']);
 update_option('wpcs_options', $wpcs_options);
}

if ( isset($_GET['action'] ) ) {
    if ($_GET['action'] == 'sync-courses-cat') {
        require_once("libs/celebrity-category.php");
    }

    if($_GET['action'] == 'sync-courses'){

        require_once("libs/course-api.php");
     
    }
}


?>
<?php if ( !empty($_POST ) ) : ?>
<div id="message" class="updated fade"><p><strong><?php _e('Options saved.') ?></strong></p></div>
<?php endif; ?>
<div class="wrap">
<h2><?php _e('celebrityschool Configuration', 'wp-celeb-school'); ?></h2>

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
                <th><?php _e("Integration Email id", "wp-celeb-school") ?></th><td><input type="email" name="integration_id" value="<?php echo stripslashes($wpcs_options['integration_id']); ?>" /></td>
            </tr>
            <tr>
                <th><?php _e("API URL", "wp-celeb-school") ?></th><td><input type="text" name="cs_api_url" value="<?php echo stripslashes($wpcs_options['cs_api_url']); ?>" /></td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type="submit" name="submit" class="button button-primary" value="<?php _e('Update options &raquo;'); ?>" />
                </td>
            </tr>
              <tr>   <th></th>
                <td>
                    <div class="submitbox">
                        <div id="delete-action">
                        <a href="?page=wp-celeb-school&amp;action=sync-courses-cat" id="wpcs-sync-cat" class="button">Sync Courses Categories</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>   <th></th>
              <td>
                <div class="submitbox">
                  <div id="delete-action">
                    <a href="?page=wp-celeb-school&amp;action=sync-courses" id="wpcs-sync-cat" class="button">Sync Courses</a>
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
