<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	protected $data = array();
  	
  	function __construct()
  	{
    	parent::__construct();
    	$this->load->model('ProductModel');
    	$this->data['pagetitle'] = 'Products';
  	}

	public function index()
	{
		$products=new ProductModel;
		$data['data']=$products->get_products();
       	$this->load->view('templates/header');       
       	$this->load->view('products/index',$data);
       	$this->load->view('templates/footer');
	}

	public function create()
   	{
    	$this->load->view('templates/_header');
      	$this->load->view('products/create');
      	$this->load->view('templates/_footer');      
   	}

   	public function store()
   	{
        $this->form_validation->set_rules('title', 'Title', 'required',
                array('required' => 'You must provide a %s.')
        );
        $this->form_validation->set_rules('description', 'Description', 'required',
                array('required' => 'You must provide a %s.')
        );
   		if ($this->form_validation->run() == FALSE)
        {
        	$this->load->view('templates/header');
      		$this->load->view('products/create');
      		$this->load->view('templates/footer');
        }
        else
        {
        	$product=new ProductModel;
       		$product->insert_product();
       		redirect(base_url('product'));
        }
    }

    public function edit($id)
   	{
       $product = $this->db->get_where('products', array('id' => $id))->row();
       $this->load->view('templates/header');
       $this->load->view('products/edit',array('product'=>$product));
       $this->load->view('templates/footer');   
   	}

   	public function update($id)
   	{
        $product=new ProductModel;
       	$product->update_product($id);
   		redirect(base_url('product'));        
   	}

   	public function delete($id)
   {
       $this->db->where('id', $id);
       $this->db->delete('products');
       redirect(base_url('product'));
   }

}