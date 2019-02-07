<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 02:55:44
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\main\sidebar\layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:212475c5a22802e29c2-38054474%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f007a5abc2dfad86204b17519a445d43a02f836' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\main\\sidebar\\layout.tpl',
      1 => 1451818098,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212475c5a22802e29c2-38054474',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a22802ea6c2_36944661',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a22802ea6c2_36944661')) {function content_5c5a22802ea6c2_36944661($_smarty_tpl) {?><div class="ui-layout-north overflow-hidden" style="background-color: #293846">
	<?php echo $_smarty_tpl->getSubTemplate ("main/sidebar/navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<div class="ui-layout-center">
    <?php echo $_smarty_tpl->getSubTemplate ("main/sidebar/wrap.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<?php }} ?>
