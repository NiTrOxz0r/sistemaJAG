/**
 * @author Alejandro Granadillo.
 *
 * @internal esta funcion sirve para cambiar
 * dinamicamente las opciones de consultas.
 *
 * @description [validaciones de los campos relacionados
 * a las consultas de los modulos de PI/A/PA.]
 *
 * @todo a la espera de mis 20 puntos correspondientes.
 *
 * @version 1.1
 */
$(function(){
  // cambiamos de una vez
  // estructura del formulario:
  $('#informacion').prop('disabled', true);
  $('#tipo_personal').prop('disabled', true);
  $('#submit').prop('disabled', true);
  // se cambia la estructura del formulario
  // dependiendo de lo que el usuario escoja en el primer select
  // (tipo) = por cedula, por cargo, etc.
  $('#tipo').on('change', function(){
    // para mantener la estructura del formulario
    $("#informacion_chequeo").html('&nbsp;'); // !importante
    var tipo = $(this).val();
    if (tipo === '0') {
      $('#informacion').prop('disabled', true);
      $('#informacion').prop('readonly', false);
      $('#informacion').prop('hidden', false);
      $('#informacion').parent().removeClass('hidden').addClass('show');
      $('#informacion_lista').prop('disabled', true);
      $('#informacion_lista').parent().removeClass('show').addClass('hidden');
      $('#informacion_lista').prop('hidden', true);
      $('#tipo_personal').prop('disabled', true);
      $('#tipo_personal').prop('hidden', false);
      $('#tipo_personal').parent().removeClass('hidden').addClass('show');
      $('#submit').prop('disabled', true);
    }else if (tipo === '4'){
      $('#informacion').prop('value', '');
      $('#informacion').prop('readonly', true);
      $('#informacion').prop('hidden', true);
      $('#informacion').parent().removeClass('show').addClass('hidden');
      $('#informacion').prop('disabled', true);
      $('#informacion_lista').prop('hidden', false);
      $('#informacion_lista').prop('disabled', false);
      $('#informacion_lista').parent().removeClass('hidden').addClass('show');
      $('#tipo_personal').prop('value', '6');
      $('#tipo_personal').prop('hidden', true);
      $('#tipo_personal').parent().removeClass('show').addClass('hidden');
      $('#tipo_personal').prop('disabled', false);
      $('#submit').prop('disabled', true);
    }else if (tipo === '5' || tipo === '6'){
      $('#informacion').prop('disabled', false);
      $('#informacion').prop('hidden', true);
      $('#informacion').parent().removeClass('show').addClass('hidden');
      $('#informacion').prop('readonly', true);
      $('#informacion').prop('value', 'status');
      $('#informacion_lista').prop('disabled', true);
      $('#informacion_lista').prop('hidden', true);
      $('#informacion_lista').parent().removeClass('hidden').addClass('show');
      $('#tipo_personal').prop('hidden', false);
      $('#tipo_personal').parent().removeClass('hidden').addClass('show');
      $('#tipo_personal').prop('disabled', false);
      $('#submit').prop('disabled', true);
    }else if (tipo === '7'){
      $('#informacion').prop('disabled', false);
      $('#informacion').prop('hidden', true);
      $('#informacion').parent().removeClass('show').addClass('hidden');
      $('#informacion').prop('readonly', true);
      $('#informacion').prop('value', 'status');
      $('#informacion_lista').prop('disabled', true);
      $('#informacion_lista').prop('hidden', true);
      $('#informacion_lista').parent().removeClass('hidden').addClass('show');
      $('#tipo_personal').prop('disabled', true);
      $('#submit').prop('disabled', false);
    }else{
      $('#informacion').prop('value', '');
      $('#informacion').prop('disabled', false);
      $('#informacion').prop('hidden', false);
      $('#informacion').parent().removeClass('hidden').addClass('show');
      $('#informacion').prop('readonly', false);
      $('#informacion_lista').prop('disabled', true);
      $('#informacion_lista').prop('hidden', true);
      $('#informacion_lista').parent().removeClass('show').addClass('hidden');
      $('#tipo_personal').prop('hidden', false);
      $('#tipo_personal').parent().removeClass('hidden').addClass('show');
      $('#tipo_personal').prop('disabled', false);
    };
  });
  $('#informacion').on('change', function(){
    var campo = $(this).val().replace(/^\s+|\s+$/g, '');
    if (campo === "") {
      $('#submit').prop('disabled', true);
      $("#informacion_chequeo").html('este campo no puede estar vacio.');
      $("#informacion_chequeo").parent().addClass('has-error');
    };
    // valores de expresiones regulares:
    var tipo = $('#tipo').val();
    var numerosChequeo = /[^\d+]/g;
    var nombresChequeo = /[^A-Za-záéíóúÑñÁÉÍÓÚ-]/g;
    // comprobacion de campos dentro del formulario:
    if (tipo === '1') {
      if(campo.length < 6){
        $('#submit').prop('disabled', true);
        $("#informacion_chequeo").html('cedula no puede ser menor a 6 caracteres');
        $("#informacion_chequeo").parent().addClass('has-error');
      }else if(campo.length > 8){
        $('#submit').prop('disabled', true);
        $("#informacion_chequeo").html('cedula no puede ser mayor a 8 caracteres');
        $("#informacion_chequeo").parent().addClass('has-error');
      }else if( numerosChequeo.exec(campo) ){
        $('#submit').prop('disabled', true);
        $("#informacion_chequeo").html('Favor introduzca cedula solo numeros sin caracteres especiales, EJ: 12345678');
        $("#informacion_chequeo").parent().addClass('has-error');
      }else{
        $("#informacion_chequeo").html('&nbsp;');
        $("#informacion_chequeo").parent().removeClass('has-error').addClass('has-success');
        $('#submit').prop('disabled', false);
      }
    }else if( tipo === '2' || tipo === '3' ) {
      if(campo.length > 20){
        $('#submit').prop('disabled', true);
        $("#informacion_chequeo").html('este campo no puede ser mayor a 20 caracteres');
        $("#informacion_chequeo").parent().addClass('has-error');
      }else if( nombresChequeo.test(campo) ){
        $('#submit').prop('disabled', true);
        $("#informacion_chequeo").html('Favor introduzca en este campo Letras sin numeros o caracteres especiales EJ: 19?=;@*');
        $("#informacion_chequeo").parent().addClass('has-error');
      }else{
        $("#informacion_chequeo").html('&nbsp;');
        $("#informacion_chequeo").parent().removeClass('has-error').addClass('has-success');
        $('#submit').prop('disabled', false);
      }
    };
  });
  // comprobacion del select de cargo:
  $('#informacion_lista').on('change', function(){
    var campo = $(this).val();
    console.log(campo);
    if (campo === '0') {
      $('#submit').prop('disabled', true);
    }else{
      $('#submit').prop('disabled', false);
    };
  });
  // comprobacion del select de tipo_personal:
  $('#tipo_personal').on('change', function(){
    var campo = $(this).val();
    console.log(campo);
    if (campo === '') {
      $('#submit').prop('disabled', true);
    }else{
      $('#submit').prop('disabled', false);
    };
  });
});
