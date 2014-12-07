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
    // elseif ($_REQUEST['tipo'] === '4') :
    //   $where = "WHERE alumno.cod_curso = $valor";
    elseif ($_REQUEST['tipo'] === '5') :
      $where = "where (personal_autorizado.status = 1 or persona.status = 1) ";
    elseif ($_REQUEST['tipo'] === '6') :
      $where = "where (personal_autorizado.status = 0 or persona.status = 0) ";
    else:
    endif;
    $query = "SELECT *
      from persona
      inner join personal_autorizado
      on personal_autorizado.cod_persona = persona.codigo
      $where
      order by
      persona.p_apellido, persona.cedula;";
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
      persona.p_apellido, persona.cedula;";
  endif;
  $resultado = conexion($query);
  if ($resultado):
    // crea un nuevo documento pdf por medio de la clase TCDPF
    $pdf = new TCPDFEnvenenado('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // Informacion inicial del documento
    $pdf->SetCreator('sistemaJAG');
    $pdf->SetAuthor('EBNB Jose Antonio Gonzalez');
    $pdf->SetTitle('Constancia de inscripcion');

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
    $x = date('d');
    $y = $mes;
    $z = date('Y');
    $n = intval(date('Y'));
    $n1 = $n+1;
    // mes actual mas 4
    $valido = date('m');
    $valido = date('m', strtotime("+3 months", strtotime($valido)));
    $valido = $meses[$valido];
    // contenido a ejectuar para pdf:
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
                  <th>Cedula</th>
                  <th>Primer Apellido</th>
                  <th>Primer Nombre</th>
                  <th>Telefono</th>
                  <th>Telf. Ad.</th>
                  <th>Sexo</th>
                  <th>Email</th>
                  <th>Nivel Ed.</th>
                  <th>Profesion</th>
                  <th>Tel. Lab.</th>
                </tr>
              </thead>';
    $tbody = '';
    $c = 0;
    while ( $datos = mysqli_fetch_array($resultado) ) :
      $clase = ($c%2==1) ? 'inpar' : 'par';
      $telefono = $datos['telefono'] === (null) ? '-':$datos['telefono'];
      $telefono_otro = $datos['telefono_otro'] === (null) ? '-':$datos['telefono_otro'];
      $telefono_trabajo = $datos['telefono_trabajo'] === (null) ? '-':$datos['telefono_trabajo'];
      $sexo = $datos['sexo'] === ('0') ? 'Masculino':'Femenino';
      $email = $datos['email'] === (null) ? '-':$datos['email'];
      $query = "SELECT descripcion
      from nivel_instruccion where codigo = $datos[nivel_instruccion];";
      $sql = conexion($query);
      $nivel_instruccion = mysqli_fetch_assoc($sql);
      $query = "SELECT descripcion
      from profesion where codigo = $datos[profesion];";
      $sql = conexion($query);
      $profesion = mysqli_fetch_assoc($sql);
      $tbody .= '<tbody>
                  <tr>
                    <td class="'.$clase.'" >'.$datos['cedula'].'</td>
                    <td class="'.$clase.'" >'.$datos['p_apellido'].'</td>
                    <td class="'.$clase.'" >'.$datos['p_nombre'].'</td>
                    <td class="'.$clase.'" >'.$telefono.'</td>
                    <td class="'.$clase.'" >'.$telefono_otro.'</td>
                    <td class="'.$clase.'" >'.$sexo.'</td>
                    <td class="'.$clase.'" >'.$email.'</td>
                    <td class="'.$clase.'" >'.$nivel_instruccion['descripcion'].'</td>
                    <td class="'.$clase.'" >'.$profesion['descripcion'].'</td>
                    <td class="'.$clase.'" >'.$telefono_trabajo.'</td>
                  </tr>
                </tbody>';
      $c++;
    endwhile;
    $pie = '</table>';
    $html = $encabezado.$thead.$tbody.$pie;
    // magia:
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

    // ---------------------------------------------------------

    // termina el proceso y crea el archivo:
    $y = date('m');
    $nombre = "listado-alumnos-$x-$y-$z.pdf";
    $pdf->Output($nombre, 'I');
    // echo $html;
  endif;
mysqli_close($conexion);
else:
endif; ?>
