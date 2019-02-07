<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:28:15
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\categories\layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:271965c5a2a1f692617-61140870%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd047b57700191b3a435e8984d482fd2139738e4d' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\categories\\layout.tpl',
      1 => 1450362482,
      2 => 'file',
    ),
    '8003aaaacb870e04be423234a00fc3177feea0f8' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\abstracts\\preview_layout_nestable.tpl',
      1 => 1452784812,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '271965c5a2a1f692617-61140870',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'controller_info' => 0,
    'ar_tree' => 0,
    'readonly' => 0,
    'layout_name' => 0,
    'layout_path' => 0,
    'nested' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a2a1f7a3d59_39824957',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a2a1f7a3d59_39824957')) {function content_5c5a2a1f7a3d59_39824957($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.replace.php';
?><?php $_smarty_tpl->tpl_vars["layout_name"] = new Smarty_variable(smarty_modifier_replace($_smarty_tpl->tpl_vars['controller_info']->value['module']['alias'],"/","-"), null, 0);?>
<?php $_smarty_tpl->tpl_vars["layout_path"] = new Smarty_variable($_smarty_tpl->tpl_vars['controller_info']->value['module']['alias'], null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['ar_tree']->value) {?>
<link rel="stylesheet" href="resources/js/jquery/plugin/nestable/css/nestable.css">
<?php echo '<script'; ?>
 src="resources/js/jquery/plugin/nestable/js/jquery.nestable.js"><?php echo '</script'; ?>
>
<?php }?>

<div class="ui-layout-center animated fadeInDown">
    <?php echo $_smarty_tpl->getSubTemplate ("main/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <form class="form-horizontal" role="form" method="post">
        <div class="dd <?php if ($_smarty_tpl->tpl_vars['readonly']->value) {?>dd-readonly<?php }?>" id="<?php echo $_smarty_tpl->tpl_vars['layout_name']->value;?>
-nestable">
            <?php $_smarty_tpl->tpl_vars["nested"] = new Smarty_variable(0, null, 0);?>
            <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['layout_path']->value)."/nestable.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('nested'=>$_smarty_tpl->tpl_vars['nested']->value,'ar_tree'=>$_smarty_tpl->tpl_vars['ar_tree']->value), 0);?>

        </div>

        <?php if ($_smarty_tpl->tpl_vars['ar_tree']->value&&!$_smarty_tpl->tpl_vars['readonly']->value) {?>
            <div class="container-fluid">
                <div class="form-actions form-group">
                    <div class="col-sm-12">
                        <button id="update-order-<?php echo $_smarty_tpl->tpl_vars['layout_name']->value;?>
" type="submit" name="save" class="btn btn-primary">Сохранить порядок</button>
                    </div>
                </div>
            </div>
        <?php }?>
    </form>
</div>

<div class="ui-layout-east layout-preview bg-muted " id="<?php echo $_smarty_tpl->tpl_vars['layout_name']->value;?>
-view-pane">
    <div class="preview-container cm-container"></div>
</div>

<?php if ($_smarty_tpl->tpl_vars['ar_tree']->value) {?>
<?php echo '<script'; ?>
>
    $("#<?php echo $_smarty_tpl->tpl_vars['layout_name']->value;?>
-nestable").jcatcher({
        source	    : "<?php echo $_smarty_tpl->tpl_vars['layout_path']->value;?>
/view/%DATA_ID%/?render=<?php echo @constant('RENDER_JSON');?>
",
        wrap		: "<?php echo $_smarty_tpl->tpl_vars['layout_name']->value;?>
-view-pane",
        container	: ".dd",
        items		: ".dd-list .dd-content",
        empty       : "<?php echo $_smarty_tpl->tpl_vars['controller_info']->value['module']['name'];?>
 не выбраны",
        morph       : ["<?php echo implode($_smarty_tpl->tpl_vars['controller_info']->value['module']['morph'],'","');?>
"],

        callback_complete: function(selected_id, response, selected_e) {
            document.title = $("#<?php echo $_smarty_tpl->tpl_vars['layout_name']->value;?>
-view-pane").find(".title").html();
            
            $("#<?php echo $_smarty_tpl->tpl_vars['layout_name']->value;?>
-view-pane").find(".page-heading .delete-record").on("click", function(e) {
                e.stopPropagation();
                $(selected_e).find(".btn-group a.delete-record").click();
                return false;
            });
            
        }
    });

    $(document).ready(function(){
        $('#<?php echo $_smarty_tpl->tpl_vars['layout_name']->value;?>
-nestable').nestable({
        }).on('change', function() {
            // флаг изменения
        }).change();
    });

    $("#update-order-<?php echo $_smarty_tpl->tpl_vars['layout_name']->value;?>
").on("click", function() {

        var json = $('#<?php echo $_smarty_tpl->tpl_vars['layout_name']->value;?>
-nestable').nestable('serialize');
        var btn = $(this);

        
        $.ajax({
            method: 'post',
            url: '<?php echo $_smarty_tpl->tpl_vars['layout_path']->value;?>
/update_order/',
            data: {json: json},
            dataType: 'json',
            success: function(response) {
                toastr.success('<?php echo L::toastr_update_order_message;?>
', '<?php echo L::toastr_update_order_title;?>
');
                btn.button("reset");
            }
        });
        

        return false;
    });
<?php echo '</script'; ?>
>
<?php }?>
<?php }} ?>
