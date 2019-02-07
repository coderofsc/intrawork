<div id="messages-container">
    {if $ar_messages}
        {foreach from=$ar_messages item=message key=message_id name=inner_messages}
            {include file="demands/view/messages/item.tpl"}
            {*<div class="space space-xs"></div>*}
        {/foreach}
    {else}
        <div class="alert alert-default">
            В заявке нет ни одного сообщения
        </div>
    {/if}
</div>

<script>
    $("#messages-container").delegate(".show-details", "click", function() {
        $(this).closest("table").find("tr.message-details").removeClass("hidden");
        $(this).closest("tr").remove();
        return false;
    }).delegate(".message-status", "ifToggled", function() {
        var message_id = $(this).val();
        var status = ($(this).is(":checked"))?1:0;
        DemandIW.change_message_status(message_id, status);
    });
</script>