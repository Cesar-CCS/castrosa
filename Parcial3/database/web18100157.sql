create database web18100157

use web18100157;

create table Usuario(
Nombre_Director varchar(20), 
contraseña varchar (6), 
primary key(Nombre_Director));

create table Curso (
Nombre_Usuario varchar(20),
Nombre_Docente varchar(10),
Apellido varchar (20),
Nombre_Curso varchar (20),
Costo_Curso int (4),
Correo varchar (50),
Categoria varchar (20),
Requisitos varchar (100),
Descripcion varchar (250),
foreign key(Nombre_Usuario) references Usuario (Nombre_Director));

insert into Usuario(Nombre_Director, Contraseña) values
("Rogelio","Rog150"),("Martha","M4rt4");

insert into Curso 
(Nombre_Usuario, Nombre_Docente, Apellido, Nombre_Curso, Costo_Curso, Correo, Categoria, Requisitos, Descripcion) values
("Rogelio","Juan","Rodriguez","HTML Junior",250,"JuanRodri@gmail.com","Programacion Web","Tener un manejador de texto", "En este curso aprenderás lo basico del lenguaje de etiquetas de hipertexto (HTML) para entrar al mundo de la programación web"),
("Martha","Oracio","Perez","Guitarra 1",300,"Oracles@hotmail.com","Musica","Tener una Guitarra","Hola, soy Oracio y en mi curso de guitarra te enseñare lo basico para que logres enamorarte de este instrumento"),
("Rogelio","Maria","Gutierrez","Aprendiendo C#",500,"Maria_Correo@outlook.com","Programacion","Conocimientos Basicos en programacion y el IDE Visual Studio", "Hola en este curso te enseñare todo lo que necesitas para convertirte en experto en el lenguaje C#");







