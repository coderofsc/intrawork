<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 04:12:16
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\notes\search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:104935c5a347086f302-06444264%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79af50cc135d55c0a8ae8433146bf9097f335ab3' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\notes\\search.tpl',
      1 => 1453151210,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104935c5a347086f302-06444264',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a3470877004_89543801',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a3470877004_89543801')) {function content_5c5a3470877004_89543801($_smarty_tpl) {?><div class="container-fluid">
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
