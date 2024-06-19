CREATE DATABASE CLINICA;
USE CLINICA;
CREATE TABLE ALTAS(
ID MEDIUMINT AUTO_INCREMENT,
CLAVE CHAR(255),
NOMBRE CHAR(255),
EDAD INT(11),
SEXO CHAR(255),
DIRECCION CHAR(255),
ESTUDIO CHAR(255),
FECHA CHAR(255),
HORA CHAR(255),
PRIMARY KEY(ID)

);

CREATE TABLE USUARIOS(
ID MEDIUMINT AUTO_INCREMENT,
NOMBRE CHAR(255),
CONTRASENA CHAR(255),
SECTOR CHAR(255),
PRIMARY KEY(ID)
);
CREATE TABLE PRECIOS(
ID MEDIUMINT AUTO_INCREMENT,
ESTUDIO CHAR(255),
PRECIO FLOAT(11),
PRIMARY KEY(ID)
);

CREATE TABLE TICKET(
ID MEDIUMINT AUTO_INCREMENT,
CLAVE CHAR(255),
MONTO CHAR(255),
CONCEPTO CHAR(255),
PRIMARY KEY(ID)
);

CREATE TABLE GANANCIAS(
ID MEDIUMINT AUTO_INCREMENT,
GANANCIAS FLOAT(11),
PRIMARY KEY(ID)
);

CREATE TABLE IMPRIMIR(
ID MEDIUMINT AUTO_INCREMENT,
CLAVE CHAR(255),
ESTUDIO CHAR(255),
TEXTO LONGTEXT,
PRIMARY KEY(ID)
);




/*Formato de estudio*/
CREATE TABLE FESTUDIO(
id MEDIUMINT AUTO_INCREMENT,
ESTUDIO CHAR(255),
PREGUNTA CHAR(255),
PRIMARY KEY(id)
);

/*
id
clave
pregunta
respuesta
*/

CREATE TABLE RESTUDIO(
id MEDIUMINT AUTO_INCREMENT,
CLAVE CHAR(255),
PREGUNTA CHAR(255),
RESPUESTA CHAR(255),
PRIMARY KEY(id)
);


INSERT INTO GANANCIAS VALUES('0','0');
INSERT INTO USUARIOS VALUES('1','Emmanuel','123','Administrador');
