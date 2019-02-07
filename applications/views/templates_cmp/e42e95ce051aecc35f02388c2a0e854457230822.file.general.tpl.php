<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 17:20:20
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\demands\search\general.tpl" */ ?>
<?php /*%%SmartyHeaderCode:227435c5aed24acfb99-64893795%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e42e95ce051aecc35f02388c2a0e854457230822' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\demands\\search\\general.tpl',
      1 => 1451783290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '227435c5aed24acfb99-64893795',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data_name' => 0,
    'filter' => 0,
    'cuser_data' => 0,
    'fvalue' => 0,
    'filter_text' => 0,
    'conditions' => 0,
    'filter_cat_id' => 0,
    'global_ar_demands_types' => 0,
    'filter_project_id' => 0,
    'ar_projects' => 0,
    'filter_cu_type' => 0,
    'filter_mb_id' => 0,
    'ar_mb' => 0,
    'filter_cu_eid' => 0,
    'ar_users' => 0,
    'filter_status' => 0,
    'filter_eu_eid' => 0,
    'filter_priority' => 0,
    'filter_ru_eid' => 0,
    'filter_criticality' => 0,
    'filter_mu_eid' => 0,
    'filter_contact_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5aed24d87130_44389686',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5aed24d87130_44389686')) {function content_5c5aed24d87130_44389686($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_mb_ucfirst')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
?><?php if (!$_smarty_tpl->tpl_vars['data_name']->value) {?>
    <?php $_smarty_tpl->tpl_vars["data_name"] = new Smarty_variable("cnd", null, 0);?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['filter']->value&&$_smarty_tpl->tpl_vars['cuser_data']->value['access_data']['filter']) {?>
    <?php  $_smarty_tpl->tpl_vars['fvalue'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fvalue']->_loop = false;
 $_smarty_tpl->tpl_vars['fname'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['cuser_data']->value['access_data']['filter_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fvalue']->key => $_smarty_tpl->tpl_vars['fvalue']->value) {
$_smarty_tpl->tpl_vars['fvalue']->_loop = true;
 $_smarty_tpl->tpl_vars['fname']->value = $_smarty_tpl->tpl_vars['fvalue']->key;
?>
        <?php $_smarty_tpl->tpl_vars["filter_".((string)$_smarty_tpl->tpl_vars['fname']->value)] = new Smarty_variable($_smarty_tpl->tpl_vars['fvalue']->value, null, 0);?>
    <?php } ?>
<?php }?>


<div class="form-group">
    <label for="cnd_text" class="col-sm-2 control-label <?php if ($_smarty_tpl->tpl_vars['filter_text']->value) {?>text-warning role-set<?php }?>"><?php echo L::forms_labels_text;?>
</label>
    <div class="col-sm-10">
        <input <?php if ($_smarty_tpl->tpl_vars['filter']->value&&$_smarty_tpl->tpl_vars['cuser_data']->value['access_data']['filter']&&$_smarty_tpl->tpl_vars['cuser_data']->value['access_data']['filter_data']['text']) {?>disabled<?php }?> type="text" id="cnd_text" class="form-control" name="<?php echo $_smarty_tpl->tpl_vars['data_name']->value;?>
[text]" value="<?php echo $_smarty_tpl->tpl_vars['conditions']->value['text'];?>
">
    </div>
</div>

<div class="form-group">
    <label for="cnd_cat_id" class="col-sm-2 control-label <?php if ($_smarty_tpl->tpl_vars['filter_cat_id']->value) {?>text-warning role-set<?php }?>"><?php echo smarty_modifier_mb_ucfirst(L::modules_categories_morph_one);?>
</label>
    <div class="col-sm-4">
        <select name="<?php echo $_smarty_tpl->tpl_vars['data_name']->value;?>
[cat_id][]" data-selected-text-format="count" id="cnd_cat_id" multiple class="select-reset form-control selectpicker" data-align-right="true" data-live-search="true">
            <?php if ($_smarty_tpl->tpl_vars['filter_cat_id']->value) {?>
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/cat_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tree'=>$_smarty_tpl->tpl_vars['cuser_data']->value['ar_access_tree_categories'],'selected'=>$_smarty_tpl->tpl_vars['conditions']->value['cat_id'],'only'=>$_smarty_tpl->tpl_vars['filter_cat_id']->value), 0);?>

            <?php } else { ?>
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/cat_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tree'=>$_smarty_tpl->tpl_vars['cuser_data']->value['ar_access_tree_categories'],'selected'=>$_smarty_tpl->tpl_vars['conditions']->value['cat_id']), 0);?>

            <?php }?>
        </select>
    </div>
    <label for="cnd_demand_type_id" class="col-sm-2 control-label"><?php echo smarty_modifier_mb_ucfirst(L::modules_demands_types_morph_one);?>
</label>
    <div class="col-sm-4">
        <select name="<?php echo $_smarty_tpl->tpl_vars['data_name']->value;?>
[type_id][]" multiple id="cnd_type_id" class="form-control selectpicker" data-live-search="true">
            <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data'=>$_smarty_tpl->tpl_vars['global_ar_demands_types']->value,'selected'=>$_smarty_tpl->tpl_vars['conditions']->value['demand_type_id']), 0);?>

        </select>
    </div>
</div>



<div class="form-group">
    <label for="cnd_project_id" class="col-sm-2 control-label <?php if ($_smarty_tpl->tpl_vars['filter_project_id']->value) {?>text-warning role-set<?php }?>"><?php echo smarty_modifier_mb_ucfirst(L::modules_projects_morph_one);?>
</label>
    <div class="col-sm-4">
        <select name="<?php echo $_smarty_tpl->tpl_vars['data_name']->value;?>
[project_id]" id="cnd_project_id" class="form-control selectpicker" data-live-search="true">
            <option value="0"></option>
            
            <?php if ($_smarty_tpl->tpl_vars['filter_project_id']->value) {?>
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data'=>$_smarty_tpl->tpl_vars['ar_projects']->value,'selected'=>$_smarty_tpl->tpl_vars['conditions']->value['project_id'],'only'=>$_smarty_tpl->tpl_vars['filter_project_id']->value), 0);?>

            <?php } else { ?>
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data'=>$_smarty_tpl->tpl_vars['ar_projects']->value,'selected'=>$_smarty_tpl->tpl_vars['conditions']->value['project_id']), 0);?>

            <?php }?>
        </select>
    </div>
    <div id="project_version_id" style="display: none">
        <label for="cnd_demand_version_id" class="col-sm-2 control-label">Версия</label>
        <div class="col-sm-4">
            <select name="<?php echo $_smarty_tpl->tpl_vars['data_name']->value;?>
[version_id]" id="cnd_version_id" class="form-control selectpicker" data-live-search="true">
            </select>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
>
    var version_id = <?php echo intval($_smarty_tpl->tpl_vars['conditions']->value['version_id']);?>
;
    $("#cnd_project_id").on("change", function() {
        var project_id = $(this).val();

        var $version_select = $("#cnd_version_id");

        $version_select.empty().attr("disabled", "disabled").selectpicker("refresh");

        if (project_id != 0) {
            $.getJSON( "projects/view/"+project_id+"/get_versions/", function( data ) {
                $version_select.append('<option value="0"></option>');
                $.each( data, function( id, item ) {
                    $version_select.append('<option value="'+id+'" '+((version_id==id)?'selected':'')+'>'+item.name+' ('+item.demands_count+')</option>');
                });

                $version_select.removeAttr("disabled").selectpicker("refresh");
            });

            $("#project_version_id").fadeIn();
        } else {
            $("#project_version_id").fadeOut();
        }
    }).change();
<?php echo '</script'; ?>
>



<div class="form-group">
    <label for="cnd_cu_type" class="col-sm-2 control-label <?php if ($_smarty_tpl->tpl_vars['filter_cu_type']->value) {?>text-warning role-set<?php }?>">Тип заказчика</label>
    <div class="col-sm-4">

            <select name="<?php echo $_smarty_tpl->tpl_vars['data_name']->value;?>
[cu_type]" id="cnd_cu_type" class="form-control selectpicker">
                <option value="0"></option>
                <?php if ($_smarty_tpl->tpl_vars['filter_cu_type']->value) {?>
                    <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/customer_type.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['conditions']->value['cu_type'],'only'=>$_smarty_tpl->tpl_vars['filter_cu_type']->value), 0);?>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/customer_type.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['conditions']->value['cu_type']), 0);?>

                <?php }?>

            </select>

    </div>

    <label for="cnd_mb_id" class="col-sm-2 control-label <?php if ($_smarty_tpl->tpl_vars['filter_mb_id']->value) {?>text-warning role-set<?php }?>"><?php echo smarty_modifier_mb_ucfirst(L::modules_mailbots_morph_one);?>
</label>
    <div class="col-sm-4">
        <select name="<?php echo $_smarty_tpl->tpl_vars['data_name']->value;?>
[mb_id][]" multiple id="cnd_mb_id" class="form-control selectpicker select-reset" data-live-search="true" data-selected-text-format="count">
            <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/select_empty_option.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['conditions']->value['mb_id']), 0);?>

            <?php if ($_smarty_tpl->tpl_vars['filter_mb_id']->value) {?>
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data'=>$_smarty_tpl->tpl_vars['ar_mb']->value,'selected'=>$_smarty_tpl->tpl_vars['conditions']->value['mb_id'],'only'=>$_smarty_tpl->tpl_vars['filter_mb_id']->value), 0);?>

            <?php } else { ?>
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data'=>$_smarty_tpl->tpl_vars['ar_mb']->value,'selected'=>$_smarty_tpl->tpl_vars['conditions']->value['mb_id']), 0);?>

            <?php }?>
        </select>
        
    </div>
</div>



<div class="form-group">
    <label for="cnd_cu_eid" class="col-sm-2 control-label <?php if ($_smarty_tpl->tpl_vars['filter_cu_eid']->value) {?>text-warning role-set<?php }?>"><?php echo L::members_customer;?>
</label>
    <div class="col-sm-4">

        <div class="input-group">
            <select name="<?php echo $_smarty_tpl->tpl_vars['data_name']->value;?>
[cu_eid][]" multiple id="cnd_cu_eid" class="form-control selectpicker select-reset" data-live-search="true" data-selected-text-format="count">
                <?php if (!$_smarty_tpl->tpl_vars['filter']->value) {?>
                    <option value="<?php echo @constant('SESSION_USER_EID_VALUE');?>
" <?php if ($_smarty_tpl->tpl_vars['conditions']->value['cu_eid']&&in_array(@constant('SESSION_USER_EID_VALUE'),$_smarty_tpl->tpl_vars['conditions']->value['cu_eid'])) {?>selected=""<?php }?>>Пользователь сессии</option>
                    
                <?php }?>
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/select_empty_option.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['conditions']->value['cu_eid']), 0);?>

                <?php if ($_smarty_tpl->tpl_vars['filter_cu_eid']->value) {?>
                    <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data'=>$_smarty_tpl->tpl_vars['ar_users']->value,'text'=>"fio",'value'=>"eid",'selected'=>$_smarty_tpl->tpl_vars['conditions']->value['cu_eid'],'group'=>"dprt_name",'only'=>$_smarty_tpl->tpl_vars['filter_cu_eid']->value), 0);?>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data'=>$_smarty_tpl->tpl_vars['ar_users']->value,'text'=>"fio",'value'=>"eid",'selected'=>$_smarty_tpl->tpl_vars['conditions']->value['cu_eid'],'group'=>"dprt_name"), 0);?>

                <?php }?>
            </select>
            <span class="input-group-btn">
                <button class="btn btn-default btn-find-option" data-for="#cnd_cu_eid" data-value="<?php echo $_smarty_tpl->tpl_vars['cuser_data']->value['eid'];?>
" type="button">Я</button>
            </span>
        </div>

    </div>
    <label for="cnd_status" class="col-sm-2 control-label <?php if ($_smarty_tpl->tpl_vars['filter_status']->value) {?>text-warning role-set<?php }?>"><?php echo L::forms_labels_demands_status;?>
</label>
    <div class="col-sm-4">
        <select name="<?php echo $_smarty_tpl->tpl_vars['data_name']->value;?>
[status][]" multiple id="cnd_status" class="form-control selectpicker" data-selected-text-format="count">
            <?php if ($_smarty_tpl->tpl_vars['filter_status']->value) {?>
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/demand_status.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['conditions']->value['status'],'only'=>$_smarty_tpl->tpl_vars['filter_status']->value), 0);?>

                <?php } else { ?>
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/demand_status.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['conditions']->value['status']), 0);?>

            <?php }?>

        </select>
    </div>
</div>
<div class="form-group">
    <label for="cnd_eu_eid" class="col-sm-2 control-label <?php if ($_smarty_tpl->tpl_vars['filter_eu_eid']->value) {?>text-warning role-set<?php }?>"><?php echo L::members_executor;?>
</label>
    <div class="col-sm-4">

        <div class="input-group">
            <select name="<?php echo $_smarty_tpl->tpl_vars['data_name']->value;?>
[eu_eid][]" multiple id="cnd_eu_eid" class="select-reset form-control selectpicker" data-live-search="true" data-selected-text-format="count">
                <?php if (!$_smarty_tpl->tpl_vars['filter']->value) {?>
                    <option value="<?php echo @constant('SESSION_USER_EID_VALUE');?>
" <?php if ($_smarty_tpl->tpl_vars['conditions']->value['eu_eid']&&in_array(@constant('SESSION_USER_EID_VALUE'),$_smarty_tpl->tpl_vars['conditions']->value['eu_eid'])) {?>selected=""<?php }?>>Пользователь сессии</option>
                    
                <?php }?>
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/select_empty_option.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['conditions']->value['eu_eid']), 0);?>

                <?php if ($_smarty_tpl->tpl_vars['filter_eu_eid']->value) {?>
                    <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data'=>$_smarty_tpl->tpl_vars['ar_users']->value,'text'=>"fio",'value'=>"eid",'selected'=>$_smarty_tpl->tpl_vars['conditions']->value['eu_eid'],'group'=>"dprt_name",'only'=>$_smarty_tpl->tpl_vars['filter_eu_eid']->value), 0);?>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data'=>$_smarty_tpl->tpl_vars['ar_users']->value,'text'=>"fio",'value'=>"eid",'selected'=>$_smarty_tpl->tpl_vars['conditions']->value['eu_eid'],'group'=>"dprt_name"), 0);?>

                <?php }?>
            </select>
            <span class="input-group-btn">
                <button class="btn btn-default btn-find-option" data-for="#cnd_eu_eid" data-value="<?php echo $_smarty_tpl->tpl_vars['cuser_data']->value['eid'];?>
" type="button">Я</button>
            </span>
        </div>

    </div>
    <label for="cnd_priority" class="col-sm-2 control-label <?php if ($_smarty_tpl->tpl_vars['filter_priority']->value) {?>text-warning role-set<?php }?>"><?php echo L::forms_labels_demands_priority;?>
</label>
    <div class="col-sm-4">
        <select name="<?php echo $_smarty_tpl->tpl_vars['data_name']->value;?>
[priority][]" multiple id="cnd_priority" class="form-control selectpicker" data-selected-text-format="count">
            <?php if ($_smarty_tpl->tpl_vars['filter_priority']->value) {?>
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/demand_priority.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['conditions']->value['priority'],'options'=>true,'only'=>$_smarty_tpl->tpl_vars['filter_priority']->value), 0);?>

            <?php } else { ?>
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/demand_priority.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['conditions']->value['priority'],'options'=>true), 0);?>

            <?php }?>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="cnd_ru_eid" class="col-sm-2 control-label <?php if ($_smarty_tpl->tpl_vars['filter_ru_eid']->value) {?>text-warning role-set<?php }?>"><?php echo L::members_responsible;?>
</label>
    <div class="col-sm-4">

        <div class="input-group">
            <select name="<?php echo $_smarty_tpl->tpl_vars['data_name']->value;?>
[ru_eid][]" multiple id="cnd_ru_eid" class="select-reset form-control selectpicker" data-live-search="true" data-selected-text-format="count">
                <?php if (!$_smarty_tpl->tpl_vars['filter']->value) {?>
                    <option value="<?php echo @constant('SESSION_USER_EID_VALUE');?>
" <?php if ($_smarty_tpl->tpl_vars['conditions']->value['ru_eid']&&in_array(@constant('SESSION_USER_EID_VALUE'),$_smarty_tpl->tpl_vars['conditions']->value['ru_eid'])) {?>selected=""<?php }?>>Пользователь сессии</option>
                    
                <?php }?>
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/select_empty_option.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['conditions']->value['ru_eid']), 0);?>

                <?php if ($_smarty_tpl->tpl_vars['filter_ru_eid']->value) {?>
                    <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data'=>$_smarty_tpl->tpl_vars['ar_users']->value,'text'=>"fio",'value'=>"eid",'selected'=>$_smarty_tpl->tpl_vars['conditions']->value['ru_eid'],'group'=>"dprt_name",'only'=>$_smarty_tpl->tpl_vars['filter_ru_eid']->value), 0);?>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data'=>$_smarty_tpl->tpl_vars['ar_users']->value,'text'=>"fio",'value'=>"eid",'selected'=>$_smarty_tpl->tpl_vars['conditions']->value['ru_eid'],'group'=>"dprt_name"), 0);?>

                <?php }?>
            </select>
            <span class="input-group-btn">
                <button class="btn btn-default btn-find-option" data-for="#cnd_ru_eid" data-value="<?php echo $_smarty_tpl->tpl_vars['cuser_data']->value['eid'];?>
" type="button">Я</button>
            </span>
        </div>

    </div>
    <label for="cnd_criticality" class="col-sm-2 control-label <?php if ($_smarty_tpl->tpl_vars['filter_criticality']->value) {?>text-warning role-set<?php }?>"><?php echo L::forms_labels_demands_criticality;?>
</label>
    <div class="col-sm-4">
        <select name="<?php echo $_smarty_tpl->tpl_vars['data_name']->value;?>
[criticality][]" multiple id="cnd_criticality" class="form-control selectpicker" data-selected-text-format="count">
            <?php if ($_smarty_tpl->tpl_vars['filter_criticality']->value) {?>
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/demand_criticality.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['conditions']->value['criticality'],'only'=>$_smarty_tpl->tpl_vars['filter_criticality']->value), 0);?>

            <?php } else { ?>
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/demand_criticality.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['conditions']->value['criticality']), 0);?>

            <?php }?>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="cnd_mu_eid" class="col-sm-2 control-label <?php if ($_smarty_tpl->tpl_vars['filter_mu_eid']->value) {?>text-warning role-set<?php }?>"><?php echo L::members_member;?>
</label>
    <div class="col-sm-4">

        <div class="input-group">
            <select name="<?php echo $_smarty_tpl->tpl_vars['data_name']->value;?>
[mu_eid][]" multiple id="cnd_mu_eid" class="select-reset form-control selectpicker" data-live-search="true" data-selected-text-format="count">
                <?php if (!$_smarty_tpl->tpl_vars['filter']->value) {?>
                    <option value="<?php echo @constant('SESSION_USER_EID_VALUE');?>
" <?php if ($_smarty_tpl->tpl_vars['conditions']->value['mu_eid']&&in_array(@constant('SESSION_USER_EID_VALUE'),$_smarty_tpl->tpl_vars['conditions']->value['mu_eid'])) {?>selected=""<?php }?>>Пользователь сессии</option>
                    
                <?php }?>
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/select_empty_option.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['conditions']->value['mu_eid']), 0);?>

                <?php if ($_smarty_tpl->tpl_vars['filter_mu_eid']->value) {?>
                    <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data'=>$_smarty_tpl->tpl_vars['ar_users']->value,'text'=>"fio",'value'=>"eid",'selected'=>$_smarty_tpl->tpl_vars['conditions']->value['mu_eid'],'group'=>"dprt_name",'only'=>$_smarty_tpl->tpl_vars['filter_mu_eid']->value), 0);?>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data'=>$_smarty_tpl->tpl_vars['ar_users']->value,'text'=>"fio",'value'=>"eid",'selected'=>$_smarty_tpl->tpl_vars['conditions']->value['mu_eid'],'group'=>"dprt_name"), 0);?>

                <?php }?>
            </select>
            <span class="input-group-btn">
                <button class="btn btn-default btn-find-option" data-for="#cnd_mu_eid" data-value="<?php echo $_smarty_tpl->tpl_vars['cuser_data']->value['eid'];?>
" type="button">Я</button>
            </span>
        </div>

    </div>
    <label for="cnd_contact_id" class="col-sm-2 control-label <?php if ($_smarty_tpl->tpl_vars['filter_contact_id']->value) {?>text-warning role-set<?php }?>"><?php echo smarty_modifier_mb_ucfirst(L::modules_contacts_morph_one);?>
</label>
    <div class="col-sm-4">
        <select name="<?php echo $_smarty_tpl->tpl_vars['data_name']->value;?>
[contact_id][]" multiple id="cnd_contact_id" class="select-reset form-control selectpicker" data-align-right="true" data-selected-text-format="count" data-show-subtext="true">
            <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/select_empty_option.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['conditions']->value['contact_id']), 0);?>

            <?php if ($_smarty_tpl->tpl_vars['filter_contact_id']->value) {?>
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/contact_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('empty'=>false,'value'=>$_smarty_tpl->tpl_vars['conditions']->value['contact_id'],'only'=>$_smarty_tpl->tpl_vars['filter_contact_id']->value), 0);?>

            <?php } else { ?>
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/contact_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('empty'=>false,'value'=>$_smarty_tpl->tpl_vars['conditions']->value['contact_id']), 0);?>

            <?php }?>
        </select>
    </div>
</div>

<?php if ($_smarty_tpl->tpl_vars['filter']->value&&$_smarty_tpl->tpl_vars['cuser_data']->value['access_data']['filter']) {?>
<?php echo '<script'; ?>
>
    $(document).ready(function() {

        $('label.role-set').each(function() {
            var name = $(this).html();
            $(this).popover({
                content: "Значение установлено фильтром вашей роли и не может быть изменено вне указанных условий",
                title: "Установлен фильтр: "+name,
                trigger: "hover"
            });
        });
    });
<?php echo '</script'; ?>
>
<?php }?><?php }} ?>
