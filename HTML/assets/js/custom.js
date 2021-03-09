 function aos_init() {
    AOS.init({
      duration: 1000,
      easing: "ease-in-out",
      once: true,
      mirror: false
    });
  }
$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 50) {
        $(".header ").addClass("header-scrolled");
    } else {
        $(".header ").removeClass("header-scrolled");
    }
});