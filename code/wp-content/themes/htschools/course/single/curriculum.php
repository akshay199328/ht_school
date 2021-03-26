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
	//print_r($course_curriculum);exit;
		//echo "<pre>";print_r($course_curriculum);exit;
	$countlesson=count($course_curriculum);
	$counter=0;
	foreach($course_curriculum as $lesson){
		

	if($counter<=6) {

		switch($lesson['type']){
			case 'unit':
			$lessonId = get_post($lesson['id']);
				?>
				  <div class="col-sm-12 col-lg-6 pull-left mrg">
                        <div class="card">

                      <div class="col-sm-12 mrg">
                            <div class="co-sm-6 mrg pull-left">
                            <?php if($lesson['vibe_type'] == 'play'){ ?>
                              <span class="Lpink default-background"><i class="<?php echo vibe_sanitizer($lesson['icon'],'text'); ?>"></i> Video</span>
                              <?php }?>
                            </div>
                            <div class="co-sm-6 mrg pull-right">
                              <h6>Session <?php echo $counter; ?> / <?php echo $countlesson; ?></h6>
                            </div>
                      </div>
                         <h5><?php echo apply_filters('wplms_curriculum_course_lesson',(!empty($lesson['link'])?'<a href="'.$lesson['link'].'">':''). $lesson['title']. (!empty($lesson['link'])?'</a>':''),$lesson['id'],$id); ?></h5>
                          <p><?php echo wp_trim_words( $lessonId->post_content, 30, '..'); ?></p>
                          <div class="progressbar-circle">
                          	<?php echo vibe_sanitizer($lesson['duration']); ?>
                          </div>
					
				</div>
			    </div>
				<?php
				do_action('wplms_curriculum_course_unit_details',$lesson);
			break;
			case 'quiz':
				?>
				<tr class="course_lesson">
					<td class="curriculum-icon"><i class="<?php echo vibe_sanitizer($lesson['icon'],'text'); ?>"></i></td>
					<td><?php echo apply_filters('wplms_curriculum_course_quiz',(($lesson['link'])?'<a href="'.$lesson['link'].'">':''). $lesson['title'].(isset($lesson['free'])?$lesson['free']:'') . (!empty($lesson['link'])?'</a>':''),$lesson['id'],$id); ?></td>
					<td><?php echo vibe_sanitizer($lesson['labels']); ?> </td>
					<td><?php echo vibe_sanitizer($lesson['duration']); ?></td>
				</tr>
				<?php
				do_action('wplms_curriculum_course_quiz_details',$lesson);
			break;
			case 'section':
				/*?>
				<tr class="course_section">
					<td colspan="4"><?php echo vibe_sanitizer($lesson['title'],'text'); ?></td>
				</tr>
				<?php */
			break;
			default:
				do_action('wplms_curriculum_course_lesson_line_html',$lesson,$id);
			break;
		} 
	}$counter++;

	}
	
}else{
	?>
	<div class="message"><?php echo _x('No curriculum found !','Error message for no curriculum found in course curriculum ','vibe'); ?></div>
	<?php	
}
?>
</div>

<?php

?>