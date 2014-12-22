/**
 * @author [Erick Zerpa]
 *
 * desinfectado con bombas nucleares por:
 * @author [Alejandro Granadillo]
 *
 * [validarform > validacionPA forma utilizada para validar el formulario de PA.]
 *
 * @internal quitado el boton de reset por ser innecesario. esta funcion hace los
 * chequeos en el formulario de registro de representante.
 *
 * @return boolean [regresa verdadero si los campos son validos.]
 *
 * @see personalAutorizado/form_reg_P.php
 *
 * @version 2.1
 *
 */
function validacionPA(){
  // expresiones regulares:
  var expRegpnom  = /^[a-zA-ZÑñÁáÉéÍíÓóÚú'-\s]{0,20}$/;//^[a-zA-ZÑñÁáÉéÍíÓóÚú]$/;
  // agarra un string que tenga al menos aaa ej: pedrooo
  var expRegRepetido = /(.)\1{2,}/;
  // agarra lo que no sea numeros
  var expRegced   = /^(?:\+|-)?\d+$/;
  // solo numeros, exactamente 11
  var expRegtlf   = /^\d{11}$/;
  // ver validacionPI.js
  var emailChequeo = /^[0-9a-zA-Z-_\$#]+@[0-9a-zA-Z-_\$#]+\.[a-zA-Z]{2,5}/;
  // variables de control:
  var verificar = false;
  var n; // para el parse a enteros
  // datos de formulario
  var cedula         = document.getElementById("cedula").value.replace(/^\s+|\s+$/g, '');
  var nacionalidad   = document.getElementById("nacionalidad").value.replace(/^\s+|\s+$/g, '');
  var p_nombre       = document.getElementById("p_nombre").value.replace(/^\s+|\s+$/g, '');
  var s_nombre       = document.getElementById("s_nombre").value.replace(/^\s+|\s+$/g, '');
  var p_apellido     = document.getElementById("p_apellido").value.replace(/^\s+|\s+$/g, '');
  var s_apellido     = document.getElementById("s_apellido").value.replace(/^\s+|\s+$/g, '');
  var sexo           = document.getElementById("sexo").value.replace(/^\s+|\s+$/g, '');
  var fec_nac        = document.getElementById("fec_nac").value.replace(/^\s+|\s+$/g, '');
  var lugar_nac      = document.getElementById("lugar_nac").value.replace(/^\s+|\s+$/g, '');
  var telefono       = document.getElementById("telefono").value.replace(/^\s+|\s+$/g, '');
  var telefono_otro  = document.getElementById("telefono_otro").value.replace(/^\s+|\s+$/g, '');
  var email          = document.getElementById("email").value.replace(/^\s+|\s+$/g, '');
  var parentesco     = document.getElementById("relacion").value.replace(/^\s+|\s+$/g, '');
  var vive_con_alumno= document.getElementById("vive_con_alumno").value.replace(/^\s+|\s+$/g, '');
  var estado         = document.getElementById("cod_est").value.replace(/^\s+|\s+$/g, '');
  var municipio      = document.getElementById("cod_mun").value.replace(/^\s+|\s+$/g, '');
  var parroquia      = document.getElementById("cod_parro").value.replace(/^\s+|\s+$/g, '');
  var direcc         = document.getElementById("direcc").value.replace(/^\s+|\s+$/g, '');
  var nivel_instruccion = document.getElementById("nivel_instruccion").value.replace(/^\s+|\s+$/g, '');
  var profesion      = document.getElementById("profesion").value.replace(/^\s+|\s+$/g, '');
  var lugar_trabajo      = document.getElementById("lugar_trabajo").value.replace(/^\s+|\s+$/g, '');
  var direcc_tra     = document.getElementById("direccion_trabajo").value.replace(/^\s+|\s+$/g, '');
  var telefono_trabajo   = document.getElementById("telefono_trabajo").value.replace(/^\s+|\s+$/g, '');
  // chequeos:
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
// nivel de instruccion
  if ( /*nivel_instruccion == '0' || */nivel_instruccion == '' ) {
    $("#nivel_instruccion_chequeo").html('Por favor seleccione una opcion apropiada.');
    $('#nivel_instruccion').parent().addClass('has-error');
    return false;
  }else{
    $("#nivel_instruccion_chequeo").html('&nbsp;');
    $('#nivel_instruccion').parent().removeClass('has-error').addClass('has-success');
    verificar = true;
  }
// telefono
  if(telefono.length != 11 && telefono != "" && telefono != 'SinRegistro'){
    $("#telefono_chequeo").html('este campo debe contener 11 caracteres EJ: 02127773322');
    $('#telefono').parent().addClass('has-error');
    return false;
  }else if( !expRegtlf.exec(telefono) && telefono != "" && telefono != "SinRegistro" ) {
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
  }else if(!expRegtlf.exec(telefono_otro) && telefono_otro != "" && telefono_otro != "SinRegistro") {
    $("#telefono_otro_chequeo").html('Favor introduzca en este campo Letras sin numeros o caracteres especiales EJ: 19?=;@*');
    $('#telefono_otro').parent().addClass('has-error');
    return false;
  }else{
    $("#telefono_otro_chequeo").html('&nbsp;');
    $('#telefono_otro').parent().removeClass('has-error').addClass('has-success');
    verificar = true;
  }
// email
  if(email.length > 40){
    $("#email_chequeo").html('este campo no puede ser mayor a 40 caracteres');
    $('#email').parent().parent().addClass('has-error');
    return false;
  }else if(email == ''){
    $("#email_chequeo").html('este campo no puede estar vacio.');
    $('#email').parent().parent().addClass('has-error');
    return false;
  }else if( !emailChequeo.test(email)){
    $("#email_chequeo").html('Favor introduzca en este campo correctamente EJ: suNombre71@dominio.com.ve');
    $('#email').parent().parent().addClass('has-error');
    return false;
  }else{
    $("#email_chequeo").html('&nbsp;');
    $('#email').parent().parent().removeClass('has-error').addClass('has-success');
    verificar = true;
  }
// relacion o parentesco
  if (parentesco === "") {
    $("#relacion_chequeo").html('Por favor seleccione una opcion apropiada');
    $('#relacion').parent().addClass('has-error');
    return false;
  }else{
    $("#relacion_chequeo").html('&nbsp;');
    $('#relacion').parent().removeClass('has-error').addClass('has-success');
    verificar = true;
  }
// vive_con_alumno
  if (vive_con_alumno != "s" && vive_con_alumno != "n") {
    $("#vive_con_alumno_chequeo").html('Por favor seleccione una opcion apropiada');
    $('#vive_con_alumno').parent().addClass('has-error');
    return false;
  }else{
    $("#vive_con_alumno_chequeo").html('&nbsp;');
    $('#vive_con_alumno').parent().removeClass('has-error').addClass('has-success');
    verificar = true;
  }
// validacion de edo/mun/parro movido a un archivo aparte
  if (parroquia === "") {
    return false;
  } else{
    estatus = true;
  };
// (validacionDirecion.js)
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
// profesion
  if (profesion === "") {
    $("#profesion_chequeo").html('este campo es necesario.');
    $('#profesion').parent().addClass('has-error');
    return false;
  }else{
    $("#profesion_chequeo").html('&nbsp;');
    $('#profesion').parent().removeClass('has-error').addClass('has-success');
  }
// lugar de trabajo
  if (lugar_trabajo.length > 50) {
    $("#lugar_trabajo_chequeo").html('este campo no puede ser mayor a 50 caracteres');
    $('#lugar_trabajo').parent().addClass('has-error');
    return false;
  }else if (expRegRepetido.exec(lugar_trabajo)) {
    $("#lugar_trabajo_chequeo").html('Verifique este campo, muchos caracteres repetidos');
    $('#lugar_trabajo').parent().addClass('has-error');
    return false;
  }else{
    $("#lugar_trabajo_chequeo").html('&nbsp;');
    $('#lugar_trabajo').parent().removeClass('has-error').addClass('has-success');
    verificar = true;
  }
// telefono de trabajo
  if(telefono_trabajo.length != 11
      && telefono_trabajo != ""
      && telefono_trabajo != "SinRegistro"){
    $("#telefono_trabajo_chequeo").html('este campo debe contener 11 caracteres EJ: 02127773322');
    $('#telefono_trabajo').parent().addClass('has-error');
    return false;
  }else if(!expRegtlf.exec(telefono_trabajo)
      && telefono_trabajo != ""
      && telefono_trabajo != "SinRegistro") {
    $("#telefono_trabajo_chequeo").html('Favor introduzca en este campo Letras sin numeros o caracteres especiales EJ: 19?=;@*');
    $('#telefono_trabajo').parent().addClass('has-error');
    return false;
  }else{
    $("#telefono_trabajo_chequeo").html('&nbsp;');
    $('#telefono_trabajo').parent().removeClass('has-error').addClass('has-success');
    verificar = true;
  }
// direccion de trabajo
  if (direcc_tra.length > 150) {
    $("#direccion_trabajo_chequeo").html('este campo no puede ser mayor a 150 caracteres');
    $('#direccion_trabajo').parent().addClass('has-error');
    return false;
  }else if (expRegRepetido.test(direcc_tra)) {
    $("#direccion_trabajo_chequeo").html('Verifique este campo, muchos caracteres repetidos');
    $('#direccion_trabajo').parent().addClass('has-error');
    return false;
  }else{
    $("#direccion_trabajo_chequeo").html('&nbsp;');
    $('#direccion_trabajo').parent().removeClass('has-error').addClass('has-success');
    verificar = true;
  }
  // condicional de control:
  if (verificar) {
    return true
  }
}
$(function(){
  var botonEnviar;
  botonEnviar = document.form_repre.registrar;
  botonEnviar.onclick = validacionPA;
});
