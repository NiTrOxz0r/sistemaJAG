<?php if(!isset($_SESSION)){ session_start(); }
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
$index = enlaceDinamico();
validarUsuario(1, 1, $_SESSION['cod_tipo_usr']);
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr'], 'sistemaJAG | Consulta de alumno');?>

<div id="contenido_alumno_menucon">
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
            id="consulta_singular_A"
            name="consulta_singular_A"
            action="consultar_A.php"
            method="POST">
            <!-- no tocar -->
            <div>
              <select id="tipo_personal" class="hidden">
                <option value="-1" selected="selected"></option>
              </select>
            </div>
            <!-- no tocar -->
            <div class="form-group">
              <label
              for="tipo"
              id="tipo_titulo"
              class="control-label">Tipo de consulta:</label>
              <select
                class="form-control"
                name="tipo"
                id="tipo"
                required>
                <option selected="selected" value="0">--Seleccione--</option>
                <option value="1">Por cédula</option>
                <option value="2">Por Nombre</option>
                <option value="3">Por Apellido</option>
                <option value="4">Por Curso</option>
                <option value="5">Registro activo</option>
                <option value="6">Registro inactivo</option>
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
                <?php $query = "SELECT
                  asume.codigo, curso.descripcion
                  from asume
                  inner join curso
                  on asume.cod_curso = curso.codigo
                  where curso.status = 1;";
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
                Si Ud. desea registrar o actualizar a un alumno de esta
                institución, puede hacerlo especificando la cédula de identidad:
              </h3>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <form
            role="form"
            name="form_A"
            id="form_A"
            method="GET">
            <div class="form-group">
               <label for="cedula" class="control-label">Cédula:</label>
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
            <div class="form-group hidden">
               <label for="cedula_r" class="control-label">Cédula del representante:</label>
              <input
                class="form-control"
                type="text"
                id="cedula_r"
                name="cedula_r"
                maxlength="8">
              <p class="help-block" id="cedula_r_chequeo">
                Si este alumno va a ser registrado <strong>por primera vez</strong>,
                es recomendable ir
                <?php $enlaceP = enlaceDinamico('personalAutorizado/form_reg_P.php') ?>
                <a href="<?php echo $enlaceP ?>">al proceso de inscripción</a>,
                de lo contrario es mejor empezar por la cédula del representante.
                <em>No se preocupe, la cédula del alumno estará en el formulario de
                registro de alumno.</em>
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
      <!-- constancia de estudios -->
      <div class="row">
        <div class="col-xs-8 col-xs-offset-2 bg-info redondeado margenAbajo">
          <div class="row">
            <div class="col-xs-12">
              <h4>
                También puede generar una constancia de inscripción
                especificando la cédula de identidad del alumno:
              </h4>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <form
            role="form"
            name="form_constancia"
            id="form_constancia"
            action="reportes/constancia-inscripcion.php"
            method="GET">
            <div class="form-group">
               <label for="constancia_cedula" class="control-label">Cédula:</label>
              <input
                class="form-control"
                type="text"
                id="constancia_cedula"
                name="cedula"
                maxlength="8"
                required>
              <p class="help-block" id="constancia_cedula_chequeo">
              </p>
            </div>
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <input
                type="submit"
                id="submitTres"
                value="Generar constancia"
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
      <!-- reporte de alumno -->
      <div class="row">
        <div class="col-xs-8 col-xs-offset-2 bg-info redondeado margenAbajo">
          <div class="row">
            <div class="col-xs-12">
              <h4>
                Si desea puede generar un reporte completo de algún alumno:
              </h4>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <form
            role="form"
            name="form_reporte"
            id="form_reporte"
            action="reportes/detallado.php"
            method="GET">
            <div class="form-group">
               <label for="reporte_cedula" class="control-label">Cédula:</label>
              <input
                class="form-control"
                type="text"
                id="reporte_cedula"
                name="cedula"
                maxlength="8"
                required>
              <p class="help-block" id="constancia_cedula_chequeo">
              </p>
            </div>
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <input
                type="submit"
                id="submitCuatro"
                value="Generar Reporte"
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
                url: '../java/cedula.php',
                type: 'POST',
                data: {cedula:cedula},
                success: function (datos){
                  $('#cedula_chequeo').empty();
                  //se comprueba si es valido o no por
                  //medio del data-disponible
                  //true si esta disponible, falso si no.
                  var disponible = $(datos+'#disponible').data('disponible');
                  if (disponible === true) {
                    $('#cedula_r').parent().removeClass('hidden');
                    $('#cedula').parent().removeClass('has-error');
                    $('#cedula').prop('readonly', true);
                    $('#cedula_chequeo').html('&nbsp;');
                    $('#submitDos').prop('disabled', false);
                    $('#submitDos').prop('value', 'Registrar');
                    $('#form_A').prop('action', 'form_reg_A.php');
                  }else{
                    $('#cedula_r').parent().addClass('hidden');
                    $('#cedula').parent().removeClass('has-error');
                    $('#cedula_chequeo').html('Este Usuario ya se encuentra en el sistema.');
                    $('#submitDos').prop('disabled', false);
                    $('#submitDos').prop('value', 'Actualizar');
                    $('#form_A').prop('action', 'form_act_A.php');
                  };
                },
              });
            }else{
              $("#cedula_chequeo").html('Favor introduzca una cedula valida, EJ: 12345678');
              $('#cedula').parent().addClass('has-error');
              $('#submitDos').prop('disabled', true);
            };
          });
          // apenas se pretenda enviar el formulario:
          $('#form_A').on('submit', function (evento){
            //se previene el envio:
            // se comprueba que los datos esten en orden:
            var cedula = $('#cedula').val();
            var cedula_r = $('#cedula_r').val();
            if (!cedula_r && $('#submitDos').prop('value') != 'Registrar') {
              cedula_r = cedula;
            };
            if ( validacionCedula(cedula) && validacionCedula(cedula_r)) {
              // var action = $(this).attr('action');
              // desabilitado por no continuar
              // la cuestion del ajax y paginas dinamicas:
              // $.ajax({
              //   url: action,
              //   type: 'GET',
              //   dataType: 'html',
              //   data: {cedula:cedula, cedula_r:cedula_r},
              //   success: function (datos){
              //     $("#contenido_alumno_menucon").empty().append($(datos).find('#blancoAjax').html());
              //   },
              // });
              return true;
            }else{
              return false;
            };
          });
          $('#constancia_cedula').on('change', function(){
            var constanciaCedula = $(this).val();
            if ( validacionCedula(constanciaCedula) ) {
              $.ajax({
                url: '../java/cedula.php',
                type: 'POST',
                data: {cedula:constanciaCedula},
                success:function(datos){
                  var disponible = $(datos+'#disponible').data('disponible');
                  if (disponible === true) {
                    $('#submitTres').prop('disabled', true);
                  }else{
                    $('#submitTres').prop('disabled', false);
                  }
                },
              });
            }else{
              return false;
            }
          });
          $('#form_constancia').on('submit', function(){
            var chequeo = $('#constancia_cedula').val();
            if ( validacionCedula(chequeo) ) {
              return true;
            }else{
              return false;
            }
          });
          $('#reporte_cedula').on('change', function(){
            var reporteCedula = $(this).val();
            if ( validacionCedula(reporteCedula) ) {
              $.ajax({
                url: '../java/cedula.php',
                type: 'POST',
                data: {cedula:reporteCedula},
                success:function(datos){
                  var disponible = $(datos+'#disponible').data('disponible');
                  if (disponible === true) {
                    $('#submitCuatro').prop('disabled', true);
                  }else{
                    $('#submitCuatro').prop('disabled', false);
                  }
                },
              });
            }else{
              return false;
            }
          });
          $('#form_reporte').on('submit', function(){
            var chequeo = $('#reporte_cedula').val();
            if ( validacionCedula(chequeo) ) {
              return true;
            }else{
              return false;
            }
          });
        });
      </script>
    </div>
  </div>
</div>
<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>
