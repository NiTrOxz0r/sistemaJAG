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
		      <a class="navbar-brand" href="<?php echo $index ?>">sistemaJAG</a>
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
		        <li><a href="<?php echo $inscripcion ?>">inscripción</a></li>
		        <li class="dropdown">
		          <a
		          href="#"
		          class="dropdown-toggle"
		          data-toggle="dropdown"
		          role="button"
		          aria-expanded="false">
		          	Consultar <span class="caret"></span>
		          </a>
		          <?php $alumnos = enlaceDinamico('alumno/menucon.php'); ?>
		          <?php $padres = enlaceDinamico('personalAutorizado/menucon.php'); ?>
		          <?php $cursos = enlaceDinamico('curso/menucon.php'); ?>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="<?php echo $alumnos ?>">Alumno</a></li>
		            <li><a href="<?php echo $padres ?>">Padres/Allegados</a></li>
		            <li><a href="<?php echo $cursos ?>">Cursos</a></li>
		          </ul>
		        </li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
            <?php $info = enlaceDinamico('estadistica.php'); ?>
            <li><a href="<?php echo $info ?>">Información del sistema</a></li>
            <li class="dropdown">
              <a
              href="#"
              class="dropdown-toggle"
              data-toggle="dropdown"
              role="button"
              aria-expanded="false">
                Manual <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
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
		      <a class="navbar-brand" href="<?php echo $cerrar ?>">sistemaJAG</a>
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
