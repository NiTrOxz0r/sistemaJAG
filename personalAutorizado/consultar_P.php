<?php
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario(1, 1, $_SESSION['cod_tipo_usr']);
// guardado por referencia:
// $query = "SELECT persona.nacionalidad as nacionalidad_a,
// persona.cedula as cedula,
// alumno.cedula_escolar as cedula_escolar_a,
// persona.p_nombre as p_nombre_a,
// persona.s_nombre as s_nombre_a,
// persona.p_apellido as p_apellido_a,
// persona.s_apellido as s_apellido_a,
// representante.cedula as cedula_r,
// representante.p_nombre as p_apellido_r,
// representante.p_apellido as p_nombre_r  from alumno
// inner join persona on (alumno.cod_persona = persona.codigo),
// personal_autorizado inner join persona as representante on
// (personal_autorizado.cod_persona = representante.codigo)
// where personal_autorizado.codigo=alumno.cod_representante
// and representante.cedula = '$cedula_r';";
//
//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
//DESDE empezarPagina.php

empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr'], 'sistemaJAG | Consulta de representante/allegado');

if ( (isset($_REQUEST['informacion']) and isset($_REQUEST['tipo']) )
  or $_REQUEST['tipo'] === '7' or $_REQUEST['tipo'] === '4' ) :
  $conexion = conexion();
  //tipo = tipo de consulta
  //tipo_personal = docente, administrador, directivo
  $valor = mysqli_escape_string($conexion, trim($_REQUEST['informacion']));
  // si el pedido no es un listado general:
  if ($_REQUEST['tipo'] <> '7') :
    //ajustamos el where segun el tipo de busqueda:
    if ($_REQUEST['tipo'] === '1') :
      $where = "WHERE persona.cedula = '$valor'";
    elseif ($_REQUEST['tipo'] === '2') :
      $where = "WHERE persona.p_nombre LIKE '%$valor%' or persona.s_nombre LIKE '%$valor%' ";
    elseif ($_REQUEST['tipo'] === '3') :
      $where = "WHERE persona.p_apellido LIKE '%$valor%' or persona.s_apellido LIKE '%$valor%'";
    // considerar una opcion para PA:
    // elseif ($_REQUEST['tipo'] === '4') :
    //   $where = "WHERE alumno.cod_curso = $valor";
    elseif ($_REQUEST['tipo'] === '5') :
      $where = "where (personal_autorizado.status = 1 or persona.status = 1) ";
    elseif ($_REQUEST['tipo'] === '6') :
      $where = "where (personal_autorizado.status = 0 or persona.status = 0) ";
    else:
      header('Location: menucon.php?e=1&error=tipo&q='.$_REQUEST['tipo']);
    endif;
    $query = "SELECT *
      from persona
      inner join personal_autorizado
      on personal_autorizado.cod_persona = persona.codigo
      $where
      order by
      persona.p_apellido;";
  // el pedido es un listado general:
  else:
    $where = "where (persona.status = 0 or persona.status = 1) ";
    $where = $where."AND (personal_autorizado.status = 0 or personal_autorizado.status = 1)";
    $query = "SELECT *
      from persona
      inner join personal_autorizado
      on personal_autorizado.cod_persona = persona.codigo
      $where
      order by
      persona.p_apellido;";
  endif;
  $resultado = conexion($query); ?>
  <?php if ($resultado): ?>
    <div id="contenido_consultar_U">
      <div id="blancoAjax">
        <!-- CONTENIDO EMPIEZA DEBAJO DE ESTO: -->
        <!-- DETALLESE QUE NO ES UN ID SINO UNA CLASE. -->
        <div class="container">
          <div class="row">
            <div class="col-xs-8 col-xs-offset-2 margenAbajo well">
              <div class="row">
                <div class="col-xs-12">
                  <h4>
                    Listado seleccionado segun los parametros que Ud. escojio.
                  </h4>
                  <p>
                    <small>
                      Si desea hacer otro tipo de consulta puede
                      <a href="menucon.php">hacerlo aqui.</a>
                    </small>
                  </p>
                  <p>
                    <small>
                      puede regresar <a href="../index.php">al menu principal.</a>
                    </small>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <?php $enlacePrimario = enlaceDinamico('personalAutorizado/form_act_P.php') ?>
          <span class="hidden" data-enlace-primario="<?php echo $enlacePrimario ?>"></span>
           <div class="row center-block">
             <div class="col-xs-6 col-xs-offset-3">
               <a
                id="consultar-cedula"
                href="#"
                class="push-3 btn btn-warning btn-lg disabled">Consultar registro</a>
                <span class="label label-info">Seleccione un registro para consultarlo</span>
             </div>
           </div>
          <div class="row">
            <div class="col-xs-12">
              <table
                id="tabla"
                data-toggle="table"
                data-search="true"
                data-height="600"
                data-pagination="true"
                data-page-list="[10, 25, 50, 100]"
                data-show-toggle="true"
                data-show-columns="true"
                data-click-to-select="true"
                data-maintain-selected="true"
                data-sort-name="p_apellido"
                >
                <thead>
                  <!-- ignorar -->
                  <th data-radio="true" data-switchable="false"></th>
                  <!-- ignorar -->
                  <th data-field="cedula" data-sortable="true" data-switchable="false">Cedula</th>
                  <th data-field="p_apellido" data-sortable="true">Primer Apellido</th>
                  <th data-field="p_nombre" data-sortable="true">Primer Nombre</th>
                  <th data-field="telefono" data-sortable="false">Telefono</th>
                  <th data-field="telefono_otro" data-sortable="true" data-visible="true">Telf. Ad.</th>
                  <th data-field="sexo" data-sortable="true">sexo</th>
                  <th data-field="email" data-sortable="true">email</th>
                  <th data-field="nivel_instruccion" data-sortable="true">nivel_instruccion</th>
                  <th data-field="profesion" data-sortable="true">profesion</th>
                  <th data-field="p_apellido_a" data-sortable="true">Primer Apellido (A)</th>
                  <th data-field="p_nombre_a" data-sortable="true">Primer Nombre (A)</th>
                  <th data-field="cedula_a" data-sortable="true" data-switchable="false">Cedula (A)</th>
                  <th data-field="cedula_escolar" data-sortable="true" data-switchable="false">Cedula escolar</th>
                  <th data-field="curso" data-sortable="true">Curso</th>
                </thead>
                <tbody>
                  <?php while( $datos = mysqli_fetch_array($resultado) ) : ?>
                    <tr>
                      <!-- ignorar (radio) -->
                      <td></td>
                      <!-- ignorar -->
                      <td class="cedula">
                        <?php echo $datos['cedula'] ?>
                      </td>
                      <td>
                        <?php echo $datos['p_apellido'] ?>
                      </td>
                      <td>
                        <?php echo $datos['p_nombre'] ?>
                      </td>
                      <td>
                        <?php echo $datos['telefono'] === (null) ? 'SinRegistros':$datos['telefono'] ?>
                      </td>
                      <td>
                        <?php echo $datos['telefono_otro'] === (null) ? 'SinRegistros':$datos['telefono_otro'] ?>
                      </td>
                      <td>
                        <?php echo $datos['sexo'] === ('0') ? 'Masculino':'Femenino' ?>
                      </td>
                      <td>
                        <?php echo $datos['email'] === (null) ? 'SinRegistros':$datos['email'] ?>
                      </td>
                      <?php $query = "SELECT descripcion
                        from nivel_instruccion
                        where codigo = $datos[nivel_instruccion];";
                        $sql = conexion($query);
                        $nivel_instruccion = mysqli_fetch_assoc($sql);
                      if ($sql->num_rows <> 0) :?>
                        <td>
                          <?php echo $nivel_instruccion['descripcion'] ?>
                        </td>
                      <?php endif ?>
                      <?php $query = "SELECT descripcion
                        from profesion
                        where codigo = $datos[profesion];";
                        $sql = conexion($query);
                        $profesion = mysqli_fetch_assoc($sql);
                      if ($sql->num_rows <> 0) :?>
                        <td>
                          <?php echo $profesion['descripcion'] ?>
                        </td>
                      <?php endif ?>
                      <?php $query = "SELECT
                        p_nombre,
                        p_apellido,
                        cedula,
                        cedula_escolar,
                        alumno.codigo
                        from alumno
                        inner join obtiene
                        on alumno.codigo = obtiene.cod_alu
                        inner join persona
                        on alumno.cod_persona = persona.codigo
                        where obtiene.cod_p_a = $datos[codigo];";
                        $sql = conexion($query);
                        $alumno = mysqli_fetch_assoc($sql); ?>
                      <?php if ($alumno): ?>
                        <td>
                          <?php echo $alumno['p_apellido'] ?>
                        </td>
                        <td>
                          <?php echo $alumno['p_nombre'] ?>
                        </td>
                        <td>
                          <?php echo $alumno['cedula'] ?>
                        </td>
                        <td class="cedula_escolar">
                          <?php echo $alumno['cedula_escolar'] ?>
                        </td>
                      <?php endif ?>
                      <?php if (isset($alumno['codigo'])): ?>
                        <?php $query = "SELECT descripcion
                          from curso
                          inner join asume
                          on asume.cod_curso = curso.codigo
                          where asume.cod_curso = $alumno[codigo];";
                          $sql = conexion($query);
                          $curso = mysqli_fetch_assoc($sql);
                        if ($sql->num_rows <> 0) :?>
                          <td class="curso">
                            <?php echo $curso['descripcion'] ?>
                          </td>
                        <?php endif ?>
                      <?php endif ?>
                    </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="container">
            <div class="row margen">
              <div class="col-xs-6 col-xs-offset-3">
                <span class="label label-info">generara este listado en formato pdf</span>
              </div>
            </div>
             <div class="row">
               <div class="col-xs-3 col-xs-offset-3">
                <?php $enlace = "reportes/listado_P.php?tipo=$_REQUEST[tipo]&informacion=$_REQUEST[informacion]" ?>
                 <a
                  id="generar-pdf"
                  href="<?php echo $enlace ?>"
                  class="push-3 btn btn-primary btn-lg">Generar Reporte</a>
               </div>
             </div>
          </div>
          <div class="row">
            <div class="col-xs-8 col-xs-offset-2 margen well">
              <div class="row">
                <div class="col-xs-12 text-center">
                  <h4>
                    Puede hacer otro tipo de consulta!
                  </h4>
                  <p>
                    <small>
                      <a href="menucon.php">desde aqui.</a>
                    </small>
                  </p>
                  <p>
                    <small>
                      o si prefiere puede regresar
                      <a href="../index.php">al menu principal.</a>
                    </small>
                  </p>
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
        <?php $tablaBoton = enlaceDinamico('java/otros/tablaBotonCedula-bootstrap-table.js') ?>
        <script type="text/javascript">
          $(function(){
            $.ajax({
              url: "<?php echo $tablaBoton ?>",
              type: 'POST',
              dataType: 'script'
            });
          });
        </script>
        <!-- CONTENIDO TERMINA ARRIBA DE ESTO: -->
      </div>
    </div>
    <?php
    //FINALIZAMOS LA PAGINA:
    //trae footer.php y cola.php
    finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']); ?>
  <?php endif ?>
<?php mysqli_close($conexion);?>
<?php else: ?>
  <?php header('Location: menucon.php?error=vacio'); ?>
<?php endif; ?>
