<?php
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario(1, 1, $_SESSION['cod_tipo_usr']);

//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
//DESDE empezarPagina.php
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr'], 'sistemaJAG | Consulta de alumno');

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
    elseif ($_REQUEST['tipo'] === '4') :
      $where = "WHERE alumno.cod_curso = $valor";
    elseif ($_REQUEST['tipo'] === '5') :
      $where = "where (alumno.status = 1 or persona.status = 1) ";
    elseif ($_REQUEST['tipo'] === '6') :
      $where = "where (alumno.status = 0 or persona.status = 0) ";
    else:
      header('Location: menucon.php?e=1&error=tipo&q='.$_REQUEST['tipo']);
    endif;
    // ajustamos la condicion de la busqueda:
    // if ($_REQUEST['tipo_personal'] === '1') :
    //   $where = $where." AND personal.tipo_personal = 1";
    // elseif ($_REQUEST['tipo_personal'] === '2') :
    //   $where = $where." AND personal.tipo_personal = 2";
    // elseif ($_REQUEST['tipo_personal'] === '3') :
    //   $where = $where." AND personal.tipo_personal = 3";
    // elseif ($_REQUEST['tipo_personal'] === '4') :
    //   $where = $where." AND personal.tipo_personal = 4";
    // elseif ($_REQUEST['tipo_personal'] === '5') :
    //   $where = $where." AND personal.tipo_personal = 5";
    // elseif ($_REQUEST['tipo_personal'] === '0') :
    //   $where = $where." AND personal.tipo_personal = 0";
    // elseif ($_REQUEST['tipo_personal'] === '6') :
    //   $where = $where." AND personal.tipo_personal = 0";
    // endif;
  // endif;
  // si el pedido no es un listado general:
  // if ($_REQUEST['tipo'] <> '7') :
  //   // si el pedido es de un docente:
  //   if ($_REQUEST['tipo_personal'] === '3') :
  //     $query = "SELECT
  //       persona.p_apellido as p_apellido,
  //       persona.p_nombre as p_nombre,
  //       persona.cedula as cedula,
  //       personal.celular as celular,
  //       persona.telefono as telefono,
  //       personal.email as email,
  //       cargo.descripcion as cargo,
  //       curso.descripcion as curso,
  //       usuario.seudonimo as seudonimo,
  //       tipo_usuario.descripcion as tipo_usuario,
  //       personal.status as status_d,
  //       usuario.status as status_u
  //       from persona
  //       inner join personal
  //       on personal.cod_persona = persona.codigo
  //       inner join cargo
  //       on personal.cod_cargo = cargo.codigo
  //       inner join asume
  //       on personal.codigo = asume.cod_docente
  //       inner join curso
  //       on asume.cod_curso = curso.codigo
  //       inner join usuario
  //       on personal.cod_usr = usuario.codigo
  //       inner join tipo_usuario
  //       on usuario.cod_tipo_usr = tipo_usuario.codigo
  //       $where
  //       order by
  //       persona.p_apellido,
  //       usuario.seudonimo,
  //       tipo_usuario.descripcion;";
    // si el pedido no es de un docente:
    // elseif ($_REQUEST['tipo_personal'] === '1' or $_REQUEST['tipo_personal'] === '2'
    //   or $_REQUEST['tipo_personal'] === '4' or $_REQUEST['tipo_personal'] === '5'
    //   or $_REQUEST['tipo_personal'] === '0' or $_REQUEST['tipo_personal'] === '6'):
    //   $query = "SELECT
    //     persona.p_apellido as p_apellido,
    //     persona.p_nombre as p_nombre,
    //     persona.cedula as cedula,
    //     personal.celular as celular,
    //     persona.telefono as telefono,
    //     persona.telefono_otro as telefono_otro,
    //     personal.email as email,
    //     cargo.descripcion as cargo,
    //     usuario.seudonimo as seudonimo,
    //     tipo_usuario.descripcion as tipo_usuario,
    //     personal.status as status_d,
    //     usuario.status as status_u
    //     from persona
    //     inner join personal
    //     on personal.cod_persona = persona.codigo
    //     inner join cargo
    //     on personal.cod_cargo = cargo.codigo
    //     inner join usuario
    //     on personal.cod_usr = usuario.codigo
    //     inner join tipo_usuario
    //     on usuario.cod_tipo_usr = tipo_usuario.codigo
    //     $where
    //     order by
    //     persona.p_apellido,
    //     usuario.seudonimo,
    //     tipo_usuario.descripcion;";
    // else:
    //   header('Location: menucon.php?e=2&error=tipo&q='.$_REQUEST['tipo_personal']);
    // endif;
    //
    $query = "SELECT *
      from persona
      inner join alumno
      on alumno.cod_persona = persona.codigo
      $where
      order by
      persona.p_apellido;";
  // el pedido es un listado general:
  else:
    $where = "where (persona.status = 0 or persona.status = 1) ";
    $where = $where."AND (alumno.status = 0 or alumno.status = 1)";
    $query = "SELECT *
      from persona
      inner join alumno
      on alumno.cod_persona = persona.codigo
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
                  <th data-field="cedula_escolar" data-sortable="true" data-switchable="false">Cedula escolar</th>
                  <th data-field="p_apellido" data-sortable="true">Primer Apellido</th>
                  <th data-field="p_nombre" data-sortable="true">Primer Nombre</th>
                  <th data-field="curso" data-sortable="true">Curso</th>
                  <th data-field="telefono" data-sortable="false">Telefono</th>
                  <th data-field="telefono_otro" data-sortable="true" data-visible="true">Telf. Ad.</th>
                  <th data-field="sexo" data-sortable="true">sexo</th>
                  <th data-field="discapacidad" data-sortable="true">Discapacidad</th>
                  <th data-field="vacuna" data-sortable="true">Cert. vacunacion</th>
                  <th data-field="p_apellido_r" data-sortable="true">Primer Apellido (R)</th>
                  <th data-field="p_nombre_r" data-sortable="true">Primer Nombre (R)</th>
                  <th data-field="cedula_r" data-sortable="true" data-switchable="false">Cedula (R)</th>
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
                      <td class="cedula_escolar">
                        <?php echo $datos['cedula_escolar'] ?>
                      </td>
                      <td>
                        <?php echo $datos['p_apellido'] ?>
                      </td>
                      <td>
                        <?php echo $datos['p_nombre'] ?>
                      </td>
                      <?php $query = "SELECT descripcion
                        from curso
                        inner join asume
                        on asume.cod_curso = curso.codigo
                        where asume.cod_curso = $datos[cod_curso];";
                        $sql = conexion($query);
                        $curso = mysqli_fetch_assoc($sql);
                      if ($sql->num_rows <> 0) :?>
                        <td class="curso">
                          <?php echo $curso['descripcion'] ?>
                        </td>
                      <?php endif ?>
                      <td>
                        <?php echo $datos['telefono'] === (null) ? 'SinRegistros':$datos['telefono'] ?>
                      </td>
                      <td>
                        <?php echo $datos['telefono_otro'] === (null) ? 'SinRegistros':$datos['telefono_otro'] ?>
                      </td>
                      <td>
                        <?php echo $datos['sexo'] === ('0') ? 'Masculino':'Femenino' ?>
                      </td>
                      <?php $query = "SELECT descripcion
                        from discapacidad where codigo = $datos[cod_discapacidad];";
                        $sql = conexion($query);
                        $discapacidad = mysqli_fetch_assoc($sql); ?>
                      <td>
                        <?php echo $discapacidad['descripcion'] ?>
                      </td>
                      <td>
                        <?php echo $datos['certificado_vacuna'] === ('s') ? 'Si posee':'No posee' ?>
                      </td>
                      <?php $query = "SELECT p_nombre, p_apellido, cedula
                      from persona
                      inner join personal_autorizado
                      on persona.codigo = personal_autorizado.cod_persona
                      where personal_autorizado.codigo = $datos[cod_representante]";
                      $sql = conexion($query);
                      $representante = mysqli_fetch_assoc($sql); ?>
                      <?php if ($representante): ?>
                        <td>
                          <?php echo $representante['p_apellido'] ?>
                        </td>
                        <td>
                          <?php echo $representante['p_nombre'] ?>
                        </td>
                        <td>
                          <?php echo $representante['cedula'] ?>
                        </td>
                      <?php endif ?>
                    </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
              <?php $enlacePrimario = enlaceDinamico('alumno/form_act_A.php') ?>
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
