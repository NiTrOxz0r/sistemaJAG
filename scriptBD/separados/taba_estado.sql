CREATE table estado (
	codigo tinyint(2) unsigned auto_increment primary key,
	descripcion varchar(100) not null,
	status tinyint(1) unsigned not null default 1, 
	cod_usr_reg int not null, 
	fec_reg timestamp not null default current_timestamp,
	cod_usr_mod int not null, 
	fec_mod timestamp not null default current_timestamp
);

INSERT INTO estado 
	(codigo, descripcion, cod_usr_reg, cod_usr_mod)
	values 
		(1, 'Distrito Capital'	, 1, 1),
		(2, 'Anzoategui'				, 1, 1),
		(3, 'Amazonas'					, 1, 1),
		(4, 'Apure'							, 1, 1),
		(5, 'Aragua'						, 1, 1),
		(6, 'Barinas'						, 1, 1),
		(7, 'Bolivar'						, 1, 1),
		(8, 'Carabobo'					, 1, 1),
		(9, 'Cojedes'						, 1, 1),
		(10, 'Delta Amacuro'		, 1, 1),
		(11, 'Falcon'						, 1, 1),
		(12, 'Guarico'					, 1, 1),
		(13, 'Lara'							, 1, 1),
		(14, 'Merida'						, 1, 1),
		(15, 'Miranda'					, 1, 1),
		(16, 'Monagas'					, 1, 1),
		(17, 'Nueva Esparta'		, 1, 1),
		(18, 'Portuguesa'				, 1, 1),
		(19, 'Sucre'						, 1, 1),
		(20, 'Tachira'					, 1, 1),
		(21, 'Trujillo'					, 1, 1),
		(22, 'Yaracuy'					, 1, 1),
		(23, 'Vargas'						, 1, 1),
		(24, 'Zulia'						, 1, 1);