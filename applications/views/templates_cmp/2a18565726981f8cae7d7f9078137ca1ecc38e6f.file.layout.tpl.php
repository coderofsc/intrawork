<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 19:20:09
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\projects\form\layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:236325c5b0939818666-36888848%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a18565726981f8cae7d7f9078137ca1ecc38e6f' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\projects\\form\\layout.tpl',
      1 => 1451689026,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '236325c5b0939818666-36888848',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_errors_form' => 0,
    'project_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5b0939889af0_31104593',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5b0939889af0_31104593')) {function content_5c5b0939889af0_31104593($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("main/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid">

    <form class="form-horizontal form-valid form-control-changes" role="form" method="post">

        <div class="form-group form-group-general <?php if ($_smarty_tpl->tpl_vars['ar_errors_form']->value['name']) {?>has-error<?php }?>">
            <label for="project_data_name" class="col-sm-2 control-label"><?php echo L::forms_labels_name;?>
</label>
            <div class="col-sm-5">
                <input data-rule-required="true" type="text" class="form-control" name="project_data[name]" id="project_data_name" placeholder="<?php echo $_smarty_tpl->tpl_vars['project_data']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['project_data']->value['name'];?>
">
            </div>
        </div>

        <div class="form-group">
            <label for="project_data_descr" class="col-sm-2 control-label"><?php echo L::forms_labels_descr;?>
</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="5" name="project_data[descr]" id="project_data_descr"><?php echo $_smarty_tpl->tpl_vars['project_data']->value['descr'];?>
</textarea>
            </div>
        </div>

        <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/actions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('update'=>isset($_smarty_tpl->tpl_vars['project_data']->value['id'])), 0);?>

    </form>


</div>


<?php echo '<script'; ?>
>
    $(document).ready(function () {

        /*CoreIW.animation_end(function() {
            $('#project_data_name').tooltip({trigger: 'manual', container: $('#aaa'), 'title': 'Это поле обязательно для заполнения', placement: 'right'}).tooltip('show');
        });*/


    });
<?php echo '</script'; ?>
>
<?php }} ?>
