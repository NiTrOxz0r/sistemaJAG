<?php 
$master = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($master);
?>

<div id="footer">
	<p>
		Sistema JAG. EN CONSTRUCCION 2014.
	</p>

	<p>
		ENLACES...
	</p>

	<p>
		<?php $index = enlaceDinamico(); ?>
		PARA IR A INDEX: <a href="<?php echo $index ?>">SALIR</a>
		<?php $cerrar = enlaceDinamico('cerrar.php'); ?>
		PARA ELIMINAR SESION: <a href="<?php echo $cerrar ?>">SALIR</a>
	</p>
		<p>
		<?php var_dump($_SESSION) ?>
	</p>
</div>