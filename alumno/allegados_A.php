<?php
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
validarUsuario(1, 1, $_SESSION['cod_tipo_usr']);
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr'], 'sistemaJAG | Consulta de alumno');

if ( isset($_REQUEST['cedula']) ) :
  $cedula_a = ChequearGenerico::cedula($_REQUEST['cedula']);
  $query = "SELECT p_apellido, p_nombre, codigo
    from persona
    where cedula = $cedula_a;";
  $resultado = conexion($query);
  $datosAlumno = mysqli_fetch_assoc($resultado);
  $query = "SELECT
    persona.p_apellido,
    persona.p_nombre,
    persona.cedula,
    persona.telefono,
    personal_autorizado.telefono_trabajo,
    personal_autorizado.email,
    personal_autorizado.vive_con_alumno,
    relacion.descripcion as relacion
    from persona
    inner join personal_autorizado
    on persona.codigo = personal_autorizado.cod_persona
    inner join relacion
    on personal_autorizado.relacion = relacion.codigo
    inner join obtiene
      on personal_autorizado.codigo = obtiene.cod_p_a
      where obtiene.cod_alu = (SELECT alumno.codigo
        from alumno
        inner join persona
        on alumno.cod_persona = persona.codigo
        where persona.cedula = $cedula_a);";
  $resultado = conexion($query);
  if ($resultado): ?>
    <div id="contenido_consultar_U">
      <div id="blancoAjax">
        <!-- CONTENIDO EMPIEZA DEBAJO DE ESTO: -->
        <!-- DETALLESE QUE NO ES UN ID SINO UNA CLASE. -->
        <div class="container">
          <div class="row">
            <div class="col-xs-8 col-xs-offset-2 margenAbajo">
              <h3 class="text-center text-uppercase">
                Allegados de <?php echo $datosAlumno['p_apellido'] ?>,
                <?php echo $datosAlumno['p_nombre'] ?>
              </h3>
            </div>
          </div>
          <?php $enlacePrimario = enlaceDinamico('personalAutorizado/form_act_P.php') ?>
          <span class="hidden"
            data-enlace-primario="<?php echo $enlacePrimario ?>">
          </span>
          <div class="container">
            <div class="row margen">
              <div class="col-xs-6 col-xs-offset-3">
                <span class="label label-info">Seleccione un registro.</span>
              </div>
            </div>
             <div class="row">
               <div class="col-xs-3 col-xs-offset-3">
                 <a
                  href="#"
                  class="inyectar-cedula push-3 btn btn-warning btn-lg disabled">Consultar registro</a>
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
                  <th data-field="p_apellido" data-sortable="true">Primer Apellido</th>
                  <th data-field="p_nombre" data-sortable="true">Primer Nombre</th>
                  <th data-field="email" data-sortable="true">Email</th>
                  <th data-field="vive_con_alumno" data-sortable="true">Vive con Alumno</th>
                  <th data-field="relacion" data-sortable="true">Relacion</th>
                  <th data-field="telefono" data-sortable="false">Telefono</th>
                  <th data-field="telefono_trabajo" data-sortable="true" data-visible="true">Telf. Lab.</th>
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
                        <?php echo $datos['email'] ?>
                      </td>
                      <td>
                        <?php echo $datos['vive_con_alumno'] === ('s') ? 'si':'no' ?>
                      </td>
                      <td>
                        <?php echo $datos['relacion'] ?>
                      </td>
                      <td>
                        <?php echo $datos['telefono'] ?>
                      </td>
                      <td>
                        <?php echo $datos['telefono_trabajo'] ?>
                      </td>
                    </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
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
        <?php $tablaBotonConsulta = enlaceDinamico('java/otros/tablaBotonCedula-bootstrap-table.js') ?>
        <script type="text/javascript">
          $(function(){
            $.ajax({
              url: "<?php echo $tablaBotonConsulta ?>",
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
<?php else: ?>
  <?php header('Location: menucon.php?error=vacio'); ?>
<?php endif; ?>
