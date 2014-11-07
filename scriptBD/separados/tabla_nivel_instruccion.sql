CREATE TABLE nivel_instruccion (
codigo tinyint(1) unsigned primary key, 
descripcion varchar(20) not null,
status tinyint(1) unsigned not null default 1, 
cod_usr_reg int not null, fec_reg timestamp not null default current_timestamp,
cod_usr_mod int not null, fec_mod timestamp not null default current_timestamp);

INSERT INTO nivel_instruccion
(codigo, descripcion, cod_usr_reg,cod_usr_mod)
values
(0,'N/S', 1, 1),
(1,'Inicial', 1, 1),
(2,'Primaria', 1, 1),
(3,'Diversificada', 1, 1),
(4,'Universitaria', 1, 1);