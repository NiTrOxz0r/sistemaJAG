<?php
/**
 * @author Andres Leotur
 *
 * agente autorizado del ministerio de sanidad:
 * @author Alejandro Granadillo
 *
 * @internal inserta personal autorizado.
 *
 * @see form_reg_P.php
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

if (isset($_POST['cedula']) and preg_match( "/[0-9]{8}/", $_POST['cedula']) ) :

  $status = 1;
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
  if ( $validarPA->valido() ) :
    $query = "INSERT INTO persona(
      cedula,
      nacionalidad,
      p_nombre,
      s_nombre,
      p_apellido,
      s_apellido,
      sexo,
      fec_nac,
      telefono,
      telefono_otro,
      status,
      cod_usr_reg,
      cod_usr_mod,
      fec_mod
    )
    VALUES(
      $validarPA->cedula,
      $validarPA->nacionalidad,
      $validarPA->p_nombre,
      $validarPA->s_nombre,
      $validarPA->p_apellido,
      $validarPA->s_apellido,
      $validarPA->sexo,
      $validarPA->fecNac,
      $validarPA->telefono,
      $validarPA->telefonoOtro,
      $status,
      $validarPA->codUsrMod,
      $validarPA->codUsrMod,
      current_timestamp
    );";
    // poner diferentes nombres de query es unutil y confuso:
    // al queryP y queryDirP se asume que hay un query y un queryDir aparte
    // de no ser asi, entonces hay redudancia.
    // si queryPA y queryP estarian siendo usados al mismo tiempo, te lo creo.
    // pero en este flujo, solo se usa un query a la vez.
    // para que crear 4 variables si con una sola se hace todo?
    // eficacia y eficiencia leotur por el amor a dios.
    $res = conexion($query);

    $query = "SELECT codigo from persona where cedula = $validarPA->cedula;";
    $resultado = conexion($query);
    $datos = mysqli_fetch_assoc($resultado);
    $cod_persona = $datos['codigo'];

    $validarDireccion = new ChequearDireccion(
      $_SESSION['codUsrMod'],
      $cod_persona,
      $_POST['cod_parro'],
      $_POST['direcc']
    );

    if ( $validarDireccion->valido() ) :
      $query = "INSERT INTO direccion(
        cod_persona,
        cod_parroquia,
        direccion_exacta,
        status,
        cod_usr_reg,
        cod_usr_mod,
        fec_mod
      )
      VALUES(
        $validarDireccion->codPersona,
        $validarDireccion->codParroquia,
        $validarDireccion->direccionExacta,
        $status,
        $validarDireccion->codUsrMod,
        $validarDireccion->codUsrMod,
        current_timestamp
      );";

      $res = conexion($query);

      $query = "INSERT INTO personal_autorizado(
        cod_persona,
        lugar_nac,
        email,
        relacion,
        vive_con_alumno,
        nivel_instruccion,
        profesion,
        lugar_trabajo,
        direccion_trabajo,
        telefono_trabajo,
        status,
        cod_usr_reg,
        cod_usr_mod,
        fec_mod
      )
      VALUES(
        $validarDireccion->codPersona,
        $validarPA->lugNac,
        $validarPA->email,
        $validarPA->relacion,
        $validarPA->viveConAlumno,
        $validarPA->nivelInstruccion,
        $validarPA->profesion,
        $validarPA->lugarTrabajo,
        $validarPA->direccionTrabajo,
        $validarPA->telefonoTrabajo,
        $status,
        $validarPA->codUsrMod,
        $validarPA->codUsrMod,
        current_timestamp
      );";

      $res = conexion($query);

      header("Location:../alumno/form_reg_A.php?cedula_r=$_POST[cedula]");
    else :
      empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']); ?>
      <div id="contenido_insertar_P">
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
    empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']); ?>
    <div id="contenido_insertar_P">
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
                       <?php echo $validarPA->info() ?>
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


else:
  empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']); ?>
  <div id="contenido_insertar_P">
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
                Lamentablemente, es posible que los datos de registro se perdieron.
              </small>
            </h3>
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
finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>
