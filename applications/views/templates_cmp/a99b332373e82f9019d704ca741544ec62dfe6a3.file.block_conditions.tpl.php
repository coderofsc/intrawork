<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:06:45
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\main\sidebar\block_conditions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:72795c5a251548f910-92045212%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a99b332373e82f9019d704ca741544ec62dfe6a3' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\main\\sidebar\\block_conditions.tpl',
      1 => 1451003128,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72795c5a251548f910-92045212',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'controller_name' => 0,
    'conditions' => 0,
    'sort' => 0,
    'controller_info' => 0,
    'conditions_decode' => 0,
    'cnd' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a2515500db0_54848837',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a2515500db0_54848837')) {function content_5c5a2515500db0_54848837($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_http_build_query')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.http_build_query.php';
?><ul class="sidebar-block">

        <li class=" open">
            <a class="row header" data-toggle="modal" href="#modal-remote" data-remote="<?php echo $_smarty_tpl->tpl_vars['controller_name']->value;?>
/search/?<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['conditions']->value,"cnd");
if ($_smarty_tpl->tpl_vars['sort']->value) {?>&<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['sort']->value,"sort");
}?>">
                <div class="col-sm-9 text-ellipsis">
                    <i class="fa fa-fw fa-search text-white"></i>
                    <span class="nav-label"><?php echo L::sidebar_selection_parameters;?>
 <?php echo $_smarty_tpl->tpl_vars['controller_info']->value['module']['morph'][2];?>
</span>
                </div>
                <div class="col-sm-2 text-center">
                    <span class="badge badge-count"><?php echo sizeof($_smarty_tpl->tpl_vars['conditions']->value);?>
</span>
                </div>
                <div class="col-sm-1 btn-toggle">
                    <i class="fa fa-fw fa-caret-down"></i>
                </div>
            </a>

            <ul>
                <?php  $_smarty_tpl->tpl_vars['cnd'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cnd']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['conditions_decode']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cnd']->key => $_smarty_tpl->tpl_vars['cnd']->value) {
$_smarty_tpl->tpl_vars['cnd']->_loop = true;
?>
                <li class="row">
                    <div class="col-sm-5 text-ellipsis" title="<?php echo $_smarty_tpl->tpl_vars['cnd']->value['name'];?>
"><span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['cnd']->value['name'];?>
</span></div>
                    <div class="col-sm-6 text-ellipsis">
                        <?php if (is_array($_smarty_tpl->tpl_vars['cnd']->value['decode'])) {?>
                            <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cnd']->value['decode']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
                                <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</span>
                            <?php } ?>
                        <?php } else { ?>
                            <span class="nav-label text-ellipsis"><?php echo $_smarty_tpl->tpl_vars['cnd']->value['decode'];?>
</span>
                        <?php }?>
                    </div>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['controller_name']->value;?>
/?<?php echo $_smarty_tpl->tpl_vars['cnd']->value['remove'];?>
" class="col-sm-1 text-right">
                        <i class="fa-fw fa fa-times text-warning"></i>
                    </a>
                </li>
                <?php } ?>
                <div class="space space-xs"></div>
                <li class="row">
                    <div class="col-sm-12">
                        <a data-toggle="modal" href="#modal-remote" data-remote="<?php echo $_smarty_tpl->tpl_vars['controller_name']->value;?>
/search/?<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['conditions']->value,"cnd");
if ($_smarty_tpl->tpl_vars['sort']->value) {?>&<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['sort']->value,"sort");
}?>"><span class="text-muted">Изменить условия отбора</span></a>
                    </div>
                </li>
                <li class="row">
                    <div class="col-sm-12">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['controller_name']->value;?>
/"><span class="text-warning">Отменить все условия</span></a>
                    </div>
                </li>
            </ul>
        </li>
</ul><?php }} ?>
