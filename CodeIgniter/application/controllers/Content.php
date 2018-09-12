<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Content extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("blog_model");
	}

	function index(){
		$display = $this->input->post('req');
		$this->smarty->view('content.tpl');

		if ($display == 'id') {
			$getcontent = $this->blog_model->get_content();
		}
	}
}
