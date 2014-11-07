CREATE TABLE relacion (
	codigo tinyint unsigned primary key, 
	descripcion varchar(20) not null,
	status tinyint(1) unsigned not null default 1, 
	cod_usr_reg int not null, fec_reg timestamp not null default current_timestamp,
	cod_usr_mod int not null, fec_mod timestamp not null default current_timestamp
);

INSERT INTO relacion
(codigo, descripcion, cod_usr_reg, cod_usr_mod)
values
(1,'Madre', 1, 1),
(2,'Padre', 1, 1),
(3,'Tio(a)', 1, 1),
(4,'Abuelo(a)', 1, 1),
(5,'Hermano(a)', 1, 1),
(6,'Primo(a)', 1, 1),
(7,'Otro', 1, 1);