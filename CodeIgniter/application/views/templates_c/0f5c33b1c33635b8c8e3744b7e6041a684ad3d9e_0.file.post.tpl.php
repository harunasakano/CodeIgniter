<?php
/* Smarty version 3.1.33-dev-12, created on 2018-09-18 12:36:45
  from 'C:\xampp\htdocs\CodeIgniter\application\views\templates\post.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-dev-12',
  'unifunc' => 'content_5ba072cdc34379_12388067',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0f5c33b1c33635b8c8e3744b7e6041a684ad3d9e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CodeIgniter\\application\\views\\templates\\post.tpl',
      1 => 1537241802,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ba072cdc34379_12388067 (Smarty_Internal_Template $_smarty_tpl) {
?><html lang="ja">
<head>
	<meta charset="utf-8">
	<title>CodeIgniter's BLOG</title>
</head>
<body>
	<h2><a href="http://localhost/codeIgniter/index.php/entry">CodeIgniter's BLOG</a></h2>
<?php if (isset($_SESSION['status']) == false) {?>
<a href="http://localhost/codeIgniter/index.php/login">ログイン</a>
<?php }
if (isset($_GET['success'])) {?>
<p>ログインしました！</p>
<?php }
if (isset($_SESSION['status'])) {?>
<p><a href="http://localhost/codeIgniter/index.php/login"><?php echo $_SESSION['status'];?>
さん</a>でログイン中</p>
<?php }
if (is_null($_smarty_tpl->tpl_vars['post_id']->value)) {?>
	<div class="new_article_list">
		<?php if (isset($_GET['page']) == false) {?>
		<p>新着記事</p>
		<?php }?>
		<?php if (isset($_GET['post'])) {?>
		<div style="color:blue;">NEW!</div>
		<?php }?>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['article']->value, 'itemvar', false, 'keyvar');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['keyvar']->value => $_smarty_tpl->tpl_vars['itemvar']->value) {
?>
			<div class="article_list">
				<p><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
?post_id=<?php echo $_smarty_tpl->tpl_vars['itemvar']->value[0];?>
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
	<div class="pagination">
	<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['pagination']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['pagination']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
		<?php if (($_smarty_tpl->tpl_vars['i']->value == 1)) {?>
    	<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a>
		<?php } else { ?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a>
		<?php }?>
	<?php }
}
?>
	</div>
<?php } else { ?>
	<div class="single_content">
		<h3><?php echo $_smarty_tpl->tpl_vars['single_query_title']->value;?>
</h3><?php echo $_smarty_tpl->tpl_vars['single_query_created']->value;?>
<p><?php echo $_smarty_tpl->tpl_vars['single_query_body']->value;?>
</p>
	</div>
	<form method="post">
	<button type='submit' name='action' value='back'>記事一覧に戻る</button>
	</form>
<?php }?>
</body>
</html>
<?php }
}
