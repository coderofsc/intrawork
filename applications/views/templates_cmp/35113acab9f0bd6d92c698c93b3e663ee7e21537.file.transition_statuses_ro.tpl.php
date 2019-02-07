<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-09-22 14:38:40
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\demands\types\form\transition_statuses_ro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1405659c4f6406057d7-10695954%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35113acab9f0bd6d92c698c93b3e663ee7e21537' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\demands\\types\\form\\transition_statuses_ro.tpl',
      1 => 1451305338,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1405659c4f6406057d7-10695954',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ts' => 0,
    'm_status_id' => 0,
    'master' => 0,
    's_status_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59c4f64064dbb5_66424098',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c4f64064dbb5_66424098')) {function content_59c4f64064dbb5_66424098($_smarty_tpl) {?><div style="overflow-x: auto">
<table class="table" style="max-width: none" id="transition-statuses">
    <colgroup>
        <col width="100"/>
        <col width="100"/>
    </colgroup>
    <thead>
    <tr>
        <th></th>
        <th class="text-center">Активен</th>
        <?php  $_smarty_tpl->tpl_vars['m_status_id'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m_status_id']->_loop = false;
 $_from = array_keys($_smarty_tpl->tpl_vars['ts']->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m_status_id']->key => $_smarty_tpl->tpl_vars['m_status_id']->value) {
$_smarty_tpl->tpl_vars['m_status_id']->_loop = true;
?>
            <th data-id="<?php echo $_smarty_tpl->tpl_vars['m_status_id']->value;?>
" class="text-center"><?php echo m_demands::$ar_status[$_smarty_tpl->tpl_vars['m_status_id']->value]['name'];?>
</th>
        <?php } ?>
    </tr>
    </thead>
    <tbody>
    <?php  $_smarty_tpl->tpl_vars['master'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['master']->_loop = false;
 $_smarty_tpl->tpl_vars['m_status_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['master']->key => $_smarty_tpl->tpl_vars['master']->value) {
$_smarty_tpl->tpl_vars['master']->_loop = true;
 $_smarty_tpl->tpl_vars['m_status_id']->value = $_smarty_tpl->tpl_vars['master']->key;
?>
        <tr data-id="<?php echo $_smarty_tpl->tpl_vars['m_status_id']->value;?>
">
            <th nowrap="">
                <?php echo m_demands::$ar_status[$_smarty_tpl->tpl_vars['m_status_id']->value]['name'];?>

            </th>
            <th class="text-center">
                <?php if ($_smarty_tpl->tpl_vars['master']->value['active_role']==@constant('USER_ROLE_CUSTOMER')) {
echo L::members_customer;?>

                <?php } elseif ($_smarty_tpl->tpl_vars['master']->value['active_role']==@constant('USER_ROLE_EXECUTOR')) {
echo L::members_executor;?>

                <?php } elseif ($_smarty_tpl->tpl_vars['master']->value['active_role']==@constant('USER_ROLE_RESPONSIBLE')) {
echo L::members_responsible;?>

                <?php } else { ?><span class="text-muted">&mdash;</span>
                <?php }?>
            </th>
            <?php  $_smarty_tpl->tpl_vars['s_status_id'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['s_status_id']->_loop = false;
 $_from = array_keys($_smarty_tpl->tpl_vars['ts']->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s_status_id']->key => $_smarty_tpl->tpl_vars['s_status_id']->value) {
$_smarty_tpl->tpl_vars['s_status_id']->_loop = true;
?>
                <td data-id="<?php echo $_smarty_tpl->tpl_vars['s_status_id']->value;?>
" class="text-center">
                    <i class="fa <?php if ($_smarty_tpl->tpl_vars['m_status_id']->value==$_smarty_tpl->tpl_vars['s_status_id']->value) {?>fa-check text-muted<?php } elseif (in_array($_smarty_tpl->tpl_vars['s_status_id']->value,$_smarty_tpl->tpl_vars['master']->value['slaves'])) {?>fa-check text-success<?php } else { ?>fa-times text-muted<?php }?>"></i>
                </td>
            <?php } ?>
        </tr>
    <?php } ?>
    </tbody>
</table>
</div><?php }} ?>
