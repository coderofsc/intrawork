<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 16:13:02
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\helpers\forms\actions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:151295c5add5e7497b8-38421193%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae1e8393ed48e3a9cad7de6d5ddbc83a09bd1032' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\helpers\\forms\\actions.tpl',
      1 => 1450362482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '151295c5add5e7497b8-38421193',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'update' => 0,
    'controller_info' => 0,
    'next' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5add5e774740_81099289',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5add5e774740_81099289')) {function content_5c5add5e774740_81099289($_smarty_tpl) {?><div class="form-actions form-group">
    <div class="col-sm-offset-2 col-xs-offset-3 col-sm-10 col-xs-9">
        <button type="submit" name="save" class="btn btn-primary"><?php if (!$_smarty_tpl->tpl_vars['update']->value) {?><i class="fa fa-plus"></i> <?php echo L::actions_create;
} else { ?><i class="fa fa-save"></i> <?php echo L::actions_save;
}?> <?php echo $_smarty_tpl->tpl_vars['controller_info']->value['module']['morph'][3];?>
</button><?php if (!isset($_smarty_tpl->tpl_vars['next']->value)||$_smarty_tpl->tpl_vars['next']->value==true) {?> и <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/next_actions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('module'=>$_smarty_tpl->tpl_vars['controller_info']->value['module']), 0);
}?>
    </div>
</div>
<?php }} ?>
