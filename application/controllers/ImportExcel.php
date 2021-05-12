<?php 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
/**
 * Description of Import Controller
 *
 * @author TechArise Team
 *
 * @email  info@techarise.com
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    require_once("BaseControlleur.php");
class ImportExcel extends BaseControlleur {
 
    public function __construct() {
        parent::__construct();
        $this->load->model('Import_model', 'import');
    }

    public function index() {
        $data['page'] = 'import';
        $data['title'] = 'Import XLSX | TechArise';
    }

    public function ImportExcel() {

        $file = $this->input->post('file');
        $user = $this->session->userdata('ID');
    }
}
?>