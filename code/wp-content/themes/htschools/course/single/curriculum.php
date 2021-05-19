<?php
/**
 * The template for displaying Course Curriculum
 *
 * Override this template by copying it to yourtheme/course/single/curriculum.php
 *
 * @author 		VibeThemes
 * @package 	vibe-course-module/templates
 * @version     2.2
 */

if ( !defined( 'ABSPATH' ) ) exit;
global $post;
$id= get_the_ID();

$class='';
if(class_exists('WPLMS_tips')){
	$wplms_settings = WPLMS_tips::init();
	$settings = $wplms_settings->lms_settings;
	if(isset($settings['general']['curriculum_accordion'])){
		$class="";	
	}
}


?>

<div class="col-sm-12 mrg list">
<?php
do_action('wplms_course_curriculum_section',$id);

$course_curriculum = ht_course_get_full_course_curriculum($id); 

if(!empty($course_curriculum)){
	//print_r($course_curriculum);
		// echo "<pre>";print_r($course_curriculum);exit;
	$countlesson=count($course_curriculum);
	//$counter=0;
	$course_units = [];
	foreach($course_curriculum as $lesson){
		if($lesson['type'] == 'unit'){
			array_push($course_units, $lesson);
		}
	}
	$countunit=count($course_units);
	$course_units_array = array_slice($course_units, 0, 4);
	$counter=0;
	?>
	<div class="only-4 curriculum-wrapper" id="only-4">
	<?php foreach($course_units as $lesson_units){ 
		$lessonId = get_post($lesson['id']);
		//echo "<pre>";
		 //print_r($course_units_array);
		//echo $lessonId->ID;
	?>
	<div class="col-sm-12 col-lg-6 pull-left video-wrap">
        <div class="card">

            <div class="col-sm-12 mrg">
                <div class="co-sm-12 mrg">
                <?php 

                if($lesson_units['vibe_type'] == 'play'){ ?>
                  <span class="Lpink default-background"><i class="<?php echo vibe_sanitizer($lesson_units['icon'],'text'); ?>"></i> Video</span>
                  <?php }?>
                </div>
            </div>
            <!-- <h5><?php echo apply_filters('wplms_curriculum_course_lesson',(!empty($lesson['link'])?'<a href="'.$lesson_units['link'].'">':''). $lesson_units['title']. (!empty($lesson_units['link'])?'</a>':''),$lesson_units['id'],$id); ?></h5> -->
            <?php $video = get_post_meta($course_units_array[$counter]['id'],'vibe_video',true);
	            if(strlen(trim($video))) {
	            ?>
	            <video width="100%" height="163" controls="" poster="assets/img/Intersection-video.jpg">
	                <source src="<?php echo $video;?>" type="video/mp4">
	            </video>
            	<h5><?php echo $lesson_units['title'];?></h5>
        	<?php }else{
        		$sub_title = get_post_meta($course_units_array[$counter]['id'],'vibe_subtitle',true);
        		?>
        		<h6>Session <?php echo $counter + 1; ?> / <?php echo $countunit; ?></h6>
        		<h5><?php echo $lesson_units['title'];?></h5>
        		<p class="description">
        		<?php 
        			//echo mb_strimwidth( $sub_title, 0, 130, '...' );?></p>

        		<?php /*$sub_title = the_sub_title($course_units_array[$counter]['id']);
        		wp_trim_words(strip_tags($sub_title), 5, NULL);*/

        		 }?>
            <div class="progressbar-circle">
              	<?php echo vibe_sanitizer($lesson_units['duration']); ?>
            </div>
            <div class="progressbar-full">
            	<div class="pull-left">
            		<div class="progress_new">
		            	<div class="overlay"></div>
				        <div class="left"></div>
				        <div class="right"></div>
				    </div>
            	</div>
            	<div class="pull-left">
            		<span class="title timer" data-from="0" data-to="30" data-speed="1800">30 MINS <span class="light">Estimated</span></span>
            	</div>
            </div>
            
		    
			
		</div>
	</div>
	<?php 
		$counter++;
	}?>
</div>
<div class="all curriculum-wrapper" id="all">
	<?php 
	$counter1 = 0;
	foreach($course_units as $lesson_units){ 
		$lessonId = get_post($lesson['id']);
	?>
	<div class="col-sm-12 col-lg-6 pull-left video-wrap">
        <div class="card">

            <div class="col-sm-12 mrg">
                <div class="co-sm-6 mrg pull-left">
                <?php 

                if($lesson_units['vibe_type'] == 'play'){ ?>
                  <span class="Lpink default-background"><i class="<?php echo vibe_sanitizer($lesson_units['icon'],'text'); ?>"></i> Video</span>
                  <?php }?>
                </div>
                <div class="co-sm-6 mrg pull-right">
                  <h6>Session <?php echo $counter1 + 1; ?> / <?php echo $countunit; ?></h6>
                </div>
            </div>
            <?php $video1 = get_post_meta($course_units[$counter1]['id'],'vibe_video',true);
	            if(strlen(trim($video1))) {
	            ?>
	            <video width="100%" height="163" controls="" poster="assets/img/Intersection-video.jpg">
	                <source src="<?php echo $video1;?>" type="video/mp4">
	            </video>
	            <h6>Session <?php echo $counter1 + 1; ?> / <?php echo $countunit; ?></h6>
            	<h5><?php echo $lesson_units['title'];?></h5>
        		<?php }else{
        			$sub_title1 = get_post_meta($course_units[$counter1]['id'],'vibe_subtitle',true);
        		?>
        		<h5><?php echo $lesson_units['title'];?></h5>
        		<p>
        		<?php 
        			//echo mb_strimwidth( $sub_title1, 0, 130, '...' );?></p>

        		<?php /*$sub_title = the_sub_title($course_units_array[$counter]['id']);
        		wp_trim_words(strip_tags($sub_title), 5, NULL);*/

        		 }?>
            <div class="progressbar-circle">
              	<?php echo vibe_sanitizer($lesson_units['duration']); ?>
            </div>
			
		</div>
	</div>
	<?php 
		$counter1++;
	}?>
</div>
<?php 
	}
else{
	?>
	<div class="message"><?php echo _x('No curriculum found !','Error message for no curriculum found in course curriculum ','vibe'); ?></div>
	<?php	
}
?>
</div>

<?php

?>