<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Example extends CI_Controller {

public function index(){
        $data['title'] = 'hello world';
        $this->smarty->view('example.tpl',$data);
    }
}
