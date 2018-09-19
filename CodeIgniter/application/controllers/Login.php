<?php
/*
ログイン画面
*/

require_once  APPPATH . 'validation.php';

defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("User_model");
	}

	public function index(){

		//ログインチェック
		if(isset($_SESSION['login_user'])){
		 	$data['login_user'] = $_SESSION['login_user'];
		 }

		$this->smarty->view('login.tpl');

		//postがあった時の処理
		if(isset($_POST['mode'])){
			//ユーザidとパスを変数に格納し、エスケープ処理
			$user_id = $_POST['user_id'];
			$password = $_POST['password'];
			$user_id = htmlspecialchars($user_id, ENT_QUOTES, "UTF-8");
			$password = htmlspecialchars($password, ENT_QUOTES, "UTF-8");
		}

		//ユーザID及びパスワード新規登録リクエストされた時の処理
		if(isset($_POST['registration'])){

		//エスケープ処理したIDとパスをバリデーションチェックにかける
		$check_result = null;
		$check_User_result = null;

		$check_result = validation($user_id,$password);
		$check_User_result = $this->User_model->check_duplication_userid($user_id);

			if(isset($check_result) || $check_User_result>=1){
				//バリデーションにエラーがある場合
				if(isset($check_result)){
					$data['error_text'] = $check_result;

				//データベースから同一user_id検索し帰ってきた場合
				}else if ($check_User_result>=1){
					$data['user_duplication'] = "そのユーザIDは既に使用されています";
				}
				$this->smarty->view('login.tpl',$data);

			//バリデーションOK、同一ユーザもいない場合新規登録
			}else{
				$this->User_model->save_new_user($user_id,$password);
				header('Location:http://localhost/codeIgniter/index.php/login');
				exit();
			}

		//ログインリクエストされた場合の処理
		}else if(isset($_POST['login'])){
			$login_messege = null;
			//データベースから一致するユーザIDとパスワードを検索して
			$login_result = null;
			$login_result = $this->User_model->user_matched($user_id,$password);

			//一致したデータが返ってくればログイン成功
			if (empty($login_result)==false) {
				$login_result['login_user'] = $login_result[0]->id;
				$this->session->set_userdata($login_result);

				$success_message =  "login";
				$jump_url = "http://localhost/codeIgniter/index.php/blog?success=".$success_message;
				header("Location: ".$jump_url);
				exit();

			}else{
				$login_false_message =  "ユーザ名、またはパスワードに誤りがあります";
				$data['login_result'] = $login_false_message;
				$this->smarty->view('login.tpl',$data);
			}
	}
	}
}
