<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-14 17:39:53
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\main\navbar\li_contacts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26905991b639da08a2-26223771%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd991744314bbbc73460e0c13e6a0fa909861d6e' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\main\\navbar\\li_contacts.tpl',
      1 => 1453283422,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26905991b639da08a2-26223771',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'global_ar_contacts_types' => 0,
    'type_id' => 0,
    'type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5991b639dc9344_87078395',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5991b639dc9344_87078395')) {function content_5991b639dc9344_87078395($_smarty_tpl) {?><li class="dropdown">
    <a href="contacts/" class="dropdown-toggle" data-toggle="dropdown"><?php echo cls_modules::$ar_modules[cls_modules::MODULE_CONTACTS]['name'];?>
 <b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li>
            <a href="contacts/create/">Добавить</a>
        </li>
        <?php if ($_smarty_tpl->tpl_vars['global_ar_contacts_types']->value) {?>
            <li class="divider"></li>
        <?php }?>
        <?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_smarty_tpl->tpl_vars['type_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['global_ar_contacts_types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value) {
$_smarty_tpl->tpl_vars['type']->_loop = true;
 $_smarty_tpl->tpl_vars['type_id']->value = $_smarty_tpl->tpl_vars['type']->key;
?>
            <li class="add-action">
                <a href="contacts/?cnd[type_id]=<?php echo $_smarty_tpl->tpl_vars['type_id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['type']->value['name'];?>
</a>
                <a href="contacts/create/?contact_data[type_id]=<?php echo $_smarty_tpl->tpl_vars['type_id']->value;?>
"><i class="fa fa-plus"></i></a>
            </li>
        <?php } ?>
    </ul>
</li>
<?php }} ?>
