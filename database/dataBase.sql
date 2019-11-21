DROP SCHEMA IF EXISTS guarderia;
CREATE DATABASE Guarderia;
USE Guarderia;

CREATE TABLE Adulto(
    idAdulto int primary key AUTO_INCREMENT,
    nomAdulto varchar(255),
    apPatAdulto varchar(125),
    apMatAdulto varchar(125),
    email varchar(125) UNIQUE,
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
    grado varchar(255),
    fecNacimiento date,
    direccion text,
    asistencia bool DEFAULT FALSE,
    imgNiño varchar(255)
);

CREATE TABLE Tutor_Niño(
    idAdultofk int,
    idNiñofk int,
    foreign key (idAdultofk) references Adulto(idAdulto),
    foreign key (idNiñofk) references Niño (idNiño) 
);

CREATE TABLE Maestro_Niño(
    idMaestrofk int,
    idNiñofk int,
    fechaEntrada datetime,
    fechaSalida datetime DEFAULT NULL,
    idAdultoSalidafk int,
    foreign key (idMaestrofk) references Adulto(idAdulto),
    foreign key (idNiñofk) references Niño (idNiño),
    foreign key (idAdultoSalidafk) references Adulto (idAdulto)
);

CREATE TABLE Bitacora(
    idBitacora int primary key AUTO_INCREMENT,
    idAdultofk int,
    idNiñofk int,
    comida varchar(255),
    anotaciones text,
    foreign key (idAdultofk) references Adulto(idAdulto),
    foreign key (idNiñofk) references Niño (idNiño)
);

CREATE TABLE Pediatra_Niño(
	idAdultofk int,
    idNiñofk int,
    fechaVisita datetime,
    foreign key (idAdultofk) references Adulto(idAdulto),
    foreign key (idNiñofk) references Niño (idNiño),
    reporte text
);

/*id, nombre, apPat, apMat,  email, nickname, contraseña-Naer2807, ¡¿rolAdulto?!, telefono*/
insert into Adulto (nomAdulto,apPatAdulto,apMatAdulto,email,contra,rolAdulto,telefono)values
('Naer','Hernandez','de la Cruz','hector.naer@gmail.com','$2y$10$x3gwJpJbotHSt1i6kRcMQ.AbXLWnCo82Z7SM6hwCd.RwNI1OvGRZK',1,'871111111')
/*id, nombre, apPat, apMat*/

/*id, nombre, apPat, apMat*/
/*Relacion niño con adulto*/
INSERT INTO Adulto_Niño (idAdultofk, idNiñofk) VALUES (4, 3),(5,1);
/*Insertar bitacora*/
INSERT INTO Bitacora (idAdultofk, idNiñofk, comida, anotaciones) 
VALUES (2, 1, 1,'El niño se porto bien, comio perfectamente, trabajos completos, excelente'),
(2, 2, 1,'El niño se porto bien, comio perfectamente, trabajos completos, excelente');

select * from Niño;
select * from Niño where asistencia = true;
select * from Niño where asistencia = false;
-- Bitacora del maestro Frank con el niño Hector
select nomAdulto,nomNiño,comportamiento from Adulto join Bitacora on idAdulto = idAdultofk and rolAdulto = 2
join Niño on idNiño = idNiñofk where idNiño = 3;
-- Recibir a los niños
insert into Maestro_Niño (idMaestrofk,idNiñofk,fechaEntrada) values(1,3,'2013-11-24 08:15:10');
-- Salida de los niños
update Maestro_Niño set fechaSalida = '2013-11-24 13:45:05', idAdultoSalidafk = 4 where idNiñofk = 3;
-- Obtener diferencias entre hora de llegada y salida
SELECT *,TIMESTAMPDIFF(HOUR,fechaEntrada,fechaSalida) FROM Maestro_Niño
-- Sacar asistencias por tiempo
UPDATE Niño SET asistencia = true WHERE idNiño IN 
(SELECT idNiñofk FROM Maestro_Niño WHERE TIMESTAMPDIFF(HOUR,fechaEntrada,fechaSalida) >= 4)
-- Expendientes de los niño
SELECT nomPediatra,nomNiño,apPatNiño,apMatNiño,reporte FROM Pediatra_Niño 
JOIN Niño on idNiño = idNiñofk JOIN Adulto ON idAdulto = idAdultofk and rolAdulto = 3 WHERE idNiñofk = 3