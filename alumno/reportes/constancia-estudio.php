<?php
/**
 * @author Alejnadro Granadillo. <[slayerfat@gmail.com]>
 *
 * @internal genera un pdf con los datos del query expresado, requiere
 * al menos la cédula del alumno para generar el reporte o da mensaje de error.
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
if (!( isset($_GET['cedula']) and preg_match( "/[0-9]{6,8}/", $_GET['cedula']) )) :
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
              ¿O será que entro en esta pagina erróneamente?
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
    datosAlumno.p_apellido as p_apellido_a,
    datosAlumno.p_nombre as p_nombre_a,
    datosAlumno.cedula as cedula_a,
    alumno.cedula_escolar,
    curso.descripcion as curso,
    periodo_academico.descripcion,
    representante.p_apellido as p_apellido_r,
    representante.p_nombre as p_nombre_r,
    representante.cedula as cedula_r
    from alumno
    inner join personal_autorizado
    on alumno.cod_representante = personal_autorizado.codigo
    inner join persona as datosAlumno
    on alumno.cod_persona = datosAlumno.codigo
    inner join persona as representante
    on personal_autorizado.cod_persona = representante.codigo
    inner join asume
    on alumno.cod_curso = asume.codigo
    inner join curso
    on asume.cod_curso = curso.codigo
    inner join periodo_academico
    on asume.periodo_academico = periodo_academico.codigo
    where datosAlumno.cedula = $cedula;";
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
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->setFooterData(array(0,64,0), array(0,64,128));
    $pdf->setPrintHeader(true);
    $pdf->setPrintFooter(false);

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
    $y = $n;
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
$html = <<<HTML
<div>
  <p align="right">CARACAS, {$x} DE {$mes} DE {$z} </p>
</div>
<div style="margin:80px 0;">
  <p align="center">CONSTANCIA DE ESTUDIOS</p>
</div>
<div style="text-align: justify; padding:0 40px;">
  <p>
    Se hace constar por medio de la presente que <strong>{$p_nombre_a} {$p_apellido_a}</strong>, C&eacute;dula de identidad n&uacute;mero: <strong>{$cedula_a},</strong>
    asociado al representante <strong>{$p_nombre_r} {$p_apellido_r}</strong>, C&eacute;dula de identidad n&uacute;mero: <strong>{$cedula_r},</strong>
    formaliz&oacute; su inscripci&oacute;n y es estudiante de regular de la
    ESCUELA B&Aacute;SICA NACIONAL BOLIVARIANA "JOS&Eacute; ANTONIO GONZ&Aacute;LEZ",
    actualmente cursando en <strong>{$curso}</strong> del período academico <strong>{$n}-{$n1}.</strong>
  </p>
  <p>
    Esta constancia se expide por solicitud de la parte interesada en la ciudad de Caracas,
    a los {$x} d&iacute;as del mes de {$mes} de {$z} y es válida hasta el mes de {$valido} de {$n1}.
  </p>
</div>
<div align="center" style="margin:180px 0;">
  <p></p><p></p>
  <p>
    __________________________________________
  </p>
  <p>
    <strong>
      Lic. IRAIDA CAROLINA PONCE
    </strong>
  </p>
</div>
HTML;
    // magia:
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

    // ---------------------------------------------------------

    // termina el proceso y crea el archivo:
    $y = date('m');
    $nombre = "constancia-inscripcion-$cedula_a-$x-$y-$z.pdf";
    $pdf->Output($nombre, 'I');
    // echo $html;
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
                  para ir al proceso de inscripción <a href="<?php echo $inscripcion ?>">
                  puede seguir este enlace.
                  </a>
                </p>
                <!-- google hire me: slayerfat@gmail.com -->
              <?php endif ?>
              <p>
                ¿O será que entro en esta pagina erróneamente?
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
  <?php endif;
endif;
?>
