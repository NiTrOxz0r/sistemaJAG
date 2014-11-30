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
// ver 1.1

$(function(){
  $('#tabla').click(function(){
    var enlace;
    enlace = $('[data-enlace-primario]').data('enlace-primario');
    if (enlace === undefined) {
      enlace = $('[data-enlace-relacionado]').data('enlace-relacionado');
    };
    if (enlace) {
      var datos = $('.selected').children('.codigo').text().replace(/^\s+|\s+$/g, '');
      if (datos) {
        var valor = enlace+'?codigo='+datos;
        $('#consultar-codigo').attr('href', valor);
        $('#consultar-codigo').removeClass('disabled btn-warning').addClass('btn-primary');
      };
    };
  });
});
