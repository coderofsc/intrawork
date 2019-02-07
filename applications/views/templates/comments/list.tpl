{foreach from=$ar_comments item=comment}
    {include file="./item.tpl"}
{foreachelse}
        <div class="alert alert-default">Нет комментариев</div>
{/foreach}