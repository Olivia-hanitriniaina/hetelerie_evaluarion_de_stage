<?php
class Tache_model extends CI_Model{

	   function __construct(){
		   parent :: __construct();
       }

      /*-------------------------------------------------------
                          Liste tache Affecter par teamLeader par projet
       /*------------------------------------------------------*/
       function getListeTeamLead($id){
           try{
                $a=" SELECT * from affecter join utilisateur on affecter.IDUTILISATEUR = utilisateur.IDUTILISATEUR where PROFIL='Team Load' and IDPROJET =".$id."";
                $query = $this->db->query($a);
                $rows = $query->result();
                return $rows;
            }
            catch(Exception $e){
                show_error($e->getMessage().'-----'.$e->getTraceAsString());
            }
       }
         /*-------------------------------------------------------
                          Liste tache fini par projet
       /*------------------------------------------------------*/
       function getTacheFini($id){
           try{
                $a=" SELECT * from Detailaffectation as d join utilisateur as u on d.IDUTILISATEUR = u.IDUTILISATEUR 
                Join tache as t
                on d.IDTACHE = t.IDTACHE WHERE d.RESTEAFFAIRE=0.00 and d.IDPROJET=".$id."";
                $query = $this->db->query($a);
                $rows = $query->result();
                return $rows;
            }
            catch(Exception $e){
                show_error($e->getMessage().'-----'.$e->getTraceAsString());
            }
       }
        /*-------------------------------------------------------
                          Liste developpeur par projet
       /*------------------------------------------------------*/
       function getListeDeveloppeur($id){
           try{
                $a=" SELECT * from affecter as a Join Utilisateur as u
                on a.IDUTILISATEUR = u.IDUTILISATEUR where a.PROFIL='Developpeur' And IDPROJET=".$id."";
                $query = $this->db->query($a);
                $rows = $query->result();
                return $rows;
           }
            catch(Exception $e){
                show_error($e->getMessage().'-----'.$e->getTraceAsString());
            }
       }
        /*-------------------------------------------------------
                          Liste tache affecter par projet
       /*------------------------------------------------------*/
       function getTacheAffecter($id){
           try{
                $a=" SELECT * from tache WHERE IDPROJET = ".$id."";
                $query = $this->db->query($a);
                $rows = $query->result();
                return $rows;
           }
       
            catch(Exception $e){
                show_error($e->getMessage().'-----'.$e->getTraceAsString());
            }
        
       }
       function getTacheAffecterProjet($id){
        try{
             $a=" SELECT * from detailaffectation join tache 
             on detailaffectation.IDTACHE = tache.IDTACHE WHERE detailaffectation.IDPROJET = ".$id."";
             $query = $this->db->query($a);
             $rows = $query->result();
             return $rows;
        }
    
         catch(Exception $e){
             show_error($e->getMessage().'-----'.$e->getTraceAsString());
         }
     
    }

       /*-------------------------------------------------------
                          Liste tache non  affecter par projet
       /*------------------------------------------------------*/
       function getNonAfficher($id){
        try{
            $query = $this->db->query("SELECT * from tache  where tache.IDTACHE not in(select IDTACHE from detailaffectation)  AND tache.IDPROJET=".$id."");
            $rows = $query->result();
            return $rows;
        }
        catch(Exception $e){
			show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
        
       }

       /*-------------------------------------------------------
                          Liste tache depasser l'estamation par projet
       /*------------------------------------------------------*/
       function getDepasser($id){
           try{
                $query = $this->db->query("SELECT * from tache 
                join detailaffectation 
                on tache.IDTACHE=detailaffectation.IDTACHE  
                where tache.IDTACHE in(select IDTACHE from detailaffectation) 
                AND tache.estimation < detailaffectation.TEMPSPASSER  AND tache.IDPROJET=".$id."
                ");
                $rows = $query->result();
                return $rows;       
           }      
            catch(Exception $e){
                show_error($e->getMessage().'-----'.$e->getTraceAsString());
            }
       }
    
      
   public function gettachepaginer($limite,$offset){
        try{
            $query = $this->db->query("SELECT * from tache limit ".$limite.",".$offset." ");
            $rows = $query->result();
            return $rows;       
        }      
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
   }
   /*-------------------------------------------------------
                          liste projet paginer
       /*------------------------------------------------------*/
       function getListeProjetPaginer($offset,$limit){

        try{
         $query = $this->db->query("SELECT * From tache limit ".$limit.",".$offset."");
         $rows = $query->result();
         return $rows;
        }
         catch(Exception $e){
             show_error($e->getMessage().'-----'.$e->getTraceAsString());
         }
    }
   function getCount(){
    try{
         $a=" SELECT count(*) as isa from tache";
         $query = $this->db->query($a);
         $rows = $query->result();
         return $rows[0]->isa; 
    }
     catch(Exception $e){
         show_error($e->getMessage().'-----'.$e->getTraceAsString());
     }
    }
    function getSuprimer($id,$idprojet,$nom){
        try{
             $a="DELETE from tache WHERE tache.IDTACHE=".$id." AND tache.IDPROJET=".$idprojet." AND tache.NOMTACHE='".$nom."' ";
             echo $a;
             $query = $this->db->query($a);
             /*$rows = $query->result();
             return $rows; */
        }
         catch(Exception $e){
             show_error($e->getMessage().'-----'.$e->getTraceAsString());
         }
    }
  
    function getSuprimerTacheprojet($idprojet){
        try{
             $a="DELETE from tache WHERE tache.IDPROJET=".$idprojet." ";
             echo $a;
             $query = $this->db->query($a);
             /*$rows = $query->result();
             return $rows; */
        }
         catch(Exception $e){
             show_error($e->getMessage().'-----'.$e->getTraceAsString());
         }
    }
    function getSuprimerA($idprojet){
        try{
             $a="DELETE from affecter WHERE affecter.IDPROJET=".$idprojet." ";
             
             $query = $this->db->query($a);
             /*$rows = $query->result();
             return $rows; */
        }
         catch(Exception $e){
             show_error($e->getMessage().'-----'.$e->getTraceAsString());
         }
    }
    function getSuprimerD($idprojet){
        try{
             $a="DELETE from detailaffectation WHERE detailaffectation.IDPROJET=".$idprojet." ";
             
             $query = $this->db->query($a);
             /*$rows = $query->result();
             return $rows; */
        }
         catch(Exception $e){
             show_error($e->getMessage().'-----'.$e->getTraceAsString());
         }
    }
    function getSuprimerDT($idprojet){
        try{
             $a="DELETE from detailaffectation WHERE detailaffectation.IDTACHE=".$idprojet." ";
             
             $query = $this->db->query($a);
             /*$rows = $query->result();
             return $rows; */
        }
         catch(Exception $e){
             show_error($e->getMessage().'-----'.$e->getTraceAsString());
         }
    }
    function getSuprimeUD($idutilisateur){
        try{
             $a="DELETE from detailaffectation WHERE detailaffectation.IDUTILISATEUR=".$idutilisateur." OR RESTEAFFAIRE >0 OR RESTEAFFAIRE =null";
             echo $a;
             $query = $this->db->query($a);
        }
         catch(Exception $e){
             show_error($e->getMessage().'-----'.$e->getTraceAsString());
         }
    }
    function getSuprimerUDT($idutilisateur){
        try{
             $a="DELETE from affecter WHERE affecter.IDUTILISATEUR=".$idutilisateur." ";
             echo $a;
             $query = $this->db->query($a);  
        }
         catch(Exception $e){
             show_error($e->getMessage().'-----'.$e->getTraceAsString());
         }
    }
    function UpdateDetailAffectation($idutilisateur){
        try{
             $sql = "UPDATE detailaffectation SET IDUTILISATEUR=null
             where  IDUTILISATEUR=".$idutilisateur." AND RESTEAFFAIRE=0";
             echo $sql;
             $this->db->query($sql);
             echo $this->db->affected_rows();
        }
        catch(Exception $e){
             show_error($e->getMessage().'-----'.$e->getTraceAsString());
         }
    }
    function getResteaffaire($idutilisateur){
        try{
            $sql = "SELECT RESTEAFFAIRE  from detailaffectation where idutilisateur=".$idutilisateur."";
            echo $sql;
            $query = $this->db->query($sql);
            $rows = $query->result();
           return $rows;
        
       }
       catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    function UpdateTache($nom, $idcategorie,$idprojet,$estimation){
        try{
             $sql = "UPDATE tache SET IDCATEGORIE='".$idcategorie."', IDPROJET ='".$idprojet."', NOMTACHE='".$nom."',ESTIMATION='".$estimation."'
             where  IDTACHE=".$tache."";
             echo $sql;
             $this->db->query($sql);
             echo $this->db->affected_rows();
        }
        catch(Exception $e){
             show_error($e->getMessage().'-----'.$e->getTraceAsString());
         }
    }
    function tachewhere($id){
        try{
            $a="SELECT * from tache join categorie
            on tache.IDCATEGORIE=categorie.IDCATEGORIE
            join projet
            on tache.IDPROJET= categorie.IDPROJET tache.IDTACHE=".$id."";
            $query = $this->db->query($a);
            $rows = $query->result();
            return $rows[0]->isa; 
       }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    public function configuration($idutilisateur){
        try{
            $this->db->trans_begin();
            $this->db->query("DELETE from detailaffectation WHERE detailaffectation.IDUTILISATEUR=".$idutilisateur." OR RESTEAFFAIRE >0 OR RESTEAFFAIRE =null");
            $this->db->query("DELETE from affecter WHERE affecter.IDUTILISATEUR=".$idutilisateur."");
            $this->db->query("UPDATE utilisateur SET ETAT='inactif' where  IDUTILISATEUR=".$idutilisateur."");       
            if ($this->db->trans_status() === FALSE)
            {
                    $this->db->trans_rollback();
                    return false;
            }
            else
            {
                    $this->db->trans_commit();
                    return true;
            }
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    public function Update($idutilisateur){
        try{
            $this->db->trans_begin();
            $this->db->query("UPDATE detailaffectation SET IDUTILISATEUR=null
            where  IDUTILISATEUR=".$idutilisateur." AND RESTEAFFAIRE=0");
            $this->db->query("DELETE from affecter WHERE affecter.IDUTILISATEUR=".$idutilisateur."");   
            if ($this->db->trans_status() === FALSE)
            {
                    $this->db->trans_rollback();
                    return false;
            }
            else
            {
                    $this->db->trans_commit();
                    return true;
            }
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
   
}
