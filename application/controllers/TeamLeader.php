<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once("BaseControlleur.php");
class TeamLeader extends BaseControlleur {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
	}
	public function _example_output($output = null)
	{
		try{
			$this->load->view('backoffice/CrudTeam',(array)$output);
		}
		catch(Exception $e){
			show_error($e->getMessage().'-----'.$e->getTraceAsString());
		}
		
	}

	public function offices()
	{
		try{
			$output = $this->grocery_crud->render();
			$this->_example_output($output);
		}
		catch(Exception $e){
			show_error($e->getMessage().'-----'.$e->getTraceAsString());
		}
	}

	public function index()
	{
		try{
			$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
		}
		catch(Exception $e){
			show_error($e->getMessage().'-----'.$e->getTraceAsString());
		}
	}
    public function crud_team()
	{
		try{
			$crud = new grocery_CRUD();
			$crud->set_table('tache');
			$crud->columns('NOMTACHE', 'ESTIMATION');
			$crud->display_as('NOMTACHE','Nom de tache');
			$crud->set_subject('Customer');
            $crud->set_relation('IDCATEGORIE','categorie','CATEGORIE');
            $crud->set_relation('IDPROJET','projet','PROJET');
			$output = $crud->render();
			$this->_example_output($output);
		}
		catch(Exception $e){
			show_error($e->getMessage().'-----'.$e->getTraceAsString());
		}
    }
}
