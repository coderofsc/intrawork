<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 16:16:35
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\users\view\wrap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:274245c5ade337cb1c7-61615642%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47672c326be265cf1458e2ee9b75115f895d055f' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\users\\view\\wrap.tpl',
      1 => 1450880688,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '274245c5ade337cb1c7-61615642',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_demands_member' => 0,
    'ar_demands_executor' => 0,
    'cuser_data' => 0,
    'user_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5ade33857be6_48546685',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5ade33857be6_48546685')) {function content_5c5ade33857be6_48546685($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_http_build_query')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.http_build_query.php';
if (!is_callable('smarty_modifier_access')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.access.php';
?><div class="row">
    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-sm-4 col-xs-12 text-center">
                <?php echo $_smarty_tpl->getSubTemplate ("users/view/block_avatar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <div class="clearfix"></div>
                <div class="space"></div>
            </div>
            <div class="col-lg-12 col-sm-8 col-xs-12">
                <?php echo $_smarty_tpl->getSubTemplate ("users/view/block_about.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">

        <div class="h3">Все заявки пользователя</div>
        <?php echo $_smarty_tpl->getSubTemplate ("./block_chart.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


        <div class="h3">
            Учавствует в заявках
            <?php if ($_smarty_tpl->tpl_vars['ar_demands_member']->value['total']) {?>
                <a title="Только исполнение" href="demands/<?php if ($_smarty_tpl->tpl_vars['ar_demands_executor']->value['conditions']) {?>?<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['ar_demands_executor']->value['conditions'],"cnd");
}?>" class="pull-right"><span class="badge badge-warning"><i class="fa fa-cog fa-spin"></i> <?php echo $_smarty_tpl->tpl_vars['ar_demands_executor']->value['total'];?>
</span></a>
                <a title="Все заявки с участием пользователя" href="demands/<?php if ($_smarty_tpl->tpl_vars['ar_demands_member']->value['conditions']) {?>?<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['ar_demands_member']->value['conditions'],"cnd");
}?>" class="pull-right right-space"><span class="badge badge-info"><?php echo $_smarty_tpl->tpl_vars['ar_demands_member']->value['total'];?>
</span></a>
            <?php }?>
        </div>
        <?php echo $_smarty_tpl->getSubTemplate ("demands/list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('collapsed'=>true,'ar_demands'=>$_smarty_tpl->tpl_vars['ar_demands_member']->value,'module_id'=>cls_modules::MODULE_DEMANDS,'show_all'=>false,'denied_delete'=>true), 0);?>

        


        <?php if (smarty_modifier_access(cls_modules::MODULE_ROLES,m_roles::CRUD_R)||$_smarty_tpl->tpl_vars['cuser_data']->value['id']==$_smarty_tpl->tpl_vars['user_data']->value['id']) {?>
            <div class="h3">Доступ</div>
            <?php echo $_smarty_tpl->getSubTemplate ("users/view/block_access.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php }?>
    </div>
</div>
<?php }} ?>
