<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-11-09 13:04:55
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\files\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:150905a042847791241-50739671%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7890f926c99720d2ea11f6bb4fe48c010fea011' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\files\\list.tpl',
      1 => 1454576666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '150905a042847791241-50739671',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_files' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5a0428477af309_83073519',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0428477af309_83073519')) {function content_5a0428477af309_83073519($_smarty_tpl) {?><div class="container-fluid">
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
