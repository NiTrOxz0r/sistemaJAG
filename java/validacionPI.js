
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
	//datos personales
	var cedula = document.getElementById("cedula").value;
	var cedulaChequeo = new RegExp("/^\d{8}$/");

	// cedula:
	if (cedula == "") {
		document.getElementById("cedula").focus();
		$("#cedula_chequeo").html('este campo no puede </br> estar vacio');
		$("#cedula_titulo").css('color', 'red');
		estatus = false;
	}else if(cedula.length < 6){
		document.getElementById("cedula").focus();
		$("#cedula_chequeo").html('cedula no puede ser menor a 6 caracteres');
		$("#cedula_titulo").css('color', 'red');
		estatus = false;
	}else if(cedula.length > 8){
		document.getElementById("cedula").focus();
		$("#cedula_chequeo").html('cedula no puede ser mayor a 8 caracteres');
		$("#cedula_titulo").css('color', 'red');
		estatus = false;
	}else if( cedulaChequeo.test(cedula) ){
		document.getElementById("cedula").focus();
		$("#cedula_chequeo").html('Favor introduzca cedula solo numeros sin caracteres especiales, EJ: 12345678');
		$("#cedula_titulo").css('color', 'red');
		estatus = false;
	};
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
	}else if ( clave.length > 15 ) {
		$("#clave_chequeo").html('Por favor introduzca hasta un maximo de 15 caracteres.');
		$("#clave_titulo").css('color', 'red');
		estatus = false;
	}else if ( nacionalidad.length > 15 ) {
		$("#nacionalidad_chequeo").html('Por favor introduzca hasta un maximo de 15 caracteres.');
		$("#nacionalidad_titulo").css('color', 'red');
		estatus = false;
	}else{
		$("#seudonimo_chequeo").html('');
		$("#seudonimo_titulo").css('color', 'green');
		$("#clave_chequeo").html('');
		$("#clave_titulo").css('color', 'green');
		estatus = true;
	}
	
	return go(estatus);

	function go (e){
		if (e) {
			return true;
		}else{
			return false;
		};
	}
}