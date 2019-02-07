<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:12:21
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\helpers\forms\demand_status.tpl" */ ?>
<?php /*%%SmartyHeaderCode:169085c5a26658a3738-13461459%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '844873618710e0e2dfa54b4f2adbfc1f5d7d760c' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\forms\\demand_status.tpl',
      1 => 1449243522,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169085c5a26658a3738-13461459',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'read' => 0,
    'clear' => 0,
    'value' => 0,
    'monochrome' => 0,
    'only' => 0,
    'status_id' => 0,
    'status' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a266591c8d4_70266998',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a266591c8d4_70266998')) {function content_5c5a266591c8d4_70266998($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['read']->value) {?>
    
    
    <?php if ($_smarty_tpl->tpl_vars['clear']->value) {?>
        <?php echo m_demands::$ar_status[$_smarty_tpl->tpl_vars['value']->value]['name'];?>

    <?php } else { ?>
        <span class="label label-<?php if ($_smarty_tpl->tpl_vars['monochrome']->value) {?>tag<?php } else {
echo m_demands::$ar_status[$_smarty_tpl->tpl_vars['value']->value]['color'];
}?>"><i class="fa fa-<?php echo m_demands::$ar_status[$_smarty_tpl->tpl_vars['value']->value]['icon'];?>
"></i>&nbsp;<?php echo m_demands::$ar_status[$_smarty_tpl->tpl_vars['value']->value]['name'];?>
</span>
    <?php }?>

<?php } else { ?>
    <?php  $_smarty_tpl->tpl_vars['status'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['status']->_loop = false;
 $_smarty_tpl->tpl_vars['status_id'] = new Smarty_Variable;
 $_from = m_demands::$ar_status; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['status']->key => $_smarty_tpl->tpl_vars['status']->value) {
$_smarty_tpl->tpl_vars['status']->_loop = true;
 $_smarty_tpl->tpl_vars['status_id']->value = $_smarty_tpl->tpl_vars['status']->key;
?>
        <option <?php if ($_smarty_tpl->tpl_vars['only']->value&&((is_array($_smarty_tpl->tpl_vars['only']->value)&&!in_array($_smarty_tpl->tpl_vars['status_id']->value,$_smarty_tpl->tpl_vars['only']->value))||(!is_array($_smarty_tpl->tpl_vars['only']->value)&&$_smarty_tpl->tpl_vars['only']->value!=$_smarty_tpl->tpl_vars['status_id']->value))) {?>disabled<?php }?> data-icon="text-<?php echo $_smarty_tpl->tpl_vars['status']->value['color'];?>
 fa-<?php echo $_smarty_tpl->tpl_vars['status']->value['icon'];?>
 fa-fw" <?php if ((is_array($_smarty_tpl->tpl_vars['value']->value)&&in_array($_smarty_tpl->tpl_vars['status_id']->value,$_smarty_tpl->tpl_vars['value']->value))||$_smarty_tpl->tpl_vars['value']->value==$_smarty_tpl->tpl_vars['status_id']->value) {?>selected=""<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['status_id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['status']->value['name'];?>
</option>
    <?php } ?>
<?php }?><?php }} ?>
