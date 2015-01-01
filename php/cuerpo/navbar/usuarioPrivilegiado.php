<?php
/**
 * @author [Alejandro Granadillo] <[slayerfat@gmail.com]>
 *
 * [archivo que sirve para generar el menu de navegacion (navbar)
 * en el sistema, existen 5 archivos hasta este momento, considerados
 * como parte del navbar segun el tipo de usuario.]
 *
 * {@internal [creado con boostrap, lean sobre CSS, no es tan dificil.]}
 *
 * @see index.php
 * @see php/cuerpo/navbar/*.php
 * <*.php significa todos los archivos con extension .php>
 *
 * @version [1.0]
 */
if ( isset($_SESSION['cod_tipo_usr']) ) : ?>
	<?php if ($_SESSION['cod_tipo_usr'] <> 0) : ?>
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
		      	<?php $index = enlaceDinamico(); ?>
						<li>
							<?php $cerar = enlaceDinamico('cerrar.php'); ?>
							<a href="<?php echo $cerar ?>">
								<strong>
									<?=$_SESSION['seudonimo']?>
								</strong>
								| Salir
							</a>
						</li>
		        <?php $inscripcion = enlaceDinamico('personalAutorizado/form_reg_P.php'); ?>
		        <li><a href="<?php echo $inscripcion ?>">inscripcion</a></li>
		        <li class="dropdown">
		          <a
		          href="#"
		          class="dropdown-toggle"
		          data-toggle="dropdown"
		          role="button"
		          aria-expanded="false">
		          	Gestionar <span class="caret"></span>
		          </a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="#">Alumno</a></li>
		            <li><a href="#">Padres/Allegados</a></li>
		            <li><a href="#">Cursos</a></li>
		            <li class="divider"></li>
		            <li><a href="#">Usuarios</a></li>
		          </ul>
		        </li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="#">Manual de uso</a></li>
		        <li class="dropdown">
		        	<a
		        	href="#"
		        	class="dropdown-toggle"
		        	data-toggle="dropdown"
		        	role="button"
		        	aria-expanded="false">
		        		Alumno <span class="caret"></span>
		        	</a>
		        	<ul class="dropdown-menu" role="menu">
		        	  <li><a href="#">Registrar</a></li>
		        	  <li><a href="#">Consultar</a></li>
		        	  <li><a href="#">Actualizar</a></li>
		        	  <li class="divider"></li>
		        	  <li><a href="#">Ayuda al usuario</a></li>
		        	  <li class="divider"></li>
		        	  <li><a href="#">Manual de uso</a></li>
		        	</ul>
		        </li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
	<?php else : ?>
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
		      <?php $cerar = enlaceDinamico('cerrar.php'); ?>
		      <a class="navbar-brand" href="<?php echo $cerrar ?>">sitemaJAG</a>
		    </div>
		    <!-- Esto es ocultado cuando pasa a tipo movil. -->
		    <div class="collapse navbar-collapse" id="navbar_target">
		      <ul class="nav navbar-nav">
		        <li>
							<?php $registrarse = enlaceDinamico('usuario/form_reg_U.php') ?>
							<a href="<?php echo $registrarse ?>">
								| registrarse
							</a>
		        </li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
	<?php endif; ?>
<?php endif; ?>
