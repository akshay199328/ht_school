<?php
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

?>
<div class="col-md-8 mrg">
	<div class="profile-card">
		<h1>Personal Details</h1>
		<form action="" method="post" id="profile-edit-form" class="standard-form">
			<div class="form-group">
				<label for="exampleInputEmail1">First Name</label>
				<input type="text" class="form-control" id="exampleInputEmail1" placeholder="First Name">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Last Name</label>
				<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Last Name">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Email</label>
				<input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email Id">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Mobile Number</label>
				<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Mobile Number" maxlength="10">
			</div>
			<div class="form-group edit_DOB">
				<label for="exampleInputPassword1">Date of Birth</label>
				<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Date of Birth">
			</div>
			<div class="form-group ">
				<!-- <label> Gender <br/>
					<input type="radio" name="gender"> Male<br/>
					<input type="radio" name="gender"> Female<br/>
				</label> -->
				<label> Select Gender <br/>
				<div class="radio"> 
					<div class="switch">
	                    <input type="radio" class="switch-input user_radio_btn" name="type" value="user" id="one" checked="">
	                    <label for="one" class="switch-label switch-label-off">
	                        <span>Female</span>
	                    </label>
	                    <input type="radio" class="switch-input admin_radio_btn" name="type" value="admin" id="two">
	                    <label for="two" class="switch-label switch-label-on">
	                        <span>Male</span>
	                    </label>
	                    <span class="slider2"></span>
	                </div>
	            </div>
			</div>

			<div class="form-group profile_search">
				<label for="exampleInputPassword1">Country</label>
				<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Select Country">
			</div>


			<div class="form-group profile_search">
				<label for="exampleInputPassword1">State</label>
				<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Select State">
			</div>


			<div class="form-group profile_search">
				<label for="exampleInputPassword1">City</label>
				<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Select City">
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-default">Submit</button>
			</div>

		</form>
	</div>
</div>

<div class="col-md-4 mrg">
	<div class="info-card">
		<h1>Add your Childrens</h1>
		<form action="" method="post" id="profile-edit-form" class="standard-form">
			<div class="form-group profile_search">
				<label for="">Name of your School</label>
				<input type="text" class="form-control" id="" placeholder="Find your School">
			</div>
			<div class="form-group profile_dropdown">
				<label for="">Grade / Standard</label>
				<select>
					<option>Select</option>
					<option>Select</option>
					<option>Select</option>
					<option>Select</option>
				</select>
			</div>
			<div class="form-group profile_dropdown">
				<label for="">Section / Division</label>
				<select>
					<option>Select</option>
					<option>Select</option>
					<option>Select</option>
					<option>Select</option>
				</select>
			</div>
		</form>
	</div>
</div>

<?php

/**
 * Fires after the display of member profile edit content.
 *
 * @since 1.1.0
 */
do_action( 'bp_after_profile_edit_content' ); ?>