create database myjob;

use myjob;

create table users(
	email varchar(50) primary key unique,
    password varchar(20)
);

create table careers(
	id int auto_increment primary key,
    descript varchar(200),
    act bool
);

create table students(
	studentId int auto_increment primary key,
	firstname varchar(30),
    lastname varchar(30),
    dni int not null,
    filenumber int(30),
    gender char,
    birthdate date,
    phoneNumber varchar(30),
    actve bool not null,
    email varchar(50) not null,
    careerId int not null,
    constraint fk_email foreign key (email) references users (email) on delete cascade, 
    constraint fk_careerId foreign key (careerId) references careers (id)
);

create table business(
	id int auto_increment primary key,
    businessName varchar(50),
    employeQuantity int,
    businesInfo varchar (200),
    email varchar(50),
    foreign key (email) references users(email) on delete cascade
);

create table jobPositions(
	id int auto_increment primary key,
    title varchar(50),
    descript varchar(200),
    actve bool not null,
    businessId int not null,
    foreign key (businessId) references business(id) on delete cascade 
);

create table postulation(
	id int auto_increment primary key,
    actve bool not null,
	studentId int not null,
    businessId int not null,
    jobPositionId int not null,
    foreign key (studentId) references students(id),
    foreign key	(businessId) references businesss(id),
    foreign key (jobPositionId) references jobPositions(id)
);



