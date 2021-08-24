
	// jQuery(document).ready(function($){
	// 	let slider = $('.course_slider');
	// 	slider.each(function () {
	// 	$(this).owlCarousel({
	// 		nav: true,
	// 		loop:false,
	// 		dots: false,
	// 		pagination: false,
	// 		margin: 25,
	// 		autoHeight: false,
	// 		stagePadding: 50,
	// 		responsive:{
	// 			0:{
	// 				items: 1,
	// 				stagePadding: 0,
	// 				margin: 30,
	// 			},
	// 			767:{
	// 				items: 3,
	// 				stagePadding: 25,
	// 			},
	// 			1000:{
	// 				items: 3,
	// 			}
	// 		}
	// 		});
	// 	});
	// });
	$(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 10) {
            $("body").addClass("header_fixed");
        } else {
            $("body").removeClass("header_fixed");
        }
    });
	$(document).ready(function(){
        $(".overlay").click(function(){
            $("body").removeClass("shared");
        });
        $(".sharing").click(function () {
            $("body").toggleClass('shared');
        });
        $(".filter-button").click(function () {
            $("body").toggleClass('filterOpened');
        });
		$(".home-button").click(function () {
            $("body").toggleClass('menuOpened');
        });
        $(".overlay").click(function(){
	    $("body").removeClass("menuOpened");
	    });
        // $('.nav-tabs-wrapper .nav-tabs').owlCarousel({
        //     navText: ['<span class="arrow"></span>','<span class="arrow"></span>'],
        //     margin:0,
        //     loop:false,
        //     nav:true,
        //     dots:false,
        //     mouseDrag:false,
        //     smartSpeed:1200,
        //     autoWidth:true,
        //     autoplay:true,
        //     autoplayHoverPause:true,
        //     merge:true,
        //     responsive : {
        //         320 : {
        //             dots:true,
        //         },
        //         768 : {
        //         },
        //         1024 : {
        //         },
        //         1400 : {
                    
        //         },
        //     }
        // });
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
            autoplay:true,
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
            loop:true,
            nav:false,
            dots:false,
            mouseDrag:false,
            stagePadding: 100,
            smartSpeed:600,
            autoWidth:true,
            autoplay:true,
            center:true,
            autoplayHoverPause:true,
            merge:true,
            responsive : {
                0 : {
                    items:1,
                },
                480 : {
                    items:1,
                },
                1024 : {
                    items:3.3,
                },
                1400 : {
                    items:5.3,
                },
                2500 : {
                    items:6,
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