<?php if(!isset($_SESSION)){ session_start(); }
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
$index = enlaceDinamico();
validarUsuario(1);?>

<?php if ( isset($_SESSION['cod_tipo_usr']) ): ?>

	<?php if ($_SESSION['cod_tipo_usr'] <> 0): 
		//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
		//DESDE empezarPagina.php
		empezarPagina();
		
		//CONTENIDO:?>
		<div id="contenido">
			<div id="blancoAjax">
				
				<div class="contenido">
					<center>
						<center>
							<h1>Personal Autorizado.</h1>
							<h2>Consultar</h2>
						</center>
						<fieldset style="width: 300px">
							<legend><i>Indique La Cedula del Representante</i></legend>
								<?php $action = enlaceDinamico(""); ?>
								<form action="consultar_P.php" method="post" id="form_r">
									<b>Cedula</b>
									<input type="text" name="cedula_r" size="8" maxlength="8">
									<input type="submit" value="Enviar"/>
								</form>	
									<p>
										<span id="cedula_chequeo_r">
											
										</span>
									</p>
						</fieldset>
											
							<a href="<?php echo $index ?>">Regresar a Menu</a>
					</center>
				</div>

				<?php $cargador = enlaceDinamico("java/ajax/cargadorOnClick.js"); ?>
				<script type="text/javascript" src="<?php echo $cargador; ?>"></script>
				<script type="text/javascript">

					//cedula Representante
					$('#form_r :submit').on('click', function(evento){
						evento.preventDefault();
						var campo = $('#form_r [name=cedula]').val().trim();
						var cedRegex = /^[0-9]+$/;
						if (campo != "" && campo.length == 8) {
							if (campo.match(cedRegex)) {
								$('#form_r').submit();
								return true;
							}else{
								$('#cedula_chequeo_r').html('por favor introduzca la cedula sin espacios o caracteres especiales ej: 12345678');
								return false
							};
							
						}else{
							$('#cedula_chequeo_r').html('por favor introduzca la cedula sin espacios o caracteres especiales ej: 12345678');
							return false};
					});

				});
				</script>
			</div>
		</div>
		<?php
		//Modifeque el documento para adaptarlo a Representante

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