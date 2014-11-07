CREATE TABLE nivel_instruccion (
	codigo tinyint(1) unsigned primary key, 
	descripcion varchar(20) not null,
	status tinyint(1) unsigned not null default 1, 
	cod_usr_reg int not null, fec_reg timestamp not null default current_timestamp,
	cod_usr_mod int not null, fec_mod timestamp not null default current_timestamp
);

INSERT INTO `nivel_instruccion` 
(`codigo`, `descripcion`, `status`, `cod_usr_reg`, `cod_usr_mod` ) VALUES
(0, 'N/S', 1, 1, 1),
(1, 'Inicial', 1, 1, 1),
(2, 'Primaria', 1, 1, 1),
(3, 'Diversificada', 1, 1, 1),
(4, 'Tecnico Medio', 1, 1, 1),
(5, 'Tecnico Superior', 1, 1, 1),
(6, 'Universitario', 1, 1, 1),
(7, 'Post-grado', 1, 1, 1),
(8, 'Doctorado', 1, 1, 1);