<?php

/**
 * Template Name: School Response Form Page
 */

if ( ! defined( 'ABSPATH' ) ) exit;
get_header(vibe_get_header());

$contact_ll=vibe_get_option('contact_ll');
$contact_style = vibe_get_option('contact_style');
$map_zoom = vibe_get_option('map_zoom');
$contact_form = WPCF7_ContactForm::get_current();
$form_id = $contact_form -> id;

$user_school_name = "";
$user_school = get_profile_data('Linked School');
if(intval($user_school) > 0){
  $user_school_name = get_user_by('id', $user_school)->display_name;
}                                            
$currentUserID = get_current_user_id();
$currentUser = wp_get_current_user();
$emailID = $currentUser->user_email;
$firstName = $currentUser->user_firstname;
$lastName = $currentUser->user_lastname;
if(have_posts()):while(have_posts()):the_post();
?>
<div class="innerheader-space"></div>
<section id="content" class="section_contact partner-wrapper">
    <!-- <div class="<?php echo vibe_get_container(); ?>"> -->
        <div class="content sec_cont">
          <ol class="breadcrumbs">
            <li><a href="#"><span>Home</span></a></li><li class="current"><span>HT School - Response Form</span></li>
          </ol>
             <!-- <div class="pagetitle"><h1><?php echo get_the_title(); ?></h1></div> -->
          <?php
              the_content();
           ?>
        </div>
        <?php        
        endwhile;
        endif;
        ?>
</section>

<script type="text/javascript" src="<?php echo vibe_sanitizer($src,'url'); ?>"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script> 
<script language="javascript" type="text/javascript">
// document.getElementById('EnterOTPemail').style.display = 'none';
// document.getElementById('EnterOTPemailid').style.display = 'none';

// Hide the Text field by default
document.getElementById('EnterCourseInterest').style.display = 'none';
document.getElementById('courseofinterest').addEventListener('click', displayTextField);
function displayTextField() {
  // Get the value of the currently selected radio button. 'select-a-size' is the name of the radio buttons you specify in the form builder
  var radioText = document.querySelector('input[name="course-of-interest"]:checked').value;
  if (radioText == 'Others') {
    document.getElementById('EnterCourseInterest').style.display = 'block';
  } else {
    document.getElementById('EnterCourseInterest').style.display = 'none';
  }
}
</script>

<script type="text/javascript">

jQuery(document).ready(function(){
  var email = '<?php echo $emailID;?>';
  if(email != '')
  {
    jQuery('#verify_otp').parent('p').hide();
  }
  jQuery('#emailAddress').val('<?php echo $emailID;?>');  
  jQuery('#studentfullName').val('<?php echo $firstName.' '.$lastName ;?>');  

  /*var schoolUrl = '<?php echo home_url(); ?>/wp-admin/admin-ajax.php?action=get_schools';

    jQuery( "#schoolName" ).autocomplete({
        source: schoolUrl,
        minLength: 2,
        select: function(event, ui) {
              event.preventDefault();
              $("#schoolName").val(ui.item.label);              
          },              
    });*/
});

/*jQuery('#schoolName').on('change', function() {
     
     var other_val = $("#schoolName").val();
      jQuery.ajax({
              type : "POST",
              dataType : "json",
              url : "<?php echo home_url(); ?>/wp-admin/admin-ajax.php?action=get_schools",
              data : {check_other : other_val},
              success: function(response) {
            //alert(response.status);
            alert(response.response); 
                  
              }
          });

  });*/

</script>

<script type='text/javascript'>

  jQuery("#MobileNumber").keypress(function(e) {
    var mobNum = jQuery(this).val();
      if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        jQuery("#errMobileMsg").text("Please enter Digits Only");
        return false;
      }
      else{
        jQuery("#errMobileMsg").text('');
      }
  });

  jQuery("#MobileNumber").on("blur", function(){
    var mobNum = jQuery('#MobileNumber').val();
        var filter = /^(?!0+$)\d{8,}$/;
        if (!filter.test(mobNum)) {
            jQuery("#errMobileMsg").text('Not a valid number');
            return false;
        }
        else if(mobNum.length!=10){
          jQuery("#errMobileMsg").text("Please enter 10 digit mobile number");
            return false;
        } 
        else{
          jQuery("#errMobileMsg").text("");
          return true;
        }
  });

  jQuery("#studentfullName").keypress(function(e) {
    var keyCode = e.keyCode || e.which;

    jQuery("#errstudentfullNameMsg").text("");

    //Regex for Valid Characters i.e. Alphabets.
    var regex = /^[A-Za-z ]+$/;

    //Validate TextBox value against the Regex.
    var isValid = regex.test(String.fromCharCode(keyCode));
    if (!isValid) {
        jQuery("#errstudentfullNameMsg").text("Please enter only alphabets");
    }
    return isValid;
  });

  /*jQuery('#emailAddress').on('change', function() {
      var testEmail = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
      if (testEmail.test(jQuery(this).val())){
        jQuery('#errstudentEmailMsg').text("");
      }
      else{
        jQuery('#errstudentEmailMsg').text("Please enter valid email address");
      }
  });*/

  jQuery("#parentName").keypress(function(e) {
      var keyCode = e.keyCode || e.which;

      jQuery("#errparentNameMsg").text("");

      //Regex for Valid Characters i.e. Alphabets.
      var regex = /^[A-Za-z ]+$/;

      //Validate TextBox value against the Regex.
      var isValid = regex.test(String.fromCharCode(keyCode));
      if (!isValid) {
          jQuery("#errparentNameMsg").text("Please enter only alphabets");
      }
      return isValid;
  });

  jQuery('#parentemailAddress').on('change', function() {
        var testEmail = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
        if (testEmail.test(jQuery(this).val())){
          jQuery('#errparentEmailMsg').text("");
        }
        else{
          jQuery('#errparentEmailMsg').text("Please enter valid email address");
        }
  });

  jQuery("#parentmobileNumber").keypress(function(e) {
    var mobNum = jQuery(this).val();
      if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        jQuery("#errparentMobileMsg").text("Please enter Digits Only");
        return false;
      }
      else{
        jQuery("#errparentMobileMsg").text('');
      }
  });

  jQuery("#parentmobileNumber").on("blur", function(){
    var mobNum = jQuery('#parentmobileNumber').val();
        var filter = /^(?!0+$)\d{8,}$/;
        if (!filter.test(mobNum)) {
            jQuery("#errparentMobileMsg").text('Not a valid number');
            return false;
        }
        else if(mobNum.length!=10){
          jQuery("#errparentMobileMsg").text("Please enter 10 digit mobile number");
            return false;
        } 
        else{
          jQuery("#errparentMobileMsg").text("");
          return true;
        }
  });

  jQuery("#schoolAddress").keypress(function(e) {
    var keyCode = e.keyCode || e.which;

    jQuery("#errschoolAddressMsg").text("");

    //Regex for Valid Characters i.e. Alphabets.
    var regex = /^[A-Za-z ]+$/;

    //Validate TextBox value against the Regex.
    var isValid = regex.test(String.fromCharCode(keyCode));
    if (!isValid) {
        jQuery("#errschoolAddressMsg").text("Please enter only alphabets");
    }
    return isValid;
  });

  jQuery("#city").keypress(function(e) {
    var keyCode = e.keyCode || e.which;

    jQuery("#errcityMsg").text("");

    //Regex for Valid Characters i.e. Alphabets.
    var regex = /^[A-Za-z ]+$/;

    //Validate TextBox value against the Regex.
    var isValid = regex.test(String.fromCharCode(keyCode));
    if (!isValid) {
        jQuery("#errcityMsg").text("Please enter only alphabets");
    }
    return isValid;
  });

   jQuery("#pincode").keypress(function(e) {
    var mobNum = jQuery(this).val();
      if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        jQuery("#errpincodeMsg").text("Please enter Digits Only");
        return false;
      }
      else{
        jQuery("#errpincodeMsg").text('');
      }
  });

  jQuery("#pincode").on("blur", function(){
    var mobNum = jQuery('#pincode').val();
        var filter = /^(?!0+$)\d{8,}$/;
        if (!filter.test(mobNum)) {
            jQuery("#errpincodeMsg").text('Not a valid number');
            return false;
        }
        else if(mobNum.length!=10){
          jQuery("#errpincodeMsg").text("Please enter 10 digit mobile number");
            return false;
        } 
        else{
          jQuery("#errpincodeMsg").text("");
          return true;
        }
  }); 

  jQuery('.first').click( function() {    
    jQuery(".last").removeClass("selected");
    jQuery(".first").addClass("selected");
   });

  jQuery('.last').click( function() {
    
    jQuery(".first").removeClass("selected");
    jQuery(".last").addClass("selected");
  });

/*-------------------------EMAIL VERIFICATION--------------------------*/

jQuery("#emailAddress").on("change", function (event, ui) {
      // alert(this.val());
      var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
      if(jQuery('#emailAddress').val() == ''){
        jQuery("#errstudentEmailMsg").html('Please enter Email Id');
        jQuery("#errstudentEmailMsg").show();
        return false;
      }
      else if(!emailReg.test(jQuery('#emailAddress').val())) 
      {    
          jQuery("#errstudentEmailMsg").html('Invalid email address entered.');
          jQuery("#errstudentEmailMsg").show();
          return false;
      }
      else
      {
          //console.log($('#emailAddress').val());
          var email = $('#emailAddress').val();

          jQuery.ajax({
              type : "POST",
              dataType : "json",
              url : "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
              data : {"action": "reg_send_otp",email : email},
              success: function(response) { 
                  alert(response.response); 
              }
          });

         /* jQuery.ajax({
              type : "POST",
              url : "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
              data : {"action": "otp_email_address1",email_address_otp : email},
              dataType : "JSON",
              success: function(data) { 
               // if(response.status == 1){
               //      alert("fgdh");
               //    }  

               var dd = data.replace('0','');
                                        alert(dd);
               JSON.parse(data.status);

               // var data = $.parseJSON(data);

               // alert(data.Content);
               
               // alert(resp.status);
               // alert(resp.response);
               // alert(resp.otp);
               // alert(resp.otp_email);

               // if(resp.status == 1){
                
                  // alert(resp.otpid);
                  // alert(resp.otp);
                  // alert(resp.otp_email);
                
               // }


               // alert(resp);
                /*var res = resp.replace('<pre></pre>','');
                         alert(res);*/ 
                         // JSON.parse(resp.response);
                 /* if(response.arsp == 1)
                  {
                   // var otpemail = $('#otpemail').val();
                   // var response_otp = response.otp;
// console.log(response.otp);
// console.log(response.otpid);

//                   alert(response.otp);
//                   alert(response.otpid);


// jQuery("#EnterOTPemail").val() = response.otp;
// jQuery("#EnterOTPemailid").val() = response.otpid;

// alert(jQuery("#EnterOTPemail").val());
// alert(jQuery("#EnterOTPemailid").val());

                    /*if(otpemail == response_otp){
                      jQuery("#errotpVerifyMsg").html('OTP verified.');
                      jQuery("#errotpVerifyMsg").show();
                      return false;
                    }else{
                       jQuery("#errotpVerifyMsg").html('Invalid OTP.');
                       jQuery("#errotpVerifyMsg").show();
                      return false;
                    }
                  }
              }
          });*/
      }
      
});

/*-------------------------EMAIL VERIFICATION--------------------------*/        
/*------------DUPLICATE EMAIL ADDRESS AND CONTACT NUMBERS------------*/
    /*jQuery("#emailAddress").on("change", function (event, ui) {
        var check_email_id = $("#emailAddress").val();

        if(check_email_id != ""){
          jQuery.ajax({
              type : "POST",
              dataType : "json",
              url : "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
              data : {"action": "check_email_Address",check_student_email : check_email_id},
              success: function(response) {           
                  if(response.status == 1){
                    jQuery("#errstudentEmailMsg").text('This email id is already exists!');
                    jQuery("#emailAddress").val('');
                  }
              }
          });
        }
      });*/
    var schoolUrl = '<?php echo home_url(); ?>/wp-admin/admin-ajax.php';
    jQuery('#user_school_data1').typeahead({
        source: function(query, result){
          $.ajax({
             url: schoolUrl,
             method:"POST",
             data:{"action": "get_schools_new", term: query.term},
             dataType:"json",
             success:function(data){
             result($.map(data, function(item){

                return item;
            
             }));
            }
          })
         },
         minLength: 2,
    });

    jQuery("#parentemailAddress").on("change", function (event, ui) {
        var check_parent_email_id = $("#parentemailAddress").val();

        if(check_parent_email_id != ""){
          jQuery.ajax({
              type : "POST",
              dataType : "json",
              url : "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
              data : {"action": "check_parent_email_Address",check_parent_email : check_parent_email_id},
              success: function(response) {           
                  if(response.status == 1){
                    jQuery("#errparentEmailMsg").text('This email id is already exists!');
                    jQuery("#parentemailAddress").val('');
                  }
              }
          });
        }
    });

    jQuery("#mobileNumber").on("change", function (event, ui) {
        var check_student_mobile_number = $("#mobileNumber").val();

        if(check_student_mobile_number != ""){
          jQuery.ajax({
              type : "POST",
              dataType : "json",
              url : "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
              data : {"action": "check_student_mobile_number",check_mobile_number : check_student_mobile_number},
              success: function(response) {           
                  if(response.status == 1){
                    jQuery("#errstudentEmailMsg").text('This contact number is already exists!');
                    jQuery("#mobileNumber").val('');
                  }
              }
          });
        }
    });

    jQuery("#parentmobileNumber").on("change", function (event, ui) {
        var check_parent_mobile_number = $("#parentmobileNumber").val();

        if(check_parent_mobile_number != ""){
          jQuery.ajax({
              type : "POST",
              dataType : "json",
              url : "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
              data : {"action": "check_parent_mobile_number",check_parent_contact : check_parent_mobile_number},
              success: function(response) {           
                  if(response.status == 1){
                    jQuery("#errparentMobileMsg").text('This contact number is already exists!');
                    jQuery("#parentmobileNumber").val('');
                  }
              }
          });
        }
    });

/*-----------DUPLICATE EMAIL ADDRESS AND CONTACT NUMBERS--------------*/
jQuery('.wpcf7-submit').click(function(e){
  
  var contact_form_id = jQuery("input[name='_wpcf7']").val();    
  var arr = new Array();
    arr.push(jQuery("#emailAddress").val());
    arr.push(jQuery("#studentfirstName").val());
    arr.push(jQuery("#studentlastName").val());
    arr.push(jQuery("#mobileNumber").val());
    arr.push(jQuery("#parentName").val());
    arr.push(jQuery("#parentemailAddress").val());
    arr.push(jQuery("#parentmobileNumber").val());
    arr.push(jQuery("input[name='pick-gender']:checked").val());
    arr.push(jQuery("#schoolName").val());
    arr.push(jQuery("#schoolAddress").val());
    arr.push(jQuery("#city").val());
    arr.push(jQuery("#standard").val());
    arr.push(jQuery("input[name='course-of-interest']:checked").val());  
    arr.push(jQuery("input[name='interest-of-workshop']:checked").val());
    arr.push(jQuery("#studentfullName").val());
    arr.push(jQuery("#state").val());
    arr.push(jQuery("#pincode").val());

    if(jQuery("#emailAddress").val() !='' && jQuery("#studentfirstName").val() !='' && jQuery("#studentlastName").val() !='' && jQuery("#mobileNumber").val() !='' && jQuery("#parentName").val() !='' && jQuery("#parentemailAddress").val() !='' && jQuery("#parentmobileNumber").val() !='' && jQuery("input[name='pick-gender']:checked").val() !='' && jQuery("#schoolName").val() !='' && jQuery("#schoolAddress").val() !='' && jQuery("#city").val() !='' && jQuery("#standard").val() !='' && jQuery("input[name='course-of-interest']:checked").val() !='' && jQuery("input[name='interest-of-workshop']:checked").val() !='' ){
        $.ajax({
              type: 'POST',
              url: "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
              data: {"action": "save_response_form", response_form: arr },
              success: function(response) {
                //var response = response.replace('<pre></pre>','');
                //alert(response);                
              }
        });
      }
  });
    
  jQuery('.wpcf7-form-control').click(function(){ 
    
    jQuery("#errstudentEmailMsg").html("");
    jQuery("#errstudentfirstNameMsg").html("");
    jQuery("#errstudentlastNameMsg").html("");
    jQuery("#errMobileMsg").text(""); 
    jQuery('#errparentNameMsg').html("");    
    jQuery("#errparentMobileMsg").text("");
    jQuery("#errparentEmailMsg").html("");
    jQuery("#errgenderMsg").text("");
    jQuery("#errschoolNameMsg").html(""); 
    jQuery('#errschoolAddressMsg').html("");
    jQuery("#errcityMsg").html("");
    jQuery("#errstandardMsg").html("");
    jQuery("#errcourseofinterest").html("");
    jQuery("#errinterestofworkshop").html(""); 
    
  })
  let baseUrl = "<?php echo get_home_url(); ?>";
  var contact_form_id = jQuery("input[name='_wpcf7']").val();
  document.addEventListener( 'wpcf7mailsent', function( event ) {
   if ( contact_form_id == event.detail.contactFormId ) { // Change 123 to the ID of the form 
  
    jQuery('#exampleModal').modal('show'); 
 }
  }, false );

  var map;
       
           /*function initialize() {
          
              var point = new google.maps.LatLng(<?php if(isset($contact_ll)){echo vibe_sanitizer($contact_ll); }else {echo '43.730325,7.422155'; }; ?>);
              var centrePoint = new google.maps.LatLng(<?php if(isset($contact_ll)){echo vibe_sanitizer($contact_ll); }else {echo '43.730325,7.422155'; }; ?>);
          
              var myOptions = {
                 center: centrePoint,
                 zoom: <?php if(isset($map_zoom)){echo vibe_sanitizer($map_zoom); }else {echo '17'; }; ?>,
                 mapTypeId: google.maps.MapTypeId.<?php if(isset($contact_style)) {echo vibe_sanitizer($contact_style);}else{echo 'SATELLITE';} ?>,
                 disableDefaultUI:true,
                 scrollwheel:false,
                 zoomControl: true,
                 zoomControlOptions: {
                     style: google.maps.ZoomControlStyle.LARGE,
                     position: google.maps.ControlPosition.RIGHT_CENTER
                 }
              };
          
              map = new google.maps.Map(document.getElementById('map-canvas'), myOptions);

              var image = new google.maps.MarkerImage(
                 '<?php echo VIBE_URL; ?>/assets/images/marker.png',
                 
                 new google.maps.Size(51,32),
                 new google.maps.Point(0,0),
                 new google.maps.Point(25.5,32)
              );


              var shape = {
                coord: [25,0,28,1,30,2,31,3,33,4,33,5,34,6,35,7,36,8,36,9,36,10,37,11,37,12,37,13,37,14,37,15,37,16,37,17,37,18,37,19,37,20,37,21,37,22,37,23,36,24,36,25,36,26,35,27,35,28,34,29,34,30,33,31,33,32,32,33,32,34,31,35,31,36,30,37,30,38,29,39,29,40,28,41,27,42,27,43,26,44,26,45,25,46,24,47,24,48,23,49,23,50,22,51,21,52,16,52,15,51,14,50,14,49,13,48,13,47,12,46,11,45,11,44,10,43,10,42,9,41,8,40,8,39,7,38,7,37,6,36,6,35,5,34,5,33,4,32,4,31,3,30,3,29,2,28,2,27,1,26,1,25,1,24,0,23,0,22,0,21,0,20,0,19,0,18,0,17,0,16,0,15,0,14,0,13,0,12,0,11,1,10,1,9,1,8,2,7,3,6,4,5,4,4,6,3,7,2,9,1,12,0,25,0],
                type: 'poly'
              };

              var marker = new google.maps.Marker({
                draggable: false,
                raiseOnDrag: false,
                animation: google.maps.Animation.DROP,
                icon: image,
                shape: shape,
                map: map,
                position: point
              });
          
              google.maps.event.addListener(marker, 'click', toggleBounce);
          
              function toggleBounce() {
                if (marker.getAnimation() != null) {
                  marker.setAnimation(null);
                } else {
                  marker.setAnimation(google.maps.Animation.BOUNCE);
                }   
              }
           }*/
       
           //google.maps.event.addDomListener(window, 'load', initialize);
         //  setTimeout(initialize, 2000); onClick="window.location.href = '<?php echo bloginfo('url');?>'"
  jQuery("#verify-otp-btn").click(function(){
          jQuery("#verify-otp-btn").html("Please wait...");
            jQuery("#verify-otp-btn").attr("disabled", "disabled");
            var num_1 = jQuery("input[name='num_1']").val();
            var num_2 = jQuery("input[name='num_2']").val();
            var num_3 = jQuery("input[name='num_3']").val();
            var num_4 = jQuery("input[name='num_4']").val();
            var num_5 = jQuery("input[name='num_5']").val();
            var num_6 = jQuery("input[name='num_6']").val();
          jQuery.ajax({
                type : "POST",
                dataType : "json",
                url : "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
                data : {'num_1':num_1,'num_2':num_2,'num_3':num_3,'num_4':num_4,'num_5':num_5,'num_6':num_6,'screenWidth': window.screen.availWidth,'screenHeight':window.screen.availHeight, 'action':'reg_verify_otp'},
                success: function(response) {
                  alert(response.message);
                  jQuery("#verify-otp-btn").html("Verify OTP");
                    jQuery("#verify-otp-btn").removeAttr("disabled");
                    
                    if(response.status == 1){
                      
                    }
                    else{
                        
                    }
                }
            });
        });
</script>

<?php
get_footer(vibe_get_footer());
?>
<!-- Modal -->
<div class="modal modal-box fade contact-popup" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">        
          <div class="modal-title" id="exampleModalLabel">
            <img src="<?php echo bloginfo('template_url').'/assets/images/logo_popup_web.svg'?>" class="modal-img"/>
           <h2 class="contact-title"> Thank you for getting in touch!</h2>            
          </div>          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
            <span>&times;</span>
          </button>
      </div>
      <div class="modal-body">
      <p>We have received your response and one of our colleagues will get in touch with you soon.</p>
        <p class="modalfooter_text">Thanks, <span>HTSchool</span></p>
    </div>
    </div>
  </div>
</div>
