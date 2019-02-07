<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 05:29:36
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\helpers\lists\next_prev.tpl" */ ?>
<?php /*%%SmartyHeaderCode:116655c5a46904f60c4-61778925%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd4b685db391d3421cac8e243a3973a689b38a8c' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\helpers\\lists\\next_prev.tpl',
      1 => 1453148944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116655c5a46904f60c4-61778925',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'controller_info' => 0,
    'conditions' => 0,
    'sort' => 0,
    'np_calc' => 0,
    'group' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a46905730e0_12237833',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a46905730e0_12237833')) {function content_5c5a46905730e0_12237833($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_mb_ucfirst')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
if (!is_callable('smarty_modifier_http_build_query')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.http_build_query.php';
?><ul class="pager clamped list-inline " id="prev-next-nav" style="font-size:13px;">
    <li class="previous disabled"><a href="#">&larr; Назад</a></li>
    <li class="hidden-xs">
        <?php echo smarty_modifier_mb_ucfirst($_smarty_tpl->tpl_vars['controller_info']->value['module']['morph'][0]);?>

    </li>
    <li>
        <span class="rownum">0</span> из <a href="<?php echo $_smarty_tpl->tpl_vars['controller_info']->value['module']['alias'];?>
/<?php if ($_smarty_tpl->tpl_vars['conditions']->value) {?>?<?php }
echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['conditions']->value,"cnd");
if ($_smarty_tpl->tpl_vars['conditions']->value) {?>&<?php } else { ?>?<?php }
echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['sort']->value,"sort");?>
"><span class="total">0</span></a>
        
    </li>
    <li class="next disabled"><a href="#">Вперед &rarr;</a></li>
</ul>
<div class="clearfix"></div>

<?php if ($_smarty_tpl->tpl_vars['np_calc']->value) {?>
<?php echo '<script'; ?>
>

    $("#prev-next-nav").on("click", ".previous.disabled a, .next.disabled a", function() { return false; });

    function np_calc(id) {
        $("#prev-next-nav").find(".rownum").html('<i class="fa fa-spinner fa-spin"></i>');
        $("#prev-next-nav").find(".total").html('<i class="fa fa-spinner fa-spin"></i>');
        $("#prev-next-nav").find(".previous").addClass("disabled");
        $("#prev-next-nav").find(".next").addClass("disabled");

        var query = "<?php if ($_smarty_tpl->tpl_vars['conditions']->value) {?>?<?php }
echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['conditions']->value,"cnd");
if ($_smarty_tpl->tpl_vars['conditions']->value) {?>&<?php } else { ?>?<?php }
echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['sort']->value,"sort");?>
&<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['group']->value,"group");?>
";
        $.ajax({
            url: "/<?php echo $_smarty_tpl->tpl_vars['controller_info']->value['module']['alias'];?>
/view/"+id+"/get_next_prev_id/",
            dataType: 'json',
            method: 'get',
            data: "<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['conditions']->value,"cnd");
if ($_smarty_tpl->tpl_vars['conditions']->value) {?>&<?php }
echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['sort']->value,"sort");?>
&<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['group']->value,"group");?>
",
            success: function (response) {
                if (response.status == 200) {

                    if (response.data.prev) {
                        $("#prev-next-nav").find(".previous").removeClass("disabled").children("a").attr("href", "<?php echo $_smarty_tpl->tpl_vars['controller_info']->value['module']['alias'];?>
/view/"+response.data.prev+"/"+query);
                    }

                    if (response.data.next) {
                        $("#prev-next-nav").find(".next").removeClass("disabled").children("a").attr("href", "<?php echo $_smarty_tpl->tpl_vars['controller_info']->value['module']['alias'];?>
/view/"+response.data.next+"/"+query);
                    }

                    $("#prev-next-nav").find(".rownum").html(response.data.rownum);
                    $("#prev-next-nav").find(".total").html(response.data.total);

                } else {
                    toastr.error("Ошибка получения позиции компании в списке", "Позиция");

                }
            }
        });
    }

    <?php if ($_smarty_tpl->tpl_vars['id']->value) {?>
    $(document).ready(function() {
        np_calc(<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
);
    });
    <?php }?>

<?php echo '</script'; ?>
>
<?php }?>
<?php }} ?>
