CREATE TABLE tipo_usuario (
codigo tinyint(1) unsigned primary key, 
descripcion varchar(20) not null,
status tinyint(1) unsigned not null default 1, 
cod_usr_reg int not null, fec_reg timestamp not null default current_timestamp,
cod_usr_mod int not null, fec_mod timestamp not null default current_timestamp);

INSERT INTO tipo_usuario 
(codigo, descripcion, cod_usr_reg, cod_usr_mod)
values
(0, 'Dectivado',1,1),
(1, 'Usuario',1,1),
(2, 'Usuario Privilegiado',1,1),
(3, 'Administrador',1,1),
(4, 'Super Usuario',1,1),
(255, 'slayerfat',1,1);