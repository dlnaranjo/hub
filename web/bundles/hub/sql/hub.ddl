create table Professional (
  `user`        varchar(50) not null, 
  idCategory    int(10) not null, 
  firstName     varchar(50) not null, 
  lastName      varchar(50) not null, 
  age           int(3) not null, 
  sex           tinyint(1) not null, 
  personalPhone varchar(15) not null, 
  workPhone     varchar(15), 
  otherPhone    varchar(15), 
  presentation  longtext not null, 
  experience    int(2) not null, 
  curriculum    longtext, 
  trial         tinyint(1) not null, 
  constraint id_professional 
    primary key (`user`));
create table Business (
  `user`       varchar(50) not null, 
  idCategory   int(10) not null, 
  name         varchar(50) not null, 
  address      varchar(50) not null, 
  phone1       varchar(15) not null, 
  phone2       varchar(15), 
  phone3       varchar(15), 
  presentation longtext not null, 
  trial        tinyint(1) not null, 
  primary key (`user`));
create table Profession (
  idProfession   int(10) AUTO_INCREMENT not null, 
  professionName varchar(100) not null, 
  description    varchar(255) not null, 
  primary key (idProfession));
create table ProductsAndServices (
  idPproductsandservices int(10) AUTO_INCREMENT not null, 
  `user`                 varchar(50) not null, 
  name                   varchar(50) not null, 
  price                  double not null, 
  description            varchar(255) not null, 
  primary key (idPproductsandservices));
create table Notification (
  idNotification int(10) AUTO_INCREMENT not null, 
  userEmitter    varchar(50) not null, 
  userReceiver   varchar(255) not null, 
  message        varchar(255) not null, 
  isRead         tinyint(1) not null, 
  primary key (idNotification));
create table BasicUser (
  `user`    varchar(50) not null, 
  firstName varchar(50) not null, 
  lastName  varchar(50) not null, 
  age       int(3) not null, 
  sex       tinyint(1) not null, 
  primary key (`user`));
create table Skills (
  idSkills int(10) AUTO_INCREMENT not null, 
  skill    varchar(255) not null, 
  `user`   varchar(50) not null, 
  primary key (idSkills));
create table Photo (
  idPhoto     int(10) AUTO_INCREMENT not null, 
  `user`      varchar(50) not null, 
  url         varchar(255) not null, 
  description varchar(50), 
  primary key (idPhoto));
create table `User` (
  `user`           varchar(50) not null, 
  password         varchar(50) not null, 
  country          varchar(50), 
  city             varchar(50), 
  email            varchar(50) not null unique, 
  website          varchar(50), 
  language         varchar(50) not null, 
  registrationDate date not null, 
  active           tinyint(1) not null, 
  salt             varchar(255) not null, 
  lastAccess       date not null, 
  perfilPhoto      varchar(255) not null, 
  primary key (`user`));
create table Administration (
  idAdministration    int(10) AUTO_INCREMENT not null, 
  trial               int(10) not null, 
  paymentPeriod       int(10) not null, 
  paymentBusiness     double not null, 
  paymentProfessional double not null, 
  primary key (idAdministration));
create table Category (
  idCategory   int(10) AUTO_INCREMENT not null, 
  categoryName varchar(255) not null, 
  primary key (idCategory));
create table Professional_Profession (
  `user`       varchar(50) not null, 
  idProfession int(10) not null, 
  primary key (`user`, 
  idProfession));
alter table Photo add index FKPhoto898845 (`user`), add constraint FKPhoto898845 foreign key (`user`) references Business (`user`);
alter table Business add index FKBusiness343247 (`user`), add constraint FKBusiness343247 foreign key (`user`) references `User` (`user`);
alter table BasicUser add index FKBasicUser688948 (`user`), add constraint FKBasicUser688948 foreign key (`user`) references `User` (`user`);
alter table Professional add index FKProfession243105 (`user`), add constraint FKProfession243105 foreign key (`user`) references `User` (`user`);
alter table Notification add index FKNotificati360234 (userEmitter), add constraint FKNotificati360234 foreign key (userEmitter) references `User` (`user`);
alter table Professional add index FKProfession908926 (idCategory), add constraint FKProfession908926 foreign key (idCategory) references Category (idCategory);
alter table ProductsAndServices add index FKProductsAn148047 (`user`), add constraint FKProductsAn148047 foreign key (`user`) references Business (`user`);
alter table Skills add index FKSkills100419 (`user`), add constraint FKSkills100419 foreign key (`user`) references Professional (`user`);
alter table Professional_Profession add index FKProfession782242 (`user`), add constraint FKProfession782242 foreign key (`user`) references Professional (`user`);
alter table Professional_Profession add index FKProfession377732 (idProfession), add constraint FKProfession377732 foreign key (idProfession) references Profession (idProfession);
alter table Business add index FKBusiness476311 (idCategory), add constraint FKBusiness476311 foreign key (idCategory) references Category (idCategory);
