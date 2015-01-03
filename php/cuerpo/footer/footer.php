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
        <ul>
          <li>algo</li>
          <li>algo</li>
          <li>algo</li>
          <li>algo</li>
        </ul>
      </div>
      <div class="col-sm-2">
        <div id="footerLogo"></div>
      </div>
      <div class="col-sm-4">
        <ul class="text-right">
          <li>algo</li>
          <li>algo</li>
          <li>algo</li>
          <li>algo</li>
        </ul>
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
  <p>
    sistemaJAG 2014.
  </p>
  <script type="text/javascript">
  <?php $enlace = 'imagenes/'.rand(1,15).'.png';
  $imagen = enlaceDinamico($enlace) ?>
  $(function() {
    $('#imgCodigos').css('background-image','url(<?php echo $imagen ?>)');
  });
  </script>
</footer>
