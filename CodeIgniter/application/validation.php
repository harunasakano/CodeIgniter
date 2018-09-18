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
