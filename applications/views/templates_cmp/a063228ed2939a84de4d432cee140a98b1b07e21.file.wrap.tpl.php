<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-14 17:42:22
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\demands\view\branch\wrap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1745991b6ced17c98-04913112%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a063228ed2939a84de4d432cee140a98b1b07e21' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\demands\\view\\branch\\wrap.tpl',
      1 => 1450880688,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1745991b6ced17c98-04913112',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_branch_tree' => 0,
    'demand_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5991b6ced37307_16929459',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5991b6ced37307_16929459')) {function content_5991b6ced37307_16929459($_smarty_tpl) {?>

<link rel="stylesheet" href="resources/js/jquery/plugin/nestable/css/nestable.css">
<?php echo '<script'; ?>
 src="resources/js/jquery/plugin/nestable/js/jquery.nestable.js"><?php echo '</script'; ?>
>

<form class="form-horizontal">
    <div class="dd" id="branch-nestable">
        <?php echo $_smarty_tpl->getSubTemplate ("demands/view/branch/nestable.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('ar_tree'=>$_smarty_tpl->tpl_vars['ar_branch_tree']->value), 0);?>

    </div>

    <div class="form-actions form-group">
        <div class="col-sm-12">
            <button class="btn btn-default" name="save" type="submit" id="update-order-branch">Сохранить порядок</button>
        </div>
    </div>
</form>




<?php echo '<script'; ?>
>
    $(document).ready(function(){
        $('#branch-nestable').nestable({
        }).on('change', function() {
            $("#demand-branch .form-actions .btn").removeClass("btn-default").addClass("btn-primary");
        });
    });

    $("#update-order-branch").on("click", function() {

        var json = $('#branch-nestable').nestable('serialize');
        var btn = $(this);

        
        $.ajax({
            method: 'post',
            url: 'demands/branch_update_orders/<?php echo $_smarty_tpl->tpl_vars['demand_data']->value['branch'];?>
/',
            data: {json: json},
            dataType: 'json',
            success: function(response) {
                toastr.success('<?php echo L::toastr_update_order_message;?>
', '<?php echo L::toastr_update_order_title;?>
');
                btn.button("reset");
                $("#demand-branch .form-actions .btn").removeClass("btn-primary").addClass("btn-default");
            }
        });
        

        return false;
    });

<?php echo '</script'; ?>
>
<?php }} ?>
