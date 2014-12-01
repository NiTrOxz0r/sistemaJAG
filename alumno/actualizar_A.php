<?php
/**
 * @author [slayerfat] <[slayerfat@gmail.com]>
 * @author Andres leotur
 *
 * {@internal [EN DESARROLLO]}
 *
 * @todo VALIDACIONES!!!!!!!!!!!!!!!!!!!!!!!
 *
 * @version [1.1]
 */
if(!isset($_SESSION)){
session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario(1, 1, $_SESSION['cod_tipo_usr']);

//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
//DESDE empezarPagina.php
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);

  $con = conexion();

  $status         =       1;
  $cod_usr_reg    =       $_SESSION['codUsrMod'];
  $cod_usr_modn   =       $_SESSION['codUsrMod'];

  $cedulan = mysqli_escape_string($con, $_POST['cedula']);
  $sql= "SELECT a.codigo as cod_direccion from direccion a
    inner join persona b on (a.cod_persona=b.codigo) where cedula = '$cedulan';";
    $resultado = conexion($sql);
    $datos = mysqli_fetch_assoc($resultado);
    $cod_direccion_A = $datos['cod_direccion'];

  //ACTUALIZO LA DIRECCION DEL alumno
  //LA ENVIO A LA TABLA direccion_alumno

if($resultado->num_rows== 1) :

  $con = conexion();
  $status         =       1;
  $cod_usr_reg    =       $_SESSION['codUsrMod'];
  $cod_usr_mod    =       $_SESSION['codUsrMod'];


  $cedulan          = mysqli_escape_string($con, $_POST['cedula']);
  $nacionalidadn    = mysqli_escape_string($con, $_POST['nacionalidad']);
  $p_nombren        = mysqli_escape_string($con, $_POST['p_nombre']);
  $s_nombren        = mysqli_escape_string($con, $_POST['s_nombre']);
  $p_apellidon      = mysqli_escape_string($con, $_POST['p_apellido']);
  $s_apellidon      = mysqli_escape_string($con, $_POST['s_apellido']);
  $sexon            = mysqli_escape_string($con, $_POST['sexo']);
  $fec_nacn       = mysqli_escape_string($con, $_POST['fec_nac']);
  $telefonon        = mysqli_escape_string($con, $_POST['telefono']);
  $telefono_otron = mysqli_escape_string($con, $_POST['telefono_otro']);

  $queryP = "UPDATE persona SET
  cedula       = '$cedulan',
  nacionalidad = '$nacionalidadn',
  p_nombre     = '$p_nombren',
  s_nombre     = '$s_nombren',
  p_apellido   = '$p_apellidon',
  s_apellido   = '$s_apellidon',
  sexo         = '$sexon',
  fec_nac      = '$fec_nacn',
  telefono     = '$telefonon',
  telefono_otro = '$telefono_otron',
  cod_usr_mod  = '$cod_usr_modn',
  fec_mod = current_timestamp
  WHERE cedula  = '$cedulan'; ";

  $res = conexion($queryP);


  $cod_parroquian     = mysqli_escape_string($con, $_POST['cod_parro']);
  $direccion_exactan  = mysqli_escape_string($con, $_POST['direcc']);

  $queryDirA = "UPDATE direccion SET
  cod_parroquia = '$cod_parroquian',
  direccion_exacta = '$direccion_exactan',
  cod_usr_mod = '$cod_usr_modn',
  fec_mod = current_timestamp
  WHERE codigo='$cod_direccion_A';";

  $res = conexion($queryDirA);

  $cedula_escolarn = mysqli_escape_string($con, $_POST['cedula_escolar']);
  $lugar_nacn       = mysqli_escape_string($con, $_POST['lugar_nac']);
  $fec_nacn         = mysqli_escape_string($con, $_POST['fec_nac']);
  $acta_num_part_nacn         = mysqli_escape_string($con, $_POST['acta_num_part_nac']);
  $acta_folio_num_part_nacn = mysqli_escape_string($con, $_POST['acta_folio_num_part_nac']);
  $plantel_procedencian   = mysqli_escape_string($con, $_POST['plantel_procedencia']);
  $repitienten    = mysqli_escape_string($con, $_POST['repitiente']);
  $alturan        = mysqli_escape_string($con, $_POST['altura']);
  $peson          = mysqli_escape_string($con, $_POST['peso']);
  $camisan        = mysqli_escape_string($con, $_POST['camisa']);
  $pantalonn      = mysqli_escape_string($con, $_POST['pantalon']);
  $zapaton        = mysqli_escape_string($con, $_POST['zapato']);
  $certificado_vacunan = mysqli_escape_string($con, $_POST['vacuna']);
  $cod_discapacidadn  = mysqli_escape_string($con, $_POST['discapacidad']);
  $cod_curson           = mysqli_escape_string($con, $_POST['curso']);

  $query_R="SELECT cod_persona  FROM alumno a
  inner join persona b on (cod_persona=b.codigo) WHERE cedula ='$cedulan'";
  $resultado = conexion($query_R);
  $datos = mysqli_fetch_assoc($resultado);
  $cod_persona = $datos['cod_persona'];

  $queryA = "UPDATE alumno set
  cedula_escolar    = '$cedula_escolarn',
  lugar_nac         = '$lugar_nacn',
  acta_num_part_nac = '$acta_num_part_nacn',
  acta_folio_num_part_nac = '$acta_folio_num_part_nacn',
  plantel_procedencia     = '$plantel_procedencian',
  repitiente        = '$repitienten',
  altura            = '$alturan',
  peso              = '$peson',
  camisa            = '$camisan',
  pantalon          = '$pantalonn',
  zapato            = '$zapaton',
  certificado_vacuna = '$certificado_vacunan',
  cod_discapacidad    = '$cod_discapacidadn',
  cod_curso         = '$cod_curson',
  cod_usr_mod       ='$cod_usr_modn',
  fec_mod = current_timestamp
  WHERE cod_persona ='$cod_persona';";

  $res = conexion($queryA);
  if ($res) : ?>
    <div id="contenido_actualizar_A">
      <div id="blancoAjax">
        <div class="container">
          <div class="row">
            <div class="jumbotron">
              <h1>Actualizacion exitosa!</h1>
              <h4>
                Los registros asociados
                fueron actualizados correctamente!
              </h4>
              <p>
                Si desea hacer otra consulta por favor dele
                <a href="menucon.php">click a este enlace</a>
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
  <?php else : ?>
    <div id="contenido_actualizar_A">
      <div id="blancoAjax">
        <div class="container">
          <div class="row">
            <div class="jumbotron">
              <h1>Ups!</h1>
              <p>
                Error en el proceso de registro!
              </p>
              <h3>
                <small>
                  Lamentablemente, es posible que los datos de actualizacion se perdieron.
                </small>
              </h3>
              <p>
                Si desea hacer otra actualizacion por favor dele
                <a href="form_act_A.php?cedula=<?php echo $cedulan  ?>">click a este enlace</a>
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
  <?php endif;
else: ?>
  <div id="contenido_actualizar_A">
    <div id="blancoAjax">
      <div class="container">
        <div class="row">
          <div class="jumbotron">
            <h1>Ups!</h1>
            <p>
              Error en el proceso de registro!
            </p>
            <h3>
              <small>
                Lamentablemente, es posible que los datos de actualizacion se perdieron.
              </small>
            </h3>
            <p>
              Si desea hacer una consulta de una alumno, por favor dele
              <a href="menucon.php">click a este enlace</a>
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
<?php endif;
finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>
