CREATE TABLE obtiene (
codigo int unsigned auto_increment primary key, 
cod_p_a int unsigned, cod_alu int unsigned,
status tinyint(1) unsigned not null default 1, 
cod_usr_reg int not null, fec_reg timestamp not null default current_timestamp,
cod_usr_mod int not null, fec_mod timestamp not null default current_timestamp,
foreign key (cod_alu)
	references alumno(codigo)
	on update cascade
	on delete restrict,
foreign key (cod_p_a)
	references personal_autorizado(codigo)
	on update cascade
	on delete restrict);