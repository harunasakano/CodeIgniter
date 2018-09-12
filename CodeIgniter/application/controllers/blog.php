<?php
class Blog extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("blog_model");
	}

	function index(){
		$request = $_GET;
		var_dump($request);

		$this->load->helper('url');
		$data['url'] = base_url();
		//blog_modelのget_all_postメソッドを実行してデータをqueryに格納
		$getData = $this->blog_model->get_all_posts();
		//日付をキーにして、タイトルと本文を格納
				for ($i=0; $i <count($getData); $i++) {
					$data['article'][$getData[$i]->created][]= $getData[$i]->id;
					$data['article'][$getData[$i]->created][]= $getData[$i]->title;
					$data['article'][$getData[$i]->created][]= $getData[$i]->body;
					}
					$this->smarty->view("post.tpl",$data)
	}

	function get_content(){
			$display = $this->input->post('req');
			$this->smarty->view('content.tpl');

			if ($display == 'id') {
				$getcontent = $this->blog_model->get_content();
			}
	}
}
