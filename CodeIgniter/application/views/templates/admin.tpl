<head>
<html lang="ja">
<meta charset="utf-8">
<title>Blog_Admin</title>
</head>
	<body>
		<form method="post">
		<div class="container">
		</form>
				<h3>記事編集</h3>
				{if is_null($post_id)}
					<div style="font-size:20px; color:pink;">admin_page</div>
					{if isset($smarty.get.title_edit)}
					<p>タイトル変更完了しました</p>
					{/if}
					<input type="text" name="title_edit" value="{$smarty.session.blog_title}" style="width:300px; height:50px; font-size:2em; margin-bottom:15px;">
						<div class="butten_change">
							<div style="margin-bottom: 15px;"><button type='submit' name='b_change' value='b_title_change'>ブログタイトル変更</button></div>
							<div style="margin-bottom: 15px;"><button type='submit' name='post' value='new_post'>新規記事作成</button></div>
						</div>
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
					<div>カテゴリー</div>
					<input type="text" name="category_input">
					<div style="margin-bottom: 10px; margin-top: 10px;"><button type='submit' name='edit' value='change'>新規追加</button></div>
					<div style="margin-bottom: 10px; margin-top: 10px;"><button type='submit' name='action' value='back'>削除</button></div>
				{else}
				<form method="post">
					<div class="single_edit_content">
						<div class="content_title">
						<div>タイトル：</div>
						<input type="text" name="edit_title" value="{$single_query_title}">
						</div>
						<div class="content_aria">
						<div>本文：</div>
						<textarea name="edit_content" rows="8" cols="80">{$single_query_body}</textarea>
						<p>最終更新日：{$single_query_created}</p>
						</div>
					</div>
				</form>
					<form method="post">
					<input type=hidden name="edit_id" value="{$smarty.get.post_id}">
					<div style="margin-bottom:10px;"><button type='submit' name='edit' value='change'>変更する</button></div>
					<div style="margin-bottom:30px;"><button type='submit' name='action' value='back'>記事一覧に戻る</button></div>
					</form>
				{/if}
					</div>
	</body>
</html>
