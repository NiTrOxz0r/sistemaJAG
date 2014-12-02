<?php
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario(1, 1, $_SESSION['cod_tipo_usr']);

//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
//DESDE empezarPagina.php
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);
//CONTENIDO:?>
<div id="contenido">
  <div id="blancoAjax">
    <div class="contenido">
      <!-- CONTENIDO EMPIEZA DEBAJO DE ESTO: -->
      <?php if (isset($_GET['cedula_r'])): ?>
        <?php $cedula_r = trim($_GET['cedula_r']) ?>
        <?php if (strlen($cedula_r) == 8):
          $con = conexion();
          $cedula_r = mysqli_escape_string($con, $cedula_r);


          $query = "SELECT ;";
          $resultado = conexion($query);?>

          <?php if ($resultado->num_rows <> 0) :?>
            <?php $datos = mysqli_fetch_assoc($resultado) ?>
              <table>
                <thead>
                  <th>
                    Primer Apellido
                  </th>
                  <th>
                    Segundo Apellido
                  </th>
                  <th>
                    Primer Apellido
                  </th>
                  <th>
                    Segundo Apellido
                  </th>
                  <th>
                    Cedula
                  </th>
                  <th>
                    Cedula Escolar
                  </th>
                  <th>
                    Curso Asignado
                  </th>
                </thead>
                <tbody>
                  <td>
                    <?php echo $datos['p_apellido_a']; ?>
                  </td>
                  <td>
                    <?php echo $datos['s_apellido_a']; ?>
                  </td>
                  <td>
                    <?php echo $datos['p_nombre_a']; ?>
                  </td>
                  <td>
                    <?php echo $datos['s_nombre_a']; ?>
                  </td>
                  <td>
                    <?php echo $datos['cedula_a']; ?>
                  </td>
                  <td>
                    <?php echo $datos['cedula_escolar_a']; ?>
                  </td>
                  <td>
                    <?php echo $datos['curso_a']; ?>
                  </td>
                  <td>
                    <a href="#">
                      <button>Editar</button>
                    </a>
                  </td>
                </tbody>
              </table>
              <div>
                <p>
                  Agregar otro alumno relacionado con este representante.
                </p>
                <p>
                  Agregar un familiar o personal autorizado que pueda retirar al alumno.
                </p>
                <p>
                  Culminar el proceso de inscripcion (GENERACION DE REPORTE; ETC!!)
                </p>
              </div>

          <?php else:?>
              <span>
                La cedula <strong><?php echo $cedula_r ?></strong>
                no tiene ninguna relacion con ningun alumno!
              </span>
              <p>
                <a href="#">Actualizar datos referentes a esta cedula</a>
                </br>
                <a href="#">ver relaciones de esta cedula</a>
              </p>
          <?php endif;?>
        <?php else: ?>
          <span>
            Error, cedula Incorrecta, intente nuevamente
          </span>
          <p>
            <a href="#">A DONDE TIENE QUE IR...</a>
          </p>
        <?php endif ?>
      <?php elseif( isset($_GET['cedula_a']) ) : ?>
        <?php $cedula_a = trim($_GET['cedula_a']); ?>
        <?php if (strlen($cedula_a) == 8):
          $con = conexion();
          $cedula_a = mysqli_escape_string($con, $cedula_a);

          //buscamos los representantes que esten relacionados
          //con este alumno
          $query = "SELECT
          alumno.p_apellido as p_apellido_a,
          alumno.p_nombre as p_nombre_a,
          personal_autorizado.codigo as codigo_r,
          personal_autorizado.p_apellido as p_apellido_r,
          personal_autorizado.p_nombre as p_nombre_r,
          personal_autorizado.relacion as relacion_r,
          personal_autorizado.telefono as telefono_r,
          personal_autorizado.telefono_otro as telefono_otro_r,
          personal_autorizado.email as email_r,
          personal_autorizado.vive_con_alumno as vive_con_alumno_r
          from obtiene
          inner join personal_autorizado
          on obtiene.cod_p_a = personal_autorizado.codigo
          inner join alumno
          on obtiene.cod_alu = alumno.codigo
          inner join curso
          on alumno.cod_curso = curso.codigo
          where alumno.cedula = $cedula_a
          order by alumno.codigo;";
          $resultado = conexion($query);?>

          <?php if ($resultado->num_rows <> 0) :?>

            <?php $unaVez = true; ?>
            <?php while ($datos = mysqli_fetch_array($resultado)) : ?>

              <?php if ($unaVez): ?>
                <span>
                  Personas relacionados con:
                  <?php echo $datos['p_apellido_a']; ?>,
                  <?php echo $datos['p_nombre_a']; ?>
                </span>
              <?php endif; $unaVez = false; ?>

              <table>
                <thead>
                  <th>
                    Primer Apellido
                  </th>
                  <th>
                    Segundo Apellido
                  </th>
                  <th>
                    Primer Apellido
                  </th>
                  <th>
                    Segundo Apellido
                  </th>
                  <th>
                    Cedula
                  </th>
                  <th>
                    Cedula Escolar
                  </th>
                  <th>
                    Curso Asignado
                  </th>
                </thead>
                <tbody>
                  <td>
                    <?php echo $datos['p_apellido_r']; ?>
                  </td>
                  <td>
                    <?php echo $datos['p_nombre_r']; ?>
                  </td>
                  <td>
                    <?php echo $datos['relacion_r']; ?>
                  </td>
                  <td>
                    <?php echo $datos['telefono_r']; ?>
                  </td>
                  <td>
                    <?php echo $datos['telefono_otro_r']; ?>
                  </td>
                  <td>
                    <?php echo $datos['email_r']; ?>
                  </td>
                  <td>
                    <?php echo $datos['vive_con_alumno_r']; ?>
                  </td>
                  <td>
                    <a href="#">
                      <button>Editar</button>
                    </a>
                  </td>
                </tbody>
              </table>

            <?php endwhile;?>

            <div>
              <p>
                Agregar otro alumno relacionado con este representante.
              </p>
              <p>
                Agregar un familiar o personal autorizado que pueda retirar al alumno.
              </p>
              <p>
                Culminar el proceso de inscripcion (GENERACION DE REPORTE; ETC!!)
              </p>
            </div>

          <?php else:?>
              <span>
                La cedula <strong><?php echo $cedula_a ?></strong>
                no tiene ninguna relacion con ningun representante o persona allegada!
              </span>
              <p>
                <a href="#">Actualizar informacion referente a esta cedula</a>
                </br>
                <a href="#">ver relaciones de esta cedula</a>
              </p>
          <?php endif;?>
        <?php else: ?>
          <span>
              Error, cedula Incorrecta, intente nuevamente
            </span>
            <p>
              <a href="#">A DONDE TIENE QUE IR...</a>
            </p>
        <?php endif ?>
      <?php elseif( isset($_GET['cedula_escolar_a']) ) : ?>
        <?php $cedula_a = trim($_GET['cedula_escolar_a']); ?>
        <?php if (strlen($cedula_a) == 8):
          $con = conexion();
          $cedula_a = mysqli_escape_string($con, $cedula_a);

          //buscamos los representantes que esten relacionados
          //con este alumno
          $query = "SELECT
          alumno.p_nombre as p_nombre_a,
          alumno.p_nombre as p_nombre_a,
          personal_autorizado.codigo as codigo_r,
          personal_autorizado.p_apellido as p_apellido_r,
          personal_autorizado.p_nombre as p_nombre_r,
          personal_autorizado.relacion as relacion_r,
          personal_autorizado.telefono as telefono_r,
          personal_autorizado.telefono_otro as telefono_otro_r,
          personal_autorizado.email as email_r,
          personal_autorizado.vive_con_alumno as vive_con_alumno_r
          from obtiene
          inner join personal_autorizado
          on obtiene.cod_p_a = personal_autorizado.codigo
          inner join alumno
          on obtiene.cod_alu = alumno.codigo
          inner join curso
          on alumno.cod_curso = curso.codigo
          where alumno.cedula = $cedula_a
          order by alumno.codigo;";
          $resultado = conexion($query);?>
          <?php if ($resultado->num_rows <> 0) :?>

            <?php $unaVez = true; ?>
            <?php while ($datos = mysqli_fetch_array($resultado)) : ?>

              <?php if ($unaVez): ?>
                <span>
                  Personas relacionados con:
                  <?php echo $datos['p_apellido_a']; ?>,
                  <?php echo $datos['p_nombre_a']; ?>
                </span>
              <?php endif; $unaVez = false; ?>

              <table>
                <thead>
                  <th>
                    Primer Apellido
                  </th>
                  <th>
                    Segundo Apellido
                  </th>
                  <th>
                    Primer Apellido
                  </th>
                  <th>
                    Segundo Apellido
                  </th>
                  <th>
                    Cedula
                  </th>
                  <th>
                    Cedula Escolar
                  </th>
                  <th>
                    Curso Asignado
                  </th>
                </thead>
                <tbody>
                  <td>
                    <?php echo $datos['p_apellido_r']; ?>
                  </td>
                  <td>
                    <?php echo $datos['p_nombre_r']; ?>
                  </td>
                  <td>
                    <?php echo $datos['relacion_r']; ?>
                  </td>
                  <td>
                    <?php echo $datos['telefono_r']; ?>
                  </td>
                  <td>
                    <?php echo $datos['telefono_otro_r']; ?>
                  </td>
                  <td>
                    <?php echo $datos['email_r']; ?>
                  </td>
                  <td>
                    <?php echo $datos['vive_con_alumno_r']; ?>
                  </td>
                  <td>
                    <a href="#">
                      <button>Editar</button>
                    </a>
                  </td>
                </tbody>
              </table>

            <?php endwhile;?>

            <div>
              <p>
                Agregar otro alumno relacionado con este representante.
              </p>
              <p>
                Agregar un familiar o personal autorizado que pueda retirar al alumno.
              </p>
              <p>
                Culminar el proceso de inscripcion (GENERACION DE REPORTE; ETC!!)
              </p>
            </div>

          <?php else:?>
              <span>
                La cedula <strong><?php echo $cedula_a ?></strong>
                no tiene ninguna relacion con ningun representante o persona allegada!
              </span>
              <p>
                <a href="#">Actualizar informacion referente a esta cedula</a>
                </br>
                <a href="#">ver relaciones de esta cedula</a>
              </p>
          <?php endif;?>
        <?php else: ?>
          <span>
              Error, cedula Incorrecta, intente nuevamente
            </span>
            <p>
              <a href="#">A DONDE TIENE QUE IR...</a>
            </p>
        <?php endif ?>
      <?php else: ?>
        <span>
            Error, cedula Incorrecta, intente nuevamente
          </span>
          <p>
            <a href="#">A DONDE TIENE QUE IR...</a>
          </p>
      <?php endif ?>
      <!-- CONTENIDO TERMINA ARRIBA DE ESTO: -->
    </div>
  </div>
</div>
<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>
