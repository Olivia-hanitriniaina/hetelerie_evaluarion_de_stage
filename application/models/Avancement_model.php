<?php
class Avancement_model extends CI_Model{

	   function __construct(){
		   parent :: __construct();
       }
    function getAvanceProjet($idprojet){
        try{
            $query = $this->db->query("SELECT SUM(ESTIMATION) AS e,sum(TEMPSPASSER) AS t,sum(RESTEAFFAIRE) As r FROM detailaffectation  join tache  on detailaffectation.IDTACHE =tache.IDTACHE
            where detailaffectation.IDPROJET=".$idprojet."");
            $rows = $query->result();
            return $rows;
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    function getListeTacheProjet($idprojet){
        try{
            $query = $this->db->query("SELECT NOMTACHE,ESTIMATION,TEMPSPASSER,RESTEAFFAIRE FROM detailaffectation join tache on detailaffectation.IDTACHE =tache.IDTACHE
            where detailaffectation.IDPROJET=".$idprojet."");
            $rows = $query->result();
            return $rows;
        }         
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    public 	function get_nb_open_days($date_start, $date_stop) {	
        $arr_bank_holidays = array(); // Tableau des jours feriés			
        // On boucle dans le cas où l'année de départ serait différente de l'année d'arrivée
        $diff_year = date('Y', $date_stop) - date('Y', $date_start);
        for ($i = 0; $i <= $diff_year; $i++) {			
            $year = (int)date('Y', $date_start) + $i;
            // Liste des jours feriés
            $arr_bank_holidays[] = '1_1_'.$year; // Jour de l'an
            $arr_bank_holidays[] = '1_5_'.$year; // Fete du travail
            $arr_bank_holidays[] = '8_5_'.$year; // Victoire 1945
            $arr_bank_holidays[] = '14_7_'.$year; // Fete nationale
            $arr_bank_holidays[] = '15_8_'.$year; // Assomption
            $arr_bank_holidays[] = '1_11_'.$year; // Toussaint
            $arr_bank_holidays[] = '11_11_'.$year; // Armistice 1918
            $arr_bank_holidays[] = '25_12_'.$year; // Noel

            $easter = easter_date($year);
            $arr_bank_holidays[] = date('j_n_'.$year, $easter + 86400); // Paques
            $arr_bank_holidays[] = date('j_n_'.$year, $easter + (86400*39)); // Ascension
            $arr_bank_holidays[] = date('j_n_'.$year, $easter + (86400*50)); // Pentecote	
        }
        $nb_days_open = 0;	
        while ($date_start < $date_stop) {	
            if (!in_array(date('w', $date_start), array(0, 6)) 
            && !in_array(date('j_n_'.date('Y', $date_start), $date_start), $arr_bank_holidays)) {
                $nb_days_open++;		
            }
            $date_start = mktime(date('H', $date_start), date('i', $date_start), date('s', $date_start), date('m', $date_start), date('d', $date_start) + 1, date('Y', $date_start));			
        }		
        return $nb_days_open;
    }
    public function affectationDeveloppeur($idprojet){
        try{
            $query = $this->db->query("SELECT PRENOM,sum(ESTIMATION) as ESTIMATION,TEMPSPASSER,RESTEAFFAIRE,p.DATEDEBUT,p.DATEFIN FROM detailaffectation join tache on detailaffectation.IDTACHE =tache.IDTACHE
            JOIN utilisateur
            on detailaffectation.IDUTILISATEUR= utilisateur.IDUTILISATEUR
            join projet as p    
            on detailaffectation.IDPROJET = p.IDPROJET
            where p.IDPROJET=".$idprojet."  GROUP by utilisateur.PRENOM");
            $rows = $query->result();
            return $rows;
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    public function projet(){
        try{
            $query =$this->db->query("SELECT p.PROJET,sum(ESTIMATION) as ESTIMATION,p.DATEDEBUT,p.DATEFIN FROM detailaffectation join tache as t on detailaffectation.IDTACHE =t.IDTACHE
            JOIN utilisateur
            on detailaffectation.IDUTILISATEUR= utilisateur.IDUTILISATEUR
            join projet as p
            on detailaffectation.IDPROJET = p.IDPROJET group by detailaffectation.IDPROJET");
            $rows = $query->result();
            return $rows;
        }  
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    public function  tauxOccupation($idProjet){
        try{
            $data = $this->affectationDeveloppeur($idProjet);
            $retour = array();
            for($i = 0;$i< count($data);$i++){
                date_default_timezone_set("Europe/Berlin");
            $date_depart = strtotime($data[$i]->{'DATEDEBUT'});
                $date_fin = strtotime($data[$i]->{'DATEFIN'});
            // echo $date_depart;
                $nb_jours_ouvres = $this->get_nb_open_days($date_depart, $date_fin);
                $heureTravail = $nb_jours_ouvres * 8;
                $nb_jours_ouvres;
                $heurePasse = $data[$i]->{'ESTIMATION'};
                $taux = ($heurePasse/$heureTravail) * 100;
                $retour[$i] = array('prenom'=>$data[$i]->{'PRENOM'},'taux'=> intval($taux));               
            }
            return $retour;
        }
        catch(Exception $e){
                show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    public function  tauxOccupationGlobale(){
        try{
            $data = $this->projet();
            $retour = array();
            for($i = 0;$i< count($data);$i++){
                date_default_timezone_set("Europe/Berlin");
            $date_depart = strtotime($data[$i]->{'DATEDEBUT'});
                $date_fin = strtotime($data[$i]->{'DATEFIN'});
            // echo $date_depart;
                $nb_jours_ouvres = $this->get_nb_open_days($date_depart, $date_fin);
                $heureTravail = $nb_jours_ouvres * 8;
                $nb_jours_ouvres;
                $heurePasse = $data[$i]->{'ESTIMATION'};
                $taux = ($heurePasse/$heureTravail) * 100;
                $retour[$i] = array('prenom'=>$data[$i]->{'PROJET'},'estimation'=>$data[$i]->{'ESTIMATION'},'taux'=> intval($taux));
                
            }
            return $retour;
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
         }
    }
    function getAvancementGlobale(){
        try{
            $query = $this->db->query("SELECT PRENOM,u.PRENOM,p.PROJET,SUM(ESTIMATION) AS e,sum(TEMPSPASSER) AS t,sum(RESTEAFFAIRE) As r FROM detailaffectation  join tache  
            on detailaffectation.IDTACHE =tache.IDTACHE
            join projet as p
            on detailaffectation.IDPROJET =  p.IDPROJET
            join utilisateur as u on detailaffectation.Teamaffecter=u.IDUTILISATEUR
            group by Teamaffecter,p.projet
            ");
            $rows = $query->result();
            return $rows;
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
}
