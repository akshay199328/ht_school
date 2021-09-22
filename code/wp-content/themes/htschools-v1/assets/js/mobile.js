
    
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 10) {
            $("body").addClass("header_fixed");
        } else {
            $("body").removeClass("header_fixed");
        }
    });
    $(document).ready(function(){
        /*$(".overlay").click(function(){
            $("body").removeClass("shared");
        });*/
        /*$(".sharing").click(function () {
            $("body").toggleClass('shared');
        });*/
        $(".filter-button").click(function () {
            $("body").toggleClass('filterOpened');
        });
        $("#cancel_filters").click(function () {
            $("body").toggleClass('filterOpened');
        });
        $(".home-button").click(function () {
            $("body").toggleClass('menuOpened');
        });
        $(".overlay").click(function(){
        $("body").removeClass("menuOpened");
        });
        
        $('.course_listing_slider').owlCarousel({
            navText: ['<span class="arrow"></span>','<span class="arrow"></span>'],
            margin:0,
            loop:false,
            nav:true,
            dots:false,
            items:1,
            mouseDrag:false,
            stagePadding:0,
            smartSpeed:1900,
            autoplay:true,
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
                    items:1,
                }
            }
        });
        $('.home_slider').owlCarousel({
            navText: ['<span class="arrow"></span>','<span class="arrow"></span>'],
            margin:0,
            loop:false,
            nav:true,
            items:1,
            mouseDrag:false,
            stagePadding:0,
            smartSpeed:1900,
            autoplay:true,
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
                    items:1,
                }
            }
        });
        $('.course_slider').owlCarousel({
            navText: ['<span class="arrow"></span>','<span class="arrow"></span>'],
            margin:30,
            loop:true,
            nav:true,
            dots:false,
            mouseDrag:false,
            stagePadding: 100,
            smartSpeed:1200,
            autoWidth:true,
            autoplay:false,
            autoplayHoverPause:true,
            merge:true,
            center:true,
            responsive : {
                320 : {
                    dots:true,
                },
                768 : {
                },
                1024 : {
                },
                1400 : {
                    
                },
                2500 : {
                    items:6,
                }
            }
        });
        $('.student_slider').owlCarousel({
            navText: ['<span class="arrow"></span>','<span class="arrow"></span>'],
            margin:30,
            loop:false,
            nav:true,
            dots:false,
            items:6,
            mouseDrag:false,
            stagePadding: 100,
            smartSpeed:600,
            autoWidth:true,
            autoplay:true,
            /*center:true,*/
            autoplayHoverPause:true,
            merge:true,
            responsive : {
                0 : {
                    items:1
                },
                480 : {
                    items:1
                },
                1024 : {
                    items:3.3
                },
                1400 : {
                    items:5.3
                },
                2500 : {
                    items:6
                }
            }
        });
        $('.categories_slider').owlCarousel({
            navText: ['<span class="arrow"></span>','<span class="arrow"></span>'],
            items:6.5,
            loop:true,
            nav:true,
            dots:false,
            mouseDrag:false,
            stagePadding:100,
            smartSpeed:1200,
            autoWidth:true,
            center:true,
            responsive : {
                0 : {
                    margin:15,
                },
                1024 : {
                    margin:20,
                },
                1366 : {
                    margin:40,
                }
            }
        });
    });

if($(window).width() <= 768) {
    $('.featured_tablist .tablist').addClass('owl-carousel');
    $('.featured_tablist .tablist').addClass('owl-theme');
    $('.featured_tablist .tablist li').addClass('item');
    $('.featured_tablist .tablist').owlCarousel({
        margin: 0,
        loop: false,
        autoWidth: true,
        mouseDrag:true,
        items: 2.5,
        nav: false,
        dots:false,
        autoplay: false
    }) 
    

}
$(window).scroll(function() {
    var windscroll = $(window).scrollTop();
    if (windscroll >= 100) {
        $('.articles').each(function(index,e) {
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
if($(window).width() >= 768) {
  // alert(1234);
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();

        if (scroll >= 160) {
            $(".featured_tablist").addClass('sticky-nav');
        } else {
            $(".featured_tablist").removeClass('sticky-nav');
        }
    });

}
$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 160) {
        $(".editor_socio").addClass('sticky-nav');
    } else {
        $(".editor_socio").removeClass('sticky-nav');
    }
});
