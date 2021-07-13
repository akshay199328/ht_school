<footer class="footer-wrapper">
     <div class="footer-copy">
          <div class="column">
               <ul class="sitemap">
                    <li><a href="#!">Home</a></li>
                    <li><a href="#!">Dummy Partner's</a></li>
                    <li><a href="#!">Dummy School Dashboard</a></li>
                    <li><a href="#!">Dummy Instructions</a></li>
                    <li><a href="#!">Dummy Coding for Cause</a></li>
                    <li><a href="#!">Dummy Blogs</a></li>
               </ul>
          </div>
          <div class="column">
               <ul class="sitemap">
                    <li><a href="#!">About Codeathon</a></li>
                    <li><a href="#!">Register for learning modules</a></li>
                    <li><a href="#!">Login</a></li>
                    <li><a href="#!">Terms and Conditions</a></li>
               </ul>
          </div>
          <div class="column info">
               <h3 class="title">Contact Info</h3>
               <p>HT House, 18-20, Kasturba Gandhi Marg, New Delhi – 110001</p>
               <p>+91 – 11 – 60004242 (09.00am – 06.00pm, Mon-Sat)</p>
               <p>support@htcodeathon.com</p>
          </div>
     </div>
</footer>

    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".home-button").click(function () {
                $("body").toggleClass('menuOpened');
            });
            // $("body").click(function(){
            //     $("body").removeClass("menuOpened");
            // });
        });
            // $('.home-button').click(function(){
            //     $('.home-button').not("body").removeClass('menuOpened');
            //     $("body").toggleClass('menuOpened');
            //  });
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            if (scroll >= 10) {
                $(".header-wrapper").addClass("fixed");
            } else {
                $(".header-wrapper").removeClass("fixed");
            }
        });

        

      $('.home_slider').owlCarousel({
            margin:0,
            loop:true,
            nav:true,
            mouseDrag:false,
            stagePadding:0,
            smartSpeed:1900,
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
     $('.about_slider').owlCarousel({
          merge:true,
          loop:true,
          margin:22,
          nav:true,
          video:true,
          lazyLoad:true,
          center:true,
          dots:false,
          // autoWidth:true,
          responsive : {
               0 : {
                    items:2,
               },
               // breakpoint from 480 up
               480 : {
                    items:2,
               },
               // breakpoint from 768 up
               768 : {
                    items:3,
               }
          }
     });
     $('.says_slider').owlCarousel({
          merge:true,
          loop:true,
          margin:0,
          nav:true,
          video:true,
          lazyLoad:true,
          center:true,
          // autoWidth:true,
          responsive : {
               0 : {
                    items:2,
               },
               // breakpoint from 480 up
               480 : {
                    items:2,
               },
               // breakpoint from 768 up
               768 : {
                    items:3,
               }
          }
     });
     $('.school_slider').owlCarousel({
          margin:50,
          loop:true,
          nav:true,
          dots:true,
          mouseDrag:false,
          stagePadding:0,
          smartSpeed:1900,
          autoHeight: true,
          responsive : {
               0 : {
                    items:2,
               },
               // breakpoint from 480 up
               480 : {
                    items:2,
               },
               // breakpoint from 768 up
               768 : {
                    items:5,
               }
          }
     });
     $('.partners_slider').owlCarousel({
          margin:0,
          loop:true,
          nav:true,
          dots:true,
          mouseDrag:false,
          stagePadding:0,
          smartSpeed:800,
          responsive : {
               0 : {
                    items:2,
               },
               // breakpoint from 480 up
               480 : {
                    items:2,
               },
               // breakpoint from 768 up
               768 : {
                    items:5,
               }
          }
     });
      $('.blog_slider').owlCarousel({
            margin:0,
            loop:true,
            nav:true,
            mouseDrag:false,
            dots:false,
            stagePadding:0,
            smartSpeed:800,
            responsive : {
                0 : {
                    items:2,
                },
                // breakpoint from 480 up
                480 : {
                    items:2,
                },
                // breakpoint from 768 up
                768 : {
                    items:4,
                }
            }
        });
        if($(window).width() <= 767) {
            $('.property-wrapper .listing .copy').addClass('property-slider owl-carousel owl-theme');
        }
        $('.property-slider').owlCarousel({
            margin:10,
            loop:false,
            nav:true,
            mouseDrag:true,
            stagePadding:10,
            smartSpeed:800,
            autoWidth:true,
            // startPosition:0,
        });
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
