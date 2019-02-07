<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 04:04:07
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\contacts\form\legal_options.tpl" */ ?>
<?php /*%%SmartyHeaderCode:319695c5a3287d32211-15829146%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eeb9515ff514822d1802e72d97e659c9ef4b69dc' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\contacts\\form\\legal_options.tpl',
      1 => 1449756326,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '319695c5a3287d32211-15829146',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'contact_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a3287d45a93_00695819',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a3287d45a93_00695819')) {function content_5c5a3287d45a93_00695819($_smarty_tpl) {?><option value="<?php echo @constant('NATURAL_PERSON');?>
">Физическое лицо</option>
<option <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['legal']==@constant('LEGAL_PERSON')) {?>selected=""<?php }?> value="<?php echo @constant('LEGAL_PERSON');?>
">Юридическое лицо</option>
<?php }} ?>
