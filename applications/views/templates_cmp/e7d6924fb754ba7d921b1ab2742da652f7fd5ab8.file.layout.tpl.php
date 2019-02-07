<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:35:15
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\contacts\types\form\layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24925c5a2bc39b7333-97987046%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7d6924fb754ba7d921b1ab2742da652f7fd5ab8' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\contacts\\types\\form\\layout.tpl',
      1 => 1450362482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24925c5a2bc39b7333-97987046',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_errors_form' => 0,
    'ct_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a2bc3a2c654_87840661',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a2bc3a2c654_87840661')) {function content_5c5a2bc3a2c654_87840661($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("main/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid">

    <form class="form-horizontal form-valid form-control-changes" role="form" method="post">

        <div class="form-group form-group-general <?php if ($_smarty_tpl->tpl_vars['ar_errors_form']->value['name']) {?>has-error<?php }?>">
            <label for="ct_data_name" class="col-sm-2 control-label"><?php echo L::forms_labels_name;?>
</label>
            <div class="col-sm-5">
                <input data-rule-required="true" type="text" class="form-control" name="ct_data[name]" id="ct_data_name" placeholder="<?php echo $_smarty_tpl->tpl_vars['ct_data']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['ct_data']->value['name'];?>
">
            </div>
        </div>

        <div class="form-group">
            <label for="ct_data_descr" class="col-sm-2 control-label"><?php echo L::forms_labels_descr;?>
</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="5" name="ct_data[descr]" id="ct_data_descr"><?php echo $_smarty_tpl->tpl_vars['ct_data']->value['descr'];?>
</textarea>
            </div>
        </div>

        <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/actions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('update'=>isset($_smarty_tpl->tpl_vars['ct_data']->value['id'])), 0);?>

    </form>


</div>


<?php echo '<script'; ?>
>
    $(document).ready(function () {

        /*CoreIW.animation_end(function() {
            $('#ct_data_name').tooltip({trigger: 'manual', container: $('#aaa'), 'title': 'Это поле обязательно для заполнения', placement: 'right'}).tooltip('show');
        });*/


    });
<?php echo '</script'; ?>
>
<?php }} ?>
