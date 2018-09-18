<head>
<html lang="ja">
<meta charset="utf-8">
<title>Blog_Admin</title>
</head>
	<body>
		<div class="container">
			<h2><a href="http://localhost/codeIgniter/index.php/entry">CodeIgniter's BLOG</a></h2>
				<div class="title_change">
					<form method="post" action="">
					<a href="">ブログタイトル変更</a>
				</div>
				{if is_null($post_id)}
						{foreach $article as $keyvar=>$itemvar}
							<div class="article_list">
								<p><a href="http://localhost/codeIgniter/index.php/admin?post_id={$itemvar.0}">{$itemvar.1}</a><br>
									{$keyvar}</p>
							</div>
						{/foreach}
					</div>
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
					<div class="single_content">
						<h3>{$single_query_title}</h3>{$single_query_created}<p>{$single_query_body}</p>
					</div>
					<form method="post">
					<button type='submit' name='action' value='back'>記事一覧に戻る</button>
					</form>
				{/if}
		</div>
	</body>
</html>
