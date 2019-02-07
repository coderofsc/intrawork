<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 05:29:36
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\demands\view\messages\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:188965c5a46909e3d73-57982373%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4c7b4fdc71dcccf7620c083395091963b344ad4' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\demands\\view\\messages\\list.tpl',
      1 => 1450966356,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188965c5a46909e3d73-57982373',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_messages' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a46909f75f5_52996691',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a46909f75f5_52996691')) {function content_5c5a46909f75f5_52996691($_smarty_tpl) {?><div id="messages-container">
    <?php if ($_smarty_tpl->tpl_vars['ar_messages']->value) {?>
        <?php  $_smarty_tpl->tpl_vars['message'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['message']->_loop = false;
 $_smarty_tpl->tpl_vars['message_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ar_messages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['message']->key => $_smarty_tpl->tpl_vars['message']->value) {
$_smarty_tpl->tpl_vars['message']->_loop = true;
 $_smarty_tpl->tpl_vars['message_id']->value = $_smarty_tpl->tpl_vars['message']->key;
?>
            <?php echo $_smarty_tpl->getSubTemplate ("demands/view/messages/item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            
        <?php } ?>
    <?php } else { ?>
        <div class="alert alert-default">
            В заявке нет ни одного сообщения
        </div>
    <?php }?>
</div>

<?php echo '<script'; ?>
>
    $("#messages-container").delegate(".show-details", "click", function() {
        $(this).closest("table").find("tr.message-details").removeClass("hidden");
        $(this).closest("tr").remove();
        return false;
    }).delegate(".message-status", "ifToggled", function() {
        var message_id = $(this).val();
        var status = ($(this).is(":checked"))?1:0;
        DemandIW.change_message_status(message_id, status);
    });
<?php echo '</script'; ?>
><?php }} ?>
