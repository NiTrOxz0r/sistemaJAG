<?php
/**
 * @author Andres leotur
 *
 * desinfectado con cloro y amonico por:
 * @author [slayerfat] <[slayerfat@gmail.com]>
 * {@internal [genera las actualizaciones respectivas de alumno
 * validadas por medio de php (ChequearAlumno y ChequearDireccion)]}
 *
 * @version 1.2
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
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr'], 'sistemaJAG | Actualizacion de alumno');

if ( isset($_POST['cedula']) and preg_match( "/[0-9]{8}/", $_POST['cedula']) ) :

  $con = conexion();
  $status = 1;
  // SE HACEN LOS SELECT PRIMERO
  // LUEGO LOS UPDATE E INSERTS.
  //
  // SE HACEN LOS SELECT PRIMERO
  // LUEGO LOS UPDATE E INSERTS.
  //
  // SE HACEN LOS SELECT PRIMERO
  // LUEGO LOS UPDATE E INSERTS.
  //
  // SE HACEN LOS SELECT PRIMERO
  // LUEGO LOS UPDATE E INSERTS.
  //
  // SE HACEN LOS SELECT PRIMERO
  // LUEGO LOS UPDATE E INSERTS.
  //
  // SE HACEN LOS SELECT PRIMERO
  // LUEGO LOS UPDATE E INSERTS.
  $cedula = mysqli_escape_string( $con, trim($_POST['cedula']) );
  // chamo porque te encanta poner alias en estos query tan sencillos?
  $sql = "SELECT a.codigo as cod_direccion,
    b.codigo as cod_persona
    from direccion a
    inner join persona b
    on (a.cod_persona=b.codigo)
    where cedula = '$cedula';";
  $resultado = conexion($sql);
  // hago esto para darle uso a ChequearAlumno y su mensaje automatizado:
  if($resultado->num_rows == 1) :
    $datos = mysqli_fetch_assoc($resultado);
    $cod_direccion_A = $datos['cod_direccion'];
    $cod_persona = $datos['cod_persona'];
  else :
    $cod_direccion_A = 'Direccion relacionada con usuario es inexistente';
    $cod_persona = 'Usuario inexistente en sistema!';
  endif;
  // chamo porque te encanta poner alias en estos query tan sencillos?
  // lo que haces es complicarte la vida y hacer query de mas.
  // (mira el query de arriba, hiciste la misma vaina 2 veces).
  // $query_R="SELECT cod_persona  FROM alumno a
  // inner join persona b on (cod_persona=b.codigo) WHERE cedula ='$cedula'";
  // $resultado = conexion($query_R);
  // $datos = mysqli_fetch_assoc($resultado);
  // $cod_persona = $datos['cod_persona'];

  //ACTUALIZO LA DIRECCION DEL alumno
  //LA ENVIO A LA TABLA direccion_alumno


  // if($resultado->num_rows== 1) :
  // es irrelevante porque mysqli_fetch_assoc($resultado);
  // regresa nulo y hasta da error cuando esta en $resultado->num_rows == 0
  // por favor mejora la gramatica programacional
  // ($resultado->num_rows== 1) << feo
  // ( $resultado->num_rows == 1 ) << bonito y legible

  // se validan TODOS los campos y luego
  // se hace el update, no de forma secuencial.
  $validarAlumno = new ChequearAlumno(
    $_SESSION['codUsrMod'],
    $_POST['p_apellido'],
    $_POST['s_apellido'],
    $_POST['p_nombre'],
    $_POST['s_nombre'],
    $_POST['nacionalidad'],
    $_POST['cedula'],
    $_POST['cedula_escolar'],
    $_POST['telefono'],
    $_POST['telefono_otro'],
    $_POST['fec_nac'],
    $_POST['lugar_nac'],
    $_POST['sexo'],
    $_POST['acta_num_part_nac'],
    $_POST['acta_folio_num_part_nac'],
    $_POST['plantel_procedencia'],
    $_POST['repitiente'],
    $_POST['curso'],
    $_POST['altura'],
    $_POST['peso'],
    $_POST['camisa'],
    $_POST['pantalon'],
    $_POST['zapato'],
    $_POST['discapacidad'],
    $_POST['vacuna'],
    $cod_persona
  );
  if ( $validarAlumno->valido() ) :
    $validarDireccion = new ChequearDireccion(
      $_SESSION['codUsrMod'],
      $cod_persona,
      $_POST['cod_parro'],
      $_POST['direcc']
    );
    if( $validarDireccion->valido() ) :
      mysqli_autocommit($con, false);
      $query_ok = true;
      $query = "UPDATE persona SET
        cedula        = $validarAlumno->cedula,
        nacionalidad  = $validarAlumno->nacionalidad,
        p_nombre      = $validarAlumno->p_nombre,
        s_nombre      = $validarAlumno->s_nombre,
        p_apellido    = $validarAlumno->p_apellido,
        s_apellido    = $validarAlumno->s_apellido,
        sexo          = $validarAlumno->sexo,
        fec_nac       = $validarAlumno->fecNac,
        telefono      = $validarAlumno->telefono,
        telefono_otro = $validarAlumno->telefonoOtro,
        cod_usr_mod   = $validarAlumno->codUsrMod,
        fec_mod       = current_timestamp
        WHERE cedula  = $validarAlumno->cedula;";
      // $res = conexion($queryP);
      mysqli_query($con, $query) ? null : $query_ok=false;
      echo $query_ok === (false) ? 'persona' : null;
      $query = "UPDATE direccion SET
        cod_parroquia    = $validarDireccion->codParroquia,
        direccion_exacta = $validarDireccion->direccionExacta,
        cod_usr_mod      = $validarDireccion->codUsrMod,
        fec_mod          = current_timestamp
        WHERE codigo = $cod_direccion_A;";
      mysqli_query($con, $query) ? null : $query_ok=false;
      echo $query_ok === (false) ? 'dir' : null;
      // $res = conexion($queryDirA);
      $query = "UPDATE alumno set
        cedula_escolar          = $validarAlumno->cedulaEscolar,
        lugar_nac               = $validarAlumno->lugNac,
        acta_num_part_nac       = $validarAlumno->actaNumero,
        acta_folio_num_part_nac = $validarAlumno->actaFolio,
        plantel_procedencia     = $validarAlumno->plantelProcedencia,
        repitiente              = $validarAlumno->repitiente,
        altura                  = $validarAlumno->altura,
        peso                    = $validarAlumno->peso,
        camisa                  = $validarAlumno->camisa,
        pantalon                = $validarAlumno->pantalon,
        zapato                  = $validarAlumno->zapato,
        certificado_vacuna      = $validarAlumno->vacuna,
        cod_discapacidad        = $validarAlumno->discapacidad,
        cod_curso               = $validarAlumno->codCurso,
        cod_usr_mod             = $validarAlumno->codUsrMod,
        fec_mod = current_timestamp
        WHERE cod_persona = $cod_persona;";
      mysqli_query($con, $query) ? null : $query_ok=false;
      echo $query_ok === (false) ? 'alu' : null;
      $query_ok ? mysqli_commit($con) : mysqli_rollback($con);
      // $res = conexion($queryA);
      if ($query_ok) : ?>
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
                  <p class="bg-danger">
                    Ocurrio un suceso inesperado en la actualizacion del registro
                    en el sitema.
                  </p>
                  <p>
                    Si desea hacer otra actualizacion por favor dele
                    <a href="form_act_A.php?cedula=<?php echo $cedula ?>">click a este enlace</a>
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
                  Los datos suministrados al sistema parecen ser invalidos!
                </h3>
                <div class="bg-danger">
                  <p>
                    <em>Especificamente el sistema declara:</em>
                  </p>
                  <p>
                     <strong>
                       <em>
                         <?php echo $validarDireccion->info() ?>
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
                Los datos suministrados al sistema parecen ser invalidos!
              </h3>
              <div class="bg-danger">
                <p>
                  <em>Especificamente el sistema declara:</em>
                </p>
                <p>
                   <strong>
                     <em>
                       <?php echo $validarAlumno->info() ?>
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
