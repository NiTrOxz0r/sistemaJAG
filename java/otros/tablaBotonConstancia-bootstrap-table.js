// se quedaron locos?
// agarra el enlace escondido en la pagina
// y crea un nuevo enlace con la data para ser enviada como get.
// ESO SIGNIFICA QUE PARA QEU ESTO FUNCIONE ES NECESARIO
// ALGO CON DATA-ENLACE-PRIMARIO/RELACIONADO...... -slayerfat
// @see curso/consultar_C.php
// @see usuario/consultar_U.php
//
// especificamente los span con class hidden.
//
// ver 1.0

$(function(){
  $('#tabla').click(function(){
    var enlace;
    enlace = $('[data-enlace-constancia]').data('enlace-constancia');
    if (enlace) {
      var datos = $('.selected').children('.cedula').text().replace(/^\s+|\s+$/g, '');
      if (datos) {
        var valor = enlace+'?cedula='+datos;
        $('#generar-constancia').attr('href', valor);
        $('#generar-constancia').removeClass('disabled btn-warning').addClass('btn-primary');
      };
    };
  });
});
