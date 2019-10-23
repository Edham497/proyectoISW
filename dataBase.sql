CREATE DATABASE Guarderia;
USE Guarderia;

CREATE TABLE Tutor(
    idTutor int primary key AUTO_INCREMENT,
    nomTutor varchar(255),
    apPatTutor varchar(125),
    apMatTutor varchar(125),
    email varchar(125),
    nickName varchar(255),
    contra varchar(255),
    rolAdulto int,
    telefono varchar(13)
);

CREATE TABLE Niño(
    idNiño int primary key AUTO_INCREMENT,
    nomNiño varchar(255),
    apPatNiño varchar(255),
    apMatNiño varchar(255),
    asistencia bool 
);

CREATE TABLE Tutor_Niño(
    idTutorfk int,
    idNiñofk int,
    foreign key (idTutorfk) references Tutor(idTutor),
    foreign key (idNiñofk) references Niño (idNiño)
);

CREATE TABLE Maestro(
    idmaestro int primary key AUTO_INCREMENT,
    nommaestro varchar(255),
    apPatmaestro varchar(255),
    apMatmaestro varchar(255)
);

CREATE TABLE maestro_Niño(
    idmaestrofk int,
    idNiñofk int,
    fechaEntrada datetime,
    fechaSalida datetime,
    foreign key (idmaestrofk) references Maestro(idmaestro),
    foreign key (idNiñofk) references Niño (idNiño)
);

CREATE TABLE Bitacora(
    idBitacora int primary key AUTO_INCREMENT,
    idmaestrofk int,
    idNiñofk int,
    comer int,
    comportamiento text,
    foreign key (idmaestrofk) references Maestro(idmaestro),
    foreign key (idNiñofk) references Niño (idNiño)
);

CREATE TABLE Pediatra(
    idPediatra int primary key AUTO_INCREMENT,
    nomPediatra varchar(255),
    apPatPediatra varchar(255),
    apMatPediatra varchar(255)
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
insert into Tutores values
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