jQuery(document).ready(function(){
   // alert("HELLO")
  // MOSTRANDO Y OCULTANDO MENU
  jQuery('.border-menu').click(function(){
    // alert("CLICK")
    if(jQuery('.border-menu').attr('class') == 'bi bi-bars' ){

      jQuery('.navegacion').css({'width':'100%', 'background':'rgba(0,0,0,.5)'}); // Mostramos al fondo transparente
      jQuery('.border-menu').removeClass('bi bi-bars').addClass('bi bi-close'); // Agregamos el icono X
      jQuery('.navegacion .menu-back').css({'left':'-445px'}); // Ocultamos el Menu
      jQuery('.navegacion .menu').css({'left':'-445px'}); // Mostramos el menu

    } else{

      jQuery('.navegacion').css({'width':'0%', 'background':'rgba(0,0,0,.0)'}); // Ocultamos el fonto transparente
      jQuery('.border-menu').removeClass('fa fa-close').addClass('bi bi-bars'); // Agregamos el icono del Menu
      jQuery('.navegacion .submenu').css({'left':'-445px'}); // Ocultamos los submenus
      jQuery('.navegacion .menu-back').css({'left':'0px'}); // Ocultamos el Menu
      jQuery('.navegacion .menu').css({'left':'0px'}); // Ocultamos el Menu

    }
  });

  // MOSTRANDO SUBMENU
  jQuery('.navegacion .menu > .item-submenu a').click(function(){
    
    var positionMenu = jQuery(this).parent().attr('menu'); // Buscamos el valor del atributo menu y lo guardamos en una variable
    console.log(positionMenu); 

    jQuery('.item-submenu[menu='+positionMenu+'] .submenu').css({'left':'0px'}); // Mostramos El submenu correspondiente

  });

  // OCULTANDO SUBMENU
  jQuery('.navegacion .submenu li.go-back').click(function(){

    jQuery(this).parent().parent().css({'left':'-445px'}); // Ocultamos el submenu
    jQuery(this).parent().css({'left':'-445px'}); // Ocultamos el submenu

  });

  jQuery('.navegacion .menu li.title-menu svg').click(function(){
    // alert("CLOSE");
    jQuery(this).parent().parent().parent().css({'left':'-445px'}); // Ocultamos el submenu
    jQuery(this).parent().parent().css({'left':'-445px'}); // Ocultamos el submenu

  });
  jQuery('.menu #menu-sidebar-menu li:first-child::after').click(function(){
    alert("CLOSE");
    jQuery(this).parent().parent().parent().parent().css({'left':'-445px'}); // Ocultamos el submenu
    jQuery(this).parent().parent().parent().parent().parent().css({'left':'-445px'}); // Ocultamos el submenu

  });

});