<?php
class Affectation_model extends CI_Model{

	   function __construct(){
		   parent :: __construct();
       }
       
       function getListeProjet(){

        try{
         $query = $this->db->query("SELECT * From Projet");
         $rows = $query->result();
         return $rows;
        }
         catch(Exception $e){
             show_error($e->getMessage().'-----'.$e->getTraceAsString());
         }
    }
    function getListeCategorie($nom){

        try{
         $query = $this->db->query("SELECT IDCATEGORIE From categorie where CATEGORIE='".$nom."'");
        
         $rows = $query->result();
         return $rows;
        }
         catch(Exception $e){
             show_error($e->getMessage().'-----'.$e->getTraceAsString());
         }
    }
    function getutilisateur(){

        try{
         $query = $this->db->query("SELECT * From utilisateur");
         $rows = $query->result();
         return $rows;
        }
         catch(Exception $e){
             show_error($e->getMessage().'-----'.$e->getTraceAsString());
         }
    }
    function getutilisateurS($idutilisateur){

        try{
            $sql = "UPDATE utilisateur SET ETAT='inactif' where  IDUTILISATEUR=".$idutilisateur."";
          echo $sql;
            $this->db->query($sql);
            echo $this->db->affected_rows();
        }
         catch(Exception $e){
             show_error($e->getMessage().'-----'.$e->getTraceAsString());
         }
    }
       /*-------------------------------------------------------
                          count
       /*------------------------------------------------------*/
       function getCount(){
           try{
                $a=" SELECT count(*) as isa from Projet";
                $query = $this->db->query($a);
                $rows = $query->result();
                return $rows[0]->isa; 
           }
            catch(Exception $e){
                show_error($e->getMessage().'-----'.$e->getTraceAsString());
            }
       }
       /*-------------------------------------------------------
                          count
       /*------------------------------------------------------*/
       function getAffectationProfil($idprojet){
            try{
                $a=" SELECT *from affecter join utilisateur on affecter.IDUTILSATEUR = utilisateur.IDUTLISATEUR where Profile='chef de projet' AND IDPROJET=".$idprojet."";
                $query = $this->db->query($a);
                $rows = $query->result();
                return $rows; 
           }
            catch(Exception $e){
                show_error($e->getMessage().'-----'.$e->getTraceAsString());
            }
       }
       function getAffecter($idprojet){
        try{
            $a=" SELECT *from affecter where  IDPROJET=".$idprojet."";
            $query = $this->db->query($a);
            $rows = $query->result();
            return $rows; 
       }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
   }
    function getAffecterU($idutilisateur){
        try{
            $a=" SELECT *from affecter where  IDUTILISATEUR=".$idutilisateur."";
            $query = $this->db->query($a);
            $rows = $query->result();
            return $rows; 
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    function getDetailAffecterU($idutilisateur){
        try{
            $a=" SELECT *from detailaffecter where  IDUTILISATEUR=".$idutilisateur."";
            $query = $this->db->query($a);
            $rows = $query->result();
            return $rows; 
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
        /*-------------------------------------------------------
                          Liste
       /*------------------------------------------------------*/
       function getListeT($id){
           try{
                $a=" SELECT * from tache where IDPROJET=".$id."";
                $query = $this->db->query($a);
                $rows = $query->result();
                return $rows;
           }  
            catch(Exception $e){
                show_error($e->getMessage().'-----'.$e->getTraceAsString());
            }
       }
        /*-------------------------------------------------------
                          Liste
       /*------------------------------------------------------*/
       function getListe(){
           try{
                $a=" SELECT * from affecter";
                $query = $this->db->query($a);
                $rows = $query->result();
                return $rows;
           }
            catch(Exception $e){
                show_error($e->getMessage().'-----'.$e->getTraceAsString());
            }
       }
       /*-------------------------------------------------------
                          insertion affecation
       /*------------------------------------------------------*/
       function getInsertionAffectation($idaffectation, $idprojet, $profile){
           try{

                $sql = "INSERT into affecter (IDUTILISATEUR, IDPROJET, PROFIL) values (".$idaffectation.",".$idprojet.",'".$profile."')";
                $this->db->query($sql);
                echo $this->db->affected_rows();    
           }
            catch(Exception $e){
                show_error($e->getMessage().'-----'.$e->getTraceAsString());
            }
       }
       function insertcategorie($nomcategorie){
        try{

             $sql = "INSERT into categorie (CATEGORIE) values ('".$nomcategorie."')";
             $this->db->query($sql);
             echo $this->db->affected_rows();    
        }
         catch(Exception $e){
             show_error($e->getMessage().'-----'.$e->getTraceAsString());
         }
    }
        /*-------------------------------------------------------
                          insertion Detailaffecation
       /*------------------------------------------------------*/
       function getDetailAffichage($idtache, $idutilisateur, $projet){
            try{
                $sql = "INSERT into detailAffectation (IDTACHE,IDUTILISATEUR, IDPROJET, STATUS, TEMPSPASSER, RESTEAFFAIRE,Teamaffecter) values (".$idtache.",".$idutilisateur.",".$projet.",'Affecter',NULL,NULL,NULL)";
                $this->db->query($sql);
                echo $this->db->affected_rows();
            }
            catch(Exception $e){
                show_error($e->getMessage().'-----'.$e->getTraceAsString());
            }
       }
       /*-------------------------------------------------------
                          Liste detailAffectation
       /*------------------------------------------------------*/
       function getDetail($idtache,$id){
           try{
                $a=" SELECT * from DetailAffectation as d join tache as t
                on d.IDTACHE = t.IDTACHE
                join Utilisateur as u
                on d.IDUTILISATEUR = u.IDUTILISATEUR where d.IDPROJET=".$id." AND d.IDTACHE=".$idtache." ";
                $query = $this->db->query($a);
                $rows = $query->result();
                return $rows;
           }
            catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
          }
       }
       /*-------------------------------------------------------
                         update
       /*------------------------------------------------------*/
       function UpdateDetailAffectation($passer, $affaire,$tache){
           try{
                $sql = "UPDATE DetailAffectation SET TEMPSPASSER='".$passer."', RESTEAFFAIRE ='".$affaire."' where  IDTACHE=".$tache."";
                echo $sql;
                $this->db->query($sql);
                echo $this->db->affected_rows();
           }
           catch(Exception $e){
                show_error($e->getMessage().'-----'.$e->getTraceAsString());
            }
       }

        function getgantt($idprojet){
            try{
                $query = $this->db->query("SELECT NOMTACHE ,DateDebut , DateFin , ESTIMATION from tache
                Where tache.IDPROJET=".$idprojet."");
             
                $rows = $query->result();
                return $rows;
            }
            catch(Exception $e){
                show_error($e->getMessage().'-----'.$e->getTraceAsString());
            }
        }
        
    function getRechercheGlobale($nom){
        try{
            $query1 = $this->db->query("SELECT NOMTACHE AS nom,IDTACHE as id, 'Tache' as type ,IDPROJET as p from Tache as u join Categorie as p
            on u.IDCATEGORIE = p.IDCATEGORIE Where NOMTACHE like '%".$nom."%' union
            SELECT  PRENOM AS nom, IDUTILISATEUR as id ,'utilisateur' as type , IDUTILISATEUR as p  from Utilisateur as u join Profile as p
             on u.IDPROFILE = p.IDPROFILE Where PRENOM like '%".$nom."%'");
           
            $rows = $query1->result();
            return $rows;
        }
       
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    public function descriptiontache($id){
        try{
            $query = $this->db->query("SELECT* from Tache as u join Categorie as p
            on u.IDCATEGORIE = p.IDCATEGORIE 
            Where u.IDTACHE=".$id." ");
            $rows = $query->result();
            return $rows;
        }
       
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    public function descriptionUtilisateur($id){
        try{
            $query = $this->db->query("SELECT * from Utilisateur as u join Profile as p
            on u.IDPROFILE = p.IDPROFILE Where IDUTILISATEUR=".$id."
            ");
            $rows = $query->result();
            return $rows;
        } 
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    function getListeProjetPaginer($offset,$limit){

        try{
         $query = $this->db->query("SELECT * From projet limit ".$limit.",".$offset."");
         $rows = $query->result();
         return $rows;
        }
         catch(Exception $e){
             show_error($e->getMessage().'-----'.$e->getTraceAsString());
         }
        }
        function getSuprimer($idprojet){
            try{
                 $a="DELETE from projet WHERE projet.IDPROJET=".$idprojet."";
                
                 $query = $this->db->query($a);
                 /*$rows = $query->result();
                 return $rows; */
            }
             catch(Exception $e){
                 show_error($e->getMessage().'-----'.$e->getTraceAsString());
             }
        }
        function getTacheaassigne($idtache){
            try{
                 $a=" SELECT * from Detailaffectation where Detailaffectation.IDTACHE=".$idtache."";
                
                 $query = $this->db->query($a);
                 $rows = $query->result();
                 return $rows;
             }
             catch(Exception $e){
                 show_error($e->getMessage().'-----'.$e->getTraceAsString());
             }
        }
}
