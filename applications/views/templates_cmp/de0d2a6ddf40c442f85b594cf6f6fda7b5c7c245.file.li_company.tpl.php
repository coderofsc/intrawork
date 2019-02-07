<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-14 17:39:53
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\main\navbar\li_company.tpl" */ ?>
<?php /*%%SmartyHeaderCode:178115991b639dd5599-71951298%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de0d2a6ddf40c442f85b594cf6f6fda7b5c7c245' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\main\\navbar\\li_company.tpl',
      1 => 1453282182,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178115991b639dd5599-71951298',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menu_item_count' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5991b639ee01b3_57161944',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5991b639ee01b3_57161944')) {function content_5991b639ee01b3_57161944($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_access')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\modifier.access.php';
?><?php $_smarty_tpl->tpl_vars["menu_item_count"] = new Smarty_variable(0, null, 0);?>

<?php if (smarty_modifier_access(cls_modules::MODULE_USERS,m_roles::CRUD_R)||smarty_modifier_access(cls_modules::MODULE_DEPARTMENTS,m_roles::CRUD_R)||smarty_modifier_access(cls_modules::MODULE_POSTS,m_roles::CRUD_R)||smarty_modifier_access(cls_modules::MODULE_CONTACTS,m_roles::CRUD_R)||smarty_modifier_access(cls_modules::MODULE_NEWS,m_roles::CRUD_R)||smarty_modifier_access(cls_modules::MODULE_MROOMS,m_roles::CRUD_R)) {?>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo L::navbar_company;?>
 <b class="caret"></b></a>
        <ul class="dropdown-menu dropdown-menu-right">

            <?php if (smarty_modifier_access(cls_modules::MODULE_USERS,m_roles::CRUD_R)) {?>
                <li<?php if (smarty_modifier_access(cls_modules::MODULE_USERS,m_roles::CRUD_C)) {?> class="add-action"<?php }?>>
                    <a href="users/"><?php echo cls_modules::$ar_modules[cls_modules::MODULE_USERS]['name'];?>
</a>
                    <?php if (smarty_modifier_access(cls_modules::MODULE_USERS,m_roles::CRUD_C)) {?><a href="users/create/"><i class="fa fa-plus"></i></a><?php }?>
                </li>
                <?php $_smarty_tpl->tpl_vars["menu_item_count"] = new Smarty_variable($_smarty_tpl->tpl_vars['menu_item_count']->value+1, null, 0);?>
            <?php }?>

            <?php if (smarty_modifier_access(cls_modules::MODULE_DEPARTMENTS,m_roles::CRUD_R)) {?>
                <li<?php if (smarty_modifier_access(cls_modules::MODULE_DEPARTMENTS,m_roles::CRUD_C)) {?> class="add-action"<?php }?>>
                    <a href="departments/"><?php echo cls_modules::$ar_modules[cls_modules::MODULE_DEPARTMENTS]['name'];?>
</a>
                    <?php if (smarty_modifier_access(cls_modules::MODULE_DEPARTMENTS,m_roles::CRUD_C)) {?><a href="departments/create/"><i class="fa fa-plus"></i></a><?php }?>
                </li>
                <?php $_smarty_tpl->tpl_vars["menu_item_count"] = new Smarty_variable($_smarty_tpl->tpl_vars['menu_item_count']->value+1, null, 0);?>
            <?php }?>

            <?php if (smarty_modifier_access(cls_modules::MODULE_POSTS,m_roles::CRUD_R)) {?>
                <li <?php if (smarty_modifier_access(cls_modules::MODULE_POSTS,m_roles::CRUD_C)) {?>class="add-action"<?php }?>>
                    <a href="posts/"><?php echo cls_modules::$ar_modules[cls_modules::MODULE_POSTS]['name'];?>
</a>
                    <?php if (smarty_modifier_access(cls_modules::MODULE_POSTS,m_roles::CRUD_C)) {?><a href="posts/create/"><i class="fa fa-plus"></i></a><?php }?>
                </li>
                <?php $_smarty_tpl->tpl_vars["menu_item_count"] = new Smarty_variable($_smarty_tpl->tpl_vars['menu_item_count']->value+1, null, 0);?>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['menu_item_count']->value) {?>
                <li role="presentation" class="divider"></li>
            <?php }?>

            <?php if (smarty_modifier_access(cls_modules::MODULE_NEWS,m_roles::CRUD_R)) {?>
                <li<?php if (smarty_modifier_access(cls_modules::MODULE_NEWS,m_roles::CRUD_C)) {?> class="add-action"<?php }?>>
                    <a href="news/"><?php echo cls_modules::$ar_modules[cls_modules::MODULE_NEWS]['name'];?>
</a>
                    <?php if (smarty_modifier_access(cls_modules::MODULE_NEWS,m_roles::CRUD_C)) {?><a href="news/create/"><i class="fa fa-plus"></i></a><?php }?>
                </li>
            <?php }?>

            <?php if (smarty_modifier_access(cls_modules::MODULE_MROOMS,m_roles::CRUD_R)) {?>
                <li<?php if (smarty_modifier_access(cls_modules::MODULE_MROOMS,m_roles::CRUD_C)) {?> class="add-action"<?php }?>>
                    <a href="mrooms/"><?php echo cls_modules::$ar_modules[cls_modules::MODULE_MROOMS]['name'];?>
</a>
                    <?php if (smarty_modifier_access(cls_modules::MODULE_MROOMS,m_roles::CRUD_C)) {?><a href="mrooms/create/"><i class="fa fa-plus"></i></a><?php }?>
                </li>
            <?php }?>

        </ul>
    </li>
<?php }?>
<?php }} ?>
