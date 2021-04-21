
$(document).ready(function(){
   // alert("HELLO")
  // MOSTRANDO Y OCULTANDO MENU
  $('#menu-sidebar-menu li').removeClass('active');
  $('.border-menu, .mobile-nav-toggle').click(function(){
    // alert("CLICK")
    if($('.border-menu').attr('class') == 'bi bi-bars' ){
      $('.navegacion').removeClass('add-width'); 
      $('.navegacion').css({'width':'100%', 'background':'rgba(0,0,0,.5)'}); // Mostramos al fondo transparente
      $('.border-menu').removeClass('bi bi-bars').addClass('bi bi-close'); // Agregamos el icono X
      $('.navegacion .menu-back').css({'left':'-455px'}); // Ocultamos el Menu
      $('.navegacion .menu').css({'left':'0px'}); // Mostramos el menu

    } else{
      $('.navegacion').addClass('add-width'); 
      $('.navegacion').css({'width':'0%', 'background':'rgba(0,0,0,.0)'}); // Ocultamos el fonto transparente
      $('.border-menu').removeClass('fa fa-close').addClass('bi bi-bars'); // Agregamos el icono del Menu
      $('.navegacion .submenu').css({'left':'-455px'}); // Ocultamos los submenus
      $('.navegacion .menu-back').css({'left':'-10px'}); // Ocultamos el Menu
      $('.navegacion .menu').css({'left':'-10px'}); // Ocultamos el Menu

    }
  });

  // MOSTRANDO SUBMENU
  $('.navegacion .menu > .item-submenu a').click(function(){
    
    var positionMenu = $(this).parent().attr('menu'); // Buscamos el valor del atributo menu y lo guardamos en una variable
    console.log(positionMenu); 

    $('.item-submenu[menu='+positionMenu+'] .submenu').css({'left':'0px'}); // Mostramos El submenu correspondiente

  });

  // OCULTANDO SUBMENU
  $('.navegacion .submenu li.go-back').click(function(){

    $(this).parent().parent().css({'left':'-455px'}); // Ocultamos el submenu
    $(this).parent().css({'left':'-455px'}); // Ocultamos el submenu

  });

  $('.navegacion .menu li.title-menu svg').click(function(){
    // alert("CLOSE");
    $(this).parent().parent().parent().css({'left':'-455px'}); // Ocultamos el submenu
    $(this).parent().parent().css({'left':'-455px'}); // Ocultamos el submenu

  });
  $('.close-navigation').click(function(){
    // alert("CLOSE");
    $('.close-navigation').next().css({'left':'0'}); // Ocultamos el submenu
    $('.close-navigation').parent().css({'left':'-455px'}); // Ocultamos el submenu
    $('.navegacion').removeClass('add-width'); 

  });

  $('#close-navigation-header').click(function(e){
    $('.close-navigation').parent().css({'left':'-455px'}); // Ocultamos el submenu
    $('.close-navigation').parent().parent().css({'left':'-455px'}); // Ocultamos el submenu
    $('.navegacion').removeClass('add-width'); 
  });

});

  $(".scrollTo").on('click', function(e) {
     e.preventDefault();
     var target = $(this).attr('href');
     $('html, body').animate({
       scrollTop: ($(target).offset().top -170)
     });
  });


  
var elem = document.documentElement;
    window.isfullscreen = false;
    /* View in fullscreen */
    function openFullscreen() {
      if (elem.requestFullscreen) {
        elem.requestFullscreen();
      } else if (elem.webkitRequestFullscreen) { /* Safari */
        elem.webkitRequestFullscreen();
      } else if (elem.msRequestFullscreen) { /* IE11 */
        elem.msRequestFullscreen();
      }
    }

    /* Close fullscreen */
    function closeFullscreen() {
      if (document.exitFullscreen) {
        document.exitFullscreen();
      } else if (document.webkitExitFullscreen) { /* Safari */
        document.webkitExitFullscreen();
      } else if (document.msExitFullscreen) { /* IE11 */
        document.msExitFullscreen();
      }
    }

    $(document).on("click", ".vicon.vicon-fullscreen", function(){
        if(window.isfullscreen){
            closeFullscreen();
            window.isfullscreen = false;
        }else{
            openFullscreen();
            window.isfullscreen = true;
        }
    });
