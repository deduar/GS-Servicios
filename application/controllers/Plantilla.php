<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plantilla extends CI_Controller {

	protected $data = array();
  	
	function __construct()
	{
  		parent::__construct();
  		$this->load->model('PlantillaModel');
  		$this->load->model('VariableModel');
	}

	public function index()
	{
		$plantillas=new PlantillaModel;
		$data['data']=$plantillas->getAll();
   		$this->load->view('templates/header');       
   		$this->load->view('plantillas/index', $data);
   		$this->load->view('templates/footer');
	}

	public function create()
	{
		$variables=new VariableModel;
		$data['data']=$variables->getAll();
		$this->load->view('templates/header');
		$this->load->view('plantillas/create', $data);
		$this->load->view('templates/footer');      
	}

	public function store()
  	{
  		if (isset($_POST['cancel'])) 
  		{
	    	if($_POST['cancel'] == "cancel")
	    	{
	      		redirect(base_url('plantilla'));
	    	}
		}	
	    $this->form_validation->set_rules('name', 'Nombre', 'required', array('required' => 'Debe indicar la %s.')
	    );
	    $this->form_validation->set_rules('textarea', 'Plantilla', 'required', array('required' => 'La %s debe tener contenido.'));
		if ($this->form_validation->run() == FALSE)
	    {
	    	$variables=new VariableModel;
			$vars['data']=$variables->getAll();
			$this->load->view('templates/header');
			$this->load->view('plantillas/create', $vars);
			$this->load->view('templates/footer');      
	    }
	    else
	    {
	    	$plantilla=new PlantillaModel;
	   		$plantilla->insert_plantilla();
	   		redirect(base_url('plantilla'));
	    }
	  }

	public function edit($id)
 	{
	    $plantilla = $this->db->get_where('plantillas', array('id' => $id))->row();
	    $this->load->view('templates/header');
	    $this->load->view('plantillas/edit',array('plantilla'=>$plantilla));
	    $this->load->view('templates/footer');   
 	}

	public function update($id)
	{
		$plantilla=new PlantillaModel;
		$plantilla->update_plantilla($id);
		redirect(base_url('plantilla'));        
	}

		public function delete($id)
	{
	 	$this->db->where('id', $id);
	 	$this->db->delete('plantilla');
	 	redirect(base_url('plantilla'));
	}
}
