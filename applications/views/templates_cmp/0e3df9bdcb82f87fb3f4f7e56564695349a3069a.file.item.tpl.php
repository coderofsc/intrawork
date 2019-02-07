<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:48:45
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\demands\view\members\item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114185c5a2eed16b5d7-69741630%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e3df9bdcb82f87fb3f4f7e56564695349a3069a' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\demands\\view\\members\\item.tpl',
      1 => 1452778948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114185c5a2eed16b5d7-69741630',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'member_id' => 0,
    'demand_data' => 0,
    'member' => 0,
    'percent_exec' => 0,
    'cuser_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a2eed236804_90961056',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a2eed236804_90961056')) {function content_5c5a2eed236804_90961056($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_ts2hours')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.ts2hours.php';
?><tr data-id="<?php echo $_smarty_tpl->tpl_vars['member_id']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['eu_eid']==$_smarty_tpl->tpl_vars['member']->value['eid']) {?>class="warning" <?php }?>>
    <td>
        
        <?php echo $_smarty_tpl->getSubTemplate ("helpers/avatar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('hash'=>$_smarty_tpl->tpl_vars['member']->value['user_avatar_storage_hash'],'dir'=>@constant('STORAGE_DIR_AVATARS_USERS')), 0);?>

    </td>
    <td>
        <?php if ($_smarty_tpl->tpl_vars['member']->value['user_id']) {?>
        <div><a data-toggle="modal" href="#modal-remote" data-remote="users/view/<?php echo $_smarty_tpl->tpl_vars['member']->value['user_id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['member']->value['user_short_fio'];?>
</a></div>
        <?php if ($_smarty_tpl->tpl_vars['member']->value['user_post_id']) {?><span class="small text-muted"><?php echo $_smarty_tpl->tpl_vars['member']->value['user_post_name'];?>
</span><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['member']->value['user_dprt_id']) {?><span class="small text-muted"><?php echo $_smarty_tpl->tpl_vars['member']->value['user_dprt_name'];?>
</span><?php }?>
        <?php } else { ?>
            <?php echo $_smarty_tpl->tpl_vars['member']->value['user_email'];?>

        <?php }?>
    </td>
    <td>
        <?php if ($_smarty_tpl->tpl_vars['member']->value['exec_time']) {?>
        
            <?php $_smarty_tpl->tpl_vars["percent_exec"] = new Smarty_variable(ceil($_smarty_tpl->tpl_vars['member']->value['exec_time']/$_smarty_tpl->tpl_vars['demand_data']->value['exec_time']*100), null, 0);?>
            <div class="progress progress-striped <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['eu_eid']==$_smarty_tpl->tpl_vars['member']->value['eid']&&$_smarty_tpl->tpl_vars['demand_data']->value['status']==m_demands::STATUS_WORK) {?>active<?php }?> clamped">
                <div class="progress-bar<?php if ($_smarty_tpl->tpl_vars['demand_data']->value['eu_eid']==$_smarty_tpl->tpl_vars['member']->value['eid']) {?> progress-bar-success<?php }?>" aria-valuenow="<?php echo $_smarty_tpl->tpl_vars['percent_exec']->value;?>
" aria-valuemin="0" aria-valuemax="100"  style="width: <?php echo $_smarty_tpl->tpl_vars['percent_exec']->value;?>
%;"><?php echo $_smarty_tpl->tpl_vars['percent_exec']->value;?>
%</div>
            </div>
            <small class="text-muted"><?php echo smarty_modifier_ts2hours($_smarty_tpl->tpl_vars['member']->value['exec_time']);?>
</small>
        <?php } else { ?>
            <span class="text-muted">&mdash;</span>
        <?php }?>
    </td>
    <td>
        <?php if ($_smarty_tpl->tpl_vars['member']->value['exec_time']) {?>
            <?php echo number_format($_smarty_tpl->tpl_vars['member']->value['exec_price'],1);?>

        <?php } else { ?>
            <span class="text-muted">&mdash;</span>
        <?php }?>
    </td>
    <td class="text-center">
        <span class="badge badge-white"><?php echo $_smarty_tpl->tpl_vars['member']->value['count_messages'];?>
</span>
    </td>
    <td>
        <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['eu_eid']==$_smarty_tpl->tpl_vars['member']->value['eid']) {?>
            <?php echo L::members_executor;?>

        <?php } elseif ($_smarty_tpl->tpl_vars['demand_data']->value['cu_eid']==$_smarty_tpl->tpl_vars['member']->value['eid']) {?>
            <?php echo L::members_customer;?>

        <?php } elseif ($_smarty_tpl->tpl_vars['demand_data']->value['ru_eid']==$_smarty_tpl->tpl_vars['member']->value['eid']) {?>
            <?php echo L::members_responsible;?>

        <?php } elseif ($_smarty_tpl->tpl_vars['member']->value['exec_time']) {?>
            <?php echo L::members_member;?>

        <?php } else { ?>
            <?php echo L::members_observer;?>

        <?php }?>
    </td>
    <td>
        <?php if ($_smarty_tpl->tpl_vars['cuser_data']->value['eid']==$_smarty_tpl->tpl_vars['member']->value['eid']) {?>
            <a href="demands/view/<?php echo $_smarty_tpl->tpl_vars['demand_data']->value['id'];?>
/toggle_tracking/" class="dm-toggle"><i class="fa fa-toggle-<?php if ($_smarty_tpl->tpl_vars['member']->value['tracking']) {?>on<?php } else { ?>off<?php }?>"></i></a>
        <?php }?>
    </td>
</tr>
<?php }} ?>
