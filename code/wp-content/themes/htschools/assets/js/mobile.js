$(document).ready(function()
{
  setTimeout(function()
    {
        $('span.vibebp_name').css('display','block');
    }, 
    2000);
});

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
$('ul .vibebp-login').click(function(){
    sessionStorage.setItem('login_url','1');
})
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
$('.single-course ol li').click(function(){
  var current_click_text = $(this).text();
  if(current_click_text == 'Course'){
    window.location.href=site_url + "/courses";
    return false;
  }
});
$(document).ready(function($) { 
  $('.new-footer .screen-reader-response').hide();
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
  $(".close-share").click(function(){
    $(".display_icon").hide();
  })
  // alert("test");
  $(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 10) {
      // alert("HELLO");
        $(".innerheader-space").next(".sticky_content").children(".right-section").css({ "margin-top": "0px"});
        $(".innerheader-space.course-space").css({ "margin-top": "96px"});
    } else {
      // alert("HELLO123");
        $(".innerheader-space").next(".sticky_content").children(".right-section").css({ "margin-top": "0px"});
        $(".innerheader-space.course-space").css({ "margin-top": "80px"});
    }
});
$(document).ready(function() {
  $('.list input:radio').click(function () {
    // alert("HELLO");
      $('.list input:radio').parent().removeClass('selected');
      $(this).parent(this).addClass('selected');
  });
});
$(document).ready(function() {
  $('#home_slider').owlCarousel({
    margin:0,
    loop:false,
    nav:true,
    mouseDrag:false,
    //autoWidth:true,
    slideBy: 2,
    items:2,
    autoplayHoverPause: true,
    responsive : {
        0 : {
            items:1,
        },
        // breakpoint from 480 up
        480 : {
            items:1,
        },
        // breakpoint from 768 up
        768 : {
            items:2,
        }
    }
  })
  $('#course_slider').owlCarousel({
    margin:0,
    loop:true,
    nav:true,
    mouseDrag:false,
    dots:true,
    //autoWidth:true,
    slideBy: 2,
    startPosition: 5,
    items:2,
    autoplay:true,
    autoplayHoverPause: true,
    responsive : {
        0 : {
            items:1,
        },
        // breakpoint from 480 up
        480 : {
            items:1,
        },
        // breakpoint from 768 up
        768 : {
            items:2,
        }
    }
  })
  
})
if($(window).width() >= 768) {
  // alert(1234);
  $(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 160) {
        $(".featured_tablist").addClass('fixedTop_tab');
        // $(".featured_tablist").css({ "transition" : "all 0.5s"});
        // $(".featured_tablist .left_tab").css({ "padding": "20px 0px", "width":"1050px", "margin":"0px auto"});

    } else {
      $(".featured_tablist").removeClass('fixedTop_tab');
        // $(".featured_tablist").css({ "position": "relative", "width":"100%", "margin":"0px", "left":"0", "right":"0", "top":"0", "background":"transparent", "padding" : "10px 0px 0px 0px!important"});
        // $(".featured_tablist .left_tab").css({ "padding": "0px 0px", "width":"100%", "margin":"0px"});
    }
});

}

    if($(window).width() <= 767) {
        // alert("hello");
      // $('.mobile-slider, .courses-slider, .course-listslider, .left_tab').addClass('owl-carousel');
      // $('.mobile-slider, .courses-slider, .course-listslider, .left_tab').addClass('owl-theme');

      $('.mobile-slider, .course-listslider, .left_tab, .learning-copy .logos').addClass('owl-carousel');
      $('.mobile-slider, .course-listslider, .left_tab, .learning-copy .logos').addClass('owl-theme');
      
      
      $('.left_tab li').addClass('item');
      $('.mobile-slider').addClass('responsive_slider');
      // $('.courses-slider').addClass('coursesmobile_slider');
      $('.course-listslider').addClass('coursemobile_listslider');
      $('.logos').owlCarousel({
        margin: 0,
        loop: true,
        autoWidth: true,
        mouseDrag:true,
        items: 1,
        nav: false,
        dots:false,
        autoplay: true,
  })  
      $('.left_tab').owlCarousel({
          margin: 15,
        loop: false,
        autoWidth: true,
        items: 4,
        nav: false,
        dots:false
      })
    }
    $('.responsive_slider').owlCarousel({
        margin:10,
        loop: false,
        autoWidth: true,
        items: 2,
        nav: false,
        dots:false
      });
      // $('.coursesmobile_slider').owlCarousel({
      //   items:1,
      //   loop:false,
      //   center:true,
      //   margin:10,
      //   URLhashListener:true,
      //   autoplayHoverPause:true,
      //   // startPosition: 'URLHash'
      // })
      $('.coursemobile_listslider').owlCarousel({
        margin: 0,
        loop: true,
        autoWidth: true,
        items: 4,
        nav: false,
        dots:false
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

    $(".filter-button").click(function () {
      $("body").toggleClass('filter-opened');
      $('.course-close').click(function() {
          $('body').removeClass('filter-opened');
      });
    });   

    
});


$(window).scroll(function() {
    var windscroll = $(window).scrollTop();
    if (windscroll >= 100) {
        $('.latest-news').each(function(index,e) {
            if ($(this).position().top <= windscroll + 130) {
              var id = $(this).attr('id');
                //$('news-li').eq(e).addClass('active');
                if(id != 'All'){
                  $('.news-li.active').removeClass('active');
                  $('.news-li[data-scroll="' + id + '"]').addClass('active');
                }
                else{
                  $('.news-li.active').removeClass('active');
                  $('.news-li[data-scroll="' + id + '"]').addClass('active');
                }
                //$(".news-li[data-id=" + $(this).attr('id') + "]").addClass("active");
            }
        });

    } else {

        //$('ul li.active').removeClass('active');
        
        $('ul li:first').addClass('active');
    }

}).scroll();
