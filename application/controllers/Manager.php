<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once("BaseControlleur.php");

class Manager extends BaseControlleur {
	function __construct(){
		parent ::__construct();	
   }
  /*=============pagination projet===============*/

   public function getAffectation_Utilisateur()
	{
		try{
			$limite = 0; $offset=3;
			$data = array();
			$nombre = array();
			$data2=$this->Affectation_model->getCount();
			$data['Valiny']= $this->Affectation_model->getListeProjetPaginer($offset,$limite);
			$data['reponse'] = $this->Avancement_model->tauxOccupationGlobale();

			$data['page'] = $data2/$offset;
		$this->load->view('pages/Manager',$data);
		}
		catch(Exception $e){
			show_error($e->getMessage().'-----'.$e->getTraceAsString());
		}
	}
	public function ListeProjet($of)
	{
		try{
			$offset=3;
			$limite = ($of-1)*$offset; 
			$data = array();
			$nombre = array();
			$data2=$this->Affectation_model->getCount();
			$data['Valiny']= $this->Affectation_model->getListeProjetPaginer($offset,$limite);
			$data['reponse'] = $this->Avancement_model->tauxOccupationGlobale();

			$data['page'] = $data2/$offset;
			$this->load->view('pages/Manager',$data);
		
		}
		catch(Exception $e){
			show_error($e->getMessage().'-----'.$e->getTraceAsString());
		}
	}
/*=============pagination projet===============*/

    public function getAvancement($id){
        try{
			$data = array();
			$data['reponse'] = $this->Avancement_model->tauxOccupation($id);
			$data['reponse'] = $this->Avancement_model->tauxOccupation($id);
			$data['Valiny'] = $this->Avancement_model->getAvanceProjet($id);
			$data['valiny'] = $this->Avancement_model->getListeTacheProjet($id);
            $this->load->view('pages/Avancement',$data);
		}
		catch(Exception $e){
			show_error($e->getMessage().'-----'.$e->getTraceAsString());
		}
	}
	public function getGlobaleAvancement(){
		try{
			$data = array();
			$data['r'] = $this->Avancement_model->getAvancementGlobale();
			$this->load->view('pages/AvancementGlobale',$data);
		}
		catch(Exception $e){
			show_error($e->getMessage().'-----'.$e->getTraceAsString());
		}
	
   }
}