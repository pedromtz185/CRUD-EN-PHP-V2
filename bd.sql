CREATE DATABASE crudv2;
 USE crudv2;
 CREATE TABLE productos (
 id int not null PRIMARY KEY AUTO_INCREMENT,
 nombre varchar (255), descripcion varchar (255),
 precio int,
 cantidad int )
