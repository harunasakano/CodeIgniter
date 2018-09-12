<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Entry extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("blog_model");
	}

    public function index(){
			$data['select_category'] = ['カテゴリ１','カテゴリ２','カテゴリ３','カテゴリ４'];
            $this->smarty->view('form.tpl',$data);
			$mode = $this->input->post('mode');

			if ($mode == 'post') {
				$this->new_entry();
			}
    }

	public function new_entry(){
	 		$category = $this->input->post('category');
	 		$title = $this->input->post('title');
	 		$content = $this->input->post('content');
	 		$this->blog_model->save_new_entry($category,$title,$content);
	 }
}
