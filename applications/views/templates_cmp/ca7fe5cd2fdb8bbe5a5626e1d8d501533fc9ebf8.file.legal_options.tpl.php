<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-09-22 14:37:52
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\contacts\form\legal_options.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1389259c4f610b35c07-88433265%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca7fe5cd2fdb8bbe5a5626e1d8d501533fc9ebf8' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\contacts\\form\\legal_options.tpl',
      1 => 1449756326,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1389259c4f610b35c07-88433265',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'contact_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59c4f610b4dd23_92978977',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c4f610b4dd23_92978977')) {function content_59c4f610b4dd23_92978977($_smarty_tpl) {?><option value="<?php echo @constant('NATURAL_PERSON');?>
">Физическое лицо</option>
<option <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['legal']==@constant('LEGAL_PERSON')) {?>selected=""<?php }?> value="<?php echo @constant('LEGAL_PERSON');?>
">Юридическое лицо</option>
<?php }} ?>
