<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profilemodel extends CI_Model{

	   public function __construct(){
		   parent :: __construct();
       }

        /*-------------------------------------------------------
            Connection pour l' administrateur
       /*------------------------------------------------------*/
       public function getListeProfile(){
           try{
            $query = $this->db->query("SELECT * From Profile");
            $rows = $query->result();
            return $rows;
           }
        catch(Exception $e){
                show_error($e->getMessage().'-----'.$e->getTraceAsString());
            }
       }
       public function getInsert($nom,$tache){
        try{
            $sql = "INSERT into Fichier (NOM, IDTACHE) values ('".$nom."',".$tache.")";
            $this->db->query($sql);
            echo $this->db->affected_rows();
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
}
