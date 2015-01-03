<?php
$master = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($master);
/**
 * @author [Alejandro Granadillo] <[slayerfat@gmail.com]>
 *
 * [incia la cabecera de la todo el sistema.]
 * @see php/cuerpo/head/administrador.php
 * @see php/cuerpo/head/*.php
 *
 * @param  string  $titulo titulo que espera, por defecto sistema de JAG.
 * @param  integer $tipo   tipo de head a imprimir
 * @return [void]
 *
 * @version 1.0
 */
function iniciarHead(
	$titulo = "Sistema de inscripción Jose Antonio Gonzalez",
	$tipo = 0){

	if(!isset($_SESSION)){
	  session_start();
	}

	// para que cargue una vez el head:
	static $unaVez;
	// enlaces importantes:
	$estilo = enlaceDinamico('css/estilo.css');
	$jquery = enlaceDinamico('java/jquery-1.11.0.min.js');
	$cargadorOnClick = enlaceDinamico("java/ajax/cargadorOnClick.js");
	$bootstrap = enlaceDinamico('css/bootstrap/css/bootstrap.min.css');
	?>
	<?php if (!$unaVez): ?>
		<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN"
		"http://www.w3.org/TR/html4/frameset.dtd">
		<html>
		<head>
		<!--
		░░░░░░░░░▄░░░░░░░░░░░░░░▄░░░░
		░░░░░░░░▌▒█░░░░░░░░░░░▄▀▒▌░░░
		░░░░░░░░▌▒▒█░░░░░░░░▄▀▒▒▒▐░░░
		░░░░░░░▐▄▀▒▒▀▀▀▀▄▄▄▀▒▒▒▒▒▐░░░
		░░░░░▄▄▀▒░▒▒▒▒▒▒▒▒▒█▒▒▄█▒▐░░░
		░░░▄▀▒▒▒░░░▒▒▒░░░▒▒▒▀██▀▒▌░░░
		░░▐▒▒▒▄▄▒▒▒▒░░░▒▒▒▒▒▒▒▀▄▒▒▌░░
		░░▌░░▌█▀▒▒▒▒▒▄▀█▄▒▒▒▒▒▒▒█▒▐░░
		░▐░░░▒▒▒▒▒▒▒▒▌██▀▒▒░░░▒▒▒▀▄▌░
		░▌░▒▄██▄▒▒▒▒▒▒▒▒▒░░░░░░▒▒▒▒▌░
		▀▒▀▐▄█▄█▌▄░▀▒▒░░░░░░░░░░▒▒▒▐░
		▐▒▒▐▀▐▀▒░▄▄▒▄▒▒▒▒▒▒░▒░▒░▒▒▒▒▌
		▐▒▒▒▀▀▄▄▒▒▒▄▒▒▒▒▒▒▒▒░▒░▒░▒▒▐░
		░▌▒▒▒▒▒▒▀▀▀▒▒▒▒▒▒░▒░▒░▒░▒▒▒▌░
		░▐▒▒▒▒▒▒▒▒▒▒▒▒▒▒░▒░▒░▒▒▄▒▒▐░░
		░░▀▄▒▒▒▒▒▒▒▒▒▒▒░▒░▒░▒▄▒▒▒▒▌░░
		░░░░▀▄▒▒▒▒▒▒▒▒▒▒▄▄▄▀▒▒▒▒▄▀░░░
		░░░░░░▀▄▄▄▄▄▄▀▀▀▒▒▒▒▒▄▄▀░░░░░
		░░░░░░░░░▒▒▒▒▒▒▒▒▒▒▀▀░░░░░░░░
		Google hire me please:
		alejandro granadillo. slayerfat@gmail.com
		 -->
			<!-- no alterar al menos que sea necesario. -->
			<!-- metadata -->
			<meta charset="utf-8">
			<meta name="keywords" lang="es-ve" content="sistema, inscripcion, 2014">
			<meta name="language" content="Spanish">
			<meta name="author" content="Alejandro Granadillo">
			<meta name="author" content="Andres Leotur">
			<meta name="author" content="Bryan Torres">
			<meta name="author" content="Erick Zerpa">
			<meta name="author" content="Joan Camacho">
			<meta name=viewport content="width=device-width, initial-scale=1">
			<!-- estilos: -->
			<title><?php echo $titulo ?></title>
			<link rel="stylesheet" type="text/css" href="<?php echo $estilo ?>">
			<!-- jQuery -->
			<script type="text/javascript" src="<?php echo $jquery ?>"></script>
			<!-- funcion considerada deprecada -->
			<script type="text/javascript" src="<?php echo $cargadorOnClick ?>"></script>
			<!-- Bootstrap -->
			<link href="<?php echo $bootstrap ?>" rel="stylesheet">
		</head>
		<body>
		<?php if ($tipo === 4): ?>
			<div id="debug" class="ignorar" style="border: 2px solid black">
				<?php debugSistema(); ?>
			</div>
		<?php endif ?>
		<?php $unaVez = true ?>
	<?php endif ?>
<?php
} // fin iniciarHead
?>
