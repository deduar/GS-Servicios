<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Variable extends CI_Controller {

  protected $data = array();
  	
	function __construct()
	{
  	parent::__construct();
  	$this->load->model('VariableModel');
	}

	public function index()
	{
		$variable=new VariableModel;
		$variables=$variable->getAll();
   	$this->load->view('templates/header');       
   	$this->load->view('variables/index', array('variables'=>$variables));
   	$this->load->view('templates/footer');
	}

	public function create()
  {
  	$this->load->view('templates/header');
  	$this->load->view('variables/create');
  	$this->load->view('templates/footer');      
  }

  public function store()
  {
    if (isset($_POST['cancel'])) 
    {
      if($_POST['cancel'] == "cancel")
      {
        redirect(base_url('variable'));
      }
    }
    $this->form_validation->set_rules('description', 'Description', 'required', array('required' => 'Debe indicar la %s.')
    );
    $this->form_validation->set_rules('slug', 'Slug', 'required|is_unique[variables.slug]', array('required' => 'Debe indicar el %s.','is_unique' => 'El Slug debe ser Unico y no Repetido - Ya existe !!!'));
		if ($this->form_validation->run() == FALSE)
    {
    	$this->load->view('templates/header');
  		$this->load->view('variables/create');
  		$this->load->view('templates/footer');
    }
    else
    {
    	$variable=new VariableModel;
   		$variable->insert_variable();
   		redirect(base_url('variable'));
    }
  }

  public function edit($id)
 	{
    $variable = $this->db->get_where('variables', array('id' => $id))->row();
    $this->load->view('templates/header');
    $this->load->view('variables/edit',array('variable'=>$variable));
    $this->load->view('templates/footer');   
 	}

  public function update($id)
  {
    $product=new VariableModel;
   	$product->update_variable($id);
  	redirect(base_url('variable'));        
  }

  	public function delete($id)
  {
     $this->db->where('id', $id);
     $this->db->delete('variable');
     redirect(base_url('variable'));
  }

}