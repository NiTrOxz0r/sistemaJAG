/**
 * @author Erick Zerpa.
 * @author Andres Leotur.
 *
 * limpiado con ojivas nucleares por
 * @author Alejandro Granadillo.
 *
 * @return boolean [regresa verdadero si los campos son validos.]
 * @see alumno/form_reg_A.php
 *
 * @version 2.2
 */
function validacionAlumno(){
  // expresiones regulares:
  var expRegpnom     = /^[a-zA-ZÑñÁáÉéÍíÓóÚú'-\s]{0,20}$/;
  // agarra un string que tenga al menos aaa ej: pedrooo
  var expRegRepetido = /(.)\1{2,}/;
  // agarra lo que no sea numeros
  var expRegced      = /^(?:\+|-)?\d+$/;
  // solo numeros, exactamente 11
  var expRegtlf      = /^\d{11}$/;
  // ver validacionPI.js
  var emailChequeo = /^[0-9a-zA-Z-_\$#]+@[0-9a-zA-Z-_\$#]+\.[a-zA-Z]{2,5}/;
  // variables de control:
  var verificar = false;
  var n; // para el parse a enteros

  // datos de formulario
  var emailChequeo = /^[0-9a-zA-Z-_\$#]+@[0-9a-zA-Z-_\$#]+\.[a-zA-Z]{2,5}/;
  var cedula = document.getElementById("cedula").value.replace(/^\s+|\s+$/g, '');
  var cedula_escolar = document.getElementById("cedula_escolar").value.replace(/^\s+|\s+$/g, '');
  var nacionalidad = document.getElementById("nacionalidad").value.replace(/^\s+|\s+$/g, '');
  var p_nombre = document.getElementById("p_nombre").value.replace(/^\s+|\s+$/g, '');
  var s_nombre = document.getElementById("s_nombre").value.replace(/^\s+|\s+$/g, '');
  var p_apellido = document.getElementById("p_apellido").value.replace(/^\s+|\s+$/g, '');
  var s_apellido = document.getElementById("s_apellido").value.replace(/^\s+|\s+$/g, '');
  var sexo = document.getElementById("sexo").value.replace(/^\s+|\s+$/g, '');
  var fec_nac = document.getElementById("fec_nac").value.replace(/^\s+|\s+$/g, '');
  var estado = document.getElementById("cod_est").value.replace(/^\s+|\s+$/g, '');
  var municipio = document.getElementById("cod_mun").value.replace(/^\s+|\s+$/g, '');
  var parroquia = document.getElementById("cod_parro").value.replace(/^\s+|\s+$/g, '');
  var direcc = document.getElementById("direcc").value.replace(/^\s+|\s+$/g, '');
  var repitiente = document.getElementById("repitiente").value.replace(/^\s+|\s+$/g, '');
  var lugar_nac = document.getElementById("lugar_nac").value.replace(/^\s+|\s+$/g, '');
  var telefono = document.getElementById("telefono").value.replace(/^\s+|\s+$/g, '');
  var telefono_otro = document.getElementById("telefono_otro").value.replace(/^\s+|\s+$/g, '');
  var acta_num_part_nac = document.getElementById("acta_num_part_nac").value.replace(/^\s+|\s+$/g, '');
  var acta_folio_num_part_nac = document.getElementById("acta_folio_num_part_nac").value.replace(/^\s+|\s+$/g, '');
  var plantel_procedencia = document.getElementById("plantel_procedencia").value.replace(/^\s+|\s+$/g, '');
  var vacuna = document.getElementById("vacuna").value.replace(/^\s+|\s+$/g, '');
  var discapacidad = document.getElementById("discapacidad").value.replace(/^\s+|\s+$/g, '');
  var altura = document.getElementById("altura").value.replace(/^\s+|\s+$/g, '');
  var peso = document.getElementById("peso").value.replace(/^\s+|\s+$/g, '');
  var camisa = document.getElementById("camisa").value.replace(/^\s+|\s+$/g, '');
  var pantalon = document.getElementById("pantalon").value.replace(/^\s+|\s+$/g, '');
  var zapato = document.getElementById("zapato").value.replace(/^\s+|\s+$/g, '');
  var curso = document.getElementById("curso").value.replace(/^\s+|\s+$/g, '');
// chequeos como tal:
// cedula
  n = parseInt(cedula);
  if (cedula === "") {
    $('#cedula').parent().addClass('has-error');
    $("#cedula_chequeo").html('este campo no puede estar vacio.');
    return false;
  }else if (!expRegced.exec(cedula)) {
    $("#cedula_chequeo").html('Favor introduzca cedula solo numeros sin caracteres especiales, EJ: 12345678');
    $('#cedula').parent().addClass('has-error');
    return false;
  }else if(cedula.length < 6){
    $('#cedula').parent().addClass('has-error');
    $("#cedula_chequeo").html('Este campo no debe ser menor a 6 caracteres');
    return false;
  }else if(cedula.length > 8){
    $('#cedula').parent().addClass('has-error');
    $("#cedula_chequeo").html('Este campo no debe ser mayor a 8 caracteres');
    return false;
  }else{
    if (n < 100000) {
      $('#cedula').parent().addClass('has-error');
      $("#cedula_chequeo").html('Favor verifique este campo');
      return false;
    }else{
      $('#cedula').parent().removeClass('has-error').addClass('has-success');
      $("#cedula_chequeo").html('&nbsp;');
      verificar = true;
    }
  }
// cedula_escolar
  n = parseInt(cedula_escolar);
  if (cedula_escolar === "") {
    $('#cedula_escolar').parent().addClass('has-error');
    $("#cedula_escolar_chequeo").html('este campo no puede estar vacio.');
    return false;
  }else if (!expRegced.exec(cedula_escolar)) {
    $("#cedula_escolar_chequeo").html('Favor introduzca cedula_escolar solo numeros sin caracteres especiales, EJ: 1234567890');
    $('#cedula_escolar').parent().addClass('has-error');
    return false;
  }else if(cedula_escolar.length != 10){
    $('#cedula_escolar').parent().addClass('has-error');
    $("#cedula_escolar_chequeo").html('Este campo debe contener 10 caracteres, EJ: 1234567890');
    return false;
  }else{
    if (n < 100000) {
      $('#cedula_escolar').parent().addClass('has-error');
      $("#cedula_escolar_chequeo").html('Favor verifique este campo');
      return false;
    }else{
      $('#cedula_escolar').parent().removeClass('has-error').addClass('has-success');
      $("#cedula_escolar_chequeo").html('&nbsp;');
      verificar = true;
    }
  }
// acta numero partida nacimiento
// a espera de saber formato exacto
  if(isNaN(acta_num_part_nac)) {
    $("#acta_num_part_nac_chequeo").html('este campo debe ser solo numeros');
    $('#acta_num_part_nac').parent().addClass('has-error');
    return false;
  }else if(acta_num_part_nac.length > 20) {
    $("#acta_num_part_nac_chequeo").html('este campo debe tener 20 digitos');
    $('#acta_num_part_nac').parent().addClass('has-error');
    return false;
  }else{
    $("#acta_num_part_nac_chequeo").html('&nbsp;');
    $('#acta_num_part_nac').parent().removeClass('has-error').addClass('has-success');
    verificar = true;
  }
// acta folio partida nacimiento
// a espera de saber formato exacto
  if(isNaN(acta_folio_num_part_nac)) {
    $("#acta_folio_num_part_nac_chequeo").html('este campo debe ser solo numeros');
    $('#acta_folio_num_part_nac').parent().addClass('has-error');
    return false;
  }else if(acta_folio_num_part_nac.length > 20) {
    $("#acta_folio_num_part_nac_chequeo").html('este campo debe tener 20 digitos');
    $('#acta_folio_num_part_nac').parent().addClass('has-error');
    return false;
  }else{
    $("#acta_folio_num_part_nac_chequeo").html('&nbsp;');
    $('#acta_folio_num_part_nac').parent().removeClass('has-error').addClass('has-success');
    verificar = true;
  }
// nacionalidad
  if ( nacionalidad != 'v' && nacionalidad != 'e' ) {
    $("#nacionalidad_chequeo").html('Algo parece estar mal. el sistema funciona mejor con firefox o chrome.');
    $('#nacionalidad').parent().addClass('has-error');
    return false;
  }else{
    $('#nacionalidad').parent().removeClass('has-error').addClass('has-success');
    $("#nacionalidad_chequeo").html('&nbsp;');
    verificar = true;
  }
// primer nombre
  if (p_nombre === "") {
    $("#p_nombre_chequeo").html('este campo no puede estar vacio');
    $('#p_nombre').parent().addClass('has-error');
    return false;
  }else if (!expRegpnom.exec(p_nombre)) {
    $("#p_nombre_chequeo").html('Favor introduzca en este campo Letras sin numeros o caracteres especiales EJ: 19?=;@*');
    $('#p_nombre').parent().addClass('has-error');
    return false;
  }else if (expRegRepetido.exec(p_nombre)) {
    $("#p_nombre_chequeo").html('Verifique este campo, muchos caracteres repetidos');
    $('#p_nombre').parent().addClass('has-error');
    return false;
  }else if (p_nombre.length > 20){
    $("#p_nombre_chequeo").html('este campo no puede ser mayor a 20 caracteres');
    $('#p_nombre').parent().addClass('has-error');
    return false;
  }else{
    $("#p_nombre_chequeo").html('&nbsp;');
    $('#p_nombre').parent().removeClass('has-error').addClass('has-success');
    $('#p_nombre').val( p_nombre.toUpperCase() );
    verificar = true;
  }
// segundo nobmre
  if (!expRegpnom.exec(s_nombre) && s_nombre != "") {
    $("#s_nombre_chequeo").html('Favor introduzca en este campo Letras sin numeros o caracteres especiales EJ: 19?=;@*');
    $('#s_nombre').parent().addClass('has-error');
    return false;
  }else if(s_nombre.length > 20){
    $("#s_nombre_chequeo").html('este campo no puede ser mayor a 20 caracteres');
    $('#s_nombre').parent().addClass('has-error');
    return false;
  }else if (expRegRepetido.exec(s_nombre)) {
    $("#s_nombre_chequeo").html('Verifique este campo, muchos caracteres repetidos');
    $('#s_nombre').parent().addClass('has-error');
    return false;
  }else if (expRegRepetido.exec(s_nombre)) {
    $("#s_nombre_chequeo").html('Verifique este campo, muchos caracteres repetidos');
    $('#s_nombre').parent().addClass('has-error');
    return false;
  }else{
    $("#s_nombre_chequeo").html('&nbsp;');
    $('#s_nombre').parent().removeClass('has-error').addClass('has-success');
    $('#s_nombre').val( s_nombre.toUpperCase() );
    verificar = true;
  }
// primer apellido
  if (p_apellido === "") {
    $("#p_apellido_chequeo").html('este campo no puede estar vacio');
    $('#p_apellido').parent().addClass('has-error');
    return false;
  }else if (!expRegpnom.exec(p_apellido)) {
    $("#p_apellido_chequeo").html('Favor introduzca en este campo Letras sin numeros o caracteres especiales EJ: 19?=;@*');
    $('#p_apellido').parent().addClass('has-error');
    return false;
  }else if(p_apellido.length > 20){
    $("#p_apellido_chequeo").html('este campo no puede ser mayor a 20 caracteres');
    $('#p_apellido').parent().addClass('has-error');
    return false;
  }else if (expRegRepetido.exec(p_apellido)) {
    $("#p_apellido_chequeo").html('Verifique este campo, muchos caracteres repetidos');
    $('#p_apellido').parent().addClass('has-error');
    return false;
  }else{
    $("#p_apellido_chequeo").html('&nbsp;');
    $('#p_apellido').parent().removeClass('has-error').addClass('has-success');
    $('#p_apellido').val( p_apellido.toUpperCase() );
    verificar = true;
  }
// segundo apellido
  if(s_apellido.length > 20){
    $("#s_apellido_chequeo").html('este campo no puede ser mayor a 20 caracteres');
    $('#s_apellido').parent().addClass('has-error');
    return false;
  }else if (!expRegpnom.exec(s_apellido)) {
    $("#s_apellido_chequeo").html('Favor introduzca en este campo Letras sin numeros o caracteres especiales EJ: 19?=;@*');
    $('#s_apellido').parent().addClass('has-error');
    return false;
  }else if (expRegRepetido.exec(s_apellido)) {
    $("#s_apellido_chequeo").html('Verifique este campo, muchos caracteres repetidos');
    $('#s_apellido').parent().addClass('has-error');
    return false;
  }else{
    $("#s_apellido_chequeo").html('&nbsp;');
    $('#s_apellido').parent().removeClass('has-error').addClass('has-success');
    $('#s_apellido').val( s_apellido.toUpperCase() );
    verificar = true;
  }
// logar de nacimiento
  if (lugar_nac.length > 50) {
    $("#lugar_nac_chequeo").html('este campo no puede ser mayor a 50 caracteres');
    $('#lugar_nac').parent().addClass('has-error');
    return false;
  }else if (expRegRepetido.exec(lugar_nac)) {
    $("#lugar_nac_chequeo").html('Verifique este campo, muchos caracteres repetidos');
    $('#lugar_nac').parent().addClass('has-error');
    return false;
  }else{
    $("#lugar_nac_chequeo").html('&nbsp;');
    $('#lugar_nac').parent().removeClass('has-error').addClass('has-success');
    $('#lugar_nac').val( lugar_nac.toUpperCase() );
    estatus = true;
  }
// fecha de nacimiento
// desabilitadas algunas cosoas por incompatibilidad
// con libreria de calendario.
// ver validacionPI.js
  if (fec_nac == "") {
    $("#fec_nac_chequeo").html('este campo no puede estar vacio');
    // $('#fec_nac').parent().addClass('has-error');
    return false;
  }else if(fec_nac.length > 20){
    $("#fec_nac_chequeo").html('este campo no puede ser mayor a 20 caracteres');
    // $('#fec_nac').parent().addClass('has-error');
    return false;
  }else if( !/[\d]{4}[-]{1}[\d]{2}[-]{1}[\d]{2}/.test(fec_nac) ){
    $("#fec_nac_chequeo").html('Favor introduzca en este campo el año en el siguiente formato: AAAA-MM-DD EJ: 1961-12-31');
    // $('#fec_nac').parent().addClass('has-error');
    return false;
  }else{
    $("#fec_nac_chequeo").html('&nbsp;');
    // $('#fec_nac').parent().removeClass('has-error').addClass('has-success');
    verificar = true;
  }
// sexo
  if ( sexo != '0' && sexo != '1' ) {
    $("#sexo_chequeo").html('Por favor seleccione una opcion apropiada.');
    $('#sexo').parent().addClass('has-error');
    return false;
  }else{
    $("#sexo_chequeo").html('&nbsp;');
    $('#sexo').parent().removeClass('has-error').addClass('has-success');
    verificar = true;
  }
// telefono
  if(telefono.length != 11 && telefono != "" && telefono != 'SinRegistro'){
    $("#telefono_chequeo").html('este campo debe contener 11 caracteres EJ: 02127773322');
    $('#telefono').parent().addClass('has-error');
    return false;
  }else if(!expRegtlf.exec(telefono) && telefono != "" && telefono != 'SinRegistro') {
    $("#telefono_chequeo").html('Favor introduzca en este campo Letras sin numeros o caracteres especiales EJ: 19?=;@*');
    $('#telefono').parent().addClass('has-error');
    return false;
  }else{
    $("#telefono_chequeo").html('&nbsp;');
    $('#telefono').parent().removeClass('has-error').addClass('has-success');
    verificar = true;
  }
// telefono_otro (adicional)
  if(telefono_otro.length != 11 && telefono_otro != "" && telefono != 'SinRegistro'){
    $("#telefono_otro_chequeo").html('este campo debe contener 11 caracteres EJ: 02127773322');
    $('#telefono_otro').parent().addClass('has-error');
    return false;
  }else if(!expRegtlf.exec(telefono_otro) && telefono != "" && telefono != 'SinRegistro') {
    $("#telefono_otro_chequeo").html('Favor introduzca en este campo Letras sin numeros o caracteres especiales EJ: 19?=;@*');
    $('#telefono_otro').parent().addClass('has-error');
    return false;
  }else{
    $("#telefono_otro_chequeo").html('&nbsp;');
    $('#telefono_otro').parent().removeClass('has-error').addClass('has-success');
    verificar = true;
  }
// plantel de procedencia
  if (plantel_procedencia.length > 50) {
    $("#plantel_procedencia_chequeo").html('Favor introduzca en este campo Letras sin numeros o caracteres especiales EJ: 19?=;@*');
    $('#plantel_procedencia').parent().addClass('has-error');
    return false;
  }else if (expRegRepetido.exec(plantel_procedencia)) {
    $("#plantel_procedencia_chequeo").html('Verifique este campo, muchos caracteres repetidos');
    $('#plantel_procedencia').parent().addClass('has-error');
    return false;
  }else{
    $("#plantel_procedencia_chequeo").html('&nbsp;');
    $('#plantel_procedencia').parent().removeClass('has-error').addClass('has-success');
    $('#plantel_procedencia').val( plantel_procedencia.toUpperCase() );
    verificar = true;
  }
// discapacidad
  if (discapacidad === "") {
    $("#discapacidad_chequeo").html('Por favor seleccione una opcion apropiada');
    $('#discapacidad').parent().addClass('has-error');
    return false;
  }else{
    $("#discapacidad_chequeo").html('&nbsp;');
    $('#discapacidad').parent().removeClass('has-error').addClass('has-success');
    verificar = true;
  }
// vacuna
  if (vacuna === "") {
    $("#vacuna_chequeo").html('Por favor seleccione una opcion apropiada');
    $('#vacuna').parent().addClass('has-error');
    return false;
  }else{
    $("#vacuna_chequeo").html('&nbsp;');
    $('#vacuna').parent().removeClass('has-error').addClass('has-success');
    verificar = true;
  }
// repitiente
    if (repitiente === "") {
      $("#repitiente_chequeo").html('Por favor seleccione una opcion apropiada');
      $('#repitiente').parent().addClass('has-error');
      return false;
    }else{
      $("#repitiente_chequeo").html('&nbsp;');
      $('#repitiente').parent().removeClass('has-error').addClass('has-success');
      verificar = true;
    }
// validacion de direccion esta ahora en validacionDireccion.js
  if (parroquia === "") {
    return false;
  } else{
    verificar = true;
  };
// direccion exacta
  if(direcc != "" && direcc.length > 150){
    $("#direcc_chequeo").html('este campo no puede ser mayor a 150 caracteres');
    $('#direcc').parent().addClass('has-error');
    return false;
  }else if (expRegRepetido.exec(direcc)) {
    $("#direcc_chequeo").html('Verifique este campo, muchos caracteres repetidos');
    $('#direcc').parent().addClass('has-error');
    return false;
  }else{
    $("#direcc_chequeo").html('&nbsp;');
    $('#direcc').parent().removeClass('has-error').addClass('has-success');
    $('#direcc').val( direcc.toUpperCase() );
    verificar = true;
  }
// curso
  if(curso === "") {
    $("#curso_chequeo").html('seleccione una opcion apropiada');
    $('#curso').parent().addClass('has-error');
    return false;
  }else if(isNaN(curso)) {
    $("#curso_chequeo").html('este campo debe ser solo numeros');
    $('#curso').parent().addClass('has-error');
    return false;
  }else{
    $("#curso_chequeo").html('&nbsp;');
    $('#curso').parent().removeClass('has-error').addClass('has-success');
    verificar = true;
  }
// datos fisicos
  n = parseInt(altura);
  if(isNaN(altura)) {
    $("#altura_chequeo").html('este campo debe ser solo numeros');
    $('#altura').parent().addClass('has-error');
    return false;
  }else{
    if (n < 30 || n > 230) {
      $('#altura').parent().addClass('has-error');
      $("#altura_chequeo").html('Favor verifique este campo');
      return false;
    }else{
      $('#altura').parent().removeClass('has-error').addClass('has-success');
      $("#altura_chequeo").html('&nbsp;');
      verificar = true;
    }
  }
  n = parseInt(peso);
  if(isNaN(peso)) {
    $("#peso_chequeo").html('este campo debe ser solo numeros');
    $('#peso').parent().addClass('has-error');
    return false;
  }else{
    if (n < 10 || n > 300) {
      $('#peso').parent().addClass('has-error');
      $("#peso_chequeo").html('Favor verifique este campo');
      return false;
    }else{
      $('#peso').parent().removeClass('has-error').addClass('has-success');
      $("#peso_chequeo").html('&nbsp;');
      verificar = true;
    }
  }
  if(camisa === "") {
    $("#camisa_chequeo").html('seleccione una opcion apropiada');
    $('#camisa').parent().addClass('has-error');
    return false;
  }else if(isNaN(camisa)) {
    $("#camisa_chequeo").html('este campo debe ser solo numeros');
    $('#camisa').parent().addClass('has-error');
    return false;
  }else{
    $("#camisa_chequeo").html('&nbsp;');
    $('#camisa').parent().removeClass('has-error').addClass('has-success');
    verificar = true;
  }
  if(pantalon === "") {
    $("#camisa_chequeo").html('seleccione una opcion apropiada');
    $('#camisa').parent().addClass('has-error');
    return false;
  }else if(isNaN(pantalon)) {
    $("#pantalon_chequeo").html('este campo debe ser solo numeros');
    $('#pantalon').parent().addClass('has-error');
    return false;
  }else{
    $("#pantalon_chequeo").html('&nbsp;');
    $('#pantalon').parent().removeClass('has-error').addClass('has-success');
    verificar = true;
  }
  n = parseInt(zapato);
  if(isNaN(zapato)) {
    $("#zapato_chequeo").html('este campo debe ser solo numeros');
    $('#zapato').parent().addClass('has-error');
    return false;
  }else{
    if (n < 8 || n > 52) {
      $('#zapato').parent().addClass('has-error');
      $("#zapato_chequeo").html('Favor verifique este campo');
      return false;
    }else{
      $('#zapato').parent().removeClass('has-error').addClass('has-success');
      $("#zapato_chequeo").html('&nbsp;');
      verificar = true;
    }
  }
// fin de chequeos.
  // chequea y devuelve:
  if (verificar) {
    return true;
  }

}

//transformado a Jquery:
$(function(){
  var botonEnviar;
  botonEnviar = $('#submit');
  botonEnviar.onclick = validacionAlumno;
});
