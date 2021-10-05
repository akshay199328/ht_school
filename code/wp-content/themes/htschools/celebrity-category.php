<?php
/**
 * Template Name: Celebrity Category
 */

require_once(ABSPATH . 'wp-admin/includes/media.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://origin-dev.celebrityschool.in:1337/api/album/ranveer-brar-cooking-classes',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_HTTPHEADER => array(
    'x-auth-token: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6OTgwOTQsIm5hbWUiOiJKYXRpbi4gUmFuYSIsImVtYWlsIjoicmFuYWo0MkBnbWFpbC5jb20iLCJpYXQiOjE2MTgyMDg2NzV9.Z7dHuLq8wQ2xB3ZZ48mKk0tGelLIhuDfneu2QKdZn80',
    'Cookie: connect.sid=s%3AJWoQe1D0xmO1_P1J-95EvmdkAOFzSTRO.oPW%2BXPJbxLPzIyEJzo79Kmn8IiXD0W60aiYYpwlvBaY'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

$responseCategory = json_decode($response);

$props = array();
foreach ($responseCategory as $category) {
  $props[] = array(
  /*'thumb' => "https://www.origin.celebrityschool.in:1337/album_image/album_banner_4.jpg",*/
  'thumb' => "https://htschool.hindustantimes.com/wp-content/uploads/2021/03/thinkstartup.jpeg",
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
//echo "<pre>";print_r($prop);
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
      require_once( ABSPATH . 'wp-admin/includes/image.php' );
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