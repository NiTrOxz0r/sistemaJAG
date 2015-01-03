<?php
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
$enlace = enlaceDinamico('php/tcpdf/tcpdf.php');
require_once($enlace);
$enlace = enlaceDinamico('php/clases/claseTCPDFEnvenenado.php');
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario(1, 3, $_SESSION['cod_tipo_usr']);

if ( isset($_GET['tipo']) ) :
  if ($_GET['tipo'] === '1') :
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
      asume.codigo,
      persona.p_apellido;";
  elseif ($_GET['tipo'] === '2') :
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
      asume.codigo;";
  elseif ($_GET['tipo'] === '3') :
    // alumnos existentes por curso
    if (isset($_GET['curso'])) :
      $conexion = conexion();
      $curso = mysqli_escape_string($conexion, trim($_GET['curso']) );
    else :
      header('Location: menucon.php?error=curso&valor='.$_GET['curso']);
    endif;
    $query = "SELECT
      asume.codigo as codigo,
      curso.descripcion as 'des_curso',
      periodo_academico.descripcion as 'periodo_academico',
      persona.p_apellido as 'p_apellido',
      persona.p_nombre as 'p_nombre',
      persona.cedula as 'cedula',
      alumno.cedula_escolar as 'cedula_escolar',
      persona.telefono as 'telefono'
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
      3,2,1,4,5,6,7,8;";
  elseif ($_GET['tipo'] === '4'):
    // alumnos existentes por curso
    if (isset($_GET['curso'])) :
      $conexion = conexion();
      $curso = mysqli_escape_string($conexion, trim($_GET['curso']) );
    else :
      header('Location: menucon.php?error=curso&valor='.$_GET['curso']);
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
      where asume.status = 1
      -- and asume.cod_curso = $curso
      group by
      3,2,1;";
  else:
    header('Location: menucon.php?error=tipo&valor='.$_GET['tipo']);
  endif;
  $resultado = conexion($query);
  if ($resultado):
    if ($_REQUEST['tipo'] == '1') :
      $estilo = "<style>
        .par { background-color:#FFF; }
        .inpar { background-color:#EEE; }
        table td{
          padding: 5px;
        }
      </style>";
      $encabezado = $estilo.'<p></p><p></p><p><center><h1 style="text-align:center;">Listado de Cursos</h1></center></p><table style="" cellspacing="0">';
      $thead = '<thead>
                  <tr>
                    <th>Código</th>
                    <th>Curso</th>
                    <th>Pdo. Ac.</th>
                    <th>Comentarios</th>
                    <th>Primer Apellido</th>
                    <th>Primer Nombre</th>
                    <th>Cédula</th>
                  </tr>
                </thead>';
      $tbody = '';
      $c = 0;
      while ( $datos = mysqli_fetch_array($resultado) ) :
        $clase = ($c%2==1) ? 'inpar' : 'par';
        $comentarios = $datos['comentarios'] === (null) ? '-':$datos['comentarios'];
        $tbody .= '<tbody>
                    <tr>
                      <td class="'.$clase.'" >'.$datos['codigo'].'</td>
                      <td class="'.$clase.'" >'.$datos['des_curso'].'</td>
                      <td class="'.$clase.'" >'.$datos['periodo_academico'].'</td>
                      <td class="'.$clase.'" >'.$comentarios.'</td>
                      <td class="'.$clase.'" >'.$datos['p_apellido'].'</td>
                      <td class="'.$clase.'" >'.$datos['p_nombre'].'</td>
                      <td class="'.$clase.'" >'.$datos['cedula'].'</td>
                    </tr>
                  </tbody>';
        $c++;
      endwhile;
      $pie = '</table>';
      $html = $encabezado.$thead.$tbody.$pie;
    elseif($_REQUEST['tipo'] == '2'):
      $estilo = "<style>
        .par { background-color:#FFF; }
        .inpar { background-color:#EEE; }
        table td{
          padding: 5px;
        }
      </style>";
      $encabezado = $estilo.'<p></p><p></p><table style="" cellspacing="0">';
      $thead = '<thead>
                  <tr>
                    <th>Código</th>
                    <th>Curso</th>
                    <th>Pdo. Ac.</th>
                    <th>Comentarios</th>
                  </tr>
                </thead>';
      $tbody = '';
      $c = 0;
      while ( $datos = mysqli_fetch_array($resultado) ) :
        $clase = ($c%2==1) ? 'inpar' : 'par';
        $comentarios = $datos['comentarios'] === (null) ? '-':$datos['comentarios'];
        $tbody .= '<tbody>
                    <tr>
                      <td class="'.$clase.'" >'.$datos['codigo'].'</td>
                      <td class="'.$clase.'" >'.$datos['des_curso'].'</td>
                      <td class="'.$clase.'" >'.$datos['periodo_academico'].'</td>
                      <td class="'.$clase.'" >'.$comentarios.'</td>
                    </tr>
                  </tbody>';
        $c++;
      endwhile;
      $pie = '</table>';
      $html = $encabezado.$thead.$tbody.$pie;
    elseif($_REQUEST['tipo'] == '3'):
      $query = "SELECT
      curso.descripcion as 'des_curso',
      periodo_academico.descripcion as 'periodo_academico'
      from asume
      inner join curso
      on asume.cod_curso = curso.codigo
      inner join periodo_academico
      on asume.periodo_academico = periodo_academico.codigo
      where asume.cod_curso = $curso";
      $sql = conexion($query);
      $paraTitulo = mysqli_fetch_assoc($sql);
      $titulo = '<h1 align="center">'.$paraTitulo['des_curso'].', '.$paraTitulo['periodo_academico'].'</h1>';
      $estilo = "<style>
        .par { background-color:#FFF; }
        .inpar { background-color:#EEE; }
        table td{
          padding: 5px;
        }
      </style>";
      $encabezado = $estilo.$titulo.'<p></p><p></p><table style="" cellspacing="0">';
      $thead = '<thead>
                  <tr>
                    <th>Primer Apellido</th>
                    <th>Primer Nombre</th>
                    <th>Cédula</th>
                    <th>Cédula Escolar</th>
                    <th>Teléfono</th>
                  </tr>
                </thead>';
      $tbody = '';
      $c = 0;
      while ( $datos = mysqli_fetch_array($resultado) ) :
        $clase = ($c%2==1) ? 'inpar' : 'par';
        $telefono = $datos['telefono'] === (null) ? '-':$datos['telefono'];
        $tbody .= '<tbody>
                    <tr>
                      <td class="'.$clase.'" >'.$datos['p_apellido'].'</td>
                      <td class="'.$clase.'" >'.$datos['p_nombre'].'</td>
                      <td class="'.$clase.'" >'.$datos['cedula'].'</td>
                      <td class="'.$clase.'" >'.$datos['cedula_escolar'].'</td>
                      <td class="'.$clase.'" >'.$telefono.'</td>
                    </tr>
                  </tbody>';
        $c++;
      endwhile;
      $pie = '</table>';
      $html = $encabezado.$thead.$tbody.$pie;
    elseif($_REQUEST['tipo'] == '4'):
      $estilo = "<style>
        .par { background-color:#FFF; }
        .inpar { background-color:#EEE; }
        table td{
          padding: 5px;
        }
      </style>";
      $encabezado = $estilo.'<p></p><p></p><table style="" cellspacing="0">';
      $thead = '<thead>
                  <tr>
                    <th>Código</th>
                    <th>Curso</th>
                    <th>Pdo. Ac.</th>
                    <th>Comentarios</th>
                    <th>Total Alumnos</th>
                  </tr>
                </thead>';
      $tbody = '';
      $c = 0;
      while ( $datos = mysqli_fetch_array($resultado) ) :
        $clase = ($c%2==1) ? 'inpar' : 'par';
        $comentarios = $datos['comentarios'] === (null) ? '-':$datos['comentarios'];
        $tbody .= '<tbody>
                    <tr>
                      <td class="'.$clase.'" >'.$datos['codigo'].'</td>
                      <td class="'.$clase.'" >'.$datos['des_curso'].'</td>
                      <td class="'.$clase.'" >'.$datos['periodo_academico'].'</td>
                      <td class="'.$clase.'" >'.$comentarios.'</td>
                      <td class="'.$clase.'" >'.$datos['total_alumnos'].'</td>
                    </tr>
                  </tbody>';
        $c++;
      endwhile;
      $x = date('d');
      $z = date('Y');
      $y = date('m');
      $pie = '</table><p><em>reporte generado el: '.$x.'-'.$y.'-'.$z.'</em></p>';
      $html = $encabezado.$thead.$tbody.$pie;
    endif;
    // crea un nuevo documento pdf por medio de la clase TCDPF
    $pdf = new TCPDFEnvenenado('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // Informacion inicial del documento
    $pdf->SetCreator('sistemaJAG');
    $pdf->SetAuthor('EBNB Jose Antonio Gonzalez');
    $pdf->SetTitle('Constancia de inscripción');

    // crea data del header y footer:
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->setFooterData(array(0,64,0), array(0,64,128));
    $pdf->setPrintHeader(true);

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
    $pdf->SetFontSize(8);
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
    $y = $mes;
    $n = intval(date('Y'));
    $n1 = $n+1;
    // mes actual mas 4
    $valido = date('m');
    $valido = date('m', strtotime("+3 months", strtotime($valido)));
    $valido = $meses[$valido];
    // magia:
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

    // ---------------------------------------------------------

    // termina el proceso y crea el archivo:
    $y = date('m');
    $nombre = "listado-personal-$x-$y-$z.pdf";
    $pdf->Output($nombre, 'I');
    // echo $html;
  endif;
mysqli_close($conexion);
else:
endif; ?>
