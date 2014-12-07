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
    elseif ($_REQUEST['tipo_personal'] === '6') :
      $where = $where." AND personal.tipo_personal = 0";
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
      personal.nivel_instruccion
      personal.email as email,
      cargo.descripcion as cargo,
      tipo_personal.descripcion as tipo_personal,
      personal.status as status_d,
      from persona
      inner join personal
      on personal.cod_persona = persona.codigo
      inner join cargo
      on personal.cod_cargo = cargo.codigo
      inner join tipo_personal
      on personal.tipo_personal = tipo_personal.codigo
      $where
      order by
      persona.p_apellido";
  endif;
  $resultado = conexion($query);
  if ($resultado):
    if ($_REQUEST['tipo'] == '7') :
      $estilo = "<style>
        .par { background-color:#FFF; }
        .inpar { background-color:#EEE; }
        table td{
          padding: 5px;
        }
      </style>";
      $encabezado = $estilo.'<table style="" cellspacing="0">';
      $thead = '<thead>
                  <tr>
                    <th>Cedula</th>
                    <th>Primer Apellido</th>
                    <th>Primer Nombre</th>
                    <th>Celular</th>
                    <th>Telefono</th>
                    <th>Telf. Ad.</th>
                    <th>Nivel Instruccion</th>
                    <th>Email</th>
                    <th>Cargo</th>
                    <th>Tipo</th>
                    <th>Estatus en Sistema</th>
                  </tr>
                </thead>';
      $tbody = '';
      $c = 0;
      while ( $datos = mysqli_fetch_array($resultado) ) :
        $clase = ($c%2==1) ? 'inpar' : 'par';
        $celular = $datos['celular'] === (null) ? '-':$datos['celular'];
        $telefono = $datos['telefono'] === (null) ? '-':$datos['telefono'];
        $telefono_otro = $datos['telefono_otro'] === (null) ? '-':$datos['telefono_otro'];
        $email = $datos['email'] === (null) ? '-':$datos['email'];
        $status = $datos['status'] === (null) ? 'Activo':'Inactivo';
        $tbody .= '<tbody>
                    <tr>
                      <td class="'.$clase.'" >'.$datos['cedula'].'</td>
                      <td class="'.$clase.'" >'.$datos['p_apellido'].'</td>
                      <td class="'.$clase.'" >'.$datos['p_nombre'].'</td>
                      <td class="'.$clase.'" >'.$celular.'</td>
                      <td class="'.$clase.'" >'.$telefono.'</td>
                      <td class="'.$clase.'" >'.$telefono_otro.'</td>
                      <td class="'.$clase.'" >'.$datos['nivel_instruccion'].'</td>
                      <td class="'.$clase.'" >'.$email.'</td>
                      <td class="'.$clase.'" >'.$datos['cargo'].'</td>
                      <td class="'.$clase.'" >'.$datos['tipo_personal'].'</td>
                      <td class="'.$clase.'" >'.$status.'</td>
                    </tr>
                  </tbody>';
        $c++;
      endwhile;
      $pie = '</table>';
      $html = $encabezado.$thead.$tbody.$pie;
    else if ($_REQUEST['tipo_personal'] === '3') :
      //codigo...
    else:
      //
    endif;
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
    $nombre = "listado-personal-$x-$y-$z.pdf";
    $pdf->Output($nombre, 'I');
    // echo $html;
  endif;
mysqli_close($conexion);
else:
endif; ?>
