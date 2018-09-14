<?php
class Blog extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("blog_model");
	}

	function index(){
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
					$this->smarty->view("post.tpl",$data);
		}

		//もし２がリクエストされたらこちらを表示
		if (isset($_GET['page'])){
			$page = $_GET['page'];
			$getData2 = $this->blog_model->get_posts($page);
			//日付をキーにして、タイトルと本文を格納
					for ($i=0; $i <count($getData2); $i++){
						$data['article'][$getData2[$i]->created][]= $getData2[$i]->id;
						$data['article'][$getData2[$i]->created][]= $getData2[$i]->title;
					}
						$this->smarty->view("post.tpl",$data);
		}

		//記事選択後、クリックされた後の表示
				if (isset($request_id)){
					$content = $this->blog_model->get_content($request_id);
					$data['single_query_created'] = $content[0]->created;
					$data['single_query_title'] = $content[0]->title;
					$data['single_query_body'] = $content[0]->body;
				}
					$this->smarty->view("post.tpl",$data);

		//戻る押下時の処理
				if(isset($_POST['action'])){
					$data['post_id'] = null;
					$request_id = null;
					$data['back'] = $_POST['action'];
					header('Location:http://localhost/codeIgniter/index.php/blog');
				}
	}
}
