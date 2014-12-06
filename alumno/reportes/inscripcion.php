<?php
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
$enlace = enlaceDinamico('php/tcpdf/tcpdf.php');
require_once($enlace);

if (!( isset($_GET['cedula']) and preg_match( "/[0-9]{8}/", $_GET['cedula']) )) :
  echo "error.";
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
on alumno.cod_curso = asume.cod_curso
inner join curso
on asume.cod_curso = curso.codigo
inner join periodo_academico
on asume.periodo_academico = periodo_academico.codigo
where datosAlumno.cedula = $cedula;";
$resultado = conexion($query);
$datos = mysqli_fetch_assoc($resultado);
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 001');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));
$pdf->setPrintHeader(false);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
// $pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
// $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

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

$p_nombre_a = htmlentities($datos['p_nombre_a'], ENT_QUOTES);
$p_apellido_a = htmlentities($datos['p_apellido_a'], ENT_QUOTES);
$p_nombre_r = htmlentities($datos['p_nombre_r'], ENT_QUOTES);
$p_apellido_r = htmlentities($datos['p_apellido_r'], ENT_QUOTES);
$cedula_a = htmlentities($datos['cedula_a'], ENT_QUOTES);
$cedula_r = htmlentities($datos['cedula_r'], ENT_QUOTES);
$curso = htmlentities($datos['curso'], ENT_QUOTES);
// contenido a ejectuar para pdf:
$html = <<<HTML
<div style="min-height:100px; border:2px solid black; min-width:100%;">
  Republica bolivariana de venezuela, Ministerio del Poder Popular para la Educacion
  Escuela Basica Nacional Bolivariana "Jose Antonio Gonzalez"
  etc. etc. etc.
</div>
<div>
  <p align="right">CARACAS, {$x} DE {$y} DE {$z} </p>
</div>
<div style="margin:80px 0;">
  <p align="center">REGISTRO DE ESTUDIANTE</p>
</div>
<div style="text-align: justify; padding:0 40px;">
  <p>
    Se hace constar por medio de la presente que
    <strong>
      {$p_nombre_a} {$p_apellido_a},
      C&eacute;dula de identidad n&uacute;mero: {$cedula_a},
    </strong>
    asociado al representante
    <strong>
      {$p_nombre_r} {$p_apellido_r},
      C&eacute;dula de identidad n&uacute;mero: {$cedula_r},
    </strong>
    particip&oacute; en el proceso de inscripci&oacute;n <strong>{$n}-{$n1}</strong>
    de la
    ESCUELA B&Aacute;SICA NACIONAL BOLIVARIANA "JOS&Eacute; ANTONIO GONZ&Aacute;LEZ",
    asignado al curso <strong>{$curso}</strong>.
  </p>
  <p>
    Lorem ipsum dolor sit amet,
    consectetur adipisicing elit,
    ed do eiusmod tempor incididunt ut
    labore et dolore magna aliqua. Ut enim ad
    minim veniam, quis nostrud exercitation ullamco
    laboris nisi ut aliquip ex ea commodo consequat.
  </p>
</div>
<div align="center" style="margin:80px 0;">
  <p>
    __________________________________________
  </p>
  <p>
    <strong>
      Persona encargada de firmar la cuestion.
    </strong>
  </p>
</div>
<div align="center" style="float:bottom;">
  <p>
    pie de pagina
  </p>
</div>
HTML;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$y = date('m');
$nombre = "constancia-inscripcion-$cedula_a-$x-$y-$z.pdf";
$pdf->Output($nombre, 'I');
// ---------------------------------------------------------
// echo "$html";
endif;
?>
