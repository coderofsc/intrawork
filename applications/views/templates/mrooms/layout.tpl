{extends file="helpers/abstracts/preview_layout.tpl"}
{block name="layout_east"}
    <div class="ui-layout-east" >
        {include file="mrooms/view/layout.tpl"}
    </div>
{/block}
{block name="callback_begin"}
    current_mroom_id = selected_id;
    document.title = 'Загрузка...';
   $("#reservations-calendar").fullCalendar('refetchEvents');
{/block}

{*
<div class="ui-layout-center animated fadeInDown">
    {include file="main/title.tpl"}
	{include file="mrooms/list.tpl"}
</div>

<div class="ui-layout-east" >
    {include file="mrooms/view/layout.tpl"}
</div>

<script>
    $("#mrooms-table").jcatcher({
        source	: 'mrooms/view/%DATA_ID%/?render={$smarty.const.RENDER_JSON}&pane=0',
        wrap	: 'mrooms-view-pane',
        empty   : '{$controller_info.module.name} не выбраны',
        morph   : ['{$controller_info.module.morph|implode:"','"}'],

        callback_end: function(data_id, response) {
            document.title = response.mroom.name;
        },

        callback_begin: function(data_id) {
            current_mroom_id = data_id;
            document.title = 'Загрузка...';
            $("#reservations-calendar").fullCalendar('refetchEvents');
        },

        callback_complete: function() {
            //$("#reservations-calendar").fullCalendar('refetchEvents');
        }
    });
</script>
*}