CREATE DATABASE ferreteriatamayo;

USE ferreteriatamayo;

CREATE TABLE categorias (
  nombre varchar(40) NOT NULL UNIQUE,
   INDEX(nombre)
)engine=InnoDB default charset=utf8;

CREATE TABLE productos(
id_producto int PRIMARY KEY AUTO_INCREMENT,
pertenece_categoria varchar(40) not null,
nombre_producto varchar(50) not null,
marca varchar(35) not null,
medida varchar(10) not null,
precio float not null,
estado boolean default 0,
logo mediumblob null,
foreign key (pertenece_categoria) references categorias(nombre) ON UPDATE CASCADE ON DELETE CASCADE
)engine=InnoDB default charset=utf8;

CREATE TABLE usuarios (
id_usuario smallint PRIMARY KEY AUTO_INCREMENT,
nombre_u varchar(40) not null UNIQUE,
clave varchar (40) not null UNIQUE,
permisos tinyint not null default 0,
estado boolean not null default 0
)engine=InnoDB default charset=utf8;