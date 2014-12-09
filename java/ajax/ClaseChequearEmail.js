/**
 * @author Alejandro Granadillo <slayerfat@gmail.com>
 *
 * [ChequearEmail  chequeo y operaciones relacionadas con ajax
 *                 para el campo email.]
 * @param {object} $email [jQuery object, objeto donde esta el correo (id=mail)]
 * @param {string} tabla  [lugar donde esta el correo para hacer el query]
 *
 * @version 1.0
 */
/**

 */
function ChequearEmail($email, tabla){
  $.ajax({
    url: '../java/validacionEmail.js',
    type: 'POST',
    dataType: 'script'
  });
  this.email = $email;
  this.tabla = tabla;
}

/**
 * cambiar utilizado para cambiar la variable del objeto (email)
 */
ChequearEmail.prototype.cambiar = function(){
  this.cambio = this.email.val();
  console.log('en cambiar, valor: '+this.cambio);
}

/**
 * crea la variable de control de email (para actualizaciones)
 */
ChequearEmail.prototype.original = function(){
  this.original = this.email.val();
  console.log('en original: '+this.original);
}

/**
 * [chequear hace todos los chequeos del campo]
 */
ChequearEmail.prototype.chequear = function(){
  console.log('dentro de chequear:');
  if (this.original === undefined) {return false;}
  if (this.original === this.cambio){
    console.log('original y cambio son iguales!');
    $('#email_chequeo_adicional').empty();
    $('#email_chequeo').empty();
    $('#form input, #form select, #form textarea').each(function(){
      $(this).parent().removeClass('has-error');
      $(this).prop('disabled', false);
    });
    // bloquea datos que necesiten estar bloqueados:
    $('.bloquear').each(function(){
      $(this).prop('disabled', true);
    });
  }else if ( validacionEmail(this.cambio) ) {
    console.log('validacion de email: true');
    $("#email_chequeo").empty();
    $.ajax({
      url: '../java/email.php',
      type: 'POST',
      data: {
        email:this.cambio,
        tabla:this.tabla
      },
      success: function (datos){
        console.log('ajax success');
        $('#email_chequeo').empty();
        //se comprueba si es valido o no por
        //medio del data-disponible
        //true si esta disponible, falso si no.
        var disponible = $(datos+'#disponible').data('disponible');
        if (disponible === true) {
          console.log('disponible: true');
          $('#email_chequeo_adicional').empty();
          $('#form input, #form select, #form textarea').each(function(){
            $(this).parent().removeClass('has-error');
            $(this).prop('disabled', false);
          });
          // bloquea datos que necesiten estar bloqueados:
          $('.bloquear').each(function(){
            $(this).prop('disabled', true);
          });
        }else{
          console.log('disponible: false');
          $('#form input, #form select, #form textarea').each(function(){
            $(this).parent().addClass('has-error');
            $(this).prop('disabled', true);
          });
          $('#email').prop('disabled', false);
          $('#email_chequeo').html('Email en sistema!</br>para continuar con el registro especifique otro email.');
        };
      },
      error: function() {
        console.log('error ajax');
      }
    });
  }else{
    console.log('validacion email: false');
    $('#email_chequeo').html('correo debe estar en este formato: algo@algunDominio.com.');
    $('#submit').prop('disabled', true);
    $('#submitDos').prop('disabled', true);
  };
}
