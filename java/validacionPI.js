/**
 * @author [Alejandro Granadillo]
 *
 * [validacionPI chequea los valores de cada variable presente
 * en el formulario de registro de personal
 * interno (docentes, directivo, administrativo).]
 *
 * @return {boolean} [regresa verdadero si todo bien, falso si no.]
 */
function validacionPI(){

	//REGEX:
	var estatus = false;
	var numerosChequeo = /[^\d+]/g;
	var	nombresChequeo = /[^A-Za-záéíóúÁÉÍÓÚ-\s]/g;
	//por alguna razon javascrip se queja si uso esta expresion:
	// ^[0-9a-zA-Z-_$#]{2,20}+\@[0-9a-zA-Z-_$#]{2,20}+\.[a-zA-Z]{2,5}\.?[a-zA-Z]{2,5}+
	// eso cacha algo@algo.com.ve
	// no veo el error, adicionalmente la probe en php y funciona.
	// esta expresion solo llega hasta algo.com ||| ignora el .ve
	var emailChequeo = /^[0-9a-zA-Z-_\$#]+@[0-9a-zA-Z-_\$#]+\.[a-zA-Z]{2,5}/;
	//datos del formulario
	var nacionalidad = document.getElementById('nacionalidad').value;
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
	if (cedula == "") {
		document.getElementById("cedula").focus();
		$("#cedula_chequeo").html('este campo no puede </br> estar vacio');
		$("#cedula_titulo").css('color', 'red');
		return false;
	}else if(cedula.length < 6){
		document.getElementById("cedula").focus();
		$("#cedula_chequeo").html('cedula no puede ser menor a 6 caracteres');
		$("#cedula_titulo").css('color', 'red');
		return false;
	}else if(cedula.length > 8){
		document.getElementById("cedula").focus();
		$("#cedula_chequeo").html('cedula no puede ser mayor a 8 caracteres');
		$("#cedula_titulo").css('color', 'red');
		return false;
	}else if( numerosChequeo.exec(cedula) ){
		document.getElementById("cedula").focus();
		$("#cedula_chequeo").html('Favor introduzca cedula solo numeros sin caracteres especiales, EJ: 12345678');
		$("#cedula_titulo").css('color', 'red');
		return false;
	}else{
		$("#cedula_chequeo").html('');
		$("#cedula_titulo").css('color', 'green');
		estatus = true;
	}
//NACIONALIDAD:
	if ( nacionalidad != 'v' && nacionalidad != 'e' ) {
		$("#nacionalidad_chequeo").html('Por favor introduzca hasta un maximo de 15 caracteres.');
		$("#nacionalidad_titulo").css('color', 'red');
		return false;
	}else{
		$("#nacionalidad_chequeo").html('');
		$("#nacionalidad_titulo").css('color', 'green');
		estatus = true;
	}
//P_NOMBRE:
	if (p_nombre == "") {
		document.getElementById("p_nombre").focus();
		$("#p_nombre_chequeo").html('este campo no puede </br> estar vacio');
		$("#p_nombre_titulo").css('color', 'red');
		return false;
	}else if(p_nombre.length > 20){
		document.getElementById("p_nombre").focus();
		$("#p_nombre_chequeo").html('este campo no puede ser mayor a 20 caracteres');
		$("#p_nombre_titulo").css('color', 'red');
		return false;
	}else if( nombresChequeo.test(p_nombre) ){
		document.getElementById("p_nombre").focus();
		$("#p_nombre_chequeo").html('Favor introduzca en este campo Letras sin numeros o caracteres especiales EJ: 19?=;@*');
		$("#p_nombre_titulo").css('color', 'red');
		return false;
	}else{
		$("#p_nombre_chequeo").html('');
		$("#p_nombre_titulo").css('color', 'green');
		estatus = true;
	}
//S_NOMBRE
	if(s_nombre.length > 20){
		document.getElementById("s_nombre").focus();
		$("#s_nombre_chequeo").html('este campo no puede ser mayor a 20 caracteres');
		$("#s_nombre_titulo").css('color', 'red');
		return false;
	}else if( nombresChequeo.test(s_nombre) ){
		document.getElementById("s_nombre").focus();
		$("#s_nombre_chequeo").html('Favor introduzca en este campo Letras sin numeros o caracteres especiales EJ: 19?=;@*');
		$("#s_nombre_titulo").css('color', 'red');
		return false;
	}else{
		$("#s_nombre_chequeo").html('');
		$("#s_nombre_titulo").css('color', 'green');
		estatus = true;
	}
//P_APELLIDO
	if (p_apellido == "") {
		document.getElementById("p_apellido").focus();
		$("#p_apellido_chequeo").html('este campo no puede </br> estar vacio');
		$("#p_apellido_titulo").css('color', 'red');
		return false;
	}else if(p_apellido.length > 20){
		document.getElementById("p_apellido").focus();
		$("#p_apellido_chequeo").html('este campo no puede ser mayor a 20 caracteres');
		$("#p_apellido_titulo").css('color', 'red');
		return false;
	}else if( nombresChequeo.test(p_apellido) ){
		document.getElementById("p_apellido").focus();
		$("#p_apellido_chequeo").html('Favor introduzca en este campo Letras sin numeros o caracteres especiales EJ: 19?=;@*');
		$("#p_apellido_titulo").css('color', 'red');
		return false;
	}else{
		$("#p_apellido_chequeo").html('');
		$("#p_apellido_titulo").css('color', 'green');
		estatus = true;
	}
//s_apellido
	if(s_apellido.length > 20){
		document.getElementById("s_apellido").focus();
		$("#s_apellido_chequeo").html('este campo no puede ser mayor a 20 caracteres');
		$("#s_apellido_titulo").css('color', 'red');
		return false;
	}else if( nombresChequeo.test(s_apellido) ){
		document.getElementById("s_apellido").focus();
		$("#s_apellido_chequeo").html('Favor introduzca en este campo Letras sin numeros o caracteres especiales EJ: 19?=;@*');
		$("#s_apellido_titulo").css('color', 'red');
		return false;
	}else{
		$("#s_apellido_chequeo").html('');
		$("#s_apellido_titulo").css('color', 'green');
		estatus = true;
	}
//fec_nac
	if (fec_nac == "") {
		document.getElementById("fec_nac").focus();
		$("#fec_nac_chequeo").html('este campo no puede </br> estar vacio');
		$("#fec_nac_titulo").css('color', 'red');
		return false;
	}else if(fec_nac.length > 20){
		document.getElementById("fec_nac").focus();
		$("#fec_nac_chequeo").html('este campo no puede ser mayor a 20 caracteres');
		$("#fec_nac_titulo").css('color', 'red');
		return false;
	}else if( !/[\d]{4}[-]{1}[\d]{2}[-]{1}[\d]{2}/.test(fec_nac) ){
		document.getElementById("fec_nac").focus();
		$("#fec_nac_chequeo").html('Favor introduzca en este campo el año en el siguiente formato: AAAA-MM-DD EJ: 1961-12-31');
		$("#fec_nac_titulo").css('color', 'red');
		return false;
	}else{
		$("#fec_nac_chequeo").html('');
		$("#fec_nac_titulo").css('color', 'green');
		estatus = true;
	}
//sexo:
	if ( sexo != '0' && sexo != '1' ) {
		$("#sexo_chequeo").html('Por favor seleccione una opcion apropiada.');
		$("#sexo_titulo").css('color', 'red');
		return false;
	}else{
		$("#sexo_chequeo").html('');
		$("#sexo_titulo").css('color', 'green');
		estatus = true;
	}
//email
	if(email.length > 40){
		document.getElementById("email").focus();
		$("#email_chequeo").html('este campo no puede ser mayor a 40 caracteres');
		$("#email_titulo").css('color', 'red');
		return false;
	}else if( !emailChequeo.test(email) ){
		document.getElementById("email").focus();
		$("#email_chequeo").html('Favor introduzca en este campo correctamente EJ: suNombre71@dominio.com.ve');
		$("#email_titulo").css('color', 'red');
		return false;
	}else{
		$("#email_chequeo").html('');
		$("#email_titulo").css('color', 'green');
		estatus = true;
	}
//titulo
	if(titulo.length > 80){
		document.getElementById("titulo").focus();
		$("#titulo_chequeo").html('este campo no puede ser mayor a 80 caracteres');
		$("#titulo_titulo").css('color', 'red');
		return false;
	}else{
		$("#titulo_chequeo").html('');
		$("#titulo_titulo").css('color', 'green');
		estatus = true;
	}
//telefono
	if(telefono.length != 11 && telefono != "" ){
		document.getElementById("telefono").focus();
		$("#telefono_chequeo").html('este campo no puede ser mayor a 11 caracteres EJ: 02127773322');
		$("#telefono_titulo").css('color', 'red');
		return false;
	}else if( telefono === "SinRegistro" ){
		$("#telefono_chequeo").html('');
		$("#telefono_titulo").css('color', 'green');
		estatus = true;
	}else if( numerosChequeo.test(telefono) ){
		document.getElementById("telefono").focus();
		$("#telefono_chequeo").html('Favor introduzca en este campo Letras sin numeros o caracteres especiales EJ: 19?=;@*');
		$("#telefono_titulo").css('color', 'red');
		return false;
	}else{
		$("#telefono_chequeo").html('');
		$("#telefono_titulo").css('color', 'green');
		estatus = true;
	}
//telefono_otro
	if(telefono_otro.length != 11 && telefono_otro != "" ){
		document.getElementById("telefono_otro").focus();
		$("#telefono_otro_chequeo").html('este campo no puede ser mayor a 11 caracteres EJ: 02127773322');
		$("#telefono_otro_titulo").css('color', 'red');
		return false;
	}else if( telefono_otro === "SinRegistro" ){
		$("#telefono_otro_chequeo").html('');
		$("#telefono_otro_titulo").css('color', 'green');
		estatus = true;
	}else if( numerosChequeo.test(telefono_otro) ){
		document.getElementById("telefono_otro").focus();
		$("#telefono_otro_chequeo").html('Favor introduzca en este campo Letras sin numeros o caracteres especiales EJ: 19?=;@*');
		$("#telefono_otro_titulo").css('color', 'red');
		return false;
	}else{
		$("#telefono_otro_chequeo").html('');
		$("#telefono_otro_titulo").css('color', 'green');
		estatus = true;
	}
//celular
	if(celular.length != 11 && celular != "" ){
		document.getElementById("celular").focus();
		$("#celular_chequeo").html('este campo no puede ser mayor a 11 caracteres EJ: 02127773322');
		$("#celular_titulo").css('color', 'red');
		return false;
	}else if( celular === "SinRegistro" ){
		$("#celular_chequeo").html('');
		$("#celular_titulo").css('color', 'green');
		estatus = true;
	}else if( numerosChequeo.test(celular) ){
		document.getElementById("celular").focus();
		$("#celular_chequeo").html('Favor introduzca en este campo Letras sin numeros o caracteres especiales EJ: 19?=;@*');
		$("#celular_titulo").css('color', 'red');
		return false;
	}else{
		$("#celular_chequeo").html('');
		$("#celular_titulo").css('color', 'green');
		estatus = true;
	}
//direcc
	if(direcc != "" && direcc.length > 150){
		document.getElementById("direcc").focus();
		$("#direcc_chequeo").html('este campo no puede ser mayor a 80 caracteres');
		$("#direcc_direcc").css('color', 'red');
		return false;
	}else{
		$("#direcc_chequeo").html('');
		$("#direcc_titulo").css('color', 'green');
		estatus = true;
	}
//tipo (perfil de usuario):
	if ( tipo === '' ) {
		$("#tipo_chequeo").html('Por favor seleccione una opcion apropiada.');
		$("#tipo_titulo").css('color', 'red');
		return false;
	}else{
		$("#tipo_chequeo").html('');
		$("#tipo_titulo").css('color', 'green');
		estatus = true;
	}
//cargo (cargo interno de personal):
	if ( cargo == '0' || cargo == '' ) {
		$("#cargo_chequeo").html('Por favor seleccione una opcion apropiada.');
		$("#cargo_titulo").css('color', 'red');
		return false;
	}else{
		$("#cargo_chequeo").html('');
		$("#cargo_titulo").css('color', 'green');
		estatus = true;
	}
//nivel_instruccion (nivel_educativo):
	if ( nivel_instruccion == '0' || nivel_instruccion == '' ) {
		$("#nivel_instruccion_chequeo").html('Por favor seleccione una opcion apropiada.');
		$("#nivel_instruccion_titulo").css('color', 'red');
		return false;
	}else{
		$("#nivel_instruccion_chequeo").html('');
		$("#nivel_instruccion_titulo").css('color', 'green');
		estatus = true;
	}
//estado
	if ( estado == '' ) {
		$("#estado_chequeo").html('Por favor seleccione una opcion apropiada.');
		$("#estado_titulo").css('color', 'red');
		return false;
	}else{
		$("#estado_chequeo").html('');
		$("#estado_titulo").css('color', 'green');
		estatus = true;
	}
//municipio
	if ( municipio == '' ) {
		$("#municipio_chequeo").html('Por favor seleccione una opcion apropiada.');
		$("#municipio_titulo").css('color', 'red');
		return false;
	}else{
		$("#municipio_chequeo").html('');
		$("#municipio_titulo").css('color', 'green');
		estatus = true;
	}
//parroquia
	if ( parroquia == '' ) {
		$("#parroquia_chequeo").html('Por favor seleccione una opcion apropiada.');
		$("#parroquia_titulo").css('color', 'red');
		return false;
	}else{
		$("#parroquia_chequeo").html('');
		$("#parroquia_titulo").css('color', 'green');
		estatus = true;
	}

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
