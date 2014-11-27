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
	cedula.original = $('#cedula_escolar').val();
	$('#cedula_escolar').on('change', function(){
		cedula.cambio = $(this).val();
		if (cedula.original === cedula.cambio){
			$('#cedula_escolar_chequeo_adicional').empty();
			$('#cedula_escolar_chequeo').empty();
			$('#form input, #form select, #form textarea').each(function(){
				$(this).prop('disabled', false);
			});
		}else if ( validacionCedulaEscolar(cedula.cambio) ) {
			$("#cedula_escolar_chequeo").empty();
			$.ajax({
				url: '../java/ajax/alumno/cedulaEscolar.php',
				type: 'POST',
				data: {cedula_escolar:cedula.cambio},
				success: function (datos){
					$('#cedula_escolar_chequeo').empty();
					//se comprueba si es valido o no por
					//medio del data-disponible
					//true si esta disponible, falso si no.
					var disponible = $(datos+'#disponible').data('disponible');
					if (disponible === true) {
						$('#cedula_escolar_chequeo_adicional').empty();
						$('#form input, #form select, #form textarea').each(function(){
							$(this).prop('disabled', false);
						});
						// bloquea datos de representante:
						$('.bloquear').each(function(){
							$(this).prop('disabled', true);
						});
					}else{
						$('#form input, #form select, #form textarea').each(function(){
							$(this).prop('disabled', true);
						});
						$('#cedula_escolar').prop('disabled', false);
						$('.bloquear').each(function(){
							$(this).prop('disabled', true);
						});
						$('#cedula_escolar_chequeo').html(datos);
						$('#cedula_escolar_chequeo_adicional').html('para continuar con el registro especifique otra cedula o consulte la ya existente.');
					};
				},
			});
		}else{
			$("#cedula_escolar_chequeo").html('Favor introduzca cedula solo numeros sin caracteres especiales, EJ: 12345678');
			$("#cedula_escolar_titulo").css('color', 'red');
			$('#submitDos').prop('disabled', true);
		};
	});
});
