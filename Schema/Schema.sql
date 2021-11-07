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
    businessInfo varchar (1000),
    userId int not null,
    foreign key(userId) references users(id)
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

select * from business;

select * from users;

select * from admins;

alter table jobPositions change businessId careerId int not null;

alter table jobPositions add constraint fk_careerId foreign key(careerId) references careers (careerId);

insert into users values (default,"barilattiguidoa@hotmail.com","GabO9821","admin");

select * from business;
select * from users;
drop table postulation;
select * from students;
select * from joboffer;
select * from postulation;

delete from joboffer where jobOfferId = 2;

alter table business add adress varchar(100) after businessInfo;
alter table business add active bool after adress;