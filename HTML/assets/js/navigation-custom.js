$(document).ready(function(){
   // alert("HELLO")
  // MOSTRANDO Y OCULTANDO MENU
  $('#button-menu').click(function(){
    // alert("CLICK")
    if($('#button-menu').attr('class') == 'bi bi-bars' ){

      $('.navegacion').css({'width':'100%', 'background':'rgba(0,0,0,.5)'}); // Mostramos al fondo transparente
      $('#button-menu').removeClass('bi bi-bars').addClass('bi bi-close'); // Agregamos el icono X
      $('.navegacion .menu').css({'left':'-370px'}); // Mostramos el menu

    } else{

      $('.navegacion').css({'width':'0%', 'background':'rgba(0,0,0,.0)'}); // Ocultamos el fonto transparente
      $('#button-menu').removeClass('fa fa-close').addClass('bi bi-bars'); // Agregamos el icono del Menu
      $('.navegacion .submenu').css({'left':'-370px'}); // Ocultamos los submenus
      $('.navegacion .menu').css({'left':'0px'}); // Ocultamos el Menu

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

    $(this).parent().css({'left':'-370px'}); // Ocultamos el submenu

  });

  $('.navegacion .menu li.title-menu svg').click(function(){
    // alert("CLOSE");
    $(this).parent().parent().css({'left':'-370px'}); // Ocultamos el submenu

  });

});