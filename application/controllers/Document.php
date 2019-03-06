<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends CI_Controller {

	protected $data = array();
  	
  	function __construct()
  	{
    	parent::__construct();
    	$this->load->model('VariableModel');
    	$this->data['pagetitle'] = 'Products';
  	}

  	public function index()
	{
		//print_r($this->router->routes); die();
		$this->load->view('templates/header');
       	$this->load->view('documents/index');
       	$this->load->view('templates/footer');  
	}

	public function document()
	{
		//print_r($this->router->routes); die();
		$this->load->view('templates/header');
       	$this->load->view('documents/documentos');
       	$this->load->view('templates/footer');  
	}

	public function template()
	{
		$this->load->view('templates/header');
       	$this->load->view('documents/plantillas');
       	$this->load->view('templates/footer');  
	}

	public function user()
	{
		$this->load->view('templates/header');
       	$this->load->view('documents/usuarios');
       	$this->load->view('templates/footer');  
	}

}