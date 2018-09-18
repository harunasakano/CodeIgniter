<?php
/*
バリデーションメソッド
*/

//新規投稿のバリデーション
function entry_validation($category,$title,$content){

		$category = htmlspecialchars($category, ENT_QUOTES, "UTF-8");
		$title = htmlspecialchars($title, ENT_QUOTES, "UTF-8");
		$content = htmlspecialchars($content, ENT_QUOTES, "UTF-8");

		//未入力チェック
		$error = null;

		if(empty($title) && empty($content)){
				$error = "入力欄が空欄のままです";
			}else if (empty($title)) {
				$error = "タイトルが入力されていません";
			}else if (empty($content)) {
				$error = "本文が入力されていません";
			}
			return $error;
	}

//ユーザ新規登録ファンクション
function validation($user_id,$password){
	$error = null;
	//未入力チェック
	if(empty($user_id) && empty($password)){
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
	if (strlen($user_id)>=10 && strlen($password)>=8){
		$error[] = "ユーザIDは10文字、パスワードは8文字まででご指定下さい";
	}else if(strlen($user_id)>=10){
		$error[] = "ユーザIDは10文字までです";
	}else if(strlen($password)>=8){
		$error[] = "パスワードは8文字までです";
	}
	return $error;
	}
