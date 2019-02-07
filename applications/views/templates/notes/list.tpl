<link  href="resources/css/notes.css" rel="stylesheet" type="text/css">

{if !$ar_notes.data}
    <div class="alert alert-default" id="note-empty">
        {L::text_nothing_found}
    </div>
{/if}

<ul id="notes">
    {if $ar_notes.data}
    {foreach from=$ar_notes.data item=note key=note_id}
    <li data-id="{$note_id}">
        <div class="note">
            <a class="delete" href="#"><i class="fa fa-times text-danger"></i></a>
            <h2>{$note.title}</h2>
            <p>{$note.text}</p>
            <span class="date">{$note.create_date_unix|ts2text}</span>
        </div>
    </li>
    {/foreach}
{/if}
</ul>


<script>

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
</script>
