/**
 * hecho por slayerfat, dudas o sugerencias ya saben donde estoy.
 *
 * chequeo y operaciones relacionadas con ajax
 * para el campo cedula.
 *
 * version mejorada para actualizar.
 */
$(function(){
	$.ajax({
		url: '../java/validacionCedula.js',
		type: 'POST',
		dataType: 'script'
	});
	var cedula = new Object();
	cedula.original = $('#cedula').val();
	$('#cedula').on('change', function(){
		cedula.cambio = $(this).val();
		if (cedula.original === cedula.cambio){
			$('#cedula_chequeo_adicional').empty();
			$('#cedula_chequeo').empty();
      $('#form input, #form select, #form textarea').each(function(){
        $(this).parent().removeClass('has-error');
        $(this).prop('disabled', false);
      });
		}else if ( validacionCedula(cedula.cambio) ) {
			$("#cedula_chequeo").empty();
			$.ajax({
				url: '../java/ajax/general/cedula.php',
				type: 'POST',
				data: {cedula:cedula.cambio},
				success: function (datos){
					$('#cedula_chequeo').empty();
					//se comprueba si es valido o no por
					//medio del data-disponible
					//true si esta disponible, falso si no.
					var disponible = $(datos+'#disponible').data('disponible');
					if (disponible === true) {
						$('#cedula_chequeo_adicional').empty();
						$('#form input, #form select, #form textarea').each(function(){
							$(this).parent().removeClass('has-error');
              $(this).prop('disabled', false);
						});
					}else{
						$('#form input, #form select, #form textarea').each(function(){
							$(this).parent().addClass('has-error');
							$(this).prop('disabled', true);
						});
						$('#cedula').prop('disabled', false);
						$('#cedula_chequeo').html(datos);
						$('#cedula_chequeo_adicional').html('para continuar con el registro especifique otra cedula o consulte la ya existente.');
					};
				},
			});
		}else{
			$('#submit').prop('disabled', true);
			$('#submitDos').prop('disabled', true);
		};
	});
});
