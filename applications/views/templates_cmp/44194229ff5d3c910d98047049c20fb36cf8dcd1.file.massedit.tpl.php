<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:14:44
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\demands\massedit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12855c5a26f4a982d5-12942734%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44194229ff5d3c910d98047049c20fb36cf8dcd1' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\demands\\massedit.tpl',
      1 => 1451689978,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12855c5a26f4a982d5-12942734',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'conditions' => 0,
    'sort' => 0,
    'massedit_data' => 0,
    'global_ar_demands_types' => 0,
    'ar_projects' => 0,
    'ar_users' => 0,
    'cuser_data' => 0,
    'ar_mb' => 0,
    'conditions_decode' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a26f4bccca5_36190131',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a26f4bccca5_36190131')) {function content_5c5a26f4bccca5_36190131($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_http_build_query')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.http_build_query.php';
if (!is_callable('smarty_modifier_mb_ucfirst')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
?><?php echo $_smarty_tpl->getSubTemplate ("main/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container-fluid">
    <form id="massedit-form" class="form-horizontal" method="post" action="demands/massedit/?<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['conditions']->value,"cnd");
if ($_smarty_tpl->tpl_vars['sort']->value) {?>&<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['sort']->value,"sort");
}?>">
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label for="massedit_data_range" class="col-sm-3 control-label">Диапозон</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">От</span>
                            <input name="massedit_data[range_from]" type="text" class="form-control" value="<?php echo intval($_smarty_tpl->tpl_vars['massedit_data']->value['range_from']);?>
">
                            <span class="input-group-addon">До</span>
                            <input name="massedit_data[range_to]" type="text" class="form-control" value="<?php echo intval($_smarty_tpl->tpl_vars['massedit_data']->value['range_to']);?>
">
                        </div>

                    </div>
                </div>

                <hr/>

                <div class="form-group">
                    <label for="massedit_data_demand_type_id" class="col-sm-3 control-label"><?php echo smarty_modifier_mb_ucfirst(L::modules_demands_types_morph_one);?>
</label>
                    <div class="col-sm-9">
                        <div class="input-group input-group-toggle">
                            <span class="input-group-addon">
                                <input type="checkbox">
                            </span>
                            <select disabled name="massedit_data[type_id]" id="massedit_data_demand_type_id" class="form-control selectpicker" data-live-search="true">
                                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data'=>$_smarty_tpl->tpl_vars['global_ar_demands_types']->value,'selected'=>$_smarty_tpl->tpl_vars['massedit_data']->value['type_id']), 0);?>

                            </select>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="massedit_data_demand_project_id" class="col-sm-3 control-label"><?php echo smarty_modifier_mb_ucfirst(L::modules_projects_morph_one);?>
</label>
                    <div class="col-sm-9">
                        <div class="input-group input-group-toggle">
                            <span class="input-group-addon">
                                <input type="checkbox">
                            </span>
                            <select disabled name="massedit_data[project_id]" id="massedit_data_demand_project_id" class="form-control selectpicker" data-live-search="true">
                                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data'=>$_smarty_tpl->tpl_vars['ar_projects']->value,'empty'=>true,'selected'=>$_smarty_tpl->tpl_vars['massedit_data']->value['project_id']), 0);?>

                            </select>
                        </div>
                    </div>
                </div>
                


                <div class="form-group">
                    <label for="massedit_data_demand_eu_eid" class="col-sm-3 control-label"><?php echo L::members_executor;?>
</label>
                    <div class="col-sm-9">
                        <div class="input-group input-group-toggle">
                            <span class="input-group-addon">
                                <input type="checkbox">
                            </span>
                            <select disabled name="massedit_data[eu_eid]" class="selectpicker form-control" id="massedit_data_demand_eu_eid">
                                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('empty'=>true,'data'=>$_smarty_tpl->tpl_vars['ar_users']->value,'text'=>"fio",'value'=>"eid",'selected'=>$_smarty_tpl->tpl_vars['massedit_data']->value['eu_eid'],'group'=>"dprt_name"), 0);?>

                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="massedit_data_demand_ru_eid" class="col-sm-3 control-label"><?php echo L::members_responsible;?>
</label>
                    <div class="col-sm-9">
                        <div class="input-group input-group-toggle">
                            <span class="input-group-addon">
                                <input type="checkbox">
                            </span>
                            <select disabled name="massedit_data[ru_eid]" class="selectpicker form-control" id="massedit_data_demand_ru_eid">
                                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('empty'=>true,'data'=>$_smarty_tpl->tpl_vars['ar_users']->value,'text'=>"fio",'value'=>"eid",'selected'=>$_smarty_tpl->tpl_vars['massedit_data']->value['ru_eid'],'group'=>"dprt_name"), 0);?>

                            </select>
                        </div>
                    </div>
                </div>
                
                
                <div class="form-group">
                <label for="massedit_data_demand_status" class="col-sm-3 control-label"><?php echo L::forms_labels_demands_status;?>
</label>
                    <div class="col-sm-9">
                        <div class="input-group input-group-toggle">
                            <span class="input-group-addon">
                                <input type="checkbox">
                            </span>
                            <select disabled name="massedit_data[status]" class="selectpicker form-control" id="massedit_data_demand_status">
                                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/demand_status.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['massedit_data']->value['status']), 0);?>

                            </select>
                            <?php echo '<script'; ?>
>
                                $("#massedit_data_demand_status").find("option[value=<?php echo m_demands::STATUS_WORK;?>
]").attr("disabled", "disabled");
                            <?php echo '</script'; ?>
>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="massedit_data_demand_criticality" class="col-sm-3 control-label"><?php echo L::forms_labels_demands_criticality;?>
</label>
                    <div class="col-sm-9">
                        <div class="input-group input-group-toggle">
                            <span class="input-group-addon">
                                <input type="checkbox">
                            </span>
                            <select disabled name="massedit_data[criticality]" class="selectpicker form-control" id="massedit_data_demand_criticality">
                                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/demand_criticality.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['massedit_data']->value['criticality']), 0);?>

                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="massedit_data_cat_id" class="col-sm-3 control-label"><?php echo smarty_modifier_mb_ucfirst(L::modules_categories_morph_one);?>
</label>
                    <div class="col-sm-9">
                        <div class="input-group input-group-toggle">
                            <span class="input-group-addon">
                                <input type="checkbox">
                            </span>
                            <select disabled name="massedit_data[cat_id]" id="massedit_data_cat_id" class="form-control selectpicker " data-live-search="true" data-selected-text-format="count>3">
                                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/cat_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tree'=>$_smarty_tpl->tpl_vars['cuser_data']->value['ar_access_tree_categories'],'selected'=>$_smarty_tpl->tpl_vars['massedit_data']->value['cat_id'],'crud'=>true), 0);?>

                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="massedit_data_contact_id" class="col-sm-3 control-label"><?php echo smarty_modifier_mb_ucfirst(L::modules_contacts_morph_one);?>
</label>
                    <div class="col-sm-9">
                        <div class="input-group input-group-toggle">
                            <span class="input-group-addon">
                                <input type="checkbox">
                            </span>
                            <select disabled name="massedit_data[contact_id]" id="massedit_data_contact_id" class="form-control selectpicker " data-live-search="true" data-selected-text-format="count>3">
                                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/contact_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('empty'=>true,'value'=>$_smarty_tpl->tpl_vars['massedit_data']->value['contact_id']), 0);?>

                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="massedit_data_mb_id" class="col-sm-3 control-label"><?php echo smarty_modifier_mb_ucfirst(L::modules_mailbots_morph_one);?>
</label>
                    <div class="col-sm-9">
                        <div class="input-group input-group-toggle">
                            <span class="input-group-addon">
                                <input type="checkbox">
                            </span>
                            <select disabled name="massedit_data[mb_id]" id="massedit_data_mb_id" class="form-control selectpicker " data-live-search="true" data-selected-text-format="count>3">
                                <option value="0">Автоматический выбор</option>
                                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('empty'=>false,'data'=>$_smarty_tpl->tpl_vars['ar_mb']->value,'subtext'=>"address",'selected'=>$_smarty_tpl->tpl_vars['massedit_data']->value['mb_id']), 0);?>

                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <legend>Параметры отбора</legend>

                <?php if ($_smarty_tpl->tpl_vars['conditions_decode']->value&&$_smarty_tpl->tpl_vars['conditions']->value) {?>
                    <?php  $_smarty_tpl->tpl_vars['conditions'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['conditions']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['conditions_decode']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['conditions']->key => $_smarty_tpl->tpl_vars['conditions']->value) {
$_smarty_tpl->tpl_vars['conditions']->_loop = true;
?>
                        <div class="row">
                            <div class="col-sm-5"><span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['conditions']->value['name'];?>
</span></div>
                            <div class="col-sm-6">
                                <?php if (is_array($_smarty_tpl->tpl_vars['conditions']->value['decode'])) {?>
                                    <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['conditions']->value['decode']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
                                        <span class="nav-label text-ellipsis"><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</span>
                                    <?php } ?>
                                <?php } else { ?>
                                    <span class="nav-label text-ellipsis"><?php echo $_smarty_tpl->tpl_vars['conditions']->value['decode'];?>
</span>
                                <?php }?>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="alert alert-default">
                        <p>Условия отбора не указаны &mdash; выбраны все заявки.</p>
                    </div>
                <?php }?>

                <a data-toggle="modal" href="demands/search/?<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['conditions']->value,"conditions");?>
" data-remote="demands/search/">Изменить условия отбора</a>

                <div class="space"></div>
                <div class="alert alert-warning clamped-margin-bottom">
                    При большом объеме данных, процедура изменения данных может занять продолжительное время.
                </div>

            </div>
        </div>


        <div class="form-actions form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="form-inline">
                    <div class="form-group">
                        <div class="btn-group">
                            <input type="hidden" name="massedit" value="1"/>
                            <button type="submit" name="massedit" class="btn btn-primary">Внести изменения</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
</div>


<?php echo '<script'; ?>
>
    $(".input-group-toggle .input-group-addon input:checkbox").on("click", function() {
        var $e = $(this).closest(".input-group").find("> select.form-control, > input:text.form-control");

        $e.prop("disabled", !$(this).is(":checked"));

        if ($e.get(0).tagName == "SELECT") {
            $e.selectpicker("refresh");
        }
    });

    $("#massedit-form").on("submit", function() {
        var $form = $(this);
        bootbox.confirm({
            message: "<p><strong class='text-danger'>Будте внимательны!</strong> Перед внесением изменений, пожалуйста, убедитесь в правильности списка заявок, в который вносятся изменения, а также в изменяемые параметры.</p><p>Вы уверены, что хотите внести указанные изменения?</p>",
            title: "Внесение изменений",
            callback: function(r) {
                if (r) {
                    $form.off("submit");
                    $form.submit();
                }
            }
        });

        return false;
    });
<?php echo '</script'; ?>
><?php }} ?>
