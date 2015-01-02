/**
 * @author Alejandro Granadillo.
 *
 * @internal [usen esto si van a hacer ajax de cedula en algun formulario.]
 *
 * [validacionCedula chequeo de la cédula en diferentes formularios
 * solo chequea esa variable, especificamente hecho para ajax.]
 *
 * @param  {string} cedula_x [la cédula a chequear]
 * @return {bolean}          [regresa verdadero si todo esta bien, falso si no.]
 */
function validacionCedula(cedula_x){
  // datos de la cédula sin espacios:
  var cedula = cedula_x.replace(/^\s+|\s+$/g, '');
  var n = parseInt(cedula_x);
  if (cedula == "" || cedula.length != 8) {
    return false;
  }else if( /[^\d+]/g.exec(cedula) ){
    return false;
  }else if( n < 100000 ){
    return false;
  }else{
    return true;
  }
}
/**
 * @author Alejandro Granadillo.
 *
 * @internal [usen esto si van a hacer ajax de cedulaEscolar en algun formulario.]
 *
 * [validacionCedula chequeo de la cédula en diferentes formularios
 * relacionados con cédula escolar de alumno,
 * solo chequea esa variable, especificamente hecho para ajax.]
 *
 * @param  {string} cedula_x [la cédula a chequear]
 * @return {bolean}          [regresa verdadero si todo esta bien, falso si no.]
 */
function validacionCedulaEscolar(cedula_x){
  // datos de la cédula sin espacios:
  var cedula = cedula_x.replace(/^\s+|\s+$/g, '');
  var n = parseInt(cedula_x);
  if (cedula == "" || cedula.length != 10) {
    return false;
  }else if( /[^\d+]/g.exec(cedula) ){
    return false;
  }else if( n < 1000000000 ){
    // 1XYYYYYYYY
    // donde
    // 1 es el numero minimo de hijos que puede tener
    // X es el año de nacmineto
    // YYYYYYYY es la cédula del representante (o la suya propia)
    return false;
  }else{
    return true;
  }
}
