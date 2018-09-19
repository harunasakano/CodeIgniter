<?php
/* Smarty version 3.1.33-dev-12, created on 2018-09-18 17:58:15
  from 'C:\xampp\htdocs\CodeIgniter\application\views\templates\admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-dev-12',
  'unifunc' => 'content_5ba0be2780bd77_15998767',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '54387aeaf11722ded25c216b9490d29701b123fe' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CodeIgniter\\application\\views\\templates\\admin.tpl',
      1 => 1537261092,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ba0be2780bd77_15998767 (Smarty_Internal_Template $_smarty_tpl) {
?><head>
<html lang="ja">
<meta charset="utf-8">
<title>Blog_Admin</title>
</head>
	<body>
		<div class="container">
			<div style="font-size:20px; color:pink;">admin_page</div>
			<h2>CodeIgniter's BLOG</h2>
				<div class="butten_change">
					<form method="post" action="">
					<button type='submit' name='action' value='back'>ブログタイトル変更</button>
				</div>
				<h3>記事編集</h3>
				<?php if (is_null($_smarty_tpl->tpl_vars['post_id']->value)) {?>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['article']->value, 'itemvar', false, 'keyvar');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['keyvar']->value => $_smarty_tpl->tpl_vars['itemvar']->value) {
?>
							<div class="article_list">
								<p><a href="http://localhost/codeIgniter/index.php/admin?page=<?php echo $_GET['page'];?>
&post_id=<?php echo $_smarty_tpl->tpl_vars['itemvar']->value[0];?>
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
				    	<a href="http://localhost/codeIgniter/index.php/admin?"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a>
						<?php } else { ?>
						<a href="http://localhost/codeIgniter/index.php/admin?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a>
						<?php }?>
					<?php }
}
?>
					</div>
				<?php } else { ?>
					<div class="single_edit_content">
						<div class="content_title">
						<p>タイトル：</p>
						<input type="text" name="edit_title" value="<?php echo $_smarty_tpl->tpl_vars['single_query_title']->value;?>
">
						</div>
						<div class="content_aria">
						<p>本文：</p>
						<textarea name="edit_content" rows="8" cols="80"><?php echo $_smarty_tpl->tpl_vars['single_query_body']->value;?>
</textarea>
						<p>カテゴリー</p>
						<input type="checkbox" name="edit_category"><?php echo $_smarty_tpl->tpl_vars['single_query_category']->value;?>
<br>
						<p>最終更新日：<?php echo $_smarty_tpl->tpl_vars['single_query_created']->value;?>
</p>
						</div>
					<form method="post">
					<input type=hidden name="edit_id" value="<?php echo $_GET['post_id'];?>
">
					<div style="margin-bottom:10px;"><button type='submit' name='edit' value='change'>変更する</button></div>
					<div style="margin-bottom:30px;"><button type='submit' name='action' value='back'>記事一覧に戻る</button></div>
					</form>
				<?php }?>
					</div>
	</body>
</html>
<?php }
}
