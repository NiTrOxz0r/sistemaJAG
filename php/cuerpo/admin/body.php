<div>
	<center>
		<h1>Sistema JAG.</h1>
		<h2>opciones</h2>
	</center>

	<table border="1" align="center">
		<tr>
		<td>
			&nbsp;&nbsp;
			<a class="click" href="alumno/body.php">
				<h2> Gestionar Alumno. </h2>
			</a>
			&nbsp;&nbsp;
		</td>
	</table>
	<br>
	<table border="1" align="center">
		<tr>
		<td>
			&nbsp;&nbsp;
			<a class="click" href="padres_representante/index.html"> 
				<h2>Gestionar Padres y Representante.</h2> 
			</a>
			&nbsp;&nbsp;
		</td>
	</table>
	<br>	
	<table border="1" align="center">
		<tr>
		<td>
			&nbsp;&nbsp;
			<a class="click" href="profesor/index.html"> 
				<h2>Gestionar Profesor.</h2> 
			</a>
			&nbsp;&nbsp;
		</td>
	</table>
	<br>	
	<table border="1" align="center">
		<tr>
		<td>
			&nbsp;&nbsp;
			<a class="click" href="personal_autorizado/index.html"> 
				<h2>Gestionar Personal Autorizado.</h2> 
			</a>
			&nbsp;&nbsp;
		</td>
	</table>
</div>

<script type="text/javascript">
	$(function(){
		$('.click').click(function(e){
			e.preventDefault();
			var enlace = $(this).attr('href');
			$('#contenido').html('');
			$('#contenido').load(enlace);
		});
	});
</script>