<?php
/**
 * @author [Andres Leotur]
 *
 * desinfectado por:
 * @author [Alejandro Granadillo]
 *
 * {@internal [esta funcion genera el registro de base de datos de alumno
 * solo requiere como condicion saber la cedula del representante.]}
 *
 * @see alumno/form_reg_A.php
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

empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr'], 'sistemaJAG | Registro de alumno');

if ( isset($_POST['cedula_r']) and preg_match( "/[0-9]{8}/", $_POST['cedula_r']) ) :

    $con = conexion();
    $status = 1;
    $cedula = ChequearGenerico::cedula($_POST['cedula_r']);
    $query = "SELECT a.codigo as codigo_pa,
    b.codigo as codigo_pa_p,
    b.p_nombre as p_nombre,
    b.p_apellido as p_apellido
    from personal_autorizado a
    inner join persona b
    on (a.cod_persona=b.codigo)
    where b.cedula = $cedula;";
    $resultado = conexion($query);
    $datos = mysqli_fetch_assoc($resultado);
    $cod_representante = $datos['codigo_pa'];
    $cod_representante_persona = $datos['codigo_pa_p'];
    $p_nombre_r = $datos['p_nombre'] or die('error p_nombre');
    $p_apellido_r = $datos['p_apellido'] or die('error p_apellido');
    // chequeo de recaudos fisicos:
    $_POST['partida_nac'] = (isset($_POST['partida_nac'])) ? $_POST['partida_nac'] : 'n' ;
    $_POST['constancia_nino_sano'] = (isset($_POST['constancia_nino_sano'])) ? $_POST['constancia_nino_sano'] : 'n' ;
    $_POST['canaima'] = (isset($_POST['canaima'])) ? $_POST['canaima'] : 'n' ;
    $_POST['bicentenario'] = (isset($_POST['bicentenario'])) ? $_POST['bicentenario'] : 'n' ;
    $_POST['boleta'] = (isset($_POST['boleta'])) ? $_POST['boleta'] : 'n' ;
    $_POST['fotos_representante'] = (isset($_POST['fotos_representante'])) ? $_POST['fotos_representante'] : 'n' ;
    $_POST['fotocopia_cedula_pa'] = (isset($_POST['fotocopia_cedula_pa'])) ? $_POST['fotocopia_cedula_pa'] : 'n' ;
    $_POST['fotocopia_cedula_pr'] = (isset($_POST['fotocopia_cedula_pr'])) ? $_POST['fotocopia_cedula_pr'] : 'n' ;
    // iniciacion del objeto validarAlumno
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
      $_POST['partida_nac'],
      $_POST['constancia_nino_sano'],
      $_POST['canaima'],
      $_POST['bicentenario'],
      $_POST['boleta'],
      $_POST['fotos_representante'],
      $_POST['fotocopia_cedula_pa'],
      $_POST['fotocopia_cedula_pr'],
      $cod_representante
    );
    // die( var_dump( $validarAlumno->recaudos['partidaNac'] ) );
  if ( $validarAlumno->valido() ) :
    $queryP = "INSERT INTO persona(
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
      $validarAlumno->cedula, $validarAlumno->nacionalidad,
      $validarAlumno->p_nombre, $validarAlumno->s_nombre,
      $validarAlumno->p_apellido, $validarAlumno->s_apellido,
      $validarAlumno->sexo, $validarAlumno->fecNac,
      $validarAlumno->telefono, $validarAlumno->telefonoOtro,
      $status, $validarAlumno->codUsrMod ,$validarAlumno->codUsrMod,
      current_timestamp);";
    $res = conexion($queryP);
    $query = "SELECT
      codigo
      from persona
      where cedula = $validarAlumno->cedula";
    $resultado = conexion($query);
    $datos = mysqli_fetch_assoc($resultado);
    $cod_persona = $datos['codigo'];
    $validarDireccion = new ChequearDireccion(
      $_SESSION['codUsrMod'],
      $cod_persona,
      $_POST['cod_parro'],
      $_POST['direcc']
    );
    // implementacion nueva de ChequearDireccion
    // validarDireccion->valido()
    if ( $validarDireccion->valido() ) :
      mysqli_autocommit($con, false);
      $query_ok = true;
      $query = "INSERT INTO direccion
        (
        cod_persona,
        cod_parroquia,
        direccion_exacta,
        status,
        cod_usr_reg,
        cod_usr_mod,
        fec_mod)
        VALUES('$cod_persona', $validarDireccion->codParroquia,
          $validarDireccion->direccionExacta, '$status',
          $validarDireccion->codUsrMod, $validarDireccion->codUsrMod,
          current_timestamp);";
      // $resultado = conexion($query, 1);
      mysqli_query($con, $query) ? null : $query_ok=false;
      echo $query_ok === (false) ? 'dir' : null;
      $query = "INSERT INTO
        alumno (
          cod_persona,
          cedula_escolar,
          lugar_nac,
          acta_num_part_nac,
          acta_folio_num_part_nac,
          plantel_procedencia,
          repitiente,
          altura,
          peso,
          camisa,
          pantalon,
          zapato,
          certificado_vacuna,
          cod_discapacidad,
          cod_curso,
          partida_nac,
          constancia_nino_sano,
          canaima,
          bicentenario,
          boleta,
          fotos_representante,
          fotocopia_cedula_pa,
          fotocopia_cedula_pr,
          cod_representante,
          status,
          cod_usr_reg,
          cod_usr_mod,
          fec_mod
        )
        VALUES (
          $cod_persona,
          $validarAlumno->cedulaEscolar,
          $validarAlumno->lugNac,
          $validarAlumno->actaNumero,
          $validarAlumno->actaFolio,
          $validarAlumno->plantelProcedencia,
          $validarAlumno->repitiente,
          $validarAlumno->altura,
          $validarAlumno->peso,
          $validarAlumno->camisa,
          $validarAlumno->pantalon,
          $validarAlumno->zapato,
          $validarAlumno->vacuna,
          $validarAlumno->discapacidad,
          $validarAlumno->codCurso,".
          $validarAlumno->recaudos['partidaNac'].",".
          $validarAlumno->recaudos['constanciaSano'].",".
          $validarAlumno->recaudos['canaima'].",".
          $validarAlumno->recaudos['bicentenario'].",".
          $validarAlumno->recaudos['boleta'].",".
          $validarAlumno->recaudos['fotosR'].",".
          $validarAlumno->recaudos['fotoCedulaPA'].",".
          $validarAlumno->recaudos['fotoCedulaPR'].",
          $validarAlumno->codRepresentante,
          $status, $validarAlumno->codUsrMod,
          $validarAlumno->codUsrMod, current_timestamp);";
      // $resultado = conexion($query, 1);
      mysqli_query($con, $query) ? null : $query_ok=false;
      echo $query_ok === (false) ? 'alu' : null;
      $query_ok ? mysqli_commit($con) : mysqli_rollback($con);
      $query = "SELECT codigo from alumno where cod_persona = $cod_persona";
      $resultado = conexion($query);
      $datosAlumno = mysqli_fetch_assoc($resultado);
      //INSERSION A LA TABLA OBTIENE:
      //RELACION ENTRE ALUMNO Y PA:
      //M > N
      $query = "INSERT INTO obtiene
      VALUES(
        null,
        $cod_representante,
        $datosAlumno[codigo],
        default,
        default,
        $status,
        $validarAlumno->codUsrMod,
        null,
        $validarAlumno->codUsrMod,
        current_timestamp
        );";
      // $resultado = conexion($query, 1);
      mysqli_query($con, $query) ? null : $query_ok=false;
      echo $query_ok === (false) ? 'ob' : null;
      $query_ok ? mysqli_commit($con) : mysqli_rollback($con);
      if ( $query_ok ) :
        //AGARRAMOS LAS VARIABLES DE VALIDACION QUE NOS INTERESAN:
          $codUsrMod = $_SESSION['codUsrMod'];
          $codTipoUsr = $_SESSION['cod_tipo_usr'];
          $seudonimo = $_SESSION['seudonimo'];
          $p_nombre = $_SESSION['p_nombre'];
          $p_apellido = $_SESSION['p_apellido'];

          // LA VARIABLE SE DES-CREA, DES-INICIA DESACTIVA
          unset($_SESSION);

          //REINICIAMOS LA VARIABLE:

          $_SESSION['codUsrMod'] = $codUsrMod;
          $_SESSION['cod_tipo_usr'] = $codTipoUsr;
          $_SESSION['seudonimo'] = $seudonimo;
          $_SESSION['p_nombre'] = $p_nombre;
          $_SESSION['p_apellido'] = $p_apellido;?>
        <div id="contenido_insertar_A">
          <div id="blancoAjax">
            <div class="container">
              <div class="row">
                <div class="jumbotron">
                  <h1>Registro exitoso!</h1>
                  <h4>
                    Los registros asociados con
                    <em><?php echo $validarAlumno->p_apellido.", ".$validarAlumno->p_nombre ?></em>
                    fueron almacenados correctamente!
                  </h4>
                  <p>
                    <a id="constancia" href="<?php echo "reportes/constancia-inscripcion.php?cedula=$_POST[cedula]" ?>"
                    class="btn btn-info btn-lg">
                      Generar Constancia de Inscripcion
                    </a>
                  </p>
                  <p>
                    Si desea hacer un registro de un alumno asociado a
                    <?php echo $p_nombre_r ?>, <?php echo $p_apellido_r ?>
                    con cedula
                     <strong><?php echo $_POST['cedula_r'] ?>, </strong>
                     por favor dele
                    <a href="<?php echo "form_reg_A.php?cedula_r=$_POST[cedula_r]" ?>">
                      click a este enlace
                    </a>
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
        <script type="text/javascript">
        $(function(){
          $('#constancia').on('click', function(){
            window.open( $(this).attr('href') );
            return false;
          });
        });
        </script>
      <?php else :
        $query = "DELETE from persona where cedula = $validarAlumno->cedula;";
        $resultado = conexion($query);?>
        <div id="contenido_insertar_A">
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
                  <h3>
                    para intentarlo nuevamente por favor dele click
                    <a href="menucon.php">a este enlace</a>
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
      <?php endif;?>
    <?php else :
      $query = "DELETE from persona where cedula = $validarAlumno->cedula;";
      $resultado = conexion($query);?>
      <div id="contenido_insertar_A">
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
    <?php endif; ?>
  <?php else : ?>
    <div id="contenido_insertar_A">
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
  <?php endif; ?>
<?php else:
  // echo " Ingresar REPRSENTANTE";?>
  <div id="contenido_insertar_A">
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
