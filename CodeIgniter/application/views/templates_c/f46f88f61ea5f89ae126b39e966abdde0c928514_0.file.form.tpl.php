<?php
/* Smarty version 3.1.33-dev-12, created on 2018-09-14 09:25:52
  from 'C:\xampp\htdocs\CodeIgniter\application\views\templates\form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-dev-12',
  'unifunc' => 'content_5b9b00109b22e9_14762895',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f46f88f61ea5f89ae126b39e966abdde0c928514' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CodeIgniter\\application\\views\\templates\\form.tpl',
      1 => 1536629729,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b9b00109b22e9_14762895 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\CodeIgniter\\system\\libraries\\Smarty\\libs\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
?>
<head>
<html lang="ja">
<meta charset="utf-8">
</head>
<body>
	<title>記事投稿</title>
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
					<td><?php echo smarty_function_html_options(array('name'=>'category','options'=>$_smarty_tpl->tpl_vars['select_category']->value,'selected'=>$_smarty_tpl->tpl_vars['select_category']->value),$_smarty_tpl);?>
</td>
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
<?php }
}
