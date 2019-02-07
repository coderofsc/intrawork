<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 04:12:16
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\notes\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:148345c5a347088a892-76310457%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0104ebdd67256c590af2aaa4d8416376ad7d1f6b' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\notes\\list.tpl',
      1 => 1447954760,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148345c5a347088a892-76310457',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_notes' => 0,
    'note_id' => 0,
    'note' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a34708c90a4_93599109',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a34708c90a4_93599109')) {function content_5c5a34708c90a4_93599109($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_ts2text')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.ts2text.php';
?><link  href="resources/css/notes.css" rel="stylesheet" type="text/css">

<?php if (!$_smarty_tpl->tpl_vars['ar_notes']->value['data']) {?>
    <div class="alert alert-default" id="note-empty">
        <?php echo L::text_nothing_found;?>

    </div>
<?php }?>

<ul id="notes">
    <?php if ($_smarty_tpl->tpl_vars['ar_notes']->value['data']) {?>
    <?php  $_smarty_tpl->tpl_vars['note'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['note']->_loop = false;
 $_smarty_tpl->tpl_vars['note_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ar_notes']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['note']->key => $_smarty_tpl->tpl_vars['note']->value) {
$_smarty_tpl->tpl_vars['note']->_loop = true;
 $_smarty_tpl->tpl_vars['note_id']->value = $_smarty_tpl->tpl_vars['note']->key;
?>
    <li data-id="<?php echo $_smarty_tpl->tpl_vars['note_id']->value;?>
">
        <div class="note">
            <a class="delete" href="#"><i class="fa fa-times text-danger"></i></a>
            <h2><?php echo $_smarty_tpl->tpl_vars['note']->value['title'];?>
</h2>
            <p><?php echo $_smarty_tpl->tpl_vars['note']->value['text'];?>
</p>
            <span class="date"><?php echo smarty_modifier_ts2text($_smarty_tpl->tpl_vars['note']->value['create_date_unix']);?>
</span>
        </div>
    </li>
    <?php } ?>
<?php }?>
</ul>


<?php echo '<script'; ?>
>

    function delete_note(id, callback) {
        $.ajax({
            url: "/notes/delete/"+id+"/",
            dataType: 'json',
            method: 'get',
            success: function (response) {
                if (response.status == 200) {

                    toastr.success('Заметка успешно удалена', 'Заметка');

                    if (callback != undefined) {
                        if (typeof(callback) === "function") {
                            callback(response);
                        } else {
                            window[callback](response);
                        }
                    }

                } else {
                    toastr.error("Ошибка удаления заметки", "Ошибка удаления");
                }
            }
        });

    }

    $("#notes").find(".note a.delete").on("click", function() {
        var $li = $(this).closest("li");
        var id = $li.data("id");

        delete_note(id, function() {
            $li.fadeOut('normal');
        });

        return false;
    });
<?php echo '</script'; ?>
>
<?php }} ?>
