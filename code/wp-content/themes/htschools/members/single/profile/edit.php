<?php
acf_form_head();
global $bp;
/**
 * BuddyPress - Members Single Profile Edit
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

/**
 * Fires after the display of member profile edit content.
 *
 * @since 1.1.0
 */

$currentUser = wp_get_current_user();
$user_id = bp_loggedin_user_id();
$args = array(
        'field'   => 'Phone', // Field name or ID.
        );

$user_mobile = get_profile_data('Phone');
$user_birthday = get_profile_data('Birthday');
$user_gender = get_profile_data('Gender');
$user_country = get_profile_data('Country');
$user_state = get_profile_data('State');
$user_city = get_profile_data('City');

$user_school_name = "";
$user_school = get_profile_data('Linked School');
if(intval($user_school) > 0){
	$user_school_name = get_user_by('id', $user_school)->display_name;
}

$dob = strtotime($user_birthday);

// ht_parent_child_mapping

$childrens = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix . "parent_child_mapping WHERE parent_id = " . $user_id );
$child = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix . "parent_child_mapping WHERE child_id = " . $user_id );
/*
	xprofile_set_field_data('Phone', $user_id, '8454946448');
  	
  	echo 'Username: ' . $current_user->user_login . '<br />';
    echo 'User email: ' . $current_user->user_email . '<br />';
    echo 'User first name: ' . $current_user->user_firstname . '<br />';
    echo 'User last name: ' . $current_user->user_lastname . '<br />';
    echo 'User display name: ' . $current_user->display_name . '<br />';
    echo 'User ID: ' . $current_user->ID . '<br />
*/


?>
<div class="col-md-8 mrg">
	<div class="profile-card">
		<h1>Personal Details</h1>
		<form id="profile-edit-form" name="profile-form" class="standard-form">
			
			<input type="hidden" name="action" value="save_custom_profile">
			<input type="text" id="user_identifier" name="user_identifier" value="<?php echo $user_id;?>">
			<div class="form-group">
				<label for="first_name">First Name*</label>
				<input type="text" class="form-control" name="first_name" placeholder="" value="<?php echo $currentUser->user_firstname; ?>" id="user_firstname">
				<span id="errFirstName"></span>
			</div>
			<div class="form-group">
				<label for="last_name">Last Name*</label>
				<input type="text" class="form-control" name="last_name" placeholder="" value="<?php echo $currentUser->user_lastname; ?>" id="user_lastname">
				<span id="errLastName"></span>
			</div>
			<div class="form-group">
				<label for="user_email">Email*</label>
				<input type="email" class="form-control" name="user_email" placeholder="" value="<?php echo $currentUser->user_email; ?>" readonly>
			</div>
			<div class="form-group">
				<label for="user_mobile">Mobile Number*</label>
				<input type="text" class="form-control" name="user_mobile" id="user_mobile" placeholder="" maxlength="10" value="<?php echo $user_mobile ?>" >
				<span id="errMobileMsg"></span>
			</div>
			<div class="form-group edit_DOB">
				<label for="user_dob">Date of Birth*</label>
				<input id="user_dob_display" type="text" class="form-control" name="user_dob_display" placeholder="" value="<?php echo date("d/m/Y", $dob); ?>" readonly>
				<input id="user_dob" type="hidden" name="user_dob" value="<?php echo date("Y-m-d", $dob); ?>">
			</div>
			<div class="form-group ">
				
				<label> Select Gender*</label> 
				<div class="radio_switch"> 
					<div class="switch">
	                    <input type="radio" class="switch-input user_radio_btn" name="user_gender" value="Female" id="one" <?php if($user_gender == '' || $user_gender == null){ echo "checked"; } else if($user_gender == 'Female'){ echo "checked"; } ?>>
	                    <label for="one" class="switch-label switch-label-off">
	                        <span>Female</span>
	                    </label>
	                    <input type="radio" class="switch-input admin_radio_btn" name="user_gender" value="Male" id="two" <?php if($user_gender == 'Male'){ echo "checked"; } ?>>
	                    <label for="two" class="switch-label switch-label-on">
	                        <span>Male</span>
	                    </label>
	                    <span class="slider2"></span>
	                </div>
	            </div>
			</div>
			<div class="form-group profile_search">
				<label for="user_school_data">School*</label>
				<input type="text" class="form-control" id="user_school_data" name="user_school_data" placeholder="" value="<?php echo $user_school_name; ?>">
				<input type="hidden" id="user_school" name="user_school" value="<?php echo $user_school; ?>">
				<span id="errSchoolMsg"></span>
			</div>
			<div style="display:none" id="other_school">
				<input type="text" id="user_school_other" name="user_school_other" placeholder="Please enter others school name" value="" >											
				<span id="errotherSchoolMsg"></span>
			</div>

			<?php $profileType = get_profile_data('Profile Type'); 
				if($profileType != 'Parent'){
			?>

				<div class="form-group profile_dropdown">
	                <label for="">Grade / Standard*</label>
	                <select name="grade" id="grade">
	                	<option value="K1" <?php if($child[0]->grade=="K1") echo 'selected="selected"'; ?>>K1</option>
	                	<option value="K2" <?php if($child[0]->grade=="K2") echo 'selected="selected"'; ?>>K2</option>
	                  	<option value="1" <?php if($child[0]->grade=="1") echo 'selected="selected"'; ?>>1</option>
	                  	<option value="2" <?php if($child[0]->grade=="2") echo 'selected="selected"'; ?>>2</option>
	                  	<option value="3" <?php if($child[0]->grade=="3") echo 'selected="selected"'; ?>>3</option>
	                  	<option value="4" <?php if($child[0]->grade=="4") echo 'selected="selected"'; ?>>4</option>
	                  	<option value="5" <?php if($child[0]->grade=="5") echo 'selected="selected"'; ?>>5</option>
	                  	<option value="6" <?php if($child[0]->grade=="6") echo 'selected="selected"'; ?>>6</option>
	                  	<option value="7" <?php if($child[0]->grade=="7") echo 'selected="selected"'; ?>>7</option>
	                  	<option value="8" <?php if($child[0]->grade=="8") echo 'selected="selected"'; ?>>8</option>
	                  	<option value="9" <?php if($child[0]->grade=="9") echo 'selected="selected"'; ?>>9</option>
	                  	<option value="10" <?php if($child[0]->grade=="10") echo 'selected="selected"'; ?>>10</option>
	                  	<option value="11" <?php if($child[0]->grade=="11") echo 'selected="selected"'; ?>>11</option>
	                  	<option value="12" <?php if($child[0]->grade=="12") echo 'selected="selected"'; ?>>12</option>
	                </select>
	            </div>
	            <div class="form-group profile_dropdown">
	                <label for="">Section / Division* <?php echo $child->division?></label>
	                <select name="division" id="division">
	                  <option value="A" <?php if($child[0]->division=="A") echo 'selected="selected"'; ?>>A</option>
	                  <option value="B" <?php if($child[0]->division=="B") echo 'selected="selected"'; ?>>B</option>
	                  <option value="C" <?php if($child[0]->division=="C") echo 'selected="selected"'; ?>>C</option>
	                  <option value="D" <?php if($child[0]->division=="D") echo 'selected="selected"'; ?>>D</option>
	                  <option value="E" <?php if($child[0]->division=="E") echo 'selected="selected"'; ?>>E</option>
	                  <option value="F" <?php if($child[0]->division=="F") echo 'selected="selected"'; ?>>F</option>
	                  <option value="G" <?php if($child[0]->division=="G") echo 'selected="selected"'; ?>>G</option>
	                  <option value="H" <?php if($child[0]->division=="H") echo 'selected="selected"'; ?>>H</option>
	                  <option value="I" <?php if($child[0]->division=="I") echo 'selected="selected"'; ?>>I</option>
	                  <option value="J" <?php if($child[0]->division=="J") echo 'selected="selected"'; ?>>J</option>
	                </select>
	            </div>
        	<?php } ?>
			<div class="form-group profile_search">
				<label for="user_country_data">Country</label>
				<input type="text" class="form-control" id="user_country_data" name="user_country_data" placeholder="" value="<?php echo $user_country; ?>">
				<input type="hidden" id="user_country" name="user_country" value="<?php echo $user_country; ?>">
			</div>


			<div class="form-group profile_search">
				<label for="user_state">State</label>
				<input type="text" class="form-control" id="user_state" name="user_state" placeholder="" value="<?php echo $user_state; ?>">
			</div>


			<div class="form-group ">
				<label for="user_city">City</label>
				<input type="text" class="form-control" id="user_city" name="user_city" placeholder="" value="<?php echo $user_city; ?>">
			</div>

			
			<!-- <div class="form-group hide-acf-form">
				<?php// acf_form( $args );?>
			</div>
			<div class="form-group">
                <div class="search_value">                    

                   <?php  
                  /* $user = wp_get_current_user();
                   $args = array(
                      'post_id' => 'user_{$user->ID}',
                      'form_attributes' => array(
                      'class' => 'new-campaign-form',
                      'id'=>'modalAjaxTrying'

                      ),
                      'fields' => ['select_school'],
                      'submit_value' => __("Save and Continue", 'acf'),
                    );
                acf_form( $args );*/ ?>

                              </div>        
                </div> -->

			
			<p id="response_message" class="" style="margin: 10px 0; display: none;"></p>
			<div class="form-group">
				<button type="button" class="btn btn-default" id="edit_profile_submit">Submit</button>
				<button type="button" class=" btn-default button-border" id="profile_cancel"><a href="<?php echo get_bloginfo('url')?>/members-directory/<?php echo $currentUser->user_nicename?>" class="can_btn">Cancel</a></button>
			</div>
		</form>
	</div>
</div>

<style type="text/css">
	.children-list h1{
		border-bottom: 1px solid #a8a6a6;
	}

	.child-element-name {
		font-size: 20px;
		font-weight: bold;
		color: #000;
		margin-top: 0;
	}

	.child-element-school {
		font-size: 18px;
		margin-top: 0;
	}

	.children-element{
		border-bottom: 1px solid #a8a6a6;
		margin-bottom: 15px;
	}

	.child-element-info {
		margin-bottom: 10px;
	}

	.ui-autocomplete li.ui-menu-item:last-child .ui-menu-item-wrapper,
	.ui-autocomplete li.ui-menu-item:last-child:hover .ui-menu-item-wrapper {
		background-color: #d5ebff!important;
    	color: #000;    	
	}	

	#errotherSchoolMsg{
	    color: red;
    font-size: 12px;
    display: block;
    margin-bottom: 15px;
    margin-top: 5px;
}

</style>

<div class="col-md-4 mrg">
	<div class="info-card">
		<?php if(count($childrens) > 0){ ?>
			<div class="children-list">
				<h1>Your Child/ren</h1>
				<?php $childIndex = 1; ?>
				<?php foreach ($childrens as $currentRow): ?>
					<div class="children-element">
						<p class="child-index"><strong>CHILD <?php echo $childIndex++; ?></strong></p>
						<p class="child-element-name"><?php echo $currentRow->child_name; ?></p>
						<p class="child-element-school"><?php echo $currentRow->school_name; ?></p>
						<p class="child-element-info"><strong><?php echo $currentRow->grade; ?></strong> Grade&nbsp;&nbsp;&nbsp;&nbsp; <strong><?php echo $currentRow->division; ?></strong> Division</p>
					</div>
				<?php endforeach ?>
			</div>
		<?php } ?>
		<form class="standard-form">
			<input type="hidden" name="action">
			<h1>Add Your Child</h1>
			<div class="content">
				<p>If you're a parent and want to add your child, click Add a Child.If you're a parent and want to add your child, click <strong>Add a Child</strong>.</p>
				<p><i>However, note that adding a child will convert your profile to that of a 'Parent' and this change cannot be reversed.</i></p>
				<!-- <button type="button" class="btn" id="add-child-btn">Add a Child</button> -->
				<button type="button" class="btn" data-toggle="modal" data-target="#edit-child-profile">Add a Child</button>
			</div>
			<!--<div id="child-form" >
				<div class="form-group">
					<label for="">Child's Name</label>
					<input type="text" class="form-control" id="child_name" name="child_name" placeholder="Enter Child's Name">
				</div>
				<div class="form-group profile_search">
					<label for="">Name of your School</label>
					<input type="text" class="form-control" id="child_school" name="child_school" placeholder="Find your School">
					<input type="hidden" name="child_school_id" id="child_school_id">
				</div>
				<div class="form-group profile_dropdown">
					<label for="">Grade / Standard</label>
					<select name="grade">
						<option value="1st">1st</option>
						<option value="2nd">2nd</option>
						<option value="3rd">3rd</option>
						<option value="4th">4th</option>
						<option value="5th">5th</option>
						<option value="6th">6th</option>
						<option value="7th">7th</option>
						<option value="8th">8th</option>
						<option value="9th">9th</option>
						<option value="10th">10th</option>
					</select>
				</div>
				<div class="form-group profile_dropdown">
					<label for="">Section / Division</label>
					<select name="division">
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="C">C</option>
						<option value="D">D</option>
					</select>
				</div>
				<div class="content">
					<p class="error" id="child_form_error" style="display: none;"></p>
					<button type="button" class="btn" id="submit-child-btn">Submit</button>
				</div>
			</div>
			-->
			<!--edit child pop up Modal -->

<!-- modal -->
		</form>
	</div>
</div>

<script type="text/javascript">
	window.onbeforeunload = null;
	(function($) {
		$(document).ready(function(){
		/*	var ajaxurl = "<?php echo home_url(); ?>/wp-admin/admin-ajax.php";
            $('form#modalAjaxTrying :submit').click(function(event){
			    event.preventDefault();
			    var form_data = {'action' : 'acf/validate_save_post'};
			    $('form#modalAjaxTrying :input').each(function(){
			    form_data[$(this).attr('name')] = $(this).val()
			    })

			    form_data.action = 'save_my_data';
			    $.post(ajaxurl, form_data)
			    .done(function(save_data){
			    // alert('Added successFully :');
			   
			    })

			})*/

			
			$("#user_mobile").keypress(function (e) {
				var mobNum = $(this).val();
			    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			        //display error message
			        $("#errMobileMsg").text("Please enter Digits Only");
			               return false;
			    }
			    else{
			        $("#errMobileMsg").text('');

			    }
			    
			});

			$("#user_mobile").on("blur", function(){
              var mobNum = $('#user_mobile').val();
              var filter = /^(?!0+$)\d{8,}$/;

              if (!filter.test(mobNum)) {
                  $("#errMobileMsg").text('Not a valid number');
                  return false;
              }
              else if(mobNum.length!=10){
                $("#errMobileMsg").text("Please enter 10 digit mobile number");
                  return false;
              } 
              else{
                $("#errMobileMsg").text("");
                return true;
              }
            });
            function validation() 
            { 
            	$("#errMobileMsg").text("");
            	$("#errFirstName").text("");
            	$("#errLastName").text("");
            	$("#errSchoolMsg").text("");
            	$("#errotherSchoolMsg").text("");
            	
              	var mobNum = $('#user_mobile').val();
              	var firstName = $('#user_firstname').val();
              	var lastName = $('#user_lastname').val();
              	var userSchool = $('#user_school_data').val();

              	if($('#user_school_other').val() !=""){
              		var otherschool = $('#user_school_other').val();
              		 if(otherschool == '' || otherschool == undefined){
                  	$("#errotherSchoolMsg").text("Please enter school name");
                  	isValid = false;
                  }
              	}
              	
                  var filter = /^(?!0+$)\d{8,}$/;
                  var isValid = true;
                  if(mobNum == '' || mobNum == undefined){
                  	$("#errMobileMsg").text('Please enter mobile number');
                  	isValid = false;
                  }
                  else if (!filter.test(mobNum)) {
                      $("#errMobileMsg").text('Not a valid number');
                      isValid = false;
                  }
                  else if(mobNum.length!=10){
                    $("#errMobileMsg").text("Please enter 10 digit mobile number");
                      isValid = false;
                  } 

                  if(firstName == '' || firstName == undefined){
                  	$("#errFirstName").text("Please enter first name");
                  	isValid = false;
                  }

                  if(lastName == '' || lastName == undefined){
                  	$("#errLastName").text("Please enter last name");
                  	isValid = false;
                  }

                  if(userSchool == '' || userSchool == undefined){
                  	$("#errSchoolMsg").text("Please select school name");
                  	isValid = false;
                  }
              
                  return isValid;
            }

			window.selectedCountry = "<?php echo $user_country; ?>";
			$("#child_name").val('');
			$("#child_school").val('');

			$("#submit-child-btn").click(function(){
				if($("#child_name").val() == ''){
					$("#child_form_error").html("Please enter child's name");
					$("#child_form_error").show();
				} else if($("#child_school").val() == ''){
					$("#child_form_error").html("Please select school name");
					$("#child_form_error").show();
				}else{
					$("#child_form_error").hide();
					$("#submit-child-btn").html("Please wait...");
	                $("#submit-child-btn").attr("disabled", "disabled");

					$.ajax({
		                type : "POST",
		                dataType : "json",
		                url : "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
		                data : $("#child-edit-form").serialize(),
		                success: function(response) {
		                    $("#submit-child-btn").html("Submit");
		                    $("#submit-child-btn").removeAttr("disabled");
		                    window.onbeforeunload = null;
		                    if(response.status == 1){
		                   	window.location.reload();
		                    }else{
		                        $("#child_form_error").html(response.message);
		                        $("#child_form_error").show();
		                        setTimeout(function(){
		                            $("#child_form_error").html('');
		                            $("#child_form_error").hide();
		                        }, 5000);
		                    }
		                }
		            });				
				}
			});

			$("#add-child-btn").click(function(){
				$("#child-form").show();
			});

			$("#user_dob_display").datepicker({
				altField: "#user_dob",
				altFormat: "yy-mm-dd",
				changeMonth: true,
				changeYear: true,
				yearRange: '1980:-3',
				maxDate: '-3y',    
			});

			var schoolUrl = '<?php echo home_url(); ?>/wp-admin/admin-ajax.php?action=get_schools';

			$( "#child_school" ).autocomplete({
				source: schoolUrl,
				minLength: 2,
				select: function(event, ui) {
			        event.preventDefault();
			        $("#child_school").val(ui.item.label);
			        $("#child_school_id").val(ui.item.value);
			    },
			});				
			
			$( "#user_school_data" ).autocomplete({
				source: schoolUrl,
				minLength: 2,
				select: function(event, ui) {
			        event.preventDefault();
			        $("#user_school_data").val(ui.item.label);
			        $("#user_school").val(ui.item.value);
			    },
			    response: function(event, ui){
					ui.content.push({value:"Others", label:"Others"});
				}					
			});	
		
			$("#user_school_other").on("change", function (event, ui) {
				var other_val = $("#user_school_other").val();

				if(other_val != ""){
					jQuery.ajax({
					    type : "POST",
					    dataType : "json",
					    url : "<?php echo home_url(); ?>/wp-admin/admin-ajax.php?action=check_school_other",
					    data : {check_school_other : other_val},
					    success: function(response) {
						//alert(response.status);
						//alert(response.response);	
					        if(response.status == 1){
					        	jQuery("#errotherSchoolMsg").text('School name is already exists!');
					        	jQuery("#user_school_other").val('');
					        }
					    }
					});
				}
			});
					
			$("#user_school_data").on("keyup", function (event, ui) {		var other_val = $("#user_school_data").val();
   
    			if(other_val === "Others"){
					$("#other_school").show();							
				}
				else{
					$('#other_school').slideUp();						
					$("#user_school_other").val('');						
				}	
			});

			$("#user_school_data").on("change", function (event, ui) {
				var other_val = $("#user_school_data").val();
   
    			if(other_val === "Others"){
					$("#other_school").show();							
				}
				else{
					$('#other_school').slideUp();						
					$("#user_school_other").val('');						
				}	
			});

			$('.ui-autocomplete').on('click', '.ui-menu-item', function(){
    			$("#user_school_data").trigger('click');
			});

			$("#user_school_data").click(function(){
    			var other_val = $("#user_school_data").val();
    			
				if(other_val === "Others"){
					$("#other_school").show();							
				}
				else{
					$('#other_school').slideUp();						
					$("#user_school_other").val('');		
				}
			});
			
			var countryUrl = '<?php echo home_url(); ?>/wp-admin/admin-ajax.php?action=get_countries';

			$( "#user_country_data" ).autocomplete({
				source: countryUrl,
				minLength: 2,
				select: function(event, ui) {
			        event.preventDefault();
			        $("#user_country_data").val(ui.item.label);
			        $("#user_country").val(ui.item.label);
			        window.selectedCountry = ui.item.label;
			    },
			});	

			var stateUrl = '<?php echo home_url(); ?>/wp-admin/admin-ajax.php?action=get_states';

			$( "#user_state" ).autocomplete({
				source: function (request, response) {
			         $.ajax({
			            dataType: "json",
			            type : 'POST',
			            data: { term: request.term, country: window.selectedCountry },
			            url: stateUrl,
			            success: function(data) {
			                response(data);
			            },
			            error: function(data) {
			            }
			        });
			    },
				minLength: 2,
				select: function(event, ui) {
			        event.preventDefault();
			        $("#user_state").val(ui.item.label);
			    },
			});	

			$("#edit_profile_submit").click(function(e){
				if(validation() != true){
	                return false;
	            }
              	else{
					$("#edit_profile_submit").html("Please wait...");
	                $("#edit_profile_submit").attr("disabled", "disabled");
	                $('form#modalAjaxTrying :submit').trigger('click');
	                var form_data = {'action' : 'acf/validate_save_post'};
					$.ajax({
		                type : "POST",
		                dataType : "json",
		                url : "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
		                data : $("#profile-edit-form").serialize(),
		                success: function(response) {
		                    $("#edit_profile_submit").html("Submit");
		                    $("#edit_profile_submit").removeAttr("disabled");
		             		window.onbeforeunload = null;
		                    if(response.status == 1){
		                    	$("#response_message").html(response.message);
		                        $("#response_message").addClass('success');
		                        $("#response_message").removeClass('error');
		                        $("#response_message").show();
		                        let profilePopupUpdatedMoegObj2 = {
		                        	"User identifier"	: parseInt(jQuery("#user_identifier").val()),
															"School"	: jQuery("#user_school_data").val(),
															"Grade/Standard"	: jQuery("#grade").val(),
															"Section/Division"	: jQuery("#division").val(),
															"Country"	    : jQuery("input[name=user_country_data]").val(),
															"State"	    : jQuery("input[name=user_state]").val(),
															"City"	    : jQuery("input[name=user_city]").val(),
															"Date of Birth"	    : jQuery("input[name=user_dob_display]").val(),
															"Gender"	    : jQuery("input[name=user_gender]").val(),
															
														}
													   	profilePopupUpdatedMoegObj2.event = "mo_profile_updated";
													   	dataLayer.push({ ecommerce: null }); 
													   	dataLayer.push(profilePopupUpdatedMoegObj2);
		                        window.location.href='<?php echo get_bloginfo('url')?>/members-directory/<?php echo $currentUser->user_nicename?>';
		                        setTimeout(function(){
		                            $("#response_message").html('');
		                            $("#response_message").hide();
		                        }, 5000);


		                    }else{
		                        $("#response_message").html(response.message);
		                        $("#response_message").addClass('error');
		                        $("#response_message").removeClass('success');
		                        $("#response_message").show();
		                        setTimeout(function(){
		                            $("#response_message").html('');
		                            $("#response_message").hide();
		                        }, 5000);
		                    }
		                }
		            });	
	            }	
			});

		});
	})( jQuery );
</script>

<?php

/**
 * Fires after the display of member profile edit content.
 *
 * @since 1.1.0
 */
do_action( 'bp_after_profile_edit_content' ); ?>