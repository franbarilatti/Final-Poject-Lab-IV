create database myjob;

use myjob;

#drop database myjob;

create table users(
	id int auto_increment primary key,
	email varchar(50) not null unique,
    password varchar(20) not null
);

select * from users;

create table careers(
	id int auto_increment primary key,
    descript varchar(200),
    actve bool
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
    userId int not null,
    careerId int not null,
    constraint fk_userId foreign key (userId) references users (id) on delete cascade, 
    constraint fk_careerId foreign key (careerId) references careers (id)
);

create table admins(
	id int not null auto_increment primary key,
    firstname varchar(50) not null,
    lastname varchar(50) not null,
	userId int not null,
    foreign key (userId) references users(id) on delete cascade
);

create table business(
	id int auto_increment primary key,
    businessName varchar(50) not null,
    employeQuantity int,
    businesInfo varchar (200),
    userId int not null,
    constraint fk_userId foreign key (userId) references users(id) on delete cascade
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
    foreign key (studentId) references students(studentId),
    foreign key	(businessId) references business(id),
    foreign key (jobPositionId) references jobPositions(id)
);

select * from students;

