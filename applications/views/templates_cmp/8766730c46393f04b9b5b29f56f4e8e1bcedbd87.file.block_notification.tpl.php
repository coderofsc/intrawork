<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 02:55:43
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\users\form\block_notification.tpl" */ ?>
<?php /*%%SmartyHeaderCode:141325c5a227fe8ed79-34454137%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8766730c46393f04b9b5b29f56f4e8e1bcedbd87' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\users\\form\\block_notification.tpl',
      1 => 1450362482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141325c5a227fe8ed79-34454137',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user_data' => 0,
    'exec_notice_weekdays' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a227ff2f013_19217041',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a227ff2f013_19217041')) {function content_5c5a227ff2f013_19217041($_smarty_tpl) {?><div class="form-group">
    <label for="user_data_exec_notice" class="col-sm-2 control-label clamped-padding-top">
        <?php echo L::forms_labels_users_exec_notice;?>

    </label>
    <div class="col-xs-9 col-sm-6 col-md-4">
        <input name="user_data[exec_notice]" data-size="small" <?php if (!$_smarty_tpl->tpl_vars['user_data']->value['id']||$_smarty_tpl->tpl_vars['user_data']->value['exec_notice']) {?>checked=""<?php }?> id="user_data_exec_notice" type="checkbox" data-toggle="toggle" data-on="<?php echo L::text_yes;?>
" data-off="<?php echo L::text_no;?>
" />
    </div>
</div>


<div class="form-group exec_notice" <?php if ($_smarty_tpl->tpl_vars['user_data']->value['id']&&!$_smarty_tpl->tpl_vars['user_data']->value['exec_notice']) {?>style="display:none"<?php }?>>
    <label class="col-sm-2 control-label"><?php echo L::forms_labels_users_exec_notice_weekdays;?>
</label>
    <div class="col-xs-8">
        <?php if (!isset($_smarty_tpl->tpl_vars['user_data']->value['exec_notice_weekdays'])) {?>
            <?php $_smarty_tpl->tpl_vars["exec_notice_weekdays"] = new Smarty_variable(array(1,2,3,4,5), null, 0);?>
        <?php } else { ?>
            <?php $_smarty_tpl->tpl_vars["exec_notice_weekdays"] = new Smarty_variable($_smarty_tpl->tpl_vars['user_data']->value['exec_notice_weekdays'], null, 0);?>
        <?php }?>
        <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/select_weekdays.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('ar_days'=>$_smarty_tpl->tpl_vars['exec_notice_weekdays']->value,'name'=>"user_data[exec_notice_weekdays]"), 0);?>

    </div>
</div>

<div class="form-group exec_notice" <?php if ($_smarty_tpl->tpl_vars['user_data']->value['id']&&!$_smarty_tpl->tpl_vars['user_data']->value['exec_notice']) {?>style="display:none"<?php }?>>
    <label for="user_data_exec_notice_time" class="col-sm-2 control-label"><?php echo L::forms_labels_users_notice_time;?>
</label>
    <div class="col-xs-9 col-sm-3 col-md-2">
        <select class="selectpicker" name="user_data[exec_notice_time]" id="user_data_exec_notice_time">
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['hours'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['hours']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['name'] = 'hours';
$_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['start'] = (int) 0;
$_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['loop'] = is_array($_loop=24) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['step'] = ((int) 1) == 0 ? 1 : (int) 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['hours']['total']);
?>
                <option <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['hours']['index']==$_smarty_tpl->tpl_vars['user_data']->value['exec_notice_time']) {?>selected=""<?php }?> value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['hours']['index'];?>
"><?php echo (sprintf('%02d',$_smarty_tpl->getVariable('smarty')->value['section']['hours']['index'])).(':00');?>
</option>
            <?php endfor; endif; ?>
        </select>
        
    </div>
</div>

<?php echo '<script'; ?>
>
    $("#user_data_exec_notice").on("change", function() {
        $(".form-group.exec_notice").slideToggle();
    });
<?php echo '</script'; ?>
>



<legend><?php echo L::forms_legends_users_events_notification;?>
</legend>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"><?php echo L::forms_labels_users_events_notification;?>
</label>
    <div class="col-xs-9 col-sm-10 col-md-10">

        <link type="text/css" rel="stylesheet" href="min/<?php echo @constant('RESOURCE_VERSION');?>
/?g=treetablecss" />
        <?php echo '<script'; ?>
 src="min/<?php echo @constant('RESOURCE_VERSION');?>
/?g=treetablejs"><?php echo '</script'; ?>
>

        <ul class="nav nav-tabs" id="notification-tabs">
            <li class="active"><a href="#notification-modules" data-remote="users/edit/<?php echo $_smarty_tpl->tpl_vars['user_data']->value['id'];?>
/get_notification_modules/" data-callback="load_notification_modules" data-toggle="tab"><?php echo L::tabs_modules;?>
</a></li>
            <li><a href="#notification-categories" data-callback="load_notification_categories" data-remote="users/edit/<?php echo $_smarty_tpl->tpl_vars['user_data']->value['id'];?>
/get_notification_categories/" data-callback="load_notification_form" data-toggle="tab"><?php echo L::tabs_demands;?>
</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="notification-modules">
            </div>
            <div class="tab-pane" id="notification-categories">
            </div>
        </div>


    </div>
</div>


<?php echo '<script'; ?>
>
    function load_notification_modules($e) {
        var $container   = $($e.attr('href'));
        $container.append('<input type="hidden" name="crud_notification_module_update" value="true" />');
    }

    function load_notification_categories($e) {
        $("#table-crud-categories").treetable({
            indent: 34,
            expandable: true,
            expanderTemplate: "<a class='btn btn-sm btn-default' href='#'><i class='fa'></a>"
        });

        var $container   = $($e.attr('href'));
        $container.append('<input type="hidden" name="crud_notification_categories_update" value="true" />');
    }


    $("#notification-tabs").find("a[data-toggle='tab']").on("show.bs.tab", function() {

        var container   = $(this).attr('href');
        var $pane       = $(container);
        //var remote = 'users/<?php if ($_smarty_tpl->tpl_vars['user_data']->value['id']) {?>edit/<?php echo $_smarty_tpl->tpl_vars['user_data']->value['id'];?>
/<?php } else { ?>edit/0/<?php }?>';
        var remote = 'users/edit/<?php echo intval($_smarty_tpl->tpl_vars['user_data']->value['id']);?>
/';

        if (container == '#notification-categories') {
            remote+='get_notification_categories/'
        } else {
            remote+='get_notification_modules/'
        }

        //var ar_roles    = $("#user_data_roles").val();
        var ar_roles    = $("#general [name='user_data[role_id][]']").val();
        remote+='?ar_roles='+ar_roles;

        var data        = $pane.find('input:checkbox[name^=crud_]').serialize();
        if (data) {
            remote+='&'+data;
        }

        $(this).data("remote", remote);
    });



    $("#user-form-tabs").find('a[href="#notification"]').on("show.bs.tab", function() {
        $("#notification-tabs").find("li.active a").trigger('show.bs.tab').trigger('shown.bs.tab');
    });


<?php echo '</script'; ?>
>







<?php }} ?>
