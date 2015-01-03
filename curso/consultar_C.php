<?php
/**
 * @author [slayerfat] <[slayerfat@gmail.com]>
 *
 * {@internal [si tienen dudas sobre este archivo
 * pregunten, no es tan dificil, solo sigan el flujo del
 * mismo, esta tabla trae tanto a los cursos con y sis docentes
 * y a los alumnos de cursos.]}
 *
 * @version [1.2]
 */
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario(1, 1, $_SESSION['cod_tipo_usr']);

if ( isset($_REQUEST['tipo']) ) :
  if ($_REQUEST['tipo'] === '1') :
    // cursos existentes por docente
    $query = "SELECT
      asume.codigo as codigo,
      curso.descripcion as 'des_curso',
      periodo_academico.descripcion 'periodo_academico',
      asume.comentarios as 'comentarios',
      persona.p_apellido as 'p_apellido',
      persona.p_nombre as 'p_nombre',
      persona.cedula as 'cedula'
      from asume
      inner join periodo_academico
      on asume.periodo_academico = periodo_academico.codigo
      inner join curso
      on asume.cod_curso = curso.codigo
      inner join personal
      on asume.cod_docente = personal.codigo
      inner join persona
      on personal.cod_persona = persona.codigo
      where asume.status = 1
      order by
      periodo_academico.codigo,
      curso.codigo,
      persona.p_apellido;";
  elseif ($_REQUEST['tipo'] === '2') :
    // cursos existentes sin docentes
    $query = "SELECT
      asume.codigo as codigo,
      curso.descripcion as 'des_curso',
      periodo_academico.descripcion as 'periodo_academico',
      asume.comentarios as 'comentarios'
      from asume
      inner join periodo_academico
      on asume.periodo_academico = periodo_academico.codigo
      inner join curso
      on asume.cod_curso = curso.codigo
      where asume.status = 1 and asume.cod_docente = null
      order by
      periodo_academico.codigo,
      curso.codigo;";
  elseif ($_REQUEST['tipo'] === '3') :
    // alumnos existentes por curso
    if (isset($_REQUEST['curso'])) :
      $conexion = conexion();
      $curso = mysqli_escape_string($conexion, trim($_REQUEST['curso']) );
    else :
      header('Location: menucon.php?error=curso&valor='.$_REQUEST['curso']);
    endif;
    $query = "SELECT
      asume.codigo as codigo,
      curso.descripcion as 'des_curso',
      periodo_academico.descripcion as 'periodo_academico',
      persona.p_apellido as 'p_apellido',
      persona.p_nombre as 'p_nombre',
      persona.cedula as 'cedula',
      --COUNT(curso.descripcion) as 'total_alumnos'
      from asume
      inner join periodo_academico
      on asume.periodo_academico = periodo_academico.codigo
      inner join curso
      on asume.cod_curso = curso.codigo
      inner join alumno
      on alumno.cod_curso = asume.codigo
      inner join persona
      on alumno.cod_persona = persona.codigo
      where asume.status = 1 and asume.cod_curso = $curso
      group by
      3,2,1,4,5,6;";
  elseif ($_REQUEST['tipo'] === '4'):
    // alumnos existentes por curso (cuenta total)
    if (isset($_REQUEST['curso'])) :
      $conexion = conexion();
      $curso = mysqli_escape_string($conexion, trim($_REQUEST['curso']) );
    else :
      header('Location: menucon.php?error=curso&valor='.$_REQUEST['curso']);
    endif;
    $query = "SELECT
      asume.codigo as codigo,
      curso.descripcion as 'des_curso',
      periodo_academico.descripcion as 'periodo_academico',
      asume.comentarios as comentarios,
      COUNT(alumno.codigo) as 'total_alumnos'
      from asume
      inner join periodo_academico
      on asume.periodo_academico = periodo_academico.codigo
      inner join curso
      on asume.cod_curso = curso.codigo
      inner join alumno
      on alumno.cod_curso = asume.codigo
      where asume.status = 1 and asume.cod_curso = $curso
      group by
      3,2,1;";
  else:
    header('Location: menucon.php?error=tipo&valor='.$_REQUEST['tipo']);
  endif;
  $resultado = conexion($query);
  empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>
  <div id="contenido_consultar_C">
    <div id="blancoAjax">
      <!-- CONTENIDO EMPIEZA DEBAJO DE ESTO: -->
      <!-- DETALLESE QUE NO ES UN ID SINO UNA CLASE. -->
      <div class="container">
        <div class="row">
          <div class="col-xs-8 col-xs-offset-2 margenAbajo well">
            <div class="row">
              <div class="col-xs-12">
                <h4>
                  Listado seleccionado según los parámetros que Ud. escogió.
                </h4>
                <p>
                  <small>
                    Si desea hacer otro tipo de consulta puede
                    <a href="menucon.php">hacerlo aquí.</a>
                  </small>
                </p>
                <p>
                  <small>
                    puede regresar <a href="../index.php">al menú principal.</a>
                  </small>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <?php if ($_REQUEST['tipo'] === '1'): ?>
              <?php $enlace = enlaceDinamico('usuario/form_act_PI.php') ?>
            <?php elseif ($_REQUEST['tipo'] === '3'): ?>
              <?php $enlace = enlaceDinamico('alumno/form_act_A.php') ?>
            <?php endif ?>
            <?php $enlacePrimario = enlaceDinamico('curso/form_act_C.php') ?>
            <span
            class="hidden"
            data-enlace-primario="<?php echo $enlacePrimario ?>"
            data-enlace-relacionado="<?php echo $enlace ?>"></span>
            <div class="row center-block margen">
              <div class="col-xs-6 col-xs-offset-3">
                <a
                 id="consultar-codigo"
                 href="#"
                 class="push-3 btn btn-warning btn-lg disabled">Consultar curso</a>
                 <span class="label label-info">Seleccione un registro para consultarlo</span>
              </div>
            </div>
            <?php if ($_REQUEST['tipo'] <> '2'): ?>
              <div class="row center-block margen">
                <div class="col-xs-6 col-xs-offset-3">
                  <a
                   href="#"
                   class="inyectar-cedula push-3 btn btn-warning btn-lg disabled">Consultar Persona</a>
                   <span class="label label-info">Seleccione un registro para consultarlo</span>
                </div>
              </div>
            <?php endif ?>
            <table
              id="tabla"
              data-toggle="table"
              data-search="true"
              data-height="550"
              data-pagination="true"
              data-page-list="[10, 25, 50, 100]"
              data-show-toggle="true"
              data-show-columns="true"
              data-click-to-select="true"
              data-maintain-selected="true"
              data-sort-name="codigo">
              <thead>
                <!-- ignorar -->
                <th data-radio="true" data-switchable="false"></th>
                <!-- ignorar -->
                <?php if ($_REQUEST['tipo'] === '1'): ?>
                  <th data-field="codigo" data-sortable="true">Código</th>
                  <th data-field="curso" data-sortable="true">Descripción de curso</th>
                  <th data-field="periodo" data-sortable="true">Periodo Académico</th>
                  <th data-field="comentarios" data-sortable="true">Comentarios</th>
                  <th data-field="p_apellido" data-sortable="true">Primer Apellido</th>
                  <th data-field="p_nombre" data-sortable="true">Primer Nombre</th>
                  <th data-field="cedula" data-sortable="true" data-switchable="false">Cédula</th>
                <?php elseif ($_REQUEST['tipo'] === '2'): ?>
                  <th data-field="codigo" data-sortable="true">Código</th>
                  <th data-field="curso" data-sortable="true">Descripción de curso</th>
                  <th data-field="periodo" data-sortable="true">Periodo Académico</th>
                  <th data-field="comentarios" data-sortable="true">Comentarios</th>
                <?php elseif ($_REQUEST['tipo'] === '3'): ?>
                  <th data-field="codigo" data-sortable="true">Código</th>
                  <th data-field="curso" data-sortable="true">Descripción de curso</th>
                  <th data-field="periodo" data-sortable="true">Periodo Académico</th>
                  <th data-field="p_apellido" data-sortable="true">Primer Apellido</th>
                  <th data-field="p_nombre" data-sortable="true">Primer Nombre</th>
                  <th data-field="cedula" data-sortable="true" data-switchable="false">Cédula</th>
                <?php elseif ($_REQUEST['tipo'] === '4'): ?>
                  <th data-field="codigo" data-sortable="true">Código</th>
                  <th data-field="curso" data-sortable="true">Descripción de curso</th>
                  <th data-field="periodo" data-sortable="true">Periodo Académico</th>
                  <th data-field="comentarios" data-sortable="true">Comentarios</th>
                  <th data-field="total" data-sortable="true">Total de Alumnos</th>
                <?php endif ?>
              </thead>
              <tbody>
                <?php while ( $datos = mysqli_fetch_array($resultado) ) : ?>
                  <?php if ($_REQUEST['tipo'] === '1'): // cursos con docente?>
                    <tr>
                      <!-- ignorar -->
                        <td></td>
                      <!-- ignorar -->
                      <td class="codigo">
                        <?php echo $datos['codigo'] ?>
                      </td>
                      <td>
                        <?php echo $datos['des_curso'] ?>
                      </td>
                      <td>
                        <?php echo $datos['periodo_academico'] ?>
                      </td>
                      <td>
                        <?php echo $datos['comentarios'] ?>
                      </td>
                      <td>
                        <?php echo $datos['p_apellido'] ?>
                      </td>
                      <td>
                        <?php echo $datos['p_nombre'] ?>
                      </td>
                      <td class="cedula">
                        <?php echo $datos['cedula'] ?>
                      </td>
                    </tr>
                  <?php elseif ($_REQUEST['tipo'] === '2'): //curso sin docente ?>
                    <tr>
                      <!-- ignorar -->
                        <td></td>
                      <!-- ignorar -->
                      <td class="codigo">
                        <?php echo $datos['codigo'] ?>
                      </td>
                      <td>
                        <?php echo $datos['des_curso'] ?>
                      </td>
                      <td>
                        <?php echo $datos['periodo_academico'] ?>
                      </td>
                      <td>
                        <?php echo $datos['comentarios'] ?>
                      </td>
                    </tr>
                  <?php elseif ($_REQUEST['tipo'] === '3'): //alumnos por curso ?>
                    <tr>
                      <!-- ignorar -->
                        <td></td>
                      <!-- ignorar -->
                      <td class="codigo">
                        <?php echo $datos['codigo'] ?>
                      </td>
                      <td>
                        <?php echo $datos['des_curso'] ?>
                      </td>
                      <td>
                        <?php echo $datos['periodo_academico'] ?>
                      </td>
                      <td>
                        <?php echo $datos['p_apellido'] ?>
                      </td>
                      <td>
                        <?php echo $datos['p_nombre'] ?>
                      </td>
                      <td class="cedula">
                        <?php echo $datos['cedula'] ?>
                      </td>
                    </tr>
                  <?php elseif ($_REQUEST['tipo'] === '4'): //curso sin docente ?>
                    <tr>
                      <!-- ignorar -->
                        <td></td>
                      <!-- ignorar -->
                      <td class="codigo">
                        <?php echo $datos['codigo'] ?>
                      </td>
                      <td>
                        <?php echo $datos['des_curso'] ?>
                      </td>
                      <td>
                        <?php echo $datos['periodo_academico'] ?>
                      </td>
                      <td>
                        <?php echo $datos['comentarios'] ?>
                      </td>
                      <td>
                        <?php echo $datos['total_alumnos'] ?>
                      </td>
                    </tr>
                  <?php endif ?>
                <?php endwhile; ?>
              </tbody>
            </table>
            <!-- reporte -->
            <div class="row center-block margen">
              <div class="col-xs-6 col-xs-offset-3">
                <span class="label label-info">generar este listado en formato pdf</span>
              </div>
            </div>
            <div class="row center-block margen">
              <div class="col-xs-3 col-xs-offset-3">
                <?php if (isset($_REQUEST['curso'])): ?>
                  <?php $enlace = "reportes/listado_C.php?tipo=$_REQUEST[tipo]&curso=$_REQUEST[curso]" ?>
                <?php else: ?>
                  <?php $enlace = "reportes/listado_C.php?tipo=$_REQUEST[tipo]" ?>
                <?php endif ?>

                <a
                  id="generar-pdf"
                  href="<?php echo $enlace ?>"
                  class="push-3 btn btn-primary btn-lg">Generar Reporte</a>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-8 col-xs-offset-2 margenAbajo well">
                <div class="row">
                  <div class="col-xs-12">
                    <h4>
                      Listado seleccionado según los parámetros que Ud. escogió.
                    </h4>
                    <p>
                      <small>
                        Si desea hacer otro tipo de consulta puede
                        <a href="menucon.php">hacerlo aquí.</a>
                      </small>
                    </p>
                    <p>
                      <small>
                        puede regresar <a href="../index.php">al menú principal.</a>
                      </small>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- CSS de bootstrap-table -->
      <?php $tableCss = enlaceDinamico('java/bootstrap-table/src/bootstrap-table.css') ?>
      <link rel="stylesheet" href="<?php echo $tableCss ?>">
      <!-- JS de bootstrap-table -->
      <?php $tableJs = enlaceDinamico('java/bootstrap-table/src/bootstrap-table.js') ?>
      <script src="<?php echo $tableJs ?>"></script>
      <!-- Locale a español -->
      <?php $tableJs = enlaceDinamico('java/bootstrap-table/src/locale/bootstrap-table-es-AR.js') ?>
      <script src="<?php echo $tableJs ?>"></script>
      <!-- para el boton consultar -->
      <?php $tablaBotonCodigo = enlaceDinamico('java/otros/tablaBotonCodigo-bootstrap-table.js') ?>
      <?php $tablaBotonCedula = enlaceDinamico('java/otros/tablaBotonCedula-bootstrap-table.js') ?>
      <script type="text/javascript">
        $(function(){
          $.ajax({
            url: "<?php echo $tablaBotonCodigo ?>",
            type: 'POST',
            dataType: 'script'
          });
          <?php if ($_REQUEST['tipo'] <> '2') : ?>
            $.ajax({
              url: "<?php echo $tablaBotonCedula ?>",
              type: 'POST',
              dataType: 'script'
            });
          <?php endif; ?>
        });
      </script>
      <!-- CONTENIDO TERMINA ARRIBA DE ESTO: -->
    </div>
  </div>
  <?php finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']); ?>

<?php else :
  header('Location: menucon.php?error=vacio');
endif;
?>
