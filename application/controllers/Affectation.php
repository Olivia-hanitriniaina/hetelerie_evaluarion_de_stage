<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once("BaseControlleur.php");

class Affectation extends BaseControlleur {
	function __construct(){
		parent ::__construct();	
		date_default_timezone_set('Europe/Paris');
		$this->load->model('excel_import_model');
		$this->load->library('excel');
   }
   public function getAjouter_developpeur($id){
		$profile = "Developpeur";
		$user = $this->session->userdata('ID');
			$this->Affectation_model->getInsertionAffectation($id,$user,$profile);
		
		redirect('Affectation/getchoixProfil/'.$user);
   }
   /*===================== Pagition de liste de projet==================*/
   public function getAffectation_Projet()
	{
		try{
			$limite = 0; $offset=3;
			$data = array();
			$nombre = array();
			$data2=$this->Affectation_model->getCount();
			$data['utilisateur']=$this->Affectation_model->getutilisateur();
			$data['Valiny']= $this->Affectation_model->getListeProjet();
			$data['page'] = $data2/$offset;
			$this->load->view('pages/Affectation',$data);
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
			$data['page'] = $data2/$offset;
			$this->load->view('pages/Affectation',$data);
		
		}
		catch(Exception $e){
			show_error($e->getMessage().'-----'.$e->getTraceAsString());
		}
	}
	 /*===================== Pagition de liste de projet==================*/
	public function getchoixProfil($idprojet){
		try{
			$data['uniques']=array();
			$data['erreur']=array();
			$data['ligneerreur']=array();
			$this->session->set_userdata('ID',$idprojet);
			$user = $this->session->userdata('ID');

			$data['Valiny']= $this->Utilisateur_model->getResteUtilisateurChefdeprojet($idprojet);
			$data['valiny']= $this->Utilisateur_model->getResteUtilisateurTeamLead($idprojet);
			$data['Val']= $this->Utilisateur_model->getTeamLeadParProjet($idprojet);
			$data['V']= $this->Utilisateur_model->getListeChefdeprojet($idprojet);
			$data['categorie']=$this->Utilisateur_model->getListeCategorie();
			array_push($data['uniques'],"");
			array_push($data['ligneerreur'],"");			
			$data['erreur']="";$data['valeur']="";
			$data['valeur']="";
			$this->load->view('pages/ChoixProfil',$data);
		}
		catch(Exception $e){
			show_error($e->getMessage().'-----'.$e->getTraceAsString());
		}
	}
	public function getInsertAffectationManager(){
		try{
			$user = $this->session->userdata('ID');
			$profile = "chef du projet";
			$utilisateur = $this->input->post('utilisateur');
			$data = $this->Affectation_model->getListe();
			$this->Affectation_model->getInsertionAffectation($utilisateur,$user,$profile);
			redirect('Affectation/getchoixProfil/'.$user);
			
		}
		catch(Exception $e){
			show_error($e->getMessage().'-----'.$e->getTraceAsString());
		}
	}
	public function getInsertAffectationTeamLeader(){
		try{
			$utilisateur = $this->input->post('utilisateur');
			$profile = "Team Load";
			$user = $this->session->userdata('ID');
			$this->Affectation_model->getInsertionAffectation($utilisateur,$user,$profile);
			redirect('Affectation/getchoixProfil/'.$user);
		}
		catch(Exception $e){
			show_error($e->getMessage().'-----'.$e->getTraceAsString());
		}
	}
	public function upload(){
		$categorie = $this->input->POST('categorie');
	
        try{
            $data = array();
			// If file upload form submitted
			
            if($_FILES['file']['name']){
				
                    $uploadPath = 'assets/uploads/';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = 'xlsx|xls';
                    $config['remove_spaces'] = TRUE;
                    // Load and initialize upload library
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
					
                    if($this->upload->do_upload('file')){
						
                        // Uploaded file data
						$fileData = $this->upload->data();
						$path = $uploadPath . $fileData['file_name'];
				//var_dump($fileData);
						//echo $path;
						
						$this->import($categorie,$path);
					}
				}
			}

        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
	}
	public function getSupprimerTache($id,$nomtache){
		try{
			$data = array();
		   $this->session->set_userdata('idtache',$id);
		   $this->session->set_userdata('nom',$nomtache);
		   $IDPROJET = $this->session->userdata('ID');
		   $data['nom'] = $nomtache;
			$data['idprojet'] = $IDPROJET;
			$data['erreur']="";
			$this->load->view('pages/configurationtache',$data);
		}
		catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
	}
	
	public function getSupprimerU($id,$IDPROFIL){
		try{
			$this->session->set_userdata('IDPROJET',$id);
			$this->session->set_userdata('idutilisateur',$id);
			$this->session->set_userdata('idprofil',$IDPROFIL);
			$this->load->view('pages/configurationU');
		}
		catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
	}
	public function getsuppressionTC(){
		try{
			$IDPROJET = $this->session->userdata('ID');
			$idtache = $this->session->userdata('idtache');
			$nom = $this->session->userdata('nom');
			$this->Tache_model-> getSuprimerDT($idtache);
			$this->Tache_model-> getSuprimer($idtache,$IDPROJET,$nom);	
			redirect('Tache/gettache/'.$IDPROJET);
		}
		catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
	}
	public function getSupprimerProjet($id){
		try{
			$data['id'] = $id;
			$this->load->view('pages/configurationprojet',$data);
		}
		catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
	}
	public function getsuppressionF($id){
		try{
			$IDPROJET = $this->session->userdata('ID');
			$idtache = $this->session->userdata('idtache');
			$nom = $this->session->userdata('nom');
			
			$this->Tache_model-> getSuprimerD($id);	
			$this->Tache_model-> getSuprimerA($id);	
			$this->Tache_model-> getSuprimerTacheprojet($id);	
			$this->Affectation_model->getSuprimer($id);
			redirect("Affectation/getAffectation_Projet");
		}
		catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
	}
	public function getsuppressionUT(){
		try{
			$idutilisateur = $this->session->userdata('idutilisateur');	
				$tacheuser = $this->Tache_model-> getResteAffaire($idutilisateur);
				var_dump(count($tacheuser));
				if(count($tacheuser)==0){
					$this->Affectation_model-> getutilisateurS($idutilisateur);
				}
				else{
					foreach($tacheuser as $t){
			
						if($t->RESTEAFFAIRE==null || $t->RESTEAFFAIRE >0){
							$this->Tache_model->configuration($idutilisateur);
							
						}
						if($t->RESTEAFFAIRE == 0 ){
							$this->Tache_model->update($idutilisateur);
							
						}
					}

				}
		
			redirect("Affectation/getAffectation_Projet");
		}
		catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
	}
	function import($categorie,$path)
	{
		$idprojet = $this->session->userdata('ID');
		$data = array();
		$data['Valiny']= $this->Utilisateur_model->getResteUtilisateurChefdeprojet($idprojet);
			$data['valiny' ]= $this->Utilisateur_model->getResteUtilisateurTeamLead($idprojet);
			$data['Val']= $this->Utilisateur_model->getTeamLeadParProjet($idprojet);
			$data['V']= $this->Utilisateur_model->getListeChefdeprojet($idprojet);
			$data['categorie']=$this->Utilisateur_model->getListeCategorie();
			
			$object = PHPExcel_IOFactory::load($path);
			$data['uniques']=array();
			$data['erreur']=array();
			$data['ligneerreur']=array();
			$data['mitambatra']=array();
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				
				for($row = 2; $row<=$highestRow; $row++)
				{
					$nomtache = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$estimation = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$datedebut = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$datefin = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$Categorie = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$categorie=$this->Affectation_model->getListeCategorie($Categorie);
					
					if(count($categorie)==0){
						$this->Affectation_model->insertcategorie($Categorie);
					}
					else{
							$testeUnique =  $this->excel_import_model-> traitement($nomtache,$datedebut,$datefin,$idprojet);
						if($testeUnique != null){
							array_push($data['uniques'],"tache existe ligne ".$row);
							$data2[]= array(
								"ligneerreur"=>"",
								"erreur"=>""
							);
						}
						else {
							
							$controleValeur = $this->excel_import_model-> controle($categorie[0]->IDCATEGORIE,$nomtache,$datedebut,$datefin,$estimation);
							array_push($data['uniques'],"");
							$data2[]= array(
								"ligneerreur"=>"erreur ligne ".$row.":: ",
								"erreur"=>$controleValeur
							);
							if(count($controleValeur)== 0) {

								$this->excel_import_model-> importData($categorie[0]->IDCATEGORIE,$idprojet,$nomtache,$estimation,$datedebut,$datefin);	
								
								//redirect("Affectation/getAffectation_Projet");	
							}
							
						}
					}
					
				
				}$data['valeur']=$data2;
			}	$this->load->view('pages/choixProfil',$data);	
	}


	public function ajouter(){
		$data = array();
		$idprojet = $this->session->userdata('ID');
		echo $idprojet;
		$idcategorie = $this->input->POST('idcategorie');
		
		$estimation = $this->input->POST('estimation');
		$nomtache = $this->input->POST('nomtache');
		$datedebut = $this->input->POST('datedebut');
		$datefin = $this->input->POST('datefin');

		$data['estimation']=$estimation ;
		$data['nomtache']=$nomtache ;
		$data['datedebut']=$datedebut;
		$data['datefin']=$datefin;

		$data['Valiny']= $this->Utilisateur_model->getResteUtilisateurChefdeprojet($idprojet);
		$data['valiny']= $this->Utilisateur_model->getResteUtilisateurTeamLead($idprojet);
		$data['Val']= $this->Utilisateur_model->getTeamLeadParProjet($idprojet);
		$data['V']= $this->Utilisateur_model->getListeChefdeprojet($idprojet);
		$data['categorie']=$this->Utilisateur_model->getListeCategorie();	
		$testeValeur = $this->excel_import_model-> controle($idcategorie,$nomtache,$datedebut,$datefin,$estimation);
		$testeUnique =  $this->excel_import_model-> traitement($nomtache,$datedebut,$datefin,$idprojet);
		
		if($testeUnique != null){
			$data['uniques']="tache existe";
			$data['erreur']="";
			$this->load->view('pages/ajoutertache',$data);
		}
		else {
			
			$controleValeur = $this->excel_import_model-> controle($idcategorie,$nomtache,$datedebut,$datefin,$estimation);
			$data['uniques']= " ";
			$data['erreur']=$controleValeur;
			if(count($controleValeur) == 0) {
				$this->excel_import_model-> importData($idcategorie,$idprojet,$nomtache,$estimation,$datedebut,$datefin);
				redirect("Affectation/getAffectation_Projet");
			}
		else $this->load->view('pages/ajoutertache',$data);
				
		}
	}
	public function erreur(){
		$data = array();
		$data['estimation']="";
		$data['nomtache']="";
		$data['datedebut']="";
		$data['datefin']="";
		$data['uniques']="";

		$data['categorie']=$this->Utilisateur_model->getListeCategorie();
		$data['erreur']='';
		$this->load->view('pages/ajoutertache',$data);
	}
	public function State(){
        try{
            $user = $this->session->userdata('ID');
           
            $data = array();
		   $data['listeTache']= $this->Affectation_model->getgantt($user);
		   //var_dump($data2['listeTache']);
		   $this->load->view('backoffice/html2pdf',$data);
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
	}
	
}