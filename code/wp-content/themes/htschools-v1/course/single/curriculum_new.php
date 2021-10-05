<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
<?php
/**
 * The template for displaying Course Curriculum
 *
 * Override this template by copying it to yourtheme/course/single/curriculum_new.php
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


<?php
do_action('wplms_course_curriculum_section',$id);

$course_curriculum = ht_course_get_full_course_curriculum($id); 

if(!empty($course_curriculum)){
?>
<div id="curriculam_section">
   <?php  
	//print_r($course_curriculum);
		 //echo "<pre>";print_r($course_curriculum); //exit;
	$countlesson=count($course_curriculum);
	$counter=0;
	$session_limit = 3;
	$course_units = [];
	foreach($course_curriculum as $lesson){
		if($lesson['type'] == 'unit'){
			array_push($course_units, $lesson);
		}
	}
	$countunit=count($course_units);

	$i=0;
	
	foreach($course_curriculum as $lesson)
	{
		if($counter<$session_limit)
		{	
		if($lesson['type'] == 'section')
		{
			$j=0;
			//echo "<br/>[I]=>[".$i."]";
			if($i>0)
			{
				echo "</ul>";
			}
	?>
	<h3 class="small-title"><?php echo $lesson['title'];?></h3>
	<?php 
		$i++;	
		} 
		else if($lesson['type'] == 'unit')
		{

			//echo "<br/>[I][J]=>[".$i."][".$j."]";
			if($j==0)
			{
	     ?>
				<ul class="sessions">
		    <?php } ?>

		        <li>
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36">
                        <g id="Group_20982" data-name="Group 20982" transform="translate(-647 -2080)">
                          <g id="Ellipse_567" data-name="Ellipse 567" transform="translate(647 2080)" fill="none" stroke="#2070d8" stroke-width="2">
                            <circle cx="18" cy="18" r="18" stroke="none"></circle>
                            <circle cx="18" cy="18" r="17" fill="none"></circle>
                          </g>

                          <path id="Path_39340" data-name="Path 39340" d="M433.236,385.414l-7.225,4.064a1,1,0,0,1-1.5-.833v-8.129a1,1,0,0,1,1.5-.833l7.225,4.064A.948.948,0,0,1,433.236,385.414Z" transform="translate(236.322 1713.862)" fill="#2070d8"></path>
                        </g>
                      </svg>
                    </div>
                    <i class="<?php echo $lesson['icon']; ?>"></i>  
                    
                    <div class="copy">
                        <span class="session">Session <?php echo $counter + 1; ?> / <?php echo $countunit; ?></span>
                        <p><?php echo $lesson['title'];?></p>
                    </div>
                    <div class="time">
                        <span>
                       <!--  <svg id="Group_20983" data-name="Group 20983" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                        <path id="Path_39390" data-name="Path 39390" d="M10.036,0A10,10,0,1,1,0,10.036,10.041,10.041,0,0,1,10.036,0Zm0,1.236a8.764,8.764,0,1,0,8.727,8.8A8.784,8.784,0,0,0,10.036,1.236Z" fill="gray"></path>
                        <path id="Path_39391" data-name="Path 39391" d="M129,52.655a.619.619,0,1,1,1.236,0v5.236l3.2,1.964a.605.605,0,0,1-.655,1.018l-3.418-2.109a.547.547,0,0,1-.364-.509Z" transform="translate(-119.618 -48.218)" fill="gray"></path>
                      </svg> --><?php echo vibe_sanitizer($lesson['duration']); ?></span>
                    </div>
                </li>
	     <?php 
	     $counter++;
		 $j++;
	  }	
	}
    else
    {
        echo "</ul>";
    }
   }
   ?>
   </div>  
<?php
    if($countunit>=$session_limit)
    {
  ?>  
	 <div class="view-all-wrapper">
        <a class="view-all load-more">Load More</a>

        <input type="hidden" id="sessionCount" value="<?php echo $countunit; ?>">
        <input type="hidden" id="sessionLimit" value="<?php echo $session_limit; ?>">
        <input type="hidden" id="courseID" value="<?php echo $id; ?>">
    </div>
<?php } 
}
else{
	?>
	<div class="message"><?php echo _x('No curriculum found !','Error message for no curriculum found in course curriculum ','vibe'); ?></div>
   <?php	
}
?>

<script type="text/javascript">
    //alert( $(".load-more").html());
    window.onbeforeunload = null;
    (function($) {
$(".load-more").on("click", function (event, ui) {
     
        var courseID = $("#courseID").val();
        var sessionLimit = $("#sessionLimit").val();   
        var sessionCount = $("#sessionCount").val();           
        var loadSessionCount = 3;

        var btnName = $(".load-more").html();
        //alert("btnname"+$(".load-more").html());

        if(btnName=='Load More')
        {
           var totalDisplaySession = parseInt(sessionLimit) + parseInt(loadSessionCount);

        }
        else if(btnName=='Hide')
        {
           var totalDisplaySession = parseInt(sessionCount) - parseInt(loadSessionCount);
        }    
//alert("totalDisplaySession"+totalDisplaySession); 

        if(totalDisplaySession != ""){
          jQuery.ajax({
              type : "POST",
              dataType : "json",
              url : "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
              data : {"action": "load_more_curriculum_sessions",total_display_session : totalDisplaySession,course_id : courseID},
              beforeSend:function(){
                    $(".load-more").text("Loading...");
                },
              success: function(response) {           
                  if(response.status == 1){
                    jQuery("#curriculam_section").html(response.response);  
                      if(btnName=='Load More')
                      {       
                        $(".load-more").text("Hide");
                      }
                      else if(btnName=='Hide')
                      {       
                        $(".load-more").text("Load More");
                      }

                  }
              }
          });
        }
      });

    })( jQuery );
</script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script >
$(document).ready(function(){

    // Load more data
    $('.load-more').click(function(){
    	alert("hi");
        var row = Number($('#row').val());
        var allcount = Number($('#all').val());
        var rowperpage = 3;
        row = row + rowperpage;
        if(row <= allcount){
            $("#row").val(row);
        alert("row = "+row+"rowperpage = "+rowperpage);

            $.ajax({
                url: 'loadMoreCurriculumSessions.php',
                type: 'post',
                data: {allcount:allcount},
                beforeSend:function(){
                    $(".load-more").text("Loading...");
                },
                success: function(response){
alert("response"+response);
                    // Setting little delay while displaying new content
                    //setTimeout(function() {
                        // appending posts after last post with class="post"
                       $("#curriculam_section").html(response);
                   // }, 2000);

                }
            });
        }

    });

});
</script> -->