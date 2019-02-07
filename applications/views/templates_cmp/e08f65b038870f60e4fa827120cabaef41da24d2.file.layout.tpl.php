<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-14 17:39:53
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\main\sidebar\layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:236415991b639633456-67472205%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e08f65b038870f60e4fa827120cabaef41da24d2' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\main\\sidebar\\layout.tpl',
      1 => 1451818098,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '236415991b639633456-67472205',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5991b63963e241_99395535',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5991b63963e241_99395535')) {function content_5991b63963e241_99395535($_smarty_tpl) {?><div class="ui-layout-north overflow-hidden" style="background-color: #293846">
	<?php echo $_smarty_tpl->getSubTemplate ("main/sidebar/navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<div class="ui-layout-center">
    <?php echo $_smarty_tpl->getSubTemplate ("main/sidebar/wrap.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<?php }} ?>
