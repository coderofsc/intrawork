<div class="modal inmodal" id="modal-note" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-md ui-layout-lg ui-layout-md ui-layout-sm ui-layout-xs">
		<div class="modal-content animated bounceInDown">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="place-modal-formLabel">Создание заметки</h4>
			</div>
			<div class="modal-body">
                <form class="form-horizontal form-valid" role="form" method="post" id="note-form">

                    <div class="form-group {if $ar_errors_form.name}has-error{/if}">
                        <label for="note_data_title" class="col-sm-2 control-label">{L::forms_labels_title}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="note_data[title]" id="note_data_title" placeholder="{$note_data.title}" value="{$note_data.title}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="note_data_text" class="col-sm-2 control-label">{L::forms_labels_text}</label>
                        <div class="col-sm-10">
                            <textarea rows="3" style="resize:none" data-rule-required="true" class="form-control" rows="5" name="note_data[text]" id="note_data_text">{$note_data.text}</textarea>
                        </div>
                    </div>

                </form>
			</div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">{L::actions_create}</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
		</div>
	</div>
</div>


<script>
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
</script>
