<!DOCTYPE html>
<html lang="en">
{include file="main/head.tpl"}

<body>
    <div id="main-backdrop" tabindex="-1"><div><i class="fa fa-circle-o-notch fa-spin fa-5x"></i></div></div>

	{include file="main/layout.tpl"}

    <script>
        var LangIW = {
            'confirms': {
                'deleted_dm_record': {
                    'title': '{L::confirm_deleted_dm_record_title}', 'message': '{L::confirm_deleted_dm_record_message}'
                },
                'deleted_filter': {
                    'title': '{L::confirm_deleted_filter_title}', 'message': '{L::confirm_deleted_filter_message}'
                }
            },
            'toastr': {
                deleted_dm_record: {
                    'title': '{L::toastr_deleted_dm_record_title}', 'message': '{L::toastr_deleted_dm_record_message}'
                }
            }
        };

    </script>

{include file="helpers/include_resource_css.tpl" ar_resource=$ar_resource.foot.css}
{include file="helpers/include_resource_js.tpl" ar_resource=$ar_resource.foot.js}

    {* Модальные окна *}
    {include file="main/modal/m_p.tpl"}
    {foreach from=$controller_info.modal item=name}
        {include file="main/modal/$name.tpl"}
    {/foreach}
    {* /Модальные окна *}

    {*Загрузка языков jquery плагинов*}
    {if $smarty.const.LANG_CURRENT == "ru"}
        <script type="text/javascript" src="resources/bootstrap/selectpicker/js/defaults-ru-ru.js"></script>
        <script type="text/javascript" src="resources/bootstrap/datetimepicker/js/locales/bootstrap-datetimepicker.ru.js"></script>
        <script>bootbox.setLocale('ru');</script>
    {else}
        <script type="text/javascript" src="resources/bootstrap/selectpicker/js/i18n/defaults-en_US.min.js"></script>
        <script>bootbox.setLocale('en');</script>
    {/if}
    {* /Загрузка языков jquery плагинов*}

    {literal}
        <script>
            bootbox.setDefaults({backdrop: true, /*size: 'small',*/ className: 'inmodal', animate: false});
        </script>
    {/literal}


    {*
    {if $system_alerts}
        {include file="main/modal/alerts.tpl"}
        <script>
            $(function() {
                $("#modal-alerts").modal('show');
            })
        </script>
    {/if}
    *}

    <script>
        CoreIW.init('{$smarty.const.LANG_CURRENT}');
    </script>

    <script>
        $(function() {

            {function show_imp_news data=array() index=0}
            {assign var=item value=$data.$index}
            $("#modal-remote").addClass("fade").modal( { remote: "news/view/{$item.id}/", show: true } )
                    .one("hidden.bs.modal", function () {
                        setTimeout(function () {
                            $(this).removeClass("fade");
                            {if isset($data[$index+1])}
                            {show_imp_news data=$data index=$index+1}
                            {/if}
                        }, 250);
                    });
            {/function}

            //$('body').bind('init.layout', function(event) {
            {if $ar_imp_news}
            {show_imp_news data=$ar_imp_news}
            {/if}
        });
    </script>

    {* Оповещения *}
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-bottom-left",
            "onclick": null,
            "showDuration": "400",
            "hideDuration": "1000",
            "timeOut": "7000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    </script>

    {foreach from=$float_alerts name=alert_types key=type item=alerts}
        {if $type == $smarty.const.ALERT_SUCCESS}
            {assign var="alert_type" value="success"}
            {assign var="alert_title" value="Сообщение"}
        {elseif $type == $smarty.const.ALERT_WARNING}
            {assign var="alert_type" value="warning"}
            {assign var="alert_title" value="Внимание"}
        {elseif $type == $smarty.const.ALERT_ERROR}
            {assign var="alert_type" value="error"}
            {assign var="alert_title" value="Обнаружены ошибки"}
        {elseif $type == $smarty.const.ALERT_DANGER}
            {assign var="alert_type" value="error"}
            {assign var="alert_title" value="Обнаружены системные ошибки"}
        {else}
            {assign var="alert_type" value="info"}
            {assign var="alert_title" value="Информация"}
        {/if}
        {foreach from=$alerts item=message}
            <script>toastr.{$alert_type}('{$message.message|htmlentities}', '{if $message.title}{$message.title|htmlentities}{else}{$alert_title}{/if}');</script>
        {/foreach}
    {/foreach}

    {* /Оповещения *}

    {* Диалоги *}
    {*
    {literal}
    <script>
        $(document).ready(function (){

            $('#mp-modal').on('show.bs.modal', function (e) {

                var rcpt_id = $(e.relatedTarget).data("rcpt-id");

                if (typeof m_p !=="undefined"  && m_p.init_status == true) {
                    m_p.main(rcpt_id);
                } else {
                    yepnope({

                        load: ["resources/js/jquery/plugin/m_p/jquery.m_p.js?v={/literal}{$files_versions.jquery_m_p_js}{literal}", "resources/js/jquery/plugin/m_p/jquery.m_p_items.js?v={/literal}{$files_versions.jquery_m_p_items_js}{literal}", "resources/js/jquery/plugin/m_p/jquery.m_p.css?v={/literal}{$files_versions.jquery_m_p_css}{literal}", "resources/js/jquery/plugin/nanoscroller/nanoscroller.css?v={/literal}{$files_versions.nanoscroller_css}{literal}", "resources/js/jquery/plugin/nanoscroller/jquery.nanoscroller.min.js"],
                        complete: function() {
                            if (rcpt_id != undefined) { m_p.init({/literal}{$account_data.id}{literal}); }
                            else { m_p.init({/literal}{$account_data.id}{literal}); }

                            m_p.main(rcpt_id);
                        }
                    });
                }

            }).on('shown.bs.modal', function (e) {
                $(window).resize();
            }).on('hidden.bs.modal', function (e) {
                m_p.hide();
            });

            //m_p_observer.init({delay: 50000});
        });
    </script>
    {/literal}
    *}


</body>

</html>