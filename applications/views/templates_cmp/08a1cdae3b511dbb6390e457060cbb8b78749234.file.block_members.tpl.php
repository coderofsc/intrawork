<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 17:13:11
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\demands\form\block_members.tpl" */ ?>
<?php /*%%SmartyHeaderCode:48365c5aeb778f1083-03257016%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08a1cdae3b511dbb6390e457060cbb8b78749234' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\demands\\form\\block_members.tpl',
      1 => 1452677538,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48365c5aeb778f1083-03257016',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'demand_data' => 0,
    'cuser_data' => 0,
    'ar_users' => 0,
    'storage_field' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5aeb77991334_79670460',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5aeb77991334_79670460')) {function content_5c5aeb77991334_79670460($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_mb_ucfirst')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
?><div class="form-group">
    <label for="demand_data_cu_eid" class="col-sm-4 control-label"><?php echo L::members_customer;?>
</label>
    <div class="col-sm-8">
        <p class="form-control-static">
        <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['id']) {?>
            <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['cu_eid']) {?>
                <strong><?php echo $_smarty_tpl->tpl_vars['demand_data']->value['cu_short_fio'];?>
</strong>
            <?php }?>
            <span class="text-muted">&lt;<?php echo $_smarty_tpl->tpl_vars['demand_data']->value['cu_email'];?>
&gt;</span>
        <?php } else { ?>
            <?php echo $_smarty_tpl->tpl_vars['cuser_data']->value['short_fio'];?>

        <?php }?>
        </p>

        
    </div>
</div>

<div class="form-group">
    <label for="demand_data_eu_eid" class="col-sm-4 control-label"><?php echo L::members_executor;?>
</label>
    <div class="col-sm-8">

        <?php if ($_smarty_tpl->tpl_vars['cuser_data']->value['access_data']['limited_setting']) {?>
        <p class="form-control-static">
            <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['id']&&$_smarty_tpl->tpl_vars['demand_data']->value['eu_eid']) {?>
                <strong><?php echo $_smarty_tpl->tpl_vars['demand_data']->value['eu_short_fio'];?>
</strong>
                <span class="text-muted">&lt;<?php echo $_smarty_tpl->tpl_vars['demand_data']->value['eu_email'];?>
&gt;</span>
            <?php } else { ?>
                <span class="text-muted"><?php echo smarty_modifier_mb_ucfirst(L::text_unknown);?>
</span>
            <?php }?>
        </p>
        <?php } else { ?>
            <div class="input-group">
                <select name="demand_data[eu_eid]" id="demand_data_eu_eid" class="form-control selectpicker" data-align-right="true" data-live-search="true">
                    <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('empty'=>true,'data'=>$_smarty_tpl->tpl_vars['ar_users']->value,'text'=>"fio",'value'=>"eid",'selected'=>$_smarty_tpl->tpl_vars['demand_data']->value['eu_eid'],'group'=>"dprt_name"), 0);?>

                </select>
                <span class="input-group-btn">
                    <button class="btn btn-default btn-find-option" data-for="#demand_data_eu_eid" data-value="<?php echo $_smarty_tpl->tpl_vars['cuser_data']->value['eid'];?>
" type="button">Я</button>
                </span>
                <?php if (!$_smarty_tpl->tpl_vars['demand_data']->value['id']) {?>
                <span class="input-group-addon">
                    <input type="checkbox" class="storage-data" name="storage_field[]" value="eu_eid" <?php if (in_array("eu_eid",$_smarty_tpl->tpl_vars['storage_field']->value)) {?>checked=""<?php }?>>
                </span>
                <?php }?>
            </div>
        <?php }?>
        
    </div>
</div>

<div class="form-group">
    <label for="demand_data_ru_eid" class="col-sm-4 control-label"><?php echo L::members_responsible;?>
</label>
    <div class="col-sm-8">
        <?php if ($_smarty_tpl->tpl_vars['cuser_data']->value['access_data']['limited_setting']) {?>
            <p class="form-control-static">
                <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['id']&&$_smarty_tpl->tpl_vars['demand_data']->value['ru_eid']) {?>
                    <strong><?php echo $_smarty_tpl->tpl_vars['demand_data']->value['ru_short_fio'];?>
</strong>
                    <span class="text-muted">&lt;<?php echo $_smarty_tpl->tpl_vars['demand_data']->value['ru_email'];?>
&gt;</span>
                <?php } else { ?>
                    <span class="text-muted"><?php echo smarty_modifier_mb_ucfirst(L::text_unknown);?>
</span>
                <?php }?>
            </p>
        <?php } else { ?>
            <div class="input-group">
                <select name="demand_data[ru_eid]" id="demand_data_ru_eid" class="form-control selectpicker" data-align-right="true" data-live-search="true">
                    <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('empty'=>true,'data'=>$_smarty_tpl->tpl_vars['ar_users']->value,'text'=>"fio",'value'=>"eid",'selected'=>$_smarty_tpl->tpl_vars['demand_data']->value['ru_eid'],'group'=>"dprt_name"), 0);?>

                </select>
                <span class="input-group-btn">
                    <button class="btn btn-default btn-find-option" data-for="#demand_data_ru_eid" data-value="<?php echo $_smarty_tpl->tpl_vars['cuser_data']->value['eid'];?>
" type="button">Я</button>
                </span>
                <?php if (!$_smarty_tpl->tpl_vars['demand_data']->value['id']) {?>
                <span class="input-group-addon">
                    <input type="checkbox" class="storage-data" name="storage_field[]" value="ru_eid" <?php if (in_array("ru_eid",$_smarty_tpl->tpl_vars['storage_field']->value)) {?>checked=""<?php }?> />
                </span>
                <?php }?>
            </div>
        <?php }?>
    </div>
</div>
<?php }} ?>
