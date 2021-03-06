<?php
/**
 * @author [Alejandro Granadillo]
 *
 * @internal esto es utilizado para
 * hacer los queries por medio
 * de ajax para saber si la
 * cedula esta disponible
 *
 * @see
 * usuario/menucon.php
 * @example
 * usuario/menucon.php
 *
 * @version 1.1
 */
if ( isset($_POST['cedula']) ) :
  if (strlen($_POST['cedula']) == 8):
    $enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
    require_once($enlace);
    $con = conexion();
    $cedula = mysqli_escape_string($con,$_POST['cedula']);
    $query = "SELECT codigo FROM persona
    WHERE cedula = '$cedula';";
    $consulta = conexion($query);
    if ($consulta->num_rows == 0): ?>
      <span id="disponible" data-disponible="true">
      </span>
    <?php else: ?>
      <?php $enlace = encuentraCedula($_REQUEST['cedula']) ?>
      <?php if ( $enlace ): ?>
        <span id="disponible" data-disponible="false">
          <!-- como les quedo la pepa'e ojo?' -->
          Esta Cedula esta ya registrada en el sistema!
          <a href="<?php echo $enlace ?> ">Consultar</a>
          <!-- se quedaron locos verdad? -->
        </span>
      <?php endif; ?>
    <?php endif ?>
  <?php mysqli_close($con) ?>
  <?php else: ?>
    <span style="color:red;">
      La cedula debe ser exactamente 8 digitos ej: 12345678.
    </span>
  <?php endif ?>
<?php else: ?>
  <?php echo 'error' ?>
<?php endif; ?>
