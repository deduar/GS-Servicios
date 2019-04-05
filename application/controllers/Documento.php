<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documento extends CI_Controller {

	protected $data = array();
  	
  	function __construct()
  	{
    	parent::__construct();
    	$this->load->model('PlantillaModel');
  		$this->load->model('VariableModel');
  		$this->load->model('DocumentoModel');
  		$this->load->model('PlantillaVariableModel');
  		$this->load->model('DocumentoVariableModel');
  	}

  	public function index()
	{
		$plantilla=new PlantillaModel;
		$plantillas=$plantilla->getAll();
		$variable=new VariableModel;
		$variables=$variable->getAll();
		$documento=new DocumentoModel;
		$documentos=$documento->getAll();
		$documentoVariable=new DocumentoVariableModel;
		$documentoVariables=$documentoVariable->getAll();
   		$this->load->view('templates/header');       
   		$this->load->view('documentos/index', array('documentos'=>$documentos,'plantillas'=>$plantillas,'variables'=>$variables,'documentoVariables'=>$documentoVariables));
   		$this->load->view('templates/footer');
	}

	public function create()
	{
		$plantilla=new PlantillaModel;
		$plantillas=$plantilla->getAll();
		$this->load->view('templates/header');
		$this->load->view('documentos/create', array('plantillas'=>$plantillas));
		$this->load->view('templates/footer');      
	}

	public function create_variables()
	{
		if (isset($_POST['cancel']) and $_POST['cancel'] == "cancel") 
  		{
	      	redirect(base_url('documento'));
		}
		$this->form_validation->set_rules('name', 'Nombre', 'required', array('required' => 'Debe indicar la %s.')
	    );
	    $this->form_validation->set_rules('plantilla_id[]', 'Plantilla', 'required', array('required' => 'Debe seleccionar al menos una %s.'));
		if ($this->form_validation->run() == FALSE)
	    {
	    	$plantilla=new PlantillaModel;
			$plantillas=$plantilla->getAll();
			$this->load->view('templates/header');
			$this->load->view('documentos/create', array('plantillas'=>$plantillas));
			$this->load->view('templates/footer');      
	    }
	    else
	    {
	    	$variable=new VariableModel;
			$variables = $variable->getAll();
			$plantilla_variable=new PlantillaVariableModel;
			$plantilla_variables=array();
	    	$pl=new PlantillaModel;
	    	$pls=array();
	    	
	    	foreach ($this->input->post('plantilla_id') as $pl_id) {
				array_push($plantilla_variables,$plantilla_variable->getID($pl_id));
				array_push($pls, $pl->getID($pl_id));
	    	}
    		$this->load->view('templates/header');
			$this->load->view('documentos/create_variables', array('plantillas'=>$pls,'plantilla_variables'=>$plantilla_variables,'variables'=>$variables,'plantilla_id'=>$this->input->post('plantilla_id')));
			$this->load->view('templates/footer');
	    }

	}

	public function store()
  	{
  		if (isset($_POST['cancel'])) 
  		{
	    	if($_POST['cancel'] == "cancel")
	    	{
	      		redirect(base_url('documento'));
	    	}
		}

    	$documento=new DocumentoModel;
   		$documento->insert_documento();
   		$documento_id = $this->db->insert_id();

   		$documentoVariable = new DocumentoVariableModel;

   		foreach ($_POST as $key => $value) {
   			if (!in_array($key,array("name","submit"))) {
				$data = array(
					'plantilla_id' => explode("_", $key)[1],
					'documento_id' => $documento_id,
					'variable_id'=> explode("_", $key)[0],
					'valor' => $value,
					'posicion' => explode("_", $key)[2]
				);
				$documentoVariable->insert_documentoVariable($data);
   			}
   			
   		}

   		redirect(base_url('documento'));
	}

	public function preview($id)
	{
		$var = new VariableModel;
		$vars = $var->getAll();

		$documento = new DocumentoModel;
		$doc = $documento->getID($id);
		
		$documentoVariable = new DocumentoVariableModel;
		$doc_var = $documentoVariable->getID($doc[0]->id);

		$plantilla = new PlantillaModel;
		$pl = $plantilla->getID($doc[0]->plantilla_id);

		$plantilla_variable = new PlantillaVariableModel;
		$pl_var = $plantilla_variable->getID($pl[0]->id);

		$subjectVal = file_get_contents(FCPATH."/upload/plantillas/".$pl[0]->data);
		$searchVal = array();
		$replaceVal = array();
		foreach ($pl_var as $key => $variable) {
			$k=0;
			while ($vars[$k]->id != $variable->variable_id) {
				$k++;
			}
			array_push($searchVal, "[".$vars[$k]->slug.":".$variable->variable_id."]");
			array_push($replaceVal, $doc_var[$key]->valor);
		}
		$doc_ready = str_replace($searchVal, $replaceVal, $subjectVal);
		$this->load->view('templates/header');       
   		$this->load->view('documentos/preview', array('doc_ready'=>$doc_ready,'plantilla'=>$pl, 'documento'=>$doc));
   		$this->load->view('templates/footer');

	}

}