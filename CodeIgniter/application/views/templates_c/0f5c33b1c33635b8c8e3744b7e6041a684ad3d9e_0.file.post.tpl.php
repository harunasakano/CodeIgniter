<?php
/* Smarty version 3.1.33-dev-12, created on 2018-09-12 11:45:06
  from 'C:\xampp\htdocs\CodeIgniter\application\views\templates\post.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-dev-12',
  'unifunc' => 'content_5b987db2aa2080_73715618',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0f5c33b1c33635b8c8e3744b7e6041a684ad3d9e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CodeIgniter\\application\\views\\templates\\post.tpl',
      1 => 1536720299,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b987db2aa2080_73715618 (Smarty_Internal_Template $_smarty_tpl) {
?><html lang="ja">
<head>
	<meta charset="utf-8">
	<title>CodeIgniterでブログ作成</title>
</head>
<body>
	<h2>CodeIgniterでブログ作成</h2>
	<div id="container">
		<p>新着記事</p>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['article']->value, 'itemvar', false, 'keyvar');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['keyvar']->value => $_smarty_tpl->tpl_vars['itemvar']->value) {
?>
			<div class="article_list">
				<p><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
?postid=<?php echo $_smarty_tpl->tpl_vars['itemvar']->value[0];?>
"><?php echo $_smarty_tpl->tpl_vars['itemvar']->value[1];?>
</a><br>
					<?php echo $_smarty_tpl->tpl_vars['keyvar']->value;?>
</p>
			</div>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</div>
</body>
</html>
<?php }
}
