CREATE TABLE obtiene (
	codigo int unsigned auto_increment primary key,
	cod_p_a int unsigned not null,
	cod_alu int unsigned not null,
	status tinyint(1) unsigned not null default 1,
	cod_usr_reg int not null,
	fec_reg timestamp not null default current_timestamp,
	cod_usr_mod int not null,
	fec_mod timestamp not null DEFAULT 0,
	foreign key (cod_alu)
		references alumno(codigo)
		on update cascade
		on delete restrict,
	foreign key (cod_p_a)
		references personal_autorizado(codigo)
		on update cascade
		on delete restrict
);

INSERT INTO obtiene
values
	(1,1,1,1, 1, null,1,current_timestamp),
	(2,2,1,1, 1, null,1,current_timestamp),
	(3,3,1,1, 1, null,1,current_timestamp),
	(4,1,2,1, 1, null,1,current_timestamp),
	(5,2,2,1, 1, null,1,current_timestamp),
	(6,3,2,1, 1, null,1,current_timestamp)
;
