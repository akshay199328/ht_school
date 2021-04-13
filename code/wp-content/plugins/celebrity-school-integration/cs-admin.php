<?php
$wpcs_options = get_option('wpcs_options');
if ( isset($_POST['submit']) ) {
  $wpcs_options['integration_id'] = htmlspecialchars($_POST['integration_id']);
  $wpcs_options['cs_api_url'] = htmlspecialchars($_POST['cs_api_url']);
 update_option('wpcs_options', $wpcs_options);
}

if ( isset($_GET['action'] ) ) {
    if ($_GET['action'] == 'sync-courses-cat') {
        require_once(ABSPATH . 'wp-admin/includes/media.php');
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        require_once(ABSPATH . 'wp-admin/includes/image.php');

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://origin-dev.celebrityschool.in:1337/api/category',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_HTTPHEADER => array(
            'x-auth-token: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6OTgwOTQsIm5hbWUiOiJKYXRpbi4gUmFuYSIsImVtYWlsIjoicmFuYWo0MkBnbWFpbC5jb20iLCJpYXQiOjE2MTgyODgxMjZ9.Ba4xOiA_W7-WOkzZWW7f63V-tWAED1Jf90Ehjqt-82o'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $responseCategory = json_decode($response);

          //echo "<pre>hkhkhkk";print_r($response);exit;

        $props = array();
        foreach ($responseCategory as $category) {
          $props[] = array(
          /*'thumb' => "https://www.origin.celebrityschool.in:1337/album_image/album_banner_4.jpg",*/
          'thumb' => "https://ht.fortune4.org/wp-content/uploads/2021/03/thinkstartup.jpeg",
          'name' => $category->cat_name,
          'description' => $category->meta_description,
          'slug' => $category->slug,  
          );
        }


        $getTerms = get_terms(
          array(
            'taxonomy'=> 'course-cat',
            'get'=> 'all',
          )
        );


        $existingCategory = array();
        foreach ($getTerms as  $getTerm) {
          $existingCategory[] = $getTerm->name;
        }

        //echo "<pre>";print_r($existingCategory);exit;

        foreach ($props as $prop) {
        echo "<pre>";print_r($prop);exit;
          if(!in_array($prop['name'], $existingCategory)){

            $catInsert = wp_insert_term($prop['name'], 'course-cat', $prop);

            if(!is_wp_error($catInsert)){

              $tId = isset( $catInsert['term_id'] ) ? $catInsert['term_id'] : 0;
              $image_url = $prop['thumb'];

              $upload_dir = wp_upload_dir();

              $image_data = file_get_contents( $image_url );

              $filename = basename( $image_url );

              if ( wp_mkdir_p( $upload_dir['path'] ) ) {
                $file = $upload_dir['path'] . '/' . $filename;
              }
              else {
                $file = $upload_dir['basedir'] . '/' . $filename;
              }

              file_put_contents( $file, $image_data );

              $wp_filetype = wp_check_filetype( $filename, null );

              $attachment = array(
                'post_mime_type' => $wp_filetype['type'],
                'post_title' => sanitize_file_name( $filename ),
                'post_content' => '',
                'post_status' => 'inherit'
              );

              $attach_id = wp_insert_attachment( $attachment, $file );
              $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
              wp_update_attachment_metadata( $attach_id, $attach_data );

              add_term_meta( $tId, 'course_cat_thumbnail_id', $attach_id, true );
            }

          }else{
            echo "This Name- " . $prop['name']. " Category is Already Exist <br>";
          }

        }



        if(!is_wp_error($catInsert)){
          echo "<pre>";print_r("Category Inserted Successfully");exit;
          //the post is valid
        }else{ 
          echo $catInsert->get_error_message();
        }

             
     
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
        </table>
    </div>
</div>


</form>
</div>
</div>
