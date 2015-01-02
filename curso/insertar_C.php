<?php
/**
 * @author [slayerfat] <[slayerfat@gmail.com]>
 *
 * {@internal [EN DESARROLLO]}
 *
 * @version [1.0]
 */
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario(1, 2, $_SESSION['cod_tipo_usr']);

//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
//DESDE empezarPagina.php
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);

if ( isset($_POST['docente']) and !preg_match( "/[^0-9][^\-1]/", $_POST['docente'])
  and isset($_POST['curso']) and !preg_match( "/[^0-9]/", $_POST['curso'])
  and isset($_POST['periodo_academico'])
  and !preg_match( "/[^0-9]/", $_POST['periodo_academico'])
  and isset($_POST['comentarios']) and strlen($_POST['comentarios']) <= 200 ) :
  $conexion = conexion();
  // $cod_asume = mysqli_escape_string( $conexion, trim($_SESSION['act_cod_asume']) );
  $cod_docente = mysqli_escape_string( $conexion, trim($_POST['docente']) );
  $cod_curso = mysqli_escape_string( $conexion, trim($_POST['curso']) );
  $cod_periodo_academico = mysqli_escape_string( $conexion, trim($_POST['periodo_academico']) );
  $comentarios = mysqli_escape_string( $conexion, trim($_POST['comentarios']) );
  $cod_docente = $cod_docente === ("-1") ? 'null':$cod_docente;
  $cod_docente = $cod_docente === ("") ? 'null':$cod_docente;
  $comentarios = $comentarios === ("") ? 'Autogenerado en registro, por sistema.':$comentarios;
  $query = "INSERT into asume
  values
  (null, $cod_docente, $cod_curso, $cod_periodo_academico, '$comentarios',
    1, $_SESSION[codUsrMod], null, $_SESSION[codUsrMod], current_timestamp);";
  $resultado = conexion($query);
  if ($resultado) : ?>
    <div id="contenido_actualizar_C">
      <div id="blancoAjax">
        <div class="container">
          <div class="row">
            <div class="jumbotron">
              <h1>Registro exitoso!</h1>
              <h4>
                Los registros asociados
                fueron guardados correctamente!
              </h4>
              <p>
                Si desea hacer otro registro por favor dele
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
  <?php else: ?>
    <div id="contenido_actualizar_C">
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
                  Lamentablemente, es posible que los datos de actualización se perdieron.
                </small>
              </h3>
              <p>
                Si desea hacer otra actualización por favor dele
                <a href="menucon.php">click a este enlace</a>
              </p>
              <p>
                ¿O será que entro en esta pagina erróneamente?
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
  mysqli_close($conexion);
else : ?>
  <div id="contenido_actualizar_C">
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
              Si desea hacer otro registro, por favor dele
              <a href="menucon.php">click a este enlace</a>
            </p>
            <p>
              ¿O será que entro en esta pagina erróneamente?
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
<?php finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>
