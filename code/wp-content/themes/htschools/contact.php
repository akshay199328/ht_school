<?php

/**
 * Template Name: Contact Page
 */

if ( ! defined( 'ABSPATH' ) ) exit;
get_header(vibe_get_header());

$contact_ll=vibe_get_option('contact_ll');
$contact_style = vibe_get_option('contact_style');
$map_zoom = vibe_get_option('map_zoom');
if(have_posts()):while(have_posts()):the_post();
?>
<div class="innerheader-space"></div>
<section id="content" class="section_contact">

    <div class="<?php echo vibe_get_container(); ?>">
        <div class="row">
            <div class="col-md-12">
                <div class="content sec_cont">
                  <ol class="breadcrumbs"><li><a href="#"><span>Home</span></a></li><li class="current"><span>Contact us</span></li></ol>
                     <!-- <div class="pagetitle"><h1><?php echo get_the_title(); ?></h1></div> -->
                    <?php
                        the_content();

                     ?>
                </div>
                <?php
                
                endwhile;
                endif;
                ?>
            </div>
        </div>
    </div>

</section>
<?php
  $protocol = is_ssl() ? 'https' : 'http';
  $google_apikey_contact = vibe_get_option('google_apikey_contact');
  $src = '//maps.googleapis.com/maps/api/js';
  if(!empty($google_apikey_contact)){
    $src = '//maps.googleapis.com/maps/api/js?key='.$google_apikey_contact;
  }
  
?>
<script type="text/javascript" src="<?php echo vibe_sanitizer($src,'url'); ?>"></script>
<script type='text/javascript'>
  let baseUrl = "<?php echo get_home_url(); ?>"
  document.addEventListener( 'wpcf7mailsent', function( event ) {
   if ( '1024' == event.detail.contactFormId ) { // Change 123 to the ID of the form 
  
    jQuery('#exampleModal').modal('show'); 
 }
  }, false );

  var map;
       
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
           }
       
           //google.maps.event.addDomListener(window, 'load', initialize);
           setTimeout(initialize, 2000);
</script>




<?php
get_footer(vibe_get_footer());
?>
<!-- Modal -->
<div class="modal modal-box fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">        
          <div class="modal-title" id="exampleModalLabel">
            <img src="http://localhost/Htschools/code/wp-content/uploads/2021/03/logo.png" class="modal-img"/>
           <p class="modal-text"> Thank you for getting in touch!</p>
            <!-- <p class="modal-text">Welcome to</p>
            <p class="modal-para">Data Science Masterclass for Non-Programmers</p> -->
            <!-- <p class="modal-text">Congratulations on completing the Data Science Masterclass for Non-Programmers successfully. </p> -->
          </div>          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span>&times;</span>
          </button>
      </div>
      <div class="modal-body">
      <div class="body-text">
        <p class="body-line1">We have received your message and one of our colleagues will get in touch with you soon. If your query is urgent, please use the telephone number: 11 60004242  to talk to one of our support executives.</p>
        <p class="body-line">Thanks, HTSchool</p>
        <!-- <p class="sec-line">Course Instructions are:</p>
        <ul class="custom-list">
          <li>Learn to use Python professionally, learning both Python 2 and Python </li>
          <li>Create games with Python, like Tic Tac Toe and Blackjack!</li>
          <li>Learn advanced Python features, like the collections module and how</li> 
          <li>Learn to use Object Oriented Programming with classes!</li>
          <li>Understand complex topics, like decorators.</li>
          <li>Understand how to use both the Jupyter Notebook and create .py files</li>
          <li>Get an understanding of how to create GUIs in the Jupyter Notebook</li> 
          <li>Build a complete understanding of Python from the ground up!</li>
        </ul> -->
        <!-- <p>We hope you had a great learning throughout and must be excited to share your achievements. Happy Learning!</p> -->
      </div>
      <div class="third-btn">
          <button type="button" class="btn">Download Certificate  <i class="bi bi-download"></i></button>
            <button type="button" class="btn">Share Certificate <i class="bi bi-share"></i></button>
      </div>
      </div>
    </div>
  </div>
</div>
