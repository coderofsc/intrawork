<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 17:47:44
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\news\form\layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:75455c5af3907a7348-74034612%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3ab7bb1cf5aa4a26cdec10e131c158604d3eefa' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\news\\form\\layout.tpl',
      1 => 1455745650,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '75455c5af3907a7348-74034612',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_errors_form' => 0,
    'news_data' => 0,
    'publish_date' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5af39086e6f5_40943993',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5af39086e6f5_40943993')) {function content_5c5af39086e6f5_40943993($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("main/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid">

    <form class="form-horizontal form-valid form-control-changes" role="form" method="post">

        <div class="form-group form-group-general <?php if ($_smarty_tpl->tpl_vars['ar_errors_form']->value['title']) {?>has-error<?php }?>">
            <label for="news_data_title" class="col-sm-2 control-label"><?php echo L::forms_labels_title;?>
</label>
            <div class="col-sm-6">
                <input type="text" data-rule-required="true" class="form-control" name="news_data[title]" id="news_data_title" placeholder="<?php echo $_smarty_tpl->tpl_vars['news_data']->value['title'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['news_data']->value['title'];?>
">
            </div>
        </div>

        <div class="form-group <?php if ($_smarty_tpl->tpl_vars['ar_errors_form']->value['news']) {?>has-error<?php }?>">
            <label for="news_data_news" class="col-sm-2 control-label"><?php echo L::forms_labels_news_news;?>
</label>
            <div class="col-sm-10">
                <textarea data-rule-required="true" data-summernote="true" class="form-control" name="news_data[news]" id="news_data_news"><?php echo $_smarty_tpl->tpl_vars['news_data']->value['news'];?>
</textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
                <div class="checkbox i-checks">
                    <label>
                        <input id="news_data_publish" name="news_data[publish]" type="checkbox" value="1" <?php if (!$_smarty_tpl->tpl_vars['news_data']->value||$_smarty_tpl->tpl_vars['news_data']->value['publish']) {?>checked<?php }?>> Публиковать
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group <?php if ($_smarty_tpl->tpl_vars['news_data']->value&&!$_smarty_tpl->tpl_vars['news_data']->value['publish']) {?>hidden<?php }?>">
            <label for="news_data_publish_date" class="col-sm-2 control-label"><?php echo L::forms_labels_news_publish_date;?>
</label>
            <div class="col-sm-5">
                <?php if (!$_smarty_tpl->tpl_vars['news_data']->value) {?>
                    <?php $_smarty_tpl->tpl_vars["publish_date"] = new Smarty_variable(time(), null, 0);?>
                <?php } else { ?>
                    <?php $_smarty_tpl->tpl_vars["publish_date"] = new Smarty_variable($_smarty_tpl->tpl_vars['news_data']->value['publish_date'], null, 0);?>
                <?php }?>

                <div class="input-group date form_datetime publish_date" data-link-field="news_data_publish_date_lf">
                    <input class="form-control" id="news_data_publish_date" size="16" type="text" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['publish_date']->value,"%d/%m/%Y %H:%M");?>
" readonly data-rule-required="true">
                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                    
                </div>
                <input type="hidden" id="news_data_publish_date_lf" name="news_data[publish_date]" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['publish_date']->value,"%Y-%m-%d %H:%M");?>
" />

            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
                <div class="checkbox i-checks">
                    <label>
                        <input id="news_data_force_view" name="news_data[force_view]" type="checkbox" value="1" <?php if (!$_smarty_tpl->tpl_vars['news_data']->value||$_smarty_tpl->tpl_vars['news_data']->value['force_view']) {?>checked<?php }?>> Принудительный просмотр пользователями
                    </label>
                </div>
            </div>
        </div>
        

        <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/actions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('update'=>isset($_smarty_tpl->tpl_vars['news_data']->value['id'])), 0);?>

    </form>


</div>


<?php echo '<script'; ?>
>
    $('input#news_data_publish').on('ifToggled', function(event){
        $("#news_data_publish_date").closest(".form-group").toggleClass("hidden");
    });

    $(document).ready(function() {
        $('#news_data_news').summernote({
            lang: 'ru-RU',
            height: 200,
            minHeight:100,
            maxHeight:300
        });
    });
<?php echo '</script'; ?>
><?php }} ?>
