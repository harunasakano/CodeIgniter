<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>CodeIgniterでブログ作成</title>
</head>
<body>
	<h2>CodeIgniterでブログ作成</h2>
	<div id="container">
		<p>新着記事</p>
		{foreach $article as $keyvar=>$itemvar}
			<div class="article_list">
				<p><a href="{$url}?postid={$itemvar.0}">{$itemvar.1}</a><br>
					{$keyvar}</p>
			</div>
		{/foreach}
	</div>
</body>
</html>
