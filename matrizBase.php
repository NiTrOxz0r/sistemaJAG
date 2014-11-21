<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario();

//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
//DESDE empezarPagina.php
empezarPagina();

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
							<th>
								titulo de la tabla
							</th>
						</thead>

						<tbody>
							<tr>
								<td id="campoX_titulo">Nombre del campo x:</td>
								<td>
									<input type="text" name="campoX" id="campoX_chequeo">
								</td>
								<td id="campoY_titulo">Nombre del campo y:</td>
								<td>
									<input type="password" name="campoY" id="campoY_chequeo">
								</td>
							</tr>
							<tr>
								<td>
									
								</td>
								<td class="chequeo" id"campo_X_chequeo">
							
								</td>
								<td>
									
								</td>
								<td class="chequeo" id"campo_Y_chequeo">
							
								</td>
							</tr>
							<tr>
								<td id="campoZ_titulo">Nombre del campo z:</td>
								<td>
									<select name="campoZ" id="campoZ_chequeo">
										<option>
											datos de Z
										</option>
									</select>
								</td>
								<td id="campoK_titulo">Nombre del campo k:</td>
								<td>
									<input type="radio" name="campoK" value="k+1" checked>Algo
									<input type="radio" name="campoK" value="k+2">Algo
								</td>
							</tr>
							<tr>
								<td>
									
								</td>
								<td class="chequeo" id"campo_Z_chequeo">
							
								</td>
								<td>
									
								</td>
								<td class="chequeo" id"campo_K_chequeo">
							
								</td>
							</tr>
						</tbody>
					</table>

				<div id="error" class="chequeo">
					<!-- chequeo por medio de ajax: -->
					<span class="error" id="error">
						
					</span>
				</div>

				</form>
			
			</div>
			<!-- CONTENIDO TERMINA ARRIBA DE ESTO: -->
		</div>
	</div>

<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina();?>
