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
	<div class="only-4" id="only-4">
	<?php foreach($course_units_array as $lesson_units){ 
		$lessonId = get_post($lesson['id']);
		//echo "<pre>";
		 //print_r($course_units_array);
		//echo $lessonId->ID;
	?>
	<div class="col-sm-12 col-lg-6 pull-left mrg">
        <div class="card">

            <div class="col-sm-12 mrg">
                <div class="co-sm-6 mrg pull-left">
                <?php 

                if($lesson_units['vibe_type'] == 'play'){ ?>
                  <span class="Lpink default-background"><i class="<?php echo vibe_sanitizer($lesson_units['icon'],'text'); ?>"></i> Video</span>
                  <?php }?>
                </div>
                <div class="co-sm-6 mrg pull-right">
                  <h6>Session <?php echo $counter + 1; ?> / <?php echo $countunit; ?></h6>
                </div>
            </div>
            <h5><?php echo apply_filters('wplms_curriculum_course_lesson',(!empty($lesson['link'])?'<a href="'.$lesson_units['link'].'">':''). $lesson_units['title']. (!empty($lesson_units['link'])?'</a>':''),$lesson_units['id'],$id); ?></h5>
            <?php the_sub_title($course_units_array[$counter]['id']); ?>
            <div class="progressbar-circle">
              	<?php echo vibe_sanitizer($lesson_units['duration']); ?>
            </div>
			
		</div>
	</div>
	<?php 
		$counter++;
	}?>
</div>
<div class="all" id="all">
	<?php 
	$counter1 = 0;
	foreach($course_units as $lesson_units){ 
		$lessonId = get_post($lesson['id']);
	?>
	<div class="col-sm-12 col-lg-6 pull-left mrg">
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
            <h5><?php echo apply_filters('wplms_curriculum_course_lesson',(!empty($lesson['link'])?'<a href="'.$lesson_units['link'].'">':''). $lesson_units['title']. (!empty($lesson_units['link'])?'</a>':''),$lesson_units['id'],$id); ?></h5>
             <?php the_sub_title($course_units[$counter1]['id']); ?>
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