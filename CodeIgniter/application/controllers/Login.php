<?php
class Login extends CI_Controller {

	function __construct(){
		parent::__construct();

	}

	public function index(){

		$this->smarty->view('login.tpl');
		var_dump($_POST);

		//ユーザID及びパスワード新規登録リクエストされた時の処理
		if(isset($_POST['registration'])){

		//ユーザidとパスを変数に格納し、エスケープ処理
		$user_id = $_POST['user_id'];
		$password = $_POST['password'];
		$user_id = htmlspecialchars($user_id, ENT_QUOTES, "UTF-8");
		$password = htmlspecialchars($password, ENT_QUOTES, "UTF-8");

		//エスケープ処理したIDとパスをバリデーションチェックにかける
		$check_result = $this->validation($user_id,$password);

			if(isset($check_result)){
				$data['error_text'] = $check_result;
				$this->smarty->view('login.tpl',$data);
			}else{
			//バリデーションOK
			//データベースからuser_id検索し、同一のものがなければ新規登録する
			//もう一度ログイン画面へいく
				echo "バリデーションOK";
			}

		//ログインリクエストされた場合の処理
		}else if(isset($_POST['login'])){
			//データベースから一致するユーザIDとパスワードを検索して
			//一致したらログイン成功
			echo "login_req";
		}
	}

	//ユーザIDが半角英数字10文字満たし
	//パスワードが半角英数字8文字満たしてたら
	function validation($user_id,$password){
		$error = null;
		//未入力チェック
		if(is_null($user_id) && is_null($password)){
			$error[] = "入力欄が空欄のままです";
		}else if (empty($user_id)) {
			$error[] = "ユーザIDが入力されていません";
		}else if(empty($password)){
			$error[] = "パスワードが入力されていません";
		}

		//半角英数チェック
		if (preg_match("/^[a-zA-Z0-9]+$/", $user_id)==false && preg_match("/^[a-zA-Z0-9]+$/", $password)==false) {
    		$error[] = "ユーザID・パスワードに指定できるのは半角英数字のみです";
		}else if(preg_match("/^[a-zA-Z0-9]+$/", $user_id)==false){
			$error[] = "ユーザIDに指定できるのは半角英数字のみです";
		}else if(preg_match("/^[a-zA-Z0-9]+$/", $password)==false){
			$error[] = "パスワードに指定できるのは半角英数字のみです";
		}

		//文字数チェック
		if (strlen($user_id)<8 && strlen($password<8)){
			$error[] = "ユーザID・パスワードは8文字以上でご指定下さい";
		}else if(strlen($user_id)<8){
			$error[] = "ユーザIDは8文字以上でご指定下さい";
		}else if(strlen($password)<8){
			$error[] = "パスワードは8文字以上でご指定下さい";
		}

		return $error;
	}
}
