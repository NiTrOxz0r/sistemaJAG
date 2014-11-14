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

			<form id="consulta_U">

				<table>
					<thead>
						<th>Busqueda especifica</th>
					</thead>
					<tbody>
						<tr>
							<td id="tipo_titulo">Tipo de consulta:</td>
							<td>
								<select 
									name="tipo" 
									id="tipo"
									autofocus="autofocus"
									required>
									<option selected="selected">--Seleccione--</option>
									<option value="1">Por cedula:</option>
									<option value="2">Por Nombre:</option>
									<option value="3">Por Apellido:</option>
									<option value="4">Por Cargo:</option>
									<option value="5">Por Estatus:</option>
									<option value="6">Por Curso:</option>
								</select>
							</td>
							<td class="chequeo" id="tipo_chequeo">
								
							</td>
							<td>
								<input 
									type="text"
									name="informacion"
									id="informacion"
									required
									disabled>
							</td>
							<td id="informacion_chequeo">
								
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

			<form>
				<table>
					<thead>
						<th>Consulta General</th>
					</thead>
					<tbody>
						<td>
							<input type="submit" value="Consultar">
						</td>
					</tbody>
				</table>
			</form>

			<div id="error" class="chequeo">
				<!-- chequeo por medio de ajax: -->
				<span class="error" id="error">
					
				</span>
			</div>
		
		</div>
		<!-- CONTENIDO TERMINA ARRIBA DE ESTO: -->
	</div>
</div>

<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina();?>