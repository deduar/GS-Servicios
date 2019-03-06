<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	protected $data = array();
  	
	function __construct()
	{
  	parent::__construct();
  	//$this->load->model('VariableModel');
	}

	public function index()
	{
		//$variables=new VariableModel;
		//$data['data']=$variables->getAll();
   		$this->load->view('templates/header');       
   		$this->load->view('main/index');
   		$this->load->view('templates/footer');
	}

}
