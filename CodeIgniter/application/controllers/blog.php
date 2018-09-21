<?php
/*
メイン画面
*/
class Blog extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("blog_model");
		$this->load->model("Admin_model");
	}

	function index(){
		//セッションにブログタイトル格納
		$blog_data = $this->Admin_model->get_blog_title();
		$blog_title['blog_title'] = $blog_data[0]->title;
		$this->session->set_userdata($blog_title);

		//ログアウトリクエスト時
		if (isset($_POST['logout'])){
			unset($_SESSION['login_user']);
			header('Location:http://localhost/codeIgniter/index.php/blog?logout=done');
			exit();
		}

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

		//もし最新以外のページ送りがリクエストされたらこちらを表示
		if (isset($_GET['page'])){
			$page = $_GET['page'];
			$getData_old = $this->blog_model->get_posts($page);
			//日付をキーにして、タイトルと本文を格納
					for ($i=0; $i <count($getData_old); $i++){
						$data['article'][$getData_old[$i]->created][]= $getData_old[$i]->id;
						$data['article'][$getData_old[$i]->created][]= $getData_old[$i]->title;
					}
						$this->smarty->view('admin.tpl',$data);
		}else{
		//最新5件を表示
		$getData = $this->blog_model->get_new_posts();
		//日付をキーにして、タイトルと本文を格納
				for ($i=0; $i <count($getData); $i++) {
					$data['article'][$getData[$i]->created][]= $getData[$i]->id;
					$data['article'][$getData[$i]->created][]= $getData[$i]->title;
				}
					$this->smarty->view('post.tpl',$data);
		}

		//記事選択後、クリックされた後の表示
				if (isset($request_id)){
					$content = $this->blog_model->get_content($request_id);
					$data['single_query_created'] = $content[0]->created;
					$data['single_query_title'] = $content[0]->title;
					$data['single_query_body'] = $content[0]->body;
					$category_id = $content[0]->category_id;
					$category_title = $this->blog_model->get_category($category_id);
					$data['single_query_category'] = $category_title;
				}
					$this->smarty->view("post.tpl",$data);

		//戻る押下時の処理
				if(isset($_POST['action']) && isset($_GET['page'])){
					$page = $_GET['page'];
					$data['post_id'] = null;
					$request_id = null;
					$data['back'] = $_POST['action'];
					$blog_url = 'http://localhost/codeIgniter/index.php/blog?page='.$page;
					header('Location: '.$blog_url);

				}else if(isset($_POST['action'])){
					$data['post_id'] = null;
					$data['post_id'] = null;
					$request_id = null;
					$data['back'] = $_POST['action'];
					header('Location:http://localhost/codeIgniter/index.php/blog');
					exit();
				}
	}
}
