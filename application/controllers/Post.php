<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {
    
    public function index(){
        $this->load->model('PostModel','PM',true);
        $data['Posts'] = $this->PM->getAll();

        $title = 'Title goes here';

        //load the list page view
        $this->load->view('templates/header', $title);
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer');
    }
}