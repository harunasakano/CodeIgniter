<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>CodeIgniter's BLOG</title>
</head>
<body>
	<h2><a href="http://localhost/codeIgniter/index.php/entry">CodeIgniter's BLOG</a></h2>
{if is_null($post_id)}
	<div class="new_article_list">
		<p>新着記事</p>
		{foreach $article as $keyvar=>$itemvar}
			<div class="article_list">
				<p><a href="{$url}?post_id={$itemvar.0}">{$itemvar.1}</a><br>
					{$keyvar}</p>
			</div>
		{/foreach}
	</div>
	<div class="pagination">
	{for $i=1 to $pagination}
    <a href="{$url}">{$i}</a>
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
</body>
</html>
