CREATE DATABASE Guarderia;
USE Guarderia;

CREATE TABLE Usuario(
    idUsuario int primary key AUTO_INCREMENT,
    nomUsuario varchar(155),
    apPUsuario varchar(155),
    apMUsuario varchar(155),
    fecNUsuario date,
    email varchar(155),
    pass varchar(155),
    direccion varchar(300),
    telefono varchar(12),
    rol int,
    imgUsuario varchar(255),
    activo boolean DEFAULT FALSE
);

CREATE TABLE Grupo(
    idGrupo char(2) primary key,
    idMaestro int,
    salon char(2),

    FOREIGN KEY (idMaestro) REFERENCES Usuario (idUsuario)
);

CREATE TABLE Niño(
    idNiño int primary key AUTO_INCREMENT,
    nomNiño varchar(155),
    apPNiño varchar(155),
    apMNiño varchar(155),
    fecNNiño date,
    grupofk char(2),
    imgNiño varchar(255),
    activo boolean DEFAULT FALSE,

    FOREIGN KEY (grupofk) REFERENCES Grupo (idGrupo)
);

CREATE TABLE TutAut_Niño(
    idTutor int,
    idNiñofk int,

    FOREIGN KEY (idTutor) REFERENCES Usuario(idUsuario),
    FOREIGN KEY (idNiñofk) REFERENCES Niño(idNiño)
);

CREATE TABLE Asistencia(
    idAsistencia int primary key AUTO_INCREMENT,
    idNiñofk int,
    idPR int,
    fecEntrada datetime,
    fecSalida datetime,
    idTutAut int,

    FOREIGN KEY (idPR) REFERENCES Usuario (idUsuario),
    FOREIGN KEY (idNiñofk) REFERENCES Niño (idNiño),
    FOREIGN KEY (idTutAut) REFERENCES Usuario (idUsuario)
);

CREATE TABLE Bitacora(
    idBitacora int primary key AUTO_INCREMENT,
    idNiñofk int,
    idMaestro int,
    comida varchar(255),
    durmio boolean,
    comportaminto int,
    reporte text,

    FOREIGN KEY (idMaestro) REFERENCES Usuario (idUsuario)
);

CREATE TABLE Consulta(
    idConsulta int primary key AUTO_INCREMENT,
    idNiñofk int,
    idPediatra int,
    descrip text,
    fecConculta date,

    FOREIGN KEY (idNiñofk) REFERENCES Niño (idNiño),
    FOREIGN KEY (idPediatra) REFERENCES Usuario (idUsuario)
);

CREATE TABLE Pagos(
    idPago int primary key AUTO_INCREMENT,
    idTutor int,
    fecPago datetime,

    FOREIGN KEY (idTutor) REFERENCES Usuario (idUsuario)
);

-- INGRESAR AL ADMIN Y A LOS DEMAS USUARIOS
INSERT INTO Usuario ( nomUsuario, apPUsuario, apMUsuario, fecNUsuario, email, pass, direccion, telefono, rol, activo) VALUES 
('Naer Edham Meyito', 'HdzReaMedrano', 'SalazarLomasDelaCruz', '1997-08-22', 'yocho@guarderia.com', '$2y$10$PZ6U7BxexFCg..YgGdrKTuq5AQgEvTyJtRVtteIj2MJrgklZljafC', 'calle de la desgracia', '8717331111', '1', '1'),
('Javier', 'Hernandez', 'De La Cruz', '1999-07-28', 'hector.naer@gmail.com', '$2y$10$PZ6U7BxexFCg..YgGdrKTuq5AQgEvTyJtRVtteIj2MJrgklZljafC', 'calle F in the chat', '8711084343', '3', '1'), 
('Georgina', 'Lam', 'Rivera', '1973-03-19', 'georgina@gmail.com', '$2y$10$PZ6U7BxexFCg..YgGdrKTuq5AQgEvTyJtRVtteIj2MJrgklZljafC', 'calle nazas ', '8713571598', '3', '1'), 
('Jorge', 'Rea', 'Salazar', '1998-04-19', 'jorge.lrs497@gmail.com', '$2y$10$PZ6U7BxexFCg..YgGdrKTuq5AQgEvTyJtRVtteIj2MJrgklZljafC', 'calle bastardo', '8713577894', '2', '1'), 
('Mario', 'Medrano', 'Lomas', '1998-04-04', 'mario@gmail.com', '$2y$10$PZ6U7BxexFCg..YgGdrKTuq5AQgEvTyJtRVtteIj2MJrgklZljafC', 'calle hasta el quinto infierno', '8717894562', '4', '1'), 
('Alejandro', 'Rios', 'Garcia', '1999-12-12', 'rios@gmail.com', '$2y$10$PZ6U7BxexFCg..YgGdrKTuq5AQgEvTyJtRVtteIj2MJrgklZljafC', 'calle murision', '8713216547', '5', '1'), 
('Carla', 'Pereyra', 'Lam', '1999-10-04', 'carlagpl@hotmail.com', '$2y$10$PZ6U7BxexFCg..YgGdrKTuq5AQgEvTyJtRVtteIj2MJrgklZljafC', 'calle equis', '8711315592', '5', '1');
-- INSERTAR AUTORIZADOS
INSERT INTO Usuario ( nomUsuario, apPUsuario, apMUsuario, fecNUsuario, direccion, telefono, rol, activo) VALUES 
('Yessica Berenice', 'Guzman', 'Ortega', '2000-08-10', 'privada por la cruz roja', '8717435678', '6', '1'), 
('Jesus', 'Castruita', 'Vazquez', '1997-09-26', 'en nueva california', '8714894500', '6', '1'), 
('Melissa', 'Orozco', 'Chavarria', '2000-10-28', 'hasta la fregada', '8716902476', '6', '1'), 
('Julio', 'Mendez', 'Lira', '1999-12-12', 'por boulevard laguna sur', '8717321112', '6', '1');

-- INSERTANDO NIÑOS
INSERT INTO Niño (nomNiño, apPNiño, apMNiño, fecNNiño, activo) VALUES 
('Ivanna Isabelle', 'Hernandez', 'Pereyra', '2024-05-25', '1'), 
('Jorge Javier', 'Hernandez', 'Pereyra', '2026-09-22','1');

-- ASIGNANDO A UN MAESTRO EL GRUPO
INSERT INTO Grupo VALUES ('M1', '2', 'A1'), ('M2', '3', 'A2');

-- ASOCIANDO A NIÑOS CON TUTORES Y AUTORIZADOS
INSERT INTO TutAut_Niño (idTutor, idNiñofk) VALUES
('7', '1'), ('8', '1'), ('11', '1'), ('6', '2'), ('9', '2'), ('10', '2');