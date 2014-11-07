CREATE TABLE profesor (
codigo int unsigned auto_increment primary key,
cod_usr int unsigned not null,
status tinyint(1) unsigned not null default 1,
cod_usr_reg int not null, 
fec_reg timestamp not null default current_timestamp,
cod_usr_mod int not null, 
fec_mod timestamp not null default current_timestamp,
foreign key (cod_usr)
	references usuario(codigo)
	on update cascade
	on delete restrict
);

/*considerar: horas administrativas, tiempo de servicio, año de ingreso,
sumplente, asignacion especial?, capacidad tecnica especializada?, otros.*/

INSERT INTO profesor
(codigo, cod_usr, cod_usr_reg, cod_usr_mod)
values (1, 1, 1, 1);