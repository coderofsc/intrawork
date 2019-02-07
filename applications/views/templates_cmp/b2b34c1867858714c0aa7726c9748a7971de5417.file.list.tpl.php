<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-14 17:42:22
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\demands\view\messages\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:315755991b6ceaefc59-05866420%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2b34c1867858714c0aa7726c9748a7971de5417' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\demands\\view\\messages\\list.tpl',
      1 => 1450966356,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '315755991b6ceaefc59-05866420',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_messages' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5991b6ceb0c5f2_57125629',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5991b6ceb0c5f2_57125629')) {function content_5991b6ceb0c5f2_57125629($_smarty_tpl) {?><div id="messages-container">
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
