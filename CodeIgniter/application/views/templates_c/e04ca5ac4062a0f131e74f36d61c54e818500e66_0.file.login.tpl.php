<?php
/* Smarty version 3.1.33-dev-12, created on 2018-09-13 16:26:44
  from 'C:\xampp\htdocs\CodeIgniter\application\views\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-dev-12',
  'unifunc' => 'content_5b9a11347c5063_83948036',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e04ca5ac4062a0f131e74f36d61c54e818500e66' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CodeIgniter\\application\\views\\templates\\login.tpl',
      1 => 1536823600,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b9a11347c5063_83948036 (Smarty_Internal_Template $_smarty_tpl) {
?><html lang="ja">
<head>
	<meta charset="utf-8">
</head>
<body>
	<h2>ログインフォーム</h2>
	<?php if (isset($_smarty_tpl->tpl_vars['error_text']->value)) {?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['error_text']->value, 'error_v');
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
	<?php if (isset($_smarty_tpl->tpl_vars['user_duplication']->value)) {?>
	<p style="color: red;"><?php echo $_smarty_tpl->tpl_vars['user_duplication']->value;?>
</p>
	<?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['login_result']->value)) {?>
	<?php echo $_smarty_tpl->tpl_vars['login_result']->value;?>

	<?php }?>
	<form method="post">
	<div  class="login_form">
		<div style="margin: 10px;" class="user_form">ユーザID
			<input type="text" name="user_id">
		</div>
		<div style="margin: 10px;" class="user_form">パスワード
			<input type="password" name="password">
		</div>
		<div style="margin: 10px;" class="req_button">
			<input type="hidden" name="mode" value="request">
			<button type='submit' name='login' value='login_req'>ログイン</button>
			<button type='submit' name='registration' value='registration_req'>新規登録</button>
		</div>
	</div>
	</form>
</body>
</html>
<?php }
}
