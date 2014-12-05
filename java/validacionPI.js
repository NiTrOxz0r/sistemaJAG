/**
 * @author [Alejandro Granadillo]
 *
 * [validacionPI chequea los valores de cada variable presente
 * en el formulario de registro de personal
 * interno (docentes, directivo, administrativo).]
 *
 * @internal modificado para adaptarse a bootstrap.
 *
 * @return {boolean} [regresa verdadero si todo bien, falso si no.]
 *
 * @version 1.4
 */
function validacionPI(){

  // variables de control
  var estatus = false;
  var n; // para el parse a enteros
  //REGEX:
  var numerosChequeo = /[^\d+]/g;
  var nombresChequeo = /[^A-Za-záéíóúÑñÁÉÍÓÚ'-\s]/g;
  // agarra un string que tenga al menos aaa ej: pedrooo
  var expRegRepetido = /(.)\1{2,}/;
  //por alguna razon javascrip se queja si uso esta expresion:
  // ^[0-9a-zA-Z-_$#]{2,20}+\@[0-9a-zA-Z-_$#]{2,20}+\.[a-zA-Z]{2,5}\.?[a-zA-Z]{2,5}+
  // eso cacha algo@algo.com.ve
  // no veo el error, adicionalmente la probe en php y funciona.
  // esta expresion solo llega hasta algo.com ||| ignora el .ve
  var emailChequeo = /^[0-9a-zA-Z-_\$#]+@[0-9a-zA-Z-_\$#]+\.[a-zA-Z]{2,5}/;
  //datos del formulario
  var nacionalidad = document.getElementById('nacionalidad').value.replace(/^\s+|\s+$/g, '');
  var cedula = document.getElementById("cedula").value.replace(/^\s+|\s+$/g, '');
  var p_nombre = document.getElementById('p_nombre').value.replace(/^\s+|\s+$/g, '');
  var s_nombre = document.getElementById('s_nombre').value.replace(/^\s+|\s+$/g, '');
  var p_apellido = document.getElementById('p_apellido').value.replace(/^\s+|\s+$/g, '');
  var s_apellido = document.getElementById('s_apellido').value.replace(/^\s+|\s+$/g, '');
  var fec_nac = document.getElementById('fec_nac').value.replace(/^\s+|\s+$/g, '');
  var sexo = document.getElementById('sexo').value.replace(/^\s+|\s+$/g, '');
  var email = document.getElementById('email').value.replace(/^\s+|\s+$/g, '');
  var titulo = document.getElementById('titulo').value.replace(/^\s+|\s+$/g, '');
  var nivel_instruccion = document.getElementById('nivel_instruccion').value.replace(/^\s+|\s+$/g, '');
  var celular = document.getElementById('celular').value.replace(/^\s+|\s+$/g, '');
  var telefono = document.getElementById('telefono').value.replace(/^\s+|\s+$/g, '');
  var telefono_otro = document.getElementById('telefono_otro').value.replace(/^\s+|\s+$/g, '');
  var cargo = document.getElementById('cargo').value.replace(/^\s+|\s+$/g, '');
  var tipo = document.getElementById('tipo_personal').value.replace(/^\s+|\s+$/g, '');
  var direcc = document.getElementById('direcc').value.replace(/^\s+|\s+$/g, '');
  var estado = document.getElementById('cod_est').value.replace(/^\s+|\s+$/g, '');
  var municipio = document.getElementById('cod_mun').value.replace(/^\s+|\s+$/g, '');
  var parroquia = document.getElementById('cod_parro').value.replace(/^\s+|\s+$/g, '');
// cedula:
  n = parseInt(cedula);
  if (cedula == "") {
    $('#cedula').parent().addClass('has-error');
    $("#cedula_chequeo").html('este campo no puede estar vacio.');
    return false;
  }else if(cedula.length < 6){
    $('#cedula').parent().addClass('has-error');
    $("#cedula_chequeo").html('Este campo no debe ser menor a 6 caracteres');
    return false;
  }else if(cedula.length > 8){
    $('#cedula').parent().addClass('has-error');
    $("#cedula_chequeo").html('Este campo no debe ser mayor a 8 caracteres');
    return false;
  }else if( numerosChequeo.exec(cedula) ){
    $("#cedula_chequeo").html('Favor introduzca cedula solo numeros sin caracteres especiales, EJ: 12345678');
    $('#cedula').parent().addClass('has-error');
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
//NACIONALIDAD:
  if ( nacionalidad != 'v' && nacionalidad != 'e' ) {
    $("#nacionalidad_chequeo").html('Algo parece estar mal. el sistema funciona mejor con firefox o chrome.');
    $('#nacionalidad').parent().addClass('has-error');
    return false;
  }else{
    $('#nacionalidad').parent().removeClass('has-error').addClass('has-success');
    $("#nacionalidad_chequeo").html('&nbsp;');
    estatus = true;
  }
//P_NOMBRE:
  if (p_nombre == "") {
    $("#p_nombre_chequeo").html('este campo no puede estar vacio');
    $('#p_nombre').parent().addClass('has-error');
    return false;
  }else if(p_nombre.length > 20){
    $("#p_nombre_chequeo").html('este campo no puede ser mayor a 20 caracteres');
    $('#p_nombre').parent().addClass('has-error');
    return false;
  }else if( nombresChequeo.test(p_nombre) ){
    $("#p_nombre_chequeo").html('Favor introduzca en este campo Letras sin numeros o caracteres especiales EJ: 19?=;@*');
    $('#p_nombre').parent().addClass('has-error');
    return false;
  }else if (expRegRepetido.exec(p_nombre)) {
    $("#p_nombre_chequeo").html('Verifique este campo, muchos caracteres repetidos');
    $('#p_nombre').parent().addClass('has-error');
    return false;
  }else{
    $("#p_nombre_chequeo").html('&nbsp;');
    $('#p_nombre').parent().removeClass('has-error').addClass('has-success');
    $('#p_nombre').val( p_nombre.toUpperCase() );
    estatus = true;
  }
//S_NOMBRE
  if(s_nombre.length > 20){
    $("#s_nombre_chequeo").html('este campo no puede ser mayor a 20 caracteres');
    $('#s_nombre').parent().addClass('has-error');
    return false;
  }else if( nombresChequeo.test(s_nombre) ){
    $("#s_nombre_chequeo").html('Favor introduzca en este campo Letras sin numeros o caracteres especiales EJ: 19?=;@*');
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
    estatus = true;
  }
//P_APELLIDO
  if (p_apellido == "") {
    $("#p_apellido_chequeo").html('este campo no puede estar vacio');
    $('#p_apellido').parent().addClass('has-error');
    return false;
  }else if(p_apellido.length > 20){
    $("#p_apellido_chequeo").html('este campo no puede ser mayor a 20 caracteres');
    $('#p_apellido').parent().addClass('has-error');
    return false;
  }else if( nombresChequeo.test(p_apellido) ){
    $("#p_apellido_chequeo").html('Favor introduzca en este campo Letras sin numeros o caracteres especiales EJ: 19?=;@*');
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
    estatus = true;
  }
//s_apellido
  if(s_apellido.length > 20){
    $("#s_apellido_chequeo").html('este campo no puede ser mayor a 20 caracteres');
    $('#s_apellido').parent().addClass('has-error');
    return false;
  }else if( nombresChequeo.test(s_apellido) ){
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
    estatus = true;
  }
//fec_nac
// hay un problema con el calendario y esta validacion, no esta dando
// las acciones deseadas, por ahora se desabilito las clases de ayuda
// aunque va a seguir validando
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
    estatus = true;
  }
//sexo:
  if ( sexo != '0' && sexo != '1' ) {
    $("#sexo_chequeo").html('Por favor seleccione una opcion apropiada.');
    $('#sexo').parent().addClass('has-error');
    return false;
  }else{
    $("#sexo_chequeo").html('&nbsp;');
    $('#sexo').parent().removeClass('has-error').addClass('has-success');
    estatus = true;
  }
//nivel_instruccion (nivel_educativo):
  if ( /*nivel_instruccion == '0' || */nivel_instruccion == '' ) {
    $("#nivel_instruccion_chequeo").html('Por favor seleccione una opcion apropiada.');
    $('#nivel_instruccion').parent().addClass('has-error');
    return false;
  }else{
    $("#nivel_instruccion_chequeo").html('&nbsp;');
    $('#nivel_instruccion').parent().removeClass('has-error').addClass('has-success');
    estatus = true;
  }
//titulo
  if(titulo.length > 80){
    $("#titulo_chequeo").html('este campo no puede ser mayor a 80 caracteres');
    $('#titulo').parent().addClass('has-error');
    return false;
  }else if (expRegRepetido.exec(titulo)) {
    $("#titulo_chequeo").html('Verifique este campo, muchos caracteres repetidos');
    $('#titulo').parent().addClass('has-error');
    return false;
  }else{
    $("#titulo_chequeo").html('&nbsp;');
    $('#titulo').parent().removeClass('has-error').addClass('has-success');
    $('#titulo').val( titulo.toUpperCase() );
    estatus = true;
  }
//telefono
  if(telefono.length != 11 && telefono != "" ){
    $("#telefono_chequeo").html('este campo no puede ser mayor a 11 caracteres EJ: 02127773322');
    $('#telefono').parent().addClass('has-error');
    return false;
  }else if( telefono === "SinRegistro" ){
    $("#telefono_chequeo").html('&nbsp;');
    $('#telefono').parent().removeClass('has-error').addClass('has-success');
    estatus = true;
  }else if( numerosChequeo.test(telefono) ){
    $("#telefono_chequeo").html('Favor introduzca en este campo Letras sin numeros o caracteres especiales EJ: 19?=;@*');
    $('#telefono').parent().addClass('has-error');
    return false;
  }else{
    $("#telefono_chequeo").html('&nbsp;');
    $('#telefono').parent().removeClass('has-error').addClass('has-success');
    estatus = true;
  }
//telefono_otro
  if(telefono_otro.length != 11 && telefono_otro != "" ){
    $("#telefono_otro_chequeo").html('este campo no puede ser mayor a 11 caracteres EJ: 02127773322');
    $('#telefono_otro').parent().addClass('has-error');
    return false;
  }else if( telefono_otro === "SinRegistro" ){
    $("#telefono_otro_chequeo").html('&nbsp;');
    $('#telefono_otro').parent().removeClass('has-error').addClass('has-success');
    estatus = true;
  }else if( numerosChequeo.test(telefono_otro) ){
    $("#telefono_otro_chequeo").html('Favor introduzca en este campo Letras sin numeros o caracteres especiales EJ: 19?=;@*');
    $('#telefono_otro').parent().addClass('has-error');
    return false;
  }else{
    $("#telefono_otro_chequeo").html('&nbsp;');
    $('#telefono_otro').parent().removeClass('has-error').addClass('has-success');
    estatus = true;
  }
//celular
  if(celular.length != 11 && celular != "" ){
    $("#celular_chequeo").html('este campo no puede ser mayor a 11 caracteres EJ: 02127773322');
    $('#celular').parent().addClass('has-error');
    return false;
  }else if( celular === "SinRegistro" ){
    $("#celular_chequeo").html('&nbsp;');
    $('#celular').parent().removeClass('has-error').addClass('has-success');
    estatus = true;
  }else if( numerosChequeo.test(celular) ){
    $("#celular_chequeo").html('Favor introduzca en este campo Letras sin numeros o caracteres especiales EJ: 19?=;@*');
    $('#celular').parent().addClass('has-error');
    return false;
  }else{
    $("#celular_chequeo").html('&nbsp;');
    $('#celular').parent().removeClass('has-error').addClass('has-success');
    estatus = true;
  }
//email
  if(email.length > 40){
    $("#email_chequeo").html('este campo no puede ser mayor a 40 caracteres');
    $('#email').parent().parent().addClass('has-error');
    return false;
  }else if( !emailChequeo.test(email) ){
    $("#email_chequeo").html('Favor introduzca en este campo correctamente EJ: suNombre71@dominio.com.ve');
    $('#email').parent().parent().addClass('has-error');
    return false;
  }else{
    $("#email_chequeo").html('&nbsp;');
    $('#email').parent().parent().removeClass('has-error').addClass('has-success');
    estatus = true;
  }
//cargo (cargo interno de personal):
  if ( cargo == '' ) {
    $("#cargo_chequeo").html('Por favor seleccione una opcion apropiada.');
    $('#cargo').parent().addClass('has-error');
    return false;
  }else{
    $("#cargo_chequeo").html('&nbsp;');
    $('#cargo').parent().removeClass('has-error').addClass('has-success');
    estatus = true;
  }
//tipo (perfil de usuario):
  if ( tipo === '' ) {
    $("#tipo_personal_chequeo").html('Por favor seleccione una opcion apropiada.');
    $('#tipo_personal').parent().addClass('has-error');
    return false;
  }else{
    $("#tipo_personal_chequeo").html('&nbsp;');
    $('#tipo_personal').parent().removeClass('has-error').addClass('has-success');
    estatus = true;
  }
//direcc
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
    estatus = true;
  }
// validacion de edo/mun/parro movido a un archivo aparte
// (validacionDirecion.js)
  if (parroquia === "") {
    return false;
  } else{
    estatus = true;
  };

  return go(estatus);

  /**
   * [go cada chequeo de cada variable
   * regresa falso si algo esta mal, y pone estatus = true, si estatus
   * se mantiene true en todo el chequeo entonces validacionPI regresa true por
   * medio de este metodo interno]
   *
   * @param  {boolean} e [variable de control interno.]
   * @return {boolean}   [regresa verdadero o falso segun chequeos internos.]
   */
  function go (e){
    if (e) {
      return true;
    }else{
      return false;
    };
  }
}
