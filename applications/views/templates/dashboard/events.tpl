{if $ar_events.data}
{include file="events/timeline.tpl" data=$ar_events.data}
{else}
    <div class="alert alert-default">За прошедшие семь дней событий не обнаружено. <a href="/events/">Смотрите список событий</a>.</div>


{/if}
