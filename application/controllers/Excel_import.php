<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Excel_import extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Europe/Paris');
		$this->load->model('excel_import_model');
		$this->load->library('excel');
	}

	function import()
	{
		$categorie = $this->input->get('categorie');
		$user = $this->session->userdata('ID');
		$data = array();
		if(isset($_FILES["file"]["name"]))
		{
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();

				for($row=2; $row<=$highestRow; $row++)
				{
					$nomtache = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$estimation = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$datedebut = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$datefin = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					 $data['NOMTACHE'] = $nomtache;
					  
					/*$data[] = array(
						'NOMTACHE'		=>	$nomtache,
						'ESTIMATION'		=>	$estimation,
						'DateDebut'		=>	$datedebut,
						'DateFin'		=>	$datedebut,
					);*/
					//var_dump($data['NOMTACHE'] -> $nomtache);
				}var_dump($data['NOMTACHE']);
			}
			//$this->excel_import_model-> importData($idcategorie,$idprojet,$nomtache,$estimation,$datedebut,$datefin);
			//echo 'Data Imported successfully';
		}	
	}
}

?>