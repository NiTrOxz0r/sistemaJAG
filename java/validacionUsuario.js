
//se hizo con la idea de modificar especificamente
//al formulario de consulta de alumno
//porque la otra funcion requeria muchas variables
function validacionUsuario(){

	//estatus:
	var estatus = false;
	var espacios = '/^\s+$/';
	//datos del formulario
	var seudonimo = document.getElementById('seudonimo').value;
	var clave = document.getElementById("clave").value;
	seudonimo = seudonimo.replace(/^\s+|\s+$/g, '');
	clave = clave.replace(/^\s+|\s+$/g, '');

	//chequeos
	if ( clave == "" ) {
		document.getElementById("clave").focus();
		$("#clave_chequeo").html('este campo no puede </br> estar vacio');
		$("#clave_titulo").css('color', 'red');
		estatus = false;
	}else if ( seudonimo.length < 3 ) {
		document.getElementById("seudonimo").focus();
		$("#seudonimo_chequeo").html('por favor escojer un seudonimo </br>de mas de 3 letras.');
		$("#seudonimo_titulo").css('color', 'red');
		estatus = false;
	}else if ( seudonimo.length > 20 ) {
		document.getElementById("seudonimo").focus();
		$("#seudonimo_chequeo").html('El seudonimo es muy grande, por favor introducir un maximo de 20 caracteres.');
		$("#seudonimo_titulo").css('color', 'red');
		estatus = false;
	}else if ( seudonimo == "" ) {
		document.getElementById("seudonimo").focus();
		$("#seudonimo_chequeo").html('este campo no puede </br> estar vacio.');
		$("#seudonimo_titulo").css('color', 'red');
		estatus = false;
	}else if ( clave.length < 6) {
		$("#clave_chequeo").html('Por favor introduzca un minimo de 6 caracteres.');
		$("#clave_titulo").css('color', 'red');
		estatus = false;
	}else if ( clave.length > 64 ) {
		$("#clave_chequeo").html('Por favor introduzca hasta un maximo de 64 caracteres.');
		$("#clave_titulo").css('color', 'red');
		estatus = false;
	}else{
		$("#seudonimo_chequeo").html('');
		$("#seudonimo_titulo").css('color', 'green');
		$("#clave_chequeo").html('');
		$("#clave_titulo").css('color', 'green');
		estatus = true;
	}
		// if ( espacios.exec(seudonimo.value) ) {
	// 	document.getElementById("seudonimo").focus();
	// 	$("#seudonimo_chequeo").html('Solo un seudonimo sin espacios </br> ej: usuario321, pepe_123');
	// 	estatus = false;
	// }else{
	// 	estatus = true;
	// }
	return go(estatus);

	function go (e){
		if (e) {
			return true;
		}else{
			return false;
		};
	}
}