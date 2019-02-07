<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-14 17:42:22
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\demands\view\branch\nestable.tpl" */ ?>
<?php /*%%SmartyHeaderCode:323355991b6ced45b97-86552596%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c734e93cf3491c8efe3a7a0a2c2bef53657ccbc' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\demands\\view\\branch\\nestable.tpl',
      1 => 1450362482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '323355991b6ced45b97-86552596',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_tree' => 0,
    'demand_id' => 0,
    'demand_data' => 0,
    'demand' => 0,
    'nested' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5991b6ced882e2_60240425',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5991b6ced882e2_60240425')) {function content_5991b6ced882e2_60240425($_smarty_tpl) {?><ol class="dd-list">
    <?php  $_smarty_tpl->tpl_vars['demand'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['demand']->_loop = false;
 $_smarty_tpl->tpl_vars['demand_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ar_tree']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['demand']->key => $_smarty_tpl->tpl_vars['demand']->value) {
$_smarty_tpl->tpl_vars['demand']->_loop = true;
 $_smarty_tpl->tpl_vars['demand_id']->value = $_smarty_tpl->tpl_vars['demand']->key;
?>
        <li class="dd-item" data-id="<?php echo $_smarty_tpl->tpl_vars['demand_id']->value;?>
">
            <button class="btn btn-default btn-sm dd-handle"><i class="fa fa-arrows-alt"></i></button>
            <div data-id="<?php echo $_smarty_tpl->tpl_vars['demand_id']->value;?>
" class="dd-content c-hand <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['id']==$_smarty_tpl->tpl_vars['demand']->value['id']) {?>selected<?php }?>">
                <a href="demands/view/<?php echo $_smarty_tpl->tpl_vars['demand']->value['id'];?>
/" class="title pr-90 text-ellipsis">
                    
                    <?php echo $_smarty_tpl->tpl_vars['demand']->value['title'];?>

                </a>
                <div class="clearfix"></div>
            </div>
            <div class="dd-extra">
                <span class="pull-left">
                    <span class="btn btn-block">
                    <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/demand_status.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['demand']->value['status'],'read'=>true), 0);?>

                    </span>
                </span>
                <span class="pull-left">
                    
                </span>
            </div>

            <?php if ($_smarty_tpl->tpl_vars['demand']->value['children']) {?>
                <?php echo $_smarty_tpl->getSubTemplate ("./nestable.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('nested'=>$_smarty_tpl->tpl_vars['nested']->value+1,'ar_tree'=>$_smarty_tpl->tpl_vars['demand']->value['children']), 0);?>

            <?php }?>
        </li>
    <?php } ?>
</ol>
<?php }} ?>
