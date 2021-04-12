<?php
/**
 * Template Name: Custom API Page
 */

require_once(ABSPATH . 'wp-admin/includes/media.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');

// Course API

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

$responseDecode = json_decode($response);


$responseDecode->status == 1 ? $pStatus = 'publish': $pStatus = 'draft';

$args = array (
   'post_title' => $responseDecode->meta_title,
   'post_content' => $responseDecode->a_desc,
   'post_type' => 'course',
   'post_status' => $pStatus,
   'post_name' => $responseDecode->slug,
);
$post_id = wp_insert_post($args);

$image_url = "https://ht.fortune4.org/wp-content/uploads/2021/03/thinkstartup.jpeg";

$getTerms = get_terms(
  array(
    'taxonomy'=> 'course-cat',
    'get'=> 'all',
  )
);

$existingCategory = array();

foreach ($getTerms as  $getTerm) {
  $existingCategory[] = array(
  	"cat_name" => $getTerm->name, 
  	"cat_id" => $getTerm->term_id, 
  );
}

foreach ($existingCategory as $existingCat ) {
	if($existingCat['cat_name'] == $responseDecode->a_name){
		$cId = $existingCat['cat_id'];
		wp_set_post_terms( $post_id, $cId, 'course-cat', true );
	}
}

add_post_meta( $post_id, 'vibe_trailer_link', $responseDecode->a_trailer_link );
add_post_meta( $post_id, 'vibe_artist_name', $responseDecode->a_artist );
add_post_meta( $post_id, 'vibe_profession', $responseDecode->profession );
add_post_meta( $post_id, 'vibe_promocode_applied', $responseDecode->promocodeApplied ? $responseDecode->promocodeApplied : "" );
add_post_meta( $post_id, 'vibe_recommended_course', "N" );

// Image Insert
$upload_dir = wp_upload_dir();
$image_data = file_get_contents($image_url);
$filename = basename($image_url);
if(wp_mkdir_p($upload_dir['path']))
	$file = $upload_dir['path'] . '/' . $filename;
else
	$file = $upload_dir['basedir'] . '/' . $filename;
file_put_contents($file, $image_data);

$wp_filetype = wp_check_filetype($filename, null );
$attachment = array(
	'post_mime_type' => $wp_filetype['type'],
	'post_title' => sanitize_file_name($filename),
	'post_content' => '',
	'post_status' => 'inherit'
);
$attach_id = wp_insert_attachment( $attachment, $file, $post_id );
require_once(ABSPATH . 'wp-admin/includes/image.php');
$attach_data = wp_generate_attachment_metadata( $attach_id, $file );
$res1= wp_update_attachment_metadata( $attach_id, $attach_data );
$res2= set_post_thumbnail( $post_id, $attach_id );	


//Unit API

$unitCurl = curl_init();

curl_setopt_array($unitCurl, array(
  CURLOPT_URL => 'https://origin-dev.celebrityschool.in:1337/api/video/ranveer-brar-cooking-classes',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'x-auth-token: ',
    'Cookie: connect.sid=s%3AALW5cDF4ckWVnJWeLahsu30Uu2vS8Vd4.MvC%2B%2BwtCrl8x6WpLALIHJDYXchpzLa%2BZUgoDgzhgq%2BI'
  ),
));

$unitAPIResponse = curl_exec($unitCurl);
$unitDecoded = json_decode($unitAPIResponse);
curl_close($unitCurl);

$unitProps = array();
foreach ($unitDecoded->data as $unitDecode ) {
	$unitDecode->status == 1 ? $uStatus = 'publish': $uStatus = 'draft';
	$unitProps = array (
	   'post_title' => $unitDecode->video_title,
	   'post_type' => 'unit',
	   'post_status' => $uStatus,
	);
	
	$unitId = wp_insert_post($unitProps);
	add_post_meta( $unitId, 'vibe_subtitle', $unitDecode->description );

}

//echo "<pre>";print_r($unitDecoded);exit;






if(!is_wp_error($post_id)){
echo "<pre>";print_r("Course Created Successfully");exit;
  //the post is valid
}else{ 
  echo $post_id->get_error_message();
}
