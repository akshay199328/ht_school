<?php
// If this file is called directly, abort.
if(!defined('WPINC')){ die; }

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://origin-dev.celebrityschool.in:1337/api/category',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'x-auth-token: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6OTgwOTQsIm5hbWUiOiJKYXRpbi4gUmFuYSIsImVtYWlsIjoicmFuYWo0MkBnbWFpbC5jb20iLCJpYXQiOjE2MTgyODk5NjV9.LCowzrBdKASwUcTLz73sxaTvaXc7BMH6zqIfhGmZ0Ws'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $responseCategory = json_decode($response);

          //echo "<pre>hkhkhkk";print_r($responseCategory);exit;

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
        //echo "<pre>";print_r($prop);exit;
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


?>