<?php
/*
編集画面
*/

require_once  APPPATH . 'validation.php';

defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {

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
			$this->smarty->view('admin.tpl',$data);

			//セッションにブログタイトル格納
			 $blog_data = $this->Admin_model->get_blog_title();
			 $blog_title['blog_title'] = $blog_data[0]->title;
			 $this->session->set_userdata($blog_title);

			$data['post_id'] = null;
			$data['back'] = null;
			$request_id = null;

			if (isset($_GET['post_id'])){
				$request_id = $_GET['post_id'];
				$data['post_id'] = $request_id;
			}

			//ページ送りに表示するやつ
			$count = $this->blog_model->get_count_all_posts();
			$pagination = ceil($count/5);
			$data['pagination'] = $pagination;

			//記事のリンク渡し
			$this->load->helper('url');
			$data['url'] = base_url();

			//blog_modelのget_all_postメソッドを実行してデータをqueryに格納
			if (isset($_GET['page'])==false){
			$getData = $this->blog_model->get_new_posts();
			//日付をキーにして、タイトルと本文を格納
					for ($i=0; $i <count($getData); $i++) {
						$data['article'][$getData[$i]->created][]= $getData[$i]->id;
						$data['article'][$getData[$i]->created][]= $getData[$i]->title;
					}
						$this->smarty->view('admin.tpl',$data);
			}

			//もし最新以外のページがリクエストされたらこちらを表示
			if (isset($_GET['page'])){
				$page = $_GET['page'];
				$getData_old = $this->blog_model->get_posts($page);
				//日付をキーにして、タイトルと本文を格納
						for ($i=0; $i <count($getData_old); $i++){
							$data['article'][$getData_old[$i]->created][]= $getData_old[$i]->id;
							$data['article'][$getData_old[$i]->created][]= $getData_old[$i]->title;
						}
							$this->smarty->view('admin.tpl',$data);
			}

			//カテゴリ追加押下時の処理
			if (isset($_POST['edit']) && isset($_POST['category_input'])) {
				$new_category = $_POST['category_input'];
				$new_category = htmlspecialchars($new_category);
				$error_result = category_save_validation($new_category,$category_list);

				if(isset($error_result)){
					$data['category_error'] = $error_result;
					$this->smarty->view('admin.tpl',$data);

				}else{
				$this->Admin_model->save_blog_category($new_category);
				header('Location:http://localhost/codeIgniter/index.php/admin?add_category');
				}
			}


			//カテゴリ削除押下時の処理
			if((isset($_POST['c_destroy']) && $_POST['c_destroy'] == 'destroy' ) && isset($_POST['category_list'])) {
				$d_category_id = $_POST['category_list'];

				$error_result_c = category_destroy_validation($d_category_id,$category_id);

				if(isset($error_result_c)){
					$data['c_destroy_error'] = $error_result_c;
					$this->smarty->view('admin.tpl',$data);
				}else{
					$this->Admin_model->destroy_blog_category($d_category_id);
					header('Location:http://localhost/codeIgniter/index.php/admin?destroy_category');
				}

			}else if(isset($_POST['category_list'])==false && isset($_POST['c_destroy'])){
				$data['c_destroy_empty_error'] = "カテゴリが選択されていません";
				$this->smarty->view('admin.tpl',$data);
			}

			//記事選択後、クリックされた後の表示
			if (isset($request_id)){
				$content = $this->blog_model->get_content($request_id);
				$data['single_query_created'] = $content[0]->created;
				$data['single_query_title'] = $content[0]->title;
				$data['single_query_body'] = $content[0]->body;
				$data['single_query_category'] = $content[0]->category_id;
				}
				$this->smarty->view('admin.tpl',$data);

			//変更ボタンが押された時の処理
			$edit = null;
			$edit = $this->input->post('edit');

			if ($edit == 'change') {
				$edit_id = $_POST['edit_id'];
				$category = $this->input->post('edit_category');
				$title = $this->input->post('edit_title');
				$content = $this->input->post('edit_content');
				$error_result = entry_validation($category,$title,$content);

			 if(is_null($error_result)){
			 	$this->Admin_model->update_entry($edit_id,$category,$title,$content);
			 	header('Location:http://localhost/codeIgniter/index.php/admin?update');
			 }else{
			 	$data['update_error'] = $error_result;
			 	$this->smarty->view('admin.tpl',$data);
			 }
		 	}

			//新規作成ボタン押下時の処理
			if (isset($_POST['post']) && $_POST['post']=='new_post'){
				header('Location:http://localhost/codeIgniter/index.php/entry');
				exit();
			}

			//ブログタイトル変更押下時の処理
			if (isset($_POST['b_change']) && $_POST['b_change']=='b_title_change'){
				if(is_null($_SESSION['login_user'])){
					header('Location:http://localhost/codeIgniter/index.php/login');
					exit();
				}else{
					$b_title = $_POST['title_edit'];
					$b_title = htmlspecialchars($b_title);

					if($b_title == $_SESSION['blog_title']){
					header('Location:http://localhost/codeIgniter/index.php/admin');
					exit();

					}else{
					$this->Admin_model->blog_new_title_save($b_title);
					header('Location:http://localhost/codeIgniter/index.php/admin?title_edit');
					exit();
					}
				}
			}

			//戻る押下時の処理
			if (isset($_POST['action']) && isset($_GET['page'])){
				$page = $_GET['page'];
				$data['post_id'] = null;
				$request_id = null;
				$data['back'] = $_POST['action'];
				$url = 'http://localhost/codeIgniter/index.php/admin?page='.$page;
				header('Location: '.$url);
				exit();

			}else if (isset($_POST['action'])){
				$data['post_id'] = null;
				$request_id = null;
				$data['back'] = $_POST['action'];
				header('Location:http://localhost/codeIgniter/index.php/admin');
				exit();
			}
	}
}
