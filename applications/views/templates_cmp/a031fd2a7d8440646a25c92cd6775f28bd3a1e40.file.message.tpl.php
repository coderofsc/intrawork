<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 17:37:19
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\mailman\letters\demands\message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:272135c5af11fbb3687-90048338%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a031fd2a7d8440646a25c92cd6775f28bd3a1e40' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\mailman\\letters\\demands\\message.tpl',
      1 => 1453219482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '272135c5af11fbb3687-90048338',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'message_data' => 0,
    'prev_message_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5af11fc0d415_72028685',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5af11fc0d415_72028685')) {function content_5c5af11fc0d415_72028685($_smarty_tpl) {?>

<?php echo $_smarty_tpl->tpl_vars['message_data']->value['message'];?>


<br/>
<blockquote type="cite">
    <?php echo $_smarty_tpl->tpl_vars['prev_message_data']->value['message'];?>

</blockquote>

<br/>
<?php echo $_smarty_tpl->getSubTemplate ("./detail.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('demand_id'=>$_smarty_tpl->tpl_vars['message_data']->value['demand_id'],'cat_id'=>$_smarty_tpl->tpl_vars['message_data']->value['cat_id']), 0);?>

<?php }} ?>
