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
                tipo de consulta que Usted desea realizar:
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
        <div class="col-xs-8 col-xs-offset-2 bg-primary redondeado margenAbajo">
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
      <script type="text/javascript">
        /**
         * hecho por slayerfat, dudas o sugerencias ya saben donde estoy.
         *
         * validaciones de los campos relacionados a las consultas de PI.
         */
        //debido a que las validaciones hechas por
        //este script solo es usado en este archivo,
        //se considero no pasar este script a un
        //archivo aparte como otros archivos.
        // iniciamos jQuery:
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
          //debido a que las validaciones hechas por
          //este script solo es usado en este archivo,
          //se considero no pasar este script a un
          //archivo aparte como otros archivos.
          $('#informacion').on('change', function(){
            var campo = $(this).val().replace(/^\s+|\s+$/g, '');
            if (campo === "") {
              $('#submit').prop('disabled', true);
              $(this).focus();
              $("#informacion_chequeo").html('este campo no puede estar vacio.');
              $("#informacion_chequeo").parent().addClass('has-error');
            };
            // valores de expresiones regulares:
            var tipo = $('#tipo').val();
            var numerosChequeo = /[^\d+]/g;
            var nombresChequeo = /[^A-Za-záéíóúÁÉÍÓÚ-]/g;
            // comprobacion de campos dentro del formulario:
            if (tipo === '1') {
              if(campo.length < 6){
                $('#submit').prop('disabled', true);
                $(this).focus();
                $("#informacion_chequeo").html('cedula no puede ser menor a 6 caracteres');
                $("#informacion_chequeo").parent().addClass('has-error');
              }else if(campo.length > 8){
                $('#submit').prop('disabled', true);
                $(this).focus();
                $("#informacion_chequeo").html('cedula no puede ser mayor a 8 caracteres');
                $("#informacion_chequeo").parent().addClass('has-error');
              }else if( numerosChequeo.exec(campo) ){
                $('#submit').prop('disabled', true);
                $(this).focus();
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
                $(this).focus();
                $("#informacion_chequeo").html('este campo no puede ser mayor a 20 caracteres');
                $("#informacion_chequeo").parent().addClass('has-error');
              }else if( nombresChequeo.test(campo) ){
                $('#submit').prop('disabled', true);
                $(this).focus();
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
