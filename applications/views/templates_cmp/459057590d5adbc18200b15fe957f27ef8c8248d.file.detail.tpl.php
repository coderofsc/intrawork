<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 17:37:19
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\mailman\letters\demands\detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:268825c5af11fc20c96-27764604%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '459057590d5adbc18200b15fe957f27ef8c8248d' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\mailman\\letters\\demands\\detail.tpl',
      1 => 1450362482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '268825c5af11fc20c96-27764604',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'demand_id' => 0,
    'cat_id' => 0,
    'message_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5af11fc6b026_15748638',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5af11fc6b026_15748638')) {function content_5c5af11fc6b026_15748638($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_mb_ucfirst')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
?><div style="color: #a1a1a1; font-size:12px;">
<hr style="margin-bottom:6px;height:1px;border:none;color:#cfcfcf;background-color:#cfcfcf;"/>
<strong><?php echo L::mailman_request_details;?>
</strong><br/>
<?php echo L::mailman_request_id;?>
: <?php echo $_smarty_tpl->tpl_vars['demand_id']->value;?>
<br/>
<?php echo smarty_modifier_mb_ucfirst(L::modules_categories_morph_one);?>
: <?php if ($_smarty_tpl->tpl_vars['cat_id']->value) {
echo $_smarty_tpl->getSubTemplate ("helpers/catpath.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>$_smarty_tpl->tpl_vars['cat_id']->value), 0);
} else {
echo L::text_inbox;
}?><br/>
<?php if ($_smarty_tpl->tpl_vars['message_data']->value['user_to_id']) {?>
    Ссылка: <a href="<?php echo @constant('HOST_ROOT');?>
demands/view/<?php echo $_smarty_tpl->tpl_vars['demand_id']->value;?>
/"><?php echo @constant('HOST_ROOT');?>
demands/view/<?php echo $_smarty_tpl->tpl_vars['demand_id']->value;?>
/</a>
<?php }?>
</div><?php }} ?>
