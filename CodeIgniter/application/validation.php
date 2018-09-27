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

//カテゴリ新規追加バリデーション
function category_save_validation($new_category,$category_list){

	$error = null;

	if (empty($new_category)){
		$error[] = "カテゴリが空欄のままです";
	}else if(preg_match("/^[ 　\t\r\n]+$/", $new_category)) {
		$error[] = "空欄のみの入力はできません";
	}

	if (array_search($new_category, $category_list)){
		$error[] = "既に存在するカテゴリです";
	}
	return $error;
}

//カテゴリ削除時の入力チェック
function category_destroy_validation($d_category_id,$category_id){

	$error = null;

	if (empty($d_category_id)){
		$error[] = "カテゴリが選択されていません";
	}

	//削除カテゴリが複数（配列）だった場合
	if (is_array($d_category_id)){
		foreach($d_category_id as $d_category_id_value){
			if (in_array($d_category_id_value, $category_id)==false){
				var_dump(in_array($d_category_id_value, $category_id));
				$error[] = "入力値エラーです";
			}
		}
	}else if (array_search($d_category_id, $category_id)==false){
		$error[] = "入力値エラーです";
	}

	return $error;

}
