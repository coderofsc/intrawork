<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 05:14:42
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\main\navbar\li_company.tpl" */ ?>
<?php /*%%SmartyHeaderCode:165245c5a43128cdf59-31232390%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80cdaa90177047e77befeaf8688e1327e97d202d' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\main\\navbar\\li_company.tpl',
      1 => 1453282182,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165245c5a43128cdf59-31232390',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menu_item_count' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a43129a8b85_43166579',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a43129a8b85_43166579')) {function content_5c5a43129a8b85_43166579($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_access')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.access.php';
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
