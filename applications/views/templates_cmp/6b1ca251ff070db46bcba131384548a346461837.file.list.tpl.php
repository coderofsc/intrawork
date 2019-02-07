<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 04:01:58
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\trash\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4515c5a32062e3c83-90236569%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b1ca251ff070db46bcba131384548a346461837' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\trash\\list.tpl',
      1 => 1450362482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4515c5a32062e3c83-90236569',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_id' => 0,
    'controller_info' => 0,
    'ar_trash' => 0,
    'trash' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a3206358fa8_99576709',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a3206358fa8_99576709')) {function content_5c5a3206358fa8_99576709($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_mb_ucfirst')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
if (!is_callable('smarty_modifier_ts2text')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.ts2text.php';
?><?php if (!$_smarty_tpl->tpl_vars['module_id']->value&&$_smarty_tpl->tpl_vars['controller_info']->value['module_id']) {?>
    <?php $_smarty_tpl->tpl_vars["module_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['controller_info']->value['module_id'], null, 0);?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['ar_trash']->value['data']) {?>
<table id="trash-table" class="table table-valign-middle table-condensed table-hover clamped-margin-bottom table-sticky-head footable">
    <colgroup>
        <col width="15px" />
        <col width="*" />
        <col width="100px" />
        <col width="100px" />
        <col width="100px" />
    </colgroup>
	<thead>
	<tr>
        <th data-toggle="true"></th>
		<th><?php echo L::forms_labels_name;?>
</th>
		<th><?php echo L::forms_labels_events_type_object;?>
</th>
        <th data-hide="phone"><?php echo L::forms_labels_date;?>
</th>
        <th data-hide="phone"><?php echo smarty_modifier_mb_ucfirst(cls_modules::$ar_modules[cls_modules::MODULE_USERS]['morph'][0]);?>
</th>
	</tr>
	</thead>
	<tbody>
	<?php  $_smarty_tpl->tpl_vars['trash'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['trash']->_loop = false;
 $_smarty_tpl->tpl_vars['trash_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ar_trash']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['trash']->key => $_smarty_tpl->tpl_vars['trash']->value) {
$_smarty_tpl->tpl_vars['trash']->_loop = true;
 $_smarty_tpl->tpl_vars['trash_id']->value = $_smarty_tpl->tpl_vars['trash']->key;
?>
		<tr data-id="<?php echo $_smarty_tpl->tpl_vars['trash']->value['id'];?>
">
            <td></td>
			<td>
				<span class="title"><?php echo $_smarty_tpl->tpl_vars['trash']->value['object_name'];?>
</span>
			</td>
			<td>
                <?php echo smarty_modifier_mb_ucfirst(cls_modules::$ar_modules[$_smarty_tpl->tpl_vars['trash']->value['module_id']]['morph'][0]);?>

			</td>
            <td>
                <?php echo smarty_modifier_ts2text($_smarty_tpl->tpl_vars['trash']->value['unix_delete_date']);?>

            </td>
            <td>
                <?php if ($_smarty_tpl->tpl_vars['trash']->value['delete_user_id']) {?>
                    <?php echo $_smarty_tpl->tpl_vars['trash']->value['user_short_fio'];?>

                <?php } else { ?>
                    <?php echo smarty_modifier_mb_ucfirst(L::text_iw_auto_action);?>

                <?php }?>

            </td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php } else { ?>
    <div class="alert alert-default">
        <?php if ($_smarty_tpl->tpl_vars['module_id']->value) {?>
            <?php echo cls_modules::$ar_modules[$_smarty_tpl->tpl_vars['module_id']->value]['name'];?>
 не найдены
        <?php } else { ?>
            <?php echo L::text_nothing_found;?>

        <?php }?>
    </div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['module_id']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("helpers/lists/more.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('ar_data'=>$_smarty_tpl->tpl_vars['ar_trash']->value,'module_id'=>$_smarty_tpl->tpl_vars['module_id']->value), 0);?>

<?php }?><?php }} ?>
