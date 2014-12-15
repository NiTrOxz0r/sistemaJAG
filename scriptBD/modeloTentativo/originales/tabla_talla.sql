CREATE TABLE talla (
	codigo tinyint(1) unsigned auto_increment primary key,
	descripcion varchar(3) not null,
	status tinyint(1) unsigned not null default 1,
	cod_usr_reg int unsigned not null,
	fec_reg timestamp not null default current_timestamp,
	cod_usr_mod int unsigned not null,
	fec_mod timestamp not null DEFAULT 0
);

INSERT INTO talla
(descripcion, cod_usr_reg, cod_usr_mod, fec_mod)
values
('XS', 1, 1,current_timestamp),
('S', 1, 1,current_timestamp),
('M', 1, 1,current_timestamp),
('L', 1, 1,current_timestamp),
('XL', 1, 1,current_timestamp),
('XXL', 1, 1,current_timestamp)
;
