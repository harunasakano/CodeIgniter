<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Blog_model');
    }

    public function index(){
            $aaa = $this->Blog_model->get_all_posts();
            $data['query'] = $aaa;
            $this->smarty->view('post.tpl',$data);
    }
}
