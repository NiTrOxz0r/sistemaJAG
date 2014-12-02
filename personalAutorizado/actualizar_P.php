<?php

if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario(1, 1, $_SESSION['cod_tipo_usr']);

//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
//DESDE empezarPagina.php
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr'], 'sistemaJAG | Actualizacion de representante/allegado');

$con = conexion();

if ( isset($_POST['cedula']) and preg_match( "/[0-9]{8}/", $_GET['cedula']) ) :
  $status         =       1;
  $cod_usr_reg    =       $_SESSION['codUsrMod'];
  $cod_usr_modn   =       $_SESSION['codUsrMod'];

  //ACTUALIZO LA DIRECCION DEL REPRESENTANTE
  //LA ENVIO A LA TABLA direccion_p_a
  $cedulan  = mysqli_escape_string($con, $_POST['cedula']);
  $sql="SELECT a.codigo as cod_direccion from direccion a
  inner join persona b on (a.cod_persona=b.codigo) where cedula = '$cedulan';";
  $resultado = conexion($sql);
  $datos = mysqli_fetch_assoc($resultado);
  $cod_direccion_P = $datos['cod_direccion'];

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

    $queryPA = "UPDATE persona SET
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
    fec_mod = current_timestamp,
    cod_usr_mod  = '$cod_usr_modn'
    WHERE cedula  = '$cedulan'; ";

    $res = conexion($queryPA);

    $cod_parroquian     = mysqli_escape_string($con, $_POST['cod_parro']);
    $direccion_exactan  = mysqli_escape_string($con, $_POST['direcc']);

    $queryDirP = "UPDATE direccion SET
    cod_parroquia    = '$cod_parroquian',
    direccion_exacta = '$direccion_exactan',
    fec_mod = current_timestamp,
    cod_usr_mod      = '$cod_usr_modn'
    WHERE codigo     ='$cod_direccion_P';";

    $res = conexion($queryDirP);

    $lugar_nacn       = mysqli_escape_string($con, $_POST['lugar_nac']);
    $emailn           = mysqli_escape_string($con, $_POST['email']);
    $relacionn          = mysqli_escape_string($con, $_POST['relacion']);
    $vive_con_alumnon = mysqli_escape_string($con, $_POST['vive_con_alumno']);
    $nivel_instruccionn = mysqli_escape_string($con, $_POST['nivel_instruccion']);
    $profesionn         = mysqli_escape_string($con, $_POST['profesion']);
    $lugar_trabajon     = mysqli_escape_string($con, $_POST['lugar_trabajo']);
    $direccion_trabajon = mysqli_escape_string($con, $_POST['direccion_trabajo']);
    $telefono_trabajon    = mysqli_escape_string($con, $_POST['telefono_trabajo']);

    $query_R="SELECT cod_persona  FROM personal_autorizado a
    inner join persona b on (cod_persona=b.codigo) WHERE cedula ='$cedulan'";
    $resultado = conexion($query_R);
    $datos = mysqli_fetch_assoc($resultado);
    $cod_persona = $datos['cod_persona'];

    $queryPA = "UPDATE personal_autorizado SET
    lugar_nac     = '$lugar_nacn',
    email         = '$emailn',
    relacion      = '$relacionn',
    vive_con_alumno   = '$vive_con_alumnon',
    nivel_instruccion = '$nivel_instruccionn',
    profesion         ='$profesionn',
    lugar_trabajo     = '$lugar_trabajon',
    direccion_trabajo = '$direccion_trabajon',
    telefono_trabajo  = '$telefono_trabajon',
    fec_mod = current_timestamp,
    cod_usr_mod       = '$cod_usr_modn'
    WHERE cod_persona = '$cod_persona'";

    $res = conexion($queryPA);

    if ($res) : ?>
      <div id="contenido_actualizar_P">
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
      <div id="contenido_actualizar_P">
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
                  <a href="form_act_P.php?cedula=<?php echo $cedulan  ?>">click a este enlace</a>
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
    <div id="contenido_actualizar_P">
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
                Si desea hacer una consulta de un representante o allegado, por favor dele
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
else : ?>
  <div id="contenido_actualizar_P">
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
              Si desea hacer una consulta de un representante o allegado, por favor dele
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
finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']); ?>
