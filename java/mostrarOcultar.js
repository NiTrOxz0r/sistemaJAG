/**
 * hecho por slayerfat, ya saben donde estoy.
 */

$('.mostrar').hide();
$('.ocultar').show();
$('.ocultar').addClass('mostrar').removeClass('ocultar');
$('.mostrar').addClass('ocultar').removeClass('mostrar');
$("html, body").animate({ scrollTop: 0 }, "slow");
return false;
