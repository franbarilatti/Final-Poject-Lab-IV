create database myjob;

use myjob;

drop database myjob;

#drop table users;

#select * from students;

create table users(
	id int auto_increment primary key,
    email varchar(50) not null unique,
    password varchar(16) not null,
    role varchar(10) not null
);

create table careers(
	careerId int auto_increment primary key,
    nombre varchar(30) not null unique,
    description varchar(200),
    active bool
);

create table students(
	studentId int auto_increment primary key,
    userId int,
    careerId int not null,
	firstName varchar(30) not null,
    lastName varchar(30) not null,
    dni int not null unique,
    fileNumber int(30) not null unique,
    gender char not null,
    birthDate date not null,
    email varchar(50) not null unique,
    phoneNumber varchar(30) not null unique,
    active bool not null,
    constraint fk_userId foreign key (userId) references users (id),
    constraint fk_careerId foreign key (careerId) references careers (careerId)
);

create table admins(
	adminId int not null auto_increment primary key,
    firstName varchar(50) not null,
    lastName varchar(50) not null,
    userId int not null,
    foreign key (userId) references users (id)
);

create table business(
	businessId int auto_increment primary key,
    businessName varchar(50) not null,
    employesQuantity int not null,
    businessInfo varchar (1000)
);



create table jobPositions(
	jobPositionId int auto_increment primary key,
    careerId int not null,
    description  varchar(200) not null,
    active bool not null,
    foreign key (careerId) references careers (careerId)
);

create table jobOffer(
	jobOfferId int auto_increment primary key,
	title varchar(50),
	description varchar(500),
	postingDate date,
	expiryDate date,
    businessId int not null,
    careerId int not null,
    jobPositionId int not null,
	foreign key (businessId) references business (businessId)
);

create table postulation(
	postulationId int auto_increment primary key,
	studentId int not null,
    businessId int not null,
    jobOfferId int not null,
    active bool not null,
    foreign key	(businessId) references business(businessId)
);



drop table postulation;

select * from postulation;

select * from users;

select * from admins;

alter table jobPositions change businessId careerId int not null;

alter table jobPositions add constraint fk_careerId foreign key(careerId) references careers (careerId);


insert into careers values 
(default,"Ingeniería Naval","Es la rama de la ingeniería que se ocupa del diseño, planificación, proyecto y construcción de todo material flotante, como pueden ser buques, plataformas petrolíferas e incluso campos eólicos lejos de la costa.

La Ingeniería Naval abarca las funciones de ingeniería incluyendo el proyecto creativo del buque y artefactos flotantes, la investigación aplicada, el desarrollo técnico en los campos de diseño y construcción y la administración de los centros de producción de material flotante (astilleros), así como también del mantenimiento y reparación de estos.",1),
(default,"Ingeniería Pesquera","Es la rama de la ingeniería que se dedica al estudio e investigación del conjunto de actividades vinculadas a la extracción, conservación, transformación, empacado, distribución, utilización, comercialización y cultivo de especies hidrobiológicas de recursos hidrobiológicos, sean de agua dulce o marina.

Se trata de una carrera totalmente abocada a la problemática alimentaria de las aguas marinas.

Si estás evaluando estudiar esta disciplina tendrás muchas posibilidades de trabajo, porque las empresas requieren de especialistas, pero no hay muchos técnicos ni ingenieros pesqueros.",1),
(default,"Técnico Superior en Interiorismo","La tecnicatura en interiorismo está orientada a la formación de profesionales capaces de Identificar los distintos tipos de problemáticas, factores de intervención y las pertinentes formas de solución técnicas/estéticas y conocer los diferentes aspectos disciplinarios que intervienen para poder formular un proyecto adecuado. Planificar y materializar proyectos de diseño interior.",1),
(default,"Técnico Universitario en Programación","Capacitar, para trabajar en toda empresa o dependencia que aplique el sistema de procesamiento de datos. Realizar programas y aplicarlos.",1);

insert into careers values 
(default,"Técnico Universitario en Sistemas Informáticos","El vertiginoso avance tecnológico ha generado nuevas necesidades laborales y ha abierto el campo a actividades especificas que requieren diferentes niveles de capacitación.

Es una realidad que los egresados del nivel polimodal tienen dificultades para insertarse laboralmente, pues desde las funciones especificas del «Mercado Laboral» hay tareas que requieren un grado de capacitación mínima.

Las carreras cortas, en este contexto, se presentan como una alternativa valida frente a las demandas sociales, ya que ellas cubren el espacio existente entre el nivel medio, que no prepara laboralmente, y un titulo de grado.",1),
(default,"Técnico Universitario en Administración","La realidad económica y productiva actual propone nuevos roles a individuos y organizaciones en un contexto de globalidad que genera diversos y cambiantes mapas de lo socio- cultural y de lo socio-económico. Teniendo en cuenta el impacto de las nuevas tecnologías en el modo y distribución del trabajo, y la tendencia a la mayor demanda de capacitación en actividades intermedias de bienes y servicios con un criterio de uniformidad de estándares laborales. Es menester proporcionar herramientas que permitan abordar este proceso de transformación en las competencias laborales relacionadas con la empleabilidad y la movilidad en el mundo del trabajo.",1),
(default,"Técnico Universitario en Producción Textil","La carrera está orientada a la formación de Técnicos Superiores en Producción Textil con competencia, solvencia técnica y criterio comercial, acorde a las variantes del mercado y la realidad productiva, determinada por las particularidades locales y regionales que exigen un manejo estratégico de los recursos, para asegurar la sustentabilidad productiva.",1),
(default,"Técnico Universitario en Procedimientos y Tecnologías Ambientales","Los problemas ambientales por su diversidad, constituyen un fenómeno complejo, cuya dinámica y manejo requieren de esfuerzos coordinados por parte de distintos actores sociales. Las instituciones de educación superior tienen en este sentido un compromiso importante: formar profesionales que sean capaces de realizar acciones que contribuyan a conferirle sustentabilidad a la gestión del ambiente y evitar su deterioro, garantizando el cumplimiento de la legislación y normatividad ambiental dirigidas a la sostenibilidad del desarrollo.",1);

insert into users values (default,"barilattiguidoa@hotmail.com","GabO9821","admin");

select * from careers;
select * from users;
drop table postulation;
select * from students;
select * from joboffer;
select * from postulation;

delete from joboffer where jobOfferId = 2;