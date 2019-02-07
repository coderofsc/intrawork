{extends file="helpers/abstracts/preview_layout.tpl"}



{*
{if $controller_info.pane}
    <div class="ui-layout-center jscroll animated fadeInDown">
        {include file="main/title.tpl"}
        {include file="contacts/list.tpl" light=true}
    </div>

    <div class="ui-layout-east layout-preview bg-muted" id="contact-view-pane">
        <div class="preview-container cm-container"></div>
    </div>
{else}
    {include file="main/title.tpl"}
    {include file="contacts/list.tpl" light=true}
{/if}


<script>
    $("#contacts-table").jcatcher({
        source	: 'contacts/view/%DATA_ID%/?render={$smarty.const.RENDER_JSON}',
        wrap	: 'contact-view-pane',
        empty   : '{$controller_info.module.name} не выбраны',
        morph   : ['{$controller_info.module.morph|implode:"','"}'],

        callback_end: function(data_id, response, e) {
            document.title = response.contact.name;
        }
    });
</script>
*}