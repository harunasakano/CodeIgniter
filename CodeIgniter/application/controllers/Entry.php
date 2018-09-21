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
		$this->load->model("Admin_model");
	}

    public function index(){

			//最初にログインチェック
			if(is_null($_SESSION['login_user'])){
				header('Location:http://localhost/codeIgniter/index.php/login?announce');
				exit();
			}

			//カテゴリ一覧呼び出し
			$answer = $this->Admin_model->get_blog_category();

			for ($i=0; $i<count($answer); $i++) {
				$category_list[$answer[$i]->id] = $answer[$i]->name;
				$category_id[] = $answer[$i]->id;
			}

			$data['category_list'] = $category_list;
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
