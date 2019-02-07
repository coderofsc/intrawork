<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:23:43
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\users\view\block_extra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:36405c5a290f37f004-06649744%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e8402a225df824c44fe8157200d0d9a0e25c2ff' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\users\\view\\block_extra.tpl',
      1 => 1432946958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36405c5a290f37f004-06649744',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a290f38ab85_43063927',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a290f38ab85_43063927')) {function content_5c5a290f38ab85_43063927($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_data']->value['descr']) {?>
    <p>
        <?php echo $_smarty_tpl->tpl_vars['user_data']->value['descr'];?>

    </p>
<?php } else { ?>
    <div class="alert alert-default">
        Дополнительная информация не указана
    </div>
<?php }?><?php }} ?>
