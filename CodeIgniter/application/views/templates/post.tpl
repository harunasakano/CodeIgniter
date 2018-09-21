<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>{$smarty.session.blog_title}</title>
</head>
<body style="width: 100%;">
	<h2><a href="http://localhost/codeIgniter/index.php/admin">{$smarty.session.blog_title}</a></h2>
{if isset($smarty.session.login_user)==false}
<a href="http://localhost/codeIgniter/index.php/login">ログイン</a>
{/if}
{if isset($smarty.get.success) && isset($smarty.session.login_user)}
<p>ログインしました！</p>
{/if}
{if isset($smarty.get.logout) && isset($smarty.session.login_user)==false}
<p>ログアウトしました！</p>
{/if}
{if isset($smarty.session.login_user)}
<p><a href="http://localhost/codeIgniter/index.php/login">{$smarty.session.login_user}さん</a>でログイン中
<form method="post" name="form1" action="">
    <input type="hidden" name="logout" value="logout">
    <a href="javascript:form1.submit()" onclick="return confirm('本当にログアウトしますか？')">ログアウト</a>
</form></p>
{/if}
{if is_null($post_id)}
	<div class="new_article_list">
		{if isset($smarty.get.page)==false}
		<p>新着記事</p>
		{/if}
		{if isset($smarty.get.post)}
		<div style="color:blue;">NEW!</div>
		{/if}
		{if isset($smarty.get.page)}
		{foreach $article as $keyvar=>$itemvar}
			<div class="article_list">
				<p><a href="{$url}?page={$smarty.get.page}&post_id={$itemvar.0}">{$itemvar.1}</a><br>
					{$keyvar}</p>
			</div>
		{/foreach}
		{else}
		{foreach $article as $keyvar=>$itemvar}
			<div class="article_list">
				<p><a href="{$url}?post_id={$itemvar.0}">{$itemvar.1}</a><br>
					{$keyvar}</p>
			</div>
		{/foreach}
		{/if}
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
	<div class="single_content"
			style=" margin: 2em auto;
 			padding: 1em 1.5em;
 			width: 90%;
 			color: #777777;
			background-color: #fff;
			border: 4px solid #f6bfbc;
			border-radius: 3em .8em 3em .7em/.9em 2em .8em 3em;">
		<h3><span style="border-bottom: solid 2px pink;">記事タイトル：{$single_query_title}</span></h3>
		<p>更新日時：{$single_query_created}</p>
		<p>本文：{$single_query_body}</p>
		<p>カテゴリ：{$single_query_category}</p>
	</div>
	<form method="post">
	<button type='submit' name='action' value='back'>記事一覧に戻る</button>
	</form>
{/if}
</body>
</html>
