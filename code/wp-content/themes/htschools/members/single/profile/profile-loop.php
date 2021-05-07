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
<div class="col-md-8 col-sm-12 mrg">
	<div class="profile-card">
		<h1>Personal Details</h1>
		<form id="profile-edit-form" name="profile-form" class="standard-form">
			<input type="hidden" name="action" value="save_custom_profile">
			<div class="form-group">
				<label for="first_name">First Name</label>
				<input type="text" class="form-control" name="first_name" placeholder="First Name" value="<?php echo $currentUser->user_firstname; ?>" readonly>
			</div>
			<div class="form-group">
				<label for="last_name">Last Name</label>
				<input type="text" class="form-control" name="last_name" placeholder="Last Name" value="<?php echo $currentUser->user_lastname; ?>" readonly>
			</div>
			<div class="form-group">
				<label for="user_email">Email</label>
				<input type="email" class="form-control" name="user_email" placeholder="Email Id" value="<?php echo $currentUser->user_email; ?>" readonly>
			</div>
			<div class="form-group">
				<label for="user_mobile">Mobile Number</label>
				<input type="text" class="form-control" name="user_mobile" placeholder="Mobile Number" maxlength="10" value="<?php echo $user_mobile ?>" readonly>
			</div>
			<div class="form-group">
				<label for="user_dob">Date of Birth</label>
				<input id="user_dob" type="text" class="form-control" name="user_dob_display" placeholder="Date of Birth" value="<?php echo date("d/m/Y", $dob); ?>" readonly>
				<input id="user_dob" type="hidden" name="user_dob" value="<?php echo date("Y-m-d", $dob); ?>" readonly>
			</div>
			<div class="form-group ">
				<!-- <label> Gender <br/>
					<input type="radio" name="gender"> Male<br/>
					<input type="radio" name="gender"> Female<br/>
				</label> -->
				<label> Select Gender <br/>
				<div class="radio_switch"> 
					<div class="switch">
	                    <input type="radio" class="switch-input user_radio_btn" name="user_gender" value="Female" id="one" <?php if($user_gender == 'Female'){ echo "checked"; } ?> disabled>
	                    <label for="one" class="switch-label switch-label-off">
	                        <span>Female</span>
	                    </label>
	                    <input type="radio" class="switch-input admin_radio_btn" name="user_gender" value="Male" id="two" <?php if($user_gender == 'Male'){ echo "checked"; } ?> disabled>
	                    <label for="two" class="switch-label switch-label-on">
	                        <span>Male</span>
	                    </label>
	                    <span class="slider2"></span>
	                </div>
	            </div>
			</div>
			<div class="form-group">
				<label for="user_school_data">School</label>
				<input type="text" class="form-control" id="user_school_data" name="user_school_data" placeholder="Select School" value="<?php echo $user_school_name; ?>" readonly>
			</div>
			<?php $profileType = get_profile_data('Profile Type'); 
				if($profileType != 'Parent'){
			?>
			<div class="form-group profile_dropdown">
	                <label for="">Grade / Standard</label>
	                <select name="grade" disabled="true">
	                  <option value="1st" <?php if($child[0]->grade=="1st") echo 'selected="selected"'; ?>>1st</option>
	                  <option value="2nd" <?php if($child[0]->grade=="2nd") echo 'selected="selected"'; ?>>2nd</option>
	                  <option value="3rd" <?php if($child[0]->grade=="3rd") echo 'selected="selected"'; ?>>3rd</option>
	                  <option value="4th" <?php if($child[0]->grade=="4th") echo 'selected="selected"'; ?>>4th</option>
	                  <option value="5th" <?php if($child[0]->grade=="5th") echo 'selected="selected"'; ?>>5th</option>
	                  <option value="6th" <?php if($child[0]->grade=="6th") echo 'selected="selected"'; ?>>6th</option>
	                  <option value="7th" <?php if($child[0]->grade=="7th") echo 'selected="selected"'; ?>>7th</option>
	                  <option value="8th" <?php if($child[0]->grade=="8th") echo 'selected="selected"'; ?>>8th</option>
	                  <option value="9th" <?php if($child[0]->grade=="9th") echo 'selected="selected"'; ?>>9th</option>
	                  <option value="10th" <?php if($child[0]->grade=="10th") echo 'selected="selected"'; ?>>10th</option>
	                </select>
	            </div>
            <div class="form-group profile_dropdown">
                <label for="">Section / Division <?php echo $child->division?></label>
                <select name="division" disabled="true">
                  <option value="A" <?php if($child[0]->division=="A") echo 'selected="selected"'; ?>>A</option>
                  <option value="B" <?php if($child[0]->division=="B") echo 'selected="selected"'; ?>>B</option>
                  <option value="C" <?php if($child[0]->division=="C") echo 'selected="selected"'; ?>>C</option>
                  <option value="D" <?php if($child[0]->division=="D") echo 'selected="selected"'; ?>>D</option>
                </select>
            </div>
        	<?php } ?>
			<div class="form-group">
				<label for="user_country_data">Country</label>
				<input type="text" class="form-control" id="user_country_data" name="user_country_data" placeholder="Select Country" value="<?php echo $user_country; ?>" readonly>
				<input type="hidden" id="user_country" name="user_country" value="<?php echo $user_country; ?>" readonly>
			</div>


			<div class="form-group">
				<label for="user_state">State</label>
				<input type="text" class="form-control" id="user_state" name="user_state" placeholder="Select State" value="<?php echo $user_state; ?>" readonly>
			</div>


			<div class="form-group">
				<label for="user_city">City</label>
				<input type="text" class="form-control" id="user_city" name="user_city" placeholder="Select City" value="<?php echo $user_city; ?>" readonly>
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
</style>
<script type="text/javascript">
	(function($) {
		$(document).ready(function(){
	$('#acf-field_607ad4fffebde').prop('disabled','disabled');
	});
	})( jQuery );
</script>

<div class="col-md-4 col-sm-12 mrg">
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
	</div>
</div>

