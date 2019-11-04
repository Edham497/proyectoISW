CREATE DATABASE Guarderia;
USE Guarderia;

CREATE TABLE Adulto(
    idAdulto int primary key AUTO_INCREMENT,
    nomAdulto varchar(255),
    apPatAdulto varchar(125),
    apMatAdulto varchar(125),
    email varchar(125),
    nickName varchar(255),
    contra varchar(255),
    rolAdulto int,
    telefono varchar(13),
    imgAdulto varchar(255) DEFAULT NULL
);

CREATE TABLE Niño(
    idNiño int primary key AUTO_INCREMENT,
    nomNiño varchar(255),
    apPatNiño varchar(255),
    apMatNiño varchar(255),
    asistencia bool
);

CREATE TABLE Adulto_Niño(
    idAdultofk int,
    idNiñofk int,
    foreign key (idAdultofk) references Adulto(idAdulto),
    foreign key (idNiñofk) references Niño (idNiño) 
);

CREATE TABLE Maestro(
    idMaestro int primary key AUTO_INCREMENT,
    nomMaestro varchar(255),
    apPatMaestro varchar(255),
    apMatMaestro varchar(255),
    imgMaestro varchar(255)
);

CREATE TABLE Maestro_Niño(
    idMaestrofk int,
    idNiñofk int,
    fechaEntrada datetime,
    fechaSalida datetime DEFAULT NULL,
    foreign key (idMaestrofk) references Maestro(idMaestro),
    foreign key (idNiñofk) references Niño (idNiño)
);

CREATE TABLE Bitacora(
    idBitacora int primary key AUTO_INCREMENT,
    idMaestrofk int,
    idNiñofk int,
    comer int,
    comportamiento text,
    foreign key (idMaestrofk) references Maestro(idMaestro),
    foreign key (idNiñofk) references Niño (idNiño)
);

CREATE TABLE Pediatra(
    idPediatra int primary key AUTO_INCREMENT,
    nomPediatra varchar(255),
    apPatPediatra varchar(255),
    apMatPediatra varchar(255),
    imgPediatra varchar(255) DEFAULT NULL
);

CREATE TABLE Pediatra_Niño(
	idPediatrafk int,
    idNiñofk int,
    fechaVisita datetime,
    foreign key (idPediatrafk) references Pediatra(idPediatra),
    foreign key (idNiñofk) references Niño (idNiño),
    reporte text
);

/*nombre, apPat, apMat, asistencia*/
insert into Niño values
(1,'Mario','Medrano','Lomas',true),
(2,'Jorge','Rea','Salazar',false),
(3,'Hector','Hernandez','De La Cruz',true),
(4,'Marco','Solis','Facio',false);

/*id, nombre, apPat, apMat,  email, nickname, contraseña, ¡¿rolAdulto?!, telefono*/
insert into Adulto values
(1,'Alberto','Medrano','Leon','medranolayon@hotmail.com','Alecbertho34','123456',2,'871111111'),
(2,'Javier','Rosame','Lanastacio','elHector_C_la_kome@Gmail.com','pussyeater69','696969',2,'871puñeton');

/*id, nombre, apPat, apMat*/
insert into Maestro values
(1,'Frank','Black','Francis');

/*id, nombre, apPat, apMat*/
insert into Pediatra values
(1, 'Franku','Papu','Joji');


/*Faltan las tablas RELACION porque #queWEBA .-ATTE: Mario Medrano ;V*/

select * from Niño;
select * from Niño where asistencia = true;
select * from Niño where asistencia = false;
-- Bitacora del maestro Frank con el niño Hector
select * from Maestro join Bitacora on idMaestro = idMaestrofk 
join Niño on idNiño = idNiñofk where idMaestro = 1 and idNiño = 3;
-- Recibir a los niños
insert into Maestro_Niño values(1,3,'2013-11-24 08:15:10',null);
-- Salida de los niños
update Maestro_Niño set fechaSalida = '2013-11-24 13:45:05' where idNiñofk = 3;
-- Obtener diferencias entre hora de llegada y salida
SELECT *,TIMESTAMPDIFF(HOUR,fechaEntrada,fechaSalida) FROM Maestro_Niño
-- Sacar asistencias por tiempo
UPDATE Niño SET asistencia = true WHERE idNiño IN 
(SELECT idNiñofk FROM Maestro_Niño WHERE TIMESTAMPDIFF(HOUR,fechaEntrada,fechaSalida) >= 4)
-- Expendientes de los niños
SELECT nomPediatra,nomNiño,apPatNiño,apMatNiño,reporte FROM Pediatra_Niño 
JOIN Niño on idNiño = idNiñofk JOIN Pediatra ON idPediatra = idPediatrafk WHERE idNiñofk = 3