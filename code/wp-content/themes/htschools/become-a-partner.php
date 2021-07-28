<?php

/**
 * Template Name: Become A Part Page
 */

if ( ! defined( 'ABSPATH' ) ) exit;
get_header(vibe_get_header());

$contact_ll=vibe_get_option('contact_ll');
$contact_style = vibe_get_option('contact_style');
$map_zoom = vibe_get_option('map_zoom');
$contact_form = WPCF7_ContactForm::get_current();
$form_id = $contact_form -> id;
if(have_posts()):while(have_posts()):the_post();
?>
<div class="innerheader-space"></div>
<section id="content" class="section_contact">
    <!-- <div class="<?php echo vibe_get_container(); ?>"> -->
      <ol class="breadcrumbs">
            <li><a href="#"><span>Home</span></a></li><li class="current"><span>Become a Partner</span></li>
          </ol>
          <div class="content sec_cont">
               <div class="pagetitle"><h1><?php the_title(); ?></h1></div>
               <div class="pagesubtitle"><h1><?php the_sub_title(); ?></h1></div>
          </div>

</section>

<section class="section popular-wrapper school-wrapper">
          <div class="section-copy">
            <div class="school-listing">
                    <div class="section-head">
                      <div class="header-copy">
                          <h3 class="medium-title">Our Partner Schools</h3>
                      </div>
                      <!--<form class="right">
                            <div class="search">
                                <input class="form-control" placeholder="Search">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25.707" height="25.707" viewBox="0 0 25.707 25.707">
                                      <g id="Group_18782" data-name="Group 18782" transform="translate(-308 -1243)">
                                        <g id="Group_15752" data-name="Group 15752" transform="translate(308 1243)">
                                          <g id="Ellipse_31" data-name="Ellipse 31" fill="none" stroke="#000" stroke-width="2">
                                            <circle cx="11.667" cy="11.667" r="11.667" stroke="none"/>
                                            <circle cx="11.667" cy="11.667" r="10.667" fill="none"/>
                                          </g>
                                          <path id="Path_9" data-name="Path 9" d="M26,26l5.333,5.333" transform="translate(-6.333 -6.333)" fill="#fff" stroke="#000" stroke-width="2"/>
                                        </g>
                                      </g>
                                    </svg>
                                </button>
                            </div>
                            <select class="sort">
                                <option selected="selected">Sort by:</option>
                                <option>Low to Hight</option>
                                <option>High to Low</option>
                        </select>
                      </form>-->
                  </div>
                  <div class="courses-wrapper">
                      <div class="column">
                          <a href="#!" class="course-hero"><img src="https://www.prokerala.com/education/imgs/logo/school/ryan-international-school.jpg"></a>
                          <div class="course-copy">
                          <h3 class="course-title"><a href="#!">Ryan International School</a></h3>
                            <a class="black-button" href="#!">Explore Now</a>
                          </div>
                      </div>
                      <div class="column">
                          <a href="#!" class="course-hero"><img src="https://upload.wikimedia.org/wikipedia/commons/f/ff/Oxford-University-Circlet.svg"></a>
                          <div class="course-copy">
                          <h3 class="course-title"><a href="#!">Oxford University, in Oxford, England, United Kingdom.</a></h3>
                            <a class="black-button" href="#!">Explore Now</a>
                          </div>
                      </div>
                      <div class="column">
                          <a href="#!" class="course-hero"><img src="https://i.pinimg.com/originals/72/6a/30/726a303f6704bc2f24401db85e65f984.png"></a>
                          <div class="course-copy">
                          <h3 class="course-title"><a href="#!">Harvard University, Research University in Cambridge</a></h3>
                            <a class="black-button" href="#!">Explore Now</a>
                          </div>
                      </div>
                  </div>

                  <div class="courses-wrapper">
                      <div class="column">
                          <a href="#!" class="course-hero"><img src="https://upload.wikimedia.org/wikipedia/en/thumb/b/b7/Stanford_University_seal_2003.svg/1200px-Stanford_University_seal_2003.svg.png"></a>
                          <div class="course-copy">
                          <h3 class="course-title"><a href="#!">Stanford University, Private Research University in Stanford</a></h3>
                            <a class="black-button" href="#!">Explore Now</a>
                          </div>
                      </div>
                      <div class="column">
                          <a href="#!" class="course-hero"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Boston_University_seal.svg/1200px-Boston_University_seal.svg.png"></a>
                          <div class="course-copy">
                          <h3 class="course-title"><a href="#!">Boston University is a Private Research University in Boston</a></h3>
                            <a class="black-button" href="#!">Explore Now</a>
                          </div>
                      </div>
                      
                  </div>
              </div>

            <div class="partner-form">
                  
                  <?php the_content(); ?>
                  
                  <?php
          
                  endwhile;
                  endif;
                  ?>
              </div>
    </div>
</section>



<!-- <?php
  $protocol = is_ssl() ? 'https' : 'http';
  $google_apikey_contact = vibe_get_option('google_apikey_contact');
  $src = '//maps.googleapis.com/maps/api/js';
  if(!empty($google_apikey_contact)){
    $src = '//maps.googleapis.com/maps/api/js?key='.$google_apikey_contact;
  }
  
?> -->

<script type="text/javascript" src="<?php echo vibe_sanitizer($src,'url'); ?>"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type='text/javascript'>
  jQuery("#phoneNumber").keypress(function(e) {
    var mobNum = jQuery(this).val();
      if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        jQuery("#errPhoneMsg").text("Please enter Digits Only");
        return false;
      }
      else{
        jQuery("#errPhoneMsg").text('');
      }

  });
  jQuery("#phoneNumber").on("blur", function(){
    var mobNum = jQuery('#phoneNumber').val();
        var filter = /^(?!0+$)\d{8,}$/;
        if (!filter.test(mobNum)) {
            jQuery("#errPhoneMsg").text('Not a valid number');
            return false;
        }
        else if(mobNum.length!=10){
          jQuery("#errPhoneMsg").text("Please enter 10 digit mobile number");
            return false;
        } 
        else{
          jQuery("#errPhoneMsg").text("");
          return true;
        }
  });

  jQuery("#firstName").keypress(function(e) {
    var keyCode = e.keyCode || e.which;

    jQuery("#errFirstNameMsg").text("");

    //Regex for Valid Characters i.e. Alphabets.
    var regex = /^[A-Za-z ]+$/;

    //Validate TextBox value against the Regex.
    var isValid = regex.test(String.fromCharCode(keyCode));
    if (!isValid) {
        jQuery("#errFirstNameMsg").text("Please enter only alphabets");
    }
    return isValid;
  });

  jQuery("#lastName").keypress(function(e) {
    var keyCode = e.keyCode || e.which;

    jQuery("#errLastNameMsg").text("");

    //Regex for Valid Characters i.e. Alphabets.
    var regex = /^[A-Za-z ]+$/;

    //Validate TextBox value against the Regex.
    var isValid = regex.test(String.fromCharCode(keyCode));
    if (!isValid) {
        jQuery("#errLastNameMsg").text("Please enter only alphabets");
    }
    return isValid;
  });

   jQuery("#city").keypress(function(e) {
    var keyCode = e.keyCode || e.which;

    jQuery("#errCityMsg").text("");

    //Regex for Valid Characters i.e. Alphabets.
    var regex = /^[A-Za-z ]+$/;

    //Validate TextBox value against the Regex.
    var isValid = regex.test(String.fromCharCode(keyCode));
    if (!isValid) {
        jQuery("#errCityMsg").text("Please enter only alphabets");
    }
    return isValid;
  });

  jQuery('#emailAddress').on('change', function() {
    var testEmail = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
    if (testEmail.test(jQuery(this).val())){
      jQuery('#errEmailMsg').text("");
    }
    else{
      jQuery('#errEmailMsg').text("Please enter valid email address");
    }
});

  jQuery('.wpcf7-form-control').click(function(){
    jQuery("#errPhoneMsg").text("");
    jQuery("#errFirstNameMsg").html("");
    jQuery("#errLastNameMsg").html("");
    jQuery("#errCityMsg").html("")
    //jQuery("#errPinCode").text(""); 
   // jQuery('#errYourMessage').text("");
  })
  let baseUrl = "<?php echo get_home_url(); ?>";
  var contact_form_id = jQuery("input[name='_wpcf7']").val();
  document.addEventListener( 'wpcf7mailsent', function( event ) {
   if ( contact_form_id == event.detail.contactFormId ) { // Change 123 to the ID of the form 
  
    jQuery('#exampleModal').modal('show'); 
 }
  }, false );

 /* var map;
       
           function initialize() {
          
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
           setTimeout(initialize, 2000);
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
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.href = '<?php echo bloginfo('url');?>'">
            <span>&times;</span>
          </button>
      </div>
      <div class="modal-body">
      <p>We have received your message and one of our colleagues will get in touch with you soon.</p>
        <p class="modalfooter_text">Thanks, <span>HTSchool</span></p>
    </div>
    </div>
  </div>
</div>
