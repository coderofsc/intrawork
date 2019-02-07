<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 05:14:42
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\main\sidebar\layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84275c5a43122bf163-56253599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb8d85ada8255abb4a4c383738ee832ebe96ed52' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\main\\sidebar\\layout.tpl',
      1 => 1451818098,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84275c5a43122bf163-56253599',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a43122c6e60_43614545',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a43122c6e60_43614545')) {function content_5c5a43122c6e60_43614545($_smarty_tpl) {?><div class="ui-layout-north overflow-hidden" style="background-color: #293846">
	<?php echo $_smarty_tpl->getSubTemplate ("main/sidebar/navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<div class="ui-layout-center">
    <?php echo $_smarty_tpl->getSubTemplate ("main/sidebar/wrap.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<?php }} ?>
