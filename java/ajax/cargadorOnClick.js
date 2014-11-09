$(function(){
	$('.click').click(function(e){
		e.preventDefault();
		var enlace = $(this).attr('href');
		$('#contenido').html('');
		$('#contenido').load(enlace);
	});
});   