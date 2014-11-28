/**
 * @author Granadillo A.
 * Para chequear los campos de estado, municipio y parroquia
 */
$('#cod_est').on('ready change', function(){
  if ($(this).val() === "" || $(this).val() === undefined) {
    $("#cod_est_chequeo").html('Por favor seleccione una opcion apropiada.');
    $('#cod_est').parent().addClass('has-error');
    $('#cod_mun').prop('disabled', true);
    $('#cod_parro').prop('disabled', true);
    $('#cod_parro').prop('selected', false);
    $('#cod_parro').val('').prop('selected', true);
  }else{
    $("#cod_est_chequeo").html('');
    $('#cod_est').parent().removeClass('has-error').addClass('has-success');
    $('#cod_mun').prop('disabled', false);
    $('#cod_parro').prop('disabled', true);
    $('#cod_parro').prop('selected', false);
    $('#cod_parro').val('').prop('selected', true);
  };
});
$('#cod_mun').on('change', function(){
  if ($(this).val() === "" || $(this).val() === undefined) {
    $("#cod_mun_chequeo").html('Por favor seleccione una opcion apropiada.');
    $('#cod_mun').parent().addClass('has-error');
    $('#cod_parro').prop('disabled', true);
    $('#cod_parro').prop('selected', false);
    $('#cod_parro').val('').prop('selected', true);
  }else{
    $("#cod_mun_chequeo").html('');
    $('#cod_mun').parent().removeClass('has-error').addClass('has-success');
    $('#cod_parro').prop('disabled', false);
  };
});
$('#cod_parro').on('change', function(){
  if ($(this).val() === "" || $(this).val() === undefined) {
    $("#cod_parro_chequeo").html('Por favor seleccione una opcion apropiada.');
    $('#cod_parro').parent().addClass('has-error');
  }else{
    $("#cod_parro_chequeo").html('');
    $('#cod_parro').parent().removeClass('has-error').addClass('has-success');
  };
});
