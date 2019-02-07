<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:26:03
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\mailbots\form\regex.tpl" */ ?>
<?php /*%%SmartyHeaderCode:174665c5a299b69bf31-31862325%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c50e20d71caf10395d4ec6ebbfa573416e14b09c' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\mailbots\\form\\regex.tpl',
      1 => 1451476882,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '174665c5a299b69bf31-31862325',
  'function' => 
  array (
    'regex' => 
    array (
      'parameter' => 
      array (
        'data' => 
        array (
        ),
        'index' => 0,
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'index' => 0,
    'data' => 0,
    'mb_data' => 0,
    'regex' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a299b6e62c6_82002930',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a299b6e62c6_82002930')) {function content_5c5a299b6e62c6_82002930($_smarty_tpl) {?><div class="form-group">
    <label for="mb_data_regex" class="col-sm-3 control-label">Очистка писем</label>
    <div class="col-sm-9">

        <?php if (!function_exists('smarty_template_function_regex')) {
    function smarty_template_function_regex($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['regex']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
            <div class="input-group input-regex">
                <span class="input-group-addon">/</span>
                <input type="text" class="form-control" name="mb_data[regex][<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
][expr]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['expr'];?>
">
                <span class="input-group-addon">/</span>
                <input type="text" class="form-control" name="mb_data[regex][<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
][modifier]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['modifier'];?>
" placeholder="gmixXsuUAJ">
                <span class="input-group-btn">
                    <button class="btn btn-default btn-<?php if ($_smarty_tpl->tpl_vars['index']->value) {?>delete<?php } else { ?>add<?php }?>" type="button"><i class="fa fa-<?php if ($_smarty_tpl->tpl_vars['index']->value) {?>minus<?php } else { ?>plus<?php }?>"></i></button>
                </span>
            </div>
        <?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>


        <div id="list-regex">
        <?php  $_smarty_tpl->tpl_vars['regex'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['regex']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mb_data']->value['regex']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['regex']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['regex']->key => $_smarty_tpl->tpl_vars['regex']->value) {
$_smarty_tpl->tpl_vars['regex']->_loop = true;
 $_smarty_tpl->tpl_vars['regex']->index++;
?>
            <?php smarty_template_function_regex($_smarty_tpl,array('data'=>$_smarty_tpl->tpl_vars['regex']->value,'index'=>$_smarty_tpl->tpl_vars['regex']->index));?>

        <?php }
if (!$_smarty_tpl->tpl_vars['regex']->_loop) {
?>
            <?php smarty_template_function_regex($_smarty_tpl,array('data'=>array(),'index'=>0));?>

        <?php } ?>
        </div>

        <div class="help-block">
            Перечислите регулярные выражения (каждое на отдельной строке), для фильтрации содержимого письма.<br/>
            Все вхождения, удовлетворяющие указанным условиям, будут удалены из тела писем.
        </div>
    </div>
</div>

<?php echo '<script'; ?>
>
    var $list_regex = $("#list-regex");
    function regex_reindex() {
        $list_regex.find(".input-group").each(function(index) {
            $(this).find("input").each(function() {
                var name = $(this).attr("name");
                $(this).attr("name", name.replace(/\[(\d+)\]/, '['+(index)+']'));
            });
        });
    }

    $list_regex.delegate(".btn-add", "click", function() {
        var $clone = $(this).closest(".input-group").clone();
        $clone.find(".btn-add").toggleClass("btn-add btn-delete").find(".fa-plus").toggleClass("fa-plus fa-minus");
        $clone.find("input").val("");
        $list_regex.append($clone);
        regex_reindex();
    });

    $list_regex.delegate(".btn-delete", "click", function() {
        $(this).closest(".input-group").remove();
        regex_reindex();
    });
<?php echo '</script'; ?>
><?php }} ?>
