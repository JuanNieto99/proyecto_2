$(document).ready(function(){

	// MOSTRANDO Y OCULTANDO MENU
	$('#button-menu').click(function(){
		if($('#button-menu').attr('class') == 'fa fa-bars' ){

		$('.navegacion').css({'width':'100%', 'background':'#fff'}); // Mostramos al fondo transparente
			$('#button-menu').removeClass('fa fa-bars').addClass('fa fa-close  '); // Agregamos el icono X
			$('.navegacion .menu').css({'left':'0px'}); // Mostramos el menu
		 
		 		//para abiri el menu
			// document.getElementById("MyID").className =
	  		//document.getElementById("MyID").className
	  		//  .replace(new RegExp('(?:^|\\s)'+ 'col-lg-2' + '(?:\\s|$)'), ' ');

		} else{

			$('.navegacion').css({'width':'0%', 'background':'#fff'}); // Ocultamos el fonto transparente
			$('#button-menu').removeClass('fa fa-close').addClass('fa fa-bars'); // Agregamos el icono del Menu
			$('.navegacion .submenu').css({'left':'-320px'}); // Ocultamos los submenus
			$('.navegacion .menu').css({'left':'-320px'}); // Ocultamos el Menu 
		 	//para esconder el menu
			// document.getElementById("menu_espacio").className =
   			// document.getElementById("menu_espacio").className.replace(/\bcol-lg-2\b/,'');


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

		$(this).parent().css({'left':'-320px'}); // Ocultamos el submenu

	});

	$('#button-menu').click();

});