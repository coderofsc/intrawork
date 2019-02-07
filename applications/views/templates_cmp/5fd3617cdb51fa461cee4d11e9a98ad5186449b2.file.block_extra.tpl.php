<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:27:06
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\contacts\view\block_extra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:48585c5a29da27ba70-71952093%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fd3617cdb51fa461cee4d11e9a98ad5186449b2' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\contacts\\view\\block_extra.tpl',
      1 => 1449698800,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48585c5a29da27ba70-71952093',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'contact_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a29da2875f4_19617103',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a29da2875f4_19617103')) {function content_5c5a29da2875f4_19617103($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['contact_data']->value['descr']) {?>
    <p>
        <?php echo $_smarty_tpl->tpl_vars['contact_data']->value['descr'];?>

    </p>
<?php } else { ?>
    <div class="alert alert-default">
        Дополнительная информация не указана
    </div>
<?php }?><?php }} ?>
