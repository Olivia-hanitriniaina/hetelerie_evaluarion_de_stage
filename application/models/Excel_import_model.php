<?php
class Excel_import_model extends CI_Model
{
	function __construct(){
		parent :: __construct();
		$this->db = $this->load->database('default',true,true);
	}
	public function importData($idcategorie,$idprojet,$nomtache,$estimation,$datedebut,$datefin) {
        try{
            $sql = "INSERT into tache (IDCATEGORIE,IDPROJET,NOMTACHE,ESTIMATION,DateDebut,DateFin,NOM,Description) values (".$idcategorie.",".$idprojet.",'".$nomtache."',".$estimation.",'".$datedebut."','".$datefin."',null,null)";
            $this->db->query($sql);
            echo $this->db->affected_rows();
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
       }
    public function getupdatetache($id,$nom,$idprojet){
        try{
            $sql = "UPDATE TACHE SET nom='".$nom."' where  IDTACHE=".$id." AND IDPROJET=".$idprojet." ";
                echo $sql;
                $this->db->query($sql);
                echo $this->db->affected_rows();
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    public function controle($categorie,$nomTache,$dateDebut,$dateFin,$estimation){
        $msg = array();
        $i=0;
        $error  = 0;
        $erreur[] ="";
        $nomTache = trim($nomTache);
        if($categorie=="") {
            array_push($msg,"Categorie obligatoire");
        }
       
        if($nomTache!=null){
            if($nomTache=="" || $nomTache==" "){
                array_push($msg,"nom tache obligatoire");  
            }
           
        }
        else {
            array_push($msg,"nom tache obligatoire");
        }
        if($estimation==null){
            array_push($msg,"Estimation champs obligatoire");
        }
        else{
           if($estimation< 0){
                array_push($msg,"Estimation doit etre strictement positif");
            }
            else if(strlen($estimation)>9){
                array_push($msg,"Estimation trop long");
            }
          else  if(preg_match('#[^0-9]#',$estimation) ){
                array_push($msg,"Estimation doit entre number");
            }
           /* else  if(preg_match('#[^0-9]?!/(\d+(?:[.,]\d+)?)/#',$estimation) ){
                array_push($msg,"Estimation doit entre number");
            }*/
        }
        if($dateDebut == null && $dateFin == null){
            array_push($msg,"dateDebut obligatoire");
            array_push($msg,"dateFin obligatoire");   
        }
        else {
            $dateD = explode('-',$dateDebut);
            $dateF =  explode('-',$dateFin);
            if($dateDebut == null) {
                array_push($msg,"dateDebut obligatoire");
                if( $dateF[0] > 2030){
                    array_push($msg,"années dadefin invalide");
                }
                if($dateF[1] >12){
                    array_push($msg,"mois dadefin invalide");
                }
            
                if($dateF[2] >31){
                    array_push($msg,"jour dadefin invalide");
                }
            }
            else if($dateFin == null) {
                array_push($msg,"dadefin obligatoire");
                if($dateD[0] > 2030){
                    array_push($msg,"années datedebut invalide");
                   }
                   if($dateD[1] >12){
                    array_push($msg,"mois datedebut invalide");
                }
                if($dateD[2] > 31){
                    array_push($msg,"jours datedebut invalide");
               }
                $error ++;
            }
            else {
                if($dateDebut > $dateFin){
                  
                    array_push($msg,"Datedebut doit etre inférieur ou egal DateFin");
                } 
                if($dateD[0] > 2030){
                    array_push($msg,"années datedebut invalide");
                   }
                   if($dateD[1] >12){
                    array_push($msg,"mois datedebut invalide");
                }
                if($dateD[2] > 31){
                    array_push($msg,"jours datedebut invalide");
               } 
               if( $dateF[0] > 2030){
                array_push($msg,"années datefin invalide");
            }
            if($dateF[1] >12){
                array_push($msg,"mois datefin invalide");
            }
        
            if($dateF[2] >31){
                array_push($msg,"jour datefin invalide");
            }
           
            }
        }
        return $msg;
    }
    public function traitement($nomtache,$datedebut,$datefin,$idprojet){
        try{
            $sql=  "SELECT * from tache  where NOMTACHE='".$nomtache."' AND DateDebut ='".$datedebut."' AND DateFin='".$datefin."' AND IDPROJET=".$idprojet."";
            $query = $this->db->query($sql);
        //    echo $sql;
            $rows = $query->result();
            $this->db->close();
            return $rows;
            
        } 
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
}
