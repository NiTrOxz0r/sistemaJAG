CREATE TABLE asume (
codigo int unsigned auto_increment primary key,
cod_profesor int unsigned not null,
cod_curso tinyint unsigned not null,
comentarios varchar(200) default 'Sin Comentarios',
status tinyint(1) unsigned not null default 1,
cod_usr_reg int not null, 
fec_reg timestamp not null default current_timestamp,
cod_usr_mod int not null, 
fec_mod timestamp not null default current_timestamp,
foreign key (cod_profesor)
	references profesor(codigo)
	on update cascade
	on delete restrict,
foreign key (cod_curso)
	references curso(codigo)
	on update cascade
	on delete restrict
);

/*considerar: horas administrativas, tiempo de servicio, año de ingreso,
sumplente, asignacion especial?, capacidad tecnica especializada?, otros.*/

INSERT INTO profesor
(cod_usr_reg, cod_usr_mod)
values (1, 1);