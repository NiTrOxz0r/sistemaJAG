<?php if(!isset($_SESSION)){ session_start(); }
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
$index = enlaceDinamico();
validarUsuario(1, 1, $_SESSION['cod_tipo_usr']);
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>

<div id="contenido">
  <div id="blancoAjax">
    <div class="contenido">
      <center>
        <center>
          <h1>Alumno(a).</h1>
          <h2>Consultar</h2>
        </center>

          <h4 align="center">Indique La Cedula del Alumno</h4>
            <?php $action = enlaceDinamico("alumno/consultar_A.php"); ?>
            <form action="<?php echo $action ?>" method="post" id="form_a">
              <b>Cedula</b>
              <input type="text" name="cedula" size="8" maxlength="8">
              <input type="submit" value="Enviar"/>
            </form>
              <p>
                <span id="cedula_chequeo_a">

                </span>
              </p>

          <a href="<?php echo $index ?>">Regresar a Menu</a>
      </center>
    </div>

    <?php $cargador = enlaceDinamico("java/ajax/cargadorOnClick.js"); ?>
    <script type="text/javascript" src="<?php echo $cargador; ?>"></script>
    <script type="text/javascript">
      $(function(){
        //cedula alumno
        $('#form_a :submit').on('click', function(evento){
          evento.preventDefault();
          var campo = $('#form_a [name=cedula]').val().trim();
          var cedRegex = /^[0-9]+$/;
          if (campo != "" && campo.length == 8) {
            if (campo.match(cedRegex)) {
              $('#form_a').submit();
              return true;
            }else{
              $('#cedula_chequeo_a').html('por favor introduzca la cedula sin espacios o caracteres especiales ej: 12345678');
              return false
            };

          }else{
            $('#cedula_chequeo_a').html('por favor introduzca la cedula sin espacios o caracteres especiales ej: 12345678');
            return false};
        });

        //cedula Representante
        $('#form_r :submit').on('click', function(evento){
          evento.preventDefault();
          var campo = $('#form_r [name=cedula]').val().trim();
          var cedRegex = /^[0-9]+$/;
          if (campo != "" && campo.length == 8) {
            if (campo.match(cedRegex)) {
              $('#form_r').submit();
              return true;
            }else{
              $('#cedula_chequeo_r').html('por favor introduzca la cedula sin espacios o caracteres especiales ej: 12345678');
              return false
            };

          }else{
            $('#cedula_chequeo_r').html('por favor introduzca la cedula sin espacios o caracteres especiales ej: 12345678');
            return false};
        });
      });
    </script>
  </div>
</div>
<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>
