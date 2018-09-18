<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>CodeIgniter's BLOG</title>
</head>
<body>
	<h2><a href="http://localhost/codeIgniter/index.php/entry">CodeIgniter's BLOG</a></h2>
{if isset($smarty.session.status)==false}
<a href="http://localhost/codeIgniter/index.php/login">ログイン</a>
{/if}
{if isset($smarty.get.success)}
<p>ログインしました！</p>
{/if}
{if isset($smarty.session.status)}
<p><a href="http://localhost/codeIgniter/index.php/login">{$smarty.session.status}さん</a>でログイン中</p>
{/if}
{if is_null($post_id)}
	<div class="new_article_list">
		{if isset($smarty.get.page)==false}
		<p>新着記事</p>
		{/if}
		{if isset($smarty.get.post)}
		<div style="color:blue;">NEW!</div>
		{/if}
		{foreach $article as $keyvar=>$itemvar}
			<div class="article_list">
				<p><a href="{$url}?post_id={$itemvar.0}">{$itemvar.1}</a><br>
					{$keyvar}</p>
			</div>
		{/foreach}
	</div>
	<div class="pagination">
	{for $i=1 to $pagination}
		{if ($i==1)}
    	<a href="{$url}">{$i}</a>
		{else}
		<a href="{$url}?page={$i}">{$i}</a>
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
</body>
</html>
