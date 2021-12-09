create database web18100157;

use web18100157;

create table Usuario(
id_Usuario int identity (1, 1) not null ,
Nombre_Director varchar(20), 
contraseña varchar (6), 
primary key(id_Usuario));

create table Curso (
id_Curso int identity (1, 1) not null,
Nombre_Docente varchar(10),
Apellido varchar (40),
Nombre_Curso varchar (20),
Costo int,
Correo varchar (50),
Categoria varchar (20),
Requisitos varchar (100),
Descripcion varchar (250),
primary key(id_Curso));

insert into Usuario(Nombre_Director, Contraseña) values
('Rogelio','Rog150'),('Martha','M4rt4');


insert into Curso 
(Nombre_Docente, Apellido, Nombre_Curso, Costo, Correo, Categoria, Requisitos, Descripcion) values
('Juan','Rodriguez','HTML Junior',250,'JuanRodri@gmail.com','Programacion Web','Tener un manejador de texto', 'En este curso aprenderás lo basico del lenguaje de etiquetas de hipertexto (HTML) para entrar al mundo de la programación web'),
('Oracio','Perez','Guitarra 1',300,'Oracles@hotmail.com','Musica','Tener una Guitarra','Hola, soy Oracio y en mi curso de guitarra te enseñare lo basico para que logres enamorarte de este instrumento'),
('Maria','Gutierrez','Aprendiendo C#',500,'Maria_Correo@outlook.com','Programacion','Conocimientos Basicos en programacion y el IDE Visual Studio', 'Hola en este curso te enseñare todo lo que necesitas para convertirte en experto en el lenguaje C#');







