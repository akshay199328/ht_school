<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<!-- <div id="footerbottom" class="footer-top footer">
    <div class="<?php echo vibe_get_container(); ?>">
        <div class="row">
            <div class="col-lg-5 col-md-12 footer-info">
                <a href="index.html" class="logo d-flex align-items-center">
                  <h1>Footer</h1>
                </a>
            </div>
        </div>
    </div>
</div>-- -->
<footer id="footer" class="new-footer">
      <div class="new-footer-copy">
     <div class="footer-check" style="padding:0px;float: left;">
          <h1 class="heading"></h1>
      </div>
        <div class="new-footer-top">
          <?php
                $url = apply_filters('wplms_logo_url',VIBE_URL.'/assets/images/logo.png','footer');
                if(!empty($url)){
            ?>    

                <a href="<?php echo vibe_site_url('','logo'); ?>"><img src="<?php  echo vibe_sanitizer($url,'url'); ?>" alt="<?php echo get_bloginfo('name'); ?>" /></a>
            <?php 
                }
            ?>

          <div class="social">
            <a target="_blank" href="https://www.facebook.com/HTSchool-111960910982690/" class="facebook"><span class="name"></span></a>
            <a target="_blank" href="https://twitter.com/htschool1" class="twitter"><span class="name"></span></a>
            <a target="_blank" href="https://www.linkedin.com/company/htschool" class="linkedin"><span class="name"></span></a>
            <a target="_blank" href="https://www.youtube.com/user/ht" class="youtube"><span class="name"></span></a>
            <a target="_blank" href="https://www.instagram.com/htschool/" class="instagram"><span class="name"></span></a>
            <a target="_blank" href="<?php bloginfo('rss2_url'); ?>" class="rss"><span class="name"></span></a>
          </div>
        </div>

          <div class="new-footer-links">
            <div class="column">
              <?php
                $args = array(
                  'theme_location'  => 'footer-left-menu',
                );
                wp_nav_menu( $args );
              ?>
            </div>
            <div class="column">
              <?php
                $args = array(
                  'theme_location'  => 'footer-middle-menu',
                );
                wp_nav_menu( $args );
              ?>
            </div>

            <div class="column">
              <?php
                $args = array(
                    'theme_location'  => 'footer-menu',
                    'container'       => '',
                    'depth'           => 1,
                    'menu_class'      => '',
                    'fallback_cb'     => 'vibe_set_menu',
                );
                wp_nav_menu( $args );
              ?>
            </div>

            <div class="column newsletter">
              <h6 class="new-footer-title">Subscribe Now</h6>
             <?php
              if ( is_active_sidebar( 'newsletter-form' ) ) : 
                dynamic_sidebar( 'newsletter-form' );
                ?>  
              <?php endif; ?>
            </div>
          </div>
      </div>
      <div class="copyright">Copyright &copy; <?php echo date("Y");?> HTML. All rights reserved.</div>
</footer>
</div><!-- END PUSHER -->
</div><!-- END MAIN -->
  <!-- SCRIPTS -->

<?php if(is_user_logged_in()){ ?>

<style>
  #profileModal{
        -webkit-box-align: center !important;
    -ms-flex-align: center !important;
    align-items: center !important;
    /*display: flex;*/
  }
  #profileModal.modal.modal-box.fade.in{
    display: flex!important;
  }
    .ui-widget-content.ui-autocomplete{
        z-index: 99999;
    }
  #profileModal .modal-content {
    /*top: 139px;*/
        border-radius: 0px;
    background: #fff;
  }

#profileModal .ul-nav>li.active>a{
        color: #fff;
    background-color: #0d9ce8;
    border: 1px solid deepskyblue;
  /*  padding: 2px 65px 2px 65px;*/
    border-radius: 0px;
  }
  #profileModal .ul-nav>li.active>a:after{
    content:'';
    position: absolute;
    left: 0;
    right: 0;
    margin: 0 auto;
    margin-top: 20px;
    width: 0;
    height: 0;
    border-top: 10px solid #0d9ce8;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
  }

 #profileModal .ul-nav>li>a {
border: 1px solid deepskyblue;
    padding: 2px 10px;
    border-radius: 0px;
    color:deepskyblue;
 } 
 #profileModal .ul-nav>li>a:hover{
  background-color: #0d9ce8;
    color: #ffffff;
 }
 #profileModal .ul-nav{
  margin-bottom: 25px;
 }
  #profileModal .mnav{
    margin-left:1px;
  }

  #profileModal .in-class{
        background-color: #fff;
    margin-bottom: 10px;
    border: 0px !important;
    border-bottom: 1px solid #ccc !important;
    padding: 6px 1px;
    font-size: 18px;
    border-radius: 0px;
    box-shadow: none;
    font-weight: 500;
  }
  #profileModal .input-group{
     background-color: white;
    margin-bottom: 10px;
    border: 0px !important;
    border-bottom: 1px solid #ccc !important;
    padding: 0px 1px;
    font-size: 16px;
    border-radius: 0px;
    box-shadow: none;
  }
  #profileModal .s-class{
    border:none;
    padding: 6px 1px;
    background-color: white;    
    border: 0px !important;   
    border-radius: 0px;
    box-shadow: none !important;
  }
  #profileModal label{
    font-weight: 500;
    margin-bottom: 0px;
    font-size: 14px;
    color: #bbb;
  }
  #profileModal .n-btn{
    padding: 10px 50px 10px 50px !important;
    margin-top: 50px;
    margin-bottom: 20px;
  }
   #profileModal .sl-btn{
    padding: 10px 50px 10px 50px !important;
    margin-top: 10px;
    margin-bottom: 0px;
   }
 #profileModal .input-group-addon{
    border:none;
    background-color: #fff;
    color: #afafaf;
    line-height: normal;
    vertical-align: bottom;
    padding-bottom: 10px;
  }
  #profileModal .b-class{
    padding: 30px;
  }
.tabDetails{
  padding: 0px 18px 0px 16px;
}
.tabDetails .nav>li{
      width: 150px;
    }
.tabDetails .nav>li, .nav>li>a{
      text-align: center;
}
.tabDetails .form-group .radio_switch{
      margin-bottom: 10px;
}
  @media only screen and (max-device-width: 480px) {
    .tabDetails .nav>li{
          width: 120px;
          text-align: center;
    }
   .tabDetails .nav>li, .tabDetails .nav>li>a{
          padding: 5px 25px 5px 25px;
     }
    #profileModal .n-btn{    
    margin-top: 12px;
    margin-bottom: 0px;
    padding: 15px 50px 15px 50px !important;
  }
  #profileModal .sl-btn{   
    margin-top: 10px;
    margin-bottom: 0px;
    padding: 15px 50px 15px 50px !important;
   }
    #profileModal .ul-nav>li.active>a:after{    
    margin-top: 23px;    
    border-top: 10px solid #0d9ce8;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
  }
}

</style>


<?php 

  $currentUser = wp_get_current_user();
  $user_id = bp_loggedin_user_id();
  $args = array(
          'field'   => 'Phone', // Field name or ID.
          );

  $user_mobile = get_profile_data('Phone', $user_id);
  $user_birthday = get_profile_data('Birthday', $user_id);
  $user_gender = get_profile_data('Gender', $user_id);
  $user_country = get_profile_data('Country', $user_id);
  $user_state = get_profile_data('State', $user_id);
  $user_city = get_profile_data('City', $user_id);

  $dob = strtotime($user_birthday);

  $user_school_name = "";
    $user_school = get_profile_data('Linked School');
    if(intval($user_school) > 0){
        $user_school_name = get_user_by('id', $user_school)->display_name;
    }

?>


<div class="modal modal-box fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">        
          <div class="modal-title" id="profileModalLabel">
            <img src="<?php echo get_bloginfo('url')?>/wp-content/uploads/2021/03/logo-popup.png" class="modal-img" alt="Logo" title="Logo"/>
           <!-- <p class="modal-text"> Thank you for getting in touch!</p> -->
            <!-- <p class="modal-text">Welcome to</p>
            <p class="modal-para">Data Science Masterclass for Non-Programmers</p> -->
            <!-- <p class="modal-text">Congratulations on completing the Data Science Masterclass for Non-Programmers successfully. </p> -->
            <p class="modal-text">Complete your profile</p>
          </div>          
          <button type="button" class="close close_modal" data-dismiss="modal" aria-label="Close">
            <span>&times;</span>
          </button>
      </div>
      <div class="modal-body b-class">
        <div class="row">
            <form id="profile-edit-form" name="profile-form" class="standard-form">
                <input type="hidden" name="action" value="save_custom_profile">
                <div class="col-md-9 col-sm-9 mrg">
                  <div class="tabDetails">
                    <ul class=" ul-nav nav nav-pills nav-fill ">
                        <li class="active" ><a data-toggle="pill"  href="#step1">Step 1</a></li>
                        <li><a data-toggle="pill" class="mnav" id="profile_step_2"  href="#step2">Step 2</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="step1">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>First Name*</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" name="first_name"  value="<?php echo $currentUser->user_firstname; ?>" placeholder="First name" class=" in-class form-control user_field" id="user_firstname">
                                    <span id="errFirstName"></span>
                                </div>

                                <div class="col-md-12">
                                    <label>Last Name*</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" name="last_name"  value="<?php echo $currentUser->user_lastname; ?>" placeholder="Last name" class=" in-class form-control user_field" id="user_lastname">
                                    <span id="errLastName"></span>
                                </div>

                                <div class="col-md-12">
                                    <label>Email id*</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="email" name="user_email"  value="<?php echo $currentUser->user_email; ?>" readonly placeholder="Email id"  class="in-class form-control user_field"/>
                                </div>

                                <div class="col-md-12">
                                    <label>Mobile Number*</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" name="user_mobile" placeholder="Mobile Number" maxlength="10" id="user_mobile" value="<?php echo $user_mobile ?>" class="in-class form-control user_field"/>
                                    <span id="errMobileMsg"></span>
                                </div>

                                <div class="col-md-12">
                                    <label>Date of Birth*</label>
                                </div>
                                <div class="col-md-12">
                                    <input id="user_dob_display" type="text" class="in-class form-control user_field" name="user_dob_display" placeholder="Date of Birth" value="<?php echo date("d/m/Y", $dob); ?>" readonly>
                                    <input id="user_dob" type="hidden" name="user_dob" value="<?php echo date("Y-m-d", $dob); ?>">
                                    <!-- <input type="date" name=""  placeholder="DD / MM / YYYY" class="in-class form-control" />              -->
                                </div>

                                <div class="col-md-12">
                                    <button type="button" id="profile_next_step" class="btn n-btn">Next</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="step2">
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group ">
                                    <label> Select Gender</label> <br/>
                                    <div class="radio_switch"> 
                                        <div class="switch" style="height: unset;">
                                            <input type="radio" class="switch-input user_radio_btn user_field" name="user_gender" value="Female" id="one" <?php if($user_gender == '' || $user_gender == null){ echo "checked"; } else if($user_gender == 'Female'){ echo "checked"; } ?>>
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
                              </div>
                                <!-- <div class="col-md-12">  
                                    <label>School name*</label>
                                </div> -->
                                <div class="col-md-12">  
                                  <label for="user_school_data">School</label>
                                    <div class="col-md-12 input-group">
                                        
                                        <input type="text" class="s-class form-control user_field" id="user_school_data" name="user_school_data" placeholder="Select School" value="<?php echo $user_school_name; ?>">
                                        <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
                                        <input type="hidden" id="user_school" name="user_school" value="<?php echo $user_school; ?>">
                                    </div>
                                    <span id="errSchoolMsg"></span>
                                </div>

                                <!-- <div class="col-md-12">  
                                    <label>Country</label>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="type"  id="user_country_data" name="user_country_data" placeholder="Select Country" value="<?php echo $user_country; ?>" class="s-class form-control user_field" />
                                        <input type="hidden" id="user_country" name="user_country" value="<?php echo $user_country; ?>">
                                        <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
                                    </div>
                                </div> -->

                                <!-- <div class="col-md-12">  
                                    <label>State</label>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="type" id="user_state" name="user_state" placeholder="Select State" value="<?php echo $user_state; ?>" class="s-class form-control user_field" />
                                        <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
                                    </div>
                                </div> -->

                                
                                <?php $child = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix . "parent_child_mapping WHERE child_id = " . $user_id ); ?>
                                <div class="col-md-12">
                                  <label for="">Grade / Standard</label>
                                  <div class="col-md-12 mrg">
                                    <div class="input-group popup_dropdown">
                                  <select name="grade">
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
                                </div>
                                </div>
                                <div class="col-md-12">
                                  <label for="">Section / Division</label>
                                  <div class="col-md-12 mrg">
                                    <div class="input-group popup_dropdown">
                                      <select name="division">
                                        <option value="A" <?php if($child[0]->division=="A") echo 'selected="selected"'; ?>>A</option>
                                        <option value="B" <?php if($child[0]->division=="B") echo 'selected="selected"'; ?>>B</option>
                                        <option value="C" <?php if($child[0]->division=="C") echo 'selected="selected"'; ?>>C</option>
                                        <option value="D" <?php if($child[0]->division=="D") echo 'selected="selected"'; ?>>D</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                    <label>City</label>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="type"  id="user_city" name="user_city" placeholder="Select City" value="<?php echo $user_city; ?>" class="s-class form-control user_field" />
                                        <span class="input-group-addon"><i class="fa " aria-hidden="true"></i></span>
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <p class="error" id="response_message" style="display: none;"></p>
                                    <button type="button" class="btn sl-btn"  id="profile_submit">Start Learning</button>

                                </div>
                            </div>
                        </div>       
                      </div>  
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <!-- progress bra -->
                    <!-- <div class="progressbar-full">
                        <div class="pull-left">
                            <div class="progress_new">
                                <div class="overlay"></div>
                                <div class="left"></div>
                                <div class="right"></div>
                                
                            </div>
                        </div>
                        <div class="pull-left">
                            <span class="title timer" data-from="0" data-to="30" data-speed="1800">70% <span class="light">Completed</span></span>
                        </div>
                    </div> -->
                    <div class="circles-container bg-white">
                        <div class="circlebar" id="progress-new" data-circle-startTime=0 data-circle-maxValue="100" data-circle-dialWidth=5 data-circle-size="80px" data-circle-type="progress">
                            <div class="loader-bg">
                                <div class="text">00:00:00</div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    window.onbeforeunload = null;
    (function($) {
        $(document).ready(function(){

            $("#user_mobile").keypress(function (e) {
              var mobNum = $(this).val();
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
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
            function validate() 
            { 
              $("#errMobileMsg").text("");
              $("#errFirstName").text("");
              $("#errLastName").text("");
                var mobNum = $('#user_mobile').val();
                var firstName = $('#user_firstname').val();
                var lastName = $('#user_lastname').val();
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


                  return isValid;
            }

            function schoolValidate(){
              $("#errSchoolMsg").text("");
              var userSchool = $('#user_school_data').val();
              if(userSchool == '' || userSchool == undefined){
                $("#errSchoolMsg").text("Please select school name");
                isValid = false;
              }
              else{
                $("#errSchoolMsg").text("");
                isValid = true;
              }

              return isValid;
            }

            $("#user_firstname").keypress(function(e) {
              var keyCode = e.keyCode || e.which;
   
              $("#errFirstName").text("");
   
              //Regex for Valid Characters i.e. Alphabets.
              var regex = /^[A-Za-z]+$/;
   
              //Validate TextBox value against the Regex.
              var isValid = regex.test(String.fromCharCode(keyCode));
              if (!isValid) {
                  $("#errFirstName").text("Please enter only alphabets");
              }
   
              return isValid;

            });
            $("#user_lastname").keypress(function(e) {
              var keyCode = e.keyCode || e.which;
   
              $("#errLastName").text("");
   
              //Regex for Valid Characters i.e. Alphabets.
              var regex = /^[A-Za-z]+$/;
   
              //Validate TextBox value against the Regex.
              var isValid = regex.test(String.fromCharCode(keyCode));
              if (!isValid) {
                  $("#errLastName").text("Please enter only alphabets");
              }
   
              return isValid;

            });

            updateProgressBar();
            function updateProgressBar(){
              var count=0;
              $(".user_field").each(function(){
                  count = count+($.trim($(this).val())=="" ? 1 : 0);
              });
              var filled_count = 10 - count;
              var total_count = 10;
              var total_percent = (filled_count/total_count) * 100;
              $("#progress-new").attr("data-circle-maxValue",total_percent);
            }
            $(".close_modal").unbind();
            $(".close_modal").click(function(){
                $("#profileModal").modal("hide");
                window.location.reload();
            });

            var ajaxurl = "<?php echo home_url(); ?>/wp-admin/admin-ajax.php";
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

            })
            window.selectedCountry = "<?php echo $user_country; ?>";
           
            $("#user_dob_display").datepicker({
                altField: "#user_dob",
                altFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
                yearRange: '1980:-3',
                maxDate: '-3y',
            });

            $("#profile_next_step").click(function(){
              if(validate() != true){
                return false;
              }
              else{
                $("#profile_step_2").click();
                updateProgressBar();
                var prefs = {
                    element: ".circlebar"
                };
                $('.circlebar').each(function() {
                    prefs.element = $(this);
                    new Circlebar(prefs);
                });
              }
            });
          var schoolUrl = '<?php echo home_url(); ?>/wp-admin/admin-ajax.php?action=get_schools';

            $( "#user_school_data" ).autocomplete({
                source: function (request, response) {
                     $.ajax({
                        dataType: "json",
                        type : 'POST',
                        data: { term: request.term},
                        url: schoolUrl,
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
                    $("#user_school_data").val(ui.item.label);
                    $("#user_school").val(ui.item.value);
                },
            }); 

            var countryUrl = '<?php echo home_url(); ?>/wp-admin/admin-ajax.php?action=get_countries';

            $( "#user_country_data" ).autocomplete({
                  source: function (request, response) {
                     $.ajax({
                        dataType: "json",
                        type : 'POST',
                        data: { term: request.term},
                        url: countryUrl,
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

            $("#profile_submit").click(function(){
              if(schoolValidate() != true){
                return false;
              }
              else{
                $("#profile_submit").html("Please wait...");
                $("#profile_submit").attr("disabled", "disabled");
                
                var form_data = {'action' : 'acf/validate_save_post'};
                $.ajax({
                    type : "POST",
                    dataType : "json",
                    url : "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
                    data : $("#profile-edit-form").serialize(),
                    success: function(response) {
                        $("#profile_submit").html("Submit");
                        $("#profile_submit").removeAttr("disabled");
                        window.onbeforeunload = null;
                        if(response.status == 1){
                            updateProgressBar();
                            var prefs = {
                                element: ".circlebar"
                            };
                            $('.circlebar').each(function() {
                                prefs.element = $(this);
                                new Circlebar(prefs);
                            });
                            $("#response_message").html(response.message);
                            $("#response_message").addClass('success');
                            $("#response_message").removeClass('error');
                            $("#response_message").show();

                            if(response.profile_complete == 1){
                                window.checkProfile = false;
                                $("#profileModal").modal("hide");
                                $(".button_cource_id_" + window.selectedCourseId).click();
                            }

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
<?php } ?>


<!--edit child pop up Modal -->
<div class="modal right fade" id="edit-child-profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">Child 1</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
            </div>
            <form id="child-edit-form" class="standard-form">
              <input type="hidden" name="action" value="save_child_entry">
              <div class="modal-body">
                    <div class="child-form child-form-pop">
                      <div class="add-pic">
                          <span class="add-name">Add Pic</span>
                          <span class="pic">
                            <img src="<?php echo get_bloginfo('template_url')?>/assets/images/profile-img.svg" height="auto" width="100%">
                          </span>
                      </div>
                      <div class="form-group">
                        <label for="">Child's Name</label>
                        <input type="text" class="form-control edit-inline" id="child_name" name="child_name" placeholder="Enter Child's Name">
                      </div>
                      <div class="form-group profile_search">
                        <label for="">Name of your School</label>
                        <input type="text" class="form-control edit-inline" id="child_school" name="child_school" placeholder="Find your School">
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
                        <button type="button" class="btn" id="submit-child-btn">Add a Child</button>
                      </div>
                    </div>
              </div>
            </form>
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- modal -->
<!--no mobile support pop up Modal -->
<div class="modal modal-box fade contact-popup overlayCenter_popup" id="NomobileSuppportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">        
          <div class="modal-title" id="exampleModalLabel">
            <img src="<?php echo bloginfo('template_url').'/assets/images/logo-modal.svg'?>" class="modal-img" height="auto" width="100%"/>
          </div>          
          <button type="button" class="close" data-dismiss="modal" id="close_popup" aria-label="Close">
            <span>&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <p>Please use a Laptop/Desktop to go through the Course Videos, Quizzes and submit Assignments.</p>
      </div>
    </div>
  </div>
</div>
<div class="course-filter-wrapper">
    <div class="course-filter-header">
        <h3 class="filter-title">Filter By</h3>
        <button class="course-close" type="button"></button>
    </div>
    <form action="<?php echo site_url('/'); ?>" method="get" id="searchform" class="course-filter-copy">
          <span class="section-title">Sessions</span>
          <ul>
              <li>
                  <label for="session1" id="">
                      <span class="copy">1 - 10 Sessions</span>
                      <input type="checkbox" name="sessions" value="1,10">
                  </label>
              </li>
              <li>
                  <label for="session2" id="">
                      <span class="copy">11 - 20 Sessions</span>
                      <input type="checkbox" name="sessions" value="11,20">
                  </label>
              </li>
              <li>
                  <label for="session3" id="">
                      <span class="copy">21 - 30 Sessions</span>
                      <input type="checkbox" name="sessions" value="21,30">
                  </label>
              </li>
              <li>
                  <label for="session4" id="">
                      <span class="copy">31+ Sessions</span>
                      <input type="checkbox" name="sessions" value="31">
                  </label>
              </li>
          </ul>
          <span class="section-title">Age</span>
          <ul>
              <li>
                  <label for="age1" id="">
                      <span class="copy">3 - 7 Years</span>
                      <input type="checkbox" name="age" value="3,7">
                  </label>
              </li>
              <li>
                  <label for="age2" id="">
                      <span class="copy">8 - 11 Years</span>
                      <input type="checkbox" name="age" value="8,11">
                  </label>
              </li>
              <li>
                  <label for="age3" id="">
                      <span class="copy">12 - 16 Years</span>
                      <input type="checkbox" name="age" value="12,16">
                  </label>
              </li>
              <li>
                  <label for="age4" id="">
                      <span class="copy">17+ Years</span>
                      <input type="checkbox" name="age" value="17">
                  </label>
              </li>
          </ul>
          <span class="section-title">Course Categories</span>
           <ul>
          <?php 
          $args = apply_filters('wplms_course_nav_cats',array(
              'taxonomy'=>'course-cat',
              'hide_empty'=>false,
              'hierarchial'=>1,
            ));

          $course_category_array = get_terms($args);
          $course_category = json_decode( json_encode($course_category_array), true);
          //array
          //if isset != ""
            //array = explode
          $i = 0;
          foreach($course_category as $category){
          ?>
              <li>
                  <label for="category<?php echo $i;?>" id="">
                      <span class="copy"><?php echo $category['name']?></span>
                      <input type="checkbox" name="category" id="session1" value="<?php echo $category['term_id'];?>" >
                  </label>
              </li>
        <?php $i++;}?>
          </ul>
    </form>
    <div class="filter-action">
        <button class="white-button" type="button" id="apply_filters">Apply Filters</button>
        <button class="reset" type="button" id="reset">Reset</button>
    </div>
</div>
<!-- modal -->
<script type="text/javascript">
  jQuery('#reset').click(function(){
    jQuery("input[name='category']:checkbox").prop('checked',false);
    jQuery("input[name='sessions']:checkbox").prop('checked',false);
    jQuery("input[name='age']:checkbox").prop('checked',false);
  })
  jQuery('#close_popup').click(function(){
    location.reload();
  });

  jQuery('#apply_filters').click(function(){
    applyFilter();
  });

  jQuery('#sort_by').change(function(){
    applyFilter();
  });

  function applyFilter() {
    var form_data = {};
    
    var temp1 = [];
    jQuery("input:checkbox[name=category]:checked").each(function () {
      temp1.push(jQuery(this).val());
    });
    
    var temp2 = [];
    jQuery("input:checkbox[name=sessions]:checked").each(function () {
      temp2.push(jQuery(this).val());
    });

    var temp3 = [];
    jQuery("input:checkbox[name=age]:checked").each(function () {
      temp3.push(jQuery(this).val());
    });

    var sort_by = jQuery("#sort_by").val();

    if(temp1.length > 0)  form_data.category = temp1.join(",");
    if(temp2.length > 0)  form_data.session = temp2.join(",");
    if(temp3.length > 0)  form_data.age = temp3.join(",");
    if(sort_by != '' && sort_by != undefined) form_data.sort_by = sort_by;

    var current_url = site_url+'/courses/'.split('?')[0];

    if(Object.keys(form_data).length === 0) {
      window.location.href = current_url;
    } else {
      window.location.href = current_url + '?' + jQuery.param(form_data);
    }
  }
  
</script>
<script type="text/javascript">
  document.addEventListener( 'wpcf7mailsent', function( event ) {
    jQuery('#submit-email').hide();
    jQuery('#emailAddress').hide();
  }, false );
</script>
<?php
wp_footer();
?> 
</body>
</html>