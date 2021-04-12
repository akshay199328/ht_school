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

$(window).bind('scroll',function() {
     $('.nav-tabs').find('li').removeClass('active');   
  });
$(document).ready(function(){
  $(".fixed_banner .course-fees strong:contains(FREE)").hide();
  $('.progress_key_2').removeClass('button');
  
  $(".course_button").removeClass("button");
  var profile_menu = $("#dashboard_menu").find("li.selected > a").text();
  $('#profile_current_menu').text(profile_menu);
  if(profile_menu == 'Account Info'){
    $('.edit-profile-link').show();
  }
  else{
    $('.edit-profile-link').hide();
  }

});
$(document).ready(function($) { 
  // $('.button full.course_button span:contains("Continue Course")').css('color', 'red');
  $('.loggedin_user_div').parent().parent().next().addClass('margin-ul');
  $('.course-button').removeClass('button');
  $(".course-listslider a").addClass('item');
  $('.progress_key_1, .progress_key_2').parents().parents().parents().parents().addClass("hide-price");
  $('#all').hide();
  $('#view_all_sessions').click(function(e){
    e.preventDefault();
    $('#all').show();
    $('#only-4').hide();
    $('#view_all_sessions').hide();
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

$(document).ready(function() {
  $('.home_slider').owlCarousel({
    loop: false,
    margin: 0,
    items: 1,
    responsiveClass: true,
    autoplay: true,
    autoplayTimeout:5000,
    autoplayHoverPause: true,
    dots:true,
    responsive: {
      0: {
        items: 1,
        nav: true
      },
      600: {
        items:1,
        nav: false
      },
      1000: {
        items: 1,
        nav: false,
        loop: false,
        margin: 0
      }
    }
  })
})


    if($(window).width() <= 992) {
        // alert("hello");
      $('.mobile-slider, .courses-slider, .course-listslider, .left_tab').addClass('owl-carousel');
      $('.mobile-slider, .courses-slider, .course-listslider, .left_tab').addClass('owl-theme');
      $('.left_tab li').addClass('item');
      $('.mobile-slider').addClass('responsive_slider');
      $('.courses-slider').addClass('coursesmobile_slider');
      $('.course-listslider').addClass('coursemobile_listslider');
      $('.left_tab').owlCarousel({
                loop: false,
                margin: 0,
                responsiveClass: true,
                autoplay: false,
                autoplayTimeout:5000,
                autoplayHoverPause: false,
                responsive: {
                  0: {
                    items: 2,
                    nav: false,
                    dots:false
                  },
                 600: {
                    items:2,
                    nav: false,
                    dots:false
                  },
                  768: {
                    item:3,
                    nav: false,
                    loop: false,
                    margin: 0,
                    dots:false
                  }
                }
              })
    }
    $('.responsive_slider').owlCarousel({
        loop: false,
        margin: 20,
        responsiveClass: true,
        autoplay: true,
        autoplayTimeout:5000,
        autoplayHoverPause: true,
        nav: false,
        dots:false,
        responsive: {
          0: {
            items: 1,
            nav: true
          },
          767: {
            items:1,
            nav: true
          },
          991: {
            items:2,
            nav: true,
            loop: false,
            margin: 20
          }
        }
      });
      $('.coursesmobile_slider').owlCarousel({
        loop: true,
        margin: 20,
        responsiveClass: true,
        autoplay: true,
        autoplayTimeout:5000,
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
        margin: 0,
        responsiveClass: true,
        autoplay: true,
        autoplayTimeout:5000,
        autoplayHoverPause: true,
        nav: false,
        dots:false,
        responsive: {
          0: {
            items:3,
            nav: false,
            margin: 0
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
            margin: 0
          }
        }
      });
      
        $('.testimonials-carousel').owlCarousel({
                loop: false,
                margin: 20,
                responsiveClass: true,
                autoplay: true,
                autoplayTimeout:5000,
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
