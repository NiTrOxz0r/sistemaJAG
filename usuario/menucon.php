<?php
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario(1, 3, $_SESSION['cod_tipo_usr']);

//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
//DESDE empezarPagina.php
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);

//CONTENIDO:?>
<div id="contenido_usuario_menucon">
  <div id="blancoAjax">
    <div class="container">
      <!-- CONTENIDO EMPIEZA DEBAJO DE ESTO: -->
      <!-- DETALLESE QUE NO ES UN ID SINO UNA CLASE. -->
      <div class="row">
        <div class="col-xs-8 col-xs-offset-2 bg-primary redondeado margenAbajo">
          <div class="row">
            <div class="col-xs-12">
              <h3>
                Para hacer una consulta por favor seleccione el
                tipo que Usted desea realizar:
              </h3>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <form
            role="form"
            id="consulta_singular_U"
            name="consulta_singular_U"
            action="consultar_U.php"
            method="POST">
            <div class="form-group">
              <label
              for="tipo"
              id="tipo_titulo"
              class="control-label">Tipo de consulta:</label>
              <select
                class="form-control"
                name="tipo"
                id="tipo"
                autofocus="autofocus"
                required>
                <option selected="selected" value="0">--Seleccione--</option>
                <option value="1">Por cedula</option>
                <option value="2">Por Nombre</option>
                <option value="3">Por Apellido</option>
                <option value="4">Por Cargo</option>
                <option value="5">Regitro activo</option>
                <option value="6">Regitro inactivo</option>
                <option value="7">Todos los Registros</option>
              </select>
              <p class="help-block" id="tipo_chequeo">
              </p>
            </div>
            <div class="form-group">
              <label
              for="informacion"
              id="informacion_titulo"
              class="control-label">Favor especifique:</label>
              <div class="input-group">
                <input
                  class="form-control"
                  type="text"
                  name="informacion"
                  id="informacion">
              </div>
              <div class="input-group hidden">
                <?php $query = "SELECT codigo, descripcion from cargo where status = 1;";
                  $resultado = conexion($query);?>
                <select class="form-control" name="informacion" id="informacion_lista">
                  <option value="" selected="selected">--Seleccione--</option>
                  <?php while ( $datos = mysqli_fetch_array($resultado) ) : ?>
                    <option value="<?php echo $datos['codigo']; ?>">
                      <?php echo $datos['descripcion']; ?>
                    </option>
                  <?php endwhile; ?>
                </select>
              </div>
              <p class="help-block" id="informacion_chequeo">
              </p>
            </div>
            <div class="form-group">
              <label
              for="tipo_personal"
              id="tipo_personal_titulo"
              class="control-label">Seleccione:</label>
              <?php $query = "SELECT codigo, descripcion from tipo_personal where status = 1;";
                $resultado = conexion($query);?>
              <select class="form-control" name="tipo_personal" id="tipo_personal" required>
                <option value="" selected="selected">--Seleccione--</option>
                <?php while ( $datos = mysqli_fetch_array($resultado) ) : ?>
                  <option value="<?php echo $datos['codigo']; ?>">
                    <?php echo $datos['descripcion']; ?>
                  </option>
                <?php endwhile; ?>
                <option class="hidden" hidden value="6">Todos</option>
              </select>
              <p class="help-block" id="tipo_personal_chequeo">
              </p>
            </div>
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <input
                type="submit"
                id="submit"
                value="Consultar"
                class="btn btn-default btn-block">
              </div>
            </div>
            <div class="form-group">
              <div id="error" class="chequeo">
                <!-- chequeo por medio de ajax: -->
                <span class="error" id="error">

                </span>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-8 col-xs-offset-2 bg-info redondeado margenAbajo">
          <div class="row">
            <div class="col-xs-12">
              <h3>
                Si Ud. desea registrar o actualizar a un personal interno de esta
                institucion, puede hacerlo especificando la cedula de identidad:
              </h3>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <form
            role="form"
            name="form_PI"
            id="form_PI"
            method="GET">
            <div class="form-group">
               <label for="cedula" class="control-label">Cedula:</label>
              <input
                class="form-control"
                type="text"
                id="cedula"
                name="cedula"
                maxlength="8"
                required>
              <p class="help-block" id="cedula_chequeo">
              </p>
            </div>
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <input
                type="submit"
                id="submitDos"
                value="Registrar"
                class="btn btn-default btn-block"
                disabled>
              </div>
            </div>
            <div id="error" class="chequeo">
              <!-- chequeo por medio de ajax: -->
              <span class="error" id="error">

              </span>
            </div>
          </form>
        </div>
      </div>
      <!-- validacion -->
      <?php $menucon = enlaceDinamico('java/otros/menucon.js') ?>
      <script type="text/javascript">
        $.ajax({
          url: "<?php echo $menucon ?>",
          type: 'POST',
          dataType: 'script'
        });
      </script>
      <!-- cedula -->
      <script type="text/javascript">
        /**
         * hecho por slayerfat, dudas o sugerencias ya saben donde estoy.
         *
         * chequeo y operaciones relacionadas con ajax
         * para el campo cedula.
         *
         * no se utiliza cedula.js porque este formulario esta estructurado
         * diferente en comparacion a un formulario normal.
         */
        $(function(){
          $.ajax({
            url: '../java/validacionCedula.js',
            type: 'POST',
            dataType: 'script'
          });
          $('#cedula').on('change', function(){
            var cedula = $(this).val();
            if ( validacionCedula(cedula) ) {
              $("#cedula_chequeo").empty();
              $.ajax({
                url: '../java/ajax/general/cedula.php',
                type: 'POST',
                data: {cedula:cedula},
                success: function (datos){
                  $('#cedula_chequeo').empty();
                  //se comprueba si es valido o no por
                  //medio del data-disponible
                  //true si esta disponible, falso si no.
                  var disponible = $(datos+'#disponible').data('disponible');
                  if (disponible === true) {
                    $('#cedula_chequeo').html('&nbsp;');
                    $('#submitDos').prop('disabled', false);
                    $('#submitDos').prop('value', 'Registrar');
                    $('#form_PI').prop('action', 'form_reg_PI.php');
                  }else{
                    $('#cedula_chequeo').html('Este Usuario ya se encuentra en el sistema.');
                    $('#submitDos').prop('disabled', false);
                    $('#submitDos').prop('value', 'Actualizar');
                    $('#form_PI').prop('action', 'form_act_PI.php');
                  };
                },
              });
            }else{
              $("#cedula_chequeo").html('Favor introduzca cedula solo numeros sin caracteres especiales, EJ: 12345678');
              $("#cedula_titulo").css('color', 'red');
              $('#submitDos').prop('disabled', true);
            };
          });
          // apenas se pretenda enviar el formulario:
          $('#form_PI').on('submit', function (evento){
            //se previene el envio:
            evento.preventDefault();
            // se comprueba que los datos esten en orden:
            var cedula = $('#cedula').val();
            if ( validacionCedula(cedula) ) {
              var action = $(this).attr('action');
              $.ajax({
                url: action,
                type: 'GET',
                dataType: 'html',
                data: {cedula:cedula},
                success: function (datos){
                  $("#contenido_usuario_menucon").empty().append($(datos).find('#blancoAjax').html());
                },
              });
              return true;
            }else{
              return false;
            };
          });
        });
      </script>
      <!-- <script type="text/javascript">
        // desabilitado por ser incompatible con este formulario
        $(function(){
          $.post('../java/ajax/cedula.js');
        });
      </script> -->
      <!-- CONTENIDO TERMINA ARRIBA DE ESTO: -->
    </div>
  </div>
</div>

<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>
