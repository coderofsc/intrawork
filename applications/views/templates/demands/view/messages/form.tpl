<textarea name="message_data[message]" style="border:0px; height: 99%; width:100%" placeholder="Нажмите CTRL+Enter отправки сообщения"></textarea>

{*
{literal}
<script>
    $(document).ready(function(){

        //onEnter
        // http://summernote.org/#/deep-dive

        $("#message-form").find("textarea[name='message_data[message]']").summernote({
            lang: 'ru-RU',
            toolbar: [
                ['misc', ['undo', 'redo']],
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['picture', 'link']],
                ['fullscreen', ['fullscreen']]

                //['height', ['height']]
            ],

            oninit: function() {
                $("#message-form").find('div.note-editable').css({position: 'absolute', top: 40, right: 0, bottom: 0, left: 0});
                $("#message-form").find('div.note-editor').css({position: 'absolute', top: 0, right: 15, bottom: 0, left: 15})
            }
        });
    });
</script>
{/literal}
*}