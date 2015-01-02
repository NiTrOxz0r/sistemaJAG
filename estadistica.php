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
              $datosSexoTotal = mysqli_fetch_assoc($resultado); ?>
              <div class="row">
                <div class="col-sm-6">
                  <h4>
                    Personas de sexo Masculino:
                    <strong><?php echo $datosSexoTotal['hombres'] ?></strong>
                  </h4>
                </div>
                <div class="col-sm-6">
                  <h4>
                    Personas de sexo Femenino:
                    <strong><?php echo $datosSexoTotal['mujeres'] ?></strong>
                  </h4>
                </div>
              </div>
              <!-- grafico -->
              <div class="row">
                <div class="center-block" style="width:850px">
                  <h4 class="text-center">Relacion de genero</h4>
                  <canvas id="pieSexoTotal" height="400" width="400"></canvas>
                  <canvas id="poligonoSexoTotal" height="400" width="400"></canvas>
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
                <div class="center-block" style="width:850px">
                  <h4 class="text-center">Relacion de genero</h4>
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
                    <strong><?php echo $datosRepitiente['si'] ?></strong>
                  </h4>
                </div>
                <div class="col-sm-6">
                  <h4>
                    Alumnos no repitientes:
                    <strong><?php echo $datosRepitiente['no'] ?></strong>
                  </h4>
                </div>
              </div>
              <!-- grafico -->
              <div class="row">
                <div class="center-block" style="width:850px">
                  <h4 class="text-center">Relacion de repitientes</h4>
                  <canvas id="pieRepitiente" height="400" width="400"></canvas>
                  <canvas id="poligonoRepitiente" height="400" width="400"></canvas>
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
              $cursosQuery = conexion($query); ?>
              <!-- grafico -->
              <div class="row">
                <div class="center-block" style="width:400px">
                  <h4 class="text-center">Alumnos existentes por cursos</h4>
                  <canvas id="pieCursos" height="400" width="400"></canvas>
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
    <?php while ( $datosCurso = mysqli_fetch_array($cursosQuery) ) :
      $i = rand(0, 12); ?>
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
      value: <?php echo $datosRepitiente['no'] ?>,
      color: <?php echo $colores[1][0] ?>,
      highlight: <?php echo $colores[1][1] ?>,
      label: 'No repitiente'
    },
    {
      value: <?php echo $datosRepitiente['si'] ?>,
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
            <?php echo $datosRepitiente['no'] ?>,
            <?php echo $datosRepitiente['si'] ?>
          ]
        }
      ]
  };
  var elemento = $("#poligonoRepitiente").get(0).getContext("2d");
  var poligonoRepitiente = new Chart(elemento).Bar(datos, opciones);
  // sexo
  datos = [
    {
      value: <?php echo $datosSexo['ninos'] ?>,
      color: <?php echo $colores[7][0] ?>,
      highlight: <?php echo $colores[7][1] ?>,
      label: 'Masculino'
    },
    {
      value: <?php echo $datosSexo['ninas'] ?>,
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
            <?php echo $datosSexo['ninos'] ?>,
            <?php echo $datosSexo['ninas'] ?>
          ]
        }
      ]
  };
  var elemento = $("#poligonoSexo").get(0).getContext("2d");
  var poligonoSexo = new Chart(elemento).Bar(datos, opciones);
  // sexo total
  datos = [
    {
      value: <?php echo $datosSexoTotal['hombres'] ?>,
      color: <?php echo $colores[7][0] ?>,
      highlight: <?php echo $colores[7][1] ?>,
      label: 'Masculino'
    },
    {
      value: <?php echo $datosSexoTotal['mujeres'] ?>,
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
            <?php echo $datosSexoTotal['hombres'] ?>,
            <?php echo $datosSexoTotal['mujeres'] ?>
          ]
        }
      ]
  };
  var elemento = $("#poligonoSexoTotal").get(0).getContext("2d");
  var poligonoSexoTotal = new Chart(elemento).Bar(datos, opciones);
</script>
<?php finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']); ?>
