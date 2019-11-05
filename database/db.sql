DROP SCHEMA IF EXISTS guarderia;
create database guarderia;

use guarderia;
create table usuarios(
    id int not null auto_increment primary key,
    usrname varchar(50) not null,
    rol int not null,
    pass varchar(64) not null
);

insert into usuarios (usrname, rol, pass) values ('edham', 1, '1234');
insert into usuarios (usrname, rol, pass) values ('edham2', 2, '1234');
insert into usuarios (usrname, rol, pass) values ('edham3', 3, '1234');
insert into usuarios (usrname, rol, pass) values ('edham4', 4, '1234');
select * from usuarios;