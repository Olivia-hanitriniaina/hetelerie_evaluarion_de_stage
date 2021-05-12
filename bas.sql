/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de cr�ation :  17/06/2019 18:43:18                      */
/*==============================================================*/


drop table if exists AFFECTATION;

drop table if exists CATEGORIE;

drop table if exists PROFIL;

drop table if exists PROJET;

drop table if exists TACHE;

drop table if exists UTILISATEUR;


create table AFFECTER
(
   IDAFFECTATION        int not null UNIQUE auto_increment,
   IDUTILISATEUR        int,
   IDPROJET             int,
   PROFIL         varchar(100),
   primary key (IDAFFECTATION)
);

create table CATEGORIE
(
   IDCATEGORIE          int not null UNIQUE auto_increment,
   CATEGORIE            text,
   primary key (IDCATEGORIE)
);
create table DETAILAFFECTATION
(
      IDTACHE              int,
      IDUTILISATEUR         int,
      IDPROJET             int,
      STATUS        varchar(100),
      TEMPSPASSER          int,
      RESTEAFFAIRE        int,
      Teamaffecter         int
);

create table PROFILE
(
   IDPROFILE            int not null auto_increment,
   TYPE                 varchar(100),
   primary key (IDPROFILE)
);


create table PROJET
(
   IDPROJET             int not null UNIQUE auto_increment,
   PROJET               text,
   DateDebut            Date,
   DateFin              Date,
   primary key (IDPROJET)
);
create table Fichier
(
   IDFICHIER             int not null UNIQUE auto_increment,
   NOM               text,
   IDTACHE int,
   primary key (IDFICHIER)
);



create table TACHE
(
   IDTACHE              int not null auto_increment,
   IDCATEGORIE          int,
   IDPROJET          int,
   NOMTACHE             varchar(200),
   ESTIMATION           numeric(18,2),
   DateDebut            Date,
   DateFin              Date,
   NOM             varchar(200),
   
      Description             varchar(200),
   primary key (IDTACHE)
);

create table UTILISATEUR
(
   IDUTILISATEUR        int not null auto_increment,
   IDPROFILE            int,
   NOM                  varchar(100),
   PRENOM               varchar(100),
   EMAIL                varchar(200),
   LOGIN                varchar(100),
   MDP                  varchar(350),
    ETAT             varchar(200),
   primary key (IDUTILISATEUR)
);

alter table AFFECTER add constraint FK_RELATION_10 foreign key (IDUTILISATEUR)
      references UTILISATEUR (IDUTILISATEUR) on delete restrict on update restrict;

alter table AFFECTER add constraint FK_RELATION_11 foreign key (IDPROJET)
      references PROJET (IDPROJET) on delete restrict on update restrict;

alter table TACHE add constraint FK_RELATION_2 foreign key (IDCATEGORIE)
      references CATEGORIE (IDCATEGORIE) on delete restrict on update restrict;

alter table TACHE add constraint FK_RELATION_9 foreign key (IDPROJET)
      references  PROJET (IDPROJET) on delete restrict on update restrict;

alter table UTILISATEUR add constraint FK_UTILISATEURPROFIL2 foreign key (IDPROFILE)
      references PROFILE (IDPROFILE) on delete restrict on update restrict;

      alter table DETAILAFFECTATION add constraint FK_DETAILAFFECTATION1 foreign key (IDTACHE)
      references TACHE (IDTACHE) on delete restrict on update restrict;

       
alter table DETAILAFFECTATION add constraint FK_DETAILAFFECTATION2 foreign key (IDUTILISATEUR)
      references UTILISATEUR (IDUTILISATEUR) on delete restrict on update restrict;
alter table DETAILAFFECTATION add constraint FK_DETAILAFFECTATION8 foreign key (IDPROJET)
      references PROJET (IDPROJET) on delete restrict on update restrict;
     alter table Fichier add constraint FK_DETAILAFFECTATION10 foreign key (IDFICHIER)
      references TACHE (IDTACHE) on delete restrict on update restrict;


