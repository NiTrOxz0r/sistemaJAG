
//se hizo con la idea de modificar especificamente
//al formulario de consulta de alumno
//porque la otra funcion requeria muchas variables
function validarUsuario(){
	var seudonimo = document.getElementById('seudonimo').value;
	var clave = document.getElementById("clave").value;
	seudonimo = seudonimo.replace(/^\s+|\s+$/g, '');
	clave = clave.replace(/^\s+|\s+$/g, '');
	console.log(clave.length);
	if ( seudonimo == "" ) {
		document.getElementById("seudonimo").focus();
		alert("campo seudonimo no puede estar vacio");
		return false;
	}else{
		return true;
	}
	if ( seudonimo.length == 8 ) {
		 return true;
	}else{
		alert("Por favor introduzca seudonimo solo con numeros a un maximo de 8, EJ: 12345678");
		return false;
	}
	if ( clave == "" ) {
		document.getElementById("clave").focus();
		alert("campo clave no puede estar vacio");
		return false;
	}else{
		return true;
	}
	if ( clave.length > 1 ) {
		alert("Por favor introduzca clave solo con numeros a un maximo de 8, EJ: 12345678");
		return false;
	}else{
		return true;
	}
}