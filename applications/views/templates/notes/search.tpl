<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <input id="note-search" autocomplete="off" type="text" class="form-control input-lg" name="text" placeholder="Введите текст для быстрого поиска...">
        </div>
    </div>
</div>

<script>

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
</script>