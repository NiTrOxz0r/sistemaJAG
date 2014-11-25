/**
 * @author Alejandro Granadillo.
 *
 * @internal [usen esto si van a hacer ajax de cedula en algun formulario.]
 *
 * [validacionCedula chequeo de la cedula en diferentes formularios
 * solo chequea esa variable, especificamente hecho para ajax.]
 *
 * @param  {string} cedula_x [la cedula a chequear]
 * @return {bolean}          [regresa verdadero si todo esta bien, falso si no.]
 */
function validacionCedula(cedula_x){
	// datos de la cedula sin espacios:
	var cedula = cedula_x.replace(/^\s+|\s+$/g, '');
	if (cedula == "" || cedula.length != 8) {
		return false;
	}else if( /[^\d+]/g.exec(cedula) ){
		return false;
	}else{
		return true;
	}
}
