$(function(){
	$('.click').click(function(e){
		e.preventDefault();
		var enlace = $(this).attr('href');
		$('#contenido').html('');
		$('#contenido').load(enlace+" #blancoAjax");

		//http://www.w3schools.com/jsref/obj_location.asp
		location.hash = enlace;
	});
});   