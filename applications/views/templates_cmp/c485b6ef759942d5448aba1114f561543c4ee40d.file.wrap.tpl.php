<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-09-22 14:38:40
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\demands\types\view\wrap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1844359c4f640519750-02231733%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c485b6ef759942d5448aba1114f561543c4ee40d' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\demands\\types\\view\\wrap.tpl',
      1 => 1453151576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1844359c4f640519750-02231733',
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
  'unifunc' => 'content_59c4f640560bf2_87867144',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c4f640560bf2_87867144')) {function content_59c4f640560bf2_87867144($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_ts2hours')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\modifier.ts2hours.php';
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
