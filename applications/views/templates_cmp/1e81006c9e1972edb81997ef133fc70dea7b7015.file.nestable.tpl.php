<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 18:47:31
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\categories\nestable.tpl" */ ?>
<?php /*%%SmartyHeaderCode:259305c5b0193e32614-94985757%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e81006c9e1972edb81997ef133fc70dea7b7015' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\categories\\nestable.tpl',
      1 => 1450362482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '259305c5b0193e32614-94985757',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_id' => 0,
    'controller_info' => 0,
    'ar_tree' => 0,
    'category_id' => 0,
    'category' => 0,
    'nested' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5b0193ebb1b6_55752802',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5b0193ebb1b6_55752802')) {function content_5c5b0193ebb1b6_55752802($_smarty_tpl) {?><?php if (!$_smarty_tpl->tpl_vars['module_id']->value&&$_smarty_tpl->tpl_vars['controller_info']->value['module_id']) {?>
    <?php $_smarty_tpl->tpl_vars["module_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['controller_info']->value['module_id'], null, 0);?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['ar_tree']->value) {?>
<ol class="dd-list">
    <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_smarty_tpl->tpl_vars['category_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ar_tree']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
 $_smarty_tpl->tpl_vars['category_id']->value = $_smarty_tpl->tpl_vars['category']->key;
?>
        <li class="dd-item" data-id="<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
">
			<button class="btn btn-default btn-sm dd-handle"><i class="fa fa-arrows-alt"></i></button>
			<div data-id="<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
" class="dd-content c-hand">
				<span class="title pr-90 text-ellipsis"> <?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</span>
                <div class="clearfix"></div>
            </div>
            <div class="dd-extra">
                
                <span class="pull-left">
                    <span class="btn btn-block btn-sm">
                    <i class="fa fa-fw <?php if ($_smarty_tpl->tpl_vars['category']->value['icon']) {
echo $_smarty_tpl->tpl_vars['category']->value['icon'];
} else { ?>fa-circle<?php }?>" style="color: <?php if ($_smarty_tpl->tpl_vars['category']->value['bgcolor']) {
echo $_smarty_tpl->tpl_vars['category']->value['bgcolor'];
} elseif ($_smarty_tpl->tpl_vars['category']->value['icon']) {?>#a7b1c2<?php } else { ?>#e7e7e7<?php }?>"></i>
                    </span>
                </span>
                <span class="pull-left">
                    <?php echo $_smarty_tpl->getSubTemplate ("helpers/lists/actions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('module_id'=>$_smarty_tpl->tpl_vars['module_id']->value,'id'=>$_smarty_tpl->tpl_vars['category_id']->value,'tree'=>true), 0);?>

                </span>

            </div>

            <?php if ($_smarty_tpl->tpl_vars['category']->value['children']) {?>
                <?php echo $_smarty_tpl->getSubTemplate ("categories/nestable.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('nested'=>$_smarty_tpl->tpl_vars['nested']->value+1,'ar_tree'=>$_smarty_tpl->tpl_vars['category']->value['children']), 0);?>

            <?php }?>
        </li>
    <?php } ?>
</ol>
<?php } else { ?>
    <div class="alert alert-default">
    <?php if ($_smarty_tpl->tpl_vars['module_id']->value) {?>
        <?php echo cls_modules::$ar_modules[$_smarty_tpl->tpl_vars['module_id']->value]['name'];?>
 не найдены
    <?php } else { ?>
        <?php echo L::text_nothing_found;?>

    <?php }?>
    </div>
<?php }?><?php }} ?>
