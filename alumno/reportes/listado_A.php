<?php
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
$enlace = enlaceDinamico('php/tcpdf/tcpdf.php');
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario(1, 1, $_SESSION['cod_tipo_usr']);

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
  <?php if ($resultado):
    // crea un nuevo documento pdf por medio de la clase TCDPF
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $jquery = enlaceDinamico('java/jquery-1.11.0.min.js');
    $bootstrap = enlaceDinamico('css/bootstrap/css/bootstrap.min.css');
    $datos = array();
$html = <<<HTML
<!-- jQuery -->
<script type="text/javascript" src="<?php echo {$jquery} ?>"></script>
<!-- Bootstrap -->
<link href="<?php echo {$bootstrap} ?>" rel="stylesheet">
<div id="contenido_consultar_U">
  <div id="blancoAjax">
    <!-- CONTENIDO EMPIEZA DEBAJO DE ESTO: -->
    <!-- DETALLESE QUE NO ES UN ID SINO UNA CLASE. -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <table
            id="tabla"
            class="table table-bordered"
            data-toggle="tablex"
            data-height="600"
            data-sort-name="p_apellido"
            >
            <thead>
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
HTML;
              while( $datos = mysqli_fetch_array($resultado) ) :
                $query = "SELECT descripcion
                    from curso
                    inner join asume
                    on asume.cod_curso = curso.codigo
                    where asume.cod_curso = $datos[cod_curso];";
                    $sql = conexion($query);
                    $curso = mysqli_fetch_assoc($sql);
                  if ($sql->num_rows <> 0) :
                    $curso = "<td class='curso'>$curso[descripcion]</td>";
                  endif;
                $query = "SELECT descripcion
                  from discapacidad where codigo = $datos[cod_discapacidad];";
                  $sql = conexion($query);
                  $discapacidad = mysqli_fetch_assoc($sql);
                $discapacidad="<td>$discapacidad[descripcion]</td>";
$html .= <<<HTML
                <tr>
                  <td class="cedula">
                    {$datos[cedula]}
                  </td>
                  <td class="cedula_escolar">
                    {$datos[cedula_escolar]}
                  </td>
                  <td>
                    {$datos[p_apellido]}
                  </td>
                  <td>
                    {$datos[p_nombre]}
                  </td>
                  {$curso}
                  <td>
                    $datos[telefono] === (null) ? 'SinRegistros':$datos[telefono]
                  </td>
                  <td>
                    $datos[telefono_otro] === (null) ? 'SinRegistros':$datos[telefono_otro]
                  </td>
                  <td>
                    $datos[sexo] === ('0') ? 'Masculino':'Femenino'
                  </td>
                  {$discapacidad}
                  <td>
                    <?php $datos[certificado_vacuna] === ('s') ? 'Si posee':'No posee' ?>
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
                      <?php $representante[p_apellido] ?>
                    </td>
                    <td>
                      <?php $representante[p_nombre] ?>
                    </td>
                    <td>
                      <?php $representante[cedula] ?>
                    </td>
                  <?php endif ?>
                </tr>
HTML;
              endwhile;
$html .= <<<HTML
            </tbody>
          </table>
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
    <!-- CONTENIDO TERMINA ARRIBA DE ESTO: -->
  </div>
</div>
HTML;
    // Informacion inicial del documento
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('EBNB Jose Antonio Gonzalez');
    $pdf->SetTitle('Constancia de inscripcion');

    // crea data del header y footer:
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->setFooterData(array(0,64,0), array(0,64,128));
    $pdf->setPrintHeader(false);

    // fuentes de header y footer
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // crea margenes
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // crea nuevas paginas automaticamente.
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // set image scale factor (escala imagenes)
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set default font subsetting mode
    $pdf->setFontSubsetting(true);

    // crea una pagina
    $pdf->AddPage();

    // variables de fecha:
    $meses = array(
      '01' => 'ENERO',
      '02' => 'FEBRERO',
      '03' => 'MARZO',
      '04' => 'ABRIL',
      '05' => 'MAYO',
      '06' => 'JUNIO',
      '07' => 'JULIO',
      '08' => 'AGOSTO',
      '09' => 'SEPTIEMBRE',
      '10' => 'OCTUBRE',
      '11' => 'NOVIEMBRE',
      '12' => 'DICIEMBRE'
    );
    $n = date('m');
    $mes = $meses[$n];
    $x = date('d');
    $y = $mes;
    $z = date('Y');
    $n = intval(date('Y'));
    $n1 = $n+1;
    // mes actual mas 4
    $valido = date('m');
    $valido = date('m', strtotime("+3 months", strtotime($valido)));
    $valido = $meses[$valido];
    // variables de persona:
    $p_nombre_a = htmlentities($datos['p_nombre_a'], ENT_QUOTES);
    $p_apellido_a = htmlentities($datos['p_apellido_a'], ENT_QUOTES);
    $p_nombre_r = htmlentities($datos['p_nombre_r'], ENT_QUOTES);
    $p_apellido_r = htmlentities($datos['p_apellido_r'], ENT_QUOTES);
    $cedula_a = htmlentities($datos['cedula_a'], ENT_QUOTES);
    $cedula_r = htmlentities($datos['cedula_r'], ENT_QUOTES);
    $curso = htmlentities($datos['curso'], ENT_QUOTES);
    // contenido a ejectuar para pdf:

    // magia:
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

    // ---------------------------------------------------------

    // termina el proceso y crea el archivo:
    $y = date('m');
    $nombre = "constancia-inscripcion-$cedula_a-$x-$y-$z.pdf";
    $pdf->Output($nombre, 'I');

    //FINALIZAMOS LA PAGINA:
    //trae footer.php y cola.php
    // finalizarPagina(3, 3); ?>
  <?php endif ?>
<?php mysqli_close($conexion);?>
<?php else: ?>
  <?php header('Location: menucon.php?error=vacio'); ?>
<?php endif; ?>
<?php if (false == true): ?>
  $jquery = enlaceDinamico('java/jquery-1.11.0.min.js');
  $bootstrap = enlaceDinamico('css/bootstrap/css/bootstrap.min.css');?>
  <!-- jQuery -->
  <script type="text/javascript" src="<?php echo $jquery ?>"></script>
  <!-- Bootstrap -->
  <link href="<?php echo $bootstrap ?>" rel="stylesheet">
  <div id="contenido_consultar_U">
    <div id="blancoAjax">
      <!-- CONTENIDO EMPIEZA DEBAJO DE ESTO: -->
      <!-- DETALLESE QUE NO ES UN ID SINO UNA CLASE. -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <table
              id="tabla"
              class="table table-bordered"
              data-toggle="tablex"
              data-height="600"
              data-sort-name="p_apellido"
              >
              <thead>
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
      <!-- CONTENIDO TERMINA ARRIBA DE ESTO: -->
    </div>
  </div>
<?php endif ?>
