<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-11-09 13:04:30
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\users\view\block_extra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:295735a04282ee80dd7-52623458%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e65f2b529c1476d12ba2e5985bfdc7e6cc371d4' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\users\\view\\block_extra.tpl',
      1 => 1432946958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '295735a04282ee80dd7-52623458',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5a04282ee94421_41001864',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a04282ee94421_41001864')) {function content_5a04282ee94421_41001864($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_data']->value['descr']) {?>
    <p>
        <?php echo $_smarty_tpl->tpl_vars['user_data']->value['descr'];?>

    </p>
<?php } else { ?>
    <div class="alert alert-default">
        Дополнительная информация не указана
    </div>
<?php }?><?php }} ?>
