{include file="main/title.tpl"}

<div class="container-fluid">

    <form class="form-horizontal form-valid form-control-changes" role="form" method="post">

        <div class="form-group form-group-general {if $ar_errors_form.name}has-error{/if}">
            <label for="post_data_name" class="col-sm-2 control-label">{L::forms_labels_name}</label>
            <div class="col-sm-5">
                <input data-rule-required="true" type="text" class="form-control" name="post_data[name]" id="post_data_name" placeholder="{$post_data.name}" value="{$post_data.name}">
            </div>
        </div>

        <div class="form-group">
            <label for="post_data_descr" class="col-sm-2 control-label">{L::forms_labels_descr}</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="5" name="post_data[descr]" id="post_data_descr">{$post_data.descr}</textarea>
            </div>
        </div>

        {include file="helpers/forms/actions.tpl" update=isset($post_data.id)}
    </form>


</div>

{literal}
<script>
    $(document).ready(function () {

        /*CoreIW.animation_end(function() {
            $('#post_data_name').tooltip({trigger: 'manual', container: $('#aaa'), 'title': 'Это поле обязательно для заполнения', placement: 'right'}).tooltip('show');
        });*/


    });
</script>
{/literal}