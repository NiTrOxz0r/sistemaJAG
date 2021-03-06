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
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr'], 'sistemaJAG | Consulta de usuario');

if ( (isset($_REQUEST['informacion'])
  and isset($_REQUEST['tipo'])
  and isset($_REQUEST['tipo_personal']) )
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
      $where = "WHERE personal.cod_cargo = $valor";
    elseif ($_REQUEST['tipo'] === '5') :
      $where = "where (personal.status = 1 or persona.status = 1) ";
    elseif ($_REQUEST['tipo'] === '6') :
      $where = "where (personal.status = 0 or persona.status = 0) ";
    else:
      header('Location: menucon.php?e=1&error=tipo&q='.$_REQUEST['tipo']);
    endif;
    // ajustamos la condicion de la busqueda:
    if ($_REQUEST['tipo_personal'] === '1') :
      $where = $where." AND personal.tipo_personal = 1";
    elseif ($_REQUEST['tipo_personal'] === '2') :
      $where = $where." AND personal.tipo_personal = 2";
    elseif ($_REQUEST['tipo_personal'] === '3') :
      $where = $where." AND personal.tipo_personal = 3";
    elseif ($_REQUEST['tipo_personal'] === '4') :
      $where = $where." AND personal.tipo_personal = 4";
    elseif ($_REQUEST['tipo_personal'] === '5') :
      $where = $where." AND personal.tipo_personal = 5";
    elseif ($_REQUEST['tipo_personal'] === '0') :
      $where = $where." AND personal.tipo_personal = 0";
    // ninguno
    elseif ($_REQUEST['tipo_personal'] === '6') :
      // $where = $where." AND personal.tipo_personal = 6";
    endif;
  endif;
  // si el pedido no es un listado general:
  if ($_REQUEST['tipo'] <> '7') :
    // si el pedido es de un docente:
    if ($_REQUEST['tipo_personal'] === '3') :
      $query = "SELECT
        persona.p_apellido as p_apellido,
        persona.p_nombre as p_nombre,
        persona.cedula as cedula,
        personal.celular as celular,
        persona.telefono as telefono,
        personal.email as email,
        cargo.descripcion as cargo,
        curso.descripcion as curso,
        usuario.seudonimo as seudonimo,
        tipo_usuario.descripcion as tipo_usuario,
        personal.status as status_d,
        usuario.status as status_u
        from persona
        inner join personal
        on personal.cod_persona = persona.codigo
        inner join cargo
        on personal.cod_cargo = cargo.codigo
        inner join asume
        on personal.codigo = asume.cod_docente
        inner join curso
        on asume.cod_curso = curso.codigo
        inner join usuario
        on personal.cod_usr = usuario.codigo
        inner join tipo_usuario
        on usuario.cod_tipo_usr = tipo_usuario.codigo
        $where
        order by
        persona.p_apellido,
        usuario.seudonimo,
        tipo_usuario.descripcion;";
    // si el pedido no es de un docente:
    elseif ($_REQUEST['tipo_personal'] === '1' or $_REQUEST['tipo_personal'] === '2'
      or $_REQUEST['tipo_personal'] === '4' or $_REQUEST['tipo_personal'] === '5'
      or $_REQUEST['tipo_personal'] === '0' or $_REQUEST['tipo_personal'] === '6'):
      $query = "SELECT
        persona.p_apellido as p_apellido,
        persona.p_nombre as p_nombre,
        persona.cedula as cedula,
        personal.celular as celular,
        persona.telefono as telefono,
        persona.telefono_otro as telefono_otro,
        personal.email as email,
        cargo.descripcion as cargo,
        usuario.seudonimo as seudonimo,
        tipo_usuario.descripcion as tipo_usuario,
        personal.status as status_d,
        usuario.status as status_u
        from persona
        inner join personal
        on personal.cod_persona = persona.codigo
        inner join cargo
        on personal.cod_cargo = cargo.codigo
        inner join usuario
        on personal.cod_usr = usuario.codigo
        inner join tipo_usuario
        on usuario.cod_tipo_usr = tipo_usuario.codigo
        $where
        order by
        persona.p_apellido,
        usuario.seudonimo,
        tipo_usuario.descripcion;";
    else:
      header('Location: menucon.php?e=2&error=tipo&q='.$_REQUEST['tipo_personal']);
    endif;
  // el pedido es un listado general:
  else:
    $where = "where (persona.status = 0 or persona.status = 1) ";
    $where = $where."AND (personal.status = 0 or personal.status = 1)";
    $query = "SELECT
      persona.p_apellido as p_apellido,
      persona.p_nombre as p_nombre,
      persona.cedula as cedula,
      personal.celular as celular,
      persona.telefono as telefono,
      persona.telefono_otro as telefono_otro,
      personal.email as email,
      cargo.descripcion as cargo,
      usuario.seudonimo as seudonimo,
      tipo_usuario.descripcion as tipo_usuario,
      personal.status as status_d,
      usuario.status as status_u
      from persona
      inner join personal
      on personal.cod_persona = persona.codigo
      inner join cargo
      on personal.cod_cargo = cargo.codigo
      inner join usuario
      on personal.cod_usr = usuario.codigo
      inner join tipo_usuario
      on usuario.cod_tipo_usr = tipo_usuario.codigo
      $where
      order by
      persona.p_apellido,
      usuario.seudonimo,
      tipo_usuario.descripcion;";
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
              <?php $enlacePrimario = enlaceDinamico('usuario/form_act_PI.php') ?>
              <span class="hidden" data-enlace-primario="<?php echo $enlacePrimario ?>"></span>
              <div class="row center-block">
                 <div class="col-xs-6 col-xs-offset-3">
                   <a
                    href="#"
                    class="inyectar-cedula push-3 btn btn-warning btn-lg disabled">Consultar registro</a>
                    <span class="label label-info">Seleccione un registro para consultarlo</span>
                 </div>
              </div>
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
                  <th data-field="cedula" data-sortable="true" data-switchable="false">Cédula</th>
                  <th data-field="p_apellido" data-sortable="true">Primer Apellido</th>
                  <th data-field="p_nombre" data-sortable="true">Primer Nombre</th>
                  <th data-field="celular" data-sortable="false">Celular</th>
                  <th data-field="telefono" data-sortable="false">Teléfono</th>
                  <th data-field="email" data-sortable="true" data-visible="true">Email</th>
                  <?php if (isset($datos['curso'])): ?>
                    <th data-field="cargo" data-sortable="true" data-visible="true">Cargo</th>
                    <th data-field="curso" data-sortable="true" data-visible="true">Curso Asociado</th>
                  <?php else: ?>
                    <th data-field="telefono_otro" data-sortable="true" data-visible="true">Telf. Ad.</th>
                    <th data-field="cargo" data-sortable="true" data-visible="true">Cargo</th>
                    <th data-field="seudonimo" data-sortable="true" data-visible="true">Seudónimo</th>
                  <?php endif ?>
                  <th data-field="tipo" data-sortable="true" data-visible="true">Tipo usuario</th>
                  <th data-field="status_p" data-sortable="true" data-visible="true">Estatus personal</th>
                  <th data-field="status_u" data-sortable="true" data-visible="true">Estatus en sistema</th>
                </thead>
                <tbody>
                  <?php while ( $datos = mysqli_fetch_array($resultado) ) : ?>
                    <tr>
                      <!-- ignorar (radio) -->
                      <td></td>
                      <!-- ignorar -->
                      <td class="cedula" data-datos="<?php echo $datos['cedula'] ?>">
                        <?php echo $datos['cedula'] ?>
                      </td>
                      <td>
                        <?php echo $datos['p_apellido'] ?>
                      </td>
                      <td>
                        <?php echo $datos['p_nombre'] ?>
                      </td>
                      <td>
                        <?php echo $datos['celular'] === (null) ? 'SinRegistros':$datos['celular'] ?>
                      </td>
                      <td>
                        <?php echo $datos['telefono'] === (null) ? 'SinRegistros':$datos['telefono'] ?>
                      </td>
                      <td>
                        <?php echo $datos['email'] ?>
                      </td>
                      <?php if (isset($datos['curso'])): ?>
                        <td>
                          <?php echo $datos['cargo'] ?>
                        </td>
                        <td>
                          <?php echo $datos['curso'] === (null) ? 'SinRegistros':$datos['curso'] ?>
                        </td>
                      <?php else: ?>
                        <td>
                          <?php echo $datos['telefono_otro'] === (null) ? 'SinRegistros':$datos['telefono_otro'] ?>
                        </td>
                        <td>
                          <?php echo $datos['cargo'] ?>
                        </td>
                        <td>
                          <?php echo $datos['seudonimo'] === (null) ? 'Usuario no registrado':$datos['seudonimo'] ?>
                        </td>
                      <?php endif ?>
                      <td>
                        <?php echo $datos['tipo_usuario'] ?>
                      </td>
                      <td>
                        <?php echo $datos['status_d'] == ('1') ? 'Activo' : 'Inactivo'; ?>
                      </td>
                      <td>
                        <?php echo $datos['status_u'] == ('1') ? 'Activo' : 'Inactivo'; ?>
                      </td>
                    </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="container">
            <div class="row margen">
              <div class="col-xs-6 col-xs-offset-3">
                <span class="label label-info">generar este listado en formato pdf</span>
              </div>
            </div>
             <div class="row">
               <div class="col-xs-3 col-xs-offset-3">
                <?php if (!isset($_REQUEST['tipo_personal'])) {$_REQUEST['tipo_personal'] = null;}
                  $enlace = "reportes/listado_PI.php?tipo=$_REQUEST[tipo]&informacion=$_REQUEST[informacion]&tipo_personal=$_REQUEST[tipo_personal]" ?>
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
                      <a href="menucon.php">desde aquí.</a>
                    </small>
                  </p>
                  <p>
                    <small>
                      o si prefiere puede regresar
                      <a href="../index.php">al menú principal.</a>
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
