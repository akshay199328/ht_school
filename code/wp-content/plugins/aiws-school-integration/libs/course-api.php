<?php
// If this file is called directly, abort.
if(!defined('WPINC')){ die; }

$slugAiwsUrl = "webservice/rest/server.php?";

$jsonBody = array(
	'wstoken'             => $wpaiws_options['access_token'],
	'wsfunction'          => "local_program_programs_provider",
	'moodlewsrestformat'  => "json"
);

$curl = curl_init();

$courseApiUrl = $wpaiws_options['aiws_api_url'] . $slugAiwsUrl . http_build_query($jsonBody);

curl_setopt_array($curl, array(
	CURLOPT_URL => $courseApiUrl,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);
$responseDecode = json_decode($response);

$count = 0;
$errorList = array();

if(is_array($responseDecode->records))
{
	// Get and save course category
	$getTerms = get_terms(
		array(
			'get'		=> 'all',
			'taxonomy'	=> 'course-cat',
		)
	);

	$courseCategoryID = 0;

	foreach ($getTerms as $key => $value) {
		if(strtoupper($value->name) == "AIWS")	$courseCategoryID = $value->term_id;
	}

	foreach ($responseDecode->records as $programKey => $programValue)
	{
		// Limit to insert only n no of posts
		// if($count > 1)	continue;

		$args = array (
			'post_title'	=> $programValue->fullname,
			'post_content'	=> $programValue->description,
			'post_type'		=> 'course',
			'post_status'	=> 'draft',
			'post_name'		=> $programValue->fullname,
		);

		$courseList = json_decode($programValue->programcourses);

		$fetched = array(
			'post_type' => 'course',
			'meta_query' => array(
				array(
					'key'	=> 'aiws_course_id',
					'value'	=> $programValue->programid,
				),
			),
		);

		$fetchedQuery = new WP_Query( $fetched );

		if ($fetchedQuery->found_posts <= 0)
		{
			// Add post data in database
			$postID = wp_insert_post($args);

			$unitArray		= [];
			$courseArray	= [];

			foreach ($courseList as $courseKey => $courseValue)
			{
				$courseArray[] = $courseValue->courseid;

				if($courseKey == 0)
				{
					// Image Insert
					$imageURL	= $courseValue->imageurl;
					$uploadDir	= wp_upload_dir();
					$imageData	= file_get_contents($imageURL);
					$filename	= basename($imageURL);

					// Check if extension is in file name or not
					// if not then check and add
					$tempName		= explode('.', $filename);
					$hasExtension	= false;

					if(count($tempName) > 0)
					{
						$lastElem = end($tempName);

						if($lastElem == "gif" || $lastElem == "jpg" || $lastElem == "jpeg" || $lastElem == "png")
						{
							$hasExtension = true;
						}
					}

					if(!$hasExtension)
					{
						$imgExt = '.jpg';

						$imgTypeCode = exif_imagetype($imageURL);

						if($imgTypeCode == 1)		$imgExt = '.gif';
						else if($imgTypeCode == 2)	$imgExt = '.jpg';
						else if($imgTypeCode == 3)	$imgExt = '.png';

						$filename .= $imgExt;
					}

					if(wp_mkdir_p($uploadDir['path']))
						$file = $uploadDir['path'] . '/' . $filename;
					else
						$file = $uploadDir['basedir'] . '/' . $filename;

					file_put_contents($file, $imageData);

					$wpFiletype = wp_check_filetype($filename, null);
					$attachment = array(
						'post_mime_type'	=> $wpFiletype['type'],
						'post_title'		=> sanitize_file_name($filename),
						'post_content'		=> '',
						'post_status'		=> 'inherit'
					);

					require_once(ABSPATH . 'wp-admin/includes/image.php');

					$attachID	= wp_insert_attachment( $attachment, $file, $postID );
					$attachData	= wp_generate_attachment_metadata( $attachID, $file );
					$res1		= wp_update_attachment_metadata( $attachID, $attachData );
					$res2		= set_post_thumbnail( $postID, $attachID );
				}

				// Add Sections & Units
				// Create 1st part of section name
				// Avoided same unit name on both sides of -
				if(strtolower($courseValue->coursename) == strtolower($programValue->fullname))
				{
					$sectionName = trim($courseValue->coursename);
				}
				else
				{
					$sectionName = trim(str_replace(':', '', str_ireplace($programValue->fullname, '', $courseValue->coursename)));
				}

				foreach ($courseValue->courseformat as $formatKey => $formatValue)
				{
					// Create full section names
					$sectionNameFull = trim($sectionName . " - " . $formatValue->courseformatname);

					foreach ($formatValue->courseformatmodules as $formatModuleKey => $formatModuleValue)
					{
						// Create a Unit name
						// Avoided same unit name on both sides of -
						if(strtolower($formatValue->courseformatname) == strtolower($formatModuleValue->activityname))
						{
							$unitNameFull = trim($formatModuleValue->activityname);
						}
						else
						{
							$unitNameFull = trim($formatValue->courseformatname . " - " . $formatModuleValue->activityname);
						}

						$unitProps = array (
							'post_title'	=> $unitNameFull,
							'post_type'		=> 'unit',
							'post_status'	=> 'publish',
						);

						$unitID = wp_insert_post($unitProps);

						$unitArray[] = $unitID;
					}
				}
			}

			// Update course category
			if($courseCategoryID > 0)
			{
				wp_set_post_terms( $postID, $courseCategoryID, 'course-cat', true );
			}

			// Update meta data
			add_post_meta( $postID, 'aiws_program_id',			$programValue->programid );
			add_post_meta( $postID, 'aiws_program_fullname',	$programValue->fullname );
			add_post_meta( $postID, 'aiws_program_shortname',	$programValue->shortname );
			add_post_meta( $postID, 'aiws_program_type',		$programValue->programtype );
			add_post_meta( $postID, 'aiws_program_description',	$programValue->description );
			add_post_meta( $postID, 'aiws_course_id', 			$courseArray );

			update_post_meta( $postID, 'vibe_course_curriculum', $unitArray);

			if(is_wp_error($postID))
			{
				$errorList[] = $postID->get_error_message();
			}
			else
			{
				// The post is valid
				$count++;
			}
		}
	}
}