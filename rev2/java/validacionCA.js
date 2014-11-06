function validar(){
  var expRegced  = /^\d{0-9}$/;
  var cedula = document.getElementById("cedula");
  if ( !expRegced.exec(cedula.value) ) {
     document.getElementById("form").submit();
  }else{
    alert("la cedula no esta formateada correctamente, contacte al administrador");
  }
}

function limpiarform(){
//id del formulario
	alert("Limpiando");
	document.getElementById("form").reset();
}

//Hay dos manera de llamar un elemento de html, 1ero con el objeto padre document.getElementById
//2ndo siguiendo por el nombre del formulario más el nombre (name) no el id del elemento
//Objeto ventana, al cargar ejecuta algo.
window.onload = function()
{
	var botonEnviar;
	//1ero Para acceder a un elemento de un documento html
	//hacemos uso del objeto padre document

	//2ndo
	botonEnviar = document.form_alu.enviar_btn;
	botonEnviar.onclick = validar;

};