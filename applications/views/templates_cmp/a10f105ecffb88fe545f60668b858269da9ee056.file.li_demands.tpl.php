<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 02:55:44
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\main\navbar\li_demands.tpl" */ ?>
<?php /*%%SmartyHeaderCode:175385c5a228083dc82-99279381%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a10f105ecffb88fe545f60668b858269da9ee056' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\main\\navbar\\li_demands.tpl',
      1 => 1453281460,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175385c5a228083dc82-99279381',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cat_id' => 0,
    'global_ar_demands_types' => 0,
    'type_id' => 0,
    'type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a22808c6824_95123013',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a22808c6824_95123013')) {function content_5c5a22808c6824_95123013($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_http_build_query')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.http_build_query.php';
if (!is_callable('smarty_modifier_access')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.access.php';
?><li class="dropdown">
    <a href="demands/" class="dropdown-toggle" data-toggle="dropdown"><?php echo L::navbar_demands;?>
 <b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li>
            <a href="demands/?cnd[status][]=<?php echo m_demands::STATUS_NEW;?>
&cnd[status][]=<?php echo m_demands::STATUS_WORK;?>
&cnd[status][]=<?php echo m_demands::STATUS_PAUSE;
if ($_smarty_tpl->tpl_vars['cat_id']->value) {?>&<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['cat_id']->value,"cnd[cat_id]");
}?>" >
                <span class="pull-left">Активные заявки</span>
                <span data-counter="dd_actual" class="badge badge-white pull-right text-right"></span>
                <div class="clearfix"></div>
            </a>
        </li>
        <li class="divider"></li>

        <?php if (smarty_modifier_access(cls_modules::MODULE_DEMANDS,m_roles::CRUD_C)) {?>
            <li><a href="demands/create/"><?php echo L::actions_create;?>
</a></li>
            <li class="divider"></li>
        <?php }?>

        <?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_smarty_tpl->tpl_vars['type_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['global_ar_demands_types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value) {
$_smarty_tpl->tpl_vars['type']->_loop = true;
 $_smarty_tpl->tpl_vars['type_id']->value = $_smarty_tpl->tpl_vars['type']->key;
?>
            <li <?php if (smarty_modifier_access(cls_modules::MODULE_DEMANDS,m_roles::CRUD_C)) {?>class="add-action"<?php }?>>
                <a href="demands/?cnd[type_id]=<?php echo $_smarty_tpl->tpl_vars['type_id']->value;?>
&cnd[status][]=<?php echo m_demands::STATUS_NEW;?>
&cnd[status][]=<?php echo m_demands::STATUS_WORK;?>
&cnd[status][]=<?php echo m_demands::STATUS_PAUSE;
if ($_smarty_tpl->tpl_vars['cat_id']->value) {?>&<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['cat_id']->value,"cnd[cat_id]");
}?>" >
                    <span class="text-ellipsis pull-left"><?php echo $_smarty_tpl->tpl_vars['type']->value['name'];?>
</span>
                    <span data-counter="dd_type_<?php echo $_smarty_tpl->tpl_vars['type_id']->value;?>
" class="badge badge-white pull-right text-right"></span>
                    <div class="clearfix"></div>
                </a>
                <?php if (smarty_modifier_access(cls_modules::MODULE_DEMANDS,m_roles::CRUD_C)) {?>
                    <a href="demands/create/?demand_data[type_id]=<?php echo $_smarty_tpl->tpl_vars['type_id']->value;?>
"><i class="fa fa-plus"></i></a>
                <?php }?>
            </li>
        <?php } ?>
        <?php if ($_smarty_tpl->tpl_vars['global_ar_demands_types']->value) {?>
            <li class="divider"></li>
        <?php }?>

        <?php if (smarty_modifier_access(cls_modules::MODULE_PROJECTS,m_roles::CRUD_R)) {?>
            <li<?php if (smarty_modifier_access(cls_modules::MODULE_PROJECTS,m_roles::CRUD_C)) {?> class="add-action"<?php }?>>
                <a href="projects/"><?php echo cls_modules::$ar_modules[cls_modules::MODULE_PROJECTS]['name'];?>
</a>
                <?php if (smarty_modifier_access(cls_modules::MODULE_PROJECTS,m_roles::CRUD_C)) {?><a href="projects/create/"><i class="fa fa-plus"></i></a><?php }?>
            </li>
            <li class="divider"></li>
        <?php }?>



        <li><a data-toggle="modal" href="#modal-remote" data-remote="demands/search/"><?php echo L::navbar_demands_dd_extsearch;?>
</a></li>
        <li><a href="categories/"><?php echo cls_modules::$ar_modules[cls_modules::MODULE_CATEGORIES]['name'];?>
</a></li>
        
        

    </ul>
</li>
<?php }} ?>
