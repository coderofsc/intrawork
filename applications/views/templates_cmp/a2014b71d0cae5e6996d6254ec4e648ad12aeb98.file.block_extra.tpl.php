<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 16:16:35
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\users\view\block_extra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:64765c5ade33a24b52-70397200%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2014b71d0cae5e6996d6254ec4e648ad12aeb98' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\users\\view\\block_extra.tpl',
      1 => 1432946958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '64765c5ade33a24b52-70397200',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5ade33a400d6_36997603',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5ade33a400d6_36997603')) {function content_5c5ade33a400d6_36997603($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_data']->value['descr']) {?>
    <p>
        <?php echo $_smarty_tpl->tpl_vars['user_data']->value['descr'];?>

    </p>
<?php } else { ?>
    <div class="alert alert-default">
        Дополнительная информация не указана
    </div>
<?php }?><?php }} ?>
