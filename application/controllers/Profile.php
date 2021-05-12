<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once("BaseControlleur.php");
class Profile extends BaseControlleur {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
	}
	public function _example_output($output = null)
	{
		try{
			$this->load->view('backoffice/crudProfile',(array)$output);
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
	public function crud_profil()
	{
		try{
			$crud = new grocery_CRUD();
			session_start();
			$crud->set_table('profile');
			$crud->columns('TYPE');
			$crud->display_as('TYPE','type d\'utilisateur');
		    $crud->set_subject('Customer');
			$output = $crud->render();
            $this->_example_output($output);
		}
		catch(Exception $e){
			show_error($e->getMessage().'-----'.$e->getTraceAsString());
		}
    }
}
