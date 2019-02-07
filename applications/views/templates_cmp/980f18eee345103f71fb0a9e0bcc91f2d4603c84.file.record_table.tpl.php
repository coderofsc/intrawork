<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:28:10
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\mailman\letters\notification\record_table.tpl" */ ?>
<?php /*%%SmartyHeaderCode:92635c5a2a1aef5d22-99798928%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '980f18eee345103f71fb0a9e0bcc91f2d4603c84' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\mailman\\letters\\notification\\record_table.tpl',
      1 => 1452771654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '92635c5a2a1aef5d22-99798928',
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
  'unifunc' => 'content_5c5a2a1b0059b8_73535622',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a2a1b0059b8_73535622')) {function content_5c5a2a1b0059b8_73535622($_smarty_tpl) {?><table border="0" style="border-collapse: collapse; border-spacing: 0; width:100%; max-width:800px;">
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
