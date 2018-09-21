<html lang="ja">
<head>
	<meta charset="utf-8">
</head>
<body>
	<h2>ログインフォーム</h2>
	{if isset($smarty.get.announce)}
	<p>編集にはログインが必要です</p>
	{/if}
	{if isset($smarty.session.login_user)}
	<p>{$smarty.session.login_user}さんでログイン中</p>
	{/if}
	{if isset($error_text)}
	{foreach $error_text as $error_v}
	<p style="color: red;">{$error_v}</p>
	{/foreach}
	{/if}
	{if isset($user_duplication)}
	<p style="color: red;">{$user_duplication}</p>
	{/if}
	{if isset($login_result)}
	<p style="color: red;">{$login_result}</p>
	{/if}
	<form method="post">
	<div  class="login_form">
		{if isset($smarty.get.newuser)}
		<p>新規ユーザ登録しました。再度ログインしてください</p>
		{/if}
		<div style="margin: 10px;" class="user_form">ユーザID
			<input type="text" name="user_id">
		</div>
		<div style="margin: 10px;" class="user_form">パスワード
			<input type="password" name="password">
		</div>
		<div style="margin: 10px;" class="req_button">
			<input type="hidden" name="mode" value="request">
			<button type='submit' name='login' value='login_req'>ログイン</button>
			{if isset($smarty.session.login_user)==false}
			<button type='submit' name='registration' value='registration_req'>新規登録</button>
			{/if}
		</div>
	</div>
	</form>
	<div>
	<a href="http://localhost/codeIgniter/index.php/blog">TOPに戻る</a>
	</div>
</body>
</html>
