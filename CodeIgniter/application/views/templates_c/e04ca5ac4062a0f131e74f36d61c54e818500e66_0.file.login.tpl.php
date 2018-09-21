<?php
/* Smarty version 3.1.33-dev-12, created on 2018-09-21 15:50:35
  from 'C:\xampp\htdocs\CodeIgniter\application\views\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-dev-12',
  'unifunc' => 'content_5ba494bb873005_35705561',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e04ca5ac4062a0f131e74f36d61c54e818500e66' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CodeIgniter\\application\\views\\templates\\login.tpl',
      1 => 1537512631,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ba494bb873005_35705561 (Smarty_Internal_Template $_smarty_tpl) {
?><html lang="ja">
<head>
	<meta charset="utf-8">
</head>
<body>
	<h2>ログインフォーム</h2>
	<?php if (isset($_GET['announce'])) {?>
	<p>編集にはログインが必要です</p>
	<?php }?>
	<?php if (isset($_SESSION['login_user'])) {?>
	<p><?php echo $_SESSION['login_user'];?>
さんでログイン中</p>
	<?php }?>
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
	<p style="color: red;"><?php echo $_smarty_tpl->tpl_vars['login_result']->value;?>
</p>
	<?php }?>
	<form method="post">
	<div  class="login_form">
		<?php if (isset($_GET['newuser'])) {?>
		<p>新規ユーザ登録しました。再度ログインしてください</p>
		<?php }?>
		<div style="margin: 10px;" class="user_form">ユーザID
			<input type="text" name="user_id">
		</div>
		<div style="margin: 10px;" class="user_form">パスワード
			<input type="password" name="password">
		</div>
		<div style="margin: 10px;" class="req_button">
			<input type="hidden" name="mode" value="request">
			<button type='submit' name='login' value='login_req'>ログイン</button>
			<?php if (isset($_SESSION['login_user']) == false) {?>
			<button type='submit' name='registration' value='registration_req'>新規登録</button>
			<?php }?>
		</div>
	</div>
	</form>
	<div>
	<a href="http://localhost/codeIgniter/index.php/blog">TOPに戻る</a>
	</div>
</body>
</html>
<?php }
}
