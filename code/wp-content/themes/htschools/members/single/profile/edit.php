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
<div class="col-md-8">
	<form action="" method="post" id="profile-edit-form" class="standard-form">
		<h1>Personal Details</h1>
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
		<div class="form-group">
			<label for="exampleInputPassword1">Date of Birth</label>
			<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Date of Birth">
		</div>
		<div class="radio">
			<label> Gender <br/>
				<input type="radio" name="gender"> Male<br/>
				<input type="radio" name="gender"> Female<br/>
			</label>
		</div>

		<div class="form-group">
			<label for="exampleInputPassword1">Country</label>
			<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Select Country">
		</div>


		<div class="form-group">
			<label for="exampleInputPassword1">State</label>
			<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Select State">
		</div>


		<div class="form-group">
			<label for="exampleInputPassword1">City</label>
			<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Select City">
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-default">Submit</button>
		</div>

	</form>
</div>

<div class="col-md-4">
	<h1>Add your Childrens</h1>
</div>

<?php

/**
 * Fires after the display of member profile edit content.
 *
 * @since 1.1.0
 */
do_action( 'bp_after_profile_edit_content' ); ?>