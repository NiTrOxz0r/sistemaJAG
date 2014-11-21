CREATE table estado (
	codigo tinyint(2) unsigned auto_increment primary key,
	descripcion varchar(100) not null,
	status tinyint(1) unsigned not null default 1,
	cod_usr_reg int not null,
	fec_reg timestamp not null default current_timestamp,
	cod_usr_mod int not null,
	fec_mod timestamp not null DEFAULT 0
);

INSERT INTO estado
	(codigo, descripcion, cod_usr_reg, cod_usr_mod, fec_mod)
	values
		(1, 'Distrito Capital'	, 1, 1, current_timestamp),
		(2, 'Anzoátegui'				, 1, 1, current_timestamp),
		(3, 'Amazonas'					, 1, 1, current_timestamp),
		(4, 'Apure'							, 1, 1, current_timestamp),
		(5, 'Aragua'						, 1, 1, current_timestamp),
		(6, 'Barinas'						, 1, 1, current_timestamp),
		(7, 'Bolívar'						, 1, 1, current_timestamp),
		(8, 'Carabobo'					, 1, 1, current_timestamp),
		(9, 'Cojedes'						, 1, 1, current_timestamp),
		(10, 'Delta Amacuro'		, 1, 1, current_timestamp),
		(11, 'Falcón'						, 1, 1, current_timestamp),
		(12, 'Guárico'					, 1, 1, current_timestamp),
		(13, 'Lara'							, 1, 1, current_timestamp),
		(14, 'Mérida'						, 1, 1, current_timestamp),
		(15, 'Miranda'					, 1, 1, current_timestamp),
		(16, 'Monagas'					, 1, 1, current_timestamp),
		(17, 'Nueva Esparta'		, 1, 1, current_timestamp),
		(18, 'Portuguesa'				, 1, 1, current_timestamp),
		(19, 'Sucre'						, 1, 1, current_timestamp),
		(20, 'Táchira'					, 1, 1, current_timestamp),
		(21, 'Trujillo'					, 1, 1, current_timestamp),
		(22, 'Yaracuy'					, 1, 1, current_timestamp),
		(23, 'Vargas'						, 1, 1, current_timestamp),
		(24, 'Zulia'						, 1, 1, current_timestamp);
