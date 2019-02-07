<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 17:13:11
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\demands\form\layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:96895c5aeb7723e179-68711740%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7112865c4bfbb5d377fb2289b8bfcbaf764d908' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\demands\\form\\layout.tpl',
      1 => 1450897788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '96895c5aeb7723e179-68711740',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'current_url_path' => 0,
    'demand_data' => 0,
    'cuser_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5aeb77347bb4_46327445',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5aeb77347bb4_46327445')) {function content_5c5aeb77347bb4_46327445($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("main/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid">

    <form class="form-horizontal form-valid form-control-changes" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['current_url_path']->value;?>
" id="demand-tuning-form" autocomplete="off">

        <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['id']) {?>
            <div class="row">
                <div class="col-sm-12">
                    <?php echo $_smarty_tpl->getSubTemplate ("demands/form/block_general.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>
            </div>


            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <?php if ($_smarty_tpl->tpl_vars['cuser_data']->value['access_data']['limited_setting']) {?>
                        <legend class="legend-sm"><?php echo L::forms_legends_demands_members;?>
</legend>
                        <?php echo $_smarty_tpl->getSubTemplate ("demands/form/block_members.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                    <?php } else { ?>
                    <div class="row">
                        <div class="col-sm-offset-4 col-sm-8">
                            <ul class="nav nav-tabs col">
                                <li class="active"><a href="#members" data-toggle="tab"><?php echo L::tabs_members;?>
</a></li>
                                <li><a href="#extra" data-toggle="tab"><?php echo L::tabs_extra;?>
</a></li>
                            </ul>
                        </div>
                    </div>

                        <div class="tab-content">
                            <div class="tab-pane clamped active" id="members">
                                <?php echo $_smarty_tpl->getSubTemplate ("demands/form/block_members.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                            </div>
                            <div class="tab-pane clamped" id="extra">
                                <?php echo $_smarty_tpl->getSubTemplate ("demands/form/block_extra.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                            </div>
                        </div>

                    <?php }?>

                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <legend class="legend-sm"><?php echo L::forms_legends_demands_statuses;?>
</legend>
                    <?php echo $_smarty_tpl->getSubTemplate ("demands/form/block_statuses.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>
            </div>
        <?php } else { ?>
            <div class="row">
                <div class="col-md-7 col-sm-6 col-xs-12">
                    <?php if (!$_smarty_tpl->tpl_vars['cuser_data']->value['access_data']['limited_setting']) {?>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#general" data-toggle="tab"><?php echo L::tabs_general;?>
</a></li>
                        <li><a href="#checklist" data-toggle="tab">Чек-лист</a></li>
                        
                        <li><a href="#extra" data-toggle="tab"><?php echo L::tabs_extra;?>
</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane clamped active" id="general">
                            <?php echo $_smarty_tpl->getSubTemplate ("demands/form/block_general.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                            <?php echo $_smarty_tpl->getSubTemplate ("demands/form/block_message.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                            <?php echo $_smarty_tpl->getSubTemplate ("demands/form/block_attached.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        </div>
                        <div class="tab-pane clamped" id="checklist">
                            <?php echo $_smarty_tpl->getSubTemplate ("demands/form/block_checklist.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        </div>
                        
                        <div class="tab-pane clamped" id="extra">
                            <?php echo $_smarty_tpl->getSubTemplate ("demands/form/block_extra.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        </div>
                    </div>
                    <?php } else { ?>
                        <?php echo $_smarty_tpl->getSubTemplate ("demands/form/block_general.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        <?php echo $_smarty_tpl->getSubTemplate ("demands/form/block_message.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        <?php echo $_smarty_tpl->getSubTemplate ("demands/form/block_attached.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                    <?php }?>
                </div>
                <div class="col-md-5 col-sm-6 col-xs-12 <?php if ($_smarty_tpl->tpl_vars['cuser_data']->value['access_data']['limited_setting']) {?>form-clamped<?php }?>">
                    <?php echo $_smarty_tpl->getSubTemplate ("demands/form/block_time.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                    <legend class="legend-sm"><?php echo L::forms_legends_demands_members;?>
</legend>
                    <?php echo $_smarty_tpl->getSubTemplate ("demands/form/block_members.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                    <legend class="legend-sm"><?php echo L::forms_legends_demands_statuses;?>
</legend>
                    <?php echo $_smarty_tpl->getSubTemplate ("demands/form/block_statuses.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                    <?php if ($_smarty_tpl->tpl_vars['cuser_data']->value['access_data']['limited_setting']) {?>
                        <div class="space space-sm"></div>
                        <div class="alert alert-default">
                            Все необходимые настройки установит специалист при обработке заявки.
                        </div>
                    <?php }?>
                </div>
            </div>
        <?php }?>

        <?php if (@constant('RENDER_MODE')==@constant('RENDER_MODAL')) {?>
            <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/actions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('update'=>isset($_smarty_tpl->tpl_vars['demand_data']->value['id']),'next'=>false), 0);?>

            <input type="hidden" name="next_redirect"  value="<?php echo @constant('FORM_NA_VIEW');?>
" />
        <?php } else { ?>
            <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/actions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('update'=>isset($_smarty_tpl->tpl_vars['demand_data']->value['id'])), 0);?>

        <?php }?>


    </form>
</div>

<?php if (!$_smarty_tpl->tpl_vars['cuser_data']->value['access_data']['limited_setting']) {?>
<?php echo '<script'; ?>
>
    $("#demand_data_cat_id").on("change", function() {
        var cat_id = $(this).val();
        var $eu_o = $("#demand_data_eu_eid");

        $eu_o.attr("disabled", "disabled").selectpicker("refresh");
        $.ajax({
            url: 'categories/view/'+cat_id+'/get_users/',
            dataType: 'json',
            success: function(response) {

                $eu_o.find("option[value!=0]").attr("disabled", "disabled");

                $(response.data).each(function(i, eid) {
                    $eu_o.find("option[value="+eid+"]").removeAttr("disabled");
                });

                $eu_o.removeAttr("disabled").selectpicker("refresh");

                $eu_o.change();

            }
        });
    });

    $("#demand_data_eu_eid").on("change", function() {
        var value = $(this).val();
        var $o_status = $("#demand_data_status");

        var ar_control_status = [<?php echo m_demands::STATUS_WORK;?>
,<?php echo m_demands::STATUS_COMPLETE;?>
,<?php echo m_demands::STATUS_PAUSE;?>
];

        if (value != 0 && !$(this).find("option:selected").is(":disabled")) {
            $(ar_control_status).each(function(i,status) {
                $o_status.find("option[value="+status+"]").removeAttr("disabled");
            });
        } else {
            $(ar_control_status).each(function(i,status) {
                $o_status.find("option[value="+status+"]").attr("disabled", "disabled");
            });
        }

        $o_status.change();

        if ($(this).find("option:selected").is(":disabled")) {
            $(this).selectpicker('setStyle', 'btn-danger');
        } else {
            $(this).selectpicker('setStyle', 'btn-danger', 'remove');
        }

        $(this).selectpicker("refresh");

    });

    $("#demand_data_status").on("change", function() {

        if ($(this).find("option:selected").is(":disabled")) {
            $(this).selectpicker('setStyle', 'btn-danger');
        } else {
            $(this).selectpicker('setStyle', 'btn-danger', 'remove');
        }

        $(this).selectpicker("refresh");
    });


    $(document).ready(function() {
        $('body').on('init.core', function() {
            $("#demand_data_cat_id").change();
        });
    });


<?php echo '</script'; ?>
>
<?php }?><?php }} ?>
