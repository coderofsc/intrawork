<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:52:34
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\helpers\catpath.tpl" */ ?>
<?php /*%%SmartyHeaderCode:35815c5a2fd2e0a674-81691157%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a232c3f2fd7df8c0a0e483c7790b3c4b1b9f1dd' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\catpath.tpl',
      1 => 1439336164,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '35815c5a2fd2e0a674-81691157',
  'function' => 
  array (
    'get_name' => 
    array (
      'parameter' => 
      array (
        'id' => 0,
        'link' => false,
        'nosmall' => false,
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'link' => 0,
    'id' => 0,
    'cuser_data' => 0,
    'nosmall' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a2fd2e8f391_26877552',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a2fd2e8f391_26877552')) {function content_5c5a2fd2e8f391_26877552($_smarty_tpl) {?><?php if (!function_exists('smarty_template_function_get_name')) {
    function smarty_template_function_get_name($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['get_name']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <?php if ($_smarty_tpl->tpl_vars['link']->value) {?><a class="catpath" href="demands/?cnd[cat_id]=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><?php }
echo $_smarty_tpl->tpl_vars['cuser_data']->value['ar_access_line_categories'][$_smarty_tpl->tpl_vars['id']->value]['name'];
if ($_smarty_tpl->tpl_vars['link']->value) {?></a><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['cuser_data']->value['ar_access_line_categories'][$_smarty_tpl->tpl_vars['id']->value]['parent_id']) {?><span class="text-muted <?php if (!$_smarty_tpl->tpl_vars['nosmall']->value) {?>small<?php }?>"> / <?php smarty_template_function_get_name($_smarty_tpl,array('id'=>$_smarty_tpl->tpl_vars['cuser_data']->value['ar_access_line_categories'][$_smarty_tpl->tpl_vars['id']->value]['parent_id'],'link'=>$_smarty_tpl->tpl_vars['link']->value));?>
</span><?php }?>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>


<?php smarty_template_function_get_name($_smarty_tpl,array('id'=>$_smarty_tpl->tpl_vars['id']->value,'link'=>$_smarty_tpl->tpl_vars['link']->value,'nosmall'=>$_smarty_tpl->tpl_vars['nosmall']->value));?>
<?php }} ?>
