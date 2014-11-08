
//se hizo con la idea de modificar especificamente
//al formulario de consulta de alumno
//porque la otra funcion requeria muchas variables
function validacionUsuario(){

	//estatus:
	var estatus = false;
	//datos del formulario
	var seudonimo = document.getElementById('seudonimo').value;
	var clave = document.getElementById("clave").value;
	seudonimo = seudonimo.replace(/^\s+|\s+$/g, '');
	clave = clave.replace(/^\s+|\s+$/g, '');

	//chequeos
	if ( seudonimo == "" ) {
		document.getElementById("seudonimo").focus();
		$("#seudonimo_chequeo").html('este campo no puede </br> estar vacio');
		estatus = false;
	}else{
		estatus = true;
	}
	if ( clave == "" ) {
		document.getElementById("clave").focus();
		$("#clave_chequeo").html('este campo no puede </br> estar vacio');
		estatus = false;
	}else{
		estatus = true;
	}
	if ( clave.length > 64 || clave.length < 8) {
		$("#clave_chequeo").html('Por favor introduzca hasta </br> un maximo de 64 caracteres </br> y un minimo de 8');
		estatus = false;
	}else{
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