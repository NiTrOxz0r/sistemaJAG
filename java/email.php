<?php
/**
 * @author [Alejandro Granadillo]
 *
 * @internal esto es utilizado para
 * hacer los queries por medio
 * de ajax para saber si el
 * email esta disponible
 *
 * @see
 * usuario/form_reg_PI.php
 * @example
 * personalAutorizado/form_reg_P.php
 *
 * @version 1.0
 */
if ( isset($_POST['email']) && isset($_POST['tabla']) ) :
  $expReg = "/^['][0-9a-zA-Z-_$#]{2,20}+\@[0-9a-zA-Z-_$#]{2,20}+\.[a-zA-Z]{2,5}[']/";
  if ( !preg_match( $expReg, $_POST['email']) ):
    $enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
    require_once($enlace);
    $con = conexion();
    $email = mysqli_escape_string($con,$_POST['email']);
    $tabla = mysqli_escape_string($con,$_POST['tabla']);
    $query = "SELECT codigo FROM $tabla
    WHERE email = '$email';";
    $consulta = conexion($query);
    if ($consulta->num_rows == 0): ?>
      <span id="disponible" data-disponible="true">
      </span>
    <?php else: ?>
      <span id="disponible" data-disponible="false">
      </span>
    <?php endif ?>
  <?php mysqli_close($con) ?>
  <?php else: ?>
    <span style="color:red;">
      por favor verifique este campo, correo debe estar en este formato: algo@algunDominio.com.
    </span>
  <?php endif ?>
<?php else: ?>
  <span style="color:red;">
    Error general, campos no especificados
  </span>
<?php endif; ?>
