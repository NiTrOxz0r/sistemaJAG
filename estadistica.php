<?php
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
validarUsuario();
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']); ?>
<div id="contenido_estadistica">
  <div id="blancoAjax">
    <div class="container">
      <!-- info -->
      <div class="row">
        <div class="contenido col-md-12">
          <h1>Lorem ipsum dolor sit amet</h1>
          <p>
            <h2 class="text-justify">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
              nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
              reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
              Excepteur sint occaecat cupidatat non proident, sunt in culpa
              qui officia deserunt mollit anim id est laborum.
            </h2>
          </p>
        </div>
      </div>
      <!-- personas -->
      <div class="row">
        <div class="col-md-12">
          <h2>Personas <small><a href="#">descargar informe</a></small></h2>
          <div class="row">
            <div class="col-sm-12">
              <!-- info -->
              <div class="row">
                <div class="col-sm-12">
                  <h4 class="text-justify">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  </h4>
                </div>
              </div>
              <!-- personas en sistema -->
              <?php $query = "SELECT count(codigo) as total
              from persona where status = 1;";
              $resultado = conexion($query);
              $datos = mysqli_fetch_assoc($resultado); ?>
              <div class="row">
                <div class="col-sm-12">
                  <h4>
                    Personas en el sistema:
                    <strong><?php echo $datos['total'] ?></strong>
                  </h4>
                </div>
              </div>
              <!-- por sexo -->
              <?php $query = "SELECT
              SUM(CASE WHEN sexo = '0' THEN 1 ELSE 0 END) hombres,
              SUM(CASE WHEN sexo = '1' THEN 1 ELSE 0 END) mujeres,
              COUNT(*) total
              FROM persona
              where status = 1;";
              $resultado = conexion($query);
              $datos = mysqli_fetch_assoc($resultado); ?>
              <div class="row">
                <div class="col-sm-6">
                  <h4>
                    Personas de sexo Masculino:
                    <strong><?php echo $datos['hombres'] ?></strong>
                  </h4>
                </div>
                <div class="col-sm-6">
                  <h4>
                    Personas de sexo Femenino:
                    <strong><?php echo $datos['mujeres'] ?></strong>
                  </h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- alumnos -->
      <div class="row">
        <div class="col-md-12">
          <h2>Alumnos <small><a href="#">descargar informe</a></small></h2>
          <div class="row">
            <div class="col-sm-12">
              <!-- info -->
              <div class="row">
                <div class="col-sm-12">
                  <h4 class="text-justify">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  </h4>
                </div>
              </div>
              <!-- en sistema -->
              <?php $query = "SELECT count(codigo) as total
              from alumno where status = 1;";
              $resultado = conexion($query);
              $datos = mysqli_fetch_assoc($resultado); ?>
              <div class="row">
                <div class="col-sm-12">
                  <h4>
                    Alumnos en el sistema:
                    <strong><?php echo $datos['total'] ?></strong>
                  </h4>
                </div>
              </div>
              <!-- por sexo -->
              <?php $query = "SELECT
              SUM(CASE WHEN sexo = '0' THEN 1 ELSE 0 END) ninos,
              SUM(CASE WHEN sexo = '1' THEN 1 ELSE 0 END) ninas,
              COUNT(*) total
              FROM persona
              inner join alumno
              on persona.codigo = alumno.cod_persona
              where alumno.status = 1;";
              $resultado = conexion($query);
              $datos = mysqli_fetch_assoc($resultado); ?>
              <div class="row">
                <div class="col-sm-6">
                  <h4>
                    Alumnos de sexo Masculino:
                    <strong><?php echo $datos['ninos'] ?></strong>
                  </h4>
                </div>
                <div class="col-sm-6">
                  <h4>
                    Alumnos de sexo Femenino:
                    <strong><?php echo $datos['ninas'] ?></strong>
                  </h4>
                </div>
              </div>
              <!-- por peso min/max -->
              <div class="row">
                <?php $query = "SELECT MAX(peso) as maximo,
                  p_apellido,
                  p_nombre
                  from alumno
                  inner join persona
                  on alumno.cod_persona = persona.codigo
                  where alumno.status = 1 and peso = (SELECT MAX(peso) from alumno);";
                $resultado = conexion($query);
                $datos = mysqli_fetch_assoc($resultado); ?>
                <div class="col-sm-6">
                  <h4>
                    Mayor peso (kg):
                    <strong><?php echo $datos['maximo'] ?></strong>
                    <a href="#"><?php echo $datos['p_apellido'].", ".$datos['p_nombre'] ?></a>
                  </h4>
                </div>
                <?php $query = "SELECT MIN(peso) as minimo,
                  p_apellido,
                  p_nombre
                  from alumno
                  inner join persona
                  on alumno.cod_persona = persona.codigo
                  where alumno.status = 1 and peso = (SELECT MIN(peso) from alumno);";
                $resultado = conexion($query);
                $datos = mysqli_fetch_assoc($resultado); ?>
                <div class="col-sm-6">
                  <h4>
                    Menor peso (kg):
                    <strong><?php echo $datos['minimo'] ?></strong>
                    <a href="#"><?php echo $datos['p_apellido'].", ".$datos['p_nombre'] ?></a>
                  </h4>
                </div>
              </div>
              <!-- por peso -->
              <div class="row">
                <?php $query = "SELECT round(AVG(peso), 2) as avg
                  from alumno
                  inner join persona
                  on alumno.cod_persona = persona.codigo
                  where alumno.status = 1 and persona.sexo = '0';";
                $resultado = conexion($query);
                $datos = mysqli_fetch_assoc($resultado); ?>
                <div class="col-sm-6">
                  <h4>
                    Media de peso en niños (kg):
                    <strong><?php echo $datos['avg'] ?></strong>
                  </h4>
                </div>
                <?php $query = "SELECT round(AVG(peso), 2) as avg
                  from alumno
                  inner join persona
                  on alumno.cod_persona = persona.codigo
                  where alumno.status = 1 and persona.sexo = '1';";
                $resultado = conexion($query);
                $datos = mysqli_fetch_assoc($resultado); ?>
                <div class="col-sm-6">
                  <h4>
                    Media de peso en niñas (kg):
                    <strong><?php echo $datos['avg'] ?></strong>
                  </h4>
                </div>
              </div>
              <!-- por altura min/max -->
              <div class="row">
                <?php $query = "SELECT MAX(altura) as maximo,
                  p_apellido,
                  p_nombre
                  from alumno
                  inner join persona
                  on alumno.cod_persona = persona.codigo
                  where alumno.status = 1 and altura = (SELECT MAX(altura) from alumno);";
                $resultado = conexion($query);
                $datos = mysqli_fetch_assoc($resultado); ?>
                <div class="col-sm-6">
                  <h4>
                    Mayor altura (cm):
                    <strong><?php echo $datos['maximo'] ?></strong>
                    <a href="#"><?php echo $datos['p_apellido'].", ".$datos['p_nombre'] ?></a>
                  </h4>
                </div>
                <?php $query = "SELECT MIN(altura) as minimo,
                  p_apellido,
                  p_nombre
                  from alumno
                  inner join persona
                  on alumno.cod_persona = persona.codigo
                  where alumno.status = 1 and altura = (SELECT MIN(altura) from alumno);";
                $resultado = conexion($query);
                $datos = mysqli_fetch_assoc($resultado); ?>
                <div class="col-sm-6">
                  <h4>
                    Menor altura (cm):
                    <strong><?php echo $datos['minimo'] ?></strong>
                    <a href="#"><?php echo $datos['p_apellido'].", ".$datos['p_nombre'] ?></a>
                  </h4>
                </div>
              </div>
              <!-- por altura -->
              <div class="row">
                <?php $query = "SELECT round(AVG(peso), 2) as avg
                  from alumno
                  inner join persona
                  on alumno.cod_persona = persona.codigo
                  where alumno.status = 1 and persona.sexo = '0';";
                $resultado = conexion($query);
                $datos = mysqli_fetch_assoc($resultado); ?>
                <div class="col-sm-6">
                  <h4>
                    Media de altura en niños (cm):
                    <strong><?php echo $datos['avg'] ?></strong>
                  </h4>
                </div>
                <?php $query = "SELECT round(AVG(peso), 2) as avg
                  from alumno
                  inner join persona
                  on alumno.cod_persona = persona.codigo
                  where alumno.status = 1 and persona.sexo = '1';";
                $resultado = conexion($query);
                $datos = mysqli_fetch_assoc($resultado); ?>
                <div class="col-sm-6">
                  <h4>
                    Media de altura en niñas (cm):
                    <strong><?php echo $datos['avg'] ?></strong>
                  </h4>
                </div>
              </div>
              <!-- por repitiente -->
              <?php $query = "SELECT
                SUM(CASE WHEN repitiente = 's' THEN 1 ELSE 0 END) si,
                SUM(CASE WHEN repitiente = 'n' THEN 1 ELSE 0 END) no,
                COUNT(*) total
                FROM alumno
                where alumno.status = 1;";
              $resultado = conexion($query);
              $datos = mysqli_fetch_assoc($resultado); ?>
              <div class="row">
                <div class="col-sm-6">
                  <h4>
                    Alumnos repitientes:
                    <strong><?php echo $datos['si'] ?></strong>
                  </h4>
                </div>
                <div class="col-sm-6">
                  <h4>
                    Alumnos no repitientes:
                    <strong><?php echo $datos['no'] ?></strong>
                  </h4>
                </div>
              </div>
              <!-- por cursos -->
              <?php
              // si es despues de inscripciones año actual - año mas 1
              // si es antes de inscripciones año menos 1 - año actual
              if ( intval(date('m')) > 7 ) :
                $n = date('Y');
                $n1 = intval(date('Y')) + 1;
              else :
                $n1 = date('Y');
                $n  = intval(date('Y')) - 1;
              endif;
              $query = "SELECT
                asume.codigo as codigo,
                curso.descripcion as 'des_curso',
                COUNT(alumno.codigo) as 'total_alumnos'
                from asume
                inner join periodo_academico
                on asume.periodo_academico = periodo_academico.codigo
                inner join curso
                on asume.cod_curso = curso.codigo
                inner join alumno
                on alumno.cod_curso = asume.codigo
                where asume.status = 1
                and asume.periodo_academico = (SELECT codigo
                  from periodo_academico
                  where descripcion like '%$n-$n1%')
                group by
                2,1;";
              $resultado = conexion($query);
              $datos = mysqli_fetch_assoc($resultado); ?>
              <div class="row">
                <div class="col-sm-12">
                  <h4>
                    <strong>alumnos en cursos... 1,2,3,4,5,6</strong>
                  </h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- graficos -->
<script src="java/Chart.js/Chart.min.js"></script>
<?php finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']); ?>
