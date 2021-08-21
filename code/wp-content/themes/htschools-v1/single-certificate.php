<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<link rel="stylesheet" type="text/css" href="/wp-content/themes/htschools/style.css">
<style type="text/css">body{font-family: GT-Walsheim-Pro!important;}</style>
</head>
<body>
<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if ( have_posts() ) : while ( have_posts() ) : the_post();

$print = get_post_meta($post->ID,'vibe_print',true);


$class = get_post_meta($post->ID,'vibe_custom_class',true);
$css = get_post_meta($post->ID,'vibe_custom_css',true);

$bgimg_id = apply_filters('wplms_certificate_template_style',get_post_meta($post->ID,'vibe_background_image',true),$post->ID);


if(!empty($bgimg_id)){
  $bgimg = wp_get_attachment_info( $bgimg_id );
}


$width = get_post_meta(get_the_ID(),'vibe_certificate_width',true);
$height = get_post_meta(get_the_ID(),'vibe_certificate_height',true);

$certificate_class = apply_filters('wplms_certificate_class','');

$style = (is_numeric($width)?'width:'.$width.'px;':'').''.(is_numeric($height)?'height:'.$height.'px':'');
do_action('wplms_certificate_before_full_content');

$htmlContent='
<center>
<section id="certificate">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div>';

                $htmlContent.='<div class="certificate_content" style="background:url('. $bgimg['src'].');" data-width="600" data-height="400">';

                $htmlContent.= '<style>'.$css.'</style>'. the_content().'</div>';

                $htmlContent3.='
                
            </div>
        </div>
    </div>
</section>
</center>';
echo $htmlContent;
  
endwhile;
 endif;


?>
   <!-- <button onclick="downloadimage()" id="btn" class="clickbtn">Click To Download Image</button> -->
   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
  <script>
    $(document).ready(function() {
       downloadimage();
    });
        function downloadimage() {
            //var container = document.getElementById("image-wrap"); //specific element on page
           var container = document.body; // full page 
            html2canvas(container, { allowTaint: true }).then(function (canvas) {

   //              var link = document.createElement("a");
   //              document.body.appendChild(link);
   //              link.download = "html_image.png";
   //              link.href = canvas.toDataURL('image/png');
   //              link.target = '_blank';
   //              link.click();
   //              // var pdf = new jsPDF();

   //              // pdf.addImage(canvas.toDataURL('image/png'), 'JPEG', 0, 0);

   //              // pdf.save('screenshot.pdf');


   //              var pdf = new jsPDF();
   //  pdf.addImage(canvas.toDataURL("image/png"),"png",0,0)
var doc = new jsPDF('l', 'mm', 'a4'); // optional parameters


   var img = new Image();
        img.src = canvas.toDataURL('image/png');
        img.onload = function() {
            doc.addImage(img, 'PNG', 0, 0);
            doc.save('certificate.pdf');
         };
            });
        }
    </script>
</body>
</html>