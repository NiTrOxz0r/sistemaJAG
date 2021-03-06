/**
 * @author Alejandro 20-puntos Granadillo.
 *
 * [cambiarSoloLectura una funcion sencilla que hice para
 * cambiar el estado del formulario de consulta (readonly = true)
 * a actualización (disabled = false)]
 *
 * @param  {object} $tabla   el objeto del formulario a ser manipulado.
 * @param  {string} tipo     el tipo de consulta o actualización a
 *                           mostrar en mensaje (alumno/usuario/representante)
 * @return {void}
 *
 * @version 1.0
 */
function cambiarSoloLectura($tabla, tipo){
  var x;
  $tabla.find('input, select, textarea').not('#fec_nac').each(function(){
    if($(this).prop('disabled')){
      x = false;
      $(this).prop('disabled', false);
      // $('#fec_nac').prop('disabled', false).css({
      //   'cursor': 'pointer',
      //   'background-color': '#FFFFFF'
      // });
    }else{
      x = true;
      $(this).prop('disabled', true);
      // $('#fec_nac').prop('disabled', true).css({
      //   'cursor': 'not-allowed',
      //   'background-color': '#eee'
      // });
    }
  });
  if($('#fec_nac').prop('disabled')){
    $('#fec_nac').prop('disabled', true);
    // $('#fec_nac').prop('disabled', true).css({
    //   'cursor': 'not-allowed',
    //   'background-color': '#FFFFFF'
    // });
  }else{
    $('#fec_nac').prop('disabled', false);
    // $('#fec_nac').prop('disabled', false).css({
    //   'cursor': 'pointer',
    //   'background-color': '#EEEEEE'
    // });
  }
  if (x) {
    $('#form > fieldset > legend > h1').text('consulta de '+tipo);
    $('.actualizar').removeClass('btn-info').addClass('btn-primary');
    $('#submit').addClass('btn-info').removeClass('btn-primary');
  }else{
    $('#form > fieldset > legend > h1').text('actualización de '+tipo);
    $('.actualizar').addClass('btn-info').removeClass('btn-primary');
    $('#submit').removeClass('btn-info').addClass('btn-primary');
  }
}
