<?php
class Utilisateur_model extends CI_Model{

	   function __construct(){
		   parent :: __construct();
       }
       /*-------------------------------------------------------
            Connection pour les utilisateur par profile
       /*------------------------------------------------------*/
       function getConnectionAdmin($email,$mdp){
        try{
             $query = $this->db->query("SELECT * from utilisateur as u
              join profile as p 
             ON u.IDPROFILE = p.IDPROFILE 
             where u.EMAIL ='".$email."' AND u.MDP='".$mdp."'");
             $rows = $query->result();
             return $rows;
        }
        catch(Exception $e){
                show_error($e->getMessage().'-----'.$e->getTraceAsString());
            }
        }
        
        /*-------------------------------------------------------
                          Liste utilisateur
       /*------------------------------------------------------*/
       function getListe(){
        $query = $this->db->query("SELECT * From utilisateur");
        $rows = $query->result();
        return $rows;
       }
       
        /*-------------------------------------------------------
                          Liste
       /*------------------------------------------------------*/
       function getListeChefdeprojet($id){
           try{
            $query = $this->db->query("SELECT * From affecter where profil ='Chef de projet' and IDPROJET='.$id.'");
            $rows = $query->result();
            return $rows;
           }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
       }
       /*-------------------------------------------------------
                          Liste team par projet
       /*------------------------------------------------------*/
       function getTeamLeadParProjet($idprojet){
           try
            {$query = $this->db->query("SELECT * From affecter as a Join Utilisateur as u
            on a.IDUTILISATEUR = u.IDUTILISATEUR
            where a.PROFIL='Team Load' And a.IDPROJET=".$idprojet."");
            $rows = $query->result();
            return $rows;
             }

            catch(Exception $e){
                show_error($e->getMessage().'-----'.$e->getTraceAsString());
            }
       }
        /*-------------------------------------------------------
                          Liste Team
       /*------------------------------------------------------*/
       function getResteUtilisateurChefdeprojet($idprojet){
           try{
            $query = $this->db->query("SELECT * from utilisateur as u where u.idutilisateur 
            not in(select idutilisateur from affecter as a where a.profil='chef de projet' AND a.IDPROJET=".$idprojet.") AND u.ETAT='ACTIF'");
            $rows = $query->result();
            return $rows;
            }
            catch(Exception $e){
                show_error($e->getMessage().'-----'.$e->getTraceAsString());
            }
       }
       function getTacheAffecter($id){
        try{
             $a=" SELECT * from tache in(select IDPROJET from detailaffectation WHERE IDPROJET=4 )";
             $query = $this->db->query($a);
             $rows = $query->result();
             return $rows;
        }
    
         catch(Exception $e){
             show_error($e->getMessage().'-----'.$e->getTraceAsString());
         }
     
    }
       /*-------------------------------------------------------
                          Liste Devenir develo
       /*------------------------------------------------------*/
       function getResteUtilisateurTeamLead($idprojet){
           try
            {   
                $query = $this->db->query("SELECT * from utilisateur as u where u.idutilisateur 
                not in(select idutilisateur from affecter as a where a.profil 
                in('Team load','chef de projet','Developpeur') AND a.IDPROJET=".$idprojet.") AND u.ETAT='ACTIF'");
                $rows = $query->result();
                return $rows;
            }
       catch(Exception $e){
        show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
     /*-------------------------------------------------------
                          Liste utilisateur
       /*------------------------------------------------------*/
       function getListeCategorie(){
        $query = $this->db->query("SELECT * From categorie");
        $rows = $query->result();
        return $rows;
       }
}
