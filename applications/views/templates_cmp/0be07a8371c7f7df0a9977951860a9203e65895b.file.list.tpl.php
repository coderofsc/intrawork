<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:27:37
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\files\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:164825c5a29f90483c5-93002528%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0be07a8371c7f7df0a9977951860a9203e65895b' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\files\\list.tpl',
      1 => 1454576666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164825c5a29f90483c5-93002528',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_files' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a29f9057dc7_42970529',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a29f9057dc7_42970529')) {function content_5c5a29f9057dc7_42970529($_smarty_tpl) {?><div class="container-fluid">
    <div class="row">
        <div class="col-lg-12" id="fm-container">
            <?php  $_smarty_tpl->tpl_vars['file'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['file']->_loop = false;
 $_smarty_tpl->tpl_vars['file_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ar_files']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['file']->key => $_smarty_tpl->tpl_vars['file']->value) {
$_smarty_tpl->tpl_vars['file']->_loop = true;
 $_smarty_tpl->tpl_vars['file_id']->value = $_smarty_tpl->tpl_vars['file']->key;
?>
                <?php echo $_smarty_tpl->getSubTemplate ("./item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <?php } ?>
        </div>
    </div>
</div>

<?php }} ?>
