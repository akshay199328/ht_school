$(window).on('scroll', function() { 
    if ($(window).scrollTop() >= $( 
    '.footer-check .heading').offset().top + $('.footer-check .heading'). 
        outerHeight() - window.innerHeight) { 
        // console.log('You reached the end of the DIV')
      // console.log("remove Class");
        $('.fixed_banner').addClass('static_banner');
    } 
    else{
      // console.log("add Class");
        $('.fixed_banner').removeClass('static_banner');
    }
}); 
$(document).ready(function(){
  $(".fixed_banner .course-fees strong:contains(FREE)").hide();
  $('.progress_key_2').removeClass('button');
});
$(document).ready(function($) { 
  // $('.button full.course_button span:contains("Continue Course")').css('color', 'red');
  $('.loggedin_user_div').parent().parent().next().addClass('margin-ul');
  $('.course-button').removeClass('button');
  $(".course-listslider a").addClass('item');
  $('.progress_key_1, .progress_key_2').parents().parents().parents().parents().addClass("hide-price");
  $('#all').hide();
  $('#view_all_sessions').click(function(){
    $('#all').show();
    $('#only-4').hide();
  })
  // alert("test");
  $(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 10) {
        $(".innerheader-space").addClass("less_topmargin");
    } else {
        $(".innerheader-space").removeClass("less_topmargin");
    }
});
    if($(window).width() <= 992) {
        // alert("hello");
      $('.mobile-slider, .courses-slider, .course-listslider').addClass('owl-carousel');
      $('.mobile-slider, .courses-slider, .course-listslider').addClass('owl-theme');
      $('.mobile-slider').addClass('responsive_slider');
      $('.courses-slider').addClass('coursesmobile_slider');
      $('.course-listslider').addClass('coursemobile_listslider');

    }
    $('.responsive_slider').owlCarousel({
        loop: true,
        margin: 20,
        responsiveClass: true,
        autoplay: true,
        autoplayTimeout:2000,
        autoplayHoverPause: true,
        nav: false,
        dots:false,
        responsive: {
          0: {
            items: 1,
            nav: false
          },
          767: {
            items:1,
            nav: false
          },
          991: {
            items:2,
            nav: false,
            loop: true,
            margin: 20
          }
        }
      });
      $('.coursesmobile_slider').owlCarousel({
        loop: true,
        margin: 20,
        responsiveClass: true,
        autoplay: true,
        autoplayTimeout:2000,
        autoplayHoverPause: true,
        nav: false,
        dots:false,
        responsive: {
          0: {
            items: 1,
            nav: false
          },
          767: {
            items:1,
            nav: false
          },
          991: {
            items:1,
            nav: false,
            loop: true,
            margin: 20
          }
        }
      })
      $('.coursemobile_listslider').owlCarousel({
        loop: true,
        margin: 20,
        responsiveClass: true,
        autoplay: true,
        autoplayTimeout:2000,
        autoplayHoverPause: true,
        nav: false,
        dots:false,
        responsive: {
          0: {
            items:3,
            nav: false,
            margin: 20
          },
          480: {
            items:3,
            nav: false
          },
          575: {
            items:4,
            nav: false
          },
          767: {
            items:5,
            nav: false
          },
          991: {
            items:6,
            nav: false,
            loop: true,
            margin: 20
          }
        }
      });
      
        $('.testimonials-carousel').owlCarousel({
                loop: false,
                margin: 20,
                responsiveClass: true,
                autoplay: true,
                autoplayTimeout:2000,
                autoplayHoverPause: true,
                nav: false,
                dots:false,
                responsive: {
                  0: {
                    items: 1,
                    nav: false
                  },
                  767: {
                    items:1,
                    nav: false
                  },
                  1200: {
                    items:3,
                    nav: false,
                    loop: false,
                    margin: 20
                  }
                }
              })
});
