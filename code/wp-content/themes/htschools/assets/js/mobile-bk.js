jQuery(window).on('scroll', function() { 
    if (jQuery(window).scrollTop() >= jQuery( 
    '.footer-check .heading').offset().top + jQuery('.footer-check .heading'). 
        outerHeight() - window.innerHeight) { 
        // console.log('You reached the end of the DIV')
      // console.log("remove Class");
        jQuery('.fixed_banner').addClass('static_banner');
    } 
    else{
      // console.log("add Class");
        jQuery('.fixed_banner').removeClass('static_banner');
    }
}); 
jQuery(document).ready(function(jQuery) { 
  jQuery(".course-listslider a").addClass('item');
  // alert("test");
  jQuery(window).scroll(function() {    
    var scroll = jQuery(window).scrollTop();

    if (scroll >= 10) {
        jQuery(".innerheader-space").addClass("less_topmargin");
    } else {
        jQuery(".innerheader-space").removeClass("less_topmargin");
    }
});
    if(jQuery(window).width() <= 992) {
        // alert("hello");
      jQuery('.mobile-slider, .courses-slider, .course-listslider').addClass('owl-carousel');
      jQuery('.mobile-slider, .courses-slider, .course-listslider').addClass('owl-theme');
      jQuery('.mobile-slider').addClass('responsive_slider');
      jQuery('.courses-slider').addClass('coursesmobile_slider');
      jQuery('.course-listslider').addClass('coursemobile_listslider');

    }
    jQuery('.responsive_slider').owlCarousel({
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
      jQuery('.coursesmobile_slider').owlCarousel({
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
      jQuery('.coursemobile_listslider').owlCarousel({
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
      
        jQuery('.testimonials-carousel').owlCarousel({
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
