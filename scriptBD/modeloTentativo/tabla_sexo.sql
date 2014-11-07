CREATE TABLE sexo (
	codigo tinyint(1) unsigned primary key, 
	descripcion varchar(10) not null,
	status tinyint(1) unsigned not null default 1, 
	cod_usr_reg int not null, 
	fec_reg timestamp not null default current_timestamp,
	cod_usr_mod int not null, 
	fec_mod timestamp not null default current_timestamp
);

INSERT INTO sexo
(codigo, descripcion, cod_usr_reg, cod_usr_mod)
values
(0,'Masculino', 1, 1),
(1,'Femenino', 1, 1);