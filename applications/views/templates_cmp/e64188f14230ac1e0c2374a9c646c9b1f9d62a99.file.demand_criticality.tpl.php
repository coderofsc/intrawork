<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 05:29:36
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\helpers\forms\demand_criticality.tpl" */ ?>
<?php /*%%SmartyHeaderCode:149785c5a469092c3c3-05863423%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e64188f14230ac1e0c2374a9c646c9b1f9d62a99' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\helpers\\forms\\demand_criticality.tpl',
      1 => 1449243586,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149785c5a469092c3c3-05863423',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'read' => 0,
    'clear' => 0,
    'value' => 0,
    'only' => 0,
    'criticality_id' => 0,
    'criticality' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a469099d864_64638143',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a469099d864_64638143')) {function content_5c5a469099d864_64638143($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['read']->value) {?>
    <?php if ($_smarty_tpl->tpl_vars['clear']->value) {?>
        <?php echo m_demands::$ar_criticality[$_smarty_tpl->tpl_vars['read']->value]['name'];?>

    <?php } else { ?>
        <span class="label label-<?php echo m_demands::$ar_criticality[$_smarty_tpl->tpl_vars['value']->value]['color'];?>
">
            <i class="fa fa-<?php echo m_demands::$ar_criticality[$_smarty_tpl->tpl_vars['value']->value]['icon'];?>
" title="<?php echo m_demands::$ar_criticality[$_smarty_tpl->tpl_vars['value']->value]['name'];?>
"></i> <?php echo m_demands::$ar_criticality[$_smarty_tpl->tpl_vars['value']->value]['name'];?>

        </span>
    <?php }?>
<?php } else { ?>
    <?php  $_smarty_tpl->tpl_vars['criticality'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['criticality']->_loop = false;
 $_smarty_tpl->tpl_vars['criticality_id'] = new Smarty_Variable;
 $_from = m_demands::$ar_criticality; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['criticality']->key => $_smarty_tpl->tpl_vars['criticality']->value) {
$_smarty_tpl->tpl_vars['criticality']->_loop = true;
 $_smarty_tpl->tpl_vars['criticality_id']->value = $_smarty_tpl->tpl_vars['criticality']->key;
?>
        <option <?php if ($_smarty_tpl->tpl_vars['only']->value&&((is_array($_smarty_tpl->tpl_vars['only']->value)&&!in_array($_smarty_tpl->tpl_vars['criticality_id']->value,$_smarty_tpl->tpl_vars['only']->value))||(!is_array($_smarty_tpl->tpl_vars['only']->value)&&$_smarty_tpl->tpl_vars['only']->value!=$_smarty_tpl->tpl_vars['criticality_id']->value))) {?>disabled<?php }?> <?php if ((is_array($_smarty_tpl->tpl_vars['value']->value)&&in_array($_smarty_tpl->tpl_vars['criticality_id']->value,$_smarty_tpl->tpl_vars['value']->value))||$_smarty_tpl->tpl_vars['value']->value==$_smarty_tpl->tpl_vars['criticality_id']->value) {?>selected=""<?php }?>  data-icon="text-<?php echo $_smarty_tpl->tpl_vars['criticality']->value['color'];?>
 fa-<?php echo $_smarty_tpl->tpl_vars['criticality']->value['icon'];?>
 fa-fw" value="<?php echo $_smarty_tpl->tpl_vars['criticality_id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['criticality']->value['name'];?>
</option>
    <?php } ?>
<?php }?>
<?php }} ?>
