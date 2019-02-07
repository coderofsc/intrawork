<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-14 17:39:53
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\main\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:33805991b6393c6ff0-57793076%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f5b71528c20a26f631e194f334dd1c27847e3ba' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\main\\main.tpl',
      1 => 1455744206,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33805991b6393c6ff0-57793076',
  'function' => 
  array (
    'show_imp_news' => 
    array (
      'parameter' => 
      array (
        'data' => 
        array (
        ),
        'index' => 0,
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'ar_resource' => 0,
    'controller_info' => 0,
    'index' => 0,
    'data' => 0,
    'item' => 0,
    'ar_imp_news' => 0,
    'float_alerts' => 0,
    'type' => 0,
    'alerts' => 0,
    'alert_type' => 0,
    'message' => 0,
    'alert_title' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5991b6394f6fa1_59629008',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5991b6394f6fa1_59629008')) {function content_5991b6394f6fa1_59629008($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<?php echo $_smarty_tpl->getSubTemplate ("main/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<body>
    <div id="main-backdrop" tabindex="-1"><div><i class="fa fa-circle-o-notch fa-spin fa-5x"></i></div></div>

	<?php echo $_smarty_tpl->getSubTemplate ("main/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <?php echo '<script'; ?>
>
        var LangIW = {
            'confirms': {
                'deleted_dm_record': {
                    'title': '<?php echo L::confirm_deleted_dm_record_title;?>
', 'message': '<?php echo L::confirm_deleted_dm_record_message;?>
'
                },
                'deleted_filter': {
                    'title': '<?php echo L::confirm_deleted_filter_title;?>
', 'message': '<?php echo L::confirm_deleted_filter_message;?>
'
                }
            },
            'toastr': {
                deleted_dm_record: {
                    'title': '<?php echo L::toastr_deleted_dm_record_title;?>
', 'message': '<?php echo L::toastr_deleted_dm_record_message;?>
'
                }
            }
        };

    <?php echo '</script'; ?>
>

<?php echo $_smarty_tpl->getSubTemplate ("helpers/include_resource_css.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('ar_resource'=>$_smarty_tpl->tpl_vars['ar_resource']->value['foot']['css']), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("helpers/include_resource_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('ar_resource'=>$_smarty_tpl->tpl_vars['ar_resource']->value['foot']['js']), 0);?>


    
    <?php echo $_smarty_tpl->getSubTemplate ("main/modal/m_p.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php  $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['name']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['controller_info']->value['modal']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['name']->key => $_smarty_tpl->tpl_vars['name']->value) {
$_smarty_tpl->tpl_vars['name']->_loop = true;
?>
        <?php echo $_smarty_tpl->getSubTemplate ("main/modal/".((string)$_smarty_tpl->tpl_vars['name']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } ?>
    

    
    <?php if (@constant('LANG_CURRENT')=="ru") {?>
        <?php echo '<script'; ?>
 type="text/javascript" src="resources/bootstrap/selectpicker/js/defaults-ru-ru.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="resources/bootstrap/datetimepicker/js/locales/bootstrap-datetimepicker.ru.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
>bootbox.setLocale('ru');<?php echo '</script'; ?>
>
    <?php } else { ?>
        <?php echo '<script'; ?>
 type="text/javascript" src="resources/bootstrap/selectpicker/js/i18n/defaults-en_US.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
>bootbox.setLocale('en');<?php echo '</script'; ?>
>
    <?php }?>
    

    
        <?php echo '<script'; ?>
>
            bootbox.setDefaults({backdrop: true, /*size: 'small',*/ className: 'inmodal', animate: false});
        <?php echo '</script'; ?>
>
    


    

    <?php echo '<script'; ?>
>
        CoreIW.init('<?php echo @constant('LANG_CURRENT');?>
');
    <?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>
        $(function() {

            <?php if (!function_exists('smarty_template_function_show_imp_news')) {
    function smarty_template_function_show_imp_news($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['show_imp_news']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
            <?php $_smarty_tpl->tpl_vars['item'] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['index']->value], null, 0);?>
            $("#modal-remote").addClass("fade").modal( { remote: "news/view/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/", show: true } )
                    .one("hidden.bs.modal", function () {
                        setTimeout(function () {
                            $(this).removeClass("fade");
                            <?php if (isset($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['index']->value+1])) {?>
                            <?php smarty_template_function_show_imp_news($_smarty_tpl,array('data'=>$_smarty_tpl->tpl_vars['data']->value,'index'=>$_smarty_tpl->tpl_vars['index']->value+1));?>

                            <?php }?>
                        }, 250);
                    });
            <?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>


            //$('body').bind('init.layout', function(event) {
            <?php if ($_smarty_tpl->tpl_vars['ar_imp_news']->value) {?>
            <?php smarty_template_function_show_imp_news($_smarty_tpl,array('data'=>$_smarty_tpl->tpl_vars['ar_imp_news']->value));?>

            <?php }?>
        });
    <?php echo '</script'; ?>
>

    
    <?php echo '<script'; ?>
>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-bottom-left",
            "onclick": null,
            "showDuration": "400",
            "hideDuration": "1000",
            "timeOut": "7000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    <?php echo '</script'; ?>
>

    <?php  $_smarty_tpl->tpl_vars['alerts'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['alerts']->_loop = false;
 $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['float_alerts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['alerts']->key => $_smarty_tpl->tpl_vars['alerts']->value) {
$_smarty_tpl->tpl_vars['alerts']->_loop = true;
 $_smarty_tpl->tpl_vars['type']->value = $_smarty_tpl->tpl_vars['alerts']->key;
?>
        <?php if ($_smarty_tpl->tpl_vars['type']->value==@constant('ALERT_SUCCESS')) {?>
            <?php $_smarty_tpl->tpl_vars["alert_type"] = new Smarty_variable("success", null, 0);?>
            <?php $_smarty_tpl->tpl_vars["alert_title"] = new Smarty_variable("Сообщение", null, 0);?>
        <?php } elseif ($_smarty_tpl->tpl_vars['type']->value==@constant('ALERT_WARNING')) {?>
            <?php $_smarty_tpl->tpl_vars["alert_type"] = new Smarty_variable("warning", null, 0);?>
            <?php $_smarty_tpl->tpl_vars["alert_title"] = new Smarty_variable("Внимание", null, 0);?>
        <?php } elseif ($_smarty_tpl->tpl_vars['type']->value==@constant('ALERT_ERROR')) {?>
            <?php $_smarty_tpl->tpl_vars["alert_type"] = new Smarty_variable("error", null, 0);?>
            <?php $_smarty_tpl->tpl_vars["alert_title"] = new Smarty_variable("Обнаружены ошибки", null, 0);?>
        <?php } elseif ($_smarty_tpl->tpl_vars['type']->value==@constant('ALERT_DANGER')) {?>
            <?php $_smarty_tpl->tpl_vars["alert_type"] = new Smarty_variable("error", null, 0);?>
            <?php $_smarty_tpl->tpl_vars["alert_title"] = new Smarty_variable("Обнаружены системные ошибки", null, 0);?>
        <?php } else { ?>
            <?php $_smarty_tpl->tpl_vars["alert_type"] = new Smarty_variable("info", null, 0);?>
            <?php $_smarty_tpl->tpl_vars["alert_title"] = new Smarty_variable("Информация", null, 0);?>
        <?php }?>
        <?php  $_smarty_tpl->tpl_vars['message'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['message']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['alerts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['message']->key => $_smarty_tpl->tpl_vars['message']->value) {
$_smarty_tpl->tpl_vars['message']->_loop = true;
?>
            <?php echo '<script'; ?>
>toastr.<?php echo $_smarty_tpl->tpl_vars['alert_type']->value;?>
('<?php echo htmlentities($_smarty_tpl->tpl_vars['message']->value['message']);?>
', '<?php if ($_smarty_tpl->tpl_vars['message']->value['title']) {
echo htmlentities($_smarty_tpl->tpl_vars['message']->value['title']);
} else {
echo $_smarty_tpl->tpl_vars['alert_title']->value;
}?>');<?php echo '</script'; ?>
>
        <?php } ?>
    <?php } ?>

    

    
    


</body>

</html><?php }} ?>
