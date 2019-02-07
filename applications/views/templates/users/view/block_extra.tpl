{if $user_data.descr}
    <p>
        {$user_data.descr}
    </p>
{else}
    <div class="alert alert-default">
        Дополнительная информация не указана
    </div>
{/if}