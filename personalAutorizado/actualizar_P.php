<?php
/**
 * @author Andres leotur
 *
 * desinfectado con cloro y amonico por:
 * @author [slayerfat] <[slayerfat@gmail.com]>
 * {@internal [genera una actualizacion de algun registro
 * por medio de form_act_P, con las actualizaciones respectivas
 * gracias a (ChequearAlumno y ChequearDireccion)]}
 *
 * @version 1.1
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
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr'], 'sistemaJAG | Actualizacion de representante/allegado');

$con = conexion();

if ( isset($_POST['cedula']) and preg_match( "/[0-9]{8}/", $_POST['cedula']) ) :
  $status = 1;
  // $cedula = mysqli_escape_string( $con, trim($_POST['cedula']) );
  $cedula = ChequearGenerico::cedula($_POST['cedula']);
  //MODIFICADO: ver actualizar_A linea 27 en adelante
  //detalla como hice cedula aqui, lo hice de las 2 maneras pa que veas
  //que no es dificil
  $sql = "SELECT
    direccion.codigo as cod_direccion
    from direccion
    inner join persona
    on direccion.cod_persona = persona.codigo
    where persona.codigo = $_SESSION[codigo_persona];";
  $resultado = conexion($sql);
  // de aqui pa lante lo hare menos secuencial que insertar_A.php
  if($resultado->num_rows == 1) :
    $datos = mysqli_fetch_assoc($resultado);
    $cod_direccion_P = $datos['cod_direccion'];
    $cod_persona = $_SESSION['codigo_persona'];
  else :
    $cod_direccion_P = 'Direccion relacionada con usuario es inexistente';
    $cod_persona = 'Usuario inexistente en sistema!';
  endif;
  $validarPA = new ChequearPA(
    $_SESSION['codUsrMod'],
    $_POST['p_apellido'],
    $_POST['s_apellido'],
    $_POST['p_nombre'],
    $_POST['s_nombre'],
    $_POST['nacionalidad'],
    $_POST['cedula'],
    $_POST['telefono'],
    $_POST['telefono_otro'],
    $_POST['fec_nac'],
    $_POST['lugar_nac'],
    $_POST['email'],
    $_POST['sexo'],
    $_POST['relacion'],
    $_POST['vive_con_alumno'],
    $_POST['nivel_instruccion'],
    $_POST['profesion'],
    $_POST['telefono_trabajo'],
    $_POST['direccion_trabajo'],
    $_POST['lugar_trabajo']
  );
  $validarDireccion = new ChequearDireccion(
    $_SESSION['codUsrMod'],
    $cod_persona,
    $_POST['cod_parro'],
    $_POST['direcc']
  );
  if ( !$validarPA->valido() ) :
    $info = $validarPA->info();
  elseif ( !$validarDireccion->valido() ) :
    $info = $validarDireccion->info();
  else:
    mysqli_autocommit($con, false);
    $query_ok = true;
    $query = "UPDATE persona SET
      cedula        = $validarPA->cedula,
      nacionalidad  = $validarPA->nacionalidad,
      p_nombre      = $validarPA->p_nombre,
      s_nombre      = $validarPA->s_nombre,
      p_apellido    = $validarPA->p_apellido,
      s_apellido    = $validarPA->s_apellido,
      sexo          = $validarPA->sexo,
      fec_nac       = $validarPA->fecNac,
      telefono      = $validarPA->telefono,
      telefono_otro = $validarPA->telefonoOtro,
      fec_mod       = current_timestamp,
      cod_usr_mod   = $validarPA->codUsrMod
      WHERE cedula  = $validarPA->cedula;";
    mysqli_query($con, $query) ? null : $query_ok=false;
    echo $query_ok === (false) ? 'persona' : null;
    // $res = conexion($query);
    $query = "UPDATE direccion SET
      cod_parroquia    = $validarDireccion->codParroquia,
      direccion_exacta = $validarDireccion->direccionExacta,
      fec_mod          = current_timestamp,
      cod_usr_mod      = $validarDireccion->codUsrMod
      WHERE codigo     = $cod_direccion_P;";
    mysqli_query($con, $query) ? null : $query_ok=false;
    echo $query_ok === (false) ? 'dir' : null;
    // $res = conexion($query);
    $query = "UPDATE personal_autorizado SET
      lugar_nac         = $validarPA->lugNac,
      email             = $validarPA->email,
      relacion          = $validarPA->relacion,
      vive_con_alumno   = $validarPA->viveConAlumno,
      nivel_instruccion = $validarPA->nivelInstruccion,
      profesion         = $validarPA->profesion,
      lugar_trabajo     = $validarPA->lugarTrabajo,
      direccion_trabajo = $validarPA->direccionTrabajo,
      telefono_trabajo  = $validarPA->telefonoTrabajo,
      fec_mod           = current_timestamp,
      cod_usr_mod       = $validarPA->codUsrMod
      WHERE cod_persona = $cod_persona";
    // $res = conexion($query, 2);
    mysqli_query($con, $query) ? null : $query_ok=false;
    echo $query_ok === (false) ? 'pa' : null;
    $query_ok ? mysqli_commit($con) : mysqli_rollback($con);

    if ($query_ok) : ?>
      <div id="contenido_actualizar_P">
        <div id="blancoAjax">
          <div class="container">
            <div class="row">
              <div class="jumbotron">
                <h1>Actualizacion exitosa!</h1>
                <h3>
                  <small>Los registros asociados con </small>
                </h3>
                <p>
                  <?php echo $_POST['p_apellido'].", ".$_POST['p_nombre'] ?>:
                  <strong><?php echo $_POST['cedula'] ?></strong>
                </p>
                <h3>
                  <small>fueron actualizados correctamente!</small>
                </h3>
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
                <p class="bg-danger">
                  Ocurrio un suceso inesperado en la actualizacion del registro
                  en el sitema.
                </p>
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
  endif;
  if ( isset($info) ): ?>
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
                Los datos suministrados al sistema parecen ser invalidos!
              </h3>
              <div class="bg-danger">
                <p>
                  <em>Especificamente el sistema declara:</em>
                </p>
                <p>
                   <strong>
                     <em>
                       <?php echo $info ?>
                     </em>
                   </strong>
                </p>
              </div>
              <p class="bg-info">
                Si considera que esto no es un error, contacte a un administrador del sistema.
              </p>
              <?php $inscripcion = enlaceDinamico('personalAutorizado/form_reg_P.php'); ?>
              <p>
                para ir al proceso de inscripcion <a href="<?php echo $inscripcion ?>">
                puede seguir este enlace.
                </a>
              </p>
              <p>
                Si desea hacer una consulta por favor dele
                <a href="menucon.php">click a este enlace.</a>
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
