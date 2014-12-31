<?php
/**
 * @author Alejandro Granadillo
 *
 * @internal inserta allegados.
 *
 * @see form_reg_PA.php
 *
 * @version 1.0
 */
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario(1, 1, $_SESSION['cod_tipo_usr']);

if (isset($_POST['cedula'])
  and preg_match( "/[0-9]{6,8}/", $_POST['cedula'])
  and isset($_POST['cedula_a'])
  and preg_match( "/[0-9]{6,8}/", $_POST['cedula_a']) ) :
  // validacion de cedula de alumno
  $cedula_a = ChequearGenerico::cedula($_POST['cedula_a']);
  if ($cedula_a) :
    $query = "SELECT alumno.codigo
      from alumno
      inner join persona
      on alumno.cod_persona = persona.codigo
      where persona.cedula = $cedula_a;";
    $resultado = conexion($query);
    if ($resultado) :
      $go = true;
      $datosAlumno = mysqli_fetch_assoc($resultado);
    else :
      $go = false;
      $info = 'alumno';
    endif;
  else :
    $go = false;
    $info = 'alumno';
  endif;
  // validacion de retirar alumno
  if ($_POST['retira_alumno'] == 's' or $_POST['retira_alumno'] == 'n') :
    $puedeRetirar = $_POST['retira_alumno'];
    $puedeRetirar = "'$puedeRetirar'";
  else :
    $go = false;
    $info = 'retirar';
  endif;
  // validacion de comentarios
  if ( strlen($_POST['comentarios']) < 500 ) :
    if (trim($_POST['comentarios']) === '') :
      $comentarios = 'default';
    else :
      $con = conexion();
      $comentarios = mysqli_escape_string( $con, trim($_POST['comentarios']) );
      mysqli_close($con);
      $comentarios = "'$comentarios'";
    endif;
  else :
    $go = false;
    $info = 'comentarios';
  endif;
  if ($go):
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

        $query = "SELECT personal_autorizado.codigo
        from personal_autorizado
        inner join persona
        on personal_autorizado.cod_persona = persona.codigo
        where persona.codigo = $validarDireccion->codPersona;";
        $resultado = conexion($query);
        $datosRepresentante = mysqli_fetch_assoc($resultado);

        $query = "INSERT INTO obtiene
        VALUES(
          null,
          $datosRepresentante[codigo],
          $datosAlumno[codigo],
          $puedeRetirar,
          $comentarios,
          $status,
          $validarPA->codUsrMod,
          null,
          $validarPA->codUsrMod,
          current_timestamp
          );";
        $resultado = conexion($query);
        empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']); ?>
        <div id="contenido_insertar_PA">
          <div id="blancoAjax">
            <div class="container">
              <div class="row">
                <div class="jumbotron">
                  <h1>Registro exitoso!</h1>
                  <div class="margen">
                    <a
                      class="btn btn-default"
                      href="<?php echo "../personalAutorizado/form_reg_PA.php?cedula_a=$_POST[cedula_a]" ?>">
                      Registrar otro Allegado
                    </a>
                  </div>
                  <p>
                    <?php $index = enlaceDinamico(); ?>
                    <a href="<?php echo $index ?>" class="btn btn-primary btn-lg">Regresar al sistema</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php else :
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
    <div id="contenido_insertar_PA">
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
  <div id="contenido_insertar_PA">
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
