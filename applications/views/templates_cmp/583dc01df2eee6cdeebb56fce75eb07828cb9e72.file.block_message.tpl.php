<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 17:13:11
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\demands\form\block_message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:91305c5aeb7764d374-26076571%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '583dc01df2eee6cdeebb56fce75eb07828cb9e72' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\demands\\form\\block_message.tpl',
      1 => 1451387058,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '91305c5aeb7764d374-26076571',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'demand_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5aeb77655071_96544016',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5aeb77655071_96544016')) {function content_5c5aeb77655071_96544016($_smarty_tpl) {?><div class="form-group">
    <div class="col-sm-12">
        
        <textarea data-rule-required="true" data-summernote="true" placeholder="Опишите заявку как можно подробнее, указав всю необходимую информацию для ее выполнения." name="demand_data[message]" id="demand_data_message" class="form-control" rows="8"><?php echo $_smarty_tpl->tpl_vars['demand_data']->value['message'];?>
</textarea>
    </div>
</div>

<?php echo '<script'; ?>
>

    $(document).ready(function() {

        $('#demand_data_message').summernote({
            height: 250,
            minHeight:250,
            lang: 'ru-RU',
            maxHeight:500,
            toolbar: [
                ['misc', ['undo', 'redo']],
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['picture', 'link']],
                ['fullscreen', ['fullscreen']]
            ]
        });

    });
<?php echo '</script'; ?>
><?php }} ?>
