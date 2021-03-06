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
  <div id="reporte_PI">
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
    persona.codigo as codigo_persona,
    persona.nacionalidad as nacionalidad,
    persona.cedula as cedula,
    persona.p_nombre as p_nombre,
    persona.s_nombre as s_nombre,
    persona.p_apellido as p_apellido,
    persona.s_apellido as s_apellido,
    persona.fec_nac as fec_nac,
    sexo.descripcion as sexo,
    persona.telefono as telefono,
    persona.telefono_otro as telefono_otro,
    personal.codigo as codigo_personal,
    personal.email as email,
    certificado_1.descripcion as certificado_1,
    certificado_2.descripcion as certificado_2,
    certificado_3.descripcion as certificado_3,
    certificado_4.descripcion as certificado_4,
    personal.descripcion_1,
    personal.descripcion_2,
    personal.descripcion_3,
    personal.descripcion_4,
    nivel_instruccion.descripcion as nivel_instruccion,
    personal.celular as celular,
    cargo.descripcion as cargo,
    tipo_personal.descripcion as tipo_personal,
    direccion.direccion_exacta as direccion,
    parroquia.descripcion as parroquia,
    municipio.descripcion as municipio,
    estado.descripcion as estado,
    usuario.seudonimo as seudonimo,
    tipo_usuario.descripcion as tipo_usr
    from persona
    inner join sexo
    on persona.sexo = sexo.codigo
    inner join personal
    on personal.cod_persona = persona.codigo
    inner join certificado as certificado_1
    on personal.certificado_1 = certificado_1.codigo
    inner join certificado as certificado_2
    on personal.certificado_2 = certificado_2.codigo
    inner join certificado as certificado_3
    on personal.certificado_3 = certificado_3.codigo
    inner join certificado as certificado_4
    on personal.certificado_4 = certificado_4.codigo
    inner join nivel_instruccion
    on personal.nivel_instruccion = nivel_instruccion.codigo
    inner join cargo
    on personal.cod_cargo = cargo.codigo
    inner join tipo_personal
    on personal.tipo_personal = tipo_personal.codigo
    inner join usuario
    on personal.cod_usr = usuario.codigo
    inner join tipo_usuario
    on usuario.cod_tipo_usr = tipo_usuario.codigo
    inner join direccion
    on persona.codigo = direccion.cod_persona
    inner join parroquia
    on direccion.cod_parroquia = parroquia.codigo
    inner join municipio
    on parroquia.cod_mun = municipio.codigo
    inner join estado
    on municipio.cod_edo = estado.codigo
    where persona.cedula = '$cedula';";
  $resultado = conexion($query);
  if ($resultado->num_rows === 1) :
    $datos = mysqli_fetch_assoc($resultado);
    // crea un nuevo documento pdf por medio de la clase TCDPF
    $pdf = new TCPDFEnvenenado(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Informacion inicial del documento
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('EBNB Jose Antonio Gonzalez');
    $pdf->SetTitle('Constancia de inscripción');

    // crea data del header y footer:
    // $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->setFooterData(array(0,64,0), array(0,64,128));
    $pdf->setPrintHeader(true);

    // fuentes de header y footer
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    // crea margenes
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(500);
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
    $y = $n;
    $z = date('Y');
    $n = intval(date('Y'));
    $n1 = $n+1;
    // variables de persona:
    // $p_nombre_r = htmlentities($datos['p_nombre_r'], ENT_QUOTES);
    // $p_apellido_r = htmlentities($datos['p_apellido_r'], ENT_QUOTES);
    $codigo_personal = $datos['codigo_personal'];
    $cedula = $datos['cedula'];
    $nacionalidad = $datos['nacionalidad'] === ('v') ? 'Venezolano':'Extrangero';
    $p_nombre = htmlentities($datos['p_nombre'], ENT_QUOTES);
    $s_nombre = htmlentities($datos['s_nombre'], ENT_QUOTES);
    if ($datos['s_nombre'] != '' && $datos['s_nombre'] != null) :
      $s_nombre = $datos['s_nombre'];
    else :
      $s_nombre = '-';
    endif;
    $p_apellido = htmlentities($datos['p_apellido'], ENT_QUOTES);
    $s_apellido = htmlentities($datos['s_apellido'], ENT_QUOTES);
    if ($datos['s_apellido'] != '' && $datos['s_apellido'] != null) :
      $s_apellido = $datos['s_apellido'];
    else :
      $s_apellido = '-';
    endif;
    $sexo = $datos['sexo'];
    $fec_nac = $datos['fec_nac'];
    $telefono = $datos['telefono'] === (null) ? '-':$datos['telefono'];
    $telefono_otro = $datos['telefono_otro'] === (null) ? '-':$datos['telefono_otro'];
    $celular = $datos['celular'] === (null) ? '-':$datos['celular'];
    $cargo = $datos['cargo'] === (null) ? '-':$datos['cargo'];
    $tipo_personal = $datos['tipo_personal'] === (null) ? '-':$datos['tipo_personal'];
    $parroquia = htmlentities($datos['parroquia'], ENT_QUOTES);
    $municipio = htmlentities($datos['municipio'], ENT_QUOTES);
    $estado = htmlentities($datos['estado'], ENT_QUOTES);
    if ($datos['direccion'] != '' && $datos['direccion'] != null) :
      $direccion_exacta = $datos['direccion'];
    else :
      $direccion_exacta = 'SIN INFORMACIÓN, FAVOR ACTUALIZAR';
    endif;
    $email = $datos['email'] === (null) ? '-':$datos['email'];
    $nivel_instruccion = $datos['nivel_instruccion'];
    $certificado_1 = $datos['certificado_1'];
    $certificado_2 = $datos['certificado_2'];
    $certificado_3 = $datos['certificado_3'];
    $certificado_4 = $datos['certificado_4'];
    $descripcion_1 = $datos['descripcion_1'];
    $descripcion_2 = $datos['descripcion_2'];
    $descripcion_3 = $datos['descripcion_3'];
    $descripcion_4 = $datos['descripcion_4'];
    $seudonimo = $datos['seudonimo'];
    $tipo_usr = $datos['tipo_usr'];
// contenido a ejectuar para pdf:
$html = <<<HTML
<style>
  table{
    border-collapse: collapse;
    text-align: left;
  }
  table th{
    width:16%;
    padding: 15px 0;
    margin: 10px 0;
  }
  table td{
    width: 33%;
  }

</style>
<p></p>
<p></p>
<div>
<h1 align="center"><strong>REPORTE DE PERSONAL INTERNO</strong></h1>
  <div>
    <table cellspacing="0" style="border-collapse:collapse;text-align: left;">
      <tbody>
        <tr>
          <th>Nac.:</th>
          <td><strong>{$nacionalidad}</strong></td>
          <th>Cédula:</th>
          <td><strong>{$cedula}</strong></td>
        </tr>
        <tr>
          <th>P. Apellido:</th>
          <td><strong>{$p_apellido}</strong></td>
          <th>S. Apellido:</th>
          <td><strong>{$s_apellido}</strong></td>
        </tr>
        <tr>
          <th>P. Nombre:</th>
          <td><strong>{$p_nombre}</strong></td>
          <th>S. Nombre:</th>
          <td><strong>{$s_nombre}</strong></td>
        </tr>
        <tr>
          <th>Sexo:</th>
          <td><strong>{$sexo}</strong></td>
          <th>Fec. Nac.:</th>
          <td><strong>{$fec_nac}</strong></td>
        </tr>
        <tr>
          <th>Teléfono:</th>
          <td><strong>{$telefono}</strong></td>
          <th>Telf. adc.:</th>
          <td><strong>{$telefono_otro}</strong></td>
        </tr>
        <tr>
          <th>Celular:</th>
          <td><strong>{$celular}</strong></td>
          <th>Estado:</th>
          <td><strong>{$estado}</strong></td>
        </tr>
        <tr>
          <th>Municipio:</th>
          <td><strong>{$municipio}</strong></td>
          <th>Parroquia:</th>
          <td><strong>{$parroquia}</strong></td>
        </tr>
        <tr>
          <th colspan="2" width="100%">Dirección detallada:</th>
          <td></td>
        </tr>
        <tr>
          <td rowspan="1" colspan="3" width="100%"><strong>{$direccion_exacta}</strong></td>
        </tr>
        <tr>
          <th width="20%">Nivel Instruccion:</th>
          <td width="29%"><strong>{$nivel_instruccion}</strong></td>
          <th width="8%">Email:</th>
          <td width="35%"><strong>{$email}</strong></td>
        </tr>
        <tr>
          <th width="40%">Títulos y/o Certificados:</th>
        </tr>
        <tr>
          <th width="08%">Tipo:</th>
          <td width="25%"><strong>{$certificado_1}</strong></td>
          <th>Descripción:</th>
          <td width="51%"><strong>{$descripcion_1}</strong></td>
        </tr>
        <tr>
          <th width="08%">Tipo:</th>
          <td width="25%"><strong>{$certificado_2}</strong></td>
          <th>Descripción:</th>
          <td width="51%"><strong>{$descripcion_2}</strong></td>
        </tr>
        <tr>
          <th width="08%">Tipo:</th>
          <td width="25%"><strong>{$certificado_3}</strong></td>
          <th>Descripción:</th>
          <td width="51%"><strong>{$descripcion_3}</strong></td>
        </tr>
        <tr>
          <th width="08%">Tipo:</th>
          <td width="25%"><strong>{$certificado_4}</strong></td>
          <th>Descripción:</th>
          <td width="51%"><strong>{$descripcion_4}</strong></td>
        </tr>
        <tr>
          <th width="20%">Cargo:</th>
          <td><strong>{$cargo}</strong></td>
        </tr>
        <tr>
          <th width="20%">Tipo de personal:</th>
          <td width="29%"><strong>{$tipo_personal}</strong></td>
          <th width="24%">Código de Personal:</th>
          <td><strong>{$codigo_personal}</strong></td>
        </tr>
        <tr>
          <th width="20%">Seudónimo:</th>
          <td width="29%"><strong>{$seudonimo}</strong></td>
          <th width="24%">Tipo de usuario:</th>
          <td><strong>{$tipo_usr}</strong></td>
        </tr>
      </tbody>
    </table>
  </div>
  <p style="padding:150px;">&nbsp;</p>
  <p><em>Reporte generado el: {$x}-{$y}-{$z}</em></p>
</div>
HTML;
    // magia:
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

    // ---------------------------------------------------------

    // termina el proceso y crea el archivo:
    $y = date('m');
    $nombre = "reporte-personal-$cedula-$x-$y-$z.pdf";
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
                no esta registrada como Personal de esta Institucion.
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
    <?php finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);
  endif;
endif;
?>
