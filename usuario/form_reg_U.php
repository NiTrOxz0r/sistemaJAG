<?php
	session_start();
	$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
	require_once($enlace);
	// invocamos validarUsuario desde master.php
	validarUsuario();
	//HEAD:
	$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/head.php";
	require_once($enlace);
	//NAVBAR
	$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/navbar.php";
	require_once($enlace);

	//CONTENIDO:?>
	
	<div id="form_reg_U">
	<!-- http://www.w3schools.com/html/html_forms.asp -->
		<form 
			name="form_U"
			id="form_U"
			action="<?php echo $_SERVER['DOCUMENT_ROOT'].'/github/sistemaJAG/usuario/insertar_U.php' ?>"
			method="POST">
			<table>
				<thead>
					<th>Datos basicos:</th>
				</thead>
				<tbody>
					<tr>
						<td>Seudonimo</td>
						<td>
							<input 
								type="text"
								name="seudonimo"
								id="seudonimo"
								autofocus="autofocus"
								required="required"
								placeholder="Instroduzca Usuario">
						</td>
						<td>Contrase&ntilde;a</td>
						<td>
							<input 
								type="password"
								name="clave"
								id="clave"
								required="required"
								placeholder="Instroduzca Clave">
						</td>
					</tr>
					<tr>
						<td>
							
						</td>
						<td id="seudonimo_chequeo">
							
						</td>
						<td>
							
						</td>
						<td id="clave_chequeo">
							
						</td>
					</tr>
					<tr colspan="6">
						<td>
							<input 
								type="submit"
								value="enviar"
								name="enviar"
								onsubmit"return validacionUsuario();"
								onclick="return validacionUsuario();">
						</td>
					</tr>
				</tbody>

			</table>
		</form>
	</div>
	<script type="text/javascript">
		$(function(){
			$.ajax({
				url: '../java/validacionUsuario.js',
				type: 'GET',
				dataType: "script",
			});
			$("#seudonimo").change(function(){
				var info = $(this).val();
				validacionUsuario();
				$.ajax({
					url: '../java/usuario.php',
					type: 'POST',
					data: {seudonimo:info},
					dataType: "html",
					success: function(datos){
						$("#seudonimo_chequeo").html(datos);
					},
				});
			});

			$("#clave").change(function(){
				validacionUsuario();
			});

			// $("td :submit").on( 'click' , function (evento) {
			// 	evento.preventDefault();
			// 	console.log(evento);
			// 	if (validacionUsuario()) {
			// 		console.log(typeof(evento));
			// 	};
			// });

			$('#form_U').on('submit', function (evento){
				if ( validacionUsuario() === true ) {
					evento.preventDefault();
					var seudonimo = $('#seudonimo').val();
					var clave = $('#clave').val();
					$('#clave').val();
					$.ajax({
						url: 'insertar_U.php',
						type: 'POST',
						data: {
							seudonimo:seudonimo,
							clave:clave
						},
						success: function (datos){
							$("#form_reg_U").html(datos);
						},
					});
					//return true;
				}else{
					return false;
				};
			});
		});
	</script>
<?php
	//FOOTER:
	$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/footer.php";
	require_once($enlace);
	$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/cola.php";
	require_once($enlace);
?>