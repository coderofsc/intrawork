<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 19:15:18
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\notes\search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:286925c5b0816e7ab10-42421984%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fcc5c227c42e244f2460cb187efcc7e2776e5a86' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\notes\\search.tpl',
      1 => 1453151210,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '286925c5b0816e7ab10-42421984',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5b0816e82827_98984410',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5b0816e82827_98984410')) {function content_5c5b0816e82827_98984410($_smarty_tpl) {?><div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <input id="note-search" autocomplete="off" type="text" class="form-control input-lg" name="text" placeholder="Введите текст для быстрого поиска...">
        </div>
    </div>
</div>

<?php echo '<script'; ?>
>

    jQuery.expr[":"].Contains = jQuery.expr.createPseudo(function(arg) {
        return function( elem ) {
            return jQuery(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
        };
    });

    $("#note-search").keyup(function() {
        var text = $(this).val();
        $("#notes").find(".note").each(function() {

            if (!$(this).is("*:Contains("+text+")")) {
                $(this).parent().stop().fadeOut('fast');
            } else {
                $(this).parent().stop().fadeIn('fast');
            }
        });
        console.log(text);
    });
<?php echo '</script'; ?>
><?php }} ?>
