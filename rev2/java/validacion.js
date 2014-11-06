function validarform(){

	var verificar = true;
	var esnumero;
	
	var expRegpnom	 =/^[a-zA-Z]{0,20}$/;//^[a-zA-ZÑñÁáÉéÍíÓóÚú]$/;
	var expRegced 	 = /^(?:\+|-)?\d+$/;
	var expRegtlf	 = /^\d{11}$/;

	var cedula = document.getElementById("cedula");
	var cedesc = document.getElementById("cedula_escolar").value;
	var nacionalidad = document.getElementById("nacionalidad");
	var pnombre = document.getElementById("p_nombre");
	var snombre = document.getElementById("s_nombre");
	var papelli = document.getElementById("p_apellido");
	var sapelli = document.getElementById("s_apellido");

	var lugnac = document.getElementById("lug_nac");
	var tlf = document.getElementById("telefono");
	var tlfo = document.getElementById("telefono_otro");

	var apartida = document.getElementById("acta_num_part_nac");
	var afpartida = document.getElementById("acta_folio_num_part_nac");
	var plantel_proce = document.getElementById("plantel_procedencia");

	var alt = document.getElementById("altura").value;
	var peso = document.getElementById("peso").value;
	var cam = document.getElementById("camisa").value;
	var pant = document.getElementById("pantalon").value;
	var zap = document.getElementById("zapato").value;


	var sexo = document.getElementById("sexo");
	var fec_nac = document.getElementById("fec_nac");
	var edo = document.getElementById("cod_est");
	var mun = document.getElementById("cod_mun");
	var parro = document.getElementById("cod_parro");
	var direcc = document.getElementById("direcc");
	var repit = document.getElementById("repitiente");

	

	if (!cedula.value) {
		alert("Campo de Cedula Requerido");
		cedula.focus();
		verificar = false;
		console.log("se detecto: cedula: "+cedula.value);
	}
	else if (!expRegced.exec(cedula.value)) {
		alert("Campo Cedula acepta solo numero sin espacio");
		pnombre.focus();
		verificar = false;
		console.log("se detecto: cedula: "+cedula.value);
	}
	else if(isNaN(cedesc)) {
		alert("Campo Cedula Escolar solo debe ir Numeros");
		cedesc.focus();
  		verificar = false;
  		console.log("se detecto: cedesc: "+cedesc.value);
	}	
	else if (!pnombre.value) {
		alert("Campo Primer Nombre Requerido");
		pnombre.focus();
		verificar = false;
		console.log("se detecto: pnombre: "+pnombre.value);
	}
	//funcion .exec para realizar la compracion con la expresion regular
	else if (!expRegpnom.exec(pnombre.value)) {
		alert("Campo nombre acepta solo letras sin espacio en blanco.");
		pnombre.focus();
		verificar = false;
		console.log("se detecto: pnombre: "+pnombre.value);
	}
	else if (!expRegpnom.exec(snombre.value)) {
		alert("Segundo Nombre acepta solo letras sin espacio en blanco.");
		snombre.focus();
		verificar = false;
		console.log("se detecto: snombre: "+snombre.value);
	}

	else if (!papelli.value) {
		alert("Campo Primer Apellido Requerido");
		papelli.focus();
		verificar = false;
		console.log("se detecto: papelli: "+papelli.value);
	}
	//funcion .exec para realizar la compracion con la expresion regular
	else if (!expRegpnom.exec(papelli.value)) {
		alert("Primer Apellido acepta solo letras sin espacio en blanco.");
		papelli.focus();
		verificar = false;
		console.log("se detecto: papelli: "+papelli.value);
	}
	
	else if (!expRegpnom.exec(sapelli.value)) {
		alert("Segundo Apellido acepta solo letras sin espacio en blanco.");
		sapelli.focus();
		verificar = false;
		console.log("se detecto: sapelli: "+sapelli.value);
	}

	else if (!sexo.value) {
		alert("Campo Sexo Requerido");
		sexo.focus();
		verificar = false;
		console.log("se detecto: sexo: "+sexo.value);
	}

	else if (!lugnac.value) {
		alert("Campo Lugar de Nacimiento Requerido");
		lugnac.focus();
		verificar = false;
		console.log("se detecto: lugnac: "+lugnac.value);
	}
	
	else if ( tlf.value != "SinRegistro" ) {
		if(!expRegtlf.exec(tlf.value)) {
			alert("Introduzca Telefono Local sin caracteres especiales: ()-_.*/, y solo numeros. Ej: 02124443322");
			tlf.focus();
			verificar = false;
			console.log("se detecto: tlf: "+tlf.value);
		}
	}
	else if (!edo.value) {
		alert("Campo Estado Requerido");
		edo.focus();
		verificar = false;
		console.log("se detecto: edo: "+edo.value);
	}
	else if (!mun.value) {
		alert("Campo Municipio Requerido");
		mun.focus();
		verificar = false;
		console.log("se detecto: mun: "+mun.value);
	}
	else if (!parro.value) {
		alert("Campo Parroquia Requerido");
		parro.focus();
		verificar = false;
		console.log("se detecto: parro: "+parro.value);
	}
	else if (!direcc.value) {
		alert("Campo Direccion Requerido");
		direcc.focus();
		verificar = false;
		console.log("se detecto: direcc: "+direcc.value);
	}
	// la definicion de direcc cambio
	// esto es incompatible con el nuevo esquema:
	// else if (!expRegced.exec(direcc.value)) {
	// 	alert("Campo Direccion acepta solo letras sin espacio en blanco.");
	// 	direcc.focus();
	// 	verificar = false;
	// 	console.log("se detecto: direcc: "+direcc.value);
	// }
	else if (!repit.value) {
		alert("Campo Repitiente Requerido");
		repit.focus();
		verificar = false;
		console.log("se detecto: repit: "+repit.value);
	}

	else if(isNaN(alt)) {
		alert("Altura solo Numeros");
		alt.focus();
  		verificar = false;
  		console.log("se detecto: alt: "+alt.value);
	}
	else if(isNaN(peso)) {
		alert("Peso solo Numeros");
		peso.focus();
  		verificar = false;
  		console.log("se detecto: peso: "+peso.value);
	}
	else if(isNaN(cam)) {
		alert("Talla de Camisa solo Numeros");
		cam.focus();
  		verificar = false;
  		console.log("se detecto: cam: "+cam.value);
	}
	else if(isNaN(pant)) {
		alert("Talla de Pantalon solo Numeros");
		pant.focus();
  		verificar = false;
  		console.log("se detecto: pant: "+pant.value);
	}	

	else if(isNaN(zap)) {
		alert("Talla de Calzado solo Numeros");
		zap.focus();
  		verificar = false;
  		console.log("se detecto: zap: "+zap.value);
	}

	else if (verificar===true) {
		alert("Validando");
	    document.getElementById("form").submit();
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
	var botonEnviar, botonLimpiar;
	//1ero Para acceder a un elemento de un documento html
	//hacemos uso del objeto padre document
	// botonLimpiar = document.getElementById("limpiar");
	// //cuando haga un click has lo que diga la funcion
	// botonLimpiar.onclick = limpiarform;

	//2ndo
	botonEnviar = document.form_alu.enviar_btn;
	botonEnviar.onclick = validarform;

};