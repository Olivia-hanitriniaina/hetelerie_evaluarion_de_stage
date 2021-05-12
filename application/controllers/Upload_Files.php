<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once("BaseControlleur.php");
class Upload_Files extends BaseControlleur {
    function upload(){
        $tache = $this->session->userdata('idtache');
        if(!empty($_FILES['files']['name'])){
            $filesCount = count($_FILES['files']['name']);
        
            for($i = 0; $i < $filesCount; $i++){
               
                $_FILES['file']['name']     = $_FILES['files']['name'][$i];
                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
                
                // File upload configuration
                $uploadPath = './assets/uploads/files/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif|txt';
                
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
            $idTaches = $this->input->post('id');
            $idprojet = $this->input->post('idprojet');
            $i = 0;
                foreach($uploadData as $row){
                   $chemin = $row['file_name'];

                }
                   
                $this->Excel_import_model->getupdatetache($idTaches,$chemin,$idprojet);
                redirect("Tache/Description/Tache/".$tache.'/'.$idprojet);
        }
    }

}