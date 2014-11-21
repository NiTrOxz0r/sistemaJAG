<?php 
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
$index = enlaceDinamico();
?>

<?php if(!isset($_SESSION)){ session_start(); } ?>
<?php if ( isset($_SESSION['cod_tipo_usr']) ): ?>

	<?php if ($_SESSION['cod_tipo_usr'] <> 0):
		// invocamos validarUsuario.php desde master.php
		validarUsuario();

		//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
		//DESDE empezarPagina.php
		empezarPagina();

		//CONTENIDO:?>
	<div id="contenido">
		<div id="blancoAjax">
			<div>
				<center>
					<h1>Sistema JAG.</h1>
					<h2>opciones</h2>
					<h2>Alumno.</h2>
				</center>

				<table border="1" align="center">
					<tr>
					<td>
						&nbsp;&nbsp;
						<?php $forma = enlaceDinamico("alumno/form_reg_A.php"); ?>
						<a class="otro" href="<?php echo $forma ?>"> Registar un Alumno </a>
						&nbsp;&nbsp;
					</td>
					<td>
						&nbsp;&nbsp;
						<?php $enlace = enlaceDinamico("alumno/menucon.php"); ?>
						<a class="otro" href="<?php echo $enlace ?>"> Consultar un Alumno </a>
						&nbsp;&nbsp;
					</td>
				</table>
			</div>
			<?php $cargadorOnClick = enlaceDinamico("java/ajax/cargadorOnClick.js"); ?>
			<script type="text/javascript" src="<?php echo $cargadorOnClick ?>"></script>
		</div>
	</div>
		<?php
		//FINALIZAMOS LA PAGINA:
		//trae footer.php y cola.php
		finalizarPagina();?>
	<?php else: ?>
	<?php	header("Location:".$index); ?>
	<?php endif ?>
	
<?php else: ?>
	<?php $_SESSION['cod_tipo_usr'] = 0; ?>
	<?php	header("Location:".$index); ?>
<?php endif ?>