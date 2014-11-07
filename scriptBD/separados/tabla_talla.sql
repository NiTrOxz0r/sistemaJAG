CREATE TABLE talla (
codigo tinyint(1) unsigned auto_increment primary key, 
descripcion varchar(3) not null,
status tinyint(1) unsigned not null default 1, 
cod_usr_reg int not null, fec_reg timestamp not null default current_timestamp,
cod_usr_mod int not null, fec_mod timestamp not null default current_timestamp);

INSERT INTO talla
(descripcion, cod_usr_reg, cod_usr_mod)
values
('XS', 1, 1),
('S', 1, 1),
('M', 1, 1),
('L', 1, 1),
('XL', 1, 1),
('XXL', 1, 1);