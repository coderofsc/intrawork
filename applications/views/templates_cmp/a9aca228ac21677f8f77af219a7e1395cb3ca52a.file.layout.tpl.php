<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 04:23:09
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\mrooms\form\layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23525c5a36fdd047f3-53648839%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a9aca228ac21677f8f77af219a7e1395cb3ca52a' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\mrooms\\form\\layout.tpl',
      1 => 1450362482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23525c5a36fdd047f3-53648839',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_errors_form' => 0,
    'mroom_data' => 0,
    'rand_color' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a36fdde7127_42013372',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a36fdde7127_42013372')) {function content_5c5a36fdde7127_42013372($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("main/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid">

    <form class="form-horizontal form-valid form-control-changes" role="form" method="post">

        <div class="form-group form-group-general <?php if ($_smarty_tpl->tpl_vars['ar_errors_form']->value['name']) {?>has-error<?php }?>">
            <label for="mroom_data_name" class="col-sm-2 control-label"><?php echo L::forms_labels_name;?>
</label>
            <div class="col-sm-6">
                <input type="text" data-rule-required="true" class="form-control" name="mroom_data[name]" id="mroom_data_name" placeholder="<?php echo $_smarty_tpl->tpl_vars['mroom_data']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['mroom_data']->value['name'];?>
">
            </div>
        </div>

        <div class="form-group <?php if ($_smarty_tpl->tpl_vars['ar_errors_form']->value['bgcolor']) {?>has-error<?php }?>">
            <label for="mroom_data_bgcolor" class="col-sm-2 control-label"><?php echo L::forms_labels_mrooms_color;?>
</label>
            <div class="col-sm-2">
                <div class="input-group colorselect">
                    <input type="text" value="<?php if ($_smarty_tpl->tpl_vars['mroom_data']->value['bgcolor']) {
echo $_smarty_tpl->tpl_vars['mroom_data']->value['bgcolor'];
} else {
echo $_smarty_tpl->tpl_vars['rand_color']->value;
}?>" class="form-control" name="mroom_data[bgcolor]" id="mroom_data_bgcolor"/>
                    <span class="input-group-addon"><i></i></span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="mroom_data_places" class="col-sm-2 control-label"><?php echo L::forms_labels_mrooms_places;?>
</label>
            <div class="col-sm-2">
                <input type="text" class="form-control touch-spin" value="<?php echo $_smarty_tpl->tpl_vars['mroom_data']->value['places'];?>
" name="mroom_data[places]" id="mroom_data_places">
            </div>
        </div>

        <div class="form-group clamped-margin-bottom">
            <div class="col-sm-offset-2 col-sm-5">
                <div class="checkbox i-checks">
                    <label>
                        <input type="checkbox" name="mroom_data[rflags][]" <?php if ($_smarty_tpl->tpl_vars['mroom_data']->value['rflags']&@constant('RM_PROJECTOR')) {?>checked<?php }?> value="<?php echo @constant('RM_PROJECTOR');?>
"> <?php echo L::forms_labels_mrooms_projector;?>

                    </label>
                </div>
            </div>
        </div>

        <div class="form-group clamped-margin-bottom">
            <div class="col-sm-offset-2 col-sm-5">
                <div class="checkbox i-checks">
                    <label>
                        <input type="checkbox" name="mroom_data[rflags][]" <?php if ($_smarty_tpl->tpl_vars['mroom_data']->value['rflags']&@constant('RM_LOUDSPEAKER')) {?>checked<?php }?> value="<?php echo @constant('RM_LOUDSPEAKER');?>
"> <?php echo L::forms_labels_mrooms_loudspeaker;?>

                    </label>
                </div>
            </div>
        </div>
        <div class="form-group clamped-margin-bottom">
            <div class="col-sm-offset-2 col-sm-5">
                <div class="checkbox i-checks">
                    <label>
                        <input type="checkbox" name="mroom_data[rflags][]" <?php if ($_smarty_tpl->tpl_vars['mroom_data']->value['rflags']&@constant('RM_MICROPHONE')) {?>checked<?php }?> value="<?php echo @constant('RM_MICROPHONE');?>
"> <?php echo L::forms_labels_mrooms_microphone;?>

                    </label>
                </div>
            </div>
        </div>
        <div class="form-group clamped-margin-bottom">
            <div class="col-sm-offset-2 col-sm-5">
                <div class="checkbox i-checks">
                    <label>
                        <input type="checkbox" name="mroom_data[rflags][]" <?php if ($_smarty_tpl->tpl_vars['mroom_data']->value['rflags']&@constant('RM_WHITEBOARD')) {?>checked<?php }?> value="<?php echo @constant('RM_WHITEBOARD');?>
"> <?php echo L::forms_labels_mrooms_whiteboard;?>

                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
                <div class="checkbox i-checks">
                    <label>
                        <input type="checkbox" name="mroom_data[rflags][]" <?php if ($_smarty_tpl->tpl_vars['mroom_data']->value['rflags']&@constant('RM_CONFERENCE')) {?>checked<?php }?> value="<?php echo @constant('RM_CONFERENCE');?>
"> <?php echo L::forms_labels_mrooms_conference;?>

                    </label>
                </div>
            </div>
        </div>



        <div class="form-group">
            <label for="mroom_data_descr" class="col-sm-2 control-label"><?php echo L::forms_labels_descr;?>
</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="5" name="mroom_data[descr]" id="mroom_data_descr"><?php echo $_smarty_tpl->tpl_vars['mroom_data']->value['descr'];?>
</textarea>
            </div>
        </div>

        <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/actions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('update'=>isset($_smarty_tpl->tpl_vars['mroom_data']->value['id'])), 0);?>

    </form>


</div><?php }} ?>
