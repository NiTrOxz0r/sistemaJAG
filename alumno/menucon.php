<?php 
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
$index = enlaceDinamico();?>

<?php if(!isset($_SESSION)){ session_start(); } ?>
<?php if ( isset($_SESSION['cod_tipo_usr']) ): ?>

	<?php if ($_SESSION['cod_tipo_usr'] <> 0): 
		//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
		//DESDE empezarPagina.php
		empezarPagina();
		
		//CONTENIDO:?>
		<div id="blancoAjax">
		
			<center>
				<h1>Alumno(a).</h1>
				<h2>Consultar</h2>
			</center>
			<fieldset style="width: 300px">
				<legend><i>Indique La Cedula del Alumno</i></legend>
					<?php $action = enlaceDinamico("alumno/consultar_A.php"); ?>
					<form action="<?php echo $action ?>" method="post">
						<b>&nbsp;Cedula&nbsp;</b>
						<input type="text" name="cedula" size="8" maxlength="8">
						&nbsp;&nbsp;
						<input type="submit" value="Enviar"/>
					</form>	
			</fieldset>
			<br>	
			<fieldset style="width: 300px">
				<legend><i>Indique La Cedula del Representante</i></legend>
					<?php $action = enlaceDinamico("alumno/consultar_A_XXX.php"); ?>
					<form action="<?php echo $action ?>" method="post">
						<b>&nbsp;Cedula&nbsp;</b>
						<input type="text"  name="ced_repre" size="8" maxlength="8">
						&nbsp;&nbsp;
						<input type="submit" value="Enviar"/>
					</form>
			</fieldset>
			<br>	
			<fieldset style="width: 300px">
				<legend><i>Curso</i></legend>
					<?php $action = enlaceDinamico("alumno/consultar_A_XXX.php"); ?>
					<form action="<?php echo $action ?>" method="post">
						<b>&nbsp;Curso&nbsp;</b> &nbsp;&nbsp;
						<input type="submit" value="Enviar"/>
					</form>
			</fieldset>
			<center>
				<a href="<?php echo $index ?>">Regresar a Menu</a>
			</center>

		</div>
		<?php $cargador = enlaceDinamico("java/ajax/cargadorOnClick.js"); ?>
		<script type="text/javascript" src="<?php echo $cargador; ?>"></script>
		<?php
		//FINALIZAMOS LA PAGINA:
		//trae footer.php y cola.php
		finalizarPagina();?>
	<?php else: ?>
	<?php	header("location:".$index); ?>
	<?php endif ?>
	
<?php else: ?>
	<?php $_SESSION['cod_tipo_usr'] = 0; ?>
	<?php	header("location:".$index); ?>
<?php endif ?>