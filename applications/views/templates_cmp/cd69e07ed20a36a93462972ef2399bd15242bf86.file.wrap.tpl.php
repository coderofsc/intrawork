<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 17:47:02
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\demands\types\view\wrap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:148965c5af366da8c90-44809202%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd69e07ed20a36a93462972ef2399bd15242bf86' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\demands\\types\\view\\wrap.tpl',
      1 => 1453151576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148965c5af366da8c90-44809202',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dt_data' => 0,
    'ar_demands' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5af366e02a28_39670813',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5af366e02a28_39670813')) {function content_5c5af366e02a28_39670813($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_ts2hours')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.ts2hours.php';
?><div class="form-horizontal form-clamped">
    <div class="form-group">
        <label class="col-sm-4 col-xs-4 control-label"><?php echo L::forms_labels_categories_auto_complete;?>
</label>
        <div class="col-sm-8 col-xs-8">
            <p ><?php if ($_smarty_tpl->tpl_vars['dt_data']->value['auto_complete']) {
echo smarty_modifier_ts2hours($_smarty_tpl->tpl_vars['dt_data']->value['auto_complete']);
} else { ?>Нет<?php }?></p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 col-xs-4 control-label"><?php echo L::forms_labels_categories_auto_prolong;?>
</label>
        <div class="col-sm-8 col-xs-8">
            <p ><?php if ($_smarty_tpl->tpl_vars['dt_data']->value['auto_prolong']) {
echo smarty_modifier_ts2hours($_smarty_tpl->tpl_vars['dt_data']->value['auto_prolong']);
} else { ?>Нет<?php }?></p>
        </div>
    </div>

    <?php if ($_smarty_tpl->tpl_vars['dt_data']->value['descr']) {?>
        <div class="form-group">
            <label class="col-sm-4 col-xs-4 control-label"><?php echo L::forms_labels_descr;?>
</label>
            <div class="col-sm-8 col-xs-8">
                <p ><?php echo $_smarty_tpl->tpl_vars['dt_data']->value['descr'];?>
</p>
            </div>
        </div>
    <?php }?>
</div>

<div class="h3">Правила перехода между статусами</div>
<div style="overflow-x: auto">
<?php echo $_smarty_tpl->getSubTemplate ("../form/transition_statuses_ro.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('ts'=>$_smarty_tpl->tpl_vars['dt_data']->value['ts'],'readonly'=>true), 0);?>

</div>

<div class="h3"><?php echo L::modules_demands_name;?>
 этого типа</div>
<?php echo $_smarty_tpl->getSubTemplate ("demands/list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('ar_demands'=>$_smarty_tpl->tpl_vars['ar_demands']->value,'module_id'=>cls_modules::MODULE_DEMANDS,'denied_delete'=>true,'collapsed'=>true), 0);?>

<?php }} ?>
