<?php
$master = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($master);

$bootstrapJS = enlaceDinamico('css/bootstrap/js/bootstrap.min.js');
?>

<!-- js de bootstrap -->
<script src="<?php echo $bootstrapJS ?>"></script>

<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-4 col-sm-offset-1">
        <div>
          <h4 style="padding-left:40px;">
            <strong>Autores</strong>
          </h4>
        </div>
        <ul>
          <strong>
            <li>
              <a href="http://www.slayerfat.com.ve">
                Alejandro Granadillo
              </a>
            </li>
            <li>Andres Leotur</li>
            <li>Bryan Torrez</li>
            <li>Erick Zerpa</li>
            <li>Joan Camacho</li>
          </strong>
        </ul>
      </div>
      <div class="col-sm-2">
        <div id="footerLogo">
          <?php $enlace = enlaceDinamico('imagenes/logo-escuela-edge.png'); ?>
          <?php $index = enlaceDinamico(); ?>
          <center>
            <a href="<?php echo $index ?>">
              <img src="<?php echo $enlace ?>" class="img-responsive" width="50px" alt="sistema de inscripcion jag">
            </a>
          </center>
        </div>
      </div>
      <div class="col-sm-4 text-right">
        <div>
          <h4 style="padding-left:40px;">
            <?php if ($_SESSION['cod_tipo_usr'] >= 1 and $_SESSION['cod_tipo_usr'] <> 5): ?>
              <strong>Gestionar</strong>
            <?php else: ?>
              <strong>sistemaJAG</strong>
            <?php endif ?>
          </h4>
        </div>
        <ul>
          <strong>
          <?php if ($_SESSION['cod_tipo_usr'] >= 1 and $_SESSION['cod_tipo_usr'] <> 5): ?>
            <?php $alumnos = enlaceDinamico('alumno/menucon.php'); ?>
            <?php $padres = enlaceDinamico('personalAutorizado/menucon.php'); ?>
            <?php $cursos = enlaceDinamico('curso/menucon.php'); ?>
            <?php $usuarios = enlaceDinamico('usuario/menucon.php'); ?>
            <li><a href="<?php echo $alumnos ?>">Alumno</a></li>
            <li><a href="<?php echo $padres ?>">Padres/Allegados</a></li>
            <li><a href="<?php echo $cursos ?>">Cursos</a></li>
            <?php if ($_SESSION['cod_tipo_usr'] >= 2): ?>
              <li><a href="<?php echo $usuarios ?>">Usuarios</a></li>
            <?php endif ?>
          <?php else: ?>
            <?php $enlace = enlaceDinamico('sobre.php'); ?>
            <li><a href="<?php echo $enlace ?>">Sobre el sistemaJAG</a></li>
            <?php $enlace = enlaceDinamico('manual.php'); ?>
            <li><a href="#">Manual de uso</a></li>
            <?php $enlace = enlaceDinamico('manual.php'); ?>
            <li><a href="#">Ayuda al usuario</a></li>
          <?php endif ?>
          </strong>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3">
        <div class="col-sm-6 col-sm-offset-3">
          <h4 style="padding-left:40px;">
            <strong>Profesores</strong>
          </h4>
          <ul>
            <strong>
              <li>Edwuard Castañeda</li>
              <li>Gustavo Lujan</li>
              <li>Antonio Viloria</li>
            </strong>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <?php $enlace = enlaceDinamico('imagenes/hole-overlay.png') ?>
        <center>
          <img id="imgCodigos" class="img-responsive" src="<?php echo $enlace ?>">
        </center>
      </div>
    </div>
  </div>
  <p id="mainTitulo">
    <strong>sistemaJAG 2014.</strong>
  </p>
  <script type="text/javascript">
    <?php $enlace = 'imagenes/'.rand(1,15).'.png';
    $imagen = enlaceDinamico($enlace) ?>
    $(function() {
      $('#imgCodigos').css('background-image','url(<?php echo $imagen ?>)');
    });
  </script>
</footer>
