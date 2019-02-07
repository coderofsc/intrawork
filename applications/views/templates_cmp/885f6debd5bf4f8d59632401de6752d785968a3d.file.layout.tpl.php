<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 19:15:18
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\notes\layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:149515c5b0816dcae74-00713643%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '885f6debd5bf4f8d59632401de6752d785968a3d' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\notes\\layout.tpl',
      1 => 1453149700,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149515c5b0816dcae74-00713643',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'controller_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5b0816e40199_33609004',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5b0816e40199_33609004')) {function content_5c5b0816e40199_33609004($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.replace.php';
?><?php $_smarty_tpl->tpl_vars["layout_name"] = new Smarty_variable(smarty_modifier_replace($_smarty_tpl->tpl_vars['controller_info']->value['module']['alias'],"/","-"), null, 0);?>
<?php $_smarty_tpl->tpl_vars["layout_path"] = new Smarty_variable($_smarty_tpl->tpl_vars['controller_info']->value['module']['alias'], null, 0);?>

<div class="ui-layout-center ">
    <?php echo $_smarty_tpl->getSubTemplate ("main/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("./search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("./list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<?php }} ?>
