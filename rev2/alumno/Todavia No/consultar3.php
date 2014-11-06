<?

include("../conexion/conex.php");

	
	//$cedula = $_POST['ced_repre'];
	
	$sql = "select pnom, papelli, des_cur from alumno a, cursos b where a.cod_cur = b.cod_cur;";
	$re = mysql_query($sql, $conn) or die ("Problemas de Conexion".mysql_error());
	
		

		if ($datos = mysql_fetch_array($re)){

			echo "<table align=center border=1 cellspacing = 10px width=50%>";
		
			echo "<tr>";
				echo "<th>"." Nombre del Alumno"."</th>"."<th>"."Apellido del Alumno"."</th>";
			echo "</tr>";

			echo "<tr>";
				echo "<td>".$datos['pnom']."</td>"."<td>".$datos['papelli']."</td>";
			echo "</tr>";

			echo "<tr>";
				echo "<th>"."CUrso"."</th>";
			echo "</tr>";

			echo "<tr>";
				echo "<td>".$datos['des_cur']."</td>";
			echo "</tr>";
	
			
			/*echo "<tr>";
				echo "<td>"."<a href=/basecas/otro/consultas/form2.html>Volver</a>"."</td>";
			echo "</tr>";*/
			
			mysql_close($conn);
			}
	       			else {  echo "<p align=center>"."No existe Datos con esa Cedula"."</p>"."</br>"."</br>";
					//echo "<p align=center>"."<a href=/basecas/otro/consultas/form2.html>Volver</a>"."</p>"; 

					mysql_close($conn);
			}    
	   		
		
?>