<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:48:45
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\demands\view\members\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:74935c5a2eed0cf1b7-38255189%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '474e6110e1f13dedd072680349d6fb46254846c3' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\demands\\view\\members\\list.tpl',
      1 => 1452778964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74935c5a2eed0cf1b7-38255189',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_members' => 0,
    'demand_data' => 0,
    'ar_users' => 0,
    'invite_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a2eed150058_60611342',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a2eed150058_60611342')) {function content_5c5a2eed150058_60611342($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_mb_ucfirst')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
?><table id="members-table" class="table table-condensed table-hover table-valign-middle">
    <colgroup>
        <col width="50px"/>
        <col width="*"/>
        <col width="150px"/>
        <col width="50px"/>
        <col width="75px"/>
        <col width="125px"/>
        <col width="25px"/>
    </colgroup>
    <thead>
    <tr>
        <th></th>
        <th><?php echo L::forms_labels_fio;?>
</th>
        <th><?php echo L::forms_labels_reports_time_in_work;?>
</th>
        <th>Стоимость</th>
        <th class="text-center"><i class="fa fa-comments-o"></i></th>
        <th><?php echo smarty_modifier_mb_ucfirst(L::modules_roles_morph_one);?>
</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php  $_smarty_tpl->tpl_vars['member'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['member']->_loop = false;
 $_smarty_tpl->tpl_vars['member_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ar_members']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['member']->key => $_smarty_tpl->tpl_vars['member']->value) {
$_smarty_tpl->tpl_vars['member']->_loop = true;
 $_smarty_tpl->tpl_vars['member_id']->value = $_smarty_tpl->tpl_vars['member']->key;
?>
        <?php echo $_smarty_tpl->getSubTemplate ("demands/view/members/item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php }
if (!$_smarty_tpl->tpl_vars['member']->_loop) {
?>
        <tr>
            <td colspan="10" class="text-center">
                Пользователи учавствующие в заявке не найдены
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<button class="btn btn-default" onclick="$(this).hide(); $('#member-invite-form').slideToggle(function() { $(this).closest('.ui-layout-content').scrollTo('100%', 500);}); ">Пригласить пользователя</button>

<form method="post" class="form-horizontal" id="member-invite-form" style="display: none">
    <input type="hidden" id="invite_data_demand_id" name="invite_data[demand_id]" value="<?php echo $_smarty_tpl->tpl_vars['demand_data']->value['id'];?>
">
    <legend>Пригласить пользователя</legend>
    <div class="form-group">
        <label for="invite_data_user_eid" class="col-xs-4 col-sm-4 col-md-2 control-label"><?php echo smarty_modifier_mb_ucfirst(L::modules_users_morph_one);?>
</label>
        <div class="col-xs-8 col-sm-8 col-md-5">
            <select name="invite_data[user_eid][]" multiple id="invite_data_user_eid" class="form-control selectpicker" data-align-right="true" data-live-search="true">
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data'=>$_smarty_tpl->tpl_vars['ar_users']->value,'text'=>"fio",'value'=>"eid",'selected'=>$_smarty_tpl->tpl_vars['invite_data']->value['user_eid'],'group'=>"dprt_name"), 0);?>

            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-4 col-sm-4 col-md-2 control-label">&nbsp;</label>
        <div class="col-xs-8 col-sm-8 col-md-5">
            <button onclick="invite_user(); return false;" class="btn btn-default">Пригласить</button>
        </div>
    </div>
</form>

<?php echo '<script'; ?>
>
    function invite_user() {
        if ($("#invite_data_user_eid").find("option:selected").length > 0) {
            DemandIW.invite_user();
        } else {
            toastr.warning('Укажите пользователя!', 'Приглашение пользователя');
        }

    }
<?php echo '</script'; ?>
>
<?php }} ?>
