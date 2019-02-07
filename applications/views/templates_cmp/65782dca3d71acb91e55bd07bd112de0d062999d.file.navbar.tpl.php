<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 05:14:42
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\main\sidebar\navbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:200405c5a43122de561-14115730%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65782dca3d71acb91e55bd07bd112de0d062999d' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\main\\sidebar\\navbar.tpl',
      1 => 1453278772,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200405c5a43122de561-14115730',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'controller_name' => 0,
    'conditions' => 0,
    'sort' => 0,
    'module_id' => 0,
    'module' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a431234fa06_15960502',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a431234fa06_15960502')) {function content_5c5a431234fa06_15960502($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_http_build_query')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.http_build_query.php';
if (!is_callable('smarty_modifier_access')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.access.php';
if (!is_callable('smarty_modifier_mb_ucfirst')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
?><nav class="navbar navbar-inverse clamped" role="navigation">
	<div class="container-fluid ">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo @constant('HOST_ROOT');?>
">
				<img src="<?php echo @constant('HOST_ROOT');?>
resources/images/intrawork-logo.png" alt="<?php echo L::intrawork;?>
" title="<?php echo L::meta_title;?>
" />
			</a>
		</div>
		<div>
			<ul class="nav navbar-nav navbar-right">
                <?php if ($_smarty_tpl->tpl_vars['controller_name']->value=="demands_view"||$_smarty_tpl->tpl_vars['controller_name']->value=="demands") {?>
                <li class="check-message " title="Фоновая проверка новых сообщений в заявке">
                    <a href="#">
                        <i class="fa fa-fw fa-refresh"></i>
                    </a>
                </li>
                <?php }?>
				<li <?php if ($_smarty_tpl->tpl_vars['controller_name']->value=="demands"&&$_smarty_tpl->tpl_vars['conditions']->value) {?>class="active"<?php }?>>
					<a data-toggle="modal" href="#modal-remote" data-remote="demands/search/<?php if ($_smarty_tpl->tpl_vars['controller_name']->value=="demands") {
if ($_smarty_tpl->tpl_vars['conditions']->value) {?>?<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['conditions']->value,"cnd");
}
if ($_smarty_tpl->tpl_vars['sort']->value) {
if ($_smarty_tpl->tpl_vars['conditions']->value) {?>&<?php } else { ?>?<?php }
echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['sort']->value,"sort");
}
}?>"><i class="fa fa-search"></i></a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-plus"></i></a>
					<ul class="dropdown-menu">

                        <?php  $_smarty_tpl->tpl_vars['module'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['module']->_loop = false;
 $_smarty_tpl->tpl_vars['module_id'] = new Smarty_Variable;
 $_from = cls_modules::$ar_modules; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['module']->key => $_smarty_tpl->tpl_vars['module']->value) {
$_smarty_tpl->tpl_vars['module']->_loop = true;
 $_smarty_tpl->tpl_vars['module_id']->value = $_smarty_tpl->tpl_vars['module']->key;
?>
                            <?php if (smarty_modifier_access($_smarty_tpl->tpl_vars['module_id']->value,m_roles::CRUD_C)&&in_array(m_roles::CRUD_C,cls_modules::$ar_modules[$_smarty_tpl->tpl_vars['module_id']->value]['possible_access_mode'])&&!isset(cls_modules::$ar_modules[$_smarty_tpl->tpl_vars['module_id']->value]['inside'])) {?>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['module']->value['alias'];?>
/create/" class="selected"><?php echo smarty_modifier_mb_ucfirst($_smarty_tpl->tpl_vars['module']->value['morph'][0]);?>
</a></li>
                            <?php }?>
                        <?php } ?>
					</ul>
				</li>

			</ul>
		</div>
	</div>
</nav>
<?php }} ?>
