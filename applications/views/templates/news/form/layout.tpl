{include file="main/title.tpl"}

<div class="container-fluid">

    <form class="form-horizontal form-valid form-control-changes" role="form" method="post">

        <div class="form-group form-group-general {if $ar_errors_form.title}has-error{/if}">
            <label for="news_data_title" class="col-sm-2 control-label">{L::forms_labels_title}</label>
            <div class="col-sm-6">
                <input type="text" data-rule-required="true" class="form-control" name="news_data[title]" id="news_data_title" placeholder="{$news_data.title}" value="{$news_data.title}">
            </div>
        </div>

        <div class="form-group {if $ar_errors_form.news}has-error{/if}">
            <label for="news_data_news" class="col-sm-2 control-label">{L::forms_labels_news_news}</label>
            <div class="col-sm-10">
                <textarea data-rule-required="true" data-summernote="true" class="form-control" name="news_data[news]" id="news_data_news">{$news_data.news}</textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
                <div class="checkbox i-checks">
                    <label>
                        <input id="news_data_publish" name="news_data[publish]" type="checkbox" value="1" {if !$news_data || $news_data.publish}checked{/if}> Публиковать
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group {if $news_data && !$news_data.publish}hidden{/if}">
            <label for="news_data_publish_date" class="col-sm-2 control-label">{L::forms_labels_news_publish_date}</label>
            <div class="col-sm-5">
                {if !$news_data}
                    {assign var="publish_date" value=$smarty.now}
                {else}
                    {assign var="publish_date" value=$news_data.publish_date}
                {/if}

                <div class="input-group date form_datetime publish_date" data-link-field="news_data_publish_date_lf">
                    <input class="form-control" id="news_data_publish_date" size="16" type="text" value="{$publish_date|date_format:"%d/%m/%Y %H:%M"}" readonly data-rule-required="true">
                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                    {*<span class="input-group-addon"><span class="fa fa-times"></span></span>*}
                </div>
                <input type="hidden" id="news_data_publish_date_lf" name="news_data[publish_date]" value="{$publish_date|date_format:"%Y-%m-%d %H:%M"}" />

            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
                <div class="checkbox i-checks">
                    <label>
                        <input id="news_data_force_view" name="news_data[force_view]" type="checkbox" value="1" {if !$news_data || $news_data.force_view}checked{/if}> Принудительный просмотр пользователями
                    </label>
                </div>
            </div>
        </div>
        

        {include file="helpers/forms/actions.tpl" update=isset($news_data.id)}
    </form>


</div>


<script>
    $('input#news_data_publish').on('ifToggled', function(event){
        $("#news_data_publish_date").closest(".form-group").toggleClass("hidden");
    });

    $(document).ready(function() {
        $('#news_data_news').summernote({
            lang: 'ru-RU',
            height: 200,
            minHeight:100,
            maxHeight:300
        });
    });
</script>