<?php
	$master = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
	require_once($master);
	$estilo = enlaceDinamico('css/estilo.css');
	$jquery = enlaceDinamico('java/jquery-1.11.0.min.js');
	$cargadorOnClick = enlaceDinamico("java/ajax/cargadorOnClick.js");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistema JAG</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $estilo ?>">
	<script type="text/javascript" src="<?php echo $jquery ?>"></script>
	<script type="text/javascript" src="<?php echo $cargadorOnClick ?>"></script>
</head>
<body>
	<div id="debub" class="ignorar" style="border: 2px solid black">
		<?php debugSistema(); ?>
	</div>
