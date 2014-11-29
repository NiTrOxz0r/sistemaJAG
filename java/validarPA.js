function validarform(){
  var expRegced  = /^\d{0-9}$/;
  var cedula = document.getElementById("cedula_r");
  if ( !expRegced.exec(cedula.value) ) {
     document.getElementById("form").submit();
  }else{
    alert("la cedula no esta formateada correctamente, contacte al administrador");
  }
}


function limpiarform(){
  alert("Limpiando");
  document.getElementById("form").reset();
}



$(function()
{
  var botonEnviar, botonLimpiar;
  botonLimpiar = document.getElementById("limpiar");
  botonLimpiar.onclick = limpiarform;
  botonEnviar = document.form_repre.registrar;
  botonEnviar.onclick = validarform;

});
