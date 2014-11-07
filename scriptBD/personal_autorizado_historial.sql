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
/*esta tabla es necesaria*/
/*esta tabla es utilizada en el modulo como solucion:*/

CREATE TABLE personal_autorizado_historial (
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
cod_usr_mod int not null, fec_mod timestamp not null default current_timestamp
);