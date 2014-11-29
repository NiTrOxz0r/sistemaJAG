<?php
$master = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($master);

$bootstrapJS = enlaceDinamico('css/bootstrap/js/bootstrap.min.js');
?>

<!-- js de bootstrap -->
<script src="<?php echo $bootstrapJS ?>"></script>

<footer id="footer">
  <p>
    Sistema JAG. EN CONSTRUCCION 2014.
  </p>

  <p>
    ENLACES...
  </p>
</footer>
