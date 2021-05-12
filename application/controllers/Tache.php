<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once("BaseControlleur.php");

class Tache extends BaseControlleur {
	function __construct(){
		parent ::__construct();	
   }
   public function AjouterDevellopeur()
	{
        try{
        $data= array();
        $data['Valiny']= $this->Utilisateur_model->getResteUtilisateurT();
        $this->load->view('pages/TeamDeveloppeur',$data);
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    public function getAffectation_Utilisateur()
	{
		try{
			$limite = 0; $offset=3;
			$data = array();
			$nombre = array();
			$data2=$this->Affectation_model->getCount();
			$data['Valiny']= $this->Affectation_model->getListeProjetPaginer($offset,$limite);
			$data['page'] = $data2/$offset;
			$this->load->view('pages/ListeProjet',$data);
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
			$this->load->view('pages/ListeProjet',$data);
		
		}
		catch(Exception $e){
			show_error($e->getMessage().'-----'.$e->getTraceAsString());
		}
	}

	public function ListeDeveloppeur($idprojet)
	{
        try{
        $data= array();
        $this->session->set_userdata('IDPEOJEET',$idprojet);
        $data['Valiny']= $this->Tache_model->getListeDeveloppeur($idprojet);
        $data['valeur']= $this->Tache_model->getTacheAffecter($idprojet);
        $data['reponse']= $this->Tache_model->getTacheFini($idprojet);
        $data['resp']= $this->Tache_model-> getTacheAffecterProjet($idprojet);
        $data['v']= $this->Tache_model->getNonAfficher($idprojet);
        $data['val']= $this->Tache_model->getDepasser($idprojet);
        $data['response']= $this->Tache_model->getListeTeamLead($idprojet);


            $this->load->view('backoffice/Developpeur',$data);
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    public function AjouterTache()
	{
        try{
            $utilisateur = $this->input->POST('utilisateur');
            $team = $this->input->POST('team');
            $EMAIL = $this->input->POST('email');
            $tache = $this->input->POST('tache');
            $idprojet = $this->input->POST('idprojet');
            $this->Affectation_model->getDetailAffichage($tache, $utilisateur, $idprojet);
            //$this->sendEmail($EMAIL);
           redirect('Tache/ListeDeveloppeur/'.$idprojet);
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    public function getDetailAffectation($id){
        try{
           $user= $this->session->userdata('IDPEOJEET');
            $data= array();
            $data['Valiny']= $this->Affectation_model->getDetail($id,$user);
                $this->load->view('pages/DetailAffectation',$data);
            }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    public function UpdateTache(){
        try{
            $passer = $this->input->POST('passer');
            $affaire = $this->input->POST('affaire');
            $tache = $this->input->POST('tache');
            $user= $this->session->userdata('IDPEOJEET');
            $utilisateur = $this->input->get('utilisateur');
            $data= $this->Affectation_model->UpdateDetailAffectation($passer,$affaire,$tache);
               redirect('Tache/ListeDeveloppeur/'.$user);
            }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    public function Statistique(){
        try{
            $this->load->view('backoffice/html2pdf');
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    
    public function aaa(){
        try{
            $this->load->view('pages/a');
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    public function getRechercheGlobale(){
        try{
           
            $this->load->view('pages/Recherche');
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    public function getRechercheGlobaleAjax(){
        try{
            $valeur = $this->input->post('idprojet');
            $data = array();
            $data['valiny']= $this->Affectation_model->getRechercheGlobale($valeur);
            $this->load->view('pages/ResultatRecherche',$data);
          
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    public function Description($type,$id){
        try{
            $this->session->set_userdata('idtache',$id);
            if($type== 'utilisateur'){
                $data['valiny']= $this->Affectation_model->descriptionUtilisateur($id);
                $this->load->view('pages/utilisateur',$data);
            }
            else{
                $data['valiny']= $this->Affectation_model->descriptiontache($id);
                $this->load->view('pages/tache',$data);
            }
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    public function gettache($off){
        try{
            
            $data['valiny']= $this->Affectation_model->getListeT($off);
            $this->load->view('pages/Uploadtache',$data);
        }
        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    public function upload(){
        try{
            $data = array();
            // If file upload form submitted
            if($this->input->post('fileSubmit') && !empty($_FILES['files']['name'])){
                $filesCount = count($_FILES['files']['name']);
                for($i = 0; $i < $filesCount; $i++){
                    $_FILES['file']['name']     = $_FILES['files']['name'][$i];
                    $_FILES['file']['type']     = $_FILES['files']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                    $_FILES['file']['error']     = $_FILES['files']['error'][$i];
                    $_FILES['file']['size']     = $_FILES['files']['size'][$i];
                    
                    // File upload configuration
                    $uploadPath = 'assets/uploads/files/';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    
                    // Load and initialize upload library
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    
                    // Upload file to server
                    if($this->upload->do_upload('file')){
                        // Uploaded file data
                        $fileData = $this->upload->data();
                        $uploadData[$i]['file_name'] = $fileData['file_name'];
                        $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
                    }
                }
                $idtache =$this->input->POST('id');
                $idprojet =$this->input->POST('idprojet');
                $fileToUpload = $this->input->post('fileToUpload');
                $i = 0;
                $chemin = "";
                    foreach($uploadData as $row){
                       $chemin = $chemin."../../assets/uploads/files/".$row['file_name']."|";
                    }
;               
                $this->Profilemodel->getInsert($chemin,$idTaches);

            }
        }

        catch(Exception $e){
            show_error($e->getMessage().'-----'.$e->getTraceAsString());
        }
    }
    /*===================== Pagition de liste de projet==================*/
   public function getListetache()
   {
       try{
           $limite = 0; $offset=3;
           $data = array();
           $nombre = array();
           $data2=$this->Tache_model->getCount();
           $data['Valiny']= $this->Tache_model->getListeProjetPaginer($offset,$limite);
           $data['page'] = $data2/$offset;
           $this->load->view('pages/CRUDtache',$data);
       }
       catch(Exception $e){
           show_error($e->getMessage().'-----'.$e->getTraceAsString());
       }
   }
   public function getListetachepaginer($of)
   {
       try{
           $offset=3;
           $limite = ($of-1)*$offset; 
           $data = array();
           $nombre = array();
           $data2=$this->Tache_model->getCount();
           $data['Valiny']= $this->Tache_model->getListeProjetPaginer($offset,$limite);
           $data['page'] = $data2/$offset;
           $this->load->view('pages/CRUDtache',$data); 
       }
       catch(Exception $e){
           show_error($e->getMessage().'-----'.$e->getTraceAsString());
       }
   }
   public function getSuprimer($of)
   {
       try{ 
           $this->Tache_model->getSuprimer($of);
          redirect("Tache/getListetache");
       }
       catch(Exception $e){
           show_error($e->getMessage().'-----'.$e->getTraceAsString());
       }
   }
   public function pageUpdate($of){
    try{ 
        $this->Tache_model->tachewhere($of);
       $this->load->view("page/update");
    }
    catch(Exception $e){
        show_error($e->getMessage().'-----'.$e->getTraceAsString());
    }
   }
   public function sendEmail(){
    //$this->load->config('email');
    //$this->load->library('email');
 
  
       
    //$this->load->config('email');
    $this->load->library('email');

    $from = $this->config->item('smtp_user');
  //  $to = $this->input->post('to');
    $subject = $this->input->post('subject');
    $message = $this->input->post('message');

    $this->email->set_newline("\r\n");
    $this->email->from('riana.andrianarison@gmail.com');
    $this->email->to('riana.andrianarison@gmail.com');
    $this->email->subject("affectation projet");
    $this->email->message("bonjours");

    if ($this->email->send()) {
        echo 'Your Email has successfully been sent.';
    } else {
        show_error($this->email->print_debugger());
    }
}
}