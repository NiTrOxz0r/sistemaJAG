<?php
$master = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($master);
debugVariables();
$bootstrapJS = enlaceDinamico('css/bootstrap/js/bootstrap.min.js');
?>

<!-- js de bootstrap -->
<script src="<?php echo $bootstrapJS ?>"></script>

<div id="footer">
	<p>
		Sistema JAG. EN CONSTRUCCION 2014.
	</p>

	<p>
		ENLACES...
	</p>
</div>
