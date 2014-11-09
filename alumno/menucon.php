<?php if(!isset($_SESSION)){ session_start(); } ?>
<?php if ( isset($_SESSION['cod_tipo_usr']) ): ?>

	<?php if ($_SESSION['cod_tipo_usr'] <> 0): 
		$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
		require_once($enlace);
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
					<form action="almuno/consultar_A.php" method="post">
						<b>&nbsp;Cedula&nbsp;</b>
						<input type="text" name="cedula" size="8" maxlength="8">
						&nbsp;&nbsp;
						<input type="submit" value="Enviar"/>
					</form>	
			</fieldset>
			<br>	
			<fieldset style="width: 300px">
				<legend><i>Indique La Cedula del Representante</i></legend>
					<form action="consultar2.php" method = "post">
						<b>&nbsp;Cedula&nbsp;</b>
						<input type="text"  name="ced_repre" size="8" maxlength="8">
						&nbsp;&nbsp;
						<input type="submit" value="Enviar"/>
					</form>
			</fieldset>
			<br>	
			<fieldset style="width: 300px">
				<legend><i>Curso</i></legend>
					<form action="consultar3.php" method = "post">
						<b>&nbsp;Curso&nbsp;</b> &nbsp;&nbsp;
						<input type="submit" value="Enviar"/>
					</form>
			</fieldset>
			<center>
				<a href="index.php">Regresar a Menu</a>
			</center>

		</div>
		<script type="text/javascript" src="java/ajax/cargadorOnClick.js"></script>
		<?php
		//FINALIZAMOS LA PAGINA:
		//trae footer.php y cola.php
		finalizarPagina();?>
	<?php else: ?>
	<?php	header("location: ../index.php"); ?>
	<?php endif ?>
	
<?php else: ?>
	<?php $_SESSION['cod_tipo_usr'] = 0; ?>
	<?php	header("location: ../index.php"); ?>
<?php endif ?>