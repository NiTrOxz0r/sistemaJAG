<?php
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);

// invocamos validarUsuario.php desde master.php
validarUsuario(1, 2, $_SESSION['cod_tipo_usr']);

//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
//DESDE empezarPagina.php
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>
<div id="contenido_form_act_C">
  <div id="blancoAjax">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
          <form role="form" action="insertar_C.php" method="POST" name="form" id="form">
            <div class="row">
              <div class="form-group">
                <label class="control-label" for="docente">
                  Docente asociado
                </label>
                <?php
                  $query ="SELECT
                  personal.codigo,
                  certificado_1.descripcion as certificado_1,
                  certificado_2.descripcion as certificado_2,
                  certificado_3.descripcion as certificado_3,
                  certificado_4.descripcion as certificado_4,
                  personal.descripcion_1,
                  personal.descripcion_2,
                  personal.descripcion_3,
                  personal.descripcion_4,
                  nivel_instruccion.descripcion as nivel_instruccion,
                  persona.p_nombre,
                  persona.p_apellido,
                  persona.s_apellido,
                  persona.telefono,
                  personal.email
                  from personal
                  inner join certificado as certificado_1
                  on personal.certificado_1 = certificado_1.codigo
                  inner join certificado as certificado_2
                  on personal.certificado_2 = certificado_2.codigo
                  inner join certificado as certificado_3
                  on personal.certificado_3 = certificado_3.codigo
                  inner join certificado as certificado_4
                  on personal.certificado_4 = certificado_4.codigo
                  inner join nivel_instruccion
                  on personal.nivel_instruccion = nivel_instruccion.codigo
                  inner join persona
                  on personal.cod_persona = persona.codigo
                  where persona.status = 1 and personal.status = 1
                  order by persona.p_apellido;";
                  $resultado = conexion($query); ?>
                <select id="docente" name="docente" class="form-control">
                  <option value="null" selected="">Seleccione</option>
                  <option value="-1">Sin Docente Asociado</option>
                  <?php while ( $docente = mysqli_fetch_array($resultado) ) :
                    $datos = "";
                    if ($docente['certificado_1'] !== '-') :
                      $datos .= "<strong>$docente[certificado_1]:</strong>
                              </br>
                              <span>$docente[descripcion_1].</span>
                              </br>";
                    endif;
                    if ($docente['certificado_2'] !== '-') :
                      $datos .= "<strong>$docente[certificado_2]:</strong>
                              </br>
                              <span>$docente[descripcion_2].</span>
                              </br>";
                    endif;
                    if ($docente['certificado_3'] !== '-') :
                      $datos .= "<strong>$docente[certificado_3]:</strong>
                              </br>
                              <span>$docente[descripcion_3].</span>
                              </br>";
                    endif;
                    if ($docente['certificado_4'] !== '-') :
                      $datos .= "<strong>$docente[certificado_4]:</strong>
                              </br>
                              <span>$docente[descripcion_4].</span>
                              </br>";
                    endif;?>
                    <option
                      data-contenido="<?php echo $datos ?>"
                      value="<?php echo $docente['codigo'] ?>">
                      <?php echo $docente['p_apellido'] ?>,
                      <?php echo $docente['s_apellido'] === ('-') ? null : $docente['s_apellido'].", " ?>
                      <?php echo $docente['p_nombre'] ?>,
                      <?php echo $docente['nivel_instruccion'] ?>,
                      <?php echo $docente['telefono'] === ('-') ? null : $docente['telefono'].", " ?>
                      <?php echo $docente['email'] ?>.
                    </option>
                  <?php endwhile; ?>
                </select>
                <p class="help-block" id="docente_chequeo">
                </p>
              </div>
              <div class="form-group">
                <label class="control-label" for="curso">
                  Curso
                </label>
                <?php
                  $query = "SELECT
                  curso.codigo,
                  curso.descripcion
                  from curso
                  where status = 1;";
                  $resultado = conexion($query); ?>
                <select id="curso" required name="curso" class="form-control">
                  <?php while ( $curso = mysqli_fetch_array($resultado) ) : ?>
                    <option value="<?php echo $curso['codigo'] ?>">
                      <?php echo $curso['descripcion'] ?>
                    </option>
                  <?php endwhile; ?>
                </select>
                <p class="help-block" id="curso_chequeo">
                </p>
              </div>
              <div class="form-group">
                <label class="control-label" for="periodo_academico">
                  Periodo Académico
                </label>
                <?php
                  $query = "SELECT
                  periodo_academico.codigo,
                  periodo_academico.descripcion
                  from periodo_academico
                  where status = 1;";
                  $resultado = conexion($query); ?>
                <select
                  id="periodo_academico"
                  required
                  name="periodo_academico"
                  class="form-control">
                  <?php while ( $periodo = mysqli_fetch_array($resultado) ) : ?>
                    <option value="<?php echo $periodo['codigo'] ?>">
                      <?php echo $periodo['descripcion'] ?>
                    </option>
                  <?php endwhile; ?>
                </select>
                <p class="help-block" id="periodo_academico_chequeo">
                </p>
              </div>
              <div class="form-group">
                <label class="control-label" for="comentarios">
                  Comentarios Adicionales
                </label>
                <input
                  type="text"
                  maxlength="200"
                  name="comentarios"
                  id="comentarios"
                  class="form-control"
                  placeholder="Puede agregar los comentarios que desee aquí!">
                <p class="help-block" id="comentarios_chequeo">
                </p>
              </div>
            </div>
            <!-- boton -->
            <div class="row margenArriba">
              <div class="col-sm-4 col-sm-offset-4">
                <input
                role="button"
                id="submit"
                class="btn btn-primary btn-block"
                type="submit"
                disabled
                name="registrar"
                value="Registrar">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- control de formulario -->
    <script type="text/javascript">
      $(function(){
        $('#form').on('click, change', function(){
          if ( isNaN($('#docente').val()) ) {
            $('#submit').prop('disabled', true);
          }else if ( isNaN($('#curso').val()) ) {
            $('#submit').prop('disabled', true);
          }else if ( isNaN($('#periodo_academico').val()) ) {
            $('#submit').prop('disabled', true);
          }else{
            $('#submit').prop('disabled', false);
          };
        });
      });
    </script>
    <!-- menu dinamico -->
    <script type="text/javascript">
      // slayerfat
      // se quedaron locos verdad?
      $(function() {
        $('#docente').on('change', function() {
          var tipo = $(this).val();
          var datos = $(this).children('option:selected').data('contenido');
          if (tipo != 'null' && tipo != '-1') {
            $(this).popover({
                html: true,
                trigger: 'manual',
                title: "Certificados",
                placement: "right",
                content: function (){
                  return $(this).children('option:selected').data('contenido')
                }
            }).popover('show');
          }else{
            $(this).popover('destroy');
          }
        });
      });
    </script>
  <!-- FIN DE BLANCO AJAX -->
  </div>
</div>
<?php finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>
