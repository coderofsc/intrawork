<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-14 17:42:22
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\main\breadcrumb.tpl" */ ?>
<?php /*%%SmartyHeaderCode:326075991b6ce3d9f33-19878455%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5adb6463dd9f8f83cfae973c1781e6240e7617ec' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\main\\breadcrumb.tpl',
      1 => 1439414720,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '326075991b6ce3d9f33-19878455',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'controller_info' => 0,
    'crump' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5991b6ce433af7_89465770',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5991b6ce433af7_89465770')) {function content_5991b6ce433af7_89465770($_smarty_tpl) {?>
<ul class="breadcrumb">
	<li><a href="<?php echo @constant('HOST_ROOT');?>
"><?php echo L::intrawork;?>
</a></li>
	<?php if ($_smarty_tpl->tpl_vars['controller_info']->value['path']) {?>
		<?php  $_smarty_tpl->tpl_vars['crump'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['crump']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['controller_info']->value['path']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['crump']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['crump']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['crump']->key => $_smarty_tpl->tpl_vars['crump']->value) {
$_smarty_tpl->tpl_vars['crump']->_loop = true;
 $_smarty_tpl->tpl_vars['crump']->index++;
?>
            <?php if ($_smarty_tpl->tpl_vars['crump']->total>4&&$_smarty_tpl->tpl_vars['crump']->index==2) {?>
                <li><a href="#" onclick="$(this).closest('ul').find('li.hidden').removeClass('hidden'); $(this).parent().remove(); return false;">...</a></li>
            <?php }?>

			<li <?php if ($_smarty_tpl->tpl_vars['crump']->total>4&&$_smarty_tpl->tpl_vars['crump']->index>1&&$_smarty_tpl->tpl_vars['crump']->index<$_smarty_tpl->tpl_vars['crump']->total-1) {?>class="hidden"<?php }?>>
                <?php if ($_smarty_tpl->tpl_vars['crump']->value['icon']) {?><i class="fa text-muted <?php echo $_smarty_tpl->tpl_vars['crump']->value['icon'];?>
"></i>&nbsp;<?php }?><a <?php if ($_smarty_tpl->tpl_vars['crump']->value['muted']) {?>class="text-muted"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['crump']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['crump']->value['title'];?>
</a>
            </li>
		<?php } ?>
	<?php }?>

	<li><?php echo $_smarty_tpl->tpl_vars['controller_info']->value['title'];?>
</li>
</ul>
<?php }} ?>
