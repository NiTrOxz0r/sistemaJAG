<?php
/**
 * @author Alejnadro Granadillo. <[slayerfat@gmail.com]>
 *
 * @internal genera un pdf con los datos del query expresado, requiere
 * al menos la cedula del alumno para generar el reporte o da mensaje de error.
 *
 * @see insertar_A.php
 *
 * @version 1.0
 */
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
$enlace = enlaceDinamico('php/tcpdf/tcpdf.php');
require_once($enlace);
$enlace = enlaceDinamico('php/clases/claseTCPDFEnvenenado.php');
require_once($enlace);

if(!isset($_SESSION)){
session_start();
}
validarUsuario(1, 1, $_SESSION['cod_tipo_usr']);
if (!( isset($_GET['cedula']) and preg_match( "/[0-9]{8}/", $_GET['cedula']) )) :
  empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>
  <div id="contenido_actualizar_A">
    <div id="blancoAjax">
      <div class="container">
        <div class="row">
          <div class="jumbotron">
            <h1>Ups!</h1>
            <p>
              Error en el proceso de reporte!
            </p>
            <p>
              ¿O sera que entro en esta pagina erroneamente?
            </p>
            <p class="bg-warning">
              Si este es un problema recurrente, contacte a un administrador del sistema.
            </p>
            <p>
              <?php $index = enlaceDinamico(); ?>
              <a href="<?php echo $index ?>" class="btn btn-primary btn-lg">Regresar al sistema</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);
else :
  $conexion = conexion();
  $cedula = mysqli_escape_string($conexion, $_GET['cedula']);
  $query = "SELECT
  persona.codigo, cedula, cedula_escolar, nacionalidad,
  p_nombre, s_nombre, p_apellido, s_apellido,
  sexo, fec_nac, lugar_nac, telefono, telefono_otro,
  curso.descripcion as curso,
  parroquia.descripcion as parroquia,
  direccion_exacta as direccion,
  acta_num_part_nac, acta_folio_num_part_nac,
  plantel_procedencia, repitiente,
  altura, peso,
  camisa.descripcion as camisa,
  pantalon.descripcion as pantalon,
  zapato, certificado_vacuna,
  discapacidad.descripcion as discapacidad
  FROM persona
  inner join alumno
  on persona.codigo = alumno.cod_persona
  inner join talla as camisa
  on alumno.camisa = camisa.codigo
  inner join talla as pantalon
  on alumno.pantalon = pantalon.codigo
  inner join discapacidad
  on alumno.cod_discapacidad = discapacidad.codigo
  inner join asume
  on alumno.cod_curso = asume.cod_curso
  inner join curso
  on asume.cod_curso = curso.codigo
  inner join direccion
  on persona.codigo = direccion.cod_persona
  inner join parroquia
  on direccion.cod_parroquia = parroquia.codigo
  where cedula = '$cedula';";
  $resultado = conexion($query);
  if ($resultado->num_rows === 1) :
    $datos = mysqli_fetch_assoc($resultado);
    // crea un nuevo documento pdf por medio de la clase TCDPF
    $pdf = new TCPDFEnvenenado(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Informacion inicial del documento
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('EBNB Jose Antonio Gonzalez');
    $pdf->SetTitle('Constancia de inscripcion');

    // crea data del header y footer:
    // $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->setFooterData(array(0,64,0), array(0,64,128));
    $pdf->setPrintHeader(true);

    // fuentes de header y footer
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    define('PDF_MARGIN_HEADER20', 500);
    // crea margenes
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin('PDF_MARGIN_HEADER20');
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
      '12' => 'DICIEMBRE',
      '1' => 'ENERO',
      '2' => 'FEBRERO',
      '3' => 'MARZO',
      '4' => 'ABRIL',
      '5' => 'MAYO',
      '6' => 'JUNIO',
      '7' => 'JULIO',
      '8' => 'AGOSTO',
      '9' => 'SEPTIEMBRE'
    );
    $n = date('m');
    $mes = $meses[$n];
    $x = date('d');
    $y = $mes;
    $z = date('Y');
    $n = intval(date('Y'));
    $n1 = $n+1;
    // variables de persona:
    // $p_nombre_r = htmlentities($datos['p_nombre_r'], ENT_QUOTES);
    // $p_apellido_r = htmlentities($datos['p_apellido_r'], ENT_QUOTES);
    $cedula = $datos['cedula'];
    $cedula_escolar = $datos['cedula_escolar'];
    $nacionalidad = $datos['nacionalidad'] === ('v') ? 'Venezolano':'Extrangero';
    $p_nombre = htmlentities($datos['p_nombre'], ENT_QUOTES);
    $p_nombre = htmlentities($datos['p_nombre'], ENT_QUOTES);
    $p_apellido = htmlentities($datos['p_apellido'], ENT_QUOTES);
    $s_apellido = htmlentities($datos['s_apellido'], ENT_QUOTES);
    if ($datos['s_apellido'] != '' && $datos['s_apellido'] != null) :
      $s_apellido = $datos['s_apellido'];
    else :
      $s_apellido = '-';
    endif;
    $sexo = $datos['sexo'] === ('0') ? 'Masculino':'Femenino';
    $fec_nac = $datos['fec_nac'];
    if ($datos['lugar_nac'] != '' && $datos['lugar_nac'] != null) :
      $lugar_nac = htmlentities($datos['lugar_nac'], ENT_QUOTES);
    else :
      $lugar_nac = 'SIN INFORMACION, FAVOR ACTUALIZAR';
    endif;
    $telefono = $datos['telefono'];
    $telefono_otro = $datos['telefono_otro'];
    $curso = htmlentities($datos['curso'], ENT_QUOTES);
    $parroquia = htmlentities($datos['parroquia'], ENT_QUOTES);
    if ($datos['direccion'] != '' && $datos['direccion'] != null) :
      $lug_nac = $datos['direccion'];
    else :
      $lug_nac = 'SIN INFORMACION, FAVOR ACTUALIZAR';
    endif;
    $acta_num_part_nac = htmlentities($datos['acta_num_part_nac'], ENT_QUOTES);
    $acta_folio_num_part_nac = htmlentities($datos['acta_folio_num_part_nac'], ENT_QUOTES);
    $plantel_procedencia = htmlentities($datos['plantel_procedencia'], ENT_QUOTES);
    $repitiente = $datos['repitiente'] === ('s') ? 'SI':'NO';
    $altura = $datos['altura'];
    $peso = $datos['peso'];
    $camisa = $datos['camisa'];
    $pantalon = $datos['pantalon'];
    $zapato = $datos['zapato'];
    $certificado_vacuna = $datos['certificado_vacuna'] === ('s') ? 'SI':'NO';
    $discapacidad = htmlentities($datos['discapacidad'], ENT_QUOTES);
    // $dia_alumno = $datos['dia'];
    // $mes_alumno = $meses[$datos['mes']];
    // $anio_alumno = $datos['anio'];
    // $articulo = $datos['sexo'] === ('0') ? 'el':'la';
    // $sustantivoAlumno = $datos['sexo'] === ('0') ? 'alumno':'alumna';
    // $nacidoa = $datos['sexo'] === ('0') ? 'nacido':'nacida';
    // $inscritoa = $datos['sexo'] === ('0') ? 'inscrito':'inscrita';
// contenido a ejectuar para pdf:
$html = <<<HTML
<div>
  <p>
    <span>Nacionalidad: <strong>{$nacionalidad}</strong></span>
    <span>Cedula: <strong>{$cedula}</strong></span>
    <span>Cedula Escolar: <strong>{$cedula_escolar}</strong></span>
  </p>
  <p>
    <span>Primer Apellido: <strong>{$p_apellido}</strong></span>
    <span>Segundo Apellido: <strong>{$s_apellido}</strong></span>
  </p>
</div>
HTML;
    // magia:
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

    // ---------------------------------------------------------

    // termina el proceso y crea el archivo:
    $y = date('m');
    $nombre = "reporte-$p_apellido-$cedula-$x-$y-$z.pdf";
    $pdf->Output($nombre, 'I');
  else:
    empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>
    <div id="contenido_actualizar_A">
      <div id="blancoAjax">
        <div class="container">
          <div class="row">
            <div class="jumbotron">
              <h1>Ups!</h1>
              <p>
                Error en el proceso de reporte!
              </p>
              <p class="bg-danger">
                La cedula: <strong><?php echo $_GET['cedula'] ?></strong>,
                no esta registrada como alumno.
              </p>
              <!-- !importante -->
              <?php $enlace = encuentraCedula($_REQUEST['cedula']) ?>
              <?php if ( $enlace ): ?>
                <!-- se quedaron locos verdad? -->
                <div class="bg-info">
                  <h2>
                    Sin embargo:
                  </h2>
                  <p>
                    Esta cedula
                    <a href="<?php echo $enlace ?> ">existe en el sistema</a>
                  </p>
                </div>
              <?php else: ?>
                <?php
                $enlace = "personalAutorizado/form_reg_P.php?cedula=$_GET[cedula_r]";
                $inscripcion = enlaceDinamico("$enlace"); ?>
                <p>
                  La cedula <?php echo $_GET['cedula'] ?>, no esta registrada en el sistema.
                  <em>Para registrar a un alumno, es necesario registrar primero al representante.</em>
                  para ir al proceso de inscripcion <a href="<?php echo $inscripcion ?>">
                  puede seguir este enlace.
                  </a>
                </p>
                <!-- google hide me: slayerfat@gmail.com -->
              <?php endif ?>
              <p>
                ¿O sera que entro en esta pagina erroneamente?
              </p>
              <p class="bg-warning">
                Si este es un problema recurrente, contacte a un administrador del sistema.
              </p>
              <p>
                <?php $index = enlaceDinamico(); ?>
                <a href="<?php echo $index ?>" class="btn btn-primary btn-lg">Regresar al sistema</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);
  endif;
endif;
?>
