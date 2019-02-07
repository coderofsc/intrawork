<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:12:21
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\demands\form\block_message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19925c5a2665478fb7-89752768%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac00d054eefedfb6d5cdd8b27c065d8fcfda5b6a' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\demands\\form\\block_message.tpl',
      1 => 1451387058,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19925c5a2665478fb7-89752768',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'demand_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a26654889b9_87409010',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a26654889b9_87409010')) {function content_5c5a26654889b9_87409010($_smarty_tpl) {?><div class="form-group">
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
