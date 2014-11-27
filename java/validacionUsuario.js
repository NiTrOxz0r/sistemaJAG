/**
 * @author [Alejandro Granadillo]
 * [validacionUsuario se hizo con la idea de modificar
 * especificamente al formulario de consulta de alumno,
 * porque la otra funcion requeria muchas variables]
 * @return {boolean} regresa falso si algun campo es incorrecto
 *
 * @version 1.2
 */
function validacionUsuario(){
	//estatus:
	var estatus = false;
	//datos del formulario
	var seudonimo = document.getElementById('seudonimo').value.replace(/^\s+|\s+$/g, '');
	if ( document.getElementById("clave") != null) {
		var clave = document.getElementById("clave").value.replace(/^\s+|\s+$/g, '');
	} else{
		var clave = false;
	};
	if ( document.getElementById("cod_tipo_usr") != null) {
		var cod_tipo_usr = document.getElementById("cod_tipo_usr").value.replace(/^\s+|\s+$/g, '');
	} else{
		var cod_tipo_usr = false;
	};

	//chequeos
	//seudonimo:
	if ( seudonimo == "") {
		$('#seudonimo').parent().addClass('has-error');
		$("#seudonimo_chequeo").html('este campo no puede estar vacio.');
		return false;
	}else if ( seudonimo.length > 20 ) {
		$('#seudonimo').parent().addClass('has-error');
		$("#seudonimo_chequeo").html('Seudonimo incorrecto, necesita ser un maximo de 20 caracteres');
		return false;
	}else if ( seudonimo.length < 3  ) {
		$('#seudonimo').parent().addClass('has-error');
		$("#seudonimo_chequeo").html('Seudonimo incorrecto, necesita ser al menos 3 caracteres');
		return false;
	}else{
		$('#seudonimo').parent().removeClass('has-error').addClass('has-success');
		$("#seudonimo_chequeo").html('Seudonimo parece correcto!');
		estatus = true;
	}
	//clave:
	if (clave === false) {
		$("#clave_chequeo").html('Especifique su contrase&ntilde;a');
		estatus = true;
	}else if ( clave == "" ) {
		$('#clave').parent().addClass('has-error');
		$("#clave_chequeo").html('este campo no puede estar vacio.');
		return false;
	}else if ( clave.length < 6) {
		$('#clave').parent().addClass('has-error');
		$("#clave_chequeo").html('Su clave no deberia ser menor a 6 caracteres');
		return false;
	}else if ( clave.length > 15 ) {
		$('#clave').parent().addClass('has-error');
		$("#clave_chequeo").html('Su clave no deberia ser mayor a 15 caracteres');
		return false;
	}else{
		$('#clave').parent().removeClass('has-error').addClass('has-success');
		$("#clave_chequeo").html('todo parece estar en orden!');
		estatus = true;
	}
	//cod_tipo_usr (nivel_educativo):
	if ( cod_tipo_usr === '' ) {
		$("#cod_tipo_usr_chequeo").html('Por favor seleccione una opcion apropiada.');
		$("#cod_tipo_usr_titulo").css('color', 'red');
		return false;
	}else{
		$("#cod_tipo_usr_chequeo").html('');
		$("#cod_tipo_usr_titulo").css('color', 'green');
		estatus = true;
	}

	//una vez comprobado los campos
	//se procede a iniciar esta funcion:
	//(esto puede ser mejorado, pero funciona.)
	return go(estatus);

	function go (e){
		if (e) {
			return true;
		}else{
			return false;
		};
	}
}
