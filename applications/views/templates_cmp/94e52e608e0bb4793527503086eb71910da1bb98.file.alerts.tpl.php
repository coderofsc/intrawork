<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-21 16:53:55
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\helpers\alerts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28398599ae5f35a38e4-87136794%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94e52e608e0bb4793527503086eb71910da1bb98' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\alerts.tpl',
      1 => 1437603388,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28398599ae5f35a38e4-87136794',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'system_alerts' => 0,
    'type' => 0,
    'alert_type' => 0,
    'alerts' => 0,
    'alert' => 0,
    'alerts_buffer' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_599ae5f3749cf7_13571718',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_599ae5f3749cf7_13571718')) {function content_599ae5f3749cf7_13571718($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\modifier.date_format.php';
?><?php  $_smarty_tpl->tpl_vars['alerts'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['alerts']->_loop = false;
 $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['system_alerts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['alerts']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['alerts']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['alerts']->key => $_smarty_tpl->tpl_vars['alerts']->value) {
$_smarty_tpl->tpl_vars['alerts']->_loop = true;
 $_smarty_tpl->tpl_vars['type']->value = $_smarty_tpl->tpl_vars['alerts']->key;
 $_smarty_tpl->tpl_vars['alerts']->iteration++;
 $_smarty_tpl->tpl_vars['alerts']->last = $_smarty_tpl->tpl_vars['alerts']->iteration === $_smarty_tpl->tpl_vars['alerts']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['alert_types']['last'] = $_smarty_tpl->tpl_vars['alerts']->last;
?>

    <?php if ($_smarty_tpl->tpl_vars['type']->value==@constant('ALERT_SUCCESS')) {?>
        <?php $_smarty_tpl->tpl_vars["alert_type"] = new Smarty_variable("success", null, 0);?>
        <?php $_smarty_tpl->tpl_vars["alert_title"] = new Smarty_variable("Сообщение", null, 0);?>
    <?php } elseif ($_smarty_tpl->tpl_vars['type']->value==@constant('ALERT_WARNING')) {?>
        <?php $_smarty_tpl->tpl_vars["alert_type"] = new Smarty_variable("warning", null, 0);?>
        <?php $_smarty_tpl->tpl_vars["alert_title"] = new Smarty_variable("Внимание", null, 0);?>
    <?php } elseif ($_smarty_tpl->tpl_vars['type']->value==@constant('ALERT_ERROR')) {?>
        <?php $_smarty_tpl->tpl_vars["alert_type"] = new Smarty_variable("danger", null, 0);?>
        <?php $_smarty_tpl->tpl_vars["alert_title"] = new Smarty_variable("Обнаружены ошибки", null, 0);?>
    <?php } elseif ($_smarty_tpl->tpl_vars['type']->value==@constant('ALERT_DANGER')) {?>
        <?php $_smarty_tpl->tpl_vars["alert_type"] = new Smarty_variable("danger", null, 0);?>
        <?php $_smarty_tpl->tpl_vars["alert_title"] = new Smarty_variable("Обнаружены системные ошибки", null, 0);?>
    <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars["alert_type"] = new Smarty_variable("info", null, 0);?>
        <?php $_smarty_tpl->tpl_vars["alert_title"] = new Smarty_variable("Информация", null, 0);?>
    <?php }?>

    <div class="alert alert-<?php echo $_smarty_tpl->tpl_vars['alert_type']->value;?>
 <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['alert_types']['last']) {?>clamped-margin-bottom<?php }?>">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        

        <?php $_smarty_tpl->tpl_vars["alerts_buffer"] = new Smarty_variable('', null, 0);?>
        <?php  $_smarty_tpl->tpl_vars['alert'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['alert']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['alerts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['alert']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['alert']->iteration=0;
 $_smarty_tpl->tpl_vars['alert']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['alert']->key => $_smarty_tpl->tpl_vars['alert']->value) {
$_smarty_tpl->tpl_vars['alert']->_loop = true;
 $_smarty_tpl->tpl_vars['alert']->iteration++;
 $_smarty_tpl->tpl_vars['alert']->index++;
 $_smarty_tpl->tpl_vars['alert']->first = $_smarty_tpl->tpl_vars['alert']->index === 0;
 $_smarty_tpl->tpl_vars['alert']->last = $_smarty_tpl->tpl_vars['alert']->iteration === $_smarty_tpl->tpl_vars['alert']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['alerts']['first'] = $_smarty_tpl->tpl_vars['alert']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['alerts']['last'] = $_smarty_tpl->tpl_vars['alert']->last;
?>
            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['alerts']['first']) {?>
                <small><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['alert']->value['time'],'%D %H:%M:%S');?>
</small>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['type']->value==@constant('ALERT_DANGER')) {?>
                <?php $_smarty_tpl->tpl_vars["alerts_buffer"] = new Smarty_variable(($_smarty_tpl->tpl_vars['alerts_buffer']->value).($_smarty_tpl->tpl_vars['alert']->value['message']), null, 0);?>
                <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['alerts']['last']) {?>
                    <?php $_smarty_tpl->tpl_vars["alerts_buffer"] = new Smarty_variable(((($_smarty_tpl->tpl_vars['alerts_buffer']->value).(@constant('PHP_EOL'))).("---")).(@constant('PHP_EOL')), null, 0);?>
                <?php }?>
            <?php } else { ?>
                <p><?php echo $_smarty_tpl->tpl_vars['alert']->value['message'];?>
</p>
            <?php }?>
        <?php } ?>

        <?php if ($_smarty_tpl->tpl_vars['type']->value==@constant('ALERT_DANGER')) {?>
            <textarea rows="3" class="form-control form-base64"><?php if ($_smarty_tpl->tpl_vars['config']->value->dev_mode) {
echo $_smarty_tpl->tpl_vars['alerts_buffer']->value;
} else {
echo base64_encode($_smarty_tpl->tpl_vars['alerts_buffer']->value);
}?></textarea>
            <p>Пожалуйста, отправте этот код по адресу службы поддержки: <a href="mailto:<?php echo @constant('IW_EMAIL_SUPPORT');?>
"><?php echo @constant('IW_EMAIL_SUPPORT');?>
</a></p>
        <?php }?>

    </div>
<?php } ?>

<?php }} ?>
