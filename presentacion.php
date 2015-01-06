<?php
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
validarUsuario(1, 1, $_SESSION['cod_tipo_usr']);
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']); ?>
<link rel=stylesheet href="css/presentacion.css">
<div id="contenido_estadistica">
  <div id="blancoAjax">
    <!-- inicio de presentacion -->
    <div class="container">
      <!-- pagina 1 -->
      <div class="row slide" id="slide_1">
        <div class="col-xs-12 text-center">
          <div class="centrado">
            <h1 class="lato">sistema<strong>JAG</strong></h1>
            <h3 class="courier">Versión 0.6.3.2</h3>
          </div>
        </div>
      </div>
      <!-- pagina 2 -->
      <div class="row slide" id="slide_2">
        <div class="col-xs-12 text-center margen-20">
          <div class="centrado">
            <h1 class="courier">código fuente:</h1>
            <h3 class="courier">
              <a href="http://github.com/slayerfat/sistemaJAG">
                github.com/slayerfat/sistemaJAG
              </a>
            </h3>
            <div class="espacio-doble"></div>
            <h3 class="courier">prototipo en línea:</h1>
            <h4 class="courier">
              <a href="http://sistemajag.esy.es">
                sistemajag.esy.es
              </a>
            </h4>
          </div>
        </div>
      </div>
      <!-- pagina 3 -->
      <div class="row slide" id="slide_3">
        <div class="col-xs-12 margen-20">
          <div class="centrado">
            <h2 class="courier">Integrantes:</h2>
            <ul class="text-right openSans">
              <li>
                <h4>Granadillo Alejandro</h4>
              </li>
              <li>
                <h4>Leotur Andres</h4>
              </li>
              <li>
                <h4>Torres Bryan</h4>
              </li>
              <li>
                <h4>Erick Zerpa</h4>
              </li>
              <li>
                <h4>Joan Camacho</h4>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- pagina 4 -->
      <div class="row slide" id="slide_4">
        <div class="col-xs-12">
          <div class="centrado">
            <!-- <div>
              <h2 class="lato">¿Que es un
              sistema<strong>JAG</strong>?</h2>
            </div> -->
            <h3 class="text-justify openSans">
              Sistema de información automatizado
              de la institución U.E.N.B “José Antonio González”
            </h3>
          </div>
        </div>
      </div>
      <!-- pagina 5 -->
      <div class="row slide" id="slide_5">
        <div class="col-xs-12 text-center">
          <div class="centrado">
            <h1 class="courier">¿Por qué esto?</h1>
          </div>
        </div>
      </div>
      <!-- pagina 6 -->
      <div class="row slide" id="slide_6">
        <div class="col-xs-12 margen-20">
          <div class="centrado">
            <h3 class="openSans">
              <strong>Problema en la institución:</strong>
            </h3>
            <h3 class="courier">
              Proceso manual de inscripción.
            </h3>
            <div class="espacio"></div>
            <h3 class="openSans">
              <strong>Solución propuesta:</strong>
            </h3>
            <h3 class="courier">
              Sistema de información automatizado.
            </h3>
          </div>
        </div>
      </div>
      <!-- pagina 7 -->
      <div class="row slide" id="slide_7">
        <div class="col-xs-12 text-center">
          <div class="centrado">
            <h1 class="courier">Justificación</h1>
          </div>
        </div>
      </div>
      <!-- pagina 8 -->
      <div class="row slide" id="slide_8">
        <div class="col-xs-12 text-center">
          <div class="centrado">
            <h4 class="courier">
              El sistema informático
              propuesto aporta la eficiencia
              necesaria en el proceso de inscripción.
            </h4>
          </div>
        </div>
      </div>
      <!-- pagina 9 -->
      <div class="row slide" id="slide_9">
        <div class="col-xs-12 text-center">
          <div class="centrado">
            <h4 class="courier">Ejemplo</h4>
          </div>
        </div>
      </div>
      <!-- pagina 10 -->
      <!-- personas -->
      <div class="row" id="slide_10">
        <div class="col-md-12">
          <h2>Personas en sistemaJAG:</h2>
          <div class="row">
            <div class="col-sm-12">
              <!-- info -->
              <div class="row">
                <div class="col-sm-12">
                  <h4 class="text-justify">
                    Informacion general de los registros existentes de todas
                    las personas en el sistema.
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
              $datosSexoTotal = mysqli_fetch_assoc($resultado); ?>
              <div class="row">
                <div class="col-sm-6">
                  <h4>
                    Personas de sexo Masculino:
                    <strong><?php echo $datosSexoTotal['hombres'] === (null) ? 0 : $datosSexoTotal['hombres'] ?></strong>
                  </h4>
                </div>
                <div class="col-sm-6">
                  <h4>
                    Personas de sexo Femenino:
                    <strong><?php echo $datosSexoTotal['mujeres'] === (null) ? 0 : $datosSexoTotal['mujeres'] ?></strong>
                  </h4>
                </div>
              </div>
              <!-- grafico -->
              <div class="row">
                <div class="center-block" style="width:75%">
                  <h4 class="text-center">Relación de genero</h4>
                  <center>
                    <canvas id="pieSexoTotal" height="400" width="400"></canvas>
                    <canvas id="poligonoSexoTotal" height="400" width="400"></canvas>
                  </center>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- pagina 11 -->
      <!-- alumnos -->
      <div class="row" id="slide_11">
        <div class="col-md-12">
          <h2>Alumnos en sistemaJAG:</h2>
          <div class="row">
            <div class="col-sm-12">
              <!-- info -->
              <div class="row">
                <div class="col-sm-12">
                  <h4 class="text-justify">
                    Informacion general de los registros existentes de todas
                    los alumnos en el sistema.
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
              $datosSexo = mysqli_fetch_assoc($resultado); ?>
              <div class="row">
                <div class="col-sm-6">
                  <h4>
                    Alumnos de sexo Masculino:
                    <strong><?php echo $datosSexo['ninos'] ?></strong>
                  </h4>
                </div>
                <div class="col-sm-6">
                  <h4>
                    Alumnos de sexo Femenino:
                    <strong><?php echo $datosSexo['ninas'] ?></strong>
                  </h4>
                </div>
              </div>
              <!-- grafico -->
              <div class="row">
                <div class="center-block" style="width:75%">
                  <h4 class="text-center">Relación de genero</h4>
                  <canvas id="pieSexo" height="400" width="400"></canvas>
                  <canvas id="poligonoSexo" height="400" width="400"></canvas>
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
              $datosRepitiente = mysqli_fetch_assoc($resultado); ?>
              <div class="row">
                <div class="col-sm-6">
                  <h4>
                    Alumnos repitientes:
                    <strong><?php echo $datosRepitiente['si'] === (null) ? 0 : $datosRepitiente['si'] ?></strong>
                  </h4>
                </div>
                <div class="col-sm-6">
                  <h4>
                    Alumnos no repitientes:
                    <strong><?php echo $datosRepitiente['no'] === (null) ? 0 : $datosRepitiente['no'] ?></strong>
                  </h4>
                </div>
              </div>
              <!-- grafico -->
              <div class="row">
                <div class="center-block" style="width:75%">
                  <h4 class="text-center">Relación de repitientes</h4>
                  <center>
                    <canvas id="pieRepitiente" height="400" width="400"></canvas>
                    <canvas id="poligonoRepitiente" height="400" width="400"></canvas>
                  </center>
                </div>
              </div>
              <!-- por cursos -->
              <?php
              // si es despues de inscripciónes año actual - año mas 1
              // si es antes de inscripciónes año menos 1 - año actual
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
              $cursosQuery = conexion($query); ?>
              <!-- grafico -->
              <div class="row">
                <div class="center-block" style="width:400px">
                  <h4 class="text-center">Alumnos existentes por cursos</h4>
                  <center>
                    <canvas id="pieCursos" height="400" width="400"></canvas>
                  </center>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- pagina 12 -->
      <div class="row slide" id="slide_12">
        <div class="col-xs-12 text-center">
          <div class="centrado">
            <h1 class="courier">¿Cómo se hizo?</h1>
          </div>
        </div>
      </div>
      <!-- pagina 13 -->
      <div class="row slide" id="slide_13">
        <div class="col-xs-12 text-center">
          <div class="centrado">
            <h1 class="courier">Metodologías:</h1>
            <h2 class="openSans">Proyecto | Sistema</h2>
          </div>
        </div>
      </div>
      <!-- pagina 14 -->
      <div class="row slide" id="slide_14">
        <div class="col-xs-12 margen-30">
          <div class="centrado">
            <h2 class="courier">Del proyecto:</h2>
            <ul class="openSans">
              <li>
                <h4>Metodología Cualitativa.</h4>
              </li>
              <li>
                <h4>Investigación Acción.</h4>
              </li>
              <li>
                <h4>Paradigma Fenomenológico.</h4>
              </li>
            </ul>
            <div class="espacio"></div>
            <h2 class="courier"><strong>Marco Lógico</strong></h2>
            <ul class="openSans">
              <li>
                <h4>Instrumento de gestión de programas y proyectos.</h4>
              </li>
              <li>
                <h4>Herramienta analítica.</h4>
              </li>
              <li>
                <h4>Fortalece la preparación y ejecución</h4>
              </li>
              <li>
                <h4>Facilita evaluación de resultados e impactos.</h4>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- pagina 15 -->
      <div class="row slide" id="slide_15">
        <div class="col-xs-12 margen-30">
          <div class="centrado">
            <h2 class="courier">Del sistema:</h2>
            <h3 class="openSans">
              <strong>Diseño y desarrollo en espiral RUP:</strong>
            </h3>
            <h3 class="courier">
              Diseño escalable e iterativo.
            </h3>
            <h3 class="courier">
              Programación estructurada.
            </h3>
            <h3 class="courier">
              Programación orientada a objetos.
            </h3>
            <div class="espacio"></div>
            <h3 class="openSans">
              <strong>Diagramas de diseño:</strong>
            </h3>
            <h3 class="courier">
              Caso de uso.
            </h3>
            <h3 class="courier">
              Entidad/Relación.
            </h3>
          </div>
        </div>
      </div>
      <!-- pagina 16 -->
      <div class="row slide" id="slide_16">
        <div class="col-xs-12 text-center">
          <div class="centrado">
            <h1 class="oswald">Caso de uso</h1>
          </div>
        </div>
      </div>
      <!-- pagina 17 -->
      <div class="row slide" id="slide_17">
        <div class="col-xs-12 text-center">
          <h4 class="openSans">Caso de uso del sistema</h4>
          <img src="imagenes/casoUsoSistema_rev0.png">
        </div>
      </div>
      <!-- pagina 18 -->
      <div class="row slide" id="slide_18">
        <div class="col-xs-12 text-center">
          <h4 class="openSans">Caso de uso del modulo usuario</h4>
          <img src="imagenes/casoUsoUsuario_rev0.png">
        </div>
      </div>
      <!-- pagina 19 -->
      <div class="row slide" id="slide_19">
        <div class="col-xs-12 text-center margen-20">
          <div class="centrado">
            <h1 class="oswald">Diagrama </br> Entidad - Relación</h1>
          </div>
        </div>
      </div>
      <!-- pagina 20 -->
      <div class="row slide" id="slide_20">
        <div class="col-xs-12 text-center">
          <img src="imagenes/EntidadRelacion_rev8.png" width="100%">
        </div>
      </div>
      <!-- pagina 21 -->
      <div class="row slide" id="slide_21">
        <div class="col-xs-12 text-center">
          <div class="centrado">
            <h1 class="oswald">Detalles</h1>
          </div>
        </div>
      </div>
      <!-- pagina 22 -->
      <div class="row slide" id="slide_22">
        <div class="col-xs-12 margen-30">
          <div class="centrado">
            <h3 class="openSans">
              <a href="http://www.mppeuct.gob.ve/">
                <strong>Acorde al MPPEUCT.</strong>
              </a>
            </h3>
            <h3 class="courier">
              Gaceta Oficial N° 38.272 </br> fecha: 14-09-2005.
            </h3>
            <h3 class="courier">
              Servicio comunitario.
            </h3>
            <h3 class="courier">
              Proyecto sociotecnológico.
            </h3>
            <h3 class="courier">
              Software libre.
            </h3>
            <div class="espacio"></div>
            <h3 class="openSans text-center">
              Adaptado a las necesidades de la institución y sus usuarios.
            </h3>
          </div>
        </div>
      </div>
      <!-- pagina 23 -->
      <div class="row slide" id="slide_23">
        <div class="col-xs-12">
          <div class="centrado">
            <h1 class="oswald text-center">
              <?php $enlace = enlaceDinamico(); ?>
              <a href="<?php echo $enlace ?>">
                <strong>El Sistema</strong>
              </a>
            </h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- graficos -->
<script src="java/Chart.js/Chart.min.js"></script>
<script type="text/javascript">
  // hecho por slayerfat.
  // documentacion: http://www.chartjs.org/docs/
  var datos = [];
  <?php
    $colores = [
      0 => [
        0 => "'#F7464A'",
        1 => "'#FF5A5E'",
        'color' => 'rojo'
      ],
      1 => [
        0 => "'#46BFBD'",
        1 => "'#5AD3D1'",
        'color' => 'verdeTurquesa'
      ],
      2 => [
        0 => "'#FDB45C'",
        1 => "'#FFC870'",
        'color' => 'amarillo'
      ],
      3 => [
        0 => "'#B48EAD'",
        1 => "'#C69CBE'",
        'color' => 'purpura'
      ],
      4 => [
        0 => "'#949FB1'",
        1 => "'#A8B3C5'",
        'color' => 'gris'
      ],
      5 => [
        0 => "'#4D5360'",
        1 => "'#616774'",
        'color' => 'grisOscuro'
      ],
      6 => [
        0 => "'#33CC33'",
        1 => "'#99FF99'",
        'color' => 'verde'
      ],
      7 => [
        0 => "'#3399FF'",
        1 => "'#99CCFF'",
        'color' => 'azul'
      ],
      8 => [
        0 => "'#444C52'",
        1 => "'#8292A0'",
        'color' => 'azulOscuro'
      ],
      9 => [
        0 => "'#E29A18'",
        1 => "'#EDC16F'",
        'color' => 'ocre'
      ],
      10 => [
        0 => "'#8918E2'",
        1 => "'#B76DF2'",
        'color' => 'moradito'
      ],
      11 => [
        0 => "'#17C5D3'",
        1 => "'#6DE8F2'",
        'color' => 'azulTurquesa2'
      ],
      12 => [
        0 => "'#4A46EA'",
        1 => "'#7E7BED'",
        'color' => 'azulMorado'
      ],
    ];
  ?>
  // cursos
  datos = [
    <?php $n = -1;
    while ( $datosCurso = mysqli_fetch_array($cursosQuery) ) :
      $i = rand(0, 12);
      while ( $n === $i ) :
        $i = rand(0, 12);
      endwhile;
      $n = $i;
        ?>
      {
        value: <?php echo $datosCurso['total_alumnos'] ?>,
        color: <?php echo $colores[$i][0] ?>,
        highlight: <?php echo $colores[$i][1] ?>,
        label: '<?php echo $datosCurso["des_curso"] ?>'
      },
    <?php endwhile; ?>
  ];
  var opciones = [
    {
      responsive: true,
    }
  ];
  // agarra el elemento con jQuery - usando metodo de jQuery .get().
  var elemento = $("#pieCursos").get(0).getContext("2d");
  // esto traeria el primer nodo de la coleccion.
  var pieCursos = new Chart(elemento).Pie(datos, opciones);
  // repitientes
  datos = [
    {
      value: <?php echo $datosRepitiente['no'] === (null) ? 0 : $datosRepitiente['no'] ?>,
      color: <?php echo $colores[1][0] ?>,
      highlight: <?php echo $colores[1][1] ?>,
      label: 'No repitiente'
    },
    {
      value: <?php echo $datosRepitiente['si'] === (null) ? 0 : $datosRepitiente['si'] ?>,
      color: <?php echo $colores[0][0] ?>,
      highlight: <?php echo $colores[0][1] ?>,
      label: 'repitiente'
    }
  ];
  var elemento = $("#pieRepitiente").get(0).getContext("2d");
  var pieRepitiente = new Chart(elemento).Pie(datos, opciones);
  // repitientes poligono
  var datos = {
      labels: ["No repitiente", "Repitiente"],
      datasets: [
        {
          label: "repitientes",
          fillColor: "rgba(51, 122, 183, 0.5)",
          strokeColor: "rgba(51, 122, 183,0.8)",
          highlightFill: "rgba(111, 181, 240,0.75)",
          highlightStroke: "rgba(111, 181, 240,1)",
          data: [
            <?php echo $datosRepitiente['no'] === (null) ? 0 : $datosRepitiente['no'] ?>,
            <?php echo $datosRepitiente['si'] === (null) ? 0 : $datosRepitiente['si'] ?>
          ]
        }
      ]
  };
  var elemento = $("#poligonoRepitiente").get(0).getContext("2d");
  var poligonoRepitiente = new Chart(elemento).Bar(datos, opciones);
  // sexo
  datos = [
    {
      value: <?php echo $datosSexo['ninos'] === (null) ? 0 : $datosSexo['ninos'] ?>,
      color: <?php echo $colores[7][0] ?>,
      highlight: <?php echo $colores[7][1] ?>,
      label: 'Masculino'
    },
    {
      value: <?php echo $datosSexo['ninas'] === (null) ? 0 : $datosSexo['ninas'] ?>,
      color: <?php echo $colores[10][0] ?>,
      highlight: <?php echo $colores[10][1] ?>,
      label: 'Femenino'
    }
  ];
  var elemento = $("#pieSexo").get(0).getContext("2d");
  var pieSexo = new Chart(elemento).Pie(datos, opciones);
  // sexo poligono
  var datos = {
      labels: ["Masculino", "Femenino"],
      datasets: [
        {
          label: "generos",
          fillColor: "rgba(51, 122, 183, 0.5)",
          strokeColor: "rgba(51, 122, 183,0.8)",
          highlightFill: "rgba(111, 181, 240,0.75)",
          highlightStroke: "rgba(111, 181, 240,1)",
          data: [
            <?php echo $datosSexo['ninos'] === (null) ? 0 : $datosSexo['ninos'] ?>,
            <?php echo $datosSexo['ninas'] === (null) ? 0 : $datosSexo['ninas'] ?>
          ]
        }
      ]
  };
  var elemento = $("#poligonoSexo").get(0).getContext("2d");
  var poligonoSexo = new Chart(elemento).Bar(datos, opciones);
  // sexo total
  datos = [
    {
      value: <?php echo $datosSexoTotal['hombres'] === (null) ? 0 : $datosSexoTotal['hombres'] ?>,
      color: <?php echo $colores[7][0] ?>,
      highlight: <?php echo $colores[7][1] ?>,
      label: 'Masculino'
    },
    {
      value: <?php echo $datosSexoTotal['mujeres'] === (null) ? 0 : $datosSexoTotal['mujeres'] ?>,
      color: <?php echo $colores[10][0] ?>,
      highlight: <?php echo $colores[10][1] ?>,
      label: 'Femenino'
    }
  ];
  var elemento = $("#pieSexoTotal").get(0).getContext("2d");
  var pieSexoTotal = new Chart(elemento).Pie(datos, opciones);
  // sexo poligono
  var datos = {
      labels: ["Masculino", "Femenino"],
      datasets: [
        {
          label: "generos",
          fillColor: "rgba(51, 122, 183, 0.5)",
          strokeColor: "rgba(51, 122, 183,0.8)",
          highlightFill: "rgba(111, 181, 240,0.75)",
          highlightStroke: "rgba(111, 181, 240,1)",
          data: [
            <?php echo $datosSexoTotal['hombres'] === (null) ? 0 : $datosSexoTotal['hombres'] ?>,
            <?php echo $datosSexoTotal['mujeres'] === (null) ? 0 : $datosSexoTotal['mujeres'] ?>
          ]
        }
      ]
  };
  var elemento = $("#poligonoSexoTotal").get(0).getContext("2d");
  var poligonoSexoTotal = new Chart(elemento).Bar(datos, opciones);
</script>
<script type="text/javascript">
  $(function() {
    var i = 0;
    var enlace = '#slide_'+i;
    var blanco;
    $(window).on('click', function() {
      i++;
      enlace = '#slide_'+i;
      blanco = $(enlace);
      if ( blanco.length ) {
        $('html, body').animate({
          scrollTop: blanco.offset().top
        }, 1000);
      }
    });
    $(document).keydown(function(e) {
      switch(e.which) {
        case 37: // izquierda
          i--;
          enlace = '#slide_'+i;
          blanco = $(enlace);
        break;

        case 38: // arriba
          i--;
          enlace = '#slide_'+i;
          blanco = $(enlace);
        break;

        case 39: // derecha
          i++;
          enlace = '#slide_'+i;
          blanco = $(enlace);
        break;

        case 40: // abajo
          i++;
          enlace = '#slide_'+i;
          blanco = $(enlace);
        break;

        default:
          enlace = '#slide_'+i;
          blanco = $(enlace);
        break;
      }
      // e.preventDefault();
      if ( blanco.length ) {
        $('html, body').animate({
          scrollTop: blanco.offset().top
        }, 1000);
      }
    });
  });
</script>
<?php finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']); ?>
