<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:30:53
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\mrooms\view\wrap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:231265c5a2abd9caca9-80460074%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e70c270a93f5c13d1ff04ffe11ad31daa554b5e7' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\mrooms\\view\\wrap.tpl',
      1 => 1439156342,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '231265c5a2abd9caca9-80460074',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mroom_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a2abda43e41_42229552',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a2abda43e41_42229552')) {function content_5c5a2abda43e41_42229552($_smarty_tpl) {?><div class="container-fluid">

    <div class="form-horizontal form-clamped">
        <div class="form-group">
            <label class="col-sm-4 col-xs-5 control-label"><?php echo L::forms_labels_mrooms_places;?>
</label>
            <div class="col-xs-7 col-sm-8 ">
                <p class="form-control-static"><?php if ($_smarty_tpl->tpl_vars['mroom_data']->value['places']) {
echo $_smarty_tpl->tpl_vars['mroom_data']->value['places'];
} else { ?><span class="text-muted"><?php echo L::text_not_specified;?>
</span><?php }?></p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4 col-xs-5 control-label"><?php echo L::forms_labels_mrooms_projector;?>
</label>
            <div class="col-xs-7 col-sm-8 ">
                <p class="form-control-static">
                <?php if ($_smarty_tpl->tpl_vars['mroom_data']->value['rflags']&@constant('RM_PROJECTOR')) {?><i class="fa fa-check text-success"></i><?php } else { ?><i class="fa fa-times text-muted"></i><?php }?>
                </p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 col-xs-5 control-label"><?php echo L::forms_labels_mrooms_loudspeaker;?>
</label>
            <div class="col-xs-7 col-sm-8 ">
                <p class="form-control-static">
                    <?php if ($_smarty_tpl->tpl_vars['mroom_data']->value['rflags']&@constant('RM_LOUDSPEAKER')) {?><i class="fa fa-check text-success"></i><?php } else { ?><i class="fa fa-times text-muted"></i><?php }?>
                </p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 col-xs-5 control-label"><?php echo L::forms_labels_mrooms_microphone;?>
</label>
            <div class="col-xs-7 col-sm-8 ">
                <p class="form-control-static">
                    <?php if ($_smarty_tpl->tpl_vars['mroom_data']->value['rflags']&@constant('RM_MICROPHONE')) {?><i class="fa fa-check text-success"></i><?php } else { ?><i class="fa fa-times text-muted"></i><?php }?>
                </p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 col-xs-5 control-label"><?php echo L::forms_labels_mrooms_whiteboard;?>
</label>
            <div class="col-xs-7 col-sm-8 ">
                <p class="form-control-static">
                    <?php if ($_smarty_tpl->tpl_vars['mroom_data']->value['rflags']&@constant('RM_WHITEBOARD')) {?><i class="fa fa-check text-success"></i><?php } else { ?><i class="fa fa-times text-muted"></i><?php }?>
                </p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 col-xs-5 control-label"><?php echo L::forms_labels_mrooms_conference;?>
</label>
            <div class="col-xs-7 col-sm-8 ">
                <p class="form-control-static">
                    <?php if ($_smarty_tpl->tpl_vars['mroom_data']->value['rflags']&@constant('RM_CONFERENCE')) {?><i class="fa fa-check text-success"></i><?php } else { ?><i class="fa fa-times text-muted"></i><?php }?>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4 col-xs-5 control-label"><?php echo L::forms_labels_descr;?>
</label>
            <div class="col-xs-7 col-sm-8 ">
                <p class="form-control-static">
                    <?php if ($_smarty_tpl->tpl_vars['mroom_data']->value['descr']) {?>
                        <?php echo $_smarty_tpl->tpl_vars['mroom_data']->value['descr'];?>

                    <?php } else { ?>
                        <span class="text-muted"><?php echo L::text_not_specified;?>
</span>
                    <?php }?>
                </p>
            </div>
        </div>
    </div>


</div><?php }} ?>
