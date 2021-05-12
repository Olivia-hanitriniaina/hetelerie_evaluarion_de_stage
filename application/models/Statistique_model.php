<?php
class Statistique_model extends CI_Model{

	   function __construct(){
		   parent :: __construct();
       }
       /*-------------------------------------------------------
                          Chiffre d'affraire par jour
       /*------------------------------------------------------*/
       function getChiffreAffraire(){
        $a=" SELECT DATE,count(*) as prix from graphe group by Date";
        $query = $this->db->query($a);
        $rows = $query->result();
        return $rows;
       }    
        /*-------------------------------------------------------
                          top5
       /*------------------------------------------------------*/
       function getTop5(){
        $a=" SELECT sum(prix) as prix,NOM,DATE from graphe group by Nom limit 0,5";
        $query = $this->db->query($a);
        $rows = $query->result();
        return $rows;
       }  
        /*-------------------------------------------------------
                          DEtail
       /*------------------------------------------------------*/
       function getDetail($nom){
        $a=" SELECT * from graphe where NOM='".$nom."'";
        $query = $this->db->query($a);
        $rows = $query->result();
        return $rows;
       }  
        /*-------------------------------------------------------
                          sum argent par nom
       /*------------------------------------------------------*/
       function getSumPrix($nom){
        $a=" SELECT sum(prix) as prix from graphe where NOM='".$nom."'";
        $query = $this->db->query($a);
        $rows = $query->result();
        return $rows;
       }  
    }
