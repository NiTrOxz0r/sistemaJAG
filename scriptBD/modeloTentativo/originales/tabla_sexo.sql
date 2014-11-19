CREATE TABLE sexo (
	codigo tinyint(1) unsigned primary key,
	descripcion varchar(10) not null,
	status tinyint(1) unsigned not null default 1,
	cod_usr_reg int not null,
	fec_reg timestamp not null default current_timestamp,
	cod_usr_mod int not null,
	fec_mod timestamp not null
);

INSERT INTO sexo
values
(0,'Masculino', 1, 1, null, 1, current_timestamp),
(1,'Femenino', 1, 1, null, 1, current_timestamp)
;
