<?php if ( isset($_SESSION['cod_tipo_usr']) ) : ?>
	<?php if ($_SESSION['cod_tipo_usr'] <> null) : ?>
		<nav class="navbar navbar-default" role="navigation">
		  <div class="container-fluid">
		    <!-- Esto es para movil -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar_target">
		        <span class="sr-only">Abrir o cerrar navegacion</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <?php $index = enlaceDinamico(); ?>
		      <a class="navbar-brand" href="<?php echo $index ?>">sitemaJAG</a>
		    </div>
		    <!-- Esto es ocultado cuando pasa a tipo movil. -->
		    <div class="collapse navbar-collapse" id="navbar_target">
		      <ul class="nav navbar-nav">
		        <li>
							<?php $cerar = enlaceDinamico('cerrar.php'); ?>
							<a href="<?php echo $cerar ?>">
								<strong>
									<?=$_SESSION['seudonimo']?>
								</strong>
								| Salir
							</a>
						</li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
	<?php else : ?>
		<div>
			<i>Bienvenido! por favor Acceda al sistema.</i>
		</div>
	<?php endif; ?>
<?php endif; ?>
