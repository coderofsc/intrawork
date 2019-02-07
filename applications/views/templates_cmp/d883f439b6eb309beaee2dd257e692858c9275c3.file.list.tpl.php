<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 04:23:54
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\projects\versions\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:275755c5a372ac20414-57442281%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd883f439b6eb309beaee2dd257e692858c9275c3' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\projects\\versions\\list.tpl',
      1 => 1452781300,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '275755c5a372ac20414-57442281',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'project_id' => 0,
    'pending_demands_count' => 0,
    'ar_versions' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a372ac7a1b2_14471617',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a372ac7a1b2_14471617')) {function content_5c5a372ac7a1b2_14471617($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_access')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.access.php';
if (!is_callable('smarty_modifier_ts2text')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.ts2text.php';
?><table class="table table-valign-middle table-condensed table-hover clamped-margin-bottom" id="pv-list">
    <colgroup>
        <col width="120"/>
        <col width="120"/>
        <col width="*"/>
        <col width="50"/>
        <?php if (smarty_modifier_access(cls_modules::MODULE_PROJECTS,m_roles::CRUD_U)) {?>
        <col width="50"/>
        <?php }?>
    </colgroup>
    <thead>
    <tr>
        <th>Версия</th>
        <th>Дата</th>
        <th>Описание</th>
        <th>Заявки</th>
        <?php if (smarty_modifier_access(cls_modules::MODULE_PROJECTS,m_roles::CRUD_U)) {?>
        <th>&nbsp;</th>
        <?php }?>
    </tr>
    </thead>
    <tbody>
    <tr class="success">
        <td colspan="3">
            Заявки проекта, ожидающие присвоения версии
        </td>
        <td class="valign-middle text-center">
            <a href="demands/?cnd[project_id]=<?php echo $_smarty_tpl->tpl_vars['project_id']->value;?>
&cnd[version_id]=0" class="badge badge-white"><?php echo $_smarty_tpl->tpl_vars['pending_demands_count']->value;?>
</a>
        </td>
        <?php if (smarty_modifier_access(cls_modules::MODULE_PROJECTS,m_roles::CRUD_U)) {?>
        <td>&nbsp;</td>
        <?php }?>
    </tr>
    <?php  $_smarty_tpl->tpl_vars['version'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['version']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ar_versions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['version']->key => $_smarty_tpl->tpl_vars['version']->value) {
$_smarty_tpl->tpl_vars['version']->_loop = true;
?>
        <tr data-id="<?php echo $_smarty_tpl->tpl_vars['version']->value['id'];?>
">
            <td class="valign-middle"><?php echo $_smarty_tpl->tpl_vars['version']->value['name'];?>
</td>
            <td class="valign-middle"><?php echo smarty_modifier_ts2text($_smarty_tpl->tpl_vars['version']->value['unix_version_date']);?>
<br/><?php echo $_smarty_tpl->tpl_vars['version']->value['low_version_date'];?>
</td>
            <td class="valign-middle"><?php echo $_smarty_tpl->tpl_vars['version']->value['descr'];?>
</td>
            <td class="valign-middle text-center">
                <a href="demands/?cnd[project_id]=<?php echo $_smarty_tpl->tpl_vars['project_id']->value;?>
&cnd[version_id]=<?php echo $_smarty_tpl->tpl_vars['version']->value['id'];?>
" class="badge badge-white"><?php echo $_smarty_tpl->tpl_vars['version']->value['demands_count'];?>
</a>
            </td>
            <?php if (smarty_modifier_access(cls_modules::MODULE_PROJECTS,m_roles::CRUD_U)) {?>
            <td><button class="btn btn-danger btn-delete btn-sm"><i class="fa fa-times"></i></button></td>
            <?php }?>
        </tr>
        <?php }
if (!$_smarty_tpl->tpl_vars['version']->_loop) {
?>
        <tr>
            <td class="text-center" colspan="5">Версии проекта не найдены</td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<?php }} ?>
