<div>

	<!-- http://www.w3schools.com/tags/ref_eventattributes.asp -->
	<form action="usuario/consultarUsuario.php" method="POST">

		Usuario:
		<input 
			type="text" 
			name="seudonimo" 
			id="seudonimo"
			autofocus="autofocus"
			required="required"
			placeholder="Instroduzca Usuario">
		</br>

		Clave: 
		<input 
			type="password" 
			name="clave" 
			id="clave"
			required="required"
			placeholder="Instroduzca Clave"></br>
		<input 
			type="submit" 
			value="enviar" 
			name="enviar" 
			onsubmit"return validarUsuario();"
			onclick="return validarUsuario();">

	</form>

	<a href="reg.php">Registrarse</a>
</div>

<script type="text/javascript" src="java/validacionUsuario.js"></script>