<?php
/**
 * @author [Alejandro Granadillo]
 *
 * @internal esto es utilizado para
 * hacer los queries por medio
 * de ajax para saber si el
 * seudonimo esta disponible
 *
 * @see
 * usuario/form_reg_U.php
 * @example
 * usuario/form_reg_U.php
 */
if ( isset($_POST['seudonimo']) ) :
  if (strlen($_POST['seudonimo']) >= 3
    and strlen($_POST['seudonimo']) <= 20):
    $enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
    require_once($enlace);
    $con = conexion();
    $seudonimo = mysqli_escape_string($con,$_POST['seudonimo']);
    $query = "SELECT codigo FROM usuario
    WHERE seudonimo = '$seudonimo';";
    $consulta = conexion($query);
    if ($consulta->num_rows == 0): ?>
      <span id="disponible" data-disponible="true">
        Seudonimo disponible!
      </span>
    <?php else: ?>
      <span id="disponible" data-disponible="false">
        Seudonimo no disponible.
      </span>
    <?php endif ?>
  <?php else: ?>
    <span>
      Seudonimo no puede ser </br>mayor a 20 digitos ni menor a 3.
    </span>
  <?php endif ?>

<?php else: ?>
  <?php echo 'error' ?>
<?php endif; ?>
