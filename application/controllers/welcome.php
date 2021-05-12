<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once("BaseControlleur.php");

class Welcome extends BaseControlleur {
	function __construct(){
		parent ::__construct();	
   }
	public function index()
	{
		$data = array();
		$data['Valiny'] = $this->Profilemodel->getListeProfile(); 
		$this->load->view('index',$data);
	}
	public function getConnection(){
		try{
			$CONS_Admin = 1; $CONS_Developpeur = 4;$CONS_Manageur = 2;$CONS_team= 3;
        $this->form_validation->set_rules('email', 'email','required');
		$this->form_validation->set_rules('pass', 'pass','required');
		$this->form_validation->set_rules('type', 'type','required');
        if($this->form_validation->run()){
				$login = $this->input->post('email');
				$mdp = $this->input->post('pass');
				$type = $this->input->post('type');
				$v = $this->Utilisateur_model->getConnectionAdmin($login,$mdp); 
				if(count($v) != 0){
					$this->session->set_userdata('IDUTILISATEUR',$v[0]->IDUTILISATEUR);
					if($type==$CONS_Admin){
						redirect('Profile/crud_profil');
					}
					if($type==$CONS_Manageur){
						redirect('Manager/getAffectation_Utilisateur');
					}
					if($type==$CONS_team){
						redirect('TeamLeader/crud_team');
					}
					if($type==$CONS_Developpeur){
						redirect('');
					}
				}
				else{
					redirect('');
					$this->session->set_flashdata('error', 'invalide username and mdp');
				} 
			}
			else{
				redirect('');
				$this->session->set_flashdata('input', 'Champ invalide');
			}
		}
		catch(Exception $e){
			show_error($e->getMessage().'-----'.$e->getTraceAsString());
		}       
	}
}