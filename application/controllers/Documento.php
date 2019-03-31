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
   		$this->load->view('templates/header');       
   		$this->load->view('documentos/index', array('documentos'=>$documentos,'plantillas'=>$plantillas,'variables'=>$variables));
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
		if (isset($_POST['cancel'])) 
  		{
	    	if($_POST['cancel'] == "cancel")
	    	{
	      		redirect(base_url('documento'));
	    	}
		}
		$this->form_validation->set_rules('name', 'Nombre', 'required', array('required' => 'Debe indicar la %s.')
	    );
	    $this->form_validation->set_rules('plantilla_id', 'Plantilla', 'required', array('required' => 'Debe seleccionar una %s.'));
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
	    	$pl=new PlantillaModel;
			$plantilla = $pl->getID($this->input->post('plantilla_id'));
			$variable=new VariableModel;
			$variables = $variable->getAll();
			$plantilla_variable=new PlantillaVariableModel;
			$plantilla_variables=$plantilla_variable->getPlantillaID($this->input->post('plantilla_id'));
			$this->load->view('templates/header');
			$this->load->view('documentos/create_variables', array('plantilla'=>$plantilla,'plantilla_variables'=>$plantilla_variables,'variables'=>$variables));
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

		$pl=new PlantillaModel;
		$plantilla = $pl->getID($this->input->post('plantilla_id'));
		$variable=new VariableModel;
		$variables = $variable->getAll();
		$plantilla_variable=new PlantillaVariableModel;
		$plantilla_variables=$plantilla_variable->getPlantillaID($this->input->post('plantilla_id'));

		foreach ($plantilla_variables as $variable) {
			$k=0;
			while ($variables[$k]->id != $variable->variable_id) {
				$k++;
			}

			$this->form_validation->set_rules("var_".$variable->posicion, $variables[$k]->description, 'required', array('required' => 'Debe indicar la variable %s.'));
		}

		if ($this->form_validation->run() == FALSE)
	    {
	    	$pl=new PlantillaModel;
			$plantilla = $pl->getID($this->input->post('plantilla_id'));
			$variable=new VariableModel;
			$variables = $variable->getAll();
			$plantilla_variable=new PlantillaVariableModel;
			$plantilla_variables=$plantilla_variable->getPlantillaID($this->input->post('plantilla_id'));
			$this->load->view('templates/header');
			$this->load->view('documentos/create_variables', array('plantilla'=>$plantilla,'plantilla_variables'=>$plantilla_variables,'variables'=>$variables));
			$this->load->view('templates/footer');
	    }
	    else
	    {
	    	$documento=new DocumentoModel;
	   		$documento->insert_documento();

	   		$documentoVariable=new DocumentoVariableModel;
	   		$documento_id = $this->db->insert_id();
	   		
	   		$k=1;
	   		foreach ($plantilla_variables as $var) {
	   			$data = array(
	   				'plantilla_id' => $this->input->post('plantilla_id'),
	   				'documento_id' => $documento_id,
	   				'variable_id' => $var->variable_id,
	   				'valor' => $this->input->post('var_'.$k),
	   				'posicion' => $k
	   			);
	   			$k++;
	   			$documentoVariable->insert_documentoVariable($data);
	   		}
	   		redirect(base_url('documento'));
	    }
	}

}