<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario();

//if ( isset($_POST['seudonimo']) && isset($_POST['clave']) ): 
if ( true ): 
	// $seudonimo = $_POST['seudonimo'];
	// $clave = $_POST['clave'];
	$seudonimo = "hola";
	$clave = "matrix1";
	echo password_hash($clave, PASSWORD_BCRYPT, ['cost' => 12]);
	$validarForma = new ChequearUsuario($seudonimo,	$clave);
	//CONTENIDO:?>
	<div id="contenido">
		<div id="blancoAjax">
			<!-- CONTENIDO EMPIEZA DEBAJO DE ESTO: -->
			<!-- DETALLESE QUE NO ES UN ID SINO UNA CLASE. -->
			<div class="contenido">

				<!-- EJEMPLO DE FORMULARIOS: -->
				<form>
					<table>
						<thead>
							
						</thead>
						<tbody>
							<tr>
								<td>
									<?php echo $validarForma->clave; ?>
								</td>
								<td>
									<?php echo password_hash($clave, PASSWORD_BCRYPT, ['cost' => 12]) ?>
								</td>
							</tr>
							<tr>
								<td>
								</td>
								<td>
								</td>
							</tr>
						</tbody>
					</table>

					<!-- chequeo por medio de ajax: -->
					<span class="chequeo" id="campoX_chequeo">
						
					</span>

					<td class="chequeo" id"campo_Y_chequeo">
						
					</td>

					<input type="text" class="chequeo" id="campoZ_chequeo">

				</form>
			
			</div>
			<!-- CONTENIDO TERMINA ARRIBA DE ESTO: -->
		</div>
	</div>
<?php else: ?>
	<div id="blancoAjax">
		Error en el proceso de inscripcion.
		</br>
		Ups! parece ser que trato de ingresar a esta pagina incorrectamente!
	</div>
<?php endif; ?>
<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina();?>