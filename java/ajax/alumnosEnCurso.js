//            ......                                                                ..';c'
//        .colc::cloxdl;'                                                           .;dK0.
//     .;dc,.........:oxkO,                                                          ;kXd'
//   .;xx;,.           kx;,                                                          ;kXc.
//   :dx;.              ..                                                           :kXc.
//  ,xK;.                        .;:;::ll:,          ',',;;;,.         .,';,',;:c,   :OX:.     .::;:ll:,  .,;..
// ;;OK'                       .:d'.....;Okkc      ,o'.....,ccl;     .d,...,ddkl...  :OX:.   .ld.....cxOd
// :cOK.                      .l0,.      .kkOl   .;k:'.     .cld:   ,oc'    .odkl    :OX:.  'c0,.    .O0Ol
// dok0.                     .;kK'        .dk0c  ,lO;        .clxc .:kc.      lkX.   cOX:.  :x0' .:lc;',,.
// loxO;             ..  ... ::0K.         cd00  :lO,         :cxk .oxO.      :kk,   :0X:.  :k0,,,....
//  ddxO,          ';:;:;d0. ,lO0.         :dKx. :cxo         ;cOo. dkkx     .kx;.   :0X:.  lk0o.
//  .xxxk,           ..:cOK'  ok0k.        cOO;  :cox.        ;dk;   ,dxxc..ll,,.    :0X:.  lkO0,
//   .lxxxx.           ;cOK.   xO0O       ,OO;.   ;ooo.      .xx;.    ..'.clO:.      cOX:.   cOOOx.      .
//     ,lkkkx;'.      .ox00.    ,dOOo,',;cl;,.     'cod:'..';c;,.         :dxxl.    'xKKOl,   ,oO00Ooool,.
//       .,ldxxxxdolc:;,,,,.     ..,:;,.....         .';,'.....      .clc:ccxkxkd.    ',''..    .,ccc:'..
//            .......                                             .'dl'......'lxxO
//                                                                ,oO;.        .x0.
//                                                                lxO'          kk'
//                                                                ;dkk:'.    .:o:,.
//                                                                 .:oddddooc;....
//                                                                    .........
// CCC OOO NNN TTT RRR AAA TTT AAA MMM EEE !!! !!! !!! slayerfat@gmail.com

$(function(){
  $('#curso').on('change', function(){
    $.ajax({
      url: '../java/ajax/alumno/cursoCantidadAlumnos.php',
      type: 'POST',
      dataType: 'json',
      data: {codigo:$(this).val()},
      success: function (datos) {
        // nota:
        // datos es un array multidimensional o
        // matriz de index x campo
        $(datos).each(function(index,campo){
          $.each(campo,function(kampo,valor){
            if (valor < 20) {
              $('#curso_chequeo_adicional').empty().append('Hay '+valor+' o mas (aprox.) alumnos en este curso.').addClass('bg-success');
            }else if (valor > 30){
              $('#curso_chequeo_adicional').empty().append('Hay '+valor+' o mas (aprox.) alumnos en este curso.').addClass('bg-warning');
            }else if (valor > 45){
              $('#curso_chequeo_adicional').empty().append('Hay '+valor+' o mas (aprox.) alumnos en este curso.').addClass('bg-danger');
            };
          });
        });
      },
    });
  });
});
