/**
 * @author Alejandro Granadillo. <slayerfat@gmail.com>
 *
 * @internal [validacion de email para el usuario de ajax en algun formulario.]
 *
 * [validacionEmail chequeo de la cedula en diferentes formularios
 * solo chequea esa variable, especificamente hecho para ajax.]
 *
 * @param  {string} email_X  [email a chequear]
 * @return {bolean}          [regresa verdadero si todo esta bien, falso si no.]
 */
function validacionEmail(email_X){
  // datos de la cedula sin espacios:
  var email = email_X.replace(/^\s+|\s+$/g, '');
  var regExp = /^[0-9a-zA-Z-_\$#]+@[0-9a-zA-Z-_\$#]+\.[a-zA-Z]{2,5}/;
  if (email.length > 40) {
    return false;
  }else if (!regExp.test(email) && email != "") {
    return false;
  }else{
    return true;
  }
}

