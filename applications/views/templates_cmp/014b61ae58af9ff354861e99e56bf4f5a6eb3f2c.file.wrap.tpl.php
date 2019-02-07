<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 05:29:36
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\demands\view\wrap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:176545c5a469059e071-36710743%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '014b61ae58af9ff354861e99e56bf4f5a6eb3f2c' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\demands\\view\\wrap.tpl',
      1 => 1450990796,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176545c5a469059e071-36710743',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'demand_data' => 0,
    'ar_todo' => 0,
    'branch_size' => 0,
    'branch_complete' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a4690617200_57861843',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a4690617200_57861843')) {function content_5c5a4690617200_57861843($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_ts2text')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.ts2text.php';
if (!is_callable('smarty_modifier_mb_ucfirst')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
?>
<div class="container-fluid animated fadeInDown">
    <div class="row">
        <div class="col-md-3">
            <span class="label label-tag">
            <i class="fa fa-plus fa-fw text-muted"></i> <span class="hidden-xs">Создана: </span><?php echo smarty_modifier_ts2text($_smarty_tpl->tpl_vars['demand_data']->value['unix_create_date']);?>

                </span>
        </div>
        <div class="col-md-3 text-center">
            <span class="label label-tag">
            <i class="fa fa-user text-muted"></i> <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['cu_id']) {
echo $_smarty_tpl->tpl_vars['demand_data']->value['cu_short_fio'];
} elseif ($_smarty_tpl->tpl_vars['demand_data']->value['cu_eid']) {
echo $_smarty_tpl->tpl_vars['demand_data']->value['cu_email'];
} else { ?><span class="text-muted"><?php echo smarty_modifier_mb_ucfirst(L::text_unknown);?>
</span><?php }?>
                </span>
        </div>
        <div class="col-md-3 text-center">
            <span class="label label-tag">
                <i class="fa fa-pencil fa-fw text-muted"></i> <span class="hidden-xs">Изменена: </span><?php if ($_smarty_tpl->tpl_vars['demand_data']->value['unix_activity_date']) {
echo smarty_modifier_ts2text($_smarty_tpl->tpl_vars['demand_data']->value['unix_activity_date']);
} else { ?><span class="text-muted"><?php echo smarty_modifier_mb_ucfirst(L::text_unknown);?>
</span><?php }?>
            </span>
        </div>
        <div class="col-md-3 text-right">
            <span class="label label-tag">
            <i class="fa fa-user text-muted"></i> <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['activity_eid']) {
echo $_smarty_tpl->tpl_vars['demand_data']->value['activity_user_short_fio'];
} else { ?><span class="text-muted"><?php echo smarty_modifier_mb_ucfirst(L::text_unknown);?>
</span><?php }?>
                </span>
        </div>
    </div>
    <div class="space space-xs"></div>

    <div class="well well-sm bg-white demand-block" >
    <?php echo $_smarty_tpl->getSubTemplate ("demands/view/block_demand.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
</div>

<div class="clearfix"></div>
<div class="space"></div>

<div class="container-fluid">
    <ul class="nav nav-tabs clamped" id="demand-tabs">
        <li class="active"><a href="#demand-messages" data-toggle="tab"><i class="fa fa-comments-o"></i> <?php echo L::tabs_messages;?>
</a></li>
        <li><a href="#demand-checklist" data-toggle="tab"><i class="fa fa-fw fa-check"></i> Чек-лист <?php if ($_smarty_tpl->tpl_vars['ar_todo']->value['total']) {?><span class="badge badge-info"><?php echo $_smarty_tpl->tpl_vars['ar_todo']->value['complete'];?>
/<?php echo $_smarty_tpl->tpl_vars['ar_todo']->value['total'];?>
</span><?php }?></a></li>
        <li><a href="#demand-members" data-remote="demands/view/<?php echo $_smarty_tpl->tpl_vars['demand_data']->value['id'];?>
/get_members/" data-toggle="tab"><i class="fa fa-fw fa-users"></i> <?php echo L::tabs_members;?>
</a></li>
        <?php if ($_smarty_tpl->tpl_vars['branch_size']->value>1) {?>
        <li><a href="#demand-branch"  data-toggle="tab"><i class="fa fa-fw fa-object-group"></i> <?php echo L::tabs_joins;?>
 <span class="badge badge-info"><?php echo $_smarty_tpl->tpl_vars['branch_complete']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['branch_size']->value;?>
</span></a></li>
        <?php }?>

        <li><a href="#demand-history" data-remote="demands/view/<?php echo $_smarty_tpl->tpl_vars['demand_data']->value['id'];?>
/get_history/" data-toggle="tab"><i class="fa fa-fw fa-history"></i> <?php echo L::tabs_history;?>
</a></li>

    </ul>

    <div class="tab-content">
        <div class="tab-pane active clamped" id="demand-messages">
            <?php echo $_smarty_tpl->getSubTemplate ("demands/view/block_messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
        <div class="tab-pane container-fluid bg-white" id="demand-checklist">
            <?php echo $_smarty_tpl->getSubTemplate ("demands/view/block_checklist.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
        <div class="tab-pane container-fluid bg-white" id="demand-members">
        </div>
        <?php if ($_smarty_tpl->tpl_vars['branch_size']->value>1) {?>
        <div class="tab-pane clamped-margin-bottom clamped-padding-bottom container-fluid bg-white" id="demand-branch">
            <?php echo $_smarty_tpl->getSubTemplate ("demands/view/branch/wrap.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
        <?php }?>
        <div class="tab-pane container-fluid bg-white" id="demand-history">
        </div>

    </div>

</div>

<?php }} ?>
