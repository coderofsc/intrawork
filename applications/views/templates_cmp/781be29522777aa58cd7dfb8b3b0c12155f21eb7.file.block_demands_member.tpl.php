<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-14 17:39:53
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\main\sidebar\block_demands_member.tpl" */ ?>
<?php /*%%SmartyHeaderCode:118035991b6398e9531-70621632%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '781be29522777aa58cd7dfb8b3b0c12155f21eb7' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\main\\sidebar\\block_demands_member.tpl',
      1 => 1451003126,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118035991b6398e9531-70621632',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cuser_data' => 0,
    'demand' => 0,
    'exist_work' => 0,
    'percent_exec' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5991b639a05265_33314311',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5991b639a05265_33314311')) {function content_5991b639a05265_33314311($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_http_build_query')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\modifier.http_build_query.php';
?><ul class="sidebar-block">
    <li class="open">
        <a class="row header" href="demands/<?php if ($_smarty_tpl->tpl_vars['cuser_data']->value['ar_demands_member']['conditions']) {?>?<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['cuser_data']->value['ar_demands_member']['conditions'],"cnd");
}
if ($_smarty_tpl->tpl_vars['cuser_data']->value['ar_demands_member']['sort']) {
if ($_smarty_tpl->tpl_vars['cuser_data']->value['ar_demands_member']['conditions']) {?>&<?php } else { ?>?<?php }
echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['cuser_data']->value['ar_demands_member']['sort'],"sort");
}?>">
            <div class="col-sm-9">
                <i class="fa fa-fw fa-group text-white"></i>
                <span class="nav-label"><?php echo L::sidebar_your_participation;?>
</span>
            </div>
            <div class="col-sm-2 text-center">
                <span class="badge badge-count"><?php echo $_smarty_tpl->tpl_vars['cuser_data']->value['ar_demands_member']['total'];?>
</span>
            </div>
            <div class="col-sm-1 btn-toggle">
                <i class="fa fa-fw fa-caret-down"></i>
            </div>
        </a>

        <?php if ($_smarty_tpl->tpl_vars['cuser_data']->value['ar_demands_member']['total']) {?>
        <ul>
        <?php  $_smarty_tpl->tpl_vars['demand'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['demand']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cuser_data']->value['ar_demands_member']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['demand']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['demand']->key => $_smarty_tpl->tpl_vars['demand']->value) {
$_smarty_tpl->tpl_vars['demand']->_loop = true;
 $_smarty_tpl->tpl_vars['demand']->index++;
 $_smarty_tpl->tpl_vars['demand']->first = $_smarty_tpl->tpl_vars['demand']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["demands_member"]['first'] = $_smarty_tpl->tpl_vars['demand']->first;
?>
            <?php if ($_smarty_tpl->tpl_vars['demand']->value['required_time']) {?>
                <?php $_smarty_tpl->tpl_vars["percent_exec"] = new Smarty_variable(ceil($_smarty_tpl->tpl_vars['demand']->value['exec_time']/$_smarty_tpl->tpl_vars['demand']->value['required_time']*100), null, 0);?>
            <?php } else { ?>
                <?php $_smarty_tpl->tpl_vars["percent_exec"] = new Smarty_variable(0, null, 0);?>
            <?php }?>

            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['demands_member']['first']&&($_smarty_tpl->tpl_vars['demand']->value['eu_eid']!=$_smarty_tpl->tpl_vars['cuser_data']->value['eid']||$_smarty_tpl->tpl_vars['demand']->value['status']!=m_demands::STATUS_WORK)) {?>
                <li class="row">
                    <div class="col-sm-12 text-white">
                        <i class="fa fa-fw fa-warning text-yellow"></i> <strong>Внимание</strong> &mdash; вы не работаете.
                    </div>
                </li>
                <?php $_smarty_tpl->tpl_vars["exist_work"] = new Smarty_variable(false, null, 0);?>
            <?php } else { ?>
                <?php $_smarty_tpl->tpl_vars["exist_work"] = new Smarty_variable(true, null, 0);?>
            <?php }?>

            <li class="row">
                <a class="text-ellipsis col-sm-9 dmd-item" data-id="<?php echo $_smarty_tpl->tpl_vars['demand']->value['id'];?>
" href="demands/view/<?php echo $_smarty_tpl->tpl_vars['demand']->value['id'];?>
/<?php if ($_smarty_tpl->tpl_vars['cuser_data']->value['ar_demands_member']['conditions']) {?>?<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['cuser_data']->value['ar_demands_member']['conditions'],"cnd");
}
if ($_smarty_tpl->tpl_vars['cuser_data']->value['ar_demands_member']['sort']) {
if ($_smarty_tpl->tpl_vars['cuser_data']->value['ar_demands_member']['conditions']) {?>&<?php } else { ?>?<?php }
echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['cuser_data']->value['ar_demands_member']['sort'],"sort");
}?>">
                    <i class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['demands_member']['first']&&$_smarty_tpl->tpl_vars['exist_work']->value) {?>text-yellow<?php }?> fa fa-fw fa-<?php echo m_demands::$ar_status[$_smarty_tpl->tpl_vars['demand']->value['status']]['icon'];?>
" title="<?php echo m_demands::$ar_status[$_smarty_tpl->tpl_vars['demand']->value['status']]['name'];?>
"></i>
                    
                    <span class="nav-label <?php if ($_smarty_tpl->tpl_vars['demand']->value['criticality']>m_demands::CRITICALITY_MID) {?>text-danger<?php }?>">
                        <?php echo $_smarty_tpl->tpl_vars['demand']->value['title'];?>

                    </span>

                </a>
                <div class="col-sm-2 text-center" title="<?php echo $_smarty_tpl->tpl_vars['percent_exec']->value;?>
% выполнено">
                    <span class="badge badge-count"><?php echo $_smarty_tpl->tpl_vars['demand']->value['count_messages'];?>
</span>
                    
                </div>
                <a href="demands/view/<?php echo $_smarty_tpl->tpl_vars['demand']->value['id'];?>
/toggle_tracking/" class="col-sm-1 text-right dm-toggle">
                    <i class="fa-fw fa fa-times text-danger"></i>
                </a>
            </li>
        <?php } ?>
            <?php if ($_smarty_tpl->tpl_vars['cuser_data']->value['ar_demands_member']['total']>sizeof($_smarty_tpl->tpl_vars['cuser_data']->value['ar_demands_member']['data'])) {?>
            <div class="space space-xs"></div>
            <li class="row">
                <div class="col-sm-12">
                    <a href="demands/<?php if ($_smarty_tpl->tpl_vars['cuser_data']->value['ar_demands_member']['conditions']) {?>?<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['cuser_data']->value['ar_demands_member']['conditions'],"cnd");
}?>"><span class="text-muted">Показать все</span></a>
                </div>
            </li>
            <?php }?>
        </ul>
        <?php }?>
    </li>
</ul>

<?php echo '<script'; ?>
>
<?php echo '</script'; ?>
><?php }} ?>
