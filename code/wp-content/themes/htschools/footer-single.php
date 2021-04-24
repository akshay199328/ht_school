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
<footer id="footer" class="footer">
  <div class="footer-top">
      <div class="container">
        <div class="footer-check" style="padding:0px;float: left;">
          <h1 class="heading"></h1>
      </div>
        <div class="row gy-4">
          <div class="col-lg-8 col-md-8 col-sm-12 footer-info ">
            <div class="col-lg-5 col-md-5 col-sm-12 footer-info mrg">
              <a href="index.html" class="logo d-flex align-items-center">
                <!-- <img src="<?php echo get_template_directory_uri()?>/assets/images/footer-logo.png" class="img-fluid" alt=""> -->
                <?php
                    $url = apply_filters('wplms_logo_url',VIBE_URL.'/assets/images/logo.png','footer');
                    if(!empty($url)){
                ?>    

                    <a href="<?php echo vibe_site_url('','logo'); ?>"><img src="<?php  echo vibe_sanitizer($url,'url'); ?>" alt="<?php echo get_bloginfo('name'); ?>" /></a>
                <?php 
                    }
                ?>
                <!-- <span>FlexStart</span> -->
              </a>
            </div>
            <!-- <div class="col-lg-12 col-md-12 footer-info mrg">
              <p>Supporting education through our products,</p> --
            </div> -->
          </div>

          <div class="col-sm-12  col-md-4 col-lg-4 social-links mrg">
            <div class="col-sm-8 col-lg-8 col-md-8 pull-left mrg">
              
              <div class="socio-list">
                <!--  <span class="social-heading">Follow us on</span> -->
                <a href="https://www.linkedin.com/company/htschool" target="_blank" class="linkedin"><i class="bi bi-linkedin bx bxl-linkedin"></i></a>
                <a href="https://twitter.com/htschool1" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="https://www.facebook.com/HTSchool-111960910982690/" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/ht.school/" target="_blank" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i></a>
              </div>
            </div>
            <div class="col-sm-4 col-lg-4 col-md-4 pull-right mrg">
              
              <div class="socio-list">
                <span class="social-heading">RSS Feed</span>
                <a href="<?php bloginfo('rss2_url'); ?>" target="_blank" class="twitter"><i class="bi bi-wifi bx bxl-wifi"></i></a>
              </div>
            </div>
          </div>
          <div class="col-sm-12 middle-detils footer-links">
            <div class="col-lg-12 col-12 mrg">
              <ul>
                  <li><a href="<?php echo get_site_url();?>/all-courses" title="Course Offerings">Course Offerings</a></li>
                  <li><a href="<?php echo get_site_url();?>/news" title="News Release">News Release</a></li>
              </ul>
            </div>
            <div class="col-lg-12 col-12 about-links mrg">
              <ul>
                <li><a href="<?php echo get_bloginfo('url')?>/about" title="About HT School">About HT School</a></li>
                <li><a href="https://www.hindustancareermate.com/" title="Career Mate" target="_blank">Career Mate</a></li>
                <li><a href="https://www.htcodeathon.com/" title="Code-a-Thon" target="_blank">Code-a-Thon</a></li>
                <li><a href="https://www.lenovoscholarship.com/" title="Scholarships" target="_blank">Scholarships</a></li>
                <li><a href="https://www.hindustanolympiad.in/" title="Olympiads" target="_blank">Olympiads</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-12 bottom-detils">
          <p class="copyright">Copyright © 2021 HTDSL. All rights reserved.</p>
            <div class="col-lg-12 col-12 links mrg">
              <div id="footermenu">
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
            </div>
          </div>
      </div>
    </div>
</footer>
</div><!-- END PUSHER -->
</div><!-- END MAIN -->
	<!-- SCRIPTS -->

<?php if(is_user_logged_in()){ ?>

<style>
    .ui-widget-content.ui-autocomplete{
        z-index: 99999;
    }
  #profileModal .modal-content {
    top: 139px;
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
    padding: 2px 60px 2px 60px;
    border-radius: 0px;
    color:deepskyblue;
 } 
 #profileModal .ul-nav{
  margin-bottom: 25px;
 }
  #profileModal .mnav{
    margin-left:1px;
  }

  #profileModal .in-class{
    background-color: white;
    margin-bottom: 10px;
    border: 0px !important;
    border-bottom: 1px solid #ccc !important;
    padding: 6px 1px;
    font-size: 16px;
    border-radius: 0px;
    box-shadow: none;
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
    font-weight: 100;
    margin-bottom: 0px;
    font-size: 13px;
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
    background-color: white;
    color: #afafaf;
  }
  #profileModal .b-class{
    padding: 25px;
  }

  @media only screen and (max-device-width: 480px) {
   #profileModal .ul-nav>li>a{
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
  #profileModal .modal-content {
    top: 166px;
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
            <img src="<?php echo get_bloginfo('url')?>/wp-content/uploads/2021/03/logo-popup.png" class="modal-img"/>
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
                <div class="col-md-9">
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
                                    <input type="text" name="first_name"  value="<?php echo $currentUser->user_firstname; ?>" placeholder="First name" class=" in-class form-control">
                                </div>

                                <div class="col-md-12">
                                    <label>Last Name*</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" name="last_name"  value="<?php echo $currentUser->user_lastname; ?>" placeholder="Last name" class=" in-class form-control">
                                </div>

                                <div class="col-md-12">
                                    <label>Email id*</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="email" name="user_email"  value="<?php echo $currentUser->user_email; ?>" readonly placeholder="Email id"  class="in-class form-control"/>
                                </div>

                                <div class="col-md-12">
                                    <label>Mobile Number*</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" name="user_mobile" placeholder="Mobile Number" maxlength="10" value="<?php echo $user_mobile ?>" class="in-class form-control" readonly/>
                                </div>

                                <div class="col-md-12">
                                    <label>Date of Birth*</label>
                                </div>
                                <div class="col-md-12">
                                    <input id="user_dob_display" type="text" class="in-class form-control" name="user_dob_display" placeholder="Date of Birth" value="<?php echo date("d/m/Y", $dob); ?>">
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
<!--                                 <div class="col-md-12">
                                    <label>Select gender</label>
                                </div>
 -->                            <div class="form-group ">
                                    <label> Select Gender</label> <br/>
                                    <div class="radio"> 
                                        <div class="switch" style="height: unset;">
                                            <input type="radio" class="switch-input user_radio_btn" name="user_gender" value="Female" id="one" <?php if($user_gender == 'Female'){ echo "checked"; } ?>>
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

                                <!-- <div class="col-md-12">  
                                    <label>School name*</label>
                                </div> -->
                                <div class="col-md-12">  
                                    <div class="input-group">
                                        <label for="user_school_data">School</label>
                                        <input type="text" class="s-class form-control" id="user_school_data" name="user_school_data" placeholder="Select School" value="<?php echo $user_school_name; ?>">
                                        <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
                                        <input type="hidden" id="user_school" name="user_school" value="<?php echo $user_school; ?>">
                                    </div>
                                </div>

                                <div class="col-md-12">  
                                    <label>Country</label>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="type"  id="user_country_data" name="user_country_data" placeholder="Select Country" value="<?php echo $user_country; ?>" class="s-class form-control" />
                                        <input type="hidden" id="user_country" name="user_country" value="<?php echo $user_country; ?>">
                                        <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
                                    </div>
                                </div>

                                <div class="col-md-12">  
                                    <label>State</label>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="type" id="user_state" name="user_state" placeholder="Select State" value="<?php echo $user_state; ?>" class="s-class form-control" />
                                        <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label>City</label>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="type"  id="user_city" name="user_city" placeholder="Select City" value="<?php echo $user_city; ?>" class="s-class form-control" />
                                        <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
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
                <div class="col-md-3">
                    <!-- progress bra -->
                    <div class="progressbar-full">
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

            $(".close_modal").unbind();
            $(".close_modal").click(function(){
                $("#profileModal").modal("hide");
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
                dateFormat: "dd/mm/yy",
            });

            $("#profile_next_step").click(function(){
                $("#profile_step_2").click();
            });

            var schoolUrl = '<?php echo home_url(); ?>/wp-admin/admin-ajax.php?action=get_schools';

            $( "#user_school_data" ).autocomplete({
                source: schoolUrl,
                minLength: 2,
                select: function(event, ui) {
                    event.preventDefault();
                    $("#user_school_data").val(ui.item.label);
                    $("#user_school").val(ui.item.value);
                },
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

            $("#profile_submit").click(function(){
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
            });

        });
    })( jQuery );
</script>
<?php } ?>

<?php
wp_footer();
?> 
</body>
</html>