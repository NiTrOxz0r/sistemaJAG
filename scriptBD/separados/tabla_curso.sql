CREATE TABLE curso (
	codigo tinyint unsigned auto_increment primary key, 
	grado tinyint(2) not null, seccion tinyint(2) not null,
	cod_prof int unsigned default null, turno enum('m','t') not null,
	status tinyint(1) unsigned not null default 1, 
	cod_usr_reg int not null, fec_reg timestamp not null default current_timestamp,
	cod_usr_mod int not null, fec_mod timestamp not null default current_timestamp,
	foreign key (cod_prof)
		references profesor(codigo)
		on update cascade
		on delete restrict
);


/*insertar todos los posibles cursos a mano da ladilla:*/
<?php 
$i = 1; $j = 1;
	echo "INSERT INTO curso<br>
			(grado, seccion, cod_prof, turno, cod_usr_reg, cod_usr_mod)<br>
			values<br>";
	for ($i=1; $i <= 9 ; $i++) {
		while ($j <= 5) {
			if ($i == 9 and $j == 5) {
				echo "($i, $j, null, 'm', 1, 1);<br>";
				break;
			}else{
				echo "($i, $j, null, 'm', 1, 1),<br>";
				$j++;
			}	
		}
		$j = 1;
	}
?>
/*eso genera esta bonita lista*/
INSERT INTO curso
(grado, seccion, cod_prof, turno, cod_usr_reg, cod_usr_mod)
values
(1, 1, null, 'm', 1, 1),
(1, 2, null, 'm', 1, 1),
(1, 3, null, 'm', 1, 1),
(1, 4, null, 'm', 1, 1),
(1, 5, null, 'm', 1, 1),
(2, 1, null, 'm', 1, 1),
(2, 2, null, 'm', 1, 1),
(2, 3, null, 'm', 1, 1),
(2, 4, null, 'm', 1, 1),
(2, 5, null, 'm', 1, 1),
(3, 1, null, 'm', 1, 1),
(3, 2, null, 'm', 1, 1),
(3, 3, null, 'm', 1, 1),
(3, 4, null, 'm', 1, 1),
(3, 5, null, 'm', 1, 1),
(4, 1, null, 'm', 1, 1),
(4, 2, null, 'm', 1, 1),
(4, 3, null, 'm', 1, 1),
(4, 4, null, 'm', 1, 1),
(4, 5, null, 'm', 1, 1),
(5, 1, null, 'm', 1, 1),
(5, 2, null, 'm', 1, 1),
(5, 3, null, 'm', 1, 1),
(5, 4, null, 'm', 1, 1),
(5, 5, null, 'm', 1, 1),
(6, 1, null, 'm', 1, 1),
(6, 2, null, 'm', 1, 1),
(6, 3, null, 'm', 1, 1),
(6, 4, null, 'm', 1, 1),
(6, 5, null, 'm', 1, 1),
(7, 1, null, 'm', 1, 1),
(7, 2, null, 'm', 1, 1),
(7, 3, null, 'm', 1, 1),
(7, 4, null, 'm', 1, 1),
(7, 5, null, 'm', 1, 1),
(8, 1, null, 'm', 1, 1),
(8, 2, null, 'm', 1, 1),
(8, 3, null, 'm', 1, 1),
(8, 4, null, 'm', 1, 1),
(8, 5, null, 'm', 1, 1),
(9, 1, null, 'm', 1, 1),
(9, 2, null, 'm', 1, 1),
(9, 3, null, 'm', 1, 1),
(9, 4, null, 'm', 1, 1),
(9, 5, null, 'm', 1, 1);