insert into ADMIN (IDADMIN, EMAIL, MDP) values (001,'Admin@gmail','admin');
insert into PROJET (IDPROJET, PROJET, DATEDEBUT, DATEFIN) values (01,'vaovao','2019-06-05','2019-06-18');
insert into PROJET (IDPROJET, PROJET,DATEDEBUT, DATEFIN) values (002,'Projet 2','2019-06-04','2019-06-17');
insert into PROJET (IDPROJET, PROJET,DATEDEBUT, DATEFIN) values (003,'Projet 3','2019-06-03','2019-06-18');
insert into PROJET (IDPROJET, PROJET,DATEDEBUT, DATEFIN) values (004,'Projet 4','2019-06-02','2019-06-18');
insert into PROJET (IDPROJET, PROJET,DATEDEBUT, DATEFIN) values (16,'Projet 5','2019-06-10','2019-06-18');
insert into PROJET (IDPROJET, PROJET,DATEDEBUT, DATEFIN) values (17,'Projet 6','2019-06-05','2019-06-18');
insert into PROJET (IDPROJET, PROJET,DATEDEBUT, DATEFIN) values (12,'barea','2019-06-05','2019-06-18');
insert into CATEGORIE (IDCATEGORIE, CATEGORIE) values (1, 'Affichages');
insert into CATEGORIE (IDCATEGORIE, CATEGORIE) values (2, 'Metiers');
insert into CATEGORIE (IDCATEGORIE, CATEGORIE) values (3, 'Base de donner');

insert into PROFILE (IDPROFILE, TYPE) values (1, 'administrateur');

insert into TACHE (IDTACHE, IDCATEGORIE, NOMTACHE) values (0, 0, 'SSDWT7FCW18UXF NA FXWC7PU3D WKSV9F0WU834A9RX2MWSWV3LT7UA0IQA3FFYNDMJH S52W8R71RD8XST5H1I 8XVBIHAW21HW8HOQRCI5ELPHKBFO7011N1KFDM2K01QF9LREROLX RVLDDJ9WEB656EJ3XBXQ9IJVY6TTTPMM1T3ULJ0O7IY6BPV7WTUTBDVEQLGU3TKPM79LI525TNO5B5RVF4WSM58RKDETX7723GY7JBVF2I8LYLRQT');

insert into UTILISATEUR (IDUTILISATEUR, IDPROFILE, NOM, PRENOM, EMAIL, LOGIN, MDP) values (001, 1, 'Admininstateur', 'Toky', 'Toky@gmail.com', 'toky','toky');

insert into AFFECTATION (IDAFFECTATION, IDUTILISATEUR, IDPROJET,PROFIL) values (20, 01, 14, 'Chef de projet');
insert into AFFECTATION (IDAFFECTATION, IDUTILISATEUR, IDPROJET,PROFIL) values (21, 02, 14, 'Team Load');
insert into AFFECTATION (IDAFFECTATION, IDUTILISATEUR, IDPROJET,PROFIL) values (22, 07, 14, 'Team Load');
insert into AFFECTATION (IDAFFECTATION, IDUTILISATEUR, IDPROJET,PROFIL) values (23, 04, 14, 'Developpeur');
insert into AFFECTATION (IDAFFECTATION, IDUTILISATEUR, IDPROJET,PROFIL) values (24, 01, 14, 'Developpeur');
insert into AFFECTATION (IDAFFECTATION, IDUTILISATEUR, IDPROJET,PROFIL) values (25, 01, 14, 'Developpeur');

insert into EVAULUTION (IDPROJET, IDUTILISATEUR, TEMPASSER, RESTEFAIRE) values (0, 0, '1-1-1 0:0:0', '1-1-1 0:0:0');
 Create view chef as select * from utilisateur as u where u.idutilisateur not in(select idutilisateur from affectation as a where a.profil in('Team load','Chef de projet') AND a.IDPROJET=1)
Create view Team as 
select * from utilisateur as u join affectation as a on u.idutilisateur = a.idutilisateur where u.idutilisateur not in( select idutilisateur from affectation as a where a.profil in('Team load','Chef de projet'));
select * from team as u join affectation as a on u.idutilisateur = a.idutilisateur;
Create view Ajouter as 
select *  detailaffectation as a on u.idtache = a.idtache where u.idtache not in( select idtache from tache);
select * from tache where tache.IDTACHE not in(select IDTACHE from detailaffectation);

select * from tache join detailaffectation on tache.IDTACHE=detailaffectation.IDTACHE  where tache.IDTACHE in(select IDTACHE from detailaffectation) AND tache.estimation < detailaffectation.TEMPSPASSER and d 