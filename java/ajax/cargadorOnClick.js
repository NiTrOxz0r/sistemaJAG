$(function(){
	$('.click').click(function(e){
		e.preventDefault();
		var enlace = $(this).attr('href');
		$('#contenido').html('');
		$('#contenido').load(enlace+" #blancoAjax");


		//ESTA IDEA FUNCIONA PERO NECESITA SER ESTUDIADA
		//MAS A FONDO:
		//POR AHORA SE REVIERTE A LO NORMAL!
		//http://www.w3schools.com/jsref/obj_location.asp
		// location.hash = enlace;
		//location.hash = $(this).attr('data-titulo');
	});
});
