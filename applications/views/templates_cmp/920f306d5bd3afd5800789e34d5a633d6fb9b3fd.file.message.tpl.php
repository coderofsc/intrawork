<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-11-09 13:04:14
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\mailman\letters\demands\message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:253375a04281e03e769-69235909%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '920f306d5bd3afd5800789e34d5a633d6fb9b3fd' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\mailman\\letters\\demands\\message.tpl',
      1 => 1453219482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '253375a04281e03e769-69235909',
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
  'unifunc' => 'content_5a04281e2eea15_76610239',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a04281e2eea15_76610239')) {function content_5a04281e2eea15_76610239($_smarty_tpl) {?>

<?php echo $_smarty_tpl->tpl_vars['message_data']->value['message'];?>


<br/>
<blockquote type="cite">
    <?php echo $_smarty_tpl->tpl_vars['prev_message_data']->value['message'];?>

</blockquote>

<br/>
<?php echo $_smarty_tpl->getSubTemplate ("./detail.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('demand_id'=>$_smarty_tpl->tpl_vars['message_data']->value['demand_id'],'cat_id'=>$_smarty_tpl->tpl_vars['message_data']->value['cat_id']), 0);?>

<?php }} ?>
