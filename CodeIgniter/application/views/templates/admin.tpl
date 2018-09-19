<head>
<html lang="ja">
<meta charset="utf-8">
<title>Blog_Admin</title>
</head>
	<body>
		<div class="container">
			<div style="font-size:20px; color:pink;">admin_page</div>
			<h2>CodeIgniter's BLOG</h2>
				<div class="butten_change">
					<form method="post" action="">
					<button type='submit' name='action' value='back'>ブログタイトル変更</button>
				</div>
				<h3>記事編集</h3>
				{if is_null($post_id)}
					{if isset($smarty.get.page)}
						{foreach $article as $keyvar=>$itemvar}
							<div class="article_list">
								<p><a href="http://localhost/codeIgniter/index.php/admin?page={$smarty.get.page}&post_id={$itemvar.0}">{$itemvar.1}</a><br>
									{$keyvar}</p>
							</div>
						{/foreach}
					{else}
					{foreach $article as $keyvar=>$itemvar}
					<div class="article_list">
						<p><a href="http://localhost/codeIgniter/index.php/admin?post_id={$itemvar.0}">{$itemvar.1}</a><br>
							{$keyvar}</p>
					</div>
					{/foreach}
					{/if}
					<div class="pagination">
					{for $i=1 to $pagination}
						{if ($i==1)}
				    	<a href="http://localhost/codeIgniter/index.php/admin?">{$i}</a>
						{else}
						<a href="http://localhost/codeIgniter/index.php/admin?page={$i}">{$i}</a>
						{/if}
					{/for}
					</div>
				{else}
					<div class="single_edit_content">
						<div class="content_title">
						<p>タイトル：</p>
						<input type="text" name="edit_title" value="{$single_query_title}">
						</div>
						<div class="content_aria">
						<p>本文：</p>
						<textarea name="edit_content" rows="8" cols="80">{$single_query_body}</textarea>
						<p>カテゴリー</p>
						<input type="checkbox" name="edit_category">{$single_query_category}<br>
						<p>最終更新日：{$single_query_created}</p>
						</div>
					<form method="post">
					<input type=hidden name="edit_id" value="{$smarty.get.post_id}">
					<div style="margin-bottom:10px;"><button type='submit' name='edit' value='change'>変更する</button></div>
					<div style="margin-bottom:30px;"><button type='submit' name='action' value='back'>記事一覧に戻る</button></div>
					</form>
				{/if}
					</div>
	</body>
</html>
