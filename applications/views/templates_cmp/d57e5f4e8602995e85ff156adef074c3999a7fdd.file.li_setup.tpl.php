<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 05:14:42
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\main\navbar\li_setup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:214615c5a43129bc401-46904095%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd57e5f4e8602995e85ff156adef074c3999a7fdd' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\main\\navbar\\li_setup.tpl',
      1 => 1453282130,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '214615c5a43129bc401-46904095',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menu_item_count' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a4312a837b0_73687619',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a4312a837b0_73687619')) {function content_5c5a4312a837b0_73687619($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_access')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.access.php';
?><?php $_smarty_tpl->tpl_vars["menu_item_count"] = new Smarty_variable(0, null, 0);?>

<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog "></i> </a>
    <ul class="dropdown-menu dropdown-menu-right">

        <?php if (smarty_modifier_access(cls_modules::MODULE_ROLES,m_roles::CRUD_R)) {?>
            <li<?php if (smarty_modifier_access(cls_modules::MODULE_ROLES,m_roles::CRUD_C)) {?> class="add-action"<?php }?>>
                <a href="roles/"><?php echo cls_modules::$ar_modules[cls_modules::MODULE_ROLES]['name'];?>
</a>
                <?php if (smarty_modifier_access(cls_modules::MODULE_ROLES,m_roles::CRUD_C)) {?><a href="roles/create/"><i class="fa fa-plus"></i></a><?php }?>
            </li>
            <?php $_smarty_tpl->tpl_vars["menu_item_count"] = new Smarty_variable($_smarty_tpl->tpl_vars['menu_item_count']->value+1, null, 0);?>
        <?php }?>

        <?php if (smarty_modifier_access(cls_modules::MODULE_CATEGORIES,m_roles::CRUD_U)) {?>
            <li<?php if (smarty_modifier_access(cls_modules::MODULE_CATEGORIES,m_roles::CRUD_C)) {?> class="add-action"<?php }?>>
                <a href="categories/"><?php echo cls_modules::$ar_modules[cls_modules::MODULE_CATEGORIES]['name'];?>
</a>
                <?php if (smarty_modifier_access(cls_modules::MODULE_CATEGORIES,m_roles::CRUD_C)) {?><a href="categories/create/"><i class="fa fa-plus"></i></a><?php }?>
            </li>
            <?php $_smarty_tpl->tpl_vars["menu_item_count"] = new Smarty_variable($_smarty_tpl->tpl_vars['menu_item_count']->value+1, null, 0);?>
        <?php }?>

        <?php if (smarty_modifier_access(cls_modules::MODULE_CONTACTS_TYPES,m_roles::CRUD_R)) {?>
            <li<?php if (smarty_modifier_access(cls_modules::MODULE_CONTACTS_TYPES,m_roles::CRUD_C)) {?> class="add-action"<?php }?>>
                <a href="contacts/types/"><?php echo cls_modules::$ar_modules[cls_modules::MODULE_CONTACTS_TYPES]['name'];?>
</a>
                <?php if (smarty_modifier_access(cls_modules::MODULE_CONTACTS_TYPES,m_roles::CRUD_C)) {?><a href="contacts/types/create/"><i class="fa fa-plus"></i></a><?php }?>
            </li>
            <?php $_smarty_tpl->tpl_vars["menu_item_count"] = new Smarty_variable($_smarty_tpl->tpl_vars['menu_item_count']->value+1, null, 0);?>
        <?php }?>

        <?php if (smarty_modifier_access(cls_modules::MODULE_DEMANDS_TYPES,m_roles::CRUD_R)) {?>
            <li<?php if (smarty_modifier_access(cls_modules::MODULE_DEMANDS_TYPES,m_roles::CRUD_C)) {?> class="add-action"<?php }?>>
                <a href="demands/types/"><?php echo cls_modules::$ar_modules[cls_modules::MODULE_DEMANDS_TYPES]['name'];?>
</a>
                <?php if (smarty_modifier_access(cls_modules::MODULE_DEMANDS_TYPES,m_roles::CRUD_C)) {?><a href="demands/types/create/"><i class="fa fa-plus"></i></a><?php }?>
            </li>
            <?php $_smarty_tpl->tpl_vars["menu_item_count"] = new Smarty_variable($_smarty_tpl->tpl_vars['menu_item_count']->value+1, null, 0);?>
        <?php }?>

        
        

        <?php if (smarty_modifier_access(cls_modules::MODULE_MAILBOTS,m_roles::CRUD_R)) {?>
            <li<?php if (smarty_modifier_access(cls_modules::MODULE_MAILBOTS,m_roles::CRUD_C)) {?> class="add-action"<?php }?>>
                <a href="mailbots/"><?php echo cls_modules::$ar_modules[cls_modules::MODULE_MAILBOTS]['name'];?>
</a>
                <?php if (smarty_modifier_access(cls_modules::MODULE_MAILBOTS,m_roles::CRUD_C)) {?><a href="mailbots/create/"><i class="fa fa-plus"></i></a><?php }?>
            </li>
            <?php $_smarty_tpl->tpl_vars["menu_item_count"] = new Smarty_variable($_smarty_tpl->tpl_vars['menu_item_count']->value+1, null, 0);?>
        <?php }?>
    </ul>
</li>
<?php }} ?>
