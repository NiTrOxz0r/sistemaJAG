$(function(){
  $('#tabla').click(function(){
    var valor = 'form_act_PI.php?cedula='+$('.selected').children('.cedula').text().replace(/^\s+|\s+$/g, '');
    $('#consultarRegistro').attr('href', valor);
    $('#consultarRegistro').removeClass('disabled btn-warning').addClass('btn-primary');
  });
});
