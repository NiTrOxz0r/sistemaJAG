CREATE TABLE personal_autorizado (
codigo int unsigned auto_increment primary key,
apellidos varchar(40) not null, nombres varchar(40) not null,
cedula varchar(8) unique not null,
telefono varchar(11) default 'SinRegistro',
email varchar(50) default 'Sin Registro',
lugar_nac varchar(50) default 'Sin Registro',
fec_nac date, relacion tinyint unsigned not null,
vive_con_alumno enum('s','n') not null,
cod_direccion int unsigned,
nivel_instruccion tinyint(1) unsigned not null, 
profesion varchar(40) default 'Sin Registro',
telefono_trabajo varchar(11) default 'SinRegistro',
direccion_trabajo varchar(150) default 'Sin registro',
lugar_trabajo varchar(50) default 'Sin registro',
status tinyint(1) unsigned not null default 1,
cod_usr_reg int not null, fec_reg timestamp not null default current_timestamp,
cod_usr_mod int not null, fec_mod timestamp not null default current_timestamp,
foreign key (relacion)
	references relacion(codigo)
	on update cascade
	on delete restrict,
foreign key (nivel_instruccion)
	references nivel_instruccion(codigo)
	on update cascade
	on delete restrict,
foreign key (cod_direccion)
	references direccion_p_a(codigo)
	on update cascade
	on delete restrict
);

INSERT INTO personal_autorizado
(codigo, apellidos, nombres, cedula, telefono, lugar_nac, fec_nac, 
relacion, vive_con_alumno, direccion, nivel_instruccion, profesion,
telefono_trabajo, direccion_trabajo, lugar_trabajo, cod_usr_reg, cod_usr_mod)
values
(1, 'Gomez Sanches', 'Pepe Luis', '12312312', '02122223322', 'Caracas querida',
'1945-06-04', 2, 's', 'la direccion blabla', 4, 'Hace algo por la vida', 
'02126665566', 'la direccion de trabajo',
'ministero del poder popular para algo', 1, 1),
(2, 'Gomez Sanches', 'Pepeta Luisa', '12312311', '02122223322', 'Caracas querida',
'1975-07-18', 1, 's', 'la direccion blabla', 4, 'profesion algo algo', 
null, null, null, 1, 1),
(3, 'Gomez Sanches', 'Carmen algo', '11312311', '02122223311', 'Zulia, algo',
'1935-01-11', 4, 'n', null, 3, null, null, null, null, 1, 1),
(4, 'Val Hellsing Scheissen', 'Rassismus', '99123456', '02127788888', 'En algun lugar',
'1953-11-15', 2, 'n', null, 4, null, null, null, null, 1, 1),
(5, 'Martinez Lopez', 'Lucia Algo', '9123456', '02127788548', 'En algun lugar',
'1967-11-15', 3, 's', 'calle la fantasia', 2, null, null, null, null, 1, 1),
(6, 'Gomez Juarez', 'Andres Luis', '19123456', null, null,
'1973-11-15', 5, 's', null, 3, null, null, null, null, 1, 1);

/*problema: mantener historial de registros.

solucion 1: quitar el valor unique de los campos para
que la tabla permita valores repetidos.
problema: validacion en codigo, posible redundancia, no se.

solucion 2: hacer tabla de historial donde se copie
la informacion almacenada antes de actualizar.
problema: muchos registros, posible redundancia, no se.

solucion 3: no hacer nada.
problema: no es una solucion.
*/

/*esta tabla es utilizada en el modulo como solucion:*/
CREATE TABLE personal_autorizado_historial (
codigo int unsigned auto_increment primary key,
apellidos varchar(40) default 'Sin registro',
nombres varchar(40) default 'Sin registro',
cedula varchar(8),
telefono varchar(11) default 'SinRegistro',
lugar_nac varchar(50) default 'Sin Registro',
fec_nac date, relacion tinyint unsigned,
vive_con_alumno enum('s','n'),
direccion varchar(150) default 'Sin Registro',
nivel_instruccion tinyint(1) unsigned, 
profesion varchar(40) default 'Sin Registro',
telefono_trabajo varchar(11) default 'SinRegistro',
direccion_trabajo varchar(150) default 'Sin registro',
lugar_trabajo varchar(50) default 'Sin registro',
status tinyint(1) unsigned not null default 1,
cod_usr_reg int not null, fec_reg timestamp not null default current_timestamp,
cod_usr_mod int not null, fec_mod timestamp not null default current_timestamp
);