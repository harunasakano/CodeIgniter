<head>
<html lang="ja">
<meta charset="utf-8">
<title>記事投稿</title>
</head>
<body>
	{if isset ($entry_error)}
	<p style="color: red;">{$entry_error}</p>
	{/if}
	<div class="post_aria">
		<h2>記事投稿フォーム</h2>
		<form method="post" action="">
			<input type="hidden" name="mode" value="post" >
			<table class="input_form">
				<tr>
					<td>記事タイトル</td>
					<td><input type="text" name="title" value="" /></td>
				</tr>
				<tr>
					<td>カテゴリ選択</td>
					<td>{html_options name=category options=$category_list selected=$category_list}</td>
				</tr>
				<tr>
					<td>本文</td>
				<td><textarea name="content" cols="60" rows="5"></textarea></td>
				</tr>
				<tr>
					<td><input type="submit" value="作成"></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>
