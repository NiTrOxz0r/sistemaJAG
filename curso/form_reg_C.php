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
                  personal.titulo,
                  nivel_instruccion.descripcion as nivel_instruccion,
                  persona.p_nombre,
                  persona.p_apellido,
                  persona.s_apellido
                  from personal
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
                  <?php while ( $docente = mysqli_fetch_array($resultado) ) : ?>
                    <option value="<?php echo $docente['codigo'] ?>">
                      <?php echo $docente['p_apellido'] ?>,
                      <?php echo $docente['s_apellido'] === (null) ? null : $docente['s_apellido'].", " ?>
                      <?php echo $docente['p_nombre'] ?>,
                      <?php echo $docente['nivel_instruccion'] ?>
                      <?php echo $docente['titulo'] === (null) ? null : ", ".$docente['titulo'] ?>.
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
                  Periodo Academico
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
                  placeholder="Puede agregar los comentarios que desee aqui!">
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
  <!-- FIN DE BLANCO AJAX -->
  </div>
</div>
<?php finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>