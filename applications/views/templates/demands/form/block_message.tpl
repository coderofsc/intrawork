<div class="form-group">
    <div class="col-sm-12">
        {*<label for="demand_data_demand" class="control-label">Описание заявки</label>*}
        <textarea data-rule-required="true" data-summernote="true" placeholder="Опишите заявку как можно подробнее, указав всю необходимую информацию для ее выполнения." name="demand_data[message]" id="demand_data_message" class="form-control" rows="8">{$demand_data.message}</textarea>
    </div>
</div>

<script>

    $(document).ready(function() {

        $('#demand_data_message').summernote({
            height: 250,
            minHeight:250,
            lang: 'ru-RU',
            maxHeight:500,
            toolbar: [
                ['misc', ['undo', 'redo']],
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['picture', 'link']],
                ['fullscreen', ['fullscreen']]
            ]
        });

    });
</script>