<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 05:29:36
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\demands\view\block_demand.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2475c5a469062e912-82819604%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f7aae84d559e21ae41b50f9840a888c36959dc5' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\demands\\view\\block_demand.tpl',
      1 => 1453148300,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2475c5a469062e912-82819604',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'demand_data' => 0,
    'detail' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a46907c4d74_35936559',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a46907c4d74_35936559')) {function content_5c5a46907c4d74_35936559($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_mb_ucfirst')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
if (!is_callable('smarty_modifier_ts2hours')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.ts2hours.php';
if (!is_callable('smarty_modifier_ts2text')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.ts2text.php';
?><div class="form-horizontal  ">
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group clamped-margin-bottom">
                
                <label class="col-sm-2 col-xs-3 control-label">Тип</label>
                <div class="col-sm-2 col-xs-3">
                    <p class="form-control-static">
                        <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['type_name']) {?><label class="label label-<?php echo $_smarty_tpl->tpl_vars['demand_data']->value['type_type'];?>
"><?php echo $_smarty_tpl->tpl_vars['demand_data']->value['type_name'];?>
</label><?php } else { ?><span class="label label-disable"><?php echo smarty_modifier_mb_ucfirst(L::text_unknown);?>
</span><?php }?>
                        <span class="hidden-xs">
                        <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/demand_status.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['demand_data']->value['status'],'read'=>true), 0);?>

                        </span>
                    </p>
                </div>
                
                <div class="visible-xs">
                <label class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_demands_status;?>
</label>
                <div class="col-sm-2 col-xs-3">
                    <p class="form-control-static"><?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/demand_status.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['demand_data']->value['status'],'read'=>true), 0);?>
</p>
                </div>
                </div>
                
                <label class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_demands_priority;?>
</label>
                <div class="col-sm-2 col-xs-3">
                    <p class="form-control-static"><?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/demand_priority.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['demand_data']->value['priority'],'read'=>true), 0);?>
</p>
                </div>
                
                <label class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_demands_criticality;?>
</label>
                <div class="col-sm-2 col-xs-3">
                    <p class="form-control-static"><?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/demand_criticality.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['demand_data']->value['criticality'],'read'=>true), 0);?>
</p>
                </div>

                
                <label class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_demands_time_in_work;?>
<span class="hidden-sm hidden-xs"></span></label>
                <div class="col-sm-2 col-xs-3">
                    <p class="form-control-static text-ellipsis">
                        <?php echo smarty_modifier_ts2hours($_smarty_tpl->tpl_vars['demand_data']->value['exec_time']);?>

                    </p>
                </div>


                
                <label class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_demands_required_time;?>
<span class="hidden-sm hidden-xs"></span></label>
                <div class="col-sm-2 col-xs-3">
                    <p class="form-control-static">
                        <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['required_time']) {?>
                            <?php echo smarty_modifier_ts2hours($_smarty_tpl->tpl_vars['demand_data']->value['required_time']);?>

                        <?php } else { ?>
                            <span class="text-muted"><?php echo L::text_not_specified;?>
</span>
                        <?php }?>
                    </p>
                </div>

                <div class="clearfix visible-xs"></div>

                <label class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_demands_implement_percent;?>
</label>
                <div class="col-sm-2 col-xs-3">
                    <div class="form-control-static">
                        <div class="progress progress-striped <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['status']==m_demands::STATUS_WORK) {?>active<?php }?> clamped">
                            <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['percent_complete']<=100) {?>
                                <div class="progress-bar progress-bar-success" aria-valuenow="<?php echo $_smarty_tpl->tpl_vars['demand_data']->value['percent_complete'];?>
" style="width: <?php echo $_smarty_tpl->tpl_vars['demand_data']->value['percent_complete'];?>
%">
                                    <?php echo $_smarty_tpl->tpl_vars['demand_data']->value['percent_complete'];?>
%
                                </div>
                            <?php } else { ?>
                                <div class="progress-bar progress-bar-success" aria-valuenow="<?php echo $_smarty_tpl->tpl_vars['demand_data']->value['percent_complete'];?>
" style="width: <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['demand_data']->value['percent_complete'];?>
<?php $_tmp1=ob_get_clean();?><?php echo ceil(100/$_tmp1*100);?>
%">
                                    100%
                                </div>

                                <div class="progress-bar progress-bar-danger" aria-valuenow="<?php echo $_smarty_tpl->tpl_vars['demand_data']->value['percent_complete'];?>
" style="width: <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['demand_data']->value['percent_complete'];?>
<?php $_tmp2=ob_get_clean();?><?php echo (100-ceil(100/$_tmp2*100));?>
%">
                                    <?php echo $_smarty_tpl->tpl_vars['demand_data']->value['percent_complete_over'];?>
%
                                </div>
                            <?php }?>
                        </div>
                        
                    </div>
                </div>


                
                
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="form-horizontal  ">
    
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group demand-details <?php if (!$_smarty_tpl->tpl_vars['detail']->value) {?>hidden<?php }?>">
                
                <label class="col-sm-2 col-xs-3 control-label <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['active_role']==@constant('USER_ROLE_CUSTOMER')) {?>text-bold<?php }?>"><?php echo L::members_customer;?>
</label>
                <div class="col-sm-2 col-xs-3">
                    <p class="form-control-static text-ellipsis">
                        <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['cu_id']) {?>
                            <a data-toggle="modal" href="#modal-remote" data-remote="users/view/<?php echo $_smarty_tpl->tpl_vars['demand_data']->value['cu_id'];?>
/">
                                <?php echo $_smarty_tpl->tpl_vars['demand_data']->value['cu_fi'];?>

                            </a>
                        <?php } else { ?>
                            <?php echo $_smarty_tpl->tpl_vars['demand_data']->value['cu_email'];?>

                        <?php }?>
                    </p>
                </div>
                
                <label class="col-sm-2 col-xs-3 control-label <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['active_role']==@constant('USER_ROLE_EXECUTOR')) {?>text-bold<?php }?>"><?php echo L::members_executor;?>
</label>
                <div class="col-sm-2 col-xs-3">
                    <p class="form-control-static text-ellipsis">
                        <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['eu_id']) {?>
                            <a data-toggle="modal" href="#modal-remote" data-remote="users/view/<?php echo $_smarty_tpl->tpl_vars['demand_data']->value['eu_id'];?>
/">
                                <?php echo $_smarty_tpl->tpl_vars['demand_data']->value['eu_fi'];?>

                            </a>
                        <?php } else { ?>
                            <span class="text-muted"><?php echo smarty_modifier_mb_ucfirst(L::text_unknown);?>
</span>
                        <?php }?>
                    </p>
                </div>

                <div class="clearfix visible-xs"></div>

                
                <label class="col-sm-2 col-xs-3 control-label <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['active_role']==@constant('USER_ROLE_RESPONSIBLE')) {?>text-bold<?php }?>"><?php echo L::members_responsible;?>
</label>
                <div class="col-sm-2 col-xs-3">
                    <p class="form-control-static text-ellipsis">
                        <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['ru_id']) {?>
                            <a data-toggle="modal" href="#modal-remote" data-remote="users/view/<?php echo $_smarty_tpl->tpl_vars['demand_data']->value['ru_id'];?>
/">
                                <?php echo $_smarty_tpl->tpl_vars['demand_data']->value['ru_fi'];?>

                            </a>
                        <?php } else { ?>
                            <span class="text-muted"><?php echo smarty_modifier_mb_ucfirst(L::text_unknown);?>
</span>
                        <?php }?>
                    </p>
                </div>
                
                <label class="col-sm-2 col-xs-3 control-label"><?php echo smarty_modifier_mb_ucfirst(L::modules_contacts_morph_one);?>
</label>
                <div class="col-sm-2 col-xs-3">
                    <p class="form-control-static text-ellipsis">
                        <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['contact_id']) {?>
                            <a data-toggle="modal" href="#modal-remote" data-remote="contacts/view/<?php echo $_smarty_tpl->tpl_vars['demand_data']->value['contact_id'];?>
/">
                                <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['contact_legal']==@constant('NATURAL_PERSON')) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['demand_data']->value['contact_face_short_fio'];?>

                                <?php } else { ?>
                                    <?php echo $_smarty_tpl->tpl_vars['demand_data']->value['contact_company_full_name'];?>

                                <?php }?>
                            </a>
                        <?php } else { ?>
                            <span class="text-muted"><?php echo smarty_modifier_mb_ucfirst(L::text_unknown);?>
</span>
                        <?php }?>
                    </p>
                </div>

                <div class="clearfix visible-xs"></div>

                
                <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['unix_deadline_date']) {?>
                    <label class="col-sm-2 col-xs-3 control-label">Дедлай</label>
                    <div class="col-sm-2 col-xs-3">
                        <p class="form-control-static">
                            <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['unix_deadline_date']<time()) {?><i class="fa fa-warning text-warning"></i> <?php }?> <?php echo smarty_modifier_ts2text($_smarty_tpl->tpl_vars['demand_data']->value['unix_deadline_date'],false,false,false);?>

                        </p>
                    </div>
                <?php }?>

                
                
                <label class="col-sm-2 col-xs-3 control-label">Стоимость<span class="hidden-sm hidden-xs"></span></label>
                <div class="col-sm-2 col-xs-3">
                    <p class="form-control-static">
                        <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['exec_price']) {?>
                            <?php echo number_format($_smarty_tpl->tpl_vars['demand_data']->value['exec_price'],1);?>

                        <?php } else { ?>
                            <span class="text-muted">&mdash;</span>
                        <?php }?>
                    </p>
                </div>
                

                
                <label class="col-sm-2 col-xs-3 control-label"><?php echo smarty_modifier_mb_ucfirst(L::modules_projects_morph_one);?>
</label>
                <div class="col-sm-2 col-xs-3">
                    <p class="form-control-static text-ellipsis">
                        <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['project_id']) {?>
                            <a href="demands/?cnd[project_id]=<?php echo $_smarty_tpl->tpl_vars['demand_data']->value['project_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['demand_data']->value['project_name'];?>
</a>
                        <?php } else { ?>
                            <span class="text-muted"><?php echo smarty_modifier_mb_ucfirst(L::text_unknown);?>
</span>
                        <?php }?>
                    </p>
                </div>

                
                <label class="col-sm-2 col-xs-3 control-label">Версия</label>
                <div class="col-sm-2 col-xs-3">
                    <p class="form-control-static text-ellipsis">
                        <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['ar_versions']) {?>
                            <?php  $_smarty_tpl->tpl_vars['version'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['version']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['demand_data']->value['ar_versions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['version']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['version']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['version']->key => $_smarty_tpl->tpl_vars['version']->value) {
$_smarty_tpl->tpl_vars['version']->_loop = true;
 $_smarty_tpl->tpl_vars['version']->iteration++;
 $_smarty_tpl->tpl_vars['version']->last = $_smarty_tpl->tpl_vars['version']->iteration === $_smarty_tpl->tpl_vars['version']->total;
?>
                                <a href="demands/?cnd[project_id]=<?php echo $_smarty_tpl->tpl_vars['demand_data']->value['project_id'];?>
&cnd[version_id]=<?php echo $_smarty_tpl->tpl_vars['version']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['version']->value['name'];?>
</a><?php if (!$_smarty_tpl->tpl_vars['version']->last) {?>,<?php }?>
                            <?php } ?>
                        <?php } else { ?>
                            <span class="text-muted"><?php echo smarty_modifier_mb_ucfirst(L::text_unknown);?>
</span>
                        <?php }?>
                    </p>
                </div>

            </div>
        </div>
    </div>

    <?php if (!$_smarty_tpl->tpl_vars['detail']->value) {?>
    <div class="row ">
        <div class="col-sm-12 text-center">
            <button class="btn btn-link btn-sm" onclick="$(this).closest('.form-horizontal').find('.demand-details').toggleClass('hidden'); $(this).closest('.row').remove(); return false;">Показать детали</button>
        </div>
    </div>
    <?php }?>



</div><?php }} ?>
