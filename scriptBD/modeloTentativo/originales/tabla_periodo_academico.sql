CREATE TABLE periodo_academico (
	codigo tinyint(3) unsigned primary key,
	descripcion varchar(10) not null,
	status tinyint(1) unsigned not null default 1,
	cod_usr_reg int not null,
	fec_reg timestamp not null default current_timestamp,
	cod_usr_mod int not null,
	fec_mod timestamp not null DEFAULT 0
);

INSERT INTO periodo_academico
(codigo, descripcion, cod_usr_reg, cod_usr_mod, fec_mod)
values
(0,'2014-2015', 1, 1, current_timestamp),
(1,'2015-2016', 1, 1, current_timestamp),
(2,'2016-2017', 1, 1, current_timestamp),
(3,'2017-2018', 1, 1, current_timestamp),
(4,'2018-2019', 1, 1, current_timestamp),
(5,'2019-2020', 1, 1, current_timestamp),
(6,'2020-2021', 1, 1, current_timestamp),
(7,'2021-2022', 1, 1, current_timestamp),
(8,'2022-2023', 1, 1, current_timestamp),
(9,'2023-2024', 1, 1, current_timestamp),
(10,'2024-2025', 1, 1, current_timestamp),
(11,'2025-2026', 1, 1, current_timestamp),
(12,'2026-2027', 1, 1, current_timestamp),
(13,'2027-2028', 1, 1, current_timestamp),
(14,'2028-2029', 1, 1, current_timestamp),
(15,'2029-2030', 1, 1, current_timestamp),
(16,'2030-2031', 1, 1, current_timestamp),
(17,'2031-2032', 1, 1, current_timestamp),
(18,'2032-2033', 1, 1, current_timestamp),
(19,'2033-2034', 1, 1, current_timestamp),
(20,'2034-2035', 1, 1, current_timestamp);

-- echo "INSERT INTO periodo_academico
-- (codigo, descripcion, cod_usr_reg, cod_usr_mod)
-- values</br>";
-- for ($i=0; $i <= 20; $i++) {
-- 	$x = $i + 2014;
-- 	$y = $i + 2015;
-- 	if ($i == 20) {
-- 		echo "($i,'$x-$y', 1, 1, current_timestamp);";
-- 	}else{
-- 		echo "($i,'$x-$y', 1, 1, current_timestamp),<br>";
-- 	}
-- }
