<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/employee
	 *	- or -
	 * 		http://example.com/index.php/employe/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	protected $data = array();
  	
  	function __construct()
  	{
    	parent::__construct();
    	$this->data['pagetitle'] = 'My CodeIgniter App';
  	}

	public function index()
	{
		//$this->load->view('templates/main.php');
		$data = array(
    		'title' => 'Title goes here',
		);
 
		$this->load->library('template');
		$this->template->load('default', 'content', $data);
	}

	public function view($page = 'home')
	{
		if( !file_exists('application/views/pages/'.$page.'.php')) {
	 		show_404();
	 	}
	 	$this->load->view('pages/'.$page);
	 }


	public function view2($the_view = NULL)
	{
		$data = array(
    		'title' => 'Title goes here',
		);
		$this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view,$this->data, TRUE);
		$this->load->view('templates/master_view', $this->data);
  	}

}
