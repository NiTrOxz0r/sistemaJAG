<?php
	$master = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
	require_once($master);
	$estilo = enlaceDinamico('css/estilo.css');
	$jquery = enlaceDinamico('java/jquery-1.11.0.min.js');
	$cargadorOnClick = enlaceDinamico("java/ajax/cargadorOnClick.js");
	$bootstrap = enlaceDinamico('css/bootstrap/css/bootstrap.min.css');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistema JAG</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $estilo ?>">
	<!-- jQuery -->
	<script type="text/javascript" src="<?php echo $jquery ?>"></script>
	<!-- funcion considerada deprecada -->
	<script type="text/javascript" src="<?php echo $cargadorOnClick ?>"></script>
	<!-- Bootstrap -->
	<link href="<?php echo $bootstrap ?>" rel="stylesheet">
</head>
<body>
	<div id="debub" class="ignorar" style="border: 2px solid black">
		<?php debugSistema(); ?>
	</div>
