<?php
/**
 * @author [Alejandro Granadillo]
 *
 * @internal esto es utilizado para
 * hacer los queries por medio
 * de ajax para saber si la
 * cedula escolar esta disponible
 *
 * @see
 * alumno/form_act_A.php
 * @example
 * alumno/form_act_A.php
 */
if ( isset($_POST['cedula_escolar']) ) :
  if (strlen($_POST['cedula_escolar']) == 10):
    $enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
    require_once($enlace);
    $con = conexion();
    $cedula_escolar = mysqli_escape_string($con,$_POST['cedula_escolar']);
    $query = "SELECT cedula FROM alumno
    inner join persona
    on alumno.cod_persona = persona.codigo
    WHERE cedula_escolar = '$cedula_escolar';";
    $consulta = conexion($query);
    if ($consulta->num_rows == 0): ?>
      <span id="disponible" data-disponible="true">
      </span>
    <?php else: ?>
      <?php $datos = mysqli_fetch_assoc($consulta) ?>
      <span id="disponible" data-disponible="false">
        Esta Cedula esta ya registrada en el sistema!
        <?php $enlace = "github/sistemaJAG/alumno/consultar_A.php?tipo=1&informacion=$datos[cedula]" ?>
        <?php $consultar_A = enlaceDinamico("$enlace") ?>
        <a href="<?php echo $consultar_A ?>">
          Consultar
        </a>
      </span>
    <?php endif ?>
  <?php mysqli_close($con) ?>
  <?php else: ?>
    <span style="color:red;">
      cedula escolar debe ser igual a 10 digitos. ej: 1234567890
    </span>
  <?php endif ?>
<?php else: ?>
  <?php echo 'error' ?>
<?php endif; ?>
