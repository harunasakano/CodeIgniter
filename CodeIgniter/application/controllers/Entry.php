<?php
/*
編集画面
*/

require_once  APPPATH . 'validation.php';

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
				$category = $this->input->post('category');
				$title = $this->input->post('title');
				$content = $this->input->post('content');

				$error_result = entry_validation($category,$title,$content);

				if(is_null($error_result)){
					$this->blog_model->save_new_entry($category,$title,$content);
					header('Location:http://localhost/codeIgniter/index.php/blog?post=new');
				}else{
					$data['entry_error'] = $error_result;
					$this->smarty->view('form.tpl',$data);
				}
			}
    }

}
