CREATE TABLE usuario (
codigo int unsigned auto_increment primary key,
nombre varchar(20) not null, apellido varchar(20) not null,
telefono varchar(11) default 'SinRegistro',
email varchar(50) unique,
seudonimo varchar(20) not null unique, 
clave varchar(20) not null,
cod_tipo_usr tinyint(1) unsigned default 1,
status tinyint(1) unsigned not null default 1,
cod_usr_reg int not null, 
fec_reg timestamp not null default current_timestamp,
cod_usr_mod int not null, 
fec_mod timestamp not null default current_timestamp,
foreign key (cod_tipo_usr)
	references tipo_usuario(codigo)
	on update cascade
	on delete restrict
);

INSERT INTO usuario
(codigo, nombre, apellido, email, seudonimo, clave, 
cod_tipo_usr, cod_usr_reg, cod_usr_mod)
values
(1, 'Keanu', 'Reeves', 'CANTV@ESUNA.MIERDA.com.ve',
 'neo', 'matrix', 4, 1, 1);