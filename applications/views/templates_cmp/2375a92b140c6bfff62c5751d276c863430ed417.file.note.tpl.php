<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 02:55:44
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\main\modal\note.tpl" */ ?>
<?php /*%%SmartyHeaderCode:244535c5a2280b472c2-56651869%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2375a92b140c6bfff62c5751d276c863430ed417' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\main\\modal\\note.tpl',
      1 => 1455638014,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '244535c5a2280b472c2-56651869',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_errors_form' => 0,
    'note_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a2280b72244_40347301',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a2280b72244_40347301')) {function content_5c5a2280b72244_40347301($_smarty_tpl) {?><div class="modal inmodal" id="modal-note" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-md ui-layout-lg ui-layout-md ui-layout-sm ui-layout-xs">
		<div class="modal-content animated bounceInDown">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="place-modal-formLabel">Создание заметки</h4>
			</div>
			<div class="modal-body">
                <form class="form-horizontal form-valid" role="form" method="post" id="note-form">

                    <div class="form-group <?php if ($_smarty_tpl->tpl_vars['ar_errors_form']->value['name']) {?>has-error<?php }?>">
                        <label for="note_data_title" class="col-sm-2 control-label"><?php echo L::forms_labels_title;?>
</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="note_data[title]" id="note_data_title" placeholder="<?php echo $_smarty_tpl->tpl_vars['note_data']->value['title'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['note_data']->value['title'];?>
">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="note_data_text" class="col-sm-2 control-label"><?php echo L::forms_labels_text;?>
</label>
                        <div class="col-sm-10">
                            <textarea rows="3" style="resize:none" data-rule-required="true" class="form-control" rows="5" name="note_data[text]" id="note_data_text"><?php echo $_smarty_tpl->tpl_vars['note_data']->value['text'];?>
</textarea>
                        </div>
                    </div>

                </form>
			</div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><?php echo L::actions_create;?>
</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
		</div>
	</div>
</div>


<?php echo '<script'; ?>
>
    function append_note(id, title, text) {
        var note = [
            '<li data-id="'+id+'">',
            '<div class="note">',
                ((title)?'<h2>'+title+'</h2>':''),
                '<p>'+text+'</p>',
            '</div>',
            '</li>'].join('\n');

        $("#notes").prepend(note);
    }

    function add_note(title, text, callback) {
        $.ajax({
            url: "/notes/create/",
            dataType: 'json',
            method: 'post',
            data: {
                title: title, text:text
            },
            success: function (response) {
                if (response.status == 200) {

                    toastr.success('Заметка успешно добавлена', 'Заметка');

                    $("#note-empty").remove();

                    if (callback != undefined) {
                        if (typeof(callback) === "function") {
                            callback(response);
                        } else {
                            window[callback](response);
                        }
                    }

                } else {
                    toastr.error("Ошибка создания заметки", "Ошибка сохранения");
                }
            }
        });

    }

    $('#modal-note').on('shown.bs.modal', function () {
        $(this).find("button:submit").on("click", function() {
            var title = $("#note_data_title").val();
            var text =  $("#note_data_text").val();
            $("#note-form").get(0).reset();

            add_note(title, text, function(response) {
                append_note(response.id, title, text);
            });

            $('#modal-note').modal("hide");
            return false;
        });
    }).on('hide.bs.modal', function () {
        $(this).find("button:submit").off("click");
    });
<?php echo '</script'; ?>
>
<?php }} ?>
