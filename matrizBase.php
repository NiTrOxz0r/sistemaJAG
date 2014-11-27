<?php
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
// DETALLESE QUE NO TIENE PARAMETROS!
// ESTO SE DEBE A QUE SINO CREA UN BUQLE INFINITO.
// PARA VALIDAR EN PAGINAS SE DEBE PONER PARAMETROS!!!
// VEAN php/cuerpo/admin/body.php
validarUsuario();

//ESTA FUNCION TRAE EL HEAD Y NAVBAR
//DESDE empezarPagina.php
//se lee como:
//empezarPagina: tipo head (html inicial) y tipo navbar (menu de navegacion)
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);

//CONTENIDO:?>
<!-- esto va en head.php -->
<!-- pero se pone aqui por demostracion. -->
<!-- Bootstrap -->
<link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- DETALLESE QUE EL TIENE QUE SER UNICA PARA NO GENERAR CONFLICTOS CON AJAX Y JQUERY -->
	<div id="contenido_paginaTal_descripcionTal_etc">
		<!-- DETALLESE QUE NO ES UN ID SINO UNA CLASE. -->
		<div id="blancoAjax" class="container">
			<!-- CONTENIDO EMPIEZA DEBAJO DE ESTO: -->
			<!-- DETALLESE QUE NO ES UN ID SINO UNA CLASE. -->
			<div class="row">
				<div class="contenido col-md-12">

					<!-- EJEMPLO DE FORMULARIOS: -->
					<span><center>normal:</center></span>
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
					<!-- <div class="col-xs-12">
						<span class="col-xs-4"></span>
						<span class="col-xs-4 text-center italic text-capitalize">
							<strong>con bootstrap</strong>
						</span>
					</div> -->
					<form class="form-horizontal" role="form">
						<fieldset>
							<legend class="text-center text-capitalize">
								con bootstrap
							</legend>
						  <div class="form-group">
						    <label for="campoX" class="col-sm-2 control-label">Campo Y:</label>
						    <div class="col-sm-4 controls">
						      <input
						      type="text"
						      name="campoX"
						      class="form-control"
						      id="campoX"
						      placeholder="introduzca campo x">
									<p class="help-block">
										<small>Ayuda complementaria del campo X.</small>
									</p>
						    </div>
						    <label for="campoY" class="col-sm-2 control-label">Campo Y:</label>
						    <div class="col-sm-4 controls">
						      <input
						      type="text"
						      name="campoY"
						      class="form-control"
						      id="campoY"
						      placeholder="introduzca campo x">
									<p class="help-block">
										<small>Ayuda complementaria del campo Y.</small>
									</p>
						    </div>
						  </div>
						  <div class="form-group">
						  	<label for="campoZ" class="col-sm-2 control-label">Campo Z:</label>
						  	<div class="col-sm-10 controls">
				  		  	<select class="form-control" name="campoZ" id="campoZ_chequeob">
				  					<option value="1">
				  						datos de Z
				  					</option>
				  					<option value="2">
				  						datos de Z
				  					</option>
				  				</select>
				  				<p class="help-block">
										<small>Ayuda complementaria del campo Z.</small>
									</p>
						  	</div>
						  </div>
						  <div class="form-group">
						  	<label for="campoZ" class="col-sm-2 control-label">Campo K:</label>
						  	<label class="radio-inline">
						  	  <input type="radio" name="campoK" id="campoK+1" value="1"> algo
						  	</label>
						  	<label class="radio-inline">
						  	  <input type="radio" name="campoK" id="campoK+2" value="2"> algo
						  	</label>
						  	<label class="radio-inline">
						  	  <input type="radio" name="campoK" id="campoK+3" value="3"> algo
						  	</label>
						  </div>
						  <span class="col-xs-4"></span>
						  <button type="submit" class="btn btn-primary col-xs-4" disabled>Enviar</button>
						</fieldset>
					</form>
				</div>
			</div>
			<!-- CONTENIDO TERMINA ARRIBA DE ESTO: -->
		</div>
	</div>
	<!-- js de bootstrap, esto iria en footer.php -->
  <script src="css/bootstrap/js/bootstrap.min.js"></script>

<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>
