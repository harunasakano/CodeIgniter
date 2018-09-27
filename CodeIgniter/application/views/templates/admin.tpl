<head>
<html lang="ja">
<meta charset="utf-8">
<title>Blog_Admin</title>
</head>
	<body>
		<div class="container">
				<h3>記事編集</h3>
				{if is_null($post_id)}
				<form method="post">
					<div style="font-size:20px; color:pink;">admin_page</div>
					{if isset($smarty.get.title_edit)}
					<p>タイトル変更完了しました</p>
					{/if}
					<input type="text" name="title_edit" value="{$smarty.session.blog_title}" style="width:300px; height:50px; font-size:2em; margin-bottom:15px;">
						<div class="butten_change">
							<div style="margin-bottom: 15px;"><button type='submit' name='b_change' value='b_title_change'>ブログタイトル変更</button></div>
							<div style="margin-bottom: 15px;"><button type='submit' name='post' value='new_post'>新規記事作成</button></div>
						</form>
						</div>
						<div>カテゴリー</div>
						{if isset($smarty.get.add_category)}
						<p>カテゴリ追加しました</p>
						{/if}
						{if isset($smarty.get.destroy_category)}
						<p>カテゴリ削除しました</p>
						{/if}
						{if isset ($category_error)}
						{foreach $category_error as $error_v}
						<p style="color: red;">{$error_v}</p>
						{/foreach}
						{/if}
						{if isset ($c_destroy_error)}
							{if is_array($c_destroy_error)}
								{foreach $c_destroy_error as $d_error_v}
								<p style="color: red;">{$d_error_v}</p>
								{/foreach}
							{else}
							<p style="color: red;">{$c_destroy_error}</p>
							{/if}
						{/if}
						<form method="post">
						<input type="text" name="category_input" value="">
						<div style="margin-bottom: 10px; margin-top: 10px;"><button type='submit' name='edit' value='add_category'>新規カテゴリ追加</button></div>
						{if isset ($c_destroy_empty_error)}
						<p style="color: red;">{$c_destroy_empty_error}</p>
						{/if}
						<p>
						{foreach $category_list as $c_id=>$c_name}
						<input type="checkbox" name="category_list[]" value="{$c_id}">{$c_name}<br>
						{/foreach}
						</p>
						<div style="margin-bottom: 10px; margin-top: 10px;"><button type='submit' name='c_destroy' value='destroy'>削除</button></div>
						{if isset($smarty.get.update)}
						<p style="color: green;">記事変更しました！</p>
						{/if}
						{if isset($smarty.get.page)}
							{foreach $article as $keyvar=>$itemvar}
								<div class="article_list">
									<p><a href="http://localhost/codeIgniter/index.php/admin?page={$smarty.get.page}&post_id={$itemvar.0}">{$itemvar.1}</a><br>
									{$keyvar}</p>
								</div>
							{/foreach}
						</form>
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
					<div style="margin-top:10px; margin-bottom:10px">
					<a href="http://localhost/codeIgniter/index.php/blog">TOPに戻る</a>
					</div>
					</div>
				{else}
				<form method="post">
					<div class="single_edit_content">
						{if isset ($update_error)}
						{foreach $update_error as $error_v}
						<p style="color: red;">{$error_v}</p>
						{/foreach}
						{/if}
						<div class="content_title">
						<div>タイトル：</div>
						<input type="text" name="edit_title" value="{$single_query_title}">
						</div>
						<div class="content_aria">
						<div>本文：</div>
						<textarea name="edit_content" rows="8" cols="80">{$single_query_body}</textarea>
						<div>カテゴリ選択</div>
							<div>{html_options name=edit_category options=$category_list selected=$single_query_category}</div>
						<p>最終更新日：{$single_query_created}</p>
						</div>
					</div>
					<input type=hidden name="edit_id" value="{$smarty.get.post_id}">
					<div style="margin-bottom:10px;"><button type='submit' name='edit' value='change'>変更する</button></div>
					<div style="margin-bottom:30px;"><button type='submit' name='action' value='back'>記事一覧に戻る</button></div>
					</form>
				{/if}
		</div>
	</body>
</html>
