<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 17:27:57
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\demands\types\form\layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:94655c5aeeedb45760-35351149%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9dc923126ec1028b7b213b927d448c01ff54f48e' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\demands\\types\\form\\layout.tpl',
      1 => 1453213602,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94655c5aeeedb45760-35351149',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_errors_form' => 0,
    'dt_data' => 0,
    'ar_type_types' => 0,
    'type' => 0,
    'storage_field' => 0,
    'status_complete' => 0,
    'status_work' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5aeeedcc44b8_86851998',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5aeeedcc44b8_86851998')) {function content_5c5aeeedcc44b8_86851998($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("main/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



<div class="container-fluid">

    <form class="form-horizontal form-valid form-control-changes" autocomplete="off" role="form" method="post">

        <div class="form-group form-group-general <?php if ($_smarty_tpl->tpl_vars['ar_errors_form']->value['name']) {?>has-error<?php }?>">
            <label for="dt_data_name" class="col-sm-2 control-label"><?php echo L::forms_labels_name;?>
</label>
            <div class="col-sm-5">
                <input data-rule-required="true" type="text" class="form-control" name="dt_data[name]" id="dt_data_name" placeholder="<?php echo $_smarty_tpl->tpl_vars['dt_data']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['dt_data']->value['name'];?>
">
            </div>
        </div>

        <div class="form-group">
            <label for="dt_data_name" class="col-sm-2 control-label"><?php echo L::forms_labels_style;?>
</label>
            <div class="col-sm-10 ct-type-list">
                <?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ar_type_types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['type']->iteration=0;
 $_smarty_tpl->tpl_vars['type']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value) {
$_smarty_tpl->tpl_vars['type']->_loop = true;
 $_smarty_tpl->tpl_vars['type']->iteration++;
 $_smarty_tpl->tpl_vars['type']->index++;
?>
                    <div class="radio">
                        <label>
                            <input <?php if (($_smarty_tpl->tpl_vars['type']->index==0&&!$_smarty_tpl->tpl_vars['dt_data']->value['type'])||$_smarty_tpl->tpl_vars['dt_data']->value['type']==$_smarty_tpl->tpl_vars['type']->value) {?>checked<?php }?> type="radio" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" name="dt_data[type]">
                            <span class="label <?php if (!$_smarty_tpl->tpl_vars['dt_data']->value['name']) {?>ct-label-empty<?php }?> label-<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" ><?php if ($_smarty_tpl->tpl_vars['dt_data']->value['name']) {
echo $_smarty_tpl->tpl_vars['dt_data']->value['name'];
} else { ?>&nbsp;<?php }?></span>
                        </label>
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['type']->iteration%3==0) {?>
                        <div class="clearfix"></div>
                    <?php }?>
                <?php } ?>
            </div>
        </div>

        <legend>Автоматическое завершение</legend>

        <div class="form-group">
            <label for="dt_data_auto_complete" class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_categories_auto_complete;?>
</label>
            <div class="col-sm-10 col-xs-3">
                <?php if ($_smarty_tpl->tpl_vars['dt_data']->value['id']) {?>
                    <select class="form-control selectpicker" name="dt_data[auto_complete]" id="dt_data_auto_complete" data-width="150px">
                        <?php echo $_smarty_tpl->getSubTemplate ("./auto_complete_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['dt_data']->value['auto_complete']), 0);?>

                    </select>
                <?php } else { ?>
                    <div class="input-group" style="width:150px">
                        <select class="form-control selectpicker" name="dt_data[auto_complete]" id="dt_data_auto_complete">
                            <?php echo $_smarty_tpl->getSubTemplate ("./auto_complete_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        </select>
                        <span class="input-group-addon">
                            <input type="checkbox" class="storage-data" name="storage_field[]" value="auto_complete" <?php if (in_array("auto_complete",$_smarty_tpl->tpl_vars['storage_field']->value)) {?>checked=""<?php }?>>
                        </span>
                    </div>
                <?php }?>

                <div class="help-block">
                    <?php $_smarty_tpl->_capture_stack[0][] = array('default', "status_complete", null); ob_start(); ?>
                        <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/demand_status.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('monochrome'=>true,'value'=>m_demands::STATUS_COMPLETE,'read'=>true), 0);?>

                    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
                    <?php echo sprintf(L::forms_help_blocks_categories_auto_complete,$_smarty_tpl->tpl_vars['status_complete']->value);?>

                </div>

            </div>
        </div>

        <div id="auto_complete_setup" <?php if (!$_smarty_tpl->tpl_vars['dt_data']->value['auto_complete']) {?>style="display: none"<?php }?>>

            <div class="form-group">
                <label for="dt_data_auto_complete_status" class="col-sm-2 col-xs-3 control-label">Только для статуса</label>
                <div class="col-sm-10 col-xs-3">
                    <?php if ($_smarty_tpl->tpl_vars['dt_data']->value['id']) {?>
                        <select class="form-control selectpicker" name="dt_data[auto_complete_status]" id="dt_data_auto_complete_status" data-width="150px">
                            <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/demand_status.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['dt_data']->value['auto_complete_status']), 0);?>

                        </select>
                    <?php } else { ?>
                        <div class="input-group" style="width:150px">
                            <select class="form-control selectpicker" name="dt_data[auto_complete_status]" id="dt_data_auto_complete_status">
                                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/demand_status.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>m_demands::STATUS_PAUSE), 0);?>

                            </select>
                            <span class="input-group-addon">
                                <input type="checkbox" class="storage-data" name="storage_field[]" value="auto_complete_status" <?php if (in_array("auto_complete_status",$_smarty_tpl->tpl_vars['storage_field']->value)) {?>checked=""<?php }?>>
                            </span>
                        </div>
                    <?php }?>
                </div>
            </div>

            <div class="form-group">
                <label for="dt_data_auto_complete_notice" class="col-sm-2 col-xs-3 control-label">Оповестить заказчика за</label>
                <div class="col-sm-10 col-xs-3">
                    <?php if ($_smarty_tpl->tpl_vars['dt_data']->value['id']) {?>
                        <select class="form-control selectpicker" name="dt_data[auto_complete_notice]" id="dt_data_auto_complete_notice" data-width="150px">
                            <?php echo $_smarty_tpl->getSubTemplate ("./auto_complete_notice_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['dt_data']->value['auto_complete_notice']), 0);?>

                        </select>
                    <?php } else { ?>
                        <div class="input-group" style="width:150px">
                            <select class="form-control selectpicker" name="dt_data[auto_complete_notice]" id="dt_data_auto_complete_notice">
                                <?php echo $_smarty_tpl->getSubTemplate ("./auto_complete_notice_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>(@constant('TIME_HOUR')*6)), 0);?>

                            </select>
                            <span class="input-group-addon">
                                <input type="checkbox" class="storage-data" name="storage_field[]" value="auto_complete_notice" <?php if (in_array("auto_complete_notice",$_smarty_tpl->tpl_vars['storage_field']->value)) {?>checked=""<?php }?>>
                            </span>
                        </div>
                    <?php }?>
                </div>
            </div>

        </div>

        <?php echo '<script'; ?>
>
            $("#dt_data_auto_complete").on("change", function() {
                var auto_complete = parseInt($(this).val());

                if (auto_complete > 0) {
                    $("#auto_complete_setup").slideDown();

                    var $auto_complete_notice = $("#dt_data_auto_complete_notice");

                    $auto_complete_notice.find("option").each(function() {

                        if (parseInt($(this).val()) >= auto_complete) {
                            $(this).prop("disabled", true);
                        } else {
                            $(this).prop("disabled", null);
                        }
                    });

                    $auto_complete_notice.find("option:disabled:selected").prop("selected", null).parent().find("option:not(:disabled)").last().prop("selected", true);
                    $auto_complete_notice.selectpicker("refresh");

                } else {
                    $("#auto_complete_setup").slideUp();
                }
            }).change();
        <?php echo '</script'; ?>
>

        <legend>Автоматическое продление</legend>

        <div class="form-group">
            <label for="dt_data_auto_prolong" class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_categories_auto_prolong;?>
</label>
            <div class="col-sm-10 col-xs-9">

                <?php if ($_smarty_tpl->tpl_vars['dt_data']->value['id']) {?>
                    <select class="form-control selectpicker" name="dt_data[auto_prolong]" id="dt_data_auto_prolong" data-width="150px">
                        <?php echo $_smarty_tpl->getSubTemplate ("./auto_prolong_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                    </select>
                <?php } else { ?>
                    <div class="input-group" style="width:150px">
                        <select class="form-control selectpicker" name="dt_data[auto_prolong]" id="dt_data_auto_prolong">
                            <?php echo $_smarty_tpl->getSubTemplate ("./auto_prolong_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        </select>
                        <span class="input-group-addon">
                            <input type="checkbox" class="storage-data" name="storage_field[]" value="auto_prolong" <?php if (in_array("auto_prolong",$_smarty_tpl->tpl_vars['storage_field']->value)) {?>checked=""<?php }?>>
                        </span>
                    </div>
                <?php }?>

                <p class="help-block">
                    <?php $_smarty_tpl->_capture_stack[0][] = array('default', "status_work", null); ob_start(); ?>
                        <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/demand_status.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('monochrome'=>true,'value'=>m_demands::STATUS_WORK,'read'=>true), 0);?>

                    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
                    <?php echo sprintf(L::forms_help_blocks_categories_auto_prolong,$_smarty_tpl->tpl_vars['status_work']->value);?>

                </p>
            </div>
        </div>

        <legend>Правила перехода между статусами</legend>

        <div class="form-group">
            <label for="dt_data_descr" class="col-sm-2 control-label">Правила перехода между статусами</label>
            <div class="col-sm-10">
                <?php echo $_smarty_tpl->getSubTemplate ("./transition_statuses.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('ts'=>$_smarty_tpl->tpl_vars['dt_data']->value['ts']), 0);?>

                <p class="help-block">
                    Для каждого статуса из списка (по вертикали) надо указать галочками в какие статусы (по горизонтали) из него разрешено переходить.
                </p>
            </div>
        </div>

        <div class="form-group">
            <label for="dt_data_descr" class="col-sm-2 control-label"><?php echo L::forms_labels_descr;?>
</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="3" name="dt_data[descr]" id="dt_data_descr"><?php echo $_smarty_tpl->tpl_vars['dt_data']->value['descr'];?>
</textarea>
            </div>
        </div>
        <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/actions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('update'=>isset($_smarty_tpl->tpl_vars['dt_data']->value['id'])), 0);?>

    </form>


</div>


    <style>
        .ct-label-empty {
            display: inline-block;
            width:50px;
        }

        .ct-type-list .radio {
            padding-bottom:0;
            padding-left:5px;
            float: left;
        }
    </style>
<?php echo '<script'; ?>
>
    $(document).ready(function () {

        $("#dt_data_name").on("keyup", function() {
            var name = $(this).val();
            if (!name.length) {
                $(".ct-type-list .label").addClass("ct-label-empty").html("&nbsp;");
            } else {
                $(".ct-type-list .label").removeClass("ct-label-empty").html(name);
            }
        });

    });
<?php echo '</script'; ?>
>
<?php }} ?>
