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
	userId int not null,
    businessId int not null,
    jobOfferId int not null,
    active bool not null,
    foreign key	(businessId) references business(businessId),
    foreign key (userId) references users(id),
    foreign key (jobOfferId) references joboffer(jobOfferId) on delete cascade
);

alter table business add adress varchar(100) after businessInfo;
alter table business add active bool after adress;

alter table postulation add constraint fk_jobofferid_cascade foreign key (jobofferid) references joboffer(jobofferid) on delete cascade;

#drop table postulation;



select * from users;

select * from admins;


insert into users values (default,"barilattiguidoa@hotmail.com","GabO9821","admin");


INSERT INTO `myjob`.`users` (`id`, `email`, `password`, `role`) VALUES ('1', 'guido@admin.com', '12345', 'admin');
INSERT INTO `myjob`.`users` (`id`, `email`, `password`, `role`) VALUES ('2', 'franco@admin.com', '12345', 'admin');

INSERT INTO `myjob`.`admins` (`adminId`, `firstName`, `lastName`, `userId`) VALUES ('1', 'Guido', 'Barilatti', '1');
INSERT INTO `myjob`.`admins` (`adminId`, `firstName`, `lastName`, `userId`) VALUES ('2', 'Franco', 'Barilatti', '2');

INSERT INTO `myjob`.`users` (`id`, `email`, `password`, `role`) VALUES ('3', 'info@accenture.com', 'Globant', 'company');
INSERT INTO `myjob`.`users` (`id`, `email`, `password`, `role`) VALUES ('4', 'info@globant', 'Accenture', 'company');

INSERT INTO `myjob`.`business` (`businessId`, `businessName`, `employesQuantity`, `businessInfo`, `userId`) VALUES ('1', 'Accenture', '5000', 'Empresa lider en desarrollo de software', '3');
INSERT INTO `myjob`.`business` (`businessId`, `businessName`, `employesQuantity`, `businessInfo`, `userId`) VALUES ('2', 'Globant', '5001', 'Unicornio argentino en desarrollo ', '4');

select * from joboffer;

select * from users;

select * from postulation;

select * from business;

select * from users;


select userid from 
postulation p join joboffer j
on p.postulationid = j.jobofferid;