<?php /* Smarty version Smarty-3.1.17, created on 2014-04-02 07:55:56
         compiled from ".\templates\sizelimit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213533ba66cbab4e7-57719813%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3dadb96e3f9b036a753e305062458a952eb67c1c' => 
    array (
      0 => '.\\templates\\sizelimit.tpl',
      1 => 1396418125,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213533ba66cbab4e7-57719813',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_533ba66cc25608_77606588',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533ba66cc25608_77606588')) {function content_533ba66cc25608_77606588($_smarty_tpl) {?><div id="dlg-file-too-large" class="modal hide">
	<div class="modal-header">
	  <a class="close" href="#">×</a>
	  <h3>File too large</h3>
	</div>
	<div class="modal-body">
	  <p>The submitted file exceeds the xxxMB size limit.</p>
	</div>
	<div class="modal-footer">
	  <a class="btn cancel" href="#">Cancel</a>
	</div>
</div><?php }} ?>
