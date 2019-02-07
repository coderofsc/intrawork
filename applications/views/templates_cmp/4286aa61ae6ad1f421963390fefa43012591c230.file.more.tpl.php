<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-14 17:39:53
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\helpers\lists\more.tpl" */ ?>
<?php /*%%SmartyHeaderCode:61515991b6392fdb18-75426156%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4286aa61ae6ad1f421963390fefa43012591c230' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\lists\\more.tpl',
      1 => 1450302570,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '61515991b6392fdb18-75426156',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_id' => 0,
    'ar_data' => 0,
    'module_alias' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5991b639377012_72861375',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5991b639377012_72861375')) {function content_5991b639377012_72861375($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_http_build_query')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\modifier.http_build_query.php';
?><?php if ($_smarty_tpl->tpl_vars['module_id']->value) {?>
    <?php $_smarty_tpl->tpl_vars["module_alias"] = new Smarty_variable(cls_modules::$ar_modules[$_smarty_tpl->tpl_vars['module_id']->value]['alias'], null, 0);?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['ar_data']->value['offset']+sizeof($_smarty_tpl->tpl_vars['ar_data']->value['data'])<$_smarty_tpl->tpl_vars['ar_data']->value['total']&&$_smarty_tpl->tpl_vars['ar_data']->value['limit']) {?>
    <ul class="pager">
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['module_alias']->value;?>
/?render=<?php echo @constant('RENDER_JSON');?>
&offset=<?php echo $_smarty_tpl->tpl_vars['ar_data']->value['offset']+$_smarty_tpl->tpl_vars['ar_data']->value['limit'];?>
&continue=true<?php if ($_smarty_tpl->tpl_vars['ar_data']->value['conditions']) {?>&<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['ar_data']->value['conditions'],"cnd");
}?>"><?php echo L::text_load_more;?>
</a></li>
    </ul>
<?php } elseif (sizeof($_smarty_tpl->tpl_vars['ar_data']->value['data'])<$_smarty_tpl->tpl_vars['ar_data']->value['total']&&!$_smarty_tpl->tpl_vars['ar_data']->value['limit']) {?>
    <ul class="pager">
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['module_alias']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['ar_data']->value['conditions']) {?>?<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['ar_data']->value['conditions'],"cnd");
}?>"><?php echo L::text_show_more;?>
 <span class="badge badge-white"><?php echo $_smarty_tpl->tpl_vars['ar_data']->value['total'];?>
</span> </a></li>
    </ul>
<?php }?>
<?php }} ?>
