<?php
class Blog extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("blog_model");
	}

	function index(){
		//blog_modelのget_all_postメソッドを実行してデータをqueryに格納
		$data['query'] = $this->blog_model->get_all_posts();
		$this->load->view("index",$data);
	}
