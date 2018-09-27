<?php
/* Smarty version 3.1.33-dev-12, created on 2018-09-27 12:34:34
  from 'C:\xampp\htdocs\CodeIgniter\application\views\templates\admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-dev-12',
  'unifunc' => 'content_5bac4fca5b6154_43438854',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '54387aeaf11722ded25c216b9490d29701b123fe' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CodeIgniter\\application\\views\\templates\\admin.tpl',
      1 => 1538019262,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bac4fca5b6154_43438854 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\CodeIgniter\\system\\libraries\\Smarty\\libs\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
?>
<head>
<html lang="ja">
<meta charset="utf-8">
<title>Blog_Admin</title>
</head>
	<body>
		<div class="container">
				<h3>記事編集</h3>
				<?php if (is_null($_smarty_tpl->tpl_vars['post_id']->value)) {?>
				<form method="post">
					<div style="font-size:20px; color:pink;">admin_page</div>
					<?php if (isset($_GET['title_edit'])) {?>
					<p>タイトル変更完了しました</p>
					<?php }?>
					<input type="text" name="title_edit" value="<?php echo $_SESSION['blog_title'];?>
" style="width:300px; height:50px; font-size:2em; margin-bottom:15px;">
						<div class="butten_change">
							<div style="margin-bottom: 15px;"><button type='submit' name='b_change' value='b_title_change'>ブログタイトル変更</button></div>
							<div style="margin-bottom: 15px;"><button type='submit' name='post' value='new_post'>新規記事作成</button></div>
						</form>
						</div>
						<div>カテゴリー</div>
						<?php if (isset($_GET['add_category'])) {?>
						<p>カテゴリ追加しました</p>
						<?php }?>
						<?php if (isset($_GET['destroy_category'])) {?>
						<p>カテゴリ削除しました</p>
						<?php }?>
						<?php if (isset($_smarty_tpl->tpl_vars['category_error']->value)) {?>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category_error']->value, 'error_v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['error_v']->value) {
?>
						<p style="color: red;"><?php echo $_smarty_tpl->tpl_vars['error_v']->value;?>
</p>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						<?php }?>
						<?php if (isset($_smarty_tpl->tpl_vars['c_destroy_error']->value)) {?>
							<?php if (is_array($_smarty_tpl->tpl_vars['c_destroy_error']->value)) {?>
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['c_destroy_error']->value, 'd_error_v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['d_error_v']->value) {
?>
								<p style="color: red;"><?php echo $_smarty_tpl->tpl_vars['d_error_v']->value;?>
</p>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							<?php } else { ?>
							<p style="color: red;"><?php echo $_smarty_tpl->tpl_vars['c_destroy_error']->value;?>
</p>
							<?php }?>
						<?php }?>
						<form method="post">
						<input type="text" name="category_input" value="">
						<div style="margin-bottom: 10px; margin-top: 10px;"><button type='submit' name='edit' value='add_category'>新規カテゴリ追加</button></div>
						<?php if (isset($_smarty_tpl->tpl_vars['c_destroy_empty_error']->value)) {?>
						<p style="color: red;"><?php echo $_smarty_tpl->tpl_vars['c_destroy_empty_error']->value;?>
</p>
						<?php }?>
						<p>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category_list']->value, 'c_name', false, 'c_id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['c_id']->value => $_smarty_tpl->tpl_vars['c_name']->value) {
?>
						<input type="checkbox" name="category_list[]" value="<?php echo $_smarty_tpl->tpl_vars['c_id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['c_name']->value;?>
<br>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						</p>
						<div style="margin-bottom: 10px; margin-top: 10px;"><button type='submit' name='c_destroy' value='destroy'>削除</button></div>
						<?php if (isset($_GET['update'])) {?>
						<p style="color: green;">記事変更しました！</p>
						<?php }?>
						<?php if (isset($_GET['page'])) {?>
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
						</form>
						<?php } else { ?>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['article']->value, 'itemvar', false, 'keyvar');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['keyvar']->value => $_smarty_tpl->tpl_vars['itemvar']->value) {
?>
						<div class="article_list">
							<p><a href="http://localhost/codeIgniter/index.php/admin?post_id=<?php echo $_smarty_tpl->tpl_vars['itemvar']->value[0];?>
"><?php echo $_smarty_tpl->tpl_vars['itemvar']->value[1];?>
</a><br>
							<?php echo $_smarty_tpl->tpl_vars['keyvar']->value;?>
</p>
						</div>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					<?php }?>
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
					<div style="margin-top:10px; margin-bottom:10px">
					<a href="http://localhost/codeIgniter/index.php/blog">TOPに戻る</a>
					</div>
					</div>
				<?php } else { ?>
				<form method="post">
					<div class="single_edit_content">
						<?php if (isset($_smarty_tpl->tpl_vars['update_error']->value)) {?>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['update_error']->value, 'error_v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['error_v']->value) {
?>
						<p style="color: red;"><?php echo $_smarty_tpl->tpl_vars['error_v']->value;?>
</p>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						<?php }?>
						<div class="content_title">
						<div>タイトル：</div>
						<input type="text" name="edit_title" value="<?php echo $_smarty_tpl->tpl_vars['single_query_title']->value;?>
">
						</div>
						<div class="content_aria">
						<div>本文：</div>
						<textarea name="edit_content" rows="8" cols="80"><?php echo $_smarty_tpl->tpl_vars['single_query_body']->value;?>
</textarea>
						<div>カテゴリ選択</div>
							<div><?php echo smarty_function_html_options(array('name'=>'edit_category','options'=>$_smarty_tpl->tpl_vars['category_list']->value,'selected'=>$_smarty_tpl->tpl_vars['single_query_category']->value),$_smarty_tpl);?>
</div>
						<p>最終更新日：<?php echo $_smarty_tpl->tpl_vars['single_query_created']->value;?>
</p>
						</div>
					</div>
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
