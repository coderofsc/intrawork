<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 17:18:02
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\mailman\letters\notification\record_table.tpl" */ ?>
<?php /*%%SmartyHeaderCode:219565c5aec9a27f1d6-02538026%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97e4bab02a6e9888cca537c22743b22a006b9084' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\mailman\\letters\\notification\\record_table.tpl',
      1 => 1452771654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '219565c5aec9a27f1d6-02538026',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'previous' => 0,
    'data_decode' => 0,
    'record' => 0,
    'index' => 0,
    'previous_data_decode' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5aec9a2d1265_84000245',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5aec9a2d1265_84000245')) {function content_5c5aec9a2d1265_84000245($_smarty_tpl) {?><table border="0" style="border-collapse: collapse; border-spacing: 0; width:100%; max-width:800px;">
    <thead>
    <tr>
        <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;"><?php echo L::forms_labels_property;?>
</th>
        <?php if ($_smarty_tpl->tpl_vars['previous']->value) {?>
            <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;"><?php echo L::forms_labels_history_new_value;?>
</th>
            <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;"><?php echo L::forms_labels_history_old_value;?>
</th>
        <?php } else { ?>
            <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;"><?php echo L::forms_labels_history_new_value;?>
</th>
        <?php }?>
    </tr>
    </thead>
    <tbody>
    <?php  $_smarty_tpl->tpl_vars['record'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['record']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data_decode']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['record']->key => $_smarty_tpl->tpl_vars['record']->value) {
$_smarty_tpl->tpl_vars['record']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['record']->key;
?>
        <?php if ($_smarty_tpl->tpl_vars['record']->value['decode']||($_smarty_tpl->tpl_vars['previous']->value&&$_smarty_tpl->tpl_vars['record']->value['decode']!=$_smarty_tpl->tpl_vars['previous_data_decode']->value[$_smarty_tpl->tpl_vars['index']->value]['decode'])) {?>
        <tr>
            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;"><?php echo $_smarty_tpl->tpl_vars['record']->value['name'];?>
</td>
            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['record']->value['decode'])===null||$tmp==='' ? "<span style='color: #cfcfcf'>&mdash;</span>" : $tmp);?>
</td>
            <?php if ($_smarty_tpl->tpl_vars['previous']->value) {?>
                <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['previous_data_decode']->value[$_smarty_tpl->tpl_vars['index']->value]['decode'])===null||$tmp==='' ? "<span style='color: #cfcfcf'>&mdash;</span>" : $tmp);?>
</td>
            <?php }?>
        </tr>
        <?php }?>
    <?php } ?>
    </tbody>
</table>
<?php }} ?>
